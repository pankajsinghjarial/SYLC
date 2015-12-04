<?php

// icontact username

$user = 'Sylccorp';

// application password

$pass = 'asdf1234';

// API Key

$key    = '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels';

// dummy details for icontact

//$email = "4001@dothejob.org";

//$firstname = "michael";

//$lastname = "abitbol";

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

echo "<br>".$account_id;

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

echo "<br>".$client_folder_id;

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

// Build contact record
$email = 'test@dothejob.org';
$first_name = 'ktest1';
$last_name = 'ktest2';
$phone = '1212121212';


$data = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n<contacts>\r\n";

$data.= "<contact>\r\n";

$data.= "<email>$email</email>\r\n";

$data.= "<firstName>$first_name</firstName>\r\n";

$data.= "<lastName>$last_name</lastName>\r\n";

$data.= "<phone>$phone</phone>\r\n";

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
echo $contact_id;
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

echo $result_str;

?>