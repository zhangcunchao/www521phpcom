<?php

class IndexAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new IndexModel();
        $this->assign('css',DIRS);
        $this->index();      
    }
	
    function index(){
		include 'add.php';
		$pagesize = 10;//每页显示总条数
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
	    $where = time() - WEB_TIME*86400;
	    $areaAllNumber = $this->tmp_mod->webNum($where);//总数
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,'/'.DIRS.'index.php/index/page/',2);
	    $result = $this->tmp_mod->webList($start,$pagesize,$where);
	    $page = $list->subPageCss2();
		//过期域名数
		$gqweb = $this->tmp_mod->gqWebNum($where);
		//拉黑域名数
		$lhweb = $this->tmp_mod->lhWebNum();
		$this->assign('title',WEB_NAME);
		$this->assign('title2',WEB_NAME2);
		$this->assign('keywords',WEB_KEYWORDS);
		$this->assign('info',WEB_INFO);
		$this->assign('list',$result);
		$this->assign('page',$page);
		$this->assign('gqweb',$gqweb);
		$this->assign('lhweb',$lhweb);
		$this->assign('allnum',$areaAllNumber);
		$this->display('www/index.html');
    }
   
}