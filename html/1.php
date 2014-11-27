<?php
echo isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])?$_SERVER['HTTP_X_CLUSTER_CLIENT_IP']:$_SERVER['REMOTE_ADDR'];
echo '<br />';
echo $_SERVER['HTTP_USER_AGENT'].'<br />';
echo $_SERVER['REQUEST_URI'];
?>
