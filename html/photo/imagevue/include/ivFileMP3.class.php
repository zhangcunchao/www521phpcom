<?php
/**
 * MP3 file class
 *
 * @author McArrow
 */
class ivFileMP3 extends ivFile
{
	/**
	 * Attributes
	 * @var array
	 */
	var $_attributes = array(
		'title' => null,
		'artist' => null,
		'description' => null
	);

	/**
	 * Disallowed id3 tags
	 *
	 * @var array
	 */
	var $_disallowedTags = array(
		'music_cd_identifier'
	);

	/**
	 * Checks if path is MP3 file
	 *
	 * @static
	 * @param  string $path
	 * @return boolean
	 */
	function isSupported($path)
	{
		return 'mp3' == strtolower(ivFilepath::suffix($path));
	}

	/**
	 * Parses and returns id3 data
	 *
	 * @return array
	 */
	function getId3Data()
	{
		if (ini_get('safe_mode') || !function_exists('iconv')) {
			return array();
		}
		$conf = &ivPool::get('conf');
		$getID3 = new getID3;
		$getID3->setOption(array('encoding' => 'UTF-8', 'encoding_id3v1' => $conf->get('/config/imagevue/settings/codepage/id3')));
		$data = $getID3->analyze($this->_path);
		$tags = array();
		if (isset($data['tags']['id3v1'])) {
			foreach ($data['tags']['id3v1'] as $tag => $value) {
				if (!in_array($tag, $this->_disallowedTags)) {
					$tags[ucwords(str_replace('_', ' ', $tag))] = $value[0];
				}
			}
		}
		if (isset($data['tags']['id3v2'])) {
			foreach ($data['tags']['id3v2'] as $tag => $value) {
				if (!in_array($tag, $this->_disallowedTags)) {
					$tags[ucwords(str_replace('_', ' ', $tag))] = $value[0];
				}
			}
		}
		return $tags;
	}
	
	/**
	 * Returns self XML-node
	 *
	 * @param  boolean   $expanded
	 * @return ivXmlNode
	 */
	function &asXml($expanded = true)
	{
		$node = &parent::asXml();
		$id3Data = $this->getId3Data();
		if ($expanded) {
			if (is_array($id3Data)) {
				$id3Node = &ivXmlNode::create('id3');
				foreach ($id3Data as $key => $value) {
					$tag = &ivXmlNode::create(str_replace(array(' ', '(', ')'), array('_', '', ''), $key));
					$tag->setValue(htmlspecialchars($value));
					$id3Node->addChild($tag);
					unset($tag);
				}
				$node->addChild($id3Node);
			}
		} else {
			if (!$node->getAttribute('artist') && isset($id3Data['Artist'])) {
				$node->setAttribute('artist', $id3Data['Artist']);
			}
		}
		return $node;
	}
	
	/**
	 * Returns MP3's title
	 *
	 * @return string
	 */
	function getTitle()
	{
		$title = $this->getAttribute('title');
		if (!$title) {
			$id3Data = $this->getId3Data();
			$title = isset($id3Data['Title']) ? $id3Data['Title'] : '';
		}
		if (!$title) {
			$title = $this->getProperty('name');
		}
		return $title; 
	}

}
?>
