<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//显示商品信息
function ShowBuyproduct(){
	global $empire,$class_r,$dbtbpre;
	$buycar=getcvar('mybuycar');
	if(empty($buycar))
	{
		printerror('你的购物车没有商品','',1,0,1);
	}
	$record="!";
	$field="|";
	echo"<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
          <tr class='header'> 
            <td width='41%' height=23> <div align=center>商品名称</div></td>
            <td width='15%'> <div align=center>市场价格</div></td>
            <td width='15%'> <div align=center>优惠价格</div></td>
            <td width='8%'> <div align=center>数量</div></td>
            <td width='21%'> <div align=center>小计</div></td>
          </tr>";
	$alltotal=0;
	$return[0]=0;
	$return[1]=0;
	$return[2]=0;
	$r=explode($record,$buycar);
	$count=count($r);
	for($i=0;$i<$count-1;$i++)
	{
		$pr=explode($field,$r[$i]);
		$productid=$pr[1];
		$fr=explode(",",$pr[1]);
		//ID
		$classid=(int)$fr[0];
		$id=(int)$fr[1];
		if(empty($class_r[$classid][tbname]))
		{
			continue;
		}
		//数量
		$num=(int)$pr[2];
		if(empty($num))
		{
			$num=1;
		}
		//取得产品信息
		$productr=$empire->fetch1("select title,tprice,price,titleurl,groupid,classid,newspath,filename,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid' and id='$id' limit 1");
		if(empty($productr[id]))
		{
			continue;
		}
		//是否全部点数
		if(!$productr[buyfen])
		{
			$return[0]=1;
		}
		$return[1]+=$productr[buyfen]*$num;
		//产品图片
		if(empty($productr[titlepic]))
		{
			$productr[titlepic]="../../data/images/notimg.gif";
		}
		//返回链接
		$titleurl=sys_ReturnBqTitleLink($productr);
		$thistotal=$productr[price]*$num;
		$alltotal+=$thistotal;
		echo"<tr>
	<td align='center' height=23><a href='".$titleurl."' target=_blank>".$productr[title]."</a></td>
	<td align='right'>￥".$productr[tprice]."</td>
	<td align='right'><b>￥".$productr[price]."</b></td>
	<td align='right'>".$num."</td>
	<td align='right'>￥".$thistotal."</td>
	</tr>";
    }
	//支付点数付费
	if(!$return[0])
	{
	$a="<tr height='25'> 
      <td colspan=5><div align=right>合计点数:<strong>".$return[1]."</strong></div></td>
    </tr>";
	}
	echo"<tr height='27'> 
      <td colspan=5><div align=right>合计:<strong>￥".$alltotal."</strong></div></td>
    </tr>".$a."
  </table>";
  $return[2]=$alltotal;
  return $return;
}

//显示配送方式
function ShowPs($pid){
	global $empire,$dbtbpre;
	$pid=(int)$pid;
	$r=$empire->fetch1("select pid,pname,price,psay from {$dbtbpre}enewsshopps where pid='$pid'");
	if(empty($r[pid]))
	{
		printerror('请选择配送方式','',1,0,1);
	}
	echo"<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
  <tr> 
    <td width='69%' height=25> 
      <strong>".$r[pname]."</strong>
    </td>
    <td width='31%'><strong>费用:￥".$r[price]."</strong></td>
  </tr>
  <tr> 
    <td colspan=2><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[psay]."</td></tr></table></td>
  </tr>
</table>";
	return $r[price];
}

//显示支付方式
function ShowPayfs($payfsid,$r,$price){
	global $empire,$user_tablename,$user_money,$user_userid,$user_userfen,$public_r,$dbtbpre;
	$payfsid=(int)$payfsid;
	$add=$empire->fetch1("select payid,payname,payurl,paysay,userpay,userfen from {$dbtbpre}enewsshoppayfs where payid='$payfsid'");
	if(empty($add[payid]))
	{
		printerror('请选择支付方式','',1,0,1);
	}
	//总金额
	$buyallmoney=$r[alltotal]+$price;
	if($add[userfen]&&$r[fp])
	{
		printerror("FenNotFp","history.go(-1)",1);
	}
	//发票
	if($r[fp])
	{
		$fptotal=$r[alltotal]*($public_r[fpnum]/100);
		$afp="+发票费(".$fptotal.")";
		$buyallmoney+=$fptotal;
	}
	$buyallfen=$r[alltotalfen]+$price;
	$returntotal="采购总额(".$r[alltotal].")+配送费(".$price.")".$afp."=总额(<b>".$buyallmoney." 元</b>)";
	$mytotal="结算总金额为:<b><font color=red>".$buyallmoney." 元</font></b> 全部";
	//是否登陆
	if($add[userfen]||$add[userpay])
	{
		if(!getcvar('mluserid'))
		{
			printerror("NotLoginTobuy","history.go(-1)",1);
		}
		$user=islogin();
		//点数购买
		if($add[userfen])
		{
			if($r[alltotalfen]+$price>$user[userfen])
			{
				printerror("NotEnoughFenBuy","history.go(-1)",1);
			}
			$returntotal="采购总点数(".$r[alltotalfen].")+配送点数费(".$price.")=总点数(<b>".$buyallfen." 点</b>)";
			$mytotal="结算总点数为:<b><font color=red>".$buyallfen." 点</font></b> 全部";
		}
		else//扣除余额
		{
			if($buyallmoney>$user[money])
			{
				printerror("NotEnoughMoneyBuy","history.go(-1)",1);
			}
		}
	}
	echo "<table width='100%' border=0 align=center cellpadding=3 cellspacing=1><tr><td>".$add[payname]."</td></tr></table>";
	$return[0]=$returntotal;
	$return[1]=$mytotal;
	return $return;
}
?>
<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8>
<title>订单确认</title>
<link href=../../data/images/css.css rel=stylesheet type=text/css>
</head>

<body>
<form action="../../enews/index.php" method="post" name="myorder" id="myorder">
<input type=hidden name=enews value=AddDd>
  <table width="100%%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td height="27" bgcolor="#FFFFFF"><strong>订单号: 
        <?=$ddno?>
        <input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>">
        </strong></td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择的商品</strong></td>
    </tr>
    <tr> 
      <td> 
        <?
	  $pr=ShowBuyproduct();
	  ?>
      </td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>订货人信息</strong></td>
    </tr>
    <tr> 
      <td><table width="100%%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td width="20%">真实姓名:</td>
            <td width="80%"> 
              <?=$r[truename]?>
              <input name="truename" type="hidden" id="truename" value="<?=$r[truename]?>"> 
            </td>
          </tr>
          <tr> 
            <td>OICQ:</td>
            <td> 
              <?=$r[oicq]?>
              <input name="oicq" type="hidden" id="oicq" value="<?=$r[oicq]?>"></td>
          </tr>
          <tr> 
            <td>MSN:</td>
            <td> 
              <?=$r[msn]?>
              <input name="msn" type="hidden" id="msn" value="<?=$r[msn]?>"></td>
          </tr>
          <tr> 
            <td>固定电话:</td>
            <td> 
              <?=$r[calla]?>
              <input name="call" type="hidden" id="oicq3" value="<?=$r[calla]?>"> 
            </td>
          </tr>
          <tr> 
            <td>移动电话:</td>
            <td> 
              <?=$r[phonea]?>
              <input name="phone" type="hidden" id="call" value="<?=$r[phonea]?>"></td>
          </tr>
          <tr> 
            <td>联系邮箱:</td>
            <td> 
              <?=$r[email]?>
              <input name="email" type="hidden" id="email" value="<?=$r[email]?>"> 
            </td>
          </tr>
          <tr> 
            <td>联系地址:</td>
            <td> 
              <?=$r[addressa]?>
              <input name="address" type="hidden" id="call3" value="<?=$r[addressa]?>" size="60"> 
            </td>
          </tr>
          <tr> 
            <td>邮编:</td>
            <td> 
              <?=$r[zip]?>
              <input name="zip" type="hidden" id="zip" value="<?=$r[zip]?>" size="8"> 
            </td>
          </tr>
          <tr> 
            <td>备注:</td>
            <td> 
              <?=nl2br($r[bz])?> <input name="bz" type="hidden" value="<?=$r[bz]?>" size="8"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择配送方式 
        <input name="psid" type="hidden" id="psid" value="<?=$r[psid]?>" size="8">
        </strong></td>
    </tr>
    <tr> 
      <td height="27"> 
        <?
	  $price=ShowPs($r[psid]);
	  ?>
      </td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择支付方式 
        <input name="payfsid" type="hidden" id="payfsid" value="<?=$r[payfsid]?>" size="8">
        </strong></td>
    </tr>
    <tr> 
      <td height="27"> 
        <?
	  $total=ShowPayfs($r[payfsid],$r,$price);
	  ?>
      </td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>收货人信息</strong></td>
    </tr>
    <tr> 
      <td><table width="100%%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td width="20%">真实姓名:</td>
            <td width="80%"> 
              <?=$r[g_truename]?>
              <input name="g_truename" type="hidden" id="truename3" value="<?=$r[g_truename]?>"> 
            </td>
          </tr>
          <tr> 
            <td>OICQ:</td>
            <td> 
              <?=$r[g_oicq]?>
              <input name="g_oicq" type="hidden" id="oicq4" value="<?=$r[g_oicq]?>"></td>
          </tr>
          <tr> 
            <td>MSN:</td>
            <td> 
              <?=$r[g_msn]?>
              <input name="g_msn" type="hidden" id="g_msn" value="<?=$r[g_msn]?>"></td>
          </tr>
          <tr> 
            <td>固定电话:</td>
            <td> 
              <?=$r[g_call]?>
              <input name="g_call" type="hidden" id="call4" value="<?=$r[g_call]?>"> 
            </td>
          </tr>
          <tr> 
            <td>移动电话:</td>
            <td> 
              <?=$r[g_phone]?>
              <input name="g_phone" type="hidden" id="phone" value="<?=$r[g_phone]?>"></td>
          </tr>
          <tr> 
            <td>联系邮箱:</td>
            <td> 
              <?=$r[g_email]?>
              <input name="g_email" type="hidden" id="email3" value="<?=$r[g_email]?>"> 
            </td>
          </tr>
          <tr> 
            <td>联系地址:</td>
            <td> 
              <?=$r[g_address]?>
              <input name="g_address" type="hidden" id="address" size="60" value="<?=$r[g_address]?>"> 
            </td>
          </tr>
          <tr> 
            <td>邮编:</td>
            <td> 
              <?=$r[g_zip]?>
              <input name="g_zip" type="hidden" id="g_zip" size="8" value="<?=$r[g_zip]?>"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="23" bgcolor="#EFEFEF"><strong>结算信息 
        <input name="fp" type="hidden" id="fp" value="<?=$r[fp]?>">
        <input name="fptt" type="hidden" id="fptt" value="<?=$r[fptt]?>">
        </strong></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
          <tr>
            <td><div align="center"><?=$total[0]?></div></td>
          </tr>
          <tr> 
            <td><div align="center">
                <?=$total[1]?>
              </div></td>
          </tr>
        </table></td>
    </tr>
    <tr height=27> 
      <td><div align="center"> 
          <input type="button" name="Submit3" value=" 上一步 " onclick="history.go(-1)">
		  &nbsp;&nbsp;
		  <input type="submit" name="Submit" value=" 提交订单 ">
        </div></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>