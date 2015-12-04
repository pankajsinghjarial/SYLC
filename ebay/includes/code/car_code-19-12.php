<?php 
extract($_POST);
extract($_GET);
$flagview = 1;
$unicount =  count($_SESSION['unique_id']['view']);
if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
    $getSelectedCarListSQL = "SELECT count(id) from wishlist where car_id = $carid AND user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    $isSelect = mysql_fetch_assoc($result);    
}
for($i=1; $i<$unicount;$i++)
{
	if($_SESSION['unique_id']['view'][$i] == $carid)
	{ $flagview =0;}
	}



$common = new common();


if($flagview == 1)
{
$_SESSION['unique_id']['view'][] = $carid;
$view = $common->mostView($carid);
}
$temp = $common->getCarWithAttrList($carid ,array("bodyStyle","dealerName","fullName","images","price","mileage","features","std_equip","dealerAddr","fuel","engine","extColor","interColor","transmission","drivetrain","doors","wheelbase")); 
$tempimg = $common->getAllImage($carid);
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `sort_order`");

//pr($temp); exit();

$car_meta_values['title'] = $temp[$carid]["fullName"];
$car_meta_values['description'] = ($temp[$carid]["engine"] != '') ? "Engine: ".$temp[$carid]["engine"]: '';
$car_meta_values['description'] .= ($temp[$carid]["extColor"] != '') ? ", Exterior Color: ".$temp[$carid]["extColor"]: '';
$car_meta_values['description'] .= ($temp[$carid]["interColor"] != '') ? ", Interior Color: ".$temp[$carid]["interColor"]: '';
$car_meta_values['description'] .= ($temp[$carid]["transmission"] != '') ? ", Transmission: ".$temp[$carid]["transmission"]: '';
$car_meta_values['description'] .= ($temp[$carid]["drivetrain"] != '') ? ", Drive Train: ".$temp[$carid]["drivetrain"]: '';
$car_meta_values['description'] .= ($temp[$carid]["doors"] != '') ? ", Doors: ".$temp[$carid]["doors"]: '';
$car_meta_values['description'] .= ($temp[$carid]["wheelbase"] != '') ? ", Wheel Base: ".$temp[$carid]["wheelbase"]: '';



if(isset($_POST) && isset($_POST["submit_inq"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"address"=>$_POST['address'],"type"=>0);
	$common_obj->save("contact",$arr);	
	
			// Your subject
			$subject='Inquiry About Car';
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
			$message = 'The person that contacted you is  '.$_POST['name']
	        .'<br/>	E-mail: '.$_POST['email'].'<br/>
			Phone Number: '.$_POST['phone'].'<br/>
			Address: '.$_POST['address'].'<br/>
			Message: '.$_POST['message'].'<br/>';

$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );

	$_SESSION['sentmail_txt'] = '
        <script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$.msgBox({
						title:"Merci",
						content:"Nous avons ajouté votre demande avec succès",
						type:"info",
						timeOut:5000,
						opacity:0.6,
						autoClose:true
					});
				});
			})(jQuery); 
		</script>';

}
if(isset($_POST) && isset($_POST["add_to_sel"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>0);
	$common_obj->save("contact",$arr);	

	
			// Your subject
			$subject= $_POST['name']." ".$_POST['prename'].' add a car to his selection';
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
			$message = $_POST['name'].' '.$_POST['prename'].'added a car to his selection.<br />
			 Details are as below :<br/>
			 Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
			 Car Id : '.$_POST['car_id'].'<br/>
			 E-mail: '.$_POST['email'].'<br/>
			 Phone Number: '.$_POST['phone'];

$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message);

	$message = 'You add a car to your selection with following details.<br />
					 Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
					 E-mail: '.$_POST['email'].'<br/>
					 Phone Number: '.$_POST['phone'];
		sendSmtpMail( $_POST['email'], "Thank you", $message);
		$_SESSION['sentmail_txt'] = '
        <script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$.msgBox({
						title:"Merci",
						content:"Nous avons ajouté votre demande avec succès",
						type:"info",
						timeOut:5000,
						opacity:0.6,
						autoClose:true
					});
				});
			})(jQuery); 
		</script>';
  }elseif(isset($_POST) && isset($_POST["add_to_enquire"])){
        global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"email"=>$_POST['email'],"submit_date"=>date("Y-m-d H:i:s"));
	$common_obj->save("car_inquiry",$arr);	
    
        // Your subject
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			// Additional headers
			//$headers .= 'From:  . \r\n';
			$message = "Address Votre email a &egrave;t&egrave; enregistr&egrave; pour une voiture. Contactez l'administrateur du site Hars Peu";

        $sentmail = sendSmtpMail( $_POST['email'], "Merci", utf8_encode($message) ,$headers );
        $sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, "Merci",  "Un invité envoyé demande d'enquête pour une voiture" ,$headers );
        $_SESSION['sentmail_txt'] = '
        <script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$.msgBox({
						title:"Merci",
						content:"Nous avons ajouté votre demande avec succès",
						type:"info",
						timeOut:10000,
						opacity:0.6,
						autoClose:true
					});
				});
			})(jQuery); 
		</script>';
}elseif(isset($_POST) && isset($_POST["send_invite"])){
        global $db;
    
        // Your subject
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//$headers .= 'From:  . \r\n';
			$message = '
                                        -----------------------------------------------
                                        One of your friend send you a link for a car. 
                                        Please visit the below link to view the detail of car
                                        <a href="'.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'"> '.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'</a>
                                            Thank you
                                         -----------------------------------------------
                                            ';

 $sentmail = sendSmtpMail( $_POST['email'], "Merci", $message );
        $_SESSION['sentmail_txt'] = '
        <script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$.msgBox({
						title:"Merci",
						content:"Lien envoy� avec succ�s",
						type:"info",
						timeOut:5000,
						opacity:0.6,
						autoClose:true
					});
				});
			})(jQuery); 
		</script>';
}

$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");