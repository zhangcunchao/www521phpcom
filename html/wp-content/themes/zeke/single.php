<?php get_header(); ?>
<!--中间内容-->
    <div id="container">
    	<div id="content">
	<div class="content_text">
          <div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main"><div style="margin-left: 20px;">
<!--淘宝内容页推广start-->
<script type="text/javascript">
    /*640*60 创建于 2014-08-12*/
    var cpro_id = "u1655033";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
<!--淘宝内容页推广end--></div></div>
<div class="content_t_bot"><!--样式尾部--></div>
</div>
        	<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <?php
					$options = get_option('mruu_options');
					$wbid=$options['notice_content'];
					if(have_posts()) : while(have_posts()) : the_post(); ?>
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
                                <LI class="mrinc browse"><a href="#">浏览:<script src="/wp-view.php?id=<?php echo get_the_ID();/*getPostViews(get_the_ID());*/ ?>&add=true"></script></a></LI>
                          		<LI class="mrinc like"><?php comments_popup_link('无评论', '评论:1 ', '评论:%'); ?></LI>
                                <li class="mrinc admin"><?php edit_post_link(); ?></li>
                            </ul>
                        </div>
                    </div><!--content_banner-->
                    <div class="content_banner">
                    	
                        <div class="text" id="a<?php the_ID(); ?>"><?php the_content(); ?>
                        <p style="color:#17750A;"><b>程序本天成，妙手偶得之！</b></p>
                         <p>转载请注明：<a href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" title="<?php the_title(); ?>" target="_blank">http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?></a></p>
			<p><script type="text/javascript">
    /*650*100 内容页底部 创建于 2014-08-12*/
    var cpro_id = "u1655814";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			</p>
                        </div>
                  </div><!--toolBar-->
                    <div class="toolBar toolBarTwo">
                    	<UL>
                            <li class="mrinc2 tags2">Tags:<?php the_tags('',',',''); ?></li>
                            <LI class="mrinc2 share_r" onmouseover=share_more(<?php the_ID(); ?>,this);><A href="javascript:;">分享到...</A> </LI>
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
<?php setPostViews(get_the_ID()); ?>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
            <div class="navigation">
				<p class="navNew"><?php next_post_link('%link') ?></p>
				<p class="navOld"><?php previous_post_link('%link') ?></p>
	    </div>
           
           <div class="content_text">
               <div class="content_t_top"></div>
               <div class="content_t_main"> <div class="ujian-hook"></div></div>
	       <div class="content_t_bot"><!--样式尾部--></div>
	   </div>
	   <div class="content_text">
               <div class="content_t_top"></div>
               <div class="content_t_main">
               <div class="xgwz">
	       <div>相关文章</div>
			<?php
$post_tags=wp_get_post_tags($post->ID); //如果存在tag标签，列出tag相关文章
$pos=1;
if($post_tags) {
foreach($post_tags as $tag) $tag_list[] .= $tag->term_id;
$args = array(
'tag__in' => $tag_list,
'category__not_in' => array(NULL), // 不包括的分类ID,可以把NULL换成分类ID
'post__not_in' => array($post->ID),
'showposts' => 0, // 显示相关文章数量
'caller_get_posts' => 1,
'orderby' => 'rand'
);
query_posts($args);
if(have_posts()):while (have_posts()&&$pos<=10) : the_post(); update_post_caches($posts); ?>
<li><span class="xtitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if(get_the_title())the_title();else the_time('Y-m-d'); ?></a></span> <span class="xtag"><?php the_time('Y-m-d') ?> <?php the_category('/','') ?></span></li>
<?php $pos++;endwhile;wp_reset_query();endif; ?>
<?php } //end of rand by tags ?>
<?php if($pos<=10): //如果tag相关文章少于10篇，那么继续以分类作为相关因素列出相关文章
$cats = wp_get_post_categories($post->ID);
if($cats){
$cat = get_category( $cats[0] );
$first_cat = $cat->cat_ID;
$args = array(
'category__in' => array($first_cat),
'post__not_in' => array($post->ID),
'showposts' => 0,
'caller_get_posts' => 1,
'orderby' => 'rand'
);
query_posts($args);
if(have_posts()): while (have_posts()&&$pos<=10) : the_post(); update_post_caches($posts); ?>
<li><span class="xtitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php if(get_the_title())the_title();else the_time('Y-m-d'); ?></a></span> <span class="xtag"><?php the_time('Y-m-d');if($options['tags']):the_tags('', '/', '');endif; ?></span></li>
<?php $pos++;endwhile;wp_reset_query();endif; ?>
<?php } endif; //end of rand by category ?>
<?php if($pos<=10){ //如果上面两种相关都还不够10篇文章，再随机挑几篇凑成10篇 ?>
<?php query_posts('showposts=10&orderby=rand');while(have_posts()&&$pos<=10):the_post(); ?>
<li><span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if(get_the_title())the_title();else the_time('Y-m-d') ?></a></span> <span>[ <?php the_category('/',''); ?>]</span></li>
<?php $pos++;endwhile;wp_reset_query();?>
<?php } ?></div>
           <div class="content_t_bot"></div>
	   </div>
<?php comments_template(); ?>
<?php endwhile; else: ?>
<?php endif; ?></div>
        </div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
<!--中间内容End-->
<?php get_footer(); ?>