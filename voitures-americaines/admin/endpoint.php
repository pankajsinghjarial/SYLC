<?php

require 'config/database.php';

if(!empty($_POST)) {

   // User information
   $first_name = mysql_real_escape_string($_POST['first_name']);
   $last_name  = mysql_real_escape_string($_POST['last_name']);
   $address    = mysql_real_escape_string($_POST['address']);
   $city       = mysql_real_escape_string($_POST['city']);
   $state      = mysql_real_escape_string($_POST['state']);
   $zip        = mysql_real_escape_string($_POST['zip_code']);
   $phone      = mysql_real_escape_string($_POST['phone']);
   $email      = mysql_real_escape_string($_POST['email']);
   
   // Insert?
   $user = sprintf("INSERT INTO leads (first_name, last_name, address, city, state, zip, phone, email) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $first_name, $last_name, $address, $city, $state, $zip, $phone, $email);
   
   if (mysql_query($user)) {
      mail($email, "Goldster: Thank You", "Thank you
Thank you for choosing Goldster - congratulations on taking the first step!

Your request is being processed and you can expect your Gold Pack to arrive within 3 to 5 business days. Note: Make sure to be on the lookout for the large Goldster envelope. It contains your FREE postage paid and insured return mailer!
 
Step 1: Complete
Step 2: Send it to us: Once you receive our pre-paid return envelope, simply place your unwanted gold inside and mail it.
Step 3: Get your cash: Within a few days a check will arrive to your mailbox.. it's simple, secure and fast!");
   } else {
      echo "NO";
   }
} else {
   echo "OK";
}