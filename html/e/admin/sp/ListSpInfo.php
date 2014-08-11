<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require "../".LoadLang("pub/fun.php");
require("../../data/dbcache/class.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//验证用户
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];

//验证权限
function CheckSpInfoLevel($spid){
	global $empire,$dbtbpre,$lur;
	$spr=$empire->fetch1("select spid,spname,varname,sptype,maxnum,groupid,userclass,username from {$dbtbpre}enewssp where spid='$spid'");
	if(!$spr['spid'])
	{
		printerror('ErrorUrl','');
	}
	//验证操作权限
	CheckDoLevel($lur,$spr[groupid],$spr[userclass],$spr[username]);
	return $spr;
}

//增加碎片信息
function AddSpInfo($add,$userid,$username){
	global $empire,$dbtbpre;
	$spid=(int)$add[spid];
	if(!$spid)
	{
		printerror('ErrorUrl','');
	}
	//验证
	$spr=CheckSpInfoLevel($spid);
	if($spr[sptype]==1)//静态碎片
	{
		$log=AddSpInfo1($spid,$spr,$add);
	}
	elseif($spr[sptype]==2)//动态碎片
	{
		$log=AddSpInfo2($spid,$spr,$add);
	}
	else
	{
		printerror('ErrorUrl','');
	}
	//删除多余碎片信息
	DelMoreSpInfo($spid,$spr);
	//操作日志
	insert_dolog($log);
	printerror("AddSpInfoSuccess","AddSpInfo.php?enews=AddSpInfo&spid=$spid");
}

//增加静态碎片信息
function AddSpInfo1($spid,$spr,$add){
	global $empire,$dbtbpre;
	$titlefont=TitleFont($add[titlefont],$add[titlecolor]);
	$newstime=$add[newstime]?to_time($add[newstime]):time();
	$sql=$empire->query("insert into {$dbtbpre}enewssp_1(spid,title,titlepic,bigpic,titleurl,smalltext,titlefont,newstime,titlepre,titlenext) values('$spid','".addslashes($add[title])."','".addslashes($add[titlepic])."','".addslashes($add[bigpic])."','".addslashes($add[titleurl])."','".addslashes($add[smalltext])."','".addslashes($titlefont)."','$newstime','".addslashes($add[titlepre])."','".addslashes($add[titlenext])."');");
	$sid=$empire->lastid();
	$log="spid=$spid&sid=$sid&title=$add[title]";
	return $log;
}

//增加动态碎片信息
function AddSpInfo2($spid,$spr,$add){
	global $empire,$dbtbpre,$class_r;
	$add[classid]=(int)$add[classid];
	$add[id]=(int)$add[id];
	if(empty($class_r[$add[classid]][tbname]))
	{
		printerror('HaveNotInfo','');
	}
	$infor=$empire->fetch1("select id,classid,newstime from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]'");
	if(!$infor[id]||$infor[classid]!=$add[classid])
	{
		printerror('HaveNotInfo','');
	}
	$newstime=$add[newstime]?to_time($add[newstime]):$infor[newstime];
	//是否重复
	$rer=$empire->fetch1("select sid from {$dbtbpre}enewssp_2 where spid='$spid' and id='$add[id]' and classid='$add[classid]' limit 1");
	if($rer['sid'])
	{
		printerror('HaveSpInfo','');
	}
	$sql=$empire->query("insert into {$dbtbpre}enewssp_2(spid,classid,id,newstime) values('$spid','$add[classid]','$add[id]','$newstime');");
	$sid=$empire->lastid();
	$log="spid=$spid&sid=$sid&classid=$add[classid]&id=$add[id]";
	return $log;
}

//删除多余碎片信息
function DelMoreSpInfo($spid,$spr){
	global $empire,$dbtbpre;
	if(!$spr[maxnum]||$spr[sptype]==3)
	{
		return '';
	}
	if($spr[sptype]==1)
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewssp_1 where spid='$spid'");
		if($num>$spr[maxnum])
		{
			$limitnum=$num-$spr[maxnum];
			$ids='';
			$dh='';
			$sql=$empire->query("select sid from {$dbtbpre}enewssp_1 where spid='$spid' order by sid limit ".$limitnum);
			while($r=$empire->fetch($sql))
			{
				$ids.=$dh.$r[sid];
				$dh=',';
			}
			$empire->query("delete from {$dbtbpre}enewssp_1 where sid in ($ids)");
		}
	}
	elseif($spr[sptype]==2)
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewssp_2 where spid='$spid'");
		if($num>$spr[maxnum])
		{
			$limitnum=$num-$spr[maxnum];
			$ids='';
			$dh='';
			$sql=$empire->query("select sid from {$dbtbpre}enewssp_2 where spid='$spid' order by sid limit ".$limitnum);
			while($r=$empire->fetch($sql))
			{
				$ids.=$dh.$r[sid];
				$dh=',';
			}
			$empire->query("delete from {$dbtbpre}enewssp_2 where sid in ($ids)");
		}
	}
}

//修改碎片信息
function EditSpInfo($add,$userid,$username){
	global $empire,$dbtbpre;
	$spid=(int)$add[spid];
	$sid=(int)$add[sid];
	if(!$spid)
	{
		printerror('ErrorUrl','');
	}
	//验证
	$spr=CheckSpInfoLevel($spid);
	if($spr[sptype]==1)//静态碎片
	{
		$log=EditSpInfo1($spid,$spr,$sid,$add);
	}
	elseif($spr[sptype]==2)//动态碎片
	{
		$log=EditSpInfo2($spid,$spr,$sid,$add);
	}
	elseif($spr[sptype]==3)//代码碎片
	{
		$log=EditSpInfo3($spid,$spr,$sid,$add);
	}
	else
	{
		printerror('ErrorUrl','');
	}
	//删除多余碎片信息
	DelMoreSpInfo($spid,$spr);
	//操作日志
	insert_dolog($log);
	printerror("EditSpInfoSuccess","ListSpInfo.php?spid=$spid");
}

//修改静态碎片信息
function EditSpInfo1($spid,$spr,$sid,$add){
	global $empire,$dbtbpre;
	if(!$sid)
	{
		printerror('ErrorUrl','');
	}
	$checknum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewssp_1 where sid='$sid' and spid='$spid'");
	if(!$checknum)
	{
		printerror('ErrorUrl','');
	}
	$titlefont=TitleFont($add[titlefont],$add[titlecolor]);
	$newstime=$add[newstime]?to_time($add[newstime]):time();
	$empire->query("update {$dbtbpre}enewssp_1 set title='".addslashes($add[title])."',titlepic='".addslashes($add[titlepic])."',bigpic='".addslashes($add[bigpic])."',titleurl='".addslashes($add[titleurl])."',smalltext='".addslashes($add[smalltext])."',titlefont='".addslashes($titlefont)."',newstime='$newstime',titlepre='".addslashes($add[titlepre])."',titlenext='".addslashes($add[titlenext])."' where sid='$sid' and spid='$spid'");
	$log="spid=$spid&sid=$sid&title=$add[title]";
	return $log;
}

//修改动态碎片信息
function EditSpInfo2($spid,$spr,$sid,$add){
	global $empire,$dbtbpre,$class_r;
	if(!$sid)
	{
		printerror('ErrorUrl','');
	}
	$checknum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewssp_2 where sid='$sid' and spid='$spid'");
	if(!$checknum)
	{
		printerror('ErrorUrl','');
	}
	$add[classid]=(int)$add[classid];
	$add[id]=(int)$add[id];
	if(empty($class_r[$add[classid]][tbname]))
	{
		printerror('HaveNotInfo','');
	}
	$infor=$empire->fetch1("select id,classid,newstime from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where id='$add[id]'");
	if(!$infor[id]||$infor[classid]!=$add[classid])
	{
		printerror('HaveNotInfo','');
	}
	$newstime=$add[newstime]?to_time($add[newstime]):$infor[newstime];
	//是否重复
	$rer=$empire->fetch1("select sid from {$dbtbpre}enewssp_2 where spid='$spid' and id='$add[id]' and classid='$add[classid]' and sid<>$sid limit 1");
	if($rer['sid'])
	{
		printerror('HaveSpInfo','');
	}
	$empire->query("update {$dbtbpre}enewssp_2 set classid='$add[classid]',id='$add[id]',newstime='$newstime' where sid='$sid' and spid='$spid'");
	$log="spid=$spid&sid=$sid&classid=$add[classid]&id=$add[id]";
	return $log;
}

//修改代码碎片信息
function EditSpInfo3($spid,$spr,$sid,$add){
	global $empire,$dbtbpre;
	$r=$empire->fetch1("select sid from {$dbtbpre}enewssp_3 where spid='$spid'");
	if($r['sid'])
	{
		$empire->query("update {$dbtbpre}enewssp_3 set sptext='".addslashes($add[sptext])."' where spid='$spid'");
		$sid=$r['sid'];
	}
	else
	{
		$empire->query("insert into {$dbtbpre}enewssp_3(spid,sptext) values('$spid','".addslashes($add[sptext])."');");
		$sid=$empire->lastid();
	}
	//备份
	EditSpInfo3_bak($spid,$sid,$add[sptext]);
	$log="spid=$spid&sid=$sid&sptype=3";
	return $log;
}

//备份代码碎片信息
function EditSpInfo3_bak($spid,$sid,$sptext){
	global $empire,$dbtbpre,$lur;
	$baknum=10;	//备份最大数量
	$username=$lur[username];
	$time=time();
	$empire->query("insert into {$dbtbpre}enewssp_3_bak(sid,spid,sptext,lastuser,lasttime) values('$sid','$spid','".addslashes($sptext)."','$username','$time');");
	//删除多余备份
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewssp_3_bak where sid='$sid'");
	if($num>$baknum)
	{
		$limitnum=$num-$baknum;
		$ids='';
		$dh='';
		$sql=$empire->query("select bid from {$dbtbpre}enewssp_3_bak where sid='$sid' order by bid limit ".$limitnum);
		while($r=$empire->fetch($sql))
		{
			$ids.=$dh.$r[bid];
			$dh=',';
		}
		$empire->query("delete from {$dbtbpre}enewssp_3_bak where bid in ($ids)");
	}
}

//还原碎片信息记录
function SpInfoReBak($add,$userid,$username){
	global $empire,$dbtbpre;
	$spid=(int)$add[spid];
	$sid=(int)$add[sid];
	$bid=(int)$add[bid];
	if(!$spid||!$sid||!$bid)
	{
		printerror('ErrorUrl','');
	}
	//验证
	$spr=CheckSpInfoLevel($spid);
	if($spr['sptype']!=3)
	{
		printerror('ErrorUrl','');
	}
	$br=$empire->fetch1("select bid,sptext from {$dbtbpre}enewssp_3_bak where bid='$bid' and sid='$sid' and spid='$spid'");
	if(!$br['bid'])
	{
		printerror('ErrorUrl','');
	}
	$sql=$empire->query("update {$dbtbpre}enewssp_3 set sptext='".StripAddsData($br[sptext])."' where sid='$sid'");
	if($sql)
	{
		//操作日志
		insert_dolog("spid=".$spid."&spname=".$spr[spname]."<br>sid=$sid&bid=$bid");
		echo"<script>opener.ReSpInfoBak();window.close();</script>";
		exit();
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//删除碎片信息
function DelSpInfo($add,$userid,$username){
	global $empire,$dbtbpre;
	$spid=(int)$add[spid];
	$sid=(int)$add[sid];
	if(!$spid||!$sid)
	{
		printerror('ErrorUrl','');
	}
	//验证
	$spr=CheckSpInfoLevel($spid);
	if($spr[sptype]==1)//静态碎片
	{
		$r=$empire->fetch1("select sid,title from {$dbtbpre}enewssp_1 where sid='$sid' and spid='$spid'");
		if(!$r[sid])
		{
			printerror('ErrorUrl','');
		}
		$empire->query("delete from {$dbtbpre}enewssp_1 where sid='$sid' and spid='$spid'");
		$log="spid=$spid&sid=$sid&title=$r[title]";
	}
	elseif($spr[sptype]==2)//动态碎片
	{
		$r=$empire->fetch1("select sid,classid,id from {$dbtbpre}enewssp_2 where sid='$sid' and spid='$spid'");
		if(!$r[sid])
		{
			printerror('ErrorUrl','');
		}
		$empire->query("delete from {$dbtbpre}enewssp_2 where sid='$sid' and spid='$spid'");
		$log="spid=$spid&sid=$sid&classid=$r[classid]&id=$r[id]";
	}
	else
	{
		printerror('ErrorUrl','');
	}
	//操作日志
	insert_dolog($log);
	printerror("DelSpInfoSuccess","ListSpInfo.php?spid=$spid");
}

//批量修改碎片发布时间
function EditSpInfoTime($add,$userid,$username){
	global $empire,$dbtbpre;
	$spid=(int)$add[spid];
	$sid=$add[sid];
	$newstime=$add[newstime];
	if(!$spid)
	{
		printerror('ErrorUrl','');
	}
	$count=count($sid);
	if(!$count)
	{
		printerror('EmptySpInfoTime','');
	}
	//验证
	$spr=CheckSpInfoLevel($spid);
	if($spr[sptype]==1)//静态碎片
	{
		for($i=0;$i<$count;$i++)
		{
			$dosid=(int)$sid[$i];
			$donewstime=$newstime[$i]?to_time($newstime[$i]):time();
			$empire->query("update {$dbtbpre}enewssp_1 set newstime='$donewstime' where sid='$dosid' and spid='$spid'");
		}
	}
	elseif($spr[sptype]==2)//动态碎片
	{
		for($i=0;$i<$count;$i++)
		{
			$dosid=(int)$sid[$i];
			$donewstime=$newstime[$i]?to_time($newstime[$i]):time();
			$empire->query("update {$dbtbpre}enewssp_2 set newstime='$donewstime' where sid='$dosid' and spid='$spid'");
		}
	}
	else
	{
		printerror('ErrorUrl','');
	}
	//操作日志
	insert_dolog("spid=$spid");
	printerror("EditSpInfoTimeSuccess","ListSpInfo.php?spid=$spid");
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="AddSpInfo")//增加碎片信息
{
	AddSpInfo($_POST,$logininid,$loginin);
}
elseif($enews=="EditSpInfo")//修改碎片信息
{
	EditSpInfo($_POST,$logininid,$loginin);
}
elseif($enews=="DelSpInfo")//删除碎片信息
{
	DelSpInfo($_GET,$logininid,$loginin);
}
elseif($enews=="SpInfoReBak")//还原碎片信息记录
{
	SpInfoReBak($_GET,$logininid,$loginin);
}
elseif($enews=="EditSpInfoTime")//批量修改碎片信息时间
{
	EditSpInfoTime($_POST,$logininid,$loginin);
}

$spid=(int)$_GET['spid'];
//碎片
$spr=CheckSpInfoLevel($spid);
//代码碎片
if($spr[sptype]==3)
{
	Header("Location:AddSpInfo.php?enews=EditSpInfo&spid=$spid");
	exit();
}

$page=(int)$_GET['page'];
$start=0;
$line=50;//每页显示条数
$page_line=12;//每页显示链接数
$offset=$page*$line;//总偏移量
$search="&spid=$spid";
$url="<a href=UpdateSp.php>更新碎片</a>&nbsp;>&nbsp;".$spr[spname]."&nbsp;>&nbsp;管理碎片信息";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>碎片</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr> 
    <td width="50%">位置: 
      <?=$url?>
    </td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit5" value="增加碎片信息" onclick="self.location.href='AddSpInfo.php?enews=AddSpInfo&spid=<?=$spid?>';">
      </div></td>
  </tr>
</table>
<br>
<?php
if($spr[sptype]==1)
{
	$query="select spid,sid,title,titlepic,titleurl,titlefont,newstime from {$dbtbpre}enewssp_1 where spid='$spid'";
	$totalquery="select count(*) as total from {$dbtbpre}enewssp_1 where spid='$spid'";
	$num=$empire->gettotal($totalquery);//取得总条数
	$query=$query." order by newstime desc limit $offset,$line";
	$sql=$empire->query($query);
	$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
	<form action="ListSpInfo.php" method="post" name="spform" id="spform" onsubmit="return confirm('确认要修改?');">
    <tr class="header"> 
    <td width="51%" height="25"><div align="center">标题</div></td>
    <td width="30%"><div align="center">发布时间</div></td>
    <td width="19%" height="25"><div align="center">操作</div></td>
  </tr>
  <?
  while($r=$empire->fetch($sql))
  {
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{
			$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='../../data/images/showimg.gif' border=0></a>";
		}
		//标题
		$r[title]=DoTitleFont($r[titlefont],stripSlashes($r[title]));
  ?>
  <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
    <td height="32"> 
      <?=$showtitlepic?>
	  <a href='<?=$r[titleurl]?>' target=_blank><?=stripSlashes($r[title])?></a>
    </td>
    <td><div align="center">
          <input name="sid[]" type="hidden" id="sid[]" value="<?=$r[sid]?>">
          <input name="newstime[]" type="text" value="<?=date('Y-m-d H:i:s',$r[newstime])?>" size="22">
        </div></td>
    <td height="25"><div align="center">[<a href="AddSpInfo.php?enews=EditSpInfo&spid=<?=$spid?>&sid=<?=$r[sid]?>">修改</a>] 
        [<a href="ListSpInfo.php?enews=DelSpInfo&spid=<?=$spid?>&sid=<?=$r[sid]?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
  </tr>
  <?
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="3">&nbsp; 
      <?=$returnpage?>&nbsp;&nbsp;&nbsp;
	  <input type="hidden" name="enews" value="EditSpInfoTime">
        <input name="spid" type="hidden" id="spid" value="<?=$spid?>">
        <input type="submit" name="Submit" value="批量修改时间">
        <input type="reset" name="Submit2" value="重置"></td>
  </tr>
  </form>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25"><font color="#666666">说明：信息是按发布时间排序，如果要改顺序可以修改发布时间，发布时间设置空则改为当前时间。</font></td>
  </tr>
</table>
<?php
}
elseif($spr[sptype]==2)
{
	$query="select spid,sid,classid,id,newstime from {$dbtbpre}enewssp_2 where spid='$spid'";
	$totalquery="select count(*) as total from {$dbtbpre}enewssp_2 where spid='$spid'";
	$num=$empire->gettotal($totalquery);//取得总条数
	$query=$query." order by newstime desc limit $offset,$line";
	$sql=$empire->query($query);
	$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
	<form action="ListSpInfo.php" method="post" name="spform" id="spform" onsubmit="return confirm('确认要修改?');">
  <tr class="header"> 
    <td width="46%" height="25"><div align="center">标题</div></td>
    <td width="23%"><div align="center">发布时间</div></td>
    <td width="17%"><div align="center">所属栏目</div></td>
    <td width="14%" height="25"><div align="center">操作</div></td>
  </tr>
  <?
  while($r=$empire->fetch($sql))
  {
  		if(empty($class_r[$r[classid]][tbname]))
		{
			continue;
		}
  		$infor=$empire->fetch1("select id,classid,titleurl,groupid,newspath,filename,checked,isgood,firsttitle,plnum,totaldown,onclick,newstime,titlepic,title from {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." where id='$r[id]'");
		//标题图片
		$showtitlepic="";
		if($infor[titlepic])
		{
			$showtitlepic="<a href='".$infor[titlepic]."' title='预览标题图片' target=_blank><img src='../../data/images/showimg.gif' border=0></a>";
		}
		//标题
		$infor[title]=DoTitleFont($infor[titlefont],stripSlashes($infor[title]));
		//标题链接
		$titleurl=sys_ReturnBqTitleLink($infor);
		//栏目链接
		$classurl=sys_ReturnBqClassname($r,9);
  ?>
  <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
    <td height="32"> 
      <?=$showtitlepic?>
      <a href='<?=$titleurl?>' target=_blank><?=stripSlashes($infor[title])?></a> </td>
    <td><div align="center">
          <input name="sid[]" type="hidden" id="sid[]" value="<?=$r[sid]?>">
          <input name="newstime[]" type="text" value="<?=date('Y-m-d H:i:s',$r[newstime])?>" size="22"> 
      </div></td>
    <td><div align="center"><a href="<?=$classurl?>" target="_blank"><?=$class_r[$r[classid]][classname]?></a></div></td>
    <td height="25"><div align="center">[<a href="AddSpInfo.php?enews=EditSpInfo&spid=<?=$spid?>&sid=<?=$r[sid]?>">修改</a>] 
        [<a href="ListSpInfo.php?enews=DelSpInfo&spid=<?=$spid?>&sid=<?=$r[sid]?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
  </tr>
  <?
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="4">&nbsp; 
      <?=$returnpage?>&nbsp;&nbsp;&nbsp;
	  <input type="hidden" name="enews" value="EditSpInfoTime">
        <input name="spid" type="hidden" id="spid" value="<?=$spid?>">
        <input type="submit" name="Submit" value="批量修改时间">
        <input type="reset" name="Submit2" value="重置">
    </td>
  </tr>
  </form>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="25"><font color="#666666">说明：信息是按发布时间排序，如果要改顺序可以修改发布时间，发布时间设置空则改为当前时间。</font></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
<?
db_close();
$empire=null;
?>
