##python实现git钩子代码##

svn的钩子十分好用，git也可以实现类似的钩子功能，只不过因为其为分布式的，实现钩子的方式有些特殊。。

	#!/usr/bin/python2.6
	#coding=utf-8
	import os
	import time
	dir  = '/data/www/www.521php.com/'
	file = '/data/log/git.log'
	nowfile = os.getcwd()+"/"+__file__
	stime = os.stat(nowfile).st_mtime
	#修改时间变化退出
	while stime == os.stat(nowfile).st_mtime:
	    log = os.popen("cat "+file).read()
	    if '' != log:
	        os.system('echo "" > '+file)
	        os.system('cd '+dir+';git pull origin master 1>/dev/null 2>&1')        
	        os.system(u'echo "git版本提交，网站更新" | mail -s "网站自动更新" zhangcunchao_cn@163.com')
	    time.sleep(1)
	else:
	    os.system('echo "python git pull Process end" | mail -s "process check" zhangcunchao_cn@163.com')