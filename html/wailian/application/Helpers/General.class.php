<?php

/**
 * PHP常用类
 * ============================================================================
 * @Author: wangbin $  <wbgod_1987@qq.com>
 * @Id: Image.class.php 53 2012-03-02 15:34:45 wbin $
 * @http://blog.csdn.net/wbandzlhgod
 */
class General
{

    /**
     * 判断来源是 [手机|电脑]
     * @return boolean 
     */
    public static function check_wap()
    {
        if (isset($_SERVER['HTTP_VIA']))
            return true;
        if (isset($_SERVER['HTTP_X_NOKIA_CONNECTION_MODE']))
            return true;
        if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID']))
            return true;
        if (strpos(strtoupper($_SERVER['HTTP_ACCEPT']), "VND.WAP.WML") > 0) {
            // Check whether the browser/gateway says it accepts WML.  
            $br = "WML";
        } else {
            $browser = isset($_SERVER['HTTP_USER_AGENT']) ? trim($_SERVER['HTTP_USER_AGENT']) : '';
            if (empty($browser))
                return true;
            $b = $browser;
            $browser = substr($browser, 0, 4);
            $iPhone = substr($b, 13, 6);
            if ($iPhone == 'iPhone')
                return true;
            if ($browser == "Noki" || // Nokia phones and emulators  
                    $browser == "Eric" || // Ericsson WAP phones and emulators  
                    $browser == "WapI" || // Ericsson WapIDE 2.0  
                    $browser == "MC21" || // Ericsson MC218  
                    $browser == "AUR" || // Ericsson R320  
                    $browser == "R380" || // Ericsson R380  
                    $browser == "UP.B" || // UP.Browser  
                    $browser == "WinW" || // WinWAP browser  
                    $browser == "UPG1" || // UP.SDK 4.0  
                    $browser == "upsi" || // another kind of UP.Browser ??  
                    $browser == "QWAP" || // unknown QWAPPER browser  
                    $browser == "Jigs" || // unknown JigSaw browser  
                    $browser == "Java" || // unknown Java based browser  
                    $browser == "Alca" || // unknown Alcatel-BE3 browser (UP based?)  
                    $browser == "MITS" || // unknown Mitsubishi browser  
                    $browser == "MOT-" || // unknown browser (UP based?)  
                    $browser == "My S" || // unknown Ericsson devkit browser ?  
                    $browser == "WAPJ" || // Virtual WAPJAG www.wapjag.de  
                    $browser == "fetc" || // fetchpage.cgi Perl script from www.wapcab.de  
                    $browser == "ALAV" || // yet another unknown UP based browser ?  
                    $browser == "Wapa" || // another unknown browser (Web based "Wapalyzer"?)  
                    $browser == "Oper") { // Opera  
                $br = "WML";
            } else {
                $br = "HTML";
            }
        }
        if ($br == "WML") {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 获取客户端IP地址
     * @return <type>
     */
    public static function get_client_ip()
    {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";
        return($ip);
    }

    /**
      +----------------------------------------------------------
     * 字符串截取，支持中文和其他编码
      +----------------------------------------------------------
     * @static
     * @access public
      +----------------------------------------------------------
     * @param string $str 需要转换的字符串
     * @param string $length 截取长度
     * @param string $start 开始位置
     * @param string $charset 编码格式
     * @param string $suffix 截断显示字符
      +----------------------------------------------------------
     * @return string  [dump(General:: msubstr('测试中文是否可用', 2, 1,'utf-8',1));        ]
      +----------------------------------------------------------
     */
    public static function msubstr($str, $length, $start = 0, $charset = "utf-8", $suffix = true)
    {
        if (function_exists("mb_substr"))
            return mb_substr($str, $start, $length, $charset);
        elseif (function_exists('iconv_substr')) {
            return iconv_substr($str, $start, $length, $charset);
        }
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
        if ($suffix)
            return $slice . "…";
        return $slice;
    }

    /**
     * @抓去远程文件
     * @param type $url
     * @param type $charset
     * @return type 
     */
    static function GetHttps($url, $charset = "utf-8")
    {
        if (extension_loaded('curl')) {
            $file_contents = self::curl_file_get_contents($url);
        } else {
            $file_contents = @file_get_contents($url);
        }
        if ($charset == "utf-8") {
            return $file_contents;
        } elseif ($charset == "gb2312") {
            $file_contents = iconv("gb2312", "UTF-8", $file_contents);
            return $file_contents;
        }
    }

    /**
     * curl取文件
     * @param type $url
     * @param type $timeout
     * @return type 
     */
    public static function curl_file_get_contents($url, $timeout = 5)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $r = curl_exec($ch);
        curl_close($ch);
        return $r;
    }

    // 循环创建目录创建目录 递归创建多级目录
    public static function CreateFolder($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode))
            return true;
        if (!self::CreateFolder(dirname($dir), $mode))
            return false;
        return @mkdir($dir, $mode);
    }

	/**
	 *  生成select 
	 *  add by wangbin,2012-03-20 
	 * @param unknown_type $data
	 * @param unknown_type $name
	 * @param unknown_type $id
	 * @param unknown_type $s
	 */
    public static function createSelect($data = array(),$name = '', $id = '',$s = '',$title =''){

    	if(is_array($data)){
    		$select = '<select title="'.$title.'" name="'.$name.'" class = "st" >';
    		foreach($data as $key=>$value){
    			if(is_array($value)){
    				if($value["$id"] == $s){
    					$s1 = 'selected';
    				}else{
    					$s1 = '';
    				}
    				$select .='<option value ="'.$value["$id"].'"  '.$s1.'>'.$value["$name"].'</option>'; //二维数组
    			}else{
    				if($key == $s){
    					$s1 = 'selected';
    				}else{
    					$s1 = '';
    				}
    				$select .='<option value ="'.$key.'" '.$s1.'>'.$value.'</option>';
    			}
    		}
    		$select .= '</select>';
    	}else{
    		$select = '';
    	}
    	return $select;
    }
    
    /*@显示所有的类别用复选框进行多选
     *@linxinliang
     * */
    public static function createCheckbox($data = array(),$name = '',$id = '',$c = ''){
    	$c2 = explode("-",$c);
        if(is_array($data)){
        	while(list($k,$v) = each($data)){
        	    foreach ($c2 as $value){
        		    if($data[$k]["$id"] == $value){
    					$c1 = 'checked';
    				}else{
    					$c1 = '';
    				}
    		      $checkbox .= '<input  type="checkbox" '.$c1.' value="'.$data[$k]["$id"].'" name="'.$name.'[]" />'.$data[$k]["$name"];	
        		}
        		//$checkbox .= '<input  type="checkbox" '.$c1.' value="'.$data[$k]["$id"].'" name="'.$name.'[]" />'.$data[$k]["$name"];
              }
           }else{
           $checkbox = '<input  type="checkbox" '.$c1.' value="'.$data["$id"].'" name="'.$name.'[]" />'.$data[$k]["$name"];
        }
        return $checkbox;
    }
    
    
    
    /**
     * 单选
     */
    function createRadio($data = array(),$name = '',$checked = ''){
    	if(is_array($data)){
    		while(list($k,$v) = each($data)){
    			if($checked == $k){
    				$c = 'checked = checked';
    			}else{
    				$c = '';
    			}
    			$radio .= '<input type="radio" name="'.$name.'" value="'.$k.'" '.$c.' > '.$v;
    		}
    	}
    	return $radio;
    }
    
    /**
     * 多选
     */
    function createCK($data = array(),$name = '',$id = '',$checked = '',$title='',$class='',$br=''){
    	if(is_array($data)){
    		if(!empty($checked)){
    		$list = explode(',',$checked);
    		}
    		while(list($k,$v) = each($data)){
    			@$void = in_array($k,$list);
    			if('1' == $void){
    				$c = 'checked = checked';
    			}else{
    				$c = '';
    			}
    			$radio .= '&nbsp;&nbsp;<input type="checkbox" id= "'.$id.'" class="'.$class.'" title="'.$title.'" name="'.$name.'[]" value="'.$k.'" '.$c.' >'.$v.$br;
    		}
    	}
    	return $radio;
    }
    
    /**
     * 数组的差集
     * @param $array1
     * @param $array2
     */
	function array_diff_assoc2_deep($array1, $array2) { 		
        $ret = array(); 
        foreach ($array1 as $k => $v) {     
            if (!isset($array2[$k])){
           		 $ret[$k] = $v; 
            }else if (is_array($v) && is_array($array2[$k])){
           		 $ret[$k] = self::array_diff_assoc2_deep($v, $array2[$k]); 
            }else if ($v !=$array2[$k]){
            	 $ret[$k] = $v; 
            }else {
                unset($array1[$k]);
            }
       	} 
        return $ret; 
	}
    
}

