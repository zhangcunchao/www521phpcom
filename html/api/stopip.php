<?php
//获取客户端IP
function getRemoteIp()
{
    return isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])?$_SERVER['HTTP_X_CLUSTER_CLIENT_IP']:@$_SERVER['REMOTE_ADDR'];
}
$city=@$_GET['city'];
if(!empty($city)){
	include "./libs/iplocation.class.php";
	include "./libs/json.fun.php";
	$ip = getRemoteIp();
		//返回格式
	$format = 'text';//默认text,json,js
	//返回编码
	$charset = 'utf-8'; //默认utf-8,gbk或gb2312
	#实例化(必须)
	$ip_l=new ipLocation();
	$address=$ip_l->getaddress($ip);
	$c =heqeeip($ip,$address,$charset,$format);
	if(substr_count($c,$city)){
		echo 'window.stop ? window.stop() : document.execCommand("Stop");';
	}
}
function heqeeip($ip,$address,$charset="utf8",$format="text"){
	if(@in_array($charset,array("utf8","utf-8","UTF8","UTF-8"))||$charset==""){
	@header("Content-Type: text/html; charset=utf-8");
	$address["area1"] = iconv('GB2312','utf-8',$address["area1"]);
	$address["area2"] = iconv('GB2312','utf-8',$address["area2"]);
	$add=$address["area1"]." ".$address["area2"];
	}elseif(@in_array($charset,array("gbk","gb2312","GB2312","GB-2312"))){
		@header("Content-Type: text/html; charset=gb2312");
		$add=$address["area1"]." ".$address["area2"];
	}else{
	//
	}

	switch($format){
		case "text":
			$add = $add;
		break;
		case "js":
			$add="document.write('".$add."');";
		break;
		case "json":
			$a = array("ip"=>$ip,"iplocation"=>$add);
			$add = "(".JSON($a).")";
		break;
		default:
			$add = $add;
	  }
	  return $add;
}