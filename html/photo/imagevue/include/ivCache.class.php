<?php
$cache = array();

/**
 * Cache
 *
 */
class ivCache
{
	/**
	 * Sets something to cache
	 *
	 * @static
	 * @param mixed $name
	 * @param mixed $value
	 */
	function set($name, &$value)
	{
		global $cache;
		$cache[$name] = &$value;
	}
	
	/**
	 * Gets something from cache
	 * 
	 * @static
	 * @param mixed $name
	 */
	function &get($name)
	{
		global $cache;
		$cached = null;
		if (isset($cache[$name])) {
			$cached = &$cache[$name];
		}
		return $cached;
	}

	/**
	 * Removes something from cache
	 *
	 * @static
	 * @param mixed $name
	 */
	function remove($name)
	{
		global $cache;
		if (isset($cache[$name])) {
			unset($cache[$name]);
		}
	}

}
?>