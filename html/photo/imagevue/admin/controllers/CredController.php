<?php

class CredController extends ivController
{
	/**
	 * Log in
	 *
	 */
	function loginAction()
	{
		$this->_disableLayout();
		$login = trim((string) $this->_getParam('login'));
		$password = trim((string) $this->_getParam('password'));
		if (!empty($login) && !empty($password)) {
			$rememberme = (boolean) $this->_getParam('rememberme');
			$result = ivAuth::authenticate($login, $password, $rememberme);
			if ($result) {
				ivMessenger::add('notice', "欢迎您, $login");
			} else {
				ivMessenger::add('error', '您输入的用户名或者密码有误，请重新输入！');
			}
			$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '?';
			if (ivAcl::isAdmin()) {
				$referer = $this->_getParam('redirect', $referer);
			}
			$this->_redirect($referer);
		}
		$userManager = &ivPool::get('userManager');
		$admin = $userManager->getUser('admin');
		$defaultUser = ('d033e22ae348aeb5660fc2140aec35850c4da997' === $admin->passwordHash);
		if ($defaultUser) {
			ivMessenger::add('error', '默认管理员用户名密码为 admin/admin 请登录之后修改默认密码！');
		}
		$this->view->assign('defaultUser', $defaultUser);
	}

	/**
	 * Log out
	 *
	 */
	function logoutAction()
	{
		ivAuth::authenticate('', '', false);
		ivMessenger::add('notice', '再见!');
		$this->_redirect('?');
	}

}
?>