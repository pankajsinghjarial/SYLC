<?php
//echo $_SERVER['DOCUMENT_ROOT'];die;
 $servername = "localhost";
    $username = "sylcexpo_syadmin";
    $password = "admin1234";
    $dbname = "sylcexpo_sylcorp";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



	$sql = "SELECT * FROM newsletter where id='1'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
if (isset($_POST['content'])) {

   



    $text = $firstname = mysqli_real_escape_string($conn, $_POST['content']);

   $text2=str_replace('"/images_newsletter/','"http://sylc-export.com/images_newsletter/',$text);
//echo $text2;die;
    $sql = "update newsletter set text='$text2' where id='1'";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Newsletter updated successfully<h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$sql = "SELECT * FROM newsletter where id='1'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                 plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],


            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",


relative_urls: false
 });
        </script>
    </head>
    <body>
        

        <form method="post" action="">
<input type="submit" value="Update news letter" style="margin-left: 89%;margin-bottom:10px;"/>
            <textarea name="content" style="width:100%;height:600px;">
	






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.Maillink, .Maillink:hover, .Maillink:focus, .Maillink:active, .Maillink::visited {color: #006bc8 !important; text-decoration:none !important;}
</style>
</head>

<body style="margin:0px; padding:0px;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td align="center" valign="top"><table border="0" width="650" cellspacing="0" cellpadding="0" align="center" bgcolor="#e1e1e1">
          <tbody>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td style="padding-bottom:10px;"><table style="background: #f0f0f0;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center" bgcolor="#565656">
                  <tbody>
                    <tr>
                      <td style="padding: 0px 0 12px 15px;"><a href="#" target="new"><img style="border: 0px; display: block;" src="http://sylc-export.com/images_newsletter/logo.png" alt="logo" /></a></td>
                      <td align="right" style="padding:0 15px 0 0;"><table width="275" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="bottom"><img style="border: 0px; display: block;" src="http://sylc-export.com/images_newsletter/call_icon02.png"
     width="275" height="32" alt="logo" /></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="border:1px solid #e0e0e0; border-top:none; background: #ffffff; padding-bottom:10px; padding-top:5px;"><a style="color: #cc0000; font-weight: bold;  text-decoration: none; margin: 0px; border: 1px solid #fff;font-family: Arial; font-size:18px;" href="#">01.60.29.99.02 <span style="color: #d1d1d1; font-weight: 100;">|</span> 06.98.22.51.82</a></td>
                          </tr>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#5383b4" style="padding-top:10px; background-image:url(http://sylc-export.com/images_newsletter/background-banner.jpg); background-repeat:no-repeat; background-position:left top;"><table width="473" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:28px; font-weight:bold; color:#171717;">Another Classic Car Found &amp; Sold by us</td>
                        </tr>
                        <tr>
                          <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#171717; padding-top:8px; padding-bottom:10px;">1959 Chevrolet Corvette Convertible</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="60" align="left" valign="top">&nbsp;</td>
                                <td width="590" align="left" valign="top" bgcolor="#edf1f5" style="padding:0 10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="top" style="font-family: Arial; color: #cc0000; font-size:20px; padding:5px 0;">We Found for our Client 17 Cars</td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top"><table width="540" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="240" bgcolor="#ffffff" style="background:#ffffff; padding:5px 0px 5px 10px;"><table width="240" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                  <tr>
                                                    <td style="color: #1169b5; font-size: 13px; font-family: Arial; ">auto trader :</td>
                                                    <td style="color: #171717; font-size: 13px; font-family: Arial; ">$43 600 purchase price</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="color: #1169b5; font-size: 13px; font-family: Arial; ">cars.com:</td>
                                                    <td style="color: #171717; font-size: 13px; font-family: Arial; ">$51 056 purchase price</td>
                                                  </tr>
                                                </tbody>
                                              </table></td>
                                            <td width="30">&nbsp;</td>
                                            <td width="240" bgcolor="#ffffff" style="background:#ffffff; padding:5px 0px 5px 10px;"><table width="240" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                  <tr>
                                                    <td style="color: #1169b5; font-size: 13px; font-family: Arial; ">autoplus.com :</td>
                                                    <td style="color: #171717; font-size: 13px; font-family: Arial; ">$49 960 purchase price</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="color: #1169b5; font-size: 13px; font-family: Arial; ">carsmart.com :</td>
                                                    <td style="color: #171717; font-size: 13px; font-family: Arial; ">$44 500 purchase price</td>
                                                  </tr>
                                                </tbody>
                                              </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top" style="font-family: Arial; color: #171717; font-size:16px; font-weight:bold; padding:5px 0; text-decoration:none;"><span style="font-family: Arial; color: #006bc8 !important; font-size:16px;  text-decoration:none !important; font-weight:bold;" class="Maillink">info@sylc-export.com</span> : $22,000 Derived to customer</td>
                                    </tr>
                                  </table></td>
                                <td width="60" align="left" valign="top">&nbsp;</td>
                              </tr>
                            </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" height="220" style="padding-top:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/Banner-New.png" width="546" height="220" alt="" style="display:block;" /></td>
                          <td align="right" valign="bottom"><img src="http://sylc-export.com/images_newsletter/Small-Banner.png" alt="" width="104" height="220" style="display:block;" /></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="650" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="90" align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/left-image.jpg" width="90" height="82" alt="" style="display:block" /></td>
                          <td width="473" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="28" bgcolor="#ba0503" align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#fff; padding-top:12px;">Sylc export saved this Customer $7.500 !!!</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/bottom-image.jpg" width="473" height="42" alt="" style="display:block" /></td>
                              </tr>
                            </table></td>
                          <td width="87" align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/right-image.jpg" width="87" height="82" alt="" style="display:block" /></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td bgcolor="#f4f4f4" align="left" valign="top" style="padding:0 10px; background:#f4f4f4;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#cb3937" style="background:#cb3937; color: #fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; padding:7px 10px;">See what others paid</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="144" align="left" valign="top" style="background:#5b5b5b;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center" valign="top" style="height:9px;"><img src="http://sylc-export.com/images_newsletter/arrow-image1.jpg" alt="" width="144" height="9" style="display:block" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" style="background:#3cb0ed; height:119px; color: #fff; font-family: Arial; font-size: 13px;"> Your Target Price is <br />
                                  0.39% below MSRP.</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" style="height:7px;"><img src="http://sylc-export.com/images_newsletter/arrow-image2.jpg" alt="" width="144" height="7" style="display:block" /></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" style="height:122px; color: #fff; font-family: Arial; font-size: 13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="top" style="color: #fff; font-family: Arial; font-size: 13px; padding-bottom:20px;">Loan</td>
                                    </tr>
                                    <tr>
                                      <td  align="center" valign="middle" style="color: #fff; font-family: Arial; font-size: 13px;"> Final price: $22,000.00</td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                          <td width="486" align="left" valign="top" style="background:#ffffff; padding-bottom:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top" style="padding-left:10px; padding-right:30px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr>
                                        <td style="font-family: Arial; font-size: 9px; font-weight: 600; color: #373737;"><strong>Unusually Low Price</strong><br />
                                          Less then $28,360</td>
                                        <td>&nbsp;</td>
                                        <td style="font-family: Arial; font-size: 9px; font-weight: 600; color: #373737; padding: 8px 5px;"><strong>Great Price</strong><br />
                                          Less then $29,770</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td style="font-family: Arial; font-size: 9px; font-weight: 600; color: #373737; padding: 8px 7px;"><strong>Good Price</strong><br />
                                          Less then $26,392</td>
                                        <td style="font-family: Arial; font-size: 9px; font-weight: 600; color: #373737; padding: 8px 12px;"><strong>Above Marker</strong><br />
                                          $30,392 or more</td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/graph.jpg" alt="" width="486" height="184" style="display:block;" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" style="padding-left:10px;"><table width="420px" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr>
                                        <td style="font-family: Arial; font-size: 9px; font-weight: 600; color: #373737; padding-right:10px;"><strong>National</strong><br />
                                          Showing 37 Sales</td>
                                        <td style="font-family: Arial; font-size: 9px; text-align: center; font-weight: 600; color: #373737; border: 1px solid #e1e1e1; padding: 8px 5px;">Factory Invoice<br />
                                          <strong>$29.372</strong></td>
                                        <td>&nbsp;</td>
                                        <td style="font-family: Arial; font-size: 9px; text-align: center; font-weight: 600; color: #373737; border: 1px solid #e1e1e1; padding: 8px 7px;">Average Paid<br />
                                          <strong>$29,889</strong></td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td style="background: #e1e1e1; font-family: Arial; font-size: 9px; text-align: center; font-weight: 600; color: #373737; border: 1px solid #e1e1e1; padding: 0px 10px;"><img src="http://sylc-export.com/images_newsletter//logo1.png" alt="" /><br />
                                          <strong>$26,392</strong></td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td style="font-family: Arial; font-size: 9px; text-align: center; font-weight: 600; color: #373737; border: 1px solid #e1e1e1; padding: 8px 12px;">MSRP<br />
                                          <strong>$30,820</strong></td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><img src="http://sylc-export.com/images_newsletter/Bottom-shadow.jpg" alt="" width="630" height="23" style="display:block;" /></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td bgcolor="#f4f4f4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td width="10">&nbsp;</td>
                      <td style="background: #e2e2e2 none repeat scroll 0 0; color: #4a4a4a; font-family: Arial; font-size: 13px; padding: 10px; text-align: center; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/ship.png" alt="" /></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="color: #4a4a4a; font-family: Arial; font-size: 13px; padding-bottom:30px;">Une equipe, aux USA et en France, coordonne toute la logistique de votre voiture americaine, depuis son achat jusqu'a sa livraison...</td>
                          </tr>
                        </table></td>
                      <td width="10">&nbsp;</td>
                      <td style="background: #e2e2e2 none repeat scroll 0 0; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px; text-align: center; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/car02.png" alt="" /></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="color: #4a4a4a; font-family: Arial; font-size: 13px; padding-bottom:30px;"> SYLC Car Centrale vous offres des packs adaptes a votre budget, demandez nous...</td>
                          </tr>
                        </table></td>
                      <td width="10">&nbsp;</td>
                      <td style="background: #e2e2e2 none repeat scroll 0 0; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px; text-align: center; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/glob.png" alt="" /></td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="color: #4a4a4a; font-family: Arial; font-size: 13px; padding-bottom:30px;"> Tous les avantages, competences et prix direct USA avec votre partenaire SYLC Car Centrale.</td>
                          </tr>
                        </table></td>
                      <td width="10">&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td style="background:#f4f4f4; padding-top:15px;" bgcolor="#f4f4f4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr>
                                    <td width="10">&nbsp;</td>
                                    <td><img src="http://sylc-export.com/images_newsletter/boat.jpg" alt="" /></td>
                                    <td style="background: #eaeaea; font-family: Arial; font-size: 20px; color: #e73a37; font-weight: 600; text-transform: uppercase; letter-spacing: -1px; padding: 0 10px 0 5px;">Transport Maritime <br />
                                      <span style="font-size: 13px; font-weight: normal; letter-spacing: -0.7px;">A partir de $900 vers la France</span></td>
                                  </tr>
                                </tbody>
                              </table></td>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr>
                                    <td width="15">&nbsp;</td>
                                    <td style="background: #2a7cbf none repeat scroll 0 0; color: #fff; font-family: Arial,Helvetica,sans-serif; font-size: 34px; font-weight: 600; height: 106px; letter-spacing: -2px; padding: 0 10px;">$500</td>
                                    <td style="background: #eaeaea; font-family: Arial; font-size: 32px; color: #2a7cbf; font-weight: 600; text-transform: uppercase; letter-spacing: -1px; padding: 0 10px 0 5px;">Economisez<br />
                                      <span style="font-size: 14px; font-weight: normal;">Lorsque vous utilisez votre</span><br />
                                      <span style="font-size: 24px;">Carte de Credit</span></td>
                                    <td width="10">&nbsp;</td>
                                  </tr>
                                </tbody>
                              </table></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td style="font-family: Arial; font-size: 28px; color: #323232; text-align: center; margin: 0px; padding-top:20px;">Client Testimonials</td>
                          </tr>
                          <tr>
                            <td align="center" valign="top" style="padding-bottom:30px;"><img src="http://sylc-export.com/images_newsletter/headding_bg.png" alt="" /></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="padding-bottom:20px;"><table border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td width="10">&nbsp;</td>
                            <td align="center" valign="top" style="background: #eaeaea none repeat scroll 0 0; color: #4a4a4a; font-family: arial; font-size: 13px;  min-height: 212px; min-width: 125px; padding: 10px; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/blog_post.png" alt="" /></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="top" style="font-family: arial; font-size: 13px; padding-bottom:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur erat posuere velit facilisis, at dapibus sapien cursus.</td>
                                      </tr>
                                      <tr>
                                        <td><table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                              <tr style="background: #dedede; padding: 0px;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px; font-family: Arial; color:#333;">Model:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Toyota : Supra twin turbo</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Year:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">2000</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">Price:</td>
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">$26,392</td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                                <td style="text-align: right; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-style:italic; padding-top:5px;">-James Brown</td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            <td width="10">&nbsp;</td>
                            <td align="center" valign="top"  style="background: #eaeaea none repeat scroll 0 0; color: #4a4a4a; font-family: arial; font-size: 13px;  min-height: 212px; min-width: 125px; padding: 10px; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/blog_post1.png" alt="" /></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="top" style="font-family: arial; font-size: 13px; padding-bottom:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur erat posuere velit facilisis, at dapibus sapien cursus.</td>
                                      </tr>
                                      <tr>
                                        <td><table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                              <tr style="background: #dedede; padding: 0px;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px; font-family: Arial; color:#333;">Model:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Toyota : Supra twin turbo</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Year:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">2000</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">Price:</td>
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">$26,392</td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                                <td style="text-align: right; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-style:italic; padding-top:5px;">-James Brown</td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            <td width="10">&nbsp;</td>
                            <td align="center" valign="top"  style="background: #eaeaea none repeat scroll 0 0; color: #4a4a4a; font-family: arial; font-size: 13px;  min-height: 212px; min-width: 125px; padding: 10px; display: block;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top" style="padding-bottom:10px;"><img style="display: block;" src="http://sylc-export.com/images_newsletter/blog_post2.png" alt="" /></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="top" style="font-family: arial; font-size: 13px; padding-bottom:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur erat posuere velit facilisis, at dapibus sapien cursus.</td>
                                      </tr>
                                      <tr>
                                        <td><table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                              <tr style="background: #dedede; padding: 0px;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px; font-family: Arial; color:#333;">Model:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Toyota : Supra twin turbo</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">Year:</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #eaeaea; padding:5px; font-size:11px;font-family: Arial; color:#333;">2000</td>
                                              </tr>
                                              <tr style="background: #dedede;">
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">Price:</td>
                                                <td style="padding:5px; font-size:11px; font-family: Arial; color:#333;">$26,392</td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                                <td style="text-align: right; font-size:13px; font-family:Arial, Helvetica, sans-serif; font-style:italic; padding-top:5px;">-James Brown</td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            <td width="10">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tbody>
                          <tr>
                            <td align="left" valign="top" style="background:#e9e8e8; padding-bottom:8px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top" style="padding:20px 0 30px;"><table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td align="center" valign="top" style="font-family: Arial; font-size: 28px; color: #323232; text-align: center; margin: 0px;">Autre voiture en demande</td>
                                        </tr>
                                        <tr>
                                          <td align="center" valign="top"><img src="http://sylc-export.com/images_newsletter/headding_bg.png" alt="" /></td>
                                        </tr>
                                      </tbody>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td><table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td width="8">&nbsp;</td>
                                          <td style="background: #fff; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px 10px 20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><img style="display: block; margin: 0px; padding: 0px;" src="http://sylc-export.com/images_newsletter/ford.jpg" alt=" " /></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="middle" style="background: #e92414; color: #fff; font-size: 13px; padding: 2px 7px;">$4,50,000</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#4a4a4a; font-weight:bold; padding-top:15px;">Ford :</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">Thunderbird 2</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">Door 1964</td>
                                              </tr>
                                            </table></td>
                                          <td width="8">&nbsp;</td>
                                          <td style="background: #fff; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px 10px 20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><img style="display: block; margin: 0px; padding: 0px;" src="http://sylc-export.com/images_newsletter/chevrolet.jpg" alt=" " /></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="middle" style="background: #e92414; color: #fff; font-size: 13px; padding: 2px 7px;">$4,50,000</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#4a4a4a; font-weight:bold; padding-top:15px;">Chevrolet :</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">Camaro LT,</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">RS Camaro</td>
                                              </tr>
                                            </table></td>
                                          <td width="8">&nbsp;</td>
                                          <td style="background: #fff; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px 10px 20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><img style="display: block; margin: 0px; padding: 0px;" src="http://sylc-export.com/images_newsletter/studebaker.jpg" alt=" " /></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="middle" style="background: #e92414; color: #fff; font-size: 13px; padding: 2px 7px;">$4,50,000</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#4a4a4a; font-weight:bold; padding-top:15px;">Studebaker :</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">SPEEDSTER</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">LEATHER</td>
                                              </tr>
                                            </table></td>
                                          <td width="8">&nbsp;</td>
                                          <td style="background: #fff; color: #4a4a4a; font-family: arial; font-size: 13px; padding: 10px 10px 20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><img style="display: block; margin: 0px; padding: 0px;" src="http://sylc-export.com/images_newsletter/chevrolet1.jpg" alt=" " /></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="middle" style="background: #e92414; color: #fff; font-size: 13px; padding: 2px 7px;">$4,50,000</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#4a4a4a; font-weight:bold; padding-top:15px;">Chevrolet :</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">Bel Air/150/210 210</td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="border-bottom: 1px dashed #dfdfdf; padding: 7px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#333;">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                          <td width="8">&nbsp;</td>
                                        </tr>
                                      </tbody>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td><img src="http://sylc-export.com/images_newsletter//partner_logo2.jpg" alt="" /></td>
            </tr>
            <tr>
              <td style="color: #a4a4a4; text-align: center; font-size: 12px; font-family: Arial; padding: 15px 0 5px;">Copyright 2015. All Right Reserved.</td>
            </tr>
            <tr>
              <td align="center" valign="middle" style="padding-bottom:10px;"><table style="color: #a4a4a4; text-align: center; font-size: 12px; font-family: Arial; padding: 0px;" width="80%">
                  <tbody>
                    <tr>
                      <td>Terms &amp; Conditions</td>
                      <td>|</td>
                      <td>Privacy Policy</td>
                      <td>|</td>
                      <td>DMCA Policy</td>
                      <td>|</td>
                      <td>Product Label</td>
                      <td>|</td>
                      <td>Site Map</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>




            </textarea>

            <input type="submit" value="Update news letter" style="margin-left: 89%;margin-top:10px;"/>
        </form>
