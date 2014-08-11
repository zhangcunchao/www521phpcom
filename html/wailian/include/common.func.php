<?php

/**
 * 常用的方法 
 * add by wangb,2011-06-02 
 * email：wangb@gamebar.com
 * */
function dump($data)
{
    echo '<pre>';
      var_dump($data);
    echo '</pre>';
}
    /**
     * 取get post参数
     * @param <type> $key
     * @param <mixed> $default_value = NULL
     * @return <type>
     */
    function getParam($key, $default_value = NULL)
    {
        if (isset($_GET[$key])) {
            return trim($_GET[$key]);
        } elseif (isset($_POST[$key])) {
            return trim($_POST[$key]);
        } else {
            if ($default_value >= 0) {
                return $default_value;
            } else {
                return '';
            }
        }
    }
/**
 * php 防注入
 * add by wangb,2011-06-27
 * email:wangb@gamebar.com
 */
function inject_check()
{
    if ($_GET) {
        $arr = array_keys($_GET);
        foreach ($arr as $k => $v) {
            if ($v != "m" && $v != "a") {
                $check = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/| union | into | and | load_file | or |outfile/', $_GET[$v]);     // 进行过滤 
                if ($check) {
                    echo "<script>alert('输入非法内容!');location.href='/".DIRS."';</script>";
                    exit();
                }
            }
        }
    }
}

?>