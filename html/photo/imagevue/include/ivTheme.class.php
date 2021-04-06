<?php
class ivTheme
{
	/**
	 * Theme name
	 * @var string
	 */
	var $_name;
	
	/**
	 * Theme config filename
	 * @var string
	 */
	var $_themeConfigFilename = 'themeConfig.xml';
	
	/**
	 * Constructor
	 *
	 * @private
	 */
	function ivTheme()
	{
		$this->__construct();
	}
	
	/**
	 * Constructor
	 *
	 * @private
	 */
	function __construct()
	{}
	
	/**
	 * Factory method
	 *
	 * @static
	 * @param  string  $name
	 * @param  string  $altName
	 * @return ivTheme Will return false if theme not found
	 */
	function get($name, $altName = false)
	{
		$theme = new ivTheme();
		if (in_array($name, ivTheme::getAllThemes())) {
			$theme->_name = $name;
			return $theme;
		} else if ($altName && in_array($altName, ivTheme::getAllThemes())) {
			$theme->_name = $altName;
			return $theme;
		}
		return false;
	}
	
	/**
	 * Returns theme's name
	 *
	 * @return string
	 */
	function getName()
	{
		return $this->_name;
	}
	
	/**
	 * Returns theme's config
	 *
	 * @return ivXml|boolean
	 */
	function getConfig()
	{
		$configFile = $this->_getPath() . $this->_themeConfigFilename;
		$descXml = ivXml::readFromFile($configFile, DEFAULT_THEME_CONFIG_FILE);
		$userConfigFile = $this->_getUserPath() . $this->_themeConfigFilename;
		$xml = &ivXml::readFromFile($userConfigFile, $descXml);
		return $xml;
	}
	
	/**
	 * Returns full config
	 *
	 * @return ivXml|boolean
	 */
	function getFullConfig()
	{
		$path = $this->_getPath() . $this->_themeConfigFilename;
		$userPath = $this->_getUserPath() . $this->_themeConfigFilename;
		$descConfigXml = ivXml::readFromFile(DEFAULT_CONFIG_FILE);
		$descThemeXml = ivXml::readFromFile(DEFAULT_THEME_CONFIG_FILE);
		$descXml = $this->_mergeXml($descConfigXml, $descThemeXml);
		$descXmlConfig = ivXml::readFromFile(CONFIG_FILE, $descXml);
		$descXmlConfigTheme = ivXml::readFromFile($path, $descXmlConfig);
		$xml = &ivXml::readFromFile($userPath, $descXmlConfigTheme);
		return $xml;
	}
	
	/**
	 * Returns theme's CSS
	 *
	 * Reads theme's CSS and populates it with blocks from default.css
	 * 
	 * @return string
	 */
	function getStyle()
	{
		$defaultCss = $this->_parseCSS(file_get_contents(INCLUDE_DIR . 'default.css'));
		$css = $this->_parseCSS(file_get_contents($this->_getPath() . 'imagevue.css'));
		foreach ($defaultCss as $key => $value) {
			if (isset($css[$key])) {
				$defaultCss[$key] = $css[$key];
			}
		}
		$result = '';
		foreach ($defaultCss as $key => $value) {
			$result .= "$key {\n";
			$result .= empty ($value) ? '' : "$value\n";
			$result .= "}\n";
		}
		return $result;
	}
	
	function _parseCSS($css)
	{
		preg_match_all('/([^\s\{\}]*)\s*\{(.*?)\}/ms', $css, $matches);
		$result = array();
		foreach ($matches[1] as $key => $value) {
			$result[$value] = trim($matches[2][$key], "\n\r\0");
		}
		return $result;
	}

	/**
	 * Saves theme's CSS
	 *
	 * @param  string  $css
	 * @return boolean
	 */
	function setStyle($css)
	{
		return @file_put_contents($this->_getPath() . 'imagevue.css', $css);
	}
	
	/**
	 * Returns upload directory path for current theme
	 *
	 * @return string
	 */
	function getUploadDirectory()
	{
		return $this->_getPath();
	}
	
	/**
	 * Returns list of all installed themes
	 *
	 * @static
	 * @return array
	 */
	function getAllThemes()
	{
		$list = array();
		if ($handle = opendir(THEMES_DIR)) {
			while (false !== ($file = readdir($handle))) { 
				if (substr($file, 0, 1) != '.' && is_dir(THEMES_DIR . $file)) { 
					$list[] = $file;
				}
			}
			closedir($handle); 
		}
		return $list;
	}
	
	/**
	 * Copies theme
	 *
	 * @param  string  $name New theme's name
	 * @return boolean
	 */
	function copyTo($name)
	{
		if (in_array($name, ivTheme::getAllThemes())) {
			return false;
		}

		$themeDir = $this->_getPath();
		$newThemeDir = $this->_getPath($name);
		if (file_exists($themeDir) && is_dir($themeDir)) {
			$result = mkdirRecursive($newThemeDir);
			$handle = opendir($themeDir);
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, array('.', '..'))) {
					$fullPath = $themeDir . $file;
					if (is_file($fullPath)) {
						$result &= @copy($fullPath, $newThemeDir . $file);
					}
				}
			}
			closedir($handle);
		}

		$userThemeDir = $this->_getUserPath();
		$newUserThemeDir = $this->_getUserPath($name);
		if (file_exists($userThemeDir) && is_dir($userThemeDir)) {
			$result &= mkdirRecursive($newUserThemeDir);
			$handle = opendir($userThemeDir);
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, array('.', '..'))) {
					$fullPath = $userThemeDir . $file;
					if (is_file($fullPath)) {
						$result &= @copy($fullPath, $newUserThemeDir . $file);
					}
				}
			}
			closedir($handle);
		}

		return $result;
	}
	
	/**
	 * Deletes current theme
	 *
	 * @return boolean
	 */
	function delete()
	{
		$result = true;

		if (file_exists($themeDir) && is_dir($themeDir)) {
			$handle = opendir($this->_getPath());
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, array('.', '..'))) {
					$fullPath = $this->_getPath() . $file;
					if (is_file($fullPath)) {
						$result &= @unlink($fullPath);
					}
				}
			}
			closedir($handle);
			$result &= @rmdir($this->_getPath());
		}

		if (file_exists($themeDir) && is_dir($themeDir)) {
			$handle = opendir($this->_getUserPath());
			while (false !== ($file = readdir($handle))) {
				if (!in_array($file, array('.', '..'))) {
					$fullPath = $this->_getPath() . $file;
					if (is_file($fullPath)) {
						$result &= @unlink($fullPath);
					}
				}
			}
			closedir($handle);
			$result &= @rmdir($this->_getUserPath());
		}

		return $result;
	}

	/**
	 * Merges two XMLs
	 *
	 * @access private
	 * @param  ivXml $xml1
	 * @param  ivXml $xml2
	 * @return ivXml
	 */
	function &_mergeXml($xml1, $xml2)
	{
		foreach ($xml2->toFlatTree() as $nodeItem) {
			if (!$nodeItem['node']->hasChildren()) {
				$xml1->add($nodeItem['path'], $nodeItem['node']);
			}
		}
		return $xml1;
	}

	/**
	 * Returns theme's path
	 *
	 * @param  string $name
	 * @return string
	 */
	function _getPath($name = null)
	{
		$name = is_null($name) ? $this->getName() : $name;
		return THEMES_DIR . ivPath::canonizeRelative($name);
	}
	
	/**
	 * Returns theme's user path
	 *
	 * @param  string $name
	 * @return string
	 */
	function _getUserPath($name = null)
	{
		$name = is_null($name) ? $this->getName() : $name;
		return USER_DIR . ivPath::canonizeRelative($name);
	}

}
?>