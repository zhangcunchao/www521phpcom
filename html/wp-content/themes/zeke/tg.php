<?php
/*
Template Name: tg
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="all" />
<title>湖南卫视 | 湖南卫视直播 我爱你PHP张存超技术博客</title>
<meta name="description" content="湖南卫视在线直播，同步，可回看评论 ，淘宝推广，手机充值，虚拟主机，空间，淘宝商品，减肥，玩具，淘宝商品搜索，淘宝橱窗" />
<meta name="keywords" content="湖南卫视，手机充值，虚拟主机，空间，淘宝商品，减肥，玩具，淘宝商品搜索" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
<!--[if lt IE 7]>
<script type="text/javascript" src="/wp-content/themes/MRuu2011/MRjs/iepngfix_tilebg.js"></script>
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
            <input class="field" name="s" id="s" type="text" value="百度谷歌一起搜！" onfocus="this.value=&#39;&#39;;" onblur="if(this.value==&#39;&#39;){this.value=&#39;百度谷歌一起搜！&#39;;}">
            <input name="" type="submit" value="" class="so"id="go"  onmouseout="this.className=&#39;so&#39;" onmouseover="this.className=&#39;soHover&#39;">
            </form></div>
        </div>
        <div id="nav">
        	<div class="menuL"><?php wp_nav_menu('container=\'\'&menu_id=menu&title_li=&link_before=<span>&link_after=</span>'); ?></div>
            <div class="rss_ico"><a href="<?php $options = get_option('mruu_options'); if ($options['feed_url']) {echo($options['feed_url']);} else  bloginfo('rss2_url'); ?>" target="_blank" rel="nofollow" title="RSS订阅">RSS订阅</a></div>
        </div>
    </div>
<!--头部End-->

<style>
<!--
#comment_body {padding-left: 14px;*margin: 10px 0px 0px; }
#respond {padding-left: 14px;margin: 10px 0px; }
.sid_link_img_page img{height:180px;}
.sid_link_img_page div span{color:red;font-size:20px;margin-left:30px;}
-->
</style>
<!--中间内容-->
    <div id="container">
    	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>湖南卫视</H3></div>
                    <div class="content_banner pagers_text">
<span id="show">
                    	<embed id="null" width="100%" height="420" type="application/x-shockwave-flash" src="http://resource.fengyunzhibo.com:1863/players/players.php" allowfullscreeninteractive="true" allowfullscreen="true" allowscriptaccess="always" quality="high" cachebusting="true" wmode="window" bgcolor="#000000" flashvars="config=%7B%22type%22%3A%22live%22%2C%22partner%22%3A%22useelive%22%2C%22channel%22%3A%220000000001_1342934731354%22%7D"></span>
<textarea name="txtAdCode" rows="8" cols="40" style="display:none;">
<title>湖南卫视在线直播</title>
<style>
*{margin:0;padding:0;}
</style>
<embed id="null" width="100%" height="100%" type="application/x-shockwave-flash" src="http://resource.fengyunzhibo.com:1863/players/players.php" allowfullscreeninteractive="true" allowfullscreen="true" allowscriptaccess="always" quality="high" cachebusting="true" wmode="window" bgcolor="#000000" flashvars="config=%7B%22type%22%3A%22live%22%2C%22partner%22%3A%22useelive%22%2C%22channel%22%3A%220000000001_1342934731354%22%7D">
</textarea><br>
<input type="button" onclick="runCode(this.offsetParent.getElementsByTagName('textarea')[0])" value="全屏播放" /> <script>
function runCode(obj)  //定义一个运行代码的函数，
{
   document.getElementById("show").innerHTML='';
  var code=obj.value;//即要运行的代码。
  var newwin=window.open('','','');  //打开一个窗口并赋给变量newwin。
  newwin.opener = null // 防止代码对论谈页面修改
  newwin.document.write(code);  //向这个打开的窗口中写入代码code，这样就实现了运行代码功能。
  newwin.document.close();
}</script>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
<!--推广1-->
			<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>推广分类</H3></div>
                    <div class="content_banner pagers_text">
                    	<ul class="sid_link_text_page">
						    <li><a href="#sstg" rel="co-worker" title="搜索推广">搜索推广</a></li>
                            <li><a href="#sjcz" rel="co-worker" title="手机充值">手机充值</a></li>
							<li><a href="#xnzj" rel="co-worker" title="虚拟主机">虚拟主机</a></li>
                      </ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
           <!--推广1-->
        	<!--推广1-->
			<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>置顶推广</H3></div>
                    <div class="content_banner pagers_text">
					<iframe name="alimamaifrm" frameborder="0" marginheight="0" marginwidth="0" border="0" scrolling="no" width="640" height="830" src="http://top.taobao.com/interface_v2.php?pid=mm_30958902_3426892_11094235&type=x&f=html&ie=utf8&from=taoke&unid=&name=%E4%BB%8A%E6%97%A5%E5%85%B3%E6%B3%A8%E9%A3%99%E5%8D%87&trtp=1&up=true&goodsFilter=all&sw=640&sh=830&sn=9&rn=3&pn=26&ls=1&rs=1&bgc=FFFFFF&bc=D9D9D9&fc=404040&tc=404040&cat_ids=TR_SM,TR_HZP,TR_FS,TR_MY,TR_SP,TR_WT,TR_JJ,TR_ZH" ></iframe>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
           <!--推广1-->
<!--推广2-->
			<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title" id="sstg"><H3>搜索推广</H3></div>
                    <div class="content_banner pagers_text">
                    	<script type="text/javascript">
alimama_pid="mm_30958902_3426892_11094235";
alimama_type="g";
alimama_tks={};
alimama_tks.style_i=1;
alimama_tks.lg_i=1;
alimama_tks.w_i="640";
alimama_tks.h_i=69;
alimama_tks.btn_i=1;
alimama_tks.txt_s="虚拟空间";
alimama_tks.hot_i=1;
alimama_tks.hc_c="030000";
alimama_tks.cid_i=0;
alimama_tks.c_i=1;
</script>
<script type="text/javascript" src="http://a.alimama.cn/inf.js"></script>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
           <!--推广2-->
		   <!--推广3-->
			<div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title" id="sjcz"><H3>手机充值</H3> 随即筛选商家，您可以切换点击，选择较优惠的价格！</div>
                    <div class="content_banner pagers_text" align="center">
                    	<iframe name="alimamaifrm" frameborder="0" marginheight="0" marginwidth="0" border="0" scrolling="no" width="300" height="170" src="http://www.taobao.com/go/app/tbk_app/chongzhi_300_170.php?pid=mm_30958902_3426892_11360529&page=chongzhi_300_170.php&size_w=300&size_h=170&stru_phone=1&stru_game=1&stru_travel=1" ></iframe>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
           <!--推广3-->
               
                <div class="content_text">
            	<div class="content_t_top"><!--样式头部--></div>
           		<div class="content_t_main">
               		<!--ContentTitle-->
                    <div class="pagers_title"><H3>本站推广声明：</H3></div>
                    <div class="content_banner pagers_text">
                    	<ul>
<li>一、本站仅推广安全、健康、合法、正规的有形和虚拟商品，如有违规商品一律不予通过。</li>
<li>二、本站推广借助第三方统计工具，对商品进行全程统计，避免交易纠纷。</li>
<li>三、双方本着合作共赢的原则，促进交易的合理、合法、合情，在友好、公平、愉快的环境下进行。</li>
</ul>
                    </div>
           		</div>
                <div class="content_t_bot"><!--样式尾部--></div>
                </div>
<?php endwhile;else : ?>
<div class="errorbox">
<?php _e('Sorry, no posts matched your criteria.', 'mruu'); ?>
</div>
<?php endif; ?>
<?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
?>
        </div>
       <div id="sidebar">
			<!--自我介绍-->
			<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3>推广公告</H3>
                        </div>
                    </div>
                    <div class="sid_body"><div><img src="http://www.521php.com/wp-content/themes/zeke/fly.gif" width="200" height="180" /></div>
					<p style="text-align:left; font-size:12px;">
本站仅推广安全、健康、合法、正规的有形和虚拟商品<br />如有违规商品一律不予通过<br />本站推广借助第三方统计工具，对商品进行全程统计，避免交易纠纷。<br /><a href="https://me.alipay.com/zhangcunchao" target="_blank"><img src="/wp-content/themes/zeke/btn-index.png" height="40" /></a> <img src="/wp-content/themes/zeke/gx.gif" height="40" />			
					</p>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>


            <!--腾讯微博-->
            <div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3>我的微博</H3>
                        </div>
                    </div>
                    <!--微博等嵌入式框架宽度为230px-->
                    <div class="sid_body sid_Blog">
<iframe width="226" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=226&height=550&fansRow=2&ptype=1&speed=300&skin=3&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=2785059384&verifier=8c3b9a87&dpc=1"></iframe>											
					</div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>


            
						<div class="sidebar_body">
           	  <div class="sidebar_b_top"><!--样式头部--></div>
                <div class="sidebar_b_main">
                	<div class="sid_ify">
                    	<div class="sid_ify_bg">
                            <H3><a href="/tg/" title="进入本站推广">进入本站推广</a></H3>
                        </div>
                    </div>
                    <div class="sid_body" align="center">
                    	<script type="text/javascript"> 
alimama_pid="mm_30958902_3426892_11360192"; 
alimama_width=200; 
alimama_height=200; 
</script> 
<script src="http://a.alimama.cn/inf.js" type="text/javascript"> 
</script>
                    </div>
                </div>
                <div class="sidebar_b_bot"><!--样式尾部--></div>
            </div>
</div>				
<?php get_footer(); ?>