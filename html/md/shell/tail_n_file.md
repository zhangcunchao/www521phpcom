##tail -f多个文件##

> 有的时候我们需要监控多个文件日志，可以使用此脚本，保存为view.sh，执行sh view.sh file1 file2 ...

代码：

	#!/bin/sh                                                                                                                                                                          
	function clean()
	{
	  #echo $@;
	  #for file in "$@"; do ps -ef|grep $file|grep -v grep|awk '{print $2}'|xargs kill -9; done
	  jobs -p|xargs kill -9  
	}
	files=$@
	 
	# When this exits, exit all back ground process also.
	#trap "ps -ef|grep tail|grep -v grep|awk '{print "'$2'"}'|xargs kill -9" EXIT
	 
	trap "clean $files " EXIT
	 
	# iterate through the each given file names,
	for file in "$@"
	do
	        # show tails of each in background.
	        tail -f $file &
	done
	 
	# wait .. until CTRL+C
	wait

