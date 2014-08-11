<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../>首页</a>&nbsp;>&nbsp;<a href=../member/cp/>控制面板</a>&nbsp;>&nbsp;管理信息";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="17%" valign="top"> 
	<?php
	//输出可管理的模型
	$sql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($r=$empire->fetch($sql))
	{
	?>
	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23"><?=$r[qmname]?>管理</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeClass.php?mid=<?=$r[mid]?>">增加<?=$r[qmname]?></a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ListInfo.php?mid=<?=$r[mid]?>">管理<?=$r[qmname]?></a></td>
        </tr>
      </table>
	  <br>
	  <?
	  }
	  ?>
	  </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="82%" valign="top"> 
      <table width="80%" border="0" align="center" class="tableborder">
        <tr class="header">
          <td height="25"><div align="center">欢迎来到信息管理中心</div></td>
        </tr>
        <tr>
          <td height="35" bgcolor="#FFFFFF"> 
            <div align="center">选择左边您要增加或管理的信息。</div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>