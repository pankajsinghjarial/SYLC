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
		
		if(name =='' || name == 'Nom:'){	
			validation ='Le nom doit être rempli.\n';
		}
		if(prename =='' || prename == 'Prénom:'){	
			validation +='Prénom doit être rempli.\n';
		}
		if(email == ''|| email=='Email:'){	
			
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(email)){
 				}
				else{
					validation +='E-mail doit être valide.\n';
				}		
		}
		if(phone == '' || phone=='Numéro de téléphone::'){	
			filter = /^-{0,1}\d*\.{0,1}\d+$/;
			if (filter.test(phone)) {
			}
		 	else{
				validation +='Numéro de téléphone doivent être valides.\n';
			}
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
<?php if(isset($_SESSION['sentmail_txt'])){ echo $_SESSION['sentmail_txt']; unset($_SESSION['sentmail_txt']);}?>
<div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <img class="top_page_banner" src="<?php echo DEFAULT_URL."/images/banner/banner_02_988x166.jpg"?>" alt="<?php  echo $terms->name; ?>"/>
     <div class="inner_page_one">
        <div class="inner_page_content_area">
        <div class="inner_page_content_area_top">&nbsp;</div>
        <div class="qui_txt_area"><p>We focus on American car auctions in all north America, please fill in the inquiry form below and you will be contacted by one of our representatives  </p>
        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
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
	width:120px;
	margin:5px 0 16px 0;
	height:50px;
	cursor:pointer;
	float:left;
}

#calc_error_sdasfsdf{
	display:block;
	position:absolute;
	right:0;
	top:6px;
}
#calc_error_sdasfsdf .err{
	border:#F00 solid 1px;
	font-size:14px;
	padding:3px;
	background-color:#F2F2F2;
	font-weight:bold;
}
#calc_error_sdasfsdfs .errs {
  background-color: #F2F2F2;
  border: 1px solid #FF0000;
  float: right;
  font-size: 14px;
  font-weight: bold;
  margin: -20px 29px 0 0;
  padding: 3px;
  width: 145px;
}

</style>

<div class="popup_cnt">
      <div class="popup_cnt01"><?php if(isset($error_msg) && $error_msg!="") echo '<span class="error_msg">'.$error_login_msg.'</span>';?><br/><br/>
      <form method="post" id="calci" name="calci">
       	<table width="100%" cellpadding="0" cellspacing="0">
        
        <tr>
        <td width="25%"><div class="input_text">Nom:</div></td>
        <td width="75%"><div class="input_outer"><input type="text" placeholder="Nom:" name="name" id="name" class="input_01" value="" /></div></td>
        </tr>
        <tr>
        <td ><div class="input_text">Pr&eacute;nom:</div></td>
        <td ><div class="input_outer"><input type="text" placeholder="Pr&eacute;nom:" name="prename" id="prename" class="input_01" value="" /> </div></td>
        </tr>
        <tr>
        <td ><div class="input_text">Email :</div></td>
        <td ><div class="input_outer"> <input type="text" placeholder="Email:" name="email" id="email" class="input_01"  value="" /></div></td>
        </tr>
        <tr>
        <td ><div class="input_text01">Num&eacute;ro de t&eacute;l&eacute;phone:</div></td>
        <td ><div class="input_outer"><input type="text" placeholder="Num&eacute;ro de t&eacute;l&eacute;phone:" name="phone" id="phone" class="input_01" value="" /></div></td>
        </tr>
        <tr>
        <td ></td>
        <td ><input type="submit" class="submit_btn" class="form-submit" name="add_to_sel" value="" id="submit_inq" onclick="return validate_check()" /></td>
        </tr>
      </table>
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

