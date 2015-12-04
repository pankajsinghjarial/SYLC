<?php session_start(); 
require_once './conf/config.inc.php';?>
<!DOCTYPE HTML>
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Sylc Corporation</title>
		<link href="<?php echo DEFAULT_URL?>/landing/css/reset.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon">
		<link href="<?php echo DEFAULT_URL?>/landing/css/jcontent.css" rel="stylesheet" type="text/css"/> 
		<link href="<?php echo DEFAULT_URL?>/landing/css/basic.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo DEFAULT_URL?>/landing/css/jquery.fancybox.css" rel="stylesheet"  type="text/css" media="screen">
		<link href="<?php echo DEFAULT_URL?>/landing/css/styles.css" rel="stylesheet" type="text/css" media="all">
		<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		
		<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/colorbox.css" />
        <script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.colorbox.js"></script>

		<script type="text/javascript" src="<?php echo DEFAULT_URL?>/landing/js/jquery.easing.min.1.3.js"></script>
		<script type="text/javascript" src="<?php echo DEFAULT_URL?>/landing/js/jquery.jcontent.0.8.min.js"></script>
        <script type="text/javascript" language="javascript">
            $("document").ready(function(){
                //demo1 
                $("div#demo1").jContent({orientation: 'horizontal', 
                                         easing: "easeOutCirc", 
                                         duration: 500}); 
                  
				  
                //demo2 
                $("div#demo2").jContent({orientation: 'vertical', 
                                         easing: "easeOutCirc", 
                                         duration: 500}); 
                
                //demo3 
                $("div#demo3").jContent({orientation: 'horizontal', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         auto: true,
										 pause_on_hover: true,
                                         direction: 'next',
                                         pause: 1500});
                                     
                //demo4 
                $("div#demo4").jContent({orientation: 'horizontal', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         auto: true,
										 pause_on_hover: true,
                                         direction: 'prev',
                                         pause: 1500}); 
        
                //demo5 
                $("div#demo5").jContent({orientation: 'vertical', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         auto: true,
										 pause_on_hover: true,
                                         direction: 'next',
                                         pause: 1500});
                                         
                //demo6 
                $("div#demo6").jContent({orientation: 'vertical', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         auto: true,
										 pause_on_hover: true,
                                         direction: 'prev',
                                         pause: 1500});
                                         
                //demo7 
                $("div#demo7").jContent({orientation: 'horizontal', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         circle: true});
        
                //demo8 
                $("div#demo8").jContent({orientation: 'vertical', 
                                         easing: "easeOutCirc", 
                                         duration: 500,
                                         circle: true});								 
            });
        </script>
        
        
		<script src="<?php echo DEFAULT_URL?>/landing/js/jquery.pikachoose.full.js"></script>
		<script src="<?php echo DEFAULT_URL?>/landing/js/jquery.fancybox.js"></script>
		<script type="text/javascript"> 
$(document).ready(function (){
		var a = function(self){
		self.anchor.fancybox();
		};
				$(".pikame").PikaChoose({buildFinished:a});		
						
});
		</script>
		<script src="<?php echo DEFAULT_URL?>/landing/js/pie_class.js"></script>
		<!--[if (IE 7)|(IE 8)]>
<script src="<?php echo DEFAULT_URL?>/landing/js/html5.js" type="text/javascript"></script>
<![endif]-->
		<!--[if lt IE 10]>
<script type="text/javascript" src="<?php echo DEFAULT_URL?>/landing/js/PIE.js"></script>
<![endif]-->
		</head>

		<body>
        <div id="wrapper_outer">
          <header id="header_outer">
            <div class="header_inner">
              <div class="header_main">
                <div class="logos"><a href="#"><img src="<?php echo DEFAULT_URL?>/landing/images/logo.png" width="217" height="58" alt="Sylc"  title="Sylc"></a></div>
              </div>
            </div>
          </header>
          <?php 
include_once(LIST_ROOT."/landing_code.php");
?>
          <section id="container_outer">
            <div class="container_midd">
              <div class="container_btm">
                <div class="container_top">
                
                
                
                  <div class="container_main">
                  
                  
                    <div>
                    
                      <div class="user_info">Bienvenus: <span><?php echo $userdetailfetch->username?></span></div>
                       <div class="user_info_left"><span><a href="<?php echo DEFAULT_URL?>?action=logout.php">Déconnecter</a></span></div>

                      
                    </div>
                    
                    
                    
                    <div class="services_container" style="overflow:hidden;">
                     
                       
              <div class="product_details_outer01">
              	<div class="title_01">Récapitulative de la commande <a href="<?php echo DEFAULT_URL;?>/landing.php?lead_detail=<?php echo $_GET['lead_detail'];?>"><span class="retour_btn">Retour</span></a></div>
              	<?php if($_GET['msg']!=''){?>
              	<div>
              	<img src="<?php echo DEFAULT_URL?>/images/error-icon.png" width="16px" style="float: left;padding-right: 5px;"> <p style="font: 14px Arial,Helvetica,sans-serif;color: #ff0000;padding-bottom: 20px;float: left;"><?php echo $_GET['msg'];?></p>
              </div><?php } ?>
              	<table>
              	<tr>
              	<td class="product_title_td">Point</td>
              	<td class="product_price_td">Prix</td>
              	<td class="product_remove_td">Supprimer</td>
              	</tr>	
      <?php /*?> <script>
		function remove_upsells(id,price)
		{
			
			var totalPrice=$('#total_amount').val();
			var newPrice=totalPrice-price;
			//alert(newPrice);
			newPriceshow=newPrice.toFixed(2);
			//alert(newPrice);
			$('#total_amount').val(newPrice);
			$('#total_amount_Price_td').html('$'+newPriceshow);
			$('#'+id).css('display','none');
			
		}
       </script>  <?php */?>    
             
              <?php 
              
/*
             $selectedupsells = $_POST['upsellchecked'];
            // echo "<pre>";print_r($selectedupsells);
             $j=100;
              for($i=0;$i<count($selectedupsells);$i++){
                   
                   $selectedupsells1 = 	explode('~',$selectedupsells[$i]);
                  
              	?><tr id="upsell_<?php echo $j ?>"><td class="product_title_desc"><?php echo $selectedupsells1[0];?></td><?php 
              	?><td class="product_price_desc"><?php echo '$'.$selectedupsells1[1];?></td><?php
              	?><td class="product_remove_desc"><img onClick="return remove_upsells('upsell_<?php echo $j ?>','<?php echo $selectedupsells1[1];?>')" src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" alt="Remove" style="cursor:pointer;"></td></tr><?php
               
              	 $sum += $selectedupsells1[1];
              	 $j=$j+1;
               }
              
              */
              ?>
              
              <?php 
              if($_GET[rmv] != '' && $_GET['rmv'] == 'del')
              		{ 
              			foreach($_SESSION['test'] as $key=>$value)
              			{
              				$newtest = 	explode('~',$value);
              				if($_GET[id] == $newtest[0]) {
											unset($_SESSION['test'][$key]);	
											echo '<script>location.href="'.DEFAULT_URL.'/upselldetailfetch_code.php?lead_detail='.$_GET['lead_detail'].'";</script>';
													}
              			}
              			}
              		
              
              			
              $selectedupsells = $_POST['upsellchecked'];
              if($_POST['upsellchecked']) {
              $_SESSION['test'] = $selectedupsells;
              }
              foreach($_SESSION['test'] as $key=>$value)
              {
              		 
              		$newtest = 	explode('~',$value);
              		$sum +=  $newtest[2];
              	
              	?> 
              	<tr><td class="product_title_desc"><?php echo $newtest[1];?></td><?php
                    
              	
              	?><td class="product_price_desc"><?php echo '$'.$newtest[2];?></td><?php
              	?><td class="product_remove_desc"><a href='?lead_detail=<?php  echo $_GET['lead_detail']; ?>&id=<?php echo $newtest[0];?>&rmv=del'><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" alt="Remove" style="cursor:pointer;"></a></td></tr>
              	
              	<?php 
              	
              }
              
              ?>
              
              
              
             	
             	<tr>
             	<td class="total_amount_td">Montant total:</td>
             	<td colspan="2" class="total_amount_Price_td" id="total_amount_Price_td"> <?php echo '$'.number_format($sum,2);?>
             	
             	</td>
             	
             	</tr>
              	
              	</table>
              
              
              </div>
            
            
            
            <form action="DoDirectPayment.php" method="post">  
              
              <div class="billing_shipping_details">
              
              <div class="billing_details">
              		<div class="title_01">Adresse de facturation:</div>
              		
              		<table>
              		
             
           
              	<input type="hidden" name="total_amount" id="total_amount" value="<?php echo number_format($sum,2);?>">             		
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['lead_detail'];?>"> 
              		<tr>
              		<td class="payment_form_lable">Nom:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_fname" name="billing_fname" value="<?php echo $_SESSION['billing_fname'];?>"></td>              		
              		</tr>
              		
              		<tr>
              		<td class="payment_form_lable">Prénom:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_lname" name="billing_lname" value="<?php echo $_SESSION['billing_lname'];?>"></td>              		
              		</tr>
              		
              		
              		
              		<tr>
              		<td class="payment_form_lable">Email:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_email" name="billing_email" value="<?php echo $_SESSION['billing_email'];?>"></td>              		
              		</tr>
              		
              		<tr>
              		<td class="payment_form_lable">Téléphone:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_phone" name="billing_phone" value="<?php echo $_SESSION['billing_phone'];?>"></td>              		
              		</tr>
              		
              			<tr>
              		<td class="payment_form_address" style="padding-left: 0px;">Adresse:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_address" name="billing_address" value="<?php echo $_SESSION['billing_address'];?>">
              		<?php /*?><textarea class="address_box_01" id="billing_address" name="billing_address"><?php echo $_SESSION['billing_address'];?></textarea></td><?php */?>              		
              		</tr>
              		
              		
              		
              		<tr>
              		<td class="payment_form_lable">Ville:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_city" name="billing_city" value="<?php echo $_SESSION['billing_city'];?>"></td>              		
              		</tr>
              	    
              	    <tr>
              		<td class="payment_form_lable">Etat:</td>
              		<td class="payment_form_field"><select class="payment_combo01_billing_state" id="billing_state" name="billing_state">
                <option>Sélectionnez Etat</option>
                <option <?php if($_SESSION['billing_state']=='Alabama'){?>selected="selected"<?php }?>>Alabama</option>
                <option <?php if($_SESSION['billing_state']=='Alaska'){?>selected="selected"<?php }?>>Alaska</option>
                <option <?php if($_SESSION['billing_state']=='American Samoa'){?>selected="selected"<?php }?>>American Samoa</option>
                <option <?php if($_SESSION['billing_state']=='Arizona'){?>selected="selected"<?php }?>>Arizona</option>
                <option <?php if($_SESSION['billing_state']=='Arkansas'){?>selected="selected"<?php }?>>Arkansas</option>
                <option <?php if($_SESSION['billing_state']=='California'){?>selected="selected"<?php }?>>California</option>
                <option <?php if($_SESSION['billing_state']=='Colorado'){?>selected="selected"<?php }?>>Colorado</option>
                <option <?php if($_SESSION['billing_state']=='Connecticut'){?>selected="selected"<?php }?>>Connecticut</option>
                <option <?php if($_SESSION['billing_state']=='Delaware'){?>selected="selected"<?php }?>>Delaware</option>
                <option <?php if($_SESSION['billing_state']=='District of Columbia'){?>selected="selected"<?php }?>>District of Columbia</option>
                <option <?php if($_SESSION['billing_state']=='Florida'){?>selected="selected"<?php }?>>Florida</option>
                <option <?php if($_SESSION['billing_state']=='Georgia'){?>selected="selected"<?php }?>>Georgia</option>
                <option <?php if($_SESSION['billing_state']=='Guam'){?>selected="selected"<?php }?>>Guam</option>
                <option <?php if($_SESSION['billing_state']=='Hawaii'){?>selected="selected"<?php }?>>Hawaii</option>
                <option <?php if($_SESSION['billing_state']=='Idaho'){?>selected="selected"<?php }?>>Idaho</option>
                <option <?php if($_SESSION['billing_state']=='Illinois'){?>selected="selected"<?php }?>>Illinois</option>
                <option <?php if($_SESSION['billing_state']=='Indiana'){?>selected="selected"<?php }?>>Indiana</option>
                <option <?php if($_SESSION['billing_state']=='Iowa'){?>selected="selected"<?php }?>>Iowa</option>
                <option <?php if($_SESSION['billing_state']=='Kansas'){?>selected="selected"<?php }?>>Kansas</option>
                <option <?php if($_SESSION['billing_state']=='Kentucky'){?>selected="selected"<?php }?>>Kentucky</option>
                <option <?php if($_SESSION['billing_state']=='Louisiana'){?>selected="selected"<?php }?>>Louisiana</option>
                <option <?php if($_SESSION['billing_state']=='Maine'){?>selected="selected"<?php }?>>Maine</option>
                <option <?php if($_SESSION['billing_state']=='Maryland'){?>selected="selected"<?php }?>>Maryland</option>
                <option <?php if($_SESSION['billing_state']=='Massachusetts'){?>selected="selected"<?php }?>>Massachusetts</option>
                <option <?php if($_SESSION['billing_state']=='Michigan'){?>selected="selected"<?php }?>>Michigan</option>
                <option <?php if($_SESSION['billing_state']=='Minnesota'){?>selected="selected"<?php }?>>Minnesota</option>
                <option <?php if($_SESSION['billing_state']=='Mississippi'){?>selected="selected"<?php }?>>Mississippi</option>
                <option <?php if($_SESSION['billing_state']=='Missouri'){?>selected="selected"<?php }?>>Missouri</option>
                <option <?php if($_SESSION['billing_state']=='Montana'){?>selected="selected"<?php }?>>Montana</option>
                <option <?php if($_SESSION['billing_state']=='Nebraska'){?>selected="selected"<?php }?>>Nebraska</option>
                <option <?php if($_SESSION['billing_state']=='Nevada'){?>selected="selected"<?php }?>>Nevada</option>
                <option <?php if($_SESSION['billing_state']=='New Hampshire'){?>selected="selected"<?php }?>>New Hampshire</option>
                <option <?php if($_SESSION['billing_state']=='New Jersey'){?>selected="selected"<?php }?>>New Jersey</option>
                <option <?php if($_SESSION['billing_state']=='New Mexico'){?>selected="selected"<?php }?>>New Mexico</option>
                <option <?php if($_SESSION['billing_state']=='New York'){?>selected="selected"<?php }?>>New York</option>
                <option <?php if($_SESSION['billing_state']=='North Carolina'){?>selected="selected"<?php }?>>North Carolina</option>
                <option <?php if($_SESSION['billing_state']=='North Dakota'){?>selected="selected"<?php }?>>North Dakota</option>
                <option <?php if($_SESSION['billing_state']=='Northern Marianas Islands'){?>selected="selected"<?php }?>>Northern Marianas Islands</option>
                <option <?php if($_SESSION['billing_state']=='Ohio'){?>selected="selected"<?php }?>>Ohio</option>
                <option <?php if($_SESSION['billing_state']=='Oklahoma'){?>selected="selected"<?php }?>>Oklahoma</option>
                <option <?php if($_SESSION['billing_state']=='Oregon'){?>selected="selected"<?php }?>>Oregon</option>
                <option <?php if($_SESSION['billing_state']=='Pennsylvania'){?>selected="selected"<?php }?>>Pennsylvania</option>
                <option <?php if($_SESSION['billing_state']=='Puerto Rico'){?>selected="selected"<?php }?>>Puerto Rico</option>
                <option <?php if($_SESSION['billing_state']=='Rhode Island'){?>selected="selected"<?php }?>>Rhode Island</option>
                <option <?php if($_SESSION['billing_state']=='South Carolina'){?>selected="selected"<?php }?>>South Carolina</option>
                <option <?php if($_SESSION['billing_state']=='South Dakota'){?>selected="selected"<?php }?>>South Dakota</option>
                <option <?php if($_SESSION['billing_state']=='Tennessee'){?>selected="selected"<?php }?>>Tennessee</option>
                <option <?php if($_SESSION['billing_state']=='Texas'){?>selected="selected"<?php }?>>Texas</option>
                <option <?php if($_SESSION['billing_state']=='Utah'){?>selected="selected"<?php }?>>Utah</option>
                <option <?php if($_SESSION['billing_state']=='Vermont'){?>selected="selected"<?php }?>>Vermont</option>
                <option <?php if($_SESSION['billing_state']=='Virginia'){?>selected="selected"<?php }?>>Virginia</option>
                <option <?php if($_SESSION['billing_state']=='Virgin Islands'){?>selected="selected"<?php }?>>Virgin Islands</option>
                <option <?php if($_SESSION['billing_state']=='Washington'){?>selected="selected"<?php }?>>Washington</option>
                <option <?php if($_SESSION['billing_state']=='West Virginia'){?>selected="selected"<?php }?>>West Virginia</option>
                <option <?php if($_SESSION['billing_state']=='Wisconsin'){?>selected="selected"<?php }?>>Wisconsin</option>
                <option <?php if($_SESSION['billing_state']=='Wyoming'){?>selected="selected"<?php }?>>Wyoming</option>
                
               </select>
               </td>
              		             		
              		</tr>
              	    	
              	<tr>
              		<td class="payment_form_lable">Code Postal:</td>
              		<td class="payment_form_field"><input type="text" class="billing_shipping_textbox01" id="billing_zipcode" name="billing_zipcode" value="<?php echo $_SESSION['billing_zipcode'];?>"></td>              		
              		</tr>	
              		
              	
          
              		
              		
              		</table>
              
              
              </div>
             
              
              </div>
              
              
              
              <div class="payment_details">
        <div class="title_01">Entrez les détails de paiement</div>
        <table>
          <tr>
            <td class="payment_form_lable">Type de carte:</td>
            <td class="payment_form_field"><select class="payment_combo01" id="card_type" name="card_type">
                <option >Sélectionnez Carte</option>
                <option <?php if($_SESSION['card_type']=='MasterCard'){?>selected="selected"<?php }?>>MasterCard</option>
                <option <?php if($_SESSION['card_type']=='Amex'){?>selected="selected"<?php }?>>Amex</option>
                <option <?php if($_SESSION['card_type']=='Visa'){?>selected="selected"<?php }?>>Visa</option>
                <option <?php if($_SESSION['card_type']=='Discover'){?>selected="selected"<?php }?>>Discover</option>
              </select>
              <!-- <div class="payment_opt_card"><img src="<?php echo DEFAULT_URL?>/images/payment.jpg" alt="payment"></div> --></td>
          </tr>
          <tr>
            <td class="payment_form_lable">Numéro de carte de crédit:</td>
            <td class="payment_form_field"><input type="text" class="payment_texbox01" id="card_number" name="card_number" value="<?php echo $_SESSION['card_number'];?>"></td>
          </tr>
          
          <?php /*?>
          <tr>
            <td class="payment_form_lable">Nom du titulaire:</td>
            <td class="payment_form_field"><input type="text" class="payment_texbox01" id="card_holder" name="card_holder">
              <div class="payment_opt_card">
                <!-- <p>As it appears on the credit card</p>-->
              </div></td>
          </tr>
          <?php */?>
          
          <tr>
            <td class="payment_form_lable">Numéro de sécurité:</td>
            <td class="payment_form_field"><input type="text" class="security_texbox01" id="card_security_number" name="card_security_number" value="<?php echo $_SESSION['card_security_number'];?>">
              <div class="payment_opt_card">
               <?php /*?> <p><a href="#">C'est quoi ça?</a></p><?php */?>
              </div></td>
          </tr>
          <tr>
            <td class="payment_form_lable">Date d'expiration:</td>
            <td class="payment_form_field"><select class="expiry_month01" id="card_expiry_month" name="card_expiry_month">
                <option>Mois</option>
                <option value="01" <?php if($_SESSION['card_expiry_month']=='01'){?>selected="selected"<?php }?>>Janvier</option>
                <option value="02" <?php if($_SESSION['card_expiry_month']=='02'){?>selected="selected"<?php }?>>Février</option>
                <option value="03" <?php if($_SESSION['card_expiry_month']=='03'){?>selected="selected"<?php }?>>Mars</option>
                <option value="04" <?php if($_SESSION['card_expiry_month']=='04'){?>selected="selected"<?php }?>>Avril</option>
                <option value="05" <?php if($_SESSION['card_expiry_month']=='05'){?>selected="selected"<?php }?>>Mai</option>
                <option value="06" <?php if($_SESSION['card_expiry_month']=='06'){?>selected="selected"<?php }?>>Juin</option>
                <option value="07" <?php if($_SESSION['card_expiry_month']=='07'){?>selected="selected"<?php }?>>Juillet</option>
                <option value="08" <?php if($_SESSION['card_expiry_month']=='08'){?>selected="selected"<?php }?>>Août</option>
                <option value="09" <?php if($_SESSION['card_expiry_month']=='09'){?>selected="selected"<?php }?>>Septembre</option>
                <option value="010" <?php if($_SESSION['card_expiry_month']=='10'){?>selected="selected"<?php }?>>octobre</option>
                <option value="11" <?php if($_SESSION['card_expiry_month']=='11'){?>selected="selected"<?php }?>>Novembre</option>
                <option value="12" <?php if($_SESSION['card_expiry_month']=='12'){?>selected="selected"<?php }?>>Décembre</option>
              </select>
              <select class="expiry_month01" id="card_expiry_year" name="card_expiry_year">
                <option>Année</option>
                <option <?php if($_SESSION['card_expiry_year']=='2013'){?>selected="selected"<?php }?>>2013</option>
                <option <?php if($_SESSION['card_expiry_year']=='2014'){?>selected="selected"<?php }?>>2014</option>
                <option <?php if($_SESSION['card_expiry_year']=='2015'){?>selected="selected"<?php }?>>2015</option>
                <option <?php if($_SESSION['card_expiry_year']=='2016'){?>selected="selected"<?php }?>>2016</option>
                <option <?php if($_SESSION['card_expiry_year']=='2017'){?>selected="selected"<?php }?>>2017</option>
                <option <?php if($_SESSION['card_expiry_year']=='2018'){?>selected="selected"<?php }?>>2018</option>
                <option <?php if($_SESSION['card_expiry_year']=='2019'){?>selected="selected"<?php }?>>2019</option>
                <option <?php if($_SESSION['card_expiry_year']=='2020'){?>selected="selected"<?php }?>>2020</option>
              </select>
            </td>
          </tr>
        </table>
        <div class="payment_form_button">      
          <input type="submit" class="order_now_bt make_payment_btn" value="Effectuer un paiement" onclick="return paymentfieldvalidation();">
        </div>
      </div>
              
              
       </form>      

              
              
              
              
                    </div>
                    
                  </div>
                </div>
                
                
              </div>
            </div>
          </section>
         <footer>
  

						<div class="textwidget"><div class="footer_inner">
    <div class="footer_top">
      <ul>
        <li>
          <div class="socil_icon">
            <ul>
              <li><a target="_blank" href="http://www.facebook.com/Sylccorporation"><img height="30" width="30" alt="" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/images/fb-icon.png"></a></li>
              <li><a target="_blank" href="http://www.youtube.com/user/yoathome?feature=results_main"><img height="30" width="30" alt="" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/images/youtube.png"></a></li>
            </ul>
 <div style="float:left; width:50px; overflow:hidden; margin:0 0 0 10px;">
             <iframe frameborder="0" scrolling="no" allowtransparency="true" style="border:none; overflow:hidden; width:100px; height:35px;" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FSylccorporation&amp;send=false&amp;layout=standard&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=dark&amp;font&amp;height=35"></iframe>
             </div>
          </div>
        </li>
        <li><img alt="" class="img_left" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/images/phone-icon.png">(Fr) 01.76.63.32.16</li>
        <li><img alt="" class="img_left01" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/images/icon02.png">Hollywood, FL 33020</li>
        <li><img alt="" class="img_left" src="http://www.sylc-export.com/wp-content/themes/sylc-expo/images/message-icon.png"><a href="mailto:info@sylc-export.com">info@sylc-export.com</a></li>
      </ul>
    </div>
    <div class="footer_left">
      <div class="link_outer">
        <p>Liens du Site</p>
        <ul>
          <li><a href="http://www.sylc-export.com/presentation/">Présentation</a></li>
          <li><a href="http://www.sylc-export.com/media/">Média</a></li>
          <li><a href="http://www.sylc-export.com/inventaire/">Inventaire</a></li>
          <li><a href="http://www.sylc-export.com/recherche/">Recherche</a></li>
        </ul>
      </div>
      <div class="link_outer">
        <p>À Propos de Nous</p>
        <ul>
          <li><a href="http://www.sylc-export.com/logistique/">Logistique</a></li>
          <li><a href="http://www.sylc-export.com/news/">News</a></li>
          <li><a href="http://www.sylc-export.com/presentation/nos-services/">Nos services</a></li>
          <li><a href="http://www.sylc-export.com/contact/">Contactez-nous</a></li>
        </ul>
      </div>
    </div>
    <div class="footer_right">
      <p>Top Marques à Vendre</p>
      <ul>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Dodge</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Lincone</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Ford</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">General Motors</a></li>
      </ul>
      <ul>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Chevrolet</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Cadillac</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Jeep</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Hummer</a></li>
      </ul>
      <ul>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Pontiac</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Buick</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">GMC</a></li>
        <li><a href="http://www.sylc-export.com/inventaire/voitures-neuves/">Mustang</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="copyright_outer">
    <p>Hollywood, FL 33020  |  Numero Francais: 01.76.63.32.16<br>
      Droits d'auteur &copy; <a href="#">SYLC.com.</a> Tous droits réservés </p>
  </div>
   
 
  </div>
		            
    <script type="text/javascript">
    $(".vehicule_inner table tr:nth-child(2n+1)").css("background", "#e4e4e4");
    $(".document_info_box ul li:nth-child(2n+1)").css("background", "#e4e4e4");
    $(".contact_info_box_inner table tr:nth-child(2n+1)").css("background", "#e4e4e4");
    </script>       
   
    <script type="text/javascript">

  function paymentfieldvalidation(){

	//alert("hello");

		var errorMsg = "";

		var returnVal  = true;

		if(document.getElementById('billing_fname').value == ''){

			//alert("hello");

			errorMsg += "S'il vous pla\u00EEt entrer votre Nom\n";

			returnVal = false;

		}
		       
			
		var newname = document.getElementById('billing_fname').value;
		
		if(newname==' ' || newname=='  ' || newname=='   '|| newname=='    '|| newname=='     '|| newname=='      '|| newname=='       '|| newname=='        ') {
		
		
		//var rx = /^\S+$/;
		//if (rx.test(newname) == false){
		  
	 
			errorMsg += "S'il vous pla\u00EEt entrer un nom valide\n";

			returnVal = false;

		   }
		

		if(document.getElementById('billing_lname').value == ''){

			//alert("hello");

			errorMsg += "S'il vous pla\u00EEt entrer votre Prénom\n";

			returnVal = false;

		}
		       

	var newlname = document.getElementById('billing_lname').value;
		
		if(newlname==' ' || newlname=='  ' || newlname=='   '|| newlname=='    '|| newlname=='     '|| newlname=='      '|| newlname=='       '|| newlname=='        ') {
		
		
		//var rx = /^\S+$/;
		//if (rx.test(newname) == false){
		  
	 
			errorMsg += "S'il vous pla\u00EEt entrer un prénom valide\n";

			returnVal = false;

		   }
			
		
		

		if(document.getElementById('billing_email').value == ''){

			errorMsg += "S'il vous pla\u00EEt Entrez votre Email\n";

			returnVal = false;

		}else{

			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('billing_email').value))){

				errorMsg += "S'il vous pla\u00EEt entrer une adresse valide\n";

				returnVal = false;

			}

		}
		
		

		if(document.getElementById('billing_phone').value == ''){

			errorMsg += "S'il vous pla\u00EEt entrer votre téléphone\n";

			returnVal = false;

		}else {

	var newphone = document.getElementById('billing_phone').value;
		
		if(newphone.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  entrer valide téléphone\n";

			returnVal = false;

		   }
		}


		if(document.getElementById('billing_address').value == ''){

			errorMsg += "S'il vous pla\u00EEt  Entrez adresse\n";

			returnVal = false;

		}

		
	//var newcaddress = document.getElementById('billing_address').value;
		
		//if(document.getElementById('billing_address').value == ' ') {
	 
			//errorMsg += "S'il vous pla\u00EEt  entrer valide Address\n";

			//returnVal = false;

		  // }
		

		
		   

		if(document.getElementById('billing_city').value == ''){

			errorMsg += "S'il vous pla\u00EEt  Entrez ville\n";

			returnVal = false;

		}

/*var newcity = document.getElementById('billing_city').value;
		
		if(newcity.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  entrer valide ville\n";

			returnVal = false;

		   }*/

		
		if(document.getElementById('billing_state').value == 'Select State'){

			errorMsg += "S'il vous pla\u00EEt Entrez Etat\n";

			returnVal = false;

		}

		if(document.getElementById('billing_zipcode').value == ''){

			errorMsg += "S'il vous pla\u00EEt  Entrez Code Postal\n";

			returnVal = false;

		}

      var newzipcode = document.getElementById('billing_zipcode').value;
		
		if(newzipcode.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  entrer valide Code Postal\n";

			returnVal = false;

		   }

		


		if(document.getElementById('card_type').value == 'Select Card'){

			errorMsg += "S'il vous pla\u00EEt sélectionner le type de carte\n";

			returnVal = false;

		}

		if(document.getElementById('card_number').value == ''){

			errorMsg += "S'il vous pla\u00EEt Entrez Numéro de la carte\n";

			returnVal = false;

		}

		
		var newcardnumber = document.getElementById('card_number').value;
			
			/*if(newcardnumber.match(/\ /)) {
		 
				errorMsg += "S'il vous pla\u00EEt entrer un numéro de carte valide\n";

				returnVal = false;

			   }*/

	 if(newcardnumber.length !='' && newcardnumber.length > 16) {
				 
				errorMsg += "S'il vous pla\u00EEt  entrer un numéro de carte valide\n";

				returnVal = false;

			   }
			
		/*
		if(document.getElementById('card_holder').value == ''){

			errorMsg += "S'il vous pla\u00EEt Entrez Card Holder's Name\n";

			returnVal = false;

		}

		var newcardholder = document.getElementById('card_holder').value;
		
		if(newcardholder.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  entrer valide Card Holder's Name\n";

			returnVal = false;

		   }
*/

		if(document.getElementById('card_security_number').value == ''){

			errorMsg += "S'il vous pla\u00EEt Entrez Numéro de sécurité\n";

			returnVal = false;

		}

		var newcardsecurity = document.getElementById('card_security_number').value;
		
		if(newcardsecurity.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  entrer valide Numéro de sécurité\n";

			returnVal = false;

		   }
		   
		if(newcardsecurity.length !='' && newcardsecurity.length > 4) {
			 
			errorMsg += "S'il vous pla\u00EEt  entrer valide Numéro de sécurité\n";

			returnVal = false;

		   }
		

		if(document.getElementById('card_expiry_month').value == 'Month'){

			errorMsg += "S'il vous pla\u00EEt sélectionnez Mois d'expiration\n";

			returnVal = false;

		}

		if(document.getElementById('card_expiry_year').value == 'Year'){

			errorMsg += "S'il vous pla\u00EEt sélectionner Année d'expiration\n";

			returnVal = false;

		}

		if(errorMsg!=""){

			alert("== S'il vous pla\u00EEt corriger les erreurs suivantes==\n"+errorMsg);

		}

	return returnVal;

		

	}

	

  </script>         
	
</footer>
        </div>
</body>
</html>
