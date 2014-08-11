<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,titleurl,groupid,newspath,filename,checked,isqf,havehtml,istop,isgood,firsttitle,ismember,userid,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlepic,title from {$dbtbpre}ecms_".$tbname.$where." order by ".$doorder." limit $offset,$line";
$sql=$empire->query($query);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="adminstyle/<?=$loginadminstyleid?>/adminstyle.css" type="text/css">
<title>管理信息</title>
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

function GetSelectId(form)
{
  var ids='';
  var dh='';
  for (var i=0;i<form.elements.length;i++)
  {
	var e = form.elements[i];
	if (e.name == 'id[]')
	{
	   if(e.checked==true)
	   {
       		ids+=dh+e.value;
			dh=',';
	   }
	}
  }
  return ids;
}

function PushInfoToSp(form)
{
	var id='';
	id=GetSelectId(form);
	if(id=='')
	{
		alert('请选择要推送的信息');
		return false;
	}
	window.open('sp/PushToSp.php?tid=<?=$tid?>&id='+id,'PushToSp','width=360,height=500,scrollbars=yes,left=300,top=150,resizable=yes');
}
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<form name="AddNewsForm" method="get">
  <tr> 
    <td width="24%">位置： 
      <?=$url?>
    </td>
    <td width="76%"><div align="right" class="emenubutton">
		  <span id="showaddclassnav"></span>
          <input type="button" name="Submit" value="增加信息" onclick="if(document.AddNewsForm.addclassid.value!=0){window.open('AddNews.php?enews=AddNews&classid='+document.AddNewsForm.addclassid.value,'','');}else{alert('请选择要增加信息的栏目');document.AddNewsForm.addclassid.focus();}">
		  &nbsp; 
          <input type="button" name="Submit4" value="刷新首页" onclick="self.location.href='ecmschtml.php?enews=ReIndex'">
          &nbsp; 
          <input type="button" name="Submit4" value="刷新所有信息JS" onclick="window.open('ecmschtml.php?enews=ReAllNewsJs&from=<?=$phpmyself?>','','');">
        </div></td>
  </tr>
</form>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="SearchForm" method="GET" action="ListAllInfo.php">
    <tr> 
      <td width="100%"> <div align="right">&nbsp;搜索： 
          <select name="showspecial" id="showspecial">
            <option value="0"<?=$showspecial==0?' selected':''?>>不限属性</option>
			<option value="1"<?=$showspecial==1?' selected':''?>>置顶</option>
            <option value="2"<?=$showspecial==2?' selected':''?>>推荐</option>
            <option value="3"<?=$showspecial==3?' selected':''?>>头条</option>
            <option value="4"<?=$showspecial==4?' selected':''?>>未审核</option>
			<option value="6"<?=$showspecial==6?' selected':''?>>已审核</option>
			<option value="7"<?=$showspecial==7?' selected':''?>>投稿</option>
            <option value="5"<?=$showspecial==5?' selected':''?>>签发</option>
			<option value="8"<?=$showspecial==8?' selected':''?>>我的信息</option>
          </select>
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
          <select name="show">
            <option value="0"<?=$show==0?' selected':''?>>不限字段</option>
            <option value="1"<?=$show==1?' selected':''?>>标题</option>
            <option value="2"<?=$show==2?' selected':''?>>发布者</option>
			<option value="3"<?=$show==3?' selected':''?>>ID</option>
          </select>
		  <?=$stts?>
          <select name="ztid" id="ztid">
            <option value="0">所有专题</option>
            <?=$ztclass?>
          </select>
		  <span id="searchclassnav"></span>
          <select name="myorder" id="myorder">
            <option value="1"<?=$myorder==1?' selected':''?>>按信息ID</option>
            <option value="2"<?=$myorder==2?' selected':''?>>按发布时间</option>
            <option value="3"<?=$myorder==3?' selected':''?>>按点击率</option>
            <option value="4"<?=$myorder==4?' selected':''?>>按下载数</option>
            <option value="5"<?=$myorder==5?' selected':''?>>按评论数</option>
          </select>
          <select name="orderby" id="orderby">
            <option value="0"<?=$orderby==0?' selected':''?>>降序排序</option>
            <option value="1"<?=$orderby==1?' selected':''?>>升序排序</option>
          </select>
          <select name="infolday" id="infolday">
            <option value="1"<?=$infolday==1?' selected':''?>>全部时间</option>
            <option value="86400"<?=$infolday==86400?' selected':''?>>1 天</option>
            <option value="172800"<?=$infolday==172800?' selected':''?>>2 天</option>
            <option value="604800"<?=$infolday==604800?' selected':''?>>一周</option>
            <option value="2592000"<?=$infolday==2592000?' selected':''?>>1 个月</option>
            <option value="7948800"<?=$infolday==7948800?' selected':''?>>3 个月</option>
            <option value="15897600"<?=$infolday==15897600?' selected':''?>>6 
            个月</option>
            <option value="31536000"<?=$infolday==31536000?' selected':''?>>1 
            年</option>
          </select>
          <input type="submit" name="Submit2" value="搜索">
          <input name="tbname" type="hidden" value="<?=$tbname?>">
          <input name="sear" type="hidden" value="1">
        </div></td>
    </tr>
  </form>
</table>
<form name="listform" method="post" action="ecmsinfo.php" onsubmit="return confirm('确认要执行此操作？');">
  <input type=hidden name=enews value=DelNews_all>
  <input name=mid type=hidden id="mid" value=<?=$mid?>>
  <input type=hidden name=doing value=0>
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="25%"><select name="tbname" onchange="if(this.options[this.selectedIndex].value!=0){self.location.href='ListAllInfo.php?<?=str_replace('&tbname=','&',$search1)?>&tbname='+this.options[this.selectedIndex].value;}">
                <?=$changetbs?>
              </select> </td>
            <td width="75%"> <div align="right"><font color="#ffffff"><a href="ListAllInfo.php?tbname=<?=$tbname?>&sear=1&showspecial=8">我的信息</a> | <a href="ListAllInfo.php?tbname=<?=$tbname?>&sear=1&showspecial=4">未审核信息</a> | <a href="ListAllInfo.php?tbname=<?=$tbname?>&sear=1&showspecial=5">签发信息</a> | <a href="ListAllInfo.php?tbname=<?=$tbname?>&sear=1&showspecial=7">投稿信息</a> | <a href="ListAllInfo.php?tbname=<?=$tbname?>&showretitle=1&srt=1" title="查询重复标题，并保留一条信息">查询重复标题A</a> | <a href="ListAllInfo.php?tbname=<?=$tbname?>&showretitle=1&srt=0" title="查询重复标题的信息(不保留信息)">查询重复标题B</a> | <a href="ReHtml/ChangeData.php" target=_blank>更新数据</a> | <a href="../../" target=_blank>预览首页</a></font></div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td width="3%"><div align="center"></div></td>
      <td width="6%" height="25"><div align="center">ID</div></td>
      <td width="36%" height="25"><div align="center">标题</div></td>
      <td width="12%" height="25"><div align="center">发布者</div></td>
      <td width="16%" height="25"> <div align="center">发布时间</div></td>
	  <td width="7%" height="25"><div align="center">点击</div></td>
      <td width="6%"><div align="center">评论</div></td>
      <td width="14%" height="25"> <div align="center">操作</div></td>
    </tr>
    <?php
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
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,36,false));
		//时间
		$truetime=date("Y-m-d H:i:s",$r[truetime]);
		$lastdotime=date("Y-m-d H:i:s",$r[lastdotime]);
		//审核
		if(empty($r[checked]))
		{
			$checked=" title='未审核' style='background:#99C4E3'";
			$titleurl="ShowInfo.php?classid=$r[classid]&id=$r[id]";
		}
		else
		{
			$checked="";
			$titleurl=sys_ReturnBqTitleLink($r);
		}
		//会员投稿
		if($r[ismember])
		{
			$r[username]="<a href='member/AddMember.php?enews=EditMember&userid=".$r[userid]."' target='_blank'><font color=red>".$r[username]."</font></a>";
		}
		//取得类别名
		$do=$r[classid];
		$dob=$class_r[$r[classid]][bclassid];
		//签发
		$qf="";
		if($r[isqf])
		{
			$qfr=$empire->fetch1("select checktno,tstatus from {$dbtbpre}enewswfinfo where id='$r[id]' and classid='$r[classid]' limit 1");
			if($qfr[checktno]=='100')
			{
				$qf="(<font color='red'>已通过</font>)";
			}
			elseif($qfr[checktno]=='101')
			{
				$qf="(<font color='red'>返工</font>)";
			}
			elseif($qfr[checktno]=='102')
			{
				$qf="(<font color='red'>已否决</font>)";
			}
			else
			{
				$qf="(<font color='red'>$qfr[tstatus]</font>)";
			}
			$qf="<a href='#ecms' onclick=\"window.open('workflow/DoWfInfo.php?classid=$r[classid]&id=$r[id]','','width=600,height=520,scrollbars=yes');\">".$qf."</a>";
		}
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{
			$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";
		}
		//未生成
		$myid="<a href='ecmschtml.php?enews=ReSingleInfo&classid=$r[classid]&id[]=".$r[id]."'>".$r['id']."</a>";
		if(empty($r[havehtml]))
		{
			$myid="<a href='ecmschtml.php?enews=ReSingleInfo&classid=$r[classid]&id[]=".$r[id]."' title='未生成'><b>".$r[id]."</b></a>";
		}
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td><div align="center"> 
          <input name="id[]" type="checkbox" id="id[]" value="<?=$r[id]?>"<?=$checked?>>
        </div></td>
      <td height="42"> <div align="center"> 
          <?=$myid?>
        </div></td>
      <td height="25"> <div align="left"> 
          <?=$st?>
          <?=$showtitlepic?>
          <a href='<?=$titleurl?>' target=_blank title="<?=$oldtitle?>">
          <?=$r[title]?>
          </a> 
          <?=$qf?>
          <br>
          <font color="#574D5C">栏目:<a href='ListNews.php?bclassid=<?=$class_r[$r[classid]][bclassid]?>&classid=<?=$r[classid]?>'> 
          <font color="#574D5C">
          <?=$class_r[$dob][classname]?>
          </font> </a> > <a href='ListNews.php?bclassid=<?=$class_r[$r[classid]][bclassid]?>&classid=<?=$r[classid]?>'> 
          <font color="#574D5C">
          <?=$class_r[$r[classid]][classname]?>
          </font> </a></font></div></td>
      <td height="25"> <div align="center"> 
          <?=$r[username]?>
        </div></td>
      <td height="25"> <div align="center"> <a href="AddNews.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$r[classid]?>&bclassid=<?=$class_r[$r[classid]][bclassid]?>" title="<? echo"增加时间：".$truetime."\r\n最后修改：".$lastdotime;?>" target="_blank">
          <?=date("Y-m-d H:i:s",$r[newstime])?>
          </a> </div></td>
      <td height="25"> <div align="center"><a title="下载次数:<?=$r[totaldown]?>"> 
          <?=$r[onclick]?>
          </a></div></td>
      <td><div align="center"><a href="pl/ListPl.php?id=<?=$r[id]?>&classid=<?=$r[classid]?>&bclassid=<?=$class_r[$r[classid]][bclassid]?>" target="_blank" title="管理评论"><u><?=$r[plnum]?></u></a></div></td>
      <td height="25"> <div align="center"><a href="AddNews.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$r[classid]?>&bclassid=<?=$class_r[$r[classid]][bclassid]?>" target="_blank">修改</a> | <a href="#empirecms" onclick="window.open('info/EditInfoSimple.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$r[classid]?>&bclassid=<?=$class_r[$r[classid]][bclassid]?>','EditInfoSimple','width=600,height=360,scrollbars=yes,resizable=yes');">简改</a> | <a href="ecmsinfo.php?enews=DelNews&id=<?=$r[id]?>&classid=<?=$r[classid]?>&bclassid=<?=$class_r[$r[classid]][bclassid]?>" onclick="return confirm('确认要删除？');">删除</a> 
        </div></td>
    </tr>
    <?
	}
	?>
    <input type=hidden name=classid value=<?=$do?>>
    <input type=hidden name=bclassid value=<?=$dob?>>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center"> 
          <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
        </div></td>
      <td height="25" colspan="7"><div align="right"> 
          <input type="submit" name="Submit3" value="删除" onclick="document.listform.enews.value='DelNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit8" value="审核" onClick="document.listform.enews.value='CheckNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit9" value="取消审核" onClick="document.listform.enews.value='NoCheckNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit8" value="刷新" onClick="document.listform.enews.value='ReSingleInfo';document.listform.action='ecmschtml.php';">
          <select name="isgood" id="isgood">
            <option value="0">不推荐</option>
            <option value="1">一级推荐</option>
            <option value="2">二级推荐</option>
            <option value="3">三级推荐</option>
            <option value="4">四级推荐</option>
            <option value="5">五级推荐</option>
            <option value="6">六级推荐</option>
            <option value="7">七级推荐</option>
            <option value="8">八级推荐</option>
            <option value="9">九级推荐</option>
          </select>
          <input type="submit" name="Submit82" value="推荐" onClick="document.listform.enews.value='GoodInfo_all';document.listform.doing.value='0';document.listform.action='ecmsinfo.php';">
          <select name="firsttitle" id="firsttitle">
            <option value="0">取消头条</option>
            <option value="1">一级头条</option>
            <option value="2">二级头条</option>
            <option value="3">三级头条</option>
            <option value="4">四级头条</option>
            <option value="5">五级头条</option>
            <option value="6">六级头条</option>
            <option value="7">七级头条</option>
            <option value="8">八级头条</option>
            <option value="9">九级头条</option>
          </select>
          <input type="submit" name="Submit823" value="头条" onClick="document.listform.enews.value='GoodInfo_all';document.listform.doing.value='1';document.listform.action='ecmsinfo.php';">
          <input type="button" name="Submit112" value="推送" onClick="PushInfoToSp(this.form);">
          <select name="istop" id="select2">
            <option value="0">不置顶</option>
            <option value="1">1级置顶</option>
            <option value="2">2级置顶</option>
            <option value="3">3级置顶</option>
            <option value="4">4级置顶</option>
            <option value="5">5级置顶</option>
            <option value="6">6级置顶</option>
            <option value="7">7级置顶</option>
            <option value="8">8级置顶</option>
          </select>
          <input type="submit" name="Submit7" value="置顶" onclick="document.listform.enews.value='TopNews_all';document.listform.action='ecmsinfo.php';">
          <span id="moveclassnav"></span> 
          <input type="submit" name="Submit5" value="移动" onclick="document.listform.enews.value='MoveNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit6" value="复制" onclick="document.listform.enews.value='CopyNews_all';document.listform.action='ecmsinfo.php';">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="8"> 
        <?=$returnpage?>
        　 </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="8"> <font color="#666666">备注：多选框蓝色为未审核信息；发布者红色为会员投稿；信息ID粗体为未生成,点击ID可刷新页面.</font></td>
    </tr>
  </table>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="ShowClassNav.php?ecms=2&classid=<?=$classid?>" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>