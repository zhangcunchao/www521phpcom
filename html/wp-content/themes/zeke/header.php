<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="all" />
<?php
include('includes/seo.php');
 ?>
<!--<base target="_blank" />-->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory'); ?>/miaov_style.css" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
<?php if ( is_singular() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
<?php } ?>
<script src="http://libs.useso.com/js/jquery/1.9.1/jquery.min.js"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="/wp-content/themes/MRjs/iepngfix_tilebg.js"></script>
<script type="text/javascript">
// <![CDATA[
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
try{
document.execCommand("BackgroundImageCache", false, true);
}
catch(e){}
// ]]>
</script>
<![endif]-->
</head>

<body>
<div id="wrap">
<!--头部-->
	<div id="header">
    	<div id="top">
        	<div class="mrlogo"><a href="<?php echo get_option('home'); ?>/" title="<?php if ( is_singular() || is_archive() ) { wp_title(''); } else { bloginfo('name'); } ?>-<?php bloginfo('description'); ?>"><?php if ( is_singular() || is_archive() ) { wp_title(''); } else { bloginfo('name'); } ?>-<?php bloginfo('description'); ?></a></div>
            <div class="search"><form method="get" target="_blank" id="searchform" action="http://www.521php.com/so.php">
<input type="hidden" name="url" value="521php.com" />
            <input class="field" name="s" id="s" type="text" value="百度谷歌一起搜！" onfocus="this.value=&#39;&#39;;" onblur="if(this.value==&#39;&#39;){this.value=&#39;百度谷歌一起搜！&#39;;}" />
            <input name="" type="submit" value="" class="so"id="go"  onmouseout="this.className=&#39;so&#39;" onmouseover="this.className=&#39;soHover&#39;" />
            </form></div>
        </div>
        <div id="nav">
        	<div class="menuL"><?php wp_nav_menu('container=\'\'&menu_id=menu&title_li=&link_before=<span>&link_after=</span>'); ?><span class="bgic"><img src="/images/bgic.gif"></span></div>
            <div class="rss_ico"><a href="<?php $options = get_option('mruu_options'); if ($options['feed_url']) {echo($options['feed_url']);} else  bloginfo('rss2_url'); ?>" target="_blank" rel="nofollow" title="RSS订阅">RSS订阅</a></div>
        </div>
    </div>
<!--头部End-->
<div class="share_more" id="share_more" style="DISPLAY: none; LEFT: 160px; POSITION: absolute; TOP: 442px;">
<p onMouseOver="share_more_element.style.display='block';" onmouseout="share_more_element.style.display='none';">
<A class=share>分享到...</A> 
<A class="qqt" href="javascript:doShare('qqt');">腾讯微博</A>
<A class="sinat" href="javascript:doShare('sinat');">新浪微博</A>
<A class="qqpeng" href="javascript:doShare('qqpeng');">QQ朋友</A>
<A class="renren" href="javascript:doShare('renren');">人人网</A>
<A class="douban" href="javascript:doShare('douban');">豆瓣</A></p></div>
<SCRIPT type=text/javascript>
var share_more_element = null;
var share_postid = -1;
var postArray = [];
function getPos(obj){
	var pos = [];
	pos[0] = obj.offsetLeft;//X
	pos[1] = obj.offsetTop;//Y
	while (obj = obj.offsetParent){
		pos[0] += obj.offsetLeft;
		pos[1] += obj.offsetTop;
	}
	return pos;
}
//显示隐藏层
function share_more(postid, obj){
	share_postid = postid;
	var objPos = getPos(obj);
	objPos[0]-=7;objPos[1]-=5;
	if(share_more_element == null)share_more_element=document.getElementById("share_more");
	share_more_element.style.left=objPos[0]+"px";
	share_more_element.style.top=objPos[1]+"px";
	share_more_element.style.display="block";
}
//添加收藏夹
function doShare(stype){
	stitle = postArray[share_postid][0];
	surl = postArray[share_postid][1];
	sdire = postArray[share_postid][2];
	sbanner = postArray[share_postid][3];
	
	blogtitle = '张存超技术博客';
	bloghome = 'http://www.521php.com';
	
	stitle = blogtitle + ' - ' + stitle;
	
	switch(stype){
		case "fav":
			if (document.all){
				window.external.addFavorite(surl,stitle);
			}
			else if (window.sidebar){
				window.sidebar.addPanel(stitle,surl, "");
			}
			else{
				alert("抱歉,您的浏览器不支持添加到收藏夹,换个浏览器试试?");
			}
			break;
		//腾讯微博
		case "qqt":
			u=encodeURIComponent(surl);
			t=encodeURIComponent('#博客#：' + stitle);
			b=encodeURIComponent(sbanner);
			su=encodeURIComponent(bloghome);
			window.open('http://v.t.qq.com/share/share.php?title='+t+'&url='+u+'&site='+su+'&pic='+b,'_blank');	
			break;
		//新浪微博
		case "sinat":
			u=encodeURIComponent(surl);
			t=encodeURIComponent('#博客#：' + stitle);
			b=encodeURIComponent(sbanner);
			su=encodeURIComponent(bloghome);
			window.open('http://v.t.sina.com.cn/share/share.php?title='+t+'&url='+u+'&site='+su+'&pic='+b,'_blank');	
			break;
		//QQ朋友
		case "qqpeng":
			u=encodeURIComponent(surl);
			t=encodeURIComponent(stitle);
			b=encodeURIComponent(sbanner);
			su=encodeURIComponent(bloghome);
			window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?to=pengyou&title='+t+'&url='+u+'&site='+su+'&pic='+b,'_blank');	
			break;
		//谷歌
		case "googlereader":
			u=encodeURIComponent(surl);
			t=encodeURIComponent(stitle);
			su=encodeURIComponent(bloghome);
			st=encodeURIComponent(blogtitle);
			window.open('http://www.google.com/reader/link?url='+u+'&title='+t+'&snippet=&srcTitle='+st+'&srcUrl='+su,'_blank');
			break;
		//人人网
		case "renren":
			u=encodeURIComponent(surl);
			t=encodeURIComponent(stitle);
			window.open('http://share.renren.com/share/buttonshare.do?link='+u+'&title='+t+'source=&sourceUrl=','_blank');
			break;
		//豆瓣
		case "douban":
			u=encodeURIComponent(surl);
			t=encodeURIComponent(stitle);
			window.open('http://www.douban.com/recommend/?url='+u+'&title='+t,'_blank');
			break;
	}
}
</SCRIPT>

<SCRIPT>postArray[0]=[];postArray[0][0]="张存超技术博客";postArray[0][1]="http://www.521php.com";postArray[0][2]="521PHP博客 - http://www.521php.com";postArray[0][3]="http://www.521php.com/logo.png";</SCRIPT>
