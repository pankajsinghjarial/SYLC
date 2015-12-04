  <?php 
 
  require_once '../conf/config.inc.php';
  
  extract($_POST);
 
   $lead_admin_id;
  $notesfield;
  $current_admin = $_SESSION['gold_admin_user'];
  //echo $created_at = "31may";
    
 
if($notesfield != ''){
if($hiddenfield=='adminnotesfilled')
{
	 $sql="INSERT INTO `admin_notes`(lead_id,note,admin_name,created_at) VALUES ('". $lead_admin_id ."','". $notesfield ."','". $current_admin ."',now());";
//$sql="INSERT INTO `leads`(name,first_name,email,phone,created_at) VALUES ('". $lastnameforpopup ."','". $nameforpopup ."','". $emailforpopup ."','". $phonepop ."',now());";
$rs_sel5=mysql_query($sql) or die(mysql_error());
//$id = mysql_insert_id();
}
$custerrorMsg = "Note Added Successfully";
echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$lead_admin_id.'&notemsg='.$custerrorMsg.'";</script>';
}else{
	
	$custerrorMsg = "Please add any note";
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$lead_admin_id.'&noteerrmsg='.$custerrorMsg.'";</script>';	
	
}


?>