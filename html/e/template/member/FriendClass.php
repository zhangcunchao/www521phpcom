<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>控制面板</a>&nbsp;>&nbsp;<a href=../../friend/>好友列表</a>&nbsp;>&nbsp;管理分类";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script>
function DelFavaClass(cid)
{
var ok;
ok=confirm("确认要删除?");
if(ok)
{
self.location.href='../../../enews/?enews=DelFavaClass&doing=1&cid='+cid;
}
}
</script>
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
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../add/">添加好友</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" action="../../../enews/index.php">
            <tr class="header"> 
              <td>增加好友分类</td>
            </tr>
            <tr> 
              <td bgcolor="#FFFFFF">分类名称: 
                <input name="cname" type="text" id="cname"> <input type="submit" name="Submit" value="增加"> 
                <input name="enews" type="hidden" id="enews" value="AddFavaClass">
                <input name="doing" type="hidden" id="doing" value="1"></td>
            </tr>
          </form>
        </table>
        <br>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td width="10%" height="25"> <div align="center">ID</div></td>
            <td width="56%"><div align="center">分类名称</div></td>
            <td width="34%"><div align="center">操作</div></td>
          </tr>
        <?php
		while($r=$empire->fetch($sql))
		{
		?>
          <form name=form method=post action=../../../enews/index.php>
            <tr bgcolor="#FFFFFF"> 
              <td height="25"> <div align="center"> 
                  <?=$r[cid]?>
                </div></td>
              <td><div align="center">
                  <input name="doing" type="hidden" id="doing" value="1">
                  <input name="enews" type="hidden" id="enews" value="EditFavaClass">
                  <input name="cid" type="hidden" value="<?=$r[cid]?>">
                  <input name="cname" type="text" id="cname" value="<?=$r[cname]?>">
                </div></td>
              <td><div align="center"> 
                  <input type="submit" name="Submit2" value="修改">
                  &nbsp; 
                  <input type="button" name="Submit3" value="删除" onclick="javascript:DelFavaClass(<?=$r[cid]?>);">
                </div></td>
            </tr>
          </form>
		<?php
		}
		?>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>