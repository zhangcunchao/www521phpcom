<?php
/*
Template Name: Guestbook
*/
?>
<?php get_header(); ?>
<!--中间内容-->
    <div id="container">
    	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></H3></div>
                    <div class="content_banner pagers_text">
                    	<p>我相信，文字是可以用来交流的，而交流是可以使人进步的。</p>
						<p>我也相信，纷扰的世界总会有一群心静的人，他们默默从人海中走过，来追寻他们的梦想</p>
						<p>我愿意相信，你留下的每一评论，或者意见，都将成为我用于倾听的源泉</p>
						<p><span class="explain">(关于链接交换邀请，请您到<a href="../links" target="_blank">链接墙</a>上申请,留言板更多的用于和大家的交流。)</span></p>
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