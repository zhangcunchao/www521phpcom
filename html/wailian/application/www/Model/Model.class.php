<?php

/**
 * 数据库操作类
 */
class Model
{

    function __construct()
    {
        $this->_db = new DB();
    }

    /**
     * 转义数据 htmlspecialchars效果
     * @param mixed $data 要转义的数据
     * @return mixed
     */
    function H($data)
    {
        return is_array($data) ? array_map(array(__CLASS__, 'H'), $data) : htmlspecialchars($data, ENT_QUOTES);
    }
    //记录日志
    function inLog($data=array()){
    	$this->_db->autoExecute('ny_log',$data);
    }
}