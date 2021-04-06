<?php

define('STATE_DIRTY', 'STATE_DIRTY');
define('STATE_CLEAN', 'STATE_CLEAN');

$GLOBALS['fsItems'] = array();

/**
 * File system item class
 *
 * @abstract
 * @author McArrow
 */
class ivFSItem
{
	/**
	 * Path
	 * @var string
	 */
	var $_path;

	/**
	 * Path
	 * @var string
	 */
	var $_xml;

	/**
	 * Properties
	 * @var array
	 */
	var $_properties = array();

	/**
	 * Attributes
	 * @var array
	 */
	var $_attributes = array();

	/**
	 * Attributes
	 * @var array
	 */
	var $_userAttributes = array();

	/**
	 * Object state
	 * @var string
	 */
	var $_state = STATE_CLEAN;

	/**
	 * Constructor
	 *
	 * @access protected
	 * @param  string $path
	 */
	function ivFSItem($path)
	{
		$this->__construct($path);
	}
	
	/**
	 * Constructor
	 *
	 * @access protected
	 * @param  string $path
	 */
	function __construct($path)
	{
		if (version_compare(PHP_VERSION, '5.0.0') === -1) {
			register_shutdown_function(array(&$this, '__destruct'));
		}
	}

	/**
	 * Destructor
	 *
	 * @access protected
	 */
	function __destruct()
	{
		if (STATE_DIRTY == $this->getState()) {
			$this->save();
		}
	}

	/**
	 * Returns state of an object
	 * 
	 * @return string
	 */
	function getState()
	{
		return $this->_state;
	}

	/**
	 * Sets state of an object
	 *
	 * @access protected
	 * @param  string    $state
	 */
	function _setState($state)
	{
		if (STATE_DIRTY == $state || STATE_CLEAN == $state) {
			$this->_state = $state;
		}
	}

	/**
	 * Factory method
	 *
	 * @static
	 * @param  string $path
	 * @return ivFSItem
	 */
	function create($path)
	{
		$conf = ivPool::get('conf');
		$contentDir = ivPath::canonizeAbsolute(ROOT_DIR . ivPath::canonizeRelative($conf->get('/config/imagevue/settings/contentfolder')));
		if (substr(ivPath::canonizeAbsolute($path), 0, strlen($contentDir)) != $contentDir) {
			return;
		}

		if (isset($GLOBALS['fsItems'][$path]) && is_a($GLOBALS['fsItems'][$path], 'ivFSItem')) {
			$item = &$GLOBALS['fsItems'][$path];
		} else {
			if (ivFolder::isSupported($path)) {
				$item = new ivFolder(ivPath::canonizeAbsolute($path));
			} elseif (ivFileImage::isSupported($path)) {
				$item = new ivFileImage(ivPath::canonizeAbsolute($path, true));
			} elseif (ivFileMP3::isSupported($path)) {
				$item = new ivFileMP3(ivPath::canonizeAbsolute($path, true));
			} elseif (ivFile::isSupported($path)) {
				$item = new ivFile(ivPath::canonizeAbsolute($path, true));
			}
			$GLOBALS['fsItems'][$path] = &$item;
		}

		return $item;
	}
	
	/**
	 * Checks if path supported by this object
	 *
	 * @static
	 * @param  string $path
	 * @return boolean
	 */
	function isSupported($path)
	{
		return false;
	}

	/**
	 * Initialize properties
	 *
	 * @abstract 
	 * @access protected
	 */
	function _initProperties()
	{
		trigger_error('Call to abstract method', E_USER_ERROR);
	}

	/**
	 * Set property value
	 *
	 * @access protected
	 * @param  string $name
	 * @param  mixed  $value
	 */
	function _setProperty($name, $value)
	{
		if (array_key_exists($name, $this->_properties)) {
			$this->_properties[$name] = $value;
		}
	}

	/**
	 * Return property by name
	 *
	 * @param  string $name
	 * @return array
	 */
	function getProperty($name)
	{
		$props = $this->getProperties();
		return isset($props[$name]) ? $props[$name] : null;
	}

	/**
	 * Return all properties
	 *
	 * @return array
	 */
	function getProperties()
	{
		return $this->_properties;
	}

	/**
	 * Set attribute value
	 *
	 * @param string $name
	 * @param mixed  $value
	 */
	function setAttribute($name, $value)
	{
		if (array_key_exists($name, $this->_attributes)) {
			$this->_attributes[$name] = $value;
		}
	}

	/**
	 * Return attribute by name
	 *
	 * @param  string $name
	 * @return mixed
	 */
	function getAttribute($name)
	{
		$attrs = $this->getAttributes();
		return isset($attrs[$name]) ? $attrs[$name] : null;
	}

	/**
	 * Return all attributes
	 *
	 * @return array
	 */
	function getAttributes()
	{
		return $this->_attributes;
	}

	/**
	 * Initialize user attributes
	 *
	 * @access protected
	 */
	function _initUserAttributes()
	{
		trigger_error('Call to abstract method', E_USER_ERROR);
	}
	
	/**
	 * Set attribute value
	 *
	 * @param string $name
	 * @param mixed  $value
	 */
	function setUserAttribute($name, $value)
	{
		if (array_key_exists($name, $this->_userAttributes)) {
			$this->_userAttributes[$name] = $value;
		}
	}

	/**
	 * Return attribute by name
	 *
	 * @param  string $name
	 * @return mixed
	 */
	function getUserAttribute($name)
	{
		$attrs = $this->getUserAttributes();
		return isset($attrs[$name]) ? $attrs[$name] : null;
	}

	/**
	 * Return all attributes
	 *
	 * @return array
	 */
	function getUserAttributes()
	{
		return $this->_userAttributes;
	}

	/**
	 * Save data
	 *
	 * @return boolean
	 */
	function save()
	{
		trigger_error('Call to abstract method', E_USER_ERROR);
	}
	
	/**
	 * Return ancestor of current item
	 *
	 * @return ivFSItem
	 */
	function getAncestor()
	{
		return ivFSItem::create(ivPath::canonizeAbsolute(dirname($this->_path)));
	}
	
	/**
	 * Return relative path
	 *
	 * @deprecated
	 * @access protected
	 * @return string
	 */
	function _getRelativePath()
	{
		return str_replace('//', '/', str_replace('\\', '/', substr($this->_path, strlen(ROOT_DIR))));
	}
	
	/**
	 * Return relative path to thumbnail
	 *
	 * @return string
	 */
	function getThumbRelativePath()
	{
		return ivPath::canonizeRelative(substr($this->getThumb(), strlen(ROOT_DIR)), true);
	}

	/**
	 * Return path to thumbnail
	 *
	 * @return string
	 */
	function getThumb()
	{
		return BASE_DIR . 'images/defaultThumb.jpg';
	}
	
	/**
	 * Generate thumb
	 *
	 */
	function generateThumb()
	{}

	/**
	 * Returns self XML-node
	 *
	 * @abstract 
	 * @return ivXmlNode 
	 */
	function &asXml()
	{
		trigger_error('Call to abstract method', E_USER_ERROR);
	}

	/**
	 * Returns FSItem's title
	 *
	 * @return string
	 */
	function getTitle()
	{
		$title = $this->getAttribute('title');
		if (!$title) {
			$title = $this->getProperty('name');
		}
		return $title; 
	}

}
?>