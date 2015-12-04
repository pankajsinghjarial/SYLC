<?php
function getCarName($id){
	global $db;
	$query = "Select value From car_varchar Where attribute_id = 22 and car_id = ".$id;
	$name = $db->fetchNextObject($db->query($query));
	return $name->value;
}
?>