<?php
if ( !class_exists( 'SimplePie' ) ) :
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.2
 * @copyright 2004-2009 Ryan Parman, Geoffrey Sneddon
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @link http://simplepie.org/ SimplePie
 * @link http://simplepie.org/support/ Please submit all bug reports and feature requests to the SimplePie forums
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 * @todo phpDoc comments
 */

/**
 * SimplePie Name
 */
define('SIMPLEPIE_NAME', 'SimplePie');

/**
 * SimplePie Version
 */
define('SIMPLEPIE_VERSION', '1.2');

/**
 * SimplePie Build
 */
define('SIMPLEPIE_BUILD', '20090627192103');

/**
 * SimplePie Website URL
 */
define('SIMPLEPIE_URL', 'http://simplepie.org');

/**
 * SimplePie Useragent
 * @see SimplePie::set_useragent()
 */
define('SIMPLEPIE_USERAGENT', SIMPLEPIE_NAME . '/' . SIMPLEPIE_VERSION . ' (Feed Parser; ' . SIMPLEPIE_URL . '; Allow like Gecko) Build/' . SIMPLEPIE_BUILD);

/**
 * SimplePie Linkback
 */
define('SIMPLEPIE_LINKBACK', '<a href="' . SIMPLEPIE_URL . '" title="' . SIMPLEPIE_NAME . ' ' . SIMPLEPIE_VERSION . '">' . SIMPLEPIE_NAME . '</a>');

/**
 * No Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_NONE', 0);

/**
 * Feed Link Element Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_AUTODISCOVERY', 1);

/**
 * Local Feed Extension Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_LOCAL_EXTENSION', 2);

/**
 * Local Feed Body Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_LOCAL_BODY', 4);

/**
 * Remote Feed Extension Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_REMOTE_EXTENSION', 8);

/**
 * Remote Feed Body Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_REMOTE_BODY', 16);

/**
 * All Feed Autodiscovery
 * @see SimplePie::set_autodiscovery_level()
 */
define('SIMPLEPIE_LOCATOR_ALL', 31);

/**
 * No known feed type
 */
define('SIMPLEPIE_TYPE_NONE', 0);

/**
 * RSS 0.90
 */
define('SIMPLEPIE_TYPE_RSS_090', 1);

/**
 * RSS 0.91 (Netscape)
 */
define('SIMPLEPIE_TYPE_RSS_091_NETSCAPE', 2);

/**
 * RSS 0.91 (Userland)
 */
define('SIMPLEPIE_TYPE_RSS_091_USERLAND', 4);

/**
 * RSS 0.91 (both Netscape and Userland)
 */
define('SIMPLEPIE_TYPE_RSS_091', 6);

/**
 * RSS 0.92
 */
define('SIMPLEPIE_TYPE_RSS_092', 8);

/**
 * RSS 0.93
 */
define('SIMPLEPIE_TYPE_RSS_093', 16);

/**
 * RSS 0.94
 */
define('SIMPLEPIE_TYPE_RSS_094', 32);

/**
 * RSS 1.0
 */
define('SIMPLEPIE_TYPE_RSS_10', 64);

/**
 * RSS 2.0
 */
define('SIMPLEPIE_TYPE_RSS_20', 128);

/**
 * RDF-based RSS
 */
define('SIMPLEPIE_TYPE_RSS_RDF', 65);

/**
 * Non-RDF-based RSS (truly intended as syndication format)
 */
define('SIMPLEPIE_TYPE_RSS_SYNDICATION', 190);

/**
 * All RSS
 */
define('SIMPLEPIE_TYPE_RSS_ALL', 255);

/**
 * Atom 0.3
 */
define('SIMPLEPIE_TYPE_ATOM_03', 256);

/**
 * Atom 1.0
 */
define('SIMPLEPIE_TYPE_ATOM_10', 512);

/**
 * All Atom
 */
define('SIMPLEPIE_TYPE_ATOM_ALL', 768);

/**
 * All feed types
 */
define('SIMPLEPIE_TYPE_ALL', 1023);

/**
 * No construct
 */
define('SIMPLEPIE_CONSTRUCT_NONE', 0);

/**
 * Text construct
 */
define('SIMPLEPIE_CONSTRUCT_TEXT', 1);

/**
 * HTML construct
 */
define('SIMPLEPIE_CONSTRUCT_HTML', 2);

/**
 * XHTML construct
 */
define('SIMPLEPIE_CONSTRUCT_XHTML', 4);

/**
 * base64-encoded construct
 */
define('SIMPLEPIE_CONSTRUCT_BASE64', 8);

/**
 * IRI construct
 */
define('SIMPLEPIE_CONSTRUCT_IRI', 16);

/**
 * A construct that might be HTML
 */
define('SIMPLEPIE_CONSTRUCT_MAYBE_HTML', 32);

/**
 * All constructs
 */
define('SIMPLEPIE_CONSTRUCT_ALL', 63);

/**
 * Don't change case
 */
define('SIMPLEPIE_SAME_CASE', 1);

/**
 * Change to lowercase
 */
define('SIMPLEPIE_LOWERCASE', 2);

/**
 * Change to uppercase
 */
define('SIMPLEPIE_UPPERCASE', 4);

/**
 * PCRE for HTML attributes
 */
define('SIMPLEPIE_PCRE_HTML_ATTRIBUTE', '((?:[\x09\x0A\x0B\x0C\x0D\x20]+[^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3D\x3E]*(?:[\x09\x0A\x0B\x0C\x0D\x20]*=[\x09\x0A\x0B\x0C\x0D\x20]*(?:"(?:[^"]*)"|\'(?:[^\']*)\'|(?:[^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?)*)[\x09\x0A\x0B\x0C\x0D\x20]*');

/**
 * PCRE for XML attributes
 */
define('SIMPLEPIE_PCRE_XML_ATTRIBUTE', '((?:\s+(?:(?:[^\s:]+:)?[^\s:]+)\s*=\s*(?:"(?:[^"]*)"|\'(?:[^\']*)\'))*)\s*');

/**
 * XML Namespace
 */
define('SIMPLEPIE_NAMESPACE_XML', 'http://www.w3.org/XML/1998/namespace');

/**
 * Atom 1.0 Namespace
 */
define('SIMPLEPIE_NAMESPACE_ATOM_10', 'http://www.w3.org/2005/Atom');

/**
 * Atom 0.3 Namespace
 */
define('SIMPLEPIE_NAMESPACE_ATOM_03', 'http://purl.org/atom/ns#');

/**
 * RDF Namespace
 */
define('SIMPLEPIE_NAMESPACE_RDF', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');

/**
 * RSS 0.90 Namespace
 */
define('SIMPLEPIE_NAMESPACE_RSS_090', 'http://my.netscape.com/rdf/simple/0.9/');

/**
 * RSS 1.0 Namespace
 */
define('SIMPLEPIE_NAMESPACE_RSS_10', 'http://purl.org/rss/1.0/');

/**
 * RSS 1.0 Content Module Namespace
 */
define('SIMPLEPIE_NAMESPACE_RSS_10_MODULES_CONTENT', 'http://purl.org/rss/1.0/modules/content/');

/**
 * RSS 2.0 Namespace
 * (Stupid, I know, but I'm certain it will confuse people less with support.)
 */
define('SIMPLEPIE_NAMESPACE_RSS_20', '');

/**
 * DC 1.0 Namespace
 */
define('SIMPLEPIE_NAMESPACE_DC_10', 'http://purl.org/dc/elements/1.0/');

/**
 * DC 1.1 Namespace
 */
define('SIMPLEPIE_NAMESPACE_DC_11', 'http://purl.org/dc/elements/1.1/');

/**
 * W3C Basic Geo (WGS84 lat/long) Vocabulary Namespace
 */
define('SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO', 'http://www.w3.org/2003/01/geo/wgs84_pos#');

/**
 * GeoRSS Namespace
 */
define('SIMPLEPIE_NAMESPACE_GEORSS', 'http://www.georss.org/georss');

/**
 * Media RSS Namespace
 */
define('SIMPLEPIE_NAMESPACE_MEDIARSS', 'http://search.yahoo.com/mrss/');

/**
 * Wrong Media RSS Namespace
 */
define('SIMPLEPIE_NAMESPACE_MEDIARSS_WRONG', 'http://search.yahoo.com/mrss');

/**
 * iTunes RSS Namespace
 */
define('SIMPLEPIE_NAMESPACE_ITUNES', 'http://www.itunes.com/dtds/podcast-1.0.dtd');

/**
 * XHTML Namespace
 */
define('SIMPLEPIE_NAMESPACE_XHTML', 'http://www.w3.org/1999/xhtml');

/**
 * IANA Link Relations Registry
 */
define('SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY', 'http://www.iana.org/assignments/relation/');

/**
 * Whether we're running on PHP5
 */
define('SIMPLEPIE_PHP5', version_compare(PHP_VERSION, '5.0.0', '>='));

/**
 * No file source
 */
define('SIMPLEPIE_FILE_SOURCE_NONE', 0);

/**
 * Remote file source
 */
define('SIMPLEPIE_FILE_SOURCE_REMOTE', 1);

/**
 * Local file source
 */
define('SIMPLEPIE_FILE_SOURCE_LOCAL', 2);

/**
 * fsockopen() file source
 */
define('SIMPLEPIE_FILE_SOURCE_FSOCKOPEN', 4);

/**
 * cURL file source
 */
define('SIMPLEPIE_FILE_SOURCE_CURL', 8);

/**
 * file_get_contents() file source
 */
define('SIMPLEPIE_FILE_SOURCE_FILE_GET_CONTENTS', 16);

/**
 * SimplePie
 *
 * @package SimplePie
 */
class SimplePie
{
	/**
	 * @var array Raw data
	 * @access private
	 */
	var $data = array();

	/**
	 * @var mixed Error string
	 * @access private
	 */
	var $error;

	/**
	 * @var object Instance of SimplePie_Sanitize (or other class)
	 * @see SimplePie::set_sanitize_class()
	 * @access private
	 */
	var $sanitize;

	/**
	 * @var string SimplePie Useragent
	 * @see SimplePie::set_useragent()
	 * @access private
	 */
	var $useragent = SIMPLEPIE_USERAGENT;

	/**
	 * @var string Feed URL
	 * @see SimplePie::set_feed_url()
	 * @access private
	 */
	var $feed_url;

	/**
	 * @var object Instance of SimplePie_File to use as a feed
	 * @see SimplePie::set_file()
	 * @access private
	 */
	var $file;

	/**
	 * @var string Raw feed data
	 * @see SimplePie::set_raw_data()
	 * @access private
	 */
	var $raw_data;

	/**
	 * @var int Timeout for fetching remote files
	 * @see SimplePie::set_timeout()
	 * @access private
	 */
	var $timeout = 10;

	/**
	 * @var bool Forces fsockopen() to be used for remote files instead
	 * of cURL, even if a new enough version is installed
	 * @see SimplePie::force_fsockopen()
	 * @access private
	 */
	var $force_fsockopen = false;

	/**
	 * @var bool Force the given data/URL to be treated as a feed no matter what
	 * it appears like
	 * @see SimplePie::force_feed()
	 * @access private
	 */
	var $force_feed = false;

	/**
	 * @var bool Enable/Disable XML dump
	 * @see SimplePie::enable_xml_dump()
	 * @access private
	 */
	var $xml_dump = false;

	/**
	 * @var bool Enable/Disable Caching
	 * @see SimplePie::enable_cache()
	 * @access private
	 */
	var $cache = true;

	/**
	 * @var int Cache duration (in seconds)
	 * @see SimplePie::set_cache_duration()
	 * @access private
	 */
	var $cache_duration = 3600;

	/**
	 * @var int Auto-discovery cache duration (in seconds)
	 * @see SimplePie::set_autodiscovery_cache_duration()
	 * @access private
	 */
	var $autodiscovery_cache_duration = 604800; // 7 Days.

	/**
	 * @var string Cache location (relative to executing script)
	 * @see SimplePie::set_cache_location()
	 * @access private
	 */
	var $cache_location = './cache';

	/**
	 * @var string Function that creates the cache filename
	 * @see SimplePie::set_cache_name_function()
	 * @access private
	 */
	var $cache_name_function = 'md5';

	/**
	 * @var bool Reorder feed by date descending
	 * @see SimplePie::enable_order_by_date()
	 * @access private
	 */
	var $order_by_date = true;

	/**
	 * @var mixed Force input encoding to be set to the follow value
	 * (false, or anything type-cast to false, disables this feature)
	 * @see SimplePie::set_input_encoding()
	 * @access private
	 */
	var $input_encoding = false;

	/**
	 * @var int Feed Autodiscovery Level
	 * @see SimplePie::set_autodiscovery_level()
	 * @access private
	 */
	var $autodiscovery = SIMPLEPIE_LOCATOR_ALL;

	/**
	 * @var string Class used for caching feeds
	 * @see SimplePie::set_cache_class()
	 * @access private
	 */
	var $cache_class = 'SimplePie_Cache';

	/**
	 * @var string Class used for locating feeds
	 * @see SimplePie::set_locator_class()
	 * @access private
	 */
	var $locator_class = 'SimplePie_Locator';

	/**
	 * @var string Class used for parsing feeds
	 * @see SimplePie::set_parser_class()
	 * @access private
	 */
	var $parser_class = 'SimplePie_Parser';

	/**
	 * @var string Class used for fetching feeds
	 * @see SimplePie::set_file_class()
	 * @access private
	 */
	var $file_class = 'SimplePie_File';

	/**
	 * @var string Class used for items
	 * @see SimplePie::set_item_class()
	 * @access private
	 */
	var $item_class = 'SimplePie_Item';

	/**
	 * @var string Class used for authors
	 * @see SimplePie::set_author_class()
	 * @access private
	 */
	var $author_class = 'SimplePie_Author';

	/**
	 * @var string Class used for categories
	 * @see SimplePie::set_category_class()
	 * @access private
	 */
	var $category_class = 'SimplePie_Category';

	/**
	 * @var string Class used for enclosures
	 * @see SimplePie::set_enclosures_class()
	 * @access private
	 */
	var $enclosure_class = 'SimplePie_Enclosure';

	/**
	 * @var string Class used for Media RSS <media:text> captions
	 * @see SimplePie::set_caption_class()
	 * @access private
	 */
	var $caption_class = 'SimplePie_Caption';

	/**
	 * @var string Class used for Media RSS <media:copyright>
	 * @see SimplePie::set_copyright_class()
	 * @access private
	 */
	var $copyright_class = 'SimplePie_Copyright';

	/**
	 * @var string Class used for Media RSS <media:credit>
	 * @see SimplePie::set_credit_class()
	 * @access private
	 */
	var $credit_class = 'SimplePie_Credit';

	/**
	 * @var string Class used for Media RSS <media:rating>
	 * @see SimplePie::set_rating_class()
	 * @access private
	 */
	var $rating_class = 'SimplePie_Rating';

	/**
	 * @var string Class used for Media RSS <media:restriction>
	 * @see SimplePie::set_restriction_class()
	 * @access private
	 */
	var $restriction_class = 'SimplePie_Restriction';

	/**
	 * @var string Class used for content-type sniffing
	 * @see SimplePie::set_content_type_sniffer_class()
	 * @access private
	 */
	var $content_type_sniffer_class = 'SimplePie_Content_Type_Sniffer';

	/**
	 * @var string Class used for item sources.
	 * @see SimplePie::set_source_class()
	 * @access private
	 */
	var $source_class = 'SimplePie_Source';

	/**
	 * @var mixed Set javascript query string parameter (false, or
	 * anything type-cast to false, disables this feature)
	 * @see SimplePie::set_javascript()
	 * @access private
	 */
	var $javascript = 'js';

	/**
	 * @var int Maximum number of feeds to check with autodiscovery
	 * @see SimplePie::set_max_checked_feeds()
	 * @access private
	 */
	var $max_checked_feeds = 10;

	/**
	 * @var array All the feeds found during the autodiscovery process
	 * @see SimplePie::get_all_discovered_feeds()
	 * @access private
	 */
	var $all_discovered_feeds = array();

	/**
	 * @var string Web-accessible path to the handler_favicon.php file.
	 * @see SimplePie::set_favicon_handler()
	 * @access private
	 */
	var $favicon_handler = '';

	/**
	 * @var string Web-accessible path to the handler_image.php file.
	 * @see SimplePie::set_image_handler()
	 * @access private
	 */
	var $image_handler = '';

	/**
	 * @var array Stores the URLs when multiple feeds are being initialized.
	 * @see SimplePie::set_feed_url()
	 * @access private
	 */
	var $multifeed_url = array();

	/**
	 * @var array Stores SimplePie objects when multiple feeds initialized.
	 * @access private
	 */
	var $multifeed_objects = array();

	/**
	 * @var array Stores the get_object_vars() array for use with multifeeds.
	 * @see SimplePie::set_feed_url()
	 * @access private
	 */
	var $config_settings = null;

	/**
	 * @var integer Stores the number of items to return per-feed with multifeeds.
	 * @see SimplePie::set_item_limit()
	 * @access private
	 */
	var $item_limit = 0;

	/**
	 * @var array Stores the default attributes to be stripped by strip_attributes().
	 * @see SimplePie::strip_attributes()
	 * @access private
	 */
	var $strip_attributes = array('bgsound', 'class', 'expr', 'id', 'style', 'onclick', 'onerror', 'onfinish', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'lowsrc', 'dynsrc');

	/**
	 * @var array Stores the default tags to be stripped by strip_htmltags().
	 * @see SimplePie::strip_htmltags()
	 * @access private
	 */
	var $strip_htmltags = array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style');

	/**
	 * The SimplePie class contains feed level data and options
	 *
	 * There are two ways that you can create a new SimplePie object. The first
	 * is by passing a feed URL as a parameter to the SimplePie constructor
	 * (as well as optionally setting the cache location and cache expiry). This
	 * will initialise the whole feed with all of the default settings, and you
	 * can begin accessing methods and properties immediately.
	 *
	 * The second way is to create the SimplePie object with no parameters
	 * at all. This will enable you to set configuration options. After setting
	 * them, you must initialise the feed using $feed->init(). At that point the
	 * object's methods and properties will be available to you. This format is
	 * what is used throughout this documentation.
	 *
	 * @access public
	 * @since 1.0 Preview Release
	 * @param string $feed_url This is the URL you want to parse.
	 * @param string $cache_location This is where you want the cache to be stored.
	 * @param int $cache_duration This is the number of seconds that you want to store the cache file for.
	 */
	function SimplePie($feed_url = null, $cache_location = null, $cache_duration = null)
	{
		// Other objects, instances created here so we can set options on them
		$this->sanitize =& new SimplePie_Sanitize;

		// Set options if they're passed to the constructor
		if ($cache_location !== null)
		{
			$this->set_cache_location($cache_location);
		}

		if ($cache_duration !== null)
		{
			$this->set_cache_duration($cache_duration);
		}

		// Only init the script if we're passed a feed URL
		if ($feed_url !== null)
		{
			$this->set_feed_url($feed_url);
			$this->init();
		}
	}

	/**
	 * Used for converting object to a string
	 */
	function __toString()
	{
		return md5(serialize($this->data));
	}

	/**
	 * Remove items that link back to this before destroying this object
	 */
	function __destruct()
	{
		if ((version_compare(PHP_VERSION, '5.3', '<') || !gc_enabled()) && !ini_get('zend.ze1_compatibility_mode'))
		{
			if (!empty($this->data['items']))
			{
				foreach ($this->data['items'] as $item)
				{
					$item->__destruct();
				}
				unset($item, $this->data['items']);
			}
			if (!empty($this->data['ordered_items']))
			{
				foreach ($this->data['ordered_items'] as $item)
				{
					$item->__destruct();
				}
				unset($item, $this->data['ordered_items']);
			}
		}
	}

	/**
	 * Force the given data/URL to be treated as a feed no matter what it
	 * appears like
	 *
	 * @access public
	 * @since 1.1
	 * @param bool $enable Force the given data/URL to be treated as a feed
	 */
	function force_feed($enable = false)
	{
		$this->force_feed = (bool) $enable;
	}

	/**
	 * This is the URL of the feed you want to parse.
	 *
	 * This allows you to enter the URL of the feed you want to parse, or the
	 * website you want to try to use auto-discovery on. This takes priority
	 * over any set raw data.
	 *
	 * You can set multiple feeds to mash together by passing an array instead
	 * of a string for the $url. Remember that with each additional feed comes
	 * additional processing and resources.
	 *
	 * @access public
	 * @since 1.0 Preview Release
	 * @param mixed $url This is the URL (or array of URLs) that you want to parse.
	 * @see SimplePie::set_raw_data()
	 */
	function set_feed_url($url)
	{
		if (is_array($url))
		{
			$this->multifeed_url = array();
			foreach ($url as $value)
			{
				$this->multifeed_url[] = SimplePie_Misc::fix_protocol($value, 1);
			}
		}
		else
		{
			$this->feed_url = SimplePie_Misc::fix_protocol($url, 1);
		}
	}

	/**
	 * Provides an instance of SimplePie_File to use as a feed
	 *
	 * @access public
	 * @param object &$file Instance of SimplePie_File (or subclass)
	 * @return bool True on success, false on failure
	 */
	function set_file(&$file)
	{
		if (is_a($file, 'SimplePie_File'))
		{
			$this->feed_url = $file->url;
			$this->file =& $file;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to use a string of RSS/Atom data instead of a remote feed.
	 *
	 * If you have a feed available as a string in PHP, you can tell SimplePie
	 * to parse that data string instead of a remote feed. Any set feed URL
	 * takes precedence.
	 *
	 * @access public
	 * @since 1.0 Beta 3
	 * @param string $data RSS or Atom data as a string.
	 * @see SimplePie::set_feed_url()
	 */
	function set_raw_data($data)
	{
		$this->raw_data = $data;
	}

	/**
	 * Allows you to override the default timeout for fetching remote feeds.
	 *
	 * This allows you to change the maximum time the feed's server to respond
	 * and send the feed back.
	 *
	 * @access public
	 * @since 1.0 Beta 3
	 * @param int $timeout The maximum number of seconds to spend waiting to retrieve a feed.
	 */
	function set_timeout($timeout = 10)
	{
		$this->timeout = (int) $timeout;
	}

	/**
	 * Forces SimplePie to use fsockopen() instead of the preferred cURL
	 * functions.
	 *
	 * @access public
	 * @since 1.0 Beta 3
	 * @param bool $enable Force fsockopen() to be used
	 */
	function force_fsockopen($enable = false)
	{
		$this->force_fsockopen = (bool) $enable;
	}

	/**
	 * Outputs the raw XML content of the feed, after it has gone through
	 * SimplePie's filters.
	 *
	 * Used only for debugging, this function will output the XML content as
	 * text/xml. When SimplePie reads in a feed, it does a bit of cleaning up
	 * before trying to parse it. Many parts of the feed are re-written in
	 * memory, and in the end, you have a parsable feed. XML dump shows you the
	 * actual XML that SimplePie tries to parse, which may or may not be very
	 * different from the original feed.
	 *
	 * @access public
	 * @since 1.0 Preview Release
	 * @param bool $enable Enable XML dump
	 */
	function enable_xml_dump($enable = false)
	{
		$this->xml_dump = (bool) $enable;
	}

	/**
	 * Enables/disables caching in SimplePie.
	 *
	 * This option allows you to disable caching all-together in SimplePie.
	 * However, disabling the cache can lead to longer load times.
	 *
	 * @access public
	 * @since 1.0 Preview Release
	 * @param bool $enable Enable caching
	 */
	function enable_cache($enable = true)
	{
		$this->cache = (bool) $enable;
	}

	/**
	 * Set the length of time (in seconds) that the contents of a feed
	 * will be cached.
	 *
	 * @access public
	 * @param int $seconds The feed content cache duration.
	 */
	function set_cache_duration($seconds = 3600)
	{
		$this->cache_duration = (int) $seconds;
	}

	/**
	 * Set the length of time (in seconds) that the autodiscovered feed
	 * URL will be cached.
	 *
	 * @access public
	 * @param int $seconds The autodiscovered feed URL cache duration.
	 */
	function set_autodiscovery_cache_duration($seconds = 604800)
	{
		$this->autodiscovery_cache_duration = (int) $seconds;
	}

	/**
	 * Set the file system location where the cached files should be stored.
	 *
	 * @access public
	 * @param string $location The file system location.
	 */
	function set_cache_location($location = './cache')
	{
		$this->cache_location = (string) $location;
	}

	/**
	 * Determines whether feed items should be sorted into reverse chronological order.
	 *
	 * @access public
	 * @param bool $enable Sort as reverse chronological order.
	 */
	function enable_order_by_date($enable = true)
	{
		$this->order_by_date = (bool) $enable;
	}

	/**
	 * Allows you to override the character encoding reported by the feed.
	 *
	 * @access public
	 * @param string $encoding Character encoding.
	 */
	function set_input_encoding($encoding = false)
	{
		if ($encoding)
		{
			$this->input_encoding = (string) $encoding;
		}
		else
		{
			$this->input_encoding = false;
		}
	}

	/**
	 * Set how much feed autodiscovery to do
	 *
	 * @access public
	 * @see SIMPLEPIE_LOCATOR_NONE
	 * @see SIMPLEPIE_LOCATOR_AUTODISCOVERY
	 * @see SIMPLEPIE_LOCATOR_LOCAL_EXTENSION
	 * @see SIMPLEPIE_LOCATOR_LOCAL_BODY
	 * @see SIMPLEPIE_LOCATOR_REMOTE_EXTENSION
	 * @see SIMPLEPIE_LOCATOR_REMOTE_BODY
	 * @see SIMPLEPIE_LOCATOR_ALL
	 * @param int $level Feed Autodiscovery Level (level can be a
	 * combination of the above constants, see bitwise OR operator)
	 */
	function set_autodiscovery_level($level = SIMPLEPIE_LOCATOR_ALL)
	{
		$this->autodiscovery = (int) $level;
	}

	/**
	 * Allows you to change which class SimplePie uses for caching.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_cache_class($class = 'SimplePie_Cache')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Cache'))
		{
			$this->cache_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for auto-discovery.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_locator_class($class = 'SimplePie_Locator')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Locator'))
		{
			$this->locator_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for XML parsing.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_parser_class($class = 'SimplePie_Parser')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Parser'))
		{
			$this->parser_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for remote file fetching.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_file_class($class = 'SimplePie_File')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_File'))
		{
			$this->file_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for data sanitization.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_sanitize_class($class = 'SimplePie_Sanitize')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Sanitize'))
		{
			$this->sanitize =& new $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for handling feed items.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_item_class($class = 'SimplePie_Item')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Item'))
		{
			$this->item_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for handling author data.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_author_class($class = 'SimplePie_Author')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Author'))
		{
			$this->author_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for handling category data.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_category_class($class = 'SimplePie_Category')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Category'))
		{
			$this->category_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for feed enclosures.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_enclosure_class($class = 'SimplePie_Enclosure')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Enclosure'))
		{
			$this->enclosure_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for <media:text> captions
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_caption_class($class = 'SimplePie_Caption')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Caption'))
		{
			$this->caption_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for <media:copyright>
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_copyright_class($class = 'SimplePie_Copyright')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Copyright'))
		{
			$this->copyright_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for <media:credit>
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_credit_class($class = 'SimplePie_Credit')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Credit'))
		{
			$this->credit_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for <media:rating>
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_rating_class($class = 'SimplePie_Rating')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Rating'))
		{
			$this->rating_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for <media:restriction>
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_restriction_class($class = 'SimplePie_Restriction')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Restriction'))
		{
			$this->restriction_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses for content-type sniffing.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_content_type_sniffer_class($class = 'SimplePie_Content_Type_Sniffer')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Content_Type_Sniffer'))
		{
			$this->content_type_sniffer_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to change which class SimplePie uses item sources.
	 * Useful when you are overloading or extending SimplePie's default classes.
	 *
	 * @access public
	 * @param string $class Name of custom class.
	 * @link http://php.net/manual/en/keyword.extends.php PHP4 extends documentation
	 * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
	 */
	function set_source_class($class = 'SimplePie_Source')
	{
		if (SimplePie_Misc::is_subclass_of($class, 'SimplePie_Source'))
		{
			$this->source_class = $class;
			return true;
		}
		return false;
	}

	/**
	 * Allows you to override the default user agent string.
	 *
	 * @access public
	 * @param string $ua New user agent string.
	 */
	function set_useragent($ua = SIMPLEPIE_USERAGENT)
	{
		$this->useragent = (string) $ua;
	}

	/**
	 * Set callback function to create cache filename with
	 *
	 * @access public
	 * @param mixed $function Callback function
	 */
	function set_cache_name_function($function = 'md5')
	{
		if (is_callable($function))
		{
			$this->cache_name_function = $function;
		}
	}

	/**
	 * Set javascript query string parameter
	 *
	 * @access public
	 * @param mixed $get Javascript query string parameter
	 */
	function set_javascript($get = 'js')
	{
		if ($get)
		{
			$this->javascript = (string) $get;
		}
		else
		{
			$this->javascript = false;
		}
	}

	/**
	 * Set options to make SP as fast as possible.  Forgoes a
	 * substantial amount of data sanitization in favor of speed.
	 *
	 * @access public
	 * @param bool $set Whether to set them or not
	 */
	function set_stupidly_fast($set = false)
	{
		if ($set)
		{
			$this->enable_order_by_date(false);
			$this->remove_div(false);
			$this->strip_comments(false);
			$this->strip_htmltags(false);
			$this->strip_attributes(false);
			$this->set_image_handler(false);
		}
	}

	/**
	 * Set maximum number of feeds to check with autodiscovery
	 *
	 * @access public
	 * @param int $max Maximum number of feeds to check
	 */
	function set_max_checked_feeds($max = 10)
	{
		$this->max_checked_feeds = (int) $max;
	}

	function remove_div($enable = true)
	{
		$this->sanitize->remove_div($enable);
	}

	function strip_htmltags($tags = '', $encode = null)
	{
		if ($tags === '')
		{
			$tags = $this->strip_htmltags;
		}
		$this->sanitize->strip_htmltags($tags);
		if ($encode !== null)
		{
			$this->sanitize->encode_instead_of_strip($tags);
		}
	}

	function encode_instead_of_strip($enable = true)
	{
		$this->sanitize->encode_instead_of_strip($enable);
	}

	function strip_attributes($attribs = '')
	{
		if ($attribs === '')
		{
			$attribs = $this->strip_attributes;
		}
		$this->sanitize->strip_attributes($attribs);
	}

	function set_output_encoding($encoding = 'UTF-8')
	{
		$this->sanitize->set_output_encoding($encoding);
	}

	function strip_comments($strip = false)
	{
		$this->sanitize->strip_comments($strip);
	}

	/**
	 * Set element/attribute key/value pairs of HTML attributes
	 * containing URLs that need to be resolved relative to the feed
	 *
	 * @access public
	 * @since 1.0
	 * @param array $element_attribute Element/attribute key/value pairs
	 */
	function set_url_replacements($element_attribute = array('a' => 'href', 'area' => 'href', 'blockquote' => 'cite', 'del' => 'cite', 'form' => 'action', 'img' => array('longdesc', 'src'), 'input' => 'src', 'ins' => 'cite', 'q' => 'cite'))
	{
		$this->sanitize->set_url_replacements($element_attribute);
	}

	/**
	 * Set the handler to enable the display of cached favicons.
	 *
	 * @access public
	 * @param str $page Web-accessible path to the handler_favicon.php file.
	 * @param str $qs The query string that the value should be passed to.
	 */
	function set_favicon_handler($page = false, $qs = 'i')
	{
		if ($page !== false)
		{
			$this->favicon_handler = $page . '?' . $qs . '=';
		}
		else
		{
			$this->favicon_handler = '';
		}
	}

	/**
	 * Set the handler to enable the display of cached images.
	 *
	 * @access public
	 * @param str $page Web-accessible path to the handler_image.php file.
	 * @param str $qs The query string that the value should be passed to.
	 */
	function set_image_handler($page = false, $qs = 'i')
	{
		if ($page !== false)
		{
			$this->sanitize->set_image_handler($page . '?' . $qs . '=');
		}
		else
		{
			$this->image_handler = '';
		}
	}

	/**
	 * Set the limit for items returned per-feed with multifeeds.
	 *
	 * @access public
	 * @param integer $limit The maximum number of items to return.
	 */
	function set_item_limit($limit = 0)
	{
		$this->item_limit = (int) $limit;
	}

	function init()
	{
		// Check absolute bare minimum requirements.
		if ((function_exists('version_compare') && version_compare(PHP_VERSION, '4.3.0', '<')) || !extension_loaded('xml') || !extension_loaded('pcre'))
		{
			return false;
		}
		// Then check the xml extension is sane (i.e., libxml 2.7.x issue on PHP < 5.2.9 and libxml 2.7.0 to 2.7.2 on any version) if we don't have xmlreader.
		elseif (!extension_loaded('xmlreader'))
		{
			static $xml_is_sane = null;
			if ($xml_is_sane === null)
			{
				$parser_check = xml_parser_create();
				xml_parse_into_struct($parser_check, '<foo>&amp;</foo>', $values);
				xml_parser_free($parser_check);
				$xml_is_sane = isset($values[0]['value']);
			}
			if (!$xml_is_sane)
			{
				return false;
			}
		}

		if (isset($_GET[$this->javascript]))
		{
			SimplePie_Misc::output_javascript();
			exit;
		}

		// Pass whatever was set with config options over to the sanitizer.
		$this->sanitize->pass_cache_data($this->cache, $this->cache_location, $this->cache_name_function, $this->cache_class);
		$this->sanitize->pass_file_data($this->file_class, $this->timeout, $this->useragent, $this->force_fsockopen);

		if ($this->feed_url !== null || $this->raw_data !== null)
		{
			$this->data = array();
			$this->multifeed_objects = array();
			$cache = false;

			if ($this->feed_url !== null)
			{
				$parsed_feed_url = SimplePie_Misc::parse_url($this->feed_url);
				// Decide whether to enable caching
				if ($this->cache && $parsed_feed_url['scheme'] !== '')
				{
					$cache = call_user_func(array($this->cache_class, 'create'), $this->cache_location, call_user_func($this->cache_name_function, $this->feed_url), 'spc');
				}
				// If it's enabled and we don't want an XML dump, use the cache
				if ($cache && !$this->xml_dump)
				{
					// Load the Cache
					$this->data = $cache->load();
					if (!empty($this->data))
					{
						// If the cache is for an outdated build of SimplePie
						if (!isset($this->data['build']) || $this->data['build'] !== SIMPLEPIE_BUILD)
						{
							$cache->unlink();
							$this->data = array();
						}
						// If we've hit a collision just rerun it with caching disabled
						elseif (isset($this->data['url']) && $this->data['url'] !== $this->feed_url)
						{
							$cache = false;
							$this->data = array();
						}
						// If we've got a non feed_url stored (if the page isn't actually a feed, or is a redirect) use that URL.
						elseif (isset($this->data['feed_url']))
						{
							// If the autodiscovery cache is still valid use it.
							if ($cache->mtime() + $this->autodiscovery_cache_duration > time())
							{
								// Do not need to do feed autodiscovery yet.
								if ($this->data['feed_url'] === $this->data['url'])
								{
									$cache->unlink();
									$this->data = array();
								}
								else
								{
									$this->set_feed_url($this->data['feed_url']);
									return $this->init();
								}
							}
						}
						// Check if the cache has been updated
						elseif ($cache->mtime() + $this->cache_duration < time())
						{
							// If we have last-modified and/or etag set
							if (isset($this->data['headers']['last-modified']) || isset($this->data['headers']['etag']))
							{
								$headers = array();
								if (isset($this->data['headers']['last-modified']))
								{
									$headers['if-modified-since'] = $this->data['headers']['last-modified'];
								}
								if (isset($this->data['headers']['etag']))
								{
									$headers['if-none-match'] = '"' . $this->data['headers']['etag'] . '"';
								}
								$file =& new $this->file_class($this->feed_url, $this->timeout/10, 5, $headers, $this->useragent, $this->force_fsockopen);
								if ($file->success)
								{
									if ($file->status_code === 304)
									{
										$cache->touch();
										return true;
									}
									else
									{
										$headers = $file->headers;
									}
								}
								else
								{
									unset($file);
								}
							}
						}
						// If the cache is still valid, just return true
						else
						{
							return true;
						}
					}
					// If the cache is empty, delete it
					else
					{
						$cache->unlink();
						$this->data = array();
					}
				}
				// If we don't already have the file (it'll only exist if we've opened it to check if the cache has been modified), open it.
				if (!isset($file))
				{
					if (is_a($this->file, 'SimplePie_File') && $this->file->url === $this->feed_url)
					{
						$file =& $this->file;
					}
					else
					{
						$file =& new $this->file_class($this->feed_url, $this->timeout, 5, null, $this->useragent, $this->force_fsockopen);
					}
				}
				// If the file connection has an error, set SimplePie::error to that and quit
				if (!$file->success && !($file->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($file->status_code === 200 || $file->status_code > 206 && $file->status_code < 300)))
				{
					$this->error = $file->error;
					if (!empty($this->data))
					{
						return true;
					}
					else
					{
						return false;
					}
				}

				if (!$this->force_feed)
				{
					// Check if the supplied URL is a feed, if it isn't, look for it.
					$locate =& new $this->locator_class($file, $this->timeout, $this->useragent, $this->file_class, $this->max_checked_feeds, $this->content_type_sniffer_class);
					if (!$locate->is_feed($file))
					{
						// We need to unset this so that if SimplePie::set_file() has been called that object is untouched
						unset($file);
						if ($file = $locate->find($this->autodiscovery, $this->all_discovered_feeds))
						{
							if ($cache)
							{
								$this->data = array('url' => $this->feed_url, 'feed_url' => $file->url, 'build' => SIMPLEPIE_BUILD);
								if (!$cache->save($this))
								{
									trigger_error("$this->cache_location is not writeable", E_USER_WARNING);
								}
								$cache = call_user_func(array($this->cache_class, 'create'), $this->cache_location, call_user_func($this->cache_name_function, $file->url), 'spc');
							}
							$this->feed_url = $file->url;
						}
						else
						{
							$this->error = "A feed could not be found at $this->feed_url";
							SimplePie_Misc::error($this->error, E_USER_NOTICE, __FILE__, __LINE__);
							return false;
						}
					}
					$locate = null;
				}

				$headers = $file->headers;
				$data = $file->body;
				$sniffer =& new $this->content_type_sniffer_class($file);
				$sniffed = $sniffer->get_type();
			}
			else
			{
				$data = $this->raw_data;
			}

			// Set up array of possible encodings
			$encodings = array();

			// First check to see if input has been overridden.
			if ($this->input_encoding !== false)
			{
				$encodings[] = $this->input_encoding;
			}

			$application_types = array('application/xml', 'application/xml-dtd', 'application/xml-external-parsed-entity');
			$text_types = array('text/xml', 'text/xml-external-parsed-entity');

			// RFC 3023 (only applies to sniffed content)
			if (isset($sniffed))
			{
				if (in_array($sniffed, $application_types) || substr($sniffed, 0, 12) === 'application/' && substr($sniffed, -4) === '+xml')
				{
					if (isset($headers['content-type']) && preg_match('/;\x20?charset=([^;]*)/i', $headers['content-type'], $charset))
					{
						$encodings[] = strtoupper($charset[1]);
					}
					$encodings = array_merge($encodings, SimplePie_Misc::xml_encoding($data));
					$encodings[] = 'UTF-8';
				}
				elseif (in_array($sniffed, $text_types) || substr($sniffed, 0, 5) === 'text/' && substr($sniffed, -4) === '+xml')
				{
					if (isset($headers['content-type']) && preg_match('/;\x20?charset=([^;]*)/i', $headers['content-type'], $charset))
					{
						$encodings[] = $charset[1];
					}
					$encodings[] = 'US-ASCII';
				}
				// Text MIME-type default
				elseif (substr($sniffed, 0, 5) === 'text/')
				{
					$encodings[] = 'US-ASCII';
				}
			}

			// Fallback to XML 1.0 Appendix F.1/UTF-8/ISO-8859-1
			$encodings = array_merge($encodings, SimplePie_Misc::xml_encoding($data));
			$encodings[] = 'UTF-8';
			$encodings[] = 'ISO-8859-1';

			// There's no point in trying an encoding twice
			$encodings = array_unique($encodings);

			// If we want the XML, just output that with the most likely encoding and quit
			if ($this->xml_dump)
			{
				header('Content-type: text/xml; charset=' . $encodings[0]);
				echo $data;
				exit;
			}

			// Loop through each possible encoding, till we return something, or run out of possibilities
			foreach ($encodings as $encoding)
			{
				// Change the encoding to UTF-8 (as we always use UTF-8 internally)
				if ($utf8_data = SimplePie_Misc::change_encoding($data, $encoding, 'UTF-8'))
				{
					// Create new parser
					$parser =& new $this->parser_class();

					// If it's parsed fine
					if ($parser->parse($utf8_data, 'UTF-8'))
					{
						$this->data = $parser->get_data();
						if ($this->get_type() & ~SIMPLEPIE_TYPE_NONE)
						{
							if (isset($headers))
							{
								$this->data['headers'] = $headers;
							}
							$this->data['build'] = SIMPLEPIE_BUILD;

							// Cache the file if caching is enabled
							if ($cache && !$cache->save($this))
							{
								trigger_error("$cache->name is not writeable", E_USER_WARNING);
							}
							return true;
						}
						else
						{
							$this->error = "A feed could not be found at $this->feed_url";
							SimplePie_Misc::error($this->error, E_USER_NOTICE, __FILE__, __LINE__);
							return false;
						}
					}
				}
			}
			if(isset($parser))
			{
				// We have an error, just set SimplePie_Misc::error to it and quit
				$this->error = sprintf('XML error: %s at line %d, column %d', $parser->get_error_string(), $parser->get_current_line(), $parser->get_current_column());
			}
			else
			{
				$this->error = 'The data could not be converted to UTF-8';
			}
			SimplePie_Misc::error($this->error, E_USER_NOTICE, __FILE__, __LINE__);
			return false;
		}
		elseif (!empty($this->multifeed_url))
		{
			$i = 0;
			$success = 0;
			$this->multifeed_objects = array();
			foreach ($this->multifeed_url as $url)
			{
				if (SIMPLEPIE_PHP5)
				{
					// This keyword needs to defy coding standards for PHP4 compatibility
					$this->multifeed_objects[$i] = clone($this);
				}
				else
				{
					$this->multifeed_objects[$i] = $this;
				}
				$this->multifeed_objects[$i]->set_feed_url($url);
				$success |= $this->multifeed_objects[$i]->init();
				$i++;
			}
			return (bool) $success;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Return the error message for the occurred error
	 *
	 * @access public
	 * @return string Error message
	 */
	function error()
	{
		return $this->error;
	}

	function get_encoding()
	{
		return $this->sanitize->output_encoding;
	}

	function handle_content_type($mime = 'text/html')
	{
		if (!headers_sent())
		{
			$header = "Content-type: $mime;";
			if ($this->get_encoding())
			{
				$header .= ' charset=' . $this->get_encoding();
			}
			else
			{
				$header .= ' charset=UTF-8';
			}
			header($header);
		}
	}

	function get_type()
	{
		if (!isset($this->data['type']))
		{
			$this->data['type'] = SIMPLEPIE_TYPE_ALL;
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed']))
			{
				$this->data['type'] &= SIMPLEPIE_TYPE_ATOM_10;
			}
			elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed']))
			{
				$this->data['type'] &= SIMPLEPIE_TYPE_ATOM_03;
			}
			elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF']))
			{
				if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['channel'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['image'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_10]['textinput']))
				{
					$this->data['type'] &= SIMPLEPIE_TYPE_RSS_10;
				}
				if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['channel'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['image'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item'])
				|| isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_090]['textinput']))
				{
					$this->data['type'] &= SIMPLEPIE_TYPE_RSS_090;
				}
			}
			elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss']))
			{
				$this->data['type'] &= SIMPLEPIE_TYPE_RSS_ALL;
				if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['attribs']['']['version']))
				{
					switch (trim($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['attribs']['']['version']))
					{
						case '0.91':
							$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091;
							if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['skiphours']['hour'][0]['data']))
							{
								switch (trim($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['skiphours']['hour'][0]['data']))
								{
									case '0':
										$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091_NETSCAPE;
										break;

									case '24':
										$this->data['type'] &= SIMPLEPIE_TYPE_RSS_091_USERLAND;
										break;
								}
							}
							break;

						case '0.92':
							$this->data['type'] &= SIMPLEPIE_TYPE_RSS_092;
							break;

						case '0.93':
							$this->data['type'] &= SIMPLEPIE_TYPE_RSS_093;
							break;

						case '0.94':
							$this->data['type'] &= SIMPLEPIE_TYPE_RSS_094;
							break;

						case '2.0':
							$this->data['type'] &= SIMPLEPIE_TYPE_RSS_20;
							break;
					}
				}
			}
			else
			{
				$this->data['type'] = SIMPLEPIE_TYPE_NONE;
			}
		}
		return $this->data['type'];
	}

	/**
	 * Returns the URL for the favicon of the feed's website.
	 *
	 * @todo Cache atom:icon
	 * @access public
	 * @since 1.0
	 */
	function get_favicon()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'icon'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif (($url = $this->get_link()) !== null && preg_match('/^http(s)?:\/\//i', $url))
		{
			$favicon = SimplePie_Misc::absolutize_url('/favicon.ico', $url);

			if ($this->cache && $this->favicon_handler)
			{
				$favicon_filename = call_user_func($this->cache_name_function, $favicon);
				$cache = call_user_func(array($this->cache_class, 'create'), $this->cache_location, $favicon_filename, 'spi');

				if ($cache->load())
				{
					return $this->sanitize($this->favicon_handler . $favicon_filename, SIMPLEPIE_CONSTRUCT_IRI);
				}
				else
				{
					$file =& new $this->file_class($favicon, $this->timeout / 10, 5, array('X-FORWARDED-FOR' => $_SERVER['REMOTE_ADDR']), $this->useragent, $this->force_fsockopen);

					if ($file->success && ($file->method & SIMPLEPIE_FILE_SOURCE_REMOTE === 0 || ($file->status_code === 200 || $file->status_code > 206 && $file->status_code < 300)) && strlen($file->body) > 0)
					{
						$sniffer =& new $this->content_type_sniffer_class($file);
						if (substr($sniffer->get_type(), 0, 6) === 'image/')
						{
							if ($cache->save(array('headers' => $file->headers, 'body' => $file->body)))
							{
								return $this->sanitize($this->favicon_handler . $favicon_filename, SIMPLEPIE_CONSTRUCT_IRI);
							}
							else
							{
								trigger_error("$cache->name is not writeable", E_USER_WARNING);
								return $this->sanitize($favicon, SIMPLEPIE_CONSTRUCT_IRI);
							}
						}
						// not an image
						else
						{
							return false;
						}
					}
				}
			}
			else
			{
				return $this->sanitize($favicon, SIMPLEPIE_CONSTRUCT_IRI);
			}
		}
		return false;
	}

	/**
	 * @todo If we have a perm redirect we should return the new URL
	 * @todo When we make the above change, let's support <itunes:new-feed-url> as well
	 * @todo Also, |atom:link|@rel=self
	 */
	function subscribe_url()
	{
		if ($this->feed_url !== null)
		{
			return $this->sanitize($this->feed_url, SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function subscribe_feed()
	{
		if ($this->feed_url !== null)
		{
			return $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url, 2), SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function subscribe_outlook()
	{
		if ($this->feed_url !== null)
		{
			return $this->sanitize('outlook' . SimplePie_Misc::fix_protocol($this->feed_url, 2), SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function subscribe_podcast()
	{
		if ($this->feed_url !== null)
		{
			return $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url, 3), SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function subscribe_itunes()
	{
		if ($this->feed_url !== null)
		{
			return $this->sanitize(SimplePie_Misc::fix_protocol($this->feed_url, 4), SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	/**
	 * Creates the subscribe_* methods' return data
	 *
	 * @access private
	 * @param string $feed_url String to prefix to the feed URL
	 * @param string $site_url String to prefix to the site URL (and
	 * suffix to the feed URL)
	 * @return mixed URL if feed exists, false otherwise
	 */
	function subscribe_service($feed_url, $site_url = null)
	{
		if ($this->subscribe_url())
		{
			$return = $feed_url . rawurlencode($this->feed_url);
			if ($site_url !== null && $this->get_link() !== null)
			{
				$return .= $site_url . rawurlencode($this->get_link());
			}
			return $this->sanitize($return, SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function subscribe_aol()
	{
		return $this->subscribe_service('http://feeds.my.aol.com/add.jsp?url=');
	}

	function subscribe_bloglines()
	{
		return $this->subscribe_service('http://www.bloglines.com/sub/');
	}

	function subscribe_eskobo()
	{
		return $this->subscribe_service('http://www.eskobo.com/?AddToMyPage=');
	}

	function subscribe_feedfeeds()
	{
		return $this->subscribe_service('http://www.feedfeeds.com/add?feed=');
	}

	function subscribe_feedster()
	{
		return $this->subscribe_service('http://www.feedster.com/myfeedster.php?action=addrss&confirm=no&rssurl=');
	}

	function subscribe_google()
	{
		return $this->subscribe_service('http://fusion.google.com/add?feedurl=');
	}

	function subscribe_gritwire()
	{
		return $this->subscribe_service('http://my.gritwire.com/feeds/addExternalFeed.aspx?FeedUrl=');
	}

	function subscribe_msn()
	{
		return $this->subscribe_service('http://my.msn.com/addtomymsn.armx?id=rss&ut=', '&ru=');
	}

	function subscribe_netvibes()
	{
		return $this->subscribe_service('http://www.netvibes.com/subscribe.php?url=');
	}

	function subscribe_newsburst()
	{
		return $this->subscribe_service('http://www.newsburst.com/Source/?add=');
	}

	function subscribe_newsgator()
	{
		return $this->subscribe_service('http://www.newsgator.com/ngs/subscriber/subext.aspx?url=');
	}

	function subscribe_odeo()
	{
		return $this->subscribe_service('http://www.odeo.com/listen/subscribe?feed=');
	}

	function subscribe_podnova()
	{
		return $this->subscribe_service('http://www.podnova.com/index_your_podcasts.srf?action=add&url=');
	}

	function subscribe_rojo()
	{
		return $this->subscribe_service('http://www.rojo.com/add-subscription?resource=');
	}

	function subscribe_yahoo()
	{
		return $this->subscribe_service('http://add.my.yahoo.com/rss?url=');
	}

	function get_feed_tags($namespace, $tag)
	{
		$type = $this->get_type();
		if ($type & SIMPLEPIE_TYPE_ATOM_10)
		{
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['child'][$namespace][$tag]))
			{
				return $this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['child'][$namespace][$tag];
			}
		}
		if ($type & SIMPLEPIE_TYPE_ATOM_03)
		{
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['child'][$namespace][$tag]))
			{
				return $this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['child'][$namespace][$tag];
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_RDF)
		{
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][$namespace][$tag]))
			{
				return $this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['child'][$namespace][$tag];
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
		{
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][$namespace][$tag]))
			{
				return $this->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][$namespace][$tag];
			}
		}
		return null;
	}

	function get_channel_tags($namespace, $tag)
	{
		$type = $this->get_type();
		if ($type & SIMPLEPIE_TYPE_ATOM_ALL)
		{
			if ($return = $this->get_feed_tags($namespace, $tag))
			{
				return $return;
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_10)
		{
			if ($channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'channel'))
			{
				if (isset($channel[0]['child'][$namespace][$tag]))
				{
					return $channel[0]['child'][$namespace][$tag];
				}
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_090)
		{
			if ($channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'channel'))
			{
				if (isset($channel[0]['child'][$namespace][$tag]))
				{
					return $channel[0]['child'][$namespace][$tag];
				}
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
		{
			if ($channel = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'channel'))
			{
				if (isset($channel[0]['child'][$namespace][$tag]))
				{
					return $channel[0]['child'][$namespace][$tag];
				}
			}
		}
		return null;
	}

	function get_image_tags($namespace, $tag)
	{
		$type = $this->get_type();
		if ($type & SIMPLEPIE_TYPE_RSS_10)
		{
			if ($image = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'image'))
			{
				if (isset($image[0]['child'][$namespace][$tag]))
				{
					return $image[0]['child'][$namespace][$tag];
				}
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_090)
		{
			if ($image = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'image'))
			{
				if (isset($image[0]['child'][$namespace][$tag]))
				{
					return $image[0]['child'][$namespace][$tag];
				}
			}
		}
		if ($type & SIMPLEPIE_TYPE_RSS_SYNDICATION)
		{
			if ($image = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'image'))
			{
				if (isset($image[0]['child'][$namespace][$tag]))
				{
					return $image[0]['child'][$namespace][$tag];
				}
			}
		}
		return null;
	}

	function get_base($element = array())
	{
		if (!($this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION) && !empty($element['xml_base_explicit']) && isset($element['xml_base']))
		{
			return $element['xml_base'];
		}
		elseif ($this->get_link() !== null)
		{
			return $this->get_link();
		}
		else
		{
			return $this->subscribe_url();
		}
	}

	function sanitize($data, $type, $base = '')
	{
		return $this->sanitize->sanitize($data, $type, $base);
	}

	function get_title()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'title'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_category($key = 0)
	{
		$categories = $this->get_categories();
		if (isset($categories[$key]))
		{
			return $categories[$key];
		}
		else
		{
			return null;
		}
	}

	function get_categories()
	{
		$categories = array();

		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'category') as $category)
		{
			$term = null;
			$scheme = null;
			$label = null;
			if (isset($category['attribs']['']['term']))
			{
				$term = $this->sanitize($category['attribs']['']['term'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['scheme']))
			{
				$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['label']))
			{
				$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			$categories[] =& new $this->category_class($term, $scheme, $label);
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'category') as $category)
		{
			// This is really the label, but keep this as the term also for BC.
			// Label will also work on retrieving because that falls back to term.
			$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			if (isset($category['attribs']['']['domain']))
			{
				$scheme = $this->sanitize($category['attribs']['']['domain'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			else
			{
				$scheme = null;
			}
			$categories[] =& new $this->category_class($term, $scheme, null);
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'subject') as $category)
		{
			$categories[] =& new $this->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'subject') as $category)
		{
			$categories[] =& new $this->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($categories))
		{
			return SimplePie_Misc::array_unique($categories);
		}
		else
		{
			return null;
		}
	}

	function get_author($key = 0)
	{
		$authors = $this->get_authors();
		if (isset($authors[$key]))
		{
			return $authors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_authors()
	{
		$authors = array();
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'author') as $author)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$authors[] =& new $this->author_class($name, $uri, $email);
			}
		}
		if ($author = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'author'))
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$authors[] =& new $this->author_class($name, $url, $email);
			}
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'creator') as $author)
		{
			$authors[] =& new $this->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'creator') as $author)
		{
			$authors[] =& new $this->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'author') as $author)
		{
			$authors[] =& new $this->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($authors))
		{
			return SimplePie_Misc::array_unique($authors);
		}
		else
		{
			return null;
		}
	}

	function get_contributor($key = 0)
	{
		$contributors = $this->get_contributors();
		if (isset($contributors[$key]))
		{
			return $contributors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_contributors()
	{
		$contributors = array();
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'contributor') as $contributor)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$contributors[] =& new $this->author_class($name, $uri, $email);
			}
		}
		foreach ((array) $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'contributor') as $contributor)
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$contributors[] =& new $this->author_class($name, $url, $email);
			}
		}

		if (!empty($contributors))
		{
			return SimplePie_Misc::array_unique($contributors);
		}
		else
		{
			return null;
		}
	}

	function get_link($key = 0, $rel = 'alternate')
	{
		$links = $this->get_links($rel);
		if (isset($links[$key]))
		{
			return $links[$key];
		}
		else
		{
			return null;
		}
	}

	/**
	 * Added for parity between the parent-level and the item/entry-level.
	 */
	function get_permalink()
	{
		return $this->get_link(0);
	}

	function get_links($rel = 'alternate')
	{
		if (!isset($this->data['links']))
		{
			$this->data['links'] = array();
			if ($links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'link'))
			{
				foreach ($links as $link)
				{
					if (isset($link['attribs']['']['href']))
					{
						$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
						$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));
					}
				}
			}
			if ($links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'link'))
			{
				foreach ($links as $link)
				{
					if (isset($link['attribs']['']['href']))
					{
						$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
						$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));

					}
				}
			}
			if ($links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}

			$keys = array_keys($this->data['links']);
			foreach ($keys as $key)
			{
				if (SimplePie_Misc::is_isegment_nz_nc($key))
				{
					if (isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key], $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
						$this->data['links'][$key] =& $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
					}
					else
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] =& $this->data['links'][$key];
					}
				}
				elseif (substr($key, 0, 41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
				{
					$this->data['links'][substr($key, 41)] =& $this->data['links'][$key];
				}
				$this->data['links'][$key] = array_unique($this->data['links'][$key]);
			}
		}

		if (isset($this->data['links'][$rel]))
		{
			return $this->data['links'][$rel];
		}
		else
		{
			return null;
		}
	}

	function get_all_discovered_feeds()
	{
		return $this->all_discovered_feeds;
	}

	function get_description()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'subtitle'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'tagline'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'summary'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'subtitle'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		else
		{
			return null;
		}
	}

	function get_copyright()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'copyright'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'copyright'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_language()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_11, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_DC_10, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['xml_lang']))
		{
			return $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]['xml_lang'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['xml_lang']))
		{
			return $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]['xml_lang'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (isset($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['xml_lang']))
		{
			return $this->sanitize($this->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]['xml_lang'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (isset($this->data['headers']['content-language']))
		{
			return $this->sanitize($this->data['headers']['content-language'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_latitude()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lat'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[1];
		}
		else
		{
			return null;
		}
	}

	function get_longitude()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'long'))
		{
			return (float) $return[0]['data'];
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lon'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[2];
		}
		else
		{
			return null;
		}
	}

	function get_image_title()
	{
		if ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_DC_11, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_DC_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_image_url()
	{
		if ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'image'))
		{
			return $this->sanitize($return[0]['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI);
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'logo'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'icon'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'url'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'url'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'url'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		else
		{
			return null;
		}
	}

	function get_image_link()
	{
		if ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'link'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'link'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'link'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		else
		{
			return null;
		}
	}

	function get_image_width()
	{
		if ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'width'))
		{
			return round($return[0]['data']);
		}
		elseif ($this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION && $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'url'))
		{
			return 88.0;
		}
		else
		{
			return null;
		}
	}

	function get_image_height()
	{
		if ($return = $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'height'))
		{
			return round($return[0]['data']);
		}
		elseif ($this->get_type() & SIMPLEPIE_TYPE_RSS_SYNDICATION && $this->get_image_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'url'))
		{
			return 31.0;
		}
		else
		{
			return null;
		}
	}

	function get_item_quantity($max = 0)
	{
		$max = (int) $max;
		$qty = count($this->get_items());
		if ($max === 0)
		{
			return $qty;
		}
		else
		{
			return ($qty > $max) ? $max : $qty;
		}
	}

	function get_item($key = 0)
	{
		$items = $this->get_items();
		if (isset($items[$key]))
		{
			return $items[$key];
		}
		else
		{
			return null;
		}
	}

	function get_items($start = 0, $end = 0)
	{
		if (!isset($this->data['items']))
		{
			if (!empty($this->multifeed_objects))
			{
				$this->data['items'] = SimplePie::merge_items($this->multifeed_objects, $start, $end, $this->item_limit);
			}
			else
			{
				$this->data['items'] = array();
				if ($items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'entry'))
				{
					$keys = array_keys($items);
					foreach ($keys as $key)
					{
						$this->data['items'][] =& new $this->item_class($this, $items[$key]);
					}
				}
				if ($items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'entry'))
				{
					$keys = array_keys($items);
					foreach ($keys as $key)
					{
						$this->data['items'][] =& new $this->item_class($this, $items[$key]);
					}
				}
				if ($items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'item'))
				{
					$keys = array_keys($items);
					foreach ($keys as $key)
					{
						$this->data['items'][] =& new $this->item_class($this, $items[$key]);
					}
				}
				if ($items = $this->get_feed_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'item'))
				{
					$keys = array_keys($items);
					foreach ($keys as $key)
					{
						$this->data['items'][] =& new $this->item_class($this, $items[$key]);
					}
				}
				if ($items = $this->get_channel_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'item'))
				{
					$keys = array_keys($items);
					foreach ($keys as $key)
					{
						$this->data['items'][] =& new $this->item_class($this, $items[$key]);
					}
				}
			}
		}

		if (!empty($this->data['items']))
		{
			// If we want to order it by date, check if all items have a date, and then sort it
			if ($this->order_by_date && empty($this->multifeed_objects))
			{
				if (!isset($this->data['ordered_items']))
				{
					$do_sort = true;
					foreach ($this->data['items'] as $item)
					{
						if (!$item->get_date('U'))
						{
							$do_sort = false;
							break;
						}
					}
					$item = null;
					$this->data['ordered_items'] = $this->data['items'];
					if ($do_sort)
					{
						usort($this->data['ordered_items'], array(&$this, 'sort_items'));
					}
				}
				$items = $this->data['ordered_items'];
			}
			else
			{
				$items = $this->data['items'];
			}

			// Slice the data as desired
			if ($end === 0)
			{
				return array_slice($items, $start);
			}
			else
			{
				return array_slice($items, $start, $end);
			}
		}
		else
		{
			return array();
		}
	}

	/**
	 * @static
	 */
	function sort_items($a, $b)
	{
		return $a->get_date('U') <= $b->get_date('U');
	}

	/**
	 * @static
	 */
	function merge_items($urls, $start = 0, $end = 0, $limit = 0)
	{
		if (is_array($urls) && sizeof($urls) > 0)
		{
			$items = array();
			foreach ($urls as $arg)
			{
				if (is_a($arg, 'SimplePie'))
				{
					$items = array_merge($items, $arg->get_items(0, $limit));
				}
				else
				{
					trigger_error('Arguments must be SimplePie objects', E_USER_WARNING);
				}
			}

			$do_sort = true;
			foreach ($items as $item)
			{
				if (!$item->get_date('U'))
				{
					$do_sort = false;
					break;
				}
			}
			$item = null;
			if ($do_sort)
			{
				usort($items, array('SimplePie', 'sort_items'));
			}

			if ($end === 0)
			{
				return array_slice($items, $start);
			}
			else
			{
				return array_slice($items, $start, $end);
			}
		}
		else
		{
			trigger_error('Cannot merge zero SimplePie objects', E_USER_WARNING);
			return array();
		}
	}
}

class SimplePie_Item
{
	var $feed;
	var $data = array();

	function SimplePie_Item($feed, $data)
	{
		$this->feed = $feed;
		$this->data = $data;
	}

	function __toString()
	{
		return md5(serialize($this->data));
	}

	/**
	 * Remove items that link back to this before destroying this object
	 */
	function __destruct()
	{
		if ((version_compare(PHP_VERSION, '5.3', '<') || !gc_enabled()) && !ini_get('zend.ze1_compatibility_mode'))
		{
			unset($this->feed);
		}
	}

	function get_item_tags($namespace, $tag)
	{
		if (isset($this->data['child'][$namespace][$tag]))
		{
			return $this->data['child'][$namespace][$tag];
		}
		else
		{
			return null;
		}
	}

	function get_base($element = array())
	{
		return $this->feed->get_base($element);
	}

	function sanitize($data, $type, $base = '')
	{
		return $this->feed->sanitize($data, $type, $base);
	}

	function get_feed()
	{
		return $this->feed;
	}

	function get_id($hash = false)
	{
		if (!$hash)
		{
			if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'id'))
			{
				return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'id'))
			{
				return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'guid'))
			{
				return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'identifier'))
			{
				return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'identifier'))
			{
				return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif (($return = $this->get_permalink()) !== null)
			{
				return $return;
			}
			elseif (($return = $this->get_title()) !== null)
			{
				return $return;
			}
		}
		if ($this->get_permalink() !== null || $this->get_title() !== null)
		{
			return md5($this->get_permalink() . $this->get_title());
		}
		else
		{
			return md5(serialize($this->data));
		}
	}

	function get_title()
	{
		if (!isset($this->data['title']))
		{
			if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'title'))
			{
				$this->data['title'] = $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			else
			{
				$this->data['title'] = null;
			}
		}
		return $this->data['title'];
	}

	function get_description($description_only = false)
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'summary'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'summary'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'summary'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'subtitle'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (!$description_only)
		{
			return $this->get_content(true);
		}
		else
		{
			return null;
		}
	}

	function get_content($content_only = false)
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'content'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_content_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'content'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10_MODULES_CONTENT, 'encoded'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif (!$content_only)
		{
			return $this->get_description(true);
		}
		else
		{
			return null;
		}
	}

	function get_category($key = 0)
	{
		$categories = $this->get_categories();
		if (isset($categories[$key]))
		{
			return $categories[$key];
		}
		else
		{
			return null;
		}
	}

	function get_categories()
	{
		$categories = array();

		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'category') as $category)
		{
			$term = null;
			$scheme = null;
			$label = null;
			if (isset($category['attribs']['']['term']))
			{
				$term = $this->sanitize($category['attribs']['']['term'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['scheme']))
			{
				$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['label']))
			{
				$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			$categories[] =& new $this->feed->category_class($term, $scheme, $label);
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'category') as $category)
		{
			// This is really the label, but keep this as the term also for BC.
			// Label will also work on retrieving because that falls back to term.
			$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			if (isset($category['attribs']['']['domain']))
			{
				$scheme = $this->sanitize($category['attribs']['']['domain'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			else
			{
				$scheme = null;
			}
			$categories[] =& new $this->feed->category_class($term, $scheme, null);
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'subject') as $category)
		{
			$categories[] =& new $this->feed->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'subject') as $category)
		{
			$categories[] =& new $this->feed->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($categories))
		{
			return SimplePie_Misc::array_unique($categories);
		}
		else
		{
			return null;
		}
	}

	function get_author($key = 0)
	{
		$authors = $this->get_authors();
		if (isset($authors[$key]))
		{
			return $authors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_contributor($key = 0)
	{
		$contributors = $this->get_contributors();
		if (isset($contributors[$key]))
		{
			return $contributors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_contributors()
	{
		$contributors = array();
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'contributor') as $contributor)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$contributors[] =& new $this->feed->author_class($name, $uri, $email);
			}
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'contributor') as $contributor)
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$contributors[] =& new $this->feed->author_class($name, $url, $email);
			}
		}

		if (!empty($contributors))
		{
			return SimplePie_Misc::array_unique($contributors);
		}
		else
		{
			return null;
		}
	}

	function get_authors()
	{
		$authors = array();
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'author') as $author)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$authors[] =& new $this->feed->author_class($name, $uri, $email);
			}
		}
		if ($author = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'author'))
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$authors[] =& new $this->feed->author_class($name, $url, $email);
			}
		}
		if ($author = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'author'))
		{
			$authors[] =& new $this->feed->author_class(null, null, $this->sanitize($author[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'creator') as $author)
		{
			$authors[] =& new $this->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'creator') as $author)
		{
			$authors[] =& new $this->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'author') as $author)
		{
			$authors[] =& new $this->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($authors))
		{
			return SimplePie_Misc::array_unique($authors);
		}
		elseif (($source = $this->get_source()) && ($authors = $source->get_authors()))
		{
			return $authors;
		}
		elseif ($authors = $this->feed->get_authors())
		{
			return $authors;
		}
		else
		{
			return null;
		}
	}

	function get_copyright()
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_date($date_format = 'j F Y, g:i a')
	{
		if (!isset($this->data['date']))
		{
			if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'published'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'updated'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'issued'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'created'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'modified'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'pubDate'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'date'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}
			elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_DC_10, 'date'))
			{
				$this->data['date']['raw'] = $return[0]['data'];
			}

			if (!empty($this->data['date']['raw']))
			{
				$parser = SimplePie_Parse_Date::get();
				$this->data['date']['parsed'] = $parser->parse($this->data['date']['raw']);
			}
			else
			{
				$this->data['date'] = null;
			}
		}
		if ($this->data['date'])
		{
			$date_format = (string) $date_format;
			switch ($date_format)
			{
				case '':
					return $this->sanitize($this->data['date']['raw'], SIMPLEPIE_CONSTRUCT_TEXT);

				case 'U':
					return $this->data['date']['parsed'];

				default:
					return date($date_format, $this->data['date']['parsed']);
			}
		}
		else
		{
			return null;
		}
	}

	function get_local_date($date_format = '%c')
	{
		if (!$date_format)
		{
			return $this->sanitize($this->get_date(''), SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (($date = $this->get_date('U')) !== null)
		{
			return strftime($date_format, $date);
		}
		else
		{
			return null;
		}
	}

	function get_permalink()
	{
		$link = $this->get_link();
		$enclosure = $this->get_enclosure(0);
		if ($link !== null)
		{
			return $link;
		}
		elseif ($enclosure !== null)
		{
			return $enclosure->get_link();
		}
		else
		{
			return null;
		}
	}

	function get_link($key = 0, $rel = 'alternate')
	{
		$links = $this->get_links($rel);
		if ($links[$key] !== null)
		{
			return $links[$key];
		}
		else
		{
			return null;
		}
	}

	function get_links($rel = 'alternate')
	{
		if (!isset($this->data['links']))
		{
			$this->data['links'] = array();
			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'link') as $link)
			{
				if (isset($link['attribs']['']['href']))
				{
					$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
					$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));

				}
			}
			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'link') as $link)
			{
				if (isset($link['attribs']['']['href']))
				{
					$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
					$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));
				}
			}
			if ($links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'guid'))
			{
				if (!isset($links[0]['attribs']['']['isPermaLink']) || strtolower(trim($links[0]['attribs']['']['isPermaLink'])) === 'true')
				{
					$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
				}
			}

			$keys = array_keys($this->data['links']);
			foreach ($keys as $key)
			{
				if (SimplePie_Misc::is_isegment_nz_nc($key))
				{
					if (isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key], $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
						$this->data['links'][$key] =& $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
					}
					else
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] =& $this->data['links'][$key];
					}
				}
				elseif (substr($key, 0, 41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
				{
					$this->data['links'][substr($key, 41)] =& $this->data['links'][$key];
				}
				$this->data['links'][$key] = array_unique($this->data['links'][$key]);
			}
		}
		if (isset($this->data['links'][$rel]))
		{
			return $this->data['links'][$rel];
		}
		else
		{
			return null;
		}
	}

	/**
	 * @todo Add ability to prefer one type of content over another (in a media group).
	 */
	function get_enclosure($key = 0, $prefer = null)
	{
		$enclosures = $this->get_enclosures();
		if (isset($enclosures[$key]))
		{
			return $enclosures[$key];
		}
		else
		{
			return null;
		}
	}

	/**
	 * Grabs all available enclosures (podcasts, etc.)
	 *
	 * Supports the <enclosure> RSS tag, as well as Media RSS and iTunes RSS.
	 *
	 * At this point, we're pretty much assuming that all enclosures for an item are the same content.  Anything else is too complicated to properly support.
	 *
	 * @todo Add support for end-user defined sorting of enclosures by type/handler (so we can prefer the faster-loading FLV over MP4).
	 * @todo If an element exists at a level, but it's value is empty, we should fall back to the value from the parent (if it exists).
	 */
	function get_enclosures()
	{
		if (!isset($this->data['enclosures']))
		{
			$this->data['enclosures'] = array();

			// Elements
			$captions_parent = null;
			$categories_parent = null;
			$copyrights_parent = null;
			$credits_parent = null;
			$description_parent = null;
			$duration_parent = null;
			$hashes_parent = null;
			$keywords_parent = null;
			$player_parent = null;
			$ratings_parent = null;
			$restrictions_parent = null;
			$thumbnails_parent = null;
			$title_parent = null;

			// Let's do the channel and item-level ones first, and just re-use them if we need to.
			$parent = $this->get_feed();

			// CAPTIONS
			if ($captions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'text'))
			{
				foreach ($captions as $caption)
				{
					$caption_type = null;
					$caption_lang = null;
					$caption_startTime = null;
					$caption_endTime = null;
					$caption_text = null;
					if (isset($caption['attribs']['']['type']))
					{
						$caption_type = $this->sanitize($caption['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['lang']))
					{
						$caption_lang = $this->sanitize($caption['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['start']))
					{
						$caption_startTime = $this->sanitize($caption['attribs']['']['start'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['end']))
					{
						$caption_endTime = $this->sanitize($caption['attribs']['']['end'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['data']))
					{
						$caption_text = $this->sanitize($caption['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$captions_parent[] =& new $this->feed->caption_class($caption_type, $caption_lang, $caption_startTime, $caption_endTime, $caption_text);
				}
			}
			elseif ($captions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'text'))
			{
				foreach ($captions as $caption)
				{
					$caption_type = null;
					$caption_lang = null;
					$caption_startTime = null;
					$caption_endTime = null;
					$caption_text = null;
					if (isset($caption['attribs']['']['type']))
					{
						$caption_type = $this->sanitize($caption['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['lang']))
					{
						$caption_lang = $this->sanitize($caption['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['start']))
					{
						$caption_startTime = $this->sanitize($caption['attribs']['']['start'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['attribs']['']['end']))
					{
						$caption_endTime = $this->sanitize($caption['attribs']['']['end'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($caption['data']))
					{
						$caption_text = $this->sanitize($caption['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$captions_parent[] =& new $this->feed->caption_class($caption_type, $caption_lang, $caption_startTime, $caption_endTime, $caption_text);
				}
			}
			if (is_array($captions_parent))
			{
				$captions_parent = array_values(SimplePie_Misc::array_unique($captions_parent));
			}

			// CATEGORIES
			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'category') as $category)
			{
				$term = null;
				$scheme = null;
				$label = null;
				if (isset($category['data']))
				{
					$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				if (isset($category['attribs']['']['scheme']))
				{
					$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				else
				{
					$scheme = 'http://search.yahoo.com/mrss/category_schema';
				}
				if (isset($category['attribs']['']['label']))
				{
					$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				$categories_parent[] =& new $this->feed->category_class($term, $scheme, $label);
			}
			foreach ((array) $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'category') as $category)
			{
				$term = null;
				$scheme = null;
				$label = null;
				if (isset($category['data']))
				{
					$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				if (isset($category['attribs']['']['scheme']))
				{
					$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				else
				{
					$scheme = 'http://search.yahoo.com/mrss/category_schema';
				}
				if (isset($category['attribs']['']['label']))
				{
					$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				$categories_parent[] =& new $this->feed->category_class($term, $scheme, $label);
			}
			foreach ((array) $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'category') as $category)
			{
				$term = null;
				$scheme = 'http://www.itunes.com/dtds/podcast-1.0.dtd';
				$label = null;
				if (isset($category['attribs']['']['text']))
				{
					$label = $this->sanitize($category['attribs']['']['text'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				$categories_parent[] =& new $this->feed->category_class($term, $scheme, $label);

				if (isset($category['child'][SIMPLEPIE_NAMESPACE_ITUNES]['category']))
				{
					foreach ((array) $category['child'][SIMPLEPIE_NAMESPACE_ITUNES]['category'] as $subcategory)
					{
						if (isset($subcategory['attribs']['']['text']))
						{
							$label = $this->sanitize($subcategory['attribs']['']['text'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						$categories_parent[] =& new $this->feed->category_class($term, $scheme, $label);
					}
				}
			}
			if (is_array($categories_parent))
			{
				$categories_parent = array_values(SimplePie_Misc::array_unique($categories_parent));
			}

			// COPYRIGHT
			if ($copyright = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'copyright'))
			{
				$copyright_url = null;
				$copyright_label = null;
				if (isset($copyright[0]['attribs']['']['url']))
				{
					$copyright_url = $this->sanitize($copyright[0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				if (isset($copyright[0]['data']))
				{
					$copyright_label = $this->sanitize($copyright[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				$copyrights_parent =& new $this->feed->copyright_class($copyright_url, $copyright_label);
			}
			elseif ($copyright = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'copyright'))
			{
				$copyright_url = null;
				$copyright_label = null;
				if (isset($copyright[0]['attribs']['']['url']))
				{
					$copyright_url = $this->sanitize($copyright[0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				if (isset($copyright[0]['data']))
				{
					$copyright_label = $this->sanitize($copyright[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
				$copyrights_parent =& new $this->feed->copyright_class($copyright_url, $copyright_label);
			}

			// CREDITS
			if ($credits = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'credit'))
			{
				foreach ($credits as $credit)
				{
					$credit_role = null;
					$credit_scheme = null;
					$credit_name = null;
					if (isset($credit['attribs']['']['role']))
					{
						$credit_role = $this->sanitize($credit['attribs']['']['role'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($credit['attribs']['']['scheme']))
					{
						$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$credit_scheme = 'urn:ebu';
					}
					if (isset($credit['data']))
					{
						$credit_name = $this->sanitize($credit['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$credits_parent[] =& new $this->feed->credit_class($credit_role, $credit_scheme, $credit_name);
				}
			}
			elseif ($credits = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'credit'))
			{
				foreach ($credits as $credit)
				{
					$credit_role = null;
					$credit_scheme = null;
					$credit_name = null;
					if (isset($credit['attribs']['']['role']))
					{
						$credit_role = $this->sanitize($credit['attribs']['']['role'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($credit['attribs']['']['scheme']))
					{
						$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$credit_scheme = 'urn:ebu';
					}
					if (isset($credit['data']))
					{
						$credit_name = $this->sanitize($credit['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$credits_parent[] =& new $this->feed->credit_class($credit_role, $credit_scheme, $credit_name);
				}
			}
			if (is_array($credits_parent))
			{
				$credits_parent = array_values(SimplePie_Misc::array_unique($credits_parent));
			}

			// DESCRIPTION
			if ($description_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'description'))
			{
				if (isset($description_parent[0]['data']))
				{
					$description_parent = $this->sanitize($description_parent[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
			}
			elseif ($description_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'description'))
			{
				if (isset($description_parent[0]['data']))
				{
					$description_parent = $this->sanitize($description_parent[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
			}

			// DURATION
			if ($duration_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'duration'))
			{
				$seconds = null;
				$minutes = null;
				$hours = null;
				if (isset($duration_parent[0]['data']))
				{
					$temp = explode(':', $this->sanitize($duration_parent[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
					if (sizeof($temp) > 0)
					{
						$seconds = (int) array_pop($temp);
					}
					if (sizeof($temp) > 0)
					{
						$minutes = (int) array_pop($temp);
						$seconds += $minutes * 60;
					}
					if (sizeof($temp) > 0)
					{
						$hours = (int) array_pop($temp);
						$seconds += $hours * 3600;
					}
					unset($temp);
					$duration_parent = $seconds;
				}
			}

			// HASHES
			if ($hashes_iterator = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'hash'))
			{
				foreach ($hashes_iterator as $hash)
				{
					$value = null;
					$algo = null;
					if (isset($hash['data']))
					{
						$value = $this->sanitize($hash['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($hash['attribs']['']['algo']))
					{
						$algo = $this->sanitize($hash['attribs']['']['algo'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$algo = 'md5';
					}
					$hashes_parent[] = $algo.':'.$value;
				}
			}
			elseif ($hashes_iterator = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'hash'))
			{
				foreach ($hashes_iterator as $hash)
				{
					$value = null;
					$algo = null;
					if (isset($hash['data']))
					{
						$value = $this->sanitize($hash['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($hash['attribs']['']['algo']))
					{
						$algo = $this->sanitize($hash['attribs']['']['algo'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$algo = 'md5';
					}
					$hashes_parent[] = $algo.':'.$value;
				}
			}
			if (is_array($hashes_parent))
			{
				$hashes_parent = array_values(SimplePie_Misc::array_unique($hashes_parent));
			}

			// KEYWORDS
			if ($keywords = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'keywords'))
			{
				if (isset($keywords[0]['data']))
				{
					$temp = explode(',', $this->sanitize($keywords[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
					foreach ($temp as $word)
					{
						$keywords_parent[] = trim($word);
					}
				}
				unset($temp);
			}
			elseif ($keywords = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'keywords'))
			{
				if (isset($keywords[0]['data']))
				{
					$temp = explode(',', $this->sanitize($keywords[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
					foreach ($temp as $word)
					{
						$keywords_parent[] = trim($word);
					}
				}
				unset($temp);
			}
			elseif ($keywords = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'keywords'))
			{
				if (isset($keywords[0]['data']))
				{
					$temp = explode(',', $this->sanitize($keywords[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
					foreach ($temp as $word)
					{
						$keywords_parent[] = trim($word);
					}
				}
				unset($temp);
			}
			elseif ($keywords = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'keywords'))
			{
				if (isset($keywords[0]['data']))
				{
					$temp = explode(',', $this->sanitize($keywords[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
					foreach ($temp as $word)
					{
						$keywords_parent[] = trim($word);
					}
				}
				unset($temp);
			}
			if (is_array($keywords_parent))
			{
				$keywords_parent = array_values(SimplePie_Misc::array_unique($keywords_parent));
			}

			// PLAYER
			if ($player_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'player'))
			{
				if (isset($player_parent[0]['attribs']['']['url']))
				{
					$player_parent = $this->sanitize($player_parent[0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
				}
			}
			elseif ($player_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'player'))
			{
				if (isset($player_parent[0]['attribs']['']['url']))
				{
					$player_parent = $this->sanitize($player_parent[0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
				}
			}

			// RATINGS
			if ($ratings = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'rating'))
			{
				foreach ($ratings as $rating)
				{
					$rating_scheme = null;
					$rating_value = null;
					if (isset($rating['attribs']['']['scheme']))
					{
						$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$rating_scheme = 'urn:simple';
					}
					if (isset($rating['data']))
					{
						$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$ratings_parent[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
				}
			}
			elseif ($ratings = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'explicit'))
			{
				foreach ($ratings as $rating)
				{
					$rating_scheme = 'urn:itunes';
					$rating_value = null;
					if (isset($rating['data']))
					{
						$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$ratings_parent[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
				}
			}
			elseif ($ratings = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'rating'))
			{
				foreach ($ratings as $rating)
				{
					$rating_scheme = null;
					$rating_value = null;
					if (isset($rating['attribs']['']['scheme']))
					{
						$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					else
					{
						$rating_scheme = 'urn:simple';
					}
					if (isset($rating['data']))
					{
						$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$ratings_parent[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
				}
			}
			elseif ($ratings = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'explicit'))
			{
				foreach ($ratings as $rating)
				{
					$rating_scheme = 'urn:itunes';
					$rating_value = null;
					if (isset($rating['data']))
					{
						$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$ratings_parent[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
				}
			}
			if (is_array($ratings_parent))
			{
				$ratings_parent = array_values(SimplePie_Misc::array_unique($ratings_parent));
			}

			// RESTRICTIONS
			if ($restrictions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'restriction'))
			{
				foreach ($restrictions as $restriction)
				{
					$restriction_relationship = null;
					$restriction_type = null;
					$restriction_value = null;
					if (isset($restriction['attribs']['']['relationship']))
					{
						$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($restriction['attribs']['']['type']))
					{
						$restriction_type = $this->sanitize($restriction['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($restriction['data']))
					{
						$restriction_value = $this->sanitize($restriction['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$restrictions_parent[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
				}
			}
			elseif ($restrictions = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'block'))
			{
				foreach ($restrictions as $restriction)
				{
					$restriction_relationship = 'allow';
					$restriction_type = null;
					$restriction_value = 'itunes';
					if (isset($restriction['data']) && strtolower($restriction['data']) === 'yes')
					{
						$restriction_relationship = 'deny';
					}
					$restrictions_parent[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
				}
			}
			elseif ($restrictions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'restriction'))
			{
				foreach ($restrictions as $restriction)
				{
					$restriction_relationship = null;
					$restriction_type = null;
					$restriction_value = null;
					if (isset($restriction['attribs']['']['relationship']))
					{
						$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($restriction['attribs']['']['type']))
					{
						$restriction_type = $this->sanitize($restriction['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($restriction['data']))
					{
						$restriction_value = $this->sanitize($restriction['data'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					$restrictions_parent[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
				}
			}
			elseif ($restrictions = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'block'))
			{
				foreach ($restrictions as $restriction)
				{
					$restriction_relationship = 'allow';
					$restriction_type = null;
					$restriction_value = 'itunes';
					if (isset($restriction['data']) && strtolower($restriction['data']) === 'yes')
					{
						$restriction_relationship = 'deny';
					}
					$restrictions_parent[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
				}
			}
			if (is_array($restrictions_parent))
			{
				$restrictions_parent = array_values(SimplePie_Misc::array_unique($restrictions_parent));
			}

			// THUMBNAILS
			if ($thumbnails = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'thumbnail'))
			{
				foreach ($thumbnails as $thumbnail)
				{
					if (isset($thumbnail['attribs']['']['url']))
					{
						$thumbnails_parent[] = $this->sanitize($thumbnail['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
					}
				}
			}
			elseif ($thumbnails = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'thumbnail'))
			{
				foreach ($thumbnails as $thumbnail)
				{
					if (isset($thumbnail['attribs']['']['url']))
					{
						$thumbnails_parent[] = $this->sanitize($thumbnail['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
					}
				}
			}

			// TITLES
			if ($title_parent = $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'title'))
			{
				if (isset($title_parent[0]['data']))
				{
					$title_parent = $this->sanitize($title_parent[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
			}
			elseif ($title_parent = $parent->get_channel_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'title'))
			{
				if (isset($title_parent[0]['data']))
				{
					$title_parent = $this->sanitize($title_parent[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
				}
			}

			// Clear the memory
			unset($parent);

			// Attributes
			$bitrate = null;
			$channels = null;
			$duration = null;
			$expression = null;
			$framerate = null;
			$height = null;
			$javascript = null;
			$lang = null;
			$length = null;
			$medium = null;
			$samplingrate = null;
			$type = null;
			$url = null;
			$width = null;

			// Elements
			$captions = null;
			$categories = null;
			$copyrights = null;
			$credits = null;
			$description = null;
			$hashes = null;
			$keywords = null;
			$player = null;
			$ratings = null;
			$restrictions = null;
			$thumbnails = null;
			$title = null;

			// If we have media:group tags, loop through them.
			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'group') as $group)
			{
				// If we have media:content tags, loop through them.
				foreach ((array) $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content'] as $content)
				{
					if (isset($content['attribs']['']['url']))
					{
						// Attributes
						$bitrate = null;
						$channels = null;
						$duration = null;
						$expression = null;
						$framerate = null;
						$height = null;
						$javascript = null;
						$lang = null;
						$length = null;
						$medium = null;
						$samplingrate = null;
						$type = null;
						$url = null;
						$width = null;

						// Elements
						$captions = null;
						$categories = null;
						$copyrights = null;
						$credits = null;
						$description = null;
						$hashes = null;
						$keywords = null;
						$player = null;
						$ratings = null;
						$restrictions = null;
						$thumbnails = null;
						$title = null;

						// Start checking the attributes of media:content
						if (isset($content['attribs']['']['bitrate']))
						{
							$bitrate = $this->sanitize($content['attribs']['']['bitrate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['channels']))
						{
							$channels = $this->sanitize($content['attribs']['']['channels'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['duration']))
						{
							$duration = $this->sanitize($content['attribs']['']['duration'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$duration = $duration_parent;
						}
						if (isset($content['attribs']['']['expression']))
						{
							$expression = $this->sanitize($content['attribs']['']['expression'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['framerate']))
						{
							$framerate = $this->sanitize($content['attribs']['']['framerate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['height']))
						{
							$height = $this->sanitize($content['attribs']['']['height'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['lang']))
						{
							$lang = $this->sanitize($content['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['fileSize']))
						{
							$length = ceil($content['attribs']['']['fileSize']);
						}
						if (isset($content['attribs']['']['medium']))
						{
							$medium = $this->sanitize($content['attribs']['']['medium'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['samplingrate']))
						{
							$samplingrate = $this->sanitize($content['attribs']['']['samplingrate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['type']))
						{
							$type = $this->sanitize($content['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['width']))
						{
							$width = $this->sanitize($content['attribs']['']['width'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						$url = $this->sanitize($content['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);

						// Checking the other optional media: elements. Priority: media:content, media:group, item, channel

						// CAPTIONS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption)
							{
								$caption_type = null;
								$caption_lang = null;
								$caption_startTime = null;
								$caption_endTime = null;
								$caption_text = null;
								if (isset($caption['attribs']['']['type']))
								{
									$caption_type = $this->sanitize($caption['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['lang']))
								{
									$caption_lang = $this->sanitize($caption['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['start']))
								{
									$caption_startTime = $this->sanitize($caption['attribs']['']['start'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['end']))
								{
									$caption_endTime = $this->sanitize($caption['attribs']['']['end'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['data']))
								{
									$caption_text = $this->sanitize($caption['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$captions[] =& new $this->feed->caption_class($caption_type, $caption_lang, $caption_startTime, $caption_endTime, $caption_text);
							}
							if (is_array($captions))
							{
								$captions = array_values(SimplePie_Misc::array_unique($captions));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption)
							{
								$caption_type = null;
								$caption_lang = null;
								$caption_startTime = null;
								$caption_endTime = null;
								$caption_text = null;
								if (isset($caption['attribs']['']['type']))
								{
									$caption_type = $this->sanitize($caption['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['lang']))
								{
									$caption_lang = $this->sanitize($caption['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['start']))
								{
									$caption_startTime = $this->sanitize($caption['attribs']['']['start'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['end']))
								{
									$caption_endTime = $this->sanitize($caption['attribs']['']['end'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['data']))
								{
									$caption_text = $this->sanitize($caption['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$captions[] =& new $this->feed->caption_class($caption_type, $caption_lang, $caption_startTime, $caption_endTime, $caption_text);
							}
							if (is_array($captions))
							{
								$captions = array_values(SimplePie_Misc::array_unique($captions));
							}
						}
						else
						{
							$captions = $captions_parent;
						}

						// CATEGORIES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
						{
							foreach ((array) $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category)
							{
								$term = null;
								$scheme = null;
								$label = null;
								if (isset($category['data']))
								{
									$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($category['attribs']['']['scheme']))
								{
									$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$scheme = 'http://search.yahoo.com/mrss/category_schema';
								}
								if (isset($category['attribs']['']['label']))
								{
									$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$categories[] =& new $this->feed->category_class($term, $scheme, $label);
							}
						}
						if (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
						{
							foreach ((array) $group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category)
							{
								$term = null;
								$scheme = null;
								$label = null;
								if (isset($category['data']))
								{
									$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($category['attribs']['']['scheme']))
								{
									$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$scheme = 'http://search.yahoo.com/mrss/category_schema';
								}
								if (isset($category['attribs']['']['label']))
								{
									$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$categories[] =& new $this->feed->category_class($term, $scheme, $label);
							}
						}
						if (is_array($categories) && is_array($categories_parent))
						{
							$categories = array_values(SimplePie_Misc::array_unique(array_merge($categories, $categories_parent)));
						}
						elseif (is_array($categories))
						{
							$categories = array_values(SimplePie_Misc::array_unique($categories));
						}
						elseif (is_array($categories_parent))
						{
							$categories = array_values(SimplePie_Misc::array_unique($categories_parent));
						}

						// COPYRIGHTS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
						{
							$copyright_url = null;
							$copyright_label = null;
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
							{
								$copyright_url = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
							{
								$copyright_label = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							$copyrights =& new $this->feed->copyright_class($copyright_url, $copyright_label);
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
						{
							$copyright_url = null;
							$copyright_label = null;
							if (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
							{
								$copyright_url = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							if (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
							{
								$copyright_label = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							$copyrights =& new $this->feed->copyright_class($copyright_url, $copyright_label);
						}
						else
						{
							$copyrights = $copyrights_parent;
						}

						// CREDITS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit)
							{
								$credit_role = null;
								$credit_scheme = null;
								$credit_name = null;
								if (isset($credit['attribs']['']['role']))
								{
									$credit_role = $this->sanitize($credit['attribs']['']['role'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($credit['attribs']['']['scheme']))
								{
									$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$credit_scheme = 'urn:ebu';
								}
								if (isset($credit['data']))
								{
									$credit_name = $this->sanitize($credit['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$credits[] =& new $this->feed->credit_class($credit_role, $credit_scheme, $credit_name);
							}
							if (is_array($credits))
							{
								$credits = array_values(SimplePie_Misc::array_unique($credits));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit)
							{
								$credit_role = null;
								$credit_scheme = null;
								$credit_name = null;
								if (isset($credit['attribs']['']['role']))
								{
									$credit_role = $this->sanitize($credit['attribs']['']['role'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($credit['attribs']['']['scheme']))
								{
									$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$credit_scheme = 'urn:ebu';
								}
								if (isset($credit['data']))
								{
									$credit_name = $this->sanitize($credit['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$credits[] =& new $this->feed->credit_class($credit_role, $credit_scheme, $credit_name);
							}
							if (is_array($credits))
							{
								$credits = array_values(SimplePie_Misc::array_unique($credits));
							}
						}
						else
						{
							$credits = $credits_parent;
						}

						// DESCRIPTION
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
						{
							$description = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
						{
							$description = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$description = $description_parent;
						}

						// HASHES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash)
							{
								$value = null;
								$algo = null;
								if (isset($hash['data']))
								{
									$value = $this->sanitize($hash['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($hash['attribs']['']['algo']))
								{
									$algo = $this->sanitize($hash['attribs']['']['algo'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$algo = 'md5';
								}
								$hashes[] = $algo.':'.$value;
							}
							if (is_array($hashes))
							{
								$hashes = array_values(SimplePie_Misc::array_unique($hashes));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash)
							{
								$value = null;
								$algo = null;
								if (isset($hash['data']))
								{
									$value = $this->sanitize($hash['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($hash['attribs']['']['algo']))
								{
									$algo = $this->sanitize($hash['attribs']['']['algo'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$algo = 'md5';
								}
								$hashes[] = $algo.':'.$value;
							}
							if (is_array($hashes))
							{
								$hashes = array_values(SimplePie_Misc::array_unique($hashes));
							}
						}
						else
						{
							$hashes = $hashes_parent;
						}

						// KEYWORDS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
						{
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
							{
								$temp = explode(',', $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
								foreach ($temp as $word)
								{
									$keywords[] = trim($word);
								}
								unset($temp);
							}
							if (is_array($keywords))
							{
								$keywords = array_values(SimplePie_Misc::array_unique($keywords));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
						{
							if (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
							{
								$temp = explode(',', $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
								foreach ($temp as $word)
								{
									$keywords[] = trim($word);
								}
								unset($temp);
							}
							if (is_array($keywords))
							{
								$keywords = array_values(SimplePie_Misc::array_unique($keywords));
							}
						}
						else
						{
							$keywords = $keywords_parent;
						}

						// PLAYER
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
						{
							$player = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
						{
							$player = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
						}
						else
						{
							$player = $player_parent;
						}

						// RATINGS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating)
							{
								$rating_scheme = null;
								$rating_value = null;
								if (isset($rating['attribs']['']['scheme']))
								{
									$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$rating_scheme = 'urn:simple';
								}
								if (isset($rating['data']))
								{
									$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$ratings[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
							}
							if (is_array($ratings))
							{
								$ratings = array_values(SimplePie_Misc::array_unique($ratings));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating)
							{
								$rating_scheme = null;
								$rating_value = null;
								if (isset($rating['attribs']['']['scheme']))
								{
									$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$rating_scheme = 'urn:simple';
								}
								if (isset($rating['data']))
								{
									$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$ratings[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
							}
							if (is_array($ratings))
							{
								$ratings = array_values(SimplePie_Misc::array_unique($ratings));
							}
						}
						else
						{
							$ratings = $ratings_parent;
						}

						// RESTRICTIONS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction)
							{
								$restriction_relationship = null;
								$restriction_type = null;
								$restriction_value = null;
								if (isset($restriction['attribs']['']['relationship']))
								{
									$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['attribs']['']['type']))
								{
									$restriction_type = $this->sanitize($restriction['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['data']))
								{
									$restriction_value = $this->sanitize($restriction['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$restrictions[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
							}
							if (is_array($restrictions))
							{
								$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction)
							{
								$restriction_relationship = null;
								$restriction_type = null;
								$restriction_value = null;
								if (isset($restriction['attribs']['']['relationship']))
								{
									$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['attribs']['']['type']))
								{
									$restriction_type = $this->sanitize($restriction['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['data']))
								{
									$restriction_value = $this->sanitize($restriction['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$restrictions[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
							}
							if (is_array($restrictions))
							{
								$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
							}
						}
						else
						{
							$restrictions = $restrictions_parent;
						}

						// THUMBNAILS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail)
							{
								$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
							}
							if (is_array($thumbnails))
							{
								$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
							}
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
						{
							foreach ($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail)
							{
								$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
							}
							if (is_array($thumbnails))
							{
								$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
							}
						}
						else
						{
							$thumbnails = $thumbnails_parent;
						}

						// TITLES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
						{
							$title = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						elseif (isset($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
						{
							$title = $this->sanitize($group['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$title = $title_parent;
						}

						$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions, $categories, $channels, $copyrights, $credits, $description, $duration, $expression, $framerate, $hashes, $height, $keywords, $lang, $medium, $player, $ratings, $restrictions, $samplingrate, $thumbnails, $title, $width);
					}
				}
			}

			// If we have standalone media:content tags, loop through them.
			if (isset($this->data['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content']))
			{
				foreach ((array) $this->data['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content'] as $content)
				{
					if (isset($content['attribs']['']['url']))
					{
						// Attributes
						$bitrate = null;
						$channels = null;
						$duration = null;
						$expression = null;
						$framerate = null;
						$height = null;
						$javascript = null;
						$lang = null;
						$length = null;
						$medium = null;
						$samplingrate = null;
						$type = null;
						$url = null;
						$width = null;

						// Elements
						$captions = null;
						$categories = null;
						$copyrights = null;
						$credits = null;
						$description = null;
						$hashes = null;
						$keywords = null;
						$player = null;
						$ratings = null;
						$restrictions = null;
						$thumbnails = null;
						$title = null;

						// Start checking the attributes of media:content
						if (isset($content['attribs']['']['bitrate']))
						{
							$bitrate = $this->sanitize($content['attribs']['']['bitrate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['channels']))
						{
							$channels = $this->sanitize($content['attribs']['']['channels'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['duration']))
						{
							$duration = $this->sanitize($content['attribs']['']['duration'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$duration = $duration_parent;
						}
						if (isset($content['attribs']['']['expression']))
						{
							$expression = $this->sanitize($content['attribs']['']['expression'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['framerate']))
						{
							$framerate = $this->sanitize($content['attribs']['']['framerate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['height']))
						{
							$height = $this->sanitize($content['attribs']['']['height'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['lang']))
						{
							$lang = $this->sanitize($content['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['fileSize']))
						{
							$length = ceil($content['attribs']['']['fileSize']);
						}
						if (isset($content['attribs']['']['medium']))
						{
							$medium = $this->sanitize($content['attribs']['']['medium'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['samplingrate']))
						{
							$samplingrate = $this->sanitize($content['attribs']['']['samplingrate'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['type']))
						{
							$type = $this->sanitize($content['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						if (isset($content['attribs']['']['width']))
						{
							$width = $this->sanitize($content['attribs']['']['width'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						$url = $this->sanitize($content['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);

						// Checking the other optional media: elements. Priority: media:content, media:group, item, channel

						// CAPTIONS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['text'] as $caption)
							{
								$caption_type = null;
								$caption_lang = null;
								$caption_startTime = null;
								$caption_endTime = null;
								$caption_text = null;
								if (isset($caption['attribs']['']['type']))
								{
									$caption_type = $this->sanitize($caption['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['lang']))
								{
									$caption_lang = $this->sanitize($caption['attribs']['']['lang'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['start']))
								{
									$caption_startTime = $this->sanitize($caption['attribs']['']['start'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['attribs']['']['end']))
								{
									$caption_endTime = $this->sanitize($caption['attribs']['']['end'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($caption['data']))
								{
									$caption_text = $this->sanitize($caption['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$captions[] =& new $this->feed->caption_class($caption_type, $caption_lang, $caption_startTime, $caption_endTime, $caption_text);
							}
							if (is_array($captions))
							{
								$captions = array_values(SimplePie_Misc::array_unique($captions));
							}
						}
						else
						{
							$captions = $captions_parent;
						}

						// CATEGORIES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category']))
						{
							foreach ((array) $content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['category'] as $category)
							{
								$term = null;
								$scheme = null;
								$label = null;
								if (isset($category['data']))
								{
									$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($category['attribs']['']['scheme']))
								{
									$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$scheme = 'http://search.yahoo.com/mrss/category_schema';
								}
								if (isset($category['attribs']['']['label']))
								{
									$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$categories[] =& new $this->feed->category_class($term, $scheme, $label);
							}
						}
						if (is_array($categories) && is_array($categories_parent))
						{
							$categories = array_values(SimplePie_Misc::array_unique(array_merge($categories, $categories_parent)));
						}
						elseif (is_array($categories))
						{
							$categories = array_values(SimplePie_Misc::array_unique($categories));
						}
						elseif (is_array($categories_parent))
						{
							$categories = array_values(SimplePie_Misc::array_unique($categories_parent));
						}
						else
						{
							$categories = null;
						}

						// COPYRIGHTS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright']))
						{
							$copyright_url = null;
							$copyright_label = null;
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url']))
							{
								$copyright_url = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data']))
							{
								$copyright_label = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['copyright'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
							}
							$copyrights =& new $this->feed->copyright_class($copyright_url, $copyright_label);
						}
						else
						{
							$copyrights = $copyrights_parent;
						}

						// CREDITS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['credit'] as $credit)
							{
								$credit_role = null;
								$credit_scheme = null;
								$credit_name = null;
								if (isset($credit['attribs']['']['role']))
								{
									$credit_role = $this->sanitize($credit['attribs']['']['role'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($credit['attribs']['']['scheme']))
								{
									$credit_scheme = $this->sanitize($credit['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$credit_scheme = 'urn:ebu';
								}
								if (isset($credit['data']))
								{
									$credit_name = $this->sanitize($credit['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$credits[] =& new $this->feed->credit_class($credit_role, $credit_scheme, $credit_name);
							}
							if (is_array($credits))
							{
								$credits = array_values(SimplePie_Misc::array_unique($credits));
							}
						}
						else
						{
							$credits = $credits_parent;
						}

						// DESCRIPTION
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description']))
						{
							$description = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['description'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$description = $description_parent;
						}

						// HASHES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['hash'] as $hash)
							{
								$value = null;
								$algo = null;
								if (isset($hash['data']))
								{
									$value = $this->sanitize($hash['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($hash['attribs']['']['algo']))
								{
									$algo = $this->sanitize($hash['attribs']['']['algo'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$algo = 'md5';
								}
								$hashes[] = $algo.':'.$value;
							}
							if (is_array($hashes))
							{
								$hashes = array_values(SimplePie_Misc::array_unique($hashes));
							}
						}
						else
						{
							$hashes = $hashes_parent;
						}

						// KEYWORDS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords']))
						{
							if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data']))
							{
								$temp = explode(',', $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['keywords'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT));
								foreach ($temp as $word)
								{
									$keywords[] = trim($word);
								}
								unset($temp);
							}
							if (is_array($keywords))
							{
								$keywords = array_values(SimplePie_Misc::array_unique($keywords));
							}
						}
						else
						{
							$keywords = $keywords_parent;
						}

						// PLAYER
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player']))
						{
							$player = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['player'][0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
						}
						else
						{
							$player = $player_parent;
						}

						// RATINGS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['rating'] as $rating)
							{
								$rating_scheme = null;
								$rating_value = null;
								if (isset($rating['attribs']['']['scheme']))
								{
									$rating_scheme = $this->sanitize($rating['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								else
								{
									$rating_scheme = 'urn:simple';
								}
								if (isset($rating['data']))
								{
									$rating_value = $this->sanitize($rating['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$ratings[] =& new $this->feed->rating_class($rating_scheme, $rating_value);
							}
							if (is_array($ratings))
							{
								$ratings = array_values(SimplePie_Misc::array_unique($ratings));
							}
						}
						else
						{
							$ratings = $ratings_parent;
						}

						// RESTRICTIONS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['restriction'] as $restriction)
							{
								$restriction_relationship = null;
								$restriction_type = null;
								$restriction_value = null;
								if (isset($restriction['attribs']['']['relationship']))
								{
									$restriction_relationship = $this->sanitize($restriction['attribs']['']['relationship'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['attribs']['']['type']))
								{
									$restriction_type = $this->sanitize($restriction['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								if (isset($restriction['data']))
								{
									$restriction_value = $this->sanitize($restriction['data'], SIMPLEPIE_CONSTRUCT_TEXT);
								}
								$restrictions[] =& new $this->feed->restriction_class($restriction_relationship, $restriction_type, $restriction_value);
							}
							if (is_array($restrictions))
							{
								$restrictions = array_values(SimplePie_Misc::array_unique($restrictions));
							}
						}
						else
						{
							$restrictions = $restrictions_parent;
						}

						// THUMBNAILS
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail']))
						{
							foreach ($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['thumbnail'] as $thumbnail)
							{
								$thumbnails[] = $this->sanitize($thumbnail['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI);
							}
							if (is_array($thumbnails))
							{
								$thumbnails = array_values(SimplePie_Misc::array_unique($thumbnails));
							}
						}
						else
						{
							$thumbnails = $thumbnails_parent;
						}

						// TITLES
						if (isset($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title']))
						{
							$title = $this->sanitize($content['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['title'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
						}
						else
						{
							$title = $title_parent;
						}

						$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions, $categories, $channels, $copyrights, $credits, $description, $duration, $expression, $framerate, $hashes, $height, $keywords, $lang, $medium, $player, $ratings, $restrictions, $samplingrate, $thumbnails, $title, $width);
					}
				}
			}

			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'link') as $link)
			{
				if (isset($link['attribs']['']['href']) && !empty($link['attribs']['']['rel']) && $link['attribs']['']['rel'] === 'enclosure')
				{
					// Attributes
					$bitrate = null;
					$channels = null;
					$duration = null;
					$expression = null;
					$framerate = null;
					$height = null;
					$javascript = null;
					$lang = null;
					$length = null;
					$medium = null;
					$samplingrate = null;
					$type = null;
					$url = null;
					$width = null;

					$url = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));
					if (isset($link['attribs']['']['type']))
					{
						$type = $this->sanitize($link['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($link['attribs']['']['length']))
					{
						$length = ceil($link['attribs']['']['length']);
					}

					// Since we don't have group or content for these, we'll just pass the '*_parent' variables directly to the constructor
					$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions_parent, $categories_parent, $channels, $copyrights_parent, $credits_parent, $description_parent, $duration_parent, $expression, $framerate, $hashes_parent, $height, $keywords_parent, $lang, $medium, $player_parent, $ratings_parent, $restrictions_parent, $samplingrate, $thumbnails_parent, $title_parent, $width);
				}
			}

			foreach ((array) $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'link') as $link)
			{
				if (isset($link['attribs']['']['href']) && !empty($link['attribs']['']['rel']) && $link['attribs']['']['rel'] === 'enclosure')
				{
					// Attributes
					$bitrate = null;
					$channels = null;
					$duration = null;
					$expression = null;
					$framerate = null;
					$height = null;
					$javascript = null;
					$lang = null;
					$length = null;
					$medium = null;
					$samplingrate = null;
					$type = null;
					$url = null;
					$width = null;

					$url = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));
					if (isset($link['attribs']['']['type']))
					{
						$type = $this->sanitize($link['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($link['attribs']['']['length']))
					{
						$length = ceil($link['attribs']['']['length']);
					}

					// Since we don't have group or content for these, we'll just pass the '*_parent' variables directly to the constructor
					$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions_parent, $categories_parent, $channels, $copyrights_parent, $credits_parent, $description_parent, $duration_parent, $expression, $framerate, $hashes_parent, $height, $keywords_parent, $lang, $medium, $player_parent, $ratings_parent, $restrictions_parent, $samplingrate, $thumbnails_parent, $title_parent, $width);
				}
			}

			if ($enclosure = $this->get_item_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'enclosure'))
			{
				if (isset($enclosure[0]['attribs']['']['url']))
				{
					// Attributes
					$bitrate = null;
					$channels = null;
					$duration = null;
					$expression = null;
					$framerate = null;
					$height = null;
					$javascript = null;
					$lang = null;
					$length = null;
					$medium = null;
					$samplingrate = null;
					$type = null;
					$url = null;
					$width = null;

					$url = $this->sanitize($enclosure[0]['attribs']['']['url'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($enclosure[0]));
					if (isset($enclosure[0]['attribs']['']['type']))
					{
						$type = $this->sanitize($enclosure[0]['attribs']['']['type'], SIMPLEPIE_CONSTRUCT_TEXT);
					}
					if (isset($enclosure[0]['attribs']['']['length']))
					{
						$length = ceil($enclosure[0]['attribs']['']['length']);
					}

					// Since we don't have group or content for these, we'll just pass the '*_parent' variables directly to the constructor
					$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions_parent, $categories_parent, $channels, $copyrights_parent, $credits_parent, $description_parent, $duration_parent, $expression, $framerate, $hashes_parent, $height, $keywords_parent, $lang, $medium, $player_parent, $ratings_parent, $restrictions_parent, $samplingrate, $thumbnails_parent, $title_parent, $width);
				}
			}

			if (sizeof($this->data['enclosures']) === 0 && ($url || $type || $length || $bitrate || $captions_parent || $categories_parent || $channels || $copyrights_parent || $credits_parent || $description_parent || $duration_parent || $expression || $framerate || $hashes_parent || $height || $keywords_parent || $lang || $medium || $player_parent || $ratings_parent || $restrictions_parent || $samplingrate || $thumbnails_parent || $title_parent || $width))
			{
				// Since we don't have group or content for these, we'll just pass the '*_parent' variables directly to the constructor
				$this->data['enclosures'][] =& new $this->feed->enclosure_class($url, $type, $length, $this->feed->javascript, $bitrate, $captions_parent, $categories_parent, $channels, $copyrights_parent, $credits_parent, $description_parent, $duration_parent, $expression, $framerate, $hashes_parent, $height, $keywords_parent, $lang, $medium, $player_parent, $ratings_parent, $restrictions_parent, $samplingrate, $thumbnails_parent, $title_parent, $width);
			}

			$this->data['enclosures'] = array_values(SimplePie_Misc::array_unique($this->data['enclosures']));
		}
		if (!empty($this->data['enclosures']))
		{
			return $this->data['enclosures'];
		}
		else
		{
			return null;
		}
	}

	function get_latitude()
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lat'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[1];
		}
		else
		{
			return null;
		}
	}

	function get_longitude()
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'long'))
		{
			return (float) $return[0]['data'];
		}
		elseif ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lon'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[2];
		}
		else
		{
			return null;
		}
	}

	function get_source()
	{
		if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'source'))
		{
			return new $this->feed->source_class($this, $return[0]);
		}
		else
		{
			return null;
		}
	}

	/**
	 * Creates the add_to_* methods' return data
	 *
	 * @access private
	 * @param string $item_url String to prefix to the item permalink
	 * @param string $title_url String to prefix to the item title
	 * (and suffix to the item permalink)
	 * @return mixed URL if feed exists, false otherwise
	 */
	function add_to_service($item_url, $title_url = null, $summary_url = null)
	{
		if ($this->get_permalink() !== null)
		{
			$return = $item_url . rawurlencode($this->get_permalink());
			if ($title_url !== null && $this->get_title() !== null)
			{
				$return .= $title_url . rawurlencode($this->get_title());
			}
			if ($summary_url !== null && $this->get_description() !== null)
			{
				$return .= $summary_url . rawurlencode($this->get_description());
			}
			return $this->sanitize($return, SIMPLEPIE_CONSTRUCT_IRI);
		}
		else
		{
			return null;
		}
	}

	function add_to_blinklist()
	{
		return $this->add_to_service('http://www.blinklist.com/index.php?Action=Blink/addblink.php&Description=&Url=', '&Title=');
	}

	function add_to_blogmarks()
	{
		return $this->add_to_service('http://blogmarks.net/my/new.php?mini=1&simple=1&url=', '&title=');
	}

	function add_to_delicious()
	{
		return $this->add_to_service('http://del.icio.us/post/?v=4&url=', '&title=');
	}

	function add_to_digg()
	{
		return $this->add_to_service('http://digg.com/submit?url=', '&title=', '&bodytext=');
	}

	function add_to_furl()
	{
		return $this->add_to_service('http://www.furl.net/storeIt.jsp?u=', '&t=');
	}

	function add_to_magnolia()
	{
		return $this->add_to_service('http://ma.gnolia.com/bookmarklet/add?url=', '&title=');
	}

	function add_to_myweb20()
	{
		return $this->add_to_service('http://myweb2.search.yahoo.com/myresults/bookmarklet?u=', '&t=');
	}

	function add_to_newsvine()
	{
		return $this->add_to_service('http://www.newsvine.com/_wine/save?u=', '&h=');
	}

	function add_to_reddit()
	{
		return $this->add_to_service('http://reddit.com/submit?url=', '&title=');
	}

	function add_to_segnalo()
	{
		return $this->add_to_service('http://segnalo.com/post.html.php?url=', '&title=');
	}

	function add_to_simpy()
	{
		return $this->add_to_service('http://www.simpy.com/simpy/LinkAdd.do?href=', '&title=');
	}

	function add_to_spurl()
	{
		return $this->add_to_service('http://www.spurl.net/spurl.php?v=3&url=', '&title=');
	}

	function add_to_wists()
	{
		return $this->add_to_service('http://wists.com/r.php?c=&r=', '&title=');
	}

	function search_technorati()
	{
		return $this->add_to_service('http://www.technorati.com/search/');
	}
}

class SimplePie_Source
{
	var $item;
	var $data = array();

	function SimplePie_Source($item, $data)
	{
		$this->item = $item;
		$this->data = $data;
	}

	function __toString()
	{
		return md5(serialize($this->data));
	}

	function get_source_tags($namespace, $tag)
	{
		if (isset($this->data['child'][$namespace][$tag]))
		{
			return $this->data['child'][$namespace][$tag];
		}
		else
		{
			return null;
		}
	}

	function get_base($element = array())
	{
		return $this->item->get_base($element);
	}

	function sanitize($data, $type, $base = '')
	{
		return $this->item->sanitize($data, $type, $base);
	}

	function get_item()
	{
		return $this->item;
	}

	function get_title()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'title'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'title'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_category($key = 0)
	{
		$categories = $this->get_categories();
		if (isset($categories[$key]))
		{
			return $categories[$key];
		}
		else
		{
			return null;
		}
	}

	function get_categories()
	{
		$categories = array();

		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'category') as $category)
		{
			$term = null;
			$scheme = null;
			$label = null;
			if (isset($category['attribs']['']['term']))
			{
				$term = $this->sanitize($category['attribs']['']['term'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['scheme']))
			{
				$scheme = $this->sanitize($category['attribs']['']['scheme'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($category['attribs']['']['label']))
			{
				$label = $this->sanitize($category['attribs']['']['label'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			$categories[] =& new $this->item->feed->category_class($term, $scheme, $label);
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'category') as $category)
		{
			// This is really the label, but keep this as the term also for BC.
			// Label will also work on retrieving because that falls back to term.
			$term = $this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			if (isset($category['attribs']['']['domain']))
			{
				$scheme = $this->sanitize($category['attribs']['']['domain'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			else
			{
				$scheme = null;
			}
			$categories[] =& new $this->item->feed->category_class($term, $scheme, null);
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'subject') as $category)
		{
			$categories[] =& new $this->item->feed->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'subject') as $category)
		{
			$categories[] =& new $this->item->feed->category_class($this->sanitize($category['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($categories))
		{
			return SimplePie_Misc::array_unique($categories);
		}
		else
		{
			return null;
		}
	}

	function get_author($key = 0)
	{
		$authors = $this->get_authors();
		if (isset($authors[$key]))
		{
			return $authors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_authors()
	{
		$authors = array();
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'author') as $author)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($author['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$authors[] =& new $this->item->feed->author_class($name, $uri, $email);
			}
		}
		if ($author = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'author'))
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($author[0]['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$authors[] =& new $this->item->feed->author_class($name, $url, $email);
			}
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'creator') as $author)
		{
			$authors[] =& new $this->item->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'creator') as $author)
		{
			$authors[] =& new $this->item->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'author') as $author)
		{
			$authors[] =& new $this->item->feed->author_class($this->sanitize($author['data'], SIMPLEPIE_CONSTRUCT_TEXT), null, null);
		}

		if (!empty($authors))
		{
			return SimplePie_Misc::array_unique($authors);
		}
		else
		{
			return null;
		}
	}

	function get_contributor($key = 0)
	{
		$contributors = $this->get_contributors();
		if (isset($contributors[$key]))
		{
			return $contributors[$key];
		}
		else
		{
			return null;
		}
	}

	function get_contributors()
	{
		$contributors = array();
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'contributor') as $contributor)
		{
			$name = null;
			$uri = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data']))
			{
				$uri = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['uri'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $uri !== null)
			{
				$contributors[] =& new $this->item->feed->author_class($name, $uri, $email);
			}
		}
		foreach ((array) $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'contributor') as $contributor)
		{
			$name = null;
			$url = null;
			$email = null;
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data']))
			{
				$name = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['name'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data']))
			{
				$url = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['url'][0]));
			}
			if (isset($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data']))
			{
				$email = $this->sanitize($contributor['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['email'][0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
			}
			if ($name !== null || $email !== null || $url !== null)
			{
				$contributors[] =& new $this->item->feed->author_class($name, $url, $email);
			}
		}

		if (!empty($contributors))
		{
			return SimplePie_Misc::array_unique($contributors);
		}
		else
		{
			return null;
		}
	}

	function get_link($key = 0, $rel = 'alternate')
	{
		$links = $this->get_links($rel);
		if (isset($links[$key]))
		{
			return $links[$key];
		}
		else
		{
			return null;
		}
	}

	/**
	 * Added for parity between the parent-level and the item/entry-level.
	 */
	function get_permalink()
	{
		return $this->get_link(0);
	}

	function get_links($rel = 'alternate')
	{
		if (!isset($this->data['links']))
		{
			$this->data['links'] = array();
			if ($links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'link'))
			{
				foreach ($links as $link)
				{
					if (isset($link['attribs']['']['href']))
					{
						$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
						$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));
					}
				}
			}
			if ($links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'link'))
			{
				foreach ($links as $link)
				{
					if (isset($link['attribs']['']['href']))
					{
						$link_rel = (isset($link['attribs']['']['rel'])) ? $link['attribs']['']['rel'] : 'alternate';
						$this->data['links'][$link_rel][] = $this->sanitize($link['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($link));

					}
				}
			}
			if ($links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}
			if ($links = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'link'))
			{
				$this->data['links']['alternate'][] = $this->sanitize($links[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($links[0]));
			}

			$keys = array_keys($this->data['links']);
			foreach ($keys as $key)
			{
				if (SimplePie_Misc::is_isegment_nz_nc($key))
				{
					if (isset($this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]))
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] = array_merge($this->data['links'][$key], $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key]);
						$this->data['links'][$key] =& $this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key];
					}
					else
					{
						$this->data['links'][SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY . $key] =& $this->data['links'][$key];
					}
				}
				elseif (substr($key, 0, 41) === SIMPLEPIE_IANA_LINK_RELATIONS_REGISTRY)
				{
					$this->data['links'][substr($key, 41)] =& $this->data['links'][$key];
				}
				$this->data['links'][$key] = array_unique($this->data['links'][$key]);
			}
		}

		if (isset($this->data['links'][$rel]))
		{
			return $this->data['links'][$rel];
		}
		else
		{
			return null;
		}
	}

	function get_description()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'subtitle'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'tagline'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_090, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_MAYBE_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'description'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'summary'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'subtitle'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_HTML, $this->get_base($return[0]));
		}
		else
		{
			return null;
		}
	}

	function get_copyright()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_10_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_03, 'copyright'))
		{
			return $this->sanitize($return[0]['data'], SimplePie_Misc::atom_03_construct_type($return[0]['attribs']), $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'copyright'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'rights'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_language()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_RSS_20, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_11, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_DC_10, 'language'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		elseif (isset($this->data['xml_lang']))
		{
			return $this->sanitize($this->data['xml_lang'], SIMPLEPIE_CONSTRUCT_TEXT);
		}
		else
		{
			return null;
		}
	}

	function get_latitude()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lat'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[1];
		}
		else
		{
			return null;
		}
	}

	function get_longitude()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'long'))
		{
			return (float) $return[0]['data'];
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_W3C_BASIC_GEO, 'lon'))
		{
			return (float) $return[0]['data'];
		}
		elseif (($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_GEORSS, 'point')) && preg_match('/^((?:-)?[0-9]+(?:\.[0-9]+)) ((?:-)?[0-9]+(?:\.[0-9]+))$/', $return[0]['data'], $match))
		{
			return (float) $match[2];
		}
		else
		{
			return null;
		}
	}

	function get_image_url()
	{
		if ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'image'))
		{
			return $this->sanitize($return[0]['attribs']['']['href'], SIMPLEPIE_CONSTRUCT_IRI);
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'logo'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		elseif ($return = $this->get_source_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'icon'))
		{
			return $this->sanitize($return[0]['data'], SIMPLEPIE_CONSTRUCT_IRI, $this->get_base($return[0]));
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Author
{
	var $name;
	var $link;
	var $email;

	// Constructor, used to input the data
	function SimplePie_Author($name = null, $link = null, $email = null)
	{
		$this->name = $name;
		$this->link = $link;
		$this->email = $email;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_name()
	{
		if ($this->name !== null)
		{
			return $this->name;
		}
		else
		{
			return null;
		}
	}

	function get_link()
	{
		if ($this->link !== null)
		{
			return $this->link;
		}
		else
		{
			return null;
		}
	}

	function get_email()
	{
		if ($this->email !== null)
		{
			return $this->email;
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Category
{
	var $term;
	var $scheme;
	var $label;

	// Constructor, used to input the data
	function SimplePie_Category($term = null, $scheme = null, $label = null)
	{
		$this->term = $term;
		$this->scheme = $scheme;
		$this->label = $label;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_term()
	{
		if ($this->term !== null)
		{
			return $this->term;
		}
		else
		{
			return null;
		}
	}

	function get_scheme()
	{
		if ($this->scheme !== null)
		{
			return $this->scheme;
		}
		else
		{
			return null;
		}
	}

	function get_label()
	{
		if ($this->label !== null)
		{
			return $this->label;
		}
		else
		{
			return $this->get_term();
		}
	}
}

class SimplePie_Enclosure
{
	var $bitrate;
	var $captions;
	var $categories;
	var $channels;
	var $copyright;
	var $credits;
	var $description;
	var $duration;
	var $expression;
	var $framerate;
	var $handler;
	var $hashes;
	var $height;
	var $javascript;
	var $keywords;
	var $lang;
	var $length;
	var $link;
	var $medium;
	var $player;
	var $ratings;
	var $restrictions;
	var $samplingrate;
	var $thumbnails;
	var $title;
	var $type;
	var $width;

	// Constructor, used to input the data
	function SimplePie_Enclosure($link = null, $type = null, $length = null, $javascript = null, $bitrate = null, $captions = null, $categories = null, $channels = null, $copyright = null, $credits = null, $description = null, $duration = null, $expression = null, $framerate = null, $hashes = null, $height = null, $keywords = null, $lang = null, $medium = null, $player = null, $ratings = null, $restrictions = null, $samplingrate = null, $thumbnails = null, $title = null, $width = null)
	{
		$this->bitrate = $bitrate;
		$this->captions = $captions;
		$this->categories = $categories;
		$this->channels = $channels;
		$this->copyright = $copyright;
		$this->credits = $credits;
		$this->description = $description;
		$this->duration = $duration;
		$this->expression = $expression;
		$this->framerate = $framerate;
		$this->hashes = $hashes;
		$this->height = $height;
		$this->javascript = $javascript;
		$this->keywords = $keywords;
		$this->lang = $lang;
		$this->length = $length;
		$this->link = $link;
		$this->medium = $medium;
		$this->player = $player;
		$this->ratings = $ratings;
		$this->restrictions = $restrictions;
		$this->samplingrate = $samplingrate;
		$this->thumbnails = $thumbnails;
		$this->title = $title;
		$this->type = $type;
		$this->width = $width;
		if (class_exists('idna_convert'))
		{
			$idn =& new idna_convert;
			$parsed = SimplePie_Misc::parse_url($link);
			$this->link = SimplePie_Misc::compress_parse_url($parsed['scheme'], $idn->encode($parsed['authority']), $parsed['path'], $parsed['query'], $parsed['fragment']);
		}
		$this->handler = $this->get_handler(); // Needs to load last
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_bitrate()
	{
		if ($this->bitrate !== null)
		{
			return $this->bitrate;
		}
		else
		{
			return null;
		}
	}

	function get_caption($key = 0)
	{
		$captions = $this->get_captions();
		if (isset($captions[$key]))
		{
			return $captions[$key];
		}
		else
		{
			return null;
		}
	}

	function get_captions()
	{
		if ($this->captions !== null)
		{
			return $this->captions;
		}
		else
		{
			return null;
		}
	}

	function get_category($key = 0)
	{
		$categories = $this->get_categories();
		if (isset($categories[$key]))
		{
			return $categories[$key];
		}
		else
		{
			return null;
		}
	}

	function get_categories()
	{
		if ($this->categories !== null)
		{
			return $this->categories;
		}
		else
		{
			return null;
		}
	}

	function get_channels()
	{
		if ($this->channels !== null)
		{
			return $this->channels;
		}
		else
		{
			return null;
		}
	}

	function get_copyright()
	{
		if ($this->copyright !== null)
		{
			return $this->copyright;
		}
		else
		{
			return null;
		}
	}

	function get_credit($key = 0)
	{
		$credits = $this->get_credits();
		if (isset($credits[$key]))
		{
			return $credits[$key];
		}
		else
		{
			return null;
		}
	}

	function get_credits()
	{
		if ($this->credits !== null)
		{
			return $this->credits;
		}
		else
		{
			return null;
		}
	}

	function get_description()
	{
		if ($this->description !== null)
		{
			return $this->description;
		}
		else
		{
			return null;
		}
	}

	function get_duration($convert = false)
	{
		if ($this->duration !== null)
		{
			if ($convert)
			{
				$time = SimplePie_Misc::time_hms($this->duration);
				return $time;
			}
			else
			{
				return $this->duration;
			}
		}
		else
		{
			return null;
		}
	}

	function get_expression()
	{
		if ($this->expression !== null)
		{
			return $this->expression;
		}
		else
		{
			return 'full';
		}
	}

	function get_extension()
	{
		if ($this->link !== null)
		{
			$url = SimplePie_Misc::parse_url($this->link);
			if ($url['path'] !== '')
			{
				return pathinfo($url['path'], PATHINFO_EXTENSION);
			}
		}
		return null;
	}

	function get_framerate()
	{
		if ($this->framerate !== null)
		{
			return $this->framerate;
		}
		else
		{
			return null;
		}
	}

	function get_handler()
	{
		return $this->get_real_type(true);
	}

	function get_hash($key = 0)
	{
		$hashes = $this->get_hashes();
		if (isset($hashes[$key]))
		{
			return $hashes[$key];
		}
		else
		{
			return null;
		}
	}

	function get_hashes()
	{
		if ($this->hashes !== null)
		{
			return $this->hashes;
		}
		else
		{
			return null;
		}
	}

	function get_height()
	{
		if ($this->height !== null)
		{
			return $this->height;
		}
		else
		{
			return null;
		}
	}

	function get_language()
	{
		if ($this->lang !== null)
		{
			return $this->lang;
		}
		else
		{
			return null;
		}
	}

	function get_keyword($key = 0)
	{
		$keywords = $this->get_keywords();
		if (isset($keywords[$key]))
		{
			return $keywords[$key];
		}
		else
		{
			return null;
		}
	}

	function get_keywords()
	{
		if ($this->keywords !== null)
		{
			return $this->keywords;
		}
		else
		{
			return null;
		}
	}

	function get_length()
	{
		if ($this->length !== null)
		{
			return $this->length;
		}
		else
		{
			return null;
		}
	}

	function get_link()
	{
		if ($this->link !== null)
		{
			return urldecode($this->link);
		}
		else
		{
			return null;
		}
	}

	function get_medium()
	{
		if ($this->medium !== null)
		{
			return $this->medium;
		}
		else
		{
			return null;
		}
	}

	function get_player()
	{
		if ($this->player !== null)
		{
			return $this->player;
		}
		else
		{
			return null;
		}
	}

	function get_rating($key = 0)
	{
		$ratings = $this->get_ratings();
		if (isset($ratings[$key]))
		{
			return $ratings[$key];
		}
		else
		{
			return null;
		}
	}

	function get_ratings()
	{
		if ($this->ratings !== null)
		{
			return $this->ratings;
		}
		else
		{
			return null;
		}
	}

	function get_restriction($key = 0)
	{
		$restrictions = $this->get_restrictions();
		if (isset($restrictions[$key]))
		{
			return $restrictions[$key];
		}
		else
		{
			return null;
		}
	}

	function get_restrictions()
	{
		if ($this->restrictions !== null)
		{
			return $this->restrictions;
		}
		else
		{
			return null;
		}
	}

	function get_sampling_rate()
	{
		if ($this->samplingrate !== null)
		{
			return $this->samplingrate;
		}
		else
		{
			return null;
		}
	}

	function get_size()
	{
		$length = $this->get_length();
		if ($length !== null)
		{
			return round($length/1048576, 2);
		}
		else
		{
			return null;
		}
	}

	function get_thumbnail($key = 0)
	{
		$thumbnails = $this->get_thumbnails();
		if (isset($thumbnails[$key]))
		{
			return $thumbnails[$key];
		}
		else
		{
			return null;
		}
	}

	function get_thumbnails()
	{
		if ($this->thumbnails !== null)
		{
			return $this->thumbnails;
		}
		else
		{
			return null;
		}
	}

	function get_title()
	{
		if ($this->title !== null)
		{
			return $this->title;
		}
		else
		{
			return null;
		}
	}

	function get_type()
	{
		if ($this->type !== null)
		{
			return $this->type;
		}
		else
		{
			return null;
		}
	}

	function get_width()
	{
		if ($this->width !== null)
		{
			return $this->width;
		}
		else
		{
			return null;
		}
	}

	function native_embed($options='')
	{
		return $this->embed($options, true);
	}

	/**
	 * @todo If the dimensions for media:content are defined, use them when width/height are set to 'auto'.
	 */
	function embed($options = '', $native = false)
	{
		// Set up defaults
		$audio = '';
		$video = '';
		$alt = '';
		$altclass = '';
		$loop = 'false';
		$width = 'auto';
		$height = 'auto';
		$bgcolor = '#ffffff';
		$mediaplayer = '';
		$widescreen = false;
		$handler = $this->get_handler();
		$type = $this->get_real_type();

		// Process options and reassign values as necessary
		if (is_array($options))
		{
			extract($options);
		}
		else
		{
			$options = explode(',', $options);
			foreach($options as $option)
			{
				$opt = explode(':', $option, 2);
				if (isset($opt[0], $opt[1]))
				{
					$opt[0] = trim($opt[0]);
					$opt[1] = trim($opt[1]);
					switch ($opt[0])
					{
						case 'audio':
							$audio = $opt[1];
							break;

						case 'video':
							$video = $opt[1];
							break;

						case 'alt':
							$alt = $opt[1];
							break;

						case 'altclass':
							$altclass = $opt[1];
							break;

						case 'loop':
							$loop = $opt[1];
							break;

						case 'width':
							$width = $opt[1];
							break;

						case 'height':
							$height = $opt[1];
							break;

						case 'bgcolor':
							$bgcolor = $opt[1];
							break;

						case 'mediaplayer':
							$mediaplayer = $opt[1];
							break;

						case 'widescreen':
							$widescreen = $opt[1];
							break;
					}
				}
			}
		}

		$mime = explode('/', $type, 2);
		$mime = $mime[0];

		// Process values for 'auto'
		if ($width === 'auto')
		{
			if ($mime === 'video')
			{
				if ($height === 'auto')
				{
					$width = 480;
				}
				elseif ($widescreen)
				{
					$width = round((intval($height)/9)*16);
				}
				else
				{
					$width = round((intval($height)/3)*4);
				}
			}
			else
			{
				$width = '100%';
			}
		}

		if ($height === 'auto')
		{
			if ($mime === 'audio')
			{
				$height = 0;
			}
			elseif ($mime === 'video')
			{
				if ($width === 'auto')
				{
					if ($widescreen)
					{
						$height = 270;
					}
					else
					{
						$height = 360;
					}
				}
				elseif ($widescreen)
				{
					$height = round((intval($width)/16)*9);
				}
				else
				{
					$height = round((intval($width)/4)*3);
				}
			}
			else
			{
				$height = 376;
			}
		}
		elseif ($mime === 'audio')
		{
			$height = 0;
		}

		// Set proper placeholder value
		if ($mime === 'audio')
		{
			$placeholder = $audio;
		}
		elseif ($mime === 'video')
		{
			$placeholder = $video;
		}

		$embed = '';

		// Make sure the JS library is included
		if (!$native)
		{
			static $javascript_outputted = null;
			if (!$javascript_outputted && $this->javascript)
			{
				$embed .= '<script type="text/javascript" src="?' . htmlspecialchars($this->javascript) . '"></script>';
				$javascript_outputted = true;
			}
		}

		// Odeo Feed MP3's
		if ($handler === 'odeo')
		{
			if ($native)
			{
				$embed .= '<embed src="http://odeo.com/flash/audio_player_fullsize.swf" pluginspage="http://adobe.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="440" height="80" wmode="transparent" allowScriptAccess="any" flashvars="valid_sample_rate=true&external_url=' . $this->get_link() . '"></embed>';
			}
			else
			{
				$embed .= '<script type="text/javascript">embed_odeo("' . $this->get_link() . '");</script>';
			}
		}

		// Flash
		elseif ($handler === 'flash')
		{
			if ($native)
			{
				$embed .= "<embed src=\"" . $this->get_link() . "\" pluginspage=\"http://adobe.com/go/getflashplayer\" type=\"$type\" quality=\"high\" width=\"$width\" height=\"$height\" bgcolor=\"$bgcolor\" loop=\"$loop\"></embed>";
			}
			else
			{
				$embed .= "<script type='text/javascript'>embed_flash('$bgcolor', '$width', '$height', '" . $this->get_link() . "', '$loop', '$type');</script>";
			}
		}

		// Flash Media Player file types.
		// Preferred handler for MP3 file types.
		elseif ($handler === 'fmedia' || ($handler === 'mp3' && $mediaplayer !== ''))
		{
			$height += 20;
			if ($native)
			{
				$embed .= "<embed src=\"$mediaplayer\" pluginspage=\"http://adobe.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" quality=\"high\" width=\"$width\" height=\"$height\" wmode=\"transparent\" flashvars=\"file=" . rawurlencode($this->get_link().'?file_extension=.'.$this->get_extension()) . "&autostart=false&repeat=$loop&showdigits=true&showfsbutton=false\"></embed>";
			}
			else
			{
				$embed .= "<script type='text/javascript'>embed_flv('$width', '$height', '" . rawurlencode($this->get_link().'?file_extension=.'.$this->get_extension()) . "', '$placeholder', '$loop', '$mediaplayer');</script>";
			}
		}

		// QuickTime 7 file types.  Need to test with QuickTime 6.
		// Only handle MP3's if the Flash Media Player is not present.
		elseif ($handler === 'quicktime' || ($handler === 'mp3' && $mediaplayer === ''))
		{
			$height += 16;
			if ($native)
			{
				if ($placeholder !== '')
				{
					$embed .= "<embed type=\"$type\" style=\"cursor:hand; cursor:pointer;\" href=\"" . $this->get_link() . "\" src=\"$placeholder\" width=\"$width\" height=\"$height\" autoplay=\"false\" target=\"myself\" controller=\"false\" loop=\"$loop\" scale=\"aspect\" bgcolor=\"$bgcolor\" pluginspage=\"http://apple.com/quicktime/download/\"></embed>";
				}
				else
				{
					$embed .= "<embed type=\"$type\" style=\"cursor:hand; cursor:pointer;\" src=\"" . $this->get_link() . "\" width=\"$width\" height=\"$height\" autoplay=\"false\" target=\"myself\" controller=\"true\" loop=\"$loop\" scale=\"aspect\" bgcolor=\"$bgcolor\" pluginspage=\"http://apple.com/quicktime/download/\"></embed>";
				}
			}
			else
			{
				$embed .= "<script type='text/javascript'>embed_quicktime('$type', '$bgcolor', '$width', '$height', '" . $this->get_link() . "', '$placeholder', '$loop');</script>";
			}
		}

		// Windows Media
		elseif ($handler === 'wmedia')
		{
			$height += 45;
			if ($native)
			{
				$embed .= "<embed type=\"application/x-mplayer2\" src=\"" . $this->get_link() . "\" autosize=\"1\" width=\"$width\" height=\"$height\" showcontrols=\"1\" showstatusbar=\"0\" showdisplay=\"0\" autostart=\"0\"></embed>";
			}
			else
			{
				$embed .= "<script type='text/javascript'>embed_wmedia('$width', '$height', '" . $this->get_link() . "');</script>";
			}
		}

		// Everything else
		else $embed .= '<a href="' . $this->get_link() . '" class="' . $altclass . '">' . $alt . '</a>';

		return $embed;
	}

	function get_real_type($find_handler = false)
	{
		// If it's Odeo, let's get it out of the way.
		if (substr(strtolower($this->get_link()), 0, 15) === 'http://odeo.com')
		{
			return 'odeo';
		}

		// Mime-types by handler.
		$types_flash = array('application/x-shockwave-flash', 'application/futuresplash'); // Flash
		$types_fmedia = array('video/flv', 'video/x-flv','flv-application/octet-stream'); // Flash Media Player
		$types_quicktime = array('audio/3gpp', 'audio/3gpp2', 'audio/aac', 'audio/x-aac', 'audio/aiff', 'audio/x-aiff', 'audio/mid', 'audio/midi', 'audio/x-midi', 'audio/mp4', 'audio/m4a', 'audio/x-m4a', 'audio/wav', 'audio/x-wav', 'video/3gpp', 'video/3gpp2', 'video/m4v', 'video/x-m4v', 'video/mp4', 'video/mpeg', 'video/x-mpeg', 'video/quicktime', 'video/sd-video'); // QuickTime
		$types_wmedia = array('application/asx', 'application/x-mplayer2', 'audio/x-ms-wma', 'audio/x-ms-wax', 'video/x-ms-asf-plugin', 'video/x-ms-asf', 'video/x-ms-wm', 'video/x-ms-wmv', 'video/x-ms-wvx'); // Windows Media
		$types_mp3 = array('audio/mp3', 'audio/x-mp3', 'audio/mpeg', 'audio/x-mpeg'); // MP3

		if ($this->get_type() !== null)
		{
			$type = strtolower($this->type);
		}
		else
		{
			$type = null;
		}

		// If we encounter an unsupported mime-type, check the file extension and guess intelligently.
		if (!in_array($type, array_merge($types_flash, $types_fmedia, $types_quicktime, $types_wmedia, $types_mp3)))
		{
			switch (strtolower($this->get_extension()))
			{
				// Audio mime-types
				case 'aac':
				case 'adts':
					$type = 'audio/acc';
					break;

				case 'aif':
				case 'aifc':
				case 'aiff':
				case 'cdda':
					$type = 'audio/aiff';
					break;

				case 'bwf':
					$type = 'audio/wav';
					break;

				case 'kar':
				case 'mid':
				case 'midi':
				case 'smf':
					$type = 'audio/midi';
					break;

				case 'm4a':
					$type = 'audio/x-m4a';
					break;

				case 'mp3':
				case 'swa':
					$type = 'audio/mp3';
					break;

				case 'wav':
					$type = 'audio/wav';
					break;

				case 'wax':
					$type = 'audio/x-ms-wax';
					break;

				case 'wma':
					$type = 'audio/x-ms-wma';
					break;

				// Video mime-types
				case '3gp':
				case '3gpp':
					$type = 'video/3gpp';
					break;

				case '3g2':
				case '3gp2':
					$type = 'video/3gpp2';
					break;

				case 'asf':
					$type = 'video/x-ms-asf';
					break;

				case 'flv':
					$type = 'video/x-flv';
					break;

				case 'm1a':
				case 'm1s':
				case 'm1v':
				case 'm15':
				case 'm75':
				case 'mp2':
				case 'mpa':
				case 'mpeg':
				case 'mpg':
				case 'mpm':
				case 'mpv':
					$type = 'video/mpeg';
					break;

				case 'm4v':
					$type = 'video/x-m4v';
					break;

				case 'mov':
				case 'qt':
					$type = 'video/quicktime';
					break;

				case 'mp4':
				case 'mpg4':
					$type = 'video/mp4';
					break;

				case 'sdv':
					$type = 'video/sd-video';
					break;

				case 'wm':
					$type = 'video/x-ms-wm';
					break;

				case 'wmv':
					$type = 'video/x-ms-wmv';
					break;

				case 'wvx':
					$type = 'video/x-ms-wvx';
					break;

				// Flash mime-types
				case 'spl':
					$type = 'application/futuresplash';
					break;

				case 'swf':
					$type = 'application/x-shockwave-flash';
					break;
			}
		}

		if ($find_handler)
		{
			if (in_array($type, $types_flash))
			{
				return 'flash';
			}
			elseif (in_array($type, $types_fmedia))
			{
				return 'fmedia';
			}
			elseif (in_array($type, $types_quicktime))
			{
				return 'quicktime';
			}
			elseif (in_array($type, $types_wmedia))
			{
				return 'wmedia';
			}
			elseif (in_array($type, $types_mp3))
			{
				return 'mp3';
			}
			else
			{
				return null;
			}
		}
		else
		{
			return $type;
		}
	}
}

class SimplePie_Caption
{
	var $type;
	var $lang;
	var $startTime;
	var $endTime;
	var $text;

	// Constructor, used to input the data
	function SimplePie_Caption($type = null, $lang = null, $startTime = null, $endTime = null, $text = null)
	{
		$this->type = $type;
		$this->lang = $lang;
		$this->startTime = $startTime;
		$this->endTime = $endTime;
		$this->text = $text;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_endtime()
	{
		if ($this->endTime !== null)
		{
			return $this->endTime;
		}
		else
		{
			return null;
		}
	}

	function get_language()
	{
		if ($this->lang !== null)
		{
			return $this->lang;
		}
		else
		{
			return null;
		}
	}

	function get_starttime()
	{
		if ($this->startTime !== null)
		{
			return $this->startTime;
		}
		else
		{
			return null;
		}
	}

	function get_text()
	{
		if ($this->text !== null)
		{
			return $this->text;
		}
		else
		{
			return null;
		}
	}

	function get_type()
	{
		if ($this->type !== null)
		{
			return $this->type;
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Credit
{
	var $role;
	var $scheme;
	var $name;

	// Constructor, used to input the data
	function SimplePie_Credit($role = null, $scheme = null, $name = null)
	{
		$this->role = $role;
		$this->scheme = $scheme;
		$this->name = $name;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_role()
	{
		if ($this->role !== null)
		{
			return $this->role;
		}
		else
		{
			return null;
		}
	}

	function get_scheme()
	{
		if ($this->scheme !== null)
		{
			return $this->scheme;
		}
		else
		{
			return null;
		}
	}

	function get_name()
	{
		if ($this->name !== null)
		{
			return $this->name;
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Copyright
{
	var $url;
	var $label;

	// Constructor, used to input the data
	function SimplePie_Copyright($url = null, $label = null)
	{
		$this->url = $url;
		$this->label = $label;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_url()
	{
		if ($this->url !== null)
		{
			return $this->url;
		}
		else
		{
			return null;
		}
	}

	function get_attribution()
	{
		if ($this->label !== null)
		{
			return $this->label;
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Rating
{
	var $scheme;
	var $value;

	// Constructor, used to input the data
	function SimplePie_Rating($scheme = null, $value = null)
	{
		$this->scheme = $scheme;
		$this->value = $value;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_scheme()
	{
		if ($this->scheme !== null)
		{
			return $this->scheme;
		}
		else
		{
			return null;
		}
	}

	function get_value()
	{
		if ($this->value !== null)
		{
			return $this->value;
		}
		else
		{
			return null;
		}
	}
}

class SimplePie_Restriction
{
	var $relationship;
	var $type;
	var $value;

	// Constructor, used to input the data
	function SimplePie_Restriction($relationship = null, $type = null, $value = null)
	{
		$this->relationship = $relationship;
		$this->type = $type;
		$this->value = $value;
	}

	function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	function get_relationship()
	{
		if ($this->relationship !== null)
		{
			return $this->relationship;
		}
		else
		{
			return null;
		}
	}

	function get_type()
	{
		if ($this->type !== null)
		{
			return $this->type;
		}
		else
		{
			return null;
		}
	}

	function get_value()
	{
		if ($this->value !== null)
		{
			return $this->value;
		}
		else
		{
			return null;
		}
	}
}

/**
 * @todo Move to properly supporting RFC2616 (HTTP/1.1)
 */
class SimplePie_File
{
	var $url;
	var $useragent;
	var $success = true;
	var $headers = array();
	var $body;
	var $status_code;
	var $redirects = 0;
	var $error;
	var $method = SIMPLEPIE_FILE_SOURCE_NONE;

	function SimplePie_File($url, $timeout = 10, $redirects = 5, $headers = null, $useragent = null, $force_fsockopen = false)
	{
		if (class_exists('idna_convert'))
		{
			$idn =& new idna_convert;
			$parsed = SimplePie_Misc::parse_url($url);
			$url = SimplePie_Misc::compress_parse_url($parsed['scheme'], $idn->encode($parsed['authority']), $parsed['path'], $parsed['query'], $parsed['fragment']);
		}
		$this->url = $url;
		$this->useragent = $useragent;
		if (preg_match('/^http(s)?:\/\//i', $url))
		{
			if ($useragent === null)
			{
				$useragent = ini_get('user_agent');
				$this->useragent = $useragent;
			}
			if (!is_array($headers))
			{
				$headers = array();
			}
			if (!$force_fsockopen && function_exists('curl_exec'))
			{
				$this->method = SIMPLEPIE_FILE_SOURCE_REMOTE | SIMPLEPIE_FILE_SOURCE_CURL;
				$fp = curl_init();
				$headers2 = array();
				foreach ($headers as $key => $value)
				{
					$headers2[] = "$key: $value";
				}
				if (version_compare(SimplePie_Misc::get_curl_version(), '7.10.5', '>='))
				{
					curl_setopt($fp, CURLOPT_ENCODING, '');
				}
				curl_setopt($fp, CURLOPT_URL, $url);
				curl_setopt($fp, CURLOPT_HEADER, 1);
				curl_setopt($fp, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($fp, CURLOPT_TIMEOUT, $timeout);
				curl_setopt($fp, CURLOPT_CONNECTTIMEOUT, $timeout);
				curl_setopt($fp, CURLOPT_REFERER, $url);
				curl_setopt($fp, CURLOPT_USERAGENT, $useragent);
				curl_setopt($fp, CURLOPT_HTTPHEADER, $headers2);
				if (!ini_get('open_basedir') && !ini_get('safe_mode') && version_compare(SimplePie_Misc::get_curl_version(), '7.15.2', '>='))
				{
					curl_setopt($fp, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($fp, CURLOPT_MAXREDIRS, $redirects);
				}

				$this->headers = curl_exec($fp);
				if (curl_errno($fp) === 23 || curl_errno($fp) === 61)
				{
					curl_setopt($fp, CURLOPT_ENCODING, 'none');
					$this->headers = curl_exec($fp);
				}
				if (curl_errno($fp))
				{
					$this->error = 'cURL error ' . curl_errno($fp) . ': ' . curl_error($fp);
					$this->success = false;
				}
				else
				{
					$info = curl_getinfo($fp);
					curl_close($fp);
					$this->headers = explode("\r\n\r\n", $this->headers, $info['redirect_count'] + 1);
					$this->headers = array_pop($this->headers);
					$parser =& new SimplePie_HTTP_Parser($this->headers);
					if ($parser->parse())
					{
						$this->headers = $parser->headers;
						$this->body = $parser->body;
						$this->status_code = $parser->status_code;
						if ((in_array($this->status_code, array(300, 301, 302, 303, 307)) || $this->status_code > 307 && $this->status_code < 400) && isset($this->headers['location']) && $this->redirects < $redirects)
						{
							$this->redirects++;
							$location = SimplePie_Misc::absolutize_url($this->headers['location'], $url);
							return $this->SimplePie_File($location, $timeout, $redirects, $headers, $useragent, $force_fsockopen);
						}
					}
				}
			}
			else
			{
				$this->method = SIMPLEPIE_FILE_SOURCE_REMOTE | SIMPLEPIE_FILE_SOURCE_FSOCKOPEN;
				$url_parts = parse_url($url);
				if (isset($url_parts['scheme']) && strtolower($url_parts['scheme']) === 'https')
				{
					$url_parts['host'] = "ssl://$url_parts[host]";
					$url_parts['port'] = 443;
				}
				if (!isset($url_parts['port']))
				{
					$url_parts['port'] = 80;
				}
				$fp = @fsockopen($url_parts['host'], $url_parts['port'], $errno, $errstr, $timeout);
				if (!$fp)
				{
					$this->error = 'fsockopen error: ' . $errstr;
					$this->success = false;
				}
				else
				{
					stream_set_timeout($fp, $timeout);
					if (isset($url_parts['path']))
					{
						if (isset($url_parts['query']))
						{
							$get = "$url_parts[path]?$url_parts[query]";
						}
						else
						{
							$get = $url_parts['path'];
						}
					}
					else
					{
						$get = '/';
					}
					$out = "GET $get HTTP/1.0\r\n";
					$out .= "Host: $url_parts[host]\r\n";
					$out .= "User-Agent: $useragent\r\n";
					if (extension_loaded('zlib'))
					{
						$out .= "Accept-Encoding: x-gzip,gzip,deflate\r\n";
					}

					if (isset($url_parts['user']) && isset($url_parts['pass']))
					{
						$out .= "Authorization: Basic " . base64_encode("$url_parts[user]:$url_parts[pass]") . "\r\n";
					}
					foreach ($headers as $key => $value)
					{
						$out .= "$key: $value\r\n";
					}
					$out .= "Connection: Close\r\n\r\n";
					fwrite($fp, $out);

					$info = stream_get_meta_data($fp);

					$this->headers = '';
					while (!$info['eof'] && !$info['timed_out'])
					{
						$this->headers .= fread($fp, 1160);
						$info = stream_get_meta_data($fp);
					}
					if (!$info['timed_out'])
					{
						$parser =& new SimplePie_HTTP_Parser($this->headers);
						if ($parser->parse())
						{
							$this->headers = $parser->headers;
							$this->body = $parser->body;
							$this->status_code = $parser->status_code;
							if ((in_array($this->status_code, array(300, 301, 302, 303, 307)) || $this->status_code > 307 && $this->status_code < 400) && isset($this->headers['location']) && $this->redirects < $redirects)
							{
								$this->redirects++;
								$location = SimplePie_Misc::absolutize_url($this->headers['location'], $url);
								return $this->SimplePie_File($location, $timeout, $redirects, $headers, $useragent, $force_fsockopen);
							}
							if (isset($this->headers['content-encoding']))
							{
								// Hey, we act dumb elsewhere, so let's do that here too
								switch (strtolower(trim($this->headers['content-encoding'], "\x09\x0A\x0D\x20")))
								{
									case 'gzip':
									case 'x-gzip':
										$decoder =& new SimplePie_gzdecode($this->body);
										if (!$decoder->parse())
										{
											$this->error = 'Unable to decode HTTP "gzip" stream';
											$this->success = false;
										}
										else
										{
											$this->body = $decoder->data;
										}
										break;

									case 'deflate':
										if (($body = gzuncompress($this->body)) === false)
										{
											if (($body = gzinflate($this->body)) === false)
											{
												$this->error = 'Unable to decode HTTP "deflate" stream';
												$this->success = false;
											}
										}
										$this->body = $body;
										break;

									default:
										$this->error = 'Unknown content coding';
										$this->success = false;
								}
							}
						}
					}
					else
					{
						$this->error = 'fsocket timed out';
						$this->success = false;
					}
					fclose($fp);
				}
			}
		}
		else
		{
			$this->method = SIMPLEPIE_FILE_SOURCE_LOCAL | SIMPLEPIE_FILE_SOURCE_FILE_GET_CONTENTS;
			if (!$this->body = file_get_contents($url))
			{
				$this->error = 'file_get_contents could not read the file';
				$this->success = false;
			}
		}
	}
}

/**
 * HTTP Response Parser
 *
 * @package SimplePie
 */
class SimplePie_HTTP_Parser
{
	/**
	 * HTTP Version
	 *
	 * @access public
	 * @var float
	 */
	var $http_version = 0.0;

	/**
	 * Status code
	 *
	 * @access public
	 * @var int
	 */
	var $status_code = 0;

	/**
	 * Reason phrase
	 *
	 * @access public
	 * @var string
	 */
	var $reason = '';

	/**
	 * Key/value pairs of the headers
	 *
	 * @access public
	 * @var array
	 */
	var $headers = array();

	/**
	 * Body of the response
	 *
	 * @access public
	 * @var string
	 */
	var $body = '';

	/**
	 * Current state of the state machine
	 *
	 * @access private
	 * @var string
	 */
	var $state = 'http_version';

	/**
	 * Input data
	 *
	 * @access private
	 * @var string
	 */
	var $data = '';

	/**
	 * Input data length (to avoid calling strlen() everytime this is needed)
	 *
	 * @access private
	 * @var int
	 */
	var $data_length = 0;

	/**
	 * Current position of the pointer
	 *
	 * @var int
	 * @access private
	 */
	var $position = 0;

	/**
	 * Name of the hedaer currently being parsed
	 *
	 * @access private
	 * @var string
	 */
	var $name = '';

	/**
	 * Value of the hedaer currently being parsed
	 *
	 * @access private
	 * @var string
	 */
	var $value = '';

	/**
	 * Create an instance of the class with the input data
	 *
	 * @access public
	 * @param string $data Input data
	 */
	function SimplePie_HTTP_Parser($data)
	{
		$this->data = $data;
		$this->data_length = strlen($this->data);
	}

	/**
	 * Parse the input data
	 *
	 * @access public
	 * @return bool true on success, false on failure
	 */
	function parse()
	{
		while ($this->state && $this->state !== 'emit' && $this->has_data())
		{
			$state = $this->state;
			$this->$state();
		}
		$this->data = '';
		if ($this->state === 'emit' || $this->state === 'body')
		{
			return true;
		}
		else
		{
			$this->http_version = '';
			$this->status_code = '';
			$this->reason = '';
			$this->headers = array();
			$this->body = '';
			return false;
		}
	}

	/**
	 * Check whether there is data beyond the pointer
	 *
	 * @access private
	 * @return bool true if there is further data, false if not
	 */
	function has_data()
	{
		return (bool) ($this->position < $this->data_length);
	}

	/**
	 * See if the next character is LWS
	 *
	 * @access private
	 * @return bool true if the next character is LWS, false if not
	 */
	function is_linear_whitespace()
	{
		return (bool) ($this->data[$this->position] === "\x09"
			|| $this->data[$this->position] === "\x20"
			|| ($this->data[$this->position] === "\x0A"
				&& isset($this->data[$this->position + 1])
				&& ($this->data[$this->position + 1] === "\x09" || $this->data[$this->position + 1] === "\x20")));
	}

	/**
	 * Parse the HTTP version
	 *
	 * @access private
	 */
	function http_version()
	{
		if (strpos($this->data, "\x0A") !== false && strtoupper(substr($this->data, 0, 5)) === 'HTTP/')
		{
			$len = strspn($this->data, '0123456789.', 5);
			$this->http_version = substr($this->data, 5, $len);
			$this->position += 5 + $len;
			if (substr_count($this->http_version, '.') <= 1)
			{
				$this->http_version = (float) $this->http_version;
				$this->position += strspn($this->data, "\x09\x20", $this->position);
				$this->state = 'status';
			}
			else
			{
				$this->state = false;
			}
		}
		else
		{
			$this->state = false;
		}
	}

	/**
	 * Parse the status code
	 *
	 * @access private
	 */
	function status()
	{
		if ($len = strspn($this->data, '0123456789', $this->position))
		{
			$this->status_code = (int) substr($this->data, $this->position, $len);
			$this->position += $len;
			$this->state = 'reason';
		}
		else
		{
			$this->state = false;
		}
	}

	/**
	 * Parse the reason phrase
	 *
	 * @access private
	 */
	function reason()
	{
		$len = strcspn($this->data, "\x0A", $this->position);
		$this->reason = trim(substr($this->data, $this->position, $len), "\x09\x0D\x20");
		$this->position += $len + 1;
		$this->state = 'new_line';
	}

	/**
	 * Deal with a new line, shifting data around as needed
	 *
	 * @access private
	 */
	function new_line()
	{
		$this->value = trim($this->value, "\x0D\x20");
		if ($this->name !== '' && $this->value !== '')
		{
			$this->name = strtolower($this->name);
			if (isset($this->headers[$this->name]))
			{
				$this->headers[$this->name] .= ', ' . $this->value;
			}
			else
			{
				$this->headers[$this->name] = $this->value;
			}
		}
		$this->name = '';
		$this->value = '';
		if (substr($this->data[$this->position], 0, 2) === "\x0D\x0A")
		{
			$this->position += 2;
			$this->state = 'body';
		}
		elseif ($this->data[$this->position] === "\x0A")
		{
			$this->position++;
			$this->state = 'body';
		}
		else
		{
			$this->state = 'name';
		}
	}

	/**
	 * Parse a header name
	 *
	 * @access private
	 */
	function name()
	{
		$len = strcspn($this->data, "\x0A:", $this->position);
		if (isset($this->data[$this->position + $len]))
		{
			if ($this->data[$this->position + $len] === "\x0A")
			{
				$this->position += $len;
				$this->state = 'new_line';
			}
			else
			{
				$this->name = substr($this->data, $this->position, $len);
				$this->position += $len + 1;
				$this->state = 'value';
			}
		}
		else
		{
			$this->state = false;
		}
	}

	/**
	 * Parse LWS, replacing consecutive LWS characters with a single space
	 *
	 * @access private
	 */
	function linear_whitespace()
	{
		do
		{
			if (substr($this->data, $this->position, 2) === "\x0D\x0A")
			{
				$this->position += 2;
			}
			elseif ($this->data[$this->position] === "\x0A")
			{
				$this->position++;
			}
			$this->position += strspn($this->data, "\x09\x20", $this->position);
		} while ($this->has_data() && $this->is_linear_whitespace());
		$this->value .= "\x20";
	}

	/**
	 * See what state to move to while within non-quoted header values
	 *
	 * @access private
	 */
	function value()
	{
		if ($this->is_linear_whitespace())
		{
			$this->linear_whitespace();
		}
		else
		{
			switch ($this->data[$this->position])
			{
				case '"':
					$this->position++;
					$this->state = 'quote';
					break;

				case "\x0A":
					$this->position++;
					$this->state = 'new_line';
					break;

				default:
					$this->state = 'value_char';
					break;
			}
		}
	}

	/**
	 * Parse a header value while outside quotes
	 *
	 * @access private
	 */
	function value_char()
	{
		$len = strcspn($this->data, "\x09\x20\x0A\"", $this->position);
		$this->value .= substr($this->data, $this->position, $len);
		$this->position += $len;
		$this->state = 'value';
	}

	/**
	 * See what state to move to while within quoted header values
	 *
	 * @access private
	 */
	function quote()
	{
		if ($this->is_linear_whitespace())
		{
			$this->linear_whitespace();
		}
		else
		{
			switch ($this->data[$this->position])
			{
				case '"':
					$this->position++;
					$this->state = 'value';
					break;

				case "\x0A":
					$this->position++;
					$this->state = 'new_line';
					break;

				case '\\':
					$this->position++;
					$this->state = 'quote_escaped';
					break;

				default:
					$this->state = 'quote_char';
					break;
			}
		}
	}

	/**
	 * Parse a header value while within quotes
	 *
	 * @access private
	 */
	function quote_char()
	{
		$len = strcspn($this->data, "\x09\x20\x0A\"\\", $this->position);
		$this->value .= substr($this->data, $this->position, $len);
		$this->position += $len;
		$this->state = 'value';
	}

	/**
	 * Parse an escaped character within quotes
	 *
	 * @access private
	 */
	function quote_escaped()
	{
		$this->value .= $this->data[$this->position];
		$this->position++;
		$this->state = 'quote';
	}

	/**
	 * Parse the body
	 *
	 * @access private
	 */
	function body()
	{
		$this->body = substr($this->data, $this->position);
		$this->state = 'emit';
	}
}

/**
 * gzdecode
 *
 * @package SimplePie
 */
class SimplePie_gzdecode
{
	/**
	 * Compressed data
	 *
	 * @access private
	 * @see gzdecode::$data
	 */
	var $compressed_data;

	/**
	 * Size of compressed data
	 *
	 * @access private
	 */
	var $compressed_size;

	/**
	 * Minimum size of a valid gzip string
	 *
	 * @access private
	 */
	var $min_compressed_size = 18;

	/**
	 * Current position of pointer
	 *
	 * @access private
	 */
	var $position = 0;

	/**
	 * Flags (FLG)
	 *
	 * @access private
	 */
	var $flags;

	/**
	 * Uncompressed data
	 *
	 * @access public
	 * @see gzdecode::$compressed_data
	 */
	var $data;

	/**
	 * Modified time
	 *
	 * @access public
	 */
	var $MTIME;

	/**
	 * Extra Flags
	 *
	 * @access public
	 */
	var $XFL;

	/**
	 * Operating System
	 *
	 * @access public
	 */
	var $OS;

	/**
	 * Subfield ID 1
	 *
	 * @access public
	 * @see gzdecode::$extra_field
	 * @see gzdecode::$SI2
	 */
	var $SI1;

	/**
	 * Subfield ID 2
	 *
	 * @access public
	 * @see gzdecode::$extra_field
	 * @see gzdecode::$SI1
	 */
	var $SI2;

	/**
	 * Extra field content
	 *
	 * @access public
	 * @see gzdecode::$SI1
	 * @see gzdecode::$SI2
	 */
	var $extra_field;

	/**
	 * Original filename
	 *
	 * @access public
	 */
	var $filename;

	/**
	 * Human readable comment
	 *
	 * @access public
	 */
	var $comment;

	/**
	 * Don't allow anything to be set
	 *
	 * @access public
	 */
	function __set($name, $value)
	{
		trigger_error("Cannot write property $name", E_USER_ERROR);
	}

	/**
	 * Set the compressed string and related properties
	 *
	 * @access public
	 */
	function SimplePie_gzdecode($data)
	{
		$this->compressed_data = $data;
		$this->compressed_size = strlen($data);
	}

	/**
	 * Decode the GZIP stream
	 *
	 * @access public
	 */
	function parse()
	{
		if ($this->compressed_size >= $this->min_compressed_size)
		{
			// Check ID1, ID2, and CM
			if (substr($this->compressed_data, 0, 3) !== "\x1F\x8B\x08")
			{
				return false;
			}

			// Get the FLG (FLaGs)
			$this->flags = ord($this->compressed_data[3]);

			// FLG bits above (1 << 4) are reserved
			if ($this->flags > 0x1F)
			{
				return false;
			}

			// Advance the pointer after the above
			$this->position += 4;

			// MTIME
			$mtime = substr($this->compressed_data, $this->position, 4);
			// Reverse the string if we're on a big-endian arch because l is the only signed long and is machine endianness
			if (current(unpack('S', "\x00\x01")) === 1)
			{
				$mtime = strrev($mtime);
			}
			$this->MTIME = current(unpack('l', $mtime));
			$this->position += 4;

			// Get the XFL (eXtra FLags)
			$this->XFL = ord($this->compressed_data[$this->position++]);

			// Get the OS (Operating System)
			$this->OS = ord($this->compressed_data[$this->position++]);

			// Parse the FEXTRA
			if ($this->flags & 4)
			{
				// Read subfield IDs
				$this->SI1 = $this->compressed_data[$this->position++];
				$this->SI2 = $this->compressed_data[$this->position++];

				// SI2 set to zero is reserved for future use
				if ($this->SI2 === "\x00")
				{
					return false;
				}

				// Get the length of the extra field
				$len = current(unpack('v', substr($this->compressed_data, $this->position, 2)));
				$position += 2;

				// Check the length of the string is still valid
				$this->min_compressed_size += $len + 4;
				if ($this->compressed_size >= $this->min_compressed_size)
				{
					// Set the extra field to the given data
					$this->extra_field = substr($this->compressed_data, $this->position, $len);
					$this->position += $len;
				}
				else
				{
					return false;
				}
			}

			// Parse the FNAME
			if ($this->flags & 8)
			{
				// Get the length of the filename
				$len = strcspn($this->compressed_data, "\x00", $this->position);

				// Check the length of the string is still valid
				$this->min_compressed_size += $len + 1;
				if ($this->compressed_size >= $this->min_compressed_size)
				{
					// Set the original filename to the given string
					$this->filename = substr($this->compressed_data, $this->position, $len);
					$this->position += $len + 1;
				}
				else
				{
					return false;
				}
			}

			// Parse the FCOMMENT
			if ($this->flags & 16)
			{
				// Get the length of the comment
				$len = strcspn($this->compressed_data, "\x00", $this->position);

				// Check the length of the string is still valid
				$this->min_compressed_size += $len + 1;
				if ($this->compressed_size >= $this->min_compressed_size)
				{
					// Set the original comment to the given string
					$this->comment = substr($this->compressed_data, $this->position, $len);
					$this->position += $len + 1;
				}
				else
				{
					return false;
				}
			}

			// Parse the FHCRC
			if ($this->flags & 2)
			{
				// Check the length of the string is still valid
				$this->min_compressed_size += $len + 2;
				if ($this->compressed_size >= $this->min_compressed_size)
				{
					// Read the CRC
					$crc = current(unpack('v', substr($this->compressed_data, $this->position, 2)));

					// Check the CRC matches
					if ((crc32(substr($this->compressed_data, 0, $this->position)) & 0xFFFF) === $crc)
					{
						$this->position += 2;
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}

			// Decompress the actual data
			if (($this->data = gzinflate(substr($this->compressed_data, $this->position, -8))) === false)
			{
				return false;
			}
			else
			{
				$this->position = $this->compressed_size - 8;
			}

			// Check CRC of data
			$crc = current(unpack('V', substr($this->compressed_data, $this->position, 4)));
			$this->position += 4;
			/*if (extension_loaded('hash') && sprintf('%u', current(unpack('V', hash('crc32b', $this->data)))) !== sprintf('%u', $crc))
			{
				return false;
			}*/

			// Check ISIZE of data
			$isize = current(unpack('V', substr($this->compressed_data, $this->position, 4)));
			$this->position += 4;
			if (sprintf('%u', strlen($this->data) & 0xFFFFFFFF) !== sprintf('%u', $isize))
			{
				return false;
			}

			// Wow, against all odds, we've actually got a valid gzip string
			return true;
		}
		else
		{
			return false;
		}
	}
}

class SimplePie_Cache
{
	/**
	 * Don't call the constructor. Please.
	 *
	 * @access private
	 */
	function SimplePie_Cache()
	{
		trigger_error('Please call SimplePie_Cache::create() instead of the constructor', E_USER_ERROR);
	}

	/**
	 * Create a new SimplePie_Cache object
	 *
	 * @static
	 * @access public
	 */
	function create($location, $filename, $extension)
	{
		$location_iri =& new SimplePie_IRI($location);
		switch ($location_iri->get_scheme())
		{
			case 'mysql':
				if (extension_loaded('mysql'))
				{
					return new SimplePie_Cache_MySQL($location_iri, $filename, $extension);
				}
				break;

			default:
				return new SimplePie_Cache_File($location, $filename, $extension);
		}
	}
}

class SimplePie_Cache_File
{
	var $location;
	var $filename;
	var $extension;
	var $name;

	function SimplePie_Cache_File($location, $filename, $extension)
	{
		$this->location = $location;
		$this->filename = $filename;
		$this->extension = $extension;
		$this->name = "$this->location/$this->filename.$this->extension";
	}

	function save($data)
	{
		if (file_exists($this->name) && is_writeable($this->name) || file_exists($this->location) && is_writeable($this->location))
		{
			if (is_a($data, 'SimplePie'))
			{
				$data = $data->data;
			}

			$data = serialize($data);

			if (function_exists('file_put_contents'))
			{
				return (bool) file_put_contents($this->name, $data);
			}
			else
			{
				$fp = fopen($this->name, 'wb');
				if ($fp)
				{
					fwrite($fp, $data);
					fclose($fp);
					return true;
				}
			}
		}
		return false;
	}

	function load()
	{
		if (file_exists($this->name) && is_readable($this->name))
		{
			return unserialize(file_get_contents($this->name));
		}
		return false;
	}

	function mtime()
	{
		if (file_exists($this->name))
		{
			return filemtime($this->name);
		}
		return false;
	}

	function touch()
	{
		if (file_exists($this->name))
		{
			return touch($this->name);
		}
		return false;
	}

	function unlink()
	{
		if (file_exists($this->name))
		{
			return unlink($this->name);
		}
		return false;
	}
}

class SimplePie_Cache_DB
{
	function prepare_simplepie_object_for_cache($data)
	{
		$items = $data->get_items();
		$items_by_id = array();

		if (!empty($items))
		{
			foreach ($items as $item)
			{
				$items_by_id[$item->get_id()] = $item;
			}

			if (count($items_by_id) !== count($items))
			{
				$items_by_id = array();
				foreach ($items as $item)
				{
					$items_by_id[$item->get_id(true)] = $item;
				}
			}

			if (isset($data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]))
			{
				$channel =& $data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0];
			}
			elseif (isset($data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]))
			{
				$channel =& $data->data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0];
			}
			elseif (isset($data->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]))
			{
				$channel =& $data->data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0];
			}
			elseif (isset($data->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['channel'][0]))
			{
				$channel =& $data->data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]['child'][SIMPLEPIE_NAMESPACE_RSS_20]['channel'][0];
			}
			else
			{
				$channel = null;
			}

			if ($channel !== null)
			{
				if (isset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry']))
				{
					unset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry']);
				}
				if (isset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['entry']))
				{
					unset($channel['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['entry']);
				}
				if (isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item']))
				{
					unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_10]['item']);
				}
				if (isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item']))
				{
					unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_090]['item']);
				}
				if (isset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_20]['item']))
				{
					unset($channel['child'][SIMPLEPIE_NAMESPACE_RSS_20]['item']);
				}
			}
			if (isset($data->data['items']))
			{
				unset($data->data['items']);
			}
			if (isset($data->data['ordered_items']))
			{
				unset($data->data['ordered_items']);
			}
		}
		return array(serialize($data->data), $items_by_id);
	}
}

class SimplePie_Cache_MySQL extends SimplePie_Cache_DB
{
	var $mysql;
	var $options;
	var $id;

	function SimplePie_Cache_MySQL($mysql_location, $name, $extension)
	{
		$host = $mysql_location->get_host();
		if (SimplePie_Misc::stripos($host, 'unix(') === 0 && substr($host, -1) === ')')
		{
			$server = ':' . substr($host, 5, -1);
		}
		else
		{
			$server = $host;
			if ($mysql_location->get_port() !== null)
			{
				$server .= ':' . $mysql_location->get_port();
			}
		}

		if (strpos($mysql_location->get_userinfo(), ':') !== false)
		{
			list($username, $password) = explode(':', $mysql_location->get_userinfo(), 2);
		}
		else
		{
			$username = $mysql_location->get_userinfo();
			$password = null;
		}

		if ($this->mysql = mysql_connect($server, $username, $password))
		{
			$this->id = $name . $extension;
			$this->options = SimplePie_Misc::parse_str($mysql_location->get_query());
			if (!isset($this->options['prefix'][0]))
			{
				$this->options['prefix'][0] = '';
			}

			if (mysql_select_db(ltrim($mysql_location->get_path(), '/'))
				&& mysql_query('SET NAMES utf8')
				&& ($query = mysql_unbuffered_query('SHOW TABLES')))
			{
				$db = array();
				while ($row = mysql_fetch_row($query))
				{
					$db[] = $row[0];
				}

				if (!in_array($this->options['prefix'][0] . 'cache_data', $db))
				{
					if (!mysql_query('CREATE TABLE `' . $this->options['prefix'][0] . 'cache_data` (`id` TEXT CHARACTER SET utf8 NOT NULL, `items` SMALLINT NOT NULL DEFAULT 0, `data` BLOB NOT NULL, `mtime` INT UNSIGNED NOT NULL, UNIQUE (`id`(125)))'))
					{
						$this->mysql = null;
					}
				}

				if (!in_array($this->options['prefix'][0] . 'items', $db))
				{
					if (!mysql_query('CREATE TABLE `' . $this->options['prefix'][0] . 'items` (`feed_id` TEXT CHARACTER SET utf8 NOT NULL, `id` TEXT CHARACTER SET utf8 NOT NULL, `data` TEXT CHARACTER SET utf8 NOT NULL, `posted` INT UNSIGNED NOT NULL, INDEX `feed_id` (`feed_id`(125)))'))
					{
						$this->mysql = null;
					}
				}
			}
			else
			{
				$this->mysql = null;
			}
		}
	}

	function save($data)
	{
		if ($this->mysql)
		{
			$feed_id = "'" . mysql_real_escape_string($this->id) . "'";

			if (is_a($data, 'SimplePie'))
			{
				if (SIMPLEPIE_PHP5)
				{
					// This keyword needs to defy coding standards for PHP4 compatibility
					$data = clone($data);
				}

				$prepared = $this->prepare_simplepie_object_for_cache($data);

				if ($query = mysql_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = ' . $feed_id, $this->mysql))
				{
					if (mysql_num_rows($query))
					{
						$items = count($prepared[1]);
						if ($items)
						{
							$sql = 'UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `items` = ' . $items . ', `data` = \'' . mysql_real_escape_string($prepared[0]) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id;
						}
						else
						{
							$sql = 'UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `data` = \'' . mysql_real_escape_string($prepared[0]) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id;
						}

						if (!mysql_query($sql, $this->mysql))
						{
							return false;
						}
					}
					elseif (!mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'cache_data` (`id`, `items`, `data`, `mtime`) VALUES(' . $feed_id . ', ' . count($prepared[1]) . ', \'' . mysql_real_escape_string($prepared[0]) . '\', ' . time() . ')', $this->mysql))
					{
						return false;
					}

					$ids = array_keys($prepared[1]);
					if (!empty($ids))
					{
						foreach ($ids as $id)
						{
							$database_ids[] = mysql_real_escape_string($id);
						}

						if ($query = mysql_unbuffered_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'items` WHERE `id` = \'' . implode('\' OR `id` = \'', $database_ids) . '\' AND `feed_id` = ' . $feed_id, $this->mysql))
						{
							$existing_ids = array();
							while ($row = mysql_fetch_row($query))
							{
								$existing_ids[] = $row[0];
							}

							$new_ids = array_diff($ids, $existing_ids);

							foreach ($new_ids as $new_id)
							{
								if (!($date = $prepared[1][$new_id]->get_date('U')))
								{
									$date = time();
								}

								if (!mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'items` (`feed_id`, `id`, `data`, `posted`) VALUES(' . $feed_id . ', \'' . mysql_real_escape_string($new_id) . '\', \'' . mysql_real_escape_string(serialize($prepared[1][$new_id]->data)) . '\', ' . $date . ')', $this->mysql))
								{
									return false;
								}
							}
							return true;
						}
					}
					else
					{
						return true;
					}
				}
			}
			elseif ($query = mysql_query('SELECT `id` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = ' . $feed_id, $this->mysql))
			{
				if (mysql_num_rows($query))
				{
					if (mysql_query('UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `items` = 0, `data` = \'' . mysql_real_escape_string(serialize($data)) . '\', `mtime` = ' . time() . ' WHERE `id` = ' . $feed_id, $this->mysql))
					{
						return true;
					}
				}
				elseif (mysql_query('INSERT INTO `' . $this->options['prefix'][0] . 'cache_data` (`id`, `items`, `data`, `mtime`) VALUES(\'' . mysql_real_escape_string($this->id) . '\', 0, \'' . mysql_real_escape_string(serialize($data)) . '\', ' . time() . ')', $this->mysql))
				{
					return true;
				}
			}
		}
		return false;
	}

	function load()
	{
		if ($this->mysql && ($query = mysql_query('SELECT `items`, `data` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'", $this->mysql)) && ($row = mysql_fetch_row($query)))
		{
			$data = unserialize($row[1]);

			if (isset($this->options['items'][0]))
			{
				$items = (int) $this->options['items'][0];
			}
			else
			{
				$items = (int) $row[0];
			}

			if ($items !== 0)
			{
				if (isset($data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0]))
				{
					$feed =& $data['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['feed'][0];
				}
				elseif (isset($data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0]))
				{
					$feed =& $data['child'][SIMPLEPIE_NAMESPACE_ATOM_03]['feed'][0];
				}
				elseif (isset($data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0]))
				{
					$feed =& $data['child'][SIMPLEPIE_NAMESPACE_RDF]['RDF'][0];
				}
				elseif (isset($data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0]))
				{
					$feed =& $data['child'][SIMPLEPIE_NAMESPACE_RSS_20]['rss'][0];
				}
				else
				{
					$feed = null;
				}

				if ($feed !== null)
				{
					$sql = 'SELECT `data` FROM `' . $this->options['prefix'][0] . 'items` WHERE `feed_id` = \'' . mysql_real_escape_string($this->id) . '\' ORDER BY `posted` DESC';
					if ($items > 0)
					{
						$sql .= ' LIMIT ' . $items;
					}

					if ($query = mysql_unbuffered_query($sql, $this->mysql))
					{
						while ($row = mysql_fetch_row($query))
						{
							$feed['child'][SIMPLEPIE_NAMESPACE_ATOM_10]['entry'][] = unserialize($row[0]);
						}
					}
					else
					{
						return false;
					}
				}
			}
			return $data;
		}
		return false;
	}

	function mtime()
	{
		if ($this->mysql && ($query = mysql_query('SELECT `mtime` FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'", $this->mysql)) && ($row = mysql_fetch_row($query)))
		{
			return $row[0];
		}
		else
		{
			return false;
		}
	}

	function touch()
	{
		if ($this->mysql && ($query = mysql_query('UPDATE `' . $this->options['prefix'][0] . 'cache_data` SET `mtime` = ' . time() . ' WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'", $this->mysql)) && mysql_affected_rows($this->mysql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function unlink()
	{
		if ($this->mysql && ($query = mysql_query('DELETE FROM `' . $this->options['prefix'][0] . 'cache_data` WHERE `id` = \'' . mysql_real_escape_string($this->id) . "'", $this->mysql)) && ($query2 = mysql_query('DELETE FROM `' . $this->options['prefix'][0] . 'items` WHERE `feed_id` = \'' . mysql_real_escape_string($this->id) . "'", $this->mysql)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

class SimplePie_Misc
{
	function time_hms($seconds)
	{
		$time = '';

		$hours = floor($seconds / 3600);
		$remainder = $seconds % 3600;
		if ($hours > 0)
		{
			$time .= $hours.':';
		}

		$minutes = floor($remainder / 60);
		$seconds = $remainder % 60;
		if ($minutes < 10 && $hours > 0)
		{
			$minutes = '0' . $minutes;
		}
		if ($seconds < 10)
		{
			$seconds = '0' . $seconds;
		}

		$time .= $minutes.':';
		$time .= $seconds;

		return $time;
	}

	function absolutize_url($relative, $base)
	{
		$iri = SimplePie_IRI::absolutize(new SimplePie_IRI($base), $relative);
		return $iri->get_iri();
	}

	function remove_dot_segments($input)
	{
		$output = '';
		while (strpos($input, './') !== false || strpos($input, '/.') !== false || $input === '.' || $input === '..')
		{
			// A: If the input buffer begins with a prefix of "../" or "./", then remove that prefix from the input buffer; otherwise,
			if (strpos($input, '../') === 0)
			{
				$input = substr($input, 3);
			}
			elseif (strpos($input, './') === 0)
			{
				$input = substr($input, 2);
			}
			// B: if the input buffer begins with a prefix of "/./" or "/.", where "." is a complete path segment, then replace that prefix with "/" in the input buffer; otherwise,
			elseif (strpos($input, '/./') === 0)
			{
				$input = substr_replace($input, '/', 0, 3);
			}
			elseif ($input === '/.')
			{
				$input = '/';
			}
			// C: if the input buffer begins with a prefix of "/../" or "/..", where ".." is a complete path segment, then replace that prefix with "/" in the input buffer and remove the last segment and its preceding "/" (if any) from the output buffer; otherwise,
			elseif (strpos($input, '/../') === 0)
			{
				$input = substr_replace($input, '/', 0, 4);
				$output = substr_replace($output, '', strrpos($output, '/'));
			}
			elseif ($input === '/..')
			{
				$input = '/';
				$output = substr_replace($output, '', strrpos($output, '/'));
			}
			// D: if the input buffer consists only of "." or "..", then remove that from the input buffer; otherwise,
			elseif ($input === '.' || $input === '..')
			{
				$input = '';
			}
			// E: move the first path segment in the input buffer to the end of the output buffer, including the initial "/" character (if any) and any subsequent characters up to, but not including, the next "/" character or the end of the input buffer
			elseif (($pos = strpos($input, '/', 1)) !== false)
			{
				$output .= substr($input, 0, $pos);
				$input = substr_replace($input, '', 0, $pos);
			}
			else
			{
				$output .= $input;
				$input = '';
			}
		}
		return $output . $input;
	}

	function get_element($realname, $string)
	{
		$return = array();
		$name = preg_quote($realname, '/');
		if (preg_match_all("/<($name)" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . "(>(.*)<\/$name>|(\/)?>)/siU", $string, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE))
		{
			for ($i = 0, $total_matches = count($matches); $i < $total_matches; $i++)
			{
				$return[$i]['tag'] = $realname;
				$return[$i]['full'] = $matches[$i][0][0];
				$return[$i]['offset'] = $matches[$i][0][1];
				if (strlen($matches[$i][3][0]) <= 2)
				{
					$return[$i]['self_closing'] = true;
				}
				else
				{
					$return[$i]['self_closing'] = false;
					$return[$i]['content'] = $matches[$i][4][0];
				}
				$return[$i]['attribs'] = array();
				if (isset($matches[$i][2][0]) && preg_match_all('/[\x09\x0A\x0B\x0C\x0D\x20]+([^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3D\x3E]*)(?:[\x09\x0A\x0B\x0C\x0D\x20]*=[\x09\x0A\x0B\x0C\x0D\x20]*(?:"([^"]*)"|\'([^\']*)\'|([^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?/', ' ' . $matches[$i][2][0] . ' ', $attribs, PREG_SET_ORDER))
				{
					for ($j = 0, $total_attribs = count($attribs); $j < $total_attribs; $j++)
					{
						if (count($attribs[$j]) === 2)
						{
							$attribs[$j][2] = $attribs[$j][1];
						}
						$return[$i]['attribs'][strtolower($attribs[$j][1])]['data'] = SimplePie_Misc::entities_decode(end($attribs[$j]), 'UTF-8');
					}
				}
			}
		}
		return $return;
	}

	function element_implode($element)
	{
		$full = "<$element[tag]";
		foreach ($element['attribs'] as $key => $value)
		{
			$key = strtolower($key);
			$full .= " $key=\"" . htmlspecialchars($value['data']) . '"';
		}
		if ($element['self_closing'])
		{
			$full .= ' />';
		}
		else
		{
			$full .= ">$element[content]</$element[tag]>";
		}
		return $full;
	}

	function error($message, $level, $file, $line)
	{
		if ((ini_get('error_reporting') & $level) > 0)
		{
			switch ($level)
			{
				case E_USER_ERROR:
					$note = 'PHP Error';
					break;
				case E_USER_WARNING:
					$note = 'PHP Warning';
					break;
				case E_USER_NOTICE:
					$note = 'PHP Notice';
					break;
				default:
					$note = 'Unknown Error';
					break;
			}
			error_log("$note: $message in $file on line $line", 0);
		}
		return $message;
	}

	/**
	 * If a file has been cached, retrieve and display it.
	 *
	 * This is most useful for caching images (get_favicon(), etc.),
	 * however it works for all cached files.  This WILL NOT display ANY
	 * file/image/page/whatever, but rather only display what has already
	 * been cached by SimplePie.
	 *
	 * @access public
	 * @see SimplePie::get_favicon()
	 * @param str $identifier_url URL that is used to identify the content.
	 * This may or may not be the actual URL of the live content.
	 * @param str $cache_location Location of SimplePie's cache.  Defaults
	 * to './cache'.
	 * @param str $cache_extension The file extension that the file was
	 * cached with.  Defaults to 'spc'.
	 * @param str $cache_class Name of the cache-handling class being used
	 * in SimplePie.  Defaults to 'SimplePie_Cache', and should be left
	 * as-is unless you've overloaded the class.
	 * @param str $cache_name_function Obsolete. Exists for backwards
	 * compatibility reasons only.
	 */
	function display_cached_file($identifier_url, $cache_location = './cache', $cache_extension = 'spc', $cache_class = 'SimplePie_Cache', $cache_name_function = 'md5')
	{
		$cache = call_user_func(array($cache_class, 'create'), $cache_location, $identifier_url, $cache_extension);

		if ($file = $cache->load())
		{
			if (isset($file['headers']['content-type']))
			{
				header('Content-type:' . $file['headers']['content-type']);
			}
			else
			{
				header('Content-type: application/octet-stream');
			}
			header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT'); // 7 days
			echo $file['body'];
			exit;
		}

		die('Cached file for ' . $identifier_url . ' cannot be found.');
	}

	function fix_protocol($url, $http = 1)
	{
		$url = SimplePie_Misc::normalize_url($url);
		$parsed = SimplePie_Misc::parse_url($url);
		if ($parsed['scheme'] !== '' && $parsed['scheme'] !== 'http' && $parsed['scheme'] !== 'https')
		{
			return SimplePie_Misc::fix_protocol(SimplePie_Misc::compress_parse_url('http', $parsed['authority'], $parsed['path'], $parsed['query'], $parsed['fragment']), $http);
		}

		if ($parsed['scheme'] === '' && $parsed['authority'] === '' && !file_exists($url))
		{
			return SimplePie_Misc::fix_protocol(SimplePie_Misc::compress_parse_url('http', $parsed['path'], '', $parsed['query'], $parsed['fragment']), $http);
		}

		if ($http === 2 && $parsed['scheme'] !== '')
		{
			return "feed:$url";
		}
		elseif ($http === 3 && strtolower($parsed['scheme']) === 'http')
		{
			return substr_replace($url, 'podcast', 0, 4);
		}
		elseif ($http === 4 && strtolower($parsed['scheme']) === 'http')
		{
			return substr_replace($url, 'itpc', 0, 4);
		}
		else
		{
			return $url;
		}
	}

	function parse_url($url)
	{
		$iri =& new SimplePie_IRI($url);
		return array(
			'scheme' => (string) $iri->get_scheme(),
			'authority' => (string) $iri->get_authority(),
			'path' => (string) $iri->get_path(),
			'query' => (string) $iri->get_query(),
			'fragment' => (string) $iri->get_fragment()
		);
	}

	function compress_parse_url($scheme = '', $authority = '', $path = '', $query = '', $fragment = '')
	{
		$iri =& new SimplePie_IRI('');
		$iri->set_scheme($scheme);
		$iri->set_authority($authority);
		$iri->set_path($path);
		$iri->set_query($query);
		$iri->set_fragment($fragment);
		return $iri->get_iri();
	}

	function normalize_url($url)
	{
		$iri =& new SimplePie_IRI($url);
		return $iri->get_iri();
	}

	function percent_encoding_normalization($match)
	{
		$integer = hexdec($match[1]);
		if ($integer >= 0x41 && $integer <= 0x5A || $integer >= 0x61 && $integer <= 0x7A || $integer >= 0x30 && $integer <= 0x39 || $integer === 0x2D || $integer === 0x2E || $integer === 0x5F || $integer === 0x7E)
		{
			return chr($integer);
		}
		else
		{
			return strtoupper($match[0]);
		}
	}

	/**
	 * Remove bad UTF-8 bytes
	 *
	 * PCRE Pattern to locate bad bytes in a UTF-8 string comes from W3C
	 * FAQ: Multilingual Forms (modified to include full ASCII range)
	 *
	 * @author Geoffrey Sneddon
	 * @see http://www.w3.org/International/questions/qa-forms-utf-8
	 * @param string $str String to remove bad UTF-8 bytes from
	 * @return string UTF-8 string
	 */
	function utf8_bad_replace($str)
	{
		if (function_exists('iconv') && ($return = @iconv('UTF-8', 'UTF-8//IGNORE', $str)))
		{
			return $return;
		}
		elseif (function_exists('mb_convert_encoding') && ($return = @mb_convert_encoding($str, 'UTF-8', 'UTF-8')))
		{
			return $return;
		}
		elseif (preg_match_all('/(?:[\x00-\x7F]|[\xC2-\xDF][\x80-\xBF]|\xE0[\xA0-\xBF][\x80-\xBF]|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}|\xED[\x80-\x9F][\x80-\xBF]|\xF0[\x90-\xBF][\x80-\xBF]{2}|[\xF1-\xF3][\x80-\xBF]{3}|\xF4[\x80-\x8F][\x80-\xBF]{2})+/', $str, $matches))
		{
			return implode("\xEF\xBF\xBD", $matches[0]);
		}
		elseif ($str !== '')
		{
			return "\xEF\xBF\xBD";
		}
		else
		{
			return '';
		}
	}

	/**
	 * Converts a Windows-1252 encoded string to a UTF-8 encoded string
	 *
	 * @static
	 * @access public
	 * @param string $string Windows-1252 encoded string
	 * @return string UTF-8 encoded string
	 */
	function windows_1252_to_utf8($string)
	{
		static $convert_table = array("\x80" => "\xE2\x82\xAC", "\x81" => "\xEF\xBF\xBD", "\x82" => "\xE2\x80\x9A", "\x83" => "\xC6\x92", "\x84" => "\xE2\x80\x9E", "\x85" => "\xE2\x80\xA6", "\x86" => "\xE2\x80\xA0", "\x87" => "\xE2\x80\xA1", "\x88" => "\xCB\x86", "\x89" => "\xE2\x80\xB0", "\x8A" => "\xC5\xA0", "\x8B" => "\xE2\x80\xB9", "\x8C" => "\xC5\x92", "\x8D" => "\xEF\xBF\xBD", "\x8E" => "\xC5\xBD", "\x8F" => "\xEF\xBF\xBD", "\x90" => "\xEF\xBF\xBD", "\x91" => "\xE2\x80\x98", "\x92" => "\xE2\x80\x99", "\x93" => "\xE2\x80\x9C", "\x94" => "\xE2\x80\x9D", "\x95" => "\xE2\x80\xA2", "\x96" => "\xE2\x80\x93", "\x97" => "\xE2\x80\x94", "\x98" => "\xCB\x9C", "\x99" => "\xE2\x84\xA2", "\x9A" => "\xC5\xA1", "\x9B" => "\xE2\x80\xBA", "\x9C" => "\xC5\x93", "\x9D" => "\xEF\xBF\xBD", "\x9E" => "\xC5\xBE", "\x9F" => "\xC5\xB8", "\xA0" => "\xC2\xA0", "\xA1" => "\xC2\xA1", "\xA2" => "\xC2\xA2", "\xA3" => "\xC2\xA3", "\xA4" => "\xC2\xA4", "\xA5" => "\xC2\xA5", "\xA6" => "\xC2\xA6", "\xA7" => "\xC2\xA7", "\xA8" => "\xC2\xA8", "\xA9" => "\xC2\xA9", "\xAA" => "\xC2\xAA", "\xAB" => "\xC2\xAB", "\xAC" => "\xC2\xAC", "\xAD" => "\xC2\xAD", "\xAE" => "\xC2\xAE", "\xAF" => "\xC2\xAF", "\xB0" => "\xC2\xB0", "\xB1" => "\xC2\xB1", "\xB2" => "\xC2\xB2", "\xB3" => "\xC2\xB3", "\xB4" => "\xC2\xB4", "\xB5" => "\xC2\xB5", "\xB6" => "\xC2\xB6", "\xB7" => "\xC2\xB7", "\xB8" => "\xC2\xB8", "\xB9" => "\xC2\xB9", "\xBA" => "\xC2\xBA", "\xBB" => "\xC2\xBB", "\xBC" => "\xC2\xBC", "\xBD" => "\xC2\xBD", "\xBE" => "\xC2\xBE", "\xBF" => "\xC2\xBF", "\xC0" => "\xC3\x80", "\xC1" => "\xC3\x81", "\xC2" => "\xC3\x82", "\xC3" => "\xC3\x83", "\xC4" => "\xC3\x84", "\xC5" => "\xC3\x85", "\xC6" => "\xC3\x86", "\xC7" => "\xC3\x87", "\xC8" => "\xC3\x88", "\xC9" => "\xC3\x89", "\xCA" => "\xC3\x8A", "\xCB" => "\xC3\x8B", "\xCC" => "\xC3\x8C", "\xCD" => "\xC3\x8D", "\xCE" => "\xC3\x8E", "\xCF" => "\xC3\x8F", "\xD0" => "\xC3\x90", "\xD1" => "\xC3\x91", "\xD2" => "\xC3\x92", "\xD3" => "\xC3\x93", "\xD4" => "\xC3\x94", "\xD5" => "\xC3\x95", "\xD6" => "\xC3\x96", "\xD7" => "\xC3\x97", "\xD8" => "\xC3\x98", "\xD9" => "\xC3\x99", "\xDA" => "\xC3\x9A", "\xDB" => "\xC3\x9B", "\xDC" => "\xC3\x9C", "\xDD" => "\xC3\x9D", "\xDE" => "\xC3\x9E", "\xDF" => "\xC3\x9F", "\xE0" => "\xC3\xA0", "\xE1" => "\xC3\xA1", "\xE2" => "\xC3\xA2", "\xE3" => "\xC3\xA3", "\xE4" => "\xC3\xA4", "\xE5" => "\xC3\xA5", "\xE6" => "\xC3\xA6", "\xE7" => "\xC3\xA7", "\xE8" => "\xC3\xA8", "\xE9" => "\xC3\xA9", "\xEA" => "\xC3\xAA", "\xEB" => "\xC3\xAB", "\xEC" => "\xC3\xAC", "\xED" => "\xC3\xAD", "\xEE" => "\xC3\xAE", "\xEF" => "\xC3\xAF", "\xF0" => "\xC3\xB0", "\xF1" => "\xC3\xB1", "\xF2" => "\xC3\xB2", "\xF3" => "\xC3\xB3", "\xF4" => "\xC3\xB4", "\xF5" => "\xC3\xB5", "\xF6" => "\xC3\xB6", "\xF7" => "\xC3\xB7", "\xF8" => "\xC3\xB8", "\xF9" => "\xC3\xB9", "\xFA" => "\xC3\xBA", "\xFB" => "\xC3\xBB", "\xFC" => "\xC3\xBC", "\xFD" => "\xC3\xBD", "\xFE" => "\xC3\xBE", "\xFF" => "\xC3\xBF");

		return strtr($string, $convert_table);
	}

	function change_encoding($data, $input, $output)
	{
		$input = SimplePie_Misc::encoding($input);
		$output = SimplePie_Misc::encoding($output);

		// We fail to fail on non US-ASCII bytes
		if ($input === 'US-ASCII')
		{
			static $non_ascii_octects = '';
			if (!$non_ascii_octects)
			{
				for ($i = 0x80; $i <= 0xFF; $i++)
				{
					$non_ascii_octects .= chr($i);
				}
			}
			$data = substr($data, 0, strcspn($data, $non_ascii_octects));
		}

		// This is first, as behaviour of this is completely predictable
		if ($input === 'windows-1252' && $output === 'UTF-8')
		{
			return SimplePie_Misc::windows_1252_to_utf8($data);
		}
		// This is second, as behaviour of this varies only with PHP version (the middle part of this expression checks the encoding is supported).
		elseif (function_exists('mb_convert_encoding') && @mb_convert_encoding("\x80", 'UTF-16BE', $input) !== "\x00\x80" && ($return = @mb_convert_encoding($data, $output, $input)))
		{
			return $return;
		}
		// This is last, as behaviour of this varies with OS userland and PHP version
		elseif (function_exists('iconv') && ($return = @iconv($input, $output, $data)))
		{
			return $return;
		}
		// If we can't do anything, just fail
		else
		{
			return false;
		}
	}

	function encoding($charset)
	{
		// Normalization from UTS #22
		switch (strtolower(preg_replace('/(?:[^a-zA-Z0-9]+|([^0-9])0+)/', '\1', $charset)))
		{
			case 'adobestandardencoding':
			case 'csadobestandardencoding':
				return 'Adobe-Standard-Encoding';

			case 'adobesymbolencoding':
			case 'cshppsmath':
				return 'Adobe-Symbol-Encoding';

			case 'ami1251':
			case 'amiga1251':
				r