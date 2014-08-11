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
function ShowPs(){
	global $empire,$dbtbpre;
	$sql=$empire->query("select pid,pname,price,psay from {$dbtbpre}enewsshopps order by pid");
	$str='';
	while($r=$empire->fetch($sql))
	{
		$str.="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
  <tr> 
    <td width='69%' height=23> 
      <input type=radio name=psid value=".$r[pid]."><strong>".$r[pname]."</strong>
    </td>
    <td width='31%'><strong>费用:￥".$r[price]."</strong></td>
  </tr>
  <tr> 
    <td colspan=2><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[psay]."</td></tr></table></td>
  </tr>
</table>";
	}
	return $str;
}

//显示支付方式
function ShowPayfs($pr,$user){
	global $empire,$user_tablename,$user_money,$user_userid,$user_userfen,$user_rnd,$dbtbpre;
	$str='';
	$sql=$empire->query("select payid,payname,payurl,paysay,userpay,userfen from {$dbtbpre}enewsshoppayfs order by payid");
	while($r=$empire->fetch($sql))
	{
		$dis="";
		$words="";
		//扣点数
		if($r[userfen])
		{
			if($pr[0])
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(您选择的商品至少有一个不支持点数购买)</font>";
			}
			else
			{
				if(getcvar('mluserid'))
				{
					if($user[userfen]<$pr[1])
					{
						$dis=" disabled";
						$words="&nbsp;<font color='#666666'>(您的帐号点数不足,不能使用此支付方式)</font>";
					}
				}
				else
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(您未登录,不能使用此支付方式)</font>";
				}
			}
		}
		//余额扣除
		elseif($r[userpay])
		{
			if(getcvar('mluserid'))
			{
				if($user[money]<$pr[2])
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(您的帐号余额不足,不能使用此支付方式)</font>";
				}
			}
			else
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(您未登录,不能使用此支付方式)</font>";
			}
		}
		//网上支付
		elseif($r[payurl])
		{
			$words="";
		}
		else
		{}
		$str.="<tr><td><b><input type=radio name=payfsid value='".$r[payid]."'".$dis.">".$r[payname]."</b>".$words."</td></tr><tr><td><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[paysay]."</td></tr></table></td></tr>";
	}
	if($str)
	{
		$str="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>".$str."</table>";
	}
	return $str;
}
?>
<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8>
<title>填写订单</title>
<link href=../../data/images/qcss.css rel=stylesheet type=text/css>
<script>
function copyinfo(obj)
{
obj.g_truename.value=obj.truename.value;
obj.g_oicq.value=obj.oicq.value;
obj.g_msn.value=obj.msn.value;
obj.g_call.value=obj.calla.value;
obj.g_phone.value=obj.phonea.value;
obj.g_email.value=obj.email.value;
obj.g_address.value=obj.addressa.value;
obj.g_zip.value=obj.zip.value;
}
</script>
</head>

<body>
<form action="../SubmitOrder/index.php" method="post" name="myorder" id="myorder">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择的商品</strong>　[<a href="../buycar/">修改购物车</a>]</td>
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
            <td width="20%" height="25">真实姓名:</td>
            <td width="80%"><input name="truename" type="text" id="truename" value="<?=$r[truename]?>" size="30">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">联系电话:</td>
            <td><input name="calla" type="text" id="oicq3" value="<?=$r[call]?>" size="30">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">移动电话:</td>
            <td><input name="phonea" type="text" id="call" value="<?=$r[phone]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">联系邮箱:</td>
            <td><input name="email" type="text" id="email" value="<?=$email?>" size="30">
              (必填)</td>
          </tr>
		  <tr> 
            <td height="25">OICQ:</td>
            <td><input name="oicq" type="text" id="oicq" value="<?=$r[oicq]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">MSN:</td>
            <td><input name="msn" type="text" id="msn" value="<?=$r[msn]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">联系地址:</td>
            <td><input name="addressa" type="text" id="call3" value="<?=$r[address]?>" size="65">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">邮编:</td>
            <td><input name="zip" type="text" id="zip" value="<?=$r[zip]?>" size="30">
            </td>
          </tr>
          <tr> 
            <td height="25">备注:</td>
            <td><textarea name="bz" cols="65" rows="6" id="bz"></textarea></td>
          </tr>
        </table></td>
    </tr>
	<?php
	$showps=ShowPs();
	if($showps)
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择配送方式</strong></td>
    </tr>
    <tr> 
      <td> 
        <?=$showps?>
      </td>
    </tr>
	<?php
	}
	$showpayfs=ShowPayfs($pr,$user);
	if($showpayfs)
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>选择支付方式</strong></td>
    </tr>
    <tr> 
      <td> 
        <?=$showpayfs?>
      </td>
    </tr>
	<?php
	}
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>收货人信息</strong>[<a href="javascript:copyinfo(document.myorder);">复制收货人的信息</a>]</td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td width="20%" height="25">真实姓名:</td>
            <td width="80%"><input name="g_truename" type="text" id="truename3" size="30">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">联系电话:</td>
            <td><input name="g_call" type="text" id="call4" size="30">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">移动电话:</td>
            <td><input name="g_phone" type="text" id="phone" size="30"></td>
          </tr>
          <tr> 
            <td height="25">联系邮箱:</td>
            <td><input name="g_email" type="text" id="email3" size="30">
              (必填)</td>
          </tr>
		  <tr> 
            <td height="25">OICQ:</td>
            <td><input name="g_oicq" type="text" id="oicq4" size="30"></td>
          </tr>
          <tr> 
            <td height="25">MSN:</td>
            <td><input name="g_msn" type="text" id="g_msn" size="30"></td>
          </tr>
          <tr> 
            <td height="25">联系地址:</td>
            <td><input name="g_address" type="text" id="address" size="65">
              (必填)</td>
          </tr>
          <tr> 
            <td height="25">邮编:</td>
            <td><input name="g_zip" type="text" id="g_zip" size="30">
            </td>
          </tr>
        </table></td>
    </tr>
	<?
	//提供发票
	if($public_r[havefp])
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF">是否需要发票:
        <input name="fp" type="checkbox" id="fp" value="1">
        是(需增加 
        <?=$public_r[fpnum]?>
        %的费用),发票抬头:
        <input name="fptt" type="text" id="fptt" size="38"></td>
    </tr>
	<?
	}
	?>
    <tr> 
      <td height="25">
<div align="center"> 
          <input type="button" name="Submit3" value=" 上一步 " onclick="history.go(-1)">
          &nbsp;&nbsp; &nbsp;&nbsp; 
          <input type="submit" name="Submit" value=" 下一步 ">
          <input name="alltotal" type="hidden" id="alltotal" value="<?=$pr[2]?>">
          <input name="alltotalfen" type="hidden" id="alltotalfen" value="<?=$pr[1]?>">
        </div></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>