<?php
/**
 * Components class
 *
 */
class ivComponent
{
	function tree($viewPath, $path)
	{
		$contentFolder = ivFSItem::create(ROOT_DIR . ivAcl::getAllowedPath());
		$flatFolderTree = $contentFolder->getFlatFolderTree();

		$view = new ivView($viewPath);
		$view->assign('path', $path);
		$view->assign('flatFolderTree', $flatFolderTree);
		return $view->fetch('tree');
	}

}
?>