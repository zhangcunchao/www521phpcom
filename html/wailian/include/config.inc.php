<?php

//数据库 配置
define('DB_HOST', 'localhost');
define('DB_USER', 'v186_www');
define('DB_PWD', 'zcc5574302');
define('DB_NAME', 'v186_www');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8');
define('TIMEZONE', 'PRC');
define('URLROLE', 1);
define('DIRS', 'wailian/');
session_cache_limiter('private, must-revalidate');
if(1==URLROLE){
	$nav=$_SERVER["REQUEST_URI"];
	$script_name=$_SERVER["SCRIPT_NAME"];
	$nav1=ereg_replace(DIRS,"",substr(ereg_replace("$script_name","",$nav),1));
	$u = strstr($nav1,'http://');
	if($u){
		$nav1 = str_ireplace($u,'',$nav1);
	}
	$vars = @explode("/",$nav1);
	$_GET['m'] = $vars[0]?$vars[0]:'index';
	unset($vars[0]);
	$_url = array_chunk($vars,2);
	if($_url){
		foreach($_url as $key=>$val){
			@$_GET[$val[0]] = $val[1];
		}
	}
	if($u){
		$_GET['url'] = $u;
	}
}
$g_url =  "http://".$_SERVER['HTTP_HOST'].'/';