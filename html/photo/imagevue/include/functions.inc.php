<?php
/**
 * Return the definition for the given IMAGETYPE_XXX constant.
 *
 * @param  integer $type
 * @return string
 */
function imageTypeToString($type)
{
	$stringTypes = array(
		1 => 'GIF',
		2 => 'JPG',
		3 => 'PNG',
		4 => 'SWF',
		5 => 'PSD',
		6 => 'BMP',
		7 => 'TIFF (intel byte order)',
		8 => 'TIFF (motorola byte order)',
		9 => 'JPC',
		10 => 'JP2',
		11 => 'JPX',
		12 => 'JB2',
		13 => 'SWC',
		14 => 'IFF',
		15 => 'WBMP',
		16 => 'XBM'
	);
	return (isset($stringTypes[$type]) ? $stringTypes[$type] : false);
}

/**
 * Returns content from the given path
 *
 * @param  string $path
 * @return array
 */
function getContent($path)
{
	$list = array();
	if ($handle = opendir($path)) {
		while (false !== ($file = readdir($handle))) { 
			if (substr($file, 0, 1) != '.' && substr($file, 0, 4) != '_vti') { 
				$list[] = $file;
			} 
		}
		closedir($handle); 
	}
	return $list;
}

/**
 * Split a string by string and remove empty strings
 *
 * @param  string $delimiter	The boundary string
 * @param  string $string    The input string
 * @return array
 */
function array_explode_trim($delimiter, $string)
{
	$in = explode($delimiter, $string);
	$out = array();
	if (count($in)) {
		foreach ($in as $el) {
			$el = trim($el);
			if ($el && $el != '' || (is_string($el) && '0' == $el)) {
				$out[] = $el;
			}
		}
	}
	return (count($out) ? $out : array());
}

/**
 * Remove empty elements from array
 *
 * @param  array $array The input array
 * @return array
 */
function array_clean($array)
{
	$result = array();
	foreach ($array as $key => $value) {
		if (!empty($value)) {
			$result[$key] = $value;
		}
	}
	return $result;
}

if (!function_exists('file_put_contents')) {
	/**
	 * Write a string to a file
	 *
	 * @param  string $filename
	 * @param  mixed  $data
	 * @return int
	 */
	function file_put_contents($filename, $data)
	{
		$file = @fopen($filename, 'w');
		if (false === $file) {
			return false;
		} else {
			if (is_array($data)) {
				$data = implode($data);
			}
			$bytesWritten = fwrite($file, $data);
			fclose($file);
			return $bytesWritten;
		}
	}
}

if (!function_exists('array_fill_keys')) {
	/**
	 * Fill an array with values, specifying keys
	 *
	 * @param  array $keys  Array of values that will be used as keys
	 * @param  mixed $value Value to use for filling
	 * @return array
	 */
	function array_fill_keys($keys, $value = '')
	{
		$filledArray = array();
		if (is_array($keys)) {
			foreach($keys as $key => $val) {
				$filledArray[$val] = is_array($value) ? $value[$key] : $value;
			}
		}
		return $filledArray;
	}
}

if (!function_exists('sha1')) {
	/**
	 * Calculate the pseudo-sha1 hash of a string
	 *
	 * @param  string $str The input string
	 * @return array
	 */
	function sha1($str)
	{
		return md5($str);
	}
}

/**
 * Validates email
 *
 * @param  string $email
 * @return boolean
 */
function checkMail($email)
{
	return (boolean) preg_match('/^[a-z0-9][-_a-z0-9]*(\.[a-z0-9][-_a-z0-9]*)*@[a-z0-9][-_a-z0-9]*(\.[a-z0-9][-_a-z0-9]+)+$/i', $email);
}

function secureVar($var)
{
	return nl2br(strip_tags($var));
}

function xFireDebug($var) {
	if (!headers_sent()) {
		usleep(1); /* Ensure microtime() increments with each loop. Not very elegant but it works */
		$mt = explode(' ',microtime());
		$mt = substr($mt[1],7).substr($mt[0],2);
		usleep(1);
		header('X-FirePHP-Data-3' . $mt . ': ["LOG","' . $var . '"],');
	}
}

function getGenTime() {
	$startTime = explode(' ', START_TIME);
	$endTime = explode(' ', microtime());
	$genTime = $endTime[1] - $startTime[1] + $endTime[0] - $startTime[0];
	return $genTime; 
}

/**
 * Replaces snippets in html page text
 *
 * @param  string $text
 * @return string
 */
function replaceSnippets($text)
{
	$text = preg_replace('/\<img\s+src\=\"contactform\".*?\>/i', file_get_contents(TEMPLATES_DIR . 'contactform.html'), $text);
	return $text;
}

/**
 * Clears cache data in current folder
 *
 * @param  string  $path
 * @return boolean
 */
function clearCache($path)
{
	$filename = $path . 'folderdata.xml';
	$result = true;
	if (is_file($filename)) {
		$file = file_get_contents($filename);
		$file = preg_replace('/\s*fileCount=\"\d*\"\s*/i', ' ', $file);
		$file = preg_replace('/\s*maxThumbWidth=\"\d*\"\s*/i', ' ', $file);
		$file = preg_replace('/\s*maxThumbHeight=\"\d*\"\s*/i', ' ', $file);
		$result = @file_put_contents($path . 'folderdata.xml', $file);
	}
	return $result;
}

/**
 * Error handler function
 *
 * @param  integer $severity
 * @param  string  $message
 * @param  string  $filepath
 * @param  integer $line
 * @return boolean
 */
function errorHandler($severity, $message, $filepath, $line)
{	
	$levels = array(
		E_ERROR => 'Error',
		E_WARNING => 'Warning',
		E_PARSE => 'Parsing Error',
		E_NOTICE => 'Notice',
		E_CORE_ERROR => 'Core Error',
		E_CORE_WARNING => 'Core Warning',
		E_COMPILE_ERROR => 'Compile Error',
		E_COMPILE_WARNING => 'Compile Warning',
		E_USER_ERROR => 'User Error',
		E_USER_WARNING => 'User Warning',
		E_USER_NOTICE => 'User Notice',
		E_STRICT => 'Strict',
		E_RECOVERABLE_ERROR  => 'Recoverable Error',
		E_DEPRECATED => 'Deprecated',
		E_USER_DEPRECATED => 'User Deprecated',
	);

	if (in_array($severity, array(E_STRICT, E_DEPRECATED, E_USER_DEPRECATED))) {
		return;
	}

	if (($severity & error_reporting()) == $severity) {
		$severity = (!isset($levels[$severity])) ? $severity : $levels[$severity];
	
		$filepath = str_replace("\\", "/", $filepath);
		
		// For safety reasons we do not show the full file path
		if (false !== strpos($filepath, '/')) {
			$filepath = substr($filepath, strlen(ROOT_DIR) - 1);
		}
		
		$html = '<div style="font: 12px/12px Verdana, Arial, Helvetica, sans-serif;
		padding:10px 20px;background-color:#990000;color:#FFFFFF;">'
			. '<h4>A PHP Error was encountered</h4>'
			. '<p>Severity: ' . $severity . '</p>'
			. '<p>Message: ' . $message . '</p>'
			. '<p>Filename: ' . $filepath . '</p>'
			. '<p>Line Number: ' . $line . '</p>'
			. '</div>';
		echo $html;
		return false;
	}
}

/**
 * Transforms the php.ini notation for numbers (like '2M') to an integer (2 * 1024 * 1024 in this case)
 *
 * @param  string  $value
 * @return integer
 */
function realFilesize($value)
{
	$l = substr($value, -1);
	$result = (integer) $value;
	switch (strtoupper($l)) {
		case 'P':
			$result *= 1024;
		case 'T':
			$result *= 1024;
		case 'G':
			$result *= 1024;
		case 'M':
			$result *= 1024;
		case 'K':
			$result *= 1024;
        break;
	}
	return $result;
}

/**
 * Formats date accordingly to dateformat setting
 * 
 * @param  integer $timestamp
 * @return string 
 */
function formatDate($timestamp)
{
	$conf = &ivPool::get('conf');
	return date($conf->get('/config/imagevue/settings/dateformat'), $timestamp);
}

/**
 * Formats file size
 *
 * @param  integer $bytesize
 * @return string
 */
function formatFilesize($bytesize)
{
	if ($bytesize > 1048576) {
		return round($bytesize / 1048576, 1) . 'Mb';
	}
	if ($bytesize > 1024) {
		return round($bytesize / 1024, 1) . 'kb';
	}
	return $bytesize . 'b';
}

/**
 * Calculates great common divisor
 *
 * Realise binary GCD algorithm
 * 
 * @param  integer $int1
 * @param  integer $int2
 * @return integer
 */
function greatCommonDivisor($int1, $int2)
{
	// GCD(0, n) = n
	if (0 == $int1) {
		// GCD(0, 0) = 1
		return 0 == $int2 ? 1 : $int2;
	}
	// GCD(m, 0) = m
	if (0 == $int2) {
		return 1;
	}
	// GCD(m, m) = m
	if ($int1 == $int2) {
		return $int1;
	}
	// If m and n is even, GCD(m, n) = 2 * GCD(m / 2, n / 2);
	if (0 == $int1 % 2 && 0 == $int2 % 2) {
		return 2 * greatCommonDivisor((integer) ($int1 / 2), (integer) ($int2 / 2));
	}
	// If m is even, n is odd, GCD(m, n) = GCD(m / 2, n);
	if (0 == $int1 % 2) {
		return greatCommonDivisor((integer) ($int1 / 2), $int2);
	}
	// If m is odd, n is even, GCD(m, n) = GCD(m, n / 2);
	if (0 == $int2 % 2) {
		return greatCommonDivisor((integer) ($int2 / 2), $int1);
	}
	// If m and n is odd, GCD(m, n) = GCD(|m - n|, n);
	return greatCommonDivisor($int1, abs($int2 - $int1));
}

/**
 * Recursively makes directory, returns TRUE if exists or made
 *
 * @param  string  $path The directory path
 * @param  integer $mode
 * @return boolean       TRUE if exists or made or FALSE on failure
 */
function mkdirRecursive($path, $mode = 0777)
{
	$parentPath = dirname($path);
    if (!is_dir($parentPath) && !mkdirRecursive($parentPath, $mode)) {
    	return false;
    }
    return is_dir($path) || (@mkdir($path, $mode) && @chmod($path, $mode));
}

/**
 * Recursively removes directory with it's content
 *
 * @param  string  $path The directory path
 * @return boolean
 */
function rmdirRecursive($path)
{
    if (!file_exists($path)) {
        return false;
    }
	if (!is_dir($path)) {
		trigger_error("Given path '$path' is not a directory", E_USER_ERROR);
	}
	$handle = opendir($path);
	while (false !== ($file = readdir($handle))) {
		if (!in_array($file, array('.', '..'))) {
			$filepath = $path . DIRECTORY_SEPARATOR . $file;
			if (is_file($filepath) || is_link($filepath)) {
				unlink($filepath);
			} else {
				rmdirRecursive($filepath);
			}
		}
	}
	closedir($handle);
	return @rmdir($path);
}

/**
 * Recursively un-quotes a quoted variable
 *
 * @param  mixed $var
 * @return mixed
 */
function stripslashes_recursive($var)
{
	if (is_array($var)) {
		$unquoted = array();
		foreach ($var as $key => $value) {
			$unquoted[$key] = stripslashes_recursive($value);
		}
		return $unquoted;
	} elseif (is_scalar($var)) {
		return stripslashes($var);
	} else {
		return $var;
	}
}

?>