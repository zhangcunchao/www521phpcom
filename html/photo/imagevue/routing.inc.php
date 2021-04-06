<?php
if (!defined('IV_PATH')) {
	exit(0);
}

// Xml routes
$routingRules[] = array(
	'match' => array('a' => 'index'),
	'routeTo' => array('controller' => 'xml', 'action' => 'index')
);

$routingRules[] = array(
	'match' => array('a' => 'download'),
	'routeTo' => array('controller' => 'xml', 'action' => 'download')
);

$routingRules[] = array(
	'match' => array('a' => 'fileinfo'),
	'routeTo' => array('controller' => 'xml', 'action' => 'fileinfo')
);

$routingRules[] = array(
	'match' => array('a' => 'rndimg'),
	'routeTo' => array('controller' => 'xml', 'action' => 'rndimg')
);

$routingRules[] = array(
	'match' => array('a' => 'thumb'),
	'routeTo' => array('controller' => 'xml', 'action' => 'thumb')
);

$routingRules[] = array(
	'match' => array('a' => 'config'),
	'routeTo' => array('controller' => 'xml', 'action' => 'config')
);

$routingRules[] = array(
	'match' => array('a' => 'lang'),
	'routeTo' => array('controller' => 'xml', 'action' => 'lang')
);

$routingRules[] = array(
	'match' => array('a' => 'files'),
	'routeTo' => array('controller' => 'xml', 'action' => 'files')
);

$routingRules[] = array(
	'match' => array('a' => 'folders'),
	'routeTo' => array('controller' => 'xml', 'action' => 'folders')
);

$routingRules[] = array(
	'match' => array('a' => 'contact'),
	'routeTo' => array('controller' => 'xml', 'action' => 'contact')
);

$routingRules[] = array(
	'match' => array('a' => 'sendlink'),
	'routeTo' => array('controller' => 'xml', 'action' => 'sendlink')
);

// Html routes
$routingRules[] = array(
	'match' => array('p' => 'gallery'),
	'routeTo' => array('controller' => 'index', 'action' => 'gallery')
);

$routingRules[] = array(
	'match' => array('p' => 'flash'),
	'routeTo' => array('controller' => 'index', 'action' => 'gallery')
);


$routingRules[] = array(
	'match' => array('p' => 'thumbs'),
	'routeTo' => array('controller' => 'index', 'action' => 'html')
);

$routingRules[] = array(
	'match' => array('p' => 'html'),
	'routeTo' => array('controller' => 'index', 'action' => 'html')
);

$routingRules[] = array(
	'match' => array('p' => 'image'),
	'routeTo' => array('controller' => 'index', 'action' => 'image')
);

$routingRules[] = array(
	'match' => array('p' => 'popup'),
	'routeTo' => array('controller' => 'index', 'action' => 'popup')
);

$routingRules[] = array(
	'match' => array('p' => 'sitemap'),
	'routeTo' => array('controller' => 'index', 'action' => 'sitemap')
);

// Read defaultPage from configuration
$conf = &ivPool::get('conf');
$routingRules[] = array(
	'match' => array('p' => '__empty', 'a' => '__empty'),
	'routeTo' => array('controller' => 'index', 'action' => $conf->get('/config/imagevue/settings/defaultPage'))
);
?>