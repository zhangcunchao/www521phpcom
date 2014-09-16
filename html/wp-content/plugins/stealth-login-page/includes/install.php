<?php
/**
 * Install Function
 *
 * @package     SLP
 * @subpackage  Functions/Install
 * @copyright   Copyright (c) 2013, Jesse Petersen
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       3.0.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

register_activation_hook( SLP_PLUGIN_FILE, 'slp_activate' );
register_deactivation_hook( SLP_PLUGIN_FILE, 'slp_deactivate' );

function slp_activate($networkwide) {
    global $wpdb;

    if (function_exists('is_multisite') && is_multisite()) {
      // check if it is a network activation - if so, run the activation function for each blog id
      if ($networkwide) {
        $old_blog = $wpdb->blogid;
        // Get all blog ids
        $blogids = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");
        foreach ($blogids as $blog_id) {
          switch_to_blog($blog_id);
          return _slp_activate($networkwide);
        }
        switch_to_blog($old_blog); 
        return;
      } 
    } 
    return _slp_activate($networkwide);     
  }
     
function slp_network_propagate($pfunction, $networkwide) {
    global $wpdb;
 
    if (function_exists('is_multisite') && is_multisite()) {
        // check if it is a network activation - if so, run the activation function 
        // for each blog id
        if ($networkwide) {
            $old_blog = $wpdb->blogid;
            // Get all blog ids
            $blogids = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");
            foreach ($blogids as $blog_id) {
                switch_to_blog($blog_id);
                call_user_func($pfunction, $networkwide);
            }
            switch_to_blog($old_blog);
            return;
        }   
    } 
    call_user_func($pfunction, $networkwide);
}
 
 
function slp_deactivate($networkwide) {
    slp_network_propagate('_slp_deactivate', $networkwide);
}

add_action( 'wpmu_new_blog', 'slp_new_blog', 10, 6);        
 
function slp_new_blog($blog_id, $user_id, $domain, $path, $site_id, $meta ) {
    global $wpdb;
 
    if (is_plugin_active_for_network('stealth-login-page/stealth-login-page.php')) {
        $old_blog = $wpdb->blogid;
        switch_to_blog($blog_id);
        _slp_activate(TRUE);
        switch_to_blog($old_blog);
    }
}

function _slp_activate($networkwide) {
  return ;
}

function _slp_deactivate($networkwide) {
  return ;
}

add_action('admin_menu', 'slp_plugin_menu');
function slp_plugin_menu() {
  add_options_page( __( 'Stealth Login Page', 'stealth-login-page' ), __( 'Stealth Login Page', 'stealth-login-page' ), 'manage_options', 'stealth-login-page', 'slp_admin' );
  return;
}

/**
 * Add settings link on plugin page
 *
 * @since 3.0.0
 * @param array $links
 * @param string $file
 * @return array
 */
add_filter( 'plugin_action_links', 'slp_admin_settings_link', 10, 2  );
function slp_admin_settings_link( $links, $file ) {

  if ( plugin_basename(__FILE__) == $file ) {
    $settings_link = '<a href="' . admin_url( 'options-general.php?page=stealth-login-page' ) . '">' . __( 'Settings', 'stealth-login-page' ) . '</a>';
  }

  return $links;

}