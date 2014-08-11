<?php
include_once 'config.php';
@$ax_ym=$_SERVER['REQUEST_URI'];
@$ax_ss=$_SERVER['HTTP_USER_AGENT'];
@$ax_url=$_SERVER['HTTP_REFERER'];
@$ax_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
if(empty($ax_ip)){
	@$ax_ip=$_SERVER['REMOTE_ADDR'];
}
@$ax_date=date("Y-m-d");
@$ax_time=date("H:i:s");
$baidu=stristr($ax_ss,"Baiduspider");
$google=stristr($ax_ss,"Googlebot");
$soso=stristr($ax_ss,"Sosospider");
$youdao=stristr($ax_ss,"YoudaoBot");
$bing=stristr($ax_ss,"bingbot");
$sogou=stristr($ax_ss,"Sogou web spider");
$yahoo=stristr($ax_ss,"Yahoo! Slurp");
$Alexa=stristr($ax_ss,"Alexa");
$so=stristr($ax_ss,"360Spider");
if($baidu)
{
    $ax_ss="baidu";
}
elseif($google)
{
    $ax_ss="Google";
}
elseif($soso)
{
    $ax_ss="soso";
}
elseif($youdao)
{
    $ax_ss="youdao";
}
elseif($bing)
{
    $ax_ss="bing";
}
elseif($sogou)
{
    $ax_ss="sogou";
}
elseif($yahoo)
{
    $ax_ss="yahoo";
}
elseif($Alexa)
{
    $ax_ss="Alexa";
}
elseif($so)
{
    $ax_ss="so";
}
else
{
    $ax_ss=null;
}


if($baidu or $google or $soso or $youdao or $bing or $sogou or $yahoo or $Alexa or $so)
{
    $zzsql="insert into robots (robotsname,robotspage,oldurl,robotsip,riqi,shijian) values ('$ax_ss','$ax_ym','$ax_url','$ax_ip','$ax_date','$ax_time')";
    $exeok=mysql_query($zzsql,$conn);
}
?>