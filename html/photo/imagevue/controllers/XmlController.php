<?php
require_once(INCLUDE_DIR . 'ivPhpdocParser.class.php');

class XmlController extends ivController
{
	/**
	 * Just lists all actions and their descriptions
	 *
	 */
	function indexAction()
	{
		$this->_disableLayout();
		$actions = array();
		$parser = new ivPhpdocParser();
		$handle = opendir(CONTROLLERS_DIR);
		while (false !== ($file = readdir($handle))) {
			if (is_file(CONTROLLERS_DIR . $file) && $file != "IndexController.php") {
				$fileContents = file_get_contents(CONTROLLERS_DIR . $file);
				$matches = array();
				preg_match('/^.*?class\s+(\w+)/m', $fileContents, $matches);
				$controllerName = strtolower(substr($matches[1], 0, -10));
				$methods = $parser->getMethodsData($fileContents);
				foreach ($methods as $methodName => $methodDesc) {
					if ('Controller' == substr($matches[1], -10) && 'Action' == substr($methodName, -6)) {
						$actions[$controllerName][substr($methodName, 0, -6)] = $methodDesc;
					}
				}
			}
		}
		closedir($handle);
		$this->view->assign('actions', $actions);
	}

	/**
	 * Downloads given file
	 *
	 */
	function downloadAction()
	{
		$this->_setNoRender();
		$path = ROOT_DIR . $this->_getParam('path', null, 'path');
		if (is_file($path)) {
			$data = @getimagesize($path);

			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');

			// Fix for IE From http://ru.php.net/manual/en/function.header.php#83384
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			if (isset($data['mime'])) {
				header("Content-Type: {$data['mime']}");
			}
			header('Content-Disposition: attachment; filename=' . basename($path) . ';');
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . filesize($path));
			readfile($path);
		}
	}

	/**
	 * Return information on given file
	 *
	 */
	function fileinfoAction()
	{
		$this->_setNoRender();
		$file = ivFSItem::create(ROOT_DIR . ivPath::canonizeRelative($this->_getParam('path', null, 'path'), true));
		if (is_a($file, 'ivFile')) {
			$xml = &new ivXml();
			$fileNode = &$file->asXml();
			$xml->setNodeTree($fileNode);
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			header('Content-type: text/xml; charset=utf-8');
			echo $xml->toString();
		}
	}

	/**
	 * Returns random image from given folder
	 *
	 */
	function rndimgAction()
	{
		$this->_setNoRender();
		$path = ivPath::canonizeRelative($this->_getParam('path', null, 'path'));
		$folder = ivFSItem::create(ROOT_DIR . $path);
		if (is_a($folder, 'ivFolder')) {
			$files = $folder->getFiles();
			if (!empty($files)) {
				$selected = $files[rand(0, count($files) - 1)];
				$xml = &new ivXml();
				$fileNode = &$selected->asXml();
				$xml->setNodeTree($fileNode);
				// FIXME Debug data
				xFireDebug('Generation Time ' . getGenTime() . ' sec');
				header('Content-type: text/xml; charset=utf-8');
				echo $xml->toString();
			}
		}
	}

	/**
	 * Return thumbnail for given path
	 *
	 */
	function thumbAction()
	{
		$errorReporting = error_reporting(0);
		$this->_setNoRender();
		$path = $this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path');

		$FSItem = ivFSItem::create(ROOT_DIR . $path);
		if (is_a($FSItem, 'ivFSItem')) {
			$thumbPath = $FSItem->getThumb(ivAcl::isAllowedPath($path));
			$data = @getimagesize($thumbPath);
			if (isset($data['mime'])) {
				// FIXME Debug data
				xFireDebug('Generation Time ' . getGenTime() . ' sec');
				header('Cache-Control: public');
				header('Expires: Fri, 30 Dec 2099 19:30:56 GMT');
				header('Content-Type: ' . $data['mime']);
				readfile($thumbPath);
			}
		}
		error_reporting($errorReporting);
	}
	
	/**
	 * Return config
	 *
	 */
	function configAction()
	{
		$this->_setNoRender();
		if ('link' == $this->_getParam('path')) {
			if (file_exists(ROOT_DIR . 'mylink.ini')) {
				echo file_get_contents(ROOT_DIR . 'mylink.ini');
			}
		} else {
			$themeName = $this->_getParam('theme', $this->conf->get('/config/imagevue/settings/theme'), 'alnum');
			$theme = ivTheme::get($themeName, $this->conf->get('/config/imagevue/settings/theme'));
			if ($theme) {
				$xml = $theme->getFullConfig();
				// FIXME Debug data
				xFireDebug('Generation Time ' . getGenTime() . ' sec');
				header('Content-type: text/xml; charset=UTF-8');
				$xmlString = $xml->toString(true);
				$xmlString = preg_replace('/\>[\s\r\n]*\</', '><', $xmlString);
				echo $xmlString;
			}
		}
	}
	
	/**
	 * Returns language
	 *
	 */
	function langAction()
	{
		$this->_setNoRender();
		$langName = $this->_getParam('name', $this->conf->get('/config/imagevue/settings/language'), 'alnum');
		$path = LANGS_DIR . $langName . '.xml';
		if (file_exists($path)) {
			$xml = ivXml::readFromFile($path, DEFAULT_LANG_FILE);
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			header('Content-type: text/xml; charset=UTF-8');
			$xmlString = $xml->toString(true);
			$xmlString = preg_replace('/\>[\s\r\n]*\</', '><', $xmlString);
			echo $xmlString;
		}
	}

	/**
	 * Returns an XML files list from the given folder path parameter
	 *
	 */
	function filesAction()
	{
		$this->_setNoRender();
		$path = ivPath::canonizeRelative($this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path'));
		$folder = ivFSItem::create(ROOT_DIR . $path);

		if (is_a($folder, 'ivFolder')) {
			$xml = new ivXml();
			$folderNode = $folder->asXml();
			$folderNode->setAttributes($folder->getMaxThumbSize());
			$folderNode->setAttribute('pageContent', $this->_parseLinksForFlash($folderNode->getAttribute('pageContent')));
			$titlePath = urlencode($folder->getTitle());
			$ancestor = $folder->getAncestor();
			while (is_a($ancestor, 'ivFolder')) {
				$titlePath = urlencode($ancestor->getTitle()) . '/' . $titlePath;
				$ancestor = $ancestor->getAncestor();
			}
			$folderNode->setAttribute('titlePath', $titlePath);
			// FIXME Cache errors
			if (isset($_SESSION['cacheErrors']) && is_array($_SESSION['cacheErrors'])) {
				$folderNode->setAttribute('errors', implode(',', array_unique($_SESSION['cacheErrors'])));
				unset($_SESSION['cacheErrors']);
			}
			$xml->setNodeTree($folderNode);
			$files = $folder->getFiles($this->_getParam('sort', null, 'alnum'));
			foreach ($files as $file) {
				$fileNode = &$file->asXml(false);
				$folderNode->addChild($fileNode);
			}
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			header ('Content-type: text/xml; charset=utf-8');
			echo $xml->toString();
		}
	}

	/**
	 * Returns an XML folder hierarchy reference from the given path parameter.
	 * 
	 * Request Parameters
	 * path - sets from what folder the script should read. Default value is empty or "/"(script root)
	 * 
	 * Output Parameters
	 * - name : returns the physical folder name.
	 * - title : returns the virtual given title of the folder if defined.
	 * - path : full relative path for the folder.
	 * - amount : amount of files in the folder(excluding subfolders and excluded namemasks)
	 * - hidden : boolean value(true or false) to reference hidden folders. Only outputs if folder attribute hidden="true", and only if request parameter showhidden=true. Else, the attribute is dismissed.
	 * 
	 * Example Var
	 * <folder name=[] title=[] path=[] fileamount=[] hidden=[] preview=[]/>
	 * 
	 * Example Literal
	 * <folder name="ibiza94" title="Holiday in Ibiza 1994" path="content/ibiza94/ fileamount="15" hidden="false" preview="image/ibizafun.jpg"/>
	 * 
	 * Example File
	 * The following example is created when using the following request parameters:
	 * ?path=content/&depth=4&showhidden=true&sorting=na
	 * getfolders.xml
	 * 
	 * Comments
	 * We will presumably add a few more requests and attributes to this action later on. What possible additional output is needed:
	 * 
	 * - perm=[perm]
	 * //- rating=[folder rating]
	 * //- ratingamount=[folder rating amount]
	 * //- pp=[passwordprotection] (boolean value for showing if the folder is password protected, either by virtual pass, or true httpd pass)
	 * //- comments=[comment amount]
	 * //- userlevel=[number] (Sets what userlevel is required to view the folder)
	 * //- virtualfolder=[boolean] (sets flag if folder is virtualfolder)
	 *
	 */
	function foldersAction()
	{
		$this->_setNoRender();
		$path = $this->_getParam('path', $this->conf->get('/config/imagevue/settings/contentfolder'), 'path');
		$folder = ivFSItem::create(ROOT_DIR . $path);
		if (is_a($folder, 'ivFolder')) {
			$tree = $this->_getFolderTreeXml($folder, $this->_getParam('sort', null, 'alnum'), $this->_getParam('showhidden', null, 'bool'));
			// FIXME Cache errors
			if (isset($_SESSION['cacheErrors']) && is_array($_SESSION['cacheErrors'])) {
				$tree->setAttribute('errors', implode(',', $_SESSION['cacheErrors']));
				unset($_SESSION['cacheErrors']);
			}
			$xml = &new ivXml();
			$xml->setNodeTree($tree);
			// FIXME Debug data
			xFireDebug('Generation Time ' . getGenTime() . ' sec');
			header('Content-type: text/xml; charset=utf-8');
			echo $xml->toString();
		}
	}

	/**
	 * Sends a contact email and returns status of operation
	 * 
	 */
	function contactAction()
	{
		$this->_setNoRender();
		if ($this->conf->get('/config/imagevue/settings/email/allowEmail')) {
			$phs = array();
			
			$messageBody = secureVar($this->_getParam('messageBody'));
			if (empty($messageBody)) {
				echo 'success=empty message';
				exit(0);
			}
			$phs['messageBody'] = $messageBody;

			$senderName = secureVar($this->_getParam('senderName'));
			$phs['senderName'] = $senderName;
			
			$senderEmail = secureVar($this->_getParam('senderEmail'));
			if (!checkMail($senderEmail)) {
				echo 'success=bad email';
				exit(0);
			}
			$phs['senderEmail'] = $senderEmail;
			
			$template = file_get_contents(TEMPLATES_DIR . 'contact.html');
			if (false === $template) {
				echo 'success=can not open template';
				exit(0);
			}

			$subject = $this->conf->get('/config/imagevue/settings/email/contactSubj');
			
			$mail = new ivMail();
			$mail->setFrom($senderEmail, $senderName);
			foreach ($this->conf->get('/config/imagevue/settings/email/ownerEmail') as $ownerEmail) {
				$mail->addTo($ownerEmail);
			}
			$mail->setSubject($this->_fillPlaceholders($subject, $phs));
			$mail->setBody($this->_fillPlaceholders($template, $phs));
			
			if ($mail->send()) {
				echo 'success=true';
			} else {
				echo 'success=could not mail';
			}
		} else {
			echo 'success=email disabled';
		}
	}

	/**
	 * Sends a link to image and returns status of operation
	 * 
	 */
	function sendlinkAction()
	{
		$this->_setNoRender();
		if ($this->conf->get('/config/imagevue/settings/email/allowEmail')) {
			$uri = getenv('REQUEST_URI');
			if (false !== strpos($uri, '?')) {
				$uri = substr($uri, 0, strpos($uri, '?'));
			}
			if (false !== strrpos($uri, '/')) {
				$uri = substr($uri, 0, strrpos($uri, '/') + 1);
			}
			$phs = array('galleryURL' => 'http://' . getenv('HTTP_HOST') . $uri);

			$path = ivPath::canonizeRelative($this->_getParam('path', null, 'path'), true);
			if (!empty($path)) {
				$phs['path'] = $path;
				$phs['directory'] = ivFilepath::directory($path);
				$phs['file'] = ivFilepath::basename($path);
				
				$senderName = secureVar($this->_getParam('senderName'));
				$phs['senderName'] = $senderName;
				
				$senderEmail = secureVar($this->_getParam('senderEmail'));
				$phs['senderEmail'] = $senderEmail;
				
				$receiverName = secureVar($this->_getParam('receiverName'));
				$phs['receiverName'] = $receiverName;
				
				$receiverEmail = secureVar($this->_getParam('receiverEmail'));
				$phs['receiverEmail'] = $receiverEmail;
				
				$messageBody = secureVar($this->_getParam('messageBody'));
				$phs['messageBody'] = $messageBody;
				
				if (!checkMail($senderEmail) || !checkMail($receiverEmail)) {
					echo 'success=bad email';
					exit(0);
				}
				$file = ivFSItem::create(ROOT_DIR . $path);
				if (is_a($file, 'ivFile')) {
					$template = file_get_contents(TEMPLATES_DIR . 'sendlink.html');
					if (false === $template) {
						echo 'success=can not open template';
						exit(0);
					}
					
					$subject = $this->conf->get('/config/imagevue/settings/email/sendlinkSubj');
					
					$mail = new ivMail();
					$mail->setFrom($senderEmail, $senderName);
					$mail->addTo($receiverEmail, $receiverName);
					$mail->setSubject($this->_fillPlaceholders($subject, $phs));
					$mail->setBody($this->_fillPlaceholders($template, $phs));

					if ($mail->send()) {
						echo 'success=true';
					} else {
						echo 'success=could not mail';
					}
				} else {
					echo 'success=no such pic';
				}
			} else {
				echo 'success=path is empty';
			}
		} else {
			echo 'success=email disabled';
		}
	}
	
	/**
	 * Returns folder tree starts from given
	 *
	 * Recursive
	 * 
	 * @param  ivFolder $folder
	 * @param  string   $sort
	 * @param  boolean  $showHidden
	 * @return ivXmlNode
	 */
	function &_getFolderTreeXml($folder, $sort = null, $showHidden = false)
	{
		$node = &$folder->asXml();
		$node->removeAttribute('pageContent');
		foreach($folder->getFolders($sort) as $childFolder) {
			if (false === $showHidden && $childFolder->isHidden()) {
				continue;
			}
			$childTree = &$this->_getFolderTreeXml($childFolder, $sort, $showHidden);
			$node->addChild($childTree);
		}
		return $node;
	}
	
	/**
	 * Replace placeholders for emailing
	 *
	 * @param  string $string
	 * @param  array  $phs
	 * @return string
	 */
	function _fillPlaceholders($string, $phs)
	{
		foreach ($phs as $ph => $value) {
			$string = str_replace("[$ph]", $value, $string);
		}
		return $string;
	}
	
	/**
	 * Replace internal hyperlinks for swfaddress
	 *
	 * @param  string $html
	 * @return string
	 */
	function _parseLinksForFlash($html)
	{
		return preg_replace('/href\=\"([\#]\/)?(' . preg_quote(ivPath::canonizeRelative($this->conf->get('/config/imagevue/settings/contentfolder')), '/') . '.*?)\"/', 'href="asfunction:_root.link,$2"', $html);
	}

}
?>