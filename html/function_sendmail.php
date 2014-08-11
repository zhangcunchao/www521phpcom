<?php
/*
 * 发送邮件引擎
 * Created on 2010-4-15
 * This is NOT a freeware!
 * One product of Creartive(Beijing) Culture Communication Co.,Ltd.
 * http://www.jujf.com
 *
 * @author:Tymos
 * @Email:tymos@qq.com
 * @Url: http://www.tymos.com
 * 
 */

/*
 * 初始化配置文件
 */

if(!isset($mailconf) || !is_array($mailconf)){
   //  $mail =include 'data/message/setmail.php';
	$mailconf = array(
	'mailnotify'=>1,
	'mailfrom'=>'zhangcunchao_cn@163.com',
	'mailfromname'=>'OKI',
	'mailmethod'=>'smtp',
	'mailauth'=>1,
	'mailhost'=>'smtp.163.com',
	'mailport'=>25,
	'mailuser'=>'zhangcunchao_cn@163.com',
	'mailpass'=>'zcc5574302,./',
	//'mailuser'=>'zhu_201001@163.com',
	//'mailpass'=>'zhuyan',
	'mailtype'=>'html'
	);
}

function sendmail($email_to, $email_subject, $email_message, $email_from = '') {
	global $mailconf,$mailTitleHead;
	
	//add by tymos 2011-6-27
	$tmp = explode('@',$email_to);
	if($tmp[1] == 'hotmail.com' || $tmp[1] == 'live.cn'){
		$mailconf['mailmethod'] = 'mail';
		//$mailconf['mailtype'] == 'text';
		//$email_message = 'hello hotmail users! this is a test!';
	}
	
	$charset = 'UTF-8';
	$version = '1.0';
	$maildelimiter = "\n";
	$email_subject = '=?'.$charset.'?B?'.base64_encode(str_replace("\r", '', str_replace("\n", '', ''.$email_subject))).'?=';
	$email_message = chunk_split(base64_encode(str_replace("\r\n.", " \r\n..", str_replace("\n", "\r\n", str_replace("\r", "\n", str_replace("\r\n", "\n", str_replace("\n\r", "\r", $email_message)))))));
	$email_from = $email_from == '' ? '=?'.$charset.'?B?'.base64_encode('okidata.com.cn')."?= <okiservice@okidata.com.cn>" : (preg_match('/^(.+?) \<(.+?)\>$/',$email_from, $from) ? '=?'.$charset.'?B?'.base64_encode($from[1])."?= <$from[2]>" : $email_from);
	foreach(explode(',', $email_to) as $touser) {
		$tousers[] = preg_match('/^(.+?) \<(.+?)\>$/',$touser, $to) ? ($mailusername ? '=?'.$charset.'?B?'.base64_encode($to[1])."?= <$to[2]>" : $to[2]) : $touser;
	}
	$email_to = implode(',', $tousers);
	
	if($mailconf['mailtype'] == 'html'){
		$headers = "From: $email_from{$maildelimiter}X-Priority: 3{$maildelimiter}X-Mailer: TymosMail $version{$maildelimiter}MIME-Version: 1.0{$maildelimiter}Content-type: text/html; charset=$charset{$maildelimiter}Content-Transfer-Encoding: base64{$maildelimiter}";
	}elseif($mailconf['mailtype'] == 'text'){
		$headers = "From: $email_from{$maildelimiter}X-Priority: 3{$maildelimiter}X-Mailer: TymosMail $version{$maildelimiter}MIME-Version: 1.0{$maildelimiter}Content-type: text/plain; charset=$charset{$maildelimiter}Content-Transfer-Encoding: base64{$maildelimiter}";
	}else{
		$headers = "From: $email_from{$maildelimiter}X-Priority: 3{$maildelimiter}X-Mailer: TymosMail $version{$maildelimiter}MIME-Version: 1.0{$maildelimiter}Content-type: text/plain; charset=$charset{$maildelimiter}Content-Transfer-Encoding: base64{$maildelimiter}";
	}
	
	
	$mailconf['mailport'] = $mailconf['mailport'] ? $mailconf['mailport'] : 25;
	
	if($mailconf['mailmethod'] == 'mail' && function_exists('mail')){
		@mail($email_to, $email_subject, $email_message, $headers);
	}elseif($mailconf['mailmethod'] == 'smtp'){
		if(!$fp = @fsockopen($mailconf['mailhost'], $mailconf['mailport'], $errno, $errstr, 5)) {
			errlog('<SMTP> ('.$mailconf['mailhost'].':'.$mailconf['mailport'].') Unable to connect to the SMTP server!');
			jsalert('连接邮件服务器失败，发送邮件失败！请稍后再试。','/users');
			exit();
		}
	 	stream_set_blocking($fp, true);
	
	 	$lastmessage = fgets($fp, 512);
	 	if(substr($lastmessage, 0, 3) != '220') {
			errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' CONNECT - '.$lastmessage);
		}
	 	fputs($fp, ($mailconf['mailauth'] ? 'EHLO' : 'HELO')." Newanew\r\n");
	 	$lastmessage = fgets($fp, 512);
	 	if(substr($lastmessage, 0, 3) != 220 && substr($lastmessage, 0, 3) != 250) {
			errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' HELO/EHLO - '.$lastmessage);
		}
	
		while(1) {
		if(substr($lastmessage, 3, 1) != '-' || empty($lastmessage)) {
			break;
		}
		$lastmessage = fgets($fp, 512);
		}
	
		if($mailconf['mailauth']) {
			fputs($fp, "AUTH LOGIN\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 334) {
				errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' AUTH LOGIN - '.$lastmessage);
			}
	
			fputs($fp, base64_encode($mailconf['mailuser'])."\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 334) {
				errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' USERNAME - '.$lastmessage);
			}
	
			fputs($fp, base64_encode($mailconf['mailpass'])."\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 235) {
				errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' PASSWORD - '.$lastmessage);
			}
	
			$email_from = $mailconf['mailfrom'];
		}
	
		fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $email_from).">\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 250) {
			fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $email_from).">\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 250) {
				errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' MAIL FROM - '.$lastmessage);
			}
		}
	
		$email_tos = array();
		foreach(explode(',', $email_to) as $touser) {
			$touser = trim($touser);
			if($touser) {
				fputs($fp, "RCPT TO: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $touser).">\r\n");
				$lastmessage = fgets($fp, 512);
				if(substr($lastmessage, 0, 3) != 250) {
					fputs($fp, "RCPT TO: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $touser).">\r\n");
					$lastmessage = fgets($fp, 512);
					errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' RCPT TO - '.$lastmessage);
				}
			}
		}
	
		fputs($fp, "DATA\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 354) {
			errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' DATA - '.$lastmessage);
		}
		$headers .= 'Message-ID: <'.date('YmdHs').'.'.substr(md5($email_message.microtime()), 0, 6).rand(100000, 999999).'@'.$_SERVER['HTTP_HOST'].">{$maildelimiter}";
	
		fputs($fp, "Date: ".date('r')."\r\n");
		fputs($fp, "To: ".$email_to."\r\n");
		fputs($fp, "Subject: ".$email_subject."\r\n");
		fputs($fp, $headers."\r\n");
		fputs($fp, "\r\n");
		fputs($fp, "$email_message\r\n.\r\n");
		$lastmessage = fgets($fp, 512);
		if(substr($lastmessage, 0, 3) != 250) {
			errlog('<SMTP>'.$mailconf['mailhost'].':'.$mailconf['mailport'].' END - '.$lastmessage);
		}
	
		fputs($fp, "QUIT\r\n");
	
	}else{
		ini_set('SMTP', $mailconf['mailhost']);
		ini_set('smtp_port', $mail['mailport']);
		ini_set('sendmail_from', $email_from);
		@mail($email_to, $email_subject, $email_message, $headers);
	
	}
}

?>
