<?php
require("../../class/connect.php");
require("../../class/q_functions.php");
require("../../class/db_sql.php");
require("../../data/dbcache/class.php");
require("../../class/user.php");
require("../../class/ShopSysFun.php");
eCheckCloseMods('shop');//关闭模块
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//验证权限
ShopCheckAddDdGroup();

$r=$_POST;
if(!getcvar('mybuycar'))
{
	printerror('你的购物车没有商品','',1,0,1);
}

if(!$r[truename]||!$r[calla]||!$r[email]||!$r[addressa]||!$r[g_truename]||!$r[g_call]||!$r[g_email]||!$r[g_address])
{
	printerror('订货人及收货人信息没有填写完整','',1,0,1);
}

if(!$r[psid])
{
	printerror('请选择配送方式','',1,0,1);
}
if(!$r[payfsid])
{
	printerror('请选择支付方式','',1,0,1);
}

$ddno=time();//订单ID
//发票抬头
if(empty($r[fp]))
{
	$r[fptt]="";
}
//导入模板
require(ECMS_PATH.'e/template/ShopSys/SubmitOrder.php');
db_close();
$empire=null;
?>