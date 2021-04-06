<?php

class ConfigController extends ivController
{
	/**
	 * Pre-dispatching
	 *
	 */
	function _preDispatch()
	{
		if (!ivAcl::isAdmin()) {
			$this->_forward('login', 'cred');
			if (ivAuth::getCurrentUserLogin()) {
				ivMessenger::add('error', "你没有权限访问该页面！");
			}
			return;
		}
	}
	
	/**
	 * Default action (edit main config)
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('系统参数设置');
		$configFile = CONFIG_FILE;

		if (isset($_POST['save']) && isset($_POST['config'])) {
			$xml = ivXml::readFromFile($configFile, DEFAULT_CONFIG_FILE);
			foreach ($_POST['config'] as $path => $value) {
				$node = &$xml->findByXPath($path);
				if ($node) {
					$node->setValue(is_array($value) ? implode(',', $value): (string) $value);
				}
			}
			// Check for valid content folder
			$path = ROOT_DIR . ivPath::canonizeRelative($xml->get('/config/imagevue/settings/contentfolder'));
			if (!file_exists($path) || !is_dir($path)) {
				ivMessenger::add('error', "Wrong value applied for contentfolder: folder " . $xml->get('/config/imagevue/settings/contentfolder') . " does not exists");
			} else {
				$result = $xml->writeToFile();
				if ($result) {
					ivMessenger::add('notice', '配置文件保存成功');
				} else {
					ivMessenger::add('error', "配置文件保存失败 " . substr(CONFIG_FILE, strlen(BASE_DIR)));
				}
			}
		}
                          
		$xml = ivXml::readFromFile($configFile, DEFAULT_CONFIG_FILE);
		
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