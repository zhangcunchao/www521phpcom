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
//验证权限
CheckLevel($logininid,$loginin,$classid,"infotype");

//增加分类
function AddInfoType($add,$userid,$username){
	global $empire,$dbtbpre;
	$tid=(int)$add['tid'];
	$tbname=RepPostVar($add['tbname']);
	$mid=(int)$add[mid];
	if(!$tid||!$tbname||!$mid||!$add[tname])
	{
		printerror("EmptyInfoTypeName","history.go(-1)");
    }
	$myorder=(int)$add['myorder'];
	$yhid=(int)$add['yhid'];
	$sql=$empire->query("insert into {$dbtbpre}enewsinfotype(tname,mid,myorder,yhid) values('$add[tname]','$mid','$myorder','$yhid');");
	$typeid=$empire->lastid();
	GetClass();//更新缓存
	if($sql)
	{
		//操作日志
	    insert_dolog("typeid=".$typeid."<br>tname=".$add[tname]);
		printerror("AddInfoTypeSuccess","InfoType.php?tid=$tid&tbname=$tbname&mid=$mid");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//修改分类
function EditInfoType($add,$userid,$username){
	global $empire,$dbtbpre,$emod_r;
	$tid=(int)$add['tid'];
	$tbname=RepPostVar($add['tbname']);
	$mid=(int)$add[mid];
	$typeid=$add['typeid'];
	$tname=$add['tname'];
	$myorder=$add['myorder'];
	$yhid=$add['yhid'];
	$deltypeid=$add['deltypeid'];
	$count=count($typeid);
	if(!$tid||!$tbname||!$mid||!$count)
	{
		printerror("EmptyInfoTypeName","history.go(-1)");
    }
	//删除
	$del=0;
	$ids='';
	$delcount=count($deltypeid);
	if($delcount)
	{
		$dh='';
		for($j=0;$j<$delcount;$j++)
		{
			$ids.=$dh.intval($deltypeid[$j]);
			$dh=',';
		}
		$empire->query("delete from {$dbtbpre}enewsinfotype where typeid in (".$ids.")");
		if($emod_r[$mid][tbname])
		{
			$empire->query("update {$dbtbpre}ecms_".$emod_r[$mid][tbname]." set ttid=0 where ttid in (".$ids.")");
		}
		$del=1;
	}
	//修改
	for($i=0;$i<$count;$i++)
	{
		if(strstr(','.$ids.',',','.$typeid[$i].','))
		{
			continue;
		}
		$empire->query("update {$dbtbpre}enewsinfotype set tname='".$tname[$i]."',myorder='".intval($myorder[$i])."',yhid='".intval($yhid[$i])."' where typeid='".intval($typeid[$i])."'");
	}
	GetClass();//更新缓存
	//操作日志
	insert_dolog("mid=".$mid."&del=$del");
	printerror("EditInfoTypeSuccess","InfoType.php?tid=$tid&tbname=$tbname&mid=$mid");
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="AddInfoType")//增加分类
{
	AddInfoType($_POST,$logininid,$loginin);
}
elseif($enews=="EditInfoType")//修改分类
{
	EditInfoType($_POST,$logininid,$loginin);
}

$tid=(int)$_GET['tid'];
$tbname=RepPostVar($_GET['tbname']);
$mid=(int)$_GET['mid'];
if(!$tid||!$tbname||!$mid)
{
	printerror("ErrorUrl","history.go(-1)");
}
$url="数据表:[".$dbtbpre."ecms_".$tbname."]&nbsp;>&nbsp;<a href=ListM.php?tid=$tid&tbname=$tbname>系统模型管理</a>&nbsp;>&nbsp;<a href=ListM.php?tid=$tid&tbname=$tbname>模型:[".$emod_r[$mid][mname]."]</a>&nbsp;>&nbsp;管理标题分类";
$sql=$empire->query("select typeid,tname,myorder,yhid from {$dbtbpre}enewsinfotype where mid='$mid' order by myorder,typeid");
//优化方案
$yh_options='';
$yhsql=$empire->query("select id,yhname from {$dbtbpre}enewsyh order by id");
while($yhr=$empire->fetch($yhsql))
{
	$yh_options.="<option value='".$yhr[id]."'>".$yhr[yhname]."</option>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>标题分类</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>位置：<?=$url?>
      </td>
  </tr>
</table>
<form name="form1" method="post" action="InfoType.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header">
      <td height="25">增加标题分类: 
        <input name=enews type=hidden id="enews" value=AddInfoType>
        <input name="tid" type="hidden" id="tid" value="<?=$tid?>">
        <input name="tbname" type="hidden" id="tbname" value="<?=$tbname?>">
        <input name="mid" type="hidden" id="mid" value="<?=$mid?>"></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> 分类名称：
<input name="tname" type="text">
        优化方案：
        <select name="yhid" id="yhid">
          <option name="0">不使用</option>
          <?=$yh_options?>
        </select>
        排序： 
        <input name="myorder" type="text" id="myorder" size="6"> 
        <input type="submit" name="Submit" value="增加">
        <input type="reset" name="Submit2" value="重置"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form2" method="post" action="InfoType.php" onsubmit="return confirm('确认要提交?');">
    <input name="tid" type="hidden" id="tid" value="<?=$tid?>">
    <input name="tbname" type="hidden" id="tbname" value="<?=$tbname?>">
    <input name="mid" type="hidden" id="mid" value="<?=$mid?>">
    <tr class="header"> 
      <td width="6%"><div align="center">ID</div></td>
      <td width="7%"><div align="center">排序</div></td>
      <td width="37%" height="25"><div align="center">分类名称</div></td>
      <td width="41%"><div align="center">优化方案</div></td>
      <td width="9%" height="25"><div align="center">删除</div></td>
    </tr>
    <?php
  while($r=$empire->fetch($sql))
  {
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"> 
          <?=$r[typeid]?>
          <input name="typeid[]" type="hidden" id="typeid[]" value="<?=$r[typeid]?>">
        </div></td>
      <td><div align="center"> 
          <input name="myorder[]" type="text" id="myorder[]" value="<?=$r[myorder]?>" size="6">
        </div></td>
      <td height="25"> <div align="center"> 
          <input name="tname[]" type="text" id="tname[]" value="<?=$r[tname]?>">
        </div></td>
      <td><div align="center">
          <select name="yhid[]" id="yhid[]">
            <option name="0">不使用</option>
            <?=str_replace("<option value='".$r[yhid]."'>","<option value='".$r[yhid]."' selected>",$yh_options)?>
          </select>
        </div></td>
      <td height="25"><div align="center"> 
          <input name="deltypeid[]" type="checkbox" id="deltypeid[]" value="<?=$r[typeid]?>">
        </div></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td height="25" colspan="4"><input type="submit" name="Submit5" value="提 交"> 
        &nbsp;&nbsp; <input type="reset" name="Submit6" value="重置"> <input name="enews" type="hidden" id="enews" value="EditInfoType"> 
        &nbsp; <font color="#666666">(排序值越小越前面)</font></td>
    </tr>
  </form>
</table>
</body>
</html>
<?php
db_close();
$empire=null;
?>