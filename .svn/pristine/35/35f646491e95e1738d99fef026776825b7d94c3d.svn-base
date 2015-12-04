<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();
$addtopaging1 = "?";
if($submit == 'sub_home')
{ 
	foreach($_POST as $key=>$value)
	{
		if($value != "" && $key != 'submit') { 
			$dataArray[$key] = $value; 
			$addtopaging1 .= "&".$key."=".$value;
		}
		if( ($key == "price" || $key == "mileage") && $value != "") {
			$priceval = explode('-',$value);
			if(count($priceval) == 1){
				$dataArray[$key] = array('0'=>$priceval[0]);
				$addtopaging1 .= "&".$key."=".array('0'=>$priceval[0]);
			}
			else {
				$dataArray[$key] = array('0'=>$priceval[0],'1'=>$priceval[1]);
				$addtopaging1 .= "&".$key."=".array('0'=>$priceval[0],'1'=>$priceval[1]);
			}
		}
		if($key == 'submit'){
			break;
		}
	} 
}


if($groupby != "" || $ipp != '' || $sort != "" ){
	foreach($_GET as $key=>$value)
	{
		if($value != "" && ($key != 'sort' && $key != "ipp" && $key != 'page')) {
			$dataArray[$key] = $value; 
			$addtopaging1 .= "&".$key."=".$value;
		}
		if( ($key == "price" || $key == "mileage") && $value != ""){
			$priceval = explode('-',$value);
			if(count($priceval) == 1) {
				$dataArray[$key] = array('0'=>$priceval[0]);
				$addtopaging1 .= "&".$key."=".array('0'=>$priceval[0]);
			}
			else {
				$dataArray[$key] = array('0'=>$priceval[0],'1'=>$priceval[1]);
				$addtopaging1 .= "&".$key."=".array('0'=>$priceval[0],'1'=>$priceval[1]);
			}
		}
		if($key == 'groupby' || $key == 'sort'){
			break;
		}
	}	
}

if(count($dataArray) >= 1){
		
	if($groupby != "" && $sort != "")
	{ $order = explode("~",$sort);
	$orderby = $groupby.",".$order[0];
	$total_rows = $search->attributeSearchCount($dataArray,$groupby);
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	$cars = $search->attributeSearch($dataArray,$orderby,$order[1],$pages->limit);
	
	}
	else if($groupby == "" && $sort != "")
	{  $order = explode("~",$sort);
	
	$total_rows = $search->attributeSearchCount($dataArray,$groupby);
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	$cars = $search->attributeSearch($dataArray,$order[0],$order[1],$pages->limit);
	
	}
	else if($groupby != "" && $sort == "")
	{ 
	$total_rows = $search->attributeSearchCount($dataArray,$groupby);
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	$cars = $search->attributeSearch($dataArray,$groupby,'ASC',$pages->limit);
	
	}
	else{
	$total_rows = $search->attributeSearchCount($dataArray);
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	$cars = $search->attributeSearch($dataArray,'fullName','ASC',$pages->limit);
	}
}
else{
	$total_rows = $common->numberOfRows("car",'');
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	/*$dataArray = array( "manufacturer" => "64");
	$cars = $search->attributeSearch($dataArray,'fullName','ASC',$pages->limit);*/
	
	$result = $common->customQuery("select car_id from car ".$pages->limit);
	$car = array();
	while($res = mysql_fetch_object($result)){
		$cars[] = $res->car_id;
	}
}




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
}



if(isset($_POST) && isset($_POST["add_to_sel"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>0);
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
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"time"=>$_POST['recall'],"question"=>$_POST['question'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"type"=>0);
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



$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
