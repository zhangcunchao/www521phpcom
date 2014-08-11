<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>控制面板</a>&nbsp;>&nbsp;<a href=../../friend/?cid=".$fcid.">好友列表</a>&nbsp;>&nbsp;".$word;
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">好友列表</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../FriendClass/">分类管理</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../friend/">好友列表</a></td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../add/?fcid=<?=$fcid?>">添加好友</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" action="../../../enews/index.php">
            <tr class="header"> 
              <td height="23" colspan="2"><?=$word?></td>
            </tr>
            <tr> 
              <td width="17%" height="25" bgcolor="#FFFFFF">用户名: </td>
              <td width="83%" bgcolor="#FFFFFF"><input name="fname" type="text" id="fname" value="<?=$fname?>">
                (*)</td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF">所属分类：</td>
              <td bgcolor="#FFFFFF"><select name="cid">
                  <option value="0">不设置</option>
                  <?=$select?>
                </select>
                [<a href="../FriendClass/" target="_blank">管理分类</a>]</td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF">备注：</td>
              <td bgcolor="#FFFFFF"><input name="fsay" type="text" id="fname3" value="<?=stripSlashes($r[fsay])?>" size="38"></td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交">
                <input type="reset" name="Submit2" value="重置">
                <input name="enews" type="hidden" id="enews" value="<?=$enews?>">
                <input name="fid" type="hidden" id="fid" value="<?=$fid?>">
                <input name="fcid" type="hidden" id="fcid" value="<?=$fcid?>">
                <input name="oldfname" type="hidden" id="oldfname" value="<?=$r[fname]?>"></td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>