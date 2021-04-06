<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);
$config = array(
                'open_length_check' => 1,
                'package_max_length' => 2097152,
                'package_length_type' => 'N',
                'package_body_offset' => 4,
                'package_length_offset' => 0,
);
$client->set($config);
if (!$client->connect('127.0.0.1', 9558,10))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$f = '111111';
$f = pack('N',strlen($f)).$f;

//$f = pack('N',$f);
$client->send($f);
//$re = $client->recv();
//$body = substr($re,$config['package_body_offset']);
//echo $body;

$re = $client->recv();
$body = substr($re,$config['package_body_offset']);
echo $body;
$client->close();
