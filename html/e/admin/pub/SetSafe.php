<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//验证用户
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//验证权限
CheckLevel($logininid,$loginin,$classid,"setsafe");
if($do_openonlinesetting==0||$do_openonlinesetting==1)
{
	echo"没有开启后台在线配置参数，如果要使用在线配置先修改/e/class/config.php文件的$do_openonlinesetting变量设置开启";
	exit();
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews)
{
	include('setfun.php');
}
if($enews=='SetSafe')
{
	SetSafe($_POST,$logininid,$loginin);
}

db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>安全参数配置</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td>位置：<a href="SetSafe.php">安全参数配置</a> 
      <div align="right"> </div></td>
  </tr>
</table>
<form name="setform" method="post" action="SetSafe.php" onsubmit="return confirm('确认设置?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">安全参数配置 
        <input name="enews" type="hidden" id="enews" value="SetSafe"> </td>
    </tr>
    <tr> 
      <td height="25" colspan="2">后台安全相关配置</td>
    </tr>
    <tr> 
      <td width="17%" height="25" bgcolor="#FFFFFF"> <div align="left">后台登陆认证码</div></td>
      <td width="83%" height="25" bgcolor="#FFFFFF"> <input name="loginauth" type="password" id="loginauth" value="<?=$do_loginauth?>" size="35"> 
        <font color="#666666">(如果设置登录需要输入此认证码才能通过)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align="left">后台登录COOKIE认证码</div></td>
      <td height="25" bgcolor="#FFFFFF"> <input name="ecookiernd" type="text" id="ecookiernd" value="<?=$do_ecookiernd?>" size="35">
        <input type="button" name="Submit3" value="随机" onclick="document.setform.ecookiernd.value='<?=make_password(36)?>';"> <font color="#666666">(填写10~50个任意字符，最好多种字符组合)</font></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF">后台开启文件验证登陆</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="ckhloginfile" value="0"<?=$do_ckhloginfile==0?' checked':''?>>
        开启 
        <input type="radio" name="ckhloginfile" value="1"<?=$do_ckhloginfile==1?' checked':''?>>
        关闭 <font color="#666666">&nbsp;</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">后台开启验证登录IP</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="ckhloginip" value="1"<?=$do_ckhloginip==1?' checked':''?>>
        开启 
        <input type="radio" name="ckhloginip" value="0"<?=$do_ckhloginip==0?' checked':''?>>
        关闭 <font color="#666666">(如果上网的IP是变动的，不要开启)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">记录登陆日志</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="theloginlog" value="0"<?=$do_theloginlog==0?' checked':''?>>
        开启 
        <input type="radio" name="theloginlog" value="1"<?=$do_theloginlog==1?' checked':''?>>
        关闭</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">记录操作日志</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="thedolog" value="0"<?=$do_thedolog==0?' checked':''?>>
        开启 
        <input type="radio" name="thedolog" value="1"<?=$do_thedolog==1?' checked':''?>>
        关闭</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">COOKIE配置</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE作用域</td>
      <td height="25" bgcolor="#FFFFFF"> <input name="cookiedomain" type="text" id="fw_pass3" value="<?=$phome_cookiedomain?>" size="35"> 
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE作用路径</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookiepath" type="text" id="cookiedomain" value="<?=$phome_cookiepath?>" size="35"></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">前台COOKIE变量前缀</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookievarpre" type="text" id="cookievarpre" value="<?=$phome_cookievarpre?>" size="35"> 
        <font color="#666666">(由英文字母组成,5~12个字符组成)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">后台COOKIE变量前缀</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookieadminvarpre" type="text" id="cookieadminvarpre" value="<?=$phome_cookieadminvarpre?>" size="35"> 
        <font color="#666666">(由英文字母组成,5~12个字符组成)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE验证随机码</td>
      <td height="25" bgcolor="#FFFFFF"> <input name="cookieckrnd" type="text" id="cookieckrnd" value="<?=$phome_cookieckrnd?>" size="35">
        <input type="button" name="Submit32" value="随机" onclick="document.setform.cookieckrnd.value='<?=make_password(36)?>';"> 
        <font color="#666666">(填写10~50个任意字符，最好多种字符组合)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"></td>
      <td height="25" bgcolor="#FFFFFF"> <input type="submit" name="Submit" value=" 设 置 "> 
        &nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" value="重置"></td>
    </tr>
  </table>
</form>
</body>
</html>
