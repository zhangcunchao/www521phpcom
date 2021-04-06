<?php

class ThemeController extends ivController
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
	 * Default action
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('主题、样式管理');
		$selectedTheme = $this->conf->get('/config/imagevue/settings/theme');
		$themes = array_diff(ivTheme::getAllThemes(), array($selectedTheme));
		sort($themes);
		array_unshift($themes, $selectedTheme);
		$this->view->assign('theme', $selectedTheme);
		$this->view->assign('themes', $themes);
	}

	/**
	 * Edit theme cascade stylesheet
	 *
	 */
	function editcssAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('主题、样式管理', 'index.php?c=theme');
		$themeName = $this->_getParam('name', 'default', 'alnum');
		$crumbs->push($themeName . ' stylesheet', 'index.php?c=theme&amp;a=editcss&amp;name=' . $themeName);
		$theme = ivTheme::get($themeName);
		if (!$theme) {
			ivMessenger::add('error', "名称为 '$themeName' 的主题不存在！");
			$this->_redirect('?c=theme');
		}
		$css = $this->_getParam('css');
		if (is_string($this->_getParam('save')) && is_string($css)) {
			if (@$theme->setStyle($css)) {
				ivMessenger::add('notice', 'CSS文件保存成功。');
			} else {
				ivMessenger::add('error', "无法写入 $themeName/imagevue.css 文件");
			}
		}
		$this->view->assign('theme', $theme);
		$this->view->assign('themes', ivTheme::getAllThemes());
	}

	/**
	 * Edit theme configuration
	 *
	 */
	function editconfigAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('主题、样式管理', 'index.php?c=theme');
		$themeName = $this->_getParam('name', 'default', 'alnum');
		$crumbs->push($themeName . ' config', 'index.php?c=theme&amp;a=editconfig&amp;name=' . $themeName);

		$theme = ivTheme::get($themeName);
		if (!$theme) {
			ivMessenger::add('error', "名称为 '$themeName' 的主题不存在！");
			$this->_redirect('?c=theme');
		}

		if (isset($_POST['save']) && isset($_POST['config'])) {
			$xml = $theme->getConfig();
			foreach ($_POST['config'] as $path => $value) {
				$node = &$xml->findByXPath($path);
				if ($node) {
					$node->setValue(is_array($value) ? implode(',', $value): (string) $value);
				}
			}
			$result = $xml->writeToFile();
			if ($result) {
				ivMessenger::add('notice', '主题配置文件保存成功！');
			} else {
				ivMessenger::add('error', "无法写入文件");
			}
		}

		$xml = $theme->getConfig();

		$this->view->assign('flatConfig', $xml->toFlatTree());
		$this->view->assign('themes', ivTheme::getAllThemes());
		$this->view->assign('themeName', $themeName);

		if (isset($_COOKIE['ivconf'])) {
			$openedPanels = array_unique(array_explode_trim(',', $_COOKIE['ivconf']));
		} else {
			$openedPanels = array('config_imagevue_settings', 'config_imagevue_controls', 'config_imagevue_audioplayer', 'config_imagevue_image', 'config_imagevue_thumbnails', 'config_imagevue_menu', 'config_imagevue_misc', 'config_imagevue_modules', 'config_imagevue_style', 'config_imagevue_textpage');
			setcookie('ivconf', implode(',', $openedPanels), time() + 365 * 86400);
		}
		$this->view->assign('openedPanels', $openedPanels);
	}

	/**
	 * Set default theme
	 *
	 */
	function useAction()
	{
		$value = $this->_getParam('name', 'default', 'alnum');
		if (!is_null($value)) {
			$xml = ivXml::readFromFile(CONFIG_FILE, DEFAULT_CONFIG_FILE);
			$node = &$xml->findByXPath('/config/imagevue/settings/theme');
			if ($node) {
				$node->setValue((string) $value);
			}
			$result = $xml->writeToFile();
			if ($result) {
				ivMessenger::add('notice', '配置文件保存成功');
			} else {
				ivMessenger::add('error', "无法保持配置文件" . substr(CONFIG_FILE, strlen(BASE_DIR)));
			}
		}
		$this->_redirect('index.php?c=theme');
	}
	
	/**
	 * Copy theme
	 *
	 */
	function copyAction()
	{
		$themeName = $this->_getParam('name', 'default', 'alnum');
		$newThemeName = $this->_getParam('new');
		if (!ctype_alnum($newThemeName)) {
			ivMessenger::add('error', '请确认主题名称的唯一性');
			$this->_redirect('index.php?c=theme');
		}
		if (!$themeName || !$newThemeName) {
			$this->_redirect('index.php?c=theme&a=editconfig&name=' . $themeName);
		}
		if (in_array($newThemeName, ivTheme::getAllThemes())) {
			ivMessenger::add('error', '名称为 ' . $newThemeName . ' 的主题已经存在');
			$this->_redirect('index.php?c=theme&a=editconfig&name=' . $themeName);
		}

		$theme = ivTheme::get($themeName);
		if (!$theme) {
			ivMessenger::add('error', "名称为 '$themeName' 的主题不存在");
			$this->_redirect('?c=theme');
		}

		if ($theme->copyTo($newThemeName)) {
			ivMessenger::add('notice', "$newThemeName 主题创建成功");
			$this->_redirect('index.php?c=theme&a=editconfig&name=' . $newThemeName);
		} else {
			ivMessenger::add('error', "$newThemeName 创建失败");
			$this->_redirect('index.php?c=theme&a=editconfig&name=' . $themeName);
		}
	}

	/**
	 * Delete theme
	 *
	 */
	function deleteAction()
	{
		$themeName = $this->_getParam('name', null, 'alnum');

		$theme = ivTheme::get($themeName);
		if (!$theme) {
			ivMessenger::add('error', "名称为 '$themeName' 的主题不存在");
			$this->_redirect('?c=theme');
		}

		if ($theme->delete()) {
			ivMessenger::add('notice', "$themeName 主题保存成功");
		} else {
			ivMessenger::add('error', "$themeName 删除失败");
		}
		$this->_redirect('index.php?c=theme');
	}
	
	/**
	 * Upload background file
	 *
	 */
	function uploadAction()
	{
		$themeName = $this->_getParam('name', null, 'alnum');
		if (!$themeName) {
			$this->_redirect($_SERVER['HTTP_REFERER']);
		}
		$this->_setNoRender();
		if (!isset($_FILES['Filedata'])) {
			ivMessenger::add('error', 'File not found');
			$this->_redirect($_SERVER['HTTP_REFERER']);
		}
		$imageData = $_FILES['Filedata'];
		if (!@getimagesize($imageData['tmp_name'])) {
			ivMessenger::add('error', 'Incompatible file');
			$this->_redirect($_SERVER['HTTP_REFERER']);
		}

		$theme = ivTheme::get($themeName);
		if (!$theme) {
			ivMessenger::add('error', "名称为 '$themeName' 的主题不存在");
			$this->_redirect('?c=theme');
		}

		$fullpath = $theme->getUploadDirectory() . $imageData['name'];
		$result = @move_uploaded_file($imageData['tmp_name'], $fullpath);
		if ($result) {
			chmod($fullpath, 0777);
			ivMessenger::add('notice', "{$imageData['name']} 上传成功");
		} else {
			ivMessenger::add('notice', "{$imageData['name']} 上传失败");
		}
		$this->_redirect($_SERVER['HTTP_REFERER']);
	}

}
?>