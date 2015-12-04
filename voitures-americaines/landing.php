<?php require_once './conf/config.inc.php';?>
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
                    <div class="header_banner">
                      <div class="car_img"><img src="<?php echo DEFAULT_URL?>/gallery/<?php echo $main_image?>"  width="667" height="327" alt="Car" title="Car"></div>
                      <div class="user_info">Bienvenus: <span><?php echo $userdetailfetch->username?></span></div>
                       <div class="user_info_left"><span><a href="http://www.sylc-export.com?action=logout">Déconnecter</a></span></div>
<div class="car_stage">
        <ul>
        <?php 
      $stcnt = 1;
      while($statusfetch = mysql_fetch_object($user_statusinfo)) {?>
      <li class="stage0<?php echo $stcnt; if($statusfetch->status_id == $status) { ?> active<?php }?>"><span><?php echo $statusfetch->status_order;?></span></li>
      <?php  $stcnt++; }?>
                          
                         
                        </ul>
                      </div>
                      <div class="ribbon"><?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $statusdetailfetch->short_description; } else { echo "Aucune information disponible";}?></div>
                    </div>
                    <div class="status_box">
                      <div class="status_indent">
                        <div class="status_heading">Status</div>
                        <div class="status_no">NO: <?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $current_status_fetch->status_order;} else { echo "-";}?></div>
                      </div>
                      <p><?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $statusdetailfetch->long_description;  } else { echo "Aucune information disponible";} ?></p>
                    </div>
                    <div class="services_container">
                      <div class="additional_service_box">
                        <div class="additional_info">voici quelques services mentionnes ci-dessous que vous pouvez ajouter en tant que service supplementaire</div>
                        <div class="services_scroll">
                          <div class="services_slider">
                          
                            <div id="demo7" class="demo3">	 <a title="" href="#" class="prev"></a>	
            <div class="slides">
           
           <?php
				if($status) {
           //$upselldetials = $objCommon->read('lead_upsell_details','lead_detail_id='.$id);
           $upselldetials = $objCommon->read('upsell','status_id='.$status);
	$count = mysql_num_rows($upselldetials);
	if($count > 0)
	{
while($upselldetailfetch = mysql_fetch_object($upselldetials))
{ ?>
                <div>
                                  
                                  <input type="button" value="Voir Plus" class="see_more_lf">
                                  <div class="scroll_content">
                                    <ul>
                                      <li class="ser_01"><?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $statusdetailfetch->name; } else { echo "Aucune information disponible";} ?></li>
                                      <li class="ser_02"><?php echo $upselldetailfetch->title?> <?php echo '$'.number_format($upselldetailfetch->fees,2)?></li>
                                      <li class="ser_03">
                                        <a href="<?php echo '#upsellpopup';?>" class="inline" style="margin:0 0 0 15px; height:auto;"><input type="checkbox" ></a>
                                        Ajouter ce service</li>
                                    </ul>
                                    <p><?php echo $upselldetailfetch->desc?></p>
                                  </div>
                                  <input type="button" value="Voir Plus" class="see_more_rt">
                                  <!--end each_slide --> 
                                  
                                  <div class="clear"></div>
                                </div>
                       <?php } } else {?>
                       <div>
                                  
                                 <input type="button" value="Voir Plus" class="see_more_lf"> 
                                  <div class="scroll_content">
                                    <ul>
                                      <li class="ser_01"><?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $statusdetailfetch->name; } else { echo "Aucune information disponible";} ?></li>
                                      <li class="ser_02">Aucune information disponible</li>
                                       <li class="ser_03">
                                        <input type="checkbox">
                                        Ajouter ce service</li>
                                     </ul>
                                    <p>Aucune information disponible</p>
                                 </div>
                                  <input type="button" value="Voir Plus" class="see_more_rt">
                                  <!--end each_slide --> 
                                  <div class="clear"></div>
                                </div>
                       <?php } } else {?>
                     
                       <div>
                                  
                                 <input type="button" value="Voir Plus" class="see_more_lf"> 
                                  <div class="scroll_content">
                                    <ul>
                                      <li class="ser_01"><?php if($status != "" && mysql_num_rows($statusdetail) > 0){ echo $statusdetailfetch->name; } else { echo "Aucune information disponible";} ?></li>
                                      <li class="ser_02">Aucune information disponible</li>
                                       <li class="ser_03">
                                        <input type="checkbox">
                                        Ajouter ce service</li>
                                     </ul>
                                    <p>Aucune information disponible</p>
                                 </div>
                                  <input type="button" value="Voir Plus" class="see_more_rt">
                                  <!--end each_slide --> 
                                  <div class="clear"></div>
                                </div>
                       <?php }?>     
                         
       
       
                      
                               
                                
                                <!--end mcts1 --> 
                              </div> <a title="" href="#" class="next"></a>
                              <!--end div2 --> 
                            </div>
                          </div>
                        </div>
                      </div>
                      
 
 <script type="text/javascript">

 function upsellvaluecheck(){

	 var chks = document.getElementsByName('upsellchecked[]');
     var hasChecked = false;
     for (var i = 0; i < chks.length; i++)
     {
     if (chks[i].checked)
     {
     hasChecked = true;
     
     }
     
     }

     if (hasChecked == false)
     {
     alert("S'il vous plaît choisir au moins une vente incitative à puchase.");
     return false;
     }

     return true;
	 }

 </script>
                      
      
            <!-- start pop-up for upsells -->            
     <div style="display:none">
 <div id="upsellpopup">
 <div class="popup_header_outer01">
  		<div class="popup_header_inner01">
  			<div class="popup_logo_bg01">
  			<img src="<?php echo DEFAULT_URL?>/landing/images/logo.png" width="217" height="58" alt="Sylc"  title="Sylc">
  			
  			</div>
  		
  		</div>
  	
  	
  	</div>
  	<div class="popup_container01">
  		<div class="popup_username">Bienvenus <span><?php echo $userdetailfetch->username?></span></div>
  		<div class="popup_user_desc">Merci pour I'ajout de ce service, s'ill vous pla&icirc;t regardez ci-dessous Nous avons d'autres services que nous offrons, cocher à c&ocirc;té d'un autre service que vous souhaitez ajouter, puis cliquez sur le bouton ci-dessous pour procéder au paiement.</div>
  	   
  	    <form method="post" name="upsellpayment" id="upsellpayment" action="<?php echo DEFAULT_URL?>/upselldetailfetch_code.php?lead_detail=<?php echo $_GET['lead_detail'];?>">
                    
              <ul>   
         <?php  $upselldetials = $objCommon->read('upsell','status_id='.$status);
	$count = mysql_num_rows($upselldetials);
	if($count > 0)
	{
while($upselldetailfetch = mysql_fetch_object($upselldetials))
{?>                       
      <li><table>
      	<tr>
      	<td class="popup_upsell_outer_td">
      	<div class="popup_upsell_title"><?php //echo $upselldetailfetch->desc?><?php echo $upselldetailfetch->title?> </div>
        <div class="popup_upsell_price"><?php echo '$'.number_format($upselldetailfetch->fees,2);?></div>
        <div class="popup_user_desc"><?php echo $upselldetailfetch->desc;?></div>
        </td>
        <td class="popup_checkbox_outer_td">
        <input type="checkbox" name="upsellchecked[]" value="<?php echo $upselldetailfetch->id.'~'.$upselldetailfetch->title.'~'.number_format($upselldetailfetch->fees,2) ;?>">
       <span class="popup_yes">Ajouter à ma commande</span></td>
          	
      	</tr>
      </table></li>                      

       
<?php }}?>

  	   </ul>
  	    
  
  	 	
   
<input type="submit" value="Passer au paiement" class="order_now_bt" style="margin:10px 5px 0 135px;" onclick="return upsellvaluecheck();">
 
<input type="button" value="Annuler" style="margin:10px 10px 0 0;" class="order_now_bt" onclick=" window.location = '<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>' "> 
</form>
	</div>

    </div>
</div>
  <!-- end pop-up for upsells -->                 
                      
                      
                      
                      
                      
                      
                      <div class="services_three_box">
                        <div class="vehicule_left">
                          <div class="info_heading">Informations du vehicule</div>
                          <div class="vehicule_inner">
                            <table >
                              <tr>
                                <th>MARQUE:</th>
                                <td><?php echo $car_brand?></td>
                              </tr>
                              <tr>
                                <th>Modele:</th>
                                <td><?php echo $model ?> </td>
                              </tr>
                              <tr>
                                <th>Annee: </th>
                                <td><?php echo $year?></td>
                              </tr>
                              <tr>
                                <th>Trim: </th>
                                <td><?php echo $trimpack; ?></td>
                              </tr>
                              <tr>
                                <th>COULEUR EXT:</th>
                                <td><?php echo $exterior; ?></td>
                              </tr>
                              <tr>
                                <th>Couleur INT: </th>
                                <td><?php echo $interior; ?></td>
                              </tr>
                              <tr>
                                <th>VIN#: </th>
                                <td><?php echo $serial?></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="document_info_box">
                          <div class="info_heading">Document </div>
                          <ul>
                          
                            <?php if($mail_sent == 2 ){ ?>
    <li><span>Contract Document</span><a title="Download PDF" href="<?php echo DEFAULT_URL;?>/userpdf.php?id=<?php echo $lead_id;?>&lead_id=<?php echo $id;?>" target="_blank"><img src="<?php echo DEFAULT_URL?>/landing/images/pdf-icon.gif" style="vertical-align: bottom;"></a></li> 
  <?php }?>
                          
                            <?php $docdetials = $objCommon->read('lead_doc_details','lead_detail_id='.$lead_detail_id);
	$count = mysql_num_rows($docdetials);
	if($count > 0)
	{
while($docdetailfetch = mysql_fetch_object($docdetials))
{ ?>
 <li><span><?php echo $docdetailfetch->doctitle;?></span> <a href="<?php echo DEFAULT_URL?>/download.php/?file=<?php echo $docdetailfetch->docname?>"><img src="<?php echo DEFAULT_URL?>/landing/images/pdf-icon.gif" width="33" height="37" alt=" "></a></li>
                            
<?php }} elseif($mail_sent != 2 ) { ?>
<li><span style="width: 190px;">Aucune Document Ajttaché</span></li>
<?php } ?>
                          </ul>
                        </div>
                        <div class="contact_info_box">
                          <div class="info_heading">Informations contacts</div>
                          <div class="contact_info_box_inner">
                            <table>
                              <tr>
                                <th style="width:36%">NOM de Contact </th>
                                <th style="width:14%">Titre </th>
                                <th style="width:28%">Telephone </th>
                                <th style="width:25%">Email </th>
                              </tr>
                               <?php $contactdetials = $objCommon->read('lead_contact_details','lead_detail_id='.$lead_detail_id);
	
                               $count = mysql_num_rows($contactdetials);
	if($count > 0)
	{
while($contactdetailfetch = mysql_fetch_object($contactdetials))
{ ?>
  <tr>
   <td><?php echo $contactdetailfetch->name;?></td>
    <td><?php echo $contactdetailfetch->title;?></td>
    <td><?php echo $contactdetailfetch->phone?></td>
    <td><a href="mailto:<?php echo $contactdetailfetch->email?>"><?php echo $contactdetailfetch->email?></a></td>
  </tr>
  <?php  }} else { ?>
   <tr>
    <td >Pas de contacts Ajouté</td>
     <td >&nbsp;</td>
      <td >&nbsp;</td>
       <td >&nbsp;</td>
  </tr>
  <?php }?>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="progress_box" style="border: 1px solid #777676;padding: 0px;margin-bottom: 20px;">
                        <div class="progress_title">L'etat D'Avancement</div>
                        <table class="progress_tbl">
                          <tr>
                            <th style="width:13%;border-bottom: 1px solid #777676">Date</th>
                            <th style="width:33%;border-bottom: 1px solid #777676"> Statut du Vehicule </th>
                            <th style="width:28%;border-bottom: 1px solid #777676">Emplacement Actuel </th>
                            <th style="width:26%;border-bottom: 1px solid #777676"> Description</th>
                          </tr>
                          <?php $announcedetials = $objCommon->read('lead_announce_details','lead_detail_id='.$lead_detail_id);
	$count = mysql_num_rows($announcedetials);
	if($count > 0)
	{
while($announcedetailfetch = mysql_fetch_object($announcedetials))
{ ?>
  <tr>
   <td><?php echo $announcedetailfetch->created_at;?></td>
    <td><?php echo $announcedetailfetch->stat;?></td>
    <td><?php echo $announcedetailfetch->location?></td>
    <td><?php echo $announcedetailfetch->desc;?></td></tr>
  <?php }} else { ?>
   <tr>
    <td colspan="4"  >Aucune annonce Ajouté</td>
  </tr>
  <?php }?>
                        </table>
                      </div>
                      <div class="progress_box">
                        <div class="progress_title">Galerie des photos</div>
                        <div class="product_gellery">
                         
                             
                               <?php $galdetials = $objCommon->read('lead_gallery_details','lead_detail_id='.$lead_detail_id,'id DESC limit 0,12');
	$count = mysql_num_rows($galdetials);
	$glcnt= 1;
	if($count > 0)
	{
while($galdetailfetch = mysql_fetch_object($galdetials))
{ ?>
<?php if($glcnt == 1) { ?> <ul class="pikame">
                            <li style="width:940px;font-size: 0;"> <ul class="right_thums"> <?php }?>
 <li><a href="<?php echo DEFAULT_URL?>/gallery/<?php echo $galdetailfetch->imagename ?>"><img src="<?php echo DEFAULT_URL?>/gallery/<?php echo $galdetailfetch->imagename ?>"/></a></li>
 <?php if($glcnt%6 == 0) { ?> </ul><ul> <?php }?>    
  <?php if($glcnt == $count) { ?> </ul></ul>
                  
                            </li> <?php }?>                            
<?php $glcnt++; }} else { ?>
<p>Aucune image disponible</p>
<?php } ?>


                              
                              
                          
                        </div>
                      </div>
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
      Droits d'auteur &copy; <a href="#">SYLC.com.</a> Tous droits réservés<?php echo $_GET[msgthank];?></p>
  </div>
   
 
  </div>
  
  <div style="display:none">
<div class="account_box no_bdr" id="inline_content_detail1" style="text-align: center">
<div class="sylc_logo"><img src="images/thnakyou.png" alt="Thankyou" /></div>
<div class="thankcontent" style="margin: 20px 0;color: #0F0F0F;font-family: Arial,Helvetica,sans-serif;font-size: 25px;">Nous vous remercions pour votre achat</div>  
   <img src="images/thankyou_ig.jpg" alt="Thankyou" width="500px" height="300px"/>


    </div>
</div>
  
  
	<div style="display: none;">
 <a href="#inline_content_detail1" id="thankyou" class="inlinedetailthank" >Member Login</a>
 </div>

    <script type="text/javascript">

 $(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".group2").colorbox({rel:'group2', transition:"fade"});
		$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
		$(".group4").colorbox({rel:'group4', slideshow:true});
		$(".ajax").colorbox();
		$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".iframe").colorbox({iframe:true, width:"50%", height:"70%"});
		$(".inline").colorbox({inline:true, width:"50%"});
		$(".inline02").colorbox({inline:true, width:"80%"});
		$(".inlinedetailthank").colorbox({inline:true, width:"50%"});
		$(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
	

 </script> 
  <?php 
 
    if($_GET[msgthank]=='paymentdone') { ?>
    <script type="text/javascript">
    $(document).ready(function(){
		$('#thankyou').click();
    });
    </script>
    <?php }?>
	
		            
    <script type="text/javascript">
    $(".vehicule_inner table tr:nth-child(2n+1)").css("background", "#e4e4e4");
    $(".document_info_box ul li:nth-child(2n+1)").css("background", "#e4e4e4");
    $(".contact_info_box_inner table tr:nth-child(2n+1)").css("background", "#e4e4e4");
    </script>       
  
  

            
	
</footer>
        </div>
</body>
</html>
