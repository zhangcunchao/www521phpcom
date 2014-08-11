<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//显示购物车
function ShowBuycar(){
	global $empire,$class_r,$dbtbpre;
	$buycar=getcvar('mybuycar');
	$record="!";
	$field="|";
	$alltotal=0;
	$return[0]=0;
	$return[1]=0;
	echo"<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
  <form name=form1 method=post action='../../enews/index.php'>
  <input type=hidden name=enews value=EditBuycar>
    <tr class='header'> 
      <td width='16%' height=23> <div align=center>图片</div></td>
      <td width='29%'> <div align=center>商品名称</div></td>
      <td width='14%'> <div align=center>市场价格</div></td>
      <td width='14%'> <div align=center>优惠价格</div></td>
      <td width='8%'> <div align=center>数量</div></td>
      <td width='14%'> <div align=center>小计</div></td>
      <td width='5%'> <div align=center>删除</div></td>
    </tr>";
	$r=explode($record,$buycar);
	$count=count($r);
	for($i=0;$i<$count-1;$i++)
	{
		$pr=explode($field,$r[$i]);
		$productid=$pr[1];
		$fr=explode(",",$pr[1]);
		//ID
		$classid=(int)$fr[0];
		$id=(int)$fr[1];
		if(empty($class_r[$classid][tbname]))
		{
			continue;
		}
		//数量
		$num=(int)$pr[2];
		if(empty($num))
		{
			$num=1;
		}
		//取得产品信息
		$productr=$empire->fetch1("select title,tprice,price,titleurl,groupid,classid,newspath,filename,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid' and id='$id' limit 1");
		if(empty($productr[id]))
		{
			continue;
		}
		//是否全部点数
		if(!$productr[buyfen])
		{
			$return[0]=1;
		}
		$return[1]+=$productr[buyfen]*$num;
		//产品图片
		if(empty($productr[titlepic]))
		{
			$productr[titlepic]="../../data/images/notimg.gif";
		}
		//返回链接
		$titleurl=sys_ReturnBqTitleLink($productr);
		$thistotal=$productr[price]*$num;
		$alltotal+=$thistotal;
		echo"<tr>
	<td align=center><a href='".$titleurl."' target=_blank><img src='".$productr[titlepic]."' border=0 width=80 height=80></a></td>
	<td align=center><a href='".$titleurl."' target=_blank>".$productr[title]."</a></td>
	<td align=right>￥".$productr[tprice]."</td>
	<td align=right><b>￥".$productr[price]."</b></td>
	<td align=center><input type=text name=num[] value='".$num."' size=6></td>
	<td align=right>￥".$thistotal."</td>
	<td align=center><input type=checkbox name=del[] value='".$productid."'></td>
	<input type=hidden name=productid[] value='".$productid."'></tr>";
    }
	//支付点数付费
	if(!$return[0])
	{
		$a="<tr height='25'> 
      <td colspan=6><div align=right>合计点数:<strong>".$return[1]."</strong></div></td>
      <td>&nbsp;</td>
    </tr>";
	}
	echo"<tr height='27'> 
      <td colspan=6><div align=right>合计:<strong>￥".$alltotal."</strong></div></td>
      <td>&nbsp;</td>
    </tr>".$a."
    <tr> 
      <td colspan=7 height='25'><div align=right><a href='../../enews/?enews=ClearBuycar'><img src=../../data/images/shop/clearbuycar.gif width=92 height=23 border=0></a>&nbsp;&nbsp;
          <input name=imageField type=image src=../../data/images/shop/editbuycar.gif width=135 height=23 border=0>
          &nbsp;&nbsp;<a href='javascript:window.close();'><img src=../../data/images/shop/buynext.gif width=87 height=23 border=0></a>&nbsp;&nbsp;<a href='../order/'><img src=../../data/images/shop/buycarnext.gif width=87 height=19 border=0></a></div></td>
    </tr>
	</form>
  </table>";
	return $return;
}
?>
<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8>
<title>我的购物车</title>
<link href=../../data/images/qcss.css rel=stylesheet type=text/css>
<script language="javascript">
window.resizeTo(760,600);
window.focus();
</script>
</head>

<body>
<?
ShowBuycar();
?>
</body>
</html>