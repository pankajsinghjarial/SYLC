<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Sylc-Processing</title>
</head>
<body>
<?php
extract($_POST);
//echo "<pre>";print_r($_POST);
if(isset($submit) && $submit==''){ 
	$content = '<table width="75%" border="0" cellpadding="2" cellspacing="0">
			
			
			<tr>
			<td>Marque:</td>
			<td>'.$firstlevel.'</td>
			</tr>
			<tr>
			<td>Modele:</td>
			<td>'.$secondlevel.'</td>
			</tr>
			<tr>
			<td>Achat:</td>
			<td>'.$thirdlevel.'</td>
			</tr>
			<tr>
			<td>Anee de:</td>
			<td>'.$from.' a '.$to.'</td>
			</tr>
			<tr>
			<td>Commentaires:</td>
			<td>'.$comments.'</td>
			</tr>
			<tr>
			<td>Societe:</td>
			<td>'.$company.'</td>
			</tr>
			
			<tr>
			<td>Contact:</td>
			<td>'.$contact.'</td>
			</tr>
			<tr>
			<td>Telephone:</td>
			<td>'.$phone.'</td>
			</tr>
			<tr>
			<td>Email:</td>
			<td>'.$email.'</td>
			</tr>
			
			
			
			
			</table>';
			$subject = "Cars Lead";
				
			
			
			$to = "4009@dothejob.org";
			$headers  =  "From:".$contact."\r\n".'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//echo $content;exit;// icontact username
			
			if(mail($to, $subject, $content, $headers) ){



//echo $result_str;
			
			
						
					echo '<script type="text/javascript">
					alert("votre message a bien été envoyé");
					window.location.href = "http://www.sylc-export.com/recherche/";
					</script>
					';
				
			}
}
?>
</body></html>
