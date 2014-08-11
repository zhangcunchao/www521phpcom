<?php
$conn=mysql_connect("localhost","phpcom_lovephp","zcc5574302,./")or die("数据库连接失败");
$db=mysql_select_db("phpcom_wwwphp")or die("没有找到库,可能输错了");
mysql_query("set names GBK");
?>