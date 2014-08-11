<?php

/**
 * 后台对上传文件的处理类(实现图片上传，图片缩略图)
 * ============================================================================
 * @Author: wangbin $  <wbgod_1987@qq.com>
 * @Id: Image.class.php 53 2012-03-02 15:34:45 wbin $
 * @http://blog.csdn.net/wbandzlhgod
 */
class Image
{

    var $data_dir;
    var $thumb_dir;
    var $error_msg = ''; //错误信息

    //构造函数

    function __construct($data_dir = '', $thumb_dir = '')
    {
        $this->data_dir = $data_dir;
        $this->thumb_dir = $thumb_dir;
    }

    /**
     * 图片上传的处理函数
     * @           $upload   前台文件定义的name
     * @access     public
     * @param      string    upload   上传的图片文件class名
     * @param      int       isthumb  是否生成缩略图 0(不生成)1(生成)
     * @param      array    dir      文件要上传在$this->data_dir下的目录名。如果为空图片放在则在$this->images_dir下以当月命名的目录下
     * @param     string    img_name 上传图片名称，为空则随机生成
     * @prarm     string    type 文件上传格式(后缀名) 默认为空
     * @return     mix       如果成功则返回文件名，否则返回false
     */
    function upload_image($upload, $isthumb = 0, $dir = '', $img_name = '', $type = '')
    {
        $img1 = $_FILES['' . $upload . '']['tmp_name'];       //得到文件名 上传到服务器.临时目录
        $img2 = basename($_FILES['' . $upload . '']['name']);   //得到文件名
        preg_match('/\.([a-zA-Z]+?)$/', $img2, $fileExt);   //得到后缀名
        $houzui = strtolower($fileExt[1]);      //全部变成小写的
        if ($type == "") {
            if ($houzui == "gif" || $houzui == "jpg" || $houzui == "png" || $houzui == "bmp" || $houzui == "jpeg") {

            } else {
                $this->error_msg = "对不起，这里您只能上传图片文件！";
                return "noimg";
            }
        } elseif ($type == 'file') {
            $file_array = array('zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pdf');
            if (!in_array($houzui, $file_array)) {
                $this->error_msg = "对不起，这里您只能上传zip, rar, doc, docx, xls, xlsx, ppt, pdf文件！";
                return false;
            }
        } else {
            if ($houzui == "" . $type . "") {
                
            } else {
                $this->error_msg = "对不起，这里您只能上传" . $type . "格式文件！";
                return false;
            }
        }
        $imgNameDate = date("Y-m");
        $imgNameRand = date("YmdHis");
        //判断dir 是否为空 为空就放在时间为文件夹的目录里面
        $dir == "" ? $dirname = $imgNameDate : $dirname = $dir;
        //判断$img_name 是否为空 为空就以时间随机命名
        $img_name == "" ? $imagename = $imgNameRand : $imagename = $img_name;
        $img_dir = $this->data_dir . $dirname . "/";
        $imgname = $img_dir . $imagename . "." . $houzui;
        //返回img的相对url路径
        $img_url = str_replace(WEB_ROOT, '', $imgname);
        //以年月为名建立文件夹
        $this->CheckFolder($img_dir);
        if (move_uploaded_file($img1, $imgname)) {
            return $img_url;
        } else {
            //$this->error_msg = "Upload Image No Successed";
            //return false;
			return "noimg";
        }
    }

    /**
     * 利用gd库生成缩略图
     *
     * @author  Walton
     * @param   string	  $image                     原图片路径
     * @param   string	  $path                        指定生成图片的目录名
     * @param   int         $thumb_width          缩略图宽度
     * @param   int         $thumb_height         缩略图高度 可选
     * @param   string    $img_type                 生成图片的保存类型 可选
     * @param   int         $quality                    缩略图品质 100之内的正整数
     * @return  boolean	 成功返回 true 失败返回 false
     *
     */
    function thumb($image, $path = '', $thumb_width, $thumb_height = 0, $img_type = 'jpg', $quality = '85')
    {
        // 检查原始文件是否存在及获得原始文件的信息
        $data = @getimagesize($image);
        if (!$data) {
            //die('No Found The Picture');
            return 'noimg';
			
        }
        preg_match('/(.*)\.([a-zA-Z]+?)$/', $path, $fileExt);   //暂时去掉后缀名
        $path = $fileExt[1];
        //检查判断生成的图片类型
        switch ($img_type)
        {
            case 'jpeg':
            case 'jpg':
                $imgtype = 'imagejpeg';
                $path .= '.jpg';
                break;
            case 'png':
                $imgtype = 'imagepng';
                $path .= '.png';
                $quality = ($quality - 100) / 11.111111; //FORMAT
                $quality = round(abs($quality));
                break;
            case 'gif':
                $imgtype = 'imagegif';
                $path .= '.gif';
                break;
            default:
                $this->error_msg = "不支持" . $img_type . "格式图片文件的生成";
                return false;
                break;
        }
        $func_imagecreate = function_exists('imagecreatetruecolor') ? 'imagecreatetruecolor' : 'imagecreate';
        $func_imagecopy = function_exists('imagecopyresampled') ? 'imagecopyresampled' : 'imagecopyresized';
        $image_width = $data[0];
        $image_height = $data[1];
        if ($thumb_height == 0) {
            if ($image_width > $image_height) {
                $thumb_height = $image_height * $thumb_width / $image_width;
            } else {
                $thumb_height = $thumb_width;
                $thumb_width = $image_width * $thumb_height / $image_height;
            }
            $dst_x = 0;
            $dst_y = 0;
            $dst_w = $thumb_width;
            $dst_h = $thumb_height;
            $src_x = $src_y = 0;
        } else {
            if ($image_width / $image_height > $thumb_width / $thumb_height) {
                $dst_w = $thumb_width;
                $dst_h = $thumb_height;
                $dst_x = 0;
                $dst_y = 0;
                $src_x = intval(($image_width * $thumb_height / $image_height - $thumb_width) / 2);
                $src_y = 0;
                $image_width = intval($image_height * $thumb_width / $thumb_height);
            } else {
                $dst_w = $thumb_width;
                $dst_h = $thumb_height;
                $dst_x = 0;
                $dst_y = 0;
                $src_x = 0;
                $src_y = ceil(($image_height * $thumb_width / $image_width - $thumb_height) * 2 / 3);
                $image_height = intval($image_width * $thumb_height / $thumb_width);
            }
        }
        switch ($data[2])
        {
            case 1:
                $im = imagecreatefromgif($image);
                break;
            case 2:
                $im = imagecreatefromjpeg($image);
                break;
            case 3:
                $im = imagecreatefrompng($image);
                break;
            default:
                die("Cannot process this picture format: ($image)" . $data['mime']);
                break;
        }
        $ni = $func_imagecreate($thumb_width, $thumb_height);
        if ($func_imagecreate == 'imagecreatetruecolor') {
            imagefill($ni, 0, 0, imagecolorallocate($ni, 255, 255, 255));
        } else {
            imagecolorallocate($ni, 255, 255, 255);
        }
        //重采样拷贝部分图像并调整大小
        $func_imagecopy($ni, $im, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $image_width, $image_height);
        /* 创建当月目录 */
        if (empty($path)) {
            $dir = $this->thumb_dir . date('Ym') . '/';
        } else {
            $dir = $path;
        }
        //检查是否有此文件夹 没有则建之
		$this->CheckFolder(dirname($dir));
        $imgtype($ni, $dir, $quality);     //以 JPEG 格式将图像输出到浏览器或文件
        return is_file($dir) ? str_replace('..', '', $dir) : false;
    }

    //创建目录 递归创建多级目录
    function CheckFolder($filedir)
    {
        if (!file_exists($filedir)) {
            if (!$this->CheckFolder(dirname($filedir))) {
                return false;
            }
            if (!mkdir($filedir, 0777)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 返回错误信息
     * @return  string   错误信息
     */
    function error_msg()
    {
        return $this->error_msg;
    }

}

?>