<div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <img class="top_page_banner" src="<?php echo DEFAULT_URL."/images/banner/banner_02_988x166.jpg"?>" alt="<?php  echo $terms->name; ?>"/>
     <div class="inner_page_one">
        <div class="inner_page_content_area">
        <div class="inner_page_content_area_top">&nbsp;</div>
        <div class="head_1">Création de compte</div>
        <div class="qui_txt_area"><h2>Saisissez vos coordonnées</h2>
        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo DEFAULT_URL; ?>/js/useraccount.js" type="text/javascript"></script>
<style type="text/css">
.popup_cnt {
	width:100%;
	overflow:hidden;
	margin:0 auto;
}	
.popup_cnt01 {
	overflow:hidden;
}
.input_text {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:10px 23px 0 0;
	}
.input_text01 {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:4px 23px 0 0;
	}

.input_outer {
	width:284px;
	height:37px;
	background:url(images/input_outer.jpg) no-repeat;
	border:none;
	margin:0 0 20px 0;
}
.input_outer input {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}
.input_outer select {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}

.submit_btn {
	background:url(images/submit.png) no-repeat;
	border:none;
	width:169px;
	margin:5px 0 16px 0;
	height:50px;
	cursor:pointer;
}

#user_error_email{
	display:block;
	position:relative;
	right:0;
	top:6px;
}
#user_error_email .err{
	border:#F00 solid 1px;
	font-size:14px;
	padding:3px;
	background-color:#F2F2F2;
	font-weight:bold;
}
#user_error_password .errs {
  background-color: #F2F2F2;
  border: 1px solid #FF0000;
  float: right;
  font-size: 14px;
  font-weight: bold;
  margin: -20px 0px 0 0;
  padding: 3px;
  width: 145px;
}

#user_error_conpswd .errs {
  background-color: #F2F2F2;
  border: 1px solid #FF0000;
  float: right;
  font-size: 14px;
  font-weight: bold;
  margin: -20px 0px 0 0;
  padding: 3px;
  width: 145px;
}
</style>


<div class="popup_cnt">
      <div class="popup_cnt01">
      <?php if(isset($error_msg) && $error_msg!=""){ echo '<span class="error_msg">'.$error_msg.'</span>'; }?> <br/><br/>
      <form onsubmit="return onSubmitCheck();" method="post" id="calci" name="calci">
      	<table width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
        <td width="36%"><div class="input_text">Civilité:</div></td>
        <td width="64%"><div style="position:relative;" class="input_outer"> 
        <select id="prefix" name="prefix">
        	<option value="Monsieur">Monsieur</option>
         	<option value="Mademoiselle">Mademoiselle</option>
          	<option value="Madame">Madame</option>
        </select>        
        </div>        	
        </td>
        </tr>
        <tr>
        <td><div class="input_text">Prénom:</div></td>
        <td><div style="position:relative;" class="input_outer"> 
        <input type="text" value="" class="input_01" id="firstname" name="firstname">
        </div></td>
        </tr>
        <tr>
        <td><div class="input_text">Nom:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="name" name="name"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Date de naissance:</div></td>
        <td><div class="input_outer02">
        	<select name="birthday_day" id="birthday_day">
                	 <option value="">Jour</option>
                	 <?php for($d=1;$d<=31;$d++){?>
                	 <option value="<?php echo $d;?>"><?php echo $d;?></option>   
                	 <?php }?>                  
       		</select>
       		<select name="birthday_month" id="birthday_month">
                	<option value="">Mois</option>
					<?php for($m=1;$m<=12;$m++){?>
                	 <option value="<?php echo $m;?>"><?php echo $m;?></option>   
                	 <?php }?>				
       		</select>
       		<select name="birthday_year" id="birthday_year">
                	<option value="">Année</option>
					<?php for($y=1900;$y<=date('Y');$y++){?>
                	 <option value="<?php echo $y;?>"><?php echo $y;?></option>   
                	 <?php }?>
       		</select></div>
        </div></td>
        </tr>
        <tr>
        <td><div class="input_text">Adresse:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="address" name="address"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Code postal:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="postal_code" name="postal_code"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Ville:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="city" name="city"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Pays:</div></td>
        <td><div class="input_outer">
        <select name="country">
        	<option value="Allemagne">Allemagne</option>
			<option value="Andorre">Andorre</option>
			<option value="Autriche">Autriche</option>
			<option value="Belgique">Belgique</option>
			<option value="Danemark">Danemark</option>
			<option value="Espagne">Espagne</option>
			<option value="Estonie">Estonie</option>
			<option value="Finlande">Finlande</option>
			<option value="France">France</option>
			<option value="Gibraltar">Gibraltar</option>
			<option value="Grèce">Grèce</option>
			<option value="Groenland">Groenland</option>
			<option value="Irlande">Irlande</option>
			<option value="Islande">Islande</option>
			<option value="Italie">Italie</option>
			<option value="Latvia">Latvia</option>
			<option value="Liechtenstein">Liechtenstein</option>
			<option value="Luxembourg">Luxembourg</option>
			<option value="Monaco">Monaco</option>
			<option value="Norvège">Norvège</option>
			<option value="Pays-Bas">Pays-Bas</option>
			<option value="Portugal">Portugal</option>
			<option value="Royaume Uni">Royaume Uni</option>
			<option value="San-Marin">San-Marin</option>
			<option value="Suède">Suède</option>
			<option value="Suisse">Suisse</option>
			<option value="Vatican">Vatican</option>
		</select>
        </div></td>
        </tr>
        <tr>
        <td><div class="input_text">Téléphone principal:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="phone_number" name="phone_number"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Téléphone secondaire(facultatif):</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="sec_phone_number" name="sec_phone_number"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Email de contact:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="email" name="email">
        <div id="user_error_email" onmouseover="$(this).hide('slow');"></div>
        </div></td>
        </tr>
        <!-- <tr>
        <td><div class="input_text">Confirmez votre email:</div></td>
        <td><div class="input_outer"><input type="text" value="" class="input_01" id="confirm_email" name="confirm_email"></div></td>
        </tr> -->
        <tr>
        <td><div class="input_text">Mot de passe(6 caractères minimum):</div></td>
        <td><div class="input_outer"><input type="password" value="" class="input_01" id="password" name="password">
        <div id="user_error_password" onmouseover="$(this).hide('slow');"></div></td>
        </tr>
        <tr>
        <td><div class="input_text">Confirmez votre mot de passe:</div></td>
        <td><div class="input_outer"><input type="password" value="" class="input_01" id="confirm_password" name="confirm_password">
        <div id="user_error_conpswd" onmouseover="$(this).hide('slow');"></div>
        </div></td>
        </tr>
        <tr>
        <td><div class="input_text"><input type="checkbox" onclick="ValCondGen();" id="cgv" name="cgv" value="1"></div></td>
        <td>J'ai lu et j'accepte les conditions générales. <br>
			<a target="_blank" href="<?php echo DEFAULT_URL;?>/page/terms-and-conditions">Lire les conditions générales</a></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="" class="submit_btn" name="calci_submit" id="btValidation"></td>
        </tr>
        
      </tbody></table>
      </form>
      </div>
    </div>

</div>
          <div class="inner_page_content_area_bottom">&nbsp;</div>
        </div>
        
        
        <div class="clear"></div>
      </div>   
  <?php  include(LIST_ROOT."/includes/views/staticsidebar.php"); ?>
      <div class="clear"></div>
      </div></div> 
 <div class="clear"></div>

  </div>

