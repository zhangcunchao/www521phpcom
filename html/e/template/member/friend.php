<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>控制面板</a>&nbsp;>&nbsp;好友列表";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">好友列表</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="FriendClass/">分类管理</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../friend/">好友列表</a></td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="add/?fcid=<?=$cid?>">添加好友</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" action="">
            <tr> 
              <td height="30" bgcolor="#FFFFFF">选择分类: 
                <select name="cid" id="select" onchange=window.location='../friend/?cid='+this.options[this.selectedIndex].value>
                  <option value="0">显示全部</option>
                  <?=$select?>
                </select>
                [<a href="FriendClass/">管理分类</a>] [<a href="add/?fcid=<?=$cid?>">添加好友</a>]</td>
            </tr>
          </form>
        </table>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
          <form name=favaform method=post action="../../enews/index.php" onsubmit="return confirm('确认要操作?');">
            <input type=hidden value=hy name=enews>
            <tr class="header"> 
              <td width="5%"><div align="center"></div></td>
              <td width="30%"><div align="center">用户名</div></td>
              <td width="45%"><div align="center">备注</div></td>
              <td width="20%"><div align="center">操作</div></td>
            </tr>
            <?php
			while($r=$empire->fetch($sql))
			{
			?>
            <tr bgcolor="#FFFFFF"> 
              <td> <div align="center"><img src="../../data/images/man.gif" width="16" height="16" border=0></div></td>
              <td> <div align="center"><a href="../ShowInfo/?username=<?=$r[fname]?>" target=_blank> 
                  <?=$r[fname]?>
                  </a></div></td>
              <td> <div align="center"> 
                  <input name="fsay[]" type="text" id="fsay[]" value="<?=stripSlashes($r[fsay])?>" size="32">
                </div></td>
              <td> <div align="center">[<a href="add/?enews=EditFriend&fid=<?=$r[fid]?>&fcid=<?=$cid?>">修改</a>] 
                  [<a href="../../enews/?enews=DelFriend&fid=<?=$r[fid]?>&fcid=<?=$cid?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
            </tr>
            <?php
			}
			?>
            <tr bgcolor="#FFFFFF"> 
              <td colspan="4"> &nbsp;&nbsp;&nbsp; 
                <?=$returnpage?></td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>