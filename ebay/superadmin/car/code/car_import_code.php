<?php
/*************************************************************************************************************
#Coder         : Jayant Paliwal
#Description   : This Code is used to Import cars from csv
*************************************************************************************************************/


extract($_GET);
extract($_POST);
extract($_FILES);
$obj  = new validation();
$obj_commom  = new common();

/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
exit;*/


/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
#saving data in database after validation
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$importcsv = new ImportClass();	
	$error	=	'';
	
	$obj->add_fields($import, 'ftype=csv', 'File Type Not Supported. Please Upload CSV File.');	  
	$error = $obj->validate();		   
	$error = false;
	if($error){
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	}
	else
	{
		$path = $obj_commom->uploadImportFile($import);
		
		if($path !== false){
			$fp = fopen($path,'r') or die("can't open file");
			$cars = array();
			$csvcount=0;
			
			if(isset($siteName) && $siteName != "autotrader.com"){
				while($csv_line = fgetcsv($fp)) {
					if($csvcount == 0 ){
						if($importcsv->validateCSV($csv_line)){
							$csvcount++;
							continue;
						}
						else{
							$errorMsg= "<font color='#FF0000' family='verdana' size=2>CSV formate is not correct. Please correct the formate.</font>";
							break;
						}
					}
					
					$car = array();
					$name = $importcsv->splitName($csv_line[1], $carName);
					$car['fullName'] = $name['fullName'];
					$car['madeYear'] =  $name['madeYear'];
					$car['manufacturer'] =  $name['manufacturer'];
					$car['carName'] =  $name['carName'];
					$car['model'] =  $name['model'];
					
					$car['features'] = $importcsv->getAttr($csv_line[2], "Features:","Show Additional Features", true);
					$car['std_equip'] = $importcsv->getAttr($csv_line[2], "Standard Equipment:", "Show Additional Standard Equipment", true);
					$car['sellersNotes'] = $importcsv->getAttr($csv_line[2], "Seller's Notes:");
					
					$dealer = $importcsv->getDealer($csv_line[2]);
					$car['dealerName'] = $dealer['name'];
					$car['dealerAddr'] = $dealer['addr'];
					
					$images = '';
					for($i = 3, $j = 12; $i < $j ; $i++){
						if( $csv_line[$i] == '') continue;
						else $images .= str_replace("thumbnail", "supersized",trim($csv_line[$i])).",";
					}
					if($images != ''){
						$images = substr($images, 0, strlen($images)-1);
						$images = explode(",", $images);
					}
					$car['images'] = $images;
					
					$car['price'] = $importcsv->getPrice($csv_line[1]);
					$car['mileage'] =  intval(str_replace(",", "", $importcsv->getAttr($csv_line[2], "Mileage:") ) )   ;
					$car['fuel'] = $importcsv->getAttr($csv_line[2], "Fuel:");
					$car['bodyStyle'] = $importcsv->getAttr($csv_line[2], "Body Style:");
					$car['engine'] = $importcsv->getAttr($csv_line[2], "Engine:");
					$car['extColor'] = $importcsv->getAttr($csv_line[2], "Exterior Color:");
					$car['interColor'] = $importcsv->getAttr($csv_line[2], "Interior Color:");
					$car['transmission'] = $importcsv->getAttr($csv_line[2], "Transmission:");
					$car['stockID'] = $importcsv->getAttr($csv_line[2], "Stock #:");
					$car['drivetrain'] = $importcsv->getAttr($csv_line[2], "Drivetrain:");
					$car['vin'] = $importcsv->getAttr($csv_line[2], "VIN:");
					$car['doors'] = $importcsv->getAttr($csv_line[2], "Doors:");
					$car['wheelbase'] = $importcsv->getAttr($csv_line[2], "Wheelbase:");
					$car['featured'] = "No";
					$car['siteName'] = $siteName;
					
					
					
					//pr($car);
					$importcsv->importLine($car, $csvcount);
					$csvcount++;
				}
			}
			else{
				while($csv_line = fgetcsv($fp)) {
				
					
					$st = $csv_line[1];
					preg_match("/[0-9]{4}/",$csv_line[1],$title,PREG_OFFSET_CAPTURE);
					$year = $title[0][0];
					 $st = trim(substr($st, strpos($st, $year)+4));
					$space = " " ;
					 $manufacturer = substr($st,0 , strpos($st, $space));
					$length = strlen($manufacturer);
					$st = trim(substr($st, strpos($st, $manufacturer)+ $length));
					 $carName = substr($st,0 , strpos($st, $space));
					$length = strlen($carName);
					 $model = trim(substr($st, strpos($st, $car)+ $length));
					 $Mileage = str_replace(",","",$csv_line[4]);
					$smart_val= str_replace(",","",str_replace("$","",$csv_line[2]));
					
					$car = array();
					
					
					$car['fullName'] = $csv_line[1];
					$car['madeYear'] =  $year;
					$car['manufacturer'] =  $manufacturer;
					$car['carName'] = $carName;
					$car['model'] =  $model;
					$car['price'] = $smart_val;
					$car['mileage'] =  $Mileage;
					$car['fuel'] = $csv_line[13];
					$car['bodyStyle'] = $csv_line[5];
					$car['engine'] = $csv_line[8];
					$car['extColor'] = $csv_line[6];
					$car['interColor'] =  $csv_line[7];
					$car['transmission'] = $csv_line[9];
					$car['stockID'] = $csv_line[10];
					$car['drivetrain'] = $csv_line[14];
					$car['vin'] = '';
					$car['featured'] = "No";
					$car['siteName'] = $siteName;
					$car['sellersNotes'] = mysql_real_escape_string($csv_line[11]);
					
					
					 if( !preg_match('/^([0-9_\-])+$/', $csv_line[15])){
						 $csv_line[15] = '';
					 }
					 else{
						 $csv_line[15]=", Phone : ".$csv_line[15]; 
					 }
					 $car['dealerAddr'] = $csv_line[16].$csv_line[15];
					 $car['dealerName'] = $csv_line[12];
					 $rpl = "Options Installed"; 
					 
					 $pos = strrpos($csv_line[17], $rpl);
					 if ($pos === false) { // note: three equal signs
					 $car['features']=''; 
					   
					 }else{
						 $haystack = trim($csv_line[17]);
						 $needle = "Options Installed";
						 $needle1 = "Seller's Description and Comments";
						 $length = strlen($needle);
						 $result = trim(substr($haystack, strpos($haystack, $needle)+$length));
						 $result = trim(substr($result,0, strpos($result, $needle1)));
						 $arr = array();
						 $arrt = array();
						 $arro = array();
						 $arr = explode("\n",$result);
						 foreach($arr as $arrt){
						    if(trim($arrt) !=""){
							   $arro[] = trim($arrt);	
						    }
						 }
						 $result = implode(", ",$arro);
						 $car['features'] = $result;
					}
					 
					$image = array(); 
					 $rpl = '{"url":"'; 
					 $pos = strrpos($csv_line[18], $rpl);
					 if ($pos === false) { // note: three equal signs
					 	$car['images']=''; 
					   
					 }else{
						$haystack = trim($csv_line[18]);
						$cnt = substr_count($haystack, '{"url":');
						for($cn=0;$cn<$cnt;$cn++){
							$needle = '{"url":"';$needle1 = '","thumbnail';
							$length = strlen($needle);
							$haystack = $result = trim(substr($haystack, strpos($haystack, $needle)+$length));
							$image[$cn] = trim(substr($result,0, strpos($result, $needle1)));
						 }
					 }
					$car['images'] = $image;
					
					//pr($car);
					
					//$importcsv->importLine($car, $csvcount);
				
					$csvcount++;
				}	
			}	
		
			fclose($fp) or die("can't close file");
			if($importcsv->lineNum == ''){
				if($errorMsg == ''){
					$_SESSION['success_msg'] = 'File Imported Successfully.';
					echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/car/import.php";</script>'; 
					exit;
				}
			}
			else{
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Cars From Following Line Numbers Can Not Imported Due To Duplicate Stock ID And VIN.".$importcsv->lineNum."</font>";
			}
		}
	}
	
	unset($importcsv);
}
unset($obj);
unset($obj_commom);
