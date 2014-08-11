<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

//配置查询自定义字段列表,逗号开头，多个用逗号格开，格式“ui.字段名”
$useraddf=',ui.userpic';

//分页SQL
$query='select u.'.$user_userid.',u.'.$user_username.',u.'.$user_email.',u.'.$user_registertime.',u.'.$user_group.$useraddf.' from '.$user_tablename.' u'.$add." order by u.".$user_userid." desc limit $offset,$line";
$sql=$empire->query($query);

//导航
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;会员列表";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="memberform" method="get" action="index.php">
    <input type="hidden" name="sear" value="1">
    <input type="hidden" name="groupid" value="<?=$groupid?>">
    <tr class="header"> 
      <td width="10%"><div align="center">ID</div></td>
      <td width="38%" height="25"><div align="center">用户名</div></td>
      <td width="30%" height="25"><div align="center">注册时间</div></td>
      <td width="22%" height="25"><div align="center"></div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		//注册时间
		$registertime=$user_register?date("Y-m-d H:i:s",$r[$user_registertime]):$r[$user_registertime];
		//用户组
		$groupname=$level_r[$r[$user_group]]['groupname'];
		//用户头像
		$userpic=$r['userpic']?$r['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"> 
          <?=$r[$user_userid]?>
        </div></td>
      <td height="25"> <a href='<?=$public_r[newsurl]?>e/space/?userid=<?=$r[$user_userid]?>' target='_blank'> 
        <?=$r[$user_username]?>
        </a> </td>
      <td height="25"><div align="center"> 
          <?=$registertime?>
        </div></td>
      <td height="25"><div align="center"> [<a href="<?=$public_r[newsurl]?>e/member/ShowInfo/?userid=<?=$r[$user_userid]?>" target="_blank">会员资料</a>] 
          [<a href="<?=$public_r[newsurl]?>e/space/?userid=<?=$r[$user_userid]?>" target="_blank">会员空间</a>]</div></td>
    </tr>
    <?
  	}
  	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="3"> 
        <?=$returnpage?>
      </td>
      <td height="25"> <div align="center"> 
          <input name="keyboard" type="text" id="keyboard" size="10">
          <input type="submit" name="Submit" value="搜索">
        </div></td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>