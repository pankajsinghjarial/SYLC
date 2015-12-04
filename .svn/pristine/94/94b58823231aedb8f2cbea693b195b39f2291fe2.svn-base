<?php 
  
  require 'admin/config/database.php';
  extract($_POST);
  $lead_id = $_POST['lead_id'];
  $id= $_POST['idforpdfmail'];
  $email_for_user_pdf= $_POST['email_for_user_pdf'];
  //$output_in_text= $_POST['name'];
  $output_in_text = "";
   $output_in_image= $_POST['output'];
   $initials= $_POST['output_initial'];

// echo "<pre>";
 // print_r($_SERVER);
 
 $path_for_pdf = "http://".$_SERVER['HTTP_HOST']."/voitures-americaines/";
  $www_root = $_SERVER['DOCUMENT_ROOT']."/voitures-americaines/sign";
  //$nameforpopup= $_POST['fname_pop'];
  //$lastnameforpopup= $_POST['lname_pop'];
  //$emailforpopup = $_POST['email_pop'];
  $sel_query="Select * from leads where id='".$id."'";
  
  $rs_sel=mysql_query($sel_query) or die(mysql_error());
  
  $popup_details = (mysql_fetch_object($rs_sel));
  
  $leadddetail = (mysql_query("SELECT * FROM lead_details where id = '$lead_id'"));
  $leadfetch = (mysql_fetch_object($leadddetail));
  $brand1 = $leadfetch->car_brand;
  $model1 = $leadfetch->model;
  $year1 = $leadfetch->year;
  
if($hiddenpdf=='hiddenpdfvalue')
{
	
	// if sign is drwawing
	if($_POST['output']!=''){
		$img = sigJsonToImage($_POST['output']);
		// Save to file
		//$fileName = time()."-".$id."-signature.png";
		$fileName = $lead_id."-signature.png";
		$filePath =$_SERVER["DOCUMENT_ROOT"]."/voitures-americaines/sign/".$fileName;
		imagepng($img, $filePath);
		// Output to browser
		/*header('Content-Type: image/png');
	
		imagepng($img);*/
	
		// Destroy the image in memory when complete
	
		imagedestroy($img);
	
	}else{ // if sign is Text
	
		$img = imagecreatetruecolor(400, 30);
	
		$bgColour = imagecolorallocate($img, 0xff, 0xff, 0xff);
	
		$penColour = imagecolorallocate($img, 0x14, 0x53, 0x94);
	
		imagefilledrectangle($img, 0, 0, 399, 29, $bgColour);
	
		$text = $_POST['name'];
	
		$font = $_SERVER['DOCUMENT_ROOT']."/voitures-americaines/journal.ttf";
	
		imagettftext($img, 20, 0, 10, 20, $penColour, $font, $text);
	
			// Save to file
	
			//$fileName = time()."_".$id."_signature.png";
			$fileName = $lead_id."-signature.png";
	
			$filePath = $www_root."/".$fileName;
	
			imagepng($img, $filePath);
			
		// Output to browser
	
			/*header('Content-Type: image/png');
	
			imagepng($img);*/
	
			imagedestroy($img);
	}
	
	 $sign_date = $_POST['sign_date'];
$to = $email_for_user_pdf;
//$to = '4011@dothejob.org';
//$to = 'yoann.attia@sylc-export.com';

$subject='Votre facture pdf';

//$headers  = 'MIME-Version: 1.0' . "\r\n";

//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

//$headers .= 'From: '.$popup_details->name.' '.$popup_details->first_name.'<'.$email_for_user_pdf.'>' . "\r\n";


$message = '<p style="color:#000;">Bonjour,<br/><br/>Vous pouvez telecharger votre facture signée a partir de ce lien:<br/><br/>http://www.sylc-export.com/voitures-americaines/pdf_for_user.php?id='.$id.'&lead_id='.$lead_id.'&from=user
		
		<br/><br/>Sylc Corporation vous remercie de votre confiance.</p>';




//$message = "Please find the pdf here:<br/><br/>http://seobranddev.com/voiture/pdf_for_user.php?id=".$id;
		require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
		//SMTP MAIL STARTS
		
		try {
			$to_email = $to;
			$mail = new PHPMailer(true); //New instance, with exceptions enabled
				
			$body             = $message;
			$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
				
				$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password
				
		//	$mail->IsSendmail();  // tell the class to use Sendmail
				
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
			
			//echo 'Message has been sent.';
		} catch (phpmailerException $e) {
			echo $e->errorMessage();
		}	
			
//$sentmail = mail( $to, $subject, $message, $headers,'-fwebmaster@sylc.com' );

		$sel_query2="Select * from users WHERE role='admin' and id = '2'";
		
		$rs_sel2=mysql_query($sel_query2) or die(mysql_error());
		while($arr_sel2=mysql_fetch_array($rs_sel2))
		{
		
			//$username = $arr_sel2['username'];
			$adminemail = $arr_sel2['email'];
		}	
		
	// $to = 'jelmaleh@seobrand.net'; //mail to admin
		$to = $adminemail;
		 
		
		$subject='Un contrat a été signé';
		
		
		$pdflink = 'http://www.sylc-export.com/voitures-americaines/pdf_for_user.php?id='.$id.'&lead_id='.$lead_id.'&from=user';
		$message = '<p>L\'un de vos clients a signé le contrat! , S\'il vous plaît consulter ses informations ci-dessous</p>
				<table style="color:#000;">
				<tr>
				<td><strong>Nom</strong>:</td>
				<td>'.$popup_details->name.' '.$popup_details->first_name.'</td>
				</tr>
				<tr>
				<td><strong>Email</strong>:</td>
				<td>'.$email_for_user_pdf.'</td>
				</tr>
				<tr>
				<td><strong>Téléphone</strong>:</td>
				<td>'.$popup_details->phone.'</td>
				</tr>
				<tr>
				<td><strong>Adresse</strong>:</td>
				<td>'.$popup_details->address.'</td>
				</tr>
				<tr>
				<td><strong>Marque</strong>:</td>
				<td>'.$brand1.'</td>
				</tr>
				<tr>
				<td><strong>Modèle</strong>:</td>
				<td>'.$model1.'</td>
				</tr>
				<tr>
				<td><strong>Année</strong>:</td>
				<td>'.$year1.'</td>
				</tr>
								
				</table>
						
						
			<table>
		
		  <tr>
          <td colspan="2"><p><strong>Sylc Corporation<br/>Tracking Departement</strong></p></td>
          </tr>
		 </table>'
				;
		
		
				require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
				//SMTP MAIL STARTS
		
				try {
					$to_email = $to;
					$mail = new PHPMailer(true); //New instance, with exceptions enabled
		
					$body             = $message;
					$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
		
					$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password
		
					//	$mail->IsSendmail();  // tell the class to use Sendmail
		
					$mail->AddReplyTo("no-reply@example.com","First Last");
		
					$mail->From       = "info@sylc-export.com";
					$mail->FromName   = "Sylc-Export Support";
		
		
					$mail->AddAddress($to_email);
		
					$mail->Subject  = $subject;
		
					//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
					$mail->WordWrap   = 80; // set word wrap
		
					$mail->MsgHTML($body);
		
					$mail->IsHTML(true); // send as HTML
		
					$mail->Send();
						
					//echo 'Message has been sent.';
				} catch (phpmailerException $e) {
					echo $e->errorMessage();
					//die;
				}
				
				

$pdf_link = $path_for_pdf."pdf.php?id=".$lead_id;

$Sql_mail_sent_query = mysql_query("UPDATE leads SET pdf_sent = '".$pdf_link."',
         	signed_on = '".$sign_date."',
		initials = '".$initials."'
		WHERE id = '".$id."'");

mysql_query("UPDATE lead_details SET pdf_link = '".$pdf_link."',
		mail_sent = 2,
        mail_sent_date = '".str_replace(",","",$sign_date)."',
		initials = '".$initials."',
		initials_date = '".str_replace(",","",$sign_date)."',
		sign = '".$fileName."',
		sign_date = '".str_replace(",","",$sign_date)."'
		WHERE id = '".$lead_id."'");



}

?>



<?php 
/**

				*  Signature to Image: A supplemental script for Signature Pad that

				*  generates an image of the signature�s JSON output server-side using PHP.

				*

				*  @project ca.thomasjbradley.applications.signaturetoimage

				*  @author Thomas J Bradley <hey@thomasjbradley.ca>

				*  @link http://thomasjbradley.ca/lab/signature-to-image

				*  @link http://github.com/thomasjbradley/signature-to-image

				*  @copyright Copyright MMXI�, Thomas J Bradley

				*  @license New BSD License

				*  @version 1.1.0

				*/



				/**

				*  Accepts a signature created by signature pad in Json format

				*  Converts it to an image resource

				*  The image resource can then be changed into png, jpg whatever PHP GD supports

				*

				*  To create a nicely anti-aliased graphic the signature is drawn 12 times it's original size then shrunken

				*

				*  @param string|array $json

				*  @param array $options OPTIONAL; the options for image creation

				*    imageSize => array(width, height)

				*    bgColour => array(red, green, blue) | transparent

				*    penWidth => int

				*    penColour => array(red, green, blue)

				*    drawMultiplier => int

				*

				*  @return object

				*/

				function sigJsonToImage ($json, $options = array()) {

		  $defaultOptions = array(

		  'imageSize' => array(198, 55)

		  		,'bgColour' => array(0xff, 0xff, 0xff)

		  		,'penWidth' => 2

		  		,'penColour' => array(0x14, 0x53, 0x94)

		  		,'drawMultiplier'=> 12

		  );



		  $options = array_merge($defaultOptions, $options);



		  $img = imagecreatetruecolor($options['imageSize'][0] * $options['drawMultiplier'], $options['imageSize'][1] * $options['drawMultiplier']);



		  if ($options['bgColour'] == 'transparent') {

		  imagesavealpha($img, true);

		  $bg = imagecolorallocatealpha($img, 0, 0, 0, 127);

		  } else {

		  $bg = imagecolorallocate($img, $options['bgColour'][0], $options['bgColour'][1], $options['bgColour'][2]);

		  }



		  $pen = imagecolorallocate($img, $options['penColour'][0], $options['penColour'][1], $options['penColour'][2]);

		  imagefill($img, 0, 0, $bg);



		  if (is_string($json))

		  	$json = json_decode(stripslashes($json));



		  foreach ($json as $v)

		  drawThickLine($img, $v->lx * $options['drawMultiplier'], $v->ly * $options['drawMultiplier'], $v->mx * $options['drawMultiplier'], $v->my * $options['drawMultiplier'], $pen, $options['penWidth'] * ($options['drawMultiplier'] / 2));



		  $imgDest = imagecreatetruecolor($options['imageSize'][0], $options['imageSize'][1]);



		  if ($options['bgColour'] == 'transparent') {

		  imagealphablending($imgDest, false);

		  imagesavealpha($imgDest, true);

		  }



		  imagecopyresampled($imgDest, $img, 0, 0, 0, 0, $options['imageSize'][0], $options['imageSize'][0], $options['imageSize'][0] * $options['drawMultiplier'], $options['imageSize'][0] * $options['drawMultiplier']);

		  imagedestroy($img);



		  return $imgDest;

		  }




	/**

		 *  Draws a thick line

		 *  Changing the thickness of a line using imagesetthickness doesn't produce as nice of result

		 *

		 *  @param object $img

		 *  @param int $startX

		 *  @param int $startY

		 *  @param int $endX

		 *  @param int $endY

		 *  @param object $colour

		 *  @param int $thickness

		 *

		 *  @return void

		 */

		function drawThickLine ($img, $startX, $startY, $endX, $endY, $colour, $thickness) {

		  $angle = (atan2(($startY - $endY), ($endX - $startX)));

		

		  $dist_x = $thickness * (sin($angle));

		  $dist_y = $thickness * (cos($angle));

		

		  $p1x = ceil(($startX + $dist_x));

		  $p1y = ceil(($startY + $dist_y));

		  $p2x = ceil(($endX + $dist_x));

		  $p2y = ceil(($endY + $dist_y));

		  $p3x = ceil(($endX - $dist_x));

		  $p3y = ceil(($endY - $dist_y));

		  $p4x = ceil(($startX - $dist_x));

		  $p4y = ceil(($startY - $dist_y));

		

		  $array = array(0=>$p1x, $p1y, $p2x, $p2y, $p3x, $p3y, $p4x, $p4y);

		  imagefilledpolygon($img, $array, (count($array)/2), $colour);

		}
		
		?>
		
	
<script type="text/javascript">

   window.location="http://www.sylc-export.com/voitures-americaines/thankyou.html";

</script> 
		
	