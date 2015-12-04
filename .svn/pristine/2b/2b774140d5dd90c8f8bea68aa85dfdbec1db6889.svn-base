<?php include("conf/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(basename($_SERVER['PHP_SELF']) =='inquiry_form.php' && isset($_SERVER['argv']['0']) && $_SERVER['argv']['0']!='' && $_SERVER['argv']['0']=='car_id=32'){ ?>
	<meta name="keywords" content="Une annonce des Voitures américaine retient votre attention ? Renseignez le formulaire disponible et un spécialiste de la voitur americaine vous contactera très vite." />
    <meta name="description" content="Une annonce des Voitures américaine retient votre attention ? Renseignez le formulaire disponible et un spécialiste de la voitur americaine vous contactera très " />
<?php } ?>
<title>Car Inquiry Form</title>
<link href="<?php echo DEFAULT_URL; ?>/css/popup.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript">
	function validate_check(){
		
		var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var ck_number = /^-{0,1}\d*\.{0,1}\d+$/;
	
		
		var validation='';
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		var message = document.getElementById("message").value;

		
		if(name =='' || name=='Nom:'){	
			validation ='Name must be filled out.\n';
		}
		if(email==''|| email=='Email:'){
			filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (filter.test(email)){
			}
			else{
				validation +='Email must be valid.\n';
			}	
		}
		if(phone ==''|| phone=='Téléphone:'){	
			filter = /^-{0,1}\d*\.{0,1}\d+$/;
			if (filter.test(phone)) {
			}
		 	else{
				validation +='Téléphone must be valid.\n';
			}
		}
		
		if(message =='' || prename=='Message:'){	
			validation +='Message must be filled out.\n';
		}

		
		if(validation != ''){
			alert(validation);
			return false;
		}
		else{
			 return true;
		}
}
</script>
</head>

<body>
<div class="popup" style="height:420px; width:500px;">
  <div class="popup_head">
    <p>Cette annonce vous intéresse ?<br />
      Contactez un spécialiste</p>
  </div>
  <div class="popup_cnt">
    <div class="popup_cnt01">
      <form name="inquir_form" id="inquir_form" method="post">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td width="25%"><div class="input_text">Nom:</div></td>
            <td width="75%"><div class="input_outer">
                <input type="text" value="" name="name" id="name" class="input_01" placeholder="Nom:"/>
              </div></td>
          </tr>
          <tr>
            <td ><div class="input_text">Email :</div></td>
            <td ><div class="input_outer">
                <input type="text" placeholder="Email:" value="" name="email" id="email" class="input_01" />
              </div></td>
          </tr>
          <tr>
            <td ><div class="input_text01">T&eacute;l&eacute;phone:</div></td>
            <td ><div class="input_outer">
                <input type="text" placeholder="T&eacute;l&eacute;phone:" name="phone" id="phone" class="input_01" value="" />
              </div></td>
          </tr>
          
          <tr>
            <td ><div class="input_text01">Message:</div></td>
            <td ><div class="input_outermessage">
                <textarea class="text_area" name="message" id="message" placeholder="Message:"></textarea>
              </div></td>
          </tr>
          <tr>
            <td ></td>
            <td ><input type="submit" class="submit_btn" name="submit_inq" value="" id="submit_inq" onclick="return validate_check();"></td>
          </tr>
        </table>
        <input type="hidden" name="car_id" value="<?php echo $_GET['car_id'] ?>"/>
      </form>
    </div>
  </div>
  <div class="popup_bottom"> <img src="<?php echo DEFAULT_URL;?>/images/bottom_bg.png" width="499" height="12" alt="" /></div>
</div>

</body>
</html>