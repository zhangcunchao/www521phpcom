<?php
// Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
        ?>
        <h2><?php _e('Password Protected'); ?></h2>
        <p><?php _e('Enter the password to view comments.'); ?></p>
        <?php
        return;
    }
}
/* This variable is for alternating comment background */
$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php if ('open' == $post->comment_status) : ?>
    <div id="respond">
        <div id="cancel-comment-reply">
            <small><?php cancel_comment_reply_link('【点击此处取消回复评论】'); ?></small>
        </div>
        <?php if (get_option('comment_registration') && !$user_ID) : ?>
            <p>您必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a> 后才能发表评论.</p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if ($user_ID) : ?>
                    <p>欢迎您,<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>,<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出登录 &raquo;</a></p>
                <?php else : ?>
                    <div id="author-info">
                    <p><label for="author"><small>昵称(*):</small></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"  <?php if ($req) echo 'required'; ?>/></p>
                    <p><label for="email"><small>邮箱(*):</small></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo 'required'; ?>/></p>
                    <p><label for="url"><small>网&nbsp;&nbsp;&nbsp;站:</small></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3"  /></p>
                    </div>
                    <?php endif; ?>
                <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" ></textarea></p>
                <p><input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" /></p>
                <p><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked" style="margin:10px;" /><label for="comment_mail_notify">接收回复邮件通知</label></p>
                <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
            </form>
    <?php endif; // If registration required and not logged in ?>
    </div><!--end respond-->
<?php endif; // if you delete this the sky will fall on your head ?>
<?php if ($comments) : ?>
    <h3 id="comments"><?php comments_number('暂时还没有评论,赶快抢沙发去!', '沙发已经被抢啦，速度去抢板凳吧!', '已经有%条评论了，你还在等什么?'); ?></h3>
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=mytheme_comment&per_page=5'); ?>
    </ol>
    <div class="navigation"><?php paginate_comments_links('prev_text=上页&next_text=下页'); ?></div>
<?php else : // this is displayed if there are no comments so far  ?>
    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->
    <?php else : // comments are closed  ?>
        <!-- If comments are closed. -->
        <p class="nocomments">评论功能已关闭.</p>
    <?php endif; ?>
<?php endif; ?>