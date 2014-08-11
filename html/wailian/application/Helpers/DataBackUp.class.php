<?php

class DataBackUp
{

    //获得数据库的表名
    function get_table_name($database)
    {
        $result = mysql_list_tables($database);
        $table_name = array();
        for ($i = 0; $i < @mysql_num_rows($result); $i++) {
            $table_name[$i] = mysql_tablename($result, $i);
        }
        return $table_name;
    }

    //获得数据库表的数量
    function get_table_nums($database)
    {
        $result = mysql_list_tables($database);
        return @mysql_num_rows($result);
    }

    //获得相应表的内容
    function get_table_fields($table_name)
    {
        $createtable = mysql_query("SHOW CREATE TABLE $table_name");
        $create = mysql_fetch_row($createtable);
        $tabledump = "DROP TABLE IF EXISTS $table_name;";
        $tabledump .= $create[1] . ";";
        return $tabledump;
    }

    //获得数据库里的具体内容，第一次
    function get_insert($table_insert_name)
    {
        $rows = mysql_query("SELECT * FROM $table_insert_name") or die(mysql_error());
        if (!$rows) {
            die(mysql_error());
        }
        $numfields = mysql_num_fields($rows);
        $numrows = mysql_num_rows($rows);  //echo $numrows;
        while ($row = mysql_fetch_row($rows)) {
            $comma = "";
            $this->tabledump .= "INSERT INTO $table_insert_name VALUES(";
            for ($i = 0; $i < $numfields; $i++) {
                $this->tabledump .= $comma . "'" . mysql_escape_string($row[$i]) . "'";
                $comma = ",";
            }
            $this->tabledump .= ");";        
        }
        return $this->tabledump;
    }

    /**
     * 写入文件
     * @string type $database_name
     * @string  type $file_path_name
     * @return string 
     */
    function get_string($database_name, $file_path_name)
    {
        $table_name = $this->get_table_name($database_name);
        $table_num = $this->get_table_nums($database_name);
        $table_insert = "";
        $table_fields = "";
        for ($i = 0; $i < $table_num; $i++) {
            $table_insert = $this->get_insert($table_name[$i]);
            $table_fields.=$this->get_table_fields($table_name[$i]);
        }
        $content = $table_fields . $table_insert;
        $write_status = $this->write_file($file_path_name, $content);
        //var_dump( $write_status);
        return $write_status;
    }

    //将获得的数据库内容写到文件里
    function write_file($file_path, $file_contents)
    {
        if (@!$fp = fopen($file_path, 'w')) {
            
        	dump($file_path);
        	$status = "This File Could Not Open Or Read.";
            
        } else {
            flock($fp, 3);
            fwrite($fp, $file_contents);
            fclose($fp);
            $status = "<h4><font color=\"red\">备份数据库成功！</font></h4>.";
        }
        return $status;
    }

//还原数据库
    function recover_data($data)
    {
        $handle = fopen($data, "r");
        $contents = fread($handle, filesize($data));
        fclose($handle);
        $contents = explode(';', $contents);
        foreach ($contents as $sql) {
            if (!empty($sql)) {
                mysql_query($sql);
            }
        }
        $status = "<h4><font color=\"red\">还原成功！</font></h4>.";
        return $status;
//echo "<h3><font color=\"red\">数据库还原成功</font></h3>";
//echo "<meta http-equiv=\"refresh\" content=\"1000;URL=index.php?action=databack&ts=lis\/">";
    }

}