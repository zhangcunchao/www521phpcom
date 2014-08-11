<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
//验证用户
$lur=is_login();
$logininid=(int)$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];

//显示无限级栏目[管理信息时]
function ShowClass_ListNews($adminclass,$doall,$bclassid,$exp){
	global $empire,$dbtbpre;
	$sql=$empire->query("select classid,classname,bclassid,islast,classpath,classurl,listdt,sonclass from {$dbtbpre}enewsclass where bclassid='$bclassid' and wburl='' order by myorder,classid");
	if(empty($exp))//js
	{
		$exp="|-";
	}
	if(empty($bclassid))
	{
		$bclassid=0;
		$exp="|-";
    }
	else
	{
		$exp="&nbsp;&nbsp;".$exp;
	}
	$num=$empire->num1($sql);
	if($num==0&&$bclassid==0)//无记录
	{
		echo $GLOBALS['notrecordword'];
		return "";
	}
	if($num==0)
	{
		return '';
	}
	$returnstr="";
    ?>
	<table border=0 cellspacing=0 cellpadding=0>
	<?php
	$i=1;
	while($r=$empire->fetch($sql))
	{
		//需要权限
		if(empty($doall))
		{
			if(CheckHaveInClassid($r,$adminclass)==0)
			{
				continue;
			}
		}
		//链接地址
		//$classurl=sys_ReturnBqClassUrl($r);
		$classurl='';
		//终级栏目
		if($r[islast])
		{
			$color=" style='background:#99C4E3'";
			//最后一个子栏目
			if($i==$num)
			{$menutype="file1";}
			else
			{$menutype="file";}
			$classname="<a onclick=tourl($r[bclassid],$r[classid]) onmouseout=chft(this,0,$r[classid]) onmouseover=chft(this,1,$r[classid]) oncontextmenu=ShRM(this,".$r[bclassid].",".$r[classid].",'".$classurl."',1)>".$r[classname]."</a>";
			$onmouseup="";
		}
		else
		{
			$color="";
			//最后一个大栏目
			if($i==$num)
			{
				$menutype="menu3";
				$listtype="list1";
				$onmouseup="chengstate('".$r[classid]."')";
			}
			else
			{
				$menutype="menu1";
				$listtype="list";
				$onmouseup="chengstate('".$r[classid]."')";
			}
			$classname=$r[classname];
			$classname="<a onmouseout=chft(this,0,$r[classid]) onmouseover=chft(this,1,$r[classid]) oncontextmenu=ShRM(this,".$r[bclassid].",".$r[classid].",'".$classurl."',0)>".$r[classname]."</a>";
		}
		$jsstr.="<option value='".$r[classid]."'".$color.">".$exp.$r[classname]."</option>";
		?>
		<tr>
			<td id="pr<?=$r[classid]?>" class="<?=$menutype?>" onclick="<?=$onmouseup?>"><?=$classname?></td>
		  </tr>
		<?php
		if(empty($r[islast]))
		{
		?>
		  <tr id="item<?=$r[classid]?>" style="display:none">
			<td class="<?=$listtype?>">
			<?php
			$jsstr.=ShowClass_ListNews($adminclass,$doall,$r[classid],$exp);
			?>
			</td>
		 </tr>	
		<?php
		}
		$i+=1;
    }
	?>
	</table>
	<?php
	return $jsstr;
}

$user_r=$empire->fetch1("select adminclass,groupid from {$dbtbpre}enewsuser where userid='$logininid'");
//用户组权限
$gr=$empire->fetch1("select doall from {$dbtbpre}enewsgroup where groupid='$user_r[groupid]'");
if($gr['doall'])
{
	$fcfile='../data/fc/ListEnews.php';
}
else
{
	$fcfile='../data/fc/ListEnews'.$logininid.'.php';
}
if(file_exists($fcfile)&&file_exists('../data/fc/ListEnews.php'))
{
	@include($fcfile);
	exit();
}
//数据表
$changetbs='';
$dh='';
$tbi=0;
$tbsql=$empire->query("select tbname,tname from {$dbtbpre}enewstable order by tid");
while($tbr=$empire->fetch($tbsql))
{
	$tbi++;
	$changetbs.=$dh.'new ContextItem("'.$tbr['tname'].'",function(){ parent.document.main.location="ListAllInfo.php?tbname='.$tbr['tbname'].'"; })';
	if($tbi%3==0)
	{
		$changetbs.=',new ContextSeperator()';
	}
	$dh=',';
}
@ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理信息</title>
<link href="../data/menu/menu.css" rel="stylesheet" type="text/css">
<script src="../data/menu/menu.js" type="text/javascript"></script>
<script language="javascript" src="../data/rightmenu/context_menu.js"></script>
<script language="javascript" src="../data/rightmenu/ieemu.js"></script>
<SCRIPT lanuage="JScript">
if(self==top)
{self.location.href='admin.php';}

function chft(obj,ecms,classid){
	if(ecms==1)
	{
		obj.style.fontWeight='bold';
	}
	else
	{
		obj.style.fontWeight='';
	}
	obj.title='栏目ID：'+classid;
}

function tourl(bclassid,classid){
	parent.main.location.href="ListNews.php?bclassid="+bclassid+"&classid="+classid;
}

if(moz) {
	extendEventObject();
	extendElementModel();
	emulateAttachEvent();
}
//右键菜单
function ShRM(obj,bclassid,classid,classurl,showmenu)
{
  var eobj,popupoptions;
  classurl='<?=$public_r[newsurl]?>e/public/ClassUrl/?classid='+classid;
if(showmenu==1)
{
  popupoptions = [
    new ContextItem("增加信息",function(){ parent.document.main.location="AddNews.php?enews=AddNews&bclassid="+bclassid+"&classid="+classid; }),
	new ContextSeperator(),
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
    new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
    new ContextSeperator(),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextItem("增加采集节点",function(){ parent.document.main.location="AddInfoClass.php?enews=AddInfoClass&newsclassid="+classid; }),
	new ContextItem("管理附件",function(){ parent.document.main.location="file/ListFile.php?type=9&classid="+classid; }),
	new ContextSeperator()
  ]
}
else if(showmenu==2)
{
	popupoptions = [
    <?=$changetbs?>
  ]
}
else
{
	popupoptions = [
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
	new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
	new ContextSeperator()
  ]
}
  ContextMenu.display(popupoptions)
}
</SCRIPT>
</head>
<body onLoad="initialize();ContextMenu.intializeContextMenu();" bgcolor="#FFCFAD">
	<table border='0' cellspacing='0' cellpadding='0'>
	<tr height=20>
			<td id="home"><img src="../data/images/homepage.gif" border=0></td>
			<td><a href="#ecms" onclick="parent.main.location.href='ListAllInfo.php';" onmouseout="this.style.fontWeight=''" onmouseover="this.style.fontWeight='bold'" oncontextmenu="ShRM(this,0,0,'',2)"><b>管理信息</b></a></td>
	</tr>
	</table>
<?php
$notrecordword="您还未添加栏目,<br><a href='AddClass.php?enews=AddClass' target='main'><u><b>点击这里</b></u></a>进行添加操作";
$jsstr=ShowClass_ListNews($user_r[adminclass],$gr[doall],0,'');
if($gr['doall'])
{
	$jsfile="../data/fc/cmsclass.js";
	$search_jsfile="../data/fc/searchclass.js";
	$search_jsstr=str_replace(" style='background:#99C4E3'","",$jsstr);
	WriteFiletext_n($jsfile,"document.write(\"".addslashes($jsstr)."\");");
	WriteFiletext_n($search_jsfile,"document.write(\"".addslashes($search_jsstr)."\");");
}
?>
</body>
</html>
<?php
db_close();
$empire=null;
if($gr['doall']||file_exists('../data/fc/ListEnews.php'))
{
	$string=@ob_get_contents();
	WriteFiletext($fcfile,AddCheckViewTempCode().$string);
}
?>