<?php /* Smarty version 2.6.25, created on 2014-08-13 17:07:55
         compiled from www/html.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'www/html.html', 27, false),)), $this); ?>
<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base href="<?php echo $this->_tpl_vars['url']; ?>
">
<style>
body{position:relative}
body,form{margin:0!important;padding:0!important}
#bd_snap{font:14px arial;color:#000;background:#fff;text-align:left;padding:7px 0 0 20px}
#bd_snap_txt{clear:both;padding:10px 0 }
#bd_snap_note{font-size:12px;color:#666;padding-bottom:10px}
#bd_snap a{font:14px arial;color:#00c;text-decoration:underline}
#bd_snap_head{width:860px;height:44px}
#bd_snap_logo{width:162px;height:38px;display:block;background:url(<?php echo $this->_tpl_vars['web']; ?>
images/logo-snap.gif) no-repeat;margin-right:15px;float:left}
#bd_snap_search{width:680px;position:absolute;left:197px;top:17px}
#bd_snap_kw{width:519px;height:22px;padding:4px 7px;padding:6px 7px 2px\9;margin-right:5px;font:16px arial;background:url(<?php echo $this->_tpl_vars['web']; ?>
images/i-1.0.0.png) no-repeat -304px 0;_background-attachment:fixed;border:1px solid #cdcdcd;border-color:#9a9a9a #cdcdcd #cdcdcd #9a9a9a;vertical-align:top}
#bd_snap_su{width:95px;height:32px;font-size:14px;color:#000;padding:0;padding-top:2px\9;border:0;}
input.bd_snap_btn{background:#ddd url(<?php echo $this->_tpl_vars['web']; ?>
images/i-1.0.0.png);cursor:pointer}
input.bd_snap_btn_h{background-position:-100px 0}
#bd_snap_btn_wr{width:97px;height:34px;display:inline-block;background:url(http://www.521php.com/images/i-1.0.0.png) no-repeat -202px 0;_top:1px;*position:relative}
#bd_snap_ln{height:1px;border-top:1px solid #ACA899;background:#ECE9D8;overflow:hidden}
#bd_snap_txt span a{text-decoration:none}
</style>
<div id="bd_snap">
    <div id="bd_snap_head">
        <a href="<?php echo $this->_tpl_vars['web']; ?>
<?php echo $this->_tpl_vars['css']; ?>
" id="bd_snap_logo" title="到<?php echo $this->_tpl_vars['webname']; ?>
首页"></a>
    </div>
    <div id="bd_snap_txt">您查询的关键词仅在网页标题或指向此网页的链接中出现；如果想保存快照，可以<a onclick="window.open('http://cang.baidu.com/do/add?it='+encodeURIComponent(document.title)+'&amp;iu='+encodeURIComponent(location.href)+'&amp;fr=ps#nw=1','_s','scrollbars=no,width=600,height=450,right=75,top=20,status=no,resizable=yes'); return false;" href="http://cang.baidu.com/do/add" target="_blank">添加到搜藏</a>；如果想更快照，可以<a href="javascript:void(0);" onmousedown="this.href='<?php echo $this->_tpl_vars['web']; ?>
<?php echo $this->_tpl_vars['css']; ?>
index.php/gx/id/<?php echo $this->_tpl_vars['id']; ?>
'" id="wl_gx">更新快照</a>。</div>
    <div id="bd_snap_note">(<?php echo $this->_tpl_vars['webname']; ?>
和网页<a href="<?php echo $this->_tpl_vars['url']; ?>
" onmousedown="this.href='<?php echo $this->_tpl_vars['web']; ?>
<?php echo $this->_tpl_vars['css']; ?>
index.php/reto/url/<?php echo $this->_tpl_vars['url']; ?>
'; return true;"><?php echo $this->_tpl_vars['url']; ?>
</a>的作者无关，不对其内容负责。<?php echo $this->_tpl_vars['webname']; ?>
快照谨为网络故障时之索引，不代表被搜索网站的即时页面。快照日期：<?php echo ((is_array($_tmp=$this->_tpl_vars['ktime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d  %H:%I:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d  %H:%I:%S")); ?>
)</div>
</div>
<div id="bd_snap_search">
	<form action="http://www.521php.com/so.php" method="get" target="_blank"><input name="s" value="<?php echo $this->_tpl_vars['url']; ?>
" id="bd_snap_kw" maxlength="100"><span id="bd_snap_btn_wr"><input type="submit" id="bd_snap_su" value="爱链一下" class="bd_snap_btn" onmousedown="this.className='bd_snap_btn bd_snap_btn_h'" onmouseout="this.className='bd_snap_btn'"></span></form>
</div>
<div id="bd_snap_ln"></div>
<div id="showhtml" style="position:relative">
<?php echo $this->_tpl_vars['html']; ?>

</div>
<div>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['web']; ?>
<?php echo $this->_tpl_vars['css']; ?>
public/scripts/jquery.js"></script>
<script type="text/javascript">
  $("#showhtml a").click( function(){
	var url = $(this).attr("href");
	url = "<?php echo $this->_tpl_vars['url']; ?>
"+url.replace("<?php echo $this->_tpl_vars['url']; ?>
","");
	var link = "<?php echo $this->_tpl_vars['web']; ?>
<?php echo $this->_tpl_vars['css']; ?>
index.php/reto/url/"+url;
	window.open(link);
	return false;
  });
</script>
<!-- UY BEGIN -->
<div id="uyan_frame"></div>
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1699342" async=""></script>
<!-- UY END -->
</div>
<script type="text/javascript" src="http://www.521php.com/api/tz/"></script>
<div style="display:none">
<script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script>
</div>
<script type='text/javascript' src="http://www.521php.com/wailian/public/scripts/tj.js"></script>
<script type="text/javascript">
    /*300*250 外链所有创建于 2014-08-13*/
var cpro_id = "u1658531";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/f.js" type="text/javascript"></script>
 <script type="text/javascript">
    /*300*250 快照页创建于 2014-08-13*/
    var cpro_id = "u1658559";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/s.js" type="text/javascript"></script>
