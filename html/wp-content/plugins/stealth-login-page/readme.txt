=== Stealth Login Page ===
Contributors: PMGLLC, peterdog
Donate link: https://www.petersenmediagroup.com/contribute
Tags: login, wp-login.php, two-form-factor, wp-admin, redirect, security
Requires at least: 3.4.2
Tested up to: 3.6
Stable tag: 4.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Protect your dashboard without editing the .htaccess file -- the FIRST one that completely blocks remote bot login requests.

== Description ==

Protect your dashboard with a game-changing authorization code. The login form will never be the same again.

= What it does =

Without locking down access via IP address or file permissions, this plugin creates a secret login authorizaiton code. Those who do not enter this additional authorization will be automatcally redirected to a customizable URL.

This is the first plugin that blocks external bot login requests - login requests must comply with the full login sequence or the request is rejected.

= Why it exists =

To screw with hackers, brute-force attacks, and bot-nets. Screw with them, too.

= NOTE =

This does NOT replace the need for security "best practices" such as a strong password or a secure hosting environment. This is an additional layer of security, best combined with a login limiter such as <a href="http://wordpress.org/extend/plugins/limit-login-attempts/">Limit Login Attempts</a> or <a href="http://wordpress.org/extend/plugins/login-lockdown/">Login Lockdown</a>.

== Installation ==

1. Upload contents of the directory to /wp-content/plugins/ (or use the automatic installer)
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the settings to create the secret authorization code and redirect URL.
1. Verify it works by going to your login form.

Add the following variables to wp-config.php if you are on a MU site and want to globally activate it with the same settings on all sites (change what is in quotes to your liking):

$slp_redirect "URL";
$slp_authorization "string";

== Frequently Asked Questions ==

= I've been locked out! HELP! =

Step 1: breathe
Step 2: login to FTP or hosting and rename the stealth-login-page folder in /wp-content/plugins
Step 3: login

If those steps don't work, then it's possible you have a server caching or a caching plugin or a CDN that is still delivering the plugin files. Clear all caches (not your browser cache).

= I never got an e-mail of the code when I clicked the checkbox. =

Ensure that you clicked the Save Settings button after the box was checked. In every case I've seen, clicking it a second time always sends it.

= Does this work on MU sites? =

Version 3.0.0 and greater is fully network-activated, includes uninstall, and bypasses all the settings pages with wp-config.php variables. See the Intallation tab or above in this file for instructions.

= I noticed Limit Login Attempts or Login Lockdown still reporting lockouts. Why? =

We've realized that bots (or really bored people) can enter a URL string in the address bar that attempts to log in without ever showing the login form. If the guess is unsuccessful, then they are redirected just the same and their IP address is logged by the other plugins. This reinforces the need for a 3-prong approach: strong credentials, login limiter plugin, and a stealthy login page.

= Are both the redirected folder /wp-admin and the page wp-login.php secured? =

Yes, as long as you are not actively logged into the site on that computer. You may enter your dashboard normally if you're in an active session. Once the session expires, you're further protected by it automatically redirecting rather than gaining access to the login form since WordPress redirects session timeouts to wp-login.php, unaware of the new URL string.

= What do I do if I forget my code and can't find the e-mail the plugin sent me? =

You'll need FTP access to your site. Renaming the stealth-login-page folder in /wp-content/plugins/ will remove the stealth security and allow you back into your dashboard. If you have used variables in the wp-config.php file, delete or comment out those lines.

== Screenshots ==

1. The options page.
2. Before.
3. After.

== Changelog ==

= 4.0.0 =
* TOTALLY re-worked mehodology. It is backwards compatible.
* WordPress 3.6 compatibility.
* Complete re-build of the structure, code, and methodology of its security.

= 3.0.0 =
* Added full MU support.
* Disabled the login/logout/lost-password URL filtering - it knows if you're logged in.
* Added wp-config.php settings support to bypass the settings page if you're locked out or in a MU environment.

= 2.1.2 =
* Efficiencies improved.
* Edited global variables for efficiency.
* Eliminated potential conditional statment oversights in later updates.

= 2.1.1 =
* Bugfix - stealth re-enabled AND fixed the lost password link on the login page.
* Pending a fix to correct the redirect upon logout. It involves a WP redirect of a one-time URL that the plugin needs to allow. I can't allow it without allowing all remote attacks again.
* This plugin is solid, once again.

= 2.1.0 =
* Corrected the logout link in the dashboard and the lost password link on the login page.

= 2.0.2 =
* Bugfix - activating plugin error

= 2.0.1 =
* Fixed login redirect bug if logged out.
* Updated Polish translation for v2.0.x

= 2.0.0 =
* Plugged security hole that allowed remote form submissions - CRITICAL UPDATE
* Requires all fields be filled in on the settings page to avoid saving incomplete entries.

= 1.1.3 =
* Added Settings Link on the Plugins page to link to the settings.
* Added useful links to the settings page.

= 1.1.2 =
* Polish localization.
* Updated FAQ with new information on why lockouts can still happen. I am working out how to protect from that, also, if it is at all possible.

= 1.1.1 =
* Bugfix: PHP debug error when activated by not enabled.
* Elaborated readme.txt to point out that this does not replace "best practices" for security protocol in other areas. This is simply another layer.

= 1.1.0 =
* Localization release.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 4.0.0 =
* Visit the settings page to enable NEW settings.
* TOTALLY re-worked mehodology. It is backwards compatible, so if you don't change anything, it will still work, but you WON'T see new benefits.
* WordPress 3.6 compatibility.
* Complete re-build of the structure, code, and methodology of its security.

= 3.0.0 =
* Added full MU support.
* Disabled the login/logout/lost-password URL filtering - it knows if you're logged in.
* Added wp-config.php settings support to bypass the settings page if you're locked out or in a MU environment.

= 2.1.2 =
* Efficiencies improved.
* Edited global variables for efficiency.
* Eliminated potential conditional statment oversights in later updates.

= 2.1.1 =
* CRITICAL Bugfix - stealth re-enabled AND fixed the lost password link on the login page.
* Pending a fix to correct the redirect upon logout. It involves a WP redirect of a one-time URL that the plugin needs to allow. I can't allow it without allowing all remote attacks again.
* This plugin is solid, once again.

= 2.1.0 =
* Corrected the logout link in the dashboard and the lost password link on the login page.

= 2.0.2 =
* Bugfix - activating plugin error

= 2.0.1 =
* Fixed login redirect bug if logged out.
* Updated Polish translation for v2.0.x

= 2.0.0 =
* Plugged security hole that allowed remote form submissions - CRITICAL UPDATE
* Requires all fields be filled in on the settings page to avoid saving incomplete entries.

= 1.1.3 =
* Added Settings Link on the Plugins page to link to the settings.
* Added useful links to the settings page.

= 1.1.2 =
* Polish localization.
* Updated FAQ with new information on why lockouts can still happen. I am working out how to protect from that, also, if it is at all possible.

= 1.1.1 =
* Bugfix: PHP debug error when activated by not enabled.
* Elaborated readme.txt to point out that this does not replace "best practices" for security protocol in other areas. This is simply another layer.

= 1.1.0 =
* Localization release. Added German localization.

= 1.0.0 =
Initial stable release.