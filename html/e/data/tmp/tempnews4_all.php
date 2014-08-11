<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>[!--pagetitle--] - 张存超php个人博客</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--picsay--]" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
var yuntu = {};
yuntu.js_base_url = 'http://s5.suc.itc.cn/ux_cloud_atlas/v20121204192700/js/';
yuntu.page_render_started_at = +new Date;
yuntu.img_domain = "http://img.itc.cn";
yuntu.login_user_id = 0;
yuntu.login_user_nick = '';
yuntu.login_user_avatar_mini = '';
yuntu.login_user_avatar = '';
</script>
<script src="/js/require-jquery-1.7.2.js" data-main="http://s5.suc.itc.cn/ux_cloud_atlas/js/main.v20121120233600.js"></script>
<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript">
$(function() {
    $('#gallery a').lightBox();
});
</script>
<!--[if IE]>
<style type="text/css"> 
html { 
/*这个可以让IE6下滚动时无抖动*/ 
background: url(about:black) no-repeat fixed 
} 
#header{ 
position: absolute; 
top: expression(offsetParent.scrollTop + 0); 
}
#jquery-overlay { 
position: absolute; 
top: expression(offsetParent.scrollTop + 0); 
}
</style> 
<![endif]--> 
</head>

<body class="global">

<!-- 头部 start-->
<!-- 头部 start-->
<div id="top">
<div id="header">
  <div class="navbar fleft">
    <a class="logo" href="/">我爱你php张存超技术博客</a>
    <ul>
     <li><a href="/archives/category/cclog/" target="_blank" title="随笔">随笔</a></li>
     <li><a href="/archives/category/zong/" target="_blank" title="总结">总结</a></li>
     <li><a href="/archives/category/lovephp/" target="_blank" title="我爱php">我爱php</a></li>
	 <li><a href="/archives/category/else/" target="_blank" title="杂谈">杂谈</a></li>
	 <li><a href="/archives/category/gongneng/" target="_blank" title="小功能">小功能</a></li>
	 <li><a href="/tg/" target="_blank" title="本站推广">本站推广</a></li>
         <li><a href="/wailian/" target="_blank" title="自助外链">自助外链</a></li>
 <li><a href="/xiangce/"  title=返回相册">返回相册</a></li>
    </ul>
  </div>
  <div class="pull fr">
   
  </div>
</div>
</div>
<!-- 头部 end-->

<!-- 主体 start-->
<div class="container">
  <div class="row">
    
    <!-- 第一块 start-->
    <div class="mod profileheader">
    <div class="co_1 fleft">
<a href="http://weibo.com/u/2785059384?s=6uyXnP" target="_blank"><img src="/cc.jpg" width="95" height="95" alt="名字"></a>
     <p class="name"><span class="gap">php攻城师</span></p>
     <p class="content"><span data-text="张存超">专注于php编程！<br />[!--pagedes--]<br />[!--picsay--]</span></p>
    </div>
    <div class="si_1">
     <!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<span class="bds_more">分享到：</span>
<a class="bds_qzone"></a>
<a class="bds_tsina"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=755839" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
      <ul class="profile-stats">
       <?php $con=$empire->fetch1("select count(id) from phome_ecms_photo where classid='{$GLOBALS[navclassid]}' and havehtml='1'");
	   ?>
        <li class="no-border">
          <div>
            <a href="/u/12151"><span class="title">现已上图片集</span><span class="value"><?=$con[0]?></span><span class="title">个</span></a>
          </div>
        </li>
      </ul>
    </div>
   </div>
   <!-- 第一块 end-->
   <!-- 第一块 end-->
   
   <!-- 第二块 start-->
    <div class="grid-shell">
    <div class="gallery album" id="gallery">
	<?php
		$a = explode("
",$navinfor['morepic']);
		foreach($a as $key=>$val){
			$img = explode('::::::',$val);
	?>
	<div class="gallery-item mold hide">
        <div class="list fleft">
         <span><a href="<?php echo $img[1];?>" title="www.521php.com"><img src="<?php echo $img[1];?>" width="283" title='www.521php.com'  alt="[!--pagetitle--]"></a></span>
         <p><?=sub($img[2],0,230,false)?></p>
         <span id="test<?php echo $key;?>" style="display:none;"><?php echo $img[2];?></span>
        </div>
      </div>
	<?php
		}
	?>
    </div>
    </div> 
    <!-- 第二块 end-->
  
  </div>
</div>
<!-- 主体 end-->

<!-- 底部 start-->
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
<!-- 底部 end-->
<script>require(['pages/folders']);</script>
</body>
</html> 
  