<?php
/*
Plugin Name: WordPress Mobile Themes
Plugin URI: http://www.neoease.com/plugins/
Description: Allows you select another themes that will be sent to mobile users and tablet users.
Version: 1.1.1
Author: mg12
Author URI: http://www.neoease.com/
*/

require 'wp-mobile-themes.class.php';

// apply mobile theme
$options = get_option('wp_mobile_themes_options');
$mobileThemeName = $options['mobile_theme'];
if(!$mobileThemeName) {
	$mobileThemeName = get_current_theme();
}
$tabletThemeName = $options['tablet_theme'];
if(!$tabletThemeName) {
	$tabletThemeName = get_current_theme();
}
new WPMobileThemes($mobileThemeName, $tabletThemeName);

// add settings link to plugin item
function actionLinks( $links ) {
	$settingsLink = '<a href="/themes.php?page=wp-mobile-themes.php">' . __('Settings', 'wp-mobile-themes') . '</a>'; 
	array_unshift($links, $settingsLink);
	return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'actionLinks');

/**
 * l10n
 */
load_plugin_textdomain('wp-mobile-themes', '/wp-content/plugins/wp-mobile-themes/languages/');

/**
 * settings
 */
class WPMobileThemesOptions {

	/**
	 * get settings
	 */
	private function getOptions() {
		$options = get_option('wp_mobile_themes_options');
		if(!is_array($options)) {
			$options['mobile_theme'] = '';
			$options['tablet_theme'] = '';
			update_option('wp_mobile_themes_options', $options);
		}
		return $options;
	}

	/**
	 * update settings
	 */
	public function updateOptions() {

		if(isset($_POST['wp_mobile_themes_save'])) {
			$options = WPMobileThemesOptions::getOptions();
			$themeNames = WPMobileThemesOptions::getThemeNames();
			$options['mobile_theme'] = $_POST['mobile_theme'];
			$options['tablet_theme'] = $_POST['tablet_theme'];

			if(!WPMobileThemesOptions::isThemeIncluded($options['mobile_theme'], $themeNames)) {
				$options['mobile_theme'] = WPMobileThemesOptions::getDefaultThemeName();
			}
	
			if(!WPMobileThemesOptions::isThemeIncluded($options['tablet_theme'], $themeNames)) {
				$options['tablet_theme'] = WPMobileThemesOptions::getDefaultThemeName();
			}
	
			update_option('wp_mobile_themes_options', $options);

		} else {
			WPMobileThemesOptions::getOptions();
		}

		// add settings page to menu
		add_theme_page(__('Mobile Themes', 'wp-mobile-themes'), __('Mobile Themes', 'wp-mobile-themes'), 'edit_theme_options', basename(__FILE__), array('WPMobileThemesOptions', 'display'));
	}

	/**
	 * display form
	 */
	public function display() {
		$options = WPMobileThemesOptions::getOptions();
		$themeNames = WPMobileThemesOptions::getThemeNames();
		$mobileThemeName = $options['mobile_theme'];
		$tabletThemeName = $options['tablet_theme'];
?>

<div class="wrap">
	<div class="icon32" id="icon-options-general"><br /></div>
	<h2><?php _e('Mobile Themes Options', 'wp-mobile-themes'); ?></h2>

	<?php if(!empty($_POST)) : ?>
		<div class='updated fade'><p><?php _e('Settings <strong>saved</strong>.', 'wp-mobile-themes'); ?></p></div>
	<?php endif; ?>

	<div id="poststuff" class="has-right-sidebar">
		<div class="inner-sidebar">
			<div id="donate" class="postbox" style="border:2px solid #080;">
				<h3 class="hndle" style="color:#080;cursor:default;"><?php _e('Donation', 'wp-mobile-themes'); ?></h3>
				<div class="inside">
					<p><?php _e('If you like this plugin, please donate to support development and maintenance!', 'wp-mobile-themes'); ?></p>

					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<div>
							<input type="hidden" name="cmd" value="_s-xclick" />
							<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
							<input style="border:none;" type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" name="submit" alt="" />
							<img alt="" src="https://www.paypal.com/zh_XC/i/scr/pixel.gif" style="height:1px;width:1px;" />
						</div>
					</form>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle" style="cursor:default;"><?php _e('About Author', 'wp-mobile-themes'); ?></h3>
				<div class="inside">
					<ul>
						<li><a href="http://www.neoease.com/"><?php _e('Author Blog', 'wp-mobile-themes'); ?></a></li>
						<li><a href="http://www.neoease.com/plugins/"><?php _e('More Plugins', 'wp-mobile-themes'); ?></a></li>
					</ul>
				</div>					
			</div>
		</div>

		<div id="post-body">
			<div id="post-body-content">
				<form action="#" method="POST" name="wp_mobile_themes_form">
					<table class="form-table">
						<tbody>

							<tr valign="top">
								<td colspan="2">
									<p><?php printf(__('The following themes will be sent to mobile users and tablet users, desktop users will receive <a href="/wp-admin/themes.php">%1$s</a>.', 'wp-mobile-themes'), WPMobileThemesOptions::getDefaultThemeName()); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php _e('Mobile Theme', 'wp-mobile-themes'); ?></th>
								<td>
									<select name="mobile_theme">
										<?php
											foreach ($themeNames as $themeName) {
												$selectedProperty = '';
												$defaultTip = '';

												if($themeName == $mobileThemeName) {
													$selectedProperty = ' selected="selected"';
												}
												if($themeName == WPMobileThemesOptions::getDefaultThemeName()) {
													$defaultTip = __(' (deault)', 'wp-mobile-themes');
												}
												echo '<option value="' . $themeName . '"' . $selectedProperty . '>' . htmlspecialchars($themeName) . $defaultTip . '</option>';
											}
										?>
									<select>
									<p class="description"><?php _e('Mobile theme will activated on iPhone, iPod touch, Nexus, BlackBerry, Windows Phone, ... but tablets.', 'wp-mobile-themes'); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php _e('Tablet Theme', 'wp-mobile-themes'); ?></th>
								<td>
									<select name="tablet_theme">
										<?php
											foreach ($themeNames as $themeName) {
												$selectedProperty = '';
												$defaultTip = '';

												if($themeName == $tabletThemeName) {
													$selectedProperty = ' selected="selected"';
												}
												if($themeName == WPMobileThemesOptions::getDefaultThemeName()) {
													$defaultTip = __(' (deault)', 'wp-mobile-themes');
												}
												echo '<option value="' . $themeName . '"' . $selectedProperty . '>' . htmlspecialchars($themeName) . $defaultTip . '</option>';
											}
										?>
									<select>
									<p class="description"><?php _e('Tablet theme will activated on iPad, Kindle, NexusTablet, SamsungTablet, ...', 'wp-mobile-themes'); ?></p>
								</td>
							</tr>

						</tbody>
					</table>

					<p class="submit">
						<input class="button-primary" type="submit" name="wp_mobile_themes_save" value="<?php _e('Save Changes', 'wp-mobile-themes'); ?>" />
					</p>
				</form>
			</div>
		</div>

	</div>
</div>

<?php
	}

	/**
	 * return the name of themes
	 */
	private function getThemeNames() {
		$themes = get_themes();
		$themeNames = array_keys($themes);
		natcasesort($themeNames);

		return $themeNames;
	}

	/**
	 * return the name of default theme
	 */
	private function getDefaultThemeName() {
		$themeName = get_current_theme();

		return $themeName;
	}

	/**
	 * is the theme included
	 */
	private function isThemeIncluded($obj, $list) {
		foreach ($list as $item) {
			if($item == $obj) {
				return true;
			}
		}

		return false;
	}
}

add_action('admin_menu', array('WPMobileThemesOptions', 'updateOptions'));


?>
