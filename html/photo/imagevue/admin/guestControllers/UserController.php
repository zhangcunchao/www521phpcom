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
	 * Default action
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('users', 'index.php?c=user');
		$login = $this->_getParam('login', null, 'alnum');
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
				ivMessenger::add('notice', "User's data succesfully saved");
				$this->_redirect('index.php?c=user');
			} else {
				ivMessenger::add('error', "Password doesn't match the confirm password");
			}
		}
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('users', 'index.php?c=user');
		$login = $this->_getParam('login', null, 'alnum');
		$user = $this->_userManager->getUser($login);
		if ($user) {
			$this->view->assign('user', $user);
			$this->view->assign('login', $login);
			$crumbs->push($login, 'index.php?c=user&amp;a=edit&amp;login=' . $login);
		} else {
			$crumbs->push('add', 'index.php?c=user&amp;a=add');
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
		$this->_redirect('index.php?c=user');
	}

}
?>