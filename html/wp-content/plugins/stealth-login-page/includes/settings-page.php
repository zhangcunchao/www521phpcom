<?php

add_action( 'admin_init', 'slp_email_admin' );
function slp_email_admin() {
  global $slp_options, $custom_url;
	if ( isset( $slp_options['enable'] ) && $slp_options['auth_key'] && isset ( $_POST['email-admin'] ) && current_user_can( 'manage_options' ) ) {
		$to = get_bloginfo( 'admin_email' );
		$subject = sprintf( __( 'Authorization code for %s', 'stealth-login-page' ), get_bloginfo( 'name' ) );
		$message = sprintf( __( 'Your authorization code for %1$s is %2$s', 'stealth-login-page' ), get_bloginfo( 'name' ), $slp_options['auth_key'] );
		wp_mail( $to, $subject, $message );
	}
}

/**
 * Settings page
 *
 * @since 1.0.0
 */
function slp_admin() {

	global $slp_options;

	ob_start(); ?>
	<div class="wrap">
	<h2><?php _e( 'Stealth Login Page Options', 'stealth-login-page' ); ?></h2>
	<form method="post" action="options.php">

		<?php settings_fields('slp_settings_group'); ?>

		<h3><?php _e( 'Enable/Disable Stealth Login Page', 'stealth-login-page' ); ?></h3>

		<input id="slp_settings[enable]" type="checkbox" name="slp_settings[enable]" value="1" <?php checked(1, isset( $slp_options['enable'] ) ); ?> />

		<label class="description" for="slp_settings[enable]"><?php _e( 'Enable Stealth Mode', 'stealth-login-page' ); ?></label>

		<p><?php _e( 'Enter an authorization code below. Think of it as another password or a PIN. Without a proper entry from the login form, the login form will redirect.', 'stealth-login-page' ); ?></p>

			<label class="description" for="slp_settings[auth_key]"><?php _e( 'Enter an authorization code', 'stealth-login-page' ); ?></label>

			<input type="text" required id="slp_settings[auth_key]" name="slp_settings[auth_key]" value="<?php echo $slp_options['auth_key']; ?>" />

		<p><?php _e( 'Unsuccessful attempts to gain access to your dashboard will be automatically redirected to a customizable URL. Enter that URL below.', 'stealth-login-page' ); ?></p>

			<label class="description" for="slp_settings[redirect_url]"><?php _e( 'URL to redirect unauthorized attempts to', 'stealth-login-page' ); ?></label>

			<input type="text" required id="slp_settings[redirect_url]" name="slp_settings[redirect_url]" value="<?php echo $slp_options['redirect_url']; ?>" />

	<p>
		<input id="email-admin" type="checkbox" name="email-admin" value="0" />

		<label class="description" for="email-admin"><?php _e( 'Email authorization code to admin', 'stealth-login-page' ); ?></label>
	</p>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'stealth-login-page' ); ?>" />
		</p>
	</form>

	<?php 

	if ( isset( $slp_options['enable'] ) && $slp_options['auth_key'] ) { ?>
		<div class="auth-key-email">
			<p><?php _e( 'Your authorization code is: ', 'stealth-login-page' ); ?><?php echo $slp_options['auth_key']; ?></p>
		</div>
		<?php } ?>

	</div><!-- .wrap -->
	<?php
	echo ob_get_clean();
}