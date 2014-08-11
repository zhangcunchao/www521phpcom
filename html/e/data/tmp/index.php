<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>帝国网站管理系统 - Powered by EmpireCMS</title>
<meta name="keywords" content="帝国网站管理系统,EmpireCMS" />
<meta name="description" content="　　帝国软件是一家专注于网络软件开发的科技公司，其主营产品“帝国网站管理系统(EmpireCMS)”是目前国内应用最广泛的CMS程序。通过多年的不断创新与完善，使系统集安全、强大、稳定、灵活于一身。目前EmpireCMS程序已经广泛应用在国内数十万家网站，覆盖国内上千万上网人群，并经过上千家知名网站的严格检测，被称为国内最安全、最稳定的开源CMS系统。" />
<link href="/skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
</head>
<body class="homepage">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%"> 
<!-- 登录 -->
<script>
document.write('<script src="/e/member/login/loginjs.php?t='+Math.random()+'"><'+'/script>');
</script>
</td>
<td align="right">
<a onclick="window.external.addFavorite(location.href,document.title)" href="#ecms">加入收藏</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('/')" href="#ecms">设为首页</a> | <a href="/e/member/cp/">会员中心</a> | <a href="/e/DoInfo/">我要投稿</a> | <a href="/e/web/?type=rss2&classid=0" target="_blank">RSS<img src="/skin/default/images/rss.gif" border="0" hspace="2" /></a>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="10">
<tr valign="middle">
<td width="240" align="center"><a href="/"><img src="/skin/default/images/logo.gif" width="200" height="65" border="0" /></a></td>
<td align="center"><a href="http://www.phome.net/OpenSource/" target="_blank"><img src="/skin/default/images/opensource.gif" width="100%" height="70" border="0" /></a></td>
</tr>
</table>
<!-- 导航tab选项卡 -->
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
  <tr> 
    <td class="nav_global"><ul>
        <li class="curr" id="tabnav_btn_0" onmouseover="tabit(this)"><a href="/">首页</a></li>
        <? @sys_ShowClassByTemp('0',12,0,0);?> </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>最后更新</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<? @sys_GetEcmsInfo(0,11,28,0,3,2,0);?>
</ul>
<? @sys_GetEcmsInfo(0,1,18,0,5,5,1);?></td>
</tr>
</table></td>
<td class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
          <td> 
            <!-- 焦点图片，调用默认模型带标题图片的头条信息 -->
            <? @sys_FlashPixpic(0,3,450,250,0,0,13,3);?> </td>
</tr>
</table>
<!-- 头条信息调用 -->
<table width="100%" border="0" cellspacing="8" cellpadding="0" class="focus">
<tr>
<td><? @sys_GetEcmsInfo(0,1,50,0,13,8,0);?></td>
</tr>
<tr>
<td align="center"><? @sys_GetEcmsInfo(0,'1,2',28,0,13,4,0);?></td>
</tr>
</table></td>
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>推荐资讯</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box no_doc">
<tr>
<td><ul>
<? @sys_GetEcmsInfo(0,5,28,0,5,3,0);?>
</ul></td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" class="banner_ad"><a href="http://www.phome.net/ebak2008/" target="_blank" title="马上免费下载"><img src="/skin/default/images/empirebak.gif" width="920" height="90" border="0" /></a></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td width="230" class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong><a href="/info/">分类信息</a></strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<? @sys_GetEcmsInfo('info',10,28,0,18,2,0);?>
</ul></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong><a href="/download/">下载更新</a></strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box no_doc">
<tr>
<td><ul>
              <? @sys_GetEcmsInfo('download',4,26,0,18,9,0);?> 
            </ul></td>
</tr>
</table></td>
<td class="content"><!-- tab选项卡，默认为点击变化，如需改为移动，将onmouseover改为onclick -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbtn1">
<tr>
<td class="tbtncon"><ul><li class="curr" id="tab1_btn_0" onmouseover="etabit(this)">新闻</li><li id="tab1_btn_1" onmouseover="etabit(this)">图片</li><li id="tab1_btn_2" onmouseover="etabit(this)">影视</li><li id="tab1_btn_3" onmouseover="etabit(this)">FLASH</li></ul></td>
</tr>
<tr>
<td class="picList"><div id="tab1_div_0"> <? @sys_GetClassNewsPic('news',3,6,128,90,1,20,20);?> 
            </div>
            <div id="tab1_div_1" style="display:none;"> <? @sys_GetClassNewsPic('photo',3,6,128,90,1,20,20);?> 
            </div>
            <div id="tab1_div_2" style="display:none;"> <? @sys_GetClassNewsPic('movie',3,6,128,90,1,20,20);?> 
            </div>
            <div id="tab1_div_3" style="display:none;"> <? @sys_GetClassNewsPic('flash',3,6,128,90,1,20,20);?> 
            </div></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>精彩专题</strong></td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
<tr valign="top">
<td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="news_title">
<tr>
                <td><? @sys_GetEcmsInfo(34,1,20,0,2,8,0);?> </td>
</tr>
</table>
<ul>
              <? @sys_GetEcmsInfo(34,7,26,0,0,2,0);?> 
            </ul></td>
<td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="news_title">
<tr>
                <td><? @sys_GetEcmsInfo(35,1,20,0,2,8,0);?></td>
</tr>
</table>
<ul>
              <? @sys_GetEcmsInfo(35,7,26,0,0,2,0);?> 
            </ul></td>
</tr>
</table></td>
<td width="240" class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>热门点击</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ol class="rank">
<? @sys_GetEcmsInfo(0,10,28,0,4,10,0);?> 
</ol></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>热门评论文章</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<? @sys_GetEcmsInfo(0,13,28,0,10,2,0);?> 
</ul></td>
</tr>
</table></td>
</tr>
</table>
<!-- 友情链接 -->
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="links">
<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E9F2FB" class="title">
<tr>
<td><strong>友情链接</strong></td>
          <td align="right">&nbsp;</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="box">
<tr>
          <td>
            <!-- 文字链接 -->
            <? @sys_GetSitelink(9,18,2,0,1);?> 
            <hr width="100%" size="1" noshade="noshade" />
            <!-- logo链接 -->
            <? @sys_GetSitelink(9,18,1,0,1);?></td>
</tr>
</table></td>
</tr>
</table>
<!-- 页脚 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="search">
<form action="/e/search/index.php" method="post" name="searchform" id="searchform">
<table border="0" cellspacing="6" cellpadding="0">
<tr>
<td><strong>站内搜索：</strong>
<input name="keyboard" type="text" size="32" id="keyboard" class="inputText" />
<input type="hidden" name="show" value="title" />
<input type="hidden" name="tempid" value="1" />
<select name="tbname">
<option value="news">新闻</option>
<option value="download">下载</option>
<option value="photo">图库</option>
<option value="flash">FLASH</option>
<option value="movie">电影</option>
<option value="shop">商品</option>
<option value="article">文章</option>
<option value="info">分类信息</option>
</select>
</td>
<td><input type="image" class="inputSub" src="/skin/default/images/search.gif" />
</td>
<td><a href="/search/" target="_blank">高级搜索</a></td>
</tr>
</table>
</form>
</td>
</tr>
<tr>
<td>
	<table width="100%" border="0" cellpadding="0" cellspacing="4" class="copyright">
        <tr> 
          <td align="center"><a href="/">网站首页</a> | <a href="#">关于我们</a> 
            | <a href="#">服务条款</a> | <a href="#">广告服务</a> | <a href="#">联系我们</a> 
            | <a href="#">网站地图</a> | <a href="#">免责声明</a> | <a href="/e/wap/" target="_blank">WAP</a></td>
        </tr>
        <tr> 
          <td align="center">Powered by <strong><a href="http://www.phome.net" target="_blank">EmpireCMS</a></strong> 
            <strong><font color="#FF9900">6.6</font></strong>&nbsp; &copy; 2002-2011 
            <a href="http://www.digod.com" target="_blank">EmpireSoft Inc.</a></td>
        </tr>
	</table>
</td>
</tr>
</table>
</body>
</html>