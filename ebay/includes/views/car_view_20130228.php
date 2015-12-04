<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery-1.1.2.pack.js"></script>
<script src="<?php echo DEFAULT_URL ?>/js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
// <![CDATA[
	(function($){ 	
		jQuery(document).ready(function () {
			jQuery('#menu').tabify();
		});
	
		$(document).ready(function () {
			$("#sidebar_nav > li").click(function(){
				if(false == $(this).next().is(':visible')) {
					$('#sidebar_nav > ul').slideUp(500);
				}
				$(this).next().slideToggle(300);
				$(this).parent().find("li").each(function(){ $(this).removeClass();});
				$(this).addClass("active_nav");
			});
		});
	
		$('#sidebar_nav < ul:eq(0)').show();
	})(jQuery);		
// ]]>
</script>
<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/mootools.js"></script>
<script type="text/javascript">	
window.addEvent('domready', function() {	

	var myPages = $$('.price_euro');
	var myBubbles = $$('.bubble');
	
	// Set bubbles opacity to zero so they're hidden initially and toggle visibility on for their container	
	myBubbles.setStyle('opacity', 0);
	
	// Add our events to the pages
	myPages.each(function(el, i) {
		el.set('morph', {link : 'cancel'});
		
		el.addEvents({
			'mouseenter': function() {
				myBubbles[i].morph({
					'opacity' : 1,
					'margin-top' : '-15px'
				});
			},
			'mouseleave' : function() {
				myBubbles[i].morph({
					'opacity' : 0,
					'margin-top' : 0
				});
			}	
		});
	});
});
</script>

<div class="main_middle">
  <div class="middle">
    <div class="middle_two"> <span class="annonces_bold" > <?php echo $temp[$carid]["fullName"]; if($temp[$carid]["price"] != "") {?> - <span>$<?php echo  number_format($temp[$carid]["price"],2) ?></span>
      <?php } ?>
      </span><br />
      <?php if( $temp[$carid]["dealerName"] != "") { ?>
      <span class="dealer">Dealer: <?php echo  $temp[$carid]["dealerName"] ?></span>
      <?php } ?>
      <div>
        <?php if( $temp[$carid]["dealerAddr"] != "") { ?>
        <span class="phone1"> <?php echo str_replace("(Map)","",$temp[$carid]["dealerAddr"]); ?> </span>
        <?php } ?>
        <span class="share"><!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a> </div>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb9e6c822016184"></script> 
        <!-- AddThis Button END --></span>
        <div class="clear"></div>
      </div>
      <div class="car_detail">
        <div id="welcomeHero">
          <div id="slideshow-main">
            <ul>
              <li class="pa active"> <a href="#">
                <?php
			if($temp[$carid]["images"] != "") {
			 $imgpath = $commons->getImageUrl($temp[$carid]["images"]);
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}?>
                <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=382&newHeight=299" alt="<?php echo $f_read->title;?>"/> </a> </li>
              <?php
			if($temp[$carid]["images"] != "") { ?>
              <?php  $count = count($tempimg); 
   for($i=1;$i<$count;$i++) {
	   			 $imgpath = $commons->getImageUrl($tempimg[$i]); ?>
              <li class="p<?=$i?>"> <a href="#"> <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=382&newHeight=299" width="382" height="290" alt=""/></a> </li>
              <?php } ?>
              <?php } ?>
            </ul>
          </div>
          <div id="slideshow-carousel">
            <?php
			if($temp[$carid]["images"] != "") { ?>
            <ul id="carousel" class="jcarousel jcarousel-skin-tango">
              <?php
			if($temp[$carid]["images"] != "") {
			 $imgpath = $commons->getImageUrl($temp[$carid]["images"]);
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}?>
              <li><a href="#" rel="pa"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=75&newHeight=75" width="75" height="75" alt="" /></a></li>
              <?php  $count = count($tempimg); 
   for($i=1;$i<$count;$i++) {
	   			 $imgpath = $commons->getImageUrl($tempimg[$i]);

    ?>
              <li><a href="#" rel="p<?=$i?>"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=75&newHeight=75" alt="<?php echo $f_read->title;?>"/></a></li>
              <?php } ?>
            </ul>
            <?php } ?>
          </div>
          <div class="new_buttons">
          	<a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="example5"><span class="read_btn">Réserver ce véhicule</span></a>
            <a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="example5"><span class="read_btn">Nous contacter</span></a>
            <a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="example5"><span class="read_btn">Ajouter &agrave; ma s&eacute;lection</span></a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="main_discription">
          <div class="discription">
            <div class="annonces_bold"><?php echo $temp[$carid]["fullName"]?></div>
            <div class="annonces_bold_black">Stock ID: #<?php echo $temp[$carid]["stock_id"]?></div>
            <?php if($temp[$carid]["vin"]!= "" ) { ?>
            <div class="dis_table">
              <table width="393"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>Vin</td>
                  <td><span class="redprice"><?php echo $temp[$carid]["vin"]?></span></td>
                </tr>
              </table>
            </div>
            <?php } ?>
            <?php if($temp[$carid]["fuel"]!= "" ) { ?>
            <div class="dis_table">
              <table width="393"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td >Fuel</td>
                  <td  ><span class="redprice"><?php echo $temp[$carid]["fuel"]?></span></td>
                </tr>
              </table>
            </div>
            <?php } ?>
            <?php if($temp[$carid]["mileage"]!= "" ) { ?>
            <div class="dis_table">
              <table width="393"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td >Mileage</td>
                  <td  ><span class="redprice"><?php echo number_format($temp[$carid]["mileage"],2);?> Mi</span></td>
                </tr>
              </table>
            </div>
            <?php } ?>
            <?php if($temp[$carid]["bodyStyle"]!= "" ) { ?>
            <div class="dis_table">
              <table width="393"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td >Body Style</td>
                  <td  ><span class="redprice"><?php echo $temp[$carid]["bodyStyle"]?></span></td>
                </tr>
              </table>
            </div>
            <?php } ?>
            <?php  if($temp[$carid]["price"] != "") {?>
            <div class="dis_table">
              <table width="393"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="active1">Prix</td>
                  <td class="active1"><div id="pageWrap">
                      <div class="page psdPage">
                        <div class="bubble pop_up">
                          <div id="tooltip">
                            <div class="tooltip_img"><img src="<?php echo DEFAULT_URL?>/images/tooltip_top.png" border="0" alt="" /></div>
                            <div class="tooltip_midd">
                              <div class="pop_mb">
                                <div class="box_01">Prix du véhicule:</div>
                                <div class="box_02">$<?php echo number_format($temp[$carid]["price"],2);?></div>
                              </div>
                              <div class="pop_mb">
                                <div class="box_01">Transport Terrestre US:</div>
                                <div class="box_02">$900.00</div>
                              </div>
                              <div class="pop_mb">
                                <div class="box_01">Transport par bateau:</div>
                                <div class="box_02">$1200.00</div>
                              </div>
                              <div class="pop_mb">
                                <div class="box_03">Commission:</div>
                                <div class="box_02">$3500.10</div>
                              </div>
                            </div>
                            <div class="pop_btm">
                              <div class="box_01"><img src="<?php echo DEFAULT_URL?>/images/total.jpg" border="0" alt="" /></div>
                              <div class="box_02"><?php echo $common->CurrencyConverter($temp[$carid]["price"]);?> &euro;</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span class="redprice1 price_usd">$<?php echo number_format($temp[$carid]["price"],2);?> <span class="usd">USD</span></span> <span class="redprice1 price_euro"><a style="color:#EC310C; cursor:pointer;"><?php echo $common->CurrencyConverter($temp[$carid]["price"]);?> &euro;</a></span></td>
                </tr>
              </table>
            </div>
            <?php } ?>
          </div>
          <!--<div class="consulter"><span class="consulter_btn">Consulter cette annonce</span></div>-->
          <div class="clear"></div>
        </div>
        <div class="recherche_tab1">
          <ul id="menu" class="menu">
            <li class="active"><a href="#ot">Description du véhicule<span class="right_bg">&nbsp;</span></a></li>
            <li><a href="#features">Caractéristiques<span class="right_bg">&nbsp;</span></a></li>
            <li><a href="#std">Equipement de série<span class="right_bg">&nbsp;</span></a></li>
          </ul>
          <div id="ot" class="content1">
            <h2 class="annonces_bold">Vehicle Description</h2>
            <ul style="list-style:none;">
              <?php if($temp[$carid]["engine"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Engine:</strong> <?php echo $temp[$carid]["engine"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["extColor"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Exterior Color:</strong> <?php echo $temp[$carid]["extColor"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["interColor"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Interior Color:</strong> <?php echo $temp[$carid]["interColor"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["transmission"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Transmission:</strong> <?php echo $temp[$carid]["transmission"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["drivetrain"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Drive Train:</strong> <?php echo $temp[$carid]["drivetrain"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["doors"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Doors:</strong> <?php echo $temp[$carid]["doors"]?></li>
              <?php } ?>
              <?php if($temp[$carid]["wheelbase"]!= "" ) { ?>
              <li style=" width:250px;  margin: 5px 15px 0 5px;"><strong>Wheel Base:</strong> <?php echo $temp[$carid]["wheelbase"]?></li>
              <?php } ?>
            </ul>
          </div>
          <div id="features" class="content1">
            <h2 class="annonces_bold">Features</h2>
            <ul>
              <?php $features = explode(",",$temp[$carid]["features"]); 
			foreach($features as $value) {
			?>
              <li style="float:left; width:250px;  margin: 5px 15px 0 5px;"><?php echo $value?></li>
              <?php } ?>
            </ul>
          </div>
          <div id="std" class="content1">
            <h2 class="annonces_bold">Standard Equipments</h2>
            <ul>
              <?php $std_equip = explode(",",$temp[$carid]["std_equip"]); 
			foreach($std_equip as $value) {
			?>
              <li style="float:left; width:260px;  margin: 5px 15px 0 5px;"><?php echo $value?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="middle_two">
      <div class="car_detail">
        <div class="recherche1">
          <div class="head_2 f_left">Recherche </div>
          <script type="text/javascript">
			   function ajaxcall(val,attribute,name,manufac){ 
			  	 var divname = "#"+name;
				  jQuery(divname).html('<p style="position: absolute; top: 10px; left: 30px;"><img width="72" height="15" src="<?php echo DEFAULT_URL?>/images/loading.gif"></p>');
				 jQuery.ajax({
					  type: "POST",
					  url: "<?php echo DEFAULT_URL?>/ajax_new.php",
					  data: { value: val, attr : attribute, manufact : manufac,class : 'combo_box'},
					  dataType: "html",
					  success: function(data) {
						jQuery(divname).html("");
						jQuery(divname).append(data);
					  }
				});
			   }
			   
			   
              function formcheck(){
			  	 if(document.getElementById('manufacturer').value == ""){
				   alert("Please Select Make.");
				   return false;
				 }
			   }
           </script>
          <style>
           	.searched{
				color:#F00;
			}
           </style>
          <form action="<?php echo DEFAULT_URL?>/announces.php" method="get" onsubmit="return formcheck();">
            <div class="f_left">
              <table width="100%" border="0">
                <tr>
                  <td >
                  <?php if(!isset($manufacturer)){
					  $manufacturer = '';
				  }?>
                     <select class="combo_box" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','model','')">
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
                	 </select></td>
                  <td><div id="model" style="position:relative; width:110px;" >
                     <select class="combo_box" name="model" disabled="disabled">
						 <?php if(!isset($model)){ ?>
                            <option value="" selected="selected">Mod&egrave;les</option>
                         <?php } else {?>
                           	<option value="<?php echo $model; ?>" selected="selected"><?php echo $model; ?></option>
						 <?php } ?>
                      
                     </select>
                    </div></td>
                  <td ><div id="year" style="position:relative" >
					  <?php if(!isset($manufacturer)){
                          $manufacturer = '';
                      }?>
                      <select name="madeYear[]" class="combo_box year_de small" onchange="changeSel(this.value)">
                          <option value="">Ann&eacute;e De</option>
                                  <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
									  if($madeYear[0] == $i){
										   echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
									  }
                                  }?>
                       </select>
                    </div></td>
                     <td ><div id="year" style="position:relative" >
                        <select name="madeYear[]" class="combo_box year_a small" disabled="disabled">
                          <option value="">Ann&eacute;e &Agrave;</option>
                                  <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                  }?>
                        </select>
                    </div></td>
					<td>  <?php 
					  if(isset($_REQUEST['price'])){
                        $price1 = $_REQUEST['price'];
                      } 
					  else{
                        $price1 = '';
                      }?>
                      <select id="newPrice" name="price" class="combo_box">
                        <option value=""<?php if($price1 == ''){ ?> selected="selected"<?php } ?>>Prix</option>
                        <option value="0~10"<?php if($price1 == '0~10'){ ?> selected="selected"<?php } ?>>Upto - $10,000</option>
                        <option value="10~20"<?php if($price1 == '10~20'){ ?> selected="selected"<?php } ?>>$10,000 - $20,000</option>
                        <option value="20~30"<?php if($price1 == '20~30'){ ?> selected="selected"<?php } ?>>$20,000 - $30,000</option>
                        <option value="30~40"<?php if($price1 == '30~40'){ ?> selected="selected"<?php } ?>>$30,000 - $40,000</option>
                        <option value="40~50"<?php if($price1 == '40~50'){ ?> selected="selected"<?php } ?>>$40,000 - $50,000</option>
                        <option value="50~100"<?php if($price1 == '50~100'){ ?> selected="selected"<?php } ?>>$50,000 - $100,000</option>
                        <option value="100~10000"<?php if($price1 == '100~10000'){ ?> selected="selected"<?php } ?>>$100,000 - Above</option>
                      </select>
                      </td>
                  <td>
                  <?php echo $orderfield;?>
                  <input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
                </tr>
              </table>
            </div>
            </form>
          <?php /*?><script type="text/javascript">
           function ajaxcall(val,attribute,name,manufac)
		   { 
		   var divname = "#"+name;
			 jQuery.ajax({

					  type: "POST",

					  url: "<?php echo DEFAULT_URL?>/ajax.php",

					  data: { value: val, attr : attribute, manufact : manufac,class : 'styled1'},

					  dataType: "html",

					  success: function(data) {

									jQuery(divname).html("");

									jQuery(divname).append(data);
								  }

					});
		   }
		
           </script> 
          <script type="text/javascript">
              function formcheck()
		   {
			   if(document.getElementById('manufacturer').value == "")
			   {
				   alert("Please Select Make.");
				   return false;
				   }
			   }
           </script>
          <form action="<?php echo DEFAULT_URL?>/carlist.php" method="post" onsubmit="return formcheck();">
            <div class="f_left">
              <table width="100%" border="0">
                <tr>
                  <td ><div class="recherche_select_bg">
                      <select class="styled1" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','model','')">
                        <option value="" selected="selected">Marques</option>
                       <?php while($mnafrow = mysql_fetch_object($Make)) { ?>
                        <option value="<?php echo $mnafrow->value_id; ?>"><?php echo $mnafrow->value; ?></option>
                        <?php } ?>
                      </select>
                    </div></td>
                  <td><div class="recherche_select_bg" id="model" >
                      <select class="styled1" name="model" disabled="disabled">
                        <option value="" selected="selected">Mod&egrave;les</option>
                      </select>
                    </div></td>
                  <td ><div class="recherche_select_bg" id="year">
                      <select class="styled1" name="madeYear" onchange="ajaxcall(this.value,'madeYear','model')" disabled="disabled">
                        <option value="" selected="selected">Ann&eacute;e</option>
                      </select>
                    </div></td>
                  <td><div class="recherche_select_bg">
                      <select id="newPrice" name="price" class="styled1">
                        <option value="">Price</option>
                        <option value="1000">$1,000</option>
                        <option value="2000">$2,000</option>
                        <option value="3000">$3,000</option>
                        <option value="4000">$4,000</option>
                        <option value="5000">$5,000</option>
                        <option value="6000">$6,000</option>
                        <option value="7000">$7,000</option>
                        <option value="8000">$8,000</option>
                        <option value="9000">$9,000</option>
                        <option value="10000">$10,000</option>
                        <option value="11000">$11,000</option>
                        <option value="12000">$12,000</option>
                        <option value="13000">$13,000</option>
                        <option value="14000">$14,000</option>
                        <option value="15000">$15,000</option>
                        <option value="16000">$16,000</option>
                        <option value="17000">$17,000</option>
                        <option value="18000">$18,000</option>
                        <option value="19000">$19,000</option>
                        <option value="20000">$20,000</option>
                        <option value="21000">$21,000</option>
                        <option value="22000">$22,000</option>
                        <option value="23000">$23,000</option>
                        <option value="24000">$24,000</option>
                        <option value="25000">$25,000</option>
                        <option value="30000">$30,000</option>
                        <option value="35000">$35,000</option>
                        <option value="40000">$40,000</option>
                        <option value="45000">$45,000</option>
                        <option value="50000">$50,000</option>
                        <option value="55000">$55,000</option>
                        <option value="60000">$60,000</option>
                        <option value="65000">$65,000</option>
                        <option value="70000">$70,000</option>
                        <option value="75000">$75,000</option>
                        <option value="80000">$80,000</option>
                        <option value="85000">$85,000</option>
                        <option value="90000">$90,000</option>
                        <option value="95000">$95,000</option>
                        <option value="100000">$100,000</option>
                      </select>
                    </div></td>
                  <td><input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
                </tr>
              </table>
            </div>
          </form><?php */?>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="middle_two">
      <div class="middle_two_img"><img src="<?php echo DEFAULT_URL ?>/images/detail-page-v1.jpg" alt="" width="712" height="245"></div>
        <div class="middle_two_etape">
        <div class="etape_container">
            <div class="etape_title">
              <h1>Etape</h1>
            </div>
            <div class="etape_nav">
              <ul id="sidebar_nav">
                <li class="active_nav">
                  <div class="num">1</div>
                  <div class="nav_content">RECHERCHE</div>
                </li>
                <ul>
                  <li>
                    <div class="drop_conent">Nous recherchons votre véhicule sur tout le territoire U.S.</div>
                  </li>
                </ul>
                <li>
                  <div class="num">2</div>
                  <div class="nav_content douleline">NEGOCIATION / INSPECTION</div>
                </li>
                <ul>
                  <li>
                    <div class="drop_conent">Nous négocions votre véhicule et le faisons expertiser à votre demande.</div>
                  </li>
                </ul>
                <li>
                  <div class="num">3</div>
                  <div class="nav_content">SECURISER FONDS</div>
                </li>
                <ul>
                  <li>
                    <div class="drop_conent">Nous validons le vendeur et sécurisons les fonds à travers notre partenaire financier.</div>
                  </li>
                </ul>
                <li>
                  <div class="num">4</div>
                  <div class="nav_content douleline">TRANSPORT<br />
                    <span>(Terrestre, Maritime, Avion)</span></div>
                </li>
                <ul>
                  <li>
                    <div class="drop_conent">Nous gérons toute la logistique routière et maritime au meilleur tarif.</div>
                  </li>
                </ul>
              </ul>
            </div>
          </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="most_viewed">
      <div class="head_1">Nos Véhicule Neuf</div>
      <ul>
        <?php $new = $common->CustomQuery('Select car_id from car order by car_id DESC limit 0,8');
		while($newcar = mysql_fetch_object($new))
		{
		$newarray = $common->getCarWithAttrList($newcar->car_id ,array("images","fullName")); 
				 $imgpatha = $commons->getImageUrl($newarray[$newcar->car_id]["images"]);

		 ?>
        <li> <span class="img_area"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpatha; ?>&newWidth=87&newHeight=58" alt="fgf" /></span> <span class="img_txt"><a href="<?php echo DEFAULT_URL ?>/carview.php?carid=<?=$newcar->car_id;?>"><?php echo $newarray[$newcar->car_id]["fullName"] ?></a></span> </li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
    </div>
    <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.jcarousel.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/skin.css" />
<script type="text/javascript">
	jQuery.noConflict();
	jQuery(document).ready(function () {
		
		//jCarousel Plugin
	    jQuery('#carousel').jcarousel({
			vertical: true,
			scroll: 1,
			wrap: 'last',
			initCallback: mycarousel_initCallback
	   	});

	//Front page Carousel - Initial Setup
   	jQuery('div#slideshow-carousel a img').css({'opacity': '1'});
   	jQuery('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
   	jQuery('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')

  
  	//Combine jCarousel with Image Display
    jQuery('div#slideshow-carousel li a').hover(
       	function () {
        		
       		if (!jQuery(this).has('span').length) {
        		jQuery('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
   	    		jQuery(this).stop(true, true).children('img').css({'opacity': '1.0'});
       		}		
       	},
       	function () {
        		
       		jQuery('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
       		jQuery('div#slideshow-carousel li a').each(function () {

       			if (jQuery(this).has('span').length) jQuery(this).children('img').css({'opacity': '1.0'});

       		});
        		
       	}
	).click(function () {

	      	jQuery('span.arrow').remove();        
		jQuery(this).append('<span class="arrow"></span>');
       	jQuery('div#slideshow-main li').removeClass('active');        
       	jQuery('div#slideshow-main li.' + jQuery(this).attr('rel')).addClass('active');	
        	
       	return false;
	});


});


//Carousel Tweaking

function mycarousel_initCallback(carousel) {
	
	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
}
	
	</script> 
<script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js" type="text/javascript"></script> 
<script>
jQuery.noConflict();
	jQuery(document).ready(function(){
		jQuery(".example5").colorbox();
	});
</script>
</html>