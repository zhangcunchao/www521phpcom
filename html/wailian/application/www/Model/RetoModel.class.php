<?php
   class RetoModel extends Model
   {
   	  var $_db;
   	  var $_table;
   	  function __construct(){
   	  		$this->_db = new DB();
   	  		$this->_table = 'listweb';
      }
   	  function getOneWeb($id='',$url=''){
   	  	   if($url){
   	  	   		$where ="`url` = '$url'";
   	  	   }
   	  	   if($id){
   	  	   		$where = "`id` = '$id'";
   	  	   }
   	  	   $sql ="SELECT `id`,`title`,`url`,`outnum` FROM `$this->_table` where $where LIMIT 0,1";
		   $rs = $this->_db->executeQuery($sql); 
		   return $rs[0];
   	  }
      function updateWeb($id = 0,$data = array())
	   {
	   	  $where = "`id` = '$id'";
	   	  $rs  = $this->_db->autoExecute($this->_table,$data,'UPDATE',$where);
	   	  return $rs;
	   }
   }
?>