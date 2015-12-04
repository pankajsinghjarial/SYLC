<?php 
/*
 text to image converter
daftlogic
www.daftlogic.com
*/
header('Content-type: image/png');

class textPNG
{
	var $font = 'css/font-kit/Montserrat-Regular.ttf'; //default font. directory relative to script directory.
	var $msg = "no text"; // default text to display.
	var $size = 12; // default font size.
	var $rot = 0; // rotation in degrees.
	var $padX = 0; // padding.
	var $padY = 10; // padding.
	var $transparent = 1; // transparency set to on.
	var $red = 0; // black text...
	var $grn = 126;
	var $blu = 255;
	var $bg_red = 255; // on white background.
	var $bg_grn = 255;
	var $bg_blu = 255;

	function draw()
	{
		$width = 0;
		$height = 0;
		$offset_x = 0;
		$offset_y = 0;
		$bounds = array();
		$image = "";

		// get the font height.
		$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, "W");
		if ($this->rot < 0)
		{
			$font_height = abs($bounds[7]-$bounds[1]);
		}
		else if ($this->rot > 0)
		{
			$font_height = abs($bounds[1]-$bounds[7]);
		}
		else
		{
			$font_height = abs($bounds[7]-$bounds[1]);
		}
		// determine bounding box.
		$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, $this->msg);
		if ($this->rot < 0)
		{
			$width = abs($bounds[4]-$bounds[0]);
			$height = abs($bounds[3]-$bounds[7]);
			$offset_y = $font_height;
			$offset_x = 0;
		}
		else if ($this->rot > 0)
		{
			$width = abs($bounds[2]-$bounds[6]);
			$height = abs($bounds[1]-$bounds[5]);
			$offset_y = abs($bounds[7]-$bounds[5])+$font_height;
			$offset_x = abs($bounds[0]-$bounds[6]);
		}
		else
		{
			$width = abs($bounds[4]-$bounds[6]);
			$height = abs($bounds[7]-$bounds[1]);
			$offset_y = $font_height;;
			$offset_x = 0;
		}

		$image = imagecreate($width+($this->padX*2)+1,$height+($this->padY*2)+1);
		$background = ImageColorAllocate($image, $this->bg_red, $this->bg_grn, $this->bg_blu);
		$foreground = ImageColorAllocate($image, $this->red, $this->grn, $this->blu);

		if ($this->transparent) ImageColorTransparent($image, $background);
		ImageInterlace($image, false);

		// render the image
		ImageTTFText($image, $this->size, $this->rot, $offset_x+$this->padX, $offset_y+$this->padY, $foreground, $this->font, $this->msg);

		// output PNG object.
		imagePNG($image);
	}
}
/**
 * Returns decrypted original string
 */
function safe_b64decode($string) {
	
}

function decrypt($value, $key){
	
	if(!$value){return false;}
	$data = str_replace(array('-','_'),array('+','/'),$value);
	$mod4 = strlen($data) % 4;
	if ($mod4) {
		$data .= substr('====', $mod4);
	}	
	$crypttext = base64_decode($data); 
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
	return trim($decrypttext);
}
 $key ="je=.8)#?9S*mFN%";
$text = new textPNG;
 $result = '';

 
 $text->msg = decrypt($_GET['vin'], $key);
 // text to display
$text->draw();
