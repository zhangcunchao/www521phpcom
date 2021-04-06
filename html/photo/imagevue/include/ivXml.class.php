<?php
/**
 * XML wrapper class
 *
 */
class ivXml
{
	/**
	 * Root node
	 * @var ivXmlNode
	 */
	var $_nodeTree = null;

	/**
	 * File, from which values was read
	 * @var string
	 */
	var $_valuesFile;

	/**
	 * File or xml structure, from which description was read
	 * @var string|ivXml
	 */
	var $_descriptionFile;
	
	/**
	 * Return file, from which values was read
	 *
	 * @return string
	 */
	function getValuesFile()
	{
		return $this->_valuesFile;
	}

	/**
	 * Sets file, from which values was read
	 *
	 * @access private
	 * @param  string  $file
	 */
	function _setValuesFile($file)
	{
		$this->_valuesFile = (string) $file;
	}

	/**
	 * Return file or xml structure, from which description was read
	 *
	 * @return string|ivXml
	 */
	function &getDescriptionFile()
	{
		return $this->_descriptionFile;
	}

	/**
	 * Sets file or xml structure, from which description was read
	 *
	 * @access private
	 * @param  string|ivXml  $file
	 */
	function _setDescriptionFile($file = null)
	{
		if (is_string($file) || is_a($file, 'ivXml') || is_null($file)) {
			$this->_descriptionFile = &$file;
		} else {
			trigger_error('Value of incompatible type (' . gettype($file) . ') passed to ivXml::_setDescriptionFile()', E_USER_ERROR);
		}
	}
	
	/**
	 * Set XML tree root node 
	 *
	 * @param ivXmlNode $node
	 */
	function setNodeTree(&$node)
	{
		if (!is_a($node, 'ivXmlNode')) {
			trigger_error('Argument passed to ivXml::setNodeTree() must be an instance of ivXmlNode', E_USER_ERROR);
		}
		$this->_nodeTree = &$node;
	}

	/**
	 * Returns XML tree root node 
	 *
	 * @param ivXmlNode $node
	 */
	function &getNodeTree()
	{
		return $this->_nodeTree;
	}

	/**
	 * Reads XML structure from file
	 * 
	 * @static
	 * @param  string  $file
	 * @param  string  $descriptionFile
	 * @return ivXml
	 */
	function &readFromFile($file, $descriptionFile = null)
	{
		if (!is_null($descriptionFile)) {
			$valueXml = &ivXml::_readFromFile($file, true);
			$descriptionXml = is_string($descriptionFile) ? ivXml::_readFromFile($descriptionFile) : $descriptionFile;
			$resultXml = &$descriptionXml->_clone();
			foreach ($valueXml->toFlatTree() as $item) {
				if ($node = &$resultXml->findByXPath($item['path'])) {
					$node->setValue($item['node']->getValue());
				} else {
					$node = &$resultXml->add($item['path'], $item['node']);
				}
			}
			$resultXml->_setValuesFile($file);
			$resultXml->_setDescriptionFile($descriptionXml);
			return $resultXml;
		} else {
			$xml = &ivXml::_readFromFile($file);
			$xml->_setValuesFile($file);
			return $xml;
		}
	}
	
	/**
	 * Read XML structure from file
	 * 
	 * @access private
	 * @param  string  $file
	 * @param  boolean $force
	 * @return ivXml
	 */
	function &_readFromFile($file, $force = false)
	{
		if ($force) {
			ivCache::remove($file);
		}

		if (!ivCache::get($file)) {
			if (file_exists($file)) {
				$xml = new ivXml();
				$xmlTree = &ivXmlParser::parse($file);
				if (false === $xmlTree) {
					// Empty file, nothing to do here
				} elseif (!is_a($xmlTree, 'ivXmlNode')) {
					trigger_error(sprintf('Error occured while parsing file %s', substr($file, strlen(ROOT_DIR) - 1)), E_USER_ERROR);
				} else {
					$xml->setNodeTree($xmlTree); 
				}
				unset($parser);
			} else {
				$xml = new ivXml();
			}
			ivCache::set($file, $xml);
		}
		$cached = &ivCache::get($file);
		return $cached;
	}

	/**
	 * Clones XML structure
	 * 
	 * @access private
	 * @return ivXml
	 */
	function &_clone()
	{
		$xml = new ivXml();
		$xml->_setValuesFile($this->getValuesFile());
		$xml->_setDescriptionFile($this->getDescriptionFile());

		$tree = &$this->_cloneNode($this->getNodeTree());
		$xml->setNodeTree($tree);

		return $xml;
	}
	
	/**
	 * Clones XML node
	 * 
	 * Recursive
	 * 
	 * @access private
	 * @param  $node     ivXmlNode
	 * @return ivXmlNode
	 */
	function &_cloneNode(&$node)
	{
		$cloned = ivXmlNode::create($node->getName(), $node->getAttributes());
		$cloned->setValue($node->getValue());
		foreach ($node->getChildren() as $child) {
			$cloned->addChild($this->_cloneNode($child));
		}
		return $cloned;
	}

	/**
	 * Write XML structure to file
	 *
	 * @param  string  $file
	 * @return boolean Operation status
	 */
	function writeToFile($file = null)
	{
		if (!is_null($this->getDescriptionFile())) {
			if (is_string($this->getDescriptionFile())) {
				$descriptionXml = &ivXml::readFromFile($this->getDescriptionFile());
			} else {
				$descriptionXml = &$this->getDescriptionFile();
			}
			$resultXml = &$descriptionXml->_clone();
			$flatTree = &$resultXml->toFlatTree();
			foreach (array_reverse($flatTree) as $nodeItem) {
				$descNode = &$resultXml->findByXPath($nodeItem['path']);
				$valueNode = &$this->findByXPath($nodeItem['path']);
				$children = $descNode->getChildren();
				if (($valueNode && $descNode->getValue() == $valueNode->getValue() && empty($children)) || !$valueNode) {
					$resultXml->remove($nodeItem['path']);
				} else {
					$descNode->setValue($valueNode->getValue());
				}
			}
			$xmlString = $resultXml->toString(true);
		} else {
			$xmlString = $this->toString(false);
		}
		$conf = &ivPool::get('conf');
		$file = is_null($file) ? $this->getValuesFile() : $file;
		$result = is_file($file) || mkdirRecursive(dirname($file), 0777);
		$result &= (boolean) file_put_contents($file, $xmlString);
		@chmod($file, octdec($conf->get('/config/imagevue/settings/chmod')));
		return (boolean) $result;
	}

	/**
	 * Returns XML as string
	 *
	 * @param  boolean $valuesOnly
	 * @return string
	 */
	function toString($valuesOnly = false)
	{
		$xmlString = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
		$xmlString .= $this->_nodeTree->toString($valuesOnly);
		return $xmlString;
	}

	/**
	 * Return array of all nodes
	 *
	 * @param  integer $depth
	 * @param  string $path
	 * @return array
	 */
	function &toFlatTree()
	{
		$flatTree = array();
		$treeNode = &$this->getNodeTree();
		if ($treeNode) {
			$flatTree = $treeNode->toFlatTree();
		}
		return $flatTree;
	}
	
	/**
	 * Removes node from node tree
	 *
	 * @param  ivXmlNode|string $node
	 * @return boolean
	 */
	function remove(&$node)
	{
		if (is_string($node) && strrpos($node, '/') > 1) {
			$parentNodeXPath = substr($node, 0, strrpos($node, '/'));
			$parentNode = &$this->findByXPath($parentNodeXPath);
			$toRemove = &$this->findByXPath($node);
			// FIXME Usage of private property 
			foreach ($parentNode->_children as $key => $child) {
				if ($child == $toRemove) {
					unset($parentNode->_children[$key]);
					return true;
				}
			}
		} elseif (is_a($node, 'ivXmlNode')) {
			return $this->_remove($this->_nodeTree, $node);
		} else {
			return false;
		}
	}

	/**
	 * Removes node from node tree
	 *
	 * Recursive
	 * 
	 * @access private
	 * @param  ivXmlNode $node
	 * @return boolean
	 */
	function _remove(&$node, &$toRemove)
	{
		// FIXME Usage of private property 
		foreach ($node->_children as $key => $child) {
			if ($child == $toRemove) {
				unset($node->_children[$key]);
				return true;
			}
			$this->_remove($node->_children[$key], $toRemove);
		}
		return false;
	}

	/**
	 * Search node by XPath
	 *
	 * @param  string $xPath
	 * @return ivXmlNode
	 */
	function &findByXPath($xPath)
	{
		$pathElements = array_explode_trim('/', $xPath);
		$node = &$this;
		$found = null;
		foreach ($pathElements as $pathElement) {
			$matches = array();
			if (preg_match('/^([-\w_]+)(\[[^\]]+\])?$/i', $pathElement, $matches)) {
				$name = $matches[1];
				$constraintString = isset($matches[2]) ? substr($matches[2], 1, -1) : '';
				if ($constraintString && strpos($constraintString, '=')) {
					$constraint = array(
						'attrName' => substr($constraintString, 0, strpos($constraintString, '=')),
						'attrValue' => substr($constraintString, strpos($constraintString, '=') + 1),
					);
				} else {
					$constraint = null;
				}
				$found = &$node->findNode($name, $constraint);
				if ($found) {
					$node = &$found; 
				} else {
					$found = null;
					break;
				}
			} else {
				$found = null;
				break;
			}
		}
		return $found;
	}
	
	/**
	 * Search node by constraint
	 *
	 * @param  string $name
	 * @param  array $constraint
	 * @return ivXmlNode
	 */
	function &findNode($name, $constraint)
	{
		$node = &$this->getNodeTree();
		$found = null;
		if (!is_null($node) && $node->getName() == $name) {
			if (empty($constraint) || $node->getAttribute($constraint['attrName']) == $constraint['attrValue']) {
				$found = &$node;
			}
		}
		return $found;
	}

	/**
	 * Returns selected by XPath node's value
	 *
	 * @param  string $xPath
	 * @return mixed
	 */
	function get($xPath)
	{
		$node = &$this->findByXPath($xPath);
		return $node->getValue();
	}

	/**
	 * Sets selected by XPath node's value
	 *
	 * @param string $xPath
	 * @param mixed  $value
	 */
	function set($xPath, $value)
	{
		$node = &$this->findByXPath($xPath);
		$node->setValue($value);
	}
	
	/**
	 * Adds a node to tree
	 *
	 * Recursive
	 * 
	 * @param  string    $xPath
	 * @param  ivXmlNode $node
	 * @return ivXmlNode
	 */
	function &add($xPath, $node = null)
	{
		$parentXPath = substr($xPath, 0, strrpos($xPath, '/'));
		$parentNode = &$this->findByXPath($parentXPath);
		if (!$parentNode) {
			$parentNode = &$this->add($parentXPath);
		}
		if (is_null($node)) {
			$nodeName = substr($xPath, strlen($parentXPath) + 1);
			$node = &ivXmlNode::create($nodeName);
			$parentNode->addChild($node);
			return $node;
		}
		$parentNode->addChild($node);
		return $node;
	}

}
?>