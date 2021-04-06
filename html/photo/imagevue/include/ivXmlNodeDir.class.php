<?php
/**
 * Dir XML node class
 *
 * @author McArrow
 */
class ivXmlNodeDir extends ivXmlNode
{
	/**
	 * Returns HTML form element for current node
	 *
	 * @param  string $name
	 * @param  string $id
	 * @return string
	 */
	function toFormElement($name, $id)
	{
		$conf = &ivPool::get('conf');
		$contentFolder = ivFSItem::create(ROOT_DIR . $conf->get('/config/imagevue/settings/contentfolder'));
		if (is_a($contentFolder, 'ivFolder')) {
			$html = '<select name="' . $name . '" onfocus="myhelp(true, \'' . $id . '\')" onblur="myhelp(false, \'' . $id . '\')">';
			$html .= '<option value="false" ' . ($this->getValue() == 'false' ? 'selected="selected"' : '') . '>false</option>';
			foreach ($contentFolder->getFlatFolderTree() as $v) {
				$value = $v['folder']->getProperty('path');
				$html .= '<option value="' . htmlspecialchars($value) . '" ' . ($this->getValue() == $value ? 'selected="selected"' : '') . '>' . htmlspecialchars($value) . '</option>';
			}
			$html .= '</select>';
			return $html;
		} else {
			trigger_error('The path, entered to contentfolder setting, is not a valid folder', E_USER_ERROR);
		}
	}
	
}
?>