##php等守护进程监控脚本##

> 此脚本用户守护监控进程的执行情况，因为有的时候，我们用各类开发语言做的守护进程可能会因为一些特殊情况被退出，所以此脚本就是为了重启这些进程

代码：

	#!/bin/bash
	EMAIL='zhangcunchao_cn@163.com'
	start()
	{
	        c=`ps w -C php|grep $1|wc -l`
	        if [ $c -lt 1 ]
	        then
	          if [ -f "$1" ];then
	          /usr/local/php/bin/php $1 > /dev/null &
	          else
	          `echo 'no such file '$1 | mail -s 'process check error' $EMAIL`
	          fi
	        fi
	}
	BASE_PATH=`dirname $0`"/"
	cd $BASE_PATH
	
	start del_old_sessions.php
	start send_sms.php
	start send_mail.php

只需要在crontab里面添加此shell，一分钟一次即可

#### 说明： ####

此脚本自动获取脚本当前所在的目录，默认此脚本和其所监控的脚本在同一级目录，这样他执行ps命令，监控进程是否存在，不存在则重启进程。当然，我们也可以使用nohup来执行。