<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
			?>

			<div class="post oneline">
				<p>This post is password protected. Enter the password to view comments.</p>
			</div>

			<?php
			return;
		}
	}
?>

	<div id="infoblock">
	
		<h2><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h2>
	
	</div>

<?php if ($comments): ?>

	<?php foreach ($comments as $comment): ?>
	
		<div class="post">
			<p><cite><?php comment_author_link() ?></cite> says:</p>
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<p><em>Your comment is awaiting moderation.</em></p>
			<?php endif; ?>
			<p class="singleline commentfoot">Posted on <?php comment_date('F jS, Y') ?></p>
		</div>
		
	<?php endforeach; ?>
	
<?php else: ?>

	<?php if ('open' == $post->comment_status): ?>
	
		<div class="post oneline">
			<p>Be the first to leave a comment.</p>
		</div>
		
	 <?php else: ?>
		
		<div class="post oneline">
			<p>Sorry, comments are closed on this post.</p>
		</div>
		
	<?php endif; ?>

<?php endif; ?>
