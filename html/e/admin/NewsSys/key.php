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
CheckLevel($logininid,$loginin,$classid,"key");

//增加关键字
function AddKey($keyname,$keyurl,$userid,$username){
	global $empire,$dbtbpre;
	if(!$keyname||!$keyurl)
	{printerror("EmptyKeyname","history.go(-1)");}
	//验证权限
	CheckLevel($userid,$username,$classid,"key");
	$sql=$empire->query("insert into {$dbtbpre}enewskey(keyname,keyurl) values('".addslashes($keyname)."','".addslashes($keyurl)."');");
	$keyid=$empire->lastid();
	GetConfig();//更新缓存
	if($sql)
	{
		//操作日志
		insert_dolog("keyid=".$keyid."<br>keyname=".$keyname);
		printerror("AddKeySuccess","key.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//修改关键字
function EditKey($keyid,$keyname,$keyurl,$userid,$username){
	global $empire,$dbtbpre;
	if(!$keyname||!$keyurl||!$keyid)
	{printerror("EmptyKeyname","history.go(-1)");}
	//验证权限
	CheckLevel($userid,$username,$classid,"key");
	$keyid=(int)$keyid;
	$sql=$empire->query("update {$dbtbpre}enewskey set keyname='".addslashes($keyname)."',keyurl='".addslashes($keyurl)."' where keyid='$keyid'");
	GetConfig();//更新缓存
	if($sql)
	{
		//操作日志
		insert_dolog("keyid=".$keyid."<br>keyname=".$keyname);
		printerror("EditKeySuccess","key.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//删除关键字
function DelKey($keyid,$userid,$username){
	global $empire,$dbtbpre;
	$keyid=(int)$keyid;
	if(!$keyid)
	{printerror("NotDelKeyid","history.go(-1)");}
	//验证权限
	CheckLevel($userid,$username,$classid,"key");
	$r=$empire->fetch1("select keyname from {$dbtbpre}enewskey where keyid='$keyid'");
	$sql=$empire->query("delete from {$dbtbpre}enewskey where keyid='$keyid'");
	GetConfig();//更新缓存
	if($sql)
	{
		//操作日志
		insert_dolog("keyid=".$keyid."<br>keyname=".$r[keyname]);
		printerror("DelKeySuccess","key.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
//增加关键字
if($enews=="AddKey")
{
	$keyname=$_POST['keyname'];
	$keyurl=$_POST['keyurl'];
	AddKey($keyname,$keyurl,$logininid,$loginin);
}
//修改关键字
elseif($enews=="EditKey")
{
	$keyid=$_POST['keyid'];
	$keyname=$_POST['keyname'];
	$keyurl=$_POST['keyurl'];
	EditKey($keyid,$keyname,$keyurl,$logininid,$loginin);
}
//删除关键字
elseif($enews=="DelKey")
{
	$keyid=$_GET['keyid'];
	DelKey($keyid,$logininid,$loginin);
}
else
{}

$page=(int)$_GET['page'];
$start=0;
$line=30;//每页显示条数
$page_line=12;//每页显示链接数
$offset=$page*$line;//总偏移量
$search='';
$totalquery="select count(*) as total from {$dbtbpre}enewskey";
$num=$empire->gettotal($totalquery);
$query="select keyid,keyname,keyurl from {$dbtbpre}enewskey order by keyid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>关键字</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>位置：<a href="key.php">管理内容关键字</a></td>
  </tr>
</table>
<form name="form1" method="post" action="key.php">
  <input type=hidden name=enews value=AddKey>
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header">
      <td height="25">增加关键字:</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> 关键字: 
        <input name="keyname" type="text" id="keyname">
        链接地址:
        <input name="keyurl" type="text" id="keyurl" value="http://" size="50"> 
        <input type="submit" name="Submit" value="增加">
        <input type="reset" name="Submit2" value="重置"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="70%" height="25">关键字</td>
    <td width="30%" height="25"><div align="center">操作</div></td>
  </tr>
  <?
  while($r=$empire->fetch($sql))
  {
  ?>
  <form name=form2 method=post action=key.php>
    <input type=hidden name=enews value=EditKey>
    <input type=hidden name=keyid value=<?=$r[keyid]?>>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td height="25">关键字: 
        <input name="keyname" type="text" id="keyname" value="<?=$r[keyname]?>">
        链接地址: 
        <input name="keyurl" type="text" id="keyurl" value="<?=$r[keyurl]?>" size="30"> 
      </td>
      <td height="25"><div align="center"> 
          <input type="submit" name="Submit3" value="修改">
          &nbsp; 
          <input type="button" name="Submit4" value="删除" onclick="if(confirm('确认要删除?')){self.location.href='key.php?enews=DelKey&keyid=<?=$r[keyid]?>';}">
        </div></td>
    </tr>
  </form>
  <?
  }
  db_close();
  $empire=null;
  ?>
  <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="2">
	  <?=$returnpage?>
	  </td>
    </tr>
</table>
</body>
</html>
