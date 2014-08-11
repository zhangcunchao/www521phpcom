<?php
require("../../class/connect.php");
$id=(int)$_GET['id'];
$classid=(int)$_GET['classid'];
if(empty($id)||empty($classid))
{
    exit();
}
$num=(int)$_GET['num'];
if($num<1||$num>80)
{
	$num=10;
}
require("../../class/db_sql.php");
require("../../class/q_functions.php");
$link=db_connect();
$empire=new mysqlquery();
$sql=$empire->query("select plid,saytime,sayip,username,zcnum,fdnum,userid,stb from {$dbtbpre}enewspl where id='$id' and classid='$classid' and checked=0 order by plid desc limit ".$num);
?>
document.write("");
<?php
while($r=$empire->fetch($sql))
{
	$plusername=$r[username];
	if(empty($r[username]))
	{
		$plusername='匿名';
	}
	if($r[userid])
	{
		$plusername="<a href='$public_r[newsurl]e/space/?userid=$r[userid]' target='_blank'>$r[username]</a>";
	}
	//ip
	$sayip=ToReturnXhIp($r[sayip]);
	//副表
	$fr=$empire->fetch1("select * from {$dbtbpre}enewspl_data_".$r[stb]." where plid='$r[plid]'");
	$saytext=str_replace("\r\n","",$fr['saytext']);
	$saytext=addslashes(RepPltextFace(stripSlashes($saytext)));//替换表情
?>
document.write("       <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\" style=\"word-break:break-all; word-wrap:break-all;\">        <tr>           <td height=\"30\"><span class=\"name\">本站网友 <?=$plusername?></span> <font color=\"#666666\">ip:<?=$sayip?></font></td>          <td><div align=\"right\"><font color=\"#666666\"><?=$r[saytime]?> 发表</font></div></td>        </tr>        <tr valign=\"top\">           <td height=\"50\" colspan=\"2\" class=\"text\"><?=$saytext?></td>        </tr>        <tr>           <td height=\"30\">&nbsp;</td>          <td><div align=\"right\" class=\"re\">               <a href=\"JavaScript:makeRequest(\'/e/enews/?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=1&doajax=1&ajaxarea=zcpldiv<?=$r[plid]?>\',\'EchoReturnedText\',\'GET\',\'\');\">支持</a>[<span id=\"zcpldiv<?=$r[plid]?>\"><?=$r[zcnum]?></span>]&nbsp;               <a href=\"JavaScript:makeRequest(\'/e/enews/?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=0&doajax=1&ajaxarea=fdpldiv<?=$r[plid]?>\',\'EchoReturnedText\',\'GET\',\'\');\">反对</a>[<span id=\"fdpldiv<?=$r[plid]?>\"><?=$r[fdnum]?></span>]            </div></td>        </tr>      </table>      <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\">        <tr>          <td background=\"/skin/default/images/plhrbg.gif\"></td>        </tr>      </table>");
<?php
}
?>
document.write("");
<?php
db_close();
$empire=null;
?>