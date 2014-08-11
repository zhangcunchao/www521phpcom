<?php

class GxAction extends Action
{

    function __construct()
    {
		
        parent::__construct();
        $this->tmp_mod = new GxModel();
        $this->index();      
    }
	
    function index(){
		$id = $_GET['id'];
		if($id){
			$list = $this->tmp_mod->getOneWeb($id);
			if($list){
				set_time_limit(60);
				ignore_user_abort(true);
				$time = time();
				$reto = '/'.DIRS.'index.php/html/k/'.$list['cateurl'];
				if(!@$_COOKIE['gxCookie']||$_GET['cc']==2){
					@SetCookie('gxCookie','hello',$time+60);
					print str_repeat(' ', 4096);
					ob_flush();
					flush();
					echo '开始获取目标网站信息，请尽量不要刷新页面，其实您刷新也没事，嘿嘿，程序会禁止您刷新，并在后台继续执行<br />';
					ob_flush();
                    flush();
					$file = @file_get_contents($list['url']);
					if($file){
						echo '已获取目标网站信息<br />';
						ob_flush();
                        flush();
						$file = trim($file);
						preg_match('|charset[ \s]*=[\"\' \s]*(.*?)[\"\' \s>]|i',$file,$a);
						if($a[1]){
							$a[1] = strtoupper($a[1]);
							//如果不是utf8则转换编码
							if('UTF-8'==$a[1]||'UTF8'==$a[1]){
							}else{
								$file = iconv($a[1],"UTF-8",$file);
								sleep(1);
								echo '进行编码转换<br />';
								ob_flush();
								flush();
							}
							$file = preg_replace('|<script([\s\S]*?)<\/script>|i','',$file);
							$file = preg_replace('|\s+\r|','',$file);
							sleep(1);
							echo '过滤目标网站特殊字符<br />';
							ob_flush();
							flush();
							//执行插入
							preg_match('|<title>([\s\S]*?)</title>|i',$file,$a);
							$data1['title'] =  $a[1];
							preg_match('|<meta name="keywords" content="([\s\S]*?)".*?>|i',$file,$a);
							$data1['keywords'] = $a[1];
							preg_match('|<meta name="description" content="([\s\S]*?)".*?>|i',$file,$a);
							sleep(1);
							echo '获取目标网站标题，关键字等信息<br />';
							ob_flush();
							flush();
							$data1['description'] = $a[1];
							$data1['catetime']   =  $time;
							$data2['html'] = addslashes($file);
							$r = $this->tmp_mod->updateWebData($id,$data2);
							if($r){
								sleep(1);
								echo '更新目标网站快照内容成功<br />';
								ob_flush();
								flush();
								ob_end_flush();
								$s = $this->tmp_mod->updateWeb($id,$data1);
								if($s){
									$this->jsAlert('快照更新完成！',$reto);
									exit;
								}else{
									$this->jsAlert('由于一些其他原因，快照内容已更新，但未更新信息主记录，记收录页信息，请稍后再试',$reto);
									exit;
								}
							}else{
								$this->jsAlert('对不起，由于一些其他不知道的原因，可能是目标网站的内容代码有问题，快照未能更新，请稍后再试',$reto);
							    exit;
							}
						}else{
							$this->jsAlert('对不起，目标网站编码出现问题，未声明其页面编码，无法更新',$reto);
							exit;
						}
					}else{
						$this->jsAlert('对不起，目标网站打开出现问题，请您直接点击目标网站链接，如果打不开，请进行报错，如果能打开，请稍后再重新试一下更新！',$reto);
						exit;
					}
				}else{
					$this->jsAlert('对不起，您更新太频繁了，请稍等60秒，避免服务器压力',$reto);
					exit;
				}
			}else{
				$this->jsAlert('对不起，查无此快照','/'.DIRS);
				exit;
			}
		}else{
			$this->jsAlert('对不起，禁止非正常访问！','/'.DIRS);
		    exit;
		}
    }
    
   
}