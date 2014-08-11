<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作品名(*)</td>
    <td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
<tr> 
  <td height="25" bgcolor="#FFFFFF">
<?=$tts?"<select name='ttid'><option value='0'>标题分类</option>$tts</select>":""?>
	<input type=text name=title value="<?=htmlspecialchars(stripSlashes($r[title]))?>" size="60"> 
	<input type="button" name="button" value="图文" onclick="document.add.title.value=document.add.title.value+'(图文)';"> 
  </td>
</tr>
<tr> 
  <td height="25" bgcolor="#FFFFFF">属性: 
	<input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>粗体
	<input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>斜体
	<input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>删除线
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"><a onclick="foreColor();"><img src="../data/images/color.gif" width="21" height="21" align="absbottom"></a>
  </td>
</tr>
</table></td>
  </tr>
  <tr>
    <td width='16%' height=25 bgcolor='ffffff'>特殊属性</td>
    <td bgcolor='ffffff'><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
  <tr>
    <td height="25" bgcolor="#FFFFFF">信息属性: 
      <input name="checked" type="checkbox" value="1"<?=$r[checked]?' checked':''?>>
      审核 &nbsp;&nbsp; 推荐 
      <select name="isgood" id="isgood">
        <option value="0"<?=$r[isgood]==0?' selected':''?>>不推荐</option>
        <option value="1"<?=$r[isgood]==1?' selected':''?>>一级推荐</option>
        <option value="2"<?=$r[isgood]==2?' selected':''?>>二级推荐</option>
        <option value="3"<?=$r[isgood]==3?' selected':''?>>三级推荐</option>
        <option value="4"<?=$r[isgood]==4?' selected':''?>>四级推荐</option>
        <option value="5"<?=$r[isgood]==5?' selected':''?>>五级推荐</option>
        <option value="6"<?=$r[isgood]==6?' selected':''?>>六级推荐</option>
        <option value="7"<?=$r[isgood]==7?' selected':''?>>七级推荐</option>
        <option value="8"<?=$r[isgood]==8?' selected':''?>>八级推荐</option>
        <option value="9"<?=$r[isgood]==9?' selected':''?>>九级推荐</option>
      </select>
      &nbsp;&nbsp; 头条 
      <select name="firsttitle" id="firsttitle">
        <option value="0"<?=$r[firsttitle]==0?' selected':''?>>非头条</option>
        <option value="1"<?=$r[firsttitle]==1?' selected':''?>>一级头条</option>
        <option value="2"<?=$r[firsttitle]==2?' selected':''?>>二级头条</option>
        <option value="3"<?=$r[firsttitle]==3?' selected':''?>>三级头条</option>
        <option value="4"<?=$r[firsttitle]==4?' selected':''?>>四级头条</option>
        <option value="5"<?=$r[firsttitle]==5?' selected':''?>>五级头条</option>
        <option value="6"<?=$r[firsttitle]==6?' selected':''?>>六级头条</option>
        <option value="7"<?=$r[firsttitle]==7?' selected':''?>>七级头条</option>
        <option value="8"<?=$r[firsttitle]==8?' selected':''?>>八级头条</option>
        <option value="9"<?=$r[firsttitle]==9?' selected':''?>>九级头条</option>
      </select></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">关键字&nbsp;&nbsp;&nbsp;: 
      <input name="keyboard" type="text" size="52" value="<?=stripSlashes($r[keyboard])?>">
      <font color="#666666">(多个请用&quot;,&quot;隔开)</font></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">外部链接: 
      <input name="titleurl" type="text" value="<?=stripSlashes($r[titleurl])?>" size="52">
      <font color="#666666">(填写后信息连接地址将为此链接)</font></td>
  </tr>
</table>
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>发布时间</td>
    <td bgcolor=ffffff><input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="设为当前时间" onclick="document.add.newstime.value='<?=$todaytime?>'"></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作品预览图</td>
    <td bgcolor=ffffff>
<input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[titlepic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作者</td>
    <td bgcolor=ffffff><input name="flashwriter" type="text" size=60 id="flashwriter" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashwriter]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作者邮箱</td>
    <td bgcolor=ffffff><input name="email" type="text" size=60 id="email" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[email]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作品评价</td>
    <td bgcolor=ffffff><select name="star" id="star"><option value="1"<?=$r[star]=="1"?' selected':''?>>1星</option><option value="2"<?=$r[star]=="2"||$ecmsfirstpost==1?' selected':''?>>2星</option><option value="3"<?=$r[star]=="3"?' selected':''?>>3星</option><option value="4"<?=$r[star]=="4"?' selected':''?>>4星</option><option value="5"<?=$r[star]=="5"?' selected':''?>>5星</option></select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>文件大小</td>
    <td bgcolor=ffffff><input name="filesize" type="text" size=60 id="filesize" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[filesize]))?>">
<select name="select" onchange="document.add.filesize.value+=this.value">
        <option value="">单位</option>
        <option value=" MB">MB</option>
        <option value=" KB">KB</option>
        <option value=" GB">GB</option>
        <option value=" BYTES">BYTES</option>
      </select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>Flash地址(*)</td>
    <td bgcolor=ffffff>
<input name="flashurl" type="text" id="flashurl" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashurl]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=2&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=flashurl','','width=700,height=550,scrollbars=yes');" title="选择已上传的FLASH"><img src="../data/images/changeflash.gif" border="0" align="absbottom"></a> 
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>Flash规格</td>
    <td bgcolor=ffffff><input name="width" type="text" size=6 id="width" value="<?=$ecmsfirstpost==1?"600":htmlspecialchars(stripSlashes($r[width]))?>">
*<input name="height" type="text" size=6 id="height" value="<?=$ecmsfirstpost==1?"450":htmlspecialchars(stripSlashes($r[height]))?>">
<font color="#666666">(宽度*高度)</font></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>作品简介(*)</td>
    <td bgcolor=ffffff><textarea name="flashsay" cols="80" rows="10" id="flashsay"><?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashsay]))?></textarea>
</td>
  </tr>
</table>