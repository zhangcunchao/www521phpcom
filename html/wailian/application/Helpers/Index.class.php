<?php 
class Index{
	
	
	public static function head($name = '',$mainframe_url = '',$index_url = ''){
	    $head = '<div class="top"><div class="logo" style="font-size:50px;text-align:left;color:#fff;">仓储管理系统<!--<img src="" width="229" height="71" />--></div>
  				<p><span>您好,'.$name.'</span><a href="'.$mainframe_url.'">主菜单</a> | <a href="'.$index_url.'">系统主页</a></p>
			</div>    		
    	';
	    return $head;
	}
	
	
	public static  function left($param = '',$url_safety = '',$url_quit = '',$url_indexs = ''){
		$left1 = '
		  <div class="left" style="min-height:600px;">
		  <div id="tip">
		    <ul>
		      <li><a href="'.$url_safety.'">系统首页</a></li>
		      <li><a href="'.$url_quit.'">安全退出</a></li>
		    </ul>
		  </div>
		  
		  <div id="nav">
    	';
		$left3 = '
		  </div>
		</div>
		';
		$i = 0;
		foreach($param as $key=>$value){
			$left2 .= '<h3   onclick="change('.$i.')"><a class="over" href="#">'.$key.'</a></h3><ul style="display:none;">';
			foreach($value as $k=>$v){
			$left2 .='
		      <li><a href="'.$k.'" target="main">'.$v.'</a></li>
			';
			}
			$left2 .='</ul>';
			$i ++;
	    }	
	$left = $left1.$left2.$left3;
	return $left;	
	}
}