<?php include("conf/config.inc.php"); ?>
<?php include(LIST_ROOT."/includes/code/ebay_code.php"); ?> 
<?php
$servername = "localhost";
$username = "httpsylc_sylcUse";
$password = "User@123";
$dbname = "httpsylc_sylc";
/*echo "<pre>";
print_r($item);
echo "</pre>";*/
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else 
{
echo "Connected successfully";
}*/
include "phpmailer/class.phpmailer.php";

$mail = new PHPMailer();
	
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		/*echo "<pre>";
		print_r($_POST);die;*/
		$email=$_POST['email'];
		$body = '<table cellpadding="0" cellspacing="0" border="2">
			
			<tr>
				<td style="padding:10px;">Current Bid</td>
				<td style="padding:10px;">'.$_POST['current_bid'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Maximum Bid</td>
				<td style="padding:10px;">'.$_POST['miximum_bid'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Logistique pays</td>
				<td style="padding:10px;">'.$_POST['logistique_pays'].'/'.$_POST['logistique_pays1'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Transport terrestre</td>
				<td style="padding:10px;">'.$_POST['transport_terrestre'].'/'.$_POST['transport_terrestre1'].'</td>
			</tr>
			
			<tr>
				<td style="padding:10px;">Transport international</td>
				<td style="padding:10px;">'.$_POST['transport_international'].'/'.$_POST['transport_international1'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Assurance transport</td>
				<td style="padding:10px;">'.$_POST['assurance_transport'].'/'.$_POST['assurance_transport1 	'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Frais transitaire</td>
				<td style="padding:10px;">'.$_POST['frais_transitaire'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Homologation francisation</td>
				<td style="padding:10px;">'.$_POST['homologation_francisation'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Prix total HT</td>
				<td style="padding:10px;">'.$_POST['prix_total_ht'].'</td>
			</tr>
					
			<tr>
				<td style="padding:10px;">prix total TTC</td>
				<td style="padding:10px;">'.$_POST['prix_total_ttc'].'</td>
			</tr>
			
			<tr>
				<td style="padding:10px;">Nom</td>
				<td style="padding:10px;">'.$_POST['fname'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Prénom</td>
				<td style="padding:10px;">'.$_POST['lname'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Téléphone</td>
				<td style="padding:10px;">'.$_POST['phone'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">E-mail</td>
				<td style="padding:10px;">'.$_POST['email'].'</td>
			</tr>
			
			<tr>
				<td style="padding:10px;">Addresse</td>
				<td style="padding:10px;">'.$_POST['address'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Code Postal</td>
				<td style="padding:10px;">'.$_POST['code_postal'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Ville</td>
				<td style="padding:10px;">'.$_POST['ville'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Pays</td>
				<td style="padding:10px;">'.$_POST['pays'].'</td>
			</tr>
			<tr>
				<td style="padding:10px;">Message</td>
				<td style="padding:10px;">'.$_POST['message'].'</td>
			</tr>
		</table>';
		
		$mail->IsSMTP(); 

	
		//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)12.
	
		//$mail->SMTPAuth   = true;                  // enable SMTP authentication	15.
		//$mail->SMTPSecure = "tls";  
		//$mail->SMTPSecure = 'ssl';    

		$mail->Host = "localhost";      // sets GMAIL as the SMTP server	17.
		$mail->Port = 25;  
		$mail->Username = "smtptest@seobrand.com";
		$mail->Password = "seo@123";
		$mail->From = $_POST['email'];
		$mail->FromName = "americancarcentrale";
		
		$to = array("jelmaleh@seobrand.net");
		//$to = array("seobranddevelopers@gmail.com");
		foreach($to as $sendsto){
		$mail->AddAddress($sendsto);
		}
		//$mail->AddReplyTo("Email Address HERE", "Name HERE"); // Adds a "Reply-to" address. Un-comment this to use it.
		$mail->Subject = "americancarcentrale";
		$mail->MsgHTML($body);

		if ($mail->Send() == true) {
			//echo "The message has been sent";
			//echo $mail->ErrorInfo;
		$_SESSION['success']=1;
		}
		else {
			echo "The email message has NOT been sent for some reason. Please try again later.<br/>";
			//echo "Mailer error: " . $mail->ErrorInfo;
		}
		 //$sql = "INSERT INTO contact (car_id,name,email,phone,website,time,question,message,address,code_postal,ville,pays,created)
			//VALUES ('','".$_POST['lname']." ".$_POST['fname']."','".$_POST['email']."','".$_POST['phone']."','','','','".$_POST['message']."','".$_POST['address']."','".$_POST['code_postal']."','".$_POST['ville']."','".$_POST['pays']."','".date('Y-m-d')."')";

		//$conn->query($sql);
		//$last_insert_id = mysqli_insert_id($conn);
		//if(isset($last_insert_id)){
			$sql_last = "INSERT INTO contact_bid (current_bid,miximum_bid,logistique_pays,transport_terrestre,transport_international,assurance_transport,frais_transitaire,homologation_francisation,administratives,prix_total_ht,taxe_de,tva_franch,prix_total_ttc,name,email,phone,message,address,code_postal,ville,pays,created)
			VALUES ('".$_POST['current_bid']."','".$_POST['miximum_bid']."','".$_POST['logistique_pays']."/".$_POST['logistique_pays1']."','".$_POST['transport_terrestre']."/".$_POST['transport_terrestre1']."','".$_POST['transport_international']."/".$_POST['transport_international1']."','".$_POST['assurance_transport']."/".$_POST['assurance_transport1']."','".$_POST['frais_transitaire']."','".$_POST['homologation_francisation']."','".$_POST['administratives']."','".$_POST['prix_total_ht']."','".$_POST['taxe_de']."','".$_POST['tva_franch']."','".$_POST['prix_total_ttc']."','".$_POST['lname']." ".$_POST['fname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['message']."','".$_POST['address']."','".$_POST['code_postal']."','".$_POST['ville']."','".$_POST['pays']."','".date('Y-m-d')."')";
			
			$conn->query($sql_last);
		//}
		?>
		<script type="text/javascript">window.location = "<?php echo DEFAULT_URL;?>/thank_you.php"</script>
		/*if ($conn->query($sql) === TRUE) {
			 //echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}*/
<?php
	}
?>
<?php  include(LIST_ROOT."/includes/views/header.php"); ?>
<style>
.servicesin select {
    text-transform: uppercase;
}
</style>
<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
/* start adding paragraph and value in input fields*/
$(document).ready(function(){
	  $("#miximum_bid").keyup(function(){
	   // $("input").css("background-color","pink");
		   current_price = $("#current_price").val();
		   bid_price = $("#miximum_bid").val();
		   var new_current_price=current_price;
		   new_current_price=new_current_price.replace(/\,/g,''); // 1125, but a string, so convert it to number
		   new_current_price=parseFloat(new_current_price);
		   //$("#prix_total_ttc").val(20340);
		   //alert('sdfg');
		  if(isNaN(parseFloat(bid_price))) {
			var bid_price = 0;
			}
		   if(new_current_price >= parseFloat(bid_price)){
			   $("#prix_total_ttc").val(parseFloat(26848.80));
			  // alert(parseFloat(final_total_value) - parseFloat(bid_price));
			   $( "#err_bid" ).remove();
			   $( ".gray-bg" ).after( "<p id='err_bid' style='color: #336e96;'>(Votre offre n'est pas suffisament élevée)</p>" );
		   }
		   else{
			   
			   final_total_value = $("#prix_total_ttc").val();
			   final_total_value = final_total_value.replace(",", "");
			   val = parseFloat(final_total_value) + parseFloat(bid_price);
			   var val = val.toFixed(2);
			   var val = numberWithCommas(val);
			   $("#prix_total_ttc").val(val);
			   $( "#err_bid" ).hide();

			   /******************** this is for new *****************/
			   final_total_value1 = $("#prix_total_ttc_hidden").val();
			   final_total_value1 = final_total_value1.replace(",", "");
			   val = parseFloat(final_total_value1) + parseFloat(bid_price);
			   var val = val.toFixed(2);
			   var val = numberWithCommas(val);
			   $("#prix_total_ttc_hidden").val(val);
			   
			   /******************** this is for new *****************/
		   }
		 //  alert(current_price);
	  });

	  $('#check1').click(function () {

		   if ($(this).is(':checked')){
		    // $("#txtAge").show();
		    	check1_val = 3500;
		    	$("#homologation_francisation").val(check1_val);
			   final_total_value = $("#prix_total_ttc").val();
			   final_total_value = final_total_value.replace(",", "");
			   val = parseFloat(final_total_value) + check1_val;
			   var val = val.toFixed(2);
			   var val = numberWithCommas(val);
			   $("#prix_total_ttc").val(val);

			   /*******************************************************/

			   final_total_value1 = $("#prix_total_ttc_hidden").val();
			   final_total_value1 = final_total_value1.replace(",", "");
			   val1 = parseFloat(final_total_value1) + check1_val;
			   var val1 = val1.toFixed(2);
			   var val1 = numberWithCommas(val1);
			   $("#prix_total_ttc_hidden").val(val1);

			   /******************************************************/
		   }
		   else{
			   check1_val = '';
		    	$("#homologation_francisation").val(check1_val);
			   final_total_value = $("#prix_total_ttc").val();
			   final_total_value = final_total_value.replace(",", "");
			   val = parseFloat(final_total_value) - 3500;
			   var val = val.toFixed(2);
			   var val = numberWithCommas(val);
			   $("#prix_total_ttc").val(val);

			   /*********************************************************/
			   final_total_value1 = $("#prix_total_ttc_hidden").val();
			   final_total_value1 = final_total_value1.replace(",", "");
			   val1 = parseFloat(final_total_value1) - 3500;
			   var val1 = val1.toFixed(2);
			   var val1 = numberWithCommas(val1);
			   $("#prix_total_ttc_hidden").val(val1);

			   /********************************************************/
		   }

		});

	  $('#check3').click(function () {

		   if ($(this).is(':checked')){
		    // $("#txtAge").show();
		    	check1_val = 1.055;
			   final_total_value = $("#prix_total_ttc_hidden").val();
			   final_total_value = final_total_value.replace(",", "");
			   val = parseFloat(final_total_value) * parseFloat(check1_val);
			   var val = val.toFixed(2);
			  var val = numberWithCommas(val);
			   $("#prix_total_ttc").val(val);

		   }
		   else{
			   check1_val = 1.055;
			   final_total_value = $("#prix_total_ttc").val();
			   final_total_value = final_total_value.replace(",", "");
			   val = (parseFloat(final_total_value))/(parseFloat(check1_val));
			   val = val.toFixed(2);
			   val = parseFloat(val) * parseFloat(1.10) * parseFloat(1.20);
			   val = val.toFixed(2);
			   val = numberWithCommas(val);
			   $("#prix_total_ttc").val(val);
		   }

		});
	});
/* end adding paragraph and value in input fields*/
 /* start on check box checked condion*/
 

 /* end on check box checked condion*/
			function validation(){
			
				if(document.getElementById("miximum_bid").value == "")
				{
					alert("Votre offre n'est pas suffisament élevée");
					document.getElementById("miximum_bid").focus();
					return false;
				}
				miximum_b = document.getElementById("miximum_bid").value
				 current_p = document.getElementById("current_price").value
				 current_p=current_p.replace(/\,/g,''); // 1125, but a string, so convert it to number
				 current_p=parseFloat(current_p);
				   if(current_p >= parseFloat(miximum_b)){
					   alert("Votre offre n'est pas suffisament élevée");
					   document.getElementById("miximum_bid").focus();
						return false;
				  }
				if(document.getElementById("fname").value == "")
				{
					alert("Nom requis");
					document.getElementById("fname").focus();
					return false;
				}
				if(document.getElementById("lname").value == "")
				{
					alert("Prénom requis");
					document.getElementById("lname").focus();
					return false;
				}
				if(document.getElementById("phone").value == "")
				{
					alert("Téléphone requis");
					document.getElementById("phone").focus();
					return false;
				}
				if(document.getElementById("email").value == "")
				{
					alert("S'il vous plaît Entrez l'adresse e-mail");
					document.getElementById("email").focus();
					return false;
				}
			
				var emailText = document.getElementById('email').value;
				    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
				    if (!pattern.test(emailText)) {22374
					alert("S'il vous plaît Entrez l'adresse e-mail valide");
					return false;
				    } 
				
				if(document.getElementById("address").value == "")
				{
					alert("Addresse requis");
					document.getElementById("address").focus();
					return false;
				}
				if(document.getElementById("code_postal").value == "")
				{
					alert("Code Postal requis");
					document.getElementById("code_postal").focus();
					return false;
				}
				if(document.getElementById("ville").value == "")
				{
					alert("Ville requis");
					document.getElementById("ville").focus();
					return false;
				}
				if(document.getElementById("pays").value == "")
				{
					alert("Pays requis");
					document.getElementById("pays").focus();
					return false;
				}
				if(document.getElementById("message").value == "")
				{
					alert("Message requis");
					document.getElementById("message").focus();
					return false;
				}
				
			}

</script>
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/style-detail.css" />
<link rel="stylesheet" href="<?php echo DEFAULT_URL ?>/css/jquery.jscrollpane.css">
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.js"></script>
<script src="<?php echo DEFAULT_URL ?>/js/border-radius.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<div class="middle2-outer">
<div class="middle2">
<!--     Start New Div Nov 21 -->
	 <!--recharche-->
        <div class="rcharche-outer">
            <div class="recharche">
                <form action="<?php echo DEFAULT_URL?>/announces.php" method="get"  class="rch-form" onsubmit="return formcheck();">
                    <label class="rchrche-lbl">Recherche</label>
                    <div class="select-outer">
                        <?php if(!isset($manufacturer)){
					  $manufacturer = '';
			}?>
                        <select class="combo_box1" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','model','')">
                           <option value="" <?php if($manufacturer == ''){ ?> selected="selected"<?php }?>>Marques</option>
                        <option value="Buick"<?php if($manufacturer == 'Buick'){ ?> selected="selected"<?php } ?>>Buick</option>
                        <option value="Cadillac"<?php if($manufacturer == 'Cadillac'){ ?> selected="selected"<?php } ?>>Cadillac</option>
                        <option value="Chevrolet"<?php if($manufacturer == 'Chevrolet'){ ?> selected="selected"<?php } ?>>Chevrolet</option>
                        <option value="Chrysler"<?php if($manufacturer == 'Chrysler'){ ?> selected="selected"<?php } ?>>Chrysler</option>
                        <option value="Dodge"<?php if($manufacturer == 'Dodge'){ ?> selected="selected"<?php } ?>>Dodge</option>
                        <option value="Excalibur"<?php if($manufacturer == 'Excalibur'){ ?> selected="selected"<?php } ?>>Excalibur</option>
                        <option value="Ferrari"<?php if($manufacturer == 'Ferrari'){ ?> selected="selected"<?php } ?>>Ferrari</option>
                        <option value="Ford"<?php if($manufacturer == 'Ford'){ ?> selected="selected"<?php } ?>>Ford</option>
                       <?php /*?> <option value="General+Motor+Corp."<?php if($manufacturer == 'General+Motor+Corp.'){ ?> selected="selected"<?php } ?>>General Motor Corp.</option><?php */?>
                        <option value="GMC"<?php if($manufacturer == 'GMC'){ ?> selected="selected"<?php } ?>>GMC</option>
                        <option value="Hummer"<?php if($manufacturer == 'Hummer'){ ?> selected="selected"<?php } ?>>Hummer</option>
                        <option value="Mercedes-Benz"<?php if($manufacturer == 'Mercedes-Benz'){ ?> selected="selected"<?php } ?>>Mercedes-Benz</option>
                        <option value="Morgan"<?php if($manufacturer == 'Morgan'){ ?> selected="selected"<?php } ?>>Morgan</option>
                        <option value="Oldsmobile"<?php if($manufacturer == 'Oldsmobile'){ ?> selected="selected"<?php } ?>>Oldsmobile</option>
                        <option value="Plymouth"<?php if($manufacturer == 'Plymouth'){ ?> selected="selected"<?php } ?>>Plymouth</option>
                        <option value="Pontiac"<?php if($manufacturer == 'Pontiac'){ ?> selected="selected"<?php } ?>>Pontiac</option>
                        <option value="Porsche"<?php if($manufacturer == 'Porsche'){ ?> selected="selected"<?php } ?>>Porsche</option>
                        <option value="Studebaker"<?php if($manufacturer == 'Studebaker'){ ?> selected="selected"<?php } ?>>Studebaker</option>
                        <option value="Toyota"<?php if($manufacturer == 'Toyota'){ ?> selected="selected"<?php } ?>>Toyota</option>

                        </select>
                    </div>
                    <div class="select-outer" id="model" style="position:relative">
                        <select class="combo_box1" name="model" disabled="disabled">
						 <?php if(!isset($model)){ ?>
                            <option value="" selected="selected">Mod&egrave;les</option>
                         <?php } else {?>
                           	<option value="<?php echo $model; ?>" selected="selected"><?php echo $model; ?></option>
						 <?php } ?>
                      
                     </select>
                       
                    </div>
                    <div class="select-outer" style="position:relative">
                        <?php if(!isset($manufacturer)){
                          $manufacturer = '';
                        }?>
                        <select name="madeYear[]" class="combo_box1 year_de small" onchange="changeSel(this.value)">
                          <option value="">Ann&eacute;e De</option>
                                  <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
									  if($madeYear[0] == $i){
										   echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
									  }
                                  }?>
                       </select>
                    </div>
                    <div class="select-outer" id="year">

                      <select name="madeYear[]" class="combo_box1 year_a small" disabled="disabled">
                          <option value="">Ann&eacute;e &Agrave;</option>
                                  <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                  }?>
                        </select>
                    </div>
                    <div class="select-outer">
                        <?php 
                            if(isset($_REQUEST['price'])){
                              $price1 = $_REQUEST['price'];
                            } 
                                                else{
                              $price1 = '';
                            }
                        ?>
                        <select id="newPrice" name="price" class="combo_box1">
                        <option value=""<?php if($price1 == ''){ ?> selected="selected"<?php } ?>>Prix</option>
                        <option value="0~10"<?php if($price1 == '0~10'){ ?> selected="selected"<?php } ?>>Upto - $10,000</option>
                        <option value="10~20"<?php if($price1 == '10~20'){ ?> selected="selected"<?php } ?>>$10,000 - $20,000</option>
                        <option value="20~30"<?php if($price1 == '20~30'){ ?> selected="selected"<?php } ?>>$20,000 - $30,000</option>
                        <option value="30~40"<?php if($price1 == '30~40'){ ?> selected="selected"<?php } ?>>$30,000 - $40,000</option>
                        <option value="40~50"<?php if($price1 == '40~50'){ ?> selected="selected"<?php } ?>>$40,000 - $50,000</option>
                        <option value="50~100"<?php if($price1 == '50~100'){ ?> selected="selected"<?php } ?>>$50,000 - $100,000</option>
                        <option value="100~10000"<?php if($price1 == '100~10000'){ ?> selected="selected"<?php } ?>>$100,000 - Above</option>
                      </select>
                      
                    </div>
                     <input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
<!--                    <a href="#" class="button-reche"></a>-->
                </form>
            </div>
        </div>
        <!--recharche end-->  
		<div class="middle_two main-middle">
			<div class="content-left">
				<h1><?php echo $item->title;?></h1>
				 <?php 
                	$gallery = explode("**",$item->galleryURL);
                	$imgpath = $gallery[0];
            	?>
				<div class="product-view">
					<img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=577&newHeight=345" alt="<?php echo $item->title;?>" >
					<a href="#" class="zoom-img"></a>
				</div>
				<h2>More Photos</h2>
				<ul class="product-thums">
					<li class="thum-img"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[0]); ?>&newWidth=136&newHeight=90" alt="<?php echo $item->title;?>" ></li>
					<li class="thum-img"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[1]); ?>&newWidth=136&newHeight=90" alt="<?php echo $item->title;?>" ></li>
					<li class="thum-img"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[2]); ?>&newWidth=136&newHeight=90" alt="<?php echo $item->title;?>" ></li>
					<li class="thum-img"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($gallery[4]); ?>&newWidth=136&newHeight=90" alt="<?php echo $item->title;?>" ></li>
				</ul>
				<h2>La Procédure de commande en 5 étapes</h2>
				<ul class="eteps">
					<li><span>1</span>
						<p>Vous avez repéré un véhicule sur notre site Internet. Cliquez sur "Acheter ce Véhicule" ou "Enchérir" pour participer à la vente. Vous serez accompagné tout au long du processus d'importation.</p>
					</li>
					<li><span>2</span>
						<p>Vous avez repéré un véhicule sur notre site Internet. Cliquez sur "Acheter ce Véhicule" ou "Enchérir" pour participer à la vente. Vous serez accompagné tout au long du processus d'importation.</p>
					</li>
					<li><span>3</span>
						<p>Vous avez repéré un véhicule sur notre site Internet. Cliquez sur "Acheter ce Véhicule" ou "Enchérir" pour participer à la vente. Vous serez accompagné tout au long du processus d'importation.</p>
					</li>
					<li><span>4</span>
						<p>Vous avez repéré un véhicule sur notre site Internet. Cliquez sur "Acheter ce Véhicule" ou "Enchérir" pour participer à la vente. Vous serez accompagné tout au long du processus d'importation.</p>
					</li>
					<li><span>5</span>
						<p>Vous avez repéré un véhicule sur notre site Internet. Cliquez sur "Acheter ce Véhicule" ou "Enchérir" pour participer à la vente. Vous serez accompagné tout au long du processus d'importation.</p>
					</li>
				</ul>
				<h2>Videos</h2>
				<div class="video-outer">
					<div class="videos"><iframe width="280" height="200" src="http://www.youtube.com/embed/oiwTdbVkHbc" frameborder="0" allowfullscreen></iframe></div>
					 <div class="videos"><iframe width="280" height="200" src="http://www.youtube.com/embed/7isMd8jdFso" frameborder="0" allowfullscreen></iframe></div>
				</div>
			</div>
			
			<div class="sidebar-new">
			<form action="" method="post" onsubmit="return validation();">
				<?php 
						if(isset($_SESSION['success']))	{?>
							<div class="message_success">Nous avons ajouté votre demande avec succès</div>
				<?php 
						unset($_SESSION['success']);
						}
				?>
				<h2>Réservez ce véhicule</h2>
				<div class="small-heading">Nombre d'enchères<b>30</b></div>
				<div class="small-heading border-top red-color">Meilleure enchère actuelle<b><?php echo $common->CurrencyConverter($item->buyItNowPrice);?> &euro;</b></div>
				<div class="gray-bg">Votre enchère maximale
				<input type="hidden" value="<?php echo $common->CurrencyConverter($item->buyItNowPrice);?>" id="current_price" name="current_bid" />
				
				<input class="" type="text" name="miximum_bid" id="miximum_bid" placeholder="&#8364"> 
				</div>
				<h2>Sélectionnez les services désirés</h2>
				<div class="service"><p>Pour la France, les véhicules arriveront à Trappes (Yvelines 78). Une livraison à Domicile est possible, merci de nous contacter</p>
				<div class="servicesin"><span class="midle">Logistique / import - Pays:</span> 
					<div>
						<select name="logistique_pays" id="logistique_pays">
							<option selected="selected" class="list_select_1" value="France (Le Havre)">France </option>
							<option class="list_select_0" value="Allemagne (Hambourg)">Allemagne </option>
							<option class="list_select_1" value="Belgique (Anvers)">Belgique </option>
							<option class="list_select_0" value="Espagne (Barcelone)">Espagne </option>
						22374
							<option class="list_select_0" value="Luxembourg">Luxembourg</option>
							<option class="list_select_1" value="Rotterdam">Rotterdam</option>
							<option class="list_select_0" value="Suisse">Suisse</option>
						</select> 
						<input type="text" name="logistique_pays1" placeholder="&#8364;" value="2600" readonly>
					</div>
				</div>
				<div class="servicesin"><span class="midle">Transport - Terrestre USA:</span> 
					<div>
						<select name="transport_terrestre" id="transport_terrestre" >
								<option value="groupé">groupé</option>
								<option value="sécurisé">sécurisé</option>
						</select>
						 <input type="text" name="transport_terrestre1" placeholder="&#8364;" value="650" readonly>
					</div>
				</div>
				<div class="servicesin"><span class="midle">Transport - International:</span> 
					<div>
						<select name="transport_international" id="transport_international">
							<option value="économique">économique</option>
							<option value="conteneur">conteneur</option>
							<option value="avion">avion</option>
						</select> <input type="text" name="transport_international1" placeholder="&#8364;" value="1450" readonly>
					</div>
				</div>
				<div class="servicesin"><span class="midle">Assurance - Transport:</span> 
					<div>
						<select name="assurance_transport" id="assurance_transport">
							<option value="Tout risque">Tout risque</option>
							<option value="Classique">Classique</option>
						</select> <input type="text" name="assurance_transport1" placeholder="&#8364;" value="85" readonly>
					</div>
				</div>
				<div class="servicesin"><div> <input type="text" name="frais_transitaire" id="frais_transitaire" placeholder="&#8364;" value="487" readonly></div> Frais Transitaire - Débarquement, Traction &<br> Dépotage:</div>
				</div>
				<table class="sidetable">
				<tr><td colspan="3"><b>Sélectionnez les options désirés</b></td></tr>
				<tr>
					<td width="30">
						<input type="checkbox" class="bigcheck" id="check1">
							<label for="check1"></label> 
					</td>
					<td>Homologation - Francisation, passage aux mines <br><span style="font-size: 10px;">pour tous vehicule léger<span></td>
					<td><input type="text" name="homologation_francisation" id="homologation_francisation" placeholder="&#8364;" value="" readonly></td>
				</tr>
				</table>
				
				<div class="sidebar-2colm border-top"><input type="text" name="prix_total_ht" id="prix_total_ht" placeholder="&#8364;" value="15068" style="margin-top:9px;" readonly> <strong class="font20">Prix Total </strong><br>H.T rendu le port sélectionné <br ><input type="checkbox" style="float:left; width:auto" id="check3" class="bigcheck" /><label for="check3"></label><span style="line-height: 195%; padding-left: 8px;">Voiture 30 ans et plus</span></div>
				
				<div class="sidebar-2colm border-top">
					<input type="text" name="prix_total_ttc" id="prix_total_ttc" placeholder="&#8364;" value="26,848.80" readonly style="margin-top:9px;">
					<input type="hidden" id="prix_total_ttc_hidden" value="20,340" />
						 <strong  class="font20">Prix Total </strong><br>Prix Total TTC rendu le port sélectionné 
				</div>
				<?php $login_url = $_SERVER['HTTP_HOST']."/loginaccount";?>
				<h2 class='h2'>A propos de vous <small>Vous avez déjà un compte, <a href="http://www.americancarcentrale.com/loginaccount" class="link02">cliquez ici</a></small></h2>
		
				
				
				<div class="vous-form">
					<p><span class="midle">Nom</span> <input type="text" name="fname" id="fname"></p>
					<p><span class="midle">Prénom</span> <input type="text" name="lname" id="lname"></p>
					<p><span class="midle">Téléphone</span> <input type="text" name="phone" id="phone" ></p>
					<p><span class="midle">E-mail</span> <input type="text" name="email" id="email" ></p>
					<p><span class="midle">Adresse</span> <input type="text" name="address" id="address" ></p>
					<p><span class="midle">Code Postal</span> <input type="text" name="code_postal" id="code_postal" ></p>
					<p><span class="midle">Ville</span> <input type="text" name="ville" id="ville" ></p>
					<p><span class="midle">Pays</span> <input type="text" name="pays" id="pays" ></p>
					<p>Message <textarea name="message" id="message"></textarea></p>
					<p><div>Continuez à l’étape suivante pour choisir les options d’importation et connaître le prix clé en main</div></p>
					<p><input type="submit" value="Etape Suivante" class="vous-btn"></p>
				</div>
				</form>
			</div>
		
          <!--  <section class="slider">
                <div class="list_carousel">
                    <ul id="foo2">
                        <?php  //include(LIST_ROOT."/includes/views/mostview.php"); ?>                   
                    </ul>
                    <div class="clearfix"></div>
                    <a id="prev2" class="prev" href="#">&lt;</a> <a id="next2" class="next" href="#">&gt;</a> </div>
            </section> --> 
		</div>
	</div>
	<!--     End New Div Nov 21 -->
<?php include(LIST_ROOT."/includes/views/footer.php"); ?>
