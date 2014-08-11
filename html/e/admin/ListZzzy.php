<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
require("../class/user.php");
require LoadLang("pub/fun.php");
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
CheckLevel($logininid,$loginin,$classid,"user");

//删除
$enews = $_REQUEST['enews'];
if($enews=='DelGh')
{
	$userid=$_GET['id'];
	$dsql = "delete from `listweb` where id = '$userid'";
	@mysql_query($dsql);
}
//批量删除会员
elseif($enews=='DelGh_all')
{
	echo $userid=$_POST['userid'];
	gh_DelGh_all($userid);
}
elseif($enews=='Update'){
	$id = $_GET['id'];
	$t  = $_GET['t']==1?0:1;
	$dsql = "update `listweb` set `type` = '$t' where id = '$id'";
	@mysql_query($dsql);
}


$line=25;
$page_line=12;
$page=(int)$_GET['page'];
$order = @$_GET['order']?@$_GET['order']:'id';
$type = @$_GET['type']?@$_GET['type']:'';
$start=0;
$offset=$page*$line;
$add="";
$where = '1';
if($type){
	$where .= " and `type` = '1'";
}
$query="select * from `listweb` where $where order by $order desc";
if(!$num){
	$num=$empire->num($query);//取得总条数
}
$search = '&order='.$order.'&num='.$num.'&type='.$type;
$query=$query." limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>爱链管理</title>
<link href="adminstyle/1/adminstyle.css" rel="stylesheet" type="text/css">
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
<script>
function checkdell(){
    document.form1.enews.value = "dall";
	return true;
 }
</script>
</head>

<body>
<form name="form1" action="Dyzz.php" method="post">
<input type="hidden" name="page" value="<?php echo $page;?>" />
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%"><a href="ListZzzy.php">域名管理</a>&nbsp;&nbsp;筛选：<a href="ListZzzy.php?order=lastintime">最近链入时间</a>&nbsp;&nbsp;<a href="ListZzzy.php?order=catetime">快照时间</a>&nbsp;&nbsp;<a href="ListZzzy.php?order=catetime&type=1">仅通过的</a>&nbsp;&nbsp;<a href="">刷新本页</a></td>
    <td></td>
  </tr>
</table>
   
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  
    <tr class="header"> 
      <td width="6%" height="25"><div align="center">ID</div></td>
      <td width="11%" height="25"><div align="center">标题</div></td>
      <td width="6%"><div align="center">网址</div></td>
	  <td width="2%"><div align="center">通过</div></td>
	  <td width="3%"><div align="center">链入次数</div></td>
      <td width="3%"><div align="center">链出次数</div></td>
      <td width="9%"><div align="center">最近链入时间</div></td>
      <td width="9%"><div align="center">快照时间</div></td>
	  <td width="9%"><div align="center">录入时间</div></td>
      <td width="9%" height="25"><div align="center">操作</div></td>
    </tr>
	<?
	while($r=$empire->fetch($sql))
	{
	
  ?>
    <tr onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'" bgcolor="ffffff" id=user<?=$r[id]?>> 
	  <td height="25"><div align="center"> <?=$r[id]?></div></td>
      <td height="25"><div align="center"> <?=$r[title]?></div></td>
      <td height="25"><div align="center"><a href="/wailian/index.php/reto/id/<?=$r[id]?>" target="_blank" title="点击打开"><?=$r[url]?></a></div></td>
	  <td><div align="center"><a href="ListZzzy.php?enews=Update&id=<?=$r[id]?>&t=<?=$r[type]?>&page=<?php echo $page;?>&order=<?php echo $order;?>&type=<?php echo $type;?>&num=<?php echo $num;?>"><?php if('1'==$r[type]){echo '是';}else{echo '<span style="color:#f00">否</span>';}?></a></div></td>
      <td><div align="center"><?=$r[innum]?></div></td>
      <td><div align="center"><?=$r[outnum]?></div></td>
      <td><div align="center"><?=date('Y-m-d H:i:s',$r[lastintime])?></div></td>
      <td><div align="center"><a href="/wailian/index.php/gx/id/<?=$r[id]?>/cc/2" target="_blank" title="点击更新快照"><?=date('Y-m-d H:i:s',$r[catetime])?></a></div></td>
      <td><?=date('Y-m-d H:i:s',$r[addtime])?></td>
      <td height="25"><div align="center"> 
          [<a href="ListZzzy.php?enews=DelGh&id=<?=$r[id]?>&page=<?php echo $page;?>&order=<?php echo $order;?>&type=<?php echo $type;?>" onClick="return confirm('确认要删除？');">删除</a>] 
          <input name="userid[]" type="checkbox" id="userid[]" value="<?=$r[id]?>"<?=$checked?> onClick="if(this.checked){user<?=$r[id]?>.style.backgroundColor='#DBEAF5';}else{user<?=$r[id]?>.style.backgroundColor='#ffffff';}">
        </div></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="ffffff"> 
      <td height="25" colspan="8"> 
        <?=$returnpage?>
        &nbsp;&nbsp;&nbsp; 
         <!-- <input type="submit" name="Submit2" value="删除" onclick="return checkdell()" /> -->
        
        &nbsp;&nbsp;<input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>全选</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>
