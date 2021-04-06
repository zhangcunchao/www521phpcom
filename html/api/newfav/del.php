<?php
header("Content-Type:text/html;charset=utf-8");
$dir = 'images';
$host = @$_GET['host'];
@unlink($dir.'/'.$host.'.ico');
echo '删除成功';
?>
