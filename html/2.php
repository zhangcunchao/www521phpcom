<?php
header("Content-type:text/html;charset=utf-8");
$file = '/home/www/www521phpcom/html/md/11.md';
echo shell_exec('cat '.$file);
echo shell_exec('/usr/local/bin/kramdown '.$file);

$file = '/home/www/www521phpcom/html/md/1.md';
echo shell_exec('cat '.$file);
echo shell_exec('/usr/local/bin/kramdown '.$file);

