<?php require_once '../conf/config.inc.php'; ?>
           
<?php 

if(!empty($_POST['user_id'])){

$username = mysql_real_escape_string($_POST['username1']);
$password = mysql_real_escape_string($_POST['password1']);
$email = mysql_real_escape_string($_POST['emailid1']);
$role=mysql_real_escape_string($_POST['role']);
$accesslist = implode(',', $_POST['check']);
$id = $_POST['user_id'];



$dataArr  =  array('id'=>$id,'username'=>$username,'password'=>md5($password),'email'=>$email, 'role'=>$role, 'access'=>$accesslist);

                 $update_Article=$objCommon->update("users",$dataArr,"id ='$id'");
				//$update_Article=$objCommon->save("users",$dataArr);

}else{
	
$username = mysql_real_escape_string($_POST['username1']);
$password = mysql_real_escape_string($_POST['password1']);
$email = mysql_real_escape_string($_POST['emailid1']);
$role=mysql_real_escape_string($_POST['role']);
$accesslist = implode(',', $_POST['check']);
$id = $_POST['user_id'];


$dataArr  =  array('username'=>$username,'password'=>md5($password),'email'=>$email, 'role'=>$role, 'access'=>$accesslist);

$update_Article=$objCommon->save("users",$dataArr);

}?>


<?php echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/admin_user_listing.php";</script>';?>
