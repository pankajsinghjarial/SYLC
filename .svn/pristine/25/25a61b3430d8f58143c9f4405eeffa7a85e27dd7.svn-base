<?php
# ----------------------------------------------------------------------------------------------------
# * FILE: /image_resizer.php
# ----------------------------------------------------------------------------------------------------
# Kapil Verma
# ----------------------------------------------------------------------------------------------------
# LOAD CONFIG
# ----------------------------------------------------------------------------------------------------
    include("classes/class_imageResizer.php");
	/*
	 * imageResizer.php
	 *
	 * Forces image resampling "on the fly" when a image is requisited
	 * Parameters:
	 * @img (file) = image file to be resized (must be an absolute path like /var/www/site/www/upload/file.jpg)

	 * @newWidth (int) = new width :P
	 * @newHeight (int) = new height :P
	 * @debug (flag) = if error message will be displayed
	 * NOTES
	 * - this feature is controlled by FORCE_ANTIALIASED_IMAGES flag in conf section
	 * - no enabled, simly turn constant on 
	 * - use this feature only when absolutely necessity of resize, instead of HTML resizing
	*/
	
	$file=trim($_GET['img']);
	if(isset($_GET['newWidth']) && isset($_GET['newWidth'])){
		$newWidth=trim($_GET['newWidth']);
		$newHeight=trim($_GET['newHeight']);
	}else{
		header('location:index.php');
	}
	$rimg = new ImageResizer($file); 
	if ($_GET['debug']) echo $rimg->error();
	$rimg->resize($newWidth, $newHeight);
	$rimg->close();