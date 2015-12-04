<?php include("conf/config.inc.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo DEFAULT_URL; ?>/css/popup.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo DEFAULT_URL; ?>/css/index_popup/style.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo DEFAULT_URL; ?>/css/index_popup/reset.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  
  _gaq.push(['_setAccount', 'UA-34824523-1']);
  _gaq.push(['_trackPageview','/index_page_enquiry']);
  
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
	$(document).ready(function(){
		formcheck();
		var oldPrice = $("#Slider1").val();
		
	});
	
	function validate_check()
	{
	

		var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var ck_number = /^-{0,1}\d*\.{0,1}\d+$/;
		
		var validation='';
		var name = document.getElementById("name").value;
		var prename = document.getElementById("prename").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;	
		var password = document.getElementById("password").value;
		var confirm_password = document.getElementById("confirm_password").value;
		if (password == "" || confirm_password == "" ) {
			validation = "S'il vous pla&icirc;t remplir tous les champs";
		}
		if(name =='' || name == 'Nom:'){	
			validation ='Le nom doit &ecirc;tre rempli.<br/>';
		}
		if(prename =='' || prename == 'Prénom:'){	
			validation +='Pr&eacute;nom doit &ecirc;tre rempli.<br/>';
		}
		if(email == ''|| email=='Email:'){	
			
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(email)){
 				}
				else{
					validation +='E-mail doit &ecirc;tre valide.<br/>';
				}		
		}
		if(phone == '' || phone=='Numéro de téléphone::'){	
			filter = /^-{0,1}\d*\.{0,1}\d+$/;
			if (filter.test(phone)) {
			}
		 	else{
				validation +='Num&eacute;ro de t&eacute;l&eacute;phone doivent &ecirc;tre valides.\n';
			}
		}

		
		if(validation){
			$('.error_msg').html("S'il vous pla&icirc;t remplir tous les champs");
			return false;
		}
		
		if( $('#cgv').is(":checked") == false ) {
			$('.error_msg').html("Vous n'&ecirc;tes pas d'accord avec la politique d'entreprise. S'il vous pla&icirc;t accepter politique");
			return false;
		}
		else{
			
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-34824523-1']);
			_gaq.push(['_trackPageview']);
			
			
			$('#action_btn').css('color',"#FF4A0B");
			$('#action_btn').html('attente....');
			$.ajax({
				url: 'includes/code/index_enquiry.php',
				type: "post",
				data : $('#inquir_form').serialize()+"&"+$('#seach_index_form').serialize(),
				success: function(response, textStatus, jqXHR){
					if(response == 1) {
						$('#action_btn').html("Redirection ... s'il vous pla&icirc;t patienter");
						$('.error_msg').css('color',"#FF4A0B");
						$('.error_msg').html("Nous avons ajout&eacute; votre demande avec succ&egrave;s");
						setTimeout(function() {
							$.colorbox.close();
							<?php if(!empty($_REQUEST['act'])) { ?>
								window.location = '<?php echo DEFAULT_URL; ?>/advancesearch';
							<?php } else { ?>
								$('#seach_index_form').submit();
							<?php } ?>
						}, 2000);
						
					}
					else {
						$('.error_msg').css('color',"red");
						$('.error_msg').html(response);
						$('#action_btn').html('<input type="submit" class="popup_submit"  name="index_enquiry"  id="submit_inq" onclick="return validate_check()" />');
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					
				},
				complete: function(){  
				
				}
			});
			return false;
		}
}
</script>
</head>

<body>

      
	
<div class="popup" style="height:700px; width:566px;">
	
	<div class="popup_main_outer">
		
	<div class="popup_main">
    		<div class="popup_title">Acc&egrave;s &agrave; plus de 29,000 voitures am&eacute;ricaines! <span>Entrez vos informations pour acc&eacute;der &agrave; notre inventaire!</span></div>
		
            <form name="inquir_form" id="inquir_form" method="post">
            <ul>
		<li class="error_msg"></li>
            <li>
            	<div class="label">Nom<span class="red">*</span>:
                </div>
                <input type="text"  name="name" id="name" class="popup_textbox" value="" />
                
            </li>
            
            <li>
            	<div class="label">Pr&eacute;nom<span class="red">*</span>:
                </div>
                <input type="text"  name="prename" id="prename" class="popup_textbox" value="" />
                
            </li>
            
            
            <li>
            	<div class="label">Email<span class="red">*</span>:
                </div>
                <input type="text"  name="email" id="email" class="popup_textbox"  value="" />
                
            </li>
            <input type="hidden"  name="form" value="index_enquiry" />
            <li>
            	<div class="label">Num&eacute;ro de t&eacute;l&eacute;phone<span class="red">*</span>:
                </div>
                <input type="text"  name="phone" id="phone" class="popup_textbox" value="" />
                
            </li>
			
			
            <li>
            	<div class="label">Mot de passe (6 caract&egrave;res minimum)<span class="red">*</span>:
                </div>
                <input type="password"  name="password" id="password" class="popup_textbox"  value="" />
                
            </li>
			
			
            <li>
            	<div class="label">Confirmez votre mot de passe<span class="red">*</span>:
                </div>
                <input type="password"  name="confirm_password" id="confirm_password" class="popup_textbox"  value="" />
                
            </li>
			
			<li>
            	<div class="label"></div>
                <input type="checkbox"  id="cgv" name="cgv" value="1">
					<span style="font-size:12px; color: #FF0000">J'ai lu et j'accepte les conditions g&eacute;n&eacute;rales. <br>
					<a target="_blank" style="color: #0000FF; margin-left:18px" href="<?php echo DEFAULT_URL;?>/page/terms-and-conditions">Lire les conditions g&eacute;n&eacute;rales</a>
					</span>
                
            </li>
            
                  <li id="action_btn">
            	
                <input type="submit" class="popup_submit"  name="index_enquiry"  id="submit_inq" onclick="return validate_check()" />
                
                
            </li>
            
            </ul>
	    </form>
    </div>
</div>
</div>


</body>
</html>
