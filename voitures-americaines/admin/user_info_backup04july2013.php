<?php
require_once '../conf/config.inc.php';
require 'config/database.php';
require_once 'paginator.class.php';

if(!isset($_SESSION['gold_admin'])) {

echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login.php";</script>';
	exit;

}



$for_paging="Select * from leads order by id desc";

$for_paging_new=mysql_query($for_paging) or die(mysql_error());

//echo mysql_num_rows($rs_sel);die;
$pages = new Paginator;
$pages->items_total = mysql_num_rows($for_paging_new);
$pages->mid_range = 9;
$pages->paginate();
$pages->display_pages();


$sel_query="Select * from leads order by id desc". $pages->limit;

$rs_sel=mysql_query($sel_query) or die(mysql_error());



if($_POST)

{

	if($_POST['method'] == 'delete')

	{
		 $sel_del_query = mysql_query("Select * from leads where id = ".$_POST['id']) ;

		$userid = mysql_fetch_object($sel_del_query);
		
		if(mysql_num_rows($sel_del_query) > 0 && $userid->user_id != '')
		{
			//$userid = mysql_fetch_object($sel_del_query);
			$del_query=mysql_query("delete from users where id=".$userid->user_id);
		}
		
		$del_query="delete from leads where id=".$_POST['id'].";";

		$rs_del=mysql_query($del_query) or die(mysql_error());
		?>
		<script type="text/javascript">
		window.location = 'user_info.php';
		</script>
		<?php 

		//header("Location:user_info.php");

	}

	if($_POST['method'] == 'edit')

	{

		//header("Location:edit_user_info.php?tid=".$_POST['id']);

	}

	 

}

if($rs_sel['subscribe'] == '1'){

	$subscribe = "YES";

}

else{

	$subscribe = "NO";

}

?>



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

<script language="javascript">
$.cookie("activetab", '#tab0');
function Delete (id)

   {

    if( confirm("Are you sure want to delete?"))

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

<body >



 <div id="wrapper">

         <div id="header">

            <h1>Admin panel configuration</h1>

         </div>

         

      <?php  include_once './includes/tabs.php';?>

		 
<p class="assign_msg"><?php if(@$_GET['msg']==1){ echo "User Added Successfully";}?></p>
<table width="100%" border="0" bgcolor="#747474" align="center" cellpadding="0" cellspacing="0"  style="margin-top:20px;">

  

  <tr>
   
    <?php /*?><td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;" ><strong>Information Des Clients</strong></font></td><?php */?>
<td bgcolor="#747474" class="style7 style12" style="padding:10px 0;" >
<table width="100%">
<tr>

<td align="left" width="60%"><strong>Information Of Clients</strong></td>
<td align="right" width="40%"><a class='inline' href="<?php echo '#new';?>"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/plus.jpg" alt="Add"></a></td>

</tr>

</table>

</td>
  </tr>

  <tr>

    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">

        <tr>

          <td><form name="frm_manu_list" id="frm_manu_list" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onSubmit="return validform( this ) ;">

              <table width="100%" border="0" cellspacing="2" cellpadding="2" style="border-bottom:thick" id="example_sort">
          <thead>
			<tr>
              <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Customer Name</span></th>
             
              <?php /*?>
                <td align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Nom</span></td>
                <td align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Prenom</span></td><?php */?>
                 <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Email</span></th>
                  <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Phone number</span></th>

				<th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Brand Car</span></th>

                  <th align="center" bgcolor="#A8C076" style="padding:10px 0;width: 150px;" class="wel_text1"><span class="style9">Models</span></th>

                  <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Year</span></th>                  
                   
                  <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Country of import</span></th>	
               				 
                      <th align="center" bgcolor="#A8C076" style="padding:10px 0;width: 100px;" class="wel_text1"><span class="style9">Date</span></th>
                  <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Remove</span></th>
                   <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Status</span></th>

                </tr>
</thead>
                <?php while($arr_sel=mysql_fetch_array($rs_sel)) 

				                    {

	                                $id=$arr_sel['id'];
	                               $leadddetail = mysql_query("SELECT * FROM lead_details where lead_id = '$id' order by id asc limit 0,1");
	                                $leadfetch = mysql_fetch_array($leadddetail);
	                                 $st = $leadfetch['status'];
	                                 if($st != '')
	                                 {
	                                 $statusdetail = mysql_query("SELECT * FROM status where id = $st") or die($myQuery."<br/><br/>".mysql_error());  
	                                $statusfetch = mysql_fetch_assoc($statusdetail);
	                                 }
	              	?>
 
                 

                <tr >
                   <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><a href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo($id);?>"><?php echo($arr_sel['name']);?> <?php echo " ".($arr_sel['first_name']);?> </a></font></strong></td>
                 <?php /*?> <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php echo($arr_sel['first_name']);?></font></strong></td><?php */?>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php echo($arr_sel['email']);?></font></strong></td>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php echo($arr_sel['phone']);?></font></strong></td>

				  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php $brand1 = $arr_sel['car_brand1'];
$car_brand1 = explode(',', $brand1);if($car_brand1[0]!=''){echo $car_brand1[0];}else{$cbrand=$arr_sel['car_brand'];$sel_query2="Select car_brand from car_brand WHERE id=".$cbrand; $rs_sel2=mysql_query($sel_query2); $car_bname = mysql_fetch_array($rs_sel2); echo $car_bname['car_brand'];}?></font></strong></td>

                  <td align="center"   bgcolor="#fafafa"><strong><font color="#666666"><?php $model1 = $arr_sel['car_model1'];
$car_model1 = explode(',', $model1); if($car_model1[0]!=''){echo $car_model1[0];}else{$mod = $arr_sel['model']; $sel_query1="Select model from model WHERE id=".$mod; $rs_sel1=mysql_query($sel_query1); $mod_value = mysql_fetch_array($rs_sel1); echo $mod_value['model'];}?></font></strong></td>
                  <td align="center" bgcolor="#fafafa"><strong><font color="#666666"><?php //echo($arr_sel['year']);
	              	
	              	$year1 = $arr_sel['year'];
$car_year = explode(',', $year1);echo $car_year[0];?></font></strong></td>
                   <td align="center"   bgcolor="#fafafa"><strong><font color="#666666"><?php echo($arr_sel['service']);?></font></strong></td>
                  

                      

                  <td align="center"   bgcolor="#fafafa"><strong><font color="#666666"><?php echo($arr_sel['created_at']);?></font></strong></td>            

                  <td align="center"  bgcolor="#fafafa" ><a href="javascript:Delete('<?php echo($id);?>')" style="text-decoration:none" ><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" alt="Remove"></strong></a></td>
                  
                  
                  
                  <td align="center"  bgcolor="#fafafa" ><?php  if($st != '')
	                                 { echo $statusfetch['name']; } else echo "No Information";?></td>
                  
                </tr>
                


                <? }?>

              </table>
   
              <!-- Hiddend Field For Delete -->

              <input type="hidden" id="id" name="id" value=" " />

              <input type="hidden" id="method" name="method" value=" " />
              
              

            </form><?php echo "<span style='text-align:center;display:block;color:#fff;padding-top:10px;font-size:12px;font-family:Helvetica,Arial,sans-serif;'> ". $pages->display_jump_menu()
. $pages->display_items_per_page() . "</span>";?></td>

        </tr>

      </table></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>

</div>

<p class="head-2">&nbsp;</p>



  <div style="display:none">
 <div class="account_box no_bdr" id="new">
    <div class="pop_titles">Add A New User </div>
     <?php  $currenttime_canada =  date("Y-m-d,  H:i:s", strtotime("+2 hours"));?>
    <form method="post" action="<?php echo DEFAULT_URL?>/contact_from_admin.php" name="">
    
    <ul>
           
              <li>
               <span class="left_text"> Name: </span>
                <input class="input admin_input" name="name" id="name" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              <li>
              <span class="left_text"> Last Name: </span>
                <input class="input admin_input" name="fname" id="fname" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              <li>
              <span class="left_text"> Email: </span>
                <input class="input admin_input" name="email" id="email" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              <li>
              <span class="left_text"> Telephone number: </span>
                <input class="input admin_input" name="phone" id="phone" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              
              <li class="dropdown">
              <span class="left_text"> Brand: </span>
              
             <?php /*?>   <select  name="firstlevel" id="firstlevel" onChange="getModel(this.value)" class="select_acc13">
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
                </select><?php */?>
                <input class="input admin_input" name="firstlevel" id="firstlevel" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
                
              </li>
              <li class="dropdown" id="modelli">
              <span class="left_text"> Model: </span>
              <input class="input admin_input" name="model" id="model" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              <?php /*?>
                <select name="model" id="model" class="select_acc13">
                  <option value="Choisissez un model" selected="selected">Choisissez un modele</option>
                </select>
                <?php */?>
                
              </li>
              
              <li>
              <span class="left_text"> Year: </span>
                <input class="input admin_input" name="year" id="year" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              <li class="last">
              <span class="left_text"> Country of import: </span>
                <input class="input admin_input" name="service" id="service" onfocus="if (this.value == '') {this.value = '';}" onblur="if (this.value == '') {this.value = '';}" type="text" value="" />
              </li>
              
            
              
              <li class="last1">
            <span class="left_text"> &nbsp; </span>
            <input type="hidden" value="admin_lead_entry" name="admin_lead_entry" id="admin_lead_entry" >
                 <input type="hidden" value="<?php echo $currenttime_canada ?>" id="currenttime_canada" name="currenttime_canada"/>
             
                <input class="order_now_bt" type="submit" value="Submit" name="submit" onclick="return checkFormAdmin();">
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
	

 function checkFormAdmin(){

		//alert("hello");

			var errorMsg = "";

			var returnVal  = true;

			if(document.getElementById('name').value == ""){

				//alert("hello");

				errorMsg += "Please Enter your name\n";

				returnVal = false;

			}
			       
				
			var newname = document.getElementById('name').value;
			
			if(newname==' ' || newname=='  ' || newname=='   '|| newname=='    '|| newname=='     '|| newname=='      '|| newname=='       '|| newname=='        ') {
			
			
			//var rx = /^\S+$/;
			//if (rx.test(newname) == false){
			  
		 
				errorMsg += "Please Enter a valid name\n";

				returnVal = false;

			   }
			
			/*if(document.getElementById('fname').value == "Prenom"){

			errorMsg += "S'il vous pla\u00EEt  entrer votre Prenom\n";

			returnVal = false;

		}*/
			
			

			if(document.getElementById('email').value == ""){

				errorMsg += "Please Enter your Email\n";

				returnVal = false;

			}else{

				if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('email').value))){

					errorMsg += "Please Enter a valid Email address\n";

					returnVal = false;

				}

			}
			
			

			if(document.getElementById('phone').value == ""){

				errorMsg += "Please Enter your phone\n";

				returnVal = false;

			}else {

		var newphone = document.getElementById('phone').value;
			
			if(newphone.match(/\ /)) {
		 
				errorMsg += "Please Enter a valid phone\n";

				returnVal = false;

			   }
			}
			

			if(document.getElementById('firstlevel').value == ""){

				errorMsg += "Please Enter Brand Car\n";

				returnVal = false;

			}

			if(document.getElementById('model').value == ""){

				errorMsg += "Please Enter Model\n";

				returnVal = false;

			}

			

			if(document.getElementById('year').value == ""){

				errorMsg += "Please Enter Year\n";

				returnVal = false;

			}

			
		var newyear = document.getElementById('year').value;
			
			if(newyear.match(/\ /)) {
		 
				errorMsg += "Please Enter a valid Year\n";

				returnVal = false;

			   }
			
			
			if(document.getElementById('service').value == ""){

				errorMsg += "Please Enter Country of import\n";

				returnVal = false;

			}
			
			if(document.getElementById('service').value == ' '){

				errorMsg += "Please Enter a valid Country of import\n";

				returnVal = false;

			}

			/*
		var newservice = document.getElementById('service').value;
			
			if(newservice.match(/\ /)) {
		 
				errorMsg += "S'il vous pla\u00EEt  Entrez Service\n";
				//errorMsg += "S'il vous pla\u00EEt  entrer valide Service\n";
				returnVal = false;

			   }
		*/	

			

			

			

			if(errorMsg!=""){

				alert("==Please correct the following errors==\n"+errorMsg);

			}

		return returnVal;

			

		}

 
 </script>        
                                

</body>

</html>