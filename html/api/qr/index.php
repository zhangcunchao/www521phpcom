<?php
error_reporting(E_ALL ^ E_NOTICE); 
include "phpqrcode.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>二维码在线生成工具</title>
	<link rel="stylesheet" href="images/base.css">
	<link rel="stylesheet" href="images/QRcode.css"></head>
<body>
	<div class="container">
		<div class="clearfix mb20">
			<h1 class="fl">二维码在线生成工具</h1>		    
		</div>
		
		<div class="QRcode clearfix">
		
			<div class="QRcode-editor fl pr">
				<ul class="QRcode-class clearfix">
					<li class="active" name="text">输入内容</li>
					
				</ul>
							<div class="QRcode-classContent">
					<div class="urlORText">
						<p class="explain">网址/文本生成二维码</p>
						<p class="pr">
							
							<form id="iform" name="iform" method="post" action=""><textarea name="content" id="content"><?php echo $_POST['content']; ?></textarea>
						</p>
						<div class="none" id="bookmarkShell">
							
							</p>
						</div>
					</div>
					
				</div>
					<div class="quick"><input name="go" type="submit" id="go" onclick="" value="输入内容后，点击这里就可以生成QR" />
<input name="done" type="hidden" value="done" />

</form></div>

			</div>
			<div class="QRcode-show fr">
				<p class="tc"></p>
				<div class="pr zoom">
					<p class="tc" id="QRcode-showBox"><?php 
if ($_POST['done']){
   if($_POST['content']){
	$c = $_POST['content'];

	$len = strlen($c);
	   if ($len <= 360){
	    
	
	   QRcode::png($c, 'png/1.png');	
	   echo '<img src="png/1.png" /><br />'.$c; 
	   }
	   else {
	     echo '亲！信息量过大。';
	   }	
    }
    else {
     echo '亲！你没有输入内容。';
    }
}	
else {
  echo '二维码将会出现在这里。';
}
	?></p>
					
				</div>
			</div>
		</div>

		<div class="qrIntro f14 mt10">
			<p class="t2">二维码，又叫QR码，是在一维条码的基础上扩展出的一种具有可读性的条码，用某种特定的几何图形按一定规律在平面上分布的黑白相间的图形记录数据符号信息。</p>
			<p class="mt5 t2">随着智能手机和移动互联网的兴起，二维码已成为网页浏览、应用下载、手机购物、移动支付等服务的重要入口，目前已被广泛应用于数字内容下载、自动化文字传输、网址快速连接、身分鉴别与商务交易等领域。</p>
			<p class="mt5 t2">当然，除了应用于商业，在移动互联网时代，二维码也可以是每个人的个人身份标识。通过本站提供的，只需几秒钟，您就可以拥有属于自己的二维码名片了！</p>
		</div>
		<div id="footer" class="tc mt20">
		<p>二维码在线生成工具. <a href="http://www.521php.com" target="_blank">php个人博客</a> <script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script></p>
		</div>
	</div>
</body>
</html>