<?php
class ImportClass {
	private $csvline = array();
	private $car = array(
						"fullName"=>'',
						"madeYear"=>'',
						"manufacturer"=>'',
						"carName"=>'',
						"model"=>'',
						"features"=>'',
						"std_equip"=>'',
						"sellersNotes"=>'',
						"dealerName"=>'',
						"dealerAddr"=>'',
						"images"=>'',
						"price"=>'',
						"mileage"=>'',
						"fuel"=>'',
						"bodyStyle"=>'',
						"engine"=>'',
						"extColor"=>'',
						"interColor"=>'',
						"transmission"=>'',
						"drivetrain"=>'',
						"doors"=>'',
						"wheelbase"=>'',
						"featured"=>'No',
						"siteName"=>''
				);
	private $validCSVFormat=array( "[ID]","[Name]","[details]","[Image URL 1]","[Image URL 2]","[Image URL 3]","[Image URL 4]","[Image URL 5]","[Image URL 6]","[Image URL 7]","[Image URL 8]","[Image URL 9]","[Page URL]","[Page Title]"  );
	private $stockID = array();
	private $attributs = array();
	private $carID;
	public $lineNum = '';
	
	function __construct(){
		global $db;
		$this->_setStockID();
		$this->_setAttributs();
	}
	
	private function _setStockID(){
		global $db;
		$result = mysql_query("Select car_id,stock_id From car") or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_object($result)){
				$this->stockID[$row->car_id] = $row->stock_id;
			}
		}
	}
	private function _setAttributs(){
		global $db;
		$for_option= array("select", "multiselect", "radio");
		$result = mysql_query("Select attribute_id, attribute_code, backend_type, frontend_type From attribute")or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			while($row = mysql_fetch_object($result)){
				if(in_array($row->frontend_type, $for_option)){
					$query = "Select value_id, value From attribute_option_value Where attribute_id = ".$row->attribute_id;
					$option_result = mysql_query($query) or die(mysql_error());
					$options= array();
					if(mysql_num_rows($option_result) > 0){
						while($option_row = mysql_fetch_object($option_result)){
							$options[$option_row->value_id] = $option_row->value;
						}
					} 
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "front"=>$row->frontend_type, "back"=>$row->backend_type, "options" => $options);
				} else{
					$this->attributs[$row->attribute_code]= array("id"=>$row->attribute_id, "front"=>$row->frontend_type, "back"=>$row->backend_type);
				}
			}
		}
	}
	
	function getCurrentTimestamp(){
		$timestamp = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
		return $timestamp;
	}
	
	public function getAttributs(){
		echo "<pre>";
		print_r($this->stockID);
		print_r($this->attributs);
		echo "</pre>";
	}
	
	public function importLine($csvLine, $lineNum){
		$this->csvline = $csvLine;
		if(!$this->_carExists()){
			$this->_addAttrToArray();
			$this->_addAttr();
		}
		else{
			$this->lineNum .= $lineNum.', ';
		}
	}
	
	protected function _carExists(){
		global $db;
		if($this->csvline['stockID'] == ''){
			if(mysql_query("Insert into car (stock_id, vin,created_at) Values ('".$this->csvline['stockID']."', '".$this->csvline['vin']."','".$this->getCurrentTimestamp()."')") or die(mysql_error())){
				$this->carID = mysql_insert_id();
				$this->stockID[$this->carID] = $this->csvline['stockID'];
				unset($this->csvline['stockID']);
				unset($this->csvline['vin']);
			}
			return false;
		}
		
		$key = array_search($this->csvline['stockID'], $this->stockID);
		if($key === false){
			if(mysql_query("Insert into car (stock_id, vin,created_at) Values ('".$this->csvline['stockID']."', '".$this->csvline['vin']."','".$this->getCurrentTimestamp()."')") or die(mysql_error())){
				$this->carID = mysql_insert_id();
				$this->stockID[$this->carID] = $this->csvline['stockID'];
			}
				unset($this->csvline['stockID']);
				unset($this->csvline['vin']);
			return false;
		} else{
			return true;
		}
	}
	
	
	private function _addAttrToArray(){
		foreach($this->csvline as $key=>$val){
			if($val == ''){
				continue;
			}
			$this->car[$key] = $val;
		}
	}
	
	private function _filter_price($price){
		return preg_replace("/[^0-9]/", '', $price);
	}
	
	private function _addAttr(){
		global $db;
		$for_option= array("select", "multiselect", "radio", "checkbox");
		$table_prefix="car_";
		$temp='';
		$query_value='';
		foreach( $this->car as $key=>$value){
			if($value == '' && !is_array($value)){
				continue;
			}
			// for "select", "multiselect", "radio", "checkbox" values 
			if(in_array($this->attributs[$key]["front"],$for_option)){
				$option_index = array_search($value, $this->attributs[$key]["options"]);
				if($option_index === false){
					if(mysql_query("INSERT INTO attribute_option_value (attribute_id,value) Values (".$this->attributs[$key]["id"].", '".mysql_real_escape_string($value)."')") or die(mysql_error())){
						$temp = @mysql_insert_id();
						$this->attributs[$key]["options"][$temp] = $value;
						$value = $temp;
					}
				}
				else{
					$value = $option_index;
				}
			}
			
			if($key == "images"){
				$this->_insertImages($value, $key);
				continue;
			}
			
			if($key == "price" || $key == "mileage"){
				$value = $this->_filter_price($value);
			}
			
			
			$query_value = "'".mysql_real_escape_string($value)."'";
			
			$query = "INSERT INTO ".$table_prefix.$this->attributs[$key]["back"]." (attribute_id, car_id, value) Values (".$this->attributs[$key]["id"].", ".$this->carID.", ".$query_value." )";
			mysql_query($query) or die(mysql_error());
			
		}
	}
	
	private function _insertImages($images, $key){
		global $db;
		$i=1;
		foreach($images as $image){
			if($image == ''){
				continue;
			}
			if(strpos($image, "?") !== false){
				$part = explode("?" ,$image);
				$image = $part[0];
			}
			$query_value = "'".mysql_real_escape_string($image)."'";
			
			$query = "INSERT INTO car_".$this->attributs[$key]["back"]." (attribute_id, car_id, value) Values (".$this->attributs[$key]["id"].", ".$this->carID.", ".$query_value." )";
			mysql_query($query) or die(mysql_error());
			
			$query = "INSERT INTO car_".$this->attributs[$key]["back"]."_value (value_id, position, disabled) Values (".mysql_insert_id().", ".$i++.", 0 )";
			mysql_query($query) or die(mysql_error());
		}
	}
	
	
	public function printCar(){
		echo "<pre>";
		print_r($this->car);
		echo "</pre>";
	}
	
	public function validateCSV($csv_line){
		/*$csv_line = serialize($csv_line);
		$this->validCSVFormat = serialize($this->validCSVFormat);
		if( array_diff($csv_line,$this->validCSVFormat) === array_diff($this->validCSVFormat,$csv_line)){*/
		//$csv_line = array_filter($csv_line);
		$csv_line = array_map('trim', $csv_line);
		$csv_line = array_filter($csv_line, create_function('$a','return $a!="";'));
		if($this->validCSVFormat === $csv_line){
			return true;
		} else{
			return false;
		}
	}
	
	
	function getAttr($string, $pt1, $pt2 = "\r\n", $join = false){
		$result = '';
		if(strpos($string, $pt1) === false){
			return $result;
		}
		$start = strpos($string, $pt1) + strlen($pt1);
		$end = strpos($string, $pt2, $start)-$start;
		$result = substr($string, $start, $end );
		if($join){
			$result = explode("\r\n",$result);
			$result = array_filter($result);
			foreach($result as $key => $val){
				if($val == ' '){
					unset($result[$key]);
				}
			}
			$result = implode(", ",$result);
		}
		
		
		return trim($result);
	}
	
	function splitName($str, $carName){
		$car = array();
		if(strpos($str,"- $") !== false){
			$car["fullName"] = trim(substr($str, 0, strpos($str,"- $")));
		}
		else{
			$car["fullName"] = trim(substr($str, 0));
		}
		
		$car['madeYear'] = intval(substr($car["fullName"], 0, strpos($car["fullName"]," ")));
		
		$str = trim(substr($car["fullName"], strlen($car['madeYear'])));
		
		if(strpos($carName,",") !== false){
			$words = explode(",", $carName);
			$ptn = '';
			foreach ($words as $s) {
			  if ($ptn != '') $ptn .= '|';
			  $ptn .= preg_quote($s, '/');
			}
			preg_match("/$ptn/i", $str,$matches);
			
			$carName = $matches[0];
		}
		
		if($carName != '' && strpos($car["fullName"],$carName) !== false){
			$car['manufacturer'] = trim(substr($str, 0, strpos($str,$carName)));
			$car['carName'] = $carName;
			$car['model'] =  trim(substr($str, strpos($str, " ",strlen($car['manufacturer'].$car['carName']))));
		}
		else if($carName != '' && strpos($car["fullName"],$carName) === false){
			$make = $this->contains($str,$this->attributs['manufacturer']['options']);
			if($make != ''){
				$car['manufacturer'] = $make;
			}
			else{
				$arr = explode(" ", $str);
				$car['manufacturer'] = $arr[0];
				$str = trim(substr($str, strlen($car['manufacturer'])));
			}
			$str = trim(substr($str, strlen($car['manufacturer'])));
			$arr = explode(" ", $str);
			$car['carName'] = $arr[0];
			$str = trim(substr($str, strlen($car['carName'])));
			$car['model'] =  trim($str);
		}
		else{
			$make = $this->contains($str,$this->attributs['manufacturer']['options']);
			if($make != ''){
				$car['manufacturer'] = $make;
				$str = trim(substr($str, strlen($car['manufacturer'])));
			}
			else{
				$arr = explode(" ", $str);
				$car['manufacturer'] = $arr[0];
				$str = trim(substr($str, strlen($car['manufacturer'])));
			}
			$arr = explode(" ", $str);
			$car['carName'] = $arr[0];
			$str = trim(substr($str, strlen($car['carName'])));
			$car['model'] =  trim($str);
		}
		
		if($car['manufacturer'] == 'Mercedes-Benz'){
			$arr = preg_split('#(?<=[a-z])(?=[0-9])#i', $car['carName']);
			$model = array("190-Series"=>"190",
			  "200-Series"=>"200",
			  "300-Series"=>"300",
			  "400-Series"=>"400",
			  "500-Series"=>"500",
			  "600-Series"=>"600",
			  "C-Class"=>"C",
			  "CL-Class"=>"CL",
			  "CLK-Class"=>"CLK",
			  "CLS-Class"=>"CLS",
			  "E-Class"=>"E",
			  "G-Class"=>"G",
			  "GL-Class"=>"GL",
			  "GLK-Class"=>"GLK",
			  "M-Class"=>"ML",
			  "R-Class"=>"R",
			  "S-Class"=>"S",
			  "SL-Class"=>"SL",
			  "SLK-Class"=>"SLK",
			  "SLR McLaren"=>"SLR McLaren",
			  "SLS AMG"=>"SLS AMG",
			  "Sprinter"=>"Sprinter");
			  
			$key = array_search(strtoupper($arr[0]), $model);
			 
			 $car['model'] =   $car['carName']." ".$car['model'];
			 
			 if($key === false){
				$car['carName'] = '';
			 }
			 else{
				 $car['carName'] = $key;
			 }
		}
		
		return $car;
	}
	
	function contains($str, $arr){
	  $ptn = '';
	  foreach ($arr as $s) {
		if ($ptn != '') $ptn .= '|';
		$ptn .= preg_quote($s, '/');
	  }
	  preg_match("/$ptn/i", $str, $make);
	  return $make[0];
	}
	
	function getDealer($string){
		$start = strpos($string, "About the Dealer");
		$end = strpos($string, "Review this Dealer", $start)-$start;
		$str = substr($string, $start, $end );
		$str = explode("\r\n",$str);
		$str = array_filter($str);
		array_shift($str);
		array_pop($str);
		
		
		foreach($str as $key=>$val){
			$str[$key] = trim($str[$key]);
			if($val == " ") unset($str[$key]);
		}
		$dealer["name"] = array_shift($str);
		$dealer['addr'] = array_shift($str).", ".array_shift($str);
		$dealer['addr'] = str_replace(" (Map)","", $dealer['addr']);
		return $dealer;
	}
	
	function getPrice($string){
		return intval(str_replace(",", "", trim( substr( $string, strpos( $string, "$" )+1 ) ) ) );
	}	
}
