<?php

/**
 * View class
 *
 * @author McArrow
 */
class ivView
{
	var $_ext = '.phtml';
	
	/**
	 * Path to templates directory
	 * @access private
	 * @var string
	 */
	var $_path;

	/**
	 * Placeholder object
	 * @var ivPlaceholder
	 */
	var $placeholder = null;

	/**
	 * Constructor
	 *
	 * @param string $path
	 */
	function ivView($path)
	{
		$this->__construct($path);
	}
	
	/**
	 * Constructor
	 *
	 * @param string $path
	 */
	function __construct($path)
	{
		$this->_path = $path;
		$this->placeholder = &ivPool::get('placeholder');
	}

	/**
	 * Assigns a variable
	 *
	 * @param string $name  Variable's name
	 * @param mixed  $value Variable's value
	 */
	function assign($name, $value = null)
	{
		if (is_string($name)) {
			$this->$name = $value;
		}
	}

    /**
     * Returns rendered template
     *
	 * @param  string $template Template filename
     * @return string
     */
	function fetch($template)
	{
		$templatePath = $this->_path . $template . $this->_ext;
		if (is_file($templatePath)) {
			ob_start();
			include $templatePath;
			$result = ob_get_contents();
			ob_end_clean();
			return $result;
		}
	}

}
?>