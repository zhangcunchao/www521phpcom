<?php
define('InEmpireCMSQfun',TRUE);

//自定义字段返回模板字段处理
function doReturnAddTempf($temp){
	$record="<!--record-->";
	$field="<!--field--->";
	$r=explode($record,$temp);
	$count=count($r);
	$str=',';
	for($i=0;$i<$count-1;$i++)
	{
		$r1=explode($field,$r[$i]);
		$str.=$r1[1].",";
	}
	if($str==',,')
	{
		$str=',';
	}
	return $str;
}

//返回字段
function ReturnAddF($modid,$rdata=0){
	global $empire,$dbtbpre;
	$record="<!--record-->";
	$field="<!--field--->";
	$mr=$empire->fetch1("select tempvar,enter,listandf,setandf,listtempvar from {$dbtbpre}enewsmod where mid='$modid'");
	//模板字段
	if($rdata==1)//内容
	{
		$ret_r['tempvar']=doReturnAddTempf($mr['tempvar']);
	}
	elseif($rdata==2)//列表
	{
		$ret_r['listtempvar']=doReturnAddTempf($mr['listtempvar']);
	}
	else//全部
	{
		$ret_r['tempvar']=doReturnAddTempf($mr['tempvar']);
		$ret_r['listtempvar']=doReturnAddTempf($mr['listtempvar']);
	}
	$ret_r['listandf']=$mr['listandf'];
	$ret_r['setandf']=$mr['setandf'];
	return $ret_r;
}

//替换php代码
function RepPhpAspJspcode($string){
	//$string=str_replace("<?xml","[!--ecms.xml--]",$string);
	$string=str_replace("<\\","&lt;\\",$string);
	$string=str_replace("<?","&lt;?",$string);
	$string=str_replace("<%","&lt;%",$string);
	if(stristr($string,' language'))
	{
		$string=preg_replace(array('!<script!i','!</script>!i'),array('&lt;script','&lt;/script&gt;'),$string);
	}
	//$string=str_replace("[!--ecms.xml--]","<?xml",$string);
	return $string;
}

//增加收藏
function AddFava($id,$classid,$cid,$from){
	global $empire,$level_r,$class_r,$dbtbpre;
	//是否登陆
	$user_r=islogin();
	$id=(int)$id;
	$cid=(int)$cid;
	$classid=(int)$classid;
	if(empty($id)||empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)",1);
    }
	//表不存在
	if(empty($class_r[$classid][tbname]))
	{
		printerror("ErrorUrl","history.go(-1)",1);
	}
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
	if(empty($num))
	{printerror("ErrorUrl","history.go(-1)",1);}
	//是否已收藏
	$newsnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsfava where id='$id' and classid='$classid' and userid='$user_r[userid]'");
	if($newsnum)
	{
		printerror("ReFava","history.go(-1)",1);
	}
	$favanum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsfava where userid='$user_r[userid]'");
	$groupid=$user_r[groupid];
	if($level_r[$groupid][favanum]<=$favanum)
	{
		printerror("MoreFava","history.go(-1)",1);
	}
	$favatime=date("Y-m-d H:i:s");
	$sql=$empire->query("insert into {$dbtbpre}enewsfava(id,favatime,userid,username,classid,cid) values('$id','$favatime','$user_r[userid]','$user_r[username]','$classid','$cid');");
	if($sql)
	{
		printerror("AddFavaSuccess",$from,1);
	}
	else
	{
		printerror("DbError","history.go(-1)",1);
	}
}

//批量删除收藏
function DelFava_All($favaid){
	global $empire,$dbtbpre;
	//是否登陆
	$user_r=islogin();
	$count=count($favaid);
	if(empty($count))
	{printerror("NotDelFavaid","history.go(-1)",1);}
	for($i=0;$i<$count;$i++)
	{
		$add.="favaid='".intval($favaid[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("delete from {$dbtbpre}enewsfava where (".$add.") and userid='$user_r[userid]'");
	if($sql)
	{printerror("DelFavaSuccess","../member/fava/",1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//删除单个收藏夹
function DelFava($favaid){
	global $empire,$dbtbpre;
	//是否登陆
	$user_r=islogin();
	$favaid=(int)$favaid;
	if(empty($favaid))
	{printerror("NotDelFavaid","history.go(-1)",1);}
	$sql=$empire->query("delete from {$dbtbpre}enewsfava where favaid='$favaid' and userid='$user_r[userid]'");
	if($sql)
	{printerror("DelFavaSuccess","../member/fava/",1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//点卡冲值
function CardGetFen($username,$reusername,$card_no,$password){
	global $empire,$user_tablename,$user_userfen,$user_userid,$user_username,$user_userdate,$dbtbpre,$user_zgroup,$user_group;
	$card_no=RepPostVar($card_no);
	$password=RepPostVar($password);
	$username=RepPostVar($username);
	if(!trim($username)||!trim($card_no)||!trim($password))
	{
		printerror("EmptyGetCard","history.go(-1)",1);
	}
	if($username!=$reusername)
	{
		printerror("DifCardUsername","history.go(-1)",1);
	}
	//编码转换
	$utfusername=doUtfAndGbk($username,0);
	$user=$empire->fetch1("select ".$user_userid.",".$user_userdate.",".$user_username." from ".$user_tablename." where ".$user_username."='".$utfusername."' limit 1");
	if(!$user[$user_userid])
	{
		printerror("ExiestCardUsername","history.go(-1)",1);
	}
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewscard where card_no='".$card_no."' and password='".$password."' limit 1");
	if(!$num)
	{
		printerror("CardPassError","history.go(-1)",1);
	}
	//是否过期
	$buytime=date("Y-m-d H:i:s");
	$r=$empire->fetch1("select cardfen,money,endtime,carddate,cdgroupid,cdzgroupid from {$dbtbpre}enewscard where card_no='$card_no' limit 1");
	if($r[endtime]<>"0000-00-00")
	{
		$endtime=to_date($r[endtime]);
		if($endtime<time())
		{
			printerror("CardOutDate","history.go(-1)",1);
	    }
    }
	//充值
	eAddFenToUser($r[cardfen],$r[carddate],$r[cdgroupid],$r[cdzgroupid],$user);
	$sql1=$empire->query("delete from {$dbtbpre}enewscard where card_no='$card_no'");//删除卡号
	//备份购买记录
	BakBuy($user[$user_userid],$username,$card_no,$r[cardfen],$r[money],$r[carddate],0);
	printerror("CardGetFenSuccess","../member/card/",1);
}

//返回分类表
function ReturnFavaClassTb($ecms){
	global $dbtbpre;
	if(empty($ecms))//收藏
	{
		$r['tb']="enewsfavaclass";
		$r['url']="../member/fava/FavaClass/";
	}
	else//好友
	{
		$r['tb']="enewshyclass";
		$r['url']="../member/friend/FriendClass/";
	}
	$r['tb']=$dbtbpre.$r['tb'];
	return $r;
}

//---------------------增加收藏夹分类
function AddFavaClass($add){
	global $empire,$dbtbpre;
	if(!trim($add[cname]))
	{
		printerror("EmptyFavaClassname","history.go(-1)",1);
    }
	//是否登陆
	$user_r=islogin();
	$add[cname]=RepPostStr($add[cname]);
	//返回表
	$tbr=ReturnFavaClassTb($add['doing']);
	$sql=$empire->query("insert into ".$tbr['tb']."(cname,userid) values('$add[cname]','$user_r[userid]');");
	if($sql)
	{printerror("AddFavaClassSuccess",$tbr['url'],1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//---------------------修改收藏夹分类
function EditFavaClass($add){
	global $empire,$dbtbpre;
	$add[cid]=(int)$add[cid];
	if(!trim($add[cname])||!$add[cid])
	{
		printerror("EmptyFavaClassname","history.go(-1)",1);
    }
	//是否登陆
	$user_r=islogin();
	$add[cname]=RepPostStr($add[cname]);
	//返回表
	$tbr=ReturnFavaClassTb($add['doing']);
	$sql=$empire->query("update ".$tbr['tb']." set cname='$add[cname]' where cid='$add[cid]' and userid='$user_r[userid]'");
	if($sql)
	{printerror("EditFavaClassSuccess",$tbr['url'],1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//---------------------删除收藏夹分类
function DelFavaClass($cid,$doing=0){
	global $empire,$dbtbpre;
	$cid=(int)$cid;
	if(!$cid)
	{
		printerror("EmptyFavaClassid","history.go(-1)",1);
    }
	//是否登陆
	$user_r=islogin();
	//返回表
	$tbr=ReturnFavaClassTb($doing);
	$sql=$empire->query("delete from ".$tbr['tb']." where cid='$cid' and userid='$user_r[userid]'");
	//$sql1=$empire->query("delete from {$dbtbpre}enewsfava where cid='$cid' and userid='$user_r[userid]'");
	if($sql)
	{printerror("DelFavaClassSuccess",$tbr['url'],1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//---------------------返回收藏夹分类
function ReturnFavaclass($userid,$cid,$doing=0){
	global $empire,$dbtbpre;
	//返回表
	$tbr=ReturnFavaClassTb($doing);
	$sql=$empire->query("select cid,cname from ".$tbr['tb']." where userid='$userid' order by cid");
	$select="";
	while($r=$empire->fetch($sql))
	{
		if($r[cid]==$cid)
		{$selected=" selected";}
		else
		{$selected="";}
		$select.="<option value=".$r[cid].$selected.">".$r[cname]."</option>";
    }
	return $select;
}

//-----------------------批量转移收藏
function MoveFava_All($favaid,$cid){
	global $empire,$dbtbpre;
	//是否登陆
	$user_r=islogin();
	$cid=(int)$cid;
	if(!$cid)
	{printerror("NotChangeMoveCid","history.go(-1)",1);}
	$count=count($favaid);
	if(empty($count))
	{printerror("NotMoveFavaid","history.go(-1)",1);}
	for($i=0;$i<$count;$i++)
	{
		$add.="favaid='".intval($favaid[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}enewsfava set cid=$cid where (".$add.") and userid='$user_r[userid]'");
	if($sql)
	{printerror("MoveFavaSuccess","../member/fava/",1);}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//组合复选框数据
function ReturnFBCheckboxAddF($r,$f,$checkboxf){
	$val=$r;
	if(is_array($r)&&strstr($checkboxf,','.$f.','))
	{
		$val='';
		$count=count($r);
		for($i=0;$i<$count;$i++)
		{
			$val.=$r[$i].'|';
		}
		if($val)
		{
			$val='|'.$val;
		}
	}
	return $val;
}

//提交反馈信息
function AddFeedback($add){
	global $empire,$dbtbpre,$level_r,$public_r;
	CheckCanPostUrl();//验证来源
	$bid=(int)getcvar('feedbackbid');
	if(empty($bid))
	{
		$bid=intval($add[bid]);
	}
	if(empty($bid))
	{
		printerror("EmptyFeedbackname","history.go(-1)",1);
    }
	//验证码
	$keyvname='checkfeedbackkey';
	if($public_r['fbkey_ok'])
	{
		ecmsCheckShowKey($keyvname,$add['key'],1);
	}
	//版面是否存在
	$br=$empire->fetch1("select bid,enter,mustenter,filef,groupid,checkboxf from {$dbtbpre}enewsfeedbackclass where bid='$bid';");
	if(empty($br['bid']))
	{
		printerror("EmptyFeedback","history.go(-1)",1);
	}
	//权限
	if($br['groupid'])
	{
		$user=islogin();
		if($level_r[$br[groupid]][level]>$level_r[$user[groupid]][level])
		{
			printerror("HaveNotEnLevel","history.go(-1)",1);
		}
	}
	$pr=$empire->fetch1("select feedbacktfile,feedbackfilesize,feedbackfiletype from {$dbtbpre}enewspublic limit 1");
	//必填项
	$mustr=explode(",",$br['mustenter']);
	$count=count($mustr);
	for($i=1;$i<$count-1;$i++)
	{
		$mf=$mustr[$i];
		if(strstr($br['filef'],",".$mf.","))//附件
		{
			if(!$pr['feedbacktfile'])
			{
				printerror("NotOpenFBFile","",1);
			}
			if(!$_FILES[$mf]['name'])
			{
				printerror("EmptyFeedbackname","",1);
			}
		}
		else
		{
			$chmustval=ReturnFBCheckboxAddF($add[$mf],$mf,$br['checkboxf']);
			if(!trim($chmustval))
			{
				printerror("EmptyFeedbackname","",1);
			}
		}
	}
	$saytime=date("Y-m-d H:i:s");
	//字段处理
	$dh="";
	$tranf="";
	$record="<!--record-->";
	$field="<!--field--->";
	$er=explode($record,$br['enter']);
	$count=count($er);
	for($i=0;$i<$count-1;$i++)
	{
		$er1=explode($field,$er[$i]);
		$f=$er1[1];
		//附件
		$add[$f]=str_replace('[!#@-','',$add[$f]);
		if(strstr($br['filef'],",".$f.","))
		{
			if($_FILES[$f]['name'])
			{
				if(!$pr['feedbacktfile'])
				{
					printerror("NotOpenFBFile","",1);
				}
				$filetype=GetFiletype($_FILES[$f]['name']);//取得文件类型
				if(CheckSaveTranFiletype($filetype))
				{
					printerror("NotQTranFiletype","",1);
				}
				if(!strstr($pr['feedbackfiletype'],"|".$filetype."|"))
				{
					printerror("NotQTranFiletype","",1);
				}
				if($_FILES[$f]['size']>$pr['feedbackfilesize']*1024)//文件大小
				{
					printerror("TooBigQTranFile","",1);
				}
				$tranf.=$dh.$f;
				$dh=",";
				$fval="[!#@-".$f."-@!]";
			}
			else
			{
				$fval="";
			}
		}
		else
		{
			$add[$f]=ReturnFBCheckboxAddF($add[$f],$f,$br['checkboxf']);
			$fval=$add[$f];
		}
		$addf.=",`".$f."`";
		$addval.=",'".RepPostStr($fval)."'";
	}
	$type=0;
	$classid=0;
	$filename='';
	$filepath='';
	$userid=(int)getcvar('mluserid');
	$username=RepPostVar(getcvar('mlusername'));
	//上传附件
	if($tranf)
	{
		$dh="";
		$tranr=explode(",",$tranf);
		$count=count($tranr);
		for($i=0;$i<$count;$i++)
		{
			$tf=$tranr[$i];
			$tfr=DoTranFile($_FILES[$tf]['tmp_name'],$_FILES[$tf]['name'],$_FILES[$tf]['type'],$_FILES[$tf]['size'],$classid);
			if($tfr['tran'])
			{
				$filepath=$tfr[filepath];
				//写入数据库
				$filetime=$saytime;
				$filesize=(int)$_FILES[$tf]['size'];
				$sql=$empire->query("insert into {$dbtbpre}enewsfile(filename,filesize,adduser,path,filetime,classid,no,type,id,cjid,fpath) values('$tfr[filename]','$filesize','[Member]".$username."','$tfr[filepath]','$filetime','$classid','[FB]".addslashes(RepPostStr($add[title]))."','$type',0,0,'$public_r[fpath]');");
				$repfval=($tfr[filepath]?$tfr[filepath].'/':'').$tfr[filename];
				$filename.=$dh.$tfr[filename];
				$dh=",";
			}
			else
			{
				$repfval="";
			}
			$addval=str_replace("[!#@-".$tf."-@!]",$repfval,$addval);
		}
	}
	$ip=egetip();
	$sql=$empire->query("insert into {$dbtbpre}enewsfeedback(bid,saytime,ip,filepath,filename,userid,username".$addf.") values('$bid','$saytime','$ip','$filepath','$filename','$userid','$username'".$addval.");");
	ecmsEmptyShowKey($keyvname);//清空验证码
	if($sql)
	{
		$reurl=DoingReturnUrl("../tool/feedback/?bid=$bid",$add['ecmsfrom']);
		printerror("AddFeedbackSuccess",$reurl,1);
	}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//--------------发送错误报告
function AddError($add){
	global $empire,$class_r,$dbtbpre;
	CheckCanPostUrl();//验证来源
	$id=(int)$add['id'];
	$classid=(int)$add['classid'];
	if(!$classid||!$id||!trim($add[errortext]))
	{printerror("EmptyErrortext","history.go(-1)",1);}
	//返回标题链接
	if(empty($class_r[$classid][tbname]))
	{
		printerror("ErrorUrl","history.go(-1)",1);
    }
	$r=$empire->fetch1("select titleurl,groupid,classid,newspath,filename,id from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid' limit 1");
	if(empty($r[id]))
	{
		printerror("ErrorUrl","history.go(-1)",1);
    }
	$cid=(int)$add[cid];
	$titleurl=sys_ReturnBqTitleLink($r);
	$email=RepPostStr($add[email]);
	$ip=egetip();
	$errortext=RepPostStr($add[errortext]);
	$errortime=date("Y-m-d H:i:s");
	$sql=$empire->query("insert into {$dbtbpre}enewsdownerror(id,errortext,errorip,errortime,email,classid,cid) values($id,'$errortext','$ip','$errortime','$email',$classid,'$cid');");
	if($sql)
	{
		printerror("AddErrorSuccess",$titleurl,1);
	}
	else
	{
		printerror("DbError","history.go(-1)",1);
	}
}

//发送短信息
function AddMsg($add){
	global $empire,$level_r,$dbtbpre,$user_tablename,$user_userid,$user_username,$user_group,$user_havemsg;
	$user=islogin();
	$title=RepPostStr(trim($add['title']));
	$to_username=RepPostVar(trim($add['to_username']));
	$msgtext=RepPostStr($add['msgtext']);
	if(empty($title)||!trim($msgtext)||empty($to_username))
	{printerror("EmptyMsg","",1);}
	if($user['username']==$to_username)
	{printerror("MsgToself","",1);}
	//字数
	$len=strlen($msgtext);
	if($len>$level_r[$user[groupid]][msglen])
	{
		printerror("MoreMsglen","",1);
	}
	//接收方是否存在
	$utfto_username=doUtfAndGbk($to_username,0);//编码转换
	$r=$empire->fetch1("select ".$user_userid.",".$user_group." from ".$user_tablename." where ".$user_username."='$utfto_username' limit 1");
	if(!$r[$user_userid])
	{
		printerror("MsgNotToUsername","",1);
    }
	//对方短信息是否满
	$mnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$to_username'");
	if($mnum+1>$level_r[$r[$user_group]][msgnum])
	{
		printerror("UserMoreMsgnum","",1);
	}
	$msgtime=date("Y-m-d H:i:s");
	$sql=$empire->query("insert into {$dbtbpre}enewsqmsg(title,msgtext,haveread,msgtime,to_username,from_userid,from_username,outbox,issys) values('".addslashes($title)."','".addslashes($msgtext)."',0,'$msgtime','$to_username','$user[userid]','$user[username]',0,0);");
	//放入发件箱
	if($add['inout'])
	{
		//短信息是否满
		$mynum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]'");
		if($mynum+1<=$level_r[$user[groupid]][msgnum])
	    {
			$isql=$empire->query("insert into {$dbtbpre}enewsqmsg(title,msgtext,haveread,msgtime,to_username,from_userid,from_username,outbox,issys) values('".addslashes($title)."','".addslashes($msgtext)."',1,'$msgtime','$user[username]','$user[userid]','$user[username]',1,0);");
	    }
	}
	$usql=$empire->query("update {$user_tablename} set ".$user_havemsg."=1 where ".$user_username."='$utfto_username' limit 1");
	if($sql)
	{
		printerror("AddMsgSuccess","../member/msg/?out=$add[inout]",1);
	}
	else
	{printerror("DbError","",1);}
}

//保存发件箱
function AddOutMsg($add){
	global $empire,$level_r,$dbtbpre;
	$user=islogin();
	$title=RepPostStr($add['title']);
	$msgtext=RepPostStr($add['msgtext']);
	if(empty($title)||!trim($msgtext))
	{printerror("EmptyMsg","",1);}
	//字数
	$len=strlen($msgtext);
	if($len>$level_r[$user[groupid]][msglen])
	{
		printerror("MoreMsglen","",1);
	}
	//短信息是否满
	$mynum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]'");
	if(($mynum+1>$level_r[$user[groupid]][msgnum]))
	{
		printerror("SelfMoreMsgnum","",1);
	}
	$msgtime=date("Y-m-d H:i:s");
	$sql=$empire->query("insert into {$dbtbpre}enewsqmsg(title,msgtext,haveread,msgtime,to_username,from_userid,from_username,outbox,issys) values('".addslashes($title)."','".addslashes($msgtext)."',1,'$msgtime','$user[username]','$user[userid]','$user[username]',1,0);");
	if($sql)
	{
		printerror("AddOutmsgSuccess","",1);
	}
	else
	{printerror("DbError","",1);}
}

//删除短信息
function DelMsg($mid,$out){
	global $empire,$dbtbpre,$user_tablename,$user_userid,$user_username,$user_havemsg;
	$user=islogin();
	$mid=(int)$mid;
	if(!$mid)
	{printerror("EmptyDelMsg","",1);}
	$sql=$empire->query("delete from {$dbtbpre}enewsqmsg where mid='$mid' and to_username='$user[username]'");
	if($sql)
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]' and haveread=0 limit 1");
		if(!$num)
		{
			$empire->query("update {$user_tablename} set ".$user_havemsg."=0 where ".$user_userid."='$user[userid]'");
		}
		printerror("DelMsgSuccess","../member/msg/?out=$out",1);
    }
	else
	{printerror("DbError","",1);}
}

//批量删除短信息
function DelMsg_all($mid,$out){
	global $empire,$dbtbpre,$user_tablename,$user_userid,$user_username,$user_havemsg;
	$user=islogin();
	$count=count($mid);
	if(!$count)
	{printerror("EmptyDelMsg","",1);}
	for($i=0;$i<$count;$i++)
	{
		$add.="mid='".intval($mid[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("delete from {$dbtbpre}enewsqmsg where (".$add.") and to_username='$user[username]'");
    if($sql)
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]' and haveread=0 limit 1");
		if(!$num)
		{
			$empire->query("update {$user_tablename} set ".$user_havemsg."=0 where ".$user_userid."='$user[userid]'");
		}
		printerror("DelMsgSuccess","../member/msg/?out=$out",1);
    }
    else
	{printerror("DbError","",1);}
}

//替换全局模板变量
function ReplaceTempvar($temp){
	global $empire;
	if(empty($temp))
	{return $temp;}
	$sql=$empire->query("select myvar,varvalue from ".GetTemptb("enewstempvar")." where isclose=0 order by myorder desc,varid");
	while($r=$empire->fetch($sql))
	{
		$myvar="[!--temp.".$r[myvar]."--]";
		$temp=str_replace($myvar,$r[varvalue],$temp);;
    }
	return $temp;
}

//增加好友
function AddFriend($add){
	global $empire,$dbtbpre,$user_tablename,$user_username;
	//是否登陆
	$user_r=islogin();
	$fname=RepPostVar(trim($add['fname']));
	if(!$fname)
	{
		printerror("EmptyFriend","",1);
	}
	//加自己为好友
	if($fname==$user_r['username'])
	{
		printerror("NotAddFriendSelf","",1);
	}
	$utfusername=doUtfAndGbk($fname,0);
	$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
	if(!$num)
	{
		printerror("NotFriendUsername","",1);
	}
	//重复提交
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewshy where fname='$fname' and userid='$user_r[userid]' limit 1");
	if($num)
	{
		printerror("ReAddFriend","",1);
	}
	$cid=(int)$add['cid'];
	$fsay=RepPostStr($add['fsay']);
	$sql=$empire->query("insert into {$dbtbpre}enewshy(userid,fname,cid,fsay) values('$user_r[userid]','".addslashes($fname)."',$cid,'".addslashes($fsay)."');");
	if($sql)
	{
		printerror("AddFriendSuccess","../member/friend/?cid=$add[fcid]",1);
	}
	else
	{
		printerror("DbError","",1);
	}
}

//修改好友
function EditFriend($add){
	global $empire,$dbtbpre,$user_tablename,$user_username;
	//是否登陆
	$user_r=islogin();
	$fid=(int)$add['fid'];
	$fname=RepPostVar(trim($add['fname']));
	if(!$fname||!$fid)
	{
		printerror("EmptyFriend","",1);
	}
	//加自己为好友
	if($fname==$user_r['username'])
	{
		printerror("NotAddFriendSelf","",1);
	}
	$utfusername=doUtfAndGbk($fname,0);
	$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
	if(!$num)
	{
		printerror("NotFriendUsername","",1);
	}
	//重复提交
	if($fname!=$add['oldfname'])
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewshy where fname='$fname' and userid='$user_r[userid]' limit 1");
		if($num)
		{
			printerror("ReAddFriend","",1);
		}
	}
	$cid=(int)$add['cid'];
	$fsay=RepPostStr($add['fsay']);
	$sql=$empire->query("update {$dbtbpre}enewshy set fname='".addslashes($fname)."',cid=$cid,fsay='".addslashes($fsay)."' where fid=$fid and userid='$user_r[userid]'");
	if($sql)
	{
		printerror("EditFriendSuccess","../member/friend/?cid=$add[fcid]",1);
	}
	else
	{
		printerror("DbError","",1);
	}
}

//删除好友
function DelFriend($add){
	global $empire,$dbtbpre;
	//是否登陆
	$user_r=islogin();
	$fid=(int)$add['fid'];
	if(!$fid)
	{
		printerror("EmptyFriendId","",1);
	}
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewshy where fid=$fid and userid='$user_r[userid]'");
	if(!$num)
	{
		printerror("EmptyFriendId","",1);
	}
	$sql=$empire->query("delete from {$dbtbpre}enewshy where fid=$fid and userid='$user_r[userid]'");
	if($sql)
	{
		printerror("DelFriendSuccess","../member/friend/?cid=$add[fcid]",1);
	}
	else
	{
		printerror("DbError","",1);
	}
}
?>