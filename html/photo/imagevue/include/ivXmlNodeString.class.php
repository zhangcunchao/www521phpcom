<?php
/**
 * String XML node class
 *
 * @author McArrow
 */
class ivXmlNodeString extends ivXmlNode
{
	/**
	 * Set node's value
	 *
	 * @param string $value
	 */
	function setValue($value)
	{
		parent::setValue(trim($value));
	}	
}
?>