<?php

class HtmlAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new HtmlModel();
        $this->assign('css',DIRS);
        $this->index();      
    }
	
    function index(){
		$k = $_GET['k'];
		if($k){
			$rs = $this->tmp_mod->getOneWeb($k);
			if($rs){
				global $g_url;
				$rs2 = $this->tmp_mod->getOneWebData($rs['id']);
				$this->assign('webname',WEB_NAME);
				$this->assign('url',$rs['url']);
				$this->assign('id',$rs['id']);
				$this->assign('web',$g_url);
				$this->assign('ktime',$rs['catetime']);
				$this->assign('html',$rs2['html']);
				$this->display('www/html.html');
			}else{
				$this->jsAlert('对不起，本站查无此快照！');
				exit;
			}
		}else{
			header("location:/".DIRS);
			exit;
		}
    }
}