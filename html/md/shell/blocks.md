# nginx add blocksip脚本#

> 此脚本为shell命令一键添加、移除nginx黑名单

ps:nginx的block黑名单，可以让返回403错误，我的博客就使用了这个功能，我写了一个日志分析脚本，当发现访客的访问行为异常时，就会自动将其ip加入nginx黑名单，返回给其一个403错误页面，提示其访问行为异常。

代码：

	#!/bin/sh
	E_PATH="/root/shell/email.sh"
	file="/etc/nginx/conf/blocksip.conf"
	v1=$1
	v2=$2
	source $E_PATH
	if [ $v1 = "add" ]
	then
	  deny_info=`cat $file | grep $v2`
	  if [ -z "$deny_info" ]
	  then
	  `echo "deny $v2;" >> $file`
	  `/usr/sbin/nginx -s reload`
	  `cat $file|mail -s "edit blocks list" $EMAIL`
	  fi
	else if [ $v1 = "del" ]
	then
	  n_info=`cat $file | grep -v $v2`
	  `echo $n_info > $file`
	  `/usr/sbin/nginx -s reload`
	  `cat $file|mail -s "edit blocks list" $EMAIL`
	fi
	fi
	exit 0

使用起来也很简单

    sh editblocksip.sh add ip //添加黑名单
    sh editblocksip.sh del ip //移除黑名单

并且会发送邮件提醒

这里使用了source来引用外部shell脚本