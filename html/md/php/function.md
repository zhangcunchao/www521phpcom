##php一些好用的内置函数##

strip_tags去掉html js等代码

str_split(sting,40)按指定长度分割字符为数组

strpos(string,val) 判断第一次出现的位置

1.替换字符  str_ireplace('<','',$content);   将$content里面的<替换为''（空）；对大小写不敏感

str_replace 对大小写敏感

2.分割字符 explode(以什么分割,要分割的字符);

3.连接字符 implode("以什么连接"，要连接的数组);=join

4.strstr(a,b)获取b在a首次出现后的位置后的所有字符

extract 降维

shuffle()打乱数组

5.strrchr(a,b)获取b在a最后一次出现的位置后的所有字符， 可用于获取文件的扩展名，因为很多文件的名字中不止一个点。


6.strtotime 转换为时间戳

7.原文输出有php或html的代码

	$str="<h1>PHP</h1>";
	echo htmlentities(nl2br($str));   htmlentities是原文输出，nl2br是在$str的每一行之后加上<br />或<br>
	html_entity_decode

8 stripcslashes() 函数删除由 addcslashes() 函数添加的反斜杠

9 urlencode($filename);//转码，将中文转换成%数，将空格转换为+。空格为%20

UrlEncode反转码

10 strtolower() 将字符转换为小写

11 strlen() 获取字符的长度

12 substr_count(a,b); 获取b在a中出现的次数  strpos(a,b); 获取b在a中首次出现的位置

13 ltrim(str[,charlist]) 去掉字符左边的空白符或指定的字符

14 rtrim(str[,charlist]) 去掉字符右边边的空白符或指定的字符

15 trim(str[,charlist])  去掉字符开始和结束位置的空白符或指定的字符


17 file(file) 将文件每行付给一个数组

18 file_get_content(file) 将文件内容付给一个字符

19 strrpos(string,'.'); 返回.在字符中最后一次出现的位置

   strpos(string,'.'); 返回.在字符中第一次出现的位置

20 pathinfo() 函数以数组的形式返回文件路径的信息。

	<?php
	print_r(pathinfo("/testweb/test.txt"));
	?>
	输出：
	Array
	(
	[dirname] => /testweb
	[basename] => test.txt
	[extension] => txt
	)

21 array_pop — 将数组最后一个单元弹出（出栈）就是将该元素从数组中去掉付给一个变量

22 ucwords(string)将字符串的首字符转换成大写

   ucwords('abc df'); //Abc Df

   ucfirst('abc df'); //Abc df

23  echo number_format('1234567890.4545',2,'.',','); //1,234,567,890.45

24 serialize  unserialize 将数组和可存储字符间转换