<?php //session_start(); 

//$_SESSION['name'] = $_POST['name'];

require_once './conf/config.inc.php';
require 'admin/config/database.php';

require_once('recaptchalib.php');
$privatekey = "6Lexq-ASAAAAAGV-fsCT3tKwuRwQdEwnw6LoXDZq";
$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {

	// What happens when the CAPTCHA was entered incorrectly
	?><script language="javascript">location.href= '<?php echo DEFAULT_URL;?>?error=1'</script><?php
	die("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
			"(reCAPTCHA said: " . $resp->error . ")");
	

	
} else {
	





$sel_query="Select * from leads order by id desc";

$rs_sel=mysql_query($sel_query) or die(mysql_error());

/*echo '<pre>';



print_r($_POST);



echo'</pre>';*/

   


$first_name = mysql_real_escape_string($_POST['fname']);
$name = mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);

$car_brand = mysql_real_escape_string($_POST['firstlevel']);
$model = mysql_real_escape_string($_POST['model']);
$year = mysql_real_escape_string($_POST['year']).',';
$service = mysql_real_escape_string($_POST['service']);



$current_time = mysql_real_escape_string($_POST['currenttime_canada']);

$cbrand=@$arr_sel['car_brand'];
$sel_query2="Select car_brand from car_brand WHERE id=".$car_brand; $rs_sel2=mysql_query($sel_query2); 
$car_bname = mysql_fetch_array($rs_sel2); 
$car_brand1= $car_bname['car_brand'].',';


$mod = @$arr_sel['model']; 
$sel_query1="Select model from model WHERE id=".$model; $rs_sel1=mysql_query($sel_query1); 
$mod_value = mysql_fetch_array($rs_sel1); 
$car_model1 = $mod_value['model'].',';
//$Country_export = mysql_real_escape_string($_POST['Country_export']);

//$date = date('M-d Y');

//$date = 'now()';

//echo $date; exit;




$Http_Referer = $_SERVER['HTTP_REFERER'];

$page_name = $_SERVER['HTTP_REFERER'] ;



/*echo '<pre>';

print_r($_SERVER);

echo '</pre>';

 exit;

*/ 



$page_name = substr($page_name, (strripos($page_name,"/"))+1); // 



//echo $page_name; exit;



if($page_name == ''){

$page_name = 'index.html';

}





//$sql="INSERT INTO `leads`(name,first_name,email,phone,car_brand,model,year,service,created_at) VALUES ('". $name ."','". $first_name ."','". $email ."','". $phone ."','". $car_brand ."','". $model ."','". $year ."','". $service ."',now());";
$sql="INSERT INTO `leads`(name,first_name,email,phone,car_brand,model,car_brand1,car_model1,year,service,created_at) VALUES ('". $name ."','". $first_name ."','". $email ."','". $phone ."','". $car_brand ."','". $model ."','". $car_brand1 ."','". $car_model1 ."','". $year ."','". $service ."','". $current_time ."');";



//echo $sql;


$sel_query2="Select * from users WHERE role='admin' and id = '2'";

$rs_sel2=mysql_query($sel_query2) or die(mysql_error());
while($arr_sel2=mysql_fetch_array($rs_sel2))
{

	//$username = $arr_sel2['username'];
	$adminemail = $arr_sel2['email'];
}


$rs_sel=mysql_query($sql) or die(mysql_error());

$lastid = mysql_query('select id from leads order by id DESC limit 0,1');
$lastfetch = mysql_fetch_object($lastid);
$brad = str_replace(",","",$car_brand1);
$mod = str_replace(",","",$car_model1);
$yr = str_replace(",","",$year);
mysql_query("INSERT INTO `lead_details`(lead_id,car_brand,model,created_at,year,destination) VALUES ('$lastfetch->id','$brad','$mod','$current_time','$yr','$service');");

require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
//SMTP MAIL STARTS

try {
	$to_email = $adminemail;//info@sylc-export.com
	//$to_email = '2001@dothejob.org';
	$message = "
				<p>Voici les détails:</p>
				<table>
				<tr>
				<td><strong>Nom</strong>:</td>
				<td>$name $first_name</td>
				</tr>
				<tr>
				<td><strong>Email</strong>:</td>
				<td>$email</td>
				</tr>
				<tr>
				<td><strong>Téléphone</strong>:</td>
				<td>$phone</td>
				</tr>
				<tr>
				<td><strong>Marque</strong>:</td>
				<td>$brad</td>
				</tr>
				<tr>
				<td><strong>Modèle</strong>:</td>
				<td>$mod</td>
				</tr>
				</table><table>
		
		  <tr>
           <td colspan='2'><p><strong>Sylc Corporation<br/>Tracking Departement</strong></p></td>
          </tr>
		 </table>";
	$mail = new PHPMailer(true); //New instance, with exceptions enabled
		
	$body             = $message;
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
		
	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password
		
	//$mail->IsSendmail();  // tell the class to use Sendmail
		
	$mail->AddReplyTo("no-reply@example.com","First Last");
		
	$mail->From       = "info@sylc-export.com";
	$mail->FromName   = "Sylc-Export Update";
		
		
	$mail->AddAddress($to_email);
		
	$mail->Subject  = 'Enquête de voiture reçu';
		
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap
		
	$mail->MsgHTML($body);
		
	$mail->IsHTML(true); // send as HTML
		
	$mail->Send();

	
	//echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
try {
	$to_email = $email;
	//$to_email = '4011@dothejob.org';
	$message = "<p>Merci pour vos Détails:</p>
	<table>
	<tr>
	<td><strong>Nom</strong>:</td>
	<td>$name $first_name</td>
	</tr>
	<tr>
	<td><strong>Email</strong>:</td>
	<td>$email</td>
	</tr>
	<tr>
	<td><strong>Téléphone</strong>:</td>
	<td>$phone</td>
	</tr>
	<tr>
	<td><strong>Marque</strong>:</td>
	<td>$brad</td>
	</tr>
	<tr>
	<td><strong>Modèle</strong>:</td>
	<td>$mod</td>
	</tr>
	</table><table>

	<tr>
	 <td colspan='2'><p><strong>Sylc Corporation<br/>Tracking Departement</strong></p></td>
	</tr>
	</table>";
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = $message;
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password

	//$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo("no-reply@example.com","First Last");

	$mail->From       = "info@sylc-export.com";
	$mail->FromName   = "Sylc-Export Update";


	$mail->AddAddress($to_email);

	$mail->Subject  = 'Enquête de voiture reçu';

	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();

	$custlogerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
	//echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
/*if($rs_sel)



{



	echo 'DONE';



}*/





// send e-mail to ...

			/*$to = '4005@dothejob.org';//$adminEmail;

			// Your subject

			$subject='User Enroll';

			// From

			$headers  = 'MIME-Version: 1.0' . "\r\n";

			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers

			$headers .= 'From: '.$first_name.'<'.$email.'>' . "\r\n";

			$message = 'The person that contacted you is  '.$first_name 

	        .'<br/>	E-mail: '.$email.'<br/>

			Phone Number: '.$phone.'<br/>

			Gender: '.$gender.'<br/>'

			;*/

			/*echo $headers;

			echo $message1; exit;*/

	



//send the email



//$sentmail = mail( $to, $subject, $message, $headers );




   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //																ICONTACT API																				//		
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// icontact username

$user = 'sylccorp';

// application password

$pass = 'sylctmppwd';

// API Key

$key  = '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels';


// Build iContact authentication

$headers = array(

'Accept: text/xml',

'Content-Type: text/xml',

'Api-Version: 2.0',

'Api-AppId:' . $key,

'Api-Username:' . $user,

'Api-Password:' . $pass

);

// get accountID

$ch=curl_init("https://app.icontact.com/icp/a/");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$buf = curl_exec($ch);

curl_close($ch);

$account_id = "";

if (($pos=strpos($buf,"<accountId>"))!==false)

{

$account_id = substr($buf, strlen("<accountId>")+$pos);

if (($pos=strpos($account_id,"<"))!==false)

{

$account_id = substr($account_id, 0, $pos);

}

}

//echo "<br>".$account_id;

// Connect to iContact to retrieve the client folder id

$ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$buf = curl_exec($ch);

curl_close($ch);

// Extract client folder id from response

$client_folder_id = "";

if (($pos=strpos($buf,"<clientFolderId>"))!==false)

{

$client_folder_id = substr($buf, strlen("<clientFolderId>")+$pos);

if (($pos=strpos($client_folder_id,"<"))!==false)

{

$client_folder_id = substr($client_folder_id, 0, $pos);

}

}

//echo "<br>".$client_folder_id;

// Connect to iContact to retrieve the list id

$ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/lists");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$buf = curl_exec($ch);

curl_close($ch);

// Extract client folder id from response

$list_id = "";

if (($pos=strpos($buf,"<listId>"))!==false)

{

$list_id = substr($buf, strlen("<listId>")+$pos);

if (($pos=strpos($list_id,"<"))!==false)

{

$list_id = substr($list_id, 0, $pos);

}

}

$list_id = 14886;

$last_name = $name;

$find_car_brand = mysql_fetch_row(mysql_query("SELECT car_brand FROM car_brand WHERE id=$car_brand"));

$find_car_model = mysql_fetch_row(mysql_query("SELECT model FROM model WHERE id=$model"));

$data = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n<contacts>\r\n";

$data.= "<contact>\r\n";

$data.= "<email>$email</email>\r\n";

$data.= "<firstName>$first_name</firstName>\r\n";

$data.= "<lastName>$last_name</lastName>\r\n";

$data.= "<phone>$phone</phone>\r\n";

$data.= "<carbrand>$find_car_brand[0]</carbrand>\r\n";

$data.= "<model>$find_car_model[0]</model>\r\n";

$data.= "<year>$year</year>\r\n";

$data.= "<service>$service</service>\r\n";

$data.= "</contact>\r\n</contacts>";

// Add contact

$ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/contacts/");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$buf = curl_exec($ch);

curl_close($ch);

$contact_id = "";

if (($pos=strpos($buf,"<contactId>"))!==false)

{

$contact_id = substr($buf, $pos+strlen("<contactId>"));

if (($pos=strpos($contact_id,"<"))!==false)

{

$contact_id = substr($contact_id,0,$pos);

}

}
//echo $contact_id;
// Build contact record

$detail = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n";

$detail.= "<subscriptions>\r\n";

$detail.= "<subscription>\r\n";

$detail.= "<contactId>$contact_id</contactId>\r\n";

$detail.= "<listId>$list_id</listId>\r\n";

$detail.= "<status>normal</status>\r\n";

$detail.= "</subscription>\r\n</subscriptions>";

//add subscription

$ch=curl_init("https://app.icontact.com/icp/a/$account_id/c/$client_folder_id/subscriptions");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POSTFIELDS, $detail);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$buf = curl_exec($ch);

curl_close($ch);

$subscription_id = "";

if (($pos=strpos($buf,"<subscriptionId>"))!==false)

{

$subscription_id = substr($buf, $pos+strlen("<subscriptionId>"));

if (($pos=strpos($subscription_id,"<"))!==false)

{

$subscription_id = substr($subscription_id,0,$pos);

}

}

//echo $subscription_id;

// If we have a subscription id OR this subscription already existed, we're good

$result = !empty($subscription_id) || strpos($buf,"could not be updated")!==false;

// Set result string

$result_str = ($result ? "Updated subscription $subscription_id" : $buf);
//echo $result_str;
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //																ICONTACT API END																			//		
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($rs_sel){ ?>
<script language="javascript">location.href='thankyou.html'</script>	

<?php } ?>



<?php }?>