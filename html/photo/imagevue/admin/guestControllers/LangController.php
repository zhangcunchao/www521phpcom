<?php

class LangController extends ivController
{
	/**
	 * Pre-dispatching
	 *
	 */
	function _preDispatch()
	{
		if (!ivAcl::isAdmin()) {
			$this->_forward('login', 'cred');
			if (ivAuth::getCurrentUserLogin()) {
				ivMessenger::add('error', "You don't have access to this page");
			}
			return;
		}
	}
	
	/**
	 * Default action (edit language)
	 *
	 */
	function indexAction()
	{
		$crumbs = &ivPool::get('breadCrumbs');
		$crumbs->push('Languages', 'index.php?c=lang');
		$lang = $this->_getParam('name', 'english');
		if (!preg_match('/^[\w\d\_]+$/', $lang)) {
			ivMessenger::add('error', 'Use only alphanumeric symbols and "_" symbol in language name');
			$this->_redirect('index.php?c=lang');
		}
		$this->view->assign('lang', $lang);
		$crumbs->push($lang, 'index.php?c=lang&amp;name=' . $lang);

		$configFile = LANGS_DIR . $lang . '.xml';
		$xml = ivXml::readFromFile($configFile, DEFAULT_LANG_FILE);

		$this->view->assign('flatConfig', $xml->toFlatTree());
		$this->view->assign('langs', $this->_getLangs());
	}

	/**
	 * Return list of langs file
	 *
	 * @return array
	 * @todo Kill this function
	 */
	function _getLangs()
	{
		$content = getContent(LANGS_DIR);
		$list = array();
		foreach ($content as $item) {
			if (ivFilepath::matchSuffix($item, array('xml'))) {
				$list[] = $item;
			}
		}
		sort($list);
		return $list;
	}

}
?>