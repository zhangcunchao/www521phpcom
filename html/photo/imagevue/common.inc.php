<?php
if (!defined('IV_PATH')) {
	exit(0);
}

define('START_TIME', microtime());
define('DS', '/');

// php 5.0 stuff
if (!defined('E_STRICT')) {
	define('E_STRICT', 2048);
}
// php 5.2 stuff
if (!defined('E_RECOVERABLE_ERROR')) {
	define('E_RECOVERABLE_ERROR', 4096);
}
// php 5.3 stuff
if (!defined('E_DEPRECATED')) {
	define('E_DEPRECATED', 8192);
}
if (!defined('E_USER_DEPRECATED')) {
	define('E_USER_DEPRECATED', 16384);
}

set_magic_quotes_runtime(0);
error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

define('BASE_DIR',						dirname(__FILE__) . DS);
define('INCLUDE_DIR',					BASE_DIR . 'include' . DS);
define('THEMES_DIR', 					BASE_DIR . 'themes' . DS);
define('DEFAULT_THEME_CONFIG_FILE', 	BASE_DIR . 'include' . DS . 'theme.xml');
define('CONTROLLERS_DIR',				BASE_DIR . 'controllers' . DS);
define('CONFIG_FILE', 					BASE_DIR . 'config' . DS . 'configUser.xml');
define('DEFAULT_CONFIG_FILE', 			BASE_DIR . 'include' . DS . 'config.xml');
define('LANGS_DIR', 					BASE_DIR . 'language' . DS);
define('DEFAULT_LANG_FILE', 			BASE_DIR . 'include' . DS . 'lang.xml');
define('TEMPLATES_DIR', 				BASE_DIR . 'templates' . DS);
define('USERS_FILE', 					BASE_DIR . 'config' . DS . 'users.php');
define('USER_DIR',	 					BASE_DIR . 'config' . DS);

require_once(INCLUDE_DIR . 'functions.inc.php');
require_once(INCLUDE_DIR . 'ivAcl.class.php');
require_once(INCLUDE_DIR . 'ivAuth.class.php');
require_once(INCLUDE_DIR . 'ivCache.class.php');
require_once(INCLUDE_DIR . 'ivComparator.class.php');
require_once(INCLUDE_DIR . 'ivComparatorFileProperty.class.php');
require_once(INCLUDE_DIR . 'ivComponent.class.php');
require_once(INCLUDE_DIR . 'ivControllerAbstract.class.php');
require_once(INCLUDE_DIR . 'ivController.class.php');
require_once(INCLUDE_DIR . 'ivControllerDispatcher.class.php');
require_once(INCLUDE_DIR . 'ivControllerFront.class.php');
require_once(INCLUDE_DIR . 'ivCrumbs.class.php');
require_once(INCLUDE_DIR . 'ivExifParser.class.php');
require_once(INCLUDE_DIR . 'ivFSItem.class.php');
require_once(INCLUDE_DIR . 'ivFile.class.php');
require_once(INCLUDE_DIR . 'ivFileImage.class.php');
require_once(INCLUDE_DIR . 'ivFileMP3.class.php');
require_once(INCLUDE_DIR . 'ivFilepath.class.php');
require_once(INCLUDE_DIR . 'ivFolder.class.php');
require_once(INCLUDE_DIR . 'ivImage.class.php');
require_once(INCLUDE_DIR . 'ivView.class.php');
require_once(INCLUDE_DIR . 'ivLayout.class.php');
require_once(INCLUDE_DIR . 'ivMail.class.php');
require_once(INCLUDE_DIR . 'ivMessenger.class.php');
require_once(INCLUDE_DIR . 'ivPath.class.php');
require_once(INCLUDE_DIR . 'ivPhpdocParser.class.php');
require_once(INCLUDE_DIR . 'ivPlaceholder.class.php');
require_once(INCLUDE_DIR . 'ivPool.class.php');
require_once(INCLUDE_DIR . 'ivStack.class.php');
require_once(INCLUDE_DIR . 'ivTheme.class.php');
require_once(INCLUDE_DIR . 'ivUserManager.class.php');
require_once(INCLUDE_DIR . 'ivXml.class.php');
require_once(INCLUDE_DIR . 'ivXmlNode.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeArray.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeBoolean.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeColor.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeDir.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeEnum.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeInteger.class.php');
require_once(INCLUDE_DIR . 'ivXmlNodeString.class.php');
require_once(INCLUDE_DIR . 'ivXmlParser.class.php');
require_once(INCLUDE_DIR . 'getid3/getid3.php');

define('ROOT_DIR', ivPath::canonizeAbsolute(dirname(dirname(__FILE__))));

set_error_handler('errorHandler');

// FIXME Cache errors
if (isset($_SESSION['cacheErrors'])) {
	unset($_SESSION['cacheErrors']);
}

// Seek for troubles with some php extensions
// iconv
define('ICONV_INSTALLED', function_exists('iconv'));

// gd
define('GD_INSTALLED', extension_loaded('gd'));

// exif
define('EXIF_INSTALLED', function_exists('exif_read_data'));

// xml
define('XML_INSTALLED', extension_loaded('xml'));

// mbstring
define('MBSTRING_INSTALLED', extension_loaded('mbstring'));

// safe_mode
define('SAFE_MODE_ENABLED', (bool) ini_get('safe_mode'));

// open_basedir
define('OPEN_BASEDIR_ENABLED', (bool) ini_get('open_basedir'));

// suhosin
$suhosinInstalled = function_exists('get_loaded_extensions') ? in_array('suhosin', get_loaded_extensions()) : false;
if (function_exists('phpinfo') && !$suhosinInstalled) {
	ob_start();
	phpinfo(INFO_MODULES);
	$modules = ob_get_contents();
	ob_end_clean();
	if (false !== stristr($modules, 'suhosin')) {
		$suhosinInstalled = true;
	}
}
define('SUHOSIN_INSTALLED', $suhosinInstalled);

ivPool::set('placeholder', new ivPlaceholder());
ivPool::set('userManager', new ivUserManager());
ivPool::set('breadCrumbs', new ivCrumbs());

if (!headers_sent()) {
	header('Cache-Control: no-store, no-cache, must-revalidate'); 
	header('Expires: ' . date('r'));
}
?>
