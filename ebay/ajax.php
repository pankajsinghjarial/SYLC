<?php include("conf/config.inc.php"); ?>
<?php
  $value = $_POST['value'];
  $attribute = $_POST['attr'];
  $manufac = $_POST['manufact'];
  $classname = $_POST["class"];
  if($classname == "") { $classname = "customStyleSelectBox";}
$search = new search();
$com = new common(); 


if($attribute == "manufacturer"){ 
	$dataArray = array("$attribute"=>$value);
	$carid = $search->attributeSearch($dataArray,"");
	$set = implode(",",$carid);
	$returnvalue = '<select class="'.$classname.'" id="model" name="model" onchange="ajaxcall(this.value,\'model\',\'year\','.$value.')">';
	$returnvalue .= "<option value=''>Modèles</option>";
	
	//echo "Select DISTINCT(value) from car_varchar where attribute_id = '4' and FIND_IN_SET(car_id, '".$set."') order by value";
	$year = $com ->CustomQuery("Select DISTINCT(value) from car_varchar where attribute_id = '4' and FIND_IN_SET(car_id, '".$set."') order by value");
	while($yrow = mysql_fetch_object($year)){
		$returnvalue .= "<option value='".$yrow->value."'>".$yrow->value."</option>";
	}
	$returnvalue .= '</select>';
	echo $returnvalue;
}


if($attribute == "model"){ 
	$dataArray = array("$attribute"=>$value,"manufacturer"=>$manufac);
	$carid = $search->attributeSearch($dataArray,"");
	
	$set = implode(",",$carid);
	$returnvalue = '<select class="'.$classname.'" name="madeYear" id="madeYear">';
	$returnvalue .= "<option value=''>Année</option>";
	
	//echo "Select value from car_int where attribute_id = '1' and FIND_IN_SET(car_id, '".$set."')";
	$year = $com ->CustomQuery("Select DISTINCT(value) from car_int where attribute_id = '1' and FIND_IN_SET(car_id, '".$set."') order by value");
	while($yrow = mysql_fetch_object($year)){
		$returnvalue .= "<option value='".$yrow->value."'>".$yrow->value."</option>";
	}
	$returnvalue .= '</select>';
	echo $returnvalue;
}