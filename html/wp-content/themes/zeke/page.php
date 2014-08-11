<?php get_header(); ?>
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
        	<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle--><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>	
                    <div class="pagers_title"><H3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></H3></div>
                    <div class="content_banner pagers_text" id="a<?php the_ID(); ?>"><?php the_content(); ?></div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
<?php endwhile;else : ?>
<div class="errorbox">
<?php _e('Sorry, no posts matched your criteria.', 'xiaohan'); ?>
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