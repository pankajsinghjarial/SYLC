<?php //session_start(); //require 'admin/config/database.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="admin/images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Syl Corporation</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<!-- font script start here-->
<script src="validation.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/fonts.js" type="text/javascript"></script>
<!-- font script end here-->
<link rel="stylesheet" type="text/css" href="css/slider.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script language="javascript" type="text/javascript">
// Roshan's Ajax dropdown code with php
// This notice must stay intact for legal use
// Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
// If you have any problem contact me at http://roshanbh.com.np
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getModel(carbrandId) {	
			
		
		var strURL="findModel.php?carbrand="+carbrandId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('modelli').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getSubModel(carbrandId,modelId) {		
		var strURL="findSubModel.php?carbrand="+carbrandId+"&model="+modelId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('submodelli').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
</head>
<body>
<div id="header">
  <div class="wrapper"> <a href="" class="logo"></a>
    <div class="commingsoon">
      <p>Pour accéder à notre site, <br /><a href="http://www.sylc-export.com/" target="_blank">CLIQUEZ ICI!</a></p>      
    </div>
  </div>
</div>
<div id="banner">
  <div id="headerimgs">
    <div id="headerimg1" class="headerimg"></div>
    <div id="headerimg2" class="headerimg"></div>
  </div>
  <div class="wrapper"> <img class="arrow" src="images/arrow.png" alt="Arrow" />
    <ul class="banner_form">
      <li class="banner_txt"> <img src="images/banner_text.png" alt="Syl Corporation" /> </li>
      <li class="form_panel">
        <div class="contactus_panel"></div>
        <div class="banner_top"></div>
        <div class="banner_bot">
        <?php  $currenttime_canada =  date("Y-m-d,  H:i:s", strtotime("+2 hours"));?>
          <ul class="fields">
            <form name="" method="post" action="contact.php">
            
            <?php if($_GET['error']!=''){?><li><?php echo "S'il vous plaît entrez le code captcha correct";?></li><?php }else{?><li>&nbsp;</li><?php }?>
              <li>
              <?php //echo $_SESSION['name'];?>
                <input class="input" name="name" id="name" onfocus="if (this.value == 'Nom') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Nom';}" type="text" value="Nom" />
              </li>
              <li>
                <input class="input" name="fname" id="fname" onfocus="if (this.value == 'Prenom') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Prenom';}" type="text" value="Prenom" />
              </li>
              <li>
                <input class="input" name="email" id="email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" type="text" value="Email" />
              </li>
              <li>
                <input class="input" name="phone" id="phone" onfocus="if (this.value == 'Numero de telephone') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Numero de telephone';}" type="text" value="Numero de telephone" />
              </li>
              <li class="dropdown">
                <select  name="firstlevel" id="firstlevel" onChange="getModel(this.value)">
                  <option value="Choisissez une marque" selected="selected">Choisissez une marque</option>
                  <option value="1">Aston Martin</option>
                  <option value="2">Bentley</option>
                  <option value="3">Buick</option>
                  <option value="4">Cadillac</option>
                  <option value="5">Chevrolet</option>
                  <option value="6">Dodge</option>
                  <option value="7">Ford</option>
                  <option value="8">GMC</option>
                  <option value="9">HUMMER</option>
                  <option value="10">Jaguar</option>
                  <option value="11">Lincoln</option>
                  <option value="12">Lotus</option>
                  <option value="13">Nissan</option>
                  <option value="14">Pontiac</option>
                  <option value="15">Porsche</option>
                  <option value="16">Rolls Royce</option>
                  <option value="17">Toyota</option>
                </select>
              </li>
              <li class="dropdown" id="modelli">
              <span class="left_text"> Choisissez un modele: </span>
                <select name="model" id="model" >
                  <option value="Choisissez un model" selected="selected">Choisissez un modele</option>
                </select>
              </li>
              <!--<li class="dropdown" id="submodelli">
                <select name="sub_model" id="sub_model">
                  <option value="Choisissez un modele sous" selected="selected">Choisissez un modele sous</option>
                </select>
              </li>-->
              <!--<li>
                <input class="input" name="model" id="model" onfocus="if (this.value == 'Modele') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Modele';}" type="text" value="Modele" />
              </li>-->
              <li>
                <input class="input" name="year" id="year" onfocus="if (this.value == 'Annee') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Annee';}" type="text" value="Annee" />
              </li>
              <li>
                <input class="input" name="service" id="service" onfocus="if (this.value == 'Pays d&#96;importation') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Pays d&#96;importation';}" type="text" value="Pays d&#96;importation" />
              </li>
              <!-- <li>
              <input class="input" name="Country_export" id="Country_export" onfocus="if (this.value == 'Pays d&#96;exportation') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Pays d&#96;exportation';}" type="text" value="Pays d&#96;exportation" />
            </li>-->
             <li  class="last">   
            <?php


  require_once('recaptchalib.php');
  $publickey = "6Lexq-ASAAAAAF0W3uTjl5OqEbyocQsUw1j_a9V_"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
  ?>
    
      </li>
            
              <li class="last1">
              <div class="popup_form">  <div id='basic-modal1'>J'ai lu et j'accepte expréssément la <a href='#' class='basic1'>politique de confidentialité. </a></div></div>
                 <input type="hidden" value="<?php echo $currenttime_canada ?>" id="currenttime_canada" name="currenttime_canada"/>
                <input name="" class="submit" src="images/submit.png" type="image" onclick="return checkForm();" />
              </li>
            </form>
          </ul>
         
        </div>
      </li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div id="container">
  <div id="wrapper_content">
    
    <div class="content_top"></div>
    <div id="content">
      <div class="content_inner">
        <div class="first_row">
          <div class="col_first">
            <div class="col_first_header"> <img src="images/heading1.png" alt="" /> </div>
            <div class="col_first_mid">
              <div class="col_first_mid_inner">
                <p>SYLC CORPORATION, établi depuis 7 ans dans le secteur de l'automobile,  est spécialisé dans l'exportation de véhicules en tous genres en provenance des EtatsUnis.</p>
                <p><strong>SYLC CORPORATION</strong> offre une liste de services incomparables pour vous aider à trouver la voiture de vos rêves et l'expédier vers la destination de votre choix en respectant impérativement la législation en vigueur du  pays d'importation </p>
                <p><strong>SYLC CORPORATION</strong> est implantée a Miami en Floride, lieu <br />
                  stratégique d'où sont pilotées toutes les exportations de voitures américaines vers l'Europe et particulièrement la France.</p>
                <p><strong>SYLC CORPORATION </strong>opère dans les règles de l'art avec une Licence revendeur, agréée et assurée par l'état de Floride. Ces éléments <strong>donnent toute satisfaction</strong> à nos clients en termes de confort et de sécurité, sachant que notre compagnie adhère à toutes les règles et lois définies par les Etats Unis en matière d'exportation.</p>
              </div>
            </div>
          </div>
          <div class="col_second">
          
          
            <div class="col_second_header">POURQUOI SYLC CORPORATION?</div>
            <div class="col_second_mid">
              <div class="col_second_mid_inner">
                <div class="pour_top">
                  <p><strong>SYLC CORPORATION</strong> ne prend aucune marge commerciale sur les frais liés à l'achat d'un véhicule tels que le transport domestique, maritime ou encore sur la négociation d'un véhicule. Notre rémunération est une commission fixe. Notre priorité est de <strong>gagner votre confiance</strong> et votre satisfaction en vous accompagnant dans la recherche de votre véhicule jusqu'à la livraison à votre domicile.</p>
                </div>
                <div class="pour_bot">
                  <div id="contactFormContainer">
                    <div id="contactForm">
                      <div class="loader"></div>
                      <div class="bar"></div>
                      <form action="#" class="contactForm" name="cform" method="post">
                        <h2><span><img src="images/fancy_close.png" class="close" alt=" " /></span></h2>
                        <div class="popup_iner">
                          <ul>
                            <li>
                              <input class="input_pop" name="" value="Nom:" onfocus="if (this.value == 'Nom:') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Nom:';}" type="text" />
                            </li>
                            <li>
                              <input class="input_pop" name="" value="Prénom:" onfocus="if (this.value == 'Prénom:') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Prénom:';}" type="text" />
                            </li>
                            <li>
                              <input class="input_pop" name="" value="Email:" onfocus="if (this.value == 'Email:') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email:';}" type="text" />
                            </li>
                            <li>
                              <input name="" class="input_pop" value="Numéro de Téléphone:" onfocus="if (this.value == 'Numéro de Téléphone:') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Numéro de Téléphone:';}" type="text" />
                            </li>
                            <li>
                              <textarea name="" cols="" rows="" onfocus="if (this.value == 'Question:') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Question:';}">Question:</textarea>
                            </li>
                            <li>
                              <input name="" src="images/soumetre.png" type="image" />
                            </li>
                          </ul>
                        </div>
                      </form>
                    </div>
                  </div>
                  <p class="subheading">QUESTIONS? DEMANDEZ Á NOTRE AVOCAT!</p>
                  <img class="pour_bot_img" src="images/img1.jpg" alt="" />
                  <p>Charles Serfaty, P.A. est licencié en droit depuis 1989. Il réside en Floride et est très réputé parmi la communauté francophone de la Floride. SYLC 
                    Corporation met à votre disposition ce service d'avocat pour vous aider à sécuriser votre véhicule ou encore pour vous aider à resoudre tout dilemme quelconque. </p>
                  <p class="contact">Soumettre ma Question!</p>
                  <div class="clear"></div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="first_row">
      
      <img src="images/hor_adds.jpg" alt="Ads" />
      </div>
        <div class="first_row">
          <div class="col_first1">
            <div class="col_first_header1"> <img src="images/bankofindia.jpg" alt="" /> </div>
            <div class="col_first_mid1">
              <div class="col_first_mid1_inner"> <a href="images/BOA .pdf" target="_blank"><img class="bankamerica" src="images/bank.jpg" alt="" /></a> <img class="cert" src="images/certificate.jpg" alt="" /> <img src="images/cert_text.jpg" alt="" /> </div>
            </div>
          </div>
          <div class="col_second1">
            <div class="col_second_header">Témoignages de clients satisfaits!</div>
            <div class="col_second_mid1">
              <div class="col_second_mid_inner1">
                <div class="pour_bot1"> <img src="images/test1.jpg" alt="" />
                  <div class="testimonial">J'adore ma nouvelle voiture Americaine! Merci SYLC Corporation pour votre professionalisme et votre perséverance! </div>
                  <div class="name">-- Staphie Wattson</div>
                  <div class="clear"></div>
                </div>
                <div class="pour_bot1"> <img src="images/test2.jpg" alt="" />
                  <div class="testimonial">Je cherchais une Ford Escalade a un prix abordable en Europe mais sans succès. Merci a SYLC Corporation pour avoir trouvé le véhicule de mes rêves à un prix raisionnable. </div>
                  <div class="name">-- Jean-Luc Chavert</div>
                  <div class="clear"></div>
                </div>
                <div class="pour_bot1 backgroundnone"> <img src="images/test3.jpg" alt="" />
                  <div class="testimonial">SYLC a trouvé mon véhicule et me l'a livré jusqu'à mon domicile. Grâce à sa license je n'ai eu aucun problème!Merci! </div>
                  <div class="name">-- Paul Pinot</div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="first_row roaddesign">
          <ul>
            <li><img src="images/sylc.png" alt="" /></li>
            <li>
              <p>Du transport terrestre, sur le territoire américain, jusqu'a l'envoie par bateau ou avion, SYLC CORPORATION <br />
                utilise des prestataires professionnels, compétents et <br />
                assures afin de garantir un transport dans les plus <br />
                brefs délais.</p>
              <p> SYLC CORPORATION, contrairement  aux concurrents, <br />
                vous offre GRATUITEMENT un service de choix. Notre <br />
                prestation: vous faire bénéficier des tarifs ultra compéti<br />
                tifs, tant au niveau du transport terrestre que maritime,  sécuriser votre investissement en vous apportant des <br />
                garanties sur l'état de votre véhicule avant le départ   <br />
                des U.S.A.  </p>
            </li>
          </ul>
        </div>
      </div>
      <div class="addwords"> <img src="images/add1.jpg" alt="Ads" /> <img src="images/add2.jpg" alt="Ads" /> <img class="botArrow" src="images/arrow_bot.png" alt="" /> </div>
      <!--footer start from here-->
      <div id="footer" style="height:108px">
        <div id='basic-modal'>
        	<p class="biglink"><a href="http://www.sylc-export.com" target="_blank">www.sylc-export.com</a></p>
           <p class="links"><a href='#' class='basic1'>Politique de Confidentialité </a></p>
          <p class="biglink">Copyright &copy; 2011. All Rights Reserved.</p>
          
          <p class="links"><a href='#' class='basic'>Mentions Légales </a></p></div>
          <div id='basic-modal3'>
           <p class="links"><a href='#' class='basic3'>Se désabonner</a></p>
        </div>
        <div id="basic-modal-content">
          <h3></h3>
          <div class="poppadding">
            <h2 class="pop_heading">Editeur du Site</h2>
            <p>Le site SYLC Corporation est édité par SYLC Corporation. </p>
            <h2 class="pop_heading">Droits d'auteur</h2>
            <p>Le site SYLC Corporation est protégé par les dispositions du Code de la propriété intellectuelle, notamment par celles relatives à la propriété littéraire et artistique et au droit des marques.</p>
            <h2 class="pop_heading">CNIL – Protection des données personnelles</h2>
            <p>Les informations que nous sommes amenés à recueillir proviennent :</p>
            <ul>
              <li>soit de l'inscription volontaire d'une adresse e-mail de votre part vous permettant de recevoir notre newsletter,</li>
              <li>soit d'un abonnement de votre part aux services proposés par notre site,</li>
              <li>soit de la saisie complète de vos coordonnées par vos soins à l'occasion d'une opération événementielle.</li>
            </ul>
            <p>Ces informations nous permettent de mieux vous connaître. Elles pourront être utilisées, en outre, pour vous informer de l'existence de nos produits et services. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi « Informatique et Libertés » n<sup>°</sup> 78-17 du 6 janvier 1978 ). </p>
            <h2 class="pop_heading">Cookies</h2>
            <p><strong>SYLC Corporation</strong> vous informe qu'un cookie est placé dans votre ordinateur lorsque vous naviguez sur son site. Un cookie ne nous permet pas de vous identifier. De manière générale, il enregistre des informations relatives à la navigation de votre ordinateur sur notre site (les pages que vous avez consultées, la date et l'heure de la consultation, etc.) que nous pourrons lire lors de vos visites ultérieures. Son but unique est de mettre en place un comptage du nombre de visiteurs et de limiter éventuellement le nombre de délivrance d'une même bannière publicitaire à un même utilisateur. La durée de conservation de ces informations dans votre ordinateur est de un an. Nous vous informons que vous pouvez vous opposer à l'enregistrement de « cookies » en désactivant cette option dans les paramètres de votre navigateur.</p>
          </div>
        </div>
        <div id="basic-modal-content1">
          <h3></h3>
          <div class="poppadding">
          
           <h2 class="pop_heading">Politique de Confidentialité</h2>

<p>Cette politique de confidentialité porte sur l'utilisation des données collectées par <a href="http://www.sylc-export.com/voitures-americaines">www.sylc-export.com/voitures-americaines</a>. Elle s'applique à toutes les données collectées au moment de votre utilisation de ce site ou de systèmes associés à Sylc-export.</p>
<p>Vous disposez d'un droit d'accès, de rectification et de suppression relatif aux données vous concernant. Vous pouvez nous contacter en tout temps :</p>
  <h2 class="pop_heading">Téléphone:</h2>
<p>01.76.63.32.16</p>

<p>OU</p>


<p>305.520.9761</p>
  <h2 class="pop_heading">Email:</h2>
<p>info@sylc-export.com</p>
<h2 class="pop_heading">Collecte invisible d'informations relatives à la navigation du visiteur :</h2>
<p>Nous enregistrons automatiquement certaines données relatives à vos habitudes sur notre site. Nous utilisons ces données en interne pour faire des statistiques sur nos utilisateurs, leurs intérêts et leurs comportements toujours dans le but de mieux les servir. Ces données sont compilées et analysées dans leur globalité, et peuvent inclure l'URL que vous venez juste de visiter, celui sur lequel vous allez vous rendre (que ces URL soient sur notre site ou pas), le navigateur que vous utilisez, l'heure de connexion et votre adresse IP.</p>
  <h2 class="pop_heading">Informations COOKIE :</h2>
<p>Nous n'implantons aucun cookie dans votre ordinateur.</p>
  <h2 class="pop_heading">Destination des informations recueillies :</h2>
<p>Les messages électroniques envoyés par l'intermédiaire des formulaires et liens du présent site sont conservés pendant la durée nécessaire à leur traitement. Lorsque vous indiquez votre nom (ou pseudonyme), votre adresse électronique, votre adresse postale ou votre numéro de téléphone et que vous acceptez l'utilisation de ces informations, www.sylc-export.com/voitures-americaines pourra utiliser ces informations pour vous avertir de mises à jour, d'offres de biens, de nouveaux services ou d'autres informations reçues par Sylc-export. Sylc-export n'offre pas, et ne permet pas la vente, des informations vous concernant.</p>


  <h2 class="pop_heading">Responsabilité</h2>
<p>Sylc-export ne pourra en aucun cas être tenue responsable des pratiques ou du contenu des sites web dont les liens hypertextes mis en place dans le cadre du présent site renvoient en direction d'autre site ou de ressources présentes sur le réseau Internet. Nous ne pouvons que vous encourager à prendre connaissance de la politique Informatique et libertés de ces sites, qui n'est pas forcément la même que la nôtre.</p>
  <h2 class="pop_heading">Mise à jour des mentions légales</h2>

<p>Sylc-export se réserve le droit de mettre à jour la présente notice légale à tout moment, en fonction de l'évolution du contenu du site et des contraintes supplémentaires de protection nécessaires. Veuillez donc consulter cette page à chaque fois que vous consultez le site web afin de vous tenir au courant des conditions et modalités en vigueur. </p>




          </div>
        </div>
        <style type="text/css">
		table.news_table, table.news_table th,table.news_table td{ text-align:left;
			background-color:#FFFFFF;
			background-image : none;
			color:#000000;
			padding:10px 0 10px 0;
		}
		</style>
        <div id="basic-modal-content3">
          <h3></h3>
          <div class="poppadding">
          <table width="100%" cellpadding="10px" cellspacing="10px" align="center" class="news_table" style="font-size: 18px;">
          
          
          <tr>
          <th colspan="2">Veuillez remplir la forme pour vous désinscrire a notre newsletter et/ou promotions.
          </th>
          </tr>
          
          <tr>
          <th colspan="2"><span id="show_error"></span>
          </th>
          </tr>
          
          <tr>
          	<td>
        		Email : </td>
                <td align="left">
                <input name="email" type="text" id="pemail" style="width: 249px;" /></td></tr>
                <tr><td>
                Nom : </td><td><input name="name" type="text" id="pname" style="width: 249px;" /></td></tr>
                <tr>
                <td>
                </td>
                <td><input type="button" value="Soumettre" onClick="loadXMLDoc()"/>
                </td></tr>
                
                </table>
		 </div>
        </div>  
        <!-- preload the images -->
        <div style='display:none'> <img src='images/fancy_close.png' alt='' /> </div>
      </div>
    </div>
    <!--footer start from here-->
  </div>
</div>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
</body>
</html>
<script type="text/javascript">
function loadXMLDoc()
{
			var error = '';
			var email = document.getElementById('pemail').value;
			var name = document.getElementById('pname').value;
				
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				if(email ==''){
					error += 'S\'il vous plaît entrer votre adresse e-mail<br />';
				}		
				else if(reg.test(email) == false) {
					error += 'Adresse e-mail valide<br />';
				}
				if(name ==''){
					error += 'S\'il vous plaît Entrez votre nom';
				}
							
			if(error!='') {
				document.getElementById('show_error').innerHTML=error;
			} else {
				var xmlhttp;
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById('show_error').innerHTML='Vous avez réussi à désabonné service Newsletter.';
						document.getElementById('pemail').value='';
						document.getElementById('pname').value='';
					}
				  }
				xmlhttp.open("GET","send_email_fr.php?email="+email+"&name="+name,true);
				xmlhttp.send();
			}
		}
</script>
