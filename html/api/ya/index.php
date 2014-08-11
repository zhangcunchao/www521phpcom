<?php
header("Content-Type:text/html;charset=gb2312");
?>
var othercss=document.createElement("link");othercss.href="http://img.baidu.com/img/iknow/ya/css/style.css";othercss.rel="stylesheet";document.getElementsByTagName("head")[0].appendChild(othercss);var divObj=document.createElement("div");divObj.innerHTML='<div class="ya-screen-one"><div id="ya-banner" class="line"><div class="ya-container" style="height:258px;position:relative"><div id="num-container" class="f-yahei">截至目前，地震已致<span id="ya_death"></span>人遇难，<span id="ya_injured"></span>余人受伤。</div></div>';divObj.id="rjdiv1";var first=document.body.children;var n="no";notIe=-[1,];var host=window.location.host;if(-[1,]){if("www.tynews.com.cn"!=host){for(var i in first){if("CENTER"==first[i].tagName){first[i].firstElementChild.insertBefore(divObj,first[i].firstElementChild.firstElementChild);n="yes";break}}};if("no"==n){var first=document.body.firstElementChild;document.body.insertBefore(divObj,first)}}else{if("www.tynews.com.cn"!=host){for(var i in first){if("CENTER"==first[i].tagName){first[i].firstChild.insertBefore(divObj,first[i].firstChild.firstChild);n="yes";break}}};if("no"==n){var first=document.body.firstChild;document.body.insertBefore(divObj,first)}}
<?php
$file = @file_get_contents('http://zhidao.baidu.com/s/ya_data.js');
echo $file;
?>
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('0.2("1").4=1;0.2("3").4=3;',5,5,'document|ya_death|getElementById|ya_injured|innerHTML'.split('|'),0,{}))
