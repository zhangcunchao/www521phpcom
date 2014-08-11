<?php /* Smarty version 2.6.25, created on 2013-08-05 10:23:26
         compiled from www/nav.html */ ?>
<span> <a href="/<?php echo $this->_tpl_vars['css']; ?>
"><strong>我爱外链</strong></a>&nbsp;&nbsp;&nbsp;<a href="/<?php echo $this->_tpl_vars['css']; ?>
index.php/login" target="_blank">提交新站</a>&nbsp;&nbsp;&nbsp;<a href="/<?php echo $this->_tpl_vars['css']; ?>
index.php/click" target="_blank">Top100点入排行</a>&nbsp;&nbsp;&nbsp;<a href="/<?php echo $this->_tpl_vars['css']; ?>
index.php/gq" target="_blank">过期域名</a>&nbsp;&nbsp;&nbsp;<a href="/<?php echo $this->_tpl_vars['css']; ?>
index.php/lh" target="_blank">拉黑域名</a>&nbsp;&nbsp;&nbsp;<a href="/message/" target="_blank">联系我们</a>&nbsp;&nbsp;&nbsp;<a href="/" target="_blank">PHP博客</a></span>
<div id="bd_snap_head">
        <a href="/<?php echo $this->_tpl_vars['css']; ?>
" id="bd_snap_logo" title="<?php echo $this->_tpl_vars['title']; ?>
"></a>
</div>
<div id="bd_snap_search">
	<form action="http://www.521php.com/so.php" method="get" target="_blank"><input name="s" value="输入关键字或域名" onblur="if(this.value=='')this.value='输入关键字或域名';"  onclick="if(this.value=='输入关键字或域名')this.value=''" id="bd_snap_kw" maxlength="100"><span id="bd_snap_btn_wr"><input type="submit" id="bd_snap_su" value="爱链一下" class="bd_snap_btn" onmousedown="this.className='bd_snap_btn bd_snap_btn_h'" onmouseout="this.className='bd_snap_btn'"></span></form>
</div>
<div class="tip"> 欢迎您再次光临!收录提示:您只需做上本站链接，点击一次即可免费收录，并自动排在本站第一位。(如果没有排在第一位，<a href="/<?php echo $this->_tpl_vars['css']; ?>
">点击刷新尝试</a>)&nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['allnum'] != ''): ?><font style="color:#999;text-decoration:none;">正常网站约：<?php echo $this->_tpl_vars['allnum']; ?>
; 过期网站：<?php echo $this->_tpl_vars['gqweb']; ?>
; 拉黑网站:<?php echo $this->_tpl_vars['lhweb']; ?>
</font><?php endif; ?></div>