<?php
define('IV_PATH', 'imagevue/');

if (!session_id()) {
	session_start();
}

include_once(IV_PATH . 'common.inc.php');
include_once(IV_PATH . 'config.inc.php');
require_once(IV_PATH . 'include/ivControllerFront.class.php');

ivAuth::authenticateByCookie();
if(1 == count($_GET) && '' == reset($_GET)) {
	$_GET['p'] = 'html';
	$_GET['path'] = urldecode($_SERVER['QUERY_STRING']);
	$_REQUEST['path'] = urldecode($_SERVER['QUERY_STRING']);
}

$frontController = new ivControllerFront();
ivPool::set('frontController', $frontController);

$frontController->dispatch(dirname(__FILE__) . DIRECTORY_SEPARATOR . IV_PATH);
?>
