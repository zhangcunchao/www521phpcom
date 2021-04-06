
			
			<?php if (comments_open()): ?>
			
				<?php if (get_option('comment_registration') && !$user_ID): ?>
				
					<div class="post-comment">
						<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
					</div>
				
				<?php else: ?>
				
					<div class="post-comment">
					
						<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
						
							<?php if ($user_ID): ?>
							
							<p>登入 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">登出</a></p>
							
							<?php else: ?>
							
							<p><input type="text" placeholder="Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="14" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>
							
							<p><input type="email" placeholder="Mail (将不被公开)" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="14" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
							
							<p><input type="url" placeholder="Website"  name="url" id="url" value="<?php echo $comment_author_url; ?>" size="14" tabindex="3" /></p>
							
							<?php endif; ?>
							
						<p><textarea name="comment" id="comment" cols="30" rows="10" tabindex="4"></textarea></p>
						<p>
							<input name="submit" type="submit" id="submit" tabindex="5" value="回复" />
							<input type="hidden" name="comment_post_ID" value="<?php CommentID(); ?>" />
						</p>
						<?php do_action('comment_form', $post->ID); ?>
						
						</form>
						
					</div>

					<?php endif; ?>
			
			<?php else: ?>
			
				<div class="post-comment">
					<p>对不起，此文评论已关闭</p>
				</div>
				
			<?php endif; ?>