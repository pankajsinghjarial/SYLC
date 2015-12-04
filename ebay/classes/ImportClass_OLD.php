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
						"wheelbase"=>''
				);
	private $validCSVFormat=array( "[ID]", "[CarMadeYear]", "[Car Name]", "[Features]", "[Features_2]", "[Features_3]", "[Features_4]", "[Features_5]", "[Features_6]", "[Features_7]", "[Features_8]", "[Features_9]", "[Features_10]", "[Features_11]", "[Features_12]", "[Features_13]", "[Features_14]", "[Features_15]", "[Features_16]", "[Standard Equipment]", "[Standard Equipment_2]", "[Standard Equipment_3]", "[Standard Equipment_4]", "[Standard Equipment_5]", "[Standard Equipment_6]", "[Standard Equipment_7]", "[Standard Equipment_8]", "[Standard Equipment_9]", "[Standard Equipment_10]", "[Standard Equipment_11]", "[Standard Equipment_12]", "[Standard Equipment_13]", "[Standard Equipment_14]", "[Standard Equipment_15]", "[Standard Equipment_16]", "[Standard Equipment_17]", "[Standard Equipment_18]", "[Standard Equipment_19]", "[Standard Equipment_20]", "[Standard Equipment_21]", "[Standard Equipment_22]", "[Standard Equipment_23]", "[Standard Equipment_24]", "[Standard Equipment_25]", "[Standard Equipment_26]", "[Standard Equipment_27]", "[Standard Equipment_28]", "[Standard Equipment_29]", "[Standard Equipment_30]", "[Standard Equipment_31]", "[Standard Equipment_32]", "[Standard Equipment_33]", "[Standard Equipment_34]", "[Standard Equipment_35]", "[Standard Equipment_36]", "[Standard Equipment_37]", "[Standard Equipment_38]", "[Standard Equipment_39]", "[Standard Equipment_40]", "[Standard Equipment_41]", "[Standard Equipment_42]", "[Standard Equipment_43]", "[Standard Equipment_44]", "[Standard Equipment_45]", "[Standard Equipment_46]", "[Standard Equipment_47]", "[Standard Equipment_48]", "[Standard Equipment_49]", "[Standard Equipment_50]", "[Standard Equipment_51]", "[Standard Equipment_52]", "[Standard Equipment_53]", "[Standard Equipment_54]", "[Standard Equipment_55]", "[Standard Equipment_56]", "[Standard Equipment_57]", "[Standard Equipment_58]", "[Standard Equipment_59]", "[Standard Equipment_60]", "[Standard Equipment_61]", "[Standard Equipment_62]", "[Standard Equipment_63]", "[Standard Equipment_64]", "[Standard Equipment_65]", "[Standard Equipment_66]", "[Standard Equipment_67]", "[Standard Equipment_68]", "[Sellers Notes]", "[Dealer Name]", "[Dealer Address]", "[Image URL 1]", "[Image URL 2]", "[Price]", "[Mileage]", "[Fuel]", "[Body Style]", "[Engine]", "[Exterior Color]", "[Transmission]", "[Interior Color]", "[Stock #]", "[Drivetrain]", "[VIN]", "[Doors]", "[Wheelbase]", "[Page URL]" );
	
	
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
	
	public function importLine($csvLine, $lineNum, $siteName = 'cars.com'){
		$this->csvline = $csvLine;
		if(!$this->_carExists()){
			$this->_addAttrToArray($siteName);
			$this->_addAttr();
		}
		else{
			$this->lineNum .= $lineNum.', ';
		}
	}
	
	protected function _carExists(){
		global $db;
		if($this->csvline[100] == ''){
			if(mysql_query("Insert into car (stock_id, vin,created_at) Values ('".$this->csvline[100]."', '".$this->csvline[102]."','".$this->getCurrentTimestamp()."')") or die(mysql_error())){
				$this->carID = mysql_insert_id();
				$this->stockID[$this->carID] = $this->csvline[100];
			}
			return false;
		}
		
		$key = array_search($this->csvline[100], $this->stockID);
		if($key === false){
			if(mysql_query("Insert into car (stock_id, vin,created_at) Values ('".$this->csvline[100]."', '".$this->csvline[102]."','".$this->getCurrentTimestamp()."')") or die(mysql_error())){
				$this->carID = mysql_insert_id();
				$this->stockID[$this->carID] = $this->csvline[100];
			}
			return false;
		} else{
			return true;
		}
	}
	
	protected function splitName(){
		$madeYear = $this->csvline[1];
		$fullName = $this->csvline[2];
		
		$fullName = trim($fullName);
		$this->car["fullName"] = $fullName;
		$name = explode(" ", $fullName);
		
		if($name[0] == $madeYear ) $this->car["madeYear"] = $name[0];
			
		$this->car["manufacturer"] = $name[1];
		$this->car["carName"] = $name[2];
		unset($name[0]);unset($name[1]);unset($name[2]);
		$this->car["model"] = trim(implode(" ",$name));
	}
	
	private function _addAttrToArray($siteName){
		for ($i = 0, $j = count($this->csvline); $i < $j; $i++) {
			if($this->csvline[$i] == ''){
				continue;
			}
			
			switch($i){
				case 2:{
					$this->splitName();
				} break;
				case 3:{
					$this->car['features'] = $this->csvline[$i];
				} break;
				case 19:{
					$this->car['std_equip'] = $this->csvline[$i];
				} break;
				case 87:{
					$this->car['sellersNotes'] = $this->csvline[$i];
				} break;
				case 88:{
					$this->car['dealerName'] = $this->csvline[$i];
				} break;
				case 89:{
					$this->car['dealerAddr'] = $this->csvline[$i];
				} break;
				case 90:
				case 91:{
					$this->car['images'][$i] = $this->csvline[$i];
				} break;
				case 92:{
					$this->car['price'] = $this->csvline[$i];
				} break;
				case 93:{
					$this->car['mileage'] = $this->csvline[$i];
				} break;
				case 94:{
					$this->car['fuel'] = $this->csvline[$i];
				} break;
				case 95:{
					$this->car['bodyStyle'] = $this->csvline[$i];
				} break;
				case 96:{
					$this->car['engine'] = $this->csvline[$i];
				} break;
				case 97:{
					$this->car['extColor'] = $this->csvline[$i];
				} break;
				case 98:{
					$this->car['transmission'] = $this->csvline[$i];
				} break;
				case 99:{
					$this->car['interColor'] = $this->csvline[$i];
				} break;
				case 100:{
					//$this->car['stockID'] = $this->csvline[100];
				} break;
				case 101:{
					$this->car['drivetrain'] = $this->csvline[$i];
				} break;
				case 102:{
					//$this->car['vin'] = $this->csvline[102];
				} break;
				case 103:{
					$this->car['doors'] = $this->csvline[$i];
				} break;
				case 104:{
					$this->car['wheelbase'] = $this->csvline[$i];
				} break;
				
				default:{
					if($i > 3 && $i < 19){
						$this->car['features'] .= ", ".$this->csvline[$i];
					}
					else if($i > 19 && $i < 87){
						$this->car['std_equip'] .= ", ".$this->csvline[$i];
					}
				} 
			}
		}
		$this->car['featured'] = "No";
		$this->car['siteName'] = $siteName;
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
					if(mysql_query("INSERT INTO attribute_option_value (attribute_id,value) Values (".$this->attributs[$key]["id"].", '".$value."')") or die(mysql_error())){
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
}
?>