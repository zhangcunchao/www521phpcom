<?php

/**
 * Messenger
 *
 * @static
 * @author McArrow
 */
class ivMessenger
{
	/**
	 * Adds new message by type
	 *
	 * @param string $type
	 * @param string $message
	 */
	function add($type, $message)
	{
		$_SESSION['messages'][$type][] = $message;
	}

	/**
	 * Returns an array of messages by type
	 *
	 * @param string $type
	 * @return array
	 */
	function get($type, $clear = true)
	{
		if (isset($_SESSION['messages'][$type])) {
			$m = $_SESSION['messages'][$type];
			if ($clear) {
				unset($_SESSION['messages'][$type]);
			}
			return array_unique($m);
		} else {
			return array();
		}
	}

}
?>