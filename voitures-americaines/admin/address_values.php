
<?php

require 'config/database.php';


if($_POST['submit']!='')
{

	
  $address = $_POST['textarea_address'];

 	 $Sql_address_sent_query = mysql_query("UPDATE address_pdf SET address_column = '".$address."' WHERE id=1");

 
	
    $sql_address_check = "SELECT * FROM address_pdf";
	
	$address_check = mysql_query($sql_address_check);
	
	$address_for_pdf = mysql_fetch_array($address_check);
	
	//echo $address_for_pdf['address_column'];die;
	//print_r($address_for_pdf);die;
	
}



?>


	<script type="text/javascript">

   window.location="http://www.sylc-export.com/voitures-americaines/admin/address_pdf.php";

</script> 