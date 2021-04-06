<?php
/**
 * Abstract controller class
 *
 * @author McArrow
 */
class ivControllerFront extends ivControllerAbstract
{
	/**
	 * Dispatcher instance
	 * @var ivControllerDispatcher
	 */
	var $_dispatcher;
	
	/**
	 * Constructor
	 *
	 */
	function ivControllerFront()
	{
		$this->__construct();
	}
	
	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		$this->_dispatcher = &new ivControllerDispatcher();
	}
	
	/**
	 * Return dispatcher
	 *
	 */
	function &getDispatcher()
	{
		return $this->_dispatcher;
	}

	/**
	 * Dispatch method
	 *
	 * @param string $basePath
	 */
	function dispatch($basePath)
	{
// FIXME Debug data
if (!headers_sent()) {
	header('X-FirePHP-Data-100000000001: {');
	header('X-FirePHP-Data-300000000001: "FirePHP.Firebug.Console":[');
	header('X-FirePHP-Data-399999999999: ["__SKIP__"]],');
	header('X-FirePHP-Data-999999999999: "__SKIP__":"__SKIP__"}');
}

		if (get_magic_quotes_gpc()) {
			$_GET = stripslashes_recursive($_GET);
			$_POST = stripslashes_recursive($_POST);
			$_REQUEST = stripslashes_recursive($_REQUEST);
		}

		// Basic routing
		$routingRules = array();
		include($basePath . 'routing.inc.php');
		foreach ($routingRules as $rule) {
			$matched = 0;
			foreach ($rule['match'] as $k => $v) {
				if ((isset($_GET[$k]) && $_GET[$k] == $v)
					|| ('__empty' == $v && (!isset($_GET[$k]) || empty($_GET[$k])))
					|| ('__any' == $v && (isset($_GET[$k]) || !empty($_GET[$k])))) {
					$matched++;
				}
			}
			if (count($rule['match']) == $matched && !isset($controllerName) && !isset($actionName)) {
				$controllerName = (string) $rule['routeTo']['controller'];
				$actionName = (string) $rule['routeTo']['action'];
			}
		}
		
		if (!isset($controllerName) || !isset($actionName)) {
			$controllerName = (string) ivControllerFront::_getParam('c', 'index');
			$actionName = (string) ivControllerFront::_getParam('a', 'index');
		}
		
		$this->_dispatcher->setControllerName($controllerName);
		$this->_dispatcher->setActionName($actionName);

		do {
			$this->_dispatcher->dispatch($basePath);
		} while (!$this->_dispatcher->isComplete());

		$controller = &$this->_dispatcher->getController();
		$controllerName = $this->_dispatcher->getControllerName();
		$actionName = $this->_dispatcher->getActionName();
		
		if ($controller->needRender()) {
			header('Content-Type: text/html; charset=utf-8');
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			$view = $controller->getView();
			$pageContent = $view->fetch("{$controllerName}.{$actionName}");
			
			if ($controller->needLayout()) {
				$layout = new ivLayout($basePath . 'templates/');
				$layout->assign('moduleName', $controllerName);
				$layout->setPageContent($pageContent);
				echo $layout->fetch("layout");
			} else {
				echo $pageContent;
			}
		}
	}

}
?>