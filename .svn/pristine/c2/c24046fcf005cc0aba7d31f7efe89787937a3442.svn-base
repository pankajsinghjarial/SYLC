<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="style_test.css" />

<style>
td.tdborder{border-style:solid; border-width:1px; padding-left:5px;}
</style>

</head>
<body id="body">
<div id="wrapper">

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

<div id="wrapper">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="44%" style="padding:1% 1% 1% 2%;"><img src="logo.jpg" width="287" height="75" alt=" " /></td>
<td width="4%">&nbsp;</td>
<td width="44%" style="padding:1% 2%;" class="header_right"><p><strong>SYLC CORPORATION</strong><br />
1822 N. DIXIE HWY, Hollywood, Florida 33020<br />
PHONE: 305-332-9761<br />
FAX: 305-647-6533</p></td>
</tr>
</table>   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td><td class="invoice_bg">Invoice</td><td>&nbsp;</td>
  </tr>
</table>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><table width="95%" border="0" cellspacing="0" cellpadding="0" class="table01">
      <tr>
        <td align="left" valign="top">Purchaser Name: <?php echo $popup_details->name;?> <?php echo $popup_details->first_name;?></td>
      </tr>
      <tr>
        <td align="left" valign="top">Address: <?php echo $popup_details->address;?></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%">City/Province(State): <?php echo $popup_details->city;?></td>
            <td width="50%"><span style="text-align:center">Ph: </span><?php echo $popup_details->phone;?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%">Country: <?php echo $popup_details->country;?></td>
            <td width="50%"><span style="text-align:center">Zip/Post Code: <?php echo $popup_details->postcode;?></span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="50%" style="padding-left:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table01">
      <tr>
        <td align="left" valign="top">Date:<?php echo $popup_details->date_admin;?></td>
      </tr>
      <tr>
        <td align="left" valign="top">Proforma#: <?php echo $popup_details->proforma;?></td>
      </tr>
      <tr>
        <td align="left" valign="top">Final Destination:</td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php echo $popup_details->destination;?></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

 <table width="100%" border="0.2" cellspacing="0" cellpadding="0.2"  class="details_table">
  <tr>
    <th scope="col">Qty	
</th>
    <th scope="col">Year	
</th>
    <th scope="col">Description				
</th>
    <th scope="col">Serial # 	
</th>
    <th scope="col">Color		
</th>
    <th scope="col">Amount		
</th>
  </tr>
  <tr>
    <td valign="top" class="tdborder">&nbsp;</td>
    <td valign="top" class="tdborder">&nbsp;</td>
    <td valign="top" class="tdborder">
    Dealer fees		<br />	
Doc fees<br />
			
TRANSPORT <br />
				
SHIPPING <br />
				
BANK FEES, FEDEX, PAYPAL fees	<br />
			
COMMISSION	<br />
		
deposit				

    </td>
    <td valign="top" class="tdborder">&nbsp;</td>
    <td valign="top" class="tdborder">&nbsp;</td>
    <td valign="top" class="tdborder"><?php echo $popup_details->dealer_fees;?><br/>
    <?php echo $popup_details->doc_fees;?><br/>
    <?php echo $popup_details->transport;?><br/>
    <?php echo $popup_details->shipping;?><br/>
    <?php echo $popup_details->bank_fees;?><br/>
    <?php echo $popup_details->commission;?><br/>
    <?php echo $popup_details->deposit;?></td>
    
    
  </tr>
 
 </table>
<table width="61%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;"><tr><td style="text-align:center;font-size: 14px ; font-family:Helvetica; font-weight:bold; color:white; background-color:black; padding:14px 2%;">Banking Information</td></tr></table>
<table width="61%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;">
                
                <tr>
                  <td width="46%" style="padding:12px 2%" valign="top" align="left"><p style="margin:0;padding:0;font-size:13px; font-family:Helvetica, Arial, Helvetica, sans-serif; font-weight:bold;line-height:18px;">Sylc corporation<br />
                      1822 N Dixie hwy<br />
                      Hollywood, FL 33020<br />
                      Acc#898021718046<br />
                      Aba/routing# 026009593<br />
                      Swift# BOFAUS3N </p></td>
                  <td width="46%" style="padding:12px 2%" valign="top" align="left"><p style="margin:0;padding:0;font-size:13px; font-family:Helvetica; font-weight:bold;line-height:18px;">Bank of America<br />
                      19645 Biscayne bvd, Aventura,<br />
                      fl 33180 </p></td>
                </tr>
              </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;" class="bottom_text">
  <tr>
    <td width="70%" class="first_text"><p>Unless otherwise specified in writing, the Purchaser is obliged to pay the purchase price in full or pay a predetermined deposit prior to shipment of the goods by the Sylc Corporation.<br />
                Sylc Corporation makes no representations or warranties of any kind, expressed or implied, with respect to the vehicle(s), including, without
                limitation, any representations or warranties as to merchantability or fitness for any particular purpose, it being agreed that all such
                risks are to be borne by purchaser. The vehicle(s) is (are) being bought by purchaser "AS-IS "with all faults. The Sylc Corporation shall not be liable for the nonperformance of any of its obligations hereunder occasioned by any Act of God or any cause comprehended in the term "force majeure." The Vendor shall not be liable for any delay in the shipment or delivery of the goods.</p></td>
                
    <td width="15%"><p class="small_text">Subtotal<br />
                GST (6%)<br />
                QST (7.5%)<br />
                <strong>Total</strong><br />
              </p>
              <p class="small_text" style="padding:12px 0;">Deposit <span>0%</span><br />
                <strong>Balance</strong></p></td>
    <td width="15%"><p class="small_text"><br /><?php echo $popup_details->subtotal;?><br />
                 <?php echo $popup_details->gst;?><br />
                <?php echo $popup_details->qst;?><br />
                <strong ><?php echo $popup_details->total;?></strong><br />
              </p>
              <p class="small_text small_more" ><?php echo $popup_details->deposit_percent;?><span></span><br />
                <strong ><?php echo $popup_details->balance;?></strong></p>
              <p class="small_text"><span>USD</span> </p></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 0;">
          <tr>
            <td width="6%">&nbsp;</td>
            <td width="26%"><img src="sig.gif" width="206" height="53" alt=" " /></td>
            <td width="48%" class="btm_heading">We Appreciate Your Business </td>
            <td width="20%"><input type="submit" value="Submit" class="submit"/></td>
          </tr>
        </table>


   
</div>
</body>
</html>

<?php /*?>

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

<?php */?>

