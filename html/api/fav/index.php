<?php 
$url = @$_GET['url'];
if($url){
	$url = preg_replace('/http\:\/\//i','',$url);
	$url = 'http://'.$url;
	$domain = parse_url($url);
	$url = $domain['host'];
        $dir = 'images';
        $fav = $dir."/".$url.".ico";
	header('Content-type: image/png');
        $file = @file_get_contents($fav);
        if($file){
           echo $file;
           exit;
        }
	$file = @file_get_contents("http://$url/favicon.ico");
	if($file){
                $f2 = $file;
		echo $f2;
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
					$f2 = @file_get_contents('http://www.521php.com/url.jpg');
                                        echo $f2;
				}
			}
		}else{
		    $f2 = @file_get_contents('http://www.521php.com/url.jpg');
                    echo $f2;
		}
	}
        @file_put_contents($fav,$f2);
}else{
	header("Content-Type:text/html;charset=utf-8");
	echo '示例：http://www.521php.com/api/fav/?url=www.521php.com';
?>
<br />
v2.0升级：
此接口可以直接放到img的src之后使用，即<pre>&ltimg src="http://www.521php.com/api/fav/?url=www.521php.com"&gt</pre><br /><br />
本接口会对查询过的域名做缓存，缓存每周日删除一次，如果要手动删除缓存，请使用下面接口<br />
<form action="del.php">
域名，不加http:<input type="test" name="host" value="" /><br />
<input type="submit" value="提交" >
</form>
<?php
}
?> 
