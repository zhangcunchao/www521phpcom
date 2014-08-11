<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[!--pagetitle--] - Powered by EmpireCMS</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<link href="[!--news.url--]skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
</head>
<body class="listpage">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%"> 
<!-- 登录 -->
<script>
document.write('<script src="[!--news.url--]e/member/login/loginjs.php?t='+Math.random()+'"><'+'/script>');
</script>
</td>
<td align="right">
<a onclick="window.external.addFavorite(location.href,document.title)" href="#ecms">加入收藏</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('[!--news.url--]')" href="#ecms">设为首页</a> | <a href="[!--news.url--]e/member/cp/">会员中心</a> | <a href="[!--news.url--]e/DoInfo/">我要投稿</a> | <a href="[!--news.url--]e/web/?type=rss2&classid=[!--self.classid--]" target="_blank">RSS<img src="[!--news.url--]skin/default/images/rss.gif" border="0" hspace="2" /></a>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="10">
<tr valign="middle">
<td width="240" align="center"><a href="[!--news.url--]"><img src="[!--news.url--]skin/default/images/logo.gif" width="200" height="65" border="0" /></a></td>
<td align="center"><a href="http://www.phome.net/OpenSource/" target="_blank"><img src="[!--news.url--]skin/default/images/opensource.gif" width="100%" height="70" border="0" /></a></td>
</tr>
</table>
<!-- 导航tab选项卡 -->
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
  <tr> 
    <td class="nav_global"><ul>
        <li class="curr" id="tabnav_btn_0" onmouseover="tabit(this)"><a href="[!--news.url--]">首页</a></li>
        <? @sys_ShowClassByTemp('0',12,0,0);?> </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="news_list"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
<tr>
<td>您当前的位置：[!--newsnav--]</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td>[!--empirenews.listtemp--]<ul>
<!--list.var1-->
<!--list.var2-->
<!--list.var3-->
<!--list.var4-->
<!--list.var5--></ul>
[!--empirenews.listtemp--]
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
                <td height="38"><div class="epages">[!--show.listpage--]</div></td>
</tr>
</table>
</td>
</tr>
</table></td>
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>推荐资讯</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="8" cellpadding="0" class="box">
<tr>
<td><? @sys_GetClassNewsPic('selfinfo',2,4,128,90,1,20,2);?>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>最后更新</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<? @sys_GetEcmsInfo('selfinfo',10,44,0,0,2,0);?> 
</ul></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>热门点击</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ol class="rank">
<? @sys_GetEcmsInfo('selfinfo',10,40,0,1,10,0);?> 
</ol></td>
</tr>
</table></td>
</tr>
</table>
<div id="footer">
<!-- UY BEGIN -->
<div id="uyan_frame"></div>
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1699342" async=""></script>
<!-- UY END -->

 <span>Copyright @ 2013 www.521php.com Inc. All rights reserved. 我爱你张存超技术博客 版权所有 未经允许不可进行转载。 </span>
 <div class="pull-right">
    <a target="_blank" href="/archives/category/linux/">linux</a> -
    <a target="_blank" href="/archives/category/wordpress/">wordpress</a> -
    <a target="_blank" href="/archives/category/team/">博采众长</a> -
<a target="_blank" href="/flink/">兄弟链</a> -<script type="text/javascript" src="http://www.521php.com/api/tz/"></script>
<script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script>
<script type="text/javascript" src="http://www.521php.com/wailian/public/scripts/tj.js"></script>
 </div>
</div>
</body>
</html>