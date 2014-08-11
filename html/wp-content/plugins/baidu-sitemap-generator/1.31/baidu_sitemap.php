<?php

/*
Plugin Name:Baidu Sitemap Generator
Plugin URI: http://liucheng.name/883/
Description: This pulgin generates a Baidu XML-Sitemap for WordPress Blog. Also Build a real Static Sitemap-Page for all Search Engine. | 生成百度 Sitemap XML 文件。就相当于网站被百度--全球最大的中文搜索引擎订阅，进而为您的网站带来潜在的流量。同时生成一个静态的站点地图页面，对所有的搜索引擎都有利。
Author: 柳城
Version: 1.31
Author URI: http://liucheng.name/


*/

//ob_start (); 
/** define the field name of database **/
define('BAIDU_SITEMAP_OPTION','baidu_sitemapoption');


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


/** Baidu sitemap page **/
function baidu_sitemap_form() {
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	//print_r($get_baidu_sitemap_options);
	if(empty($get_baidu_sitemap_options)){
		global $current_user;
		$lc_blog_url = get_bloginfo('url');
		get_currentuserinfo();
		$lc_admin_email = $current_user->user_email;
		$lc_updatePeri = "24";
		$lc_limits = "50";
	}else{
		list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post) = explode("|",$get_baidu_sitemap_options);
	}

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
				<tr><td><label for="advanced_options"><h3><?php _e('General Options','baidu_sitemap');?></h3></label></td></tr>
				<tr><td><label for="lc_blog_url"><?php _e('Blog Homepage','baidu_sitemap');?></label></td><td><input type="text" size="50" name="lc_blog_url" value="<?php echo $lc_blog_url;?>" /></td><td><a title="<?php _e('The end without / symbol','baidu_sitemap');?>">[?]</a><td></tr>
				<tr><td><label for="lc_admin_email"><?php _e('Manager Email','baidu_sitemap');?></label></td><td><input type="text" size="50" maxlength="200" name="lc_admin_email" value="<?php echo $lc_admin_email;?>" /></td><td><a title="<?php _e('Baidu will contact you use this Email if necessary','baidu_sitemap');?>">[?]</a><td></tr>
				<tr><td><label for="lc_updatePeri"><?php _e('Update Period(hour)','baidu_sitemap');?></label></td><td><input type="text" size="50" maxlength="200" name="lc_updatePeri"  value="<?php echo $lc_updatePeri;?>" /></td><td><a title="<?php _e('Updated in 24 hour is more suitable. Unless you publish a lot of post one day.','baidu_sitemap');?>">[?]</a><td></tr>
				<tr><td><label for="lc_limits"><?php _e('Post Count','baidu_sitemap');?></label></td><td><input type="text" size="50" maxlength="200" name="lc_limits"  value="<?php echo $lc_limits;?>" /></td><td><a title="<?php _e('XML file just need include the Recent Post and Update Post. Needs much more memory if increase the Post Count.','baidu_sitemap');?>">[?]</a><td></tr>
				<tr><td><label for="lc_sitemap_auto"><?php _e('Auto build the sitemap','baidu_sitemap');?></label></td><td><input type="checkbox" id="lc_sitemap_auto" name="lc_sitemap_auto" value="1" <?php if(empty($get_baidu_sitemap_options) || $lc_sitemap_auto=='1'){ echo 'checked="checked"'; } ?> /></td></tr>
				<?php Lc_advanced_options(); ?><?php Lc_expand_option(); ?>
			</table>
			<p class="submit"><input type="submit" class="button-primary" value="<?php if(empty($get_baidu_sitemap_options)){_e('Active the options first','baidu_sitemap');}else{_e('Update options','baidu_sitemap');} ?>" /></p>
			</form>
		</div>


		<div class="tool-box">
			<h3 class="title"><?php _e('Write a XML file','baidu_sitemap');?></h3>
			<p><?php _e('When active the options, you can create a XML file here. or Rebulid the sitemap file after update options or other else.','baidu_sitemap');?></p>
			<p><?php rebuild_message();?></p>
		    <?php if(!empty($get_baidu_sitemap_options)){ ?>
				<a name="baidu_sitemap_build"></a><form name="baidu_sitemap_build" method="post" action="">
				<input type="hidden" name="action" value="build_xml" />
				<p class="submit"><input type="submit" class="button-primary" value="<?php if(file_exists(GetHomePath().'sitemap_baidu.xml')) { _e('Update XML file','baidu_sitemap'); } else { _e('Write a XML file','baidu_sitemap'); } ?>" /></p>
				</form>
			<?php }else{ print '<p>'; _e('There is nothing to do, Please Active the options first.','baidu_sitemap'); print '</p>';} ?>

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
			if ($_POST["action"]=='build_options') {update_baidu_sitemap(); }
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
function update_baidu_sitemap() {
	if ($_POST['action']=='build_options'){
		$lc_blog_url = $_POST['lc_blog_url'];
		$lc_admin_email = $_POST['lc_admin_email'];
		$lc_updatePeri = $_POST['lc_updatePeri'];
		$lc_limits = $_POST['lc_limits'];
		$lc_sitemap_auto = $_POST['lc_sitemap_auto'];
		if(empty($lc_sitemap_auto)){ $lc_sitemap_auto = '0'; if(function_exists('wp_clear_scheduled_hook')) { wp_clear_scheduled_hook('do_this_auto'); } }
		$lc_order_1 = $_POST['lc_order_1'];
		$lc_order_2 = $_POST['lc_order_2'];
		$lc_order_3 = $_POST['lc_order_3'];
		$lc_comments = $_POST['lc_comments']; if(empty($lc_comments)) { $lc_comments ='0'; }
		$lc_post_length = $_POST['lc_post_length']; if(empty($lc_post_length)) { $lc_post_length ='0'; }
		$lc_post_cat = $_POST['lc_post_cat']; if(empty($lc_post_cat)) { $lc_post_cat ='0'; }
	if(isset($_POST['lc_post_views'])) {
		if(empty($_POST['lc_post_views'])) { $lc_post_views ='0'; } else { $lc_post_views = $_POST['lc_post_views']; }
		//echo $lc_post_views;
	} else { $lc_post_views ='0'; } 

	if(isset($_POST['post_category'])) {
		foreach((array) $_POST['post_category'] AS $vv) if(!empty($vv) && is_numeric($vv)) $lc_pickcats_array[] = intval($vv);
		//print_r($lc_pickcats_array);
        $lc_pickcats = implode(";", $lc_pickcats_array); 
	} else { $lc_pickcats = '0'; }
	//print $lc_pickcats;
	if(isset($_POST['lc_comments_count'])) {
		if(empty($_POST['lc_comments_count']) && !is_numeric($_POST['lc_comments_count'])) { $lc_comments_count ='0'; } else { $lc_comments_count = $_POST['lc_comments_count']; }
		//echo $lc_comments_count;
	}
	if(isset($_POST['lc_views_count'])) {
		if(empty($_POST['lc_views_count'])  && !is_numeric($_POST['lc_views_count'])) { $lc_views_count ='0'; } else { $lc_views_count = $_POST['lc_views_count']; }
		//echo $lc_views_count;
	} else { $lc_views_count ='0'; }
    if(isset($_POST['lc_sitemap_html'])) { if(empty($_POST['lc_sitemap_html'])) { $lc_sitemap_html = '0'; } else { $lc_sitemap_html = $_POST['lc_sitemap_html']; } }
	if(isset($_POST['lc_sitemap_publish_post'])) { if(!($_POST['lc_sitemap_publish_post'])) { $lc_sitemap_publish_post = '0'; } else { $lc_sitemap_publish_post = $_POST['lc_sitemap_publish_post']; } }
	$lc_support = $_POST['lc_support'];
	if(!$lc_support){ $lc_support = 'no'; }
	if(isset($_POST['lc_baidu_sitemap_by_post'])) { if(empty($_POST['lc_baidu_sitemap_by_post'])) { $lc_baidu_sitemap_by_post = '0'; } else { $lc_baidu_sitemap_by_post = $_POST['lc_baidu_sitemap_by_post']; } }

		$baidu_sitemap_options = implode('|',array($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post));
		update_option(BAIDU_SITEMAP_OPTION,$baidu_sitemap_options); 
        baidu_sitemap_topbarmessage(__('Congratulate, Update options success','baidu_sitemap'));
	}
}


/** build the XML file, sitemap_baidu.xml **/
function build_baidu_sitemap() {
    global $wpdb, $posts, $wp_version;
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
	if(!empty($get_baidu_sitemap_options)){ list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post) = explode("|",$get_baidu_sitemap_options); }
	$lc_pickcats_array = explode(";",$lc_pickcats);
    $blog_home = get_bloginfo('url');
	/** Get the current time **/
	$blogtime = current_time('mysql'); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );

    /** XML_begin **/
	$xml_begin = '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
	$xml_begin .= '<document xmlns:bbs="http://www.baidu.com/search/bbs_sitemap.xsd">'."\n";
	$xml_begin .= xml_annotate();
	$xml_begin .= '<webSite>'."$lc_blog_url".'</webSite>'."\n";
	$xml_begin .= '<webMaster>'."$lc_admin_email".'</webMaster>'."\n";
	$xml_begin .= '<updatePeri>'."$lc_updatePeri".'</updatePeri>'."\n";
	$xml_begin .= '<updatetime>'."$today_year-$today_month-$today_day $hour:$minute:$second".'</updatetime>'."\n";
	$xml_begin .= '<version>'."WordPress".'</version>'."\n";
    //echo $xml_begin;

	/** get the post title,ID,post_date from database **/
	$sql = "SELECT DISTINCT ID
		FROM $wpdb->posts
		LEFT JOIN $wpdb->comments ON ( $wpdb->posts.ID = $wpdb->comments.comment_post_ID ) 
		WHERE post_password = ''
		AND post_type = 'post'
		AND post_status = 'publish'
		ORDER BY $lc_order_1 DESC 
		LIMIT 0,$lc_limits";
    $recentposts = $wpdb->get_results($sql);
    if($recentposts){
		foreach ($recentposts as $post) {
		   /** Post URL **/
		   $permalink = EscapeXML(stripslashes_deep(get_permalink($post->ID)));
           if($lc_blog_url){ $permalink = str_replace("$blog_home", "$lc_blog_url", $permalink); } //2009-11-25
		   /** Post **/
			 $my_post = get_post($post->ID, ARRAY_A);
			 $post_title = EscapeXML(stripslashes_deep($my_post['post_title']));
			 $post_date = $my_post['post_date'];

           /** show the comments info **/
		   if($lc_comments=='1') { 
				 $comment_count = $my_post['comment_count'];
				 $comment_array = get_approved_comments($post->ID);
				 if($comment_array){ 
				     $last_comment = array_pop($comment_array);
				     $my_comment = get_comment($last_comment->comment_ID, ARRAY_A);
				 	 $comment_date = $my_comment['comment_date'];
			      }else { $comment_date = $post_date; }
			 }

           /** show the post_length **/
		   if($lc_post_length=='1') { $post_content_str = strlen($my_post['post_content']); }

          /** show the cat name **/
		  if($lc_post_cat=='1') {
			 $category = get_the_category($post->ID);
				 if(count($category)=='1'){ $my_cat = EscapeXML(stripslashes_deep($category[0]->cat_name)); }
				 if(count($category)=='2'){ $my_cat = EscapeXML(stripslashes_deep($category[0]->cat_name.",".$category[1]->cat_name)); }
				 if(count($category)=='3'){ $my_cat = EscapeXML(stripslashes_deep($category[0]->cat_name.",".$category[1]->cat_name.",".$category[2]->cat_name)); }
				 if(count($category)=='4'){ $my_cat = EscapeXML(stripslashes_deep($category[0]->cat_name.",".$category[1]->cat_name.",".$category[2]->cat_name.",".$category[3]->cat_name)); }
				 if(count($category)=='5'){ $my_cat = EscapeXML(stripslashes_deep($category[0]->cat_name.",".$category[1]->cat_name.",".$category[2]->cat_name.",".$category[3]->cat_name.",".$category[4]->cat_name)); }
		  }

         /** show the post_views **/
		 if(function_exists('the_views')){ 
			 //echo "YES";
			 //echo $post->ID."#";
			$sql_views = "SELECT DISTINCT meta_value as views
				FROM $wpdb->postmeta
				WHERE post_id = '$post->ID'
				AND meta_key = 'views'
				LIMIT 0,1";
			$post_views_array = $wpdb->get_results($sql_views);
			if($post_views_array || !empty($post_views_array)) { 
				foreach($post_views_array as $post_views) { if($post_views) {$post_views = number_format_i18n(intval($post_views->views)) ; } else { $post_views = '1'; } }
			}  else { $post_views = '1'; }
		 }
		   //echo $post_views.";";

		/** the pick post **/
		if((!empty($lc_pickcats_array) && $lc_pickcats_array[0] != '0') || (!empty($lc_comments_count) && $lc_comments_count != '0') || (!empty($lc_views_count) && $$lc_views_count != '0')) {
		    $pick = 0 ;
			if($pick == '0') {
				if(!empty($lc_pickcats_array) && $lc_pickcats_array[0] != '0') {
					$cat_ID = array();
					foreach(get_the_category($post->ID) as $category) {
					  array_push($cat_ID,$category->cat_ID);
					  if(array_intersect($cat_ID,$lc_pickcats_array)) { $pick = '1'; }
					}
				}
			}
			if($pick == '0') {
				if(!empty($lc_comments_count) && $lc_comments_count != '0') {
					if(empty($comment_count)) { $comment_count = $my_post['comment_count']; } //get post_comment_count
					if( ($comment_count - $lc_comments_count) >= '1' ) { $pick = '1'; }
				}
			}
            if($pick == '0') {
				if(!empty($lc_views_count) && function_exists('the_views')  && $lc_views_count != '0') {
					 if( ($post_views - $lc_views_count) >= '1' ) { $pick = '1'; }
				}
			}
		}
		//echo $pick.";  ";

		   $xml_middle = '<item>'."\n";
		   //$xml_middle .= '<link>'."$lc_blog_url".'/?p='."$post_ID".'</link>'."\n";
		   $xml_middle .= '<link>'.$permalink.'</link>'."\n";
		   $xml_middle .= '<title>'."$post_title".'</title>'."\n";
		   $xml_middle .= '<pubDate>'."$post_date".'</pubDate>'."\n";
	       if($lc_comments=='1'){ $xml_middle .= '<bbs:lastDate>'.$comment_date.'</bbs:lastDate>'."\n"; 
		                          $xml_middle .= '<bbs:reply>'.$comment_count.'</bbs:reply>'."\n";
		                         }
           if(function_exists('the_views') && $lc_post_views == '1') {
			   $xml_middle .= '<bbs:hit>'.$post_views.'</bbs:hit>'."\n";
		   }			    
		   if($lc_post_length=='1'){ $xml_middle .= '<bbs:mainLen>'.$post_content_str.'</bbs:mainLen>'."\n"; }
		   if($lc_post_cat=='1'){  $xml_middle .= '<bbs:boardid>'.$my_cat.'</bbs:boardid>'."\n"; }
			if((!empty($lc_pickcats_array) && $lc_pickcats_array[0] != '0') || (!empty($lc_comments_count) && $lc_comments_count != '0') || (!empty($lc_views_count) && $$lc_views_count != '0')) {	
                $xml_middle .= '<bbs:pick>'.$pick.'</bbs:pick>'."\n";
			}
		   $xml_middle .= '</item>'."\n";
           $xml_middle_done .= $xml_middle;

			/** html_contents **/
			$comment_count = $my_post['comment_count'];
			if($comment_count || $comment_count == 0) {
				$html_comment = str_replace("%html_comment%",$comment_count,__('Comments %html_comment%','baidu_sitemap'));
			}
			if($post_views) {
				$html_views = str_replace("%html_views%",$post_views,__('&nbsp;&nbsp;&nbsp;Views %html_views%','baidu_sitemap'));
			} else { $html_views = ''; }

			$html_content = '<li><a href="'.$permalink.'">'.$post_title.'</a>&nbsp;&nbsp;('.$html_comment.''.$html_views.')</li>';
			$html_contents .= $html_content."\n";
		}
	}

    /** XML_end **/
	$xml_end = '</document>';

    /** XML_ALL **/
    $baidu_xml = $xml_begin.$xml_middle_done.$xml_end;

	/** save XML file as sitemap_baidu.xml **/
	$GetHomePath = GetHomePath();
	$filename = $GetHomePath.'sitemap_baidu.xml';
	if( IsFileWritable($GetHomePath) || IsFileWritable($filename) ){ 
		file_put_contents("$filename","$baidu_xml"); 		
		/** Messages  **/
		baidu_sitemap_topbarmessage(__('Congratulate, Build the XML file success','baidu_sitemap'));
	}else{ 
		/** Messages  **/
		baidu_sitemap_topbarmessage(__('Directory is not writable. please chmod your directory to 777.','baidu_sitemap'));
	}

	/** html sitemap Page **/
	if($lc_sitemap_html = '1') {
		$blog_title = __('SiteMap','baidu_sitemap');
		$blog_name = get_bloginfo('name'); 
		$blog_keywords = $blog_title.','.$blog_name;
		$lc_generator = 'Baidu SiteMap Generator';
		$lc_author = 'Liucheng.Name';
		$lc_copyright = 'Liucheng.Name';
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
			$filename_html = $GetHomePath.'sitemap.html';
			if( IsFileWritable($GetHomePath) || IsFileWritable($filename_html) ){ 
				file_put_contents("$filename_html","$html"); 		
				/** Messages  **/
				//baidu_sitemap_topbarmessage(__('Congratulate, Build the XML file success','baidu_sitemap'));
			}
		}
	//echo $html;		
	}


if(function_exists('wp_clear_scheduled_hook')) { wp_clear_scheduled_hook('do_this_auto'); }
if(function_exists('wp_clear_scheduled_hook')) { wp_clear_scheduled_hook('do_baidu_sitemap_2');}
   baidu_sitemap_is_auto(); 
}
	

function lc_text(){
	?>
	<h3>PS:</h3>
	<p>提醒：百度的ping服务地址早就有了。可以把它加入ping服务列表，加快百度的收录速度。百度的ping服务地址：http://ping.baidu.com/ping/RPC2</p>
	<p>提醒：百度的站长平台也快有了（http://sitemap.baidu.com/），目前是在<b>封闭测试期间，将不对外开放</b>。也就是说，等这个开放后，百度将支持通用的sitemap了。 也就是说， 这个插件的使命就要告一段落了，或是结束更新，或是继续根据百度站长平台的要求继续开发插件。请大家提些建议~（建议：http://liucheng.name/883/）</p>
	<?php
}

function the_lc_support(){
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
    list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support) = explode("|",$get_baidu_sitemap_options,$lc_baidu_sitemap_by_post);
	if($lc_support == 'yes'){
		print '<!-- Baidu Sitemap Generator by liucheng.name -->';
	}
}

function baidu_sitemap_by_post($post_ID) {
	$get_baidu_sitemap_options = get_option(BAIDU_SITEMAP_OPTION);
    list($lc_blog_url,$lc_admin_email,$lc_updatePeri,$lc_limits,$lc_sitemap_auto,$lc_order_1,$lc_order_2,$lc_order_3,$lc_comments,$lc_post_length,$lc_post_cat,$lc_post_views,$lc_pickcats,$lc_comments_count,$lc_views_count,$lc_sitemap_html,$lc_sitemap_publish_post,$lc_support,$lc_baidu_sitemap_by_post) = explode("|",$get_baidu_sitemap_options);
			if($lc_baidu_sitemap_by_post == '1'){
				   wp_clear_scheduled_hook('do_baidu_sitemap_2');
				   wp_schedule_single_event(time()+30, 'do_baidu_sitemap_2'); 
			}
		return $post_ID;
}
add_action('publish_post', 'baidu_sitemap_by_post');
add_action('do_baidu_sitemap_2','build_baidu_sitemap',2,0); 

/** Tie the module into Wordpress **/
add_action('admin_menu','baidu_sitemap_menu');
add_action('init','baidu_sitemap_is_auto',1001,0);
/** load the language file **/
add_filter('init','load_baidu_language');

add_action('wp_footer','the_lc_support');
?>