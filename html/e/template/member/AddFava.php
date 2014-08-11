<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>控制面板</a>&nbsp;>&nbsp;<a href=../../fava/>收藏夹</a>&nbsp;>&nbsp;增加收藏夹";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">收藏夹管理</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../FavaClass/">分类管理</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../fava/">收藏夹管理</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"><br>
        <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="POST" action="../../../enews/index.php">
            <tr class="header"> 
              <td height="25"><div align="center"> 
                  <input name="enews" type="hidden" id="enews3" value="AddFava">
                  增加收藏夹 
                  <input name="from" type="hidden" id="from2" value="<?=$from?>">
                  <input name="classid" type="hidden" id="classid2" value="<?=$classid?>">
                  <input name="id" type="hidden" id="id2" value="<?=$id?>">
                  [<a href="../FavaClass/" target="_blank">增加收藏分类</a>] </div></td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF"><div align="center">收藏页面：<a href='<?=$titleurl?>' target=_blank><?=$r[title]?></a></div></td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF"><div align="center">选择收藏分类: 
                  <select name="cid" id="select">
                    <option value="0">不设置</option>
                    <?=$select?>
                  </select>
                </div></td>
            </tr>
            <tr> 
              <td height="25" bgcolor="#FFFFFF"><div align="center"> 
                  <input type="submit" name="Submit" value="收藏">
                  &nbsp;&nbsp; 
                  <input type="button" name="Submit2" value="返回" onclick="javascript:history.go(-1)">
                </div></td>
            </tr>
          </form>
        </table>
        <br>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>