<?php 
$url = @$_GET['url'];
if($url){
	$url = preg_replace('/http\:\/\//i','',$url);
	$url = 'http://'.$url;
	$domain = parse_url($url);
	$url = $domain['host'];
	header('Content-type: image/png');
	$file = @file_get_contents("http://$url/favicon.ico");
	if($file){
		echo $file;
	}else{
		$w = @file_get_contents("http://$url/",0,null,0,2000);
		//@preg_match('|<link rel=\"shortcut icon\" href=\"(.*?)\".*>|ius',$w,$a);
		@preg_match('|href=\"(.*?)\.ico\"|i',$w,$a);
                if($a[1]){
                        $a[1] .='.ico';
			$f = @file_get_contents($a[1]);
			if($f){
				echo $f;
			}else{
				$u = 'http://'.$url.'/'.$a[1];
				$f2 = @file_get_contents($u);
				if($f2){
					echo $f2;
				}else{
					echo @file_get_contents('http://www.521php.com/url.jpg');
				}
			}
		}else{
		    echo @file_get_contents('http://www.521php.com/url.jpg');
		}
	}
}else{
	header("Content-Type:text/html;charset=utf-8");
	echo '示例：http://www.521php.com/api/fav/?url=www.521php.com';
}
?> 
