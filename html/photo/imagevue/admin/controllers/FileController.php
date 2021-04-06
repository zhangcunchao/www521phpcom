<?php

class FileController extends ivController
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
		$path = ivPath::canonizeRelative($this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path'), true);
		if (!ivAcl::isAllowedPath($path)) {
			if (is_null(ivAcl::getAllowedPath())) {
				$this->_forward('login', 'cred');
				return;
			} else {
				$this->_redirect('index.php');
			}
		}
		$fullPath = ROOT_DIR . $path;
		$include = $this->conf->get('/config/imagevue/settings/allowedext');
		if (is_dir($fullPath)) {
			$this->_redirect('index.php?path=' . $path);
		} elseif (!is_file($fullPath)) {
			$this->_redirect('index.php');
		} elseif (!in_array(strtolower(ivFilepath::suffix($fullPath)), $include)) {
			$this->_redirect('index.php?path=' . ivFilepath::directory($path));
		}
		$this->path = $path;
	}
	
	/**
	 * Default action
	 *
	 */
	function indexAction()
	{
		$file = ivFSItem::create(ROOT_DIR . $this->path);

		$siblings = $file->getSiblings();

		// Save file data
		$newdata = $this->_getParam('newdata');
		if (is_string($this->_getParam('save')) && is_array($newdata)) {
			foreach ($newdata as $name => $value) {
				$file->setAttribute($name, $value);
				$file->setUserAttribute($name, $value);
			}
			$file->save();
			ivMessenger::add('notice', '文件数据保存成功');
			if ($this->_getParam('editNext', false)) {
				$this->_redirect('index.php?c=file&path=' . $siblings['next']->getProperty('path'));
			}
		}

		$contentFolder = ivFSItem::create(ROOT_DIR . ivAcl::getAllowedPath());
		$flatFolderTree = $contentFolder->getFlatFolderTree();

		$this->view->assign('path', $this->path);
		$this->placeholder->set('path', $this->path);
		$this->view->assign('flatFolderTree', $flatFolderTree);

		$this->view->assign('file', $file);
		$this->view->assign('nextFile', $siblings['next']);
		$this->view->assign('prevFile', $siblings['previous']);
		$this->view->assign('current', $siblings['current']);
		$this->view->assign('count', $siblings['count']);
	}

	/**
	 * Copy file
	 *
	 */
	function copyAction()
	{
		$targetPath = ivPath::canonizeRelative($this->_getParam('target', null, 'path'));
		$result = false;
		if (!empty($targetPath)) {
			$file = ivFSItem::create(ROOT_DIR . $this->path);
			if (is_a($file, 'ivFile')) {
				$result = $file->copyTo(ROOT_DIR . $targetPath);
			}
		}
		ivMessenger::add('notice', ($result ? '文件复制成功' : "文件复制失败"));
		clearCache(ROOT_DIR . $targetPath);
		$this->_redirect('index.php?path=' . $targetPath);
	}
	
	/**
	 * Move file
	 *
	 */
	function moveAction()
	{
		$targetPath = ivPath::canonizeRelative($this->_getParam('target', null, 'path'));
		$result = false;
		if (!empty($targetPath)) {
			$file = ivFSItem::create(ROOT_DIR . $this->path);
			$result = $file->copyTo(ROOT_DIR . $targetPath);
			$result &= $file->delete();
		}
		clearCache(ivPath::canonizeAbsolute(ROOT_DIR . dirname($this->path)));
		clearCache(ROOT_DIR . $targetPath);
		ivMessenger::add('notice', ($result ? '文件移动成功' : "文件移动失败"));
		$this->_redirect('index.php?path=' . $targetPath);
	}
	
	/**
	 * Delete file
	 *
	 */
	function deleteAction()
	{
		$file = ivFSItem::create(ROOT_DIR . $this->path);
		if (is_a($file, 'ivFile')) {
			$result = $file->delete();
			clearCache(ivPath::canonizeAbsolute(ROOT_DIR . dirname($this->path)));
			ivMessenger::add('notice', ($result ? '文件删除成功' : "文件删除失败"));
		} else {
			ivMessenger::add('notice', 'File not found');
		}
		$this->_redirect('index.php?path=' . ivFilepath::directory($this->path));
	}
	
	/**
	 * Rotate image
	 *
	 */
	function rotateAction()
	{
		$direction = $this->_getParam('dir', 'cw', 'alnum');
		if (!in_array($direction, array('cw', 'ccw'))) {
			$direction = 'cw';
		}
		$image = new ivImage(ROOT_DIR . $this->path);
		$image->rotate($direction);
		$image->write();
		ivMessenger::add('notice', 'File succesfully rotated');
		$this->_redirect('index.php?c=file&path=' . $this->path);
	}

	function getthumbAction()
	{
		$errorReporting = error_reporting(0);
		$this->_setNoRender();
		$file = ivFSItem::create(ROOT_DIR . $this->path);
		$file->generateThumb();

		$thumbPath = $file->getThumb();
		clearCache(ivPath::canonizeRelative(dirname(ROOT_DIR . $this->path)));
		$data = @getimagesize($thumbPath);
		if (isset($data['mime'])) {
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			header('Cache-Control: public');
			header('Expires: Fri, 30 Dec 1999 19:30:56 GMT');
			header('Content-Type: ' . $data['mime']);
			readfile($thumbPath);
		}
		error_reporting($errorReporting);
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
				if ($lastCrumbKey == $key) {
					$path .= $key;
					$file = ivFSItem::create(ROOT_DIR . $path);
					$crumbs->push($file->getTitle(), 'index.php?c=file&amp;path=' . urlencode($path));
				} else {
					$path .= $key . '/';
					$folder = ivFSItem::create(ROOT_DIR . $path);
					if (!$folder) {
						continue;
					}
					$crumbs->push($folder->getTitle(), 'index.php?path=' . urlencode($path), '', ($folder->isHidden() ? 'hidden' : ''));
				}
			}
		}
	}

}
?>
