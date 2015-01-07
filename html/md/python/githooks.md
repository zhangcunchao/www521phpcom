##python实现git钩子代码##

svn的钩子十分好用，git也可以实现类似的钩子功能，只不过因为其为分布式的，实现钩子的方式有些特殊！！！

此功能需要web.py，github等远程库的webhooks支持

	import web 
	import os
	import demjson
	urls = ( 
	    '/github', 'hello',
	    '/github/', 'hello',
	)
	class hello:
	    def GET(self,a=''):
	        print 'only post'
	    def POST(self,name=''):
	        i = web.input()
	        if not i.has_key('payload'):
	            print 'nodata'
	        else:
	            data = demjson.decode(i.payload)
	            if 'update' == data['commits'][0]['message']:
	                dir  = '/data/www/www.521php.com/'                                                
	                os.system('cd '+dir+';git pull origin master 1>/dev/null 2>&1')    
	                os.system('echo "git update" | mail -s "web update" zhangcunchao_cn@163.com')
	if __name__ == "__main__": web.run(urls, globals())