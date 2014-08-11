<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>控制面板</a>&nbsp;>&nbsp;设置空间";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%" valign="top">
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">空间设置</td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../space/?userid=<?=$user[userid]?>" target="_blank">预览空间</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="SetSpace.php">设置空间</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeStyle.php">选择模板</a></td>
        </tr>
		<tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="gbook.php">管理留言</a></td>
        </tr>
		<tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="feedback.php">管理反馈</a></td>
        </tr>
      </table>
    </td>
    <td width="1%">&nbsp;</td>
    <td width="84%" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="3" class="tableborder">
        <form name="setspace" method="post" action="../../enews/index.php">
          <tr class="header"> 
            <td height="25" colspan="2">设置空间</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="17%" height="25">空间名称</td>
            <td width="83%"> 
              <input name="spacename" type="text" id="spacename" value="<?=$addr[spacename]?>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>空间公告</td>
            <td> 
              <textarea name="spacegg" cols="60" rows="6" id="spacegg"><?=$addr[spacegg]?></textarea></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">&nbsp;</td>
            <td> 
              <input type="submit" name="Submit" value="提交">
              <input type="reset" name="Submit2" value="重置">
              <input name="enews" type="hidden" id="enews" value="DoSetSpace"></td>
          </tr>
		  </form>
        </table>
	</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>