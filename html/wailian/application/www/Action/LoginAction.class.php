<?php
class LoginAction extends Action
{

    function __construct()
    {	
        parent::__construct();
		$this->assign('css',DIRS);
        $this->index();
       
    }
    
    function index()
    {
        $this->assign('title','新站提交');
	    $this->assign('time',WEB_TIME);
		$this->assign('title2',WEB_NAME);
		$this->assign('keywords',WEB_KEYWORDS);
		$this->assign('info',WEB_INFO);
		$this->display('www/login.html');
    }
}