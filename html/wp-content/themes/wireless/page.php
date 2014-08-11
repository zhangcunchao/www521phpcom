<?php get_header(); ?>
<div id="content">
    <?php if(have_posts()){ ?>
    <?php the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="entry">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="comments-template">
    <?php comments_template(); ?>
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