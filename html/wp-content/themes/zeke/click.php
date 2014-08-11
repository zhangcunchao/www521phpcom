<?php
/*
Template Name: click点击
*/
?>
<?php get_header(); ?>
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
                    <div class="pagers_title"><H3>实时点击</H3></div>
                    <div class="content_banner pagers_text">
                    	<div id="clicki_widget_5147" title=""></div>
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