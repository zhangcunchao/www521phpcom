<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//验证用户
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//验证权限
CheckLevel($logininid,$loginin,$classid,"shopdd");

//订单设定
function SetShopDd($ddid,$doing,$userid,$username){
	global $empire,$dbtbpre;
	//验证权限
	CheckLevel($userid,$username,$classid,"shopdd");
	$count=count($ddid);
	if(empty($count))
	{
		printerror("NotSetDdid","history.go(-1)");
	}
	$add='';
	for($i=0;$i<$count;$i++)
	{
		$add.="ddid='".intval($ddid[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	//已付费
	if($doing==1)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set haveprice=1 where ".$add);
		$mess="SetHavepriceSuccess";
    }
	//已发货
	elseif($doing==2)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set outproduct=1 where ".$add);
		$mess="SetOutProductSuccess";
    }
	//确认
	elseif($doing==3)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set checked=1 where ".$add);
		$mess="SetCheckedSuccess";
    }
	//取消
	elseif($doing==4)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set checked=0 where ".$add);
		$mess="SetNoCheckedSuccess";
    }
	//删除
	elseif($doing==5)
	{
		$sql=$empire->query("delete from {$dbtbpre}enewsshopdd where ".$add);
		$mess="DelDdSuccess";
    }
	else
	{}
	if($sql)
	{
		//操作日志
		insert_dolog("doing=".$doing);
		printerror($mess,"ListDd.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="SetShopDd")
{
	$ddid=$_POST['ddid'];
	$doing=$_POST['doing'];
	SetShopDd($ddid,$doing,$logininid,$loginin);
}
else
{}
$page=(int)$_GET['page'];
$start=0;
$line=25;//每页显示条数
$page_line=18;//每页显示链接数
$offset=$page*$line;//总偏移量
$totalquery="select count(*) as total from {$dbtbpre}enewsshopdd";
$query="select ddid,ddno,ddtime,userid,username,outproduct,haveprice,checked,truename,psid,psname,pstotal,alltotal,payfsid,payfsname,payby,alltotalfen,fp,fptotal from {$dbtbpre}enewsshopdd";
$add="";
//搜索
$sear=$_GET['sear'];
if($sear)
{
	$keyboard=$_GET['keyboard'];
	$keyboard=RepPostVar2($keyboard);
	if($keyboard)
	{
		$show=$_GET['show'];
		if($show==1)//搜索订单号
		{
			$add=" and (ddno like '%$keyboard%')";
		}
		elseif($show==2)//用户名
		{
			$add=" and (username like '%$keyboard%')";
		}
		elseif($show==3)
		{
			$add=" and (truename like '%$keyboard%')";
		}
		elseif($show==4)
		{
			$add=" and (g_truename like '%$keyboard%')";
		}
		else//不限
		{
			$add=" and (ddno like '%$keyboard%' or username like '%$keyboard%' or truename like '%$keyboard%' or g_truename like '%$keyboard%')";
		}
	}
	//状态
	$checked=$_GET['checked'];
	if($checked==1)//确认
	{
		$add.=" and checked=1";
	}
	elseif($checked==2)//未确认
	{
		$add.=" and checked=0";
	}
	else
	{}
	//是否付款
	$haveprice=$_GET['haveprice'];
	if($haveprice==1)//已付款
	{
		$add.=" and haveprice=1";
	}
	elseif($haveprice==2)
	{
		$add.=" and haveprice=0";
	}
	else
	{}
	//是否发货
	$outproduct=$_GET['outproduct'];
	if($outproduct==1)//已发货
	{
		$add.=" and outproduct=1";
	}
	elseif($outproduct==2)
	{
		$add.=" and outproduct=0";
	}
	else
	{}
	//时间
	$starttime=RepPostVar($_GET['starttime']);
	$endtime=RepPostVar($_GET['endtime']);
	if($endtime!="")
	{
		$ostarttime=$starttime." 00:00:00";
		$oendtime=$endtime." 23:59:59";
		$add.=" and ddtime>='$ostarttime' and ddtime<='$oendtime'";
	}
	if($add)
	{
		$add=" where ddid<>0".$add;
	}
	$search="&sear=1&keyboard=$keyboard&show=$show&checked=$checked&outproduct=$outproduct&haveprice=$haveprice&starttime=$starttime&endtime=$endtime";
}
$totalquery.=$add;
$query.=$add;
$num=$empire->gettotal($totalquery);//取得总条数
$query=$query." order by ddid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>管理订单</title>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
<script src="../ecmseditor/fieldfile/setday.js"></script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td height="25">位置：<a href="ListDd.php">管理订单</a></td>
  </tr>
</table>

  
<form name="form1" method="get" action="ListDd.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td>搜索: <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>"> 
        <select name="show" id="show">
          <option value="0">不限范围</option>
          <option value="1">订单号</option>
          <option value="2">用户名</option>
		  <option value="3">订货人姓名</option>
		  <option value="4">收货人姓名</option>
        </select> 
        <select name="checked" id="checked">
          <option value="0">订单状态</option>
          <option value="1">已确认</option>
          <option value="2">未确认</option>
        </select> 
        <select name="outproduct" id="outproduct">
          <option value="0">是否发货</option>
          <option value="1">已发货</option>
          <option value="2">未发货</option>
        </select>
        <select name="haveprice" id="haveprice">
          <option value="0">是否付费</option>
          <option value="1">已付款</option>
          <option value="2">未付款</option>
        </select> </td>
    </tr>
    <tr>
      <td>时间:从 
        <input name="starttime" type="text" id="starttime2" value="<?=$starttime?>" size="12" onclick="setday(this)">
        到 
        <input name="endtime" type="text" id="endtime2" value="<?=$endtime?>" size="12" onclick="setday(this)">
        止的订单 
        <input type="submit" name="Submit6" value="搜索"> <input name="sear" type="hidden" id="sear2" value="1"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class=tableborder>
  <form name="listdd" method="post" action="ListDd.php" onsubmit="return confirm('确认要操作?');">
    <input type=hidden name=enews value=SetShopDd>
    <input type=hidden name=doing value=0>
    <tr class=header> 
      <td width="5%" height="23"> <div align="center">选择</div></td>
      <td width="19%"><div align="center">编号(点击查看)</div></td>
      <td width="21%"><div align="center">订购时间</div></td>
      <td width="13%"><div align="center">订购者</div></td>
      <td width="11%"><div align="center">总金额</div></td>
      <td width="12%"><div align="center">付费方式</div></td>
      <td width="19%"><div align="center">状态</div></td>
    </tr>
    <?
	while($r=$empire->fetch($sql))
	{
		if(empty($r[userid]))//非会员
		{
			$username="<font color=cccccc>".$r[truename]."</font>";
		}
		else
		{
			$username="<a href='../member/AddMember.php?enews=EditMember&userid=".$r[userid]."' target=_blank>".$r[username]."</a>";
		}
		//点数购买
		$total=0;
		if($r[payby]==1)
		{
			$total=$r[alltotalfen]+$r[pstotal];
			$mytotal="<a href='#ecms' title='商品额(".$r[alltotalfen].")+运费(".$r[pstotal].")'>".$total." 点</a>";
		}
		else
		{
			//发票
			$fpa="";
			if($r[fp])
			{
				$fpa="+发票费(".$r[fptotal].")";
			}
			$total=$r[alltotal]+$r[pstotal]+$r[fptotal];
			$mytotal="<a href='#ecms' title='商品额(".$r[alltotal].")+运费(".$r[pstotal].")".$fpa."'>".$total." 元</a>";
		}
		//支付方式
		if($r[payby]==1)
		{
			$payfsname=$r[payfsname]."<br>(点数购买)";
		}
		elseif($r[payby]==2)
		{
			$payfsname=$r[payfsname]."<br>(余额购买)";
		}
		else
		{
			$payfsname=$r[payfsname];
		}
		//状态
		if($r[checked])
		{
			$ch="已确认";
		}
		else
		{
			$ch="<font color=red>未确认</font>";
		}
		if($r[outproduct])
		{
			$ou="已发货";
		}
		else
		{
			$ou="<font color=red>未发货</font>";
		}
		if($r[haveprice])
		{
			$ha="已付款";
		}
		else
		{
			$ha="<font color=red>未付款</font>";
		}
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td height="25"> <div align="center"> 
          <input name="ddid[]" type="checkbox" id="ddid[]" value="<?=$r[ddid]?>">
        </div></td>
      <td> <div align="center"><a href="#ecms" onclick="window.open('ShowDd.php?ddid=<?=$r[ddid]?>','','width=700,height=600,scrollbars=yes,resizable=yes');">
          <?=$r[ddno]?>
          </a></div></td>
      <td> <div align="center">
          <?=$r[ddtime]?>
        </div></td>
      <td> <div align="center">
          <?=$username?>
        </div></td>
      <td> <div align="center">
          <?=$mytotal?>
        </div></td>
      <td><div align="center">
          <?=$payfsname?>
        </div></td>
      <td> <div align="center"><strong><?=$ha?></strong>/<strong><?=$ou?></strong>/<strong><?=$ch?></strong></div></td>
    </tr>
    <?
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"> 
          <input type=checkbox name=chkall value=on onClick='CheckAll(this.form)'>
        </div></td>
      <td colspan="6"><input type="submit" name="Submit" value="已到帐" onClick="document.listdd.doing.value='1';"> 
        &nbsp; <input type="submit" name="Submit2" value="已发货" onClick="document.listdd.doing.value='2';"> 
        &nbsp; <input type="submit" name="Submit3" value="确认" onClick="document.listdd.doing.value='3';"> 
        &nbsp; <input type="submit" name="Submit4" value="取消" onClick="document.listdd.doing.value='4';"> 
        &nbsp; <input type="submit" name="Submit5" value="删除" onClick="document.listdd.doing.value='5';"> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"></div></td>
      <td colspan="6"> <div align="left">&nbsp;
          <?=$returnpage?>
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td colspan="6"><font color="#666666">订购者为灰色,则为非会员购买</font></td>
    </tr>
  </form>
</table>

</body>
</html>
<?
db_close();
$empire=null;
?>
