<?php
   class HtmlModel extends Model
   {
	   function __construct(){
   	  		$this->_db = new DB();
			$this->_table = 'listweb';
			$this->_table_1 = 'listweb_data_1';
     	}
       function getOneWeb($k=''){
   	  	   $where = "`cateurl` = '$k'";
   	  	   $sql ="SELECT * FROM `$this->_table` where $where LIMIT 0,1";
		   $rs = $this->_db->executeQuery($sql); 
		   return $rs[0];
   	  }
   		function getOneWebData($id=0){
   	  	   $where = "`id` = '$id'";
   	  	   $sql ="SELECT * FROM `$this->_table_1` where $where LIMIT 0,1";
		   $rs = $this->_db->executeQuery($sql); 
		   return $rs[0];
   	  }
   }
?>