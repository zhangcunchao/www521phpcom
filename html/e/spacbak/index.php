<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
require LoadLang("pub/fun.php");
require("../class/user.php");
require("../data/dbcache/MemberLevel.php");
$link=db_connect();
$empire=new mysqlquery();
require('CheckUser.php');//验证用户
require('template/'.$spacestyle.'/index.temp.php');
db_close();
$empire=null;
?>