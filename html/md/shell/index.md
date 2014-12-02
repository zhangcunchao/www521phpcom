##shell相关笔记##

1、守护进程监控

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