<?php
/**
 * Base controller
 *
 * @author McArrow
 */
class ivController extends ivControllerAbstract
{
	/**
	 * Instance of view
	 * @var ivView
	 */
	var $view;
	
	/**
	 * Config object
	 * @var ivXml
	 */
	var $conf = null;

	/**
	 * Placeholder object
	 * @var ivPlaceholder
	 */
	var $placeholder = null;
	
	/**
	 * Need render template?
	 * @var boolean
	 */
	var $_needRender = true;
	
	/**
	 * Need render layout?
	 * @var boolean
	 */
	var $_needLayout = true;

	/**
	 * Constructor
	 *
	 * @param string $path
	 */
	function ivController($path)
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
		$this->view = &new ivView($path . 'templates/');
		$this->conf = &ivPool::get('conf');
		$this->placeholder = &ivPool::get('placeholder');
		$this->init();
	}
	
	/**
	 * Initialization method
	 *
	 */
	function init()
	{}

	/**
	 * Returns instance of view
	 *
	 * @return ivView
	 */
	function &getView()
	{
		return $this->view;
	}

	/**
	 * Pre-dispatch method. Must be called after constructor
	 * 
	 */
	function _preDispatch()
	{}

	/**
	 * Post-dispatch method. Must be called after action
	 * 
	 */
	function _postDispatch()
	{}
	
	/**
	 * Disable rendering of template
	 *
	 * @access protected
	 */
	function _setNoRender()
	{
		$this->_needRender = false;
	}
	
	/**
	 * Return need of rendering template
	 *
	 */
	function needRender()
	{
		return $this->_needRender;
	}
	
	/**
	 * Disable rendering of layout
	 *
	 * @access protected
	 */
	function _disableLayout()
	{
		$this->_needLayout = false;
	}
	
	/**
	 * Return need of rendering layout
	 *
	 */
	function needLayout()
	{
		return $this->_needLayout;
	}
	
	/**
	 * Do forward
	 *
	 */
	function _forward($actionName, $controllerName = null)
	{
		$frontController = &ivPool::get('frontController');
		$dispatcher = &$frontController->getDispatcher();
		$dispatcher->setActionName($actionName);
		if (!empty($controllerName)) {
			$dispatcher->setControllerName($controllerName);
		}
		$dispatcher->setComplete(false);
	}
	
}
?>