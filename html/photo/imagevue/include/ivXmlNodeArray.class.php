<?php
/**
 * Array XML node class
 *
 * @author McArrow
 */
class ivXmlNodeArray extends ivXmlNode
{
	/**
	 * Node's value
	 * @access protected
	 * @var array
	 */
	var $_value = array();
	
	/**
	 * Delimeter
	 * @access protected
	 * @var string
	 */
	var $_delimeter = ',';

	/**
	 * Array of allowed values
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
		$this->_values = array_explode_trim($this->_delimeter, $this->getAttribute('options'));
	}
	
	/**
	 * Set node's value
	 *
	 * @param string|array $value
	 */
	function setValue($value)
	{
		if (is_string($value)) {
			$value = array_explode_trim($this->_delimeter, $value);
		} elseif (is_null($value)) {
			$value = array();
		} elseif (!is_array($value)) {
			return;
		}
		$this->_value = empty($this->_values) ? $value : array_intersect($this->_values, $value);
	}
	
	/**
	 * Return node's serialized value
	 *
	 * @access protected
	 * @return string
	 */
	function _getSerializedValue()
	{
		return implode($this->_delimeter, $this->getValue());
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
		if (!empty($this->_values)) {
			$html = '<input type="hidden" name="' . $name . '" style="visibility: hidden; width: 1px; height: 1px;"/>';
			$html .= '<select name="' . $name . '[]" multiple="multiple" onfocus="myhelp(true, \'' . $id . '\')" onblur="myhelp(false, \'' . $id . '\')">';
			foreach ($this->_values as $value) {
				$html .= '<option value="' . htmlspecialchars($value) . '" ' . (in_array($value, $this->getValue()) ? 'selected="selected"' : '') . '>' . htmlspecialchars($value) . '</option>';
			}
			$html .= '</select>';
		} else {
			$html = parent::toFormElement($name, $id);
		}
		return $html;
	}
	
}
?>