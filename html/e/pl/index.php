<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
require LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
//用户名
$lusername=getcvar('mlusername');
if($lusername)
{
	$lpassword=md5($lusername);
}
$id=(int)$_GET['id'];
$classid=(int)$_GET['classid'];
if(empty($id)||empty($classid))
{
	printerror("ErrorUrl","history.go(-1)",1);
}
if(empty($class_r[$classid][tbname]))
{
	printerror("ErrorUrl","history.go(-1)",1);
}
$n_r=$empire->fetch1("select id,title,newspath,filename,classid,groupid,plnum,infopfen,infopfennum,titleurl from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
if(empty($n_r[id]))
{
	printerror("ErrorUrl","history.go(-1)",1);
}
$search="&classid=$classid&id=".$id;
//使用模板
if($_GET['tempid'])
{
	$tempid=(int)$_GET['tempid'];
	$tempnum=$empire->gettotal("select count(*) as total from ".GetTemptb("enewspltemp")." where tempid='$tempid'");
	$tempid=$tempnum?$tempid:$public_r['defpltempid'];
	$search.='&tempid='.$tempid;
}
else
{
	$tempid=$class_r[$classid]['pltempid']?$class_r[$classid]['pltempid']:$public_r['defpltempid'];
}
if(empty($tempid))
{
	$tempid=1;
}
$page=(int)$_GET['page'];
$start=0;
$page_line=12;//每页显示链接数
$line=$public_r['pl_num'];//每页显示记录数
$offset=$page*$line;//总偏移量
$query="select plid,saytime,sayip,username,zcnum,fdnum,userid,stb from {$dbtbpre}enewspl where id='$id' and classid='$classid' and checked=0";
//需审核
if($class_r[$classid][checkpl])
{
	$totalquery="select count(*) as total from {$dbtbpre}enewspl where id='$id' and classid='$classid' and checked=0";
	$num=$empire->gettotal($totalquery);
}
else
{
	$num=$n_r['plnum'];
}
$query.=" order by plid desc limit $offset,$line";
$sql=$empire->query($query);
$listpage=page1($num,$line,$page_line,$start,$page,$search);
//标题链接
$titleurl=sys_ReturnBqTitleLink($n_r);
$title=stripSlashes($n_r[title]);
$pagetitle=htmlspecialchars($title);
//评分
$infopfennum=$n_r['infopfennum'];
$pinfopfen=$infopfennum?round($n_r['infopfen']/$infopfennum):0;
$url=ReturnClassLink($n_r[classid])."&nbsp;>&nbsp;<a href=".$titleurl.">".$n_r[title]."</a>&nbsp;>&nbsp;".$fun_r[pl];
@require(ECMS_PATH.'e/data/filecache/template/pl'.$tempid.'.php');
db_close();
$empire=null;
?>