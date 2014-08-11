<?php
error_reporting(E_ALL ^ E_NOTICE);        //错误级别设置
define('DB_HOST2', 'localhost');
define('DB_USER2', 'v186_www');
define('DB_PWD2', 'zcc5574302');
define('DB_NAME2', 'v186_www');
define('DB_PORT2', '3306');
define('DB_CHARSET2', 'utf8');
define('TIMEZONE', 'PRC');
header("Content-Type:text/html;charset=utf-8");
session_cache_limiter('private, must-revalidate');


class DB2
{
    var $link;
    function __construct()
    {
    	
        $this->link = mysql_connect(DB_HOST2, DB_USER2, DB_PWD2, 1);
        //字符集设置
        if ($this->link) {
        	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary",$this->link);
            mysql_select_db(DB_NAME2, $this->link);
            
           // mysql_set_charset(DB_CHARSET2, $this->link);
        } else {
            die(mysql_error());
        }
    }
    
    /**
     * @param $sql
     * 
     * @author wbin 2011-6-2 email:wangb@gamebar.com
     * 
     * @return resource 
     */
    function executeQuery($sql)
    {
        if ($this->link) {
            $result = mysql_query($sql, $this->link);
            $ret = array();
            if ($result) {
                for ($i = 0; $i < mysql_num_rows($result); $i++) {
                    //$ret[$i] = mysql_fetch_array($result); 
                    $ret[$i] = mysql_fetch_assoc($result);
                }
                mysql_free_result($result);
            }
            return $ret;
        } else {
            die(mysql_error($this->link));
        }
    }

    /**
     * @param $sql
     * 
     * @author wbin 2011-6-2 email:wangb@gamebar.com
     * 
     * @return number
     */
    function executeNonQuery($sql = 'NULL')
    {
        if ($this->link) {
            mysql_query($sql, $this->link);
            if (strstr(strtoupper($sql), 'INSERT'))
                $result = mysql_insert_id($this->link);
            else
                $result = mysql_affected_rows($this->link);
            return $result;
        }
        else {
            die(mysql_error($this->link));
        }
    }

    /**
     * 
     * @param $sql
     * 
     * @author wbin 2011-6-2 email:wangb@gamebar.com
     * 
     * @return array 
     */
    function executeScalar($sql)
    {
        $result = mysql_query($sql, $this->link);

        if ($row = @mysql_fetch_row($result))
            return $row[0];
        else
            return null;
    }
    
    function getCol($sql)
    {
        $res = mysql_query($sql, $this->link);
        if ($res !== false) {
            $arr = array();
            while ($row = mysql_fetch_row($res)) {
                $arr[] = $row[0];
            }

            return $arr;
        } else {
            return false;
        }
    }

   /**
    * @param $table
    * @param $field_values
    * @param $mode
    * @param $where
    */ 
   function autoExecute($table, $field_values, $mode = 'INSERT', $where = '')
    {
		$field_names = $this->getCol('DESC ' . $table);		
        $sql = '';
        if ($mode == 'INSERT') {
            $fields = $values = array();
            foreach ($field_names AS $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $fields[] = '`' . $value . '`';
                    $values[] = "'" . $field_values[$value] . "'";
                }
            }

            if (!empty($fields)) {
                $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';               
            }
        } else {
            $sets = array();
            foreach ($field_names AS $value) {
                if (array_key_exists($value, $field_values) == true) {
                    $sets[] = '`' . $value . "` = '" . $field_values[$value] . "'";
                }
            }

            if (!empty($sets)) {
                $sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $sets) . ' WHERE ' . $where;
            }
        }
        if ($sql) {
            return mysql_query($sql, $this->link);
        } else {
            return false;
        }
    }
    
    

    /**
     * @param NULL
     * 
     * @author wbin 2011-6-2 email:wangb@gamebar.com
     * 
     * @return NULL
     */
    function close()
    {
        mysql_close($this->link);
    }

}

class Index1Model{
	   function __construct(){
   	  		$this->_db = new DB2();
			$this->_table = 'listweb';
			$this->_table_1 = 'listweb_data_1';
     	}
   	   function getOneWeb($url=''){
		   $sql ="SELECT `id`,`innum`,`title`,`lastintime` FROM `$this->_table` WHERE `url` = '$url' LIMIT 0,1";
		   $rs = $this->_db->executeQuery($sql); 
		   return $rs[0];
	   }
	   function updateWeb($id= 0,$data = array())
	   {
	   	  $where = "`id` = '$id'";
	   	  $rs  = $this->_db->autoExecute($this->_table,$data,'UPDATE',$where);
	   	  return $rs;
	   }
	   function addWeb($data=array()){
     		$rs = $this->_db->autoExecute($this->_table,$data);
     		return $rs;
       }
	   function addWebData($data=array()){
     		$rs = $this->_db->autoExecute($this->_table_1,$data);
     		return $rs;
       }
   }
  class Index1Action{

    function __construct()
    {
        $this->tmp_mod = new Index1Model();
		$this->index();
    }
	
    function index(){
		$u = $_SERVER['HTTP_REFERER'];
		if($u){
		    $g_url =  "http://".$_SERVER['HTTP_HOST'].'/';
			$domain = parse_url($u);
			$l = $domain['scheme'].'://'.$domain['host'].'/';
			if($l==$g_url){
				set_time_limit(60);
				ignore_user_abort(true);
				$url = @$_GET['url'];
				$nowurl = @$_GET['nowurl'];
				if(!empty($url)&&!empty($nowurl)){
					$domain = parse_url($url);
					$l = $domain['scheme'].'://'.$domain['host'].'/';
					$rs = $this->tmp_mod->getOneWeb($l);
					if($rs){
						$title = preg_replace('|\s|','',$rs['title']);
						if($g_url!=$nowurl && $g_url.'wailian/'!=$nowurl){
							$data['innum']      = $rs['innum']+1;
							$data['lastintime'] = time();
							$this->tmp_mod->updateWeb($rs['id'],$data);
							$num = $rs['innum']+1;
						}else{
							$num = $rs['innum'];
						}
						?>
						<?php
					}
				}
			}
		}
    }
  
}
new Index1Action();