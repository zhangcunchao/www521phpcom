##nginx和php平滑重启##

#### php-fpm平滑重启 ####

> php 5.3.3 下的php-fpm 不再支持 php-fpm 以前具有的 /usr/local/php/sbin/php-fpm (start/stop/reload)等命令，需要使用信号控制：

master进程可以理解以下信号

INT, TERM 立刻终止

QUIT 平滑终止

USR1 重新打开日志文件

USR2 平滑重载所有worker进程并重新载入配置和二进制模块

示例：

	php-fpm 关闭：
	kill -INT `cat /usr/local/php/var/run/php-fpm.pid`
	php-fpm 重启：
	kill -USR2 `cat /usr/local/php/var/run/php-fpm.pid`
	查看php-fpm进程数：
	ps aux | grep -c php-fpm

#### nginx平滑重启 ####

	nginx -t #检查配置项是否正确
	nginx -s reload #平滑重启

