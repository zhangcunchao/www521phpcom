<?php
if (!defined('IV_PATH')) {
	exit(0);
}

$config = &ivXml::readFromFile(CONFIG_FILE, DEFAULT_CONFIG_FILE, true);

if (isset($_GET['excludefilesprefix'])) {
	$config->set('/config/imagevue/settings/excludefilesprefix', array_intersect(
		$config->get('/config/imagevue/settings/excludefilesprefix'),
		array_explode_trim(',', $_GET['excludefilesprefix'])
	));
}

if (isset($_GET['ext'])) {
	$allowedExtentions = $config->get('/config/imagevue/settings/allowedext');
	$ext = $_GET['ext'];
	if (substr($ext, 0, 1) == '!') {
		$extArr = array_explode_trim(',', substr($ext, 1));
		if (!empty($extArr)) {
			$allowedExtentions = array_diff($allowedExtentions, $extArr);
		}
	} else {
		$extArr = array_explode_trim(',', $ext);
		if (!empty($extArr)) {
			$allowedExtentions = array_intersect($allowedExtentions, $extArr);
		}
	}
} else {
	$allowedExtentions = $config->get('/config/imagevue/settings/includefilesext');
}
$config->set('/config/imagevue/settings/allowedext', $allowedExtentions);


// This code used for demonstration purposes only. Must be killed in production version
if (isset($_GET['stylesheet'])) {
    setcookie('stylesheet', $_GET['stylesheet'], 0, '/');
    $_COOKIE['stylesheet'] = $_GET['stylesheet'];
}

if (isset($_GET['lightview']) && !empty($_GET['lightview'])) {
	if ('true' == $_GET['lightview']) {
		setcookie('lightview', 'true', 0, '/');
		$config->set('/config/imagevue/settings/useLightview', true);
	} else {
		setcookie('lightview', 'false', 0, '/');
		$config->set('/config/imagevue/settings/useLightview', false);
	}
} elseif (isset($_COOKIE['lightview'])) {
	if ('true' == $_COOKIE['lightview']) {
		$config->set('/config/imagevue/settings/useLightview', true);
	} else {
		$config->set('/config/imagevue/settings/useLightview', false);
	}
}
// End of demonstration code

ivPool::set('conf', $config);
?>