<?php
$pool = array();

/**
 * Pool
 *
 */
class ivPool
{
	/**
	 * Sets something to global pool
	 *
	 * @static
	 * @param mixed $name
	 * @param mixed $value
	 */
	function set($name, &$value)
	{
		global $pool;
		$pool[$name] = &$value;
	}
	
	/**
	 * Gets something from global pool
	 * 
	 * @static
	 * @param mixed $name
	 */
	function &get($name)
	{
		global $pool;
		return $pool[$name];
	}

}
?>