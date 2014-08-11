<?php
   class GoodsModel extends Model
   {
   	  var $_db;
   	  var $_table_t;
   	  var $_table_g;
   	  function __construct(){
   	  		$this->_db = new DB();
   			$this->_table_t = 'ny_type';
   			$this->_table_g = 'ny_goods';
     	}
	   	/**
	   	 * @title  添加商品类别
	   	 * @author zhangcunchao
	   	 */
     	function addType($data=array()){
     		$rs = $this->_db->autoExecute($this->_table_t,$data);
     		return $rs;
     	}
     	/**
     	 * @title  商品类别总数
     	 * @author zhangcunchao
     	 */
     	function typeNum(){
     		$sql = "SELECT COUNT(id) FROM `$this->_table_t` WHERE 1";
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  商品类别列表
     	 * @author zhangcunchao
     	 */
     	function typeList($start='',$pagesize=''){
     		$sql = "SELECT * FROM `$this->_table_t` WHERE 1 ";
     		if($pagesize){
     			$sql .=" LIMIT $start,$pagesize";
     		}
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  读取指定的类别信息
     	 * @author zhangcunchao
     	 */
     	function getOneType($id=0){
     		$sql ="SELECT * FROM `$this->_table_t` WHERE `id`=$id LIMIT 0,1";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs[0];
     	}
     	/**
     	 * @title  编辑类别信息
     	 * @author zhangcunchao
     	 */
     	function editType($id=0,$data=array()){
     		$where = "`id` in($id)";
	     	$rs    = $this->_db->autoExecute($this->_table_t,$data,'UPDATE',$where);
	     	return $rs;
     	}
     	/**
     	 * @title  删除指定的类别
     	 * @author zhangcunchao
     	 */
     	function delType($id=0){
     		$sql = "DELETE FROM `$this->_table_t` WHERE `id` in($id)";
	     	$rs  = $this->_db->executeNonQuery($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  读取指定类别名称
     	 * @author zhangcunchao
     	 */
     	function getTypeList($id=0){
     		$sql = "SELECT `id`,`tname` FROM `$this->_table_t` WHERE `id` in($id)";
	     	$rs  = $this->_db->executeQuery($sql);
	     	if($rs){
	     		foreach($rs as $val){
	     			$rs2[$val['id']] = $val['tname'];
	     		}
	     	}
	     	return $rs2;
     	}
     	/**
     	 * @title  类别下拉
     	 * @author zhangcunchao
     	 */
     	function getTypeSelect(){
     		$sql = "SELECT * FROM `$this->_table_t` WHERE 1";
	     	$rs  = $this->_db->executeQuery($sql);
	     	if($rs){
	     		foreach ($rs as $val){
	     			$rs2[$val['id']] = $val['tname'];
	     		}
	     	}
	     	return $rs2;
     	}
     	/**
     	 * @title  添加商品信息
     	 * @author zhangcunchao
     	 */
     	function addGoods($data=array()){
     		$rs = $this->_db->autoExecute($this->_table_g,$data);
     		return $rs;
     	}
   		function getAllCompany($pinyin=''){
     		$sql = "SELECT `id`,`cname` FROM `ny_company` WHERE `state`=1 ";
     		if($pinyin){
     			$sql .= " AND `rank` REGEXP '$pinyin'";
     		}
     		$sql .= "ORDER BY rank";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
     	function getCompany($id=0){
     		$sql = "SELECT `id`,`cname` FROM `ny_company` WHERE `id`=$id LIMIT 0,1";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs[0];
     	}
     	/**
     	 * @title  商品数量
     	 * @author zhangcunchao
     	 */
     	function goodsNum($yesno='',$type_id='',$goods='',$warn='',$id=''){
     		$sql = "SELECT COUNT(id) FROM `$this->_table_g` WHERE 1";
     		if($yesno){
     			$sql .=" AND `yesno` = $yesno "; 
     		}
     		if($type_id){
     			$sql .=" AND `type_id` = $type_id "; 
     		}
     		if($goods){
     			$sql .=" AND `gname` REGEXP '$goods' "; 
     		}
     	    if($warn){
     			$sql .=" AND `count` < `min_count` "; 
     		}
     		if($id){
     			$sql .=" AND `company_id`=$id "; 
     		}	
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  商品列表
     	 * @author zhangcunchao
     	 */
     	function goodsList($start='',$pagesize='',$yesno='',$type_id='',$goods='',$warn='',$id=''){
     		$sql = "SELECT * FROM `$this->_table_g` WHERE 1";
     		if($yesno){
     			$sql .=" AND `yesno` = $yesno ";
     		}
     		if($type_id){
     			$sql .=" AND `type_id` = $type_id "; 
     		}
     		if($goods){
     			$sql .=" AND `gname` REGEXP '$goods' "; 
     		}
     		if($warn){
     			$sql .=" AND `count` < `min_count` "; 
     		}
     		if($id){
     			$sql .=" AND `company_id`=$id "; 
     		}	
     		$sql .= " ORDER BY id DESC LIMIT $start,$pagesize";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  编辑商品信息
     	 * @author zhangcunchao
     	 */
     	function editGoods($id=0,$data=array()){
     		$where = "`id` in($id)";
	     	$rs    = $this->_db->autoExecute($this->_table_g,$data,'UPDATE',$where);
	     	return $rs;
     	}
     	/**
     	 * @title  读取指定的商品信息
     	 * @author zhangcunchao
     	 */
     	function getOneGoods($id=0){
     		$sql ="SELECT * FROM `$this->_table_g` WHERE `id`=$id LIMIT 0,1";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs[0];
     	}
     	/**
     	 * @title  删除指定的商品信息
     	 * @author zhangcunchao
     	 */
     	function delGoods($id=0){
     		$sql = "DELETE FROM `$this->_table_g` WHERE `id` in($id)";
	     	$rs  = $this->_db->executeNonQuery($sql);
	     	return $rs;
     	}
     	/**
     	 * @title  获取指定商品的名称
     	 * @author zhangcunchao
     	 */
     	function getGoodsList($id=0){
     		$sql = "SELECT `id`,`gname` FROM `$this->_table_g` WHERE `id` in($id)";
	     	$rs  = $this->_db->executeQuery($sql);
	     	if($rs){
	     		foreach($rs as $val){
	     			$rs2[$val['id']] = $val['gname'];
	     		}
	     	}
	     	return $rs2;
     	}
     	function getSystem(){
     		$sql = "SELECT `c_warn` FROM `ny_system` WHERE `id` =1";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs[0];
     	}
     	function getWarn(){
     		$sql = "SELECT * FROM `ny_goods` WHERE `yesno` = 1 AND `count` < `min_count` LIMIT 0,1";
     		$rs  = $this->_db->executeQuery($sql);
	     	return $rs[0];
     	}
     	function updateWarn($id=0,$data=array()){
     		$where = "`id` =$id";
	     	$rs    = $this->_db->autoExecute('ny_system',$data,'UPDATE',$where);
	     	return $rs;
     	}
     	//厂家
     	function comNum(){
     		$sql = "SELECT COUNT(id) FROM `ny_company` WHERE 1";
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
     	}
     	function comList($start='',$pagesize=''){
     		$sql = "SELECT `id`,`cname` FROM `ny_company` WHERE 1 ";
     		$sql .=" LIMIT $start,$pagesize";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
     	//入库
     	function getInMain($id=0){
     		$sql = "SELECT `id` FROM `ny_instore_main` WHERE `company_id`=$id";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
   		function getInSub($id=0){
     		$sql = "SELECT `goods_id` FROM `ny_instore_sub` WHERE `main_id`in($id)";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
     	}
   }
?>