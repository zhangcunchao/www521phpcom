<?php

class ConfigController extends ivController
{
	/**
	 * Default action (edit main config)
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('Change settings');

		$xml = ivXml::readFromFile(CONFIG_FILE, DEFAULT_CONFIG_FILE);
		
		$this->view->assign('flatConfig', $xml->toFlatTree());

		if (isset($_COOKIE['ivconf'])) {
			$openedPanels = array_unique(array_explode_trim(',', $_COOKIE['ivconf']));
		} else {
			$openedPanels = array('config_imagevue_settings', 'config_imagevue_controls', 'config_imagevue_audioplayer', 'config_imagevue_image', 'config_imagevue_thumbnails', 'config_imagevue_menu', 'config_imagevue_misc', 'config_imagevue_modules', 'config_imagevue_style', 'config_imagevue_textpage');
			setcookie('ivconf', implode(',', $openedPanels), time() + 365 * 86400);
		}
		$this->view->assign('openedPanels', $openedPanels);
	}

}
?>