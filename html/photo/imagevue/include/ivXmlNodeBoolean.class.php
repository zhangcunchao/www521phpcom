<?php
/**
 * Boolean XML node class
 *
 * @author McArrow
 */
class ivXmlNodeBoolean extends ivXmlNode
{
	/**
	 * Set node's value
	 *
	 * @param string|boolean $value
	 */
	function setValue($value)
	{
		if (is_string($value) && 'true' === $value) {
			$this->_value = true;
		} elseif (is_string($value) && 'false' === $value) {
			$this->_value = false;
		} else {
			$this->_value = (bool) $value;
		}
	}
	
	/**
	 * Return node's serialized value
	 *
	 * @access protected
	 * @return string
	 */
	function _getSerializedValue()
	{
		return $this->getValue() ? 'true' : 'false';
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
		$html = '<input name="' . $name . '" type="hidden" value="false" />';
		$html .= '<input name="' . $name . '" type="checkbox" value="true" ' . ($this->getValue() ? 'checked="checked"' : '') . ' onfocus="myhelp(true, \'' . $id . '\')" onblur="myhelp(false, \'' . $id . '\')" />';
		return $html;
	}
	
}
?>