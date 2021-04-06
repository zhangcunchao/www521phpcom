<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

//统计访问
function UpdateSpaceViewStats($userid){
	global $empire,$dbtbpre;
	if(!getcvar('dospacevstats'))
	{
		$sql=$empire->query("update {$dbtbpre}enewsmemberadd set viewstats=viewstats+1 where userid='".$userid."' limit 1");
		esetcookie("dospacevstats",1,time()+3600);
	}
}

//关闭
if($public_r['openspace']==1)
{
	printerror('CloseMemberSpace','',1);
}

require_once ECMS_PATH.'e/space/spacefun.php';

//用户是否存在
$userid=intval($_GET['userid']);
if($userid)
{
	$add="userid=$userid";
	$username='';
	$utfusername='';
	$uadd="$user_userid=$userid";
}
else
{
	$username=RepPostVar($_GET['username']);
	if(empty($username))
	{
		printerror("NotUsername","",1);
	}
	$add="username='$username'";
	$utfusername=doUtfAndGbk($username,0);
	$uadd="$user_username='$utfusername'";
}
$ur=$empire->fetch1("select * from ".$user_tablename." where ".$uadd." limit 1");
if(empty($ur[$user_username]))
{
	printerror("NotUsername","",1);
}
$userid=$userid?$userid:$ur[$user_userid];
$utfusername=$utfusername?$utfusername:doUtfAndGbk($ur[$user_username],0);
$username=$username?$username:doUtfAndGbk($ur[$user_username],1);
$groupid=$ur[$user_group];
UpdateSpaceViewStats($userid);//统计访问
$addur=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='".$userid."' limit 1");
//头像
$userpic=$addur['userpic']?$addur['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
//空间地址
$spaceurl=eReturnDomainSiteUrl()."e/space/?userid=".$userid;
//空间名称
$spacename=$addur['spacename']?$addur['spacename']:$username." 的个人空间";
//空间模板
$spacestyleid=$addur['spacestyleid'];
if(empty($spacestyleid))
{
	$spacestyleid=$public_r['defspacestyleid'];
}
$spacestyler=$empire->fetch1("select stylepath from {$dbtbpre}enewsspacestyle where styleid='$spacestyleid'");
$spacestyle=$spacestyler['stylepath']?$spacestyler['stylepath']:'default';
?>