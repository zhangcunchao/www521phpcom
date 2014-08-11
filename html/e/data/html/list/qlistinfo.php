<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,titleurl,groupid,newspath,filename,checked,isqf,havehtml,istop,isgood,firsttitle,ismember,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlefont,titlepic,title from {$dbtbpre}ecms_".$mr['tbname']." where ".$yhadd."userid='$user[userid]' and ismember=1".$add." order by newstime desc limit $offset,$line";
$sql=$empire->query($query);

$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>控制面板</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="searchinfo" method="GET" action="ListInfo.php">
    <tr>
            <td width="25%" height="27"> 
              <input type="button" name="Submit" value="增加信息" onclick="self.location.href='ChangeClass.php?mid=<?=$mid?>';">
            </td>
      <td width="75%"><div align="right">&nbsp;搜索： 
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
          <select name="show">
            <option value="0" selected>标题</option>
          </select>
          <input type="submit" name="Submit2" value="搜索">
          <input name="sear" type="hidden" id="sear" value="1">
          <input name="mid" type="hidden" value="<?=$mid?>">
        </div></td>
    </tr>
  </form>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="50%" height="25"> <div align="center">标题</div></td>
    <td width="13%" height="25"> <div align="center">发布时间</div></td>
	<td width="8%" height="25"> 
      <div align="center">点击</div></td>
    <td width="6%">
      <div align="center">评论</div></td>
    <td width="6%"><div align="center">审核</div></td>
    <td width="17%" height="25"> 
      <div align="center">操作</div></td>
  </tr>
  <?
	while($r=$empire->fetch($sql))
	{
		//状态
		$st='';
		if($r[istop])//置顶
		{
			$st.="<font color=red>[顶".$r[istop]."]</font>";
		}
		if($r[isgood])//推荐
		{
			$st.="<font color=red>[推".$r[isgood]."]</font>";
		}
		if($r[firsttitle])//头条
		{
			$st.="<font color=red>[头".$r[firsttitle]."]</font>";
		}
		//时间
		$newstime=date("Y-m-d",$r[newstime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,50,false));
		$r[title]=DoTitleFont($r[titlefont],$r[title]);
		if(empty($r[checked]))
		{$checked="<font color=red>×</font>";}
		else
		{$checked="√";}
		$plnum=$r[plnum];//评论个数
		$titleurl=sys_ReturnBqTitleLink($r);//链接
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";}
		//栏目
		$classname=$class_r[$r[classid]][classname];
		$classurl=sys_ReturnBqClassname($r,9);
		$bclassid=$class_r[$r[classid]][bclassid];
		$br['classid']=$bclassid;
		$bclassurl=sys_ReturnBqClassname($br,9);
		$bclassname=$class_r[$bclassid][classname];
	?>
  <tr bgcolor="#FFFFFF" id=news<?=$r[id]?>> 
    <td height="25"> <div align="left"> 
        <?=$st?>
		<?=$showtitlepic?>
        <a href="<?=$titleurl?>" target=_blank title="<?=$oldtitle?>"> 
        <strong><?=$r[title]?></strong>
        </a>
		<br>
          栏目:<a href='<?=$bclassurl?>' target='_blank'><?=$bclassname?></a> > <a href='<?=$classurl?>' target='_blank'><?=$classname?></a>
      </div></td>
    <td height="25"> <div align="center"><?=$newstime?></div></td>
	<td height="25"> <div align="center"> <a title="下载次数:<?=$r[totaldown]?>"> 
        <?=$r[onclick]?>
        </a> </div></td>
    <td><div align="center"><a href="../pl/?id=<?=$r[id]?>&classid=<?=$r[classid]?>" title="查看评论" target=_blank><u><?=$plnum?></u></a></div></td>
    <td><div align="center">
        <?=$checked?>
      </div></td>
    <td height="25"><div align="center"><a href="AddInfo.php?enews=MEditInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?>">修改</a> | <a href="ecms.php?enews=MDelInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?>" onclick="return confirm('确认要删除?');">删除</a> 
      </div></td>
  </tr>
  <?
	}
	?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="6"> 
      <?=$returnpage?>
    </td>
  </tr>
</table>
</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>