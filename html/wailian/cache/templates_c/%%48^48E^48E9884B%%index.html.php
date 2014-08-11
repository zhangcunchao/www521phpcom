<?php /* Smarty version 2.6.25, created on 2013-08-05 11:15:02
         compiled from www/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'www/index.html', 38, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link href="/<?php echo $this->_tpl_vars['css']; ?>
public/css/s.css" rel="stylesheet" type="text/css" />
<style>
body{position:relative}
body,form{margin:0!important;padding:0!important}
#bd_snap{font:14px arial;color:#000;background:#fff;text-align:left;padding:7px 0 0 20px}
#bd_snap_txt{clear:both;padding:10px 0 }
#bd_snap_note{font-size:12px;color:#666;padding-bottom:10px}
#bd_snap a{font:14px arial;color:#00c;text-decoration:underline}
#bd_snap_head{width:860px;height:44px}
#bd_snap_logo{width:162px;height:38px;display:block;background:url(http://www.521php.com/images/link.gif) no-repeat;margin-right:15px;float:left}
#bd_snap_search{width:680px;position:absolute;left:150px;top:17px}
#bd_snap_kw{width:519px;height:22px;padding:4px 7px;padding:6px 7px 2px\9;margin-right:5px;font:16px arial;background:url(http://www.521php.com/images/i-1.0.0.png) no-repeat -304px 0;_background-attachment:fixed;border:1px solid #cdcdcd;border-color:#9a9a9a #cdcdcd #cdcdcd #9a9a9a;vertical-align:top}
#bd_snap_su{width:95px;height:32px;font-size:14px;color:#000;padding:0;padding-top:2px\9;border:0;}
input.bd_snap_btn{background:#ddd url(http://www.521php.com/images/i-1.0.0.png);cursor:pointer}
input.bd_snap_btn_h{background-position:-100px 0}
#bd_snap_btn_wr{width:97px;height:34px;display:inline-block;background:url(http://www.521php.com/images/i-1.0.0.png) no-repeat -202px 0;_top:1px;*position:relative}
#bd_snap_ln{height:1px;border-top:1px solid #ACA899;background:#ECE9D8;overflow:hidden}
#bd_snap_txt span a{text-decoration:none}
</style>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www/nav.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main">
<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<table border="0" cellpadding="0" cellspacing="0" class="r">
<tbody><tr><td>
<a href="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url']; ?>
" onmousedown="this.href='/<?php echo $this->_tpl_vars['css']; ?>
index.php/reto/id/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
'; return true;"  target="_blank"><font size="3"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
</font></a><br />
<font size="-1"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['description']; ?>
</font><br />
<font size="-1"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['keywords']; ?>
</font><br />
<font style="font-size:13px; color:#999">
<a class="m" style="color:#008000" href="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url']; ?>
" target="_blank" onmousedown="this.href='/<?php echo $this->_tpl_vars['css']; ?>
index.php/reto/id/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
'; return true;" href="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url']; ?>
"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url']; ?>
</a>
<a class="m" href="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url']; ?>
" onmousedown="this.href='/<?php echo $this->_tpl_vars['css']; ?>
index.php/reto/id/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
'; return true;"  style=" color:#008000" target="_blank">|<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
</a></font> 
<font style=" font-size:13px; color:#008000"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['catetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d  %H:%I:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d  %H:%I:%S")); ?>
</font><br />
<font style="color:#999; font-size:13px; text-decoration:none;">链入本站:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['innum']; ?>
次</font> <font style="color:#999; font-size:13px; text-decoration:none;">本站链出:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['outnum']; ?>
次</font><br />
<div class="showindex" title="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url2']; ?>
">
<a href="http://www.baidu.com/s?wd=site:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url2']; ?>
" rel="nofllow" target="_blank" title="点击查看百度收录详情"><font style="color:#999; font-size:13px; text-decoration:none;">百度</font></a><span class="bd"><img src="/api/pr/spinner.gif" /></span> ·
<a href="http://www.google.com/search?q=site:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url2']; ?>
" rel="nofllow" target="_blank" title="点击查看谷歌收录详情"><font style="color:#999; font-size:13px;text-decoration:none;">Google</font></a><span class="gg"><img src="/api/pr/spinner.gif" /></span> ·
<font style="color:#999; font-size:13px;text-decoration:none;">Alexa</font></a><span class="alexa"><img src="/api/pr/spinner.gif" /></span> ·
<a href="/<?php echo $this->_tpl_vars['css']; ?>
index.php/html/k/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['cateurl']; ?>
" title="点击查看该域名快照" target="_blank"><font style="color:#999; font-size:13px;text-decoration:none;"><b>查看域名在本站快照</b></font></a>
</div>
</td></tr>
</tbody></table><br />
<?php endfor; endif; ?>
</div>
<div style="padding:0 8px;"> <?php echo $this->_tpl_vars['page']; ?>
</div><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type='text/javascript' src="/wailian/public/scripts/jquery.js"></script>
<script type="text/javascript">
function getindex(id,num){
	if(id<num){
		var b=$(".showindex").eq(id).attr("title");
		$.get("/api/pr/1.php",{url:''+b+''},function(d){
			var e=eval("("+d+")");
			$(".showindex").eq(id).find(".bd").html(e.qz);
			$(".showindex").eq(id).find(".gg").html(e.pr);
			$(".showindex").eq(id).find(".alexa").text(e.alexa);
			if(d!=""){
				id = id+1;
				setTimeout(getindex(id,num),0);
			}
		});
	}else{
		return false;
	}
}
$(document).ready(function(){
	var num = $(".showindex").length;
	getindex(0,num);
});
</script>
</body>
</html>