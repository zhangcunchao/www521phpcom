<?php
/**
 * 验证码类
 * ============================================================================
 * @Author: wangbin $  <wbgod_1987@qq.com>
 * @Id: Image.class.php 53 2012-03-02 15:34:45 wbin $
 * @http://blog.csdn.net/wbandzlhgod
 */
class Auth
{

    public $sessionCode;
    public $width;
    public $height;
    public $wordleft;
    public $wordtop;
    public $bgcolor1;
    public $bgcolor2;
    public $bgcolor3;

    function __construct($width, $height, $wordleft, $wordtop)
    {
        $possible_charactors = "AaBbCcDdEeFfGgHhJjKkMmNnPpQRrSsTtWwXxYy23456789";
        while (strlen($code) < 4) {
            $code .= substr($possible_charactors, (rand() % (strlen($possible_charactors))), 1);
        }
        $this->sessionCode = $code;
        $this->width = $width;
        $this->height = $height;
        $this->wordleft = $wordleft;
        $this->wordtop = $wordtop;
    }
    /**
     * @生成图片的背景颜色
     * @param int $bg1  
     * @param int $bg2
     * @param int $bg3 
     */
    function setbgColor($bg1, $bg2, $bg3)
    {
        $this->bgcolor1 = $bg1;
        $this->bgcolor2 = $bg2;
        $this->bgcolor3 = $bg3;
    }

    function getImg()
    {
        if (function_exists('imagecreate') && function_exists('imagecolorset') && function_exists('imagecopyresized') && function_exists('imagecolorallocate') && function_exists('imagesetpixel') && function_exists('imagechar') && function_exists('imagecreatefromgif') && function_exists('imagepng')) {
            $im = imagecreate($this->width, $this->height);
            $backgroundcolor = imagecolorallocate($im, $this->bgcolor1, $this->bgcolor2, $this->bgcolor3);
            $numorder = array(1, 2, 3, 4);
            shuffle($numorder);
            $numorder = array_flip($numorder);
            for ($i = 1; $i <= 4; $i++) {
                $x = $numorder[$i] * 13 + mt_rand(0, 4) - 2;
                $y = mt_rand(0, 3);
                $text_color = imagecolorallocate($im, mt_rand(50, 255), mt_rand(50, 100), mt_rand(50, 255));
                imagechar($im,20, $x + $this->wordleft, $y + $this->wordtop, $this->sessionCode[$numorder[$i]], $text_color);
            }
            $bordercolor = imagecolorallocate($im, 150, 150, 150);
            imagerectangle($im, 0, 0, $this->width - 1, $this->height - 1, $bordercolor);
            header("Content-type: image/png");
            imagepng($im);
            imagedestroy($im);
        }
    }

    function setSession($id)
    {
        session_start();
        @session_register($id);
        $_SESSION[$id] = $this->sessionCode;
    }

}