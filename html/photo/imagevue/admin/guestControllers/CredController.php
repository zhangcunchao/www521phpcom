<?php

class CredController extends ivController
{
	/**
	 * Log in
	 *
	 */
	function loginAction()
	{
		$login = (string) $this->_getParam('login');
		$password = (string) $this->_getParam('password');
		if (!empty($login) && !empty($password)) {
			$rememberme = (boolean) $this->_getParam('rememberme');
			$result = ivAuth::authenticate($login, $password, $rememberme);
			if ($result) {
				ivMessenger::add('notice', "Welcome, $login");
			} else {
				ivMessenger::add('error', 'Incorrect login or password');
			}
			$this->_redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '?');
		}
	}

	/**
	 * Log out
	 *
	 */
	function logoutAction()
	{
		ivAuth::authenticate('', '', false);
		$this->_redirect($_SERVER['HTTP_REFERER']);
	}

}
?>