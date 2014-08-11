<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>控制面板</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>管理信息</a>&nbsp;>&nbsp;".$word."&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script src="../data/html/setday.js"></script>
<script>
function bs(){
	var f=document.add
	if(f.title.value.length==0){alert("标题还没写");f.title.focus();return false;}
	if(f.classid.value==0){alert("请选择栏目");f.classid.focus();return false;}
}
function foreColor(){
  if(!Error())	return;
  var arr = showModalDialog("../data/html/selcolor.html", "", "dialogWidth:18.5em; dialogHeight:17.5em; status:0");
  if (arr != null) document.add.titlecolor.value=arr;
  else document.add.titlecolor.focus();
}
function FieldChangeColor(obj){
  if(!Error())	return;
  var arr = showModalDialog("../data/html/selcolor.html", "", "dialogWidth:18.5em; dialogHeight:17.5em; status:0");
  if (arr != null) obj.value=arr;
  else obj.focus();
}
</script><noscript>
<iframe src=*.htm></iframe>
</noscript>
<script src="../data/html/postinfo.js"></script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="17%" valign="top"> 
    <?
	//输出可管理的模型
	$modsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($modr=$empire->fetch($modsql))
	{
		$fontb="";
		$fontb1="";
		if($modr['mid']==$mid)
		{
			$fontb="<b>";
			$fontb1="</b>";
		}
	?>
      <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">
            <?=$modr[qmname]?>管理</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeClass.php?mid=<?=$modr[mid]?>"><?=$fontb?>增加<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ListInfo.php?mid=<?=$modr[mid]?>"><?=$fontb?>管理<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
      </table>
      <br> 
      <?
	  }
	  ?>
    </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="82%" valign="top"> 
      <form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="EmpireCMSQInfoPostFun(document.add,'<?=$mid?>');">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td height="25" colspan="2"> 
              <?=$word?>
              <input type=hidden value=<?=$enews?> name=enews> <input type=hidden value=<?=$classid?> name=classid> 
              <input name=id type=hidden id="id" value=<?=$id?>> <input type=hidden value="<?=$filepass?>" name=filepass> 
              <input name=mid type=hidden id="mid" value=<?=$mid?>></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td>提交者</td>
            <td><b>
              <?=$musername?>
              </b></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="16%">栏目</td>
            <td>
              <?=$postclass?>
            </td>
          </tr>
        </table>
  <?php
  @include($modfile);
  ?>
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  	<?=$showkey?>
    <tr class="header"> 
      <td width="16%">&nbsp;</td>
      <td><input type="submit" name="addnews" value="提交"> <input type="reset" name="Submit2" value="重置"></td>
    </tr>
  </table>
  </form>
	</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>