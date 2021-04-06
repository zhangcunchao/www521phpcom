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
	 * Pre-dispatching
	 *
	 */
	function _preDispatch()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('服务器环境测试','?c=diag');
			
		if (!ivAcl::isAdmin()) {
			$this->_forward('login', 'cred');
			if (ivAuth::getCurrentUserLogin()) {
				ivMessenger::add('error', "你没有权限访问该页面！");
			}
			return;
		}
	}
	
	/**
	 * File system diagnostic
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('系统文件权限测试');
		
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
		$crumbs->push('服务器常规组件测试');
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
			'mod_security' => "服务器启用了'mod_security' apache模块，你将无法使用后台管理的某些功能",
			'mod_security2' => "服务器启用了'mod_security2' apache模块，你将无法使用后台管理的某些功能",
		);
		$this->view->assign('badModules', $badModules);

		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('Apache 模块检测');		
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
	{}

}
?>