<?php

class LhAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new IndexModel();
        $this->assign('css',DIRS);
        $this->index();      
    }
	
    function index(){
		
		$pagesize = 30;//每页显示总条数
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
		$areaAllNumber = $_GET['num'];
		if(!$areaAllNumber){
			$areaAllNumber = $this->tmp_mod->lhWebNum();//总数
		}
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,'/'.DIRS.'index.php/lh/num/'.$areaAllNumber.'/page/',2);
		$lists = $this->tmp_mod->getLh($start,$pagesize);
		$page = $list->subPageCss2();
		$this->assign('title','被举报拉黑域名');
		$this->assign('title2',WEB_NAME);
		$this->assign('page',$page);
		$this->assign('list',$lists);
		$this->display('www/lh.html');
    }
   
}