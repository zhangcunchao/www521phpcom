<?php
/** Plugin Author **/
$lc_author = 'liucheng.name';
$lc_authorurl = 'http://liucheng.name/';
$lc_plugin = 'Baidu Sitemap Generator';
$lc_pluginversion = '1.31';
$lc_pluginurl = 'http://liucheng.name/883/';

/**  End **/

/*
*@author arnee
*google-sitemap-generator
*/
#region PHP5 compat functions
if (!function_exists('file_get_contents')) {
	/**
	 * Replace file_get_contents()
	 *
	 * @category    PHP
	 * @package     PHP_Compat
	 * @link        http://php.net/function.file_get_contents
	 * @author      Aidan Lister <aidan - php - net>
	 * @version     $Revision: 1.21 $
	 * @internal    resource_context is not supported
	 * @since       PHP 5
	 */
	function file_get_contents($filename, $incpath = false, $resource_context = null) {
		if (false === $fh = fopen($filename, 'rb', $incpath)) {
			user_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
			return false;
		}
		
		clearstatcache();
		if ($fsize = @filesize($filename)) {
			$data = fread($fh, $fsize);
		} else {
			$data = '';
			while (!feof($fh)) {
				$data .= fread($fh, 8192);
			}
		}
		
		fclose($fh);
		return $data;
	}
}


if(!function_exists('file_put_contents')) {
	
	if (!defined('FILE_USE_INCLUDE_PATH')) {
		define('FILE_USE_INCLUDE_PATH', 1);
	}
	
	if (!defined('LOCK_EX')) {
		define('LOCK_EX', 2);
	}
	
	if (!defined('FILE_APPEND')) {
		define('FILE_APPEND', 8);
	}
	
	
	/**
	 * Replace file_put_contents()
	 *
	 * @category    PHP
	 * @package     PHP_Compat
	 * @link        http://php.net/function.file_put_contents
	 * @author      Aidan Lister <aidan - php - net>
	 * @version     $Revision: 1.25 $
	 * @internal    resource_context is not supported
	 * @since       PHP 5
	 * @require     PHP 4.0.0 (user_error)
	 */
	function file_put_contents($filename, $content, $flags = null, $resource_context = null) {
		// If $content is an array, convert it to a string
		if (is_array($content)) {
			$content = implode('', $content);
		}
		
		// If we don't have a string, throw an error
		if (!is_scalar($content)) {
			user_error('file_put_contents() The 2nd parameter should be either a string or an array',E_USER_WARNING);
			return false;
		}
		
		// Get the length of data to write
		$length = strlen($content);
		
		// Check what mode we are using
		$mode = ($flags & FILE_APPEND)?'a':'wb';
		
		// Check if we're using the include path
		$use_inc_path = ($flags & FILE_USE_INCLUDE_PATH)?true:false;
		
		// Open the file for writing
		if (($fh = @fopen($filename, $mode, $use_inc_path)) === false) {
			user_error('file_put_contents() failed to open stream: Permission denied',E_USER_WARNING);
			return false;
		}
		
		// Attempt to get an exclusive lock
		$use_lock = ($flags & LOCK_EX) ? true : false ;
		if ($use_lock === true) {
			if (!flock($fh, LOCK_EX)) {
				return false;
			}
		}
		
		// Write to the file
		$bytes = 0;
		if (($bytes = @fwrite($fh, $content)) === false) {
			$errormsg = sprintf('file_put_contents() Failed to write %d bytes to %s',$length,$filename);
			user_error($errormsg, E_USER_WARNING);
			return false;
		}
		
		// Close the handle
		@fclose($fh);
		
		// Check all the data was written
		if ($bytes != $length) {
			$errormsg = sprintf('file_put_contents() Only %d of %d bytes written, possibly out of free disk space.',$bytes,$length);
			user_error($errormsg, E_USER_WARNING);
			return false;
		}
		
		// Return length
		return $bytes;
	}
	
}
#endregion


/*
*@author arnee
*google-sitemap-generator
*/
function GetHomePath() {
	
	$res="";
	//Check if we are in the admin area -> get_home_path() is avaiable
	if(function_exists("get_home_path")) {
		$res = get_home_path();
	} else {
		//get_home_path() is not available, but we can't include the admin
		//libraries because many plugins check for the "check_admin_referer"
		//function to detect if you are on an admin page. So we have to copy
		//the get_home_path function in our own...
		$home = get_option( 'home' );
		if ( $home != '' && $home != get_option( 'siteurl' ) ) {
			$home_path = parse_url( $home );
			$home_path = $home_path['path'];
			$root = str_replace( $_SERVER["PHP_SELF"], '', $_SERVER["SCRIPT_FILENAME"] );
			$home_path = trailingslashit( $root.$home_path );
		} else {
			$home_path = ABSPATH;
		}

		$res = $home_path;
	}
	return $res;
}

function xml_file_exist() {
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	if(!empty($get_baidu_sitemap_options)) {
		list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat) = explode("|",$get_baidu_sitemap_options);
	}
	$fileName = GetHomePath();
	$filename = $fileName.'sitemap_baidu.xml';
	echo '<div class="tool-box">';
	echo '<h3 class="title">';
	_e('XML File Status','baidu_sitemap');
	print '</h3>';
    if(file_exists($filename)){
		//$filctime=date("Y-m-d H:i:s",filectime("$filename")); 
		$filemtime=date("Y-m-d H:i:s",filemtime("$filename")); 
		//$fileatime=date("Y-m-d H:i:s",fileatime("$filename")); 
		echo "<p>";
		_e('When you change Path of the XML file(Better not). please use 301 redirect to the new XML-file, or setting as 404 page.','baidu_sitemap');
		echo "</p>";
		echo '<p>'; _e('Check XML-sitemap File: ','baidu_sitemap'); echo '<a href="'.$lc_blog_url.'/sitemap_baidu.xml'.'" target="_blank">'.$lc_blog_url.'/sitemap_baidu.xml'.'</a></p>';
		echo '<p>'; _e('Last updated: ','baidu_sitemap'); print $filemtime.'</p>';
		echo '<p>'; _e('You can add a link in Homepage or Anywhere you want. Make sure Robots can visit the XML.','baidu_sitemap'); print '</p>';
		echo '<p>'; _e('Pay your attention: One site one sitemap_baidu.xml.','baidu_sitemap'); echo '<a href="http://liucheng.name/884/" target="_blank">';_e('Learn More','baidu_sitemap'); echo '</a>'; print '</p>';
	}else{
		_e('Baidu Sitemap File is not Exist, please Write a normal XML file.','baidu_sitemap');
	}
	$sitemap_html = GetHomePath().'sitemap.html'; if(file_exists($sitemap_html)) { echo '<p>'; _e('Check SiteMap Html: ','baidu_sitemap'); echo '<a href="'.$lc_blog_url.'/sitemap.html'.'" target="_blank">'.$lc_blog_url.'/sitemap.html'.'</a></p>'; echo '<p>'; _e('Also add a link in Homepage or Anywhere you want. ','baidu_sitemap'); print '</p>'; }
	echo '</div>';
}

function baidu_sitemap_is_auto() {
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	if(!empty($get_baidu_sitemap_options)){
		list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat) = explode("|",$get_baidu_sitemap_options);
		$lc_updatePeri = $lc_updatePeri*60*60;
		//echo $updatePeri;
	    if($lc_sitemap_auto=='1'){ 

			wp_schedule_single_event(time()+$lc_updatePeri, 'do_this_auto'); 
			add_action('do_this_auto','build_baidu_sitemap',2,0); 
			}
	}
}


/*
*@author arnee
*google-sitemap-generator
*/
function EscapeXML($string) {
	return str_replace ( array ( '&', '"', "'", '<', '>'), array ( '&amp;' , '&quot;', '&apos;' , '&lt;' , '&gt;'), $string);
}


/**
 * Checks if a file is writable and tries to make it if not.
 *
 * @since 3.05b
 * @access private
 * @author  VJTD3 <http://www.VJTD3.com>
 * @return bool true if writable
 */
function IsFileWritable($filename) {
	//can we write?
	if(!is_writable($filename)) {
		//no we can't.
		if(!@chmod($filename, 0666)) {
			$pathtofilename = dirname($filename);
			//Lets check if parent directory is writable.
			if(!is_writable($pathtofilename)) {
				//it's not writeable too.
				if(!@chmod($pathtoffilename, 0666)) {
					//darn couldn't fix up parrent directory this hosting is foobar.
					//Lets error because of the permissions problems.
					return false;
				}
			}
		}
	}
	//we can write, return 1/true/happy dance.
	return true;
}


/*
*
*Un-quotes quoted string\
*/
if (!function_exists('stripslashes_deep')) {
	function stripslashes_deep($value)
	{
		$value = is_array($value) ?
					array_map('stripslashes_deep', $value) :
					stripslashes($value);

		return $value;
	}
}


/**
 * Returns the path to the directory where the plugin file is located
 * @since 3.0b5
 * @access private
 * @author Arne Brachhold
 * @return string The path to the plugin directory
 */
function GetPluginPath() {
	$path = dirname(__FILE__);
	return trailingslashit(str_replace("\\","/",$path));
}


/**
 * Returns the URL to the directory where the plugin file is located
 * @since 3.0b5
 * @access private
 * @author Arne Brachhold
 * @return string The URL to the plugin directory
 */
function GetPluginUrl() {
	
	//Try to use WP API if possible, introduced in WP 2.6
	if (function_exists('plugins_url')) return trailingslashit(plugins_url(basename(dirname(__FILE__))));
	
	//Try to find manually... can't work if wp-content was renamed or is redirected
	$path = dirname(__FILE__);
	$path = str_replace("\\","/",$path);
	$path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path,strpos($path,"wp-content/")));
	return $path;
}


/**
*Loading language file...
*load_plugin_textdomain('baidu_sitemap');
*@author Arne Brachhold
*/
function load_baidu_language() {
	//if(!$this->_initiated) {
		
		//Loading language file...
		//load_plugin_textdomain('baidu_sitemap');
		//Hmm, doesn't work if the plugin file has its own directory.
		//Let's make it our way... load_plugin_textdomain() searches only in the wp-content/plugins dir.
		$currentLocale = get_locale();
		if(!empty($currentLocale)) {
			$moFile = dirname(__FILE__) . "/lang/baidu_sitemap-" . $currentLocale . ".mo";
			if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('baidu_sitemap', $moFile);
		}
}


function xml_annotate() {
    global $lc_author, $lc_authorurl, $lc_plugin, $lc_pluginversion, $lc_pluginurl, $wp_version;
	$blogtime = current_time('mysql'); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
	$xml_author_annotate = '<!-- generator="wordpress/'.$wp_version.'" -->'."\n".'<!-- baidu-sitemap-generator-url="'.$lc_authorurl.'" baidu-sitemap-generator-version="'.$lc_pluginversion.'" -->'."\n".'<!-- generated-on="'."$today_year-$today_month-$today_day $hour:$minute:$second".'" -->'."\n";
    return $xml_author_annotate;
}

function lc_sidebar() {
	    global $lc_author, $lc_authorurl, $lc_plugin, $lc_pluginversion, $lc_pluginurl;
		?>
		<style type="text/css">
				
		a.lc_button {
			padding:4px;
			display:block;
			padding-left:25px;
			background-repeat:no-repeat;
			background-position:5px 50%;
			text-decoration:none;
			border:none;
		}
		
		a.lc_button:hover {
			border-bottom-width:1px;
		}

		a.lc_donatePayPal {
			background-image:url(<?php echo GetPluginUrl(); ?>img/icon-paypal.gif);
		}
		
		a.lc_donateFavorite {
			background-image:url(<?php echo GetPluginUrl(); ?>img/favorite_icon.png);
		}
		
		a.lc_pluginHome {
			background-image:url(<?php echo GetPluginUrl(); ?>img/liucheng_name16.png);
		}
		
		a.lc_pluginList {
			background-image:url(<?php echo GetPluginUrl(); ?>img/icon-email.gif);
		}
		
		a.lc_pluginBugs {
			background-image:url(<?php echo GetPluginUrl(); ?>img/rss_icon.png);
		}
		
		a.lc_resBaidu {
			background-image:url(<?php echo GetPluginUrl(); ?>img/baidu.png);
		}
		
		a.lc_resRss {
			background-image:url(<?php echo GetPluginUrl(); ?>img/rss_icon.png);
		}
		
		a.lc_resWordpress {
			background-image:url(<?php echo GetPluginUrl(); ?>img/wordpress_icon2.png);
		}
		
		</style>

		<div class="postbox-container" style="width:2%;">
		</div>
		<div class="postbox-container" style="width:21%;">
			<div class="metabox-holder">	
				<div class="meta-box-sortables">			

	     <div id="lc_smres" class="postbox">
			<h3 class="hndle"><span ><?php _e('About Baidu-Sitemap:','baidu_sitemap');?></span></h3>
			  <div class="inside">
			            <a class="lc_button lc_pluginHome" href="<?php echo $lc_authorurl;?>"><?php _e('zhenglc(Author Homepage)','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="<?php echo $lc_pluginurl;?>"><?php _e('Plugin Homepage','baidu_sitemap');?></a>
                        <a class="lc_button lc_resBaidu" href="http://liucheng.name/876/"><?php _e('Baidu-Sitemap Protocol','baidu_sitemap');?></a>
						<a class="lc_button lc_resRss" href="http://liucheng.name/884/"><?php _e('FAQ','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginBugs" href="<?php echo $lc_pluginurl;?>"><?php _e('Report a Bug','baidu_sitemap');?></a>
						<a class="lc_button lc_donateFavorite" href="<?php echo $lc_pluginurl;?>"><?php _e('Suggest a Feature','baidu_sitemap');?></a>
				</div>
			</div>

	     <div id="lc_smres" class="postbox">
			<h3 class="hndle"><span ><?php _e('Donations: ','baidu_sitemap');?></span></h3>
			  <div class="inside">
			            <a class="lc_button lc_resWordpress" href="<?php echo $lc_pluginurl;?>"><?php _e('Not yet. you would be the first!','baidu_sitemap');?></a>
				</div>
			</div>

	     <div id="lc_smres" class="postbox">
			<h3 class="hndle"><span ><?php _e('Multi-Language Support: ','baidu_sitemap');?></span></h3>
			  <div class="inside">
			            <a class="lc_button lc_resRss" href="<?php echo $lc_pluginurl;?>"><?php _e('English','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="<?php echo $lc_pluginurl;?>"><?php _e('Simplified Chinese','baidu_sitemap');?></a>
                        <a class="lc_button lc_resRss" href="<?php echo $lc_pluginurl;?>"><?php _e('Traditional Chinese','baidu_sitemap');?></a>
						<a class="lc_button lc_resRss" href="<?php echo $lc_pluginurl;?>"><?php _e('Japanese','baidu_sitemap');?></a>
						<a class="lc_button lc_resRss" href="<?php echo $lc_pluginurl;?>"><?php _e('Korean','baidu_sitemap');?></a>
				</div>
			</div>

	     <div id="lc_smres" class="postbox">
			<h3 class="hndle"><span ><?php _e('My Other Plugin:','baidu_sitemap');?></span></h3>
			  <div class="inside">
			            <a class="lc_button lc_pluginHome" href="<?php echo $lc_pluginurl;?>"><?php _e('Baidu-Sitemap','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="http://liucheng.name/789/"><?php _e('WP KeywordLink','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="http://liucheng.name/947/"><?php _e('Lc.Archivers','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="http://liucheng.name/1256/"><?php _e('wp-today','baidu_sitemap');?></a>
						<a class="lc_button lc_pluginHome" href="http://liucheng.name/1166/"><?php _e('wp-christmas','baidu_sitemap');?></a>
				</div>
			</div>

			</div>
			</div>
			</div>
		<?php
}


function rebuild_message() {
				if(function_exists("wp_next_scheduled")) {
					$next = wp_next_scheduled('do_this_auto');
					if($next) {
						$diff = (time()-$next)*-1;
						if($diff <= 0) {
							$diffMsg = __('Your sitemap is being refreshed at the moment. Depending on your Post Count this might take some time!','baidu_sitemap');
						} else {
							$diffMsg = str_replace("%s",$diff,__('Your sitemap will be refreshed in %s seconds!','baidu_sitemap'));
						}

					}else{
							$diffMsg = __('Donot activate the Auto build the sitema options, you need build the XML file by yourself.','baidu_sitemap');
					}
					echo "<strong><p>$diffMsg</p></strong>";	
				}
}
function Lc_advanced_options() {
	global $lc_author, $lc_authorurl, $lc_plugin, $lc_pluginversion, $lc_pluginurl;
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	if(!empty($get_baidu_sitemap_options)){ list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post) = explode("|",$get_baidu_sitemap_options); }
	$lc_pickcats_array = explode(";",$lc_pickcats);
	?>
	<tr><td><label for="advanced_options"><h3><?php _e('Advanced Options','baidu_sitemap');?></h3></label></td></tr>
		<tr><td><label for="lc_order"><?php _e('Post Order','baidu_sitemap');?></label></td><td>
		<select name="lc_order_1">
		<option value="post_date" <?php if(empty($get_baidu_sitemap_options) || $lc_order_1=='post_date'){ echo 'selected'; } ?> ><?php _e('Post_Date','baidu_sitemap');?></option>
		<option value="post_modified" <?php if($lc_order_1=='post_modified'){ echo 'selected'; } ?> ><?php _e('Modified_Date','baidu_sitemap');?></option>
		<option value="comment_date" <?php if($lc_order_1=='comment_date'){ echo 'selected'; } ?> ><?php _e('Comment_Date','baidu_sitemap');?></option>
		</select>
		>
		<select name="lc_order_2">
		<option value="post_date" <?php if($lc_order_2=='post_date'){ echo 'selected'; } ?> ><?php _e('Post_Date','baidu_sitemap');?></option>
		<option value="post_modified" <?php if(empty($get_baidu_sitemap_options) || $lc_order_2=='post_modified'){ echo 'selected'; } ?> ><?php _e('Modified_Date','baidu_sitemap');?></option>
		<option value="comment_date" <?php if($lc_order_2=='comment_date'){ echo 'selected'; } ?> ><?php _e('Comment_Date','baidu_sitemap');?></option>
		</select>
		>
		<select name="lc_order_3">
		<option value="post_date" <?php if($lc_order_3=='post_date'){ echo 'selected'; } ?> ><?php _e('Post_Date','baidu_sitemap');?></option>
		<option value="post_modified" <?php if($lc_order_3=='post_modified'){ echo 'selected'; } ?> ><?php _e('Modified_Date','baidu_sitemap');?></option>
		<option value="comment_date" <?php if(empty($get_baidu_sitemap_options) || $lc_order_3=='comment_date'){ echo 'selected'; } ?> ><?php _e('Comment_Date','baidu_sitemap');?></option>
		</select></td><td> <a href="http://liucheng.name/884/"><?php _e('Learn More','baidu_sitemap');?></a><td></tr>
		<tr><td><label for="lc_comments"><?php _e('CommentCount/Date','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_comments" name="lc_comments" value="1" <?php if($lc_comments=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Add <bbs:lastDate> and <bbs:reply> label, not require','baidu_sitemap');?>">[?]</a><td></tr>
		<tr><td><label for="lc_post_length"><?php _e('Post strlen(Unit/byte)','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_post_length" name="lc_post_length" value="1" <?php if($lc_post_length=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Add <bbs:mainLen> label, not requir','baidu_sitemap');?>">[?]</a><td></tr>
		<tr><td><label for="lc_post_cat"><?php _e('Post Category','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_post_cat" name="lc_post_cat" value="1" <?php if($lc_post_cat=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Add <bbs:boardid> label, not requir','baidu_sitemap');?>">[?]</a><td></tr>
		<?php if(function_exists('the_views')){ ?>
		<tr><td><label for="lc_post_views"><?php _e('Post Views','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_post_views" name="lc_post_views" value="1" <?php if($lc_post_views=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('I love wp-PostViews Plugin. You the add a new label <bbs:hit>. Not requir','baidu_sitemap');?>">[?]</a><td></tr>
		<?php } else { ?>
		<tr><td><label for="lc_post_views"><?php _e('Post Views','baidu_sitemap');?></label></td><td><?php _e('This option can not add.','baidu_sitemap');?></td><td><a title="<?php _e('Sorry, wp-PostViews not start-up. No Post Views.','baidu_sitemap');?>">[?]</a><td></tr>
		<?php } ?>
		<tr><td><label for="lc_post_pick"><?php _e('Popular Post','baidu_sitemap');?></label></td><td><cite style="display:block;"><?php _e("Depend on Post Categories or Comments Count or Post Views","baidu_sitemap"); ?></cite><div style="border-color:#CEE1EF; border-style:solid; border-width:2px; height:6em; width:24em; overflow:auto; padding:0.5em 0.5em;"><ul><?php wp_category_checklist(0,0,$lc_pickcats_array,false); ?><li><label for="lc_comments_count"><?php _e('Comments Count, More than','baidu_sitemap');?></label><input type="text" size="20" maxlength="20" name="lc_comments_count"  value="<?php if(empty($lc_comments_count)) { } else { echo $lc_comments_count; }?>" /></li>
		<?php if(function_exists('the_views')) { ?>
		<li><label for="lc_views_count"><?php _e('Post Views, More than','baidu_sitemap');?></label><input type="text" size="20" maxlength="20" name="lc_views_count"  value="<?php if(empty($lc_views_count)) { } else { echo $lc_views_count; }?>" /></li>
		<?php } else { ?>
		<li><label for="lc_views_count"><?php _e('Post Views, More than','baidu_sitemap');?></label><cite><?php _e('wp-PostViews not start-up','baidu_sitemap');?></cite></li>
		<?php } ?>
		</ul></td><td><a title="<?php _e('Popular Post, Add <bbs:pick> label. Not requir','baidu_sitemap');?>">[?]</a><td></tr>
	<?php
}

function Lc_expand_option() {
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	if(!empty($get_baidu_sitemap_options)){ list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post) = explode("|",$get_baidu_sitemap_options); }
	?>
		<tr><td><label for="expand_options"><h3><?php _e('Expand Options','baidu_sitemap');?></h3></label></td></tr>
		<tr><td><label for="lc_sitemap_html"><?php _e('Static Sitemap-Page','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_sitemap_html" name="lc_sitemap_html" value="1" <?php if($lc_sitemap_html=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Also Build a real Static Sitemap-Page for all Search Engine.','baidu_sitemap');?>">[?]</a><td></tr>
		<!--<tr><td><label for="lc_sitemap_publish_post"><?php _e('publish post','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_sitemap_publish_post" name="lc_sitemap_publish_post" value="1" <?php if($lc_sitemap_publish_post=='1'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Update sitemap xml & html when publish a post.','baidu_sitemap');?>">[?]</a><td></tr>-->
        <tr><td><label for="lc_support"><?php _e('Support Author','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_support" name="lc_support" value="yes" <?php if($lc_support=='yes'){ echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('在wp_footer添加liucheng.name的链接。谢谢！','baidu_sitemap');?>">[?]</a><td></tr>
		<tr><td><label for="lc_baidu_sitemap_by_post"><?php _e('Auto when publish post','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_baidu_sitemap_by_post" name="lc_baidu_sitemap_by_post" value="1" <?php if($lc_baidu_sitemap_by_post=='1'){ echo 'checked="checked"'; } ?> /></td></tr>
	<?php }
?>