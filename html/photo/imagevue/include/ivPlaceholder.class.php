<?php

/**
 * Placeholder class
 *
 */
class ivPlaceholder
{
	var $_placeholders = array();
	
	/**
	 * Set placeholder
	 *
	 * @param string $name
	 * @param string $value
	 */
	function set($name, $value)
	{
		$this->_placeholders[$name] = (string) $value;
	}
	
	/**
	 * Return placeholder
	 * 
	 * @param string $name
	 */
	function get($name)
	{
		return (isset($this->_placeholders[$name]) ? $this->_placeholders[$name] : '');
	}

}
?>