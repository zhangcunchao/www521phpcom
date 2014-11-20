##git常用命令##

1、git配置全局信息

	git config --global user.name "zhang.cunchao"
	git config --global user.email "zhangcunchao_cn@163.com"

2、git生成public_key

	ssh-keygen -t rsa -C "zhangcunchao_cn@163.com"

3、git克隆，指定维度

	git clone git://xxoo --depth 1

4、git添加远程库

	git remote add origin git@github.com:michaelliao/learngit.git 添加远程库
	git push -u origin master 强推本地库

5、git添加一个空目录，即只同步本空目录

	# Ignore everything in this directory
	*
	# Except this file
	!.gitignore

6、git恢复指定文件的历史版本

	#查看相应版本号
	git log --pretty=oneline 指定文件
	#重置版本号
	git reset git版本号 指定文件
	#检出指定文件
	git checkout -- 指定文件

7、查看版本详细日志

	git show git版本号

8、输出最后一次提交的改变

这个命令，我经常使用它 来发送其他没有使用git的人来检查或者集成所修改的。它会输出最近提交的修改类容到一个zip文件中。

	git archive -o ../updated.zip HEAD $(git diff --name-only HEAD^)