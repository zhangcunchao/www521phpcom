<?php
   $file = @$_GET['file'];
   if(!is_file($file))
   header("HTTP/1.0 404 Not Found");
   header("Content-type: text/html; charset=utf-8");
   date_default_timezone_set('Asia/Shanghai');
   function markUrl($url){
	   echo $url.'<br />';
	  $root = '/data/www/www.521php.com/html/';
	  $url  = rtrim($url,'/');
	  $url  = ltrim($url,$root);
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
?>
<head>
<title><?php echo $filename;?></title>
<link href="https://assets-cdn.github.com/assets/github-59da74dcbe2f1d555e306461652274f8741238a64e7b1fe8cc5a286232044835.css" media="all" rel="stylesheet" type="text/css">
<link href="https://assets-cdn.github.com/assets/github2-22a0054564248c6dd87336e91bca068b1ab49e28ee1062519b3a0722d29da804.css" media="all" rel="stylesheet" type="text/css">
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
				   echo system('/usr/bin/kramdown  '.$file);
				?>
				</article>
			</div>
		   </div>
		</div>
	</div>
</div>
<span style="display:none"><script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script></span>
<script type="text/javascript">
    /*120*300 创建于 2014-08-12*/
var cpro_id = "u1655076";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/f.js" type="text/javascript"></script>
</body>