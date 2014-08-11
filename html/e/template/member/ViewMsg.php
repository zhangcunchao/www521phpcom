<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>控制面板</a>&nbsp;>&nbsp;<a href=../../msg/?out=".$out.">收件箱</a>&nbsp;>&nbsp;查看短信息";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">短信息管理</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../msg/">收件箱</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../msg/?out=1">发件箱</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../AddMsg/?enews=AddMsg">发送信息</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" action="../../../enews/index.php">
            <tr class="header"> 
              <td height="23" colspan="2">
                <?=stripSlashes($r[title])?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td width="19%" height="25">发送者：</td>
              <td width="81%" height="25"><a href="../../ShowInfo/?userid=<?=$r[from_userid]?>"> 
                <?=$r[from_username]?>
                </a></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">发送时间：</td>
              <td height="25">
                <?=$r[msgtime]?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">内容：</td>
              <td height="25"> 
                <?=nl2br(stripSlashes($r[msgtext]))?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">&nbsp;</td>
              <td height="25">[<a href="#ecms" onclick="javascript:history.go(-1);"><strong>返回</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&re=1&mid=<?=$mid?>&out=<?=$out?>"><strong>回复</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&mid=<?=$mid?>&out=<?=$out?>"><strong>转发</strong></a>] 
                [<a href="../../../enews/?enews=DelMsg&mid=<?=$mid?>&out=<?=$out?>" onclick="return confirm('确认要删除?');"><strong>删除</strong></a>]</td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>