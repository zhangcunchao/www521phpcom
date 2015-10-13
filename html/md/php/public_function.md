## 常用函数 ##

1、邮件有效性判断函数

	  function ValidateAddress($address) {
	    if (function_exists('filter_var')) { //Introduced in PHP 5.2
	      if(filter_var($address, FILTER_VALIDATE_EMAIL) === FALSE) {
	        return false;
	      } else {
	        return true;
	      }
	    } else {
	      return preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $address);
	    }
	  }

2、5.3下json_encode中文不被转义

	function encode_json($str) {  
	    return urldecode(json_encode(url_encode($str)));      
	}  
	  
	function url_encode($str) {  
	    if(is_array($str)) {  
	        foreach($str as $key=>$value) {  
	            $str[urlencode($key)] = url_encode($value);  
	        }  
	    } else {  
	        $str = urlencode($str);  
	    }  
	      
	    return $str;  
	}

php5.4

	json_encode($str, JSON_UNESCAPED_UNICODE);  

3、php比较好的解析xml

	$simple = "<para><note>simple note</note></para>";
	$p = xml_parser_create();
	xml_parse_into_struct($p, $simple, $vals, $index);
	xml_parser_free($p);
	echo "Index array\n";
	print_r($index);
	echo "\nVals array\n";
	print_r($vals);

4、参数递归过滤

	function addslashes_deep($value)
		{
			if(get_magic_quotes_gpc())
			{
				return $value;
			}
			$value = is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
			return $value;
		}

5、多维数组排序

	function cmpdesc($a, $b) {
	    if (($a["sf"]+$a["tf"]-$a['bf']) == ($b["sf"]+$b['tf']-$b["bf"])) {
	        return 0;
	    }
	    return (($a["sf"]+$a["tf"]-$a['bf']) < ($b["sf"]+$b['tf']-$b["bf"])) ? 1 : -1;
	}
	function cmpasc($a, $b) {
	    if (($a["sf"]+$a["tf"]-$a['bf']) == ($b["sf"]+$b['tf']-$b["bf"])) {
	        return 0;
	    }
	    return (($a["sf"]+$a["tf"]-$a['bf']) > ($b["sf"]+$b['tf']-$b["bf"])) ? 1 : -1;
	}
	//排序

	if($sort){
   	 if(1==$sort){
   	     //$ticket = array_sort($ticket,'tf','asc');
   	     usort($ticket,"cmpasc");
   	 }else{
        	//$ticket = array_sort($ticket,'tf','desc');
	        usort($ticket,"cmpdesc");
	    }
	}
