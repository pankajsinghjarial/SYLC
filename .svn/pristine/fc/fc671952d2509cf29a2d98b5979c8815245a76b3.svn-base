<?php include("conf/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo DEFAULT_URL; ?>/css/popup.css" type="text/css" rel="stylesheet" media="all" />

</head>

<body>
<div class="popup" style="height:365px; width:500px;">

	<div class="popup_head">
	<p>Accéder à mon compte</p>
    
    </div>
    <div class="popup_cnt">
      <div class="popup_cnt01" style="margin: 22px 0 0 30px;"><?php if(isset($error_login_msg) && $error_login_msg!="") echo '<span class="error_msg">'.$error_login_msg.'</span>';?>
          <form method="post" id="calci" name="calci" action="<?php echo DEFAULT_URL; ?>/loginaccount?return=<?php echo $_REQUEST['page_url']; ?>">
      	<table width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
        <td width="36%"><div class="input_text"> Adresse email: </div></td>
        <td width="64%"><div style="position:relative;" class="input_outer"> <input type="text" value="" class="input_01" id="username" name="username"></div>
        </div>        	
        </td>
        </tr>
        <tr>
        <td><div class="input_text">Mot de passe:</div></td>
        <td><div class="input_outer"><input type="password" value="" class="input_01" id="password" name="password"></div></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="" class="submit_btn" name="calci_submit"><a href="<?php echo DEFAULT_URL."/forgotpswd"?>" class="forgot_password_link">Mot de passe oublié ?</a></td>
        </tr>  
        <tr height="35">
        <td></td>
        <td>Nouveau centre de voiture américaine?<br/>Commencez dès maintenant. C'est rapide et facile!</td>
        </tr> 
        <tr>
        <td></td>
        <td><a href="<?php echo DEFAULT_URL."/createaccount"?>"><img src="<?php echo DEFAULT_URL."/images/create-account.png"; ?>"></a></td>
        </tr>        
      </tbody></table>
      </form>
      </div>
    </div>
    
    
    <div class="popup_bottom">
    <img src="<?php echo DEFAULT_URL;?>/images/bottom_bg.png" width="499" height="12" alt="" /></div>
  
</div>



<?php /*?><div id="homer" style="height:370px; width:440px;">

<div id="homer_iner">

  <h3>ENREGISTREZ-VOUS ET RECEVEZ DES ALERTES SUR CETTE VOITURE.</h3>
<form name="inquir_form" id="inquir_form" method="post">
<div class="text_box_iner">
    <input type="text" value="Nom:" name="name" id="name" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Nom:':this.value;" />
    <input type="text" value="Pr&eacute;nom:" name="prename" id="prename" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Pr&eacute;nom:':this.value;" />
    <input type="text" value="Email:" name="email" id="email" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Email :':this.value;" />
    <input type="text" value="Num&eacute;ro de t&eacute;l&eacute;phone:" name="phone" id="phone" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Num&eacute;ro de t&eacute;l&eacute;phone:':this.value;" />  
    <input type="hidden" name="car_id" value="<?php echo $_GET['carId'] ?>"/>
    <input type="hidden" name="title" value="<?php echo $_GET['title'] ?>"/>
    <input type="hidden" name="buyItNowPrice" value="<?php echo $_GET['buyItNowPrice'] ?>"/>
    <input type="hidden" name="postalCode" value="<?php echo $_GET['postalCode'] ?>"/>
    <input type="hidden" name="location" value="<?php echo $_GET['location'] ?>"/>
    <input type="hidden" name="listingType" value="<?php echo $_GET['listingType'] ?>"/>
    <input type="hidden" name="endson" value="<?php echo $_GET['endson'] ?>"/>
    <input type="hidden" name="endtimestamp" value="<?php echo $_GET['endtimestamp'] ?>"/>
    <input type="hidden" name="buyItNowAvailable" value="<?php echo $_GET['buyItNowAvailable'] ?>"/>
    <input type="submit" class="form-submit" name="add_to_sel" value="" id="submit_inq" onclick="return validate_check()">
    </div>
</form>
</div></div><?php */?>
</body>
</html>