<?php
$ie   = @$_GET['ie']?@$_GET['ie']:'utf-8';
$word =  @$_GET['s'];
if('utf-8'!=$ie&&'UTF-8'!=$ie){
	$word =  iconv($ie,"utf-8",$word);
	}
$u    = @$_GET['url'];
$pn    = @$_GET['pn']?@$_GET['pn']:0;
$start    = @$_GET['start']?@$_GET['start']:0;
if(!$word){
	$word = '521PHP';
}
$url  = 'http://www.baidu.com/baidu?word='.$word.'&ct=2097152&ie=utf-8&s=on';
	//$url2 = 'http://www.google.com.tw/custom?hl=zh-CN&inlang=zh-CN&newwindow=1&client=pub-65730051336577460000006&ie=utf-8&q='.$word;
//	$url2 = 'http://173.194.14.51/custom?hl=zh-CN&inlang=zh-CN&newwindow=1&client=pub-655163035859445&cof=FORID%3A1%3BGL%3A1%3BLBGC%3A336699%3BLC%3A%230000ff%3BVLC%3A%23663399%3BGFNT%3A%230000ff%3BGIMP%3A%230000ff%3BDIV%3A%23336699%3B&ie=UTF8&oe=UTF8&btnG=Google+%CB%D1%CB%F7&meta=&q='.$word;
$url2 = 'http://gg.eeeke.com/?newwindow=1&q='.$word;
	if($u){
		$url  .='&si='.$u;
		//$url2 .='+inurl%3A'.$u;
		$url2 .='+'.$u;
	}else{
		$url .='&pn='.$pn;
		//$url2 .='&start='.$start;
		$url2 .='&start='.$start;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $word;?>_百度谷歌一起搜</title>
<meta name="keywords" content="php个人博客,张存超,相册,留言板,日志,wordpress,总结,博采众长,杂谈,js，css,jqurey" /> 
<meta name="description" content="php技术博客，php个人博客,php博客,专注于php编程，总结技术难点心得，记录个人php技术发展历程，分享优质php代码，交流php心得体会，推动php的发展！" />
<style>
#top{height:20px;padding-left:20px;padding-bottom:10px;border-bottom:2px solid #333;font-size:13px;}
#top a{text-decoration:none;color:#333;}
#zong{overflow:hidden;}
#title{font-size:24px;font-weight:bold;}
#left,#right{float:left;width:48.5%;height:630px;}
#mian{border-right:2px solid #333;float:left;height:630px;text-align:center}
#img{margin-top:200px;overflow:hidden;cursor:pointer;}
</style>
</head>
<body>
<div id="top"><form action="" method="get"><input type="hidden" name="url" value="<?php echo $u;?>"><span id="title">
百度谷歌一起搜：</span><input type="text" name="s" size="40" value="<?php echo $word;?>" />&nbsp;&nbsp;<input type="submit" value="搜索" />
<span style="float:right;margin-right:100px">
<script type="text/javascript">
    /*百度谷歌一起搜468*15 创建于 2014-09-03*/
    var cpro_id = "u1698110";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>

</span> 
 
技术支持：<a href="http://www.521php.com" target="_blank">521PHP</a>
</form></div>
<div id="zong">
	<span id="left">
	<iframe height="100%" width="100%" border="0" frameborder="0" src="<?php echo $url;?>" name="leftFrame" id="leftFrame" title="leftFrame"></iframe>
	</span>
    <span id="mian">
    	<div id="img">
        	<span onclick="return check(1)"><img src="left.gif" /></span><br /><span onclick="return check(2)"><img src="right.gif" /></span>
        </div>
    </span>
	<span id="right">
	<iframe height="100%" width="100%" border="0" frameborder="0" src="<?php echo $url2;?>" name="leftFrame" id="leftFrame" title="leftFrame"></iframe>
	</span>
</div>
<script>
var h = document.documentElement.clientHeight-48;
document.getElementById("left").style.height=h+"px";
document.getElementById("right").style.height=h+"px";
document.getElementById("mian").style.height=h+"px";
function check(id){
	var zwidth = document.getElementById("zong").offsetWidth;
	var lwidth = document.getElementById("left").offsetWidth;
	var rwidth = document.getElementById("right").offsetWidth;
	if(1==id){
		var shang = lwidth/zwidth;
		if(0!=shang){
		if(shang > 0 && shang<0.5){
			var w=zwidth-15;
			document.getElementById("left").style.width=0+"px";
			document.getElementById("right").style.width=w+"px";
		}else{
			var w=(zwidth-15)/2;
			document.getElementById("left").style.width=w+"px";
			document.getElementById("right").style.width=w+"px";
		}
		}
	}else{
		var shang = rwidth/zwidth;
		if(0!=shang){
		if(shang > 0 && shang<0.5){
			var w=zwidth-15;
			document.getElementById("right").style.width=0+"px";
			document.getElementById("left").style.width=w+"px";
		}else{
			var w=(zwidth-15)/2;
			document.getElementById("left").style.width=w+"px";
			document.getElementById("right").style.width=w+"px";
		}
		}
	}
}
</script>
<script type='text/javascript' src="http://www.521php.com/wailian/public/scripts/tj.js"></script>
<script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script>
</body>
</html>
