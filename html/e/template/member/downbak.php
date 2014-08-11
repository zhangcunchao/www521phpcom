<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>控制面板</a>&nbsp;>&nbsp;我的下载记录";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">消费记录</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../buybak">点卡充值记录</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../downbak">下载消费记录</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td width="55%" height="25"><div align="center">标题</div></td>
            <td width="16%" height="25"><div align="center">扣除点数</div></td>
            <td width="29%" height="25"><div align="center">时间</div></td>
          </tr>
	<?php
	while($r=$empire->fetch($sql))
	{
		if(empty($class_r[$r[classid]][tbname]))
		{continue;}
		$nr=$empire->fetch1("select title,titleurl,groupid,filename,newspath,classid from {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." where id='$r[id]'");
		//标题链接
		$titlelink=sys_ReturnBqTitleLink($nr);
		if($r['online']==0)
		{
			$type='下载';
		}
		elseif($r['online']==1)
		{
			$type='观看';
		}
		elseif($r['online']==2)
		{
			$type='查看';
		}
		elseif($r['online']==3)
		{
			$type='发布';
		}
	?>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">[
              <?=$type?>
              ] &nbsp;<a href='<?=$titlelink?>' target='_blank'> 
              <?=$r[title]?>
              </a> </td>
            <td height="25"><div align="center"> 
                <?=$r[cardfen]?>
              </div></td>
            <td height="25"><div align="center"> 
                <?=date("Y-m-d H:i:s",$r[truetime])?>
              </div></td>
          </tr>
          <?
	}
	?>
          <tr bgcolor="#FFFFFF"> 
            <td height="25" colspan="3"> 
              <?=$returnpage?>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>