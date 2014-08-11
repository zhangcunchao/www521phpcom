<?php

class Action extends Tpl
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set(TIMEZONE);
    }

    function run()
    {  	
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';
        if (method_exists($this, $action)) {    // method_exists() 检查类的方法是否存在
            eval('$this->' . $action . '();');
        } else {
            exit('请不要尝试不存在的方法');
        }
    }
    

    //php -> js

    function jsAlert($msg, $url = '')
    {
        $str = '<script type="text/javascript">';
        $str.="alert('" . $msg . "');";

        if ($url != '') {
            $str.="window.location.href='{$url}';";
        } else {
            $str.="window.history.back();";
        }
        echo $str.='</script>';
    }
    //smtp_zlh smpt类
    function publicSendEmail()
    {
        global $g_email_order;
        global $g_email_order_content;
        global $g_email_send;
        try {
            $smtp = new smtp_zlh($g_email_order['MailServer'], true, $g_email_order['MailId'], $g_email_order['MailPw']);
            $smtp->setDebug(false);
            $smtp->setMagicFile('\Org\magic');
            $smtp->setSubject($g_email_order_content['Title']);
            $smtp->setFrom($g_email_send['SetFrom']);
            $smtp->addTo($g_email_send['AddTo']);                                                             //收件人    
            $smtp->addCc($g_email_send['AddCc1']);                   //抄送
            $smtp->addCc($g_email_send['AddCc2']);
            $smtp->setMimeMail($g_email_order_content['pContent']);
            $smtp->setMailType('html');
            //$smtp->addAttachment('Spark使用指南.doc');     
            //$smtp->addAttachment('Spark使用指南.rar');     
            $smtp->send();
            return true;
        } catch (Exception $e) {
            // echo 'AAAA';    
            //  echo 'Caught exception: ',
            //$e->getMessage(), "\n";
            $this->jsAlert('邮件发送失败', '');
            return false;
        }
    }

    function session()
    {
        echo '操作成功';
    }

    function error($mes, $url)
    {
        $this->assign("mes", $mes);
        $this->assign("url", $url);
        $this->display('public/error.html');
    }
	/**
	 * @title   获取真实ip
	 * @author  zhangcunchao
	 */
	function getIp(){
	  $cip = getenv('REMOTE_ADDR');
	  $cip1 = getenv('HTTP_CLIENT_IP');
	  $cip2 = getenv('HTTP_X_FORWARDED_FOR');
	  $cip1 ? $cip = $cip1 : null;
	  $cip2 ? $cip = $cip2 : null;
	  return $cip;
	}
	/**
	 * @title  记录日志
	 * @author zhangcunchao
	 */
	function innerLog($action,$yesno){
		$data['uid']     = $_SESSION['id'];
		$data['lname']   = $action;
		$data['logtime'] = time();
		$data['logip']   = $this->getIp();
		$data['yesno']   = $yesno;
		$mod = new Model();
		$mod->inLog($data);
	}
}