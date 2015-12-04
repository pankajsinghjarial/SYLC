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
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>2);
	$common_obj->save("contact",$arr);	
	
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
if(isset($_POST) && isset($_POST["consult_to_spacs"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"time"=>$_POST['recall'],"question"=>$_POST['question'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"type"=>3);
	$common_obj->save("contact",$arr);	
	
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

$order = '';
$orderfield = '';
if(isset($sort) && $sort != ''){
	$orderBy = explode('~',$sort);
	$order = ' Order By '.$orderBy[0].' '.$orderBy[1];
	$orderfield = '<input type="hidden" name="sort" value="'.$orderBy[0].'~'.$orderBy[1].'">';
}

$concat = '';
if(isset($manufacturer)){
	
	$searched = '<br>You Searched for ';
	if(isset($manufacturer)){
		$where .="Make LIKE '%".$manufacturer."%'";
		$concat = ' AND ';
		$searched .= ' Manufacturer: <span class="searched">'.$manufacturer.'</span>';
	}
	if(isset($madeYear) && $madeYear != ''){
		$where .= $concat."Year  = '".$madeYear."'";
		$concat = ' AND ';
		$searched .= ', Year: <span class="searched">'.$madeYear.'</span>';
	}
	if(isset($model) && $model != ''){
		$where .= $concat."Model LIKE '%".$model."%'";
		$concat = ' AND ';
		$searched .= ', Model: <span class="searched">'.$model.'</span>';
	}
	if(isset($price) && $price != ''){
		$price = explode('~', $price);
		$where .= $concat."buyItNowPrice BETWEEN ".$price[0] * 1000 ." AND ".$price[1] * 1000 ." ";
		$searched .= "with price range <span class=\"searched\"> $".$price[0] * 1000 ." USD  to $".$price[1] * 1000 ." USD </span>";
	}
}

if(isset($filter) && $filter != ''){
	$where .= $concat."buyItNowAvailable = ".$filter;
}

if($where != ''){
	$where = " WHERE ".$where;
}





$ebayid = $common->CustomQuery("Select count(*) as total from ebay_car ".$where);
$item = mysql_fetch_object($ebayid);

$pages = new Paginator; 
$pages->items_total = $item->total;
$pages->default_ipp=15;
$pages->paginate();

$resp = $common->CustomQuery("Select * from ebay_car ".$where." ".$order." ".$pages->limit);

$Make = $common->CustomQuery("SELECT Make From ebay_car GROUP BY Make order by Make ASC");


