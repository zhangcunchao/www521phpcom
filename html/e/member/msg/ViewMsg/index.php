<?php
require("../../../class/connect.php");
require("../../../class/q_functions.php");
require("../../../class/db_sql.php");
require("../../../class/user.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=2;
$user=islogin();
$mid=(int)$_GET['mid'];
$out=$_GET['out'];
if(empty($mid))
{
	printerror("HaveNotMsg","",1);
}
$r=$empire->fetch1("select mid,title,msgtext,from_userid,from_username,msgtime,haveread,issys from {$dbtbpre}enewsqmsg where mid=$mid and to_username='$user[username]' limit 1");
if(empty($r[mid]))
{
	printerror("HaveNotMsg","",1);
}
if($r['issys'])
{
	$r[from_username]="<b>系统信息</b>";
}
if(!$r['haveread'])
{
	$usql=$empire->query("update {$user_tablename} set ".$user_havemsg."=0 where ".$user_userid."='$user[userid]'");
	$usql=$empire->query("update {$dbtbpre}enewsqmsg set haveread=1 where mid=$mid");
}
//导入模板
require(ECMS_PATH.'e/template/member/ViewMsg.php');
db_close();
$empire=null;
?>