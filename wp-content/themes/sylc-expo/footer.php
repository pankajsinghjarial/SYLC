<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<footer>
  

			<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
            <?php endif; // end sidebar widget area ?>
            
           
            
	
</footer>           
<?php /*?><footer>
  <div class="wrapper">
    <div class="footer_top">
      <ul>
        <li>
          <div class="socil_icon">
            <ul>
              <li><a href="http://www.facebook.com/Sylccorporation" target="_blank"><img src="<?php echo get_bloginfo('template_url')?>/images/fb-icon.png" width="30" height="30" alt="<?php echo the_title(); ?>"></a></li>
              <li><a href="http://www.youtube.com/user/yoathome?feature=results_main" target="_blank"><img src="<?php echo get_bloginfo('template_url')?>/images/youtube.png" width="30" height="30" alt="<?php echo the_title(); ?>"></a></li>
            </ul>
          </div>
        </li>
        <li><img src="<?php echo get_bloginfo('template_url')?>/images/phone-icon.png" class="img_left" alt="<?php echo the_title(); ?>">(Fr) 01.76.63.32.16</li>
        <li><img src="<?php echo get_bloginfo('template_url')?>/images/icon02.png" class="img_left01" alt="<?php echo the_title(); ?>">Hollywood, FL 33020</li>
        <li><img src="<?php echo get_bloginfo('template_url')?>/images/message-icon.png" class="img_left" alt="<?php echo the_title(); ?>"><a href="mailto:info@sylc-export.com">info@sylc-export.com</a></li>
      </ul>
    </div>
    <div class="footer_left">
      <div class="link_outer">
        <p>Liens du Site</p>
        <ul>
          <li><a href="presentation.html">Présentation</a></li>
          <li><a href="media.html">Média</a></li>
          <li><a href="classic_car.html">Inventaire</a></li>
          <li><a href="search_classic_car.html">Recherche</a></li>
        </ul>
      </div>
      <div class="link_outer">
        <p>À Propos de Nous</p>
        <ul>
          <li><a href="notre-mission.html">Logistique</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="our_services.html">Nos services</a></li>
          <li><a href="contact.html">Contactez-nous</a></li>
        </ul>
      </div>
    </div>
    <div class="footer_right">
      <p>Top Marques à Vendre</p>
      <ul>
        <li><a href="new_car.html">Dodge</a></li>
        <li><a href="new_car.html">Lincone</a></li>
        <li><a href="new_car.html">Ford</a></li>
        <li><a href="new_car.html">General Motors</a></li>
      </ul>
      <ul>
        <li><a href="new_car.html">Chevrolet</a></li>
        <li><a href="new_car.html">Cadillac</a></li>
        <li><a href="new_car.html">Jeep</a></li>
        <li><a href="new_car.html">Hummer</a></li>
      </ul>
      <ul>
        <li><a href="new_car.html">Pontiac</a></li>
        <li><a href="new_car.html">Buick</a></li>
        <li><a href="new_car.html">GMC</a></li>
        <li><a href="new_car.html">Mustang</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="copyright_outer">
    <p>Hollywood, FL 33020  |  Numero Francais: 01.76.63.32.16<br>
      Droits d'auteur © <a href="#">Sylc Corporation.</a> Tous droits réservés  |  <a href="/sitemap">Sitemap</a></p>
  </div>
</footer><?php */?>

<?php wp_footer(); ?>
<script language="javascript" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/COND_LIST1/chainedmenu.js">
/***********************************************
* Chained Select Menu- By Xin Yang (http://www.yxscripts.com/) & Dynamic Drive (http://dynamicdrive.com)
* Script featured on/available at http://www.dynamicdrive.com/
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
* This notice must stay intact for legal use!
***********************************************/
</script>
<script language="javascript" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/COND_LIST1/config2_US.js"></script>

<script type="text/javascript">
function checkValidation(){
	var errorMsg = "";
	var ok = true;
	if(document.getElementById('firstlevel').value == ''){
		errorMsg += "S'il vous plaît choisissez Créer\n";
		ok = false;
	}
	if(document.getElementById('secondlevel').value == ''){
		errorMsg += "S'il vous plaît choisir le modèle\n";
		ok = false;
	}
	if(document.getElementById('thirdlevel').value == ''){
		errorMsg += "S'il vous plaît choisissez Acheter\n";
		ok = false;
	}
	if(document.getElementById('from').value == ''){
		errorMsg += "S'il vous plaît entrer d'année\n";
		ok = false;
	}else{
		if (chkNumeric(document.getElementById('from').value) == false && document.getElementById('from').value != ""){
			errorMsg += "S'il vous plaît entrer d'année en numérique\n";
			ok = false;
		}
	}
	if(document.getElementById('to').value==''){
		errorMsg += "S'il vous plaît entrer à l'année\n";
		ok = false;
	}else{
		if (chkNumeric(document.getElementById('to').value) == false && document.getElementById('to').value != ""){
			errorMsg += "S'il vous plaît entrer à l'année en numérique\n";
			ok = false;
		}
	}
	if(document.getElementById('comments').value == ''){
		errorMsg += "S'il vous plaît Entrer le message\n";
		ok = false;
	}
	if(document.getElementById('company').value == ''){
		errorMsg += "S'il vous plaît Entrez Nom de la société\n";
		ok = false;
	}	
	if(document.getElementById('contact').value == ''){
		errorMsg += "S'il vous plaît Entrez Personne-ressource\n";
		ok = false;
	}	

	if(document.getElementById('phone').value == ''){
		errorMsg += "S'il vous plaît Entrez Téléphone\n";
		ok = false;
	}else{
		if (chkNumeric(document.getElementById('phone').value) == false && document.getElementById('phone').value != ""){
			errorMsg += "S'il vous plaît Entrez Téléphone numérique\n";
			ok = false;
		}
	}
	if(document.getElementById('email').value == ''){
		errorMsg += "S'il vous plaît Entrer courriel\n";
		ok = false;
	}else{
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
            if(!emailPattern.test(document.getElementById('email').value)){
                errorMsg += "S'il vous plaît entrer une adresse valide\n";
				ok = false;
            }
    }
	if(document.getElementById('agree').checked == false){
		errorMsg += "S'il vous plaît accord avec les Conditions\n";
		ok = false;
	 }
	if(errorMsg != ""){
		alert("S'il vous plaît corriger les erreurs Suite\n\n"+errorMsg);
		return ok;
	}else{
		return ok;
	}	
}
function chkNumeric(strString){
	var strValidChars = "0123456789-";
	var strChar;
    var blnResult = true;
    if (strString.length == 0) return false;

    //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++){
	strChar = strString.charAt(i);
	if (strValidChars.indexOf(strChar) == -1){
		blnResult = false;
    }
   }
   return blnResult;
}
</script>





<script>

function checkValidation222(){
	var errorMsg = "";
	var ok = true;
	if(document.getElementById('firstlevel').value == ''){
		errorMsg += "S'il vous plaît choisissez Créer\n";
		ok = false;
	}
	if(document.getElementById('secondlevel').value == ''){
		errorMsg += "S'il vous plaît choisir le modèle\n";
		ok = false;
	}
	if(document.getElementById('thirdlevel').value == ''){
		errorMsg += "S'il vous plaît choisissez Acheter\n";
		ok = false;
	}	
	if(document.getElementById('contact').value == ''){
		errorMsg += "S'il vous plaît Entrez Personne-ressource\n";
		ok = false;
	}	

	if(document.getElementById('phone').value == ''){
		errorMsg += "S'il vous plaît Entrez Téléphone\n";
		ok = false;
	}else{
		if (chkNumeric(document.getElementById('phone').value) == false && document.getElementById('phone').value != ""){
			errorMsg += "S'il vous plaît Entrez Téléphone numérique\n";
			ok = false;
		}
	}
	if(document.getElementById('email').value == ''){
		errorMsg += "S'il vous plaît Entrer courriel\n";
		ok = false;
	}else{
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
            if(!emailPattern.test(document.getElementById('email').value)){
                errorMsg += "S'il vous plaît entrer une adresse valide\n";
				ok = false;
            }
        }
	if(document.getElementById('agree').checked == false){
		errorMsg += "S'il vous plaît accord avec les Conditions\n";
		ok = false;
	 }
	if(errorMsg != ""){
		alert("S'il vous plaît corriger les erreurs Suite\n\n"+errorMsg);
		return ok;
	}else{
		return ok;
	}	
}
function chkNumeric(strString){
	var strValidChars = "0123456789-";
	var strChar;
    var blnResult = true;
    if (strString.length == 0) return false;

    //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++){
	strChar = strString.charAt(i);
	if (strValidChars.indexOf(strChar) == -1){
		blnResult = false;
    }
   }
   return blnResult;
}
function logcheckform()
{
make = 'popuser';
model = 'poppass';

error = "";
	if(document.getElementById(make).value == '' || document.getElementById(model).value == '' )
	{
		error = "S'il vous plaît remplir tous les champs.";
		
	}
	
	if(error != '')
	{
		errormsg = error;
		document.getElementById('errorpop').innerHTML = "";
		document.getElementById('errorpop').innerHTML = errormsg;
		document.getElementById('errorpop').style.display = '';
		return false;	
	}
	else
	{
		ajaxrequest(document.getElementById(make).value,document.getElementById(model).value)
		return false;
	}
	
}
function ajaxrequest(username,password)
{
	jQuery("#model_div").html("");
	jQuery("#model_div").append('<img src="<?php echo get_bloginfo('template_url')?>/images/popup/loading.gif" />');	
 	 jQuery.ajax({

				  type: "POST",

				  url: "<?php echo get_bloginfo('template_url')?>/ajax.php",

				  data: {page: username, id: password},

				  dataType: "html",

				  success: function(data) {

								jQuery("#model_div").html("");

								jQuery("#model_div").append(data);
							
							  }
					
				});
}
function logoutajaxrequest()
{
	 jQuery.ajax({

				  type: "POST",

				  url: "<?php echo get_bloginfo('template_url')?>/ajax.php",

				  data: {page: 'logout'},

				  dataType: "html",

				  success: function(data) { location.reload(); }
					
				});
}
function locate(id)
{
	location.href = 'http://www.sylc-export.com/voitures-americaines/landing.php?lead_detail='+id;
	//location.href( '>http://www.seobranddev.com/sylc-corporation/voiture/landing.php?lead_detail='+id);
}
</script>

<div style="display:none">
<div class="account_box no_bdr" id="inline_content_log">
<div class="sylc_logo"><img src="<?php echo get_bloginfo('template_url')?>/images/popup/logo.png" width="217" height="58" alt="<?php echo the_title(); ?>"></div>
<p class="pop_text" style="text-align: center;">Si Vous avez déjà un compte, veuillez vous identifier. </p>
  <p class="pop_text" id="errorpop" style="color:red; display:none;"></p> 
   <div id="model_div" style="padding: 1%;"></div> 
   <form method="post" onsubmit="return logcheckform()" id="memlogform">
    <ul>    
    <li><span class="left_text"> 
Nom D'Utilisateur :</span><input type="text" value="" name="username" id="popuser" class="input_acc02"> </li>
  <li><span class="left_text">Mot de Passe: </span><input type="password" id="poppass" value="" name="password" class="input_acc02"></li>
  <li><span class="left_text se_conncetr"><input type="submit" class="order_now_bt" name="submit" value="Se connecter"></span>
  <input type="button" class="order_now_bt" name="submit" value="Effacer" onclick="this.form.reset();"></li>
   </ul>
    </form>
    </div>
</div>

<div style="display:none">
<div class="account_box no_bdr" id="inline_content_detail">
<div class="sylc_logo"><img src="<?php echo get_bloginfo('template_url')?>/images/popup/logo.png" width="217" height="58" alt="<?php echo the_title(); ?>"></div>
<p class="pop_text">Bienvenue <?php echo $_SESSION['loginuser']['username'];?>,</p>
<p class="pop_text">

S'il vous plait sélectionner la page de profil de voiture que vous souhaitez consulter</p>
    
    <div class="car_info_collm" id="">
    
  <table class="three_collm_tbl">
  <?php 
  if(isset($_SESSION['loginuser']['id'])) { 
  $loginid = $_SESSION['loginuser']['id'];
  $concar=mysql_connect("localhost","sylcexpo_syadmin","admin1234");
  // Check connection
  mysql_select_db('sylcexpo_sylcorp',$concar);
  $result = mysql_query("select l.*,ld.* from lead_details as ld left join leads as l on l.id=ld.lead_id where l.user_id = '$loginid'");
if(mysql_num_rows($result) > 0 )	{
if(mysql_num_rows($result) == 1) { $row = mysql_fetch_object($result);?>
	<script type="text/javascript">location.href = 'http://www.sylc-export.com/voitures-americaines/landing.php?lead_detail=<?php echo $row->id ?>';</script> <?php  }
while($row = mysql_fetch_object($result))
{ ?>
  <tr>
    <td style="width:18%" class="al_center"><img src="http://www.sylc-export.com/voitures-americaines/gallery/<?php echo $row->main_image ?>" width="120" height="69" alt="<?php echo the_title(); ?>"></td>
    <td style="width:50%" class="midd_bg"><div class="car_name"><?php echo $row->car_brand." ".$row->model; ?> </div><div class="car_price01"><?php if($row->carprice) { echo '$'.number_format($row->carprice,2); } else { echo  "No Price Information"; } ?></div></td>
    <td style="width:30%" class="al_center"><input type="button" class="order_now_bt" name="Order Now" value="Voir Plus D'infos" onclick="locate(<?php echo $row->id ?>);"></td>
  </tr>
  <?php }}else{?>
   <tr>
     <td class="midd_bg"><div class="car_price01">NO Information Available</div></td>
 </tr>
  <?php } } ?>
 
  

  
</table>

  </div>
    </div>
</div>
    <?php 
 
    if($_SESSION['loginuser']['popup'] == 1 && mysql_num_rows($result) > 1) { $_SESSION['loginuser']['popup'] = 0; ?>
    <script type="text/javascript">
    $(document).ready(function(){
		$('#cardetailpop').click();
    });
    </script>
    <?php }?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42366394-1', 'sylc-export.com');
  ga('send', 'pageview');

</script>



</body>
<script type="text/javascript"> 
changebg();
</script>

</html>
