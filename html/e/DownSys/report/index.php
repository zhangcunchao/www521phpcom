<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../data/dbcache/class.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
$id=(int)$_GET['id'];
$classid=(int)$_GET['classid'];
if(!$id||!$classid||!$class_r[$classid][tbname])
{
	printerror("ErrorUrl","history.go(-1)");
}
$r=$empire->fetch1("select title,titleurl,groupid,classid,newspath,filename,id from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid' limit 1");
if(empty($r[id]))
{
	printerror("ErrorUrl","history.go(-1)");
}
//分类
$cid=(int)$_GET['cid'];
$titleurl=sys_ReturnBqTitleLink($r);
//导入模板
require(ECMS_PATH.'e/template/DownSys/report.php');
db_close();
$empire=null;
?>