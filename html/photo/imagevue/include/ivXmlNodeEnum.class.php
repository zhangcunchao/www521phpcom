<?php
/**
 * Enum XML node class
 *
 * @author McArrow
 */
class ivXmlNodeEnum extends ivXmlNode
{
	/**
	 * Array of values
	 *
	 * @var array
	 */
	var $_values = array();
	
	/**
	 * Constructor
	 *
	 * @access protected
	 * @param  string    $name
	 * @param  array     $attrs
	 */	
	function __construct($name, $attrs = array())
	{
		parent::__construct($name, $attrs);
		$this->_values = array_explode_trim(',', $this->getAttribute('options'));
	}
	
	/**
	 * Set node's value
	 *
	 * @param string $value
	 */
	function setValue($value)
	{
		if (in_array($value, $this->_values)) {
			$this->_value = $value;
		}
	}

	/**
	 * Returns HTML form element for current node
	 *
	 * @param  string $name
	 * @param  string $id
	 * @return string
	 */
	function toFormElement($name, $id)
	{
		$html = '<select name="' . $name . '" onfocus="myhelp(true, \'' . $id . '\')" onblur="myhelp(false, \'' . $id . '\')">';
		foreach ($this->_values as $value) {
			$html .= '<option value="' . htmlspecialchars($value) . '" ' . ($this->getValue() == $value ? 'selected="selected"' : '') . '>' . htmlspecialchars($value) . '</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
}
?>