<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$temp="<tr><td width='25%' bgcolor='ffffff' align=center><!--list.var1--></td><td width='25%' bgcolor='ffffff' align=center><!--list.var2--></td><td width='25%' bgcolor='ffffff' align=center><!--list.var3--></td><td width='25%' bgcolor='ffffff' align=center><!--list.var4--></td></tr>";
$header="<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#DBEAF5' align='center'>";
$footer="<tr><td colspan='4' align=center>".$returnpage."</td></tr></table>";

$templist="";
$sql=$empire->query($query);
$b=0;
$ti=0;
$tlistvar=$temp;
while($r=$empire->fetch($sql))
{
	$b=1;
	$ti++;
	if(empty($r[stylepic]))
	{
		$r[stylepic]="../../data/images/notemp.gif";
	}
	//当前模板
	if($r['styleid']==$addr[spacestyleid])
	{
		$r[stylename]='<b>'.$r[stylename].'</b>';
	}
	$var="<a title=\"".$r[stylesay]."\"><img src='$r[stylepic]' width=92 height=100 border=0></a><br><span style='line-height=15pt'>".$r[stylename]."</span><br><span style='line-height=15pt'>[<a href='../../enews/?enews=ChangeSpaceStyle&styleid=".$r[styleid]."'>选定</a>]</span>";
	$tlistvar=str_replace("<!--list.var".$ti."-->",$var,$tlistvar);
	if($ti>=4)
	{
		$templist.=$tlistvar;
		$tlistvar=$temp;
		$ti=0;
	}
}
//模板
if($ti!=0&&$ti<4)
{
	$templist.=$tlistvar;
}
$templist=$header.$templist.$footer;

$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>控制面板</a>&nbsp;>&nbsp;选择空间模板";
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
    <td width="84%" valign="top"><?=$templist?></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>