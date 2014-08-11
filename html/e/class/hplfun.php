<?php
//************************************ 评论 ************************************

//批量删除评论
function DelPl_all($plid,$id,$bclassid,$classid,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	//验证权限
	//CheckLevel($userid,$username,$classid,"news");
	$count=count($plid);
	if(empty($count))
	{
		printerror("NotDelPlid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="plid='".intval($plid[$i])."' or ";
	}
	$add=substr($add,0,strlen($add)-4);
	//更新数据表
	$fsql=$empire->query("select id,classid,stb,plid from {$dbtbpre}enewspl where ".$add);
	while($r=$empire->fetch($fsql))
	{
		if($class_r[$r[classid]][tbname])
		{
			$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." set plnum=plnum-1 where id='$r[id]'");
		}
		$empire->query("delete from {$dbtbpre}enewspl_data_".$r[stb]." where plid='$r[plid]'");
    }
	$sql=$empire->query("delete from {$dbtbpre}enewspl where ".$add);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("DelPlSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//批量审核评论
function CheckPl_all($plid,$id,$bclassid,$classid,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	//验证权限
	//CheckLevel($userid,$username,$classid,"news");
	$count=count($plid);
	if(empty($count))
	{printerror("NotCheckPlid","history.go(-1)");}
	for($i=0;$i<$count;$i++)
	{
		$add.="plid='".intval($plid[$i])."' or ";
	}
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}enewspl set checked=0 where ".$add);
	if($sql)
	{
		//操作日志
		insert_dolog("classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("CheckPlSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//批量推荐/取消评论
function DoGoodPl_all($plid,$id,$bclassid,$classid,$isgood,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	//验证权限
	//CheckLevel($userid,$username,$classid,"news");
	$count=count($plid);
	if(empty($count))
	{
		printerror("NotGoodPlid","history.go(-1)");
	}
	$isgood=(int)$isgood;
	for($i=0;$i<$count;$i++)
	{
		$add.="plid='".intval($plid[$i])."' or ";
	}
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("update {$dbtbpre}enewspl set isgood=$isgood where ".$add);
	if($sql)
	{
		//操作日志
		insert_dolog("isgood=$isgood<br>classid=".$classid."<br>classname=".$class_r[$classid][classname]);
		printerror("DoGoodPlSuccess",$_SERVER['HTTP_REFERER']);
	}
	else
	{printerror("DbError","history.go(-1)");}
}


//************************************ 评论字段管理 ************************************

//验证字段是否重复
function CheckRePlF($add,$ecms=0){
	global $empire,$dbtbpre;
	//修改
	if($ecms==1&&$add[f]==$add[oldf])
	{
		return '';
	}
	//主表
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewspl");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","history.go(-1)");
	}
	//副表
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewspl_data_1");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","history.go(-1)");
	}
}

//返回字段类型
function ReturnPlFtype($add){
	//字段类型
	if($add[ftype]=="TINYINT"||$add[ftype]=="SMALLINT"||$add[ftype]=="INT"||$add[ftype]=="BIGINT"||$add[ftype]=="FLOAT"||$add[ftype]=="DOUBLE")
	{
		$def=" default '0'";
	}
	elseif($add[ftype]=="VARCHAR")
	{
		$def=" default ''";
	}
	else
	{
		$def="";
	}
	$type=$add[ftype];
	//VARCHAR
	if($add[ftype]=='VARCHAR'&&empty($add[flen]))
	{
		$add[flen]='255';
	}
	//字段长度
	if($add[flen])
	{
		if($add[ftype]!="TEXT"&&$add[ftype]!="MEDIUMTEXT"&&$add[ftype]!="LONGTEXT")
		{
			$type.="(".$add[flen].")";
		}
	}
	$field="`".$add[f]."` ".$type." NOT NULL".$def;
	return $field;
}

//增加评论字段
function AddPlF($add,$userid,$username){
	global $empire,$dbtbpre;
	$add[f]=RepPostVar($add[f]);
	if(empty($add[f])||empty($add[fname]))
	{
		printerror("EmptyF","history.go(-1)");
	}
	//验证权限
	CheckLevel($userid,$username,$classid,"plf");
	//验证字段重复
	CheckRePlF($add,0);
	//字段类型
	$field=ReturnPlFtype($add);
	//新增字段
	$tbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if($tbr['pldatatbs'])
	{
		$dtbr=explode(',',$tbr['pldatatbs']);
		$count=count($dtbr);
		for($i=1;$i<$count-1;$i++)
		{
			$empire->query("alter table {$dbtbpre}enewspl_data_".$dtbr[$i]." add ".$field);
		}
	}
	//处理变量
	$add[ismust]=(int)$add[ismust];
	$sql=$empire->query("insert into {$dbtbpre}enewsplf(f,fname,fzs,ftype,flen,ismust) values('$add[f]','$add[fname]','".addslashes($add[fzs])."','$add[ftype]','$add[flen]','$add[ismust]');");
	$lastid=$empire->lastid();
	UpdatePlF();//更新字段
	if($sql)
	{
		//操作日志
		insert_dolog("fid=".$lastid."<br>f=".$add[f]);
		printerror("AddFSuccess","pl/AddPlF.php?enews=AddPlF");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//修改评论字段
function EditPlF($add,$userid,$username){
	global $empire,$dbtbpre;
	$fid=(int)$add['fid'];
	$add[f]=RepPostVar($add[f]);
	$add[oldf]=RepPostVar($add[oldf]);
	if(empty($add[f])||empty($add[fname])||!$fid)
	{
		printerror("EmptyF","history.go(-1)");
	}
	//验证权限
	CheckLevel($userid,$username,$classid,"plf");
	//验证字段重复
	CheckRePlF($add,1);
	$cr=$empire->fetch1("select * from {$dbtbpre}enewsplf where fid='$fid'");
	//改变字段
	if($cr[f]<>$add[f]||$cr[ftype]<>$add[ftype]||$cr[flen]<>$add[flen])
	{
		$field=ReturnPlFtype($add);//字段类型
		$tbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
		if($tbr['pldatatbs'])
		{
			$dtbr=explode(',',$tbr['pldatatbs']);
			$count=count($dtbr);
			for($i=1;$i<$count-1;$i++)
			{
				$empire->query("alter table {$dbtbpre}enewspl_data_".$dtbr[$i]." change `".$cr[f]."` ".$field);
			}
		}
	}
	//处理变量
	$add[ismust]=(int)$add[ismust];
	$sql=$empire->query("update {$dbtbpre}enewsplf set f='$add[f]',fname='$add[fname]',fzs='".addslashes($add[fzs])."',ftype='$add[ftype]',flen='$add[flen]',ismust='$add[ismust]' where fid=$fid");
	UpdatePlF();//更新字段
	if($sql)
	{
		//操作日志
		insert_dolog("fid=".$fid."<br>f=".$add[f]);
		printerror("EditFSuccess","pl/ListPlF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//删除评论字段
function DelPlF($add,$userid,$username){
	global $empire,$dbtbpre;
	$fid=(int)$add['fid'];
	if(empty($fid))
	{
		printerror("EmptyFid","history.go(-1)");
	}
	//验证权限
	CheckLevel($userid,$username,$classid,"plf");
	$r=$empire->fetch1("select f from {$dbtbpre}enewsplf where fid=$fid");
	if(!$r[f])
	{
		printerror("EmptyFid","history.go(-1)");
	}
	if($r[f]=="saytext")
	{
		printerror("NotIsAdd","history.go(-1)");
	}
	//删除字段
	$tbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if($tbr['pldatatbs'])
	{
		$dtbr=explode(',',$tbr['pldatatbs']);
		$count=count($dtbr);
		for($i=1;$i<$count-1;$i++)
		{
			$empire->query("alter table {$dbtbpre}enewspl_data_".$dtbr[$i]." drop COLUMN `".$r[f]."`");
		}
	}
	$sql=$empire->query("delete from {$dbtbpre}enewsplf where fid=$fid");
	UpdatePlF();//更新字段
	if($sql)
	{
		//操作日志
		insert_dolog("fid=".$fid."<br>f=".$r[f]);
		printerror("DelFSuccess","pl/ListPlF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//更新评论字段
function UpdatePlF(){
	global $empire,$dbtbpre;
	$plf=',';
	$plmustf=',';
	$sql=$empire->query("select f,ismust from {$dbtbpre}enewsplf");
	while($r=$empire->fetch($sql))
	{
		$plf.=$r[f].',';
		if($r[ismust])
		{
			$plmustf.=$r[f].',';
		}
	}
	$empire->query("update {$dbtbpre}enewspublic set plf='$plf',plmustf='$plmustf' limit 1");
}


//************************************ 评论分表管理 ************************************

//增加评论分表
function AddPlDataTable($add,$userid,$username){
	global $empire,$dbtbpre;
	//操作权限
	CheckLevel($userid,$username,$classid,"pltable");
	$datatb=(int)$add['datatb'];
	if(!$datatb)
	{
		printerror("EmptyPlDataTable","history.go(-1)");
	}
	$tr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if(strstr($tr['pldatatbs'],','.$datatb.','))
	{
		printerror("RePlDataTable","history.go(-1)");
	}
	if(empty($tr['pldatatbs']))
	{
		$tr['pldatatbs']=',';
	}
	$newdatatbs=$tr['pldatatbs'].$datatb.',';
	//建表
	$odtb=$dbtbpre."enewspl_data_1";
	$dtb=$dbtbpre."enewspl_data_".$datatb;
	CopyEcmsTb($odtb,$dtb);
	$sql=$empire->query("update {$dbtbpre}enewspublic set pldatatbs='$newdatatbs' limit 1");
	if($sql)
	{
		//操作日志
		insert_dolog("datatb=$datatb");
		printerror("AddPlDataTableSuccess","pl/ListPlDataTable.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//默认评论存放表
function DefPlDataTable($add,$userid,$username){
	global $empire,$dbtbpre;
	//操作权限
	CheckLevel($userid,$username,$classid,"pltable");
	$datatb=(int)$add['datatb'];
	if(!$datatb)
	{
		printerror("NotChangePlDataTable","history.go(-1)");
	}
	$tr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if(!strstr($tr['pldatatbs'],','.$datatb.','))
	{
		printerror("NotChangePlDataTable","history.go(-1)");
	}
	$sql=$empire->query("update {$dbtbpre}enewspublic set pldeftb='$datatb' limit 1");
	if($sql)
	{
		//操作日志
		insert_dolog("datatb=$datatb");
		printerror("DefPlDataTableSuccess","pl/ListPlDataTable.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//删除评论分表
function DelPlDataTable($add,$userid,$username){
	global $empire,$dbtbpre,$class_r;
	//操作权限
	CheckLevel($userid,$username,$classid,"pltable");
	$datatb=(int)$add['datatb'];
	if(!$datatb)
	{
		printerror("NotChangePlDataTable","history.go(-1)");
	}
	$tr=$empire->fetch1("select pldatatbs,pldeftb from {$dbtbpre}enewspublic limit 1");
	if(!strstr($tr['pldatatbs'],','.$datatb.','))
	{
		printerror("NotChangePlDataTable","history.go(-1)");
	}
	if($tr['pldeftb']==$datatb||$datatb==1)
	{
		printerror("NotDelDefPlDataTable","history.go(-1)");
	}
	$newdatatbs=str_replace(','.$datatb.',',',',$tr['pldatatbs']);
	$sql=$empire->query("update {$dbtbpre}enewspublic set pldatatbs='$newdatatbs' limit 1");
	//删除评论
	$plsql=$empire->query("select plid,classid,id from {$dbtbpre}enewspl where stb='$datatb'");
	while($plr=$empire->fetch($plsql))
	{
		$tbname=$class_r[$plr[classid]][tbname];
		if($tbname)
		{
			$empire->query("update {$dbtbpre}ecms_".$tbname." set plnum=plnum-1 where id='$plr[id]'");
		}
	}
	$deltb=$empire->query("delete from {$dbtbpre}enewspl where stb='$datatb'");
	//删除表
	$deltb=$empire->query("DROP TABLE IF EXISTS {$dbtbpre}enewspl_data_".$datatb.";");
	if($sql)
	{
		//操作日志
		insert_dolog("datatb=$datatb");
		printerror("DelPlDataTableSuccess","pl/ListPlDataTable.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}
?>