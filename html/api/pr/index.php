<?php
error_reporting(0);

require 'lib/Snoopy.class.php';
require 'lib/SEO_RankChecker.php';
require 'lib/WebCrawl.class.php';
if($_REQUEST['url'])
{
	$u=$_REQUEST['url'];
	$d=preg_replace('/http\:\/\//si','',$_REQUEST['url']);
	$u='http://'.$d;
	$info=array();
	//$go=new WebCrawl($u);
	//获取网站title,keyword,等信息
	//$info=$go->getWebinfo();
	$rank=new SEO_RankChecker($u);
	$info['alexa']=(int)$rank->getAlexaRank();
	if('1'==$_REQUEST['index']){
	   $info['google']=(int)$rank->getIndexedGoogle();
	   $info['baidu']=(int)$rank->getIndexedBaidu();
	}
	$info['qz']=(int)$rank->getBaidurank($d);
	$info['pr']=(int)$rank->getPagerank()<0?0:(int)$rank->getPagerank();
	$info['status']="ok";
	echo json_encode($info);
}else{
	header("Content-Type:text/html;charset=utf-8");
	echo '<head><title>百度权重、pagerank、alexa及百度和谷歌收录情况查询接口：</title></head><body>';
	echo '百度权重、pagerank、alexa及百度和谷歌收录情况查询接口：<br />';
	echo '示例：您可以用post,get方式传值都可以！<br />';
	echo '有两个参数，url为查询的域名，index为是否查询百度和谷歌收录，默认不查询<br />';
	echo '默认情况下，如果没有传递参数index，就只查询百度权重、pagerank、alexa<br />';
	echo 'http://www.521php.com/api/pr/?url=www.baidu.com<br />';
	echo '结果为json数据：<br />';
	echo '{"alexa":5,"qz":10,"pr":9,"status":"ok"}<br />';
	echo '如果index=1,如http://www.521php.com/api/pr/?url=www.baidu.com&index=1<br />';
	echo '"alexa":5,"google":43000000,"baidu":812000,"qz":10,"pr":9,"status":"ok"}<br />';
	echo '本站外链自助已使用！<a href="http://www.521php.com/wailian/" target="_blank">http://www.521php.com/wailian/</a></body>，因为本站空间禁用了本接口，但是程序没有问题，有需要的可以联系我';

}

?>