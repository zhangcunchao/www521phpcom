<?php

class CacheController extends ivController
{
	/**
	 * Clears cache
	 *
	 */
	function clearAction()
	{
		ivMessenger::add('notice', 'Cache cleared');
		$this->_redirect('index.php');
	}

}
?>