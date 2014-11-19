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