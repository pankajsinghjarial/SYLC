<?php include('conf/config.inc.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sylc Corporation</title>
</head>

<body style="margin:0px; padding:0px;">
<?php

$full_data = '<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><a href="http://www.sylc-export.com/voitures-americaines"><img src="http://www.sylc-export.com/voitures-americaines/news_images/logo.jpg" alt="Sylc Corporation" width="242" height="95" border="0" /></a></td>
          <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right" valign="middle" style="padding:23px 0 0 0;"><img src="http://www.sylc-export.com/voitures-americaines/news_images/mail_icon.jpg" width="22" height="12" alt="mail" border="0" /> <span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#1e1e1e;">Email:</span> <a href="mailto:info@sylc-export.com" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#c3161c; text-decoration:underline;">info@sylc-export.com</a></td>
              </tr>
              <tr>
                <td align="right" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#1e1e1e; padding:18px 0 0 0;"><img src="http://www.sylc-export.com/voitures-americaines/news_images/phone_icon.jpg" width="24" height="14" alt="" border="0" /> Phone: <strong style="color:#c3161c;">001.305.332.9761</strong> &nbsp;&nbsp;&nbsp;<img src="http://www.sylc-export.com/voitures-americaines/news_images/skype_icon.jpg" width="25" height="20" alt="" style="vertical-align:sub;" border="0" /> sylccorp</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/news_images/banner.jpg" width="800" height="282" alt="" border="0" /></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/news_images/left_img.jpg" width="100" height="94" alt=" " border="0" /></td>
          <td align="left" valign="top"><a href="#used_car_link"><img src="http://www.sylc-export.com/voitures-americaines/news_images/used_cars.jpg" width="341" height="94" alt="used cars" border="0" /></a></td>
          <td align="left" valign="top"><a href="#new_car_link"><img src="http://www.sylc-export.com/voitures-americaines/news_images/new_cars.jpg" width="259" height="94" alt="new cars" border="0" /></a></td>
          <td align="left" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/news_images/right_img.jpg" width="100" height="94" alt=" " border="0" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:42px; color:#1e1e1e; font-weight:bold; text-transform:uppercase;" id="new_car_link">New Cars</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#4c5051; line-height:18px; padding:10px 0 18px 0; border-bottom:2px dashed #e8e8e8;"> SYLC Corporation vous apporte les affaires "STOCK U.S.A NEUF" du moment. Decouvrez des lots de voitures americaines diponbles immediatement aux US mais aussi disponible sur le territoire europeen.
            Veuillez nous contacter afin de reserver votre vehicule, demande de renseignement ou brochures. </td>
        </tr>
      </table></td>
  </tr>';
  

		$common_object = new common();
		$all_brands = $common_object->read(TBL_BRANDS,"publish='yes'",'');
		while($brands = mysql_fetch_object($all_brands)) { 
		$childs = $common_object->read(TBL_NEW_CAR,"brand_id=$brands->id AND publish=1",'');		
		
  
 $full_data .= '<tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" style="padding:0 0 10px 0;"><img src="superadmin/images/brands/'.$brands->logo.'" width="172" height="98" alt="ford" border="0" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #e1e1e1; border-bottom:0px;">
              <tr>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">Year</th>
                <th align="left" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">MOdel</th>
                <th align="left" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">Color</th>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">dispo</th>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">prix</th>
              </tr>';

		while($child_cars = mysql_fetch_object($childs)) {      
              
              
              
          $full_data .=     '<tr>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$child_cars->year.'</td>
                <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$child_cars->model_name.'</td>
                <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$child_cars->color.'</td>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$child_cars->dispo.'</td>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-bottom:1px solid #e1e1e1;">'.$child_cars->prix.' USD</td>
              </tr>';
             }   
              
          $full_data .=  '</table></td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/news_images/curvs.jpg" width="800" height="161" alt=" " border="0" /></td>
        </tr>
      </table></td>
  </tr>';
  

      }

  
 $full_data .= '<tr>
    <td align="center" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:42px; color:#1e1e1e; font-weight:bold; text-transform:uppercase;" id="used_car_link">Used Cars</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#4c5051; line-height:18px; padding:10px 0 18px 0; border-bottom:2px dashed #e8e8e8;"><img src="http://www.sylc-export.com/voitures-americaines/news_images/usedcar.jpg" alt="used cars" width="600" height="82" border="0" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#4c5051; line-height:18px; padding:10px 0 18px 0; border-bottom:2px dashed #e8e8e8;">L`amour et la passion des voitures américaines anime de manière permanente l`équipe de<strong> SYLC<br />
            CORPORATION</strong>. Notre expertise dans le domaine de l`importation de véhicules se traduit par une grande performance en terme d`économie et de limitation de l`ensemble des coûts. <strong>SYLC CORPORATION est <br />
            transparente</strong> au niveau du deroulement de ses procedures, ne prend aucune marge commerciale sur les frais lićs a l`achat d`un vehicule tels que le transport domestique, maritime ou encore sur la negociation d`un vehicule, Notre remuneration est une commission fixe. Notre Priorite est de gagner votre confiance et votre satisfaction en vous accompagnant dans la recherche de votre véhicule jusqu`à la livraison à votre domicile. En vous appuyant sur un importateur compétent, fiable qui presente toutes les garanties en termes de licences , d`agreement et d`assurances ,vous avez la certitude de faire les meilleurs choix au moindre coût.</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" style="padding:0 0 10px 0;"><img src="http://www.sylc-export.com/voitures-americaines/news_images/mustang.jpg" width="171" height="103" alt="mustang" border="0" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #e1e1e1; border-bottom:0px;">
              <tr>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">Year</th>
                <th align="left" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">MOdel</th>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">Image</th>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">dispo</th>
                <th align="center" valign="top" scope="col" style="background:#19b0ea; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff; text-transform:uppercase; padding:10px 12px;">prix</th>
              </tr>';
             
             
                $all_used_cars = $common_object->read(TBL_USED_CAR,"publish=1",'');
						 while($used_cars = mysql_fetch_object($all_used_cars)) {

              
       $full_data .= '<tr>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$used_cars->year.'</td>
                <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;">'.$used_cars->model_name.'</td>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;"><img src="superadmin/images/used_car/image/'.$used_cars->image.'" alt=" " width="137" height="59" border="0" /></td>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-right:1px solid #e1e1e1; border-bottom:1px solid #e1e1e1;"><img src="superadmin/images/used_car/dispo/'.$used_cars->dispo.'" alt="auto trader" width="89" height="33" border="0" /></td>
                <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#2e2e2e; padding:14px; border-bottom:1px solid #e1e1e1;">'.$used_cars->prix.' USD</td>
              </tr>';          
              
   }
   $full_data .='</table></td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="http://www.sylc-export.com/voitures-americaines/news_images/_bottomcurv.jpg" width="800" height="85" alt=" " border="0" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767;">Copyright &copy; 2011. All Rights Reserved.</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; padding:10px 0 20px 0"><a href="#" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; text-decoration:none;">Terms &amp; Conditions</a> | <a href="#" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; text-decoration:none">Privacy Policy</a> | <a href="#" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; text-decoration:none;">DMCA Policy</a> | <a href="#" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#676767; text-decoration:none;">Product Label</a></td>
  </tr>
</table>';
echo $full_data;
?> 
</body>
</html>
