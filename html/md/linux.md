## linux简单笔记 ##

1、需安装后使用的命令

1.1、sz/rz 命令用于上传下载

      yum install lrzsz 安装
	  rz -y覆盖上传

1.2、查看是否安装某软件

	rpm -qa|grep ftp
	yum命令yum search

2、系统服务配置命令

2.1、防火墙设置

（1） 重启后永久性生效：

	开启：chkconfig iptables on
	关闭：chkconfig iptables off

（2） 即时生效，重启后失效：

	开启：service iptables start
	关闭：service iptables stop

2.2、加入开机启动项

	chkconfig vsftpd on

2.3、添加用户

	adduser -d /vsftphome/mmc1 -g ftp -s /sbin/nologin mmc1 家目录 不能登陆 ftp账号
	useradd 用户名
	passwd 用户名
	输入密码即可

2.4、切换用户

	su - root

2.5、查看端口

查看进程占用的端口号

	netstat -anp
	netstat -anp | grep 进程名称

查看使用端口号的进程

	lsof
	lsof -i:  端口号

查看所有僵尸进程

	ps -A -o stat,ppid,pid,cmd | grep -e '^[Zz]'

2.6、追踪进程 

	strace -p 10747

2.7配置ip

设置静态ip

/etc/sysconfig/network-scripts/ifcfg-eth0

	DDEVICE=eth0
	HWADDR=00:0C:29:9E:4A:13
	OTPROTO=none
	ONBOOT=yes
	NETMASK=255.255.255.0
	IPADDR=192.168.19.134
	GATEWAY=192.168.19.1
	TYPE=Ethernet

动态ip

	DEVICE=eth0  (网卡名称)
	BOOTPROTO=dhcp  (动态获取IP)
	ONBOOT=yes  (开启启动此网卡)
	/etc/init.d/network restart

设置CentOS静态IP：虚拟机需要去掉dscp设置

涉及到三个配置文件，分别是：

/etc/sysconfig/network/etc/sysconfig/network-scripts/ifcfg-eth0/etc/resolv.conf

 首先修改/etc/sysconfig/network如下：

	NETWORKING=
	yes
	HOSTNAME
	=localhost.localdomainGATEWAY=192.168.129.2

指定网关地址。

然后修改/etc/sysconfig/network-scripts/ifcfg-eth0：


	DEVICE="eth0"#BOOTPROTO="dhcp"
	BOOTPROTO="static"
	IPADDR=192.168.129.129
	NETMASK=255.255.255.0HWADDR="00:0C:29:56:8F:AD"IPV6INIT="no"NM_CONTROLLED="yes"ONBOOT="yes"TYPE="Ethernet"UUID="ba48a4c0-f33d-4e05-98bd-248b01691c20"DNS1=192.168.129.2

注意：这里DNS1是必须要设置的否则无法进行域名解析。

最后配置下/etc/resolv.conf：

nameserver 192.168.129.2

其实这一步可以省掉，上面设置了DNS Server的地址后系统会自动修改这个配置文件。


这样很简单几个步骤后虚拟机的IP就一直是192.168.129.129了。

2.8、分割文件

	split -b 100m filename

2.9、设置文件目录权限

	chmod -R 644 ./*.*
	find /path -type f -exec chmod 644 {} \;  //设置文件权限为644
	
	find /path -type d -exec chmod 755 {} \;  //设置目录权限为755

2.10、替换字符

	sed -n/-i "s/a/b/g" file
	awk -F ' ' '{printf}'
	cat access_20130704.log | awk '{print $1}'| sort | uniq -c | sort -nr | head -20
	cat www.521php.com.log |grep '/api/fav/' | awk '{print $11}'| sort | uniq  | awk -F'[/:]' '{print $4}'|uniq

2.11、文件操作

	awk -F "=" 'BEGIN {count=0;}{count=count+$3;}END {print "count is ", count}' log.txt
	grep -a "ddd" file
	tail -n +5 www.abc.com.log

2.12、复制覆盖

	yes|cp -avpf a/ b/
	/cp

2.13、find

	find -path "*.svn*" -prune -o -regex '.*\.gif\|.*\.png\|.*\.jpg' -print |xargs wc -l #统计行数

2.14、全文件查找

	grep "string" (dir|file)
	grep "ffffff" ./*.log
	grep "fffff"  ./log -R

2.15、从nginx log查看访问前10的ip

	cut access.log -d" " -f1|sort|uniq -c|sort -nr|head -n 10

1）查看网卡型号
     lspci | grep Ethernet
     这个命令可以查看你的网卡设备型号，根据型号就知道是什么性能了。
2）查看网卡实际通讯速率
    dmesg | grep eth0     
    这个命令可以列出网卡工作速率。看到 Up 1000Mps full duplex 就知道是千兆网卡了。
   （这里 eth0是网卡的设备名，不同机器名称可能不同。可以用ifconfig 查看自己网卡的设备名）

3、其他命令

3.1、mysql命令

binlog

	/usr/local/mysql/bin/mysqlbinlog -v --base64-output=DECODE-ROWS --set-charset=gbk --start-datetime='2017-08-05 12:00:00' -d xyk2_db mysql-bin.000012 |grep insert

3.1.1、导出sql

	mysqldump -u$root2 -p$pwd2 -h$ip2 --opt $db2 amc_advertise_idea_relation >> $sqlfile

3.1.2、导入

	mysql -u$root3 -p$pwd3 -h$ip3 --default-character-set=utf8 $db3 < $sqlfile

3.1.3、执行sql

	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "{create_db_sql}"

3.1.4、添加用户

	insert into mysql.user(Host,User,Password) values('localhost','jeecn',password('jeecn'));

3.1.5、刷新系统权限表

	flush privileges;

3.1.6、

	grant all  on jeecnDB.* to jeecn@'localhost' identified by '密码';

//刷新系统权限表

	mysql>flush privileges;
	mysql>其它操作

//如果想指定部分权限给一用户，可以这样来写:

	mysql>grant select,update on jeecnDB.* to jeecn@'localhost' identified by '密码';

3.1.7、设置远程连接

	mysql>update user set host = '%' where user = 'root';
	mysql>flush privileges;

3.1.8、查看mysql连接状态

	show full processlist;

	==
	
	select * from information_schema.processlist limit 10
	

3.2、date
date -s 2010-02-03 12:00:00
将系统时间写入硬件

	clock --systohc

读取硬件时间到系统

	clock --hctosys

4、错误信息修改命令

4.1、Can't connect to MySQL server on 'localhost' (13) 错误解决方法 【主要是linux下php连接不上mysq时】

setsebool -P httpd_can_network_connect=1

4.2、vim初始

	set cursorline                                                                                                                                                              
	set nu
  
4.3、iptables

	iptables -I INPUT -s 112.216.56.86 -j DROP
	
	iptables -D INPUT -s 112.216.56.86 -j DROP

5、git

	$ git remote add origin git@github.com:michaelliao/learngit.git 添加远程库
	$ git push -u origin master 强推本地库
	
	$ git config --global user.name "zhang.cunchao"
	$ git config --global user.email "zhangcunchao_cn@163.com"
	$ ssh-keygen -t rsa -C “zhangcunchao_cn@163.com”

5.2 git添加一个空目录

	# Ignore everything in this directory
	*
	# Except this file
	!.gitignore

6 redis

	#!/bin/sh
	user=''
	pwd=''
	host='localhost'
	MYDATE=`date +%Y-%m-%d`
	mysqldump -u$user -p$pwd -h$host --opt wxapi --skip-comments | gzip > /home/mysql/wxapi/wxapi-$MYDATE.sql.gz

	redis-dump -u :password@127.0.0.1:6379 |gzip > /home/mysql/redis/db-$MYDATE.sql.gz
	exit 0


