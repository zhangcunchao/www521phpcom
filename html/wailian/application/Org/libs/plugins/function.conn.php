<?php
function smarty_function_conn($param,&$smarty){

	//extract($param);

	$mysqli=new mysqli($param['localhost']);


	$sql="select * from ";

	$result=$mysqli->query($sql);


	while($row=$result->fecth_assoc()){



	}


	return ;


}


?>
