<?php

/**
 * Image manupulations class
 * 
 */
class ivImage
{
	var $imageData;
	var $imagetype;
	var $imageinfo;
	var $imagepath;
	var $new_x;
	var $new_y;
	var $debug;
	var $quality = 85;
	
	function ivImage($path)
	{
		$this->__construct($path);
	}

	function __construct($path)
	{
		if (!file_exists($path)) {
			return -1;
		}

		$this->imageinfo = array();
		list($this->imageinfo['width'], $this->imageinfo['height'], $this->imageinfo['type']) = getimagesize($path);
		//Returns an array with 4 elements. Index 0 contains the width of the image in pixels. Index 1 contains the height. Index 2 is a flag indicating the type of the image: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. These values correspond to the IMAGETYPE constants that were added in PHP 4.3.0. Index 3 is a text string with the correct height="yyy" width="xxx" string that can be used directly in an IMG tag.
		$this->imagetype = $this->imageinfo['type'];
		unset($this->imageinfo['type']);
		$this->imageinfo['date'] = filectime($path);
		$this->imageinfo['size'] = filesize($path);

		switch ($this->imagetype) {
			case IMAGETYPE_GIF:
				$this->imageData = imagecreatefromgif($path);
				break;
			case IMAGETYPE_JPEG:
				$this->imageData = imagecreatefromjpeg ($path);
				break;
			case IMAGETYPE_PNG:
				$this->imageData = imagecreatefrompng($path);
				break;
		}
		if ($this->imageData) {
			$this->imagepath = $path;
		}
		return true;
	}

	function rotate($direction = 'cw')
	{
		if (is_string($direction) && 'cw' == $direction) {
			$angle = -90;
		} else {
			$angle = 90;
		}
		if (is_numeric($direction)) {
			$angle = $direction;
		}
		$this->imageData = imagerotate($this->imageData, $angle, 0xFFFFFF);

	}

	function getimage($path = '')
	{
		if ('' == $path) {
			header ("Content-type: " . image_type_to_mime_type(IMAGETYPE_JPEG));
		}
		imagejpeg($this->imageData, $path, $this->quality);
	}

	function write($newpath = '')
	{
		if ($newpath) {
			$path = $newpath;
		} else {
			$path = $this->imagepath;
		}
		$this->getimage($path);
	}

	/**
	* Crops image by size and start coordinates
	*
	* @param int width Cropped image width
	* @param int height Cropped image height
	* @param int x X-coordinate to crop at
	* @param int y Y-coordinate to crop at
	*
	* @return bool|PEAR_Error TRUE or a PEAR_Error object on error
	* @access public
	*/
	function crop($width, $height)
	{
		$x = floor(($this->imageinfo['width'] - $width) / 2);
		$y = floor(($this->imageinfo['height'] - $height) / 2);
		$new_img = imagecreatetruecolor($width, $height);

		if (!imagecopy($new_img, $this->imageData, 0, 0, $x, $y, $width, $height)) {
			imagedestroy($new_img);
			return 0;
		}

		$this->old_image = $this->imageData;
		$this->imageData = $new_img;
		$this->resized = true;

		$this->new_x = $width;
		$this->new_y = $height;
		return true;
	}

	/**
     * Resize Action
     *
     * For GD 2.01+ the new copyresampled function is used
     * It uses a bicubic interpolation algorithm to get far
     * better result.
     * 
     * @param int   $new_x   New width
     * @param int   $new_y   New height
     * @param mixed $options Optional parameters
     *
     * @return bool|PEAR_Error TRUE on success or PEAR_Error object on error
     * @access protected
     */
	function resize($new_x, $new_y)
	{
		// Make sure to get a true color image if doing resampled resizing
		// otherwise get the same type of image
		$new_img = imagecreatetruecolor($new_x, $new_y);

		//if (function_exists('ImageCopyResampled')) {
		//$icr_res =
		ImageCopyResampled($new_img, $this->imageData, 0, 0, 0, 0, $new_x, $new_y, $this->imageinfo['width'], $this->imageinfo['height']);

		$this->old_image = $this->imageData;
		$this->imageData = $new_img;
		$this->resized = true;

		$this->imageinfo['width'] = $new_x;
		$this->imageinfo['height'] = $new_y;
		return true;
	}

	function makeThumb($boxwidth = 120, $boxheight = 80, $quality=80, $resizetype = "croptobox", $keepaspect = true, $allowscaleup = false)
	{
		$this->quality=$quality;
		$originalwidth = $this->imageinfo['width'];
		$originalheight = $this->imageinfo['height'];
		if (!$originalwidth || !$originalheight) {
			return false;
		}
		$boxaspect = $boxwidth/$boxheight;
		$originalaspect = $originalwidth/$originalheight;
		if ('croptobox' == $resizetype) {
			if ($this->debug) {
				echo 'croptobox<br>';
			}
			if ($boxaspect > $originalaspect) {
				if ($allowscaleup || $originalwidth > $boxwidth) {
					$imagewidth = $boxwidth;
					$imageheight = round($originalheight/($originalwidth/$boxwidth));
				}
			} else {
				if($allowscaleup || $originalheight > $boxheight){
					$imagewidth = round($originalwidth/($originalheight/$boxheight));
					$imageheight = $boxheight;
				}
			}
		} else {
			if ($this->debug) {
				echo 'resizetobox<br>';
			}
			if ($keepaspect) {
				if ($this->debug) {
					echo 'keepaspect<br>';
				}
				if ($boxaspect > $originalaspect) {
					if ($this->debug) {
						echo 'boxaspect gt original';
					}
					if ($allowscaleup || $originalheight > $boxheight) {
						$imagewidth = round($originalwidth / ($originalheight / $boxheight));
						$imageheight = $boxheight;
					}
				} else {
					if ($this->debug) {
						echo 'boxaspect lt original<br>';
					}
					if($allowscaleup || $originalwidth > $boxwidth){
						$imagewidth = $boxwidth;
						$imageheight = round($originalheight/($originalwidth/$boxwidth));
					}
				}
			} else {
				if ($this->debug) {
					echo 'nokeepaspect<br>';
				}
				if($allowscaleup){
					if ($this->debug) {
						echo 'allowscaleup<br>';
					}
					$imagewidth = $boxwidth;
					$imageheight = $boxheight;
				} else {
					if ($this->debug) {
						echo 'noallowscaleup<br>';
					}
					if ($boxwidth > $originalwidth) {
						$imagewidth = $originalwidth;
					} else {
						$imagewidth = $boxwidth;
					}
					if ($boxheight > $originalheight) {
						$imageheight = $originalheight;
					} else {
						$imageheight = $boxheight;
					}
				}
			}
		}

		if (isset($imagewidth) && isset($imageheight)) {
			$this->resize($imagewidth, $imageheight);
		}
		if ('croptobox' == $resizetype) {
			$this->crop($boxwidth,$boxheight);
		}
		return true;
	}

}
?>