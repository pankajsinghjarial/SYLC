  <?php 
  
  require 'config/database.php';
  extract($_POST);
  
  $id= $_POST['idformail'];
   $nameforpopup= $_POST['fname_pop'];
   $lastnameforpopup= $_POST['lname_pop'];
   $addressforpopup = $_POST['add_pop'];
   $cityforpopup = $_POST['city_pop'];
   $country_pop = $_POST['country_pop'];
   $postcodeforpopup = $_POST['postcode_pop'];
  
   $admin_date_pop = $_POST['admin_date_pop'];
   $proforma_pop = $_POST['proforma_pop'];
   //$destination_pop = $_POST['destination_pop'];


  
  // Add car
  
  $quantity_pop = $_POST['quantity_pop'];
  foreach ($quantity_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $quantity_pop1 =array_filter($quantity_pop);
  $car_quantity = implode(",", $quantity_pop1);
  
  $brand_pop = $_POST['brand_pop'];
  foreach ($brand_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $brand_pop1 =array_filter($brand_pop);
  $car_brand1 = implode(",", $brand_pop1);
  
  $model_pop = $_POST['model_pop'];
  foreach ($model_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $model_pop1 =array_filter($model_pop);
  $car_model1 = implode(",", $model_pop1);
  
  $year1 = $_POST['year_pop'];
  foreach ($year1 as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $year2 =array_filter($year1);
  $car_year = implode(",", $year2);
  
  
  $cardesc_pop = $_POST['cardesc_pop'];
  foreach ($cardesc_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $cardesc_pop1 =array_filter($cardesc_pop);
  $car_description = implode(",", $cardesc_pop1);
  
  
  
  $serial_pop = $_POST['serial_pop'];
  foreach ($serial_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $serial_pop1 =array_filter($serial_pop);
  $car_serial = implode(",", $serial_pop1);
  
  
  
  $color_pop = $_POST['color_pop'];
  foreach ($color_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $color_pop1 =array_filter($color_pop);
  $car_color = implode(",", $color_pop1);
  
  
  
  $price_pop = $_POST['price_pop'];
  foreach ($price_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $price_pop1 =array_filter($price_pop);
  $car_price = implode(",", $price_pop1);
  
  
  
  $transport_pop = $_POST['transport_pop'];
  foreach ($transport_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $transport_pop1 =array_filter($transport_pop);
  $transport = implode(",", $transport_pop1);
  
  
  
  $shipping_pop = $_POST['shipping_pop'];
  foreach ($shipping_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $shipping_pop1 =array_filter($shipping_pop);
  $shipping = implode(",", $shipping_pop1);
  
  
  
  $commission_pop = $_POST['commission_pop'];
  foreach ($commission_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  $commission_pop1 =array_filter($commission_pop);
  $commission = implode(",", $commission_pop1);
  
  
   $additionalchanges_pop = $_POST['additionalchanges_pop'];
  foreach ($additionalchanges_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  //$additionalchanges_pop1 =array_filter($additionalchanges_pop); 
  $car_additional_changes = implode(",", $additionalchanges_pop);
  
  
  
  $additionalcharges_pop = $_POST['additionalcharges_pop'];
  foreach ($additionalcharges_pop as &$link)
  {
  	if ($link == '')
  	{unset($link);}
  }
  //$additionalcharges_pop1 =array_filter($additionalcharges_pop); 
  $car_additional_charges = implode(",", $additionalcharges_pop);
  
  
  
  // Fees(fedex,doc fees ,bank fees)
  
  $fees_description = $_POST['fees_desc'];
  $fees_amount = $_POST['fees_amount'];
  
  
  // Additional Fees
  
  $additional_fees_description = $_POST['add_fees_desc'];
  $additional_fees_amount = $_POST['add_fees_amount'];
  
  //$current_time = $_POST['currenttime_canada'];
  $emailforpopup = $_POST['email_pop'];
  

  
if($hiddenpop=='hiddenformvalue')
{

	
$to = $emailforpopup;
//$to = '4009@dothejob.org';

$subject='find your details';

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= 'From: '.$nameforpopup.' '.$lastnameforpopup.'<'.$emailforpopup.'>' . "\r\n";


$message = 'Please Click on the given Url:<br/><br/>http://www.sylc-export.com/voitures-americaines/pop_form_details.php?id='.$id.'
		
		
		<br/><br/><br/>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
  <tr>
    <td valign="top" height="20"><span style="font-size:16px; color:#000000;"><strong>SYLC Corporation</strong></span></td>
  </tr>
  <tr>
    <td valign="top" height="30"><span style="font-size:14px; color:#c42026;">Yoann Attia</span><br />
</td>
  </tr>
</table>
		
		
	<table width="704" border="0" bgcolor="#f2f2f2"; cellspacing="0" cellpadding="0" style="table-layout:fixed;border:1px solid #dadada">
    <tr>
      <td width="252" valign="top">
          <table width="252" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/france.png" width="16" height="16" /></td>
              <td width="154" height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;">01.76.63.32.16</td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/us.png" width="16" height="11" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;">Office: 305-520-9761 </td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/us.png" width="16" height="11" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;">Cell: 305 332 9761 </td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/us.png" width="16" height="11" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;">Fax: 305 647 6533</td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/globe.png" width="16" height="16" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;"><a href="http://www.sylc-export.com/" style="text-decoration:none; font-size:12px; color:#004997; font-family:Arial, Helvetica, sans-serif;" target="_blank">www.sylc-export.com</a></td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/facebook.png" width="16" height="16" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;"><a href="https://www.facebook.com/Sylccorporation" style="text-decoration:none; font-size:12px; color:#004997; font-family:Arial, Helvetica, sans-serif;" target="_blank">Visitez notre page facebook</a></td>
            </tr>
            <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
            <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/youtube.png" width="16" height="16" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;"><a href="http://www.youtube.com/user/yoathome?feature=results_main" style="text-decoration:none; font-size:12px; color:#004997; font-family:Arial, Helvetica, sans-serif;" target="_blank">Visitez notre Youtube Channel</a></td>
            </tr>
		     <tr>
              <td colspan="3" height="3"  align="left" style="line-height:3px"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/line.jpg" width="225" height="2" /></td>
            </tr>
		    <tr>
              <td width="16" valign="middle" align="left" >&nbsp;</td>
              <td width="26" height="24" valign="middle" align="left" ><img src="http://www.sylc-export.com/voitures-americaines/admin/images/blog-icon22.png" width="16" height="16" /></td>
              <td height="24" valign="middle" style="font-size:12px; color:#333333; font-family:Arial, Helvetica, sans-serif;"><a href="http://www.sylc-export.com/blog" style="text-decoration:none; font-size:12px; color:#004997; font-family:Arial, Helvetica, sans-serif;" target="_blank">Visitez notre Blog</a></td>
            </tr>
          </table>
     </td>
      <td width="475" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/admin/images/logo.jpg" alt="logo" title="logo" width="475" height="204" /></td>
    </tr>
  </table>'

;
		
			
$sentmail = mail( $to, $subject, $message, $headers );

?>

<script type="text/javascript">
<!--

alert("Congrates..!! Your form is submitted");

//-->
</script>


<?php 

$Sql_mail_sent_query = mysql_query("UPDATE leads SET mail_sent = 'y' WHERE id = '".$id."'");
$Sql_address = mysql_query("UPDATE leads SET address = '".$addressforpopup."' WHERE id = '".$id."'");
$Sql_city = mysql_query("UPDATE leads SET city = '".$cityforpopup."' WHERE id = '".$id."'");
$Sql_postcode = mysql_query("UPDATE leads SET postcode = '".$postcodeforpopup."' WHERE id = '".$id."'");

$Sql_extra_entries = mysql_query("UPDATE leads SET country = '".$country_pop."',
		date_admin = '".$admin_date_pop."',
		proforma = '".$proforma_pop."',
		car_quantity = '".$car_quantity."',
		car_brand1 = '".$car_brand1."',
		car_model1 = '".$car_model1."',
	    year = '".$car_year."',
		car_description = '".$car_description."',
		car_serial = '".$car_serial."',
		car_color = '".$car_color."',
		car_price = '".$car_price."',
		transport = '".$transport."',
		shipping = '".$shipping."',
	    commission = '".$commission."',
		car_additional_changes = '".$car_additional_changes."',
		car_additional_charges = '".$car_additional_charges."',

		fees_description = '".$fees_description."',
		fees_amount = '".$fees_amount."',

		additional_fees_description = '".$additional_fees_description."',
		additional_fees_amount = '".$additional_fees_amount."'
		
		 WHERE id = '".$id."'");

}

?>
<script type="text/javascript">

   window.location="http://www.sylc-export.com/voitures-americaines/admin/user_info.php";

</script>  