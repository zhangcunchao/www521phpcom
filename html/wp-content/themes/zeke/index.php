<?php get_header(); ?>
<!--中间内容-->
    <div id="container">
    	<div id="content">
                <div class="content_text">
            	        <div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main"><div style="margin-left: 20px;">
			<script type="text/javascript">
    /*640*60 创建于 2014-08-12*/
    var cpro_id = "u1655033";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			</div></div>
                        <div class="content_t_bot"><!--样式尾部--></div>
                </div>
        		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        		<div class="content_text" id="post-<?php the_ID(); ?>">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
					<div class="ContentTitle">
                    	<div class="Data">
                        	<div class="DataLeft"><p class="monthB"><?php the_time(__('j')) ?></p><p class="dateA"><?php the_time(__('m')) ?>-<?php the_time(__('Y')) ?></p> </div>
                        </div>
                        <div class="Title">
                        	<H3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></H3>
                            <ul>
                            	<li class="mrinc name"><?php the_author(); ?></li>
                                <li class="mrinc date"><?php the_time(__('Y')) ?>-<?php the_time(__('m')) ?>-<?php the_time(__('j')) ?></li>
                                <li class="mrinc folder"><?php the_category(','); ?></li>
                                <li class="mrinc tags">Tags:<?php the_tags('',',',''); ?></li>
                                <li class="mrinc admin"><?php edit_post_link(); ?></li>
                            </ul>
                        </div>
                    </div><!--content_banner-->
                    <div class="content_banner">
                    	<div class="content_banner_img"><a href="<?php the_permalink() ?>" rel="bookmark" ><?php if ( get_post_meta($post->ID, 'thumbnail', true) ) : ?>
	<?php $image = get_post_meta($post->ID, 'thumbnail', true); ?>
	<img src="<?php echo $image; ?>" ?>"/>
	<?php else: ?><?php if (has_post_thumbnail()) { the_post_thumbnail('home-thumb' ,array('class' => 'home-thumb')); }
		else { ?><img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/><?php } ?><?php endif; ?></a></div>
                        <div class="text2"><?php if(is_category() || is_archive() || is_home() ) {the_excerpt();} else { the_content('Read the rest of this entry &raquo;'); }?></div>
                  </div><!--toolBar-->
                    <div class="toolBar">
                    	<UL>
                        	<LI class="mrinc2 browse2"><a href="#">浏览:<?php echo getPostViews(get_the_ID()); ?></a></LI>
                            <LI class="mrinc2 like2"><?php comments_popup_link('无评论', '评论:1 ', '评论:%'); ?></LI>
                            <LI class="mrinc2 share2" onmouseover=share_more(<?php the_ID(); ?>,this);><A href="javascript:;">分享到...</A> </LI>
                            <LI class="mrinc2 more"><A href="<?php echo get_permalink(); ?>" title="阅读全文" class="moretx"><span class="morehover" style="opacity: 0; "></span></A></LI>
                        </UL>
                    </div>
<?php
	$args = array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image'
	);
 
	$images = &get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
	$imageUrl = '';
 
	if ($images) {
		$image = array_pop($images);
		$imageSrc = wp_get_attachment_image_src($image->ID);
		$imageUrl = $imageSrc[0];
	}else{
		$imageUrl = get_bloginfo('template_url') . '/img/default.gif';
	}
?>
                    <SCRIPT>postArray[<?php the_ID(); ?>]=[];postArray[<?php the_ID(); ?>][0]="<?php the_title(); ?>";postArray[<?php the_ID(); ?>][1]="<?php the_permalink() ?>";postArray[<?php the_ID(); ?>][2]="<?php $blognrtext = utf8_CsubStr(strip_tags($post->post_excerpt),0,190); echo trim($blognrtext); ?>";postArray[<?php the_ID(); ?>][3]="<?php echo $imageUrl; ?>";</SCRIPT>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
            <?php endwhile;else : ?>
            <div class="errorbox">
            	<?php _e('Sorry, no posts matched your criteria.', 'mruu'); ?>
			</div>
            <?php endif; ?>
            <?php mruu_pagination($query_string); ?>
        </div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
<!--中间内容End-->
<?php get_footer(); ?>