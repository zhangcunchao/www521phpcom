<?php
/**
 * 
 * 数据库操作类
 * Filename ：Model.class.php
 * @author wbin 2011-6-2 
 * email:wangb@gamebar.com
 *
 */
class DB
{
    var $link;
    function __construct()
    {
    	
        $this->link = mysql_connect(DB_HOST, DB_USER, DB_PWD, 1);
        //字符集设置
        if ($this->link) {
        	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary",$this->link);
            mysql_select_db(DB_NAME, $this->link);
            
           // mysql_set_charset(DB_CHARSET, $this->link);
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

