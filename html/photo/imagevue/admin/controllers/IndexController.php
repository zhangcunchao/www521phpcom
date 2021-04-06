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
		$folder = ivFSItem::create(ROOT_DIR . $this->path);

		// Save folder data
		$newdata = $this->_getParam('newdata');
		if (is_array($newdata)) {
			foreach ($newdata as $name => $value) {
				$folder->setAttribute($name, $value);
				$folder->setUserAttribute($name, $value);
			}
			if ($folder->save()) {
				ivMessenger::add('notice', '文件夹数据保存成功');
			} else {
				ivMessenger::add('error', "文件夹数据保存失败");
			}
		}

		$contentFolder = ivFSItem::create(ROOT_DIR . ivAcl::getAllowedPath());
		$flatFolderTree = $contentFolder->getFlatFolderTree();

		$this->view->assign('path', $this->path);
		$this->placeholder->set('path', $this->path);
		$this->view->assign('flatFolderTree', $flatFolderTree);

		$this->view->assign('folder', $folder);
		$this->view->assign('sorts', ivFolder::getSortTypes());
		$this->view->assign('uploadLimit', min(realFilesize(ini_get('post_max_size')), realFilesize(ini_get('upload_max_filesize'))));
		$this->view->assign('allowedExtentions', $this->conf->get('/config/imagevue/settings/allowedext'));
		$this->view->assign('contentPath', ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
		$this->view->assign('uploader', $this->conf->get('/config/imagevue/settings/uploader'));
		$this->view->assign('allowRenaming', ivPath::canonizeRelative($this->path) !== ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
	}
	
	/**
	 * Create new folder
	 *
	 */
	function createAction()
	{
		$newDirName = $this->_getParam('name');
		if (!preg_match('/^[_\w\d\s]+$/i', $newDirName)) {
			ivMessenger::add('error', '文件夹名称只可使用数字、字母和"_"下划线');
			$this->_redirect('index.php?path=' . $this->path);
		}
		if (is_string($newDirName)) {
			$newDirPath = ivPath::canonizeRelative($this->path . $newDirName);
			if (mkdirRecursive(ROOT_DIR . $newDirPath, octdec($this->conf->get('/config/imagevue/settings/chmod')))) {
				ivMessenger::add('notice', '文件夹创建成功');
			} else {
				ivMessenger::add('error', "文件夹创建失败");
			}
		}
		$this->_redirect('index.php?path=' . (isset($newDirPath) ? $newDirPath : $this->path));
	}
	
	/**
	 * Rename folder
	 *
	 */
	function renameAction()
	{
		if (ivPath::canonizeRelative($this->path) === ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder'))) {
			ivMessenger::add('error', 'Cannot rename content folder');
			$this->_redirect('index.php?path=' . $this->path);
		}
		$newDirName = $this->_getParam('name');
		if (!preg_match('/^[_\w\d\s]+$/i', $newDirName)) {
			ivMessenger::add('error', '文件夹名称只可使用数字、字母和"_"下划线');
			$this->_redirect('index.php?path=' . $this->path);
		}
		$newDirPath = ivPath::canonizeRelative(dirname($this->path)) . ivPath::canonizeRelative($newDirName);
		$result = @rename(ROOT_DIR . $this->path, ROOT_DIR . $newDirPath);
		if ($result) {
			ivMessenger::add('notice', '文件夹重命名成功');
			$this->_redirect('index.php?path=' . $newDirPath);
		} else {
			ivMessenger::add('error', '文件夹没有被重命名');
			$this->_redirect('index.php?path=' . $this->path);
		}
	}
	
	/**
	 * Delete folder
	 *
	 */
	function deleteAction()
	{
		if (rmdirRecursive(ROOT_DIR . $this->path)) {
			ivMessenger::add('notice', '文件夹删除成功');
		} else {
			ivMessenger::add('error', '文件夹没有被删除');
		}
		$this->_redirect('index.php');
	}

	/**
	 * Move files
	 *
	 */
	function moveFilesAction()
	{
		$targetDir = ivPath::canonizeRelative($this->_getParam('target', null, 'path'));
		$moved = 0;
		$skipped = 0;
		foreach ($this->_getParam('selected', array()) as $filename) {
			$file = ivFSItem::create(ROOT_DIR . $this->path . $filename);
			if (is_a($file, 'ivFile') && $file->copyTo(ROOT_DIR . $targetDir) && $file->delete()) {
				$moved++;
			} else {
				$skipped++;
			}
		}
		clearCache(ivPath::canonizeAbsolute(ROOT_DIR . $this->path));
		clearCache(ivPath::canonizeAbsolute(ROOT_DIR . $targetDir));
		ivMessenger::add('notice', $moved . ' 文件移动成功， ' . $skipped . ' 跳过文件');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Copy files
	 *
	 */
	function copyFilesAction()
	{
		$targetDir = ivPath::canonizeRelative($this->_getParam('target', null, 'path'));
		$copied = 0;
		$skipped = 0;
		foreach ($this->_getParam('selected', array()) as $filename) {
			$file = ivFSItem::create(ROOT_DIR . $this->path . $filename);
			if (is_a($file, 'ivFile') && $file->copyTo(ROOT_DIR . $targetDir)) {
				$copied++;
			} else {
				$skipped++;
			}
		}
		clearCache(ivPath::canonizeAbsolute(ROOT_DIR . $targetDir));
		ivMessenger::add('notice', $copied . ' 文件复制成功， ' . $skipped . ' 跳过文件');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Delete files
	 *
	 */
	function deleteFilesAction()
	{
		$deleted = 0;
		$skipped = 0;
		foreach ($this->_getParam('selected', array()) as $filename) {
			$file = ivFSItem::create(ROOT_DIR . $this->path . $filename);
			if (is_a($file, 'ivFile') && $file->delete()) {
				$deleted++;
			} else {
				$skipped++;
			}
		}
		clearCache(ivPath::canonizeAbsolute(ROOT_DIR . $this->path));
		ivMessenger::add('notice', $deleted . ' 个文件删除成功， ' . $skipped . ' 个文件跳过');
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Hide folder
	 *
	 */
	function hideAction()
	{
		$folder = ivFSItem::create(ROOT_DIR . $this->path);
		$folder->setAttribute('hidden', 'true');
		$folder->save();
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Unhide folder
	 *
	 */
	function unhideAction()
	{
		$folder = ivFSItem::create(ROOT_DIR . $this->path);
		$folder->setAttribute('hidden', 'false');
		$folder->save();
		$this->_redirect('index.php?path=' . $this->path);
	}
	
	/**
	 * Upload file
	 *
	 */
	function uploadAction()
	{
		$this->_setNoRender();
		if (!isset($_FILES['Filedata'])) {
			header("HTTP/1.1 500 Internal Server Error");
			echo "错误，找不到文件";
			return;
		}
		$imageData = $_FILES['Filedata'];
		$imageName = $imageData['name'];
		if (get_magic_quotes_gpc()) {
			$imageName = stripslashes($imageName);
		}
		if (!ivFilepath::matchSuffix($imageName, $this->conf->get('/config/imagevue/settings/allowedext'))) {
			header("HTTP/1.1 403 Forbidden");
			echo "错误，无法打开文件";
		} else {
			$fullpath = ROOT_DIR . $this->path . $imageName;
			$result = @move_uploaded_file($imageData['tmp_name'], $fullpath);
			if ($result) {
				chmod($fullpath, 0777);
				$FSItem = ivFSItem::create($fullpath);
				$FSItem->generateThumb();
				clearCache(ROOT_DIR . $this->path);
				echo "文件 {$imageName} 上传成功";
			} else {
				header("HTTP/1.1 500 Internal Server Error");
				echo "错误，文件 {$imageName} 上传失败";
			}
		}
	}
	
	/**
	 * Recreate thumnails
	 *
	 */
	function makethumbsAction()
	{
		$_SESSION['remakeThumbs'] = true;
		$this->_redirect('index.php?path=' . $this->path);
	}

	/**
	 * Recreate thumnails recursive
	 *
	 */
	function recreatethumbsAction()
	{
		$folder = ivFSItem::create(ROOT_DIR . $this->path);
		$flatFolderTree = $folder->getFlatFolderTree();
		$this->view->assign('flatFolderTree', $flatFolderTree);
		$this->view->assign('missingOnly', $this->_getParam('miss', false, 'bool'));
		$this->view->assign('contentPath', ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
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
