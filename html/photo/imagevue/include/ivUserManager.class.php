<?php

/**
 * Users manipulation
 *
 * @author McArrow
 */
class ivUserManager
{
	/**
	 * Array of users
	 * @var array
	 */
	var $_users = array();
	
	/**
	 * Constructor
	 *
	 */
	function ivUserManager()
	{
		$this->__construct();
	}
	
	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		if (file_exists(USERS_FILE)) {
			include(USERS_FILE);
		}
		if (isset($users) && is_array($users)) {
			foreach ($users as $login => $savedUser) {
				$user = &$this->_addUser($login);
				$user->passwordHash = $savedUser['password'];
				$user->access = $savedUser['access'];
			}
		} else {
			$users['admin'] = array(
		 		'password' => $this->_hash('admin'),
				'access' => '*'
			);
			if (!@$this->saveUser('admin', array('access' => '*', 'password' => 'admin'))) {
				ivMessenger::add('error', "Can't write to file " . substr(USERS_FILE, strlen(BASE_DIR)));
			}
		}
	}
	
	/**
	 * Adds new user
	 *
	 * @access private
	 * @param  string   $login
	 * @return stdClass
	 */
	function &_addUser($login)
	{
		$user = new stdClass();
		$user->login = $login;
		$this->_users[] = $user;
		$user = &$this->_users[count($this->_users) - 1];
		return $user;
	}
	
	/**
	 * Returns an array of users
	 *
	 * @return array
	 */
	function getUsers()
	{
		return $this->_users;
	}
	
	/**
	 * Returns user by given login
	 *
	 * @param  string $login
	 * @return stdClass
	 */
	function &getUser($login)
	{
		$result = null;
		foreach ($this->_users as $key => $user) {
			if ($user->login === $login) {
				$result = &$this->_users[$key];
			}
		}
		return $result;
	}
	
	/**
	 * Checks if user with login and password is registered
	 *
	 * @param  string  $login
	 * @param  string  $password
	 * @return boolean
	 */
	function isRegistered($login, $password)
	{
		$user = &$this->getUser($login);
		return (!is_null($user) && $this->_hash($password) === $user->passwordHash);
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

	/**
	 * Adds new or change existing user
	 *
	 * @param  string $login
	 * @param  array  $userData
	 * @return boolean
	 */
	function saveUser($login, $userData)
	{
		$user = &$this->getUser($login);
		if (is_null($user)) {
			$user = &$this->_addUser($login);
		}
		$user->access = $userData['access'];
		if (!empty($userData['password'])) {
			$user->passwordHash = $this->_hash($userData['password']);
		}
		return $this->_save();
	}
	
	/**
	 * Deletes user
	 *
	 * @param  string $login
	 * @return boolean
	 */
	function deleteUser($login)
	{
		foreach ($this->_users as $key => $user) {
			if ($user->login === $login) {
				unset($this->_users[$key]);
			}
		}
		return $this->_save();
	}
	
	/**
	 * Save users
	 *
	 * @access private
	 * @return boolean
	 */
	function _save()
	{
		$fileContent = '<?php

/*
 * userlist file, passwords is sha1 hash. for manually change passwords 
 * and generate hashes you can use http://www.md5.br-design.co.uk/ service
 */
 
 ';
		foreach ($this->_users as $user) {
			$fileContent .= sprintf("\t\$users['%s']['password'] = '%s';\r\n",
				$user->login,
				$user->passwordHash
			);
			$fileContent .= sprintf("\t\$users['%s']['access'] = '%s';\r\n",
				$user->login,
				$user->access
			);
		}
		$fileContent .= '?>';
		$result = @file_put_contents(USERS_FILE, $fileContent);
		return ($result === false ? false : true);
	}
	
}
?>