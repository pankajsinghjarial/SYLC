  <?php 
  
  require 'config/database.php';
  extract($_POST);
  
   $id= $_POST['idformail'];
   $nameforpopup= $_POST['fname_pop'];
   $lastnameforpopup= $_POST['lname_pop'];
   $addressforpopup = $_POST['add_pop'];
   $cityforpopup = $_POST['city_pop'];
   $postcodeforpopup = $_POST['postcode_pop'];
   $phonepop = $_POST['phone_pop'];
   $emailforpopup = $_POST['email_pop'];

 
?>
  



<?php 

		
 $Sql_extra_entries = mysql_query("UPDATE leads SET name = '".$nameforpopup."',
		              								first_name = '".$lastnameforpopup."',
                     								address = '".$addressforpopup."',
                    			 					city = '".$cityforpopup."',
                     								postcode = '".$postcodeforpopup."',
                     								phone = '".$phonepop."',
		             								email = '".$emailforpopup."'
		
		 											WHERE id = '".$id."'");
?>


<script type="text/javascript">
<!--

alert("Data successfully saved.");

//-->
</script>

<?php 
/*
header("location:customer_info.php?id=$id");
*/
?>
<?php 
echo "<script>window.location='http://www.sylc-export.com/voitures-americaines/admin/customer_info.php?id=".$id."'</script>";die;
   ?>