<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
//验证用户
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//验证权限
CheckLevel($logininid,$loginin,$classid,"zt");
$enews=$_POST['enews'];
if(empty($enews))
{
	$enews=$_GET['enews'];
}
if($enews)
{
	include("../class/classfun.php");
}
if($enews=="TogZt")
{
	include("../data/dbcache/class.php");
	$re=TogZt($_POST,$logininid,$loginin);
}
elseif($enews=='SaveTogZtInfo')
{
	SaveTogZtInfo($_POST,$logininid,$loginin);
}
elseif($enews=='DelTogZtInfo')
{
	DelTogZtInfo($_GET,$logininid,$loginin);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>组合专题</title>
<link href="adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?
if($enews=="TogZt")
{
	include LoadLang("pub/fun.php");
	$totalnum=(int)$_POST['totalnum'];
	$start=0;
	$page=(int)$_POST['page'];
	$line=(int)$_POST['pline'];//每行显示
	$page_line=12;
	$offset=$page*$line;
	$query="select id,title,checked,ismember,username,plnum,isqf,classid,totaldown,onclick,newstime,titleurl,groupid,newspath,filename,titlepic,havehtml,truetime,lastdotime,istop,isgood,firsttitle from {$dbtbpre}ecms_".$re[2].$re[0];
	$totalquery="select count(*) as total from {$dbtbpre}ecms_".$re[2].$re[0];
	if($totalnum<1)
	{
		$num=$empire->gettotal($totalquery);//取得总条数
	}
	else
	{
		$num=$totalnum;
	}
	$query.=" order by newstime desc limit $offset,$line";
	$sql=$empire->query($query);
	$url="专题: <b>".$re[3]."</b>&nbsp;->&nbsp;<a href='TogZt.php?ztid=".$_POST['ztid']."'>组合专题</a>&nbsp;(".$dbtbpre."ecms_".$re[2].")";
	$returnpage=postpage($num,$line,$page_line,$start,$page,"document.ListZtInfo");
?>
<script>
function DelInfoid(id){
	var inid=document.ListZtInfo.inid.value;
	var dh="",cinid="";
	if(inid=="")
	{
		dh="";
	}
	else
	{
		dh=",";
	}
	cinid=","+inid+",";
	if(cinid.indexOf(","+id+",")==-1)
	{
		document.ListZtInfo.inid.value+=dh+id;
	}
}
function ReInfoid(id){
	var inid=","+document.ListZtInfo.inid.value+",";
	var dh="",newinid="",len;
	if(inid=="")
	{
		return "";
	}
	if(inid.indexOf(","+id+",")!=-1)
	{
		newinid=inid.replace(","+id+",",",");
		if(newinid==",")
		{
			document.ListZtInfo.inid.value="";
			return "";
		}
		//去掉前后,
		len=newinid.length;
		newinid=newinid.substring(1,len-1);
		document.ListZtInfo.inid.value=newinid;
	}
}
function DoTogzt(){
	document.ListZtInfo.doecmszt.value=1;
	document.ListZtInfo.submit();
}
</script>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td height="25">位置：<?=$url?></td>
  </tr>
</table>
  
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="ListZtInfo" method="POST" action="TogZt.php">
	<input type=hidden name=totalnum value="<?=$num?>">
	<input type=hidden name=page value="<?=$page?>">
	<input type=hidden name=start value="<?=$start?>">
	<?=$re[1]?>
    <tr class="header"> 
      <td width="6%" height="25"> <div align="center">去除</div></td>
      <td width="55%"><div align="center">标题</div></td>
      <td width="18%"><div align="center">发布者</div></td>
      <td width="21%"><div align="center">发布时间</div></td>
    </tr>
	<?
	while($r=$empire->fetch($sql))
	{
		//时间
		$truetime=date_time($r[truetime],"Y-m-d H:i:s");
		$lastdotime=date_time($r[lastdotime],"Y-m-d H:i:s");
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,45,false));
		if(empty($r[checked]))
		{
			$checked=" title='未审核' style='background:#99C4E3'";
		}
		else
		{
			$checked="";
		}
		//会员投稿
		if($r[ismember])
		{
			$r[username]="<font color=red>".$r[username]."</font>";
		}
		$titleurl=sys_ReturnBqTitleLink($r);
		$bgcolor="#FFFFFF";
		if(strstr(",".$_POST['inid'].",",",".$r[id].","))
		{
			$bgcolor="#DBEAF5";
			$checked.=" checked";
		}
	?>
    <tr bgcolor="<?=$bgcolor?>" id=news<?=$r[id]?>> 
      <td height="25"> <div align="center"> 
          <input name="checkid" type="checkbox" id="checkid" onClick="if(this.checked){DelInfoid(<?=$r[id]?>);news<?=$r[id]?>.style.backgroundColor='#DBEAF5';}else{ReInfoid(<?=$r[id]?>);news<?=$r[id]?>.style.backgroundColor='#ffffff';}" value="<?=$r[id]?>"<?=$checked?>>
        </div></td>
      <td>
	  	<a href='<?=$titleurl?>' target=_blank title="<?=$oldtitle?>"> 
        <?=$r[title]?>
        </a>
	  </td>
      <td><div align="center"><?=$r[username]?></div></td>
      <td><div align="center"><a href="AddNews.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$r[classid]?>" title="<? echo"增加时间：".$truetime."\r\n最后修改：".$lastdotime;?>" target=_blank><?=date("Y-m-d H:i:s",$r[newstime])?></a></div></td>
    </tr>
	<?
	}
	?>
    <tr bgcolor="ffffff"> 
      <td height="25"> <div align="center"></div></td>
      <td colspan="3"><?=$returnpage?></td>
    </tr>
    <tr bgcolor="ffffff"> 
      <td height="25"> <div align="center"></div></td>
      <td colspan="3"><input type="button" name="Submit3" value="开始组合专题" onclick="javascript:DoTogzt();"></td>
    </tr>
	</form>
  </table>
<?
}
else
{
	$ztid=(int)$_GET['ztid'];
	if(empty($ztid))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	$r=$empire->fetch1("select ztid,ztname,tbname from {$dbtbpre}enewszt where ztid='$ztid'");
	if(empty($r['ztid'])||empty($r['tbname']))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	//初始值
	$togr[startid]=0;
	$togr[endid]=0;
	$togr[pline]=50;
	$togr[searchf]=",stitle,";
	$togr[doecmszt]=1;
	$url="专题: <b>".$r[ztname]."</b>&nbsp;->&nbsp;组合专题";
	//--------------------操作的栏目
	$fcjsfile='../data/fc/cmsclass.js';
	$class=GetFcfiletext($fcjsfile);
	$togid=(int)$_GET['togid'];
	if($togid)
	{
		$togr=$empire->fetch1("select * from {$dbtbpre}enewstogzts where togid='$togid'");
		$class=str_replace("<option value='$togr[classid]'","<option value='$togr[classid]' selected",$class);
	}
	//参数
	$togsql=$empire->query("select togid,togztname from {$dbtbpre}enewstogzts order by togid");
	while($tgr=$empire->fetch($togsql))
	{
		$selected='';
		if($togid==$tgr[togid])
		{
			$selected=' selected';
		}
		$togzts.="<option value='".$tgr[togid]."'".$selected.">".$tgr[togztname]."</option>";
	}
?>
<script src="ecmseditor/fieldfile/setday.js"></script>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<form name="loadtogzt" method="get" action="TogZt.php">
  <tr> 
    <td width="50%" height="25">位置： 
      <?=$url?>
    </td>
    <td><div align="right">
          <select name="togid" id="togid">
		  <option name="">选择组合参数</option>
		  <?=$togzts?>
          </select>
          <input type="submit" name="Submit5" value="导入参数" onclick="document.loadtogzt.enews.value='';">
          &nbsp; 
          <input type="submit" name="Submit6" value="删除" onclick="document.loadtogzt.enews.value='DelTogZtInfo';">
          <input name="enews" type="hidden" id="enews" value="">
          <input name="ztid" type="hidden" id="ztid" value="<?=$ztid?>">
        </div></td>
  </tr>
  </form>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class=tableborder>
  <form name="form1" method="post" action="TogZt.php" onsubmit="return confirm('确认要执行此操作？');">
    <tr class=header> 
      <td height="27" colspan="2">组合专题</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="22%" height="27">专题名称</td>
      <td width="78%" height="27"><b> 
        <?=$r[ztname]?>
        &nbsp;(
        <?=$dbtbpre?>
        ecms_ 
        <?=$r[tbname]?>
        )</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">组合关键字</td>
      <td height="27"> <input name="keyboard" type="text" id="keyboard2" size="38" value="<?=stripSlashes($togr[keyboard])?>"> 
        <font color="#666666">(不填为不限制)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">查询字段</td>
      <td height="27"> <input name="stitle" type="checkbox" id="stitle3" value="1"<?=strstr($togr[searchf],',stitle,')?' checked':''?>>
        标题 
        <input name="susername" type="checkbox" id="susername2" value="1"<?=strstr($togr[searchf],',susername,')?' checked':''?>>
        增加者 
        <input name="snewstext" type="checkbox" id="snewstext2" value="1"<?=strstr($togr[searchf],',snewstext,')?' checked':''?>>
        内容<font color="#666666">(拥有newstext字段的表才有效)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">附加SQL条件</td>
      <td height="27"><input name="query" type="text" id="query" value="<?=stripSlashes($togr[query])?>" size="60"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">&nbsp;</td>
      <td height="27"><font color="#666666">(格式如：“writer='作者'”)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">特殊条件</td>
      <td height="27"> <input name="isgood" type="checkbox" id="isgood3" value="1"<?=strstr($togr[specialsearch],',isgood,')?' checked':''?>>
        推荐 
        <input name="firsttitle" type="checkbox" id="firsttitle2" value="1"<?=strstr($togr[specialsearch],',firsttitle,')?' checked':''?>>
        头条 
        <input name="titlepic" type="checkbox" id="titlepic2" value="1"<?=strstr($togr[specialsearch],',titlepic,')?' checked':''?>>
        有标题图片 
        <input name="checked" type="checkbox" id="checked" value="1"<?=strstr($togr[specialsearch],',checked,')?' checked':''?>>
        审核过的信息(<font color="#FF0000">不选为不限制</font>)</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">查询栏目</td>
      <td height="27"> <select name="classid" id="select">
          <option value="0">所有栏目</option>
          <?=$class?>
        </select>
        （如选择大栏目，将查询所有子栏目）</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27"> <input name="retype" type="radio" value="0"<?=$togr[retype]==0?' checked':''?>>
        按时间查询</td>
      <td height="27">从 
        <input name="startday" type="text" onclick="setday(this)" value="<?=$togr[startday]?>" size="12">
        到 
        <input name="endday" type="text" onclick="setday(this)" value="<?=$togr[endday]?>" size="12">
        之间的数据(<font color="#FF0000">不填将查询所有信息</font>)</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27"> <input name="retype" type="radio" value="1"<?=$togr[retype]==1?' checked':''?>>
        按ID查询</td>
      <td height="27">从 
        <input name="startid" type="text" id="startid2" value="<?=$togr[startid]?>" size="6">
        到 
        <input name="endid" type="text" id="endid2" value="<?=$togr[endid]?>" size="6">
        之间的数据(<font color="#FF0000">如两个值为0将查询所有信息</font>)</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">每页显示行数</td>
      <td height="27"><input name="pline" type="text" id="pline" value="<?=$togr[pline]?>" size="6"> 
        <input name="doecmszt" type="checkbox" id="doecmszt" value="1"<?=$togr[doecmszt]==1?' checked':''?>>
        直接组合专题<font color="#666666">(不显示列表)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27">&nbsp;</td>
      <td height="27"> <input type="submit" name="Submit" value=" 开始组合 " onclick="document.form1.enews.value='TogZt';"> <input type="reset" name="Submit2" value="重置"> 
        <input name="enews" type="hidden" id="enews2" value="TogZt"> <input name="ztid" type="hidden" id="ztid" value="<?=$ztid?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="27">&nbsp;</td>
      <td height="27">参数名: 
        <input name="togztname" type="text" id="togztname" value="<?=$togr[togztname]?>">
        <input type="submit" name="Submit4" value="保存参数" onclick="document.form1.enews.value='SaveTogZtInfo';"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="27" colspan="2">说明：此功能是将查询的信息隶属于某个专题。</td>
    </tr>
	</form>
  </table>
<?
}
?>
</body>
</html>
<?
db_close();
$empire=null;
?>