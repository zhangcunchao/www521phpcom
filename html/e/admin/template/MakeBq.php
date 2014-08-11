<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
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

$doobject=(int)$_GET['doobject'];
$addselfinfo=(int)$_GET['addselfinfo'];
$selfinfooption='';
$parentclass=(int)$_GET['parentclass'];
$addparentclass='';
if($parentclass)
{
	$addparentclass='父';
}
//操作对象
if($doobject==2)//按栏目
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="0">栏目最新信息</option>
			  <option value="1">栏目点击排行</option>
			  <option value="2">栏目推荐信息</option>
			  <option value="9">栏目评论排行</option>
			  <option value="12">栏目头条信息</option>
			  <option value="15">栏目下载排行</option>
              </select></td>
          </tr>
        </table>';
	//选择栏目
	$fcfile='../../data/fc/ListEnews.php';
	$class="<script src=../../data/fc/cmsclass.js></script>";
	if(!file_exists($fcfile))
	{$class=ShowClass_AddClass("",0,0,"|-",0,0);}
	if($addselfinfo==1)
	{
	}
	elseif($addselfinfo==2)//一级栏目+当前栏目
	{
		$selfinfooption='<option value="\'selfinfo\'">当前栏目</option><option value="\'0\'">一级栏目</option>';
	}
	elseif($addselfinfo==3)//一级栏目
	{
		$selfinfooption='<option value="\'0\'">一级栏目</option>';
	}
	elseif($addselfinfo==4)//不限栏目
	{
		$selfinfooption='<option value="0">不限栏目</option>';
	}
	else
	{
		$selfinfooption='<option value="\'selfinfo\'">当前栏目</option>';
	}
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择'.$addparentclass.'栏目：</td>
            <td width="76%"><select name="classid" id="select2">
			  '.$selfinfooption.'
			  '.$class.'
              </select></td>
          </tr>
        </table>';
}
elseif($doobject==3)//按专题
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="6">专题最新信息</option>
			  <option value="7">专题点击排行</option>
			  <option value="8">专题推荐信息</option>
			  <option value="11">专题评论排行</option>
			  <option value="14">专题头条信息</option>
			  <option value="17">专题下载排行</option>
              </select></td>
          </tr>
        </table>';
	//选择专题
	$ztclass='';
	$ztsql=$empire->query("select ztid,ztname from {$dbtbpre}enewszt order by ztid desc");
	while($ztr=$empire->fetch($ztsql))
	{
		$ztclass.="<option value='".$ztr['ztid']."'>".$ztr['ztname']."</option>";
	}
	if($addselfinfo==1)
	{
	}
	else
	{
		$selfinfooption='<option value="\'selfinfo\'">当前专题</option>';
	}
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择专题：</td>
            <td width="76%"><select name="classid" id="select2">
			  '.$selfinfooption.'
			  '.$ztclass.'
              </select></td>
          </tr>
        </table>';
}
elseif($doobject==4)//按数据表
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="18">表最新信息</option>
			  <option value="19">表点击排行</option>
			  <option value="20">表推荐信息</option>
			  <option value="21">表评论排行</option>
			  <option value="22">表头条信息</option>
			  <option value="23">表下载排行</option>
              </select></td>
          </tr>
        </table>';
	//选择数据表
	$tb='';
	$tbsql=$empire->query("select tbname,tname from {$dbtbpre}enewstable order by tid");
	while($tbr=$empire->fetch($tbsql))
	{
		$tb.="<option value=\"'".$tbr[tbname]."'\">".$tbr[tname]."</option>";
	}
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择数据表：</td>
            <td width="76%"><select name="classid" id="select2">
			  '.$tb.'
              </select></td>
          </tr>
        </table>';
}
elseif($doobject==5)//按标题分类
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="25">标题分类最新信息</option>
			  <option value="26">标题分类点击排行</option>
			  <option value="27">标题分类推荐信息</option>
			  <option value="28">标题分类评论排行</option>
			  <option value="29">标题分类头条信息</option>
			  <option value="30">标题分类下载排行</option>
              </select></td>
          </tr>
        </table>';
	//选择标题分类
	$tts='';
	$ttsql=$empire->query("select typeid,tname from {$dbtbpre}enewsinfotype order by typeid");
	while($ttr=$empire->fetch($ttsql))
	{
		$tts.="<option value='$ttr[typeid]'>$ttr[tname]</option>";
	}
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择标题分类：</td>
            <td width="76%"><select name="classid" id="select2">
			  '.$tts.'
              </select></td>
          </tr>
        </table>';
}
elseif($doobject==6)//按SQL
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="24">SQL查询</option>
              </select></td>
          </tr>
        </table>';
	//选择SQL
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择：</td>
            <td width="76%"><select name="classid" id="select2">
			  <option value="\'sql语句\'">SQL查询</option>
              </select></td>
          </tr>
        </table>';
}
else//按默认表
{
	//操作类型
	$dotype='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select">
			  <option value="3">默认表最新信息</option>
			  <option value="4">默认表点击排行</option>
			  <option value="5">默认表推荐信息</option>
			  <option value="10">默认表评论排行</option>
			  <option value="13">默认表头条信息</option>
			  <option value="16">默认表下载排行</option>
              </select></td>
          </tr>
        </table>';
	//选择SQL
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择：</td>
            <td width="76%"><select name="classid" id="select2">
			  <option value="0">默认表('.$public_r[tbname].')</option>
              </select></td>
          </tr>
        </table>';
}

//标签模板
$bqname=$_GET['bqname'];
if(empty($bqname))
{
	$bqname='ecmsinfo';
}
$mydotype=$_GET['mydotype'];
$defchangeobject=$_GET['defchangeobject'];
if($defchangeobject==1)
{
	$changeobject='<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">选择：</td>
            <td width="76%"><select name="classid" id="select2">
			  <option value="\'\'">默认</option>
              </select></td>
          </tr>
        </table>';
}
if($bqname=='ecmsinfo'||$bqname=='listsonclass'||$bqname=='otherlink'||$bqname=='eshowphoto'||$bqname=='tagsinfo'||$bqname=='showclasstemp'||$bqname=='eshowzt'||$bqname=='listshowclass'||$bqname=='gbookinfo'||$bqname=='showplinfo')
{
	$bqtemp='';
	$bqtempsql=$empire->query("select tempid,tempname from ".GetTemptb("enewsbqtemp")." order by tempid");
	while($bqtempr=$empire->fetch($bqtempsql))
	{
		$bqtemp.="<option value='".$bqtempr[tempid]."'>".$bqtempr[tempname]."</option>";
	}
}
//当前使用的模板组
$thegid=GetDoTempGid();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>帝国网站管理系统--标签生成</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script language="javascript">
window.resizeTo(800,600);
window.focus();
</script>
<script>
//返回附加SQL
function ReturnAddSql(addsql,orderby){
	var addstr='';
	var r;
	var yh="'";
	if(addsql!=''||orderby!='')
	{
		r=addsql.split("'");
		if(r.length!=1)
		{
			yh='"';
		}
		if(addsql!='')
		{
			addstr+=','+yh+addsql+yh;
		}
		else
		{
			addstr+=",''";
		}
		if(orderby!='')
		{
			addstr+=",'"+orderby+"'";
		}
	}
	return addstr;
}

//返回是否加单引号
function ReturnAddYh(tids){
	var r;
	if(tids=='')
	{
		return "''";
	}
	r=tids.split(",");
	if(r.length!=1)
	{
		tids="'"+tids+"'";
	}
	return tids;
}
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr> 
    <td height="25">选择标签： 
      <select name="bq" id="bq" style= "font-size:16px;" onchange="if(this.options[this.selectedIndex].value!=''){self.location.href='MakeBq.php?bqname='+this.options[this.selectedIndex].value}">
        <option value="" style="background-color:#AFCFF3">信息调用标签</option>
        <option value="ecmsinfo"<?=$bqname=='ecmsinfo'?' selected':''?>>&nbsp; &gt; 万能标签调用 (ecmsinfo)</option>
		<option value="eloop"<?=$bqname=='eloop'?' selected':''?>>&nbsp; &gt; 灵动标签 (e:loop)</option>
        <option value="phomenews"<?=$bqname=='phomenews'?' selected':''?>>&nbsp; &gt; 文字调用标签 (phomenews)</option>
        <option value="phomenewspic"<?=$bqname=='phomenewspic'?' selected':''?>>&nbsp; &gt; 图文信息调用[标题图片的信息] (phomenewspic)</option>
        <option value="phomeflashpic"<?=$bqname=='phomeflashpic'?' selected':''?>>&nbsp; &gt; FLASH幻灯信息调用 (phomeflashpic)</option>
		<option value="listsonclass&doobject=2&addselfinfo=2"<?=$bqname=='listsonclass'?' selected':''?>>&nbsp; &gt; 循环子栏目数据标签 (listsonclass)</option>
		<option value="otherlink&defchangeobject=1"<?=$bqname=='otherlink'?' selected':''?>>&nbsp; &gt; 相关链接标签 (otherlink)</option>
		<option value="tagsinfo"<?=$bqname=='tagsinfo'?' selected':''?>>&nbsp; &gt; 调用TAGS的信息标签 (tagsinfo)</option>
		<option value="spinfo"<?=$bqname=='spinfo'?' selected':''?>>&nbsp; &gt; 调用碎片的信息标签 (spinfo)</option>
		<option value="showtags"<?=$bqname=='showtags'?' selected':''?>>&nbsp; &gt; 调用TAGS标签 (showtags)</option>
        <option value="phomeautopic"<?=$bqname=='phomeautopic'?' selected':''?>>&nbsp; &gt; 滚动图片信息标签 (phomeautopic)</option>
        <option value="totaldata&doobject=2&addselfinfo=1"<?=$bqname=='totaldata'?' selected':''?>>&nbsp; &gt; 网站信息统计 (totaldata)</option>
        <option value="eshowphoto"<?=$bqname=='eshowphoto'?' selected':''?>>&nbsp; &gt; 图库模型分页标签 (eshowphoto)</option>
        <option value="showsearch&doobject=2&addselfinfo=4"<?=$bqname=='showsearch'?' selected':''?>>&nbsp; &gt; 搜索关键字调用标签 (showsearch)</option>
        <option value="phomenewstext"<?=$bqname=='phomenewstext'?' selected':''?>>&nbsp; &gt; 简介型调用信息标签 (phomenewstext)</option>
        <option value="" style="background-color:#AFCFF3">栏目调用标签</option>
        <option value="showclasstemp&doobject=2&addselfinfo=2&parentclass=1"<?=$bqname=='showclasstemp'?' selected':''?>>&nbsp; &gt; 带模板的栏目导航标签 (showclasstemp)</option>
        <option value="phomeshowclass"<?=$bqname=='phomeshowclass'?' selected':''?>>&nbsp; &gt; 显示栏目导航标签 (phomeshowclass)</option>
        <option value="eshowzt"<?=$bqname=='eshowzt'?' selected':''?>>&nbsp; &gt; 专题调用标签 (eshowzt)</option>
        <option value='listshowclass&doobject=2&addselfinfo=2&parentclass=1'<?=$bqname=='listshowclass'?' selected':''?>>&nbsp; &gt; 循环栏目导航标签 (listshowclass)</option>
		<option value="phomeshowmap&doobject=2&addselfinfo=3&parentclass=1"<?=$bqname=='phomeshowmap'?' selected':''?>>&nbsp; &gt; 显示网站地图标签 (phomeshowmap)</option>
        <option value="" style="background-color:#AFCFF3">非信息调用标签</option>
        <option value="phomead"<?=$bqname=='phomead'?' selected':''?>>&nbsp; &gt; 广告调用标签 (phomead)</option>
        <option value="phomevote"<?=$bqname=='phomevote'?' selected':''?>>&nbsp; &gt; 投票调用标签 (phomevote)</option>
        <option value="phomelink"<?=$bqname=='phomelink'?' selected':''?>>&nbsp; &gt; 友情链接调用标签 (phomelink)</option>
        <option value="gbookinfo"<?=$bqname=='gbookinfo'?' selected':''?>>&nbsp; &gt; 留言板调用标签 (gbookinfo)</option>
        <option value="showplinfo"<?=$bqname=='showplinfo'?' selected':''?>>&nbsp; &gt; 评论调用标签 (showplinfo)</option>
        <option value="echocheckbox"<?=$bqname=='echocheckbox'?' selected':''?>>&nbsp; &gt; 复选字段输出内容标签 (echocheckbox)</option>
		<option value="" style="background-color:#AFCFF3">会员相关调用</option>
		<option value="ShowMemberInfo"<?=$bqname=='ShowMemberInfo'?' selected':''?>>会员信息调用函数 (ShowMemberInfo)</option>
		<option value="ListMemberInfo"<?=$bqname=='ListMemberInfo'?' selected':''?>>会员列表调用函数 (ListMemberInfo)</option>
		<option value="spaceeloop"<?=$bqname=='spaceeloop'?' selected':''?>>会员空间信息标签调用 (spaceeloop)</option>
        <option value="" style="background-color:#AFCFF3">其它标签</option>
        <option value="includefile"<?=$bqname=='includefile'?' selected':''?>>&nbsp; &gt; 引用文件标签 (includefile)</option>
        <option value="readhttp"<?=$bqname=='readhttp'?' selected':''?>>&nbsp; &gt; 读取远程页面 (readhttp)</option>
        <option value="phomepic"<?=$bqname=='phomepic'?' selected':''?>>&nbsp; &gt; 图片信息标签:[调用单个] (phomepic)</option>
        <option value="phomemorepic"<?=$bqname=='phomemorepic'?' selected':''?>>&nbsp; &gt; 图片信息标签:[调用多个] (phomemorepic)</option>
      </select></td>
  </tr>
</table>
<br>
<?php
if($bqname=='ecmsinfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var fshowclass=obj.showclass.value;
	var fdotype=obj.dotype.value;
	var ftempid=obj.tempid.value;
	var fispic=obj.ispic.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[ecmsinfo]"+fclassid+","+fline+","+ftitlelen+","+fshowclass+","+fdotype+","+ftempid+","+fispic+addstr+"[/ecmsinfo]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">ecmsinfo标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表(
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select3">
                <?=$bqtemp?>
              </select>
              <input type="button" name="Submit6222323" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen2" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目名：</td>
            <td width="76%"><select name="showclass" id="showclass">
                <option value="0">否</option>
                <option value="1">是</option>
              </select> <font color="#666666">(标签模板要加[!--class.name--])</font> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">只调用有标题图片的信息： 
        <select name="ispic" id="ispic">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();">
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#ecmsinfo" target="_blank" title="查看详细标签语法">[ecmsinfo]栏目ID/专题ID,显示条数,标题截取数,是否显示栏目名,操作类型,模板ID,只显示有标题图片,附加SQL条件,显示排序[/ecmsinfo]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='eloop')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var fdotype=obj.dotype.value;
	var fispic=obj.ispic.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[e:loop={"+fclassid+","+fline+","+fdotype+","+fispic+addstr+"}]\r\n<a href=\"<?="<?=\$bqsr['titleurl']?>"?>\" target=\"_blank\"><?="<?=\$bqr['title']?>"?></a> <br>\r\n[/e:loop]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="eloop">
    <tr> 
      <td height="25" colspan="2" class="header">灵动标签(e:loop)生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">只调用有标题图片的信息： 
        <select name="ispic" id="select6">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select> </td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit3" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><a href="EnewsBq.php#eloop" target="_blank" title="查看详细标签语法">[e:loop={栏目ID/专题ID,显示条数,操作类型,只显示有标题图片,附加SQL条件,显示排序}]<br>
        模板代码内容<br>
        [/e:loop]</a></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="12" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit22" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomenews')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var fshowclass=obj.showclass.value;
	var fdotype=obj.dotype.value;
	var fshowtime=obj.showtime.value;
	var fformattime=obj.formattime.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[phomenews]"+fclassid+","+fline+","+ftitlelen+","+fshowtime+","+fdotype+","+fshowclass+",'"+fformattime+"'"+addstr+"[/phomenews]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomenews标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目名：</td>
            <td width="76%"><select name="showclass" id="select2">
                <option value="0">否</option>
                <option value="1">是</option>
              </select> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen2" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">是否显示时间：</td>
            <td width="76%"><select name="showtime" id="select4">
                <option value="0">否</option>
                <option value="1">是</option>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">时间格式：</td>
            <td width="76%"><input name="formattime" type="text" id="formattime" value="(m-d)"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomenews" target="_blank" title="查看详细标签语法">[phomenews]栏目ID/专题ID,显示条数,标题截取数,是否显示时间,操作类型,是否显示栏目名,'时间格式化',附加SQL条件,显示排序[/phomenews]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomenewspic')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var flnum=obj.lnum.value;
	var ftitlelen=obj.titlelen.value;
	var fshowtitle=obj.showtitle.value;
	var fdotype=obj.dotype.value;
	var fpicwidth=obj.picwidth.value;
	var fpicheight=obj.picheight.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[phomenewspic]"+fclassid+","+fline+","+flnum+","+fpicwidth+","+fpicheight+","+fshowtitle+","+ftitlelen+","+fdotype+addstr+"[/phomenewspic]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomenewspic标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用总数量：</td>
            <td width="76%"><input name="lnum" type="text" id="line3" value="8"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示数量：</td>
            <td width="76%"><input name="line" type="text" id="num" value="4"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片大小：</td>
            <td width="76%">宽
<input name="picwidth" type="text" id="picwidth" value="170" size="6">
              ×高 
              <input name="picheight" type="text" id="picheight" value="120" size="6"> </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">是否显示标题：</td>
            <td width="76%"><select name="showtitle" id="select5">
                <option value="0">否</option>
                <option value="1">是</option>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen" value="26"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomenewspic" target="_blank" title="查看详细标签语法">[phomenewspic]栏目ID/专题ID,每行显示条数,显示总信息数,图片宽度,图片高度,是否显示标题,标题截取数,操作类型,附加SQL条件,显示排序[/phomenewspic]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomeflashpic')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var fkeeptime=obj.keeptime.value;
	var ftitlelen=obj.titlelen.value;
	var fshowtitle=obj.showtitle.value;
	var fdotype=obj.dotype.value;
	var fpicwidth=obj.picwidth.value;
	var fpicheight=obj.picheight.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[phomeflashpic]"+fclassid+","+fline+","+fpicwidth+","+fpicheight+","+fshowtitle+","+ftitlelen+","+fdotype+","+fkeeptime+addstr+"[/phomeflashpic]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomeflashpic标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="5"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">停顿秒数：</td>
            <td width="76%"><input name="keeptime" type="text" id="num" value="0">
              <font color="#666666">(0为默认)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片大小：</td>
            <td width="76%">宽
<input name="picwidth" type="text" id="picwidth" value="170" size="6">
              ×高 
              <input name="picheight" type="text" id="picheight" value="120" size="6"> </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">是否显示标题：</td>
            <td width="76%"><select name="showtitle" id="select5">
                <option value="0">否</option>
                <option value="1">是</option>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen" value="26"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomeflashpic" target="_blank" title="查看详细标签语法">[phomeflashpic]栏目ID/专题ID,显示总数,图片宽度,图片高度,是否显示标题,标题截取数,操作类型,停顿秒数,附加SQL条件,显示排序[/phomeflashpic]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomeautopic')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var fkeeptime=obj.keeptime.value;
	var ftitlelen=obj.titlelen.value;
	var fshowtitle=obj.showtitle.value;
	var fdotype=obj.dotype.value;
	var fpicwidth=obj.picwidth.value;
	var fpicheight=obj.picheight.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[phomeautopic]"+fclassid+","+fline+","+fpicwidth+","+fpicheight+","+fshowtitle+","+ftitlelen+","+fkeeptime+","+fdotype+addstr+"[/phomeautopic]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomeautopic标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="5"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示速度：</td>
            <td width="76%"><input name="keeptime" type="text" id="num" value="0">
              <font color="#666666">(0为默认)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片大小：</td>
            <td width="76%">宽
<input name="picwidth" type="text" id="picwidth" value="170" size="6">
              ×高 
              <input name="picheight" type="text" id="picheight" value="120" size="6"> </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">是否显示标题：</td>
            <td width="76%"><select name="showtitle" id="select5">
                <option value="0">否</option>
                <option value="1">是</option>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen" value="26"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomeautopic" target="_blank" title="查看详细标签语法">[phomeautopic]栏目ID/专题ID,显示总数,图片宽度,图片高度,是否显示标题,标题截取数,显示速度,操作类型,附加SQL条件,显示排序[/phomeautopic]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='listsonclass')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var fshowclass=obj.showclass.value;
	var fdotype=obj.dotype.value;
	var ftempid=obj.tempid.value;
	var fispic=obj.ispic.value;
	var fclassnum=obj.classnum.value;
	var ffirstdotype=obj.firstdotype.value;
	var ffirsttitlelen=obj.firsttitlelen.value;
	var ffirstsmalltextlen=obj.firstsmalltextlen.value;
	var ffirstispic=obj.firstispic.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[listsonclass]"+fclassid+","+fline+","+ftitlelen+","+fshowclass+","+fdotype+","+ftempid+","+fispic+","+fclassnum+","+ffirstdotype+","+ffirsttitlelen+","+ffirstsmalltextlen+","+ffirstispic+addstr+"[/listsonclass]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">listsonclass标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="dotype">
                <option value="0">栏目最新</option>
                <option value="1">栏目热门</option>
                <option value="2">栏目推荐</option>
                <option value="3">栏目评论排行</option>
                <option value="4">栏目头条</option>
                <option value="5">栏目下载排行</option>
              </select></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用信息数：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select7">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit62223232" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen3" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目名：</td>
            <td width="76%"><select name="showclass" id="select8">
                <option value="0">否</option>
                <option value="1">是</option>
              </select> <font color="#666666">(标签模板要加[!--class.name--])</font> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">只调用有标题图片的信息： 
        <select name="ispic" id="select9">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制栏目数量：</td>
            <td width="76%"><input name="classnum" type="text" id="titlelen4" value="0"> 
              <font color="#666666">(0为不限制)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">头条操作类型：</td>
            <td width="76%"><select name="firstdotype" id="select10">
                <option value="0">不显示栏目头条</option>
                <option value="1">栏目内容简介</option>
                <option value="2">栏目推荐信息</option>
                <option value="3">栏目头条信息</option>
                <option value="4">栏目最新信息</option>
              </select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">头条标题截取字数：</td>
            <td width="76%"><input name="firsttitlelen" type="text" id="firsttitlelen" value="32"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">头条简介截取字数：</td>
            <td width="76%"><input name="firstsmalltextlen" type="text" id="firstsmalltextlen" value="0"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">头条只调用有标题图片的信息： 
        <select name="firstispic" id="select11">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#listsonclass" target="_blank" title="查看详细标签语法">[listsonclass]栏目ID,显示条数,标题截取数,是否显示栏目名,操作类型,模板ID,只显示有标题图片,显示栏目数,显示头条操作类型,头条标题截取数,头条简介截取数,头条只显示有标题图片,附加SQL条件,显示排序[/listsonclass]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='totaldata')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var fclassid=obj.classid.value;
	var flimittime=obj.limittime.value;
	var fdotype=obj.dotype.value;
	bqstr="[totaldata]"+fclassid+","+fdotype+","+flimittime+"[/totaldata]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="eloop">
    <tr> 
      <td height="25" colspan="2" class="header">totaldata标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select12" onchange="var addurl='';if(this.options[this.selectedIndex].value==0){addurl='&doobject=2';}else if(this.options[this.selectedIndex].value==1){addurl='&doobject=3';}else if(this.options[this.selectedIndex].value==2){addurl='&doobject=4';}self.location.href='MakeBq.php?bqname=<?=$bqname?>&addselfinfo=1&mydotype='+this.options[this.selectedIndex].value+addurl;">
                <option value="0"<?=$mydotype==0?' selected':''?>>统计栏目数据</option>
                <option value="1"<?=$mydotype==1?' selected':''?>>统计专题</option>
                <option value="2"<?=$mydotype==2?' selected':''?>>统计数据表</option>
              </select></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">时间范围：</td>
            <td width="76%"><select name="limittime" id="select13">
                <option value="0">不限</option>
                <option value="1">今日</option>
                <option value="2">本月</option>
                <option value="3">本年</option>
              </select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit3" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><a href="EnewsBq.php#totaldata" target="_blank" title="查看详细标签语法">[totaldata]栏目ID,操作类型,时间范围[/totaldata]</a></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit22" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='otherlink')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var fshowclass=obj.showclass.value;
	var fdotype=obj.dotype.value;
	var ftempid=obj.tempid.value;
	var fispic=obj.ispic.value;
	bqstr="[otherlink]"+ftempid+","+fclassid+","+fline+","+ftitlelen+","+fshowclass+","+fdotype+","+fispic+"[/otherlink]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">otherlink标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="dotype" onchange="var addurl='';if(this.options[this.selectedIndex].value==0){addurl='&defchangeobject=1';}else if(this.options[this.selectedIndex].value==1){addurl='&doobject=4';}else if(this.options[this.selectedIndex].value==2){addurl='&doobject=2';}else if(this.options[this.selectedIndex].value==3){addurl='&doobject=3';}self.location.href='MakeBq.php?bqname=<?=$bqname?>&addselfinfo=1&mydotype='+this.options[this.selectedIndex].value+addurl;">
                <option value="0"<?=$mydotype==0?' selected':''?>>默认</option>
                <option value="1"<?=$mydotype==1?' selected':''?>>按数据表</option>
                <option value="2"<?=$mydotype==2?' selected':''?>>按栏目</option>
                <option value="3"<?=$mydotype==3?' selected':''?>>按专题</option>
              </select></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select3">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit6222323" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen2" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目名：</td>
            <td width="76%"><select name="showclass" id="showclass">
                <option value="0">否</option>
                <option value="1">是</option>
              </select> <font color="#666666">(标签模板要加[!--class.name--])</font> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">只调用有标题图片的信息： 
        <select name="ispic" id="ispic">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#otherlink" target="_blank" title="查看详细标签语法">[otherlink]标签模板ID,操作对象,调用条数,标题截取字数,是否显示栏目名,操作类型,只显示标题图片的信息[/otherlink]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='eshowphoto')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var ftempid=obj.tempid.value;
	var fpicwidth=obj.picwidth.value;
	var fpicheight=obj.picheight.value;
	bqstr="[eshowphoto]"+ftempid+","+fpicwidth+","+fpicheight+"[/eshowphoto]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="eshowphoto">
    <tr> 
      <td height="25" colspan="2" class="header">eshowphoto标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="tempid">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit62223233" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">导航图片大小：</td>
            <td width="76%">宽
<input name="picwidth" type="text" id="picwidth" value="170" size="6">
              ×高 
              <input name="picheight" type="text" id="picheight" value="120" size="6"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#eshowphoto" target="_blank" title="查看详细标签语法">[eshowphoto]标签模板ID,导航图片宽度,导航图片高度[/eshowphoto]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='showsearch')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var fclassid=obj.classid.value;
	var fdotype=obj.dotype.value;
	var flnum=obj.lnum.value;
	var fline=obj.line.value;
	bqstr="[showsearch]"+fline+","+flnum+","+fclassid+","+fdotype+"[/showsearch]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="showsearch">
    <tr> 
      <td height="25" colspan="2" class="header">showsearch标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="dotype">
                <option value="0">搜索热门排行</option>
                <option value="1">最新搜索排行</option>
              </select></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用总数量：</td>
            <td width="76%"><input name="lnum" type="text" id="lnum" value="8"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="4"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit3" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><a href="EnewsBq.php#showsearch" target="_blank" title="查看详细标签语法">[showsearch]每行显示条数,总条数,栏目id,操作类型[/showsearch]</a></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit22" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomenewstext')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var ftbcolor=obj.tbcolor.value;
	var fshowclass=obj.showclass.value;
	var fdotype=obj.dotype.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="[phomenewstext]"+fclassid+","+fline+",'"+ftbcolor+"',"+fdotype+","+fshowclass+addstr+"[/phomenewstext]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="phomenewstext">
    <tr> 
      <td height="25" colspan="2" class="header">phomenews标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目名：</td>
            <td width="76%"><select name="showclass" id="select2">
                <option value="0">否</option>
                <option value="1">是</option>
              </select> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">表格颜色：</td>
            <td width="76%"><input name="tbcolor" type="text" id="tbcolor" value="#cccccc"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql2"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby2"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomenewstext" target="_blank" title="查看详细标签语法">[phomenewstext]栏目ID/专题ID,显示条数,'表格颜色',操作类型,是否显示栏目名,附加SQL条件,显示排序[/phomenewstext]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='tagsinfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=ReturnAddYh(obj.classid.value);
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var ftids=ReturnAddYh(obj.tids.value);
	var ftempid=obj.tempid.value;
	var fmids=ReturnAddYh(obj.mids.value);
	bqstr="[tagsinfo]"+ftids+","+fline+","+ftitlelen+","+ftempid+","+fclassid+","+fmids+"[/tagsinfo]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="tagsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">tagsinfo标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">TAGS的ID：</td>
            <td width="76%"><input name="tids" type="text" id="tids"> <input type="button" name="Submit4" value="查看TAGS" onclick="window.open('../tags/ListTags.php');">
              <font color="#666666">(多个ID用,号隔开)</font></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="tempid">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit62223234" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table> </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line3" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制栏目ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0">
              <font color="#666666">
              <input type="button" name="Submit42" value="查看栏目ID" onclick="window.open('../ListClass.php');">
              (0为不限，多个ID用,号隔开)</font> </td>
          </tr>
        </table> </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen2" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制系统模型ID：</td>
            <td width="76%"><input name="mids" type="text" id="mids" value="0">
              <font color="#666666"> (0为不限，多个ID用,号隔开)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#tagsinfo" target="_blank" title="查看详细标签语法">[tagsinfo]TAGS的ID,显示条数,标题截取数,标签模板ID,栏目ID,系统模型ID[/tagsinfo]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='spinfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fline=obj.line.value;
	var ftitlelen=obj.titlelen.value;
	var fvname=obj.vname.value;
	bqstr="[spinfo]'"+fvname+"',"+fline+","+ftitlelen+"[/spinfo]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="spinfo">
    <tr> 
      <td height="25" colspan="2" class="header">spinfo标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">碎片变量名：</td>
            <td width="76%"><input name="vname" type="text" id="vname">
              <input type="button" name="Submit43" value="查看碎片" onclick="window.open('../sp/ListSp.php');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="10"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen2" value="32"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp; </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#spinfo" target="_blank" title="查看详细标签语法">[spinfo]碎片变量名,显示条数,标题截取数[/spinfo]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='showtags')
{
	$tagsclass='';
	$tcsql=$empire->query("select classid,classname from {$dbtbpre}enewstagsclass order by classid");
	while($tcr=$empire->fetch($tcsql))
	{
		$tagsclass.='<option value="'.$tcr[classid].'">'.$tcr[classname].'</option>';
	}
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var tfont='';
	var dh='';
	var fclassid=obj.tagsclassid.value;
	var flnum=obj.lnum.value;
	var fline=obj.line.value;
	var forderby=obj.orderby.value;
	var fisgood=obj.isgood.value;
	var fjg=obj.jg.value;
	var fshownum=obj.shownum.value;
	var faddcs=obj.addcs.value;
	//属性
	if(obj.tfontb.checked==true)
	{
		tfont+='s';
		dh=',';
	}
	if(obj.tfontr.checked==true)
	{
		tfont+=dh+'r';
	}
	bqstr="[showtags]"+fclassid+","+flnum+","+fline+",'"+forderby+"',"+fisgood+",'"+tfont+"','"+fjg+"',"+fshownum+",'"+faddcs+"'[/showtags]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="showtags">
    <tr> 
      <td height="25" colspan="2" class="header">showtags标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">选择TAGS分类：</td>
            <td width="76%"><select name="tagsclassid" id="tagsclassid">
                <option value="0">不限</option>
                <option value="'selfinfo'">调用当前信息TAGS</option>
                <?=$tagsclass?>
              </select> </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用总数量：</td>
            <td width="76%"><input name="lnum" type="text" id="lnum" value="10"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示数量：</td>
            <td width="76%"><input name="line" type="text" id="titlelen2" value="0">
              <font color="#666666">(0为不换行) </font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby"> <select name="selectorderby" id="select" onchange="document.bqform.orderby.value=document.bqform.selectorderby.value">
                <option value="">默认排序</option>
                <option value="tagid desc">按TAGSID降序</option>
                <option value="num desc">按信息数降序</option>
              </select>
              <font color="#666666">(调用当前TAGS本设置无效)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">只显示推荐的：</td>
            <td width="76%"><select name="isgood" id="select14">
                <option value="0">不限</option>
                <option value="1">是</option>
              </select>
              <font color="#666666">(调用当前TAGS本设置无效)</font> </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">推荐TAGS属性：</td>
            <td width="76%"><input name="tfontb" type="checkbox" id="tfontb" value="1">
              加粗 <input name="tfontr" type="checkbox" id="tfontr" value="1">
              加红<font color="#666666">(调用当前TAGS本设置无效)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示间隔符：</td>
            <td width="76%"><input name="jg" type="text" id="line2" value="&amp;nbsp;"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示信息数量：</td>
            <td width="76%"><select name="shownum" id="select16">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select>
              <font color="#666666">(调用当前TAGS本设置无效)</font></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">链接附加参数：</td>
            <td width="76%"><input name="addcs" type="text" id="line4">
              <font color="#666666">(比如：&amp;tempid=模板ID) </font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#showtags" target="_blank" title="查看详细标签语法">[showtags]分类ID,显示数量,每行显示数量,显示排序,只显示推荐,推荐TAGS属性,显示间隔符,是否显示信息数,链接附加参数[/showtags]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='showclasstemp')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fshownum=obj.shownum.value;
	var ftempid=obj.tempid.value;
	var fclassnum=obj.classnum.value;
	bqstr="[showclasstemp]"+fclassid+","+ftempid+","+fshownum+","+fclassnum+"[/showclasstemp]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">showclasstemp标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select15">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit62223235" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目信息数：</td>
            <td width="76%"><select name="shownum" id="select17">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select>
              <font color="#666666">(标签模板加[!--num--])</font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制显示栏目数：</td>
            <td width="76%"><input name="classnum" type="text" id="titlelen5" value="0">
              <font color="#666666">(0为不限制)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#showclasstemp" target="_blank" title="查看详细标签语法">[showclasstemp]父栏目ID,标签模板ID,是否显示栏目信息数,显示栏目数[/showclasstemp]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomeshowclass')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fshownum=obj.shownum.value;
	bqstr="[phomeshowclass]"+fshownum+"[/phomeshowclass]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomeshowclass标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目信息数：</td>
            <td width="76%"><select name="shownum" id="select17">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select>
            </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomeshowclass" target="_blank" title="查看详细标签语法">[phomeshowclass]是否显示栏目记录数[/phomeshowclass]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='eshowzt')
{
	//分类
	$zcstr='';
	$zcsql=$empire->query("select classid,classname from {$dbtbpre}enewsztclass order by classid");
	while($zcr=$empire->fetch($zcsql))
	{
		$zcstr.="<option value='".$zcr[classid]."'>".$zcr[classname]."</option>";
	}
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=ReturnAddYh(obj.classid.value);
	var fzcid=obj.zcid.value;
	var ftempid=obj.tempid.value;
	var fclassnum=obj.classnum.value;
	bqstr="[eshowzt]"+ftempid+","+fzcid+","+fclassnum+","+fclassid+"[/eshowzt]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">eshowzt标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select20">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit622232353" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制专题分类：</td>
            <td width="76%"><select name="zcid" id="select19">
                <option value="0">不限</option>
				<?=$zcstr?>
              </select> <input type="button" name="Submit622232352" value="管理专题分类" onclick="window.open('../ListZtClass.php');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制显示专题数：</td>
            <td width="76%"><input name="classnum" type="text" id="classnum" value="0"> 
              <font color="#666666">(0为不限制)</font> </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制所属栏目ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0"> 
              <font color="#666666"> 
              <input type="button" name="Submit422" value="查看栏目ID" onclick="window.open('../ListClass.php');">
              (0为不限，多个ID用,号隔开)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#eshowzt" target="_blank" title="查看详细标签语法">[eshowzt]标签模板ID,专题类别ID,显示专题数,所属栏目ID[/eshowzt]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='listshowclass')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fshownum=obj.shownum.value;
	var ftempid=obj.tempid.value;
	var fclassnum=obj.classnum.value;
	bqstr="[listshowclass]"+fclassid+","+ftempid+","+fshownum+","+fclassnum+"[/listshowclass]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">listshowclass标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select15">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit62223235" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目信息数：</td>
            <td width="76%"><select name="shownum" id="select17">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select>
              <font color="#666666">(标签模板加[!--num--])</font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制显示栏目数：</td>
            <td width="76%"><input name="classnum" type="text" id="titlelen5" value="0">
              <font color="#666666">(0为不限制)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#listshowclass" target="_blank" title="查看详细标签语法">[listshowclass]父栏目ID,标签模板ID,是否显示栏目信息数,显示栏目数[/listshowclass]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomeshowmap')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fsclassnum=obj.sclassnum.value;
	var fbtbcolor=obj.btbcolor.value;
	var fstbcolor=obj.stbcolor.value;
	var fshownum=obj.shownum.value;
	bqstr="[phomeshowmap]"+fclassid+","+fsclassnum+",'"+fbtbcolor+"','"+fstbcolor+"',"+fshownum+"[/phomeshowmap]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomeshowmap标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示子栏目数：</td>
            <td width="76%"><input name="sclassnum" type="text" id="sclassnum" value="6"> 
              <font color="#666666">(0为不限制)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">大栏目单元格颜色：</td>
            <td width="76%"><input name="btbcolor" type="text" id="btbcolor" value="#cccccc"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">子栏目表格颜色：</td>
            <td width="76%"><input name="stbcolor" type="text" id="stbcolor" value="#ffffff"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示栏目信息数：</td>
            <td width="76%"><select name="shownum" id="select17">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select>
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomeshowmap" target="_blank" title="查看详细标签语法">[phomeshowmap]栏目ID,子栏目每行显示记录数,'大栏目颜色','子栏目颜色',是否显示栏目记录数[/phomeshowmap]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomead')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	bqstr="[phomead]"+fclassid+"[/phomead]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomead标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">广告ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0">
              <input type="button" name="Submit622232354" value="查看广告ID" onclick="window.open('../tool/ListAd.php');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomead" target="_blank" title="查看详细标签语法">[phomead]广告ID[/phomead]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomevote')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	bqstr="[phomevote]"+fclassid+"[/phomevote]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomevote标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">投票ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0">
              <input type="button" name="Submit622232354" value="查看投票ID" onclick="window.open('../tool/ListVote.php');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomevote" target="_blank" title="查看详细标签语法">[phomevote]投票ID[/phomevote]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomelink')
{
	//类别
	$cstr='';
	$csql=$empire->query("select classid,classname from {$dbtbpre}enewslinkclass order by classid");
	while($cr=$empire->fetch($csql))
	{
		$cstr.="<option value='".$cr[classid]."'>".$cr[classname]."</option>";
	}
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fline=obj.line.value;
	var flnum=obj.lnum.value;
	var fcid=obj.cid.value;
	var fdotype=obj.dotype.value;
	var fshowlink=obj.showlink.value;
	bqstr="[phomelink]"+fline+","+flnum+","+fdotype+","+fcid+","+fshowlink+"[/phomelink]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">phomelink标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select20">
                <option value="0">所有链接</option>
                <option value="1">只调用图片链接</option>
                <option value="2">只调用文字链接</option>
              </select> </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制分类：</td>
            <td width="76%"><select name="cid" id="select19">
                <option value="0">不限</option>
                <?=$cstr?>
              </select> <input type="button" name="Submit622232352" value="管理友情链接分类" onclick="window.open('../tool/LinkClass.php');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用总数量：</td>
            <td width="76%"><input name="lnum" type="text" id="lnum" value="12"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示数量：</td>
            <td width="76%"><input name="line" type="text" id="line5" value="6">
            </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示原链接：</td>
            <td width="76%"><select name="showlink" id="select18">
                <option value="0">统计点击链接</option>
                <option value="1">显示原链接</option>
              </select> </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomelink" target="_blank" title="查看详细标签语法">[phomelink]每行显示数,显示总数,操作类型,分类id,是否显示原链接[/phomelink]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='gbookinfo')
{
	//分类
	$cstr='';
	$csql=$empire->query("select bid,bname from {$dbtbpre}enewsgbookclass order by bid");
	while($cr=$empire->fetch($csql))
	{
		$cstr.="<option value='".$cr[bid]."'>".$cr[bname]."</option>";
	}
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fline=obj.line.value;
	var fcid=obj.cid.value;
	var ftempid=obj.tempid.value;
	bqstr="[gbookinfo]"+fline+","+ftempid+","+fcid+"[/gbookinfo]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">gbookinfo标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select20">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit622232353" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制留言分类：</td>
            <td width="76%"><select name="cid" id="select19">
                <option value="0">不限</option>
				<?=$cstr?>
              </select> <input type="button" name="Submit622232352" value="管理留言分类" onclick="window.open('../tool/GbookClass.php');"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="5">
            </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#gbookinfo" target="_blank" title="查看详细标签语法">[gbookinfo]显示信息数,标签模板ID,留言分类ID[/gbookinfo]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='showplinfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fline=obj.line.value;
	var fclassid=obj.classid.value;
	var fid=obj.id.value;
	var ftempid=obj.tempid.value;
	var fisgood=obj.isgood.value;
	var fdotype=obj.dotype.value;
	bqstr="[showplinfo]"+fline+","+ftempid+","+fclassid+","+fid+","+fisgood+","+fdotype+"[/showplinfo]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">showplinfo标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="select22">
                <option value="0">按发布时间排列</option>
                <option value="1">按支持数排列</option>
                <option value="2">按反对数排列</option>
              </select> </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标签模板：</td>
            <td width="76%"><select name="tempid" id="select21">
                <?=$bqtemp?>
              </select> <input type="button" name="Submit6222323532" value="管理标签模板" onclick="window.open('ListBqtemp.php?gid=<?=$thegid?>');"></td>
          </tr>
        </table> </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="10"> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制栏目ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0">
              [<a href="#empirecms" onclick="document.bqform.classid.value='$GLOBALS[navclassid]';">当前栏目ID</a>] 
              <font color="#666666"> 
              <input type="button" name="Submit4222" value="查看栏目ID" onclick="window.open('../ListClass.php');">
              (0为不限)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制信息ID：</td>
            <td width="76%"><input name="id" type="text" id="id" value="0">
              [<a href="#empirecms" onclick="document.bqform.id.value='$navinfor[id]';">当前信息ID</a>] <font color="#666666"> (0为不限)</font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">只调用推荐评论：</td>
            <td width="76%"><select name="isgood" id="select23">
                <option value="0">不限</option>
                <option value="1">只调用推荐评论</option>
              </select> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#showplinfo" target="_blank" title="查看详细标签语法">[showplinfo]调用条数,标签模板ID,栏目ID,信息ID,显示推荐评论,操作类型[/showplinfo]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='echocheckbox')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var flfield=obj.lfield.value;
	var fexpstr=obj.expstr.value;
	bqstr="[echocheckbox]'"+flfield+"','"+fexpstr+"'[/echocheckbox]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">echocheckbox标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">复选字段名：</td>
            <td width="76%"><input name="lfield" type="text" id="lfield" value="title">
            </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">分隔符：</td>
            <td width="76%"><input name="expstr" type="text" id="expstr" value="&lt;br&gt;"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#echocheckbox" target="_blank" title="查看详细标签语法">[echocheckbox]'字段','分隔符'[/echocheckbox]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='includefile')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var flfile=obj.lfile.value;
	bqstr="[includefile]'"+flfile+"'[/includefile]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">includefile标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">引用文件地址：</td>
            <td width="76%"><input name="lfile" type="text" id="lfile" value="../../header.html">
              <font color="#666666">(相对于后台目录)</font> </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#includefile" target="_blank" title="查看详细标签语法">[includefile]'文件地址'[/includefile]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='readhttp')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var flfile=obj.lfile.value;
	bqstr="[readhttp]'"+flfile+"'[/readhttp]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ecmsinfo">
    <tr> 
      <td height="25" colspan="2" class="header">readhttp标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">读取网页地址：</td>
            <td width="76%"><input name="lfile" type="text" id="lfile" value="http://">
            </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#readhttp" target="_blank" title="查看详细标签语法">[readhttp]'页面地址'[/readhttp]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomepic')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fshowtitle=obj.showtitle.value;
	var fshowsmalltext=obj.showsmalltext.value;
	bqstr="[phomepic]"+fclassid+","+fshowtitle+","+fshowsmalltext+"[/phomepic]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="phomepic">
    <tr> 
      <td height="25" colspan="2" class="header">phomepic标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片信息ID：</td>
            <td width="76%"><input name="classid" type="text" id="classid" value="0">
              <input type="button" name="Submit6222323522" value="查看图片信息ID" onclick="window.open('../NewsSys/ListPicNews.php');"> 
            </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示标题：</td>
            <td width="76%"><select name="showtitle" id="select24">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select> </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示简介：</td>
            <td width="76%"><select name="showsmalltext" id="select26">
                <option value="0">不显示</option>
                <option value="1">显示</option>
              </select> </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomepic" target="_blank" title="查看详细标签语法">[phomepic]图片信息ID,是否显示标题,是否显示简介[/phomepic]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='phomemorepic')
{
	//分类
	$cstr='';
	$csql=$empire->query("select classid,classname from {$dbtbpre}enewspicclass order by classid");
	while($cr=$empire->fetch($csql))
	{
		$cstr.="<option value=".$cr[classid].">".$cr[classname]."</option>";
	}
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var flnum=obj.lnum.value;
	var ftitlelen=obj.titlelen.value;
	var fshowtitle=obj.showtitle.value;
	var fshowlink=obj.showlink.value;
	var fpicwidth=obj.picwidth.value;
	var fpicheight=obj.picheight.value;
	bqstr="[[phomemorepic]"+fclassid+","+fline+","+flnum+","+fpicwidth+","+fpicheight+","+fshowtitle+","+ftitlelen+","+fshowlink+"[/phomemorepic]";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="phomemorepic">
    <tr> 
      <td height="25" colspan="2" class="header">phomenewspic标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数</td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片信息分类：</td>
            <td width="76%"><select name="classid" id="select25">
                <?=$cstr?>
              </select> 
              <input type="button" name="Submit6222323523" value="管理图片信息分类" onclick="window.open('../NewsSys/PicClass.php');"></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用总数量：</td>
            <td width="76%"><input name="lnum" type="text" id="lnum" value="8"></td>
          </tr>
        </table> </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">每行显示数量：</td>
            <td width="76%"><input name="line" type="text" id="line6" value="4"> 
            </td>
          </tr>
        </table> </td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">图片大小：</td>
            <td width="76%">宽 
              <input name="picwidth" type="text" id="picwidth" value="170" size="6">
              ×高 
              <input name="picheight" type="text" id="picheight" value="120" size="6"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">是否显示标题：</td>
            <td width="76%"><select name="showtitle" id="select27">
                <option value="0">否</option>
                <option value="1">是</option>
              </select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">标题截取字数：</td>
            <td width="76%"><input name="titlelen" type="text" id="titlelen6" value="26"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示原链接：</td>
            <td width="76%"><select name="showlink" id="select28">
                <option value="0">是</option>
                <option value="1">否</option>
              </select> </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#phomemorepic" target="_blank" title="查看详细标签语法">[phomemorepic]图片信息类别ID,每行显示条数,调用总条数,图片宽度,图片高度,是否显示标题,标题截取数,是否显示原链接[/phomemorepic]</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='ShowMemberInfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var flfield=obj.lfield.value;
	var fmuserid=obj.muserid.value;
	bqstr="<?="<?php\\r\\n\$userr=sys_ShowMemberInfo(\"+fmuserid+\",'\"+flfield+\"');\\r\\n?>"?>\r\n";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ShowMemberInfo">
    <tr> 
      <td height="25" colspan="2" class="header">ShowMemberInfo函数调用生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">会员帐号ID：</td>
            <td width="76%"><input name="muserid" type="text" id="muserid" value="0">
              <input type="button" name="Submit62223235222" value="查看会员ID" onclick="window.open('../member/ListMember.php');">
              <font color="#666666">(0为发布者ID)</font></td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">查询字段：</td>
            <td width="76%"> 
              <input name="lfield" type="text" id="lfield">
              <font color="#666666">(空为查询所有会员字段)</font> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#ShowMemberInfo" target="_blank" title="查看详细标签语法">sys_ShowMemberInfo(用户ID,查询字段)</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="5" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='ListMemberInfo')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var tfont='';
	var dh='';
	var fdotype=obj.dotype.value;
	var fline=obj.line.value;
	var fmgroupid=obj.mgroupid.value;
	var fmuserid=obj.muserid.value;
	var flfield=obj.lfield.value;
	bqstr="<?="<?php\\r\\n\$usersql=sys_ListMemberInfo(\"+fline+\",\"+fdotype+\",'\"+fmgroupid+\"','\"+fmuserid+\"','\"+flfield+\"');\\r\\nwhile(\$userr=\$empire->fetch(\$usersql))\\r\\n{\\r\\n?>\\r\\n<a href=\\\"/e/space/?userid=<?=\$userr[userid]?>\\\"><?=\$userr[username]?></a><br>\\r\\n<?php\\r\\n}\\r\\n?>"?>";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ListMemberInfo">
    <tr> 
      <td height="25" colspan="2" class="header">ListMemberInfo调用函数生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">标签基本参数 </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">操作类型：</td>
            <td width="76%"><select name="dotype" id="dotype">
                <option value="0">按注册时间排序</option>
                <option value="1">按积分排序排序</option>
                <option value="2">按资金排行排序</option>
                <option value="3">按会员空间人气排行排序</option>
              </select> </td>
          </tr>
        </table></td>
      <td width="50%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line7" value="10"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">限制会员组ID：</td>
            <td width="76%"><input name="mgroupid" type="text" id="mgroupid">
              <input type="button" name="Submit622232352222" value="查看会员组ID" onclick="window.open('../member/ListMemberGroup.php');"> 
              <font color="#666666">(不设置为不限，多个会员组用逗号隔开，如：'1,2') </font></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">会员帐号ID：</td>
            <td width="76%"><input name="muserid" type="text" id="muserid"> 
              <input type="button" name="Submit622232352223" value="查看会员ID" onclick="window.open('../member/ListMember.php');">
              <font color="#666666">(不设置为不限，多个用户ID用逗号隔开，如：'25,27')</font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">查询字段：</td>
            <td width="76%"> <input name="lfield" type="text" id="lfield3"> <font color="#666666">(空为查询所有会员字段)</font> 
            </td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><font color="#333333"><a href="EnewsBq.php#ListMemberInfo" target="_blank" title="查看详细标签语法">sys_ListMemberInfo(调用条数,操作类型,会员组ID,用户ID,查询字段)</a></font></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="12" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit2" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
elseif($bqname=='spaceeloop')
{
?>
<script>
//返回标签
function ShowBqFun(){
	var obj=document.bqform;
	var bqstr;
	var addstr='';
	var fclassid=obj.classid.value;
	var fline=obj.line.value;
	var fdotype=obj.dotype.value;
	var fispic=obj.ispic.value;
	var faddsql=obj.addsql.value;
	var forderby=obj.orderby.value;
	addstr=ReturnAddSql(faddsql,forderby);
	bqstr="<?="<?php\\r\\n\$spacesql=espace_eloop(\"+fclassid+\",\"+fline+\",\"+fdotype+\",\"+fispic+addstr+\");\\r\\nwhile(\$spacer=\$empire->fetch(\$spacesql))\\r\\n{\\r\\n        \$spacesr=espace_eloop_sp(\$spacer);\\r\\n?>\\r\\n<a href=\\\"<?=\$spacesr[titleurl]?>\\\" target=\\\"_blank\\\"><?=\$spacer[title]?></a> <br>\\r\\n<?php\\r\\n}\\r\\n?>"?>";
	obj.bqshow.value=bqstr;
}
</script>
<form action="MakeBq.php" method="GET" name="bqform" id="bqform">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="spaceeloop">
    <tr> 
      <td height="25" colspan="2" class="header">spaceeloop会员空间灵动标签生成 
        <input name="bqname" type="hidden" id="bqname" value="<?=$bqname?>"></td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选择调用对象： 
        <select name="doobject" id="doobject" onchange="self.location.href='MakeBq.php?bqname=<?=$bqname?>&addselfinfo=1&doobject='+this.options[this.selectedIndex].value">
          <option value="1"<?=$doobject==1?' selected':''?>>按默认表( 
          <?=$public_r['tbname']?>
          )</option>
          <option value="2"<?=$doobject==2?' selected':''?>>栏目</option>
          <option value="3"<?=$doobject==3?' selected':''?>>专题</option>
          <option value="4"<?=$doobject==4?' selected':''?>>数据表</option>
          <option value="5"<?=$doobject==5?' selected':''?>>标题分类</option>
          <option value="6"<?=$doobject==6?' selected':''?>>按SQL调用</option>
        </select> </td>
    </tr>
    <tr> 
      <td width="50%" height="25" bgcolor="#FFFFFF"> 
        <?=$dotype?>
      </td>
      <td width="50%" bgcolor="#FFFFFF"> 
        <?=$changeobject?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">调用数量：</td>
            <td width="76%"><input name="line" type="text" id="line" value="10"></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF">只调用有标题图片的信息： 
        <select name="ispic" id="select6">
          <option value="0">不限</option>
          <option value="1">是</option>
        </select> </td>
    </tr>
    <tr> 
      <td height="25" colspan="2">选项设置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">附加SQL条件：</td>
            <td width="76%"><input name="addsql" type="text" id="addsql"> <select name="addsqlselect" onchange="document.bqform.addsql.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="isgood=1">1级推荐</option>
<option value="firsttitle=1">1级头条</option>
<option value="field='值'">字段等于某值</option>
</select></td>
          </tr>
        </table></td>
      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="24%">显示排序：</td>
            <td width="76%"><input name="orderby" type="text" id="orderby"> <select name="orderbyselect" onchange="document.bqform.orderby.value=this.value">
<option value=""> -- 预选项 -- </option>
<option value="newstime DESC">按发布时间降序排序</option>
<option value="newstime ASC">按发布时间升序排序</option>
<option value="id DESC">按ID降序排序</option>
<option value="onclick DESC">按点击率降序排序</option>
<option value="totaldown DESC">按下载数降序排序</option>
<option value="plnum DESC">按评论数降序排序</option>
<option value="diggtop DESC">按顶数(digg)降序排序</option>
</select></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><input type="button" name="Submit3" value="输出标签" onclick="ShowBqFun();"> 
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2" bgcolor="#FFFFFF"><a href="EnewsBq.php#spaceeloop" target="_blank" title="查看详细标签语法">&lt;?php<br>
        $spacesql=espace_eloop(栏目ID,显示条数,操作类型,只显示有标题图片,附加SQL条件,显示排序);<br>
        while($spacer=$empire-&gt;fetch($spacesql))<br>
        {<br>
        $spacesr=espace_eloop_sp($spacer);<br>
        ?&gt;<br>
        模板代码内容<br>
        &lt;?php<br>
        }<br>
        ?&gt;</a></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><textarea name="bqshow" cols="65" rows="12" id="bqshow" style="width:100%"></textarea></td>
          </tr>
          <tr> 
            <td height="25"><input type="button" name="Submit22" value="复制上面标签内容" onclick="window.clipboardData.setData('Text',document.bqform.bqshow.value);document.bqform.bqshow.select()"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<?php
}
?>
</body>
</html>
<?php
db_close();
$empire=null;
?>
