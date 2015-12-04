<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();

$where = "";
$searched = '';
$addtopaging ="?";


if(isset($_POST) && isset($_POST["add_to_sel"])){
	global $db;
	$common_obj = new common();
	/*$val = new validation();
	if($name != ''){
		$val->add_fields($name, 'name', 'Please Enter Name');
	}
	if($prename != ''){
		$val->add_fields($prename, 'name', 'Please Enter Prename');
	}
	if($email != ''){
		$val->add_fields($email, 'email', 'Please Enter Email');
	}
	if($phone != ''){
		$val->add_fields($phone, 'phone', 'Please Enter Phone');
	}
	
	$val->add_fields($car_id, 'req', 'car_id');
	$val->add_fields($buyItNowPrice, 'req', 'buyItNowPrice');
	$val->add_fields($postalCode, 'req', 'postalCode');
	$val->add_fields($location, 'req', 'location');
	$val->add_fields($listingType, 'req', 'listingType');
	$val->add_fields($endson, 'req', 'endson');
	$val->add_fields($endtimestamp, 'req', 'endtimestamp');
	$val->add_fields($buyItNowAvailable, 'req', 'buyItNowAvailable');
	
	$val->add_fields($car_id, 'alphanum', 'car_id');
	$val->add_fields($buyItNowPrice, 'currency', 'buyItNowPrice');
	$val->add_fields($postalCode, 'zip', 'postalCode');
	$val->add_fields($location, 'address', 'location');
	$val->add_fields($listingType, 'alpha', 'listingType');
	$val->add_fields($endson, 'req', 'endson');
	$val->add_fields($endtimestamp, 'num', 'endtimestamp');
	
	$error = $val->validate();
	if($buyItNowAvailable == 1 || $buyItNowAvailable == 0){
		$error .= "buyItNowAvailable";
	}
	*/
	
	if($error != ''){
		$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>2);
		$common_obj->save("contact",$arr);	
		
		$arr_new = array("car_id"=>$_POST['car_id'],"title"=>$_POST['title'],"buyItNowPrice"=>$_POST['buyItNowPrice'],"postalCode"=>$_POST['postalCode'],"location"=>$_POST['location'],"listingType"=>$_POST['listingType'],"endson"=>$_POST['endson'],"endtimestamp"=>$_POST['endtimestamp'],"buyItNowAvailable"=>$_POST['buyItNowAvailable']);
		$common_obj->save("ebay_car",$arr_new);	
		
				// Your subject
				$subject= $_POST['name']." ".$_POST['prename'].' add a car to his selection';
				// From
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// Additional headers
				$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
				$message = $_POST['name'].' '.$_POST['prename'].'added a car to his selection.<br />
				 Details are as below :<br/>
				 Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
				 Car Id : '.$_POST['car_id'].'<br/>
				 E-mail: '.$_POST['email'].'<br/>
				 Phone Number: '.$_POST['phone'];
	
		$sentmail = mail( SITE_ADMIN_EMAIL, $subject, $message, $headers );
	}
	else{
		$_SESSION['err_msg'] = "Please enter specified details.";
	}
}
if(isset($_POST) && isset($_POST["consult_to_spacs"])){
	global $db;
	$common_obj = new common();
	/*$val = new validation();
	if($name != ''){
		$val->add_fields($name, 'name', 'Please Enter Name');
	}
	if($prename != ''){
		$val->add_fields($prename, 'name', 'Please Enter Prename');
	}
	if($email != ''){
		$val->add_fields($email, 'email', 'Please Enter Email');
	}
	if($phone != ''){
		$val->add_fields($phone, 'phone', 'Please Enter Phone');
	}
	
	$val->add_fields($car_id, 'req', 'car_id');
	$val->add_fields($buyItNowPrice, 'req', 'buyItNowPrice');
	$val->add_fields($postalCode, 'req', 'postalCode');
	$val->add_fields($location, 'req', 'location');
	$val->add_fields($listingType, 'req', 'listingType');
	$val->add_fields($endson, 'req', 'endson');
	$val->add_fields($endtimestamp, 'req', 'endtimestamp');
	$val->add_fields($buyItNowAvailable, 'req', 'buyItNowAvailable');
	
	$val->add_fields($car_id, 'alphanum', 'car_id');
	$val->add_fields($buyItNowPrice, 'currency', 'buyItNowPrice');
	$val->add_fields($postalCode, 'zip', 'postalCode');
	$val->add_fields($location, 'address', 'location');
	$val->add_fields($listingType, 'alpha', 'listingType');
	$val->add_fields($endson, 'req', 'endson');
	$val->add_fields($endtimestamp, 'num', 'endtimestamp');
	
	$error = $val->validate();
	if($buyItNowAvailable == 1 || $buyItNowAvailable == 0){
		$error .= "buyItNowAvailable";
	}*/
	
	
	if($error != ''){
		$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"time"=>$_POST['recall'],"question"=>$_POST['question'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"type"=>3);
		$common_obj->save("contact",$arr);	
		
		$arr_new = array("car_id"=>$_POST['car_id'],"title"=>$_POST['title'],"buyItNowPrice"=>$_POST['buyItNowPrice'],"postalCode"=>$_POST['postalCode'],"location"=>$_POST['location'],"listingType"=>$_POST['listingType'],"endson"=>$_POST['endson'],"endtimestamp"=>$_POST['endtimestamp'],"buyItNowAvailable"=>$_POST['buyItNowAvailable']);
		$common_obj->save("ebay_car",$arr_new);	
		
				// Your subject
				$subject= $_POST['name']." ".$_POST['prename'].' request to contact with specialist';
				// From
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// Additional headers
				$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
				$message = $_POST['name'].' '.$_POST['prename'].' request to contact with specialist.<br />
				 Details are as below :<br/>
				 Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
				 Car Id : '.$_POST['car_id'].'<br/>
				 E-mail: '.$_POST['email'].'<br/>
				 Phone Number: '.$_POST['phone'].'<br/>
				 Suitable time to call : '.$_POST['recall'].'<br/>
				 Question: '.$_POST['question'].'<br/>
				 Message: '.$_POST['message'];
	
		$sentmail = mail( SITE_ADMIN_EMAIL, $subject, $message, $headers );
	}
	else{
		$_SESSION['err_msg'] = "Please enter specified details.";
	}
}
$addtopaging1 ='';

if($_GET)
{
	$args = explode("&",$_SERVER['QUERY_STRING']);
	foreach($args as $arg)
	{
		if($arg == '') continue;
		$keyval = explode("=",$arg);
		if($keyval[0] != "page" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;

	}
	
}




if(isset($manufacturer)){
	
	$searched = '<br>You Searched for ';
	if(isset($manufacturer)){
		$where .=" ".$common->getOptionNameById($manufacturer);
		$searched .= ' Manufacturer: <span class="searched">'.$common->getOptionNameById($manufacturer).'</span>';
	}
	if(isset($madeYear) && $madeYear != ''){
		$where .= " ".$madeYear;
		$searched .= ', Year: <span class="searched">'.$madeYear.'</span>';
	}
	if(isset($model) && $model != ''){
		$where .= " ".$model;
		$searched .= ', Model: <span class="searched">'.$model.'</span>';
	}
	
}


$filterarray = array();

if(isset($price) && $price != ''){
	$price = explode('~', $price);	
	$filterarray[] = array(
						'name' => 'MaxPrice',
						'value' => $price[1] * 1000,
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	$filterarray[] = array(
						'name' => 'MinPrice',
						'value' => $price[0] * 1000,
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	
	$searched .= "with price range <span class=\"searched\"> $".$price[0] * 1000 ." USD  to $".$price[1] * 1000 ." USD </span>";
}else{
	$filterarray[] =
    array(
    'name' => 'MaxPrice',
    'value' => '10000000',
    'paramName' => 'Currency',
    'paramValue' => 'USD');

}

if(isset($filter) && $filter != ''){
	if($filter == 1){
		$val = array('FixedPrice','StoreInventory','AuctionWithBIN');
	}
	else{
		$val = array('AuctionWithBIN','Auction');
	}
	
	$filterarray[] =  array(
						'name' => 'ListingType',
						'value' => $val,
						'paramName' => '',
						'paramValue' => '');
}
else{
	$filterarray[] =  array(
				'name' => 'ListingType',
				'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
				'paramName' => '',
				'paramValue' => '');
}



// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'car'.$where;  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0

// Create a PHP array of the item filters you want to use in your request

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call 
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsAdvanced";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&categoryId=6001";
$apicall .= "&paginationInput.entriesPerPage=25";
if(isset($page)){
	$apicall .= "&paginationInput.pageNumber=".$page;
}
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "$urlfilter";
if(isset($sort) && $sort != ''){
	
	$orderBy = explode('~',$sort);
	$order = '';
	if($orderBy[0] == 'buyItNowPrice'){
		if($orderBy[1] == 'asc') $order ='&sortOrder=CurrentPriceHighest';
		else $order = '&sortOrder=PricePlusShippingLowest';
	}
	if($orderBy[0] == 'time'){
		if($orderBy[1] == 'asc') $order ='&sortOrder=EndTimeSoonest';
		else $order = '&sortOrder=StartTimeNewest';
	}
	
	$orderfield = '<input type="hidden" name="sort" value="'.$orderBy[0].'~'.$orderBy[1].'">';
	$apicall .= $order;
}

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);


$pages = new Paginator; 
$pages->items_total = $resp->paginationOutput->totalEntries;
$pages->default_ipp=25;
$pages->paginate();


$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `sort_order`");


/*$ebayid = $common->CustomQuery("Select count(*) as total from ebay_car ".$where);
$item = mysql_fetch_object($ebayid);
$pages = new Paginator; 
$pages->items_total = $item->total;
$pages->default_ipp=15;
$pages->paginate();
$resp = $common->CustomQuery("Select * from ebay_car ".$where." ".$order." ".$pages->limit);
$Make = $common->CustomQuery("SELECT Make From ebay_car GROUP BY Make order by Make ASC");*/


