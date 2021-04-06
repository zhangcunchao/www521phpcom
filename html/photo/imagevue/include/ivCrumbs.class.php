<?php

/**
 * BreadCrumbs class
 *
 * @author McArrow
 */
class ivCrumbs
{
	/**
	 * Array of crumbs
	 * @access private
	 * @var    array
	 */
	var $_crumbs = array();

	/**
	 * Adds a new crumb
	 *
	 * @param string $title
	 * @param string $url
	 * @param string $suffix
	 * @param string $className
	 */
	function push($title, $url='', $suffix = '', $className = '')
	{
		$crumb = new stdClass();
		$crumb->title = $title;
		$crumb->url = $url;
		$crumb->suffix = $suffix;
		$crumb->className = $className;
		$this->_crumbs[] = $crumb;
	}

	/**
	 * Returns title of last crumb
	 *
	 * @return string
	 */
	function tail()
	{
		$tail = $this->_crumbs[count($this->_crumbs) - 1];
		return $tail->title;
	}
	
	/**
	 * Returns array of crumbs
	 *
	 * @return array
	 */
	function get()
	{
		return $this->_crumbs;
	}

	/**
	 * Returns array count	 *
	 * @return array
	 */
	function count()
	{
		return count($this->_crumbs);
	}
	
	/**
	 * Clears array
	 */
	
	function clear()
	{
		$this->_crumbs=array();
		
	}
	

}
?>