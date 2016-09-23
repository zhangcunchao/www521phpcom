##file_put_contents和fwrite对比，以及他们在高并发下问题##



> 先说结论，单次性能，file_put_contents要比fwrite好，这个也很好理解，因为写入文件，file_put_contents就一行代码，fwrite至少三行，虽然不是说代码行少就一定快，但就这个写入功能来说，file_put_contents就等于fopen fwrite fclose，之所以前者快，就是因为一次api交互，直接干了这三件事，后者有三次api的开销。
> 
> 再说问题，其实不能说是问题，应该说是一个需要注意的点，默认情况下，两者都是不是使用独占锁的方式运行，所以在高并发下，会有写入的内容被覆盖的问题。这里需要通过独占锁的方式来解决。

之前过某篇文章，对比file_put_contents和fwrite的性能，是用的循环100w次写入的方式对比，记得当时的结论是，file_put_contents用了300多秒，fwrite 10秒，那是因为，他讲fopen和fcolse放到了循环外，如果你100w拼成一个长字符，最后一次写入，那肯定更快。所以很多结论都是有特定场景的。

实验一、

	<?php
	$n = "1\n";
	file_put_contents('2.txt',$n,FILE_APPEND);

ab

	ab.exe -c 50 -n 100 http://local.test.com/1.php

结果，多次验证取中间结果

	Concurrency Level:      50
	Time taken for tests:   0.075 seconds
	Complete requests:      100
	Failed requests:        0
	Write errors:           0
	Total transferred:      21500 bytes
	HTML transferred:       0 bytes
	Requests per second:    1329.79 [#/sec] (mean)
	Time per request:       37.600 [ms] (mean)
	Time per request:       0.752 [ms] (mean, across all concurrent requests)
	Transfer rate:          279.20 [Kbytes/sec] received

2.txt写入了86行，这里就出现了高并发下的问题，这里注意qps为1329

实验二、

	<?php
	$n = "1\n";
	
	$fp = @fopen('2.txt', 'ab');
	flock($fp, LOCK_EX|LOCK_NB);
    fwrite($fp, $n);
    flock($fp, LOCK_UN);
    fclose($fp);

结果：

	Concurrency Level:      50
	Time taken for tests:   0.078 seconds
	Complete requests:      100
	Failed requests:        0
	Write errors:           0
	Total transferred:      21500 bytes
	HTML transferred:       0 bytes
	Requests per second:    1278.63 [#/sec] (mean)
	Time per request:       39.105 [ms] (mean)
	Time per request:       0.782 [ms] (mean, across all concurrent requests)
	Transfer rate:          268.46 [Kbytes/sec] received

2.TXT写入81行，发现qps的确是比file_put_contents低一些，1278

实验三、

	<?php
	$n = "1\n";
	
	file_put_contents('2.txt',$n,FILE_APPEND|LOCK_EX);

结果：

	Concurrency Level:      50
	Time taken for tests:   0.084 seconds
	Complete requests:      100
	Failed requests:        0
	Write errors:           0
	Total transferred:      21500 bytes
	HTML transferred:       0 bytes
	Requests per second:    1187.44 [#/sec] (mean)
	Time per request:       42.108 [ms] (mean)
	Time per request:       0.842 [ms] (mean, across all concurrent requests)
	Transfer rate:          249.32 [Kbytes/sec] received

2.txt这次写入了100行，没有丢失，但是qps发现下降了不少1187

实验四、

	<?php
	$n = "1\n";
	
	$fp = @fopen('2.txt', 'ab');
	flock($fp, LOCK_EX);
    fwrite($fp, $n);
    flock($fp, LOCK_UN);
    fclose($fp);

结果：

	Concurrency Level:      50
	Time taken for tests:   0.095 seconds
	Complete requests:      100
	Failed requests:        0
	Write errors:           0
	Total transferred:      21500 bytes
	HTML transferred:       0 bytes
	Requests per second:    1049.80 [#/sec] (mean)
	Time per request:       47.628 [ms] (mean)
	Time per request:       0.953 [ms] (mean, across all concurrent requests)
	Transfer rate:          220.42 [Kbytes/sec] received

2.txt同样没有丢失，qps也是有下降。

当然了，这两个函数，和你的系统，软件版本，文件系统有很大的关系，linux下的性能明显比window要好一些。所以这里就像我上篇文章说的，web程序，和你做一个类似的批处理程序，写法是不一样，因为着重的点不一样。就是因为没有锁，所以才有好的并发效果，但是你如果一定要强制写入的完整，就需要牺牲并发的性能。

如果我们在做文件处理脚本，就适合使用颗粒度更小的函数，这样你才能在关键点，通过函数、系统逻辑特性做出优化。所以没有银弹，任何的东西都是相对的。
	