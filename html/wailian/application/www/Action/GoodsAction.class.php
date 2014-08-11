<?php
class GoodsAction extends Action
{

    function __construct()
    {
    	if (!isset($_SESSION['id'])||!isset($_SESSION['name'])) {
			header("location:index.php?m=Login");
		}
		if(!in_array('1',$_SESSION['power'])){
			$this->jsAlert('对不起,您没有管理该功能的权限','index.php?m=index&a=main');
			exit;
		}
        parent::__construct();
        $this->tmp_mod = new GoodsModel();
    }
    /**
     *@title  商品信息管理
     *@author zhangcunchao 
     */
    function index(){
       $action = 'index';
       $this->assign('action',$action);
       $this->display('www/goods.html');
    }
	/**
	 * @title  商品类别添加
	 * @author zhangcunchao
	 */
    function addType(){
    	$action = 'addType';
    	$title = '商品类别添加';
        $this->assign('action',$action);
        $this->assign('title',$title);
        $this->display('www/goods.html');
    }
    /**
     * @title  商品类别添加处理
     * @author zhangcunchao
     */
    function doAddType(){
    	$tname  = $this->tmp_mod->H(getParam('tname'));
    	if(!empty($tname)){
    		$data['tname'] = $tname;
    		$rs = $this->tmp_mod->addType($data);
    		if($rs){
    			parent::innerLog('添加商品类别：'.$tname,'1');
    			$this->jsAlert('操作成功','index.php?m=goods&a=addType');
    			exit;
    		}else{
    			parent::innerLog('添加商品类别：'.$tname,'0');
    			$this->jsAlert('操作失败','index.php?m=goods&a=addType');
    			exit;
    		}
    	}else{
    		$this->jsAlert('操作失误','index.php?m=goods&a=addType');
    		exit;
    	}
    }
    /**
     * @title  商品类别列表
     * @author zhangcunchao
     */
    function typeList(){
    	$title  = '商品类别管理';
        $action = 'typeList';
        $pagesize = 12;//每页显示总条数
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
	    $areaAllNumber = $this->tmp_mod->typeNum();//总数
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,'index.php?m=goods&a=typeList&page=',2);
	    $result = $this->tmp_mod->typeList($start,$pagesize);
	    $page = $list->subPageCss2();
        $this->assign('action',$action);
        $this->assign('type',$result);
        $this->assign('now',$current_page);
        $this->assign('page',$page);
        $this->assign('title',$title);
        $this->display('www/goods.html');
    }
    /**
     * @title  编辑类别信息
     * @author zhangcunchao
     */
    function editType(){
    	$id = $this->tmp_mod->H(getParam('id'));
     	if(!empty($id)){
     		$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     		$title  = '编辑类别信息';
     		$action = 'editType'; 
     		$result = $this->tmp_mod->getOneType($id); 		
     		$this->assign('title',$title);
     		$this->assign('action',$action);
     		$this->assign('type',$result);
     		$this->assign('page',$page);
       		$this->display('www/goods.html');
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=typeList');
			exit;
     	}
    }
    /**
     * @title  处理编辑类别信息
     * @author zhangcunchao
     */
    function doEditType(){
    	$id     = $this->tmp_mod->H(getParam('id'));
    	$tname  = $this->tmp_mod->H(getParam('tname'));
    	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
    	if(!empty($tname)&&!empty($id)){
    		$data['tname'] = $tname;
    		$rs = $this->tmp_mod->editType($id,$data);
    		if($rs){
    			parent::innerLog('编辑商品类别：'.$tname,'1');
    			$this->jsAlert('操作成功','index.php?m=goods&a=typeList&page='.$page);
    			exit;
    		}else{
    			parent::innerLog('编辑商品类别：'.$tname,'0');
    			$this->jsAlert('操作失败','index.php?m=goods&a=typeList&page='.$page);
    			exit;
    		}
    	}else{
    		$this->jsAlert('操作失误','index.php?m=goods&a=typeList&page='.$page);
    		exit;
    	}
    }
    /**
     * @title  删除指定的类别
     * @author zhangcunchao
     */
    function delType(){
    	$id     = $this->tmp_mod->H(getParam('id'));
    	$tname  = $this->tmp_mod->H(getParam('tname'));
    	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
    	if(!empty($tname)&&!empty($id)){
    		$rs = $this->tmp_mod->delType($id);
    		if($rs){
    			parent::innerLog('删除商品类别：'.$tname,'1');
    			$this->jsAlert('操作成功','index.php?m=goods&a=typeList&page='.$page);
    			exit;
    		}else{
    			parent::innerLog('删除商品类别：'.$tname,'0');
    			$this->jsAlert('操作失败','index.php?m=goods&a=typeList&page='.$page);
    			exit;
    		}
    	}else{
    		$this->jsAlert('操作失误','index.php?m=goods&a=typeList&page='.$page);
    		exit;
    	}
    }
    /**
     * @title  类别批量操作
     * @author zhangcunchao
     */
    function typeAction(){
        $action  = $this->tmp_mod->H(getParam('action'));
     	$id = $_POST['checkbox'];
     	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     	if(!empty($action)&&!empty($id[0])){ 		
     		$id = implode(',',$id);
     		//获取指定的部门名称
     		$list = $this->tmp_mod->getTypeList($id);
     		$list = implode(',',$list);
     		if(3==$action){
     			$rs = $this->tmp_mod->delType($id);
     			if($rs){
     				parent::innerLog('批量删除商品类别信息：'.$list,'1');
     				$this->jsAlert('批量操作成功','index.php?m=goods&a=typeList&page='.$page);
					exit;
     			}else{
     				parent::innerLog('批量删除商品类别信息：'.$list,'0');
     				$this->jsAlert('批量操作失败','index.php?m=goods&a=typeList&page='.$page);
					exit;
     			}
     		}		
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=typeList&page='.$page);
			exit;
     	}
    }
    /**
     * @title  商品信息添加
     * @author zhangcunchao
     */
    function addGoods(){
    	$action = 'addGoods';
    	$title = '商品信息添加';
    	//商品类别
    	$g_type = $this->tmp_mod->getTypeSelect();
    	$type   = General::createSelect($g_type,'type_id','type_id','1','商品类别');
    	//是否参与库存
    	global $g_yesno;
    	$yesno = General::createRadio($g_yesno,'yesno','1');
    	unset($g_yesno);
        $this->assign('action',$action);
        $this->assign('type',$type);
        $this->assign('title',$title);
         $this->assign('yesno',$yesno);
        $this->display('www/goods.html');
    }
    function innerAjax(){
    	$gong = $this->tmp_mod->H(getParam('txt'));
    	eval("\$o=$gong;");
	    $preg= '/[A-Za-z]/';  
		if(preg_match($preg,$o)){ 
		         echo 'no'; 
		}else{
		        echo $o;
		}
    }
 	//厂家
    function company(){
    	 $action = 'company';
    	 //获取所有的厂家
    	 $company = $this->tmp_mod->getAllCompany();
         $this->assign('action',$action);
         $this->assign('company',$company);
         $this->display('www/goods.html');
    }
	function company2(){
    	 $action = 'company2';
    	 //获取所有的厂家
    	 $pinyin = $_GET['pinyin'];
    	 $company = $this->tmp_mod->getAllCompany($pinyin);
         $this->assign('action',$action);
         $this->assign('company',$company);
         $this->display('www/goods.html');
    }
	function company3(){
    	 $action = 'company3';
    	 //获取所有的厂家
    	 $pinyin = $_GET['pinyin'];
    	 $company = $this->tmp_mod->getAllCompany($pinyin);
         $this->assign('action',$action);
         $this->assign('company',$company);
         $this->display('www/goods.html');
    }
    /**
     * @title  商品添加处理
     * @author zhangcuchao
     */
    function doAddGoods(){
    	$gname        = $this->tmp_mod->H(getParam('gname'));
    	$type_id      = $this->tmp_mod->H(getParam('type_id'));
    	$etalon       = $this->tmp_mod->H(getParam('etalon'));
    	$unit         = $this->tmp_mod->H(getParam('unit'));
    	$inner_price  = $this->tmp_mod->H(getParam('inner_price'));
    	$out_price    = $this->tmp_mod->H(getParam('out_price'));
    	$min_price    = $this->tmp_mod->H(getParam('min_price'));
    	$min_count    = $this->tmp_mod->H(getParam('min_count'));
    	$company_id    = $this->tmp_mod->H(getParam('company_id'));
    	$yesno        = $this->tmp_mod->H(getParam('yesno'));
    	if(!empty($gname)&&!empty($type_id)&&!empty($etalon)&&!empty($unit)&&!empty($inner_price)
    	&&!empty($out_price)&&!empty($min_price)&&!empty($min_count)&&!empty($company_id)){
    		$data = array(
    			'gname'       =>$gname,
	    		'type_id'     =>$type_id,
	    		'etalon'      =>$etalon,
	    		'unit'        =>$unit,
	    		'inner_price' =>$inner_price,
    			'company_id' =>$company_id,
	    		'out_price'   =>$out_price,
	    		'min_price'   =>$min_price,
	    		'min_count'   =>$min_count,
	    		'yesno'       =>$yesno,
	    		'count'       =>0,
    		);
    		$rs = $this->tmp_mod->addGoods($data);
    		if($rs){
    			parent::innerLog('添加商品信息：'.$gname,'1');
    			$this->jsAlert('操作成功','index.php?m=goods&a=addGoods');
				exit;
    		}else{
    			parent::innerLog('添加商品信息：'.$gname,'0');
    			$this->jsAlert('操作失败','index.php?m=goods&a=addGoods');
				exit;
    		}
    	}else{
    		$this->jsAlert('操作失误','index.php?m=goods&a=addGoods');
			exit;
    	}
    }
    /**
     * @title  商品列表
     * @author zhangcunchao
     */
    function goodsList(){
       $title  = '商品信息管理';
       $action = 'goodsList';
       $pagesize = 12;//每页显示总条数
	   $current_page = $this->tmp_mod->H(getParam('page'));
	   $goods    = $this->tmp_mod->H(getParam('goods'));
	   $type_id  = $this->tmp_mod->H(getParam('type_id'));
	   $id       = $this->tmp_mod->H(getParam('id'));
       $cname    = $this->tmp_mod->H(getParam('cname'));
	   $current_page = $current_page ? $current_page : 1;//当前选中的页
	   $start = ($current_page - 1)*$pagesize;
	   $url = 'index.php?m=goods&a=goodsList';
       if($goods){
        	$this->assign('gname',$goods);
    		$url .='&goods='.$goods;
    	}
    	if($type_id){
    		$url .='&type_id='.$type_id;
    		$this->assign('type_id',$type_id);
    	}
    	if($id){
    		$url .='&id='.$id.'&cname='.$cname;
    		$this->assign('id',$id);
    		$this->assign('cname',$cname);
    	}
       $url .='&page=';
	   $areaAllNumber = $this->tmp_mod->goodsNum('',$type_id,$goods,'',$id);//总数
	   $list = new Page($pagesize,$areaAllNumber,$current_page,10,$url,2);
	   $result = $this->tmp_mod->goodsList($start,$pagesize,'',$type_id,$goods,'',$id);
	   $page = $list->subPageCss2();
	   //商品类别
        $g_type = $this->tmp_mod->getTypeSelect();
    	//是否参与库存
    	global $g_yesno;
    	if($result){
    		foreach ($result as $key=>$val){
    			$result[$key]['type'] = $g_type[$val['type_id']];
    			$result[$key]['show'] = $g_yesno[$val['yesno']];
    			$company= $this->tmp_mod->getCompany($val['company_id']);
    			$result[$key]['company'] = $company['cname'];
    		}
    	}
    	unset($g_yesno);
       $this->assign('action',$action);
       $this->assign('goods',$result);
       $this->assign('now',$current_page);
       $this->assign('page',$page);
       $this->assign('title',$title);
       $this->display('www/goods.html');
    }
    /**
     * @title  改变商品的状态
     * @author zhangcunchao
     */
    function updateGoods(){
    	$id     = $this->tmp_mod->H(getParam('id'));
     	$gname  = $this->tmp_mod->H(getParam('gname'));
     	if(!empty($id)&&!empty($gname)){
     		$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     		$data['yesno'] = $this->tmp_mod->H(getParam('yesno'))==1?0:1;
     		$rs    = $this->tmp_mod->editGoods($id,$data);
     		if(1==$data['yesno']){
     			$mes = "启用该商品的库存统计：$gname";
     		}else{
     			$mes = "停用该商品的库存统计：$gname";
     		}
     		if($rs){
     			parent::innerLog($mes,'1');
     			$this->jsAlert('操作成功','index.php?m=goods&a=goodsList&page='.$page);
				exit;
     		}else{
     			parent::innerLog($mes,'0');
     			$this->jsAlert('操作失败','index.php?m=goods&a=goodsList&page='.$page);
				exit;
     		}
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=goodsList');
			exit;
     	}
    }
    /**
     * @title  编辑商品信息
     * @author zhangcunchao
     */
    function editGoods(){
    	$id = $this->tmp_mod->H(getParam('id'));
     	if(!empty($id)){
     		$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     		$title  = '编辑商品信息';
     		$action = 'editGoods'; 
     		$rs = $this->tmp_mod->getOneGoods($id);
     		//商品类别
	    	$g_type = $this->tmp_mod->getTypeSelect();
	    	$type   = General::createSelect($g_type,'type_id','type_id',$rs['type_id'],'商品类别');
	    	//是否参与库存
	    	global $g_yesno;
	    	$yesno = General::createRadio($g_yesno,'yesno',$rs['yesno']);
	    	unset($g_yesno);
	    	$company= $this->tmp_mod->getCompany($rs['company_id']);
    		$rs['company'] = $company['cname'];
	        $this->assign('type',$type);
	        $this->assign('yesno',$yesno);
     		$this->assign('title',$title);
     		$this->assign('action',$action);
     		$this->assign('goods',$rs);
     		$this->assign('page',$page);
       		$this->display('www/goods.html');
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=goodsList');
			exit;
     	}
    }
    /**
     * @title  处理编辑商品信息
     * @author zhangcunchao
     */
    function doEditGoods(){
    	$id          = $this->tmp_mod->H(getParam('id'));
    	$gname       = $this->tmp_mod->H(getParam('gname'));
    	$type_id     = $this->tmp_mod->H(getParam('type_id'));
    	$etalon      = $this->tmp_mod->H(getParam('etalon'));
    	$unit        = $this->tmp_mod->H(getParam('unit'));
    	$inner_price = $this->tmp_mod->H(getParam('inner_price'));
    	$out_price   = $this->tmp_mod->H(getParam('out_price'));
    	$min_price   = $this->tmp_mod->H(getParam('min_price'));
    	$min_count   = $this->tmp_mod->H(getParam('min_count'));
    	$yesno       = $this->tmp_mod->H(getParam('yesno'));
    	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
    	if(!empty($id)&&!empty($gname)&&!empty($type_id)&&!empty($etalon)&&!empty($unit)&&!empty($inner_price)
    	&&!empty($out_price)&&!empty($min_price)&&!empty($min_count)){
    		$data = array(
    			'gname'       =>$gname,
	    		'type_id'     =>$type_id,
	    		'etalon'      =>$etalon,
	    		'unit'        =>$unit,
	    		'inner_price' =>$inner_price,
	    		'out_price'   =>$out_price,
	    		'min_price'   =>$min_price,
	    		'min_count'   =>$min_count,
	    		'yesno'       =>$yesno,
    		);
    		$rs = $this->tmp_mod->editGoods($id,$data);
    		if($rs){
    			parent::innerLog('编辑商品信息：'.$gname,'1');
    			$this->jsAlert('操作成功','index.php?m=goods&a=goodsList&page='.$page);
				exit;
    		}else{
    			parent::innerLog('编辑商品信息：'.$gname,'0');
    			$this->jsAlert('操作失败','index.php?m=goods&a=goodsList&page='.$page);
				exit;
    		}
    	}else{
    		$this->jsAlert('操作失误','index.php?m=goods&a=goodsList&page='.$page);
			exit;
    	}
    }
    /**
     * @title  删除指定的商品信息
     * @author zhangcunchao
     */
    function delGoods(){
    	$id    = $this->tmp_mod->H(getParam('id'));
     	$gname = $this->tmp_mod->H(getParam('gname'));
     	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     	if(!empty($id)&&!empty($gname)){  		
     		$rs = $this->tmp_mod->delGoods($id);
     		if($rs){
     			parent::innerLog('删除商品信息：'.$gname,'1');
     			$this->jsAlert('操作成功','index.php?m=goods&a=goodsList&page='.$page);
				exit;
     		}else{
     			parent::innerLog('删除商品信息：'.$gname,'0');
     			$this->jsAlert('操作失败','index.php?m=goods&a=goodsList&page='.$page);
				exit;
     		}
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=goodsList&page='.$page);
			exit;
     	}
    }
    /**
     * @title  批量操作商品信息
     * @author zhangcunchao
     */
    function GoodsAction(){
    	$action  = $this->tmp_mod->H(getParam('action'));
     	$id = $_POST['checkbox'];
     	$page  = $this->tmp_mod->H(getParam('page'))?$this->tmp_mod->H(getParam('page')):1;
     	if(!empty($action)&&!empty($id[0])){  		
     		$id = implode(',',$id);
     		//获取指定的部门名称
     		$list = $this->tmp_mod->getGoodsList($id);
     		$list = implode(',',$list);
     		if(1==$action){
     			$data['yesno'] = 0;
     			$rs = $this->tmp_mod->editGoods($id,$data);
     			if($rs){
     				parent::innerLog('批量停用商品统计：'.$list,'1');
     				$this->jsAlert('批量操作成功','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}else{
     				parent::innerLog('批量启用商品统计：'.$list,'0');
     				$this->jsAlert('批量操作失败','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}
     		}elseif(2==$action){
     			$data['yesno'] = 1;
     			$rs = $this->tmp_mod->editGoods($id,$data);
     			if($rs){
     				parent::innerLog('批量启用部门信息：'.$list,'1');
     				$this->jsAlert('批量操作成功','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}else{
     				parent::innerLog('批量启用部门信息：'.$list,'0');
     				$this->jsAlert('批量操作失败','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}
     		}elseif(3==$action){
     			$rs = $this->tmp_mod->delGoods($id);
     			if($rs){
     				parent::innerLog('批量删除部门信息：'.$list,'1');
     				$this->jsAlert('批量操作成功','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}else{
     				parent::innerLog('批量删除部门信息：'.$list,'0');
     				$this->jsAlert('批量操作失败','index.php?m=goods&a=goodsList&page='.$page);
					exit;
     			}
     		}		
     	}else{
     		$this->jsAlert('操作失误','index.php?m=goods&a=goodsList&page='.$page);
			exit;
     	}
    }
    //库存统计
    function store(){
    	$action = 'store';
    	$title = '库存统计';
        $this->assign('action',$action);
        $this->assign('title',$title);
        $this->display('www/goods.html');
    }
    //现有库存统计
    function tongJi(){
    	$warn = $this->tmp_mod->getSystem();
    	if(1==$warn['c_warn']){
    		$jing = $this->tmp_mod->getWarn();
    		if($jing){
    		$this->assign('jing','jing');
    		}
    	}
    	$action = 'tongJi';
    	$title = '现有库存统计';
    	$type_id  = $this->tmp_mod->H(getParam('type_id'));
    	$goods    = $this->tmp_mod->H(getParam('goods'));
    	$warn     = $this->tmp_mod->H(getParam('warn'));
    	$id       = $this->tmp_mod->H(getParam('id'));
    	$cname    = $this->tmp_mod->H(getParam('cname'));
    	$url      = 'index.php?m=goods&a=tongJi';
    	if($type_id){
    		$url .='&type_id='.$type_id;
    		$this->assign('type_id',$type_id);
    	}
        if($goods){
        	$this->assign('gname',$goods);
    		$url .='&goods='.$goods;
    	}
    	if($warn){
    		$url .='&warn='.$warn;
    		$this->assign('warn',$warn);
    	}
    	if($id){
    		$url .='&id='.$id.'&cname='.$cname;
    		$this->assign('id',$id);
    		$this->assign('cname',$cname);
    	}
    	$url .='&page=';
        $pagesize = 12;//每页显示总条数
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
	    $areaAllNumber = $this->tmp_mod->goodsNum('1',$type_id,$goods,$warn,$id);//总数
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,$url,2);
	    $result = $this->tmp_mod->goodsList($start,$pagesize,'1',$type_id,$goods,$warn,$id);
	    $page = $list->subPageCss2();
	    //商品类别
        $g_type = $this->tmp_mod->getTypeSelect();
    	if($result){
    		foreach ($result as $key=>$val){
    			$result[$key]['type'] = $g_type[$val['type_id']];
    			$company= $this->tmp_mod->getCompany($val['company_id']);
    			$result[$key]['company'] = $company['cname'];
    		}
    	}
        $this->assign('action',$action);
        $this->assign('goods',$result);
        $this->assign('now',$current_page);
        $this->assign('page',$page);
        $this->assign('title',$title);
        $this->display('www/goods.html');
    }
    function typeAjax(){
    	$action = 'typeAjax';
    	$type   = $this->tmp_mod->typeList();
    	$this->assign('action',$action);
    	$this->assign('type',$type);
    	$this->display('www/goods.html');
    }
    function updateWarn(){
    	$oldurl = $_SERVER['HTTP_REFERER'];
    	$data['c_warn'] = 0;
    	$type   = $this->tmp_mod->updateWarn('1',$data);
    	if($type){
    		parent::innerLog('取消库存警告','1');
    		$this->jsAlert('操作成功',$oldurl);
	    	exit;
    	}else{
    		parent::innerLog('取消库存警告','0');
    	    $this->jsAlert('操作失误',$oldurl);
	    	exit;
    	}
    }
    //厂家产品统计
    function companyTj(){
    	$action = 'companyTj';
    	$title  = '选择厂家';
    	$pagesize = 12;//每页显示总条数
    	$url = 'index.php?m=goods&a=companyTj&page=';
	    $current_page = $this->tmp_mod->H(getParam('page'));
	    $current_page = $current_page ? $current_page : 1;//当前选中的页
	    $start = ($current_page - 1)*$pagesize;
	    $areaAllNumber = $this->tmp_mod->comNum();//总数
	    $list = new Page($pagesize,$areaAllNumber,$current_page,10,$url,2);
	    $result = $this->tmp_mod->comList($start,$pagesize);
	    $page = $list->subPageCss2();
    	$this->assign('action',$action);
    	$this->assign('list',$result);
    	$this->assign('page',$page);
    	$this->assign('title',$title);
    	$this->assign('type',$type);
    	$this->display('www/goods.html');
    }
}