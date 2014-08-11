=== Plugin Name ===
Contributors: samoolee
Donate link: http://liguoliang.com/
Tags: qzone, qq, qq空间, post2Qzone
Requires at least: 2.0.2
Tested up to: 3.5.0
Stable tag: 1.2.1

post2Qzone

== Description ==
post2Qzone是一款将新Post同步发表到Qzone的小插件. 可将新文章同步发布到Qzone的制定目录(无对应目录会自动创建), 支持使用Windows Live Writer发布, 并可同时抄送到指定邮箱.
功能列表:

*  将新文章同步发布到Qzone
*  设置新文章的发布目录
*  设置文章前缀/后缀
*  设置抄送邮箱

本插件基于使用了PHPMailer.

PS: QQ密码不会被泄露, 请放心使用.
使用前请开通QQ邮箱的SMTP服务, 具体可登陆邮箱后进入 设置> 账户 配置页开启POP3/SMTP服务

<a href="http://liguoliang.com/" target='_blank'>欢迎访问我的博客.</a> 

== Installation ==

安装:

1. 上传'post2qzone.php'到'/wp-content/plugins/'目录
2. 激活插件
3. 进入配置菜单下的Post2Qzone进行配置

== Frequently Asked Questions ==

= 发布失败, 该如何查找原因? =
前往: <a href="http://liguoliang.com/2010/post2qzone/" target='_blank'>插件主页</a> 查看具体解决方法, 或访问:  <a href="http://liguoliang.com/" target='_blank'> 我的博客 </a>

== Screenshots ==
*暂无

== Changelog ==

= 1.2.2 =
1. 修复Metadata更新/检查的bug
2. 增加功能: 同步每次更新, 具体方法参考:<a href="http://liguoliang.com/tag/post2qzone/" target='_blank'>帮助信息</a>

= 1.2.1 =
默认使用SSL发送邮件, 修改已知目录排除bug.

= 1.1.1 =
 修正邮箱错误 - 试图增加对Wordpress.com的支持, 但目前仍未测试成功, 暂时放弃.

= 1.1.0 =
* 增加了对文章输出格式及长度控制
* 增加了参与同步的目录

= 1.0.1 =

* 修正部分提示信息, 增加发布Debug功能.

= 1.0 =
* 初始版本

== Upgrade Notice ==
= 1.0 =
*无
'<?php code(); // goes in backticks ?>'