<?php
define('EmpireCMSAdmin','1');
error_reporting(E_ALL ^ E_NOTICE);
$picurl=htmlspecialchars($_GET['picurl']);
$pic_width=htmlspecialchars($_GET['pic_width']);
$pic_height=htmlspecialchars($_GET['pic_height']);
$url=htmlspecialchars($_GET['url']);
?>
<title>广告预览</title>
<a href="<?=$url?>" target=_blank><img src="<?=$picurl?>" border=0 width=<?=$pic_width?> height=<?=$pic_height?>></a>
