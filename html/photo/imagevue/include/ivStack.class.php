<?php

/**
 * Stack class
 *
 */
class ivStack
{
	/**
	 * Stack storage
	 * @access private
	 * @var array
	 */
	var $_list = array();
	
	/**
	 * Pushes element to stack
	 *
	 * @param mixed $element
	 */
	function push(&$element)
	{
		$this->_list[$this->_getDepth()] = &$element; 
	}
	
	/**
	 * Pops element from stack
	 *
	 * @return mixed
	 */
	function &pop()
	{
		$result = &$this->_list[$this->_getDepth() - 1];
		unset($this->_list[$this->_getDepth() - 1]);
		return $result;
	}
	
	/**
	 * Returns first element of stack
	 *
	 * @return mixed
	 */
	function &head()
	{
		return $this->_list[0];
	}
	
	/**
	 * Returns last element of stack (without popping)
	 *
	 * @return mixed
	 */
	function &tail()
	{
		return $this->_list[$this->_getDepth() - 1];
	}
	
	/**
	 * Returns a size of stack
	 *
	 * @access private
	 * @return integer
	 */
	function _getDepth()
	{
		return sizeof($this->_list);
	}

}
?>