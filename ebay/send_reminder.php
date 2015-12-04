<?php
session_start();
include("conf/config.inc.php"); 
$common = new common();
$settingid = $common->CustomQuery("SELECT * FROM `admins` WHERE `id` = '1'");
$setting = mysql_fetch_object($settingid);
$templaeid = $common->CustomQuery("SELECT * FROM `template` where id = '1'");
$template = mysql_fetch_object($templaeid);
$adminemail = $template->email;
$subject = $template->subject;
$message = $template->template;

$currentTimestamp   = getCurrentTimestamp();

if($template->next_date == 'daily'){
	$next = $currentTimestamp + (24*60*60);
}
else{
	$next = $currentTimestamp + (7*24*60*60);
}

$address = $setting->office_address;
$phone = $setting->phone1;

//$contactid = $common->CustomQuery("SELECT * FROM `contact` WHERE  FIND_IN_SET(type,'0,2') group by email");
$contactid = $common->CustomQuery("SELECT * FROM `contact` WHERE type = '0' group by email");
$count = mysql_num_rows($contactid); 
$i =1;

/*while($contact = mysql_fetch_object($contactid)){ 
	pr($contact);
}
exit;
*/
while($contact = mysql_fetch_object($contactid))
{ 
	$name =  $contact->name;
	$toEmail = $contact->email;
	$newResult = $common->CustomQuery("SELECT * FROM `contact` WHERE email ='".$toEmail."'");
	$carlist = '<table>';
	$flage= false;
	while($new = mysql_fetch_object($newResult))
	{
		//echo '<pre>'; 		print_r($new); 		echo '</pre>'; 		//die;
		$type = $new->type;
		$car = $new->car_id;
		$contact_id = $new->id;
		/*if($type == 0){
			$carlist .= '<tr>';
			$temp = $common->getCarWithAttrList($car ,array("fullName","price"));
			if($temp[$car]["fullName"] != ''){
				echo '<hr>'.$contact_id. '<hr>';
				$carlist .= '<td>'.$temp[$car]["fullName"].'</td>';
				$carlist .= '<td> - $'.number_format($temp[$car]["price"], 2).'</td>';
				$carlist .= '</tr>';
				
				$flage = true;
				$currentTimestamp   = getCurrentTimestamp();
				$common->update('contact',array("mail_date"=>$currentTimestamp,'status'=>1),' id='.$contact_id);
			}
		}
		else */ if( $car > 0 && $type == 0)
		{
			$ebay = $common->CustomQuery("Select * from ebay_car where itemId = ".$car);
			if ( mysql_num_rows($ebay) > 0)
			{
				$ebays = mysql_fetch_object($ebay);
				//if(strtotime($ebays->endson) > mktime() && $ebays->title != ''){
				if( $ebays->title != ''){
					$carlist .= '<tr>';
					$carlist .= '<td>'.$ebays->title.' </td>';
					$carlist .= '<td> - $'.number_format($ebays->buyItNowPrice, 2).'</td>';
					$carlist .= '</tr>';
					$flage = true;
					$common->update('contact',array("mail_date"=>$currentTimestamp,'status'=>1),' id='.$contact_id);
				}
			}
		}
	}
	$carlist .= '</table>';
	//echo $carlist; die;
	if( $flage )
	{
		$replaces= array(
		'[CUSTOMER_NAME]' => $name,
		'[CAR_LIST]' =>$carlist,
		'[ADDRESS]' => $address,
		'[TELEPHONE]'=>$phone,
		'[EMAIL_ADDRESS]'=>$adminemail,
		'[TERMS_URL]'=>DEFAULT_URL
		);
		
		$messages = strReplaceAssoc($replaces,$message); 
		
		$headers = "From: " . $adminemail . "\r\n";
		$headers .= "Reply-To: ". $adminemail . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		//echo $messages; die;
		//mail($toEmail,$subject,$messages,$headers);
		sendSmtpMail( $toEmail, $subject, $message );
		
		$common->save('email_log',array("email"=>$toEmail,"content"=>$messages,"sent_date"=>$currentTimestamp,"next_date"=>$next,'status'=>1));
		
		if($i == $count) { 
			$_SESSION['success_msg'] = "Mail Sent Succefully"; 		  
			echo '<script>alert("thanks");window.location.href="'.DEFAULT_ADMIN_URL.'/template/reminder/index.php";</script>'; 
			exit;
		} 
		$i++;
	}
}
