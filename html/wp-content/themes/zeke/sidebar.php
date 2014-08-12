<div id="sidebar">
			<!--自我介绍-->
			<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3>本站公告</H3>
                        </div>
                    </div>
                    <div class="sid_body"><div><img src="http://www.521php.com/wp-content/themes/zeke/fly.gif" width="200" height="180" /></div>
					<p style="text-align:left; font-size:12px;">程序本天成，妙手偶得之！
<br />趣赔集团刚成立，如果您想投资可直接转入支付宝，和我联系<br /><script>document.write('<a href="http://www.521php.com/payme/" target="_blank"><img src="/wp-content/themes/zeke/btn-index.png" height="40" /></a>');</script> <img src="/wp-content/themes/zeke/gx.gif" height="40" />			
					</p>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
			<!--日志分类-->

        	<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><?php _e('文章分类', 'mruu'); ?></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_lm">
                        	<?php wp_list_categories('show_count=1&title_li=0'); ?>
                        </ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>

	    <?php
			if (!is_single()){
	    ?>
            <!--腾讯微博-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3>我的微博</H3>
                        </div>
                    </div>
                    <!--微博等嵌入式框架宽度为230px-->
                    <div class="sid_body sid_Blog">
<iframe width="226" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=226&height=550&fansRow=2&ptype=1&speed=300&skin=3&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=2785059384&verifier=8c3b9a87&dpc=1"></iframe>											
					</div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
	    <?php
	     }?>
			<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/tg/" title="进入本站推广">进入本站推广</a></H3>
                        </div>
                    </div>
                    <div class="sid_body" align="center">
<script type="text/javascript">
    /*200*200 创建于 2014-08-12*/
    var cpro_id = "u1655068";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
<!--本站接口-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><?php _e('本站接口', 'mruu'); ?></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_link_text">
                        <?php get_links('65', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
                      </ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
            <!--本站接口-->
            <!--博客归档OR最新文章OR随机日志-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/archives/category/tj/" title="推荐文章">推荐文章</a></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_Archives sid_link_text">
<?php $recent = new WP_Query("cat=70&showposts=10&orderby=comment_count&order=desc"); while($recent->have_posts()) : $recent->the_post();?>
<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
<?php the_title(); ?>
</a></li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
			<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/archives/category/lovephp/" title="技术心得">学习之所得</a></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_Archives sid_link_text">
<?php $recent = new WP_Query("cat=10&showposts=10"); while($recent->have_posts()) : $recent->the_post();?>
<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
<?php the_title(); ?>
</a></li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
			
		<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/archives/category/cclog/" title="日志">生活之所感</a></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_Archives sid_link_text">
<?php $recent = new WP_Query("cat=4&showposts=10"); while($recent->have_posts()) : $recent->the_post();?>
<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
<?php the_title(); ?>
</a></li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
						
			 <!--调用标签云-->
			<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3>标签云</H3>
                        </div>
                    </div>
<!--class="sid_body"-->
                    <div id="div1">
					<?php wp_tag_cloud('smallest=12&largest=20&unit=pt&number=150&format=flat&orderby=name&order=ASC'); ?>
					                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
				
            <!--最新留言-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/message/" title="留言板"><?php _e('最新留言' ,'mruu'); ?></a></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_recent">
<?php
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,15) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT 8";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
foreach ($comments as $comment) {
$a= get_bloginfo('wpurl') .'/avatar/'.md5(strtolower($comment->comment_author_email)).'.jpg';
$output .= "\n<li><img src='". $a ."'/><span class='rc_info'><span class='rc_name'>".strip_tags($comment->comment_author)."</span> 评论道：<br /><a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li><div class=clear></div>";
}
$output .= $post_HTML;
echo $output;
//保留备用
//在 <span class='rc_title'>" . $comment->post_title. "</span>
?> 
                        </ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
	<?php if ( is_home() ) { ?>
            <!--友情链接-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/flink/" title="兄弟链"><?php _e('友情链接', 'mruu'); ?></a></H3>
                        </div>
                    </div>
                    <div class="sid_body">
                    	<ul class="sid_link_text leftli">
                        <?php get_links('2', '<li>', '</li>', '<br />', FALSE, 'rand', FALSE, FALSE, -1, FALSE , TRUE,'/wailian/index.php/reto/url/'); ?>
                      </ul>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
            <?php } ?>
        <!--小工具-->
            <?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		<!-- #secondary .widget-area -->
        <?php endif; ?>
        </div>