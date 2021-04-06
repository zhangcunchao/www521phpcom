<?php
/**
 * Base XML node class
 *
 * @author McArrow
 */
class ivXmlNode
{
	/**
	 * Node's name
	 * @access private
	 * @var string
	 */
	var $_name = null;

	/**
	 * Node's value
	 * @access protected
	 * @var mixed
	 */
	var $_value = null;

	/**
	 * Node's children
	 * @access private
	 * @var array
	 */
	var $_children = array();

	/**
	 * Node's attributes
	 * @access private 
	 * @var array
	 */
	var $_attributes = array();

	/**
	 * Constructor
	 *
	 * @access protected
	 * @param  string    $name
	 * @param  array     $attrs
	 */
	function ivXmlNode($name, $attrs = array())
	{
		$this->__construct($name, $attrs);
	}
	
	/**
	 * Constructor
	 *
	 * @access protected
	 * @param  string    $name
	 * @param  array     $attrs
	 */
	function __construct($name, $attrs = array())
	{
		$this->_name = $name;
		$this->setAttributes($attrs);
	}
	
	/**
	 * Creates XML node
	 *
	 * @param  string    $name
	 * @param  array     $attrs
	 * @return ivXmlNode
	 */
	function &create($name, $attrs = array())
	{
		$className = 'ivXmlNode';
		if (isset($attrs['type']) && class_exists('ivXmlNode' . ucfirst($attrs['type']))) {
			$className .= ucfirst($attrs['type']);
		}
		$node = new $className($name, $attrs);
		return $node;
	}

	/**
	 * Return node's name
	 *
	 * @return string
	 */
	function getName()
	{
		return $this->_name;
	}

	/**
	 * Set node's value
	 *
	 * @param string $value
	 */
	function setValue($value)
	{
		$trimmed = trim($value);
		$this->_value = empty($trimmed) && 0 !== $trimmed && '0' !== $trimmed ? null : $value;
	}
	
	/**
	 * Return node's value
	 *
	 * @return mixed
	 */
	function getValue()
	{
		return $this->_value;
	}
	
	/**
	 * Add new child
	 *
	 * @param ivXmlNode $child
	 */
	function addChild(&$child)
	{
		$this->_children[] = &$child;
	}

	/**
	 * Retun if node has children
	 *
	 * @return boolean
	 */
	function hasChildren()
	{
		return (count($this->_children) > 0);
	}

	/**
	 * Return array of children
	 *
	 * @return array
	 */
	function &getChildren()
	{
		return $this->_children;
	}

	/**
	 * Set one attribute
	 *
	 * @param string $name
	 * @param string $value
	 */
	function setAttribute($name, $value)
	{
		$this->_attributes[$name] = $value;
	}

	/**
	 * Set a collection of attributes
	 *
	 * @param array $attributes
	 */
	function setAttributes($attributes)
	{
		foreach ($attributes as $attrName => $attrValue) {
			$this->setAttribute($attrName, $attrValue);
		}
	}

	/**
	 * Return all node's attributes
	 *
	 * @return array
	 */
	function &getAttributes()
	{
		return $this->_attributes;
	}

	/**
	 * Return one attribute by it's name
	 *
	 * @param  string $name
	 * @return string
	 */
	function getAttribute($name)
	{
		$attributes = &$this->getAttributes();
		return (array_key_exists($name, $attributes) ? $attributes[$name] : null);
	}
	
	/**
	 * Removes one attribute by it's name
	 *
	 * @param  string $name
	 */
	function removeAttribute($name)
	{
		if (isset($this->_attributes[$name])) {
			unset($this->_attributes[$name]);
		}
	}

	/**
	 * Return array of all nodes
	 *
	 * @return array
	 */
	function toFlatTree()
	{
		$flatTree = array();
		$this->_toFlatTree($flatTree, 0, '/' . $this->getName());
		return $flatTree;
	}

	/**
	 * Return array of all nodes
	 *
	 * Recursive
	 * 
	 * @access private
	 * @param  array   $flatTree
	 * @param  integer $depth
	 * @param  string  $path
	 */
	function _toFlatTree(&$flatTree, $depth, $path)
	{
		$nodeInfo = array();
		$nodeInfo['path'] = $path;
		$nodeInfo['node'] = $this;
		$nodeInfo['depth'] = $depth;
		$flatTree[] = $nodeInfo;
		foreach ($this->_children as $child) {
			if ($child->hasChildren()) {
				$child->_toFlatTree($flatTree, $depth + 1, $path . '/' . $child->getName());
			}
		}
		foreach ($this->_children as $child) {
			if (!$child->hasChildren()) {
				$child->_toFlatTree($flatTree, $depth + 1, $path . '/' . $child->getName());
			}
		}
	}
	
	/**
	 * Search node by constraint in child nodes
	 *
	 * @param  string $name
	 * @param  array  $constraint
	 * @return ivXmlNode
	 */
	function &findNode($name, $constraint)
	{
		foreach ($this->_children as $key => $child) {
			if (empty($constraint)) {
				$foundKey = ($child->getName() == $name) ? $key : null;
				if (!is_null($foundKey)) {
					$found = &$this->_children[$foundKey];
					return $found;
				}
			} else {
				$foundKey = ($child->getName() == $name && (!empty($constraint) && $child->getAttribute($constraint['attrName']) == $constraint['attrValue'])) ? $key : null; 
				if (!is_null($foundKey)) {
					$found = &$this->_children[$foundKey];
					return $found;
				}
			}
		}
		$found = null;
		return $found;
	}

	/**
	 * Return node's serialized value
	 *
	 * @access protected
	 * @return string
	 */
	function _getSerializedValue()
	{
		return (string) $this->getValue();
	}

	/**
	 * Returns XML string for node
	 *
	 * @param  boolean $valuesOnly
	 * @param  integer   $depth
	 * @return string
	 */
	function toString($valuesOnly = false, $depth = 0)
	{
		$indent = str_repeat("\t", $depth);
		$result = $indent;
		$result .= '<' . $this->getName() . ' ';
		if (!$valuesOnly) {
			foreach ($this->getAttributes() as $attrName => $attrValue) {
				if (!empty($attrValue) || 0 == $attrValue || '0' == $attrValue) {
					$result .= $attrName . '="' . htmlspecialchars($attrValue, ENT_COMPAT, 'UTF-8') . '" ';
				}
			}
		}
		$result = substr($result, 0, -1);
		if (($this->getValue() === null) && !$this->hasChildren()) {
			// There is some strange bug with empty tags in XML_Parser, so we need to use
			// <foo></foo> instead of <foo />
			$result .= "></" . $this->getName() . ">\r\n";
		} else {
			$result .= '>';
			if ($this->hasChildren()) {
				$result .= "\r\n";
				foreach ($this->getChildren() as $child) {
					$result .= $child->toString($valuesOnly, $depth + 1);
				}
				$result .= $indent;
			} else {
				$result .= htmlspecialchars($this->_getSerializedValue(), ENT_COMPAT, 'UTF-8');
			}
			$result .= '</' . $this->getName() . '>';
			$result .= "\r\n";
		}
		return $result;
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
		$html = '<input name="' . $name . '" type="text" value="' . htmlspecialchars($this->_getSerializedValue()) . '" onfocus="myhelp(true, \'' . $id . '\')" onblur="myhelp(false, \'' . $id . '\')" />';
		return $html;
	}
	
}
?>