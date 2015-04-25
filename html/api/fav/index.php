<?php 
$url = @$_GET['url'];
$k = @$_GET['k'];
if($url){
	if(!$k){
		$file = @file_get_contents('loading.gif');
        if($file){
		   header('Content-type: image/gif');
           echo $file;
           exit;
        }
	}else{
		include('inc.php');
		if($key!=$k){
			$file = @file_get_contents('loading.gif');
			if($file){
			   header('Content-type: image/gif');
			   echo $file;
			   exit;
			}
		}
	}
	$url = preg_replace('/http(s)?\:\/\//i','',$url);
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
        if($f2)
        @file_put_contents($fav,$f2);
}else{
	header("Content-Type:text/html;charset=utf-8");
	echo '示例：http://www.521php.com/api/fav/?url=www.521php.com';
?>
<br />
v3.0升级完成：
原接口因为使用频率太高，压力过大，升级中;预计2015-4-24晚9点前启用新接口,v2以前用户，只需要到时候添加一个js即可<br />
升级完成，请在您页面底部添加以下js,前提是你的页面已经有jquery。此js放到jquery以下<br>
<pre>&ltscript src="http://www.521php.com/api/fav/key.js"&gt&ltscript&gt</pre>
<br>
<br />
v2.0升级：
此接口可以直接放到img的src之后使用，即<pre>&ltimg src="http://www.521php.com/api/fav/?url=www.521php.com"&gt</pre><br /><br />
本接口会对查询过的域名做缓存，缓存每周日删除一次，如果要手动删除缓存，请使用下面接口<br />
缓存目录为：<a href="http://www.521php.com/api/fav/images/" target="_blank">http://www.521php.com/api/fav/images/</a><br>
<form action="del.php">
域名，不加http:<input type="test" name="host" value="" /><br />
<input type="submit" value="提交" >
</form>
<?php
}
?> 
