<?php
/** WordPress 目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置 WordPress 变量和包含文件。 */
require_once(ABSPATH . 'wp-config.php');
$id = @$_GET['id'];
$id = intval($id);
	if($id){
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(empty($con)){
		exit('a');
	}
	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary",$con);
	$conn = mysql_select_db(DB_NAME,$con);
	if(empty($conn)){
		exit('b');
	}
	$add = $_GET['add'];
	if($add){
		$sql = "update `{$table_prefix}postmeta` set `meta_value`=`meta_value`+1 where `post_id`=$id and `meta_key` = 'post_views_count'";
		$query = mysql_query($sql);
	}
	$sql = "select `meta_value` from `{$table_prefix}postmeta` where `post_id`=$id and `meta_key` = 'post_views_count'";
	$query = mysql_query($sql);
	$rs = mysql_fetch_array($query);
	$count = $rs['meta_value'];
	echo 'document.write('.$count.')';
}