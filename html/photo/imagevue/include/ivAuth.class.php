<?php

/**
 * Authentication and authorization class
 *
 * @static
 * @author McArrow
 */
class ivAuth
{
	/**
	 * Authenticate user
	 *
	 * @param string        $login
	 * @param string        $password
	 * @param boolean       $remember
	 * @param ivUserManager $userManager
	 */
	function authenticate($login, $password, $remember, $userManager = null)
	{
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		if (!empty($login) && !empty($password) && $userManager->isRegistered($login, $password)) {
			ivAuth::_setCurrentUserLogin($login, $remember, $userManager);
			$result = true;
		} else {
			ivAuth::_setCurrentUserLogin(null, true, $userManager);
			$result = false;
		}
		return $result;
	}

	/**
	 * Basic authentication
	 *
	 * @static 
	 * @param ivUserManager $userManager
	 */
	function basicAuthentication($userManager = null)
	{
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && !ivAuth::getCurrentUserLogin()) {
			ivAuth::authenticate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], false);
		}
	}
	
	/**
	 * Authenticate user by cookie
	 *
	 * @param ivUserManager $userManager
	 */
	function authenticateByCookie($userManager = null)
	{
		if (is_null($userManager)) {
			$userManager = &ivPool::get('userManager');
		}
		foreach ($userManager->getUsers() as $user) {
			if (isset($_COOKIE[ivAuth::_hash('qwerty')]) && ivAuth::_makeCookie($user->login, $userManager) === $_COOKIE[ivAuth::_hash('qwerty')]) {
				ivAuth::_setCurrentUserLogin($user->login, true, $userManager);
			}
		}
	}

	/**
	 * Returns current user's login
	 *
	 * @return string
	 */
	function getCurrentUserLogin()
	{
		return isset($_SESSION['login']) ? $_SESSION['login'] : null;
	}

	/**
	 * Sets current user's login
	 *
	 * @access private
	 * @param  string  $login
	 * @param  boolean $remember
	 * @param ivUserManager $userManager
	 */
	function _setCurrentUserLogin($login, $remember, $userManager)
	{
		if ($login) {
			$_SESSION['login'] = $login;
		} elseif (isset($_SESSION['login'])) {
			unset($_SESSION['login']);
		}
		if ($remember) {
			if (!empty($login)) {
				setcookie(ivAuth::_hash('qwerty'), ivAuth::_makeCookie($login, $userManager), time() + 2592000, '/');
			} else {
				setcookie(ivAuth::_hash('qwerty'), null, time() - 3600, '/');
			}
		}
	}
	
	/**
	 * Makes cookie value
	 *
	 * @param string $login
	 * @param ivUserManager $userManager
	 */
	function _makeCookie($login, $userManager)
	{
		if (empty($login)) {
			return null;
		} else {
			$user = $userManager->getUser($login);
			return ivAuth::_hash($login . $user->passwordHash);
		}
	}

	/**
	 * Hash function
	 *
	 * @access private
	 * @param  string $string
	 * @return string
	 */
	function _hash($string)
	{
		return sha1($string);
	}

}
?>