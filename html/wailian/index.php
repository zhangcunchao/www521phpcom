<?php
exit;
error_reporting(E_ALL ^ E_NOTICE);        //错误级别设置
include 'include/config.inc.php';                //数据库配置文件
include 'include/inc.php';
include 'include/db.class.php';         //数据库操作函数
include 'include/common.func.php';                           //自定义函数
header("Content-Type:text/html;charset=utf-8");
function __autoLoad($className)
{
    if (substr($className, -6) == 'Action') {  
		if(!is_file('application/www/Action/' . $className . '.class.php')){
			header("location:/".DIRS);
			exit;
		}
		//加载Action
        include 'application/www/Action/' . $className . '.class.php';	
    } elseif (substr($className, -5) == 'Model') {               //加载Model
        include 'application/www/Model/' . $className . '.class.php';
    } elseif ($className == 'Smarty') {       //加载Smarty类文件
        include 'application/Org/libs/Smarty.class.php';
    } else {              //加载Tpl								 
        include 'application/Helpers/' . $className . '.class.php';
    }
    
}
inject_check();
$mod = isset($_GET['m']) ? ucfirst($_GET['m']) : 'Index'; 
$mod .= "Action";
$run = new $mod();

unset($GLOBALS, $_ENV, $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS, $HTTP_SERVER_VARS, $HTTP_ENV_VARS);
