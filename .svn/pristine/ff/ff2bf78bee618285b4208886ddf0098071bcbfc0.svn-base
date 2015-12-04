<?php include("conf/config.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo DEFAULT_URL; ?>/css/popup.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript">
	function validate_check()
	{
	

		var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var ck_number = /^-{0,1}\d*\.{0,1}\d+$/;
	
		
		var validation='';
		var name = document.getElementById("name").value;
		var prename = document.getElementById("prename").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		var recall = document.getElementById("recall").options[document.getElementById("recall").selectedIndex].value;
		var question = document.getElementById("question").options[document.getElementById("question").selectedIndex].value;
		var message = document.getElementById("message").value;
		
		if(name =='' || name=='Nom:'){	
			validation ='Le nom doit être rempli.\n';
		}
		if(prename =='' || prename=='Pr&eacute;nom:'){	
			validation +='Prénom doit être rempli.\n';
		}
		if(email==''|| email=='Email:'){	
			
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(email)){
 				}
				else{
					validation +='E-mail doit être valide.\n';
				}		
		}
		if(phone ==''|| phone=='Num&eacute;ro de t&eacute;l&eacute;phone:'){	
			filter = /^-{0,1}\d*\.{0,1}\d+$/;
			if (filter.test(phone)) {
			}
		 	else{
				validation +='Numéro de téléphone doivent être valides.\n';
			}
		}
		
		if(recall ==''){	
			validation ='S\'il vous plaît sélectionnez Heure.\n';
		}
		
		if(question =='' ){	
			validation ='S\'il vous plaît Choisir Question.\n';
		}
		
		if(message =='' || prename=='Message:'){	
			validation ='Le message doit être rempli.\n';
		}
		
		
		if(validation){
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
<div class="popup" style="height:560px; width:500px;">

	<div class="popup_head">
<p>Cette annonce vous intéresse ?<br /> Contactez un spécialiste</p>
    
    </div>
    
    <div class="popup_cnt">
      <div class="popup_cnt01">
      <form name="inquir_form" id="inquir_form" method="post">
      	<table width="100%" cellpadding="0" cellspacing="0">
            <tr>
            <td width="25%"><div class="input_text">Nom:</div></td>
            <td width="75%"><div class="input_outer"> <input type="text" value="" name="name" id="name" class="input_01" placeholder="Nom:"/></div></td>
            </tr>
            <tr>
            <td ><div class="input_text">Prénom:</div></td>
            <td ><div class="input_outer"><input type="text" placeholder="Pr&eacute;nom:" name="prename" id="prename" class="input_01" value="" /></div></td>
            </tr>
            <tr>
            <td ><div class="input_text">Email :</div></td>
            <td ><div class="input_outer"> <input type="text" placeholder="Email:" value="" name="email" id="email" class="input_01" /></div></td>
            </tr>
            <tr>
            <td ><div class="input_text01">T&eacute;l&eacute;phone:</div></td>
            <td ><div class="input_outer">  <input type="text" placeholder="T&eacute;l&eacute;phone:" name="phone" id="phone" class="input_01" value="" /></div></td>
            </tr>
             <tr>
            <td ><div class="input_text01"></div></td>
            <td ><div class="input_outer">  <select id="recall" name="recall">
                                                <option selected="" value="">A quel moment souhaitez-vous être contacté ?</option>
                                                <option value="9H - 10H">9H - 10H</option>
                                                <option value="10H - 11H">10H - 11H</option>
                                                <option value="11H - 12H">11H - 12H</option>
                                                <option value="12H - 13H">12H - 13H</option>
                                                <option value="13H - 14H">13H - 14H</option>
                                                <option value="14H - 15H">14H - 15H</option>
                                                <option value="15H - 16H">15H - 16H</option>
                                                <option value="16H - 17H">16H - 17H</option>
                                                <option value="17H - 18H">17H - 18H</option>
                                                <option value="18H - 19H">18H - 19H</option>
                                                <option value="19H - 20H">19H - 20H</option>
                                                <option value="20H - 21H">20H - 21H</option>
                                                <option value="21H - 22H">21H - 22H</option>
                                            </select></div></td>
            </tr>
             <tr>
            <td ><div class="input_text01"></div></td>
            <td ><div class="input_outer">   <select size="1" id="question" name="question" class="sele">
                    <option value="Question concernant le paiement de ce v&eacute;hicule" >Question concernant le paiement de ce v&eacute;hicule</option>
                    <option value="Avant de commander je souhaiterai avoir un conseille en ligne">Avant de commander je souhaiterai avoir un conseiller en ligne</option>
                    <option value="Question concernant le transport de ce v&eacute;hicule" >Question concernant le transport de ce v&eacute;hicule</option>
                    <option value="Je souhaiterai mieux comprendre le descriptif de l'annonce">Je souhaiterai mieux comprendre le descriptif de l'annonce</option>
                    <option value="J'ai besoin d'une traduction pour pouvoir comprendre l'annonce" >J'ai besoin d'une traduction pour pouvoir comprendre l'annonce</option>
                    <option value="Contactez moi pour passer commande imm&eacute;diatement">Contactez moi pour passer commande imm&eacute;diatement</option>
                    <option value="Question g&eacute;n&eacute;rale &agrave; propos de ce v&eacute;hicule" >Question g&eacute;n&eacute;rale &agrave; propos de ce v&eacute;hicule</option>
                </select></div></td>
            </tr>
            <tr>
            <td ><div class="input_text01">Message:</div></td>
            <td ><div class="input_outermessage"><textarea class="text_area" name="message" id="message" placeholder="Message:"></textarea></div></td>
            </tr>
            <tr>
            <td ></td>
            <td ><input type="submit" class="submit_btn" name="consult_to_spacs" value="" id="submit_inq" onclick="return validate_check()"></td>
            </tr>
          </table>
            <input type="hidden" name="car_id" value="<?php echo $_GET['carId'] ?>"/>
            <input type="hidden" name="title" value="<?php echo $_GET['title'] ?>"/>
            <input type="hidden" name="buyItNowPrice" value="<?php echo $_GET['buyItNowPrice'] ?>"/>
            <input type="hidden" name="postalCode" value="<?php echo $_GET['postalCode'] ?>"/>
            <input type="hidden" name="location" value="<?php echo $_GET['location'] ?>"/>
            <input type="hidden" name="listingType" value="<?php echo $_GET['listingType'] ?>"/>
            <input type="hidden" name="endson" value="<?php echo $_GET['endson'] ?>"/>
            <input type="hidden" name="endtimestamp" value="<?php echo $_GET['endtimestamp'] ?>"/>
            <input type="hidden" name="buyItNowAvailable" value="<?php echo $_GET['buyItNowAvailable'] ?>"/>
      </form>
      </div>
    </div>
    
    
    <div class="popup_bottom">
    <img src="<?php echo DEFAULT_URL;?>/images/bottom_bg.png" width="499" height="12" alt="" /></div>
  
</div>


<?php /*?><div id="homer" style="height:450px; width:440px;">

<div id="homer_iner">

  <h3>Cette annonce vous intéresse ?<br /> Contactez un spécialiste</h3>
<form name="inquir_form" id="inquir_form" method="post">
<div class="text_box_iner">
    <input type="text" value="Nom:" name="name" id="name" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Nom:':this.value;" />
    <input type="text" value="Pr&eacute;nom:" name="prename" id="prename" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Pr&eacute;nom:':this.value;" />
    <input type="text" value="Email:" name="email" id="email" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Email :':this.value;" />
    <input type="text" value="T&eacute;l&eacute;phone:" name="phone" id="phone" class="input_text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'T&eacute;l&eacute;phone:':this.value;" />  
    <select id="recall" name="recall" class="sele">
    	<option selected="" value="">A quel moment souhaitez-vous être contacté ?</option>
        <option value="9H - 10H">9H - 10H</option>
        <option value="10H - 11H">10H - 11H</option>
        <option value="11H - 12H">11H - 12H</option>
        <option value="12H - 13H">12H - 13H</option>
        <option value="13H - 14H">13H - 14H</option>
        <option value="14H - 15H">14H - 15H</option>
        <option value="15H - 16H">15H - 16H</option>
        <option value="16H - 17H">16H - 17H</option>
        <option value="17H - 18H">17H - 18H</option>
        <option value="18H - 19H">18H - 19H</option>
        <option value="19H - 20H">19H - 20H</option>
        <option value="20H - 21H">20H - 21H</option>
        <option value="21H - 22H">21H - 22H</option>
    </select>
    
    <select size="1" id="question" name="question" class="sele">
        <option value="Question concernant le paiement de ce v&eacute;hicule" >Question concernant le paiement de ce v&eacute;hicule</option>
        <option value="Avant de commander je souhaiterai avoir un conseille en ligne">Avant de commander je souhaiterai avoir un conseiller en ligne</option>
        <option value="Question concernant le transport de ce v&eacute;hicule" >Question concernant le transport de ce v&eacute;hicule</option>
        <option value="Je souhaiterai mieux comprendre le descriptif de l'annonce">Je souhaiterai mieux comprendre le descriptif de l'annonce</option>
        <option value="J'ai besoin d'une traduction pour pouvoir comprendre l'annonce" >J'ai besoin d'une traduction pour pouvoir comprendre l'annonce</option>
        <option value="Contactez moi pour passer commande imm&eacute;diatement">Contactez moi pour passer commande imm&eacute;diatement</option>
        <option value="Question g&eacute;n&eacute;rale &agrave; propos de ce v&eacute;hicule" >Question g&eacute;n&eacute;rale &agrave; propos de ce v&eacute;hicule</option>
    </select>
    <textarea class="text_area" name="message" id="message" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Message:' : this.value;">Message:</textarea>
    <input type="hidden" name="car_id" value="<?php echo $_GET['carId'] ?>"/>
    <input type="hidden" name="title" value="<?php echo $_GET['title'] ?>"/>
    <input type="hidden" name="buyItNowPrice" value="<?php echo $_GET['buyItNowPrice'] ?>"/>
    <input type="hidden" name="postalCode" value="<?php echo $_GET['postalCode'] ?>"/>
    <input type="hidden" name="location" value="<?php echo $_GET['location'] ?>"/>
    <input type="hidden" name="listingType" value="<?php echo $_GET['listingType'] ?>"/>
    <input type="hidden" name="endson" value="<?php echo $_GET['endson'] ?>"/>
    <input type="hidden" name="endtimestamp" value="<?php echo $_GET['endtimestamp'] ?>"/>
    <input type="hidden" name="buyItNowAvailable" value="<?php echo $_GET['buyItNowAvailable'] ?>"/>
    <input type="submit" class="form-submit" name="consult_to_spacs" value="" id="submit_inq" onclick="return validate_check()">
    </div>
</form>
</div></div><?php */?>
</body>
</html>