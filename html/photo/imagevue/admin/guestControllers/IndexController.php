<?php

class IndexController extends ivController
{
	/**
	 * Path
	 * @var string
	 */
	var $path;

	/**
	 * Pre-dispatching
	 *
	 */
	function _preDispatch()
	{
		$path = ivPath::canonizeRelative($this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path'));
		if (!ivAcl::isAllowedPath($path) && !ivAcl::isAllowedPath(ivPath::canonizeRelative($path))) {
			if (is_null(ivAcl::getAllowedPath())) {
				$this->_forward('login', 'cred');
				return;
			} else {
				$path = ivAcl::getAllowedPath();
			}
		}
		$fullPath = ROOT_DIR . $path;
		if (is_dir($fullPath)) {
			$path = ivPath::canonizeRelative($path);
		} elseif (is_file($fullPath)) {
			$this->_redirect('index.php?c=file&path=' . $path);
		} else {
			$this->_redirect('index.php');
		}
		$this->path = $path;
	}

	/**
	 * Default action
	 *
	 */
	function indexAction()
	{
		$contentFolder = ivFSItem::create(ROOT_DIR . ivAcl::getAllowedPath());
		$flatFolderTree = $contentFolder->getFlatFolderTree();

		$this->view->assign('path', $this->path);
		$this->placeholder->set('path', $this->path);
		$this->view->assign('flatFolderTree', $flatFolderTree);

		$folder = ivFSItem::create(ROOT_DIR . $this->path);

		// Save folder data
		$newdata = $this->_getParam('newdata');
		if (is_array($newdata)) {
			ivMessenger::add('notice', '文件夹数据保存成功');
		}

		$this->view->assign('folder', $folder);
		$this->view->assign('sorts', ivFolder::getSortTypes());
		$this->view->assign('uploadLimit', ini_get('post_max_size') . 'B');
		$this->view->assign('allowedExtentions', $this->conf->get('/config/imagevue/settings/allowedext'));
		$this->view->assign('contentPath', ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
		$this->view->assign('uploader', $this->conf->get('/config/imagevue/settings/uploader'));
	}
	
	/**
	 * Create new folder
	 *
	 */
	function createAction()
	{
		ivMessenger::add('notice', '文件夹创建成功');
		$this->_redirect('index.php?path=' . $this->path);
	}

	/**
	 * Rename folder
	 *
	 */
	function renameAction()
	{
		ivMessenger::add('notice', '文件夹重命名成功');
		$this->_redirect('index.php?path=' . $this->path);
	}	
	
	/**
	 * Delete folder
	 *
	 */
	function deleteAction()
	{
		ivMessenger::add('notice', '文件夹删除成功');
		$this->_redirect('index.php');
	}
	
	/**
	 * Move files
	 *
	 */
	function moveFilesAction()
	{
		ivMessenger::add('notice', count($this->_getParam('selected', array())) . ' 文件移动成功， 跳过0个文件');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Copy files
	 *
	 */
	function copyFilesAction()
	{
		ivMessenger::add('notice', count($this->_getParam('selected', array())) . ' 文件复制成功， 跳过0个文件');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Delete files
	 *
	 */
	function deleteFilesAction()
	{
		ivMessenger::add('notice', count($this->_getParam('selected', array())) . ' 文件删除成功， 跳过0个文件');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Hide folder
	 *
	 */
	function hideAction()
	{
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Unhide folder
	 *
	 */
	function unhideAction()
	{
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Upload file
	 *
	 */
	function uploadAction()
	{
		$this->_setNoRender();
		$imageData = $_FILES['Filedata'];
		if (!ivFilepath::matchSuffix($imageData['name'], $this->conf->get('/config/imagevue/settings/allowedext'))) {
			header("HTTP/1.1 403 Forbidden");
			echo "错误，无法打开文件";
		} else {
			echo "文件 {$imageData['name']} 上传成功";
		}
	}
	
	/**
	 * Recreate thumnails
	 *
	 */
	function makethumbsAction()
	{
		$this->_redirect('index.php?path=' . $this->path);
	}

	/**
	 * Recreate thumnails recursive
	 *
	 */
	function recreatethumbsAction()
	{
		$this->_redirect('index.php?path=' . $this->path);
	}

	/**
	 * Post-dispatching
	 *
	 */
	function _postDispatch()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$brCrumbsKeys = array_explode_trim('/', $this->path);
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
					$crumbs->push($folder->getTitle(), 'index.php?path=' . urlencode($path), '[' . $numOfFiles . ']', ($folder->isHidden() ? 'hidden' : ''));
				} else {
					$crumbs->push($folder->getTitle(), 'index.php?path=' . urlencode($path), '', ($folder->isHidden() ? 'hidden' : ''));
				}
			}
		}
	}

}
?>