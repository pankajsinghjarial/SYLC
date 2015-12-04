<?php
// Include required library files.
require_once('includes/config.php');
require_once('includes/paypal.class.php');

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
					'ipaddress' => '192.168.100.51', 							// Required.  IP address of the payer's browser.
					'returnfmfdetails' => '' 					// Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
				);
				
$CCDetails = array(
					'creditcardtype' => 'Amex', 					// Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
					'acct' => '371558013221013', 								// Required.  Credit card number.  No spaces or punctuation.  
					'expdate' => '042016', 							// Required.  Credit card expiration date.  Format is MMYYYY
					'cvv2' => '6273', 								// Requirements determined by your PayPal account settings.  Security digits for credit card.
					'startdate' => '', 							// Month and year that Maestro or Solo card was issued.  MMYYYY
					'issuenumber' => ''							// Issue number of Maestro or Solo card.  Two numeric digits max.
				);
				
$PayerInfo = array(
					'email' => '4009@dothejob.org', 								// Email address of payer.
					'firstname' => 'Michael', 							// Required.  Payer's first name.
					'lastname' => 'Abitbol' 							// Required.  Payer's last name.
				);
				
$BillingAddress = array(
						'street' => '150 North Radnor Chester Road Suite F-200', 						// Required.  First street address.
						'street2' => '', 						// Second street address.
						'city' => 'Radnor', 							// Required.  Name of City.
						'state' => 'Pennsylvania', 							// Required. Name of State or Province.
						'countrycode' => 'US', 					// Required.  Country code.
						'zip' => '19087', 							// Required.  Postal code of payer.
						'phonenum' => '' 						// Phone Number of payer.  20 char max.
					);
					
$ShippingAddress = array(
						'shiptoname' => 'Michael', 					// Required if shipping is included.  Person's name associated with this address.  32 char max.
						'shiptostreet' => '150 North Radnor Chester Road Suite F-200', 					// Required if shipping is included.  First street address.  100 char max.
						'shiptostreet2' => '', 					// Second street address.  100 char max.
						'shiptocity' => 'Radnor', 					// Required if shipping is included.  Name of city.  40 char max.
						'shiptostate' => 'Pennsylvania', 					// Required if shipping is included.  Name of state or province.  40 char max.
						'shiptozip' => '19087', 						// Required if shipping is included.  Postal code of shipping address.  20 char max.
						'shiptocountry' => 'US', 					// Required if shipping is included.  Country code of shipping address.  2 char max.
						'shiptophonenum' => ''					// Phone number for shipping address.  20 char max.
						);
					
$PaymentDetails = array(
						'amt' => '1', 							// Required.  Total amount of order, including shipping, handling, and tax.  
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

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->DoDirectPayment($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>