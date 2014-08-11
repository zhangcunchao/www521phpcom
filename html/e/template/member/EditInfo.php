<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>控制面板</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width='100%' border='0' align='center' cellpadding='3' cellspacing='1' class="tableborder">
  <form name=userinfoform method=post enctype="multipart/form-data" action=../../enews/index.php>
    <input type=hidden name=enews value=EditInfo>
    <tr class="header"> 
      <td height="25" colspan="2"><strong>修改基本资料</strong>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="EditSafeInfo.php">密码安全修改</a></td>
    </tr>
    <tr> 
      <td width='25%' height="25" bgcolor="#FFFFFF"> <div align='left'>用户名 </div></td>
      <td width='75%' height="25" bgcolor="#FFFFFF"> 
        <?=$user[username]?>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="2"> 
        <?php
	@include($formfile);
	?>
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF"> <input type='submit' name='Submit' value='修改信息'>
      </td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>