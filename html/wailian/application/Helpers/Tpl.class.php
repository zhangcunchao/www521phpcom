<?php
class Tpl extends Smarty{
	function __construct(){
		$this->template_dir='./templates/';       //模板目录变量
		$this->compile_dir='./cache/templates_c/';      //设置编译目录
		$this->config_dir='./config/';            //目录变量
		$this->cache_dir='./cache/';              //缓存文件夹
		$this->cache_lifetime=3600;
		$this->caching=0;                         //开始时 关闭缓存 上线时可以打开
			
		//左右边界符，默认为{}，但实际应用当中容易与JavaScript相冲突
		$this->left_delimiter='<{';
		$this->right_delimiter='}>';
	}
}