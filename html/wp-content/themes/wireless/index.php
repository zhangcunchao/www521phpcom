<?php get_header();?>
            <div id="content">
                <div id="postlist">
                    <?php if(have_posts()){ ?>
                    <?php $i=1;//计数器，标示奇偶 ?>
                    <?php while(have_posts()){ ?>
                    <?php the_post(); ?>
                    <div class="post<?php if($i%2==0) echo ' even';else echo ' odd'; ?>" id="post-<?php the_ID();?>">
                        <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
                        <p class="post-meta">[<?php the_category(','); ?>/<?php the_time('m-d'); ?>/<?php if(function_exists('the_views')){ the_views();echo '/'; }?><?php comments_popup_link('0评','1评','%评'); ?>]</p>
                    </div>
                    <?php $i++; ?>
                    <?php }?>
                    <?php if(pageCount()>1){ ?><div class="navigation"><?php if (function_exists('messense_pagination')) { messense_pagination();} ?></div><?php }?>
                    <?php }else{?>
                    <div class="post" id="notfound">
                        <p>
                            抱歉，没有找到文章!
                        </p>
                    </div>
                    <?php }?>
                </div>
                <div id="search">
                    <form name="searchform" id="searchform" action="<?php bloginfo('home'); ?>" method="get">
                        <p><label for="s"><strong>搜索文章</strong></label></p>
                        <p><input type="text" name="s" id="s" /> <input type="submit" id="submit" value="搜索" /></p>
                    </form>
                </div>
            </div>
<?php get_footer(); ?>