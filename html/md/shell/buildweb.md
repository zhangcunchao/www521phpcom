## 一键式nginx站点搭建脚本 ##

概述：此脚本为一键式交互式搭建web站点，当然其中一些配置是按照我自己的服务器配置来配置的，如果别人要使用，需要根据自己的实际情况配置，脚本集成交互式创建ftp账号，数据库、用户，web目录初始化

#### 功能包括： ####

1. 项目目录创建，权限，用户分配
2. 数据库创建(可选)
3. nginx配置

#### 说明： ####

> nginx是一种高效的web服务器，并且可以作为反向代理服务器使用，使用nginx配合php的fpm可以提高高效的web服务。是lamp的很好的替代品

> 1、此脚本目录分为html、log 、bak三个大目录，分别用来存放项目主文件，日志文件，备份文件

> 2、项目目录初始权限为755，用户：用户组为脚本交互创建的用户：ftp属组

> 3、如果需要使用数据库，根据提示输入数据库名称，即可逐步创建数据库，用户，不输入则不创建

> 4、nginx拷贝提供一个源nginx配置文件，主要是配置日志

此脚本其实是很简单的，但是涉及到的还是挺全面的，用户创建，权限分配，mysql用户配置，nginx配置等

#### 代码： ####

	#/bin/sh
	hosts="/data/www"
	default="/etc/nginx/default.conf"
	vhost="/etc/nginx/vhost"
	echo "1.add ftp user"
	echo "please input websit:"
	read host
	if [ -d "$hosts/$host" ]
	then
	echo $hosts/$host
	echo '[warning]dir is already exists!'
	exit 0
	fi
	echo "add user,please input user name:"
	read name
	del -r $name >/dev/null 2>&1
	adduser -d $hosts/$host -g ftp -s /sbin/nologin $name
	passwd $name
	chmod 755 $hosts/$host
	mkdir -p $hosts/$host/html $hosts/$host/bak $hosts/$host/log/oldlog
	mkdir -p $hosts/$host/bak/code $hosts/$host/bak/sql
	echo "mkdir:"$hosts/$host/html $hosts/$host/bak $hosts/$host/log
	echo "mkdir:"$hosts/$host/bak/code $hosts/$host/bak/sql
	chown -R $name:ftp $hosts/$host
	echo "ok,add user success!name=$name,password=youwrite"
	echo "please input database name"
	read database
	if [ -n "$database" ]
	then
	echo "please input dbuser"
	read dbuser
	echo "please input dbpwd"
	read dbpwd
	HOSTNAME="127.0.0.1"
	PORT="3306"
	USERNAME="root"
	echo "input root pwd"
	read PASSWORD
	fi
	echo "2.To configure nginx"
	cat $default | sed -e "s:#hosts#:${hosts}:g"|sed -e "s/#host#/${host}/g" > $vhost/$host.conf
	/usr/sbin/nginx -s reload
	echo "config nginx success"
	if [ -z "$database"  ]
	then
	echo 'ok,finish!'
	exit 0
	fi
	echo "3.add mysql user database"
	
	create_db_sql="insert into mysql.user(Host,User,Password) values('localhost','${dbuser}',password('${dbpwd}'))"
	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "${create_db_sql}"
	if [ $? -ne 0 ]
	then
	echo 'add db user error'
	exit 0
	fi
	sleep 1
	create_db_sql="create database IF NOT EXISTS ${database}"
	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "${create_db_sql}"
	if [ $? -ne 0 ]
	then
	echo 'add db error'
	exit 0
	fi
	sleep 1
	create_db_sql="flush privileges"
	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "${create_db_sql}"
	
	create_db_sql="grant all  on ${database}.* to ${dbuser}@localhost identified by '${dbpwd}'"
	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "${create_db_sql}"
	if [ $? -ne 0 ]
	then
	echo 'user to db user error'
	echo $create_db_sql
	exit 0
	fi
	create_db_sql="flush privileges"
	mysql -h${HOSTNAME}  -P${PORT}  -u${USERNAME} -p${PASSWORD} -e "${create_db_sql}"
	echo 'ok,finish!'

