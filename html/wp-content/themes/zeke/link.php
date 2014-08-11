<?php
/*
Template Name: Flinks
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="all" />
<title>兄弟链 | 链接申请 | 我爱你PHP张存超技术博客</title>
<meta name="description" content="www.521php.com,php个人博客友情链接,友情链接申请看，链接优化" />
<meta name="keywords" content="链接申请, 友情链接, 优化, " />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="http://www.521php.com/wp-content/themes/zeke/miaov_style.css" rel="stylesheet" type="text/css">
<?php wp_head(); ?>
<!--[if lt IE 7]>
<script type="text/javascript" src="/wp-content/themes/MRuu2011/MRjs/iepngfix_tilebg.js"></script>
<script type="text/javascript">
// <![CDATA[
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
try{
document.execCommand("BackgroundImageCache", false, true);
}
catch(e){}
// ]]>
</script>
<![endif]-->
</head>

<body>
<div id="wrap">
<!--头部-->
	<div id="header">
    	<div id="top">
        	<div class="mrlogo"><a href="<?php echo get_option('home'); ?>/" title="<?php if ( is_singular() || is_archive() ) { wp_title(''); } else { bloginfo('name'); } ?>-<?php bloginfo('description'); ?>"><?php if ( is_singular() || is_archive() ) { wp_title(''); } else { bloginfo('name'); } ?>-<?php bloginfo('description'); ?></a></div>
            <div class="search"><form method="get" target="_blank" id="searchform" action="http://www.521php.com/so.php">
<input type="hidden" name="url" value="521php.com" />
            <input class="field" name="s" id="s" type="text" value="百度谷歌一起搜！" onfocus="this.value=&#39;&#39;;" onblur="if(this.value==&#39;&#39;){this.value=&#39;百度谷歌一起搜！&#39;;}">
            <input name="" type="submit" value="" class="so"id="go"  onmouseout="this.className=&#39;so&#39;" onmouseover="this.className=&#39;soHover&#39;">
            </form></div>
        </div>
        <div id="nav">
        	<div class="menuL"><?php wp_nav_menu('container=\'\'&menu_id=menu&title_li=&link_before=<span>&link_after=</span>'); ?></div>
            <div class="rss_ico"><a href="<?php $options = get_option('mruu_options'); if ($options['feed_url']) {echo($options['feed_url']);} else  bloginfo('rss2_url'); ?>" target="_blank" rel="nofollow" title="RSS订阅">RSS订阅</a></div>
        </div>
    </div>
<!--头部End-->

<style>
<!--
#comment_body {padding-left: 14px;*margin: 10px 0px 0px; }
#respond {padding-left: 14px;margin: 10px 0px; }
-->
</style>
<!--中间内容-->
    <div id="container">
    	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>图象链接</H3></div>
                    <div class="content_banner pagers_text">
                    	<ul class="sid_link_img_page">
                        	<?php get_links('66', '<li>', '</li>', '<br />', true, 'id', FALSE, FALSE, -1, FALSE); ?>
                        </ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
<script type="text/javascript">
jQuery(document).ready(function($){
$(".sid_link_text_page a").each(function(e){
	$(this).prepend("<img src=http://www.521php.com/api/fav/?url="+this.href.replace(/^(http:\/\/[^\/]+).*$/, '$1').replace( 'http://', '' )+" style=float:left;padding:7px; width=20 height=20>");
}); 
});
</script>
                <div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>文字链接</H3></div>
                    <div class="content_banner pagers_text">
                    	<ul class="sid_link_text_page">
                            <?php get_links('2', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE,TRUE,'/wailian/index.php/reto/url/'); ?>
                      </ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
                <div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>本站接口</H3></div>
                    <div class="content_banner pagers_text" id="blink">
                    	<ul class="sid_link_text_page">
                            <?php get_links('65', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
                      </ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
                <div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>申请友情连接前请看：</H3></div>
                    <div class="content_banner pagers_text">
                    	<ul>
<li>一、在您申请本站友情链接之前请先做好本站链接，否则不会通过，谢谢！</li>
<li>二、<strong>谢绝第一次来我博客就申请友情链接</strong>，在做链接前我希望的是交流，博客与博客的交流，而不是一上来就是交换链接。</li>
<li>三、本站目前只招优秀的设计，编程类原创IT博客，其他类别的博客申请将有可能不被通过，当然如果你站确实优秀的话我会考虑添加的。</li>
<li>四、如果您的站还未被baidu或google收录，申请链接暂不予受理！</li>
<li>五、如果您的站原创内容少之又少，申请连接不予受理！</li>
</ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
<?php endwhile;else : ?>
<div class="errorbox">
<?php _e('Sorry, no posts matched your criteria.', 'mruu'); ?>
</div>
<?php endif; ?>
<?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
?>
        </div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
<!--中间内容End-->
<?php get_footer(); ?>