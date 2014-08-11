<?php
function smarty_function_table($a,&$smarty){

	$str='<table width="800" border="1">';
	for($i=0;$i<$a['rows'];$i++){
		if($i%2==0){
			$str.="<tr bgcolor='$a[onecolor]'>";
		}else{
			$str.="<tr bgcolor='$a[twocolor]'>";

		}
		for($j=0;$j<$a['cols'];$j++){
			$str.='<td>'.($i*$a['cols']+$j).'</td>';
			
		}



		$str.='</tr>';


	}

	$str.='</table>';
	return $str;



}



?>
