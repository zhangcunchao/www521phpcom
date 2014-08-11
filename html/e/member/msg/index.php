<?php
require("../../class/connect.php");
require("../../class/q_functions.php");
require("../../class/db_sql.php");
require("../../class/user.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
$user=islogin();
$start=0;
$page=(int)$_GET['page'];
$out=$_GET['out'];
if($out)
{
	$add=" and outbox=1";
	$word="<a href=../msg/?out=1>发件箱</a>";
	$titleurl="AddMsg/?";
}
else
{
	$add=" and outbox=0";
	$word="<a href=../msg/>收件箱</a>";
	$titleurl="ViewMsg/?";
}
$search="&out=$out";
$line=20;//每行显示
$page_line=16;
$offset=$page*$line;
$totalquery="select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]'".$add;
$query="select mid,title,haveread,from_userid,from_username,msgtime,issys from {$dbtbpre}enewsqmsg where to_username='$user[username]'".$add;
$num=$empire->gettotal($totalquery);
$query.=" order by mid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page1($num,$line,$page_line,$start,$page,$search);
//导入模板
require(ECMS_PATH.'e/template/member/msg.php');
db_close();
$empire=null;
?>