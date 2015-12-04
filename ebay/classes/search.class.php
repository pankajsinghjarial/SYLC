<?php 
class search extends utility
{

function search(){
}

function attributeSearch($datArray,$groupby ="fullName", $order = "ASC", $limit = ""){
	global $db;
	$tableprefix = "car_";
	$tablename = "attribute";
	$carID = array();

	$select_part = '';
	$from_part = '';
	$where_part = '';
	$join_part = "";

	foreach ($datArray as $attribute => $value) {
		
		$sql = mysql_query("select * from $tablename where attribute_code = '".$attribute."'");
		
		if(mysql_num_rows($sql) > 0) {
			while($row = mysql_fetch_array($sql)){
				
				if($attribute == "price" || $attribute == "mileage" || $attribute == "madeYear"){ 
					if(count($value)==1){
						if($attribute == "price"){
							$querypart = " <= '".$value[0]."'";
						}
						else if($attribute == "mileage"){
							$querypart = " >= '".$value[0]."'";
						}
						else if($attribute == "madeYear"){
							$querypart = " = '".$value[0]."'";
						}
					}
					else{
						$querypart = "BETWEEN '".$value[0]."' AND '".$value[1]."'";
					}
				} 
				else { 
					if($row['backend_type'] == 'int'){
						if(is_array($value)){
							$valImp = implode(",", $value);
							$querypart = "FIND_IN_SET(`".$attribute."`.`value`,'".$valImp."')" ;
						}
						else{
							$querypart = "= ".$value ;
						}
					}
					else{
						$querypart = "like '%".$value."%'";
					}
				}	
				
				$select_part = "DISTINCT( ".$attribute.".car_id ) as car_id";
				if($from_part != ""){
					$from_part .= "
									Inner 
										Join `".$tableprefix.$row['backend_type']."` as `".$attribute."`
										ON `".$attribute."`.`car_id` = ".$join_part;
					$join_part = "`".$attribute."`.`car_id`";
				}
				else{
					$from_part .= $tableprefix.$row['backend_type']." as ".$attribute;
					$join_part = "`".$attribute."`.`car_id`";
				}
				
				if($where_part != ''){
					$where_part .= '
									AND ';
				}
				
				$where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and `".$attribute."`.`value` ".$querypart." ) ";
				/* if(is_array($value)){
					echo $where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and ".$querypart." ) ";
				}
				else{
					$where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and `".$attribute."`.`value` ".$querypart." ) ";			
				} */			
			}
		} 
	 }
	 
	 $final_query = "SELECT ".$select_part."
	 				 From ".$from_part."
					 Where ".$where_part;
					 

	
	 if($groupby != ""){
		 $grp = explode(",",$groupby);
		 
		 if(count($grp) > 1){
			$sql = mysql_query("select * from $tablename where attribute_code = '".$grp[1]."' ");
			$back = mysql_fetch_object($sql);
			
			$final_query = 'SELECT distinct(d.car_id) as car_id FROM '.$tableprefix.$back->backend_type.' as d  WHERE d.attribute_id = '.$back->attribute_id.' and `d`.`car_id` IN ('.$final_query.') order by d.value '.$order.' '.$limit;
		} 
		else{	 
			$gsql = mysql_query("select * from $tablename where attribute_code = '".$grp[0]."' ");
			if(mysql_num_rows($gsql) > 0){ 
				$grow = mysql_fetch_array($gsql);
				if($grow['frontend_type'] == 'select' || $grow['frontend_type'] == 'multiselect' || $grow['frontend_type'] == 'radio'  || $grow['frontend_type'] == 'checkbox'){
					$final_query = mysql_query("select * from attribute_option_value where attribute_id = '".$grow['attribute_id']."' and car_id IN(".$final_query.")  order by value asc");
				}
				else{ 
					$final_query = 'SELECT distinct(d.car_id) as car_id FROM '.$tableprefix.$grow['backend_type'].' as d  WHERE d.attribute_id = '.$grow['attribute_id'].' and `d`.`car_id` IN ('.$final_query.') order by d.value '.$order.' '.$limit;
				}
			} 
		}
	}

	$gquery = mysql_query($final_query);
	while($gresult = mysql_fetch_object($gquery)){ 
		$carID[] = $gresult->car_id;
	} 
	
	return $carID;
}




function attributeSearchCount($datArray,$groupby=""){ 
	global $db;
	$tableprefix = "car_";
	$tablename = "attribute";
	$carID = array();

	$select_part = '';
	$from_part = '';
	$where_part = '';
	$join_part = "";

	foreach ($datArray as $attribute => $value) {
		$sql = mysql_query("select * from $tablename where attribute_code = '".$attribute."'");
		
		if(mysql_num_rows($sql) > 0) {
			while($row = mysql_fetch_array($sql)){
				
				if($attribute == "price" || $attribute == "mileage" || $attribute == "madeYear"){
					if(count($value)==1){
						if($attribute == "price"){
							$querypart = " <= '".$value[0]."'";
						}
						else if($attribute == "mileage"){
							$querypart = " >= '".$value[0]."'";
						}
						else if($attribute == "madeYear"){
							$querypart = " = '".$value[0]."'";
						}
					}
					else{
						$querypart = "BETWEEN '".$value[0]."' AND '".$value[1]."'";
					}
				} 
				else { 
					if($row['backend_type'] == 'int'){
						if(is_array($value)){
							$valImp = implode(",", $value);
							$querypart = "FIND_IN_SET(`".$attribute."`.`value`,'".$valImp."')" ;
						}
						else{
							$querypart = "= ".$value ;
						}
					}
					else{
						$querypart = "like '%".$value."%'";
					}
				}	
				
				$select_part = "DISTINCT( ".$attribute.".car_id ) as car_id";
				if($from_part != ""){
					$from_part .= "
									Inner 
										Join `".$tableprefix.$row['backend_type']."` as `".$attribute."`
										ON `".$attribute."`.`car_id` = ".$join_part;
					$join_part = "`".$attribute."`.`car_id`";
				}
				else{
					$from_part .= $tableprefix.$row['backend_type']." as ".$attribute;
					$join_part = "`".$attribute."`.`car_id`";
				}
				
				if($where_part != ''){
					$where_part .= '
									AND ';
				}
				$where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and `".$attribute."`.`value` ".$querypart." ) ";
				/* if(is_array($value)){
					echo $where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and ".$querypart." ) ";
				}
				else{
					$where_part .= " ( `".$attribute."`.`attribute_id` = ".$row['attribute_id']." and `".$attribute."`.`value` ".$querypart." ) ";			
				} */
			}
		} 
	 }
	 
	$final_query = "SELECT ".$select_part."
	 				 From ".$from_part."
					 Where ".$where_part;
	
	
	$gquery = mysql_query($final_query);
	return mysql_num_rows($gquery);
}



function AdminSearch($text) {
	$common = new common();
	$result = $common->customQuery("select car_id from car_varchar where attribute_id=22 and value like '"."%".$text."%"."' ");
	while($row=mysql_fetch_array($result)) {
		$carID[] = $row['car_id'];
	}
	return $carID;
}

function attributevalue($attribute) { 
	global $db;
	$carID = array();
	$tableprefix = "car_";
	$tablename = "attribute";
	$flag = true;
	$sql = mysql_query("select * from $tablename where attribute_code = '".$attribute."' ");
	if(mysql_num_rows($sql) > 0){ 
		$row = mysql_fetch_array($sql);
		if($row['frontend_type'] == 'select' || $row['frontend_type'] == 'multiselect' || $row['frontend_type'] == 'radio'  || $row['frontend_type'] == 'checkbox'){
			$query = mysql_query("select * from attribute_option_value where attribute_id = '".$row['attribute_id']."' ");
	 	}
		else{ 
			$query = mysql_query("select value,value_id from ".$tableprefix.$row['backend_type']." where attribute_id = '".$row['attribute_id']."' group by value ");
		}
		while($result = mysql_fetch_object($query)) {
			$value[$result->value_id] = $result->value;
		} 
	}
	return $value;	
}


function groupby($attribute) { 
	$carID = array();
	$tableprefix = "car_";
	$tablename = "attribute";
	$sql = mysql_query("select * from $tablename where attribute_code = '".$attribute."' ");
	if(mysql_num_rows($sql) > 0){ 
		$row = mysql_fetch_array($sql);
		if($row['frontend_type'] == 'select' || $row['frontend_type'] == 'multiselect' || $row['frontend_type'] == 'radio'  || $row['frontend_type'] == 'checkbox') {
			$query = mysql_query("select * from attribute_option_value where attribute_id = '".$row['attribute_id']."' ");
		}
		else {
			$query = mysql_query("select car_id from ".$tableprefix.$row['backend_type']." where attribute_id = '".$row['attribute_id']."' order by value asc");
		}
		while($result = mysql_fetch_object($query)) {
			$value[] = $result->car_id;} 
		}
		return $value;
	}
}
