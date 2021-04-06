<?php

require_once 'mobile-detect.class.php';

class WPMobileThemes {

	private static $theme;
    private static $detect;

	function WPMobileThemes($mobileTheme, $tabletTheme) {
		$detect = new Mobile_Detect();

		if($detect->isMobile()) {
			if($tabletTheme && $detect->isTablet()) {
				$this->theme = $tabletTheme;
			} else if($mobileTheme) {
				$this->theme = $mobileTheme;
			}

			if($this->theme) {
				add_filter('stylesheet', array(&$this, 'getStylesheet'));
				add_filter('template', array(&$this, 'getTemplate'));
			}
		}
	}

	public function getTemplate() {
		$theme = $this->theme;

		if (empty($theme)) {
			return $template;
		}

		$theme = get_theme($theme);

		if (empty($theme)) {
			return $template;
		}

		// Don't let people peek at unpublished themes.
		if (isset($theme['Status']) && $theme['Status'] != 'publish') {
			return $template;
		}

		return $theme['Template'];
	}

	public function getStylesheet($theme) {
		$theme = $this->theme;

		if (empty($theme)) {
			return $stylesheet;
		}

		$theme = get_theme($theme);

		// Don't let people peek at unpublished themes.
		if (isset($theme['Status']) && $theme['Status'] != 'publish') {
			return $template;
		}
		
		if (empty($theme)) {
			return $stylesheet;
		}

		return $theme['Stylesheet'];
	}
}

?>