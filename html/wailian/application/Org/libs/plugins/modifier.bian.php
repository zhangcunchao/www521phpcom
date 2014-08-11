<?php
function smarty_modifier_bian($string,$type=1,$cat=''){
	//如果为1，则全部大写
	//如果为2,全部小写
	//
	$string.=$cat;
	switch($type){
		case 1:

			return ucfirst($string);
			break;
		case 2:

			return strtolower($string);
			break;
		case 3:
			return strtoupper($string);
			break;
	}
		
	


}


?>
