##php多维数组排序##



> 第一种，按照日期排序、过滤

	$d = date('Y-m-d');
	function check_date($data,$key,$date=''){
	    if(!$date){
	        $date = date('Y-m-d');
	    }
	    $rdata = array_reduce($data, create_function('$v,$w', 'if($w["'.$key.'"]>="'.$date.'"){$v[$w["Dept_Date"]]=$w;return $v;}'));
	    asort($rdata);
	    return $rdata;
	}
	$caissa_2 = array(
	        array(
	            'Dept_CityId'   => 'BJS',
	            'Arrive_CityId' => 'SIN',
	            'FlightType'    => 'RT',//航班类型 OW单程 RT：往返 ML：联程
	            'Dept_Date'     => '2015-02-15',
	            'Back_Date'     => '2015-02-19',
	            'name'          => '北京-往返-新加坡',
	            'price'         => '7600',
	        ),
	        array(
	            'Dept_CityId'   => 'BJS',
	            'Arrive_CityId' => 'SIN',
	            'FlightType'    => 'RT',//航班类型 OW单程 RT：往返 ML：联程
	            'Dept_Date'     => '2015-02-20',
	            'Back_Date'     => '2015-02-24',
	            'name'          => '北京-往返-新加坡',
	            'price'         => '7600',
	        ),
	        array(
	            'Dept_CityId'   => 'BJS',
	            'Arrive_CityId' => 'SIN',
	            'FlightType'    => 'RT',//航班类型 OW单程 RT：往返 ML：联程
	            'Dept_Date'     => '2015-02-20',
	            'Back_Date'     => '2015-02-24',
	            'name'          => '北京-往返-新加坡',
	            'price'         => '7600',
	        ),
	);
	$caissa_2 =check_date($caissa_2,'Dept_Date',$d);

> 第二种使用array_multisort

	<?php
	$ar1  = array( 10 ,  100 ,  100 ,  0 );
	$ar2  = array( 1 ,  3 ,  2 ,  4 );
	array_multisort ( $ar1 ,  $ar2 );
	
	var_dump ( $ar1 );
	var_dump ( $ar2 );
	?> 

结果：

	array(4) {
	  [0]=> int(0)
	  [1]=> int(10)
	  [2]=> int(100)
	  [3]=> int(100)
	}
	array(4) {
	  [0]=> int(4)
	  [1]=> int(1)
	  [2]=> int(2)
	  [3]=> int(3)
	}
