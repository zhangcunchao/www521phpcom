<?php
   $file = @$_GET['file'];
   if(!is_file($file))
   header("HTTP/1.0 404 Not Found");
   header("Content-type: text/html; charset=utf-8");
   date_default_timezone_set('Asia/Shanghai');
   function markUrl($url){
	  $root = '/data/www/www.521php.com/html/';
	  $url  = rtrim($url,'/');
	  $url  = str_replace($root,'',$url);
	  $d = explode('/',$url);
	  $u = '';
	  $l = '';
	  foreach($d as $val){
		$u .= '/'.$val;
		$l .= '/<a href="'.$u.'">'.$val.'</a>'; 
	  }
	  return $l;
   }
   $filename = strrchr($file,'/');
   $filename = ltrim($filename,'/');
   $odir = rtrim($file,$filename);
   $content = shell_exec('/usr/bin/kramdown  '.$file);
   @preg_match('/<h2.*?>(.*?)<\/h2>/isU',$content,$title);
   isset($title[1])?$title = $title[1]:$title=$filename;
?>
<head>
<title><?php echo $title;?></title>
<link href="/css/github-2.css" media="all" rel="stylesheet" type="text/css">
<link href="/css/github-5.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header header-logged-in true" role="banner">
  <div class="container clearfix">
    <a class="header-logo-invertocat" href="/" data-hotkey="g d" aria-label="Homepage" ga-data-click="Header, go to dashboard, icon:logo">
</a>

      <ul class="header-nav left" role="navigation">
        <li class="header-nav-item explore">
          <a class="header-nav-link" href="/" data-ga-click="Header, go to explore, text:explore">站点首页</a>
        </li>
		<li class="header-nav-item">
            <a class="header-nav-link" href="/archives/category/lovephp/" data-ga-click="Header, go to gist, text:gist">我爱php</a>
          </li>
          <li class="header-nav-item">
            <a class="header-nav-link" href="/archives/category/tj/" data-ga-click="Header, go to gist, text:gist">推荐文章</a>
          </li>
		   <li class="header-nav-item">
            <a class="header-nav-link" href="/md/" data-ga-click="Header, go to blog, text:blog">markdown</a>
          </li>
          <li class="header-nav-item">
            <a class="header-nav-link" href="/xiangce/" target="_blank" data-ga-click="Header, go to blog, text:blog">相册</a>
          </li>
		  <li class="header-nav-item">
            <a class="header-nav-link" href="/flink/" data-ga-click="Header, go to blog, text:blog">兄弟链</a>
          </li>
        <li class="header-nav-item">
          <a class="header-nav-link" href="/message/" data-ga-click="Header, go to help, text:help">关于我</a>
        </li>
      </ul>
  </div>
</div>
<div class="container">
	<div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container="">
	<div class="file-wrap">
	  <table class="files" data-pjax="">
		<tbody>
		<?php
			$dir = opendir($odir);
			while (($f = readdir($dir)) !== false){
				if('.' !=$f && '..' != $f){
				$href = $f;
				$type = 'File';
				if(is_dir($odir.$f)){
					$href = $f.'/index.md';
					$type = 'Dir';
				}
				$time = date('Y-m-d H:i:s',filemtime($odir.$f));
		?>
			<tr>
			  <td class="icon">
			  </td>
			  <td class="content">
				<span class="css-truncate css-truncate-target"><a href="<?php echo $href;?>" class="js-directory-link" title=""><?php echo $f;?></a></span>
			  </td>
			  <td class="message">
				<span class="css-truncate css-truncate-target">
				<?php echo $type;?>
				</span>
			  </td>
			  <td class="age">
				<span class="css-truncate css-truncate-target"><?php echo $time;?></span>
			  </td>
			</tr>
			<?php
				}
			}
		    ?>
		</tbody>
	  </table>
	</div>
		<div class="file-box">
           <div class="file">
			<div class="meta clearfix">
			  <div class="info file-name">
				  <span><?php echo markUrl($file);?></span>
			  </div>
			</div>
			<div id="readme" class="blob instapaper_body">
				<article class="markdown-body entry-content" itemprop="mainContentOfPage">
				<?php
				   echo $content;
				?>
				</article>
                     <div id="uyan_frame"></div>
			</div>
		   </div>
		</div>
	</div>
</div>
<!-- UY BEGIN -->
<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1699342"></script>
<!-- UY END -->
<span style="display:none"><script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script></span>
<script src="http://libs.useso.com/js/jquery/1.9.1/jquery.min.js"></script>
<script type='text/javascript' src="http://www.521php.com/wailian/public/scripts/ad.js"></script>
<script>
function hid(){
	$(".file-wrap").animate({opacity: "hide"}, "slow");
}
function shw(){
	$(".file-wrap").animate({opacity: "show"}, "slow");
}
$(document).ready(
    function()
    {
		setTimeout("hid()",2000);
		$(".file-wrap").click(function () {hid();});
		$(".clearfix").click(function () {
			if("none"==$('.file-wrap').css('display')){
				shw();
			}else{
				hid();
			}
		});
    }
);
</script>
</body>
