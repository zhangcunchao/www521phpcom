<?php

class Smtp_zlh{   
	//相关属性定义   
	  private $_host;                                   //smtp服务器地址     
	  private $_auth;                                   //是否需要身份验证     
	  private $_user;                                   //smtp帐号     
	  private $_pass;                                   //smtp密码     
	  private $_debug = false;                          //是否显示调试信息     
	  private $_magicFile;                              //mime文件所在路径    
	  private $_Subject;                                //邮件主题     
	  private $_From;                                   //发送人邮箱地址     
	  private $_To = array();                           //收件人     
	  private $_Cc = array();                           //抄送     
	  private $_Bcc = array();                          //暗送     
	  private $_attachment = array();                   //附件     
	  private $_mailtype = 'html';                      //邮件类型(''text'':纯文本,''html'':HTML邮件)     
	  private $_charset = 'utf8';                     //邮件编码     
	  private $_mimemail;                               //邮件内容     
	  private $_socket;                                 //smtp连接     
	  private $_port = 25;                              //smtp端口     
	  private $_timeout = 30;                           //超时时间       
	  
	  //构造函数    
	  public function __construct($host, $auth = false, $user = '', $pass = '')     { 
	  	$this->_host = $host;        
	  	$this->_auth = $auth;        
	  	$this->_user = $user;        
	  	$this->_pass = $pass;     
	  }      

	  //设置是否显示调试信息     
	  public function setDebug($boolDebug)     {         
	  	$this->_debug = $boolDebug;     
	  }       
	  
	  //设置mime文件所在路径     
	  public function setMagicFile($filename)     {        
	  	$this->_magicFile = $filename;     
	  }       
	  
	  //设置邮件主题     
	  public function setSubject($str)     {     
	  	$this->_Subject = $str;     
	  }      

	  //设置发件人     
	  public function setFrom($email)     {         
	  	$email = $this->stripComment($email);        
	  	$this->_From = $email;  
	  }       
	  
	  //添加收件人     
	  public function addTo($email)     {         
	  	$email = $this->stripComment($email);         
	  	$this->_To[] = $email;     
	  }       
	  //添加抄送人     
	  public function addCc($email)     {         
	  	$email = $this->stripComment($email);         
	  	$this->_Cc[] = $email;     
	  }     
	  //添加暗送人    
	 public function addBcc($email)     {        
	    $email = $this->stripComment($email);         
	    $this->_Bcc[] = $email;    
	 }      
	//添加附件     
	 public function addAttachment($filename)     {         
	    if(is_file($filename)) $this->_attachment[] = $filename;    
	 }      
	 //设置邮件类型   
	 public function setMailType($type)     {    
	      	$this->_mailtype = $type;    
	   }     
	    //设置邮件编码    
	public function setCharset($strCharset)     {    
	          $this->_charset = $strCharset;   
	  }   

    //设置邮件内容    
	public function setMimeMail($str)     {
        $boundary = uniqid('');          
		$this->_mimemail = "From: " . $this->_From . "\r\n";         
		$this->_mimemail .= "Reply-To: " . $this->_From . "\r\n";         
		$this->_mimemail .= "To: " . implode(",", $this->_To) . "\r\n";  
		if(count($this->_Cc)) $this->_mimemail .= "Cc: " . implode(",", $this->_Cc) . "\r\n";        
		if(count($this->_Bcc)) $this->_mimemail .= "Bcc: " . implode(",", $this->_Bcc) . "\r\n";           
		$this->_mimemail .= "Subject: " . $this->_Subject . "\r\n";        
		$this->_mimemail .= "Message-ID: <" . time() .  "." . $this->_From . ">\r\n";        
		$this->_mimemail .= "Date: " . date("r") . "\r\n";         
		$this->_mimemail .= "MIME-Version: 1.0\r\n";        
		$this->_mimemail .= "Content-type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n\r\n";         
		$this->_mimemail .= "--" . $boundary . "\r\n";           
		if($this->_mailtype == 'text')         {             
			$this->_mimemail .= "Content-type: text/plain; charset=\"" . $this->_charset . "\"\r\n\r\n";         
			}        
			else if($this->_mailtype == 'html')         {            
				$this->_mimemail .= "Content-type: text/html; charset=\"" . $this->_charset . "\"\r\n\r\n";         
				}         
				$this->_mimemail .= $str . "\r\n\r\n";          
				if(count($this->_attachment))         {
					$finfo = new finfo(FILEINFO_MIME, $this->_magicFile);             
					foreach($this->_attachment as $k => $filename)             {
						$f = @fopen($filename, 'r');                 
						if(!$f) continue;                   
						$mimetype = $finfo->file(realpath($filename));                
						$attachment = @fread($f, filesize($filename));                
						$attachment = base64_encode($attachment);                
						$attachment = chunk_split($attachment);                   
						$this->_mimemail .= "--" . $boundary . "\r\n";                
						$this->_mimemail .= "Content-type: " . $mimetype . "; name=" . basename($filename) . "\r\n";                
						$this->_mimemail .= "Content-disposition: attachment; filename=" . basename($filename) . "\r\n";                
						$this->_mimemail .= "Content-transfer-encoding: base64\r\n\r\n";                
						$this->_mimemail .= $attachment . "\r\n\r\n";                  
						unset($f);                
						unset($mimetype);                
						unset($attachment);            
						}         
				}           
		$this->_mimemail .= "--" . $boundary . "--";     
		} 
		
	    public function send(){
			$arrToEmail = $this->_To;         
			if(count($this->_Cc)) 
				$arrToEmail = array_merge($arrToEmail, $this->_Cc);         
			if(count($this->_Bcc)) 
				$arrToEmail = array_merge($arrToEmail, $this->_Bcc);          
			$this->connect();         
			$this->sendCMD('HELO localhost');         
			$this->smtpOK();           
			if($this->_auth)         {             
				$this->sendCMD('AUTH LOGIN ' . base64_encode($this->_user));            
				$this->smtpOK();             
				$this->sendCMD(base64_encode($this->_pass));            
				$this->smtpOK();         
				}         
			$this->sendCMD('MAIL FROM:<' . $this->_From . '>');        
			$this->smtpOK();           
			foreach($arrToEmail as $k => $toEmail)         {             
				$this->sendCMD('RCPT TO:<' . $toEmail . '>');            
				$this->smtpOK();        
			}          
			$this->sendCMD('DATA');        
			$this->smtpOK();        
			$this->sendCMD($this->_mimemail);         
			$this->smtpOK();         
			$this->sendCMD('.');         
			//$this->smtpOK();  
			$this->smtpOK();
			$this->disconnect();  
			return true;  
		}
    //连接smtp服务器     
	private function connect(){         
		$fp = @fsockopen($this->_host, $this->_port, $errno, $errstr, $this->_timeout);          
		if(!$fp){            
			if($this->_debug) $this->showMessage('错误:无法与smtp服务器建立连接！');          
				die(); 
			}else {          
				$this->_socket = $fp; if($this->_debug) 
				$this->showMessage('正在与smtp服务器建立连接...成功！');         
			}    
	} 
	 //关闭smtp服务器连接   
	private function disconnect(){ 
		$this->sendCMD('QUIT');         
		@fclose($this->_socket);         
		$this->_socket = null;         
		if($this->_debug) $this->showMessage('断开与smtp服务器的连接');     
	}      

	//显示信息    
	 private function showMessage($msg){
	 	echo "[" . date("H:i") . "]" . $msg . "<br/>";    
	 }      
	//发送指令   
	 private function sendCMD($cmd){ 
	 	@fputs($this->_socket, $cmd . "\r\n");        
	 	if($this->_debug) $this->showMessage($cmd);     
	 }      
	 //判断指令是否成功   
	  private function smtpOK(){
	  	 $res = str_replace("\r\n", "", @fgets($this->_socket, 512));        
	     //if(ereg("^[23]", $res))      
	    if(preg_match("/^[23]/", $res)){
	    	if($this->_debug){
	    		$this->showMessage('请求成功！');     
	    		return true;
	    	}    
	    } else{
	    	if($this->_debug) $this->showMessage('错误:服务器返回信息<' . $res . '>');             
	    	$this->disconnect();         
	    }
	 }   

	 //过滤邮箱地址中的非法字符  
	private function stripComment($email)     {      
		/**  ereg 与 ereg_replace在5.3中已经取消,由于是内部使用,所以对此不做处理.      
		     $comment = "\([^()]*\)";          
		      //while(ereg($comment, $email))        
		       while(preg_match($comment, $email))         {             
		       $email = ereg_replace($comment, "", $email);           
		         //$email = preg_match($comment, "", $email);         }         
		             $email = ereg_replace("([ \t\r\n])+", "", $email);       
	 //$email = preg_match("([ \t\r\n])+", "", $email);       
	   $email = ereg_replace("^.*<(.+)>.*$", "\1", $email);       
		         //$email = preg_match("^.*<(.+)>.*$", "\1", $email);     
		          * return $email;     
		       */      
		   return $email;   
	 }
	} 

	                          	                                    


































?>