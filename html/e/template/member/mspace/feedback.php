<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>控制面板</a>&nbsp;>&nbsp;反馈管理";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
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
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
		<form name="feedbackform" method="post" action="index.php" onsubmit="return confirm('确认要删除?');">
		<tr class="header"> 
			<td width="6%" height="23"><div align="center"><input type='checkbox' name='chkall' value='on' onClick='CheckAll(this.form)'></div></td>
			<td width="58%" height="23"><div align="center">标题(点击查看)</div></td>
			<td width="25%" height="23"><div align="center">提交时间</div></td>
			<td width="11%" height="23"><div align="center">删除</div></td>
		</tr>
		<?php
		while($r=$empire->fetch($sql))
		{
			if($r['uid'])
			{
				$r['uname']="<a href='../../space/?userid=$r[uid]' target='_blank'>$r[uname]</a>";
			}
			else
			{
				$r['uname']='游客';
			}
		?>
        <tr bgcolor="#FFFFFF"> 
			<td height="25"><div align="center"> 
			<input name="fid[]" type="checkbox" value="<?=$r[fid]?>">
			</div></td>
			<td height="25"><div align="left">
			<a href="#ecms" onclick="window.open('ShowFeedback.php?fid=<?=$r[fid]?>','','width=650,height=600,scrollbars=yes,top=70,left=100');"><?=$r[title]?></a>&nbsp;(<?=$r['uname']?>)
			</div></td>
			<td height="25"><div align="center"> 
			<?=$r[addtime]?>
			</div></td>
			<td height="25"><div align="center">
			<a href="index.php?enews=DelMemberFeedback&fid=<?=$r[fid]?>" onclick="return confirm('确认要删除?');">删除</a>
			</div></td>
		</tr>
		  <?
		  }
		  ?>
          <tr bgcolor="#FFFFFF"> 
			<td height="25" colspan="4"> 
			<?=$returnpage?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="Submit" value="批量删除">
			<input name="enews" type="hidden" id="enews" value="DelMemberFeedback_All"></td>
			</tr>
		</form>
        </table>
      </td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>