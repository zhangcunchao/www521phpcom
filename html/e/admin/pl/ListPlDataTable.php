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
CheckLevel($logininid,$loginin,$classid,"pltable");
$r=$empire->fetch1("select pldatatbs,pldeftb from {$dbtbpre}enewspublic limit 1");
$tr=explode(',',$r[pldatatbs]);
$url="<a href=ListAllPl.php>管理评论</a>&nbsp;>&nbsp;<a href=ListPlDataTable.php>管理评论分表</a>";
$datatbname=$dbtbpre.'enewspl_data_';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理评论分表</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>位置：<?=$url?></td>
  </tr>
</table>
<form name="adddatatableform" method="post" action="../ecmspl.php" onsubmit="return confirm('确认要增加?');">
  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header">
      <td>增加分表 
        <input name="enews" type="hidden" id="enews" value="AddPlDataTable">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#FFFFFF">
        <?=$datatbname?>
        <input name="datatb" type="text" id="datatb" value="0" size="6">
        <input type="submit" name="Submit" value="增加">
        <font color="#666666">(表名要用数字)</font></td>
    </tr>
  </table>
</form>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="38%" height="25"><div align="center">表名</div></td>
    <td width="33%" height="25"><div align="center">记录数</div></td>
    <td width="29%" height="25"><div align="center">操作</div></td>
  </tr>
  <?
  $count=count($tr)-1;
  $maxtb=0;
  for($i=1;$i<$count;$i++)
  {
  	$total_r=$empire->fetch1("SHOW TABLE STATUS LIKE '".$datatbname.$tr[$i]."';");
	$bgcolor="#ffffff";
	if($tr[$i]==$r['pldeftb'])
	{
		$bgcolor="#DBEAF5";
	}
	if($tr[$i]>$maxtb)
	{
		$maxtb=$tr[$i];
	}
	$dostr="&nbsp;&nbsp;&nbsp;[<a href=\"../ecmspl.php?enews=DelPlDataTable&datatb=".$tr[$i]."\" onclick=\"return confirm('确认要删除，删除会删除表里的所有数据?');\">删除</a>]";
  ?>
  <tr bgcolor="<?=$bgcolor?>"> 
    <td height="25"> 
      <?=$datatbname?><b><?=$tr[$i]?></b>
    </td>
    <td height="25"><div align="center"> 
        <?=$total_r['Rows']?>
      </div></td>
    <td height="25"><div align="center">[<a href="../ecmspl.php?enews=DefPlDataTable&datatb=<?=$tr[$i]?>" onclick="return confirm('确认要将这个表设为当前存放表?');">设为当前存放表</a>]<?=$dostr?></div></td>
  </tr>
  <?
	}
	?>
</table>
<br>
<script>
document.adddatatableform.datatb.value="<?=$maxtb+1?>";
</script>
</body>
</html>
<?
db_close();
$empire=null;
?>
