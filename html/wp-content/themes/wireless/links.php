<?php
/*
  Template Name: Links
 */
?>
<?php get_header(); ?>
<div id="content">
    <?php if(have_posts()){ ?>
    <?php the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="entry">
            <?php the_content(); ?>
            <div class="link-entry">
            <?php wp_list_bookmarks('categorize=1&category_orderby=id&before=<li>&after=</li>&show_images=0&show_description=0&orderby=name&title_before=<h3>&title_after=</h3>'); ?>
            </div>
        </div>
    </div>
    <?php }else{?>
    <div class="post" id="notfound">
         <p>
            抱歉，没有找到页面!
         </p>
    </div>
    <?php }?>
</div>
<?php get_footer(); ?>