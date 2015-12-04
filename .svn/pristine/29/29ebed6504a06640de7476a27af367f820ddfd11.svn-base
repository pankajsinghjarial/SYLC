<?php
extract($_POST);

	
if(isset($submit) && $submit==''){
	$content = '<table width="75%" border="0" cellpadding="2" cellspacing="0">
			
			<tr>
			<td>Contact:</td>
			<td>'.$contact.'</td>
			</tr>
			
			<tr>
			<td>Email:</td>
			<td>'.$email.'</td>
			</tr>
			<tr>
			<td>Telephone:</td>
			<td>'.$phone.'</td>
			</tr>
			
			<tr>
			<td>Notes:</td>
			<td>'.$notes.'</td>
			</tr>
			
			</table>';
			$subject = "Contact Info Lead";
				
			
			$to = "yoann.attia@sylc-export.com";
			$headers  =  "From:".$contact."\r\n".'MIME-Version: 1.0' . "\r\n";
			$headers .= "bcc:jelmaleh@seobrand.net\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			
			if(mail($to, $subject, $content, $headers) ){			
				echo '<script type="text/javascript">
				alert("Messages envoyés");
				window.location.href = "http://www.sylc-export.com/contact.html";
				</script>
				';
			}
}
?>