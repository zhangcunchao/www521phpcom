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
CheckLevel($logininid,$loginin,$classid,"file");
$page=(int)$_GET['page'];
$start=0;
$line=25;//每页显示条数
$page_line=12;//每页显示链接数
$offset=$page*$line;//总偏移量
$add="";
//附件类型
$type=(int)$_GET['type'];
if($type!=9)//其他附件
{
	$add.=" and type='$type'";
}
if($type==0)
{
	$select0=" selected";
}
elseif($type==1)
{
	$select1=" selected";
}
elseif($type==2)
{
	$select2=" selected";
}
elseif($type==3)
{
	$select3=" selected";
}
else
{
	$select9=" selected";
}
//选择栏目
$classid=(int)$_GET['classid'];
/*
$fcjsfile='../../data/fc/cmsclass.js';
$classoptions=GetFcfiletext($fcjsfile);
*/
//栏目
if($classid)
{
	if($class_r[$classid]['islast'])
	{
		$add.=" and classid='$classid'";
	}
	else
	{
		$add.=" and ".ReturnClass($class_r[$classid]['sonclass']);
	}
	//$classoptions=str_replace("<option value='$classid'","<option value='$classid' selected",$classoptions);
}
//关键字
$keyboard=RepPostVar2($_GET['keyboard']);
if(!empty($keyboard))
{
	$show=$_GET['show'];
	//搜索全部
	if($show==0)
	{
		$add.=" and (filename like '%$keyboard%' or no like '%$keyboard%' or adduser like '%$keyboard%')";
	}
	//搜索文件名
	elseif($show==1)
	{
		$add.=" and filename like '%$keyboard%'";
	}
	//搜索编号
	elseif($show==2)
	{
		$add.=" and no like '%$keyboard%'";
	}
	//搜索上传者
	else
	{
		$add.=" and adduser like '%$keyboard%'";
	}
}
$search="&classid=$classid&type=$type&show=$show&keyboard=$keyboard";
$totalquery="select count(*) as total from {$dbtbpre}enewsfile where 1=1".$add;
$num=$empire->gettotal($totalquery);//取得总条数
$query="select * from {$dbtbpre}enewsfile where 1=1".$add;
$query=$query." order by fileid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>管理附件</title>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="36%">位置：<a href="ListFile.php?type=9">管理附件(数据式)</a>&nbsp;</td>
    <td width="64%"><div align="right" class="emenubutton">
        <input type="button" name="Submit52" value="目录式管理附件" onclick="self.location.href='FilePath.php';">
		&nbsp;&nbsp;
		<input type="button" name="Submit52" value="上传多附件" onclick="self.location.href='TranMoreFile.php';">
      </div></td>
  </tr>
</table>
<br>
  
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <form name="form2" method="get" action="ListFile.php">
    <input type=hidden name=classid value="<?=$classid?>">
    <tr> 
      <td width="82%">搜索: <select name="type" id="select">
          <option value="9">所有附件类型</option>
          <option value="1"<?=$select1?>>图片</option>
          <option value="2"<?=$select2?>>Flash文件</option>
          <option value="3"<?=$select3?>>多媒体文件</option>
          <option value="0"<?=$select0?>>其他附件</option>
        </select> <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
        <select name="show" id="show">
          <option value="0"<?=$show==0?' checked':''?>>不限</option>
          <option value="1"<?=$show==1?' checked':''?>>文件名</option>
          <option value="2"<?=$show==2?' checked':''?>>编号</option>
          <option value="3"<?=$show==3?' checked':''?>>上传者</option>
        </select>
		<span id="listfileclassnav"></span>
        <input type="submit" name="Submit2" value="搜索"> </td>
      <td width="18%"><div align="center">[<a href="../ecmsfile.php?enews=DelFreeFile" onclick="return confirm('确认要操作?');">清理失效附件</a>]</div></td>
    </tr>
  </form>
</table>
<form name="form1" method="post" action="../ecmsfile.php" onsubmit="return confirm('确认要删除?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td width="5%" height="25"><div align="center">ID</div></td>
      <td width="29%" height="25"><div align="center">文件名</div></td>
      <td width="10%" height="25"><div align="center">增加者</div></td>
      <td width="9%"><div align="center">文件大小</div></td>
      <td width="17%" height="25"><div align="center">增加时间</div></td>
      <td width="11%" height="25"><div align="center">操作</div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		$filesize=ChTheFilesize($r[filesize]);
		$fspath=ReturnFileSavePath($r[classid],$r[fpath]);
		$filepath=$r[path]?$r[path].'/':$r[path];
		$path1=$fspath['fileurl'].$filepath.$r[filename];
		//引用
		$thisfileid=$r['fileid'];
		if($r['id'])
		{
			$thisfileid="<b><a href='../../public/InfoUrl?classid=$r[classid]&id=$r[id]' target=_blank>".$r[fileid]."</a></b>";
		}
	?>
    <tr bgcolor="#FFFFFF" id="file<?=$r[fileid]?>" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td height="25"><div align="center"> 
          <?=$thisfileid?>
        </div></td>
      <td height="25"><div align="center"> 
          <?=$r[no]?>
          <br>
          <a href="<?=$path1?>" target="_blank">
          <?=$r[filename]?>
          </a> </div></td>
      <td height="25"><div align="center"> 
          <?=$r[adduser]?>
        </div></td>
      <td><div align="center"> 
          <?=$filesize?>
        </div></td>
      <td height="25"><div align="center"> 
          <?=$r[filetime]?>
        </div></td>
      <td height="25"><div align="center">[<a href="../ecmsfile.php?enews=DelFile&fileid=<?=$r[fileid]?>" onclick="return confirm('您是否要删除？');">删除</a> 
          <input name="fileid[]" type="checkbox" id="fileid[]" value="<?=$r[fileid]?>" onclick="if(this.checked){file<?=$r[fileid]?>.style.backgroundColor='#DBEAF5';}else{file<?=$r[fileid]?>.style.backgroundColor='#ffffff';}">
          ]</div></td>
    </tr>
    <?
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="6"> 
        <?=$returnpage?>
        &nbsp;&nbsp; <input type="submit" name="Submit" value="批量删除"> <input name="enews" type="hidden" id="enews" value="DelFile_all"> 
        &nbsp;
        <input type=checkbox name=chkall value=on onClick=CheckAll(this.form)>
        选中全部</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" colspan="6"><font color="#666666">如果ID是粗体，表示有信息引用，点击ID即可查看信息页面</font></td>
    </tr>
  </table>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="../ShowClassNav.php?ecms=5&classid=<?=$classid?>" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>
<?
db_close();
$empire=null;
?>
