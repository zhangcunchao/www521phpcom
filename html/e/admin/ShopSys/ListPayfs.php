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
CheckLevel($logininid,$loginin,$classid,"shoppayfs");

//增加支付方式
function AddPayfs($add,$userid,$username){
	global $empire,$dbtbpre;
	if(empty($add[payname]))
	{
		printerror("EmptyPayname","history.go(-1)");
    }
	//验证权限
	CheckLevel($userid,$username,$classid,"shoppayfs");
	$add[userpay]=(int)$add[userpay];
	$add[userfen]=(int)$add[userfen];
	$sql=$empire->query("insert into {$dbtbpre}enewsshoppayfs(payname,payurl,paysay,userpay,userfen) values('$add[payname]','$add[payurl]','$add[paysay]',$add[userpay],$add[userfen]);");
	$payid=$empire->lastid();
	if($sql)
	{
		//操作日志
		insert_dolog("payid=".$payid."<br>payname=".$add[payname]);
		printerror("AddPayfsSuccess","AddPayfs.php?enews=AddPayfs");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//修改支付方式
function EditPayfs($add,$userid,$username){
	global $empire,$dbtbpre;
	$add[payid]=(int)$add[payid];
	if(empty($add[payname])||!$add[payid])
	{
		printerror("EmptyPayname","history.go(-1)");
    }
	//验证权限
	CheckLevel($userid,$username,$classid,"shoppayfs");
	$add[userpay]=(int)$add[userpay];
	$add[userfen]=(int)$add[userfen];
	$sql=$empire->query("update {$dbtbpre}enewsshoppayfs set payname='$add[payname]',payurl='$add[payurl]',paysay='$add[paysay]',userpay=$add[userpay],userfen=$add[userfen] where payid='$add[payid]'");
	if($sql)
	{
		//操作日志
		insert_dolog("payid=".$add[payid]."<br>payname=".$add[payname]);
		printerror("EditPayfsSuccess","ListPayfs.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//删除支付方式
function DelPayfs($payid,$userid,$username){
	global $empire,$dbtbpre;
	$payid=(int)$payid;
	if(!$payid)
	{
		printerror("EmptyPayfsid","history.go(-1)");
    }
	//验证权限
	CheckLevel($userid,$username,$classid,"shoppayfs");
	$r=$empire->fetch1("select payname from {$dbtbpre}enewsshoppayfs where payid='$payid'");
	$sql=$empire->query("delete from {$dbtbpre}enewsshoppayfs where payid='$payid'");
	if($sql)
	{
		//操作日志
		insert_dolog("payid=".$payid."<br>payname=".$r[payname]);
		printerror("DelPayfsSuccess","ListPayfs.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="AddPayfs")
{
	AddPayfs($_POST,$logininid,$loginin);
}
elseif($enews=="EditPayfs")
{
	EditPayfs($_POST,$logininid,$loginin);
}
elseif($enews=="DelPayfs")
{
	$payid=$_GET['payid'];
	DelPayfs($payid,$logininid,$loginin);
}
else
{}
$page=(int)$_GET['page'];
$start=0;
$line=16;//每页显示条数
$page_line=18;//每页显示链接数
$offset=$page*$line;//总偏移量
$query="select * from {$dbtbpre}enewsshoppayfs";
$num=$empire->num($query);//取得总条数
$query=$query." order by payid limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>管理支付方式</title>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%" height="25">位置：<a href="ListPayfs.php">管理支付方式</a>&nbsp;&nbsp;&nbsp; 
    </td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit" value="增加支付方式" onclick="self.location.href='AddPayfs.php?enews=AddPayfs'">
      </div></td>
  </tr>
</table>

<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="9%" height="25"> <div align="center">ID</div></td>
    <td width="62%" height="25"> <div align="center">支付方式</div></td>
    <td width="29%" height="25"> <div align="center">操作</div></td>
  </tr>
  <?
  while($r=$empire->fetch($sql))
  {
  ?>
  <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
    <td height="25"> <div align="center"> 
        <?=$r[payid]?>
      </div></td>
    <td height="25"> <div align="center"> 
        <?=$r[payname]?>
      </div></td>
    <td height="25"> <div align="center">[<a href="AddPayfs.php?enews=EditPayfs&payid=<?=$r[payid]?>">修改</a>]&nbsp;[<a href="ListPayfs.php?enews=DelPayfs&payid=<?=$r[payid]?>" onclick="return confirm('确认要删除？');">删除</a>]</div></td>
  </tr>
  <?
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="3">&nbsp;&nbsp;&nbsp; 
      <?=$returnpage?>
    </td>
  </tr>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>
