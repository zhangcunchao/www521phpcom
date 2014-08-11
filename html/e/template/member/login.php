<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>控制面板</a>&nbsp;>&nbsp;会员登陆";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<br>
  <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form1" method="post" action="../../enews/index.php">
    <input type=hidden name=ecmsfrom value="<?=htmlspecialchars($_GET['from'])?>">
    <input type=hidden name=enews value=login>
    <tr class="header"> 
      <td height="25" colspan="2"><div align="center">会员登陆</div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="23%" height="25">用户名：</td>
      <td width="77%" height="25"><input name="username" type="text" id="username" size="30">
	  	<?php
		if($public_r['regacttype']==1)
		{
		?>
        &nbsp;&nbsp;<a href="../register/regsend.php" target="_blank">帐号未激活？</a>
		<?php
		}
		?>
		</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">密码：</td>
      <td height="25"><input name="password" type="password" id="password" size="30">
        &nbsp;&nbsp;<a href="../GetPassword/" target="_blank">忘记密码？</a></td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td height="25">保存时间：</td>
      <td height="25">
	  <input name=lifetime type=radio value=0 checked>
        不保存
	    <input type=radio name=lifetime value=3600>
        一小时 
        <input type=radio name=lifetime value=86400>
        一天 
        <input type=radio name=lifetime value=2592000>
        一个月
<input type=radio name=lifetime value=315360000>
        永久 </td>
    </tr>
    <?php
	if($public_r['loginkey_ok'])
	{
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">验证码：</td>
      <td height="25"><input name="key" type="text" id="key" size="6">
        <img src="../../ShowKey/?v=login"></td>
    </tr>
    <?php
	}	
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value=" 登 陆 ">&nbsp;&nbsp;&nbsp; <input type="button" name="button" value="马上注册" onclick="parent.location.href='../register/';"></td>
    </tr>
	</form>
  </table>
<br>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>