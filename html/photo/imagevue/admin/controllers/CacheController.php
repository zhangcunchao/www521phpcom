<?php

class CacheController extends ivController
{
	var $_denied = array();
	
	/**
	 * Clears cache
	 *
	 */
	function clearAction()
	{
		$path = ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder'));
		if (!ivAcl::isAllowedPath($path)) {
			$path = ivAcl::getAllowedPath();
		}
		$this->_clearCache(ROOT_DIR . $path);
		if (empty($this->_denied)) {
			ivMessenger::add('notice', '缓存已清空');
		} else {
			$message = "Can't write to file: " . $this->_denied[0];
			$count = count($this->_denied) - 1;
			if ($count > 0) {
				$message .= " ($count more errors)";
			}
			ivMessenger::add('error', $message);
		}
		$this->_redirect('index.php');
	}
	
	function _clearCache($path)
	{
		if (clearCache($path) === false) {
			$this->_denied[] = substr($path, strlen(ROOT_DIR)) . 'folderdata.xml';
		}

		$content = getContent($path);
		foreach ($content as $dir) {
			if (is_dir($path . ivPath::canonizeRelative($dir))) {
				$this->_clearCache($path . ivPath::canonizeRelative($dir));
			}
		}
	}
	
}
?>