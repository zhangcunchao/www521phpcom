<?php
//生成所有内容页面
function ReNewsHtml($start,$classid,$from,$retype,$startday,$endday,$startid,$endid,$tbname,$havehtml){
	global $empire,$public_r,$class_r,$fun_r,$dbtbpre,$etable_r;
	$tbname=RepPostVar($tbname);
	if(empty($tbname))
	{
		printerror("ErrorUrl","history.go(-1)");
    }
	$start=(int)$start;
	//按ID
	if($retype)
	{
		$startid=(int)$startid;
		$endid=(int)$endid;
		$add1=$endid?' and id>='.$startid.' and id<='.$endid:'';
    }
	else
	{
		$startday=RepPostVar($startday);
		$endday=RepPostVar($endday);
		$add1=$startday&&$endday?' and truetime>='.to_time($startday.' 00:00:00').' and truetime<='.to_time($endday.' 23:59:59'):'';
    }
	//按栏目
	$classid=(int)$classid;
	if($classid)
	{
		$where=empty($class_r[$classid][islast])?ReturnClass($class_r[$classid][sonclass]):"classid='$classid'";
		$add1.=' and '.$where;
    }
	//不生成
	$add1.=ReturnNreInfoWhere();
	//是否重复生成
	if($havehtml!=1)
	{
		$add1.=' and havehtml=0';
	}
	//优化
	$yhadd='';
	$yhid=$etable_r[$tbname][yhid];
	$yhvar='rehtml';
	if($yhid)
	{
		$yhadd=ReturnYhSql($yhid,$yhvar);
	}
	$b=0;
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$tbname." where ".$yhadd."id>$start".$add1." and checked=1 order by id limit ".$public_r[renewsnum]);
	while($r=$empire->fetch($sql))
	{
		if(!empty($r['titleurl'])||$class_r[$r[classid]][showdt]==2)
		{
			continue;
		}
		$b=1;
		GetHtml($r,'',1);//生成信息文件
		$new_start=$r[id];
	}
	if(empty($b))
	{
		echo "<link rel=\"stylesheet\" href=\"../data/images/css.css\" type=\"text/css\"><center><b>".$tbname.$fun_r[ReTableIsOK]."!</b></center>";
		db_close();
		$empire=null;
		exit();
	}
	echo"<link rel=\"stylesheet\" href=\"../data/images/css.css\" type=\"text/css\"><meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReNewsHtml&tbname=$tbname&classid=$classid&start=$new_start&from=$from&retype=$retype&startday=$startday&endday=$endday&startid=$startid&endid=$endid&havehtml=$havehtml&reallinfotime=".$_GET['reallinfotime']."\">".$fun_r[OneReNewsHtmlSuccess]."(ID:<font color=red><b>".$new_start."</b></font>)";
	exit();
}

//刷新所有列表
function ReListHtml_all($start,$do,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	if($do=="all")
	{
		insert_dolog("");//操作日志
		printerror("ReClassidAllSuccess",$from);
    }
	elseif($do=="zt")//刷新专题
	{
		$zsql=$empire->query("select ztid,ztname,ztnum,listtempid,classid from {$dbtbpre}enewszt where ztid>$start order by ztid limit ".$public_r[relistnum]);
		while($z_r=$empire->fetch($zsql))
		{
			$b=1;
			ListHtml($z_r[ztid],$ret_r,1);
			$end_classid=$z_r[ztid];
		}
		if(empty($b))
		{
			echo $fun_r[ReZtListNewsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=0&do=all&from=$from';</script>";
			exit();
		}
		//echo $fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=zt&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=zt&from=$from\">".$fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)";
		exit();
	}
	//栏目
	$sql=$empire->query("select classid,classtempid,islast,islist from {$dbtbpre}enewsclass where classid>$start and nreclass=0 order by classid limit ".$public_r[relistnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		if(!$r[islast])//大栏目
		{
			if($r[islist]==1)
			{
				ListHtml($r[classid],$ret_r,3);
			}
			elseif($r[islist]==3)//栏目绑定信息
			{
				ReClassBdInfo($r[classid]);
			}
			else
			{
				$classtemp=$r[islist]==2?GetClassText($r[classid]):GetClassTemp($r['classtempid']);
				NewsBq($r[classid],$classtemp,0,0);
			}
		}
		else//子栏目
		{
			ListHtml($r[classid],$ret_r,0);
		}
		$end_classid=$r[classid];
	}
	if(empty($b))
	{
		echo $fun_r[ReListNewsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=0&from=$from&do=zt';</script>";
		exit();
    }
	//echo $fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=class&from=$from';</script>";
	echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=class&from=$from\">".$fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)";
	exit();
}

//刷新所有js
function ReAllNewsJs($start,$do,$from){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$line=$public_r[relistnum];
	$b=0;
	if($do=="all")
	{
		$pr=$empire->fetch1("select hotnum,newnum,goodnum,hotplnum,firstnum,jstempid from {$dbtbpre}enewspublic limit 1");
		$jstemptext=GetTheJstemp($pr['jstempid']);//js模板
		//刷新全部js
		GetNewsJs($classid,$pr[newnum],$pr[sub_new],$pr[newshowdate],3,$jstemptext);
		GetNewsJs($classid,$pr[hotnum],$pr[sub_hot],$pr[hotshowdate],4,$jstemptext);
		GetNewsJs($classid,$pr[goodnum],$pr[sub_good],$pr[goodshowdate],5,$jstemptext);
		GetNewsJs($classid,$pr[hotplnum],$pr[sub_hotpl],$pr[hotplshowdate],10,$jstemptext);
		GetNewsJs($classid,$pr[firstnum],$pr[sub_first],$pr[firstshowdate],13,$jstemptext);
		insert_dolog("");//操作日志
		printerror("ReAllJsSuccess",$from);
	}
	elseif($do=="zt")//刷新专题js
	{
		$from=urlencode($from);
		$sql=$empire->query("select ztid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewszt where ztid>$start and nrejs=0 order by ztid limit $line");
		while($r=$empire->fetch($sql))
		{
			$jstemptext=GetTheJstemp($r[jstempid]);//js模板
			$b=1;
			GetNewsJs($r[ztid],$r[newline],$r[newstrlen],$r[newshowdate],6,$jstemptext);
			GetNewsJs($r[ztid],$r[hotline],$r[hotstrlen],$r[hotshowdate],7,$jstemptext);
			GetNewsJs($r[ztid],$r[goodline],$r[goodstrlen],$r[goodshowdate],8,$jstemptext);
			GetNewsJs($r[ztid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],11,$jstemptext);
			GetNewsJs($r[ztid],$r[firstline],$r[firststrlen],$r[firstshowdate],14,$jstemptext);
			$newstart=$r[ztid];
		}
		//刷新完毕
		if(empty($b))
		{
			echo $fun_r[ReZtNewsJsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=all&start=0&from=$from';</script>";
			exit();
	    }
		//echo $fun_r[OneReZtNewsJsSuccess]."(ZtID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=zt&start=$newstart&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReAllNewsJs&do=zt&start=$newstart&from=$from\">".$fun_r[OneReZtNewsJsSuccess]."(ZtID:<font color=red><b>".$newstart."</b></font>)";
		exit();
	}
	else//刷新栏目js
	{
		$from=urlencode($from);
		$sql=$empire->query("select classid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewsclass where classid>$start and nrejs=0 and wburl='' order by classid limit $line");
		while($r=$empire->fetch($sql))
		{
			$jstemptext=GetTheJstemp($r[jstempid]);//js模板
			$b=1;
			GetNewsJs($r[classid],$r[newline],$r[newstrlen],$r[newshowdate],0,$jstemptext);
			GetNewsJs($r[classid],$r[hotline],$r[hotstrlen],$r[hotshowdate],1,$jstemptext);
			GetNewsJs($r[classid],$r[goodline],$r[goodstrlen],$r[goodshowdate],2,$jstemptext);
			GetNewsJs($r[classid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],9,$jstemptext);
			GetNewsJs($r[classid],$r[firstline],$r[firststrlen],$r[firstshowdate],12,$jstemptext);
			$newstart=$r[classid];
		}
		//刷新完毕
		if(empty($b))
		{
			echo $fun_r[ReClassNewsJsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=zt&start=0&from=$from';</script>";
			exit();
	    }
		//echo $fun_r[OneReClassNewsJsSuccess]."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=class&start=$newstart&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReAllNewsJs&do=class&start=$newstart&from=$from\">".$fun_r[OneReClassNewsJsSuccess]."(ID:<font color=red><b>".$newstart."</b></font>)";
		exit();
	}
}

//刷新最新文章与热门文章
function ReHot_NewNews(){
	global $empire,$dbtbpre;
	$public_r=$empire->fetch1("select hotnum,newnum,goodnum,hotplnum,firstnum,jstempid from {$dbtbpre}enewspublic limit 1");
	$jstemptext=GetTheJstemp($public_r['jstempid']);//取得js模板
	GetNewsJs($classid,$public_r[newnum],$public_r[sub_new],$public_r[newshowdate],3,$jstemptext);
	GetNewsJs($classid,$public_r[hotnum],$public_r[sub_hot],$public_r[hotshowdate],4,$jstemptext);
	GetNewsJs($classid,$public_r[goodnum],$public_r[sub_good],$public_r[goodshowdate],5,$jstemptext);
	GetNewsJs($classid,$public_r[hotplnum],$public_r[sub_hotpl],$public_r[hotplshowdate],10,$jstemptext);
	GetNewsJs($classid,$public_r[firstnum],$public_r[sub_first],$public_r[firstshowdate],13,$jstemptext);
	insert_dolog("");//操作日志
	printerror("ReNewHotSuccess","history.go(-1)");
}

//刷新专题
function ReZtHtml($ztid){
	global $class_zr;
	$ztid=(int)$ztid;
	if(!$ztid)
	{
		printerror("NotChangeReZtid","history.go(-1)");
	}
	$classid=$class_zr[$ztid][classid];
	ListHtml($ztid,$ret_r,1);
	insert_dolog("");//操作日志
	printerror("ReZtidSuccess","history.go(-1)");
}

//刷新单个栏目
function ReSingleJs($classid,$doing=0){
	global $empire,$dbtbpre;
	$classid=(int)$classid;
	//刷新栏目
	if($doing==0)
	{
		$r=$empire->fetch1("select classid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewsclass where classid='$classid'");
		$jstemptext=GetTheJstemp($r[jstempid]);//js模板
		GetNewsJs($r[classid],$r[newline],$r[newstrlen],$r[newshowdate],0,$jstemptext);
		GetNewsJs($r[classid],$r[hotline],$r[hotstrlen],$r[hotshowdate],1,$jstemptext);
		GetNewsJs($r[classid],$r[goodline],$r[goodstrlen],$r[goodshowdate],2,$jstemptext);
		GetNewsJs($r[classid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],9,$jstemptext);
		GetNewsJs($r[classid],$r[firstline],$r[firststrlen],$r[firstshowdate],12,$jstemptext);
	}
	//刷新专题js
	elseif($doing==1)
	{
		$r=$empire->fetch1("select ztid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewszt where ztid='$classid'");
		$jstemptext=GetTheJstemp($r[jstempid]);//js模板
		GetNewsJs($r[ztid],$r[newline],$r[newstrlen],$r[newshowdate],6,$jstemptext);
		GetNewsJs($r[ztid],$r[hotline],$r[hotstrlen],$r[hotshowdate],7,$jstemptext);
		GetNewsJs($r[ztid],$r[goodline],$r[goodstrlen],$r[goodshowdate],8,$jstemptext);
		GetNewsJs($r[ztid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],11,$jstemptext);
		GetNewsJs($r[ztid],$r[firstline],$r[firststrlen],$r[firstshowdate],14,$jstemptext);
    }
	else
	{}
	insert_dolog("");//操作日志
	printerror("ReJsSuccess","history.go(-1)");
}

//批量生成动态页面
function ReDtPage($userid,$username){
	//操作权限
	CheckLevel($userid,$username,$classid,"changedata");
	GetPlTempPage();//评论列表模板
	GetPlJsPage();//评论JS模板
	ReCptemp();//控制面板模板
	GetSearch();//三搜索表单模板
	GetPrintPage();//打印模板
	GetDownloadPage();//下载地址页面
	ReGbooktemp();//留言板模板
	ReLoginIframe();//登陆状态模板
	ReSchAlltemp();//全站搜索模板
	//操作日志
	insert_dolog("");
	printerror("ReDtPageSuccess","history.go(-1)");
}

//批量刷新自定义页面
function ReUserpageAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select id,path,pagetext,title,pagetitle,pagekeywords,pagedescription,tempid from {$dbtbpre}enewspage where id>$start order by id limit ".$public_r['reuserpagenum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[id];
		ReUserpage($r[id],$r[pagetext],$r[path],$r[title],$r[pagetitle],$r[pagekeywords],$r[pagedescription],$r[tempid]);
	}
	//完毕
	if(empty($b))
	{
		//操作日志
	    insert_dolog("");
		printerror("ReUserpageAllSuccess",$from);
	}
	echo $fun_r['OneReUserpageSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserpageAll&start=$newstart&from=$from';</script>";
	exit();
}

//批量刷新自定义信息列表
function ReUserlistAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select listid,pagetitle,filepath,filetype,totalsql,listsql,maxnum,lencord,listtempid from {$dbtbpre}enewsuserlist where listid>$start order by listid limit ".$public_r['reuserlistnum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[listid];
		ReUserlist($r,"");
	}
	//完毕
	if(empty($b))
	{
		//操作日志
	    insert_dolog("");
		printerror("ReUserlistAllSuccess",$from);
	}
	echo $fun_r['OneReUserlistSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserlistAll&start=$newstart&from=$from';</script>";
	exit();
}

//批量刷新自定义JS
function ReUserjsAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select jsid,jsname,jssql,jstempid,jsfilename from {$dbtbpre}enewsuserjs where jsid>$start order by jsid limit ".$public_r['reuserjsnum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[jsid];
		ReUserjs($r,"");
	}
	//完毕
	if(empty($b))
	{
		//操作日志
	    insert_dolog("");
		printerror("ReUserjsAllSuccess",$from);
	}
	echo $fun_r['OneReUserjsSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserjsAll&start=$newstart&from=$from';</script>";
	exit();
}

//转向处理文件
function GoReListHtmlMore($classid,$gore,$from){
	global $empire,$class_r;
	$count=count($classid);
	if($count==0)
	{
		printerror("EmptyReListHtmlMoreId","history.go(-1)");
    }
	$cid="";
	for($i=0;$i<$count;$i++)
	{
		if($i==0)
		{
			$fh="";
		}
		else
		{
			$fh=",";
		}
		$cid.=$fh.$classid[$i];
	}
	//栏目
	if(empty($gore))
	{
		$phome="ReListHtmlMore";
	}
	//专题
	else
	{
		$phome="ReListZtHtmlMore";
	}
	echo"<script>self.location.href='ecmschtml.php?enews=$phome&classid=$cid&from=$from';</script>";
	exit();
}

//刷新多列表
function ReListHtmlMore($start,$classid,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$classid=RepPostVar($classid);
	if(empty($classid))
	{
		printerror("ErrorUrl",$from);
    }
	$b=0;
	$sql=$empire->query("select classid,classtempid,islast,islist from {$dbtbpre}enewsclass where classid>$start and classid in(".$classid.") order by classid limit ".$public_r[relistnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		//大栏目
		if(!$r[islast])
		{
			if($r[islist]==1)
			{
				ListHtml($r[classid],$ret_r,3);
			}
			elseif($r[islist]==3)//栏目绑定信息
			{
				ReClassBdInfo($r[classid]);
			}
			else
			{
				$classtemp=$r[islist]==2?GetClassText($r[classid]):GetClassTemp($r['classtempid']);
				NewsBq($r[classid],$classtemp,0,0);
			}
		}
		//子栏目
		else
		{
			ListHtml($r[classid],$ret_r,0);
		}
		$end_classid=$r[classid];
	}
	if(empty($b))
	{
		//操作日志
		insert_dolog("");
		printerror("ReClassidAllSuccess",$from);
    }
	echo $fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtmlMore&start=$end_classid&classid=$classid&from=$from';</script>";
	exit();
}

//刷新多专题列表
function ReListZtHtmlMore($start,$classid,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$classid=RepPostVar($classid);
	if(empty($classid))
	{
		printerror("ErrorUrl",$from);
    }
	$b=0;
	//刷新专题
	$zsql=$empire->query("select ztid,ztname,ztnum,listtempid,classid from {$dbtbpre}enewszt where ztid>$start and ztid in(".$classid.") order by ztid limit ".$public_r[relistnum]);
    while($z_r=$empire->fetch($zsql))
	{
		$b=1;
        ListHtml($z_r[ztid],$ret_r,1);
		$end_classid=$z_r[ztid];
    }
	if(empty($b))
	{
		//操作日志
		insert_dolog("");
		printerror("ReClassidAllSuccess",$from);
    }
    echo $fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListZtHtmlMore&start=$end_classid&classid=$classid&from=$from';</script>";
    exit();
}

//生成单信息
function ReSingleInfo($userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre;
	if($_GET['classid'])
	{
		$classid=(int)$_GET['classid'];
		$id=$_GET['id'];
	}
	else
	{
		$classid=(int)$_POST['classid'];
		$id=$_POST['id'];
	}
	if(empty($classid))
	{
		printerror('ErrorUrl','history.go(-1)');
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotReInfoid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='$id[$i]' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where ".$add);
	while($r=$empire->fetch($sql))
	{
		GetHtml($r,$ret_r);//生成信息文件
	}
	//操作日志
	insert_dolog("classid=".$classid);
	printerror("ReSingleInfoSuccess",$_SERVER['HTTP_REFERER']);
}

//恢复栏目目录
function ReClassPath($start=0){
	global $empire,$public_r,$dbtbpre;
	$start=(int)$start;
	$sql=$empire->query("select classid,classpath,islast from {$dbtbpre}enewsclass where wburl='' and classid>$start order by classid limit ".$public_r[relistnum]);
	$b=0;
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[classid];
		$returnpath=FormatClassPath($r[classpath],$r[islast]);
		echo "Create Path:".$returnpath." success!<br>";
    }
	//恢复专题目录
	if(empty($b))
	{
		$zsql=$empire->query("select ztid,ztpath from {$dbtbpre}enewszt order by ztid");
		while($zr=$empire->fetch($zsql))
		{
			CreateZtPath($zr[ztpath]);
		}
	}
	if(empty($b))
	{
		//操作日志
	    insert_dolog("");
		printerror("ReClassPathSuccess","ReHtml/ChangeData.php");
	}
	echo"(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReClassPath&start=$newstart';</script>";
	exit();
}

//建立栏目目录
function FormatClassPath($classpath,$islast){
	$r=explode("/",$classpath);
	$returnpath="";
	for($i=0;$i<count($r);$i++)
	{
		if($i>0)
		{
			$returnpath.="/".$r[$i];
		}
		else
		{
			$returnpath.=$r[$i];
		}
		CreateClassPath($returnpath);
	}
	return $returnpath;
}

//刷新首页
function ReIndex(){
	$indextemp=GetIndextemp();//取得模板
	NewsBq($classid,$indextemp,1,0);
	insert_dolog("");//操作日志
	printerror("ReIndexSuccess","history.go(-1)");
}
?>