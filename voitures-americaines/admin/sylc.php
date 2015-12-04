<?php 
$con = mysql_connect("localhost","sylcexpo_syadmin","admin1234");
// Check connection
if (!$con)
{
	echo "Failed to connect to MySQL: ";
}
mysql_select_db("sylcexpo_sylcorp");

$sql = "select * from leads"; 
$result = mysql_query($sql);
while($row = mysql_fetch_object($result))
{
	$carsql = "select car_brand from car_brand where id = ".$row->car_brand; 
	$carresult = mysql_query($carsql);
	$carrow = mysql_fetch_object($carresult);
	
	$modelsql = "select model from model where id = ".$row->model;
	$modelresult = mysql_query($modelsql);
	$modelrow = mysql_fetch_object($modelresult);
	
	mysql_query("INSERT INTO lead_details (lead_id,car_brand,model,created_at) VALUES ('$row->id', '$carrow->car_brand', '$modelrow->model','$row->created_at') ");
	
	
}
?>