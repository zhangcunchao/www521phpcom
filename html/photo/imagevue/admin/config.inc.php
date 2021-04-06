<?php
if (!defined('IV_PATH')) {
	exit(0);
}

$config = &ivXml::readFromFile(CONFIG_FILE, DEFAULT_CONFIG_FILE);

if (isset($_GET['excludefilesprefix'])) {
	$config->set('/config/imagevue/settings/excludefilesprefix', array_intersect(
		$config->get('/config/imagevue/settings/excludefilesprefix'),
		array_explode_trim(',', $_GET['excludefilesprefix'])
	));
}

ivPool::set('conf', $config);
?>