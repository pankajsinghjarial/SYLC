<style>
#id-form th{max-width: 325px;}
</style>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Enquiry Information</h1>
    </div>
      <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
          <th class="topleft"></th>
          <td id="tbl-border-top">&nbsp;</td>
          <th class="topright"></th>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
        </tr>
        <tr>
          <td id="tbl-border-left"></td>
          <td><!--  start content-table-inner -->
            <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <td colspan="3"><?php if(isset($errorMsg)) {?>
                          <!--  start message-red -->
                          <div id="message-red">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="red-left" style="padding-left: 35px;"><?php echo $errorMsg?></td>
                                <td class="red-right"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_red.gif" alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-red -->
                          <?php } else if(isset($_SESSION['success_msg']) && $_SESSION['success_msg']!='') { ?>
                          <!--  start message-green -->
                          <div id="message-green">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="green-left" style="padding-left: 35px;"><?php echo $_SESSION['success_msg']?></td>
                                <td class="green-right"><a class="close-green"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_green.gif"   alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-green -->
                          <?php 
							unset($_SESSION['success_msg']);
						} ?>
                        </td>
                      </tr>
                       <tr>
                        <th valign="top">Meilleure enchère actuelle:</th>
                        <td><?php echo $current_bid; ?> </td>
                        <td>&nbsp;</td>
                      </tr>
						<tr>
                        <th valign="top">Votre enchère maximale :</th>
                        <td><?php  echo $miximum_bid?></td>
                        <td>&nbsp;</td>
                      </tr>            
                       
                        
                        <tr>
                        <th valign="top">Logistique / import - Pays:</th>
                        <td><?php echo $logistique_pays; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Transport - Terrestre USA:</th>
                        <td><?php echo $transport_terrestre; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Transport - International:</th>
                        <td><?php echo $transport_international; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Assurance - Transport:</th>
                        <td><?php echo $assurance_transport; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Frais Transitaire - Débarquement, Traction &
Dépotage:</th>
                        <td><?php echo $frais_transitaire; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Homologation - Francisation, passage aux mines:</th>
                        <td><?php echo $homologation_francisation; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Dédouanement - Procédures administratives:</th>
                        <td><?php echo $administratives; ?> </td>
                        </tr>
                      
                      <tr>
                        <th valign="top">H.T rendu le port sélectionné :</th>
                        <td><?php echo $prix_total_ht; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Taxe de Douane HT:</th>
                        <td><?php echo $taxe_de; ?> </td>
                        </tr>
                        <tr>
                        <th valign="top">TVA France (Le Havre:</th>
                        <td><?php echo $tva_franch; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Prix Total TTC rendu le port sélectionné :</th>
                        <td><?php echo $prix_total_ttc; ?> </td>
                        </tr>
                      <tr>
                        <th valign="top">Name:</th>
                        <td><?php echo $name; ?> </td>
                        <td>&nbsp;</td>
                      </tr>
						<tr>
                        <th valign="top">Email:</th>
                        <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                        <td>&nbsp;</td>
                      </tr>            
                       
                        
                        <tr>
                        <th valign="top">Phone Number:</th>
                        <td><?php echo $phone; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Code Postal:</th>
                        <td><?php echo $code_postal; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Address:</th>
                        <td><?php echo $address; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Message:</th>
                        <td><?php echo $message; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Ville:</th>
                        <td><?php echo $ville; ?> </td>
                        </tr>
                        
                        <tr>
                        <th valign="top">Pays:</th>
                        <td><?php echo $pays; ?> </td>
                        </tr>
                        
                         <tr>
                        <th valign="top">Date:</th>
                        <td><?php echo $created; ?> </td>
                        </tr>
                        <!--   <tr>
                        <th valign="top">Enquiry For:</th>
                        <td><?php /*		
								 $name = $objCommon->customQuery("select value from car_varchar where car_id='".$car_id."' and attribute_id = '22'");
								 if(mysql_num_rows($name) > 0){
									 $carname = mysql_fetch_object($name); 
								 	 echo $carname->value;
								 }
								 else{
									 $name = $objCommon->customQuery("select title from ebay_car where itemId = ".$car_id);
									 $carname = mysql_fetch_object($name); 
								 	 echo $carname->title;
								 }
								 
							*/?> </td>
                        </tr> -->
                     <?php /*?>  <tr>
                        <th valign="top">Message:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="desc" id="desc" readonly="readonly" style="resize:none;"><?php echo $message ;?></textarea></td>
                        
                      </tr>
                       <tr>
                        <th valign="top">Address:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="desc" id="desc" readonly="readonly" style="resize:none;"><?php echo $address ;?></textarea></td>
                        
                      </tr><?php */?>
                       <tr>
                        <th valign="top"></th>
                        <td><input type="image" src="../../images/forms/back.jpg" onclick="location.href='<?php echo DEFAULT_ADMIN_URL; ?>/contact/newpage/index.php'" /></td>
                        
                      </tr>
                    </table>
                    <!-- end id-form  -->
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                  <td></td>
                </tr>
              </table>
              <div class="clear"></div>
            </div>
            <!--  end content-table-inner  -->
          </td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
	
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
