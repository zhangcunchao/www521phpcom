<?php
/**
 * Layout
 *
 * @author McArrow
 */
class ivLayout extends ivView
{
	/**
	 * Page content
	 * @var string
	 */
	var $_content;
	
	/**
	 * Sets page content
	 *
	 * @param string $content
	 */
	function setPageContent($content)
	{
		$this->_content = (string) $content;
	}
	
	/**
	 * Returns page content
	 *
	 * @return unknown
	 */
	function getPageContent()
	{
		return $this->_content;
	}

}
?>