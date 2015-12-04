<?php

/*************************************************************************************************************

#Coder         : Manoj Pandit

*************************************************************************************************************/

$full_data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sylc corporation newsletter</title>
</head>

<body><table width="800" border="0" align="center" valign="top" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" height="53" vvalign="top"><table width="800" border="0" height="53"  align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="109" height="53" vvalign="top"><a href="http://www.sylc-export.com/" target="_blank"><img style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/home.jpg" border="0" width="109" height="53" /></a></td>
          <td height="53" width="121" vvalign="top"><a href="http://www.sylc-export.com/inventaire/classic-cars/" target="_blank"><img  style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/inventaire.jpg" border="0" width="121" height="53" /></a></td>
          <td height="53" width="301" vvalign="top"><a href="http://www.sylc-export.com/" target="_blank"><img  style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/logo-top.jpg" border="0" width="301" height="53" /></a></td>
          <td height="53" width="136" vvalign="top"><a href="http://www.sylc-export.com/voiture-americaine-occasion-ancienne/" target="_blank"><img  style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/recherche.jpg" border="0" width="136" height="53" /></a></td>
          <td height="53" width="133" vvalign="top"><a href="http://www.sylc-export.com/voiture-americaine-occasion-ancienne/neuf/" target="_blank"><img  style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/recherche-neuf.jpg" border="0" width="133" height="53" /></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" height="21" valign="top">
    <img style="border:none; display:block;" src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/logo-bot.jpg" border="0" width="800" height="21" /></td>
  </tr>';
  		$news_banner_image='';

		$common_object = new common();
		
		$dynamic_editor_text = $common_object->getNameById(TBL_BANNER,"id=1");
		
		$news_banner_image=$dynamic_editor_text->banner_image;
		
		$news_middle_block_contents=$dynamic_editor_text->middle_text;
		
		$news_footer_above_block_contents=$dynamic_editor_text->footer_above_text;
		
		$news_footer_block_contents=$dynamic_editor_text->footer_text;
		
		
  $full_data .='<tr>
    <td align="center" height="262" valign="top"><a href="http://www.sylc-export.com/" target="_blank"><img style="border:none; display:block" src="'.DEFAULT_ADMIN_URL.'/images/banner/'.$news_banner_image.'" border="0" width="800" height="262" alt="Banner" /></a></td>
  </tr>';
  
  $full_data .='<tr>
    <td align="left" vvalign="top"><table width="100%" border="0"  align="left" bgcolor="#ffffff" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top" height="13" width="100%" colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" width="13">&nbsp;</td>
          <td valign="top" width="768"><table width="768" border="0"  align="left" cellpadding="0" cellspacing="0">
             ';
		$nw_counter=1;	  
 		$all_new_models = $common_object->read(TBL_NEW_MODEL,"publish=1",'');
		while($new_models = mysql_fetch_object($all_new_models)) {
				if($nw_counter==1 || $nw_counter%2==1)	
				$full_data .='<tr>';
                
				$full_data .='<td valign="top" width="365"><table width="365" border="0"  align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="2" valign="top" align="center" style="padding:8px; border:1px solid #a8a8a8;"><table width="345" border="0"  align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td  valign="middle" align="center"><img src="'.DEFAULT_ADMIN_URL.'/images/new_model/'.$new_models->image.'" style="border:1px solid #a8a8a8"  width="345" height="238"  /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td valign="bottom" width="242" style="padding-top:10px; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">'.$new_models->brand_name.' '.$new_models->year.'</td>
                      <td valign="bottom" width="120" align="right" style="padding-top:10px; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">'.$new_models->prix.'</td>
                    </tr>
                  </table></td>';
				  
                if($nw_counter==1 || $nw_counter%2==1)
				$full_data .='<td valign="top" width="38">&nbsp;</td>';
				
                if($nw_counter%2==0)
				{
				$full_data .='</tr>
				<tr>
                <td colspan="3" height="20"></td>
              </tr>';
			  }
			  
				$nw_counter++;
				}
             $full_data .='<tr>
                <td colspan="3" height="20"></td>
              </tr>';
			  
			  if(isset($news_middle_block_contents) && strip_tags(trim($news_middle_block_contents))!=''){
			  
			  $full_data .='<tr>
                <td colspan="3" valign="top" align="left"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="padding:15px; border:1px solid #bdbdbd; font-size:14px; color:#000000; line-height:22px"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" align="left">';
			 $full_data .=$news_middle_block_contents;			
							
			 $full_data .='</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>';
			  
			  }
			  
             $full_data .='<tr>
                <td colspan="3" height="15"></td>
              </tr>';
			    
 		
		
			  
			  $full_data.='<tr>
                <td colspan="3" valign="top" align="left"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="border:1px solid #bdbdbd; font-size:14px; color:#000000;"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">';
			$all_old_models = $common_object->read(TBL_OLD_MODEL,"publish=1",'');
  			while($old_models = mysql_fetch_object($all_old_models)) {                        
                          
                          
                           $full_data.='<tr>
                            <td style="padding:15px 15px 10px 15px; border-bottom:1px dotted #b2b2b2; font-size:12px; color:#000000;"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td  valign="top" align="left" width="225"><img style="border:1px solid #787878" src="'.DEFAULT_ADMIN_URL.'/images/old_model/'.$old_models->image.'" width="223" height="109"  /></td>
                                  <td  valign="top" align="left" width="12"></td>
                                  <td  valign="top" align="left"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td valign="top" align="left" colspan="2"><h2 style="margin:0px; padding:0px; font-size:20px; color:#000; font-family:Arial, Helvetica, sans-serif; font-weight:bold;">'.$old_models->brand_name.' '.$old_models->year.'</h2></td>
                                      </tr>
                                      <tr>
                                        <td valign="top" align="left" colspan="2">'.htmlentities($old_models->contents).'</td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="20"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/arrow.jpg" width="11" height="21"  /></td>
                                        <td valign="middle" align="left" width="480" style="font-size:20px; color:#c62227; font-family:Arial, Helvetica, sans-serif; font-weight:bold;">'.$old_models->prix.'</td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>';
                          
                          
                          }
                          
                          $full_data.='</table></td></tr></table></td></tr> ';
			  
			  
			  $full_data .='<tr>
                <td colspan="3" height="28"></td>
              </tr>';
			  
			  $full_data .='
              <tr>
                <td colspan="3" valign="middle" style="padding-bottom:6px"><table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td  valign="middle" align="center" style="font-size:28px; color:#000; text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"> Nouvelles voitures chez SYLC CORPORATION </td>
                    </tr>
                  </table></td>
              </tr>';
			  
			  if(isset($news_footer_above_block_contents) && trim($news_footer_above_block_contents)!=''){
			  
              $full_data .='<tr>
                <td colspan="3" valign="top"   align="center" height="247"><table width="100%"  style="border:3px solid #4d4d4d"  align="left" cellpadding="0" valign="top" cellspacing="0">
                    <tr>
                      <td  valign="top" align="center" height="247">'.str_replace('<p>','<p style="margin:0px; padding:0px;">',$news_footer_above_block_contents).'</td>
                    </tr>
                  </table></td>
              </tr>';
			  
			  }
			  
             $full_data .='<tr>
                <td colspan="3" height="9"></td>
              </tr>';
			  
             if(isset($news_footer_block_contents) && trim($news_footer_block_contents)!=''){
			 
			 $full_data .='<tr>
                <td colspan="3" valign="top" height="247"   align="center"><table width="100%"  style="border:3px solid #4d4d4d" align="left" cellpadding="0" valign="top" cellspacing="0">
                    <tr>
                      <td  valign="top" align="center" height="247">'.str_replace('<p>','<p style="margin:0px; padding:0px;">',$news_footer_block_contents).'</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td valign="top" width="16">&nbsp;</td>
        </tr>';
		}
        $full_data .='<tr>
          <td valign="top" height="8" colspan="3" width="100%">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" height="7" colspan="3" width="100%" style="margin:0px; padding:0px"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/footer-top.jpg" width="800" height="7" style="border:None; display:block;"  /></td>
        </tr>
        <tr>
          <td valign="top"  colspan="3" width="100%" style="padding:6px 6px 7px 6px;" bgcolor="#2f2f2f"><table width="100%"  align="left" cellpadding="0" valign="middle" cellspacing="0">
              <tr>
                <td valign="top" align="left" width="173" height="26"><table width="100%"  align="left" cellpadding="0" valign="middle" cellspacing="0">
                    <tr>
                      <td valign="top" align="left" width="29"><a href="http://www.facebook.com/Sylccorporation" target="_blank"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/facebook.jpg" border="0" width="25" height="25"  /></a></td>
                      <td valign="top" align="left" width="29"><a href="http://www.youtube.com/user/yoathome?feature=results_main" target="_blank"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/youtube.jpg" width="25" border="0" height="25"  /></a></td>
                      <td valign="top" align="left" width="33"><a href="http://www.sylc-export.com/blog/" target="_blank"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/blog.jpg"  width="25" height="25" border="0" /></a></td>
                      <td valign="top" align="left" width="82"><a href="#" target="_blank"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/like.jpg" width="40" height="20" border="0" /></a></td>
                    </tr>
                  </table></td>
                <td valign="middle" align="left" width="190" height="26" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif;"><table width="100%"  align="left" cellpadding="0" valign="middle" cellspacing="0">
                    <tr>
                      <td valign="middle" align="left" width="32"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/telephone.jpg" width="26" height="21"  /></td>
                      <td valign="middle" align="left" width="158" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif;">(Fr) 01.76.63.32.16 </td>
                    </tr>
                  </table></td>
                <td valign="middle" align="left" width="212" height="26" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif;"><table width="100%"  align="left" cellpadding="0" valign="middle" cellspacing="0">
                    <tr>
                      <td valign="middle" align="left" width="24"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/hollywood.jpg" width="17" height="26"  /></td>
                      <td valign="middle" align="left" width="188" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif;">Hollywood, FL 33020 </td>
                    </tr>
                  </table></td>
                <td valign="middle" align="left" width="210" height="26" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif;"><table width="100%"  align="left" cellpadding="0" valign="middle" cellspacing="0">
                    <tr>
                      <td valign="middle" align="left" width="30"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/email.jpg" width="23" height="16"  /></td>
                      <td valign="middle" align="left" width="180"><a href="mailto:info@sylc-export.com" style="color: #C5C5C5; font: bold 16px/30px Arial,Helvetica,sans-serif; text-decoration:none;" target="_blank">info@sylc-export.com</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#242424" colspan="3" width="100%"><table width="100%"  align="left" cellpadding="0" valign="top" cellspacing="0">
              <tr>
                <td valign="top" width="7"></td>
                <td valign="top" width="793"><table width="100%"  align="left" cellpadding="0" valign="top" cellspacing="0">
                    <tr>
                      <td valign="top" width="100%" height="18">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top" width="100%"><table width="100%" border="0" align="left" cellpadding="0" valign="top" cellspacing="0">
                          <tr>
                            <td valign="top" width="353" style="border-right:1px dotted #575555"><table width="100%"  align="left" cellpadding="0" valign="top" cellspacing="0">
                                <tr>
                                  <td valign="top" align="left" width="112"><table width="100%"  align="left"  cellpadding="0" valign="top" cellspacing="0">
                                      <tr>
                                        <td valign="top" colspan="2" align="left"  height="22" style=" color: #C5C5C5; font: bold 14px Arial,Helvetica,sans-serif;">Liens du Site </td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/presentation/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Présentation</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/media/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Média</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Inventaire</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/recherche/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Recherche</a></td>
                                      </tr>
                                    </table></td>
                                  <td valign="top" align="left" width="65">&nbsp;</td>
                                  <td valign="top" align="left" width="149"><table width="100%"  align="left"  cellpadding="0" valign="top" cellspacing="0">
                                      <tr>
                                        <td valign="top" colspan="2" align="left"  height="22" style=" color: #C5C5C5; font: bold 14px Arial,Helvetica,sans-serif;">À Propos de Nous</td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/logistique/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Logistique</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/news/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">News</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/condition-de-vente/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Conditions de vente</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="112" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/contact/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Contactez-nous</a></td>
                                      </tr>
                                    </table></td>
                                  <td valign="top" align="left" width="26">&nbsp;</td>
                                </tr>
                              </table></td>
                            <td valign="top" width="15">&nbsp;</td>
                            <td valign="top" width="422"><table width="100%"  align="left" border="0" cellpadding="0" valign="top" cellspacing="0">
                                <tr>
                                  <td valign="top" colspan="5" align="left"  height="22" style=" color: #C5C5C5; font: bold 14px Arial,Helvetica,sans-serif;">Top Marques à Vendre </td>
                                </tr>
                                <tr>
                                  <td valign="top"  width="144"><table width="100%"  align="left" border="0" cellpadding="0" valign="top" cellspacing="0">
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Dodge</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Lincone</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Ford</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">General Motors</a></td>
                                      </tr>
                                    </table></td>
                                  <td valign="top"  width="20">&nbsp;</td>
                                  <td valign="top"  width="144"><table width="100%"  align="left" border="0" cellpadding="0" valign="top" cellspacing="0">
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Chevrolet</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Cadillac</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Jeep</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="130" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Hummer</a></td>
                                      </tr>
                                    </table></td>
                                  <td valign="top"  width="20">&nbsp;</td>
                                  <td valign="top"  width="95"><table width="100%"  align="left" border="0" cellpadding="0" valign="top" cellspacing="0">
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="81" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Pontiac</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="81" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Buick</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="http://seobranddev.com/sylc-newsletter1/images/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="81" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">GMC</a></td>
                                      </tr>
                                      <tr>
                                        <td valign="middle" align="left" width="14" height="28" style="border-bottom:1px dotted #575555"><img src="'.DEFAULT_ADMIN_URL.'/images/latest_newsletter_img/bullet.jpg" width="5" height="9"  /></td>
                                        <td valign="middle" align="left" width="81" height="28" style="border-bottom:1px dotted #575555"><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"  target="_blank" style="color: #C5C5C5; font: 12px Arial,Helvetica,sans-serif; text-decoration: none;">Mustang</a></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td valign="top" width="100%" height="5">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>';

?>