<?php
/**
 * ----------------------------------------------------
 * Wireless WordPress
 * @author 乱了感觉(http://messense.me)
 * @version 1.0
 */
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=<?php bloginfo('charset'); ?>" />
        <title><?php if (is_home()) { ?><?php bloginfo('name');if (isset($paged) && $paged > 1)echo " - 第{$paged}页";?><?php } else { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?></title>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="all" />
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h2><a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h2>
                <p><?php bloginfo('description'); ?></p>
            </div>
            <div id="nav">
                <?php wp_nav_menu(array('menu'=>'wap')); ?>
            </div>