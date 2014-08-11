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

//修改栏目顺序
function EditZtOrder($ztid,$myorder,$userid,$username){
	global $empire,$dbtbpre;
	for($i=0;$i<count($ztid);$i++)
	{
		$newmyorder=(int)$myorder[$i];
		$ztid[$i]=(int)$ztid[$i];
		$sql=$empire->query("update {$dbtbpre}enewszt set myorder='$newmyorder' where ztid='$ztid[$i]'");
    }
	//操作日志
	insert_dolog("");
	printerror("EditZtOrderSuccess",$_SERVER['HTTP_REFERER']);
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
//修改显示顺序
if($enews=="EditZtOrder")
{
	EditZtOrder($_POST['ztid'],$_POST['myorder'],$logininid,$loginin);
}

$url="<a href=ListZt.php>管理专题</a>";
//类别
$add="";
$zcid=(int)$_GET['zcid'];
if($zcid)
{
	$add=" where zcid=$zcid";
	$search="&zcid=$zcid";
}
$sql=$empire->query("select * from {$dbtbpre}enewszt".$add." order by myorder,ztid desc");
//分类
$zcstr="";
$csql=$empire->query("select classid,classname from {$dbtbpre}enewsztclass order by classid");
while($cr=$empire->fetch($csql))
{
	$select="";
	if($cr[classid]==$zcid)
	{
		$select=" selected";
	}
	$zcstr.="<option value='".$cr[classid]."'".$select.">".$cr[classname]."</option>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>专题</title>
<link href="adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%">位置： 
      <?=$url?>
    </td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit52" value="增加专题" onclick="self.location.href='AddZt.php?enews=AddZt';"> 
		&nbsp;&nbsp;
        <input type="button" name="Submit6" value="数据更新中心" onclick="window.open('ReHtml/ChangeData.php');">
      </div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <form name="form1" method="get" action="ListZt.php">
    <tr> 
      <td height="30">限制显示： 
        <select name="zcid" id="zcid" onchange="document.form1.submit()">
          <option value="0">显示所有分类</option>
          <?=$zcstr?>
        </select>
      </td>
    </tr>
  </form>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="editorder" method="post" action="ListZt.php">
    <tr class="header"> 
      <td width="5%"><div align="center">顺序</div></td>
      <td width="6%" height="25"><div align="center">ID</div></td>
      <td width="22%" height="25"><div align="center">专题名</div></td>
      <td width="14%"><div align="center">专题信息</div></td>
      <td width="9%"><div align="center">访问量</div></td>
      <td width="22%">专题管理</td>
      <td width="22%" height="25">操作</td>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
  if($r[zturl])
  {
  	$ztlink=$r[zturl];
  }
  else
  {
  	$ztlink="../../".$r[ztpath];
  }
  ?>
    <tr bgcolor="ffffff" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td><div align="center"> 
          <input name="myorder[]" type="text" id="myorder[]" value="<?=$r[myorder]?>" size="2">
          <input name="ztid[]" type="hidden" id="ztid[]" value="<?=$r[ztid]?>">
        </div></td>
      <td height="25"><div align="center"> 
          <?=$r[ztid]?>
        </div></td>
      <td height="25"><div align="center"> 
          <a href="<?=$ztlink?>" target="_blank"><?=$r[ztname]?></a>
        </div></td>
      <td><div align="center"><a href="ListAllInfo.php?tbname=<?=$r[tbname]?>&ztid=<?=$r[ztid]?>" target="_blank">查看信息</a></div></td>
      <td><div align="center"> 
          <?=$r[onclick]?>
        </div></td>
      <td><a href="AddZt.php?enews=EditZt&ztid=<?=$r[ztid]?>">修改</a> <a href="AddZt.php?enews=AddZt&ztid=<?=$r[ztid]?>&docopy=1">复制</a> <a href="#ecms" onclick="window.open('TogZt.php?ztid=<?=$r[ztid]?>','','width=660,height=550,scrollbars=yes,top=70,left=100');">组合专题</a> <a href="ecmsclass.php?enews=DelZt&ztid=<?=$r[ztid]?>" onclick="return confirm('确认要删除此专题？');">删除</a></td>
      <td height="25"><a href="ecmschtml.php?enews=ReZtHtml&ztid=<?=$r[ztid]?>">刷新</a> <a href='ecmschtml.php?enews=ReSingleJs&doing=1&classid=<?=$r[ztid]?>'>JS</a> <a href="#ecms" onclick="window.open('view/ZtUrl.php?ztid=<?=$r[ztid]?>','','width=500,height=250');">调用</a></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="ffffff"> 
      <td>&nbsp;</td>
      <td height="25" colspan="6"><input type="submit" name="Submit5" value="修改专题顺序" onClick="document.editorder.enews.value='EditZtOrder';"> 
        <input name="enews" type="hidden" id="enews" value="EditZtOrder"> <font color="#666666">(顺序值越小越前面)</font></td>
    </tr>
  </form>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>
