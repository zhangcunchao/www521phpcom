<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>控制面板</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>管理信息</a>&nbsp;>&nbsp;提交信息&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script>
function CheckChangeClass()
{
	if(document.changeclass.classid.value==0||document.changeclass.classid.value=='')
	{
		alert("请选择栏目");
		return false;
	}
	return true;
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="17%" valign="top"> 
    <?
	//输出可管理的模型
	$modsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($modr=$empire->fetch($modsql))
	{
		$fontb="";
		$fontb1="";
		if($modr['mid']==$mid)
		{
			$fontb="<b>";
			$fontb1="</b>";
		}
	?>
      <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">
            <?=$modr[qmname]?>管理</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeClass.php?mid=<?=$modr[mid]?>"><?=$fontb?>增加<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ListInfo.php?mid=<?=$modr[mid]?>"><?=$fontb?>管理<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
      </table>
      <br> 
      <?
	  }
	  ?>
    </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="82%" valign="top">
      <table width="500" border="0" align="center">
        <tr> 
          <td>你好，<b><?=$musername?></b></td>
        </tr>
      </table>
      <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <form action="AddInfo.php" method="get" name="changeclass" id="changeclass" onsubmit="return CheckChangeClass();">
          <tr class="header"> 
            <td height="23"><strong>请选择要提交信息的栏目 
              <input name="mid" type="hidden" id="mid" value="<?=$mid?>">
              <input name="enews" type="hidden" id="enews" value="MAddInfo">
              </strong></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="32"> <select name=classid size="22" style="width:300px">
                <script src="<?=$classjs?>"></script>
              </select> </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td><input type="submit" name="Submit" value="添加信息"> <font color="#666666">(请选择终极栏目[蓝色条])</font></td>
          </tr>
        </form>
      </table>
      </td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>