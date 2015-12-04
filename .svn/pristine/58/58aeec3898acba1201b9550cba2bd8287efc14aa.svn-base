<?php
require_once '../conf/config.inc.php';
	//require_once "../config/connection.php";

	

require 'config/database.php';



if(!isset($_SESSION['gold_admin'])) {

	header('Location: login.php');

}


$sql_address_check = "SELECT * FROM address_pdf";

$address_check = mysql_query($sql_address_check);

$address_for_pdf = mysql_fetch_array($address_check);

$show_address=$address_for_pdf['address_column'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon" type="image/ico" >  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Syl Corporation</title>

<link href="../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />

<link type="text/css" href="../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />

<style type="text/css">

<!--

body {

	background-image: url(images/bx-bg.jpg);

}

.style7 {

	font-weight: normal;

	/*font-style: italic;*/

	color: #A8C076;

	font-size: 16px;

	font-family:Arial, Helvetica, sans-serif;

}

.style9 {font-size: 16px; font-weight: bold; color: #A8C076; }

.style12 {color: #A8C076}
.textarea {
  border: 2px solid #CCCCCC;
  height: 400px;
  margin-top: 20px;
  width: 493px;
}
.submit {

  background: url('../images/track_bg.png') no-repeat;

  width: 78px; height: 27px;

  border: 0;

  color: #fff;

  cursor: pointer;

  text-shadow: #63411e 0 1px 0;

  font: bold 12px "Helvetica Neue", Helvetica, Arial, sans-serif;

  line-height: 5px;

  margin: 10px 0 0 195px;

}

.submit:hover {

  background-position: 0 -27px;

}

.submit:active {

  background-position: 0 -54px;

}

-->

</style>
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
  <script>
//<![CDATA[
  bkLib.onDomLoaded(function() {
  //new nicEditor().panelInstance('area1');
  new nicEditor({fullPanel : true}).panelInstance('area2');
  //new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
  //new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
 // new nicEditor({maxHeight : 100}).panelInstance('area5');
  });
  //]]>
</script>
</head>



<body>





<div id="wrapper">

  <div id="header">

    <h1>Admin panel configuration</h1>

  </div>

<?php  include_once LIST_ROOT.'/admin/includes/tabs.php';?>

  <div style="margin:auto; width:500px; height:auto; padding:20px 0 0 0;">


    <table width="100%" border="0" bgcolor="#fafafa" align="center" cellpadding="0" cellspacing="0" >

      <tr>

        <td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;"><strong>Change your address</strong></font></td>

      </tr>

      <tr>

        <td>





        <form action="address_values.php" method="post" class="address_form" name="address_form">
        <textarea name="textarea_address" id="area2" class="textarea"><?php echo $show_address;?></textarea><br/>
     <input type="hidden" value="check_hidden" name="check_hidden">
        <input type="submit" class="submit" value="submit" name="submit"> 
        
        </form>
        
        </td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

    </table>

  </div>

</div>

<p class="head-2">&nbsp;</p>














</body>




</html>

