<?php
define('WP_USE_THEMES', true);
/** Loads the WordPress Environment and Template */
/*if(strpos($_SERVER['HTTP_USER_AGENT'],'Mobile Safari')){
	if(!strpos($_SERVER['HTTP_USER_AGENT'],'QQ')&&!strpos($_SERVER['HTTP_USER_AGENT'],'UC')){
		header("location:http://app.521php.com".$_SERVER['REQUEST_URI']."/#m/http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/");
		exit;
	}else{
		require('./wp-blog-header.php');
	}
}*/
//if('/'==$_SERVER['REQUEST_URI']){
//	include 'wailian/add.php';
//}
require('./wp-blog-header.php');
?>
