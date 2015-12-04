<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Information Form</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href="jquery.signaturepad.css">

</head>

<body style="margin:0; padding:0;">

<?php  
extract($_GET);
//echo $id;
require '/home/ladilapp/public_html/voitures-americaines/admin/config/database.php';

$sel_query="Select * from leads where id='".$id."'";

$rs_sel=mysql_query($sel_query) or die(mysql_error());

$popup_details = (mysql_fetch_object($rs_sel));

//echo "<pre>";
//print_r($popup_details);die;
?>

<form action="" name="popdc" method="post" class="sigPad">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;">
  <thead>
    <tr>
      <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="44%" style="padding:1% 1% 1% 2%;"><img src="images/logo.jpg" width="287" height="75" alt=" " /></td>
            <td width="4%">&nbsp;</td>
            <td width="44%" style="padding:1% 2%;"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;"><strong style="font-size:22px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; line-height:28px;">SYLC CORPORATION</strong><br />
                1822 N. DIXIE HWY, Hollywood, Florida 33020<br />
                PHONE: 305-332-9761<br />
                FAX: 305-647-6533</p></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%" style="border-bottom:ridge  5px #787878;">&nbsp;</td>
            <td width="16%" style="font-size:22px; font-family:Arial, Helvetica, sans-serif; color:#F60; font-weight:bold;line-height:20px; text-align:center;" rowspan="2">INVOICE</td>
            <td width="8%" style="border-bottom:ridge  5px #787878;">&nbsp;</td>
          </tr>
          <tr>
            <td width="76%">&nbsp;</td>
            <td width="8%">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="100%"  ><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;">
          <tr>
            <td width="65%" style=" padding:2%; border: solid #787878 2px;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="24%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Purchaser Name:</p></td>
                  <td width="76%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666; border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->name;?> <?php echo $popup_details->first_name;?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="14%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Address:</p></td>
                  <td width="86%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666; border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->address;?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="24%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">City/Province(State):</p></td>
                  <td width="30%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666; border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->city;?></td>
                  <td width="6%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; text-align:center">Ph</p></td>
                  <td width="40%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666;border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->phone;?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="15%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Country:</p></td>
                  <td width="28%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666; border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->country;?></td>
                  <td width="26%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; text-align:center">Zip/Post Code:</p></td>
                  <td width="31%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#666;border-bottom:dotted 1px #666;">&nbsp;<?php echo $popup_details->postcode;?></td>
                </tr>
              </table></td>
            <td width="2%">&nbsp;</td>
            <td width="25%" style=" padding:2%; border: solid #787878 2px;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="29%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Date:</p></td>
                  <td width="71%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#333; border-bottom:dotted 1px #666;"><?php echo $popup_details->date_admin;?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="39%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Proforma#:</p></td>
                  <td width="61%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#333; border-bottom:dotted 1px #666;"><?php echo $popup_details->proforma;?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px 0;">
                <tr>
                  <td width="100%"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Final Destination:</p></td>
                </tr>
                <tr>
                  <td width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#333; border-bottom:dotted 1px #666;"><p style="margin:0;padding:0;font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:18px;"><?php echo $popup_details->destination;?></p></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:2px solid #787878; border-right:none; border-bottom:none;">
          <tr>
            <th width="6%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; border:2px solid #787878; border-left:none; border-top:none;">Qty</th>
            <th width="11%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;">Year</th>
            <th width="39%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;">Description</th>
            <th width="17%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;">Serial # </th>
            <th width="13%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;">Color</th>
            <th width="14%" style="background:#d6d6d6;margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;">Amount</th>
          </tr>
          <tr>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; border:2px solid #787878; border-left:none; border-top:none; text-align:center" valign="top">1</td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none; text-align:center" valign="top">Year</td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;" valign="top"><p style="margin:0;padding:0;font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;"> Dealer fees<br />
                Doc fees<br />
                TRANSPORT <br />
                SHIPPING <br />
                BANK FEES, FEDEX, PAYPAL fees<br />
                COMMISSION<br />
                deposit<br />
                <br />
                <br />
                <br />
              </p></td>
            <td style="margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none; border-bottom:none;text-align:center" valign="middle">C &amp; F </td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;border-bottom:none;text-align:center" valign="top">&nbsp;</td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;border-bottom:none; text-align:center" valign="top">&nbsp;<?php echo $popup_details->dealer_fees;?>
            <br/><?php echo $popup_details->doc_fees;?>
            <br/><?php echo $popup_details->transport;?>
            <br/><?php echo $popup_details->shipping;?>
            <br/><?php echo $popup_details->bank_fees;?>
            <br/><?php echo $popup_details->commission;?>
            <br/><?php echo $popup_details->deposit;?></td>
          </tr>
          <tr>
            <td style="margin:0;padding:1% 1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; border:2px solid #787878; border-left:none; border-top:none; text-align:center" valign="top" colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;">
                <tr>
                  <td colspan="2" style="text-align:center;font:bold 14px Arial, Helvetica, sans-serif; color:000; background:#e1e1e1; padding:1%;">Banking Information</td>
                </tr>
                <tr>
                  <td width="46%" style="padding:2%" valign="top" align="left"><p style="margin:0;padding:0;font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Sylc corporation<br />
                      1822 N Dixie hwy<br />
                      Hollywood, FL 33020<br />
                      Acc#898021718046<br />
                      Aba/routing# 026009593<br />
                      Swift# BOFAUS3N </p></td>
                  <td width="46%" style="padding:2%" valign="top" align="left"><p style="margin:0;padding:0;font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Bank of America<br />
                      19645 Biscayne bvd, Aventura,<br />
                      fl 33180 </p></td>
                </tr>
              </table></td>
            <td style="margin:0;padding:5px 0;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;text-align:center" valign="middle">&nbsp;</td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none;text-align:center" valign="top">&nbsp;</td>
            <td style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none; text-align:center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="68%" style="margin:0;padding:1% 1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px; border:2px solid #787878; border-left:none;  border-right:none; border-top:none; text-align:center" valign="top" colspan="4"><p  style="margin:0;padding:0;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:left;">Unless otherwise specified in writing, the Purchaser is obliged to pay the purchase price in full or pay a predetermined deposit prior to shipment of the goods by the Sylc Corporation.<br />
                Sylc Corporation makes no representations or warranties of any kind, expressed or implied, with respect to the vehicle(s), including, without
                limitation, any representations or warranties as to merchantability or fitness for any particular purpose, it being agreed that all such
                risks are to be borne by purchaser. The vehicle(s) is (are) being bought by purchaser "AS-IS "with all faults. The Sylc Corporation shall not be liable for the nonperformance of any of its obligations hereunder occasioned by any Act of God or any cause comprehended in the term "force majeure." The Vendor shall not be liable for any delay in the shipment or delivery of the goods.</p></td>
            <td  width="13%" style="margin:0;padding:1%;font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:none;border-bottom:2px solid #787878;text-align:center" valign="top"><p style="margin:0;padding:0;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:right;">Subtotal<br />
                GST (6%)<br />
                QST (7.5%)<br />
                <strong style="font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; line-height:18px;">Total</strong><br />
              </p>
              <p style="margin:0;padding:15px 0;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:right;">Deposit <span style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#F60; font-weight:bold;line-height:20px;">0%</span><br />
                <strong style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#000; font-weight:bold;line-height:20px;">Balance</strong></p></td>
            <td  width="14%" style="margin:0;padding:1% 0% 1% 1%; font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;border:2px solid #787878; border-left:none; border-top:none; text-align:center" valign="top"><p style="margin:0;padding:0 10px 8px;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:right;"><?php echo $popup_details->subtotal;?><br />
                <?php echo $popup_details->gst;?><br />
                <?php echo $popup_details->qst;?><br />
                <strong style="font-size:14px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; line-height:18px;"><?php echo $popup_details->total;?></strong><br />
              </p>
              <p style="margin:0;padding:4px 10px 4px 0;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:right; border:5px double #666; border-left:none; border-right:none;"><?php echo $popup_details->deposit_percent;?><span style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#F60; font-weight:bold;line-height:20px;"></span><br />
                <strong style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#000; font-weight:bold;line-height:20px;"><?php echo $popup_details->balance;?></strong></p>
              <p style="margin:0;padding:4px 10px 4px 0;;font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:normal;line-height:18px; text-align:right;"><span style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#F60; font-weight:bold;line-height:20px;">USD</span> </p></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 0;">
          <tr>
            <td width="9%">&nbsp;</td>
            <td width="26%">
            
         <label for="name">Print your name</label>
    <input type="text" name="name" id="name" class="name">
    <p class="typeItDesc">Review your signature</p>
    <p class="drawItDesc">Draw your signature</p>
    <ul class="sigNav">
      <li class="typeIt"><a href="#type-it" class="current">Type It</a></li>
      <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
      <li class="clearButton"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="198" height="55"></canvas>
      <input type="hidden" name="output" class="output">
    </div>
            
           
            <td width="49%"  style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#F60; font-weight:bold;line-height:20px; text-align:center;">We Appreciate Your Business </td>
            <td width="16%">
             <input type="hidden" name="customer_submit" id="customer_submit" value="signature_submitted">
            <input type="submit" value="Submit" style="cursor:pointer; border:solid 1px #ccc; padding:6px 15px; color:#fff; background: #F60; font:14px Arial, Helvetica, sans-serif;" /></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</form>


  <script src="jquery.signaturepad.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad();
    });
  </script>
  <script src="json2.min.js"></script>



</body>
</html>
 
 
 <?php /*?>
                            <li>
                            <label>Nom:</label>
                              
                            </li>
                            <li>
                            <label>Prenom:</label>
                              <input class="input_pop" name="lname_pop" id="lname_pop" value="<?php echo $popup_details->first_name;?>" type="text" />
                            </li>
                            <li>
                            <label>Email:</label>
                              <input class="input_pop" name="email_pop" id="email_pop" value="<?php echo $popup_details->email;?>"  type="text" />
                            </li>
                            <li>
                            <label>Numero de telephone:</label>
                              <input class="input_pop"  name="phone_pop" id="phone_pop" value="<?php echo $popup_details->phone;?>"  type="text" />
                              
                            </li>
                           
                            <li>
                            <label>Annee:</label>
                              <input class="input_pop"  name="year_pop" id="year_pop" value="<?php echo $popup_details->year;?>"  type="text" />
                            </li>
                       
                            
                            <li>
                            <label>date de:</label>
                              <input class="input_pop"  name="created_pop" id="created_pop" value="<?php echo $popup_details->created_at;?>"  type="text" />
                            </li>
                            
                               <li>
                            <label>Address:</label>
                              <input class="input_pop"  name="add_pop" id="add_pop" value="<?php echo $popup_details->address;?>"  type="text" />
                            </li>
                            
                            
                              <li>
                            <label>City:</label>
                              <input class="input_pop"  name="city_pop" id="city_pop" value="<?php echo $popup_details->city;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Zip/Postcode:</label>
                              <input class="input_pop"  name="postcode_pop" id="postcode_pop" value="<?php echo $popup_details->postcode;?>"  type="text" />
                            </li>
                            
                                     <li>
                            <label>Admin Date : </label>
                              <input class="input_pop"  name="admin_date_pop" id="admin_date_pop" value="<?php echo $popup_details->date_admin;?>"  type="text" />
                            </li>
                              <li>
                            <label>Proforma:</label>
                              <input class="input_pop"  name="proforma_pop" id="proforma_pop" value="<?php echo $popup_details->proforma;?>"  type="text" />
                            </li>
                              <li>
                            <label>Final Destination:</label>
                              <input class="input_pop"  name="destination_pop" id="destination_pop" value="<?php echo $popup_details->destination;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Dealer Fees:</label>
                              <input class="input_pop"  name="dealer_fees_pop" id="dealer_fees_pop" value="<?php echo $popup_details->dealer_fees;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Doc fees:</label>
                              <input class="input_pop"  name="doc_fees_pop" id="doc_fees_pop" value="<?php echo $popup_details->doc_fees;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Transport:</label>
                              <input class="input_pop"  name="transport_pop" id="transport_pop" value="<?php echo $popup_details->transport;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Shipping:</label>
                              <input class="input_pop"  name="shipping_pop" id="shipping_pop" value="<?php echo $popup_details->shipping;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>BANK FEES, FEEDEX, PAYPAL fees :</label>
                              <input class="input_pop"  name="bank_fees_pop" id="bank_fees_pop" value="<?php echo $popup_details->bank_fees;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Commission:</label>
                              <input class="input_pop"  name="commission_pop" id="commission_pop" value="<?php echo $popup_details->commission;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Deposit:</label>
                              <input class="input_pop"  name="deposit_pop" id="deposit_pop" value="<?php echo $popup_details->deposit;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Subtotal:</label>
                              <input class="input_pop"  name="subtotal_pop" id="subtotal_pop" value="<?php echo $popup_details->subtotal;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>GST:</label>
                              <input class="input_pop"  name="gst_pop" id="gst_pop" value="<?php echo $popup_details->gst;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>QST:</label>
                              <input class="input_pop"  name="qst_pop" id="qst_pop" value="<?php echo $popup_details->qst;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Total:</label>
                              <input class="input_pop"  name="total_pop" id="total_pop" value="<?php echo $popup_details->total;?>"  type="text" />
                            </li>
                            
                              <li>
                            <label>Deposit %:</label>
                              <input class="input_pop"  name="deposit_percent_pop" id="deposit_percent_pop" value="<?php echo $popup_details->deposit_percent;?>"  type="text" />
                            </li>
                            
                            <li>
                            <label>Balance:</label>
                              <input class="input_pop"  name="balance_pop" id="balance_pop" value="<?php echo $popup_details->balance;?>"  type="text" />
                            </li>
                            
                            
                                 
                            <li>
                            <label>Sign:</label>
                              <input class="input_pop"  name="sign_pop" id="sign_pop" value=""  type="text" />
                            </li>
                          
                            <li>
                            <input type="hidden" name="customer_submit" id="customer_submit" value="signature_submitted">
                              <input type="submit" name="submit" value="submit"/>
                            </li>
                    
 <?php */?>
          