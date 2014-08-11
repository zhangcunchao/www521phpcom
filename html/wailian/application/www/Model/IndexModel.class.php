<?php
   class IndexModel extends Model
   {
	   function __construct(){
   	  		$this->_db = new DB();
			$this->_table = 'listweb';
			$this->_table_1 = 'listweb_data_1';
     	}
   	   function webNum($time=0){
   	   		$sql = "SELECT COUNT(id) FROM `$this->_table` WHERE `type` = '1' and `lastintime` > '$time'";
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
   	   }
   	   function webList($start=0,$pagesize='20',$time=0,$order = ''){
   	   		$sql = "SELECT * FROM `$this->_table` WHERE `type` = '1' and `lastintime` > '$time'";
			if($order){
				$sql .=" ORDER BY $order";
			}else{
   	   			$sql .=" ORDER BY lastintime DESC";
			}
     		$sql .=" LIMIT $start,$pagesize";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
   	   }
	   function gqWebNum($time=0){
   	   		$sql = "SELECT COUNT(id) FROM `$this->_table` WHERE `type` = '1' and `lastintime` < '$time'";
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
   	   }
	   function lhWebNum(){
			$sql = "SELECT COUNT(id) FROM `$this->_table` WHERE `type` = '0'";
	     	$rs = $this->_db->executeScalar($sql);
	     	return $rs;
	   }
	   function getLh($start,$pagesize){
			$sql = "SELECT * FROM `$this->_table` WHERE `type` = '0' ORDER BY lastintime DESC limit $start,$pagesize";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
	   }
	   function getgq($time=0,$start,$pagesize){
			$sql = "SELECT * FROM `$this->_table` WHERE `type` = '1' and `lastintime` < '$time' ORDER BY lastintime DESC limit $start,$pagesize";
	     	$rs  = $this->_db->executeQuery($sql);
	     	return $rs;
	   }
   }
?>