<?php 

if(!isset($_SESSION['gold_admin'])){
	echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login.php";</script>';
	exit;
}
extract($_GET);
extract($_POST);
$obj = new validation();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {
	
	
	//customerinfo
	if(isset($custhid) && $custhid == 'custhid')
	{	
		$custerror='';
		$obj->add_fields($name, 'req', 'Please Enter First Name');
		$obj->add_fields($first_name, 'req', 'Please Enter Last Name');
		$obj->add_fields($address, 'req', 'Please Enter Address');
		$obj->add_fields($city, 'req', 'Please Enter City');
		$obj->add_fields($postcode, 'req', 'Please Enter Postal Code');
		$obj->add_fields($postcode, 'zip', 'Please Enter a Valid Postal Code');
		$obj->add_fields($phone, 'req', 'Please Enter Phone');
//		$obj->add_fields($phone, 'phone=us', 'Please Enter a Valid Phone');
		$obj->add_fields($email, 'req', 'Please Enter Email');
		$obj->add_fields($email, 'email', 'Please Enter a Valid Email');
		
		$custerror = $obj->validate();
		
		
		if($custerror){
		
			$custerrorMsg= "<font color='#FF0000' family='verdana' size=2>".$custerror."</font>";
		
		}
		else
		
		{
		
			$dataArr  =  array('name'=>ucfirst($name),'first_name'=>$first_name,'address'=>$address,'city'=>$city,'postcode'=>$postcode,'phone'=>$phone,'email'=>$email);
			
			$update_Article=$objCommon->update("leads",$dataArr,"id ='$id'");
			
			$use = $objCommon->read("leads","id =$id");
			$usefetch=$db->fetchNextObject($use);
			$dataArrs = array('email'=>$email);
			//echo $usefetch->user_id; die;
			if($usefetch->user_id != '')
			{ $uer =  $usefetch->user_id;
				$updatesee = $objCommon->update("users",$dataArrs,"id =$uer"); 
			}
			
			
		
			$custerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
		}
	}
	//login details
	if(isset($custloghid) && $custloghid == 'custloghid')
	{
	
		$custlogerror='';
		$obj->add_fields($username, 'req', 'Please Enter Username');
		$obj->add_fields($username, 'min=6', 'Username must be 6 characters long');
		$obj->add_fields($password, 'req', 'Please Enter Password');
		$obj->add_fields($password, 'min=6', 'Password must be 6 characters long');
		//$obj->add_fields($address, 'req', 'Please Enter Address');
		
	
		$custlogerror = $obj->validate();
		if(isset($user_id) && $user_id != '') {
			$loginInfocheck = $objCommon->read('users',"id != $user_id and username = '$username'");
			if(mysql_num_rows($loginInfocheck) > 0) {
				$custlogerror = "Username Already Taken.";
			}
		}else{
		$loginInfocheck = $objCommon->read('users',"username = '$username'");
			if(mysql_num_rows($loginInfocheck) > 0) {
				$custlogerror = "Username Already Taken.";
			}	
		}
	
		if($custlogerror){
	
			$custlogerrorMsg= "<font color='#FF0000' family='verdana' size=2>".$custlogerror."</font>";
	
		}
		else
	
		{
			
			if(isset($user_id) && $user_id != '')
			{
				
				$dataArr  =  array('username'=>$username,'password'=>md5($password),'email'=>$logemail);
				//print_r($dataArr); die;
				$update_Article=$objCommon->update("users",$dataArr,"id =$user_id");
				$subject ="Nouvelles mises à jour de votre voiture sur SYLC-EXPORT";
				$message = "
				<p>Bienvenue chez SYLC Corporation. Si vous souhaitez accéder à votre compte depuis notre site internet, vous devez vous munir de votre identifiant et votre mot de passe personnel ci-dessous:</p>
				<table>
				<tr>
				<td><strong>Nom D'utilisateur</strong>:</td>
				<td>$username</td>
				</tr>
				<tr>
				<td><strong>Mot de Passe</strong>:</td>
				<td>$password</td>
				</tr>
				</table><table>
				<tr>
				<td colspan='2'>Pour accéder directement à votre compte <a href='http://www.sylc-export.com'>Cliquez Ici</a></td>			
				</tr>
		  		<tr>
          		<td colspan='2'><center><p >Merci de votre confiance, <strong>SYLC Corporation</strong></p></center></td>
          		</tr>
		 </table>";
			}
			else
			{
				
				$dataArr  =  array('username'=>$username,'password'=>md5($password),'email'=>$logemail);
				
				$update_Article=$objCommon->save("users",$dataArr);
				$usinfo = $objCommon->read('users','','id DESC limit 0,1');
				$userfetch=$db->fetchNextObject($usinfo);
				$usernew_id = $userfetch->id;
				$dataArrid = array('user_id'=>$usernew_id);
				$updateleads =$objCommon->update("leads",$dataArrid,"id ='$id'");
				$subject ="Nouvelles mises à jour de votre voiture sur SYLC-EXPORT";
				$message = "
				<p>Bienvenue chez SYLC Corporation. Si vous souhaitez accéder à votre compte depuis notre site internet, vous devez vous munir de votre identifiant et votre mot de passe personnel ci-dessous:</p>
				<table>
				<tr>
				<td><strong>Nom D'utilisateur</strong>:</td>
				<td>$username</td>
				</tr>
				<tr>
				<td><strong>Mot de Passe</strong>:</td>
				<td>$password</td>
				</tr>
				</table><table>
				<tr>
				<td colspan='2'>Pour accéder directement à votre compte <a href='http://www.sylc-export.com'>Cliquez Ici</a></td>				
		 </tr>
		  <tr>
          <td colspan='2'><p >Merci de votre confiance, <strong>SYLC Corporation</strong></p></td>
          </tr>
		 </table>";
			}
			require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
			//SMTP MAIL STARTS

			try {
				$to_email = $logemail;
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
				$mail->FromName   = "Sylc-Export Update";
			
			
				$mail->AddAddress($to_email);
			
				$mail->Subject  = $subject;
			
				//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$mail->WordWrap   = 80; // set word wrap
			
				$mail->MsgHTML($body);
			
				$mail->IsHTML(true); // send as HTML
			
				$mail->Send();
				
				$custlogerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
				//echo 'Message has been sent.';
			} catch (phpmailerException $e) {
				echo $e->errorMessage();
			}
				
			//SMTP ENDS
			
			
		/*	$templateFromEmail = 'admin@sylc-export.com';
			
			$headers = "From: " . $templateFromEmail . "\r\n";
			$headers .= "Reply-To: ". $templateFromEmail . "\r\n";
			//$headers .= "CC: 4004@dothejob.org\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$to = $logemail;
			$from = $templateFromEmail;
			mail($to,$subject,$message,$headers,'-fwebmaster@sylc.com'); */
			
		}
	}
	//car details
	if(isset($carinfohid) && $carinfohid == 'carinfohid')
	{
	
		$carinfoerror='';
		$obj->add_fields($carname, 'req', 'Please Enter Make');
		$obj->add_fields($modelname, 'req', 'Please Enter Model');
		$obj->add_fields($year, 'num', 'Please Enter a Valid Year');
		$obj->add_fields($year, 'min=4', 'Please Enter a Valid Year');
		$obj->add_fields($year, 'max=4', 'Please Enter a Valid Year');
		$obj->add_fields($price, 'req', 'Please Enter Price');
		$obj->add_fields($price, 'currency', 'Please Enter a Valid Price');
		//$obj->add_fields($status, 'req', 'Please Select Status');
		//$obj->add_fields($address, 'req', 'Please Enter Address');
	
	
		$carinfoerror = $obj->validate();
	
	
		if($carinfoerror){
	
			$carinfoerrorMsg= "<font color='#FF0000' family='verdana' size=2>".$carinfoerror."</font>";
	
		}
		else
	
		{
			$dataArr  =  array('car_brand'=>$carname,'model'=>$modelname,'year'=>$year,'carprice'=>$price,'exterior'=>$exterior,'interior'=>$interior,'trimpack'=>$trimpack,'serial'=>$serial,'destination'=>$destination,'status'=>$status);
	
				$update_Article=$objCommon->update("lead_details",$dataArr,"id ='$lead_id'");
		
			
			$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
		}
	}
	
	
	
	if(isset($feehid) && $feehid == 'feeshid')
	{
		
		//print_r($title);die;
		$i=0;
		foreach($_POST['amount'] as $amount){
			
			//echo "<br>".$amount;
			//echo "<br>".$_POST['amountcheck'][$i];
			$titles = $_POST['amountcheck'][$i];
			$dataArr  =  array('lead_detail_id'=>$lead_id,'title'=>$titles,'amount'=>str_replace(',','',$amount));
			
			$update_Article=$objCommon->save("lead_fee_detail",$dataArr);
		$i++;	
		}
		
		
		
			
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	
	
	
	
	if(isset($upsellhid) && $upsellhid == 'upsellhid')
	{
		$titles = explode("~",$upsell);
		$dataArr  =  array('lead_detail_id'=>$lead_id,'title'=>$titles[1],'amount'=>$amount,'desc'=>$desc,'created_at'=>date('Y-m-d'));
	
		$update_Article=$objCommon->save("lead_upsell_details",$dataArr);
	
			
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	if(isset($contacthid) && $contacthid == 'contacthid')
	{
		$dataArr  =  array('lead_detail_id'=>$lead_id,'title'=>$title,'name'=>$name,'phone'=>$phone,'email'=>$email);
		$update_Article=$objCommon->save("lead_contact_details",$dataArr);			
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	if(isset($announcehid) && $announcehid == 'announcehid')
	{
		$dataArr  =  array('lead_detail_id'=>$lead_id,'desc'=>$desc,'stat'=>$stat,'location'=>$phone,'created_at'=>date('Y-m-d'));
		$update_Article=$objCommon->save("lead_announce_details",$dataArr);
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	if(isset($addvehiclehid) && $addvehiclehid == 'addvehiclehid')
	{
		$dataArr  =  array('lead_id'=>$lead_id,'car_brand'=>$carmake,'model'=>$carmodel,'created_at'=>date('Y-m-d'));
		$update_Article=$objCommon->save("lead_details",$dataArr);
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	
	/*if(isset($galleryhid) && $galleryhid == 'galleryhid')
	{
		$cntimg = 0;
		foreach($_FILES['img']['name'] as $file){
		$filename= time().$file;
		
		set_time_limit(0);
		$docDestination = LIST_ROOT.'/gallery/'.$filename;
		move_uploaded_file($_FILES['img']['tmp_name'][$cntimg], $docDestination) or die($docDestination);
		$dataArr  =  array('lead_detail_id'=>$lead_id,'imagename'=>$filename);
		$update_Article=$objCommon->save("lead_gallery_details",$dataArr);
		$cntimg++;
		} 
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}*/
	
	if(isset($galleryhid) && $galleryhid == 'galleryhid')
	{
		//echo '<pre>';	print_r($_POST['files']); die;
		if(!empty($_POST['files']) ){
		$cntimg = 0;
		foreach($_POST['files'] as $file){
			$filename= $file;
			$random_number = rand(1,1000);
			//set_time_limit(0);
			//$docDestination = LIST_ROOT.'/gallery/'.$filename;
			//move_uploaded_file($_FILES['img']['tmp_name'][$cntimg], $docDestination) or die($docDestination);
			$dataArr  =  array('lead_detail_id'=>$lead_id,'imagename'=>$lead_id.$random_number.$filename);
			$update_Article=$objCommon->save("lead_gallery_details",$dataArr);
			rename(LIST_ROOT.'/gallery/'.$filename, LIST_ROOT.'/gallery/'.$lead_id.$random_number.$filename);
			$cntimg++;
		}
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
		}else{
			$carinfoerrorMsg="<font color='#FF0000' family='verdana' size=2>No Image Selected</font>";
			
		}
	}
	
	if(isset($dochid) && $dochid == 'dochid')
	{
	
		$filename= time().$_FILES['img']['name'];
		set_time_limit(0);
		$docDestination = LIST_ROOT.'/gallery/'.$filename;
		move_uploaded_file($_FILES['img']['tmp_name'], $docDestination) or die($docDestination);
		$dataArr  =  array('lead_detail_id'=>$lead_id,'docname'=>$filename,'doctitle'=>$doctitle,'date'=>date('Y-m-d'));
		$update_Article=$objCommon->save("lead_doc_details",$dataArr);
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Added</font>";
	}
	
	if(isset($gallermainyhid) && $gallermainyhid == 'gallermainyhid')
	{ 
		$dataArr  =  array('main_image'=>$img);
		$update_Article=$objCommon->update("lead_details",$dataArr,'id='.$lead_id);
		$carinfoerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
	}

}
if($action == 'removefee' && $fee != '')
{
	$objCommon->delete('lead_fee_detail','id='.$fee);
	 echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>'; 
}



if($action == 'removenote' && $note != '')
{
	$objCommon->delete('admin_notes','id='.$note);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}




if($action == 'editfeehid' && $feeid != '')
{
	$titles = explode("~",$title);
	$dataArr  =  array('title'=>$titles[1],'desc'=>$desc,'amount'=>$amount);
	$objCommon->update('lead_fee_detail',$dataArr,'id='.$feeid);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'editupsellhid' && $upsellid != '')
{
	$titles = explode("~",$upsell);
	$dataArr  =  array('title'=>$titles[1],'desc'=>$desc,'amount'=>$amount);
	$objCommon->update('lead_upsell_details',$dataArr,'id='.$upsellid);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}


if($action == 'editdocumenthid' && $editdochid != '')
{
	$editfilename= time().$_FILES['editimg']['name'];
	//$titles = explode("~",$doctitle);
	$dataArr  =  array('doctitle'=>$doctitle,'docname'=>$editfilename);
	$objCommon->update('lead_doc_details',$dataArr,'id='.$editdochid);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'editcontacthid' && $editcontacthid != '')
{
	//$titles = explode("~",$title);
	$dataArr  =  array('title'=>$edittitle,'email'=>$editemail,'phone'=>$editphone, 'name'=>$editname);
	$objCommon->update('lead_contact_details',$dataArr,'id='.$editcontacthid);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'editannouncehid' && $editannouncehid != '')
{
	//$titles = explode("~",$title);
	$dataArr  =  array('desc'=>$desc,'location'=>$phone, 'stat'=>$stat);
	$objCommon->update('lead_announce_details',$dataArr,'id='.$editannouncehid);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}







if($action == 'removeupsell' && $upsell != '')
{
	$objCommon->delete('lead_upsell_details','id='.$upsell);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'removedoc' && $doc != '')
{
	$objCommon->delete('lead_doc_details','id='.$doc);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'removecontact' && $con != '')
{
	$objCommon->delete('lead_contact_details','id='.$con);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($action == 'removeannounce' && $announce != '')
{
	$objCommon->delete('lead_announce_details','id='.$announce);
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

if($imgdelete== 'Delete Images')
{
	$arrname = 'imgdel'.$divid;
	foreach($_POST[$arrname] as $galimg) {	$objCommon->delete('lead_gallery_details ','id='.$galimg); }
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}

$clientInfo = $objCommon->read('leads','id='.$id);
$fetch=$db->fetchNextObject($clientInfo);
$first_name = $fetch->first_name;
$name = $fetch->name;
$email = $fetch->email;
$address = $fetch->address;
$phone = $fetch->phone;
$city= $fetch->city;
$postcode = $fetch->postcode;
$id = $fetch->id;
$user_id = $fetch->user_id;
$logemail = $fetch->email;
if($user_id) { 
	$loginInfo = $objCommon->read('users','id='.$user_id); 
	$loginfetch=$db->fetchNextObject($loginInfo);
	$username = $loginfetch->username;
	$password = $loginfetch->password;
	$last_login = $loginfetch->last_login;
}
$carinfo = $objCommon->read('lead_details','lead_id='.$id); 
$statusinfo = $objCommon->read('status','active=1','position asc');
$statusRec = $objCommon->read('status','active=1','position asc');
/*
$statusRec = $objCommon->customQuery('SELECT Status.id,Status.name,Status.position,Status.short_description,Status.long_description,Status.active,UserStatus.user_id,UserStatus.status_order,UserStatus.status_id
FROM  user_status as UserStatus
Left JOIN status as Status
ON UserStatus.status_id=Status.id where Status.active=1');
*/

$user_statusinfo = $objCommon->read('user_status','user_id='.$id,'status_order asc'); 
$feeinfo = $objCommon->read('fees','status=1');
$user_statusinfo_arr=array();
         
      while($user_statusfetch = mysql_fetch_object($user_statusinfo)) {
      	$user_statusinfo_arr[$user_statusfetch->status_id] = $user_statusfetch->status_order;
      }
//mysql_data_seek($user_statusinfo,0);
?>