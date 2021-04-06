<?php

class DiagController extends ivController
{
	var $_excludeFolders = array(
		'html',
		'imagevue/admin',
		'imagevue/controllers',
		'imagevue/css',
		'imagevue/images',
		'imagevue/javascript',
		'imagevue/lightbox',
		'imagevue/swf',
		'imagevue/templates',
		'imagevue/tests',
	);
	
	/**
	 * File system diagnostic
	 *
	 */
	function indexAction()
	{
		clearstatcache();
		$fsTree = $this->_buildFSTree(ROOT_DIR);
		$this->view->assign('fsTree', $fsTree);
	}
	
	/**
	 * Returns flat array of file system tree
	 *
	 * @access private
	 * @param  string  $folderPath
	 * @param  integer $depth
	 * @return array
	 */
	function _buildFSTree($folderPath, $depth = 0)
	{
		$content = getContent($folderPath);
		$result = array();
		foreach ($content as $item) {
			$path = $folderPath . $item;
			if (is_dir($path) && !$this->_exclude($path)) {
				$path = ivPath::canonizeAbsolute($path);
				$result[] = array(
					'name' => $item,
					'depth' => $depth,
					'r' => is_readable($path),
					'w' => is_writeable($path),
					'x' => @file_exists($path),
					'type' => 'folder'
				);
				$result = array_merge($result, $this->_buildFSTree($path, $depth + 1));
			}
		}
		foreach ($content as $item) {
			$path = $folderPath . $item;
			if (is_file($path) && ('users.php' === $item  || '.xml' === substr($item, -4))) {
				$result[] = array(
					'name' => $item,
					'depth' => $depth,
					'r' => is_readable($path),
					'w' => is_writeable($path),
					'type' => 'file'
				);
			}
		}
		return $result; 
	}
	
	/**
	 * Checks path to be excluded
	 *
	 * @param  string $path
	 * @return boolean
	 */
	function _exclude($path)
	{
		$path = ivPath::canonizeAbsolute($path);
		foreach ($this->_excludeFolders as $item) {
			$curPath = ivPath::canonizeAbsolute(ROOT_DIR . $item);
			if (substr($path, 0, strlen($curPath)) === $curPath) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Error diagnostic
	 * 
	 */
	function errorsAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('Common things test');
	}

	/**
	 * Apache modules diagnostic page
	 * 
	 */
	function apachemodAction()
	{
		$modules = function_exists('apache_get_modules') ? apache_get_modules() : array();
		$this->view->assign('modules', $modules);

		$badModules = array(
			'mod_security' => "With enabled 'mod_security' apache module you will be unavailable to use some functions in admin panel",
			'mod_security2' => "With enabled 'mod_security2' apache module you will be unavailable to use some functions in admin panel",
		);
		$this->view->assign('badModules', $badModules);

		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('Apache modules check');		
	}

	/**
	 * PHPInfo page
	 * 
	 */
	function phpinfoAction()
	{
		$this->_setNoRender();
		phpinfo();
	}
	
	/**
	 * Post dispatching
	 *
	 */
	function _postDispatch()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('diagnostics', 'index.php?c=diag');
	}

}
?>