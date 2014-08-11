<?php
   class LoginModel extends Model
   {
   	  var $_db;
   	  var $_table;
   	  function __construct(){
   	  		$this->_db = new DB();
   			$this->_table = 'ny_admin';
     	}
   	   
   }
?>