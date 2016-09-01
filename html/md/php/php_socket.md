##php-socket##



#### udp ####

**server**

	//服务器信息  
	$server = 'udp://127.0.0.1:9998';  
	//消息结束符号  
	$msg_eof = "\n";  
	$socket = stream_socket_server($server, $errno, $errstr, STREAM_SERVER_BIND);  
	if (!$socket) {  
	    die("$errstr ($errno)");  
	}  
	  
	do {  
	    //接收客户端发来的信息  
	    $inMsg = stream_socket_recvfrom($socket, 1024, 0, $peer);  
	    //服务端打印出相关信息  
	    echo "Client : $peer\n";  
	    echo "Receive : {$inMsg}";  
	    //给客户端发送信息  
	    $outMsg = substr($inMsg, 0, (strrpos($inMsg, $msg_eof))).' -- '.date("D M j H:i:s Y\r\n");  
	    stream_socket_sendto($socket, $outMsg, 0, $peer);  
	      
	} while ($inMsg !== false);  

**client**
	
	function udpGet($sendMsg = '', $ip = '127.0.0.1', $port = '9998'){  
	    $handle = stream_socket_client("udp://{$ip}:{$port}", $errno, $errstr);  
	    if( !$handle ){  
	        die("ERROR: {$errno} - {$errstr}\n");  
	    }  
	    fwrite($handle, $sendMsg."\n");  
	    $result = fread($handle, 1024);  
	    fclose($handle);  
	    return $result;  
	}  
	  
	$result = udpGet('Hello World');  
	echo $result;  


#### tcp ####

**server**

	<?php
	
	//error_reporting( E_ALL );
	set_time_limit( 0 );
	ob_implicit_flush();
	$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
	socket_bind( $socket, '127.0.0.1', 11109 );
	socket_listen($socket);
	$acpt=socket_accept($socket);
	echo "Acpt!\n";
	while ( $acpt ) {
	    $words=fgets(STDIN);
	    socket_write($acpt,$words);
	    $hear=socket_read($acpt,1024);
	    echo $hear;
	    if("bye\r\n"==$hear){
	        socket_shutdown($acpt);
	        break;
	    }
	    usleep( 1000 );
	}
	socket_close($socket);

**client**

	<?php
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	$con=socket_connect($socket,'127.0.0.1',11109);
	if(!$con){socket_close($socket);exit;}
	echo "Link\n";
	while($con){
	        $hear=socket_read($socket,1024);
	        echo $hear;
	        $words=fgets(STDIN);
	        socket_write($socket,$words);
	        if($words=="bye\r\n"){break;}
	}
	socket_shutdown($socket);
	socket_close($sock);