<?php
header("Content-Type:text/html;charset=utf-8");
$u = $_SERVER['HTTP_REFERER'];
if($u){
?>
var host = "<?php echo @$_GET['host'];?>";
var uh   = document.domain;
var refer=document.referrer; 
var sosuo=refer.split(".")[1];
var grep=null;
var str=null;
var keyword=null;
var grep2=null;
var str2=null;
var page=null;
switch(sosuo){
  case "baidu":
    grep=/wd\=.*\&/i;
    str=refer.match(grep);
    grep2 = /pn\=.*\&/i;
    str2 = refer.match(grep2);
    keyword=str.toString().split("=")[1].split("&")[0];
	if(str2){
    page = str2.toString().split("=")[1].split("&")[0];
	}else{
		page = 0;
	}
    keyword = decodeURIComponent(keyword);
  
  break;
 
  case "google":
    grep=/q\=.*\&/i;
    str=refer.match(grep);
    grep2 = /cd\=.*/i;
    str2 = refer.match(grep2);
    keyword=str.toString().split("=")[1].split("&")[0];
	if(str2){
    page = str2.toString().split("=")[1].split("&")[0];
	}else{
		page = 0;
	}
    keyword = decodeURIComponent(keyword);
  
  break;
}
if(keyword){
		var othercss1 = document.createElement("script");
		othercss1.type = "text/javascript";
		othercss1.src = "http://www.521php.com/api/tz/tz.php?url="+sosuo+"&host="+host+"&uh="+uh+"&keyword="+keyword+"&page="+page;
		document.getElementsByTagName("head")[0].appendChild(othercss1);
}
<?php
}
?>