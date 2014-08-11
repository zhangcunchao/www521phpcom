<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">必须输入密码，才能查看评论！</p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = '';
?>
<!-- You can start editing here. -->
<div id="comment_body">
<?php if ($comments) : ?>
	<h4 id="comments">目前有<?php comments_number('', '1 条留言', '% 条留言' );?></h4>
	<ol class="comment_list" id="comment_list">
	<?php wp_list_comments('type=comment&callback=mruu_comment&end-callback=mruu_end_comment'); ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">报歉!评论已关闭.</p></div>
	<?php endif; ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
</div>
<div class="navigation_comments">
		<div class="pagination"><?php paginate_comments_links(); ?></div>
</div>
  <div id="respond">
            	<div class="excerpt_top"></div>
                <div class="excerpt_main">
<h3 class="givetext">发表评论</h3>
<div class="cancel-comment-reply">
		<!--<div id="real-avatar">
	<?php if(isset($_COOKIE['comment_author_email_'.COOKIEHASH])) : ?>
		<?php echo get_avatar($comment_author_email, 40);?>
	<?php else :?>
		<?php global $user_email;?><?php echo get_avatar($user_email, 40); ?>
	<?php endif;?>
</div>-->
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<div class="form_box">
<div class="form_infobody">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
    <?php else : ?>
 <?php if ( $user_ID ) : ?>
 	<p class="admimg"><?php if(isset($_COOKIE['comment_author_email_'.COOKIEHASH])) : ?>
		<?php echo get_avatar($comment_author_email, 40);?>
	<?php else :?>
		<?php global $user_email;?><?php echo get_avatar($user_email, 40); ?>
	<?php endif;?></p>
    <p class="admtext"><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a>
	<?php elseif ( '' != $comment_author ): ?>
	<!--<div class="comment_author"><?php printf(__('欢迎回来 <strong>%s</strong>'), $comment_author); ?>
			<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></div>
			<script type="text/javascript" charset="utf-8">
				//<![CDATA[
				var changeMsg = "[ 更改 ]";
				var closeMsg = "[ 隐藏 ]";
				function toggleCommentAuthorInfo() {
					jQuery('#comment-author-info').slideToggle('slow', function(){
						if ( jQuery('#comment-author-info').css('display') == 'none' ) {
						jQuery('#toggle-comment-author-info').text(changeMsg);
						} else {
						jQuery('#toggle-comment-author-info').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('#comment-author-info').hide();
				});
				//]]>
			</script></p>-->
	<?php endif; ?>
<?php if ( ! $user_ID ): ?>
	<div id="comment-author-info" class="form_info">
		<div class="author">昵称：<input type="text" class="textfield" name="author" id="author" tabindex="1" value="<?php echo $comment_author; ?>"></div>
        <p style="height:15px"></p>
		<div class="email">邮箱：<input type="text" class="textfield" name="email" id="email" tabindex="2" value="<?php echo $comment_author_email; ?>"></div>
        <p style="height:15px"></p>
		<div class="url">网址：<input type="text" class="textfield" name="url" id="url" tabindex="3" value="<?php echo $comment_author_url; ?>"></div>
    </div>
<?php endif; ?></div>
    <div class="form_text"><textarea name="comment" id="comment" class="textarea"  tabindex="4"  onfocus="if (this.value == 'Make Comments on this Article') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Make Comments on this Article';}">Make Comments on this Article</textarea></div>
</div>
<p><?php include(TEMPLATEPATH . '/includes/smiley.php'); ?></p>
<div class="ajax_box" id="comment_jstext">eg.博客主题调用的是Gravatar头像,你可以通过邮箱注册获得头像.</div>
<div class="form_btn">
<div class="submit_box"><div class="aLeft"><input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="提交留言"><input class="reset" name="reset" type="reset" id="reset" tabindex="6" value="重写"></div><div class="aRight"><?php do_action('comment_form', $post->ID); ?> / 快捷键：Ctrl+Enter</label><?php comment_id_fields(); ?></div></div>
</div>
<script type="text/javascript">	//Crel+Enter
			$(document).keypress(function(e){
				if(e.ctrlKey && e.which == 13 || e.which == 10) { 
					$(".submit").click();
					document.body.focus();
				} else if (e.shiftKey && e.which==13 || e.which == 10) {
					$(".submit").click();
				}          
			})
		</script>
</form>
                </div>
                <div class="excerpt_bot"></div>
            </div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>