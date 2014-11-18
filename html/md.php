<?php
   $file = @$_GET['file'];
   if(!is_file($file))
   header("HTTP/1.0 404 Not Found");
   header("Content-type: text/html; charset=utf-8");
   $filename = strrchr($file,'/');
   $dir = rtrim($file,$filename);
?>
<head>
<title>
<?php echo $filename;?>
</title>
<link href="https://assets-cdn.github.com/assets/github-59da74dcbe2f1d555e306461652274f8741238a64e7b1fe8cc5a286232044835.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container="">
		<div class="file-box">
			<div class="meta clearfix">
			  <div class="info file-name">
				  <span><?php echo $filename;?></span>
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
</body>