<?php
require('../../class/connect.php');
require('../../class/db_sql.php');
require('../../class/functions.php');
require('../../class/t_functions.php');
require '../'.LoadLang('pub/fun.php');
require('../../data/dbcache/class.php');
require('../../data/dbcache/MemberLevel.php');
$link=db_connect();
$empire=new mysqlquery();
$classid=(int)$_GET['classid'];
$id=(int)$_GET['id'];
$addgethtmlpath='../';
$titleurl=DoGetHtml($classid,$id);
db_close();
$empire=null;
Header("Location:$titleurl");
?>