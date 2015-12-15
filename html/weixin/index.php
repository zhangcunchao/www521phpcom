<?php
//$input =  $_REQUEST;
$input = file_get_contents('php://input');
file_put_contents('1.txt',print_r($input,true));
echo $input['echostr'];
