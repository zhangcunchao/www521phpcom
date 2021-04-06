<?php

class IndexController extends ivController
{
	/**
	 * Display gallery
	 *
	 */
	function galleryAction()
	{
		$this->_disableLayout();
		$vars = $this->_getParams($this->conf->get('/config/imagevue/settings/url_params'));

		if (!isset($vars['theme'])) {
			$vars['theme'] = $this->conf->get('/config/imagevue/settings/theme');
		}
		$theme = ivTheme::get($vars['theme'], $this->conf->get('/config/imagevue/settings/theme'));
		if (!$theme) {
			trigger_error("Theme named '{$vars['theme']}' not found", E_USER_ERROR);
		}
		$themeXml = $theme->getConfig();

		$bkGrColor = &$themeXml->findByXPath('/config/imagevue/style/background_color');
		$this->view->assign('bkGrColor', substr($bkGrColor->getValue(), -6));
		
		$frGrColor = &$themeXml->findByXPath('/config/imagevue/style/foreground_color');
		$this->view->assign('frGrColor', substr($frGrColor->getValue(), -6));
		
		$this->view->assign('vars', $vars);
		$this->view->assign('siteTitle', $this->conf->get('/config/imagevue/settings/sitetitle'));
		$this->view->assign('enabledHTML', $this->conf->get('/config/imagevue/settings/enableHTML'));
	}
	
	/**
	 * Display folder's images
	 *
	 */
	function htmlAction()
	{
		if ($this->conf->get('/config/imagevue/settings/enableHTML')) {
			$path = ivPath::canonizeRelative($this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path'));
			$folder = ivFSItem::create(substr(ROOT_DIR . $path, 0, -1));
			if (is_a($folder, 'ivFile')) {
				$this->_forward('image', 'index');
				return;
			} elseif (!is_a($folder, 'ivFolder') || strlen($folder->getProperty('path')) < 2) {
				$this->_redirect('?p=html');
			}
			$this->view->assign('folder', $folder);
			
			$contentFolder = ivFSItem::create(ROOT_DIR . ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
			if (is_a($contentFolder, 'ivFolder')) {
				$view = new ivView(dirname(dirname(__FILE__)) . '/templates/');
				$view->assign('path', $folder->getProperty('path'));
				$view->assign('flatFolderTree', $contentFolder->getFlatFolderTree(false));
				$this->placeholder->set('tree', $view->fetch('tree'));
			}
	
			$crumbs = &ivPool::get('breadCrumbs');
			$brCrumbsKeys = array_explode_trim('/', $path);
			if ($brCrumbsKeys !== false) {
				$lastCrumbKey = end($brCrumbsKeys);
				$path = '';
				foreach ($brCrumbsKeys as $key) {
					$path .= $key . '/';
					$folder = ivFSItem::create(ROOT_DIR . $path);
					if (!$folder) {
						continue;
					}
					if ($lastCrumbKey == $key) {
						$numOfFiles = $folder->getFileCount();
						$crumbs->push($folder->getTitle(), '?' . urlencode($path), '[' . $numOfFiles . ']', 'active');
					} else {
						$crumbs->push($folder->getTitle(), '?' . urlencode($path), '');
					}
				}
			}
			$this->view->assign('crumbs', $crumbs);
			$this->view->assign('displaySubdirs', $this->conf->get('/config/imagevue/settings/frontSubdirs'));
			$this->view->assign('useLightview', $this->conf->get('/config/imagevue/settings/useLightview'));
		} else {
			$this->_disableLayout();
			$this->_setNoRender();
			header('HTTP/1.1 404 Not Found');
			exit(0);
		}
	}

	/**
	 * Display image
	 *
	 */
	function imageAction()
	{
		if ($this->conf->get('/config/imagevue/settings/enableHTML')) {
			$path = ivPath::canonizeRelative($this->_getParam('path', null, 'path'), true);
			$file = ivFSItem::create(ROOT_DIR . $path);
			if (!is_a($file, 'ivFileImage')) {
				$this->_redirect('?p=html');
			}
			$siblings = $file->getSiblings();
	
			$contentFolder = ivFSItem::create(ROOT_DIR . ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
			if (is_a($contentFolder, 'ivFolder')) {
				$view = new ivView(dirname(dirname(__FILE__)) . '/templates/');
				$view->assign('path', $file->getProperty('path'));
				$view->assign('flatFolderTree', $contentFolder->getFlatFolderTree(false));
				$this->placeholder->set('tree', $view->fetch('tree'));
			}
	
			$this->view->assign('file', $file);
			$this->view->assign('nextFile', $siblings['next']);
			$this->view->assign('prevFile', $siblings['previous']);
			$this->view->assign('current', $siblings['current']);
			$this->view->assign('count', $siblings['count']);
	
			$crumbs = &ivPool::get('breadCrumbs');
			$brCrumbsKeys = array_explode_trim('/', $path);
			if ($brCrumbsKeys !== false) {
				$lastCrumbKey = end($brCrumbsKeys);
				$path = '';
				foreach ($brCrumbsKeys as $key) {
					if ($lastCrumbKey == $key) {
						$path .= $key;
						$file = ivFSItem::create(ROOT_DIR . $path);
						$crumbs->push($file->getTitle(), '?' . urlencode($path), '', 'active');
					} else {
						$path .= $key . '/';
						$folder = ivFSItem::create(ROOT_DIR . $path);
						if (!$folder) {
							continue;
						}
						$crumbs->push($folder->getTitle(), '?' . urlencode($path), '');
					}
				}
			}
			$this->view->assign('crumbs', $crumbs);
		} else {
			$this->_disableLayout();
			$this->_setNoRender();
			header('HTTP/1.1 404 Not Found');
			exit(0);
		}
	}

	/**
	 * Display image in popup
	 *
	 */
	function popupAction()
	{
		$this->_disableLayout();
		$this->view->assign('path', $this->_getParam('path'), 'path');
	}

	/**
	 * Display sitemap
	 *
	 */
	function sitemapAction()
	{
		$this->_disableLayout();
		$this->view->assign('siteTitle', $this->conf->get('/config/imagevue/settings/sitetitle'));

		$contentFolder = ivFSItem::create(ROOT_DIR . ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
		if (is_a($contentFolder, 'ivFolder')) {
			$this->view->assign('flatFolderTree', array_slice($contentFolder->getFlatFolderTree(false), 1));
			$view = new ivView(dirname(dirname(__FILE__)) . '/templates/');
			$view->assign('flatFolderTree', $contentFolder->getFlatFolderTree(false));
			$this->placeholder->set('tree', $view->fetch('tree'));
		} else {
			$this->view->assign('flatFolderTree', array());
		}
	}

}
?>