<?php 
/*if(isset($_REQUEST['contactId']) and $_REQUEST['contactId']!='' and isset($_REQUEST['Contact0Email']) and $_REQUEST['Contact0Email']!=''){

$to		= 'support@workoutworld.zendesk.com';
$from	= $_REQUEST['Contact0Email'];
$tag2	= str_replace(' ','_',$_REQUEST['Contact0_GymLocations']);

$subject= '10 day pass {{requester:"'.$_REQUEST['Contact0FirstName'].' '.$_REQUEST['Contact0LastName'].'" tags:"'.$tag2.'"}}';
$body ="<div>
FIRST NAME : ".$_REQUEST['Contact0FirstName']."<br>
LAST NAME: ".$_REQUEST['Contact0LastName']."<br>
PHONE: ".$_REQUEST['Contact0Phone1']."<br>
TICKET TYPE: 10 day pass<br>
Primary Goal: ".$_REQUEST['Contact0_PrimaryGoal']."<br>
Club Location: ".$_REQUEST['Contact0_GymLocations']."<br><br>
</div>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$_REQUEST['Contact0FirstName'].' '.$_REQUEST['Contact0LastName'].' <'.$_REQUEST['Contact0Email'].'>' . "\r\n";
$body = str_replace('Â','',$body);

mail($to, $subject, $body, $headers);
header("Location:thankyou.php");
}
*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Work Out World Health Club New Jersey</title>
<!-- Meta Tags -->
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<BODY class="landing">
<div id="LandingWrapperwide">
  <table width="657" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="37" valign="bottom"><img src="images/nonmember_top_left.gif" alt="" width="37" height="175" border="0"></td>
      <td width="620" colspan="9"><img src="images/nonmember_top.gif" alt="work out world" width="620" height="175" border="0"></td>
    </tr>
    <tr>
      <td width="37">&nbsp;</td>
      <td width="1" bgcolor="#e6e5cb"></td>
      <td width="1" bgcolor="#e0dfc5"></td>
      <td width="1" bgcolor="#d1d0b9"></td>
      <td width="1" bgcolor="#bdbca6"></td>
      <td width="612" height="325" bgcolor="#FFFFFF" valign="top"><center>
          <img src="images/thanks_banner.jpg" alt="download your free pass now!" width="592" height="135" border="0">
        </center>
        <div class="padall10">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top">
 
<h2 style="line-height:18px;">
YOUR FREE 10 DAY WOW PASS IS ON THE WAY!
</h2>
<p>Congratulations!  We're excited for you to experience all that WoW has to offer.</p>
<p>Momentarily you will receive an email containing your Free 10 Day WoW Pass.  Shortly thereafter you will receive a call from the club to activate your pass.</p>
<p>We look forward to showing you what KEEPING JERSEY STRONG is all about!</p>
<p>Have a Healthy &amp; Strong Day!</p>         
              
              
              
              </td>
              
            </tr>
          </table>
        </div></td>
      <td width="1" bgcolor="#7e7e6f"></td>
      <td width="1" bgcolor="#a1a18e"></td>
      <td width="1" bgcolor="#bdbca6"></td>
      <td width="1" bgcolor="#d1d0b9"></td>
    </tr>
    <tr>
      <td width="37"></td>
      <td width="620" colspan="9"><img src="images/landing_bottom.gif" alt="" width="620" height="63" border="0"><br>
        <br></td>
    </tr>
  </table>
</div>
<?php include("../includes/trackingcode.php"); ?>
</body>
</html>