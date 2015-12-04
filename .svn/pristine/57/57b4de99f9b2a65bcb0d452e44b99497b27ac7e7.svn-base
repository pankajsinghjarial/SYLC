<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();
/*if($sorter == "")
{ $sorter = "prix~asc" ;}
$sort = explode("~",$sorter);
$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1");
$total_rows = mysql_num_rows($cars);
$pages = new Paginator; 
$pages->items_total =  $total_rows;
$pages->default_ipp=15;
$pages->paginate();
$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1 order by $sort[0] $sort[1] $pages->limit");*/

if(isset($_POST) && isset($_POST["submit_inq"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"address"=>$_POST['address'],"type"=>0);
	$common_obj->save("contact",$arr);	
	
	// Your subject
	$subject='Inquiry About Car';
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
	$message = 'The person that contacted you is  '.$_POST['name']
	.'<br/>	E-mail: '.$_POST['email'].'<br/>
	Phone Number: '.$_POST['phone'].'<br/>
	Address: '.$_POST['address'].'<br/>
	Message: '.$_POST['message'].'<br/>';

$sentmail = mail( SITE_ADMIN_EMAIL, $subject, $message, $headers );
	?>
       <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
       <script type="text/javascript">
			$ = jQuery.noConflict();	
		</script>
        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="<?php echo DEFAULT_URL; ?>/css/msgBoxLight.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$.msgBox({
						title:"Merci",
						content:"Nous avons ajouté votre demande avec succès",
						type:"info",
						timeOut:5000,
						opacity:0.6,
						autoClose:true
					});
				});
			})(jQuery); 
		</script>
 <?php 
}
	
	
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




if(isset($stockType) && $stockType != ''){
	$dataArray['stockType'] = $common->getIdByOptionName(26, $stockType);
}
else{
	$dataArray['stockType'] = array($common->getIdByOptionName(26, "neuf"), $common->getIdByOptionName(26, "classic car"));
}

if($sort == ""){ 
	$sort = "price~asc" ;
}
$sort = explode("~",$sorter);

$pages = new Paginator;
$pages->default_ipp =15;
if(count($dataArray) >= 1){
		
	if($groupby != "" && $sort != "")
	{ 
		$order = explode("~",$sort);
		$orderby = $groupby.",".$order[0];
		$total_rows = $search->attributeSearchCount($dataArray,$groupby);
		$pages->items_total +=  $total_rows;
		$pages->paginate();
		$cars = $search->attributeSearch($dataArray,$orderby,$order[1],$pages->limit);
		
	}
	else if($groupby != "" && $sort == "")
	{  $order = explode("~",$sort);
	
		$total_rows = $search->attributeSearchCount($dataArray,$groupby);
		$pages->items_total +=  $total_rows;
		$pages->paginate();
		$cars = $search->attributeSearch($dataArray,$order[0],$order[1],$pages->limit);
	
	}
	else if($groupby == "" && $sort != "")
	{ 
		$total_rows = $search->attributeSearchCount($dataArray,$groupby);
		$pages->items_total +=  $total_rows;
		$pages->paginate();
		$cars = $search->attributeSearch($dataArray,$groupby,'ASC',$pages->limit);
	}
	else{
		$total_rows = $search->attributeSearchCount($dataArray);
		$pages->items_total +=  $total_rows;
		$pages->paginate();
		$cars = $search->attributeSearch($dataArray,'fullName','ASC',$pages->limit);
	}
}
else{
	$total_rows = $common->numberOfRows("car",'');
	$pages->paginate();
	$pages->items_total +=  $total_rows;	
	$result = $common->customQuery("select car_id from car order by RAND() ".$pages->limit);
	$cars = array();
	while($res = mysql_fetch_object($result)){
		$cars[] = $res->car_id;
	}
}


$cars_arr = array();
if(count($cars) >=1){
	foreach($cars as $car) {
		$temp = $common->getCarWithAttrList($car ,array("fullName","images","price","mileage","features")); 
		if($temp[$car]["images"] != "") {
			$imgpath = $commons->getImageUrl($temp[$car]["images"]);
		} else{
			$imgpath = LIST_ROOT."/images/default.jpg";
		}
		
		$arr = array(
				"fullName"=> $temp[$car]["fullName"],
				"imgpath"=>$imgpath,
				"mileage" => $temp[$car]["mileage"],
				"price" => $temp[$car]["price"],
				"features" => $common->getFeatureForListing($temp[$car]['features'],3)
				);
				
		$cars_arr[$car] = $arr;	
	}
}