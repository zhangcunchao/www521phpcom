<?php

/**
 * Access control class
 *
 * @static
 * @author McArrow
 */
class ivAcl
{
	/**
	 * Checks if user (current user default) have admin rights
	 *
	 * @param  string        $login
	 * @param  ivUserManager $userManager
	 * @return boolean
	 */
	function isAdmin($login = null, $userManager = null)
	{
		if (is_null($login)) {
			$login = ivAuth::getCurrentUserLogin();
		}
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		$user = $userManager->getUser($login);
		return (is_a($user, 'stdClass') && '*' === $user->access);
	}
	
	/**
	 * Get allowed path for user (current user default)
	 *
	 * @param  string        $login
	 * @param  ivUserManager $userManager
	 * @param  string        $contentPath
	 * @return boolean
	 */
	function getAllowedPath($login = null, $userManager = null, $contentPath = null)
	{
		if (is_null($login)) {
			$login = ivAuth::getCurrentUserLogin();
		}
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		if (is_null($contentPath)) {
			$conf = &ivPool::get('conf');
			$contentPath = $conf->get('/config/imagevue/settings/contentfolder');
		}
		$user = &$userManager->getUser($login);
		if (!is_null($user)) {
			if (ivAcl::isAdmin($login, $userManager)) {
				return ivPath::canonizeRelative($contentPath);
			} else {
				return ivPath::canonizeRelative($user->access);
			}
		}
	}
	
	/**
	 * Checks if given path allowed for user (current user default)
	 *
	 * @param  string        $path
	 * @param  string        $login
	 * @param  ivUserManager $userManager
	 * @param  string        $contentPath
	 * @return boolean
	 */
	function isAllowedPath($path, $login = null, $userManager = null, $contentPath = null)
	{
		if (empty($path)) {
			return false;
		}
		$path = ivPath::canonizeRelative($path);
		if (is_null($login)) {
			$login = ivAuth::getCurrentUserLogin();
		}
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		if (is_null($contentPath)) {
			$conf = &ivPool::get('conf');
			$contentPath = $conf->get('/config/imagevue/settings/contentfolder');
		}
		$contentPath = ivPath::canonizeRelative($contentPath);
		$allowedPath = ivPath::canonizeRelative(ivAcl::isAdmin($login, $userManager) ? $contentPath : ivAcl::getAllowedPath($login, $userManager, $contentPath));
		return (!empty($allowedPath) && (substr($path, 0, strlen($allowedPath)) === $allowedPath));
	}
}
?>