<?php
//*************************** 信息 ***************************

//增加投票
function AddInfoVote($classid,$id,$add){
	global $empire,$dbtbpre,$class_r;
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsinfovote where id='$id' and classid='$classid' limit 1");
	$votename=$add['vote_name'];
	$votenum=$add['vote_num'];
	//统计总票数
	for($i=0;$i<count($votename);$i++)
	{
		$t_votenum+=$votenum[$i];
	}
	$t_votenum=(int)$t_votenum;
	$voteclass=(int)$add['vote_class'];
	$width=(int)$add['vote_width'];
	$height=(int)$add['vote_height'];
	$doip=(int)$add['dovote_ip'];
	$tempid=(int)$add['vote_tempid'];
	//附加字段
	$diyotherlink=(int)$add['info_diyotherlink'];
	$infouptime=0;
	if($add['info_infouptime'])
	{
		$infouptime=to_time($add['info_infouptime']);
	}
	$infodowntime=0;
	if($add['info_infodowntime'])
	{
		$infodowntime=to_time($add['info_infodowntime']);
	}
	if($num)	//修改
	{
		$votetext=ReturnVote($add['vote_name'],$add['vote_num'],$add['delvote_id'],$add['vote_id'],1);	//返回组合
		$sql=$empire->query("update {$dbtbpre}enewsinfovote set title='$add[vote_title]',votetext='$votetext',voteclass=$voteclass,doip=$doip,dotime='$add[vote_dotime]',tempid=$tempid,width=$width,height=$height,diyotherlink='$diyotherlink',infouptime='$infouptime',infodowntime='$infodowntime' where id='$id' and classid='$classid' limit 1");
	}
	else	//增加
	{
		$votetext=ReturnVote($add['vote_name'],$add['vote_num'],$add['delvote_id'],$add['vote_id'],0);	//返回组合
		if(!($votetext||$diyotherlink||$infouptime||$infodowntime))
		{
			return '';
		}
		$sql=$empire->query("insert into {$dbtbpre}enewsinfovote(id,classid,title,voteip,votetext,voteclass,doip,dotime,tempid,width,height,diyotherlink,infouptime,infodowntime) values('$id','$classid','$add[vote_title]','','$votetext',$voteclass,$doip,'$add[vote_dotime]',$tempid,$width,$height,'$diyotherlink','$infouptime','$infodowntime');");
	}
	$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set votenum=$t_votenum where id='$id'");
}

//增加信息处理变量
function DoPostInfoVar($add){
	global $class_r;
	//组合标题属性
	$add[titlecolor]=RepPhpAspJspcodeText($add[titlecolor]);
	$add['my_titlefont']=TitleFont($add[titlefont],$add[titlecolor]);
	//组合专题ID
	$add['my_ztid']=ZtId($add[ztid]);
	//其它变量
	$add[keyboard]=RepPhpAspJspcodeText(DoReplaceQjDh($add[keyboard]));
	$add[titleurl]=RepPhpAspJspcodeText($add[titleurl]);
	$add[checked]=(int)$add[checked];
	$add[istop]=(int)$add[istop];
	$add[dokey]=(int)$add[dokey];
	$add[isgood]=(int)$add[isgood];
	$add[groupid]=(int)$add[groupid];
	$add[newstempid]=(int)$add[newstempid];
	$add[firsttitle]=(int)$add[firsttitle];
	$add[userfen]=(int)$add[userfen];
	$add[closepl]=(int)$add[closepl];
	$add[ttid]=(int)$add[ttid];
	$add[onclick]=(int)$add[onclick];
	$add[totaldown]=(int)$add[totaldown];
	$add[infotags]=RepPhpAspJspcodeText(DoReplaceQjDh($add[infotags]));
	$add[ispic]=$add[titlepic]?1:0;
	$add[filename]=RepFilenameQz($add[filename],1);
	$add[newspath]=RepFilenameQz($add[newspath],1);
	return $add;
}

//相关链接ID处理
function DoPostDiyOtherlinkID($keyid){
	if(!$keyid||$keyid==',')
	{
		return '';
	}
	$new_keyid='';
	$dh='';
	$r=explode(',',$keyid);
	$count=count($r);
	for($i=0;$i<$count;$i++)
	{
		$r[$i]=(int)$r[$i];
		if(!$r[$i])
		{
			continue;
		}
		$new_keyid.=$dh.$r[$i];
		$dh=',';
	}
	return $new_keyid;
}

//增加信息
function AddNews($add,$userid,$username){
	global $empire,$class_r,$class_zr,$bclassid,$public_r,$dbtbpre,$emod_r;
	$add[classid]=(int)$add[classid];
	$userid=(int)$userid;
	$ztid=$add[ztid];
	if(!$add[title]||!$add[classid])
	{
		printerror("EmptyTitle","history.go(-1)");
	}
	//操作权限
	$doselfinfo=CheckLevel($userid,$username,$add[classid],"news");
	if(!$doselfinfo['doaddinfo'])//增加权限
	{
		printerror("NotAddInfoLevel","history.go(-1)");
	}
	$ccr=$empire->fetch1("select classid,modid,listdt,haddlist,sametitle,addreinfo,wburl,repreinfo from {$dbtbpre}enewsclass where classid='$add[classid]' and islast=1");
	if(!$ccr['classid']||$ccr[wburl])
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	if($ccr['sametitle'])//验证标题重复
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where title='$add[title]' limit 1");
		if($num)
		{
			printerror("ReInfoTitle","history.go(-1)");
	    }
    }
	$add=DoPostInfoVar($add);//返回变量
	$ret_r=ReturnAddF($add,$class_r[$add[classid]][modid],$userid,$username,0,0,1);//返回自定义字段
	$newspath=FormatPath($add[classid],$add[newspath],1);//查看目录是否存在，不存在则建立
	//签发
	$isqf=0;
	if($class_r[$add[classid]][wfid])
	{
		$add[checked]=0;
		$isqf=1;
	}
	$truetime=time();
	$lastdotime=$truetime;
	//返回关键字组合
	if($add['info_diyotherlink'])
	{
		$keyid=DoPostDiyOtherlinkID($add['info_keyid']);
	}
	else
	{
		$keyid=GetKeyid($add[keyboard],$add[classid],0,$class_r[$add[classid]][link_num]);
	}
	//主表
	$sql=$empire->query("insert into {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]."(classid,onclick,newspath,keyboard,keyid,userid,username,ztid,checked,istop,truetime,ismember,dokey,isgood,titlefont,titleurl,filename,groupid,newstempid,plnum,firsttitle,isqf,userfen,totaldown,closepl,havehtml,lastdotime,haveaddfen,infopfen,infopfennum,votenum,stb,ttid,infotags,ispic".$ret_r[fields].") values($add[classid],'$add[onclick]','$newspath','".addslashes($add[keyboard])."','$keyid',$userid,'".addslashes($username)."','$add[my_ztid]',$add[checked],'$add[istop]',$truetime,0,$add[dokey],$add[isgood],'".addslashes($add[my_titlefont])."','".addslashes($add[titleurl])."','$filename',$add[groupid],$add[newstempid],0,$add[firsttitle],'$isqf',$add[userfen],'$add[totaldown]',$add[closepl],0,$lastdotime,0,0,0,0,'".$ret_r[tb]."','$add[ttid]','".addslashes($add[infotags])."','$add[ispic]'".$ret_r[values].");");
	$id=$empire->lastid();
	//副表
	$fsql=$empire->query("insert into {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]."_data_".$ret_r['tb']."(id,classid".$ret_r[datafields].") values('$id','$add[classid]'".$ret_r[datavalues].");");
	//签发
	if($isqf==1)
	{
		InfoInsertToWorkflow($id,$add[classid],$class_r[$add[classid]][wfid],$userid,$username);
	}
	//更新附件表
	UpdateTheFile($id,$add['filepass']);
	//取第一张图作为标题图片
	if($add['getfirsttitlepic']&&empty($add['titlepic']))
	{
		$firsttitlepic=GetFpicToTpic($add['classid'],$id,$add['getfirsttitlepic'],$add['getfirsttitlespic'],$add['getfirsttitlespicw'],$add['getfirsttitlespich']);
		if($firsttitlepic)
		{
			$addtitlepic=",titlepic='".addslashes($firsttitlepic)."',ispic=1";
		}
	}
	//文件命名
	if($add['filename'])
	{
		$filename=$add['filename'];
	}
	else
	{
		$filename=ReturnInfoFilename($add[classid],$id,'');
	}
	$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set filename='$filename'".$addtitlepic." where id='$id'");
	//替换图片下一页
	if($add['repimgnexturl'])
	{
		UpdateImgNexturl($add[classid],$id);
	}
	//投票
	AddInfoVote($add['classid'],$id,$add);
	//TAGS
	if($add[infotags]&&$add[infotags]<>$add[oldinfotags])
	{
		$tagtime=empty($add[newstime])?time():to_time($add[newstime]);
		eInsertTags($add[infotags],$add['classid'],$id,$tagtime);
	}
	//增加信息是否生成文件
	if($ccr['addreinfo'])
	{
		$ar=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$id'");
		GetHtml($ar,'');
	}
	//生成上一篇
	if($ccr['repreinfo']&&$add[checked])
	{
		$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id<$id and classid='$add[classid]' and checked=1 order by id desc limit 1");
		GetHtml($prer,'');
	}
	//生成栏目
	if($ccr[haddlist]&&$add[checked])
	{
		hAddListHtml($add[classid],$ccr['modid'],$ccr['haddlist'],$ccr['listdt']);//生成信息列表
		for($z=0;$z<count($ztid);$z++)//生成专题列表
		{
			ListHtml(intval($ztid[$z]),'',1);
		}
	}
	//同时发布
	$copyclassid=$add[copyclassid];
	$cpcount=count($copyclassid);
	if($cpcount)
	{
		$copyids=AddInfoToCopyInfo($add[classid],$id,$copyclassid,$userid,$username);
		if($copyids)
		{
			$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set copyids='$copyids' where id='$id'");
		}
	}
	if($sql)
	{
		//返回地址
		if($add['ecmsfrom']&&(stristr($add['ecmsfrom'],'ListNews.php')||stristr($add['ecmsfrom'],'ListAllInfo.php')))
		{
			$ecmsfrom=$add['ecmsfrom'];
		}
		else
		{
			$ecmsfrom=$add['ecmsnfrom']==1?"ListNews.php?bclassid=$add[bclassid]&classid=$add[classid]":"ListAllInfo.php?tbname=".$class_r[$add[classid]][tbname];
		}
		$GLOBALS['ecmsadderrorurl']=$ecmsfrom;
		insert_dolog("classid=$add[classid]<br>id=".$id."<br>title=".$add[title]);//操作日志
		printerror("AddNewsSuccess","AddNews.php?enews=AddNews&ecmsnfrom=$add[ecmsnfrom]&bclassid=$add[bclassid]&classid=$add[classid]");
	}
	else
	{
		printerror("DbError","");
	}
}

//修改信息
function EditNews($add,$userid,$username){
	global $empire,$class_r,$class_zr,$bclassid,$public_r,$dbtbpre,$emod_r;
	$add[classid]=(int)$add[classid];
	$userid=(int)$userid;
	$ztid=$add[ztid];
	$add[id]=(int)$add[id];
	if(!$add[id]||!$add[title]||!$add[classid]||!$add[filename])
	{
		printerror("EmptyTitle","history.go(-1)");
	}
	$doselfinfo=CheckLevel($userid,$username,$add[classid],"news");//操作权限
	if(!$doselfinfo['doeditinfo'])//编辑权限
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$ccr=$empire->fetch1("select classid,modid,listdt,haddlist,sametitle,addreinfo,wburl,repreinfo from {$dbtbpre}enewsclass where classid='$add[classid]' and islast=1");
	if(!$ccr['classid']||$ccr[wburl])
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	$checkr=$empire->fetch1("select id,userid,username,ismember,stb,copyids,newspath,filename,isqf,checked from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]' and classid='$add[classid]'");
	if(!$checkr[id])
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	if($doselfinfo['doselfinfo']&&($checkr[userid]<>$userid||$checkr[ismember]))//只能编辑自己的信息
	{
		printerror("NotDoSelfinfo","history.go(-1)");
    }
	if($ccr['sametitle'])//验证标题重复
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where title='$add[title]' and id<>$add[id] limit 1");
		if($num)
		{
			printerror("ReInfoTitle","history.go(-1)");
	    }
    }
	$mid=$class_r[$add[classid]][modid];
	$pf=$emod_r[$mid]['pagef'];
	$add=DoPostInfoVar($add);//返回变量
	$ret_r=ReturnAddF($add,$class_r[$add[classid]][modid],$userid,$username,1,0,1);//返回自定义字段
	$deloldfile=0;
	if($add[groupid]<>$add[oldgroupid]||($checkr['checked']&&!$add[checked]))//改变文件权限
	{
        DelNewsFile($checkr[filename],$checkr[newspath],$add[classid],$add[$pf],$add[oldgroupid]);//删除旧的文件
		$deloldfile=1;
	}
	//签发
	$a='';
	if($class_r[$add[classid]][wfid]&&$checkr['isqf'])
	{
		$qfr=$empire->fetch1("select checktno from {$dbtbpre}enewswfinfo where id='$add[id]' and classid='$add[classid]' limit 1");
		if($qfr['checktno']=='100')//已通过
		{
			$aqf=",checked='$add[checked]'";
		}
		else
		{
			if($add[reworkflow])
			{
				InfoUpdateToWorkflow($add[id],$add[classid],$class_r[$add[classid]][wfid],$userid,$username);
			}
			$aqf='';
		}
	}
	else
	{
		$aqf=",checked='$add[checked]'";
	}
	//日期目录
	$updatefile='';
	if($add['newspath']!=$checkr[newspath])
	{
		$add[newspath]=FormatPath($add[classid],$add[newspath],1);//查看目录是否存在，不存在则建立
		$updatefile.=",newspath='$add[newspath]'";
		if($deloldfile==0)
		{
			DelNewsFile($checkr[filename],$checkr[newspath],$add[classid],$add[$pf],$add[oldgroupid]);//删除旧文件
			$deloldfile=1;
		}
	}
	//文件名
	if($add['filename']&&$add['filename']!=$checkr[filename])
	{
		$newfilename=$add['filename'];
		$updatefile.=",filename='$newfilename'";
		if($deloldfile==0)
		{
			DelNewsFile($checkr[filename],$checkr[newspath],$add[classid],$add[$pf],$add[oldgroupid]);//删除旧文件
			$deloldfile=1;
		}
	}
	$lastdotime=time();
	//返回关键字组合
	if($add['info_diyotherlink'])
	{
		$keyid=DoPostDiyOtherlinkID($add['info_keyid']);
	}
	else
	{
		$keyid=GetKeyid($add[keyboard],$add[classid],$add[id],$class_r[$add[classid]][link_num]);
	}
	//主表
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set classid='$add[classid]',keyboard='".addslashes($add[keyboard])."',keyid='$keyid',ztid='$add[my_ztid]',istop=$add[istop],dokey=$add[dokey],isgood=$add[isgood],titlefont='".addslashes($add[my_titlefont])."',titleurl='".addslashes($add[titleurl])."',groupid=$add[groupid],newstempid=$add[newstempid],firsttitle=$add[firsttitle],userfen=$add[userfen],closepl=$add[closepl],lastdotime=$lastdotime,ttid='$add[ttid]',onclick='$add[onclick]',totaldown='$add[totaldown]',infotags='".addslashes($add[infotags])."',ispic='$add[ispic]'".$updatefile.$aqf.$ret_r[values]." where id='$add[id]'");
	//副表
	$stb=$checkr['stb'];
	$fsql=$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]."_data_".$stb." set classid='$add[classid]'".$ret_r[datavalues]." where id='$add[id]'");
	//取第一张图作为标题图片
	if($add['getfirsttitlepic']&&empty($add['titlepic']))
	{
		$firsttitlepic=GetFpicToTpic($add['classid'],$add['id'],$add['getfirsttitlepic'],$add['getfirsttitlespic'],$add['getfirsttitlespicw'],$add['getfirsttitlespich']);
		if($firsttitlepic)
		{
			$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set titlepic='".addslashes($firsttitlepic)."',ispic=1 where id='$add[id]'");
		}
	}
	//更新附件
	UpdateTheFileEdit($add['classid'],$add['id']);
	//替换图片下一页
	if($add['repimgnexturl'])
	{
		UpdateImgNexturl($add['classid'],$add['id']);
	}
	//投票
	AddInfoVote($add['classid'],$add['id'],$add);
	//TAGS
	if($add[infotags]&&$add[infotags]<>$add[oldinfotags])
	{
		$tagtime=empty($add[newstime])?time():to_time($add[newstime]);
		eInsertTags($add[infotags],$add['classid'],$add['id'],$tagtime);
	}
	//生成文件
	if($ccr['addreinfo'])
	{
		$ar=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]'");
		GetHtml($ar,'');
	}
	//生成上一篇
	if($ccr['repreinfo']&&($add[checked]||$add[checked]<>$add[oldchecked]))
	{
		$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id<$add[id] and classid='$add[classid]' and checked=1 order by id desc limit 1");
		GetHtml($prer,'');
	}
	//生成栏目
	if($ccr['haddlist']&&($add[checked]||$add[checked]<>$add[oldchecked]))
	{
		hAddListHtml($add[classid],$ccr['modid'],$ccr['haddlist'],$ccr['listdt']);//生成信息列表
		for($z=0;$z<count($ztid);$z++)//生成专题列表
		{
			ListHtml(intval($ztid[$z]),'',1);
		}
		//改变专题
		$oldztid=$add[oldztid];
		$myztid=$add['my_ztid'];
		if($oldztid<>$myztid&&$oldztid)
		{
			$o_z=explode("|",$oldztid);
			for($z=1;$z<count($o_z)-1;$z++)
			{
				$cr=explode("|".$o_z[$z]."|",$myztid);
				if($cr==1)
				{
					ListHtml(intval($o_z[$z]),'',1);
				}
			}
       }
	}
	//同时更新
	if($checkr['copyids']&&$checkr['copyids']<>'1')
	{
		EditInfoToCopyInfo($add[classid],$add[id],$userid,$username);
	}
	else
	{
		$copyclassid=$add[copyclassid];
		$cpcount=count($copyclassid);
		if($cpcount)
		{
			$copyids=AddInfoToCopyInfo($add[classid],$add[id],$copyclassid,$userid,$username);
			if($copyids)
			{
				$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set copyids='$copyids' where id='$add[id]'");
			}
		}
	}
	if($sql)
	{
		//返回地址
		if($add['ecmsfrom']&&(stristr($add['ecmsfrom'],'ListNews.php')||stristr($add['ecmsfrom'],'ListAllInfo.php')))
		{
			$ecmsfrom=$add['ecmsfrom'];
		}
		else
		{
			$ecmsfrom="ListNews.php?bclassid=$add[bclassid]&classid=$add[classid]";
		}
		insert_dolog("classid=$add[classid]<br>id=".$add[id]."<br>title=".$add[title]);//操作日志
		printerror("EditNewsSuccess",$ecmsfrom);
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//修改信息(快速)
function EditInfoSimple($add,$userid,$username){
	global $empire,$class_r,$class_zr,$bclassid,$public_r,$dbtbpre,$emod_r;
	$add[classid]=(int)$add[classid];
	$userid=(int)$userid;
	$ztid=$add[ztid];
	$add[id]=(int)$add[id];
	$closeurl='info/EditInfoSimple.php?isclose=1&reload=1';
	if(!$add[id]||!$add[title]||!$add[classid])
	{
		printerror("EmptyTitle","history.go(-1)",8);
	}
	$doselfinfo=CheckLevel($userid,$username,$add[classid],"news");//操作权限
	if(!$doselfinfo['doeditinfo'])//编辑权限
	{
		printerror("NotEditInfoLevel","history.go(-1)",8);
	}
	$ccr=$empire->fetch1("select classid,modid,listdt,haddlist,sametitle,addreinfo,wburl,repreinfo from {$dbtbpre}enewsclass where classid='$add[classid]' and islast=1");
	if(!$ccr['classid']||$ccr[wburl])
	{
		printerror("ErrorUrl","history.go(-1)",8);
	}
	$checkr=$empire->fetch1("select id,userid,username,ismember,stb,copyids,newspath,filename,isqf,checked from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]' and classid='$add[classid]'");
	if(!$checkr[id])
	{
		printerror("ErrorUrl","history.go(-1)",8);
	}
	if($doselfinfo['doselfinfo']&&($checkr[userid]<>$userid||$checkr[ismember]))//只能编辑自己的信息
	{
		printerror("NotDoSelfinfo","history.go(-1)",8);
    }
	if($ccr['sametitle'])//验证标题重复
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where title='$add[title]' and id<>$add[id] limit 1");
		if($num)
		{
			printerror("ReInfoTitle","history.go(-1)",8);
	    }
    }
	$mid=$class_r[$add[classid]][modid];
	$pf=$emod_r[$mid]['pagef'];
	$add=DoPostInfoVar($add);//返回变量
	//签发
	$a="";
	if($class_r[$add[classid]][wfid]&&$checkr['isqf'])
	{
		$qfr=$empire->fetch1("select checktno from {$dbtbpre}enewswfinfo where id='$add[id]' and classid='$add[classid]' limit 1");
		if($qfr['checktno']=='100')//已通过
		{
			$aqf=",checked='$add[checked]'";
		}
		else
		{
			if($add[reworkflow])
			{
				InfoUpdateToWorkflow($add[id],$add[classid],$class_r[$add[classid]][wfid],$userid,$username);
			}
			$aqf='';
		}
	}
	else
	{
		$aqf=",checked='$add[checked]'";
	}
	$lastdotime=time();
	//发布时间
	$newstime=empty($add['newstime'])?time():to_time($add['newstime']);
	//主表
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." set classid='$add[classid]',istop='$add[istop]',isgood='$add[isgood]',titlefont='".addslashes($add[my_titlefont])."',titleurl='".addslashes($add[titleurl])."',firsttitle='$add[firsttitle]',closepl='$add[closepl]',lastdotime='$lastdotime',ttid='$add[ttid]',onclick='$add[onclick]',totaldown='$add[totaldown]',ispic='$add[ispic]',title='".addslashes($add[title])."',titlepic='".addslashes($add[titlepic])."',newstime='$newstime'".$aqf." where id='$add[id]'");
	//更新附件
	UpdateTheFileEdit($add['classid'],$add['id']);
	//生成文件
	if($ccr['addreinfo'])
	{
		$ar=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]'");
		GetHtml($ar,'');
	}
	//生成上一篇
	if($ccr['repreinfo']&&($add[checked]||$add[checked]<>$add[oldchecked]))
	{
		$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id<$add[id] and classid='$add[classid]' and checked=1 order by id desc limit 1");
		GetHtml($prer,'');
	}
	//生成栏目
	if($ccr['haddlist']&&($add[checked]||$add[checked]<>$add[oldchecked]))
	{
		hAddListHtml($add[classid],$ccr['modid'],$ccr['haddlist'],$ccr['listdt']);//生成信息列表
	}
	//同时更新
	if($checkr['copyids']&&$checkr['copyids']<>'1')
	{
		EditInfoToCopyInfo($add[classid],$add[id],$userid,$username);
	}
	if($sql)
	{
		//返回地址
		if($add['ecmsfrom']&&(stristr($add['ecmsfrom'],'ListNews.php')||stristr($add['ecmsfrom'],'ListAllInfo.php')))
		{
			$ecmsfrom=$add['ecmsfrom'];
		}
		else
		{
			$ecmsfrom="ListNews.php?bclassid=$add[bclassid]&classid=$add[classid]";
		}
		insert_dolog("classid=$add[classid]<br>id=".$add[id]."<br>title=".$add[title]);//操作日志
		printerror("EditNewsSuccess",$closeurl,8);
	}
	else
	{
		printerror("DbError","history.go(-1)",8);
	}
}

//删除信息
function DelNews($id,$classid,$userid,$username){
	global $empire,$class_r,$class_zr,$bclassid,$public_r,$dbtbpre,$emod_r;
	$id=(int)$id;
	$classid=(int)$classid;
	if(!$id||!$classid)
	{
		printerror("NotDelNewsid","history.go(-1)");
	}
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");//操作权限
	if(!$doselfinfo['dodelinfo'])//删除权限
	{
		printerror("NotDelInfoLevel","history.go(-1)");
	}
	$ccr=$empire->fetch1("select classid,modid,listdt,haddlist,repreinfo from {$dbtbpre}enewsclass where classid='$classid'");
	if(!$ccr['classid'])
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
	if(!$r[classid])
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	if($doselfinfo['doselfinfo']&&($r[userid]<>$userid||$r[ismember]))//只能编辑自己的信息
	{
		printerror("NotDoSelfinfo","history.go(-1)");
    }
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$pf=$emod_r[$mid]['pagef'];
	$stf=$emod_r[$mid]['savetxtf'];
	//分页字段
	if($pf)
	{
		if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
		{
			$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
			$r[$pf]=$finfor[$pf];
		}
	}
	//存文本
	if($stf)
	{
		$newstextfile=$r[$stf];
		$r[$stf]=GetTxtFieldText($r[$stf]);
		DelTxtFieldText($newstextfile);//删除文件
	}
	DelNewsFile($r[filename],$r[newspath],$classid,$r[$pf],$r[groupid]);//删除信息文件
	$sql=$empire->query("delete from {$dbtbpre}ecms_".$tbname." where id='$id'");
	$fsql=$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
	//删除其它表记录
	$delsql=$empire->query("delete from {$dbtbpre}enewswfinfo where id='$id' and classid='$r[classid]'");
	$delsql=$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$id' and classid='$r[classid]'");
	$delsql=$empire->query("delete from {$dbtbpre}enewsinfovote where id='$id' and classid='$r[classid]'");
	$delsql=$empire->query("delete from {$dbtbpre}enewsdiggips where id='$id' and classid='$r[classid]'");
	DelNewsTheFile($id,$classid);//删除附件
	if($r['checked'])
	{
		//生成上一篇
		if($ccr['repreinfo'])
		{
			$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id<$id and classid='$classid' and checked=1 order by id desc limit 1");
			GetHtml($prer,'');
			//下一篇
			$nextr=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id>$id and classid='$classid' and checked=1 order by id limit 1");
			if($nextr['id'])
			{
				GetHtml($nextr,'');
			}
		}
		hAddListHtml($classid,$ccr['modid'],$ccr['haddlist'],$ccr['listdt']);//生成信息列表
		if($r[ztid])//如果是专题
		{
			$z_r=explode("|".$r[ztid]."|",$r[ztid]);
			for($z=1;$z<count($z_r)-1;$z++)
			{
				ListHtml(intval($z_r[$z]),'',1);
			}
		}
	}
	//同步删除
	if($r['copyids']&&$r['copyids']<>'1')
	{
		DelInfoToCopyInfo($classid,$id,$r,$userid,$username);
	}
	if($sql)
	{
		insert_dolog("classid=$classid<br>id=".$id."<br>title=".$r[title]);//操作日志
		printerror("DelNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{
		printerror("ErrorUrl","history.go(-1)");
	}
}

//批量删除信息
function DelNews_all($id,$classid,$userid,$username,$ecms=0){
	global $empire,$class_r,$class_zr,$public_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$count=count($id);
	if(!$count)
	{
		printerror("NotDelNewsid","history.go(-1)");
	}
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");//操作权限
	if(!$doselfinfo['dodelinfo'])//删除权限
	{
		printerror("NotDelInfoLevel","history.go(-1)");
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$pf=$emod_r[$mid]['pagef'];
	$stf=$emod_r[$mid]['savetxtf'];
	if($ecms==1)
	{
		$doctb="_doc";
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	for($i=0;$i<$count;$i++)//删除信息文件
	{
		$id[$i]=intval($id[$i]);
		$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname.$doctb." where id='$id[$i]'");
		if($doselfinfo['doselfinfo']&&($r[userid]<>$userid||$r[ismember]))//只能编辑自己的信息
		{
			continue;
		}
		//分页字段
		if($pf)
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
			{
				if($ecms==1)
				{
					$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_doc_data where id='$id[$i]'");
				}
				else
				{
					$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id[$i]'");
				}
				$r[$pf]=$finfor[$pf];
			}
		}
		//存文本
		if($stf)
		{
			$newstextfile=$r[$stf];
			$r[$stf]=GetTxtFieldText($r[$stf]);
			DelTxtFieldText($newstextfile);//删除文件
		}
		DelNewsFile($r[filename],$r[newspath],$r[classid],$r[$pf],$r[groupid]);
		DelNewsTheFile($id[$i],$r[classid]);//删除附件
		//删除副表
		if($ecms==0)
		{
			$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id[$i]'");
		}
		//删除其它表记录
		$empire->query("delete from {$dbtbpre}enewswfinfo where id='$id[$i]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$id[$i]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewsinfovote where id='$id[$i]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewsdiggips where id='$id[$i]' and classid='$r[classid]'");
    }
	//删除信息
	$sql=$empire->query("delete from {$dbtbpre}ecms_".$tbname.$doctb." where ".$add);
	if(empty($doctb))
	{
		$ccr=$empire->fetch1("select classid,modid,listdt,haddlist from {$dbtbpre}enewsclass where classid='$classid'");
		hAddListHtml($classid,$ccr['modid'],$ccr['haddlist'],$ccr['listdt']);//生成信息列表
	}
	else
	{
		$empire->query("delete from {$dbtbpre}ecms_".$tbname."_doc_data where ".$add);
	}
	if($sql)
	{
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);//操作日志
		printerror("DelNewsAllSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//刷新页面
function AddInfoToReHtml($classid,$dore){
	global $class_r;
	hAddListHtml($classid,$class_r[$classid]['modid'],$dore,$class_r[$classid]['listdt']);//生成信息列表
	insert_dolog("classid=".$classid."<br>do=".$dore);//操作日志
	printerror('AddInfoToReHtmlSuccess','history.go(-1)');
}

//增加信息生成页面
function hAddListHtml($classid,$mid,$qaddlist,$listdt){
	global $class_r;
	if($qaddlist==0)//不生成
	{
		return "";
	}
	elseif($qaddlist==1)//生成当前栏目
	{
		if(!$listdt)
		{
			$sonclass="|".$classid."|";
			hReClassHtml($sonclass);
		}
	}
	elseif($qaddlist==2)//生成首页
	{
		hReIndex();
	}
	elseif($qaddlist==3)//生成父栏目
	{
		$featherclass=$class_r[$classid]['featherclass'];
		if($featherclass&&$featherclass!="|")
		{
			hReClassHtml($featherclass);
		}
	}
	elseif($qaddlist==4)//生成当前栏目与父栏目
	{
		$featherclass=$class_r[$classid]['featherclass'];
		if(empty($featherclass))
		{
			$featherclass="|";
		}
		if(!$listdt)
		{
			$featherclass.=$classid."|";
		}
		hReClassHtml($featherclass);
	}
	elseif($qaddlist==5)//生成父栏目与首页
	{
		hReIndex();
		$featherclass=$class_r[$classid]['featherclass'];
		if($featherclass&&$featherclass!="|")
		{
			hReClassHtml($featherclass);
		}
	}
	elseif($qaddlist==6)//生成当前栏目、父栏目与首页
	{
		hReIndex();
		$featherclass=$class_r[$classid]['featherclass'];
		if(empty($featherclass))
		{
			$featherclass="|";
		}
		if(!$listdt)
		{
			$featherclass.=$classid."|";
		}
		hReClassHtml($featherclass);
	}
}

//增加信息生成栏目
function hReClassHtml($sonclass){
	global $empire,$dbtbpre,$class_r;
	$r=explode("|",$sonclass);
	$count=count($r);
	for($i=1;$i<$count-1;$i++)
	{
		//终极栏目
		if($class_r[$r[$i]]['islast'])
		{
			if(!$class_r[$r[$i]]['listdt'])
			{
				ListHtml($r[$i],'',0,$userlistr);
			}
		}
		elseif($class_r[$r[$i]]['islist']==1)//列表式父栏目
		{
			if(!$class_r[$r[$i]]['listdt'])
			{
				ListHtml($r[$i],'',3);
			}
		}
		elseif($class_r[$r[$i]]['islist']==3)//栏目绑定信息
		{
			ReClassBdInfo($r[$i]);
		}
		else//父栏目
		{
			$cr=$empire->fetch1("select classtempid from {$dbtbpre}enewsclass where classid='$r[$i]'");
			$classtemp=$class_r[$r[$i]]['islist']==2?GetClassText($r[$i]):GetClassTemp($cr['classtempid']);
			NewsBq($r[$i],$classtemp,0,0);
		}
	}
}

//增加信息生成首页
function hReIndex(){
	$indextemp=GetIndextemp();
	NewsBq($classid,$indextemp,1,0);
}

//发布同时复制
function AddInfoToCopyInfo($classid,$id,$to_classid,$userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$id=(int)$id;
	$cr=$to_classid;
	$count=count($cr);
	if(empty($classid)||empty($id)||empty($count))
	{
		return '';
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$stf=$emod_r[$mid]['savetxtf'];
	//主表
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id'");
	if(empty($r['id']))
	{
		return '';
	}
	//副表
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$fr=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
		$r=array_merge($r,$fr);
	}
	if($stf)//存放文本
	{
		$r[newstext_url]=$r[$stf];
		$r[$stf]=GetTxtFieldText($r[$stf]);
	}
	$ids=',';
	for($i=0;$i<$count;$i++)
	{
		$newclassid=(int)$cr[$i];
		if(!$newclassid||!$class_r[$newclassid][islast]||$mid<>$class_r[$newclassid][modid]||$newclassid==$classid)
		{
			continue;
		}
		//查看目录是否存在，不存在则建立
		$newspath=FormatPath($newclassid,"",0);
		$newstempid=0;
		$copyids='1';
		//返回自定义字段
		$ret_r=ReturnAddF($r,$mid,$userid,$username,9,1,0);
		if($class_r[$newclassid][wfid])
		{
			$checked=0;
			$isqf=1;
	    }
		else
		{
			$checked=$class_r[$newclassid][checked];
			$isqf=0;
	    }
		$checked=(int)$checked;
		//主表
		$empire->query("insert into {$dbtbpre}ecms_".$tbname."(classid,onclick,newspath,keyboard,keyid,userid,username,ztid,checked,truetime,ismember,dokey,isgood,titlefont,titleurl,filename,groupid,newstempid,plnum,firsttitle,isqf,userfen,totaldown,closepl,havehtml,lastdotime,haveaddfen,infopfen,infopfennum,votenum,stb,copyids,ttid,infotags,ispic".$ret_r[fields].") values('$newclassid',0,'$newspath','".StripAddsData($r[keyboard])."','$r[keyid]','$r[userid]','".StripAddsData($r[username])."','',$checked,'$r[truetime]',0,$r[dokey],0,'".StripAddsData($r[titlefont])."','".StripAddsData($r[titleurl])."','$filename',$r[groupid],'".$newstempid."',0,0,'$isqf',$r[userfen],0,$r[closepl],$r[havehtml],$r[truetime],0,0,0,0,'$ret_r[tb]','$copyids','$r[ttid]','','$r[ispic]'".$ret_r[values].");");
		$l_id=$empire->lastid();
		//副表
		$empire->query("insert into {$dbtbpre}ecms_".$tbname."_data_".$ret_r[tb]."(id,classid".$ret_r[datafields].") values('$l_id','$newclassid'".$ret_r[datavalues].");");
		//签发
		if($isqf==1)
		{
			InfoInsertToWorkflow($l_id,$newclassid,$class_r[$newclassid][wfid],$userid,$username);
		}
		//文件命名
		$filename=ReturnInfoFilename($newclassid,$l_id,$r[filenameqz]);
		$empire->query("update {$dbtbpre}ecms_".$tbname." set filename='$filename' where id='$l_id'");
		//生成信息文件
		$addr=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$l_id'");
		GetHtml($addr,'');
		$ids.=$l_id.',';
    }
	if($ids==',')
	{
		$ids='';
	}
	return $ids;
}

//发布同步修改
function EditInfoToCopyInfo($classid,$id,$userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$id=(int)$id;
	if(empty($classid)||empty($id))
	{
		return '';
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$stf=$emod_r[$mid]['savetxtf'];
	//主表
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id'");
	$cr=explode(',',$r[copyids]);
	$count=count($cr);
	if(empty($r['id'])||$count<3)
	{
		return '';
	}
	//副表
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$fr=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]."  where id='$id'");
		$r=array_merge($r,$fr);
	}
	if($stf)//存放文本
	{
		$r[newstext_url]=$r[$stf];
		$r[$stf]=GetTxtFieldText($r[$stf]);
	}
	for($i=1;$i<$count-1;$i++)
	{
		$infoid=(int)$cr[$i];
		if(empty($infoid))
		{
			continue;
		}
		if($stf)
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$stf.','))
			{
				$infor=$empire->fetch1("select stb from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
				if(!$infor[stb])
				{
					continue;
				}
				$infodr=$empire->fetch1("select ".$stf." from {$dbtbpre}ecms_".$tbname."_data_".$infor[stb]." where id='$infoid'");
				$r[newstext_url]=$infodr[$stf];
			}
			else
			{
				$infor=$empire->fetch1("select ".$stf.",stb from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
				if(!$infor[stb])
				{
					continue;
				}
				$r[newstext_url]=$infor[$stf];
			}
		}
		else
		{
			$infor=$empire->fetch1("select stb from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
			if(!$infor[stb])
			{
				continue;
			}
		}
		//返回自定义字段
		$ret_r=ReturnAddF($r,$mid,$userid,$username,8,1,0);
		//主表
		$empire->query("update {$dbtbpre}ecms_".$tbname." set keyboard='".StripAddsData($r[keyboard])."',keyid='$r[keyid]',checked=$r[checked],dokey=$r[dokey],titlefont='".StripAddsData($r[titlefont])."',titleurl='".StripAddsData($r[titleurl])."',groupid=$r[groupid],userfen=$r[userfen],closepl=$r[closepl],lastdotime=$r[lastdotime],ttid='$r[ttid]',ispic='$r[ispic]'".$ret_r[values]." where id='$infoid'");
		//副表
		$empire->query("update {$dbtbpre}ecms_".$tbname."_data_".$ret_r[tb]." set id='$infoid'".$ret_r[datavalues]." where id='$infoid'");
		//生成信息文件
		$addr=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
		GetHtml($addr,'');
	}
}

//发布同步删除
function DelInfoToCopyInfo($classid,$id,$r,$userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$id=(int)$id;
	if(empty($classid)||empty($id))
	{
		return '';
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$stf=$emod_r[$mid]['savetxtf'];
	$cr=explode(',',$r[copyids]);
	$count=count($cr);
	if(empty($r['id'])||$count<3)
	{
		return '';
	}
	$selectdataf='';
	$dh='';
	if($stf&&strstr($emod_r[$mid]['tbdataf'],','.$stf.','))
	{
		$selectdataf.=$stf;
		$dh=',';
	}
	$pf=$emod_r[$mid]['pagef'];
	if($pf&&strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
	{
		$selectdataf.=$dh.$pf;
	}
	for($i=1;$i<$count-1;$i++)
	{
		$infoid=(int)$cr[$i];
		if(empty($infoid))
		{
			continue;
		}
		$infor=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
		if(!$infor[stb])
		{
			continue;
		}
		if($selectdataf)
		{
			$infodr=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$infor[stb]." where id='$infoid'");
			$infor=array_merge($infor,$infodr);
		}
		//存文本
		if($stf)
		{
			$newstextfile=$infor[$stf];
			$infor[$stf]=GetTxtFieldText($infor[$stf]);
			DelTxtFieldText($newstextfile);//删除文件
		}
		DelNewsFile($infor[filename],$infor[newspath],$infor[classid],$infor[$pf],$infor[groupid]);//删除信息文件
		$empire->query("delete from {$dbtbpre}ecms_".$tbname." where id='$infoid'");
		$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$infor[stb]." where id='$infoid'");
		//删除其它表记录
		$empire->query("delete from {$dbtbpre}enewswfinfo where id='$infoid' and classid='$infor[classid]'");
		$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$infoid' and classid='$infor[classid]'");
		$empire->query("delete from {$dbtbpre}enewsinfovote where id='$infoid' and classid='$infor[classid]'");
		$empire->query("delete from {$dbtbpre}enewsdiggips where id='$infoid' and classid='$infor[classid]'");
		DelNewsTheFile($infoid,$infor[classid]);//删除附件
	}
}

//信息置顶
function TopNews_all($classid,$id,$istop,$userid,$username){
	global $empire,$bclassid,$class_r,$dbtbpre;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");//验证权限
	if(!$doselfinfo['doeditinfo'])//编辑权限
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotTopNewsid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
	}
	$istop=(int)$istop;
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set istop=$istop where ".$add);
	//刷新列表
	ReListHtml($classid,1);
	if($sql)
	{
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);//操作日志
		printerror("TopNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//审核信息
function CheckNews_all($classid,$id,$userid,$username){
	global $empire,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotCheckNewsid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set checked=1 where isqf=0 and (".$add.")");
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where ".$add);
	while($r=$empire->fetch($sql))
	{
		//投稿增加积分
		if($r[ismember]&&$r[userid]&&!$r[haveaddfen])
		{
			$cr=$empire->fetch1("select classid,addinfofen from {$dbtbpre}enewsclass where classid='$r[classid]'");
			if($cr[addinfofen])
			{
				AddInfoFen($cr[addinfofen],$r[userid]);
				if($cr[addinfofen]<0)
				{
					BakDown($r[classid],$r[id],0,$r[userid],$r[username],$r[title],abs($cr[addinfofen]),3);
				}
			}
			$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set haveaddfen=1 where id=$r[id]");
		}
		//刷新信息
		GetHtml($r,'');
	}
	//刷新列表
	//ReListHtml($classid,1);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("CheckNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//取消审核信息
function NoCheckNews_all($classid,$id,$userid,$username){
	global $empire,$class_r,$public_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotNoCheckNewsid","history.go(-1)");
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$pf=$emod_r[$mid]['pagef'];
	$stf=$emod_r[$mid]['savetxtf'];
	for($i=0;$i<$count;$i++)
	{
		$id[$i]=(int)$id[$i];
		//主表
		$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='".$id[$i]."'");
		//分页字段
		if($pf)
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
			{
				$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id[$i]'");
				$r[$pf]=$finfor[$pf];
			}
			if($stf&&$stf==$pf)//存放文本
			{
				$r[$pf]=GetTxtFieldText($r[$pf]);
			}
		}
		DelNewsFile($r[filename],$r[newspath],$r[classid],$r[$pf],$r[groupid]);
		$add.="id='$id[$i]' or ";
	}
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set checked=0,havehtml=0 where isqf=0 and (".$add.")");
	//刷新列表
	ReListHtml($classid,1);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("NoCheckNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//移动信息
function MoveNews_all($classid,$id,$to_classid,$userid,$username){
	global $empire,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$to_classid=(int)$to_classid;
	if(empty($classid)||empty($to_classid))
	{
		printerror("EmptyMoveClassid","history.go(-1)");
	}
	if(empty($class_r[$classid][islast])||empty($class_r[$to_classid][islast]))
	{
		printerror("EmptyMoveClassid","history.go(-1)");
	}
	if($class_r[$classid][modid]<>$class_r[$to_classid][modid])
	{
		printerror("DefModid","history.go(-1)");
    }
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotMoveNewsid","history.go(-1)");
	}
	$upltbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");//评论
	$tbname=$class_r[$classid][tbname];
	for($i=0;$i<$count;$i++)
	{
		$id[$i]=(int)$id[$i];
		$add.="id='$id[$i]' or ";
		$r=$empire->fetch1("select stb,classid from {$dbtbpre}ecms_".$tbname." where id='$id[$i]'");
		//副表
		$empire->query("update {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." set classid='$to_classid' where id='$id[$i]'");
		//评论转换
		$empire->query("update {$dbtbpre}enewspl set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
		if($upltbr['pldatatbs'])
		{
			$pldtbr=explode(',',$upltbr['pldatatbs']);
			$plcount=count($pldtbr)-1;
			for($pli=1;$pli<$plcount;$pli++)
			{
				$empire->query("update {$dbtbpre}enewspl_data_".$pldtbr[$pli]." set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
			}
		}
		//签发转换
		$empire->query("update {$dbtbpre}enewswfinfo set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
		$empire->query("update {$dbtbpre}enewswfinfolog set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
		//投票
		$empire->query("update {$dbtbpre}enewsinfovote set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
		//digg
		$empire->query("update {$dbtbpre}enewsdiggips set classid=$to_classid where id='".$id[$i]."' and classid='$r[classid]'");
	}
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}ecms_".$tbname." set classid=$to_classid where ".$add);
	//刷新列表
	ReListHtml($classid,1);
	ReListHtml($to_classid,1);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("MoveNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//复制信息
function CopyNews_all($classid,$id,$to_classid,$userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre,$emod_r;
	$classid=(int)$classid;
	$to_classid=(int)$to_classid;
	if(empty($classid)||empty($to_classid))
	{
		printerror("EmptyCopyClassid","history.go(-1)");
	}
	if(empty($class_r[$classid][islast])||empty($class_r[$to_classid][islast]))
	{
		printerror("EmptyCopyClassid","history.go(-1)");
	}
	if($class_r[$classid][modid]<>$class_r[$to_classid][modid])
	{
		printerror("DefModid","history.go(-1)");
    }
	$userid=(int)$userid;
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotCopyNewsid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$stf=$emod_r[$mid]['savetxtf'];
	//查看目录是否存在，不存在则建立
	$newspath=FormatPath($to_classid,"",0);
    $newstime=time();
    $truetime=$newstime;
	$newstempid=0;
	$dosql=$empire->query("select * from {$dbtbpre}ecms_".$tbname." where ".$add);
	while($r=$empire->fetch($dosql))
	{
		//副表
		if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
		{
			$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
			$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
			$r=array_merge($r,$finfor);
		}
		if($stf)//存放文本
		{
			$r[$stf]=GetTxtFieldText($r[$stf]);
		}
		//返回自定义字段
		$ret_r=ReturnAddF($r,$class_r[$to_classid][modid],$userid,$username,9,1,0);
		if($class_r[$to_classid][wfid])
		{
			$checked=0;
			$isqf=1;
	    }
		else
		{
			$checked=$class_r[$to_classid][checked];
			$isqf=0;
	    }
		$checked=(int)$checked;
		//主表
		$sql=$empire->query("insert into {$dbtbpre}ecms_".$tbname."(classid,onclick,newspath,keyboard,keyid,userid,username,ztid,checked,truetime,ismember,dokey,isgood,titlefont,titleurl,filename,groupid,newstempid,plnum,firsttitle,isqf,userfen,totaldown,closepl,havehtml,lastdotime,haveaddfen,infopfen,infopfennum,votenum,stb,ttid,infotags,ispic".$ret_r[fields].") values($to_classid,0,'$newspath','$r[keyboard]','$r[keyid]',$userid,'$username','',$checked,$truetime,0,$r[dokey],0,'$r[titlefont]','$r[titleurl]','$filename',$r[groupid],'".$newstempid."',0,0,'$isqf',$r[userfen],0,$r[closepl],$r[havehtml],$truetime,0,0,0,0,'$ret_r[tb]','$r[ttid]','$r[infotags]','$r[ispic]'".$ret_r[values].");");
		$l_id=$empire->lastid();
		//副表
		$empire->query("insert into {$dbtbpre}ecms_".$tbname."_data_".$ret_r[tb]."(id,classid".$ret_r[datafields].") values('$l_id','$to_classid'".$ret_r[datavalues].");");
		//签发
		if($isqf==1)
		{
			InfoInsertToWorkflow($l_id,$to_classid,$class_r[$to_classid][wfid],$userid,$username);
		}
		//文件命名
		$filename=ReturnInfoFilename($to_classid,$l_id,$r[filenameqz]);
		$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$to_classid][tbname]." set filename='$filename' where id='$l_id'");
		//生成信息文件
		$addr=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$to_classid][tbname]." where id='$l_id'");
		GetHtml($addr,'');
	}
	//刷新列表
	ReListHtml($to_classid,1);
	//操作日志
	insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
	printerror("CopyNewsSuccess",$_SERVER['HTTP_REFERER']);
}

//批量转移信息
function MoveClassNews($add,$userid,$username){
	global $empire,$class_r,$dbtbpre,$emod_r;
	$add[classid]=(int)$add[classid];
	$add[toclassid]=(int)$add[toclassid];
	if(empty($add[classid])||empty($add[toclassid]))
	{
		printerror("EmptyMovetoClassid","history.go(-1)");
	}
	if($class_r[$add[classid]][modid]<>$class_r[$add[toclassid]][modid])
	{
		printerror("DefModid","history.go(-1)");
    }
	//验证权限
	CheckLevel($userid,$username,$classid,"movenews");
	//终极栏目
	if(!$class_r[$add[classid]][islast]||!$class_r[$add[toclassid]][islast])
	{
		printerror("MovetoClassidMustLastid","history.go(-1)");
	}
	if($add[classid]==$add[toclassid])
	{
		printerror("MoveClassidsame","history.go(-1)");
	}
	$mid=$class_r[$add[classid]][modid];
	$tbname=$class_r[$add[classid]][tbname];
	$sql=$empire->query("update {$dbtbpre}ecms_".$tbname." set classid=$add[toclassid] where classid='$add[classid]'");
	//副表
	$dtbr=explode(',',$emod_r[$mid][datatbs]);
	$tbcount=count($dtbr);
	for($i=1;$i<$tbcount-1;$i++)
	{
		$empire->query("update {$dbtbpre}ecms_".$tbname."_data_".$dtbr[$i]." set classid=$add[toclassid] where classid='$add[classid]'");
	}
	//评论转换
	$uplsql=$empire->query("update {$dbtbpre}enewspl set classid=$add[toclassid] where classid='$add[classid]'");
	$upltbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if($upltbr['pldatatbs'])
	{
		$pldtbr=explode(',',$upltbr['pldatatbs']);
		$count=count($pldtbr)-1;
		for($i=1;$i<$count;$i++)
		{
			$empire->query("update {$dbtbpre}enewspl_data_".$pldtbr[$i]." set classid=$add[toclassid] where classid='$add[classid]'");
		}
	}
	//签发转换
	$uqfsql=$empire->query("update {$dbtbpre}enewswfinfo set classid=$add[toclassid] where classid='$add[classid]'");
	$uqfsql=$empire->query("update {$dbtbpre}enewswfinfolog set classid=$add[toclassid] where classid='$add[classid]'");
	//投票
	$uvotesql=$empire->query("update {$dbtbpre}enewsinfovote set classid=$add[toclassid] where classid='$add[classid]'");
	//digg
	$empire->query("update {$dbtbpre}enewsdiggips set classid=$add[toclassid] where classid='$add[classid]'");
	//生成信息列表
	ListHtml($add[toclassid],$ret_r,0);
	//移动数据
	$opath=ECMS_PATH.$class_r[$add[classid]][classpath];
    DelPath($opath);//删除旧的栏目目录
	$mk=DoMkdir($opath);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$add[classid]."&nbsp;(".$class_r[$add[classid]][classname].")<br>toclassid=".$add[toclassid]."(".$class_r[$add[toclassid]][classname].")");
		printerror("MoveClassNewsSuccess","MoveClassNews.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//批量推荐/头条信息
function GoodInfo_all($classid,$id,$isgood,$doing=0,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$isgood=(int)$isgood;
	$doing=(int)$doing;
	if($doing==0)//推荐
	{
		$mess="EmptyGoodInfoId";
		$domess="GoodInfoSuccess";
		$setf="isgood=$isgood";
	}
	else//头条
	{
		$mess="EmptyFirsttitleInfoId";
		$domess="FirsttitleInfoSuccess";
		$setf="firsttitle=$isgood";
	}
	$count=count($id);
	if(empty($count))
	{
		printerror($mess,"history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set ".$setf." where ".$add);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror($domess,$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//转至专题
function DoZtNews_all($classid,$id,$ztid,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	$ztid=(int)$ztid;
	if(!$ztid)
	{
		printerror("EmptyDoZtid","history.go(-1)");
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("EmptyDoZtInfoId","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='".intval($id[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$repztid="|".$ztid."|";
	$conztid=$ztid."|";
	//将空转换为|
	$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set ztid='|' where (".$add.") and ztid=''");
	//设置专题
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set ztid=CONCAT(REPLACE(ztid,'".$repztid."','|'),'".$conztid."') where ".$add);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("DoZtInfoSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//本栏目信息全部审核
function SetAllCheckInfo($bclassid,$classid,$userid,$username){
	global $empire,$dbtbpre,$class_r;
	$classid=(int)$classid;
	if(empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//验证权限
	$doselfinfo=CheckLevel($userid,$username,$classid,"news");
	//编辑权限
	if(!$doselfinfo['doeditinfo'])
	{
		printerror("NotEditInfoLevel","history.go(-1)");
	}
	//只能操作自己的信息
	if($doselfinfo['doselfinfo'])
	{
		$a.=" and userid='$userid' and ismember=0";
	}
	$sql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set checked=1 where classid=$classid and isqf=0".$a);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("CheckNewsSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//签发信息
function DoWfInfo($add,$userid,$username){
	global $empire,$dbtbpre,$class_r,$emod_r,$lur;
	$id=(int)$add[id];
	$classid=(int)$add[classid];
	$doing=(int)$add['doing'];
	if(!$id||!$classid||!$doing)
	{
		printerror('EmptyDoWfInfo','');
	}
	$wfinfor=$empire->fetch1("select id,checknum,wfid,tid,groupid,userclass,username,checktno from {$dbtbpre}enewswfinfo where id='$id' and classid='$classid' limit 1");
	if(!$wfinfor[id])
	{
		printerror('ErrorUrl','');
	}
	if($wfinfor[checktno]=='100'||$wfinfor[checktno]=='101'||$wfinfor[checktno]=='102')
	{
		printerror('DoWfInfoOver','');
	}
	$wfitemr=$empire->fetch1("select tid,wfid,tno,groupid,userclass,username,lztype,tbdo,tddo,tstatus from {$dbtbpre}enewsworkflowitem where tid='$wfinfor[tid]'");
	if(!(strstr(','.$wfitemr[groupid].',',','.$lur[groupid].',')||strstr(','.$wfitemr[userclass].',',','.$lur[classid].',')||strstr(','.$wfitemr[username].',',','.$lur[username].',')))
	{
		printerror("NotDoCheckUserLevel","history.go(-1)");
	}
	if(!(strstr(','.$wfinfor[groupid].',',','.$lur[groupid].',')||strstr(','.$wfinfor[userclass].',',','.$lur[classid].',')||strstr(','.$wfinfor[username].',',','.$lur[username].',')))
	{
		printerror("HaveDoWfInfo","history.go(-1)");
	}
	$checktext=htmlspecialchars($add[checktext]);
	if($doing==1)//通过
	{
		if($wfitemr[lztype]==0)//普签
		{
			if($wfitemr['tno']=='100')//全部通过
			{
				$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set checked=1 where id='$id'");
				$empire->query("update {$dbtbpre}enewswfinfo set tstatus='',checktno='100' where id='$id' and classid='$classid' limit 1");
				//日志
				InsertWfLog($classid,$id,$wfitemr[wfid],$wfitemr[tid],$username,$checktext,$wfinfor[checknum],1);
				//生成
				$ar=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id'");
				GetHtml($ar,'');
				ListHtml($classid,$fr,0);
			}
			else//流转
			{
				$newwfitemr=$empire->fetch1("select tid,wfid,tno,groupid,userclass,username,lztype,tbdo,tddo,tstatus from {$dbtbpre}enewsworkflowitem where wfid='$wfitemr[wfid]' and tno>$wfitemr[tno] order by tno limit 1");
				$empire->query("update {$dbtbpre}enewswfinfo set tid='$newwfitemr[tid]',groupid='$newwfitemr[groupid]',userclass='$newwfitemr[userclass]',username='$newwfitemr[username]',tstatus='$newwfitemr[tstatus]',checktno='0' where id='$id' and classid='$classid' limit 1");
				//日志
				InsertWfLog($classid,$id,$newwfitemr[wfid],$newwfitemr[tid],$username,$checktext,$wfinfor[checknum],1);
			}
		}
		else//会签
		{
			$newgroupid=str_replace(','.$lur[groupid].',',',',$wfinfor[groupid]);
			$newuserclass=str_replace(','.$lur[classid].',',',',$wfinfor[userclass]);
			$newusername=str_replace(','.$lur[username].',',',',$wfinfor[username]);
			//下一个节点
			if(($newgroupid==''||$newgroupid==',')&&($newuserclass==''||$newuserclass==',')&&($newusername==''||$newusername==','))
			{
				if($wfitemr['tno']=='100')//全部通过
				{
					$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set checked=1 where id='$id'");
					$empire->query("update {$dbtbpre}enewswfinfo set tstatus='',checktno='100' where id='$id' and classid='$classid' limit 1");
					//日志
					InsertWfLog($classid,$id,$wfitemr[wfid],$wfitemr[tid],$username,$checktext,$wfinfor[checknum],1);
					//生成
					$ar=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id'");
					GetHtml($ar,'');
					ListHtml($classid,$fr,0);
				}
				else//流转
				{
					$newwfitemr=$empire->fetch1("select tid,wfid,tno,groupid,userclass,username,lztype,tbdo,tddo,tstatus from {$dbtbpre}enewsworkflowitem where wfid='$wfitemr[wfid]' and tno>$wfitemr[tno] order by tno limit 1");
					$empire->query("update {$dbtbpre}enewswfinfo set tid='$newwfitemr[tid]',groupid='$newwfitemr[groupid]',userclass='$newwfitemr[userclass]',username='$newwfitemr[username]',tstatus='$newwfitemr[tstatus]',checktno='0' where id='$id' and classid='$classid' limit 1");
					//日志
					InsertWfLog($classid,$id,$newwfitemr[wfid],$newwfitemr[tid],$username,$checktext,$wfinfor[checknum],1);
				}
			}
			else//本节点继续
			{
				$empire->query("update {$dbtbpre}enewswfinfo set groupid='$newgroupid',userclass='$newuserclass',username='$newusername' where id='$id' and classid='$classid' limit 1");
				//日志
				InsertWfLog($classid,$id,$wfitemr[wfid],$wfitemr[tid],$username,$checktext,$wfinfor[checknum],1);
			}
		}
		$mess='DoWfInfoCkSuccess';
	}
	elseif($doing==2)//返工
	{
		if(empty($checktext))
		{
			printerror('EmptyChecktext','history.go(-1)');
		}
		if($wfitemr[tbdo]==0)//发给作者
		{
			$empire->query("update {$dbtbpre}enewswfinfo set tid=0,tstatus='',checktno='101' where id='$id' and classid='$classid' limit 1");
		}
		else//发给节点
		{
			$newwfitemr=$empire->fetch1("select tid,wfid,tno,groupid,userclass,username,lztype,tbdo,tddo,tstatus from {$dbtbpre}enewsworkflowitem where wfid='$wfitemr[wfid]' and tid='$wfitemr[tbdo]' limit 1");
			$empire->query("update {$dbtbpre}enewswfinfo set tid='$newwfitemr[tid]',groupid='$newwfitemr[groupid]',userclass='$newwfitemr[userclass]',username='$newwfitemr[username]',tstatus='$newwfitemr[tstatus]',checktno='101' where id='$id' and classid='$classid' limit 1");
		}
		//日志
		InsertWfLog($classid,$id,$wfitemr[wfid],$wfitemr[tid],$username,$checktext,$wfinfor[checknum],2);
		$mess='DoWfInfoTbSuccess';
	}
	else//否决
	{
		if(empty($checktext))
		{
			printerror('EmptyChecktext','history.go(-1)');
		}
		$empire->query("update {$dbtbpre}enewswfinfo set tid=0,tstatus='',checktno='102' where id='$id' and classid='$classid' limit 1");
		//日志
		InsertWfLog($classid,$id,$wfitemr[wfid],$wfitemr[tid],$username,$checktext,$wfinfor[checknum],3);
		if($wfitemr[tddo])//删除信息
		{
			$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id'");
			$mid=$class_r[$classid][modid];
			$tbname=$class_r[$classid][tbname];
			$pf=$emod_r[$mid]['pagef'];
			$stf=$emod_r[$mid]['savetxtf'];
			//分页字段
			if($pf)
			{
				if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
				{
					$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
					$r[$pf]=$finfor[$pf];
				}
			}
			//存文本
			if($stf)
			{
				$newstextfile=$r[$stf];
				$r[$stf]=GetTxtFieldText($r[$stf]);
				DelTxtFieldText($newstextfile);//删除文件
			}
			DelNewsFile($r[filename],$r[newspath],$classid,$r[$pf],$r[groupid]);//删除信息文件
			$sql=$empire->query("delete from {$dbtbpre}ecms_".$tbname." where id='$id'");
			$fsql=$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
			//删除其它表记录
			$delsql=$empire->query("delete from {$dbtbpre}enewswfinfo where id='$id' and classid='$r[classid]'");
			$delsql=$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$id' and classid='$r[classid]'");
			$delsql=$empire->query("delete from {$dbtbpre}enewsinfovote where id='$id' and classid='$r[classid]'");
			$delsql=$empire->query("delete from {$dbtbpre}enewsdiggips where id='$id' and classid='$r[classid]'");
			DelNewsTheFile($id,$classid);//删除附件
		}
		$mess='DoWfInfoTdSuccess';
		$isclose=1;
	}
	//操作日志
	insert_dolog("classid=$classid&id=$id");
	printerror($mess,"workflow/DoWfInfo.php?classid=$classid&id=$id&isclose=$isclose");
}

//批量删除信息
function DelInfoData($start,$classid,$from,$retype,$startday,$endday,$startid,$endid,$tbname,$add,$userid,$username){
	global $empire,$public_r,$class_r,$fun_r,$dbtbpre,$emod_r;
	//验证权限
	CheckLevel($userid,$username,$classid,"delinfodata");
	$search='';
	$start=(int)$start;
	$tbname=RepPostVar($tbname);
	if(empty($tbname))
	{
		printerror("ErrorUrl","history.go(-1)");
    }
	$search.="&tbname=$tbname";
	//按栏目
	$classid=(int)$classid;
	if($classid)
	{
		if(empty($class_r[$classid][islast]))//大栏目
		{
			$where=ReturnClass($class_r[$classid][sonclass]);
		}
		else//终极栏目
		{
			$where="classid='$classid'";
		}
		$add1=" and (".$where.")";
		$search.="&classid=$classid";
    }
	//按ID刷新
	$search.="&retype=$retype";
	if($retype)
	{
		$startid=(int)$startid;
		$endid=(int)$endid;
		if($endid)
		{
			$add1.=" and id>=$startid and id<=$endid";
	    }
		$search.="&startid=$startid&endid=$endid";
    }
	else
	{
		$startday=RepPostVar($startday);
		$endday=RepPostVar($endday);
		if($startday&&$endday)
		{
			$add1.=" and truetime>=".to_time($startday." 00:00:00")." and truetime<=".to_time($endday." 23:59:59");
	    }
		$search.="&startday=$startday&endday=$endday";
    }
	//信息类型
	$infost=(int)$add['infost'];
	if($infost)
	{
		if($infost==1)//已审核
		{
			$add1.=" and checked=1";
		}
		else//未审核
		{
			$add1.=" and checked=0";
		}
		$search.="&infost=$infost";
	}
	//用户发布
	$ismember=(int)$add['ismember'];
	if($ismember)
	{
		if($ismember==1)//游客
		{
			$add1.=" and userid=0";
		}
		elseif($ismember==2)//会员+用户
		{
			$add1.=" and userid>0";
		}
		elseif($ismember==3)//会员
		{
			$add1.=" and userid>0 and ismember=1";
		}
		elseif($ismember==4)//用户
		{
			$add1.=" and userid>0 and ismember=0";
		}
		$search.="&ismember=$ismember";
	}
	//是否外部链接
	$isurl=(int)$add['isurl'];
	if($isurl)
	{
		if($isurl==1)//外部链接
		{
			$add1.=" and titleurl<>''";
		}
		else//内部信息
		{
			$add1.=" and titleurl=''";
		}
		$search.="&isurl=$isurl";
	}
	//评论数
	$plnum=(int)$add['plnum'];
	if($plnum)
	{
		$add1.=" and plnum<".$plnum;
		$search.="&plnum=$plnum";
	}
	//点击数
	$onclick=(int)$add['onclick'];
	if($onclick)
	{
		$add1.=" and onclick<".$onclick;
		$search.="&onclick=$onclick";
	}
	//下载数
	$totaldown=(int)$add['totaldown'];
	if($totaldown)
	{
		$add1.=" and totaldown<".$totaldown;
		$search.="&totaldown=$totaldown";
	}
	//用户ID
	$userids=RepPostVar($add['userids']);
	$usertype=(int)$add['usertype'];
	if($userids)
	{
		$uidsr=explode(',',$userids);
		$uidscount=count($uidsr);
		$uids='';
		$udh='';
		for($ui=0;$ui<$uidscount;$ui++)
		{
			$uids.=$udh.intval($uidsr[$ui]);
			$udh=',';
		}
		if($usertype==1)//用户
		{
			$add1.=" and userid in (".$uids.") and ismember=0";
		}
		else//会员
		{
			$add1.=" and userid in (".$uids.") and ismember=1";
		}
		$search.="&userids=$userids&usertype=$usertype";
	}
	//标题
	$title=RepPostStr($add['title']);
	if($title)
	{
		$titler=explode('|',$title);
		$titlecount=count($titler);
		$titlewhere='';
		$titleor='';
		for($ti=0;$ti<$titlecount;$ti++)
		{
			$titlewhere.=$titleor."title like '%".$titler[$ti]."%'";
			$titleor=' or ';
		}
		$add1.=" and (".$titlewhere.")";
		$search.="&title=$title";
	}
	$b=0;
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$tbname." where id>$start".$add1." order by id limit ".$public_r[delnewsnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$new_start=$r[id];
		$mid=$emod_r[$r[classid]]['modid'];
		$pf=$emod_r[$mid]['pagef'];
		$stf=$emod_r[$mid]['savetxtf'];
		//分页字段
		if($pf)
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
			{
				$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
				$r[$pf]=$finfor[$pf];
			}
		}
		//存文本
		if($stf)
		{
			$newstextfile=$r[$stf];
			$r[$stf]=GetTxtFieldText($r[$stf]);
			DelTxtFieldText($newstextfile);//删除文件
		}
		//删除信息文件
		if($add['delhtml']!=1)
		{
			DelNewsFile($r[filename],$r[newspath],$r[classid],$r[$pf],$r[groupid]);
		}
		$empire->query("delete from {$dbtbpre}ecms_".$tbname." where id='$r[id]'");
		$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		//删除其它表记录
		$empire->query("delete from {$dbtbpre}enewswfinfo where id='$r[id]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$r[id]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewsinfovote where id='$r[id]' and classid='$r[classid]'");
		$empire->query("delete from {$dbtbpre}enewsdiggips where id='$r[id]' and classid='$r[classid]'");
		//删除附件
		DelNewsTheFile($r['id'],$r['classid']);
	}
	if(empty($b))
	{
	    //操作日志
	    insert_dolog("");
		printerror("DelNewsAllSuccess","db/DelData.php");
	}
	echo $fun_r[OneDelDataSuccess]."(ID:<font color=red><b>".$new_start."</b></font>)<script>self.location.href='ecmsinfo.php?enews=DelInfoData&start=$new_start&from=$from&delhtml=$add[delhtml]".$search."';</script>";
	exit();
}

//归档信息(栏目)
function InfoToDoc_class($add,$userid,$username){
	global $empire,$dbtbpre,$public_r,$class_r;
	//操作权限
	CheckLevel($userid,$username,$classid,"class");
	$classid=(int)$add['classid'];
	if(!$classid)
	{
		printerror("EmptyDocClass","");
	}
	$start=(int)$add['start'];
	$cr=$empire->fetch1("select tbname,doctime from {$dbtbpre}enewsclass where classid='$classid' and islast=1");
	if(!$cr['tbname']||!$cr['doctime'])
	{
		printerror("EmptyDocTimeClass","");
	}
	$line=$public_r['docnewsnum'];
	$b=0;
	$doctime=time()-$cr['doctime']*24*3600;
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$cr[tbname]." where id>$start and classid='$classid' and truetime<$doctime order by id limit ".$line);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$new_start=$r['id'];
		DoDocInfo($cr[tbname],$r,0);
	}
	if(empty($b))
	{
		$add['docfrom']=urldecode($add['docfrom']);
		//操作日志
		insert_dolog("tbname=".$cr['tbname']."&classid=$classid&do=1");
		printerror("InfoToDocSuccess",$add['docfrom']);
	}
	echo $fun_r[OneInfoToDocSuccess]."(ID:<font color=red><b>".$new_start."</b></font>)<script>self.location.href='ecmsinfo.php?enews=InfoToDoc&ecmsdoc=1&classid=$classid&start=$new_start&docfrom=$add[docfrom]';</script>";
	exit();
}

//归档信息(按条件批量)
function InfoToDoc($add,$userid,$username){
	global $empire,$dbtbpre,$public_r,$class_r;
	//操作权限
	CheckLevel($userid,$username,$classid,"infodoc");
	$tbname=RepPostVar($add['tbname']);
	if(empty($tbname))
	{
		printerror("EmptyDocTb","");
	}
	$selecttbname=$tbname;
	if($add['doing']==1)
	{
		$selecttbname=$tbname.'_doc';
	}
	$search="&retype=$add[retype]";
	if($add['retype']==0)//按天数归档
	{
		if($add['doing']==1)//还原
		{
			$doctime=(int)$add['doctime1'];
			$dx=">";
		}
		else//归档
		{
			$doctime=(int)$add['doctime'];
			$dx="<";
		}
		if(!$doctime)
		{
			printerror("EmptyDoctime","");
		}
		$chtime=time()-$doctime*24*3600;
		$where='truetime'.$dx.$chtime;
		$log="doctime=$doctime";
		$search.="&doctime=$add[doctime]&doctime1=$add[doctime1]";
	}
	elseif($add['retype']==1)//按时间归档
	{
		$startday=RepPostVar($add['startday']);
		$endday=RepPostVar($add['endday']);
		if(!$endday)
		{
			printerror("EmptyDocDay","");
		}
		if($startday)
		{
			$where="truetime>=".to_time($startday." 00:00:00")." and ";
		}
		$where.="truetime<=".to_time($endday." 23:59:59");
		$log="startday=$startday&endday=$endday";
		$search.="&startday=$add[startday]&endday=$add[endday]";
	}
	else//按ID归档
	{
		$startid=(int)$add['startid'];
		$endid=(int)$add['endid'];
		if(!$endid)
		{
			printerror("EmptyDocId","");
		}
		if($startid)
		{
			$where="id>=".$startid." and ";
		}
		$where.="id<=".$endid;
		$log="startid=$startid&endid=$endid";
		$search.="&startid=$add[startid]&endid=$add[endid]";
	}
	//栏目
	$classid=$add['classid'];
	$count=count($classid);
	if($count)
	{
		for($i=0;$i<$count;$i++)
		{
			$dh=",";
			if($i==0)
			{
				$dh="";
			}
			$ids.=$dh.intval($classid[$i]);
			$search.='&classid[]='.$classid[$i];
		}
		$where.=" and classid in (".$ids.")";
	}
	$log.="<br>doing=$add[doing]";
	$start=(int)$add['start'];
	$line=$public_r['docnewsnum'];
	$b=0;
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$selecttbname." where id>$start and ".$where." order by id limit ".$line);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$new_start=$r['id'];
		DoDocInfo($tbname,$r,$add['doing']);
	}
	if(empty($b))
	{
		$add['docfrom']=urldecode($add['docfrom']);
		//操作日志
		insert_dolog("tbname=".$tbname.$log."&doing=$add[doing]&do=2");
		printerror("InfoToDocSuccess",$add['docfrom']);
	}
	echo $fun_r[OneInfoToDocSuccess]."(ID:<font color=red><b>".$new_start."</b></font>)<script>self.location.href='ecmsinfo.php?enews=InfoToDoc&ecmsdoc=2&doing=$add[doing]&tbname=$tbname&start=$new_start&docfrom=$add[docfrom]".$search."';</script>";
	exit();
}

//归档信息(选择信息)
function InfoToDoc_info($add,$userid,$username){
	global $empire,$dbtbpre,$class_r;
	$classid=(int)$add['classid'];
	//操作权限
	CheckLevel($userid,$username,$classid,"news");
	$id=$add['id'];
	$count=count($id);
	if($count==0)
	{
		printerror("EmptyDocInfo","");
	}
	$tbname=$class_r[$classid]['tbname'];
	if(empty($tbname))
	{
		printerror("EmptyDocInfo","");
	}
	$selecttbname=$tbname;
	if($add['doing']==1)
	{
		$selecttbname=$tbname.'_doc';
	}
	for($i=0;$i<$count;$i++)
	{
		$dh=",";
		if($i==0)
		{
			$dh="";
		}
		$ids.=$dh.intval($id[$i]);
	}
	$where="id in (".$ids.")";
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$selecttbname." where ".$where." order by id");
	while($r=$empire->fetch($sql))
	{
		DoDocInfo($tbname,$r,$add['doing']);
	}
	$add['docfrom']=urldecode($add['docfrom']);
	//操作日志
	insert_dolog("tbname=".$tbname."&doing=$add[doing]&do=0");
	printerror("InfoToDocSuccess",$add['docfrom']);
}

//处理归档
function DoDocInfo($tb,$r,$ecms=0){
	global $empire,$dbtbpre,$class_r,$emod_r;
	if($ecms==1)//还原
	{
		$table1=$dbtbpre.'ecms_'.$tb.'_doc';	//主表
		$table2=$dbtbpre.'ecms_'.$tb.'_doc_data';	//副表
		$ytable1=$dbtbpre.'ecms_'.$tb;	//目标主表
		$ytable2=$dbtbpre.'ecms_'.$tb.'_data_'.$r[stb];	//目标副表
	}
	else//归档
	{
		$table1=$dbtbpre.'ecms_'.$tb;	//主表
		$table2=$dbtbpre.'ecms_'.$tb.'_data_'.$r[stb];	//副表
		$ytable1=$dbtbpre.'ecms_'.$tb.'_doc';	//目标主表
		$ytable2=$dbtbpre.'ecms_'.$tb.'_doc_data';	//目标副表
	}
	$mid=$class_r[$r[classid]][modid];
	//副表
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$fr=$empire->fetch1("select ".$selectdataf." from ".$table2." where id='$r[id]'");
		$r=array_merge($r,$fr);
	}
	$ret_r=ReturnAddF($r,$mid,$userid,$username,10,0,0);//返回自定义字段
	//主表
	$empire->query("replace into ".$ytable1."(id,classid,onclick,newspath,keyboard,keyid,userid,username,ztid,checked,istop,truetime,ismember,dokey,userfen,isgood,titlefont,titleurl,filename,groupid,newstempid,plnum,firsttitle,isqf,totaldown,closepl,havehtml,lastdotime,haveaddfen,infopfen,infopfennum,votenum,stb,copyids,ttid,infotags,ispic".$ret_r[fields].") values('$r[id]','$r[classid]','$r[onclick]','".StripAddsData($r[newspath])."','".StripAddsData($r[keyboard])."','$r[keyid]','$r[userid]','".StripAddsData($r[username])."','$r[ztid]','$r[checked]','$r[istop]','$r[truetime]','$r[ismember]','$r[dokey]','$r[userfen]','$r[isgood]','".StripAddsData($r[titlefont])."','".StripAddsData($r[titleurl])."','".StripAddsData($r[filename])."','$r[groupid]','$r[newstempid]','$r[plnum]','$r[firsttitle]','$r[isqf]','$r[totaldown]','$r[closepl]','$r[havehtml]','$r[lastdotime]','$r[haveaddfen]','$r[infopfen]','$r[infopfennum]','$r[votenum]','$r[stb]','$r[copyids]','$r[ttid]','".StripAddsData($r[infotags])."','$r[ispic]'".$ret_r[values].");");
	//副表
	$empire->query("replace into ".$ytable2."(id,classid".$ret_r[datafields].") values('$r[id]','$r[classid]'".$ret_r[datavalues].");");
	//删除
	$empire->query("delete from ".$table1." where id='$r[id]'");
	$empire->query("delete from ".$table2." where id='$r[id]'");
}
?>