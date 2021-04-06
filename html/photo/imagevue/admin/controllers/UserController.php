<?php

class UserController extends ivController
{
	/**
	 * User manager object
	 * @var ivUserManager
	 */
	var $_userManager;

	/**
	 * Initialization
	 *
	 */
	function init()
	{
		$this->_userManager = &ivPool::get('userManager');
	}
	
	/**
	 * Pre-dispatching
	 *
	 */
	function _preDispatch()
	{
		if (!ivAcl::isAdmin()) {
			$this->_forward('login', 'cred');
			if (ivAuth::getCurrentUserLogin()) {
				ivMessenger::add('error', "你没有权限访问该页面！");
			}
			return;
		}
	}
	
	/**
	 * Default action
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('用户管理');
		$login = $this->_getParam('login');
		$this->view->assign('user', ivAuth::getCurrentUserLogin());
		$this->view->assign('users', $this->_userManager->getUsers());
	}

	/**
	 * Add/edit user
	 *
	 */
	function editAction()
	{
		if (isset($_POST['save']) && is_array($_POST['user'])) {
			$newUser = $_POST['user'];
			if (($newUser['password'] && $newUser['password'] == $_POST['password_confirm']) || empty($newUser['password'])) {
				$result = $this->_userManager->saveUser($_POST['login'], $newUser);
				if ($result) {
					ivMessenger::add('notice', "用户数据保存成功");
				} else {
					ivMessenger::add('error', "无法保存用户数据 " . substr(USERS_FILE, strlen(BASE_DIR)));
				}
				$this->_redirect('index.php?c=user');
			} else {
				ivMessenger::add('error', "两次密码输入不同，请重新输入");
			}
		}
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('用户管理', 'index.php?c=user');
		$login = $this->_getParam('login');
		$user = &$this->_userManager->getUser($login);
		if ($user) {
			$this->view->assign('user', $user);
			$crumbs->push($login, 'index.php?c=user&amp;a=edit&amp;login=' . $login);
		} elseif ($login) {
			ivMessenger::add('error', "User $login not found");
			$this->_redirect('index.php?c=user');
		} else {
			$crumbs->push('添加', 'index.php?c=user&amp;a=edit');
		}
		$contentFolder = ivFSItem::create(ROOT_DIR . $this->conf->get('/config/imagevue/settings/contentfolder'));
		$this->view->assign('flatFolderTree', $contentFolder->getFlatFolderTree());
		$this->view->assign('contentfolder', ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')));
	}

	/**
	 * Default action
	 *
	 */
	function deleteAction()
	{
		$login = $this->_getParam('login');
		if (ivAcl::isAdmin($login)) {
			$adminCount = 0;
			foreach ($this->_userManager->getUsers() as $user) {
				$adminCount += (int) ivAcl::isAdmin($user->login);
			}
			if ($adminCount < 2) {
				ivMessenger::add('error', "用户 $login 是最后一个管理员用户, 你不能删除该用户");
				$this->_redirect('index.php?c=user');
			}
		}
		$result = $this->_userManager->deleteUser($login);
		if ($result) {
			ivMessenger::add('notice', "用户 $login 删除成功");
		} else {
			ivMessenger::add('error', "无法写入文件 " . substr(USERS_FILE, strlen(BASE_DIR)));
		}
		$this->_redirect('index.php?c=user');
	}

}
?>