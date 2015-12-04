<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Sylc-Processing</title>
</head>
<body>
<?php
extract($_POST);
//echo "<pre>";print_r($_POST);
if(isset($submit) && $submit==''){ 
	$content = '<table width="75%" border="0" cellpadding="2" cellspacing="0">
			
			
			<tr>
			<td>Marque:</td>
			<td>'.$firstlevel.'</td>
			</tr>
			<tr>
			<td>Modele:</td>
			<td>'.$secondlevel.'</td>
			</tr>
			<tr>
			<td>Achat:</td>
			<td>'.$thirdlevel.'</td>
			</tr>			
			<tr>
			<td>Contact:</td>
			<td>'.$contact.'</td>
			</tr>
			<tr>
			<td>Telephone:</td>
			<td>'.$phone.'</td>
			</tr>
			<tr>
			<td>Email:</td>
			<td>'.$email.'</td>
			</tr>
			</table>';
			$subject = "Cars Lead";
				
			
			//$to = "yoann.attia@sylc-export.com";
			$to="yoann.attia@sylc-export.com";
			$headers  =  "From:".$contact."\r\n".'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//echo $content;exit;
			if(mail($to, $subject, $content, $headers) ){
			?>
<?php

// icontact username

$user = 'Sylccorp';

// application password

$pass = 'sylcnew!@#';

// API Key

$key    = '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels';

// dummy details for icontact



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

$list_id = 47291;

// Build contact record

$data = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n<contacts>\r\n";

$data.= "<contact>\r\n";

$data.= "<email>$email</email>\r\n";

$data.= "<firstName>$contact</firstName>\r\n";

$data.= "<phone>$phone</phone>\r\n";

$data.= "<carbrand>$firstlevel</carbrand>\r\n";

$data.= "<model>$secondlevel</model>\r\n";

$data.= "<service>$thirdlevel</service>\r\n";

$data.= "<status>normal</status>\r\n";




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




			
$to = $email;
$subject = 'Merci pour soumettre le formulaire';
$message = 'Bonjour <br/> Merci pour soumettre le formulaire <br/> Merci';
			
$from = 'yoann.attia@sylc-export.com';
$headers .= "From:" . $from . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to,$subject,$message,$headers);





				
					echo '<script type="text/javascript">
					
					window.location.href = "http://www.sylc-export.com/voiture-americaine-occasion-ancienne/neuf?respons=thanks2";
					</script>
					';
				
			 

}
}
?>
</body></html>
