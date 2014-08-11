<?php

/*
Plugin Name:Baidu Sitemap Generator
Plugin URI: http://liucheng.name/883/
Description: This pulgin generates a Baidu XML-Sitemap for WordPress Blog. Also Build a real Static Sitemap-Page for all Search Engine. | 生成百度 Sitemap XML 文件。就相当于网站被百度--全球最大的中文搜索引擎订阅，进而为您的网站带来潜在的流量。同时生成一个静态的站点地图页面，对所有的搜索引擎都有利。
Author: 柳城
Version: 1.43
Author URI: http://liucheng.name/
*/


/** define the field name of database **/
define('NEW_BAIDU_SITEMAP_OPTION','new_baidu_sitemapoption');


require_once("sitemap-function.php");

/** add a Menu,like "Baidu Sitemap" **/
function baidu_sitemap_menu() {
   /** Add a page to the options section of the website **/
   if (current_user_can('manage_options')) 				
 		add_options_page("Baidu-Sitemap","Baidu-Sitemap", 8, __FILE__, 'baidu_sitemap_optionpage');
}

/** custom message **/
function baidu_sitemap_topbarmessage($msg) {
	 echo '<div class="updated fade" id="message"><p>' . $msg . '</p></div>';
}

function get_baidu_sitemap_options(){
	$array_baidu_sitemap_options = array();
	$get_baidu_sitemap_options = get_option(NEW_BAIDU_SITEMAP_OPTION);
	if( $get_baidu_sitemap_options ){
		list( $array_baidu_sitemap_options['lc_is_Enabled_XML_Sitemap'], $array_baidu_sitemap_options['lc_is_Enabled_Html_Sitemap'], $array_baidu_sitemap_options['lc_is_update_sitemap_when_post'], $array_baidu_sitemap_options['lc_post_limit1000'], $array_baidu_sitemap_options['lc_is_ping'] ) = explode("|",$get_baidu_sitemap_options);
	}else{
		if( !$array_baidu_sitemap_options['lc_is_Enabled_XML_Sitemap'] ){ $array_baidu_sitemap_options['lc_is_Enabled_XML_Sitemap'] = 1; }
		if( !$array_baidu_sitemap_options['lc_is_update_sitemap_when_post'] ){ $array_baidu_sitemap_options['lc_is_update_sitemap_when_post'] = 1; }
		if( !$array_baidu_sitemap_options['lc_post_limit1000'] ){ $array_baidu_sitemap_options['lc_post_limit1000'] = 1; }
	}
	return $array_baidu_sitemap_options;
}

/** Baidu sitemap page **/
function baidu_sitemap_form() {
	$array_baidu_sitemap_options = get_baidu_sitemap_options();
	?>
		<div class="postbox-container" style="width:75%;">
		<div class="metabox-holder">
		<div class="meta-box-sortables">	
						
		<div class="tool-box">
			<h3 class="title"><?php _e('Preferences','baidu_sitemap');?></h3>
			<p><?php _e('Parameter setting for Baidu Sitemap Generator Plugin. ','baidu_sitemap');?></p>
			<a name="baidu_sitemap_options"></a><form name="baidu_sitemap_options" method="post" action="">
			<input type="hidden" name="action" value="build_options" />
			<table>
				<tr><td><h3><?php _e('General Options','baidu_sitemap');?></h3></td></tr>
				<tr><td><?php _e('Enabled XML Sitemap','baidu_sitemap');?></td><td><input type="checkbox" name="lc_is_Enabled_XML_Sitemap" value="1" <?php if( $array_baidu_sitemap_options['lc_is_Enabled_XML_Sitemap'] ) { echo 'checked="checked"'; } ?> /></td></tr>
				<tr><td><?php _e('Enabled Html Sitemap','baidu_sitemap');?></td><td><input type="checkbox" name="lc_is_Enabled_Html_Sitemap" value="1" <?php if( $array_baidu_sitemap_options['lc_is_Enabled_Html_Sitemap'] ) { echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('Also Build a real Static Sitemap-Page for all Search Engine.','baidu_sitemap');?>">[?]</a><td></tr>
				<tr><td><?php _e('Update Sitemap when Publish Post','baidu_sitemap');?></td><td><input type="checkbox" name="lc_is_update_sitemap_when_post" value="1" <?php if( $array_baidu_sitemap_options['lc_is_update_sitemap_when_post'] ) { echo 'checked="checked"'; } ?> /></td></tr>
				<tr><td><?php _e('Post Limit 1000','baidu_sitemap');?></td><td><input type="checkbox" name="lc_post_limit1000" value="1" <?php if( $array_baidu_sitemap_options['lc_post_limit1000'] ) { echo 'checked="checked"'; } ?> /></td><td><a title="<?php _e('XML file just need include the Recent Post and Update Post. Needs much more memory if increase the Post Count.','baidu_sitemap');?>">[?]</a><td></tr>
			</table>
			<p class="submit"><input type="submit" class="button-primary" /></p>
			</form>
		</div>


		<div class="tool-box">
		<h3 class="title"><?php _e('Write a XML file','baidu_sitemap');?></h3>
				<form name="baidu_sitemap_build" method="post" action="">
				<input type="hidden" name="action" value="build_xml" />
				<p class="submit"><input type="submit" class="button-primary" value="Update XML file" /></p>
				</form>
		</div>


			<?php
			/** show the XML file if exist **/ 
			xml_file_exist();

			/** Show others information **/
			lc_text();
			?>
		</div>
		</div>
		</div>
	<?php
}


/** Baidu sitemap page **/
function baidu_sitemap_optionpage()
{
      /** Perform any action **/
		if(isset($_POST["action"])) {
			if ($_POST["action"]=='build_options') {update_baidu_sitemap_options(); }
		    if ($_POST["action"]=='build_xml') { build_baidu_sitemap();}
		}
		
		/** Definition **/
      echo '<div class="wrap"><div style="background: url('.GetPluginUrl().'img/liucheng_name32.png) no-repeat;" class="icon32"><br /></div>';
		echo '<h2>Baidu Sitemap Generator</h2>';

		/** Introduction **/ 
		echo '<p>'. _e('This pulgin generates a Baidu XML-Sitemap for WordPress Blog. Also Build a real Static Sitemap-Page for all Search Engine.','baidu_sitemap') .'</p>';

		
		/** show the option Form **/ 
		baidu_sitemap_form();
		//test_form();

		/** Show the plugins Author **/
		lc_sidebar();
	
        
		//echo '</div>';
}

/** update the options **/
function update_baidu_sitemap_options() {
	if ($_POST['action']=='build_options'){
		$lc_is_Enabled_XML_Sitemap = $_POST['lc_is_Enabled_XML_Sitemap'];
		if(!$lc_is_Enabled_XML_Sitemap){ $lc_is_Enabled_XML_Sitemap = 0; }
		$lc_is_Enabled_Html_Sitemap = $_POST['lc_is_Enabled_Html_Sitemap'];
		if(!$lc_is_Enabled_Html_Sitemap){ $lc_is_Enabled_Html_Sitemap = 0; }
		$lc_is_update_sitemap_when_post = $_POST['lc_is_update_sitemap_when_post'];
		if(!$lc_is_update_sitemap_when_post){ $lc_is_update_sitemap_when_post = 0; }
		$lc_post_limit1000 = $_POST['lc_post_limit1000'];
		if(!$lc_post_limit1000){ $lc_post_limit1000 = 0; }
		$baidu_sitemap_options = implode('|',array($lc_is_Enabled_XML_Sitemap, $lc_is_Enabled_Html_Sitemap, $lc_is_update_sitemap_when_post, $lc_post_limit1000));
		update_option(NEW_BAIDU_SITEMAP_OPTION,$baidu_sitemap_options); 
        baidu_sitemap_topbarmessage(__('Congratulate, Update options success','baidu_sitemap'));
	}
}


/** build the XML file, sitemap_baidu.xml **/
function build_baidu_sitemap() {
    global $wpdb, $posts;
	$array_baidu_sitemap_options = get_baidu_sitemap_options();
	if($array_baidu_sitemap_options['lc_post_limit1000']){ $lc_limit = '1000'; } else { $lc_limit = '10000'; }

    ## $lc_contents , $lc_limit = '1000'
	$sql_mini = "select ID,post_modified_gmt,post_date_gmt,post_type FROM $wpdb->posts
	        WHERE post_password = ''
			AND (post_type != 'revision' AND post_type != 'attachment' AND post_type != 'nav_menu_item')
			AND post_status = 'publish'
			ORDER BY post_modified_gmt DESC
			LIMIT 0,$lc_limit
	       ";
	$recentposts_mini = $wpdb->get_results($sql_mini);
	if($recentposts_mini){
		foreach ($recentposts_mini as $post){
			if( $post->post_type == 'page' ){
				$loc = get_page_link($post->ID);
				if($post->post_modified_gmt == '0000-00-00 00:00:00'){ $post_date_gmt = $post->post_date_gmt; } else { $post_date_gmt = $post->post_modified_gmt; } 
				$lastmod = date("Y-m-d\TH:i:s+00:00",LCZ_GetTimestampFromMySql($post_date_gmt));
				$changefreq = 'weekly';
				$priority = '0.3';
				$xml_contents_page .= "<url>";
				$xml_contents_page .= "<loc>$loc</loc>";
				$xml_contents_page .= "<lastmod>$lastmod</lastmod>";
				$xml_contents_page .= "<changefreq>$changefreq</changefreq>";
				$xml_contents_page .= "<priority>$priority</priority>";
				$xml_contents_page .= "</url>";
			}else{
				$loc = get_permalink($post->ID);
				if($post->post_modified_gmt == '0000-00-00 00:00:00'){ $post_date_gmt = $post->post_date_gmt; } else { $post_date_gmt = $post->post_modified_gmt; } 
				$lastmod = date("Y-m-d\TH:i:s+00:00",LCZ_GetTimestampFromMySql($post_date_gmt));
				$changefreq = 'monthly';
				$priority = '0.6';
				$xml_contents_post .= "<url>";
				$xml_contents_post .= "<loc>$loc</loc>";
				$xml_contents_post .= "<lastmod>$lastmod</lastmod>";
				$xml_contents_post .= "<changefreq>$changefreq</changefreq>";
				$xml_contents_post .= "<priority>$priority</priority>";
				$xml_contents_post .= "</url>";
			}
		}
		## get_category_link
		$category_ids = get_all_category_ids();
		foreach($category_ids as $cat_id) {
			$loc = get_category_link($cat_id);
			$lastmod = date("Y-m-d\TH:i:s+00:00",current_time('timestamp', '1'));
			$changefreq = 'Weekly';
			$priority = '0.3';
			$xml_contents_cat .= "<url>";
			$xml_contents_cat .= "<loc>$loc</loc>";
			$xml_contents_cat .= "<lastmod>$lastmod</lastmod>";
			$xml_contents_cat .= "<changefreq>$changefreq</changefreq>";
			$xml_contents_cat .= "<priority>$priority</priority>";
			$xml_contents_cat .= "</url>";
		}
		##
		$xml_contents = $xml_contents_post.$xml_contents_page.$xml_contents_cat;
	}


	## XML
	if($array_baidu_sitemap_options[lc_is_Enabled_XML_Sitemap]){
		build_baidu_sitemap_xml($xml_contents);
	}
	## Html
	if($array_baidu_sitemap_options[lc_is_Enabled_Html_Sitemap]){
		build_baidu_sitemap_html();
	}


	if(function_exists('wp_clear_scheduled_hook')) { wp_clear_scheduled_hook('do_baidu_sitemap_by_post'); }
    //baidu_sitemap_is_auto_daily(); 
}
function build_baidu_sitemap_xml($xml_contents){
	$lc_blog_url = home_url();
	$blogtime = current_time('timestamp', '1');
	$lc_blog_time = date("Y-m-d\TH:i:s+00:00",$blogtime);

	$xml_begin = '<?xml version="1.0" encoding="UTF-8"?>'.xml_annotate().'<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	$xml_home = "<url><loc>$lc_blog_url</loc><lastmod>$lc_blog_time</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>";
	$xml_end = '</urlset>';
	if($xml_contents){
		$baidu_xml = $xml_begin.$xml_home.$xml_contents.$xml_end;

		/** save XML file as sitemap_baidu.xml **/
		$GetHomePath = GetHomePath();
		$filename = $GetHomePath.'sitemap_baidu.xml';
		if( IsFileWritable($GetHomePath) || IsFileWritable($filename) ){ 
			file_put_contents("$filename","$baidu_xml"); 
			@chmod($filename, 0777);
			/** Messages  **/
			baidu_sitemap_topbarmessage(__('Congratulate, Build the XML file success','baidu_sitemap'));
		}else{ 
			/** Messages  **/
			baidu_sitemap_topbarmessage(__('Directory is not writable. please chmod your directory to 777.','baidu_sitemap'));
		}
	}
}
function build_baidu_sitemap_html(){
	global $wpdb;

	/** Get the current time **/
	$blogtime = current_time('mysql'); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );

    ##文章
	$html_contents = '';
	$post = query_posts( 'ignore_sticky_posts=1&posts_per_page=1000' );
	while (have_posts()) : the_post();
	$html_contents .= '<li><a href="'.get_permalink().'" title="'.get_the_title().'" target="_blank">'.get_the_title().'</a></li>';
	endwhile;

	$html_category_contents = wp_list_categories('echo=0');
	$html_page_contents = wp_list_pages('echo=0');


	$blog_title = __('SiteMap','baidu_sitemap');
	$blog_name = get_bloginfo('name'); 
	$blog_keywords = $blog_title.','.$blog_name;
	$lc_generator = 'Baidu SiteMap Generator';
	$lc_author = 'www.521php.com';
	$lc_copyright = 'www.521php.com';
	$blog_home = get_bloginfo('url');
	$sitemap_url = get_bloginfo('url').'/sitemap.html';
	$recentpost = __('RecentPost','baidu_sitemap');
	$footnote = __('HomePage','baidu_sitemap');
	$updated_time = "$today_year-$today_month-$today_day $hour:$minute:$second";

	if($html_contents) { 
		$path_html  = GetPluginPath().'sitemap.html';
		$html = file_get_contents("$path_html");
		
		$html = str_replace("%blog_title%",$blog_title,$html);
		$html = str_replace("%blog_name%",$blog_name,$html);
		$html = str_replace("%blog_home%",$blog_home,$html);
		$html = str_replace("%blog_keywords%",$blog_keywords,$html);
		$html = str_replace("%lc_generator%",$lc_generator,$html);
		$html = str_replace("%lc_author%",$lc_author,$html);
		$html = str_replace("%lc_copyright%",$lc_copyright,$html);
		$html = str_replace("%sitemap_url%",$sitemap_url,$html);
		$html = str_replace("%footnote%",$footnote,$html);
		$html = str_replace("%RecentPost%",$recentpost,$html);
		$html = str_replace("%updated_time%",$updated_time,$html);
		$html = str_replace("%contents%",$html_contents,$html);
		$html = str_replace("%Lc_category_contents%",$html_category_contents,$html);
		$html = str_replace("%Lc_page_contents%",$html_page_contents,$html);
		$GetHomePath = GetHomePath();
		$filename_html = $GetHomePath.'sitemap.html';
		if( IsFileWritable($GetHomePath) || IsFileWritable($filename_html) ){ 
			file_put_contents("$filename_html","$html");
			@chmod($filename_html, 0777);
			/** Messages  **/
			/*baidu_sitemap_topbarmessage(__('Congratulate, Build the Html file success','baidu_sitemap'));*/
		}
	}
}
	

function lc_text(){
	?>
	<h3>PS:</h3>
	<p>提醒：百度的ping服务地址早就有了。可以把它加入ping服务列表，加快百度的收录速度。百度的ping服务地址：http://ping.baidu.com/ping/RPC2</p>
	<?php
}

## Auto
function baidu_sitemap_is_auto_daily() {
	$lc_updatePeri = $lc_updatePeri*60*60*24;
	wp_schedule_single_event(time()+$lc_updatePeri, 'do_this_auto_daily'); 
	add_action('do_this_auto_daily','build_baidu_sitemap',2,0); 
}

function baidu_sitemap_by_post($post_ID) {
	$get_baidu_sitemap_options = get_option(NEW_BAIDU_SITEMAP_OPTION);
	if($get_baidu_sitemap_options[lc_is_update_sitemap_when_post] == '1'){
		   wp_clear_scheduled_hook('do_baidu_sitemap_by_post');
		   wp_schedule_single_event(time()+30, 'do_baidu_sitemap_by_post'); 
	}
	return $post_ID;
}

add_action('publish_post', 'baidu_sitemap_by_post');
add_action('do_baidu_sitemap_by_post','build_baidu_sitemap',2,0); 

/** Tie the module into Wordpress **/
add_action('admin_menu','baidu_sitemap_menu');
add_action('init','baidu_sitemap_is_auto_daily',1001,0);
/** load the language file **/
add_filter('init','load_baidu_language');

//add_action('wp_footer','the_lc_support');
?>