##php相关笔记##



> php实现穷举法，别干坏事奥

	<?php
	function createpassword(){
		$passwordmax=8;
		$a="0123456789abcdefghijklmnopqrstuvwxyz";//可能的字符
		$ndictcount=strlen($a);
		$cpass=array();$arrIndex=array();
		$nminl=1;$nmaxl=3;//本例中密码长度从1-3
		$nlength=$nminl;
		assert($nminl<=$nmaxl && $nmaxl<=$passwordmax);
		$fp=fopen("e:\\dict.txt","w");
		while($nlength<=$nmaxl)
		{
			for($i=0;$i<$passwordmax;$i++)$arrIndex[$i]=0;
			$bnext=true;
			while($bnext){
				for($i=0;$i<$nlength;$i++)$cpass[$i]=$a[$arrIndex[$i]];
				fwrite($fp,implode($cpass,"")."\r\n");
				for($j=$nlength-1;$j>=0;$j--){
					//密码指针进位
					$arrIndex[$j]++; 
					if($arrIndex[$j]!=$ndictcount)
						break;
					else{
						$arrIndex[$j]=0;
						if($j==0)$bnext=false;
					}
				} 
			}
			$nlength++;
		}
		fclose($fp);
		echo "OK";
	}
	createpassword();
	?>
