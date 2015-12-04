<?php session_start();
// Include required library files.
require_once('paypal/config_paypal.php');
require_once('paypal/paypal.class.php');
require_once ('conf/config.inc.php');
require 'admin/config/database.php';

extract($_POST);
$_SESSION['lead_detail'] = $id;
$_SESSION['billing_fname'] = $billing_fname;
$_SESSION['billing_lname'] = $billing_lname;
$_SESSION['billing_email'] = $billing_email;
$_SESSION['billing_phone'] = $billing_phone;
$_SESSION['billing_zipcode'] = $billing_zipcode;
$_SESSION['billing_city'] = $billing_city;
$_SESSION['billing_state'] = $billing_state;
$_SESSION['billing_address'] = $billing_address;
$_SESSION['card_type'] = $card_type;
$_SESSION['card_number'] = $card_number;
$_SESSION['card_security_number'] = $card_security_number;
$_SESSION['card_expiry_month'] = $card_expiry_month;
$_SESSION['card_expiry_year'] = $card_expiry_year;

/*
echo "<br/>".$billing_fname;
echo "<br/>".$billing_lname;
echo "<br/>".$billing_email;
echo "<br/>".$billing_phone;
echo "<br/>".$billing_address;
echo "<br/>".$billing_city;
echo "<br/>".$billing_state;
echo "<br/>".$billing_zipcode;


echo "<br/>".$card_type;
echo "<br/>".$card_number;
echo "<br/>".$card_security_number;
echo "<br/>".$card_expiry_date = $card_expiry_month.$card_expiry_year;

echo "<br/>".$total_amount;
echo "<br/>".$ip_address = $_SERVER['REMOTE_ADDR'];
*/

$ip_address = $_SERVER['REMOTE_ADDR'];
$card_expiry_date = $card_expiry_month.$card_expiry_year;
// Create PayPal object.
$PayPalConfig = array(
					'Sandbox' => $sandbox,
					'APIUsername' => $api_username,
					'APIPassword' => $api_password,
					'APISignature' => $api_signature
					);

$PayPal = new PayPal($PayPalConfig);

// Prepare request arrays
$DPFields = array(
					'paymentaction' => '', 						// How you want to obtain payment.  Authorization indidicates the payment is a basic auth subject to settlement with Auth & Capture.  Sale indicates that this is a final sale for which you are requesting payment.  Default is Sale.
					'ipaddress' => $ip_address, 							// Required.  IP address of the payer's browser.
					'returnfmfdetails' => '' 					// Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
				);
				
$CCDetails = array(
					'creditcardtype' => $card_type, 					// Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
					'acct' => $card_number, 								// Required.  Credit card number.  No spaces or punctuation.  
					'expdate' => $card_expiry_date, 							// Required.  Credit card expiration date.  Format is MMYYYY
					'cvv2' => $card_security_number, 								// Requirements determined by your PayPal account settings.  Security digits for credit card.
					'startdate' => '', 							// Month and year that Maestro or Solo card was issued.  MMYYYY
					'issuenumber' => ''							// Issue number of Maestro or Solo card.  Two numeric digits max.
				);
				
$PayerInfo = array(
					'email' => $billing_email, 								// Email address of payer.
					'firstname' => $billing_fname, 							// Required.  Payer's first name.
					'lastname' => $billing_lname 							// Required.  Payer's last name.
				);
				
$BillingAddress = array(
						'street' => $billing_address, 						// Required.  First street address.
						'street2' => '', 						// Second street address.
						'city' => $billing_city, 							// Required.  Name of City.
						'state' => $billing_state, 							// Required. Name of State or Province.
						'countrycode' => 'US', 					// Required.  Country code.
						'zip' => $billing_zipcode, 							// Required.  Postal code of payer.
						'phonenum' => $billing_phone 						// Phone Number of payer.  20 char max.
					);	

$ShippingAddress = array(
		'shiptoname' => $billing_fname, 					// Required if shipping is included.  Person's name associated with this address.  32 char max.
		'shiptostreet' => $billing_address, 					// Required if shipping is included.  First street address.  100 char max.
		'shiptostreet2' => '', 					// Second street address.  100 char max.
		'shiptocity' => $billing_city, 					// Required if shipping is included.  Name of city.  40 char max.
		'shiptostate' => $billing_state, 					// Required if shipping is included.  Name of state or province.  40 char max.
		'shiptozip' => $billing_zipcode, 						// Required if shipping is included.  Postal code of shipping address.  20 char max.
		'shiptocountry' => 'US', 					// Required if shipping is included.  Country code of shipping address.  2 char max.
		'shiptophonenum' => $billing_phone					// Phone number for shipping address.  20 char max.
);
					
$PaymentDetails = array(
		                'amt' => $total_amount,  							// Required.  Total amount of order, including shipping, handling, and tax.  
						'currencycode' => 'USD', 					// Required.  Three-letter currency code.  Default is USD.
						'itemamt' => '', 						// Required if you include itemized cart details. (L_AMTn, etc.)  Subtotal of items not including S&H, or tax.
						'shippingamt' => '', 					// Total shipping costs for the order.  If you specify shippingamt, you must also specify itemamt.
						'insuranceamt' => '', 					// Total shipping insurance costs for this order.  
						'shipdiscamt' => '', 					// Shipping discount for the order, specified as a negative number.
						'handlingamt' => '', 					// Total handling costs for the order.  If you specify handlingamt, you must also specify itemamt.
						'taxamt' => '', 						// Required if you specify itemized cart tax details. Sum of tax for all items on the order.  Total sales tax. 
						'desc' => '', 							// Description of the order the customer is purchasing.  127 char max.
						'custom' => '', 						// Free-form field for your own use.  256 char max.
						'invnum' => '', 						// Your own invoice or tracking number
						'notifyurl' => '', 						// URL for receiving Instant Payment Notifications.  This overrides what your profile is set to use.
						'recurring' => ''						// Flag to indicate a recurring transaction.  Value should be Y for recurring, or anything other than Y if it's not recurring.  To pass Y here, you must have an established billing agreement with the buyer.
					);

// For order items you populate a nested array with multiple $Item arrays.  Normally you'll be looping through cart items to populate the $Item 
// array and then push it into the $OrderItems array at the end of each loop for an entire collection of all items in $OrderItems.

$OrderItems = array();		
	
$Item	 = array(
						'l_name' => '', 						// Item Name.  127 char max.
						'l_desc' => '', 						// Item description.  127 char max.
						'l_amt' => '', 							// Cost of individual item.
						'l_number' => '', 						// Item Number.  127 char max.
						'l_qty' => '', 							// Item quantity.  Must be any positive integer.  
						'l_taxamt' => '', 						// Item's sales tax amount.
						'l_ebayitemnumber' => '', 				// eBay auction number of item.
						'l_ebayitemauctiontxnid' => '', 		// eBay transaction ID of purchased item.
						'l_ebayitemorderid' => '' 				// eBay order ID for the item.
				);

array_push($OrderItems, $Item);

$Secure3D = array(
				  'authstatus3d' => '', 
				  'mpivendor3ds' => '', 
				  'cavv' => '', 
				  'eci3ds' => '', 
				  'xid' => ''
				  );
				  
$PayPalRequestData = array(
						   'DPFields' => $DPFields, 
						   'CCDetails' => $CCDetails, 
						   'PayerInfo' => $PayerInfo, 
						   'BillingAddress' => $BillingAddress, 
						   'ShippingAddress' => $ShippingAddress, 
						   'PaymentDetails' => $PaymentDetails, 
						   'OrderItems' => $OrderItems
						   );
						   //print_r($PayPalRequestData); 

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->DoDirectPayment($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
//echo '<pre />';
//print_r($PayPalResult);


$Result = $PayPalResult['ACK'];

if($Result == 'Failure' ){
	$msg = $PayPalResult['L_LONGMESSAGE0'];	
	
	
	 echo '<script>location.href="'.DEFAULT_URL.'/upselldetailfetch_code.php?lead_detail='.$id.'&msg='.$msg.'";</script>';
	 
	
}else{
	
	$sel_query2="Select * from users WHERE role='admin' and id = '2'";
	
	$rs_sel2=mysql_query($sel_query2) or die(mysql_error());
	while($arr_sel2=mysql_fetch_array($rs_sel2))
	{
	
		//$username = $arr_sel2['username'];
		$adminemail = $arr_sel2['email'];
	}
	
	require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
	//SMTP MAIL STARTS
	
	try {
		$to_email = $adminemail;
		//$to_email = '4011@dothejob.org';
		//$to_email = 'seobranddevelopers@gmail.com';
		$message = "
		<p>Here are the details for the upsells purchased:</p>
		<table>
		<tr>
		<td><strong>Name</strong>:</td>
		<td>$billing_fname $billing_lname</td>
		</tr>
		<tr>
		<td><strong>Email</strong>:</td>
		<td>$billing_email</td>
		</tr>
		<tr>
		<td><strong>Phone</strong>:</td>
		<td>$billing_phone</td>
		</tr>
		<tr>
		<td><strong>Price Paid</strong>:</td>
		<td>$total_amount</td>
		</tr>
		<tr>
		<td><strong>Address</strong>:</td>
		<td>$billing_address</td>
		</tr>
		<tr>
		<td><strong>Upsells Purchased</strong>:</td>
		<td>";foreach($_SESSION['test'] as $key=>$value)
		{
		$newtest = 	explode('~',$value);
			$upArr[] = $newtest[1];?>
	                    <?php }
	                    $message .= implode(',',$upArr);
	       $message .= " </td>
			</tr>
			</table><table>
		
			<tr>
			<td colspan='2'><center><p >Thank you again, <strong>SYL-Corporation</strong></p></center></td>
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
			$mail->FromName   = "Administrator";
		
		
				$mail->AddAddress($to_email);
		
				$mail->Subject  = 'Purchase';
		
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
			$to_email = $billing_email;
			
			$message = "
			<p>Here are the details for the upsells purchased:</p>
			<table>
			<tr>
			<td><strong>Name</strong>:</td>
			<td>$billing_fname $billing_lname</td>
			</tr>
			<tr>
			<td><strong>Email</strong>:</td>
			<td>$billing_email</td>
			</tr>
			<tr>
			<td><strong>Phone</strong>:</td>
			<td>$billing_phone</td>
			</tr>
			<tr>
			<td><strong>Price Paid</strong>:</td>
			<td>$total_amount</td>
			</tr>
			<tr>
			<td><strong>Address</strong>:</td>
			<td>$billing_address</td>
			</tr>
			<tr>
		<td><strong>Upsells Purchased</strong>:</td>
		<td>";foreach($_SESSION['test'] as $key=>$value)
		{
		$newtest = 	explode('~',$value);
			$upArr1[] = $newtest[1];?>
	                    <?php }
	                    $message .= implode(',',$upArr1);
	       $message .= " </td>
			</tr>
			</table><table>
		
			<tr>
			</table><table>
		
			<tr>
			<td colspan='2'><center><p >Thank you again, <strong>SYL-Corporation</strong></p></center></td>
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
				$mail->FromName   = "Administrator";
		
		
				$mail->AddAddress($to_email);
		
				$mail->Subject  = 'Purchase';
		
				//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$mail->WordWrap   = 80; // set word wrap
		
			$mail->MsgHTML($body);
		
			$mail->IsHTML(true); // send as HTML
		
			$mail->Send();
		
		
			//echo 'Message has been sent.';
		} catch (phpmailerException $e) {
		echo $e->errorMessage();
		}

	unset($_SESSION['test']);
	unset($_SESSION['billing_fname']);
	unset($_SESSION['billing_lname']);
	unset($_SESSION['billing_email']);
	unset($_SESSION['billing_phone']);
	unset($_SESSION['billing_zipcode']);
	unset($_SESSION['billing_city']);
	unset($_SESSION['billing_state']);
	unset($_SESSION['billing_address']);
	unset($_SESSION['card_type']);
	unset($_SESSION['card_number']);
	unset($_SESSION['card_security_number']);
	unset($_SESSION['card_expiry_month']);
	unset($_SESSION['card_expiry_year']);
	
	echo '<script>location.href="'.DEFAULT_URL.'/paypalthankyou.php?=";</script>';
}
?>