<?php 
session_start();
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();
$all_car = array();

	$count_all_cars = count($_SESSION['unique_id']['save']);
	
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `sort_order`");

if(isset($_POST) && isset($_POST["submit_inq"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"address"=>$_POST['address'],"type"=>0);
	$common_obj->save("contact",$arr);	
	
	$to='4006@dothejob.org';
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

?>
