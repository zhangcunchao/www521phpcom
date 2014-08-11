<?php

class GqAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new IndexModel();
        $this->assign('css',DIRS);
        $this->index();      
    }
	
    function index(){
		$where = time() - WEB_TIME*86400;
		$pagesize = 30;//每页显示总条数
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
		$areaAllNumber = $_GET['num'];
		if(!$areaAllNumber){
			$areaAllNumber = $this->tmp_mod->gqWebNum($where);//总数
		}
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,'/'.DIRS.'index.php/Gq/num/'.$areaAllNumber.'/page/',2);
		$lists = $this->tmp_mod->getgq($where,$start,$pagesize);
		$page = $list->subPageCss2();
		
		$this->assign('title','过期网站');
		$this->assign('time',WEB_TIME);
		$this->assign('title2',WEB_NAME);
		$this->assign('page',$page);
		$this->assign('list',$lists);
		$this->display('www/gq.html');
    }
   
}