<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.1//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php if (is_home()) { bloginfo('name'); } ?><?php if (is_month()) { the_time('F Y'); } ?><?php if (is_category()) { single_cat_title(); } ?><?php if (is_single()) { the_title(); } ?><?php if (is_page()) { the_title(); } ?><?php if (is_tag()) { single_tag_title(); } ?><?php if (is_404()) { echo "Page Not Found!"; } ?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>?v=1.2" media="screen" />
		<meta name="generator" content="WordPress and MobilePress" />
		<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>

<meta name="format-detection"content="telephone=no, email=no" />
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="msapplication-tap-highlight" content="no">
<meta name="applicable-device" content="mobile">

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel='stylesheet' id='crayon-css'  href='http://www.521php.com/wp-content/plugins/crayon-syntax-highlighter/css/min/crayon.min.css?ver=2.6.9' type='text/css' media='all' />
<link rel='stylesheet' id='crayon-theme-ado-css'  href='http://www.521php.com/wp-content/plugins/crayon-syntax-highlighter/themes/ado/ado.css?ver=2.6.9' type='text/css' media='all' />
<link rel='stylesheet' id='crayon-font-courier-new-css'  href='http://www.521php.com/wp-content/plugins/crayon-syntax-highlighter/fonts/courier-new.css?ver=2.6.9' type='text/css' media='all' />
		<script type="application/x-javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>	
        <script type="application/x-javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/google-code-prettify/prettify.js"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var CrayonSyntaxSettings = {"version":"2.6.9","is_admin":"0","ajaxurl":"http:\/\/www.521php.com\/wp-admin\/admin-ajax.php","prefix":"crayon-","setting":"crayon-setting","selected":"crayon-setting-selected","changed":"crayon-setting-changed","special":"crayon-setting-special","orig_value":"data-orig-value","debug":""};;
var CrayonSyntaxStrings = {"copy":"\u4f7f\u7528 %s \u590d\u5236\uff0c\u4f7f\u7528 %s \u7c98\u8d34\u3002","minimize":"\u70b9\u51fb\u5c55\u5f00\u4ee3\u7801"};
/* ]]> */
</script>	
<script type='text/javascript' src='http://www.521php.com/wp-content/plugins/crayon-syntax-highlighter/js/min/crayon.min.js?ver=2.6.9'></script>
	</head>

	<body onload="prettyPrint()">
	
		<div id="headerwrap">
			
			<div id="header">
				<h1>
                    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <ul id="top-nav">
                        <li><a id="shownav" href="###">分类</a></li>
                        <li><a href="<?php bloginfo('url'); ?>">首页</a></li>
                </ul>
                <div class="cl"></div>
			</div>
			
		</div>
		