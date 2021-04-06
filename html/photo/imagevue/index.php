<?php
define('IV_PATH', 'admin/');

if (!session_id()) {
	if (isset($_POST[session_name()])) {
		session_id($_POST[session_name()]);
	}
	session_start();
}

include_once('common.inc.php');
include_once('admin/config.inc.php');
require_once('include/ivControllerFront.class.php');

ivAuth::basicAuthentication();
ivAuth::authenticateByCookie();

$frontController = new ivControllerFront();
ivPool::set('frontController', $frontController);
$frontController->dispatch(dirname(__FILE__) . '/admin/');
?>