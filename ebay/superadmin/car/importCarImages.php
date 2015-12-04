<?php
include_once('../../conf/config.inc.php');
global $db;
$commonObj = new common();
$tbl_name = "car_media_gallery";

$result = $commonObj->read($tbl_name, "fetched = 0");


while( $url = $db->fetchNextObject($result)){
	$path = returnPath($url->value);
	$arr = array("value" => $path, "fetched" => 1);
	$whereCondition = 'value_id = '.$url->value_id;
	$commonObj->update($tbl_name, $arr, $whereCondition);
}

function returnPath($path){
	if((strpos($path, "http://") !== false) || (strpos($path, "https://") !== false)){
		$upload_path = getUploadDirPath(basename($path));
		save_image($path, UPLOAD_CAR_IMAGES.$upload_path);
		return $upload_path;
	}
}
	
function save_image($inPath,$outPath){ 
	//Download images from remote server
	$in=    fopen($inPath, "rb");
	$out=   fopen($outPath, "wb");
	while ($chunk = fread($in,8192))
	{
		fwrite($out, $chunk, 8192);
	}
	fclose($in);
	fclose($out);
}
function getUploadDirPath($name){
	$path = '/'.date('m').'/'.date('d');
	if ( !file_exists(UPLOAD_CAR_IMAGES.'/'.$path)) {
		mkdir(UPLOAD_CAR_IMAGES.'/'.$path,0777,true);
	}
	return $path.'/'.time().$name;
}