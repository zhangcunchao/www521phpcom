<?php /* Smarty version 2.6.25, created on 2013-08-05 10:21:59
         compiled from www/gq.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
-<?php echo $this->_tpl_vars['title2']; ?>
</title>
<style>
body{font-size:12px;}
</style>
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
请从您的网站，点入本站任一页面，即可激活！请注意过期时间：超过<?php echo $this->_tpl_vars['time']; ?>
天未点入过本站的网站，视为过期！<br /><br /><br />
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
&nbsp;&nbsp;<?php echo $this->_sections['i']['rownum']; ?>
、<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['url2']; ?>
<br /><br />
<?php endfor; endif; ?>
<?php echo $this->_tpl_vars['page']; ?>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'www/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>