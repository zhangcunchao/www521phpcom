<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../class/user.php");
eCheckCloseMods('pay');//关闭模块
$link=db_connect();
$empire=new mysqlquery();

$money=(float)$_POST['money'];
if($money<=0)
{
	printerror('支付金额不能为0','',1,0,1);
}
$payid=(int)$_POST['payid'];
if(!$payid)
{
	printerror('请选择支付平台','',1,0,1);
}
$payr=$empire->fetch1("select * from {$dbtbpre}enewspayapi where payid='$payid' and isclose=0");
if(!$payr[payid])
{
	printerror('请选择支付平台','',1,0,1);
}
$ddno='';
$phome=$_POST['phome'];
if($phome=='PayToFen')//购买点数
{
	$productname='购买点数';
}
elseif($phome=='PayToMoney')//存预付款
{
	$productname='存预付款';
}
elseif($phome=='ShopPay')//商城支付
{
	$productname='商城支付';
}
else
{
	printerror('您来自的链接不存在','',1,0,1);
}

include('payfun.php');

if($phome=='PayToFen'||$phome=='PayToMoney')
{
	$user=islogin();//是否登陆
	$pr=$empire->fetch1("select paymoneytofen,payminmoney from {$dbtbpre}enewspublic limit 1");
	if($money<$pr['payminmoney'])
	{
		printerror('金额不能小于 '.$pr['payminmoney'].' 元','',1,0,1);
	}
}
elseif($phome=='ShopPay')
{
	$ddid=(int)getcvar('paymoneyddid');
	$ddr=PayApiShopDdMoney($ddid);
	if($money!=$ddr['tmoney'])
	{
		printerror('订单金额有误','',1,0,1);
	}
	$ddno=$ddr[ddno];
	$productname="支付订单:".$ddno;
}

esetcookie("payphome",$phome,0);
//返回地址前缀
$PayReturnUrlQz=$public_r['newsurl'];
if(!stristr($public_r['newsurl'],'://'))
{
	$PayReturnUrlQz=eReturnDomain().$public_r['newsurl'];
}
//编码
if($phome_ecms_charver!='gb2312')
{
	@include_once("../class/doiconv.php");
	$iconv=new Chinese('');
	$char=$phome_ecms_charver=='big5'?'BIG5':'UTF8';
	$targetchar='GB2312';
	$productname=$iconv->Convert($char,$targetchar,$productname);
	@header('Content-Type: text/html; charset=gb2312');
}

$file=$payr['paytype'].'/to_pay.php';
@include($file);
db_close();
$empire=null;
?>