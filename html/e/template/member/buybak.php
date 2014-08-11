<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>控制面板</a>&nbsp;>&nbsp;我的购买记录";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">消费记录</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../buybak/">点卡充值记录</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../downbak/">下载消费记录</a></td>
        </tr>
      </table>
	</td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> 
      <div align="center">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td width="12%"><div align="center">类型</div></td>
            <td width="36%" height="25"><div align="center">充值卡号</div></td>
            <td width="10%" height="25"><div align="center">充值金额</div></td>
            <td width="10%" height="25"><div align="center">购买点数</div></td>
			<td width="10%"><div align="center">有效期</div></td>
            <td width="22%" height="25"><div align="center">购买时间</div></td>
          </tr>
		<?php
		while($r=$empire->fetch($sql))
		{
			//类型
			if($r['type']==0)
			{
				$type='点卡充值';
			}
			elseif($r['type']==1)
			{
				$type='在线充值';
			}
			elseif($r['type']==2)
			{
				$type='充值点数';
			}
			elseif($r['type']==3)
			{
				$type='充值金额';
			}
			else
			{
				$type='';
			}
		?>
          <tr bgcolor="#FFFFFF">
			<td><div align="center">
			<?=$type?>
			</div></td>
            <td height="25"><div align="center"> 
                <?=$r[card_no]?>
              </div></td>
            <td height="25"><div align="center"> 
                <?=$r[money]?>
              </div></td>
            <td height="25"><div align="center"> 
                <?=$r[cardfen]?>
              </div></td>
			<td><div align="center"><?=$r[userdate]?></div></td>
            <td height="25"><div align="center"> 
                <?=$r[buytime]?>
              </div></td>
          </tr>
        <?php
		}
		?>
          <tr bgcolor="#FFFFFF"> 
            <td height="25" colspan="6"> 
              <?=$returnpage?>
            </td>
          </tr>
        </table>
      </div>
	</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>