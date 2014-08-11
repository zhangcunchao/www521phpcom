<?php
   class GxModel extends Model
   {
	   function __construct(){
   	  		$this->_db = new DB();
			$this->_table = 'listweb';
			$this->_table_1 = 'listweb_data_1';
       }
	   function getOneWeb($id=0){
		   $sql ="SELECT * FROM `$this->_table` WHERE `id` = '$id' LIMIT 0,1";
		   $rs = $this->_db->executeQuery($sql); 
		   return $rs[0];
	   }
	   function updateWeb($id= 0,$data = array()){
	   	  $where = "`id` = '$id'";
	   	  $rs  = $this->_db->autoExecute($this->_table,$data,'UPDATE',$where);
	   	  return $rs;
	   }
	   function updateWebData($id= 0,$data = array()){
	   	  $where = "`id` = '$id'";
	   	  $rs  = $this->_db->autoExecute($this->_table_1,$data,'UPDATE',$where);
	   	  return $rs;
	   }
   }
?>