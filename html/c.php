<?php
function udpGet($sendMsg = '', $ip = '127.0.0.1', $port = '37211'){  
    $handle = stream_socket_client("udp://{$ip}:{$port}", $errno, $errstr);  
    if( !$handle ){  
        die("ERROR: {$errno} - {$errstr}\n");  
    }  
    fwrite($handle, $sendMsg."\n");  
    //$result = fread($handle, 1024);  
    fclose($handle);  
    //return $result;  
}
$str = str_repeat('a',1024);  
 for($i=0;$i<10000;$i++){
$result = udpGet($str);  

} 
