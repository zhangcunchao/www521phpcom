https://github.com/zhangcunchao/www521phpcom/tree/master/html/api/img
<?php 
exit;
function curl_json($url,$data_string=''){
	    $ip = array(
			'0' => '124.127.133.242',
			'1' => '121.114.253.26',
			'2' => '228.253.28.44',
		);
		$nip = array_rand($ip);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$user_agent ="Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1)";       
		$headers['CLIENT-IP'] = $nip; 
		$headers['X-FORWARDED-FOR'] = $nip;
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt ($ch, CURLOPT_HTTPHEADER , $headers );
       // curl_setopt ($ch, CURLOPT_REFERER, "http://www.waduanzi.com");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
       
        $result = curl_exec($ch);
        curl_close($ch);
        return 	$result;
    }
	$p = @$_GET['p'];
	if($p){
                header('Content-type: image/png');
		echo  $html = curl_json($p);
	}else{
		echo 'like this <br />';
                echo '<pre>&ltimg src="http://www.521php.com/api/img/index.php?p=http://www.521php.com/logo.png" &gt</pre>';
	}
?> 
