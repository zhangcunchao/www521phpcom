<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require("../../class/com_functions.php");
require "../".LoadLang("pub/fun.php");
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
CheckLevel($logininid,$loginin,$classid,"gbook");
$enews=$_GET['enews'];
if(empty($enews))
{$enews=$_POST['enews'];}
if($enews=="DelGbook")
{
	$lyid=$_GET['lyid'];
	$bid=$_GET['bid'];
	DelGbook($lyid,$bid,$logininid,$loginin);
}
elseif($enews=="ReGbook")
{
	$lyid=$_POST['lyid'];
	$bid=$_POST['bid'];
	$retext=$_POST['retext'];
	ReGbook($lyid,$retext,$bid,$logininid,$loginin);
}
elseif($enews=="DelGbook_all")
{
	$lyid=$_POST['lyid'];
	$bid=$_POST['bid'];
	DelGbook_all($lyid,$bid,$logininid,$loginin);
}
elseif($enews=="CheckGbook_all")
{
	$lyid=$_POST['lyid'];
	$bid=$_POST['bid'];
	CheckGbook_all($lyid,$bid,$logininid,$loginin);
}
else
{}
$page=(int)$_GET['page'];
$start=0;
$line=12;//每页显示条数
$page_line=12;//每页显示链接数
$offset=$page*$line;//总偏移量
$query="select lyid,name,email,`call`,lytime,lytext,retext,bid,ip,checked,userid,username from {$dbtbpre}enewsgbook";
$totalquery="select count(*) as total from {$dbtbpre}enewsgbook";
//选择分类
$bid=(int)$_GET['bid'];
if($bid)
{
	$query.=" where bid='$bid'";
	$totalquery.=" where bid='$bid'";
	$search="&bid=$bid";
}
$num=$empire->gettotal($totalquery);//取得总条数
$query=$query." order by lyid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
$url="<a href=gbook.php>管理留言</a>";
$gbclass=ReturnGbookClass($bid,0);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>留言管理</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
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
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%">位置: 
      <?=$url?>
    </td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit5" value="留言分类管理" onclick="self.location.href='GbookClass.php';">
		&nbsp;&nbsp;
        <input type="button" name="Submit52" value="批量删除留言" onclick="self.location.href='DelMoreGbook.php';">
      </div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td><div align="center">选择留言分类:
        <select name="bid" id="bid" onchange=window.location='gbook.php?bid='+this.options[this.selectedIndex].value>
          <option value="0">显示全部留言</option>
		  <?=$gbclass?>
        </select>
      </div></td>
  </tr>
</table>
<form name=thisform method=post action=gbook.php onsubmit="return confirm('确认要执行操作?');">
<?
while($r=$empire->fetch($sql))
{
$br=$empire->fetch1("select bname from {$dbtbpre}enewsgbookclass where bid='$r[bid]'");
//审核
$checked="";
if($r[checked])
{
$checked=" title='未审核' style='background:#99C4E3'";
}
$username="游客";
if($r['userid'])
{
	$username="<a href='../member/AddMember.php?enews=EditMember&userid=".$r['userid']."' target=_blank>".$r['username']."</a>";
}
?>
  <table width="700" border="0" align="center" cellpadding="3" cellspacing="1" class=tableborder>
    <tr class=header> 
      <td width="55%" height="23">发布者: 
        <?=$r[name]?>
        &nbsp;(<?=$username?>)</td>  
      <td width="45%">发布时间: 
        <?=$r[lytime]?>&nbsp;
        (IP:
        <?=$r[ip]?>) </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="23" colspan="2"> <table border=0 width=100% cellspacing=1 cellpadding=10 bgcolor='#cccccc'>
        <tr> 
          <td width='100%' bgcolor='#FFFFFF' style='word-break:break-all'> 
            <?=nl2br($r[lytext])?>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td><img src="../../data/images/regb.gif" width="18" height="18"><strong><font color="#FF0000">回复:</font></strong> 
            <?=nl2br($r[retext])?>
          </td>
        </tr>
      </table> 
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="23" colspan="2"><div align="right">
        <table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="65%"><strong>邮箱:<?=$r[email]?>,电话:<?=$r[call]?></strong></td>
            <td width="35%"> <div align="left"><strong>操作:</strong>[<a href="#ecms" onclick="window.open('ReGbook.php?lyid=<?=$r[lyid]?>&bid=<?=$bid?>','','width=600,height=380,scrollbars=yes');">回复/修改回复</a>]&nbsp;&nbsp;[<a href="gbook.php?enews=DelGbook&lyid=<?=$r[lyid]?>&bid=<?=$bid?>" onclick="return confirm('确认要删除?');">删除</a>] 
                  <input name="lyid[]" type="checkbox" id="lyid[]" value="<?=$r[lyid]?>"<?=$checked?>>
                </div></td>
          </tr>
        </table>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
          <tr>
            <td><div align="center">所属留言分类:<a href="gbook.php?bid=<?=$r[bid]?>"><?=$br[bname]?></a></div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
<br>
<?
}
?>
  <table width="700" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td>分页:
        <?=$returnpage?>
        &nbsp;&nbsp;
        <input type="submit" name="Submit" value="审核留言" onClick="document.thisform.enews.value='CheckGbook_all';">
        &nbsp;&nbsp; <input type="submit" name="Submit2" value="删除留言" onClick="document.thisform.enews.value='DelGbook_all';">
        <input name="enews" type="hidden" id="enews" value="DelGbook_all">
        <input name="bid" type="hidden" id="bid" value="<?=$bid?>">
        &nbsp;&nbsp;<input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>全选</td>
  </tr>
</table>
</form>
</body>
</html>
<?
db_close();
$empire=null;
?>
