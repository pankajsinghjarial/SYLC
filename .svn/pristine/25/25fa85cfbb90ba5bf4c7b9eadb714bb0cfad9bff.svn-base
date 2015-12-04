<?php
require_once '../conf/config.inc.php';
require 'config/database.php';


if(!isset($_SESSION['gold_admin'])) {

echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login.php";</script>';
	exit;

}


?>
<script language="javascript">
$.cookie("activetab", '#tab0');
function Delete (id)

   {

    if( confirm("Etes-vous s\u00FBr de vouloir supprimer?"))

	{	

	  document.getElementById("id").value =id;

	   document.getElementById("method").value ='delete';

      document.getElementById( "frm_manu_list" ).submit( ) ;

	  

    }	

  }

  

  function Edit (id)

   {    

	  document.getElementById("id").value =id;

	  document.getElementById("method").value ='edit';

      document.getElementById( "frm_manu_list" ).submit( ) ;

    }
 
</script>

<script language="javascript" type="text/javascript">
// Roshan's Ajax dropdown code with php
// This notice must stay intact for legal use
// Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
// If you have any problem contact me at http://roshanbh.com.np
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getModel(carbrandId) {	
			
		
		var strURL="<?php echo DEFAULT_URL?>/findModel.php?carbrand="+carbrandId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('modelli').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getSubModel(carbrandId,modelId) {		
		var strURL="<?php echo DEFAULT_URL?>/findSubModel.php?carbrand="+carbrandId+"&model="+modelId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('submodelli').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<?php /*?><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><?php */?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon" type="image/ico" >  
<title>Syl Corporation</title>



<link href="../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../validation.js" type="text/javascript"></script>
<link type="text/css" href="../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.cookie.js"></script>
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/colorbox.css" />
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>

<script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.colorbox.js"></script>



<style type="text/css">

<!--



.style7 {

	font-weight: normal;

	/*font-style: italic;*/

	color: #A8C076;

	font-size: 16px;

}

.style9 {font-size: 12px; font-weight: bold; color: #000000; }

.style12 {color: #A8C076}

-->

</style>

</head>

<body class="dashboard_body">



 <div id="wrapper">

         <div id="header">

            <h1>Admin panel configuration</h1>

         </div>

         

      <?php  include_once './includes/tabs.php';?>

		 

<table width="100%" border="0" bgcolor="#747474" align="center" cellpadding="0" cellspacing="0"  style="margin-top:20px;">

  

  <tr>
   
    <?php /*?><td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;" ><strong>Information Des Clients</strong></font></td><?php */?>
<td bgcolor="#747474" class="style7 style12" style="padding:10px 0;" >
<table width="100%">
<tr>



<td align="left" width="60%" style="color: #A8C076;"><strong>Welcome <?php echo $_SESSION['gold_admin_user'];?></strong></td>
<?php /* if($_SESSION['gold_admin_user'] == 'admin') {?>
<td align="right" width="40%"><a class='inline' href="<?php echo '#new';?>"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/plus.jpg" alt="Add"></a></td><?php } */ ?>

</tr>

</table>

</td>
  </tr>


</table>
<div class="main_bannerbg_outer">
 
<div class="main_bannerbg"></div>
</div>

</div>

<p class="head-2">&nbsp;</p>



  <div style="display:none">
 <div class="account_box no_bdr" id="new">
    <div class="pop_titles">Add A New User </div>
     <?php  $currenttime_canada =  date("Y-m-d,  H:i:s", strtotime("+2 hours"));?>
    <form method="post" action="<?php echo DEFAULT_URL?>/contact.php" name="">
    
    <ul>
           
              <li>
               <span class="left_text"> Nom: </span>
                <input class="input" name="name" id="name" onfocus="if (this.value == 'Nom') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Nom';}" type="text" value="Nom" />
              </li>
              <li>
              <span class="left_text"> Prenom: </span>
                <input class="input" name="fname" id="fname" onfocus="if (this.value == 'Prenom') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Prenom';}" type="text" value="Prenom" />
              </li>
              <li>
              <span class="left_text"> Email: </span>
                <input class="input" name="email" id="email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" type="text" value="Email" />
              </li>
              <li>
              <span class="left_text"> Numero de telephone: </span>
                <input class="input" name="phone" id="phone" onfocus="if (this.value == 'Numero de telephone') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Numero de telephone';}" type="text" value="Numero de telephone" />
              </li>
              
              <li class="dropdown">
              <span class="left_text"> Choisissez une marque: </span>
                <select  name="firstlevel" id="firstlevel" onChange="getModel(this.value)" class="select_acc13">
                  <option value="Choisissez une marque" selected="selected">Choisissez une marque</option>
                  <option value="1">Aston Martin</option>
                  <option value="2">Bentley</option>
                  <option value="3">Buick</option>
                  <option value="4">Cadillac</option>
                  <option value="5">Chevrolet</option>
                  <option value="6">Dodge</option>
                  <option value="7">Ford</option>
                  <option value="8">GMC</option>
                  <option value="9">HUMMER</option>
                  <option value="10">Jaguar</option>
                  <option value="11">Lincoln</option>
                  <option value="12">Lotus</option>
                  <option value="13">Nissan</option>
                  <option value="14">Pontiac</option>
                  <option value="15">Porsche</option>
                  <option value="16">Rolls Royce</option>
                  <option value="17">Toyota</option>
                </select>
              </li>
              <li class="dropdown" id="modelli">
              <span class="left_text"> Choisissez un modele: </span>
                <select name="model" id="model" class="select_acc13">
                  <option value="Choisissez un model" selected="selected">Choisissez un modele</option>
                </select>
              </li>
              
              <li>
              <span class="left_text"> Annee: </span>
                <input class="input" name="year" id="year" onfocus="if (this.value == 'Annee') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Annee';}" type="text" value="Annee" />
              </li>
              <li class="last">
              <span class="left_text"> Pays d&#96;importation: </span>
                <input class="input" name="service" id="service" onfocus="if (this.value == 'Pays d&#96;importation') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Pays d&#96;importation';}" type="text" value="Pays d&#96;importation" />
              </li>
              
              <li class="last1">
            <span class="left_text"> &nbsp; </span>
                 <input type="hidden" value="<?php echo $currenttime_canada ?>" id="currenttime_canada" name="currenttime_canada"/>
             
                <input class="order_now_bt" type="submit" value="Submit" name="submit" onclick="return checkForm();">
              </li>
          
          </ul>
    
    
    </form>
    </div>
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
                                

</body>

</html>
