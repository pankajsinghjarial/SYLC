<?php require_once '../conf/config.inc.php'; ?>
<?php /*  
extract($_POST);
echo $username1;
*/
?>
<?php extract($_POST);
$obj = new validation();
?>
<?php $custlogerror='';
		$obj->add_fields($username1, 'req', 'Please Enter Username');
		$obj->add_fields($username1, 'min=6', 'Username must be 6 characters long');
		if($id==''){
		$obj->add_fields($password1, 'req', 'Please Enter Password');
		$obj->add_fields($password1, 'min=6', 'Password must be 6 characters long');
		$obj->add_fields($reenterpassword, 'req', 'Please Re-Enter Password');
		}
		if($id!='' && $password1!=''){
			$obj->add_fields($password1, 'req', 'Please Enter Password');
			$obj->add_fields($password1, 'min=6', 'Password must be 6 characters long');
			$obj->add_fields($reenterpassword, 'req', 'Please Re-Enter Password');
		}
		
		$obj->add_fields($emailid1, 'req', 'Please Enter Email');
		$obj->add_fields($emailid1, 'email', 'Please Enter a Valid Email');
		//$obj->add_fields($address, 'req', 'Please Enter Address');
		$custlogerror = $obj->validate();
		
		if($id==''){
		if($password1 != $reenterpassword ){
			
			$custlogerror.= "Password Does not match";
			
		}}
		
		if($id!='' && $password1!=''){
			if($password1 != $reenterpassword ){
					
				$custlogerror.= "Password Does not match";
					
			}}
		
		
		if(isset($id) && $id != '') {
			$loginInfocheck = $objCommon->read('users',"id != $id and username = '$username1'");
			if(mysql_num_rows($loginInfocheck) > 0) {
				$custlogerror = "Username Already Taken.";
			}
		}else{
		$loginInfocheck = $objCommon->read('users',"username = '$username1'");
			if(mysql_num_rows($loginInfocheck) > 0) {
				$custlogerror = "Username Already Taken.";
			}	
		}
		if($custlogerror){
			$custlogerrorMsg=trim(str_replace("<br>","\n",$custlogerror));
			$return = array('error' => 1, 'message' =>$custlogerrorMsg);
			die(json_encode($return));
				
		}else {
			
	
			$username = mysql_real_escape_string($_POST['username1']);
			$password = mysql_real_escape_string($_POST['password1']);
			$email = mysql_real_escape_string($_POST['emailid1']);
			$role=mysql_real_escape_string($_POST['role']);
			$accesslist = implode(',', $_POST['check']);
			$id = $_POST['id'];
				
if($id==''){			
$dataArr  =  array('username'=>$username,'password'=>md5($password),'email'=>$email, 'role'=>$role, 'access'=>$accesslist);
$update_Article=$objCommon->save("users",$dataArr);}

elseif($id!='' && $password1!=''){
$dataArr  =  array('username'=>$username,'password'=>md5($password),'email'=>$email, 'role'=>$role, 'access'=>$accesslist);
$update_Article=$objCommon->update("users",$dataArr,"id ='$id'");
}else{
	$dataArr  =  array('username'=>$username,'email'=>$email, 'role'=>$role, 'access'=>$accesslist);
$update_Article=$objCommon->update("users",$dataArr,"id ='$id'");

}


$return = array('error' => 0);
die(json_encode($return));
}
 ?>