<?php

/**
 * Authorization Key Function
 *
 * @package     SLP
 * @subpackage  Functions/Auth_Key
 * @copyright   Copyright (c) 2013, Jesse Petersen
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0.0
*/

add_filter( 'login_form', 'custom_login_stuff', 1 );
function custom_login_stuff() {
	global $slp_options;
	$new_SLP_login_field = '
    <p class="login-authenticate">
		<label for="auth_key">Authorization code</label>
		<input type="text" name="auth_key" id="auth_key" class="input" value="" size="20" />
	</p>';
	echo $new_SLP_login_field;
}

add_action( 'wp_authenticate', 'slp_auth_key_check', 5 );
function slp_auth_key_check($username) {

 	global $wpdb, $slp_options, $slp_auth_key;

 	if ( !username_exists( $username ) ) {
		return;
	}

 	$set_key = $slp_options['auth_key'];
 	$submit_key = $_POST['auth_key'];

	if ( ! ( $set_key == $_POST['auth_key'] ) ) {
		wp_redirect( esc_url_raw ($slp_options['redirect_url']), 302 );
		die;
	}

}