<?php

class Curl
{

    var $ch;

    function curl()
    {
        $this->ch = curl_init();
        // you might want the headers for http codes
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        // set if the web server claims a typical browser as a client
        curl_setopt($this->ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        // set if you need to follow redirect action
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        // set if you need to store the output in a variable
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        // set if you need cookies
        //curl_setopt( $this->ch, CURLOPT_COOKIEJAR, 'cookie.txt'); //output cookies
        //curl_setopt( $this->ch, CURLOPT_COOKIEFILE, 'cookie.txt');//input cookies   
    }

    function api_notice_increment($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        //$data = http_build_query($data);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $lst['rst'] = curl_exec($ch);
        $lst['info'] = curl_getinfo($ch);
        curl_close($ch);
        return $lst;
        }

        }

//$curl = new curl();
//$url = 'http://m.api.zhuna.cn/utf-8/postBook.php';
//$string = $curl->api_notice_increment($url, $result);