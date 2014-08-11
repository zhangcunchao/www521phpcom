<?php

class ClickAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new IndexModel();
        $this->assign('css',DIRS);
        $this->index();      
    }
	
    function index(){
		
		$pagesize = 100;//每页显示总条数
	    $start = 0;
	    $where = time() - WEB_TIME*86400;
	    $result = $this->tmp_mod->webList($start,$pagesize,$where,'innum desc');

		$this->assign('title','TOP100点入排行');
		$this->assign('title2',WEB_NAME);
		$this->assign('keywords',WEB_KEYWORDS);
		$this->assign('info',WEB_INFO);
		$this->assign('list',$result);
		$this->display('www/click.html');
    }
   
}