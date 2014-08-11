<?php
/*
Plugin Name: post2Qzone 
Plugin URI: http://liguoliang.com/2010/post2qzone/
Description: post2Qzone是一款将新Post同步发表到Qzone的小插件. 可将新文章同步发布到Qzone的制定目录(无对应目录会自动创建), 支持使用Windows Live Writer发布, 并可同时抄送到指定邮箱.
Version: 1.2.2
Author: Liguoliang.com
Author URI: http://liguoliang.com/
*/
//TODO : 修改sendmail方法, 以便在post中get opt, 直接传递到sendmail中. 同时增加BCC opt.

require_once 'inc-post2email-utils.php';

$debug = false; // 仅在需要Debug时设置为True
static $POST_LINK_RP = '%%LINK%%';

//Options
$OPT_PREFIX = 'post2QZone_';
$OPT_QQ_NO = $OPT_PREFIX.'qq';
$OPT_QQ_PW = $OPT_PREFIX.'pw';
$OPT_QQ_BCC = $OPT_PREFIX.'bcc';

$OPT_POST_CATS_RULES = $OPT_PREFIX.'catsRules';

$OPT_TITLE_PREFIX = $OPT_PREFIX.'title_prefix';
$OPT_CONTENT_PLAIN = $OPT_PREFIX.'plain';
$OPT_CONTENT_LENGTH = $OPT_PREFIX.'length';
$OPT_CONTENT_PREFIX = $OPT_PREFIX.'content_prefix';
$OPT_CONTENT_SUFFIX = $OPT_PREFIX.'content_suffix';

register_activation_hook(__FILE__,'post2QZone_activate');
register_deactivation_hook(__FILE__,'post2QZone_deactivate');

function post2QZone_activate() {
	//Options
	$OPT_PREFIX = 'post2QZone_';
	$OPT_QQ_NO = $OPT_PREFIX.'qq';
	$OPT_QQ_PW = $OPT_PREFIX.'pw';
	$OPT_QQ_BCC = $OPT_PREFIX.'bcc';
	
	$OPT_POST_CATS_RULES = $OPT_PREFIX.'catsRules';
	
	$OPT_TITLE_PREFIX = $OPT_PREFIX.'title_prefix';
	$OPT_CONTENT_PLAIN = $OPT_PREFIX.'plain';
	$OPT_CONTENT_LENGTH = $OPT_PREFIX.'length';
	$OPT_CONTENT_PREFIX = $OPT_PREFIX.'content_prefix';
	$OPT_CONTENT_SUFFIX = $OPT_PREFIX.'content_suffix';
	
	add_option($OPT_QQ_NO, '', '');
	add_option($OPT_QQ_PW, '', '');
	add_option($OPT_QQ_BCC, '', '');
	
	add_option($OPT_POST_CATS_RULES, '', '');
	
	add_option($OPT_TITLE_PREFIX, 'blog', '');
	add_option($OPT_CONTENT_PLAIN, '0', '');
	add_option($OPT_CONTENT_LENGTH, '0', '');
	add_option($OPT_CONTENT_PREFIX, '本文自动转发自我的博客: %%LINK%%', '');
	add_option($OPT_CONTENT_SUFFIX, '<br /> --------------------<br />查看原文: %%LINK%%', '');
	
}

/** Deactivate 时响应. */
function post2QZone_deactivate() {
	global $OPT_QQ_NO, $OPT_QQ_PW, $OPT_QQ_BCC, $OPT_POST_CATS_RULES, $OPT_TITLE_PREFIX, $OPT_CONTENT_PLAIN, $OPT_CONTENT_LENGTH, $OPT_CONTENT_PREFIX, $OPT_CONTENT_SUFFIX;
	
//	delete_option($OPT_QQ_NO);
//	delete_option($OPT_QQ_PW);
//	
//	delete_option($OPT_TITLE_PREFIX);
//	delete_option($OPT_CONTENT_PREFIX);
//	delete_option($OPT_CONTENT_SUFFIX);
}

// 注册init响应
add_action('init', 'Post2Qzone_init');

function Post2Qzone_init() {
	add_action('admin_menu', 'Post2Qzone_config');
}

// 增加配置菜单
function Post2Qzone_config() {
	if (function_exists('add_options_page')) {
		add_options_page('Post2QZone Options', 'Post2Qzone', 'manage_options', 'post2Qzone-config', 'post2Qzone_options');
		// add_submenu_page('plugins.php', 'Post2QZone Options', '配置Post2QZone', 'manage_options', 'wp2qzone-config', 'wp2qzone_config_page');
	}
}

function post2Qzone_options() {
	global $OPT_QQ_NO, $OPT_QQ_PW, $OPT_QQ_BCC, $OPT_POST_CATS_RULES, $OPT_TITLE_PREFIX, $OPT_CONTENT_PLAIN, $OPT_CONTENT_LENGTH, $OPT_CONTENT_PREFIX, $OPT_CONTENT_SUFFIX;
	
	if (!current_user_can('manage_options'))  {
    	wp_die( __('You do not have sufficient permissions to access this page. <br /> 您无权限进入此配置页面.') );
  	}
  	
	if (!empty($_POST['submit'])) {
		update_option($OPT_QQ_NO, $_POST[$OPT_QQ_NO]);
		update_option($OPT_QQ_PW, $_POST[$OPT_QQ_PW]);
		update_option($OPT_QQ_BCC, $_POST[$OPT_QQ_BCC]);
		
		update_option($OPT_POST_CATS_RULES, $_POST[$OPT_POST_CATS_RULES]);

		update_option($OPT_TITLE_PREFIX, $_POST[$OPT_TITLE_PREFIX]);
		update_option($OPT_CONTENT_PLAIN, trim($_POST[$OPT_CONTENT_PLAIN]));
		update_option($OPT_CONTENT_LENGTH, trim($_POST[$OPT_CONTENT_LENGTH]));
		update_option($OPT_CONTENT_PREFIX, str_replace('\\', '', $_POST[$OPT_CONTENT_PREFIX]));
		update_option($OPT_CONTENT_SUFFIX, str_replace('\\', '', $_POST[$OPT_CONTENT_SUFFIX]));
		
		$save_msg = "选项已保存成功！";
	}
?>
<div class="wrap">
<div id="icon-link-manager" class="icon32"></div>
<h2>Post2Qzone设置</h2>
<?php 
if(!empty($save_msg)) {
?>
<p style="padding: .5em; background-color: #aa0; color: #fff; font-weight: bold;"><?php echo $save_msg ?></p>
<?php } ?>

<form name="post2Qzone" method="post" action=""> 

<p>
<strong>1.登陆设置</strong><br />
　　  QQ号码：<input type="text" name="<?php echo $OPT_QQ_NO?>" value="<?php echo get_option($OPT_QQ_NO); ?>"><br />
　     邮箱密码：<input type="password" name="<?php echo $OPT_QQ_PW ?>" value="<?php echo get_option($OPT_QQ_PW); ?>"> QQ邮箱密码(默认为QQ密码)<br />
	请开通QQ邮箱的SMTP服务, 具体可登陆邮箱后进入 设置/账户 配置 页面开启POP3/SMTP服务;
</p>

<p>
<strong>2.发布范围限制</strong><br />
  参与同步目录: <input type="text" name="<?php echo $OPT_POST_CATS_RULES ?>" value="<?php echo get_option($OPT_POST_CATS_RULES); ?>"> 设置参与同步的目录, 留空表示全部同步, 否则请填入目录ID, 多个ID已逗号隔开, 如: "1,2,3"; <br />
</p>

<p>
<strong>3.发布内容设置</strong><br />
	剔除格式: <input type="text" name="<?php echo $OPT_CONTENT_PLAIN ?>" value="<?php echo get_option($OPT_CONTENT_PLAIN); ?>"> 0表示发布为HTML格式, 1表示发布为纯文本格式(将剔除HTML标签)<br />
	发布字数: <input type="text" name="<?php echo $OPT_CONTENT_LENGTH ?>" value="<?php echo get_option($OPT_CONTENT_LENGTH); ?>"> 0表示发布全文, 输入具体字数表示无摘要时截断字数(建议不小于200).<br />
	目标目录: <input type="text" name="<?php echo $OPT_TITLE_PREFIX ?>" value="<?php echo get_option($OPT_TITLE_PREFIX); ?>"> 8个英文或4个汉字以内<br />
	内容前缀: <textarea name="<?php echo $OPT_CONTENT_PREFIX ?>" rows="4"><?php echo get_option($OPT_CONTENT_PREFIX); ?></textarea>  内容前缀, 支持HTML代码, 使用%%LINK%%插入博文地址<br />
	内容后缀: <textarea name="<?php echo $OPT_CONTENT_SUFFIX ?>" rows="4"><?php echo get_option($OPT_CONTENT_SUFFIX); ?></textarea> 内容后缀, 支持HTML代码, 使用%%LINK%%插入博文地址<br />
</p>
<p>
<strong>4.其他设置</strong><br />
	抄送地址：<input type="text" name="<?php echo $OPT_QQ_BCC ?>" value="<?php echo get_option($OPT_QQ_BCC); ?>"> 抄送邮件地址, 请填写Email(选填)<br />
</p>
<p>
<input type="submit" name="submit" class='button-primary' value="保存配置信息">
<?php echo $save_msg; ?>
</p>
</form>

<hr>
<p>并非所有功能都提供了配置界面.<br /> 
<a href="http://liguoliang.com/tag/post2qzone/" target='_blank'>访问插件主页查找更多信息</a>或直接联系:me@liguoliang.com <br>
如果大家觉得插件用着还好, 请推荐给身边的其他博友, 谢谢!
</p>

</div>

<?php } 

// 注册日志发布后的响应函数
add_action('publish_post', 'postToQzone', 0);

/**
 * 新POST发布后响应函数
 * @param $post_ID PostID
 * @return unknown_type
 */
function postToQzone($post_ID){
	global $debug, $POST_LINK_RP, $OPT_PREFIX, $OPT_QQ_NO, $OPT_QQ_PW, $OPT_QQ_BCC, $OPT_POST_CATS_RULES, $OPT_TITLE_PREFIX, $OPT_CONTENT_PLAIN, $OPT_CONTENT_LENGTH, $OPT_CONTENT_PREFIX, $OPT_CONTENT_SUFFIX;
	
	if (!current_user_can('publish_posts'))  {
    		wp_die( __('You do not have sufficient permissions to access this function. <br /> 您无权限使用本方法.') );
  	}
  		
	$qzone = get_post_meta($post_ID, 'postToQzone', true); // 获得Metadata
	if($qzone == "true") {
		printLog("跳过, 如果你需要同步每一次更新, 请编辑插件, 参照注释进行修改. ");
		return; // 如果需要同步每一次更新, 请注释或删除该行. 
	}
	
	// get options
	$qq = get_option($OPT_QQ_NO);
	$qqpw = get_option($OPT_QQ_PW);
	$bcc = get_option($OPT_QQ_BCC);
	
	$catRules = get_option($OPT_POST_CATS_RULES);
	
	$title_prefix = get_option($OPT_TITLE_PREFIX);
	$isPlainText = get_option($OPT_CONTENT_PLAIN);
	$length = get_option($OPT_CONTENT_LENGTH);
	$prefix = get_option($OPT_CONTENT_PREFIX);
	$suffix = get_option($OPT_CONTENT_SUFFIX);
	
	$post_pending_send = get_post($post_ID); // 获得Post
	
	// 检查当前Post是否符合发布目录规则要求.
	if(Post2EmailUtils::isPostInCatList($post_pending_send, $catRules)) {
		$post_title = $post_pending_send->post_title; // Post标题
		$post_content = Post2EmailUtils::getContents($post_pending_send, $length, $isPlainText); //$post_pending_send->post_content; // Post内容
		$post_link = get_permalink($post_ID); // Post地址
	
		// 处理标题及内容
		$post_link = '<a href="'.get_permalink($post_ID).'">'.get_permalink($post_ID).'</a>'; // 获得博客原文链接
		$prefix = str_ireplace($POST_LINK_RP, $post_link, $prefix); // 替换通配符
		$suffix = str_ireplace($POST_LINK_RP, $post_link, $suffix);
	
		if(!empty($post_title)) {
			$post_title = '['.$title_prefix.']'.$post_title;
		}
		$post_content = $prefix.'<br />'.$post_content.'<br />'.$suffix;

		sendPostByPhpMailer($qq, $qqpw, $bcc, $post_title, $post_content); // 发送邮件 TODO: 尝试在这里遍历所有邮件目标, 进行发送.
		// add/update post_meta
		if(!update_post_meta($post_ID, 'postToQzone', 'true')) {
			add_post_meta($post_ID, 'postToQzone', 'true', true);
		}

	}else {
		if($debug) {
			echo  "<br /> 该文章不在发布范围之内, 跳过处理.";
			exit();
		}
	}
}

/**
 * 使用PHPMailer发送邮件 - SMTP方式 
 * PHPMailer使用指南: http://deepakssn.blogspot.com/2006/06/gmail-php-send-email-using-php-with.html
 * @param $subject 邮件标题. 将作为日志标题.
 * @param $body 邮件内容. 将作为日志内容
 * @return null
 */
function sendPostByPhpMailer($qq, $qqpw, $bcc, $title, $body){
	global $debug;
	if ( !class_exists('PHPMailer') ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
	}
	$mail = new PHPMailer();
	$mail->SMTPDebug = $debug;
	
	$mail->IsSMTP();
	$mail->Mailer   = "smtp";
	$mail->CharSet  = 'utf-8';
	$mail->Encoding = 'base64';
	$mail->IsHTML(true);
	$mail->SMTPAuth = true;
	$mail->Host     = "smtp.qq.com";
	$mail->SMTPSecure = ssl;
	$mail->Port = 465;
	$mail->Username = $qq."@qq.com";
	$mail->Password = $qqpw;
	$mail->From     = $qq."@qq.com";
	$mail->FromName = $qq;  
	
//	$mail->AddAddress($qq."@qzone.qq.com");
//	if(!empty($bcc)) {
//		$mail->AddAddress($bcc);
//	}
	
	$recipients = array();
	$recipients[] = $qq."@qzone.qq.com";
	$recipients[] = $bcc;
	
	foreach ($recipients as $recipient) {
		if(!empty($recipient)) {
			$mail->ClearAllRecipients(); // remove previously set addresses.
			$mail->ClearReplyTos();
			$mail->AddAddress($recipient);
			$mail->Subject = $title;
			$mail->Body    = $body;
			
			if($debug) {
				echo "标题: [".$title."]<br />";
				echo "内容: [".$body;
				echo "<br />]-------------------<br />使用账号:<br />";
				echo $qq."抄送到:".$bcc."<br />";
				echo "<br />发送结果: <br />".$mail->Send();
				echo "<br /> ----------------------<br />Debug结束, 请检查内容是否发布到QQ或指定抄送邮箱";
				//exit();
			}else {
				$mail->Send();
			}
		}
	}
}


function printLog($logInfo){
	global $debug;
	if($debug) {
		echo $logInfo."<br />";
	}
}
?>