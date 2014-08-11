<?php
$DownSys_CheckIp=0;	//下载验证码检测用户IP，0为不开启，1为开启

//返回检测IP
function ReturnDownSysCheckIp(){
	global $DownSys_CheckIp;
	$ip=$DownSys_CheckIp?egetip():'127.0.0.1';
	return $ip;
}

//下载软件
function DownSoft($classid,$id,$pathid,$p,$pass){
	global $empire,$public_r,$level_r,$class_r,$emod_r,$user_tablename,$user_userid,$user_rnd,$user_group,$user_userfen,$user_userdate,$user_username,$dbtbpre;
	//验证IP
	eCheckAccessDoIp('downinfo');
	$id=(int)$id;
	$classid=(int)$classid;
	$pathid=(int)$pathid;
	if(empty($id)||empty($p)||empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)",1);
	}
	$p=RepPostVar($p);
	$p_r=explode(":::",$p);
	$userid=$p_r[0];
	$rnd=$p_r[1];
	//验证码
	$cpass=md5(ReturnDownSysCheckIp()."wm_chief".$public_r[downpass].$userid);
	if($cpass<>$pass)
	{
		printerror("FailDownpass","history.go(-1)",1);
    }
	//表不存在
	if(empty($class_r[$classid][tbname]))
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$ok=1;
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id' and classid='$classid'");
	if(empty($r[id]))
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	//副表
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		$r=array_merge($r,$finfor);
	}
	//区分下载地址
	$path_r=explode("\r\n",$r[downpath]);
	if(!$path_r[$pathid])
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	$showdown_r=explode("::::::",$path_r[$pathid]);
	$downgroup=$showdown_r[2];
	//下载权限
	if($downgroup)
	{
		$userid=(int)$userid;
		//取得会员资料
		$u=$empire->fetch1("select * from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd'");
		if(empty($u[$user_userid]))
		{printerror("MustSingleUser","history.go(-1)",1);}
		//下载次数限制
		$setuserday="";
		if($level_r[$u[$user_group]][daydown])
		{
			$setuserday=DoCheckMDownNum($userid,$u[$user_group]);
		}
		if($level_r[$downgroup][level]>$level_r[$u[$user_group]][level])
		{
			printerror("NotDownLevel","history.go(-1)",1);
		}
		//点数是否足够
		$showdown_r[3]=intval($showdown_r[3]);
		if($showdown_r[3])
		{
			//---------是否有历史记录
			$bakr=$empire->fetch1("select id,truetime from {$dbtbpre}enewsdownrecord where id='$id' and classid='$classid' and userid='$userid' and pathid='$pathid' and online=0 order by truetime desc limit 1");
			if($bakr[id]&&(time()-$bakr[truetime]<=$public_r[redodown]*3600))
			{}
			else
			{
				//包月卡
				if($u[$user_userdate]-time()>0)
				{}
				//点数
				else
				{
					if($showdown_r[3]>$u[$user_userfen])
					{
						printerror("NotEnoughFen","history.go(-1)",1);
					}
					//去除点数
					$usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$showdown_r[3]." where ".$user_userid."='$userid'");
				}
				//备份下载记录
				$utfusername=doUtfAndGbk($u[$user_username],1);
				BakDown($classid,$id,$pathid,$userid,$utfusername,$r[title],$showdown_r[3],0);
			}
		}
		//更新用户下载次数
		if($setuserday)
		{
			$usql=$empire->query($setuserday);
		}
	}
	//总下载数据增一
    $usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set totaldown=totaldown+1 where id='$id'");
    $downurl=stripSlashes($showdown_r[1]);
	$downurlr=ReturnDownQzPath($downurl,$showdown_r[4]);
	$downurl=$downurlr['repath'];
	//防盗链
	@include(ECMS_PATH."e/class/enpath.php");
	$downurl=DoEnDownpath($downurl);
    db_close();
    $empire=null;
	DoTypeForDownurl($downurl,$downurlr['downtype']);
}

//下载操作
function DoTypeForDownurl($downurl,$type=0){
	global $public_r;
	if($type==1)//meta
	{
		echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=$downurl\">";
	}
	elseif($type==2)//read
	{
		QDownLoadFile($downurl);
	}
	else//header
	{
		Header("Location:$downurl");
	}
	exit();
}

//下载
function QDownLoadFile($file){
	global $public_r;
	if(strstr($file,"\\"))
	{
		$exp="\\";
	}
	elseif(strstr($file,"/"))
	{
		$exp="/";
	}
	else
	{
		Header("Location:$file");
		exit();
	}
	if(strstr($file,$exp."e".$exp)||strstr($file,"..")||strstr($file,"?")||strstr($file,"#"))
	{
		Header("Location:$file");
		exit();
    }
	$efileurl=eReturnFileUrl();
	if(strstr($file,$efileurl))
	{
		$file=str_replace($efileurl,'/d/file/',$file);
	}
	if(!strstr($file,"://"))
	{
		if(!file_exists($file))
		{
			$file="../..".$file;
		}
	}
	$filename=GetDownurlFilename($file,$exp);
	if(empty($filename))
	{
		Header("Location:$file");
		exit();
	}
	//下载
	Header("Content-type: application/octet-stream");
	//Header("Accept-Ranges: bytes");
	//Header("Accept-Length: ".$filesize);
	Header("Content-Disposition: attachment; filename=".$filename);
	echo ReadFiletext($file);
}

//取得下载文件名
function GetDownurlFilename($file,$expstr){
	$r=explode($expstr,$file);
	$count=count($r)-1;
	$filename=$r[$count];
	return $filename;
}

//----------------------在线电影模型
//取得验证码
function GetOnlinePass(){
	global $public_r;
	$onlinep=$public_r[downpass]."qweirtydui4opttt.,mvcfvxzzf3dsfm,.dsa";
	$r[0]=time();
	$r[1]=md5($onlinep.$r[0]);
	return $r;
}

//验证验证码
function CheckOnlinePass($onlinetime,$onlinepass){
	global $movtime,$public_r;
	if($onlinetime+$movtime<time()||$onlinetime>time())
	{
		exit();
	}
	$onlinep=$public_r[downpass]."qweirtydui4opttt.,mvcfvxzzf3dsfm,.dsa";
	$cpass=md5($onlinep.$onlinetime);
	if($onlinepass<>$cpass)
	{
		exit();
	}
}

//--------取得软件地址
function GetSofturl($classid,$id,$pathid,$p,$pass,$onlinetime,$onlinepass){
	global $empire,$public_r,$class_r,$emod_r,$level_r,$user_tablename,$user_userid,$user_username,$user_rnd,$user_group,$user_userfen,$user_userdate,$dbtbpre,$realplayertype,$mediaplayertype;
	//验证IP
	eCheckAccessDoIp('onlineinfo');
	$classid=(int)$classid;
	$id=(int)$id;
	$pathid=(int)$pathid;
	$onlinetime=(int)$onlinetime;
	$p=RepPostVar($p);
	if(!$classid||empty($id)||empty($p))
	{exit();}
	$p_r=explode(":::",$p);
	$userid=$p_r[0];
	$rnd=$p_r[1];
	//验证码
	$cpass=md5(ReturnDownSysCheckIp()."wm_chief".$public_r[downpass].$userid);
	if($cpass<>$pass)
	{exit();}
	//验证验证码
	CheckOnlinePass($onlinetime,$onlinepass);
	//表不存在
	if(empty($class_r[$classid][tbname]))
	{exit();}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id' and classid='$classid'");
	if(empty($r[id]))
	{exit();}
	//副表
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		$r=array_merge($r,$finfor);
	}
	//区分下载地址
	$path_r=explode("\r\n",$r[onlinepath]);
	if(!$path_r[$pathid])
	{
		exit();
	}
	$showdown_r=explode("::::::",$path_r[$pathid]);
	$downgroup=$showdown_r[2];
	//下载权限
	if($downgroup)
	{
		$userid=(int)$userid;
		//取得会员资料
		$u=$empire->fetch1("select * from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd'");
		if(empty($u[$user_userid]))
		{exit();}
		//下载次数限制
		$setuserday="";
		if($level_r[$u[$user_group]][daydown])
		{
			$setuserday=DoCheckMDownNum($userid,$u[$user_group],1);
		}
		if($level_r[$downgroup][level]>$level_r[$u[$user_group]][level])
		{
			exit();
		}
		//点数是否足够
		$showdown_r[3]=intval($showdown_r[3]);
		if($showdown_r[3])
		{
			//---------是否有历史记录
		    $bakr=$empire->fetch1("select id,truetime from {$dbtbpre}enewsdownrecord where id='$id' and classid='$classid' and userid='$userid' and pathid='$pathid' and online=1 order by truetime desc limit 1");
			if($bakr[id]&&(time()-$bakr[truetime]<=$public_r[redodown]*3600))
			{}
			else
			{
				//包月卡
				if($u[$user_userdate]-time()>0)
				{}
				//点数
				else
				{
			       if($showdown_r[3]>$u[$user_userfen])
			       {
					   exit();
			       }
			       //去除点数
				   $usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$showdown_r[3]." where ".$user_userid."='$userid'");
				}
				//备份下载记录
				$utfusername=doUtfAndGbk($u[$user_username],1);
				BakDown($classid,$id,$pathid,$userid,$utfusername,$r[title],$showdown_r[3],1);
			}
		}
		//更新用户下载次数
		if($setuserday)
		{
			$usql=$empire->query($setuserday);
		}
	}
	//总下载数据增一
    $usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set totaldown=totaldown+1 where id='$id'");
	//选择播放器
	$ftype=GetFiletype($showdown_r[1]);
	if(strstr($realplayertype,','.$ftype.','))
	{
		Header("Content-Type: audio/x-pn-realaudio");
	}
	else
	{
		Header("Content-Type: video/x-ms-asf");
	}
    $downurl=stripSlashes($showdown_r[1]);
	$downurlr=ReturnDownQzPath($downurl,$showdown_r[4]);
	$downurl=$downurlr['repath'];
	//防盗链
	@include("../class/enpath.php");
	$downurl=DoEnOnlinepath($downurl);
    db_close();
    $empire=null;
	echo $downurl;
	exit();
}
?>