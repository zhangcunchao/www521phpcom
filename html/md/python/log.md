##python实现nginx日志实时监控脚本##

此脚本为nginx守护脚本，配合shell进程监控脚本实现简单的恶意访问屏蔽1

	#!/usr/bin/python2.6
	#coding=utf-8
	import os
	import time
	#日志记录
	num_file = '/data/www/www.521php.com/log/num'
	log_file = '/data/www/www.521php.com/log/www.521php.com.log'
	#ip屏蔽函数
	def shellcmd(ip,con):
	    os.system('/root/shell/nginx/editblocksip.sh add '+ip)
	    os.system('echo '+con+' | mail -s "log info" zhangcunchao_cn@163.com')                                                                                                         
	
	nowfile = os.getcwd()+"/"+__file__
	stime = os.stat(nowfile).st_mtime
	#修改时间变化退出
	while stime == os.stat(nowfile).st_mtime:
	    log_num = str(int(os.popen("cat "+num_file).read()))
	    real_num = str(int(os.popen("cat "+log_file+" | wc -l").read()))
	    if log_num != real_num:
	        #插入新记录条数
	        os.system('echo '+real_num+' > '+num_file)
	        content =  os.popen("tail -n +"+log_num+" "+log_file).read().split("\n")
	        for con in content:
	            if ""!=con:
	                c = con.split(' ')
	                if '403' != c[8] and '112.253.28.43' != c[0]:
	                    if ".rar" in  c[6]:
	                        shellcmd(c[0],con)
	                    elif '/wp-comments-post.php' in c[6] and 'MSIE' == c[13] and '6.0;'== c[14]:
	                        shellcmd(c[0],con)
	                    elif '"-"' == c[11] and '"-"' == c[12] and  '.php' in c[6]:
	                        shellcmd(c[0],con)
	    time.sleep(1)