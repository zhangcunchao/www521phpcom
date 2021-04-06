<?php get_header(); ?>
		
		<div id="contentwrap" class="index">
	
			<?php $access_key = 1; ?>
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
			
            
			<div class="post">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" accesskey="<?php echo $access_key; $access_key++; ?>">
                         <h2 class="title"><?php the_title(); ?></h2>
                         <p class="subtitle"><?php the_time('jS m-Y') ?></p> 
                   		 <?php the_post_thumbnail(); ?>
                         <p class="decoration"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"..."); ?>
                         <div class="cl"></div> 
                         </p>
                </a>
			</div>
			
			<?php endwhile;  else: ?>
			
			<div id="infoblock">
				<h2>Page Not Found</h2>
			</div>
			
			<div class="post">
				<p>Sorry, The page you are looking for cannot be found!</p>
			</div>
			
			<?php endif; ?>
		
		</div>
			
			<?php if (mopr_check_pagination()): ?>
			
			<div id="more" class="position">
				<?php posts_nav_link(' ', '上一页', '下一页'); ?>
			</div>
			
			<?php endif; ?>
		
<?php get_footer(); ?>
