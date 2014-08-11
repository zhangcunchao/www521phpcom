<?php
//加密
function QMReturnCheckPass($userid,$username,$email,$ecms=1){
	global $phome_cookieckrnd;
	$r['rnd']=make_password(12);
	$r['dotime']=time();
	$r['checkpass']=md5(md5($r['rnd'].'-'.$userid.'-'.$r['dotime'].'-'.$ecms).$phome_cookieckrnd);
	$r['ecms']=$ecms;
	return $r;
}

//验证
function QMReturnCheckThePass($ckuserid,$ckpass,$cktime,$authstr,$ecms=1){
	global $empire,$dbtbpre,$phome_cookieckrnd,$public_r;
	$f=$ecms==2?'acttime':'getpasstime';
	$time=time();
	$pr=$empire->fetch1("select ".$f." from {$dbtbpre}enewspublic limit 1");
	$ar=explode('||',$authstr);
	if($cktime>$time||$time-$cktime>$pr[$f]*3600||$ar[0]!=$cktime)
	{
		printerror('GPOutTime',$public_r['newsurl'],1);
	}
	$pass=md5(md5($ar[2].'-'.$ckuserid.'-'.$ar[0].'-'.$ar[1]).$phome_cookieckrnd);
	if($pass!=$ckpass)
	{
		printerror('GPErrorPass',$public_r['newsurl'],1);
	}
}

//替换邮件内容变量
function QMRepEmailtext($userid,$username,$email,$pageurl,$title,$text){
	global $empire,$dbtbpre,$public_r;
	$date=date("Y-m-d");
	$r[text]=str_replace('[!--pageurl--]',$pageurl,$text);
	$r[text]=str_replace('[!--username--]',$username,$r[text]);
	$r[text]=str_replace('[!--email--]',$email,$r[text]);
	$r[text]=str_replace('[!--date--]',$date,$r[text]);
	$r[text]=str_replace('[!--sitename--]',$public_r[sitename],$r[text]);
	$r[text]=str_replace('[!--news.url--]',$public_r[newsurl],$r[text]);
	$r[title]=str_replace('[!--pageurl--]',$pageurl,$title);
	$r[title]=str_replace('[!--username--]',$username,$r[title]);
	$r[title]=str_replace('[!--email--]',$email,$r[title]);
	$r[title]=str_replace('[!--date--]',$date,$r[title]);
	$r[title]=str_replace('[!--sitename--]',$public_r[sitename],$r[title]);
	$r[title]=str_replace('[!--news.url--]',$public_r[newsurl],$r[title]);
	return $r;
}

//--------------- 取回密码 --------------

//发送取回密码邮件
function SendGetPasswordEmail($add){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_email;
	if(!$public_r['opengetpass'])
	{
		printerror('CloseGetPassword','',1);
	}
	$username=trim($add[username]);
	$email=trim($add[email]);
	if(!$username||!$email)
	{
		printerror("EmptyGetPassword","history.go(-1)",1);
	}
	//验证码
	$key=$add['key'];
	$keyvname='checkgetpasskey';
	ecmsCheckShowKey($keyvname,$key,1);
	$username=RepPostVar($username);
	$email=RepPostStr($email);
	if(!chemail($email))
	{
		printerror("EmailFail","history.go(-1)",1);
	}
	//编码转换
	$utfusername=doUtfAndGbk($username,0);
	$ur=$empire->fetch1("select ".$user_userid.",".$user_username.",".$user_email." from {$user_tablename} where ".$user_username."='$utfusername' limit 1");
	$utfemail=doUtfAndGbk($ur[$user_email],1);
	if(!$ur[$user_userid]||$utfemail!=$email)
	{
		printerror("ErrorGPUsername","history.go(-1)",1);
	}
	$passr=QMReturnCheckPass($ur[$user_userid],$username,$email,1);
	$authstr=$passr['dotime'].'||'.$passr['ecms'].'||'.$passr['rnd'];
	$sql=DoUpdateMemberAuthstr($ur[$user_userid],$authstr);
	$url=eReturnDomainSiteUrl().'e/member/GetPassword/getpass.php?id='.$ur[$user_userid].'&cc='.$passr[checkpass].'&tt='.$passr['dotime'];
	//发送邮件
	$pr=$empire->fetch1("select getpasstext,getpasstitle from {$dbtbpre}enewspublic limit 1");
	@include(ECMS_PATH.'e/class/SendEmail.inc.php');
	$textr=QMRepEmailtext($ur[$user_userid],$username,$email,$url,$pr['getpasstitle'],$pr['getpasstext']);
	$sm=EcmsToSendMail($email,$textr['title'],$textr['text']);
	ecmsEmptyShowKey($keyvname);//清空验证码
	printerror("SendGetPasswordEmailSucess",$public_r['newsurl'],1);
}

//接收验证信息
function CheckGetPassword($add,$ecms=1){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_email,$user_checked,$user_group;
	$r['id']=(int)$add['id'];
	$r['tt']=(int)$add['tt'];
	$r['cc']=RepPostVar($add['cc']);
	if(!$r[id]||!$r[tt]||!$r[cc])
	{
		printerror('GPErrorPass',$public_r['newsurl'],1);
	}
	$ur=$empire->fetch1("select ".$user_userid.",".$user_username.",".$user_checked.",".$user_group." from {$user_tablename} where ".$user_userid."='$r[id]' limit 1");
	if(empty($ur[$user_userid]))
	{
		printerror('GPErrorPass',$public_r['newsurl'],1);
	}
	$addur=$empire->fetch1("select authstr from {$dbtbpre}enewsmemberadd where userid='$r[id]' limit 1");
	if(!$addur['authstr'])
	{
		printerror('GPErrorPass',$public_r['newsurl'],1);
	}
	QMReturnCheckThePass($r['id'],$r['cc'],$r['tt'],$addur['authstr'],$ecms);
	$r['username']=$ur[$user_username];
	$r['checked']=$ur[$user_checked];
	$r['groupid']=$ur[$user_group];
	return $r;
}

//修改密码
function DoGetPassword($add){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_email,$user_password,$user_dopass,$user_salt,$user_saltnum;
	if(!$public_r['opengetpass'])
	{
		printerror('CloseGetPassword','',1);
	}
	$r=CheckGetPassword($add,1);
	$password=RepPostVar($add['newpassword']);
	$add['renewpassword']=RepPostVar($add['renewpassword']);
	if($password!=$add['renewpassword'])
	{
		printerror('NotRepassword','',1);
	}
	//密码
	$sa='';
	if(empty($user_dopass))//单重md5
	{
		$password=md5($password);
	}
	elseif($user_dopass==2)//双重md5
	{
		$salt=make_password($user_saltnum);
		$password=md5(md5($password).$salt);
		$sa=",".$user_salt."='$salt'";
	}
	elseif($user_dopass==3)//16位md5
	{
		$password=substr(md5($password),8,16);
	}
	$sql=$empire->query("update {$user_tablename} set ".$user_password."='$password'".$sa." where ".$user_userid."='$r[id]'");
	$usql=$empire->query("update {$dbtbpre}enewsmemberadd set authstr='' where userid='$r[id]'");
	printerror('GetPasswordSuccess',$public_r['newsurl'],1);
}


//--------------- 帐号激活 --------------

//发送激活帐号邮件
function SendActUserEmail($userid,$username,$email){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_email;
	$passr=QMReturnCheckPass($userid,$username,$email,2);
	$authstr=$passr['dotime'].'||'.$passr['ecms'].'||'.$passr['rnd'];
	$sql=DoUpdateMemberAuthstr($userid,$authstr);
	$url=eReturnDomainSiteUrl().'e/enews/?enews=DoActUser&id='.$userid.'&cc='.$passr[checkpass].'&tt='.$passr['dotime'];
	//发送邮件
	$pr=$empire->fetch1("select acttext,acttitle from {$dbtbpre}enewspublic limit 1");
	@include(ECMS_PATH.'e/class/SendEmail.inc.php');
	$textr=QMRepEmailtext($userid,$username,$email,$url,$pr['acttitle'],$pr['acttext']);
	$sm=EcmsToSendMail($email,$textr['title'],$textr['text']);
	printerror("SendActUserEmailSucess",$public_r['newsurl'],1);
}

//激活帐号
function DoActUser($add){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_checked;
	$r=CheckGetPassword($add,2);
	if(!$r['checked'])
	{
		$checked=ReturnGroupChecked($r[groupid]);
		if($checked)
		{
			$sql=$empire->query("update {$user_tablename} set ".$user_checked."=1 where ".$user_userid."='$r[id]'");
		}
	}
	$usql=$empire->query("update {$dbtbpre}enewsmemberadd set authstr='' where userid='$r[id]'");
	printerror('ActUserSuccess',$public_r['newsurl'],1);
}

//重新发送帐号激活邮件
function DoRegSend($add){
	global $empire,$dbtbpre,$public_r,$user_tablename,$user_username,$user_userid,$user_email,$user_password,$user_dopass,$user_salt,$user_checked;
	if($public_r['regacttype']!=1)
	{
		printerror('CloseRegAct','',1);
	}
	$username=trim($add[username]);
	$password=trim($add[password]);
	$email=trim($add[email]);
	$newemail=trim($add[newemail]);
	if(!$username||!$password||!$email)
	{
		printerror("EmptyRegAct","history.go(-1)",1);
	}
	//验证码
	$key=$add['key'];
	$keyvname='checkregsendkey';
	ecmsCheckShowKey($keyvname,$key,1);
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	$username=RepPostStr($username);
	$email=RepPostStr($email);
	$newemail=RepPostStr($newemail);
	if(!chemail($email))
	{
		printerror("EmailFail","history.go(-1)",1);
	}
	if($newemail)
	{
		if(!chemail($newemail))
		{
			printerror("EmailFail","history.go(-1)",1);
		}
		$sendemail=$newemail;
	}
	else
	{
		$sendemail=$email;
	}
	//编码转换
	$utfusername=doUtfAndGbk($username,0);
	$password=doUtfAndGbk($password,0);
	//密码
	if(empty($user_dopass))//单重md5
	{
		$password=md5($password);
	}
	if($user_dopass==3)//16位md5
	{
		$password=substr(md5($password),8,16);
	}
	//双重md5
	$num=0;
	if($user_dopass==2)
	{
	    $ur=$empire->fetch1("select ".$user_userid.",".$user_salt.",".$user_password." from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
		$password=md5(md5($password).$ur[$user_salt]);
		$num=0;
		if($password==$ur[$user_password])
		{$num=1;}
		if(empty($ur[$user_userid]))
		{$num=0;}
    }
	else
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$utfusername' and ".$user_password."='".$password."' limit 1");
	}
	if(!$num)
	{
		printerror("ErrorRegActUser","history.go(-1)",1);
	}
	$r=$empire->fetch1("select * from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
	$utfemail=doUtfAndGbk($r[$user_email],1);
	if(!$r[$user_userid]||$utfemail!=$email)
	{
		printerror("ErrorRegActUser","history.go(-1)",1);
	}
	if($r[$user_checked])
	{
		printerror("HaveRegActUser",'',1);
	}
	$addr=$empire->fetch1("select userid,authstr from {$dbtbpre}enewsmemberadd where userid='".$r[$user_userid]."' limit 1");
	$ar=explode('||',$addr['authstr']);
	if(!$addr['userid']||!$addr['authstr']||$ar[1]!=2)
	{
		printerror("HaveRegActUser",'',1);
	}
	ecmsEmptyShowKey($keyvname);//清空验证码
	SendActUserEmail($r[$user_userid],$username,$sendemail);
}
?>