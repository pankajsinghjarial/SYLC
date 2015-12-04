<?php 
//echo '<pre>';print_r($item);die;
/**
 * Returns an encrypted & utf8-encoded
 */
function encrypt($value, $key){ 
	
	if(!$value){return false;}
	$text = $value;
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
	
	$data = base64_encode($crypttext);
	$data = str_replace(array('+','/','='),array('-','_',''),$data);
	
	return trim($data); 
}

 ?>

<?php if(isset($_SESSION['sentmail_txt'])){ echo $_SESSION['sentmail_txt']; unset($_SESSION['sentmail_txt']);}?>


<?php /* Done By Jitendra ?>
<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/mootools.js"></script>
<script type="text/javascript">	
window.addEvent('domready', function() {	

	var myPages = $$('.price_euro');
	var myBubbles = $$('div.bubble.pop_up');
	
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
*/ ?>
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/style-detail.css" />
<link rel="stylesheet" href="<?php echo DEFAULT_URL ?>/css/jquery.jscrollpane.css">
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.js"></script>
<script src="<?php echo DEFAULT_URL ?>/js/border-radius.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript">
			$(function() {			

			//	Scrolled by user interaction
				$('#foo2').carouFredSel({
					auto: false,
					prev: '#prev2',
					next: '#next2',
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				});

			});
                         
                        function wishlistcar(carid,cartype,carname,carimg,carprice){
                                if(!confirm("Are you sure to add this car to Favorite")){
                                    return false;
                                }
                                var wishlist = $('#car_'+carid);
                                var chk = 'checked';
                                divname = "#saved"+carid;
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo DEFAULT_URL?>/ajax_wishlistcar.php",
                                        data: { carid: carid, cartype: cartype, carname: carname, carimg: carimg, carprice: carprice, ischk: chk},
                                        dataType: "html",
                                        success: function(data) {
                                              $(divname).html("");
                                              $(divname).append(data);
                                        }
                                });
                        }  
</script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroller_box').jScrollPane();
			});
</script>
<script src="<?php echo DEFAULT_URL ?>/js/ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/script.js"></script>
<!--[if IE ]>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/pie.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/ie9.js"></script>
<![endif]-->
<?php /* new code for change layout of detail page */ ?>


<!--middle start-->

<div class="middle2-outer">

    <div class="middle2">
<!--        <div class="bread-crumbs">
            <ul class="brb-ul">
                <li><a href="#"><img src="<?php echo DEFAULT_URL ?>/images/detail_view/car-icon.png" alt=""></a></li>
                <li><a href="#">voiture occasion</a></li>
                <li><a href="#">Cabriolets occasion</a></li>
                <li><a href="#">Porsche occasion</a></li>
                <li><a href="#" class="bread-cus-active">Riviera</a></li>
            </ul>
        </div> -->


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

        <!--three part start-->   
        <div class="three-parts">
            <div class="first-part">
                <div class="block-one-of-first-part">
                    <h4 class="Buick-Riviera blue-gradient"><?php echo $item->title;?></h4>

                    <h3 class="StockID">Stock ID: #</h3>
                    <?php if($item->vin != "" ) { ?>
                    <div class="stock-ul">
                        <p class="vin-text">Vin</p>
                        <p class="blue-tyext" style="width: 175px;">
                            <img src="<?php 
									echo DEFAULT_URL."/toImage.php?vin=".encrypt($item->vin,"je=.8)#?9S*mFN%");
								?>">
                        </p>
                    </div>
                    <?php }?>
                     <?php 
                     if($item->Mileage != "" ) { ?>
                    <div class="stock-ul2">
                        <p class="vin-text">Mileage</p><p class="vin-text2">Mi</p><p class="blue-tyext2"><?php echo number_format($item->Mileage,2)?></p>
                    </div>
                     <?php }?>
                    <?php   if($item->buyItNowPrice != "") {?>
                    <div class="stock-ul">
                        <p class="vin-text">Prix</p>
                        <p class="blue-tyext">
                           <?php 
                           echo $common->CurrencyConverter($item->buyItNowPrice);?> &euro;
                        </p>
                    </div>
                     <?php }?>
                </div>
                
                <!--block 2 satart-->
                <div class="block-one-of-first-part">
                    <h4 class="Buick-Riviera  blue-gradient">Caractéristiques</h4>
                    <?php
                        $spec = explode("~",$item->stdequip);
                        foreach($spec as $spex)
                        {
                            $spexs = explode("^",$spex);
                            $specs[$spexs[0]] = $spexs[1]; 
                        }
                        //echo '<pre>';print_r($specs);die;
                    ?>
                    <h3 class="StockID">Features</h3>
                    
                    <?php $i=0; foreach($specs as $key=> $val){
                        $val = str_replace(",", ", ", $val);
                        ?>
                                <div class="stock-ul<?php if($i%2==0){ echo "4";}else{ echo "5";} ?>">
                                    <p class="vin-text3"><?php echo $key; ?>:</p><p class="blue-tyext3"><?php echo $val; ?></p>
                                </div>
                    <?php  $i++; }  ?>
                   
                 
                    <a href="<?php echo DEFAULT_URL; ?>/add_to_inquiry.php?carId=<?php echo $carid;?>" class="demand example5"></a>
                    <div class="commander">
                        <img src="<?php echo DEFAULT_URL ?>/images/detail_view/image-car-commander.jpg" alt="">
                        <a href="#" class="command-button"></a>
                    </div>
                </div>

                <!--block 2 end+-->

            </div>
            <!--second part start-->  
            <?php 
                $gallery = explode("**",$item->galleryURL);
            ?>
            <div class="second-part">
                <div class="slider-part-middle">
                    <?php $imgpath = $gallery[0]; ?>
                    <div class="big-image-slide" id="slideshow-main">
                        <ul>
                            <li class="pa active">
                                <a href="#"> <img class="pa active" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=443&newHeight=331" alt="<?php echo $f_read->title;?>"/></a>
                            </li>
                            
                             <?php
                                     if(is_array($gallery) ) { ?>
                              <?php  $count = count($gallery); 
                                                   for($i=1;$i<$count;$i++) {
                                                                 $imgpath = $gallery[$i]; ?>
                                                  <li class="p<?=$i?>"> <a href="#"> <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=443&newHeight=331" alt="<?php echo $f_read->title;?>" /></a> </li>
                                  <?php /*?><li class="p<?=$i?>"> <a href="#"> <img src="<?php echo $imgpath; ?>" alt="<?php echo $f_read->title;?>" width="382" height="299" /></a> </li><?php */?>
                                                  <?php } 
                                          } else { ?>
                                          <li class="p<?=$i?>"> <a href="#"> <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=443&newHeight=331" alt="<?php echo $f_read->title;?>" /></a> </li>
                                  <?php /*?><li class="p1"> <a href="#"> <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $gallery; ?>&newWidth=382&newHeight=299" width="382" height="299" alt=""/></a> </li>
                                  <li class="p1"> <a href="#"> <img src="<?php echo $gallery; ?>" width="382" height="299" alt=""/></a> </li><?php */?>
                                        <?php } ?>
                        </ul>
                        
                    </div>
                    <div id="slideshow-carousel" class="thumb-opart jcarousel jcarousel-skin-tango">
                        <ul id="carousel" class="jcarousel jcarousel-skin-tango">
                            <?php $imgpath = $gallery[0]; ?>
                            <li> <a href="#" rel="pa"> <img  src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=80&newHeight=80" alt="<?php echo $f_read->title;?>"/></a></li>
                        <?php
			if( is_array($gallery) ) { 
                            $count = count($gallery); 
                            for($i=1;$i<$count;$i++) {
                                $imgpath = $gallery[$i];?>
                            <li> <a href="#" rel="p<?=$i?>"> <img  src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($imgpath); ?>&newWidth=80&newHeight=80" alt="<?php echo $f_read->title;?>"/></a></li>
                            <?php }
                        }
                        ?>  
                        </ul>
                    </div>

                    <div class="four-buttons">
                        <div class="one-button-row">
                            <a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="button-one example5"></a>
                            <a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="button-one2 example5"></a>        
                        </div>
                        <div class="one-button-row">
                                <?php if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
                                if($isSelect['count(id)']>0){?>
                                <a href="javascript:void(0);" class="button-on3"></a>    
                                <?php }else{
                                ?>
                                <a href="javascript:void(0);" onclick="wishlistcar('<?php echo $carid;?>','ebay','<?php echo $item->title;?>','<?php echo $gallery[0];?>','<?php echo $item->buyItNowPrice; ?>')" class="button-on3"></a>
                                <?php } }else{?>
                                <a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="button-on3 example5"></a>
                            <?php }?>
                            <a href="<?php echo DEFAULT_URL; ?>/add_to_selection.php?carId=<?php echo $carid;?>" class="button-one4 example5"></a>        
                        </div>        
                    </div>
                </div>

                <!--contact start-->
                <div class="contact-box-part">
                    <span class="contact-black-text">Contactez-nous!  - </span>
                    <span class="ct-number">01.76.63.32.16</span>
                </div>
                <!--contact end-->
                <!--description part start-->

                <div class="descri-part">
                    <div class="tab-des"></div>
                    <div class="descript-div-para2">
                        <div class="descript-div-para" id="ebay_desc">
                            <iframe src="<?php echo DEFAULT_URL?>/includes/code/ajax_ebay_desc.php" width="442" height="400" scroll="no" style="border: none;">
                            </iframe>
                        </div>
                    </div>
                </div>
                <!--description part start-->

                <!--registor part start-->
                <div class="ragistor-part-div">
                    <h5 class="blur-heading-blue">Enregistrer / partager cette annonce</h5>
                    <div class="social-icons">
                      <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style "> 
                    <a class="addthis_button_preferred_1"></a> 
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a> 
                </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb9e6c822016184"></script> 
        <!-- AddThis Button END -->
                    </div>
                    <div class="three-liand-button">
                        <ul class="left-li-three">
                            
                           <?php if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){ ?>
                                <li><a href="javascript:void(0);" onclick="wishlistcar('<?php echo $carid;?>','ebay','<?php echo $item->title;?>','<?php echo $gallery[0];?>','<?php echo $item->buyItNowPrice; ?>')">Ajouter &agrave; ma sélection</a></li>
                                <li><a href="javascript:void(0);" onclick="wishlistcar('<?php echo $carid;?>','ebay','<?php echo $item->title;?>','<?php echo $gallery[0];?>','<?php echo $item->buyItNowPrice; ?>')">Sauvegarder cette annonce</a></li>
                            <?php }else{?>
                                <li><a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="example5">Ajouter &agrave; ma sélection</a></li>
                                <li><a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="example5">Sauvegarder cette annonce</a></li>
                            <?php }?>
                            <li><a href="<?php echo DEFAULT_URL; ?>/send_invite.php?carId=<?php echo $carid;?>" class="example5">Envoyer &agrave; un ami</a></li>
                        </ul>
                        <a  href="javascrip:void(0);" onclick="window.print();return false;" class="list-right-button-three"></a>
                    </div>
                </div>
                <!--registor part end-->



                <!--description part 2 start-->

                <div class="descri-part">
                    <div class="descript-div-para22">
                        <div class="descript-div-para33">
                            <h5 class="blur-heading-blue">Prudence et vigilance</h5>
                            <div class="social-icons3"><a href="#" class="social-iconshref">Signaler un contenu abusif</a></div>
                            <h6 class="blur-heading-blue2">Nos conseils :</h6>
                            <ul class="left-li-three2">
                                <li>Rencontrez le vendeur et essayez le véhicule</li>
                                <li>N'envoyez jamais vos coordonnées bancaires &agrave; un inconnu</li>
                                <li>Ne payez jamais avec Western Union ou Money Gram. Payez par chéque de banque</li>
                                <li>Le prix d'une voiture d'occasion vous semble anormalement bas Soyez vigilants...</li>
                            </ul>
                            <ul class="left-li-three2">
                                <li>Rencontrez le vendeur et essayez le véhicule</li>
                                <li>N'envoyez jamais vos coordonnées bancaires &agrave; un inconnu</li>
                                <li>Ne payez jamais avec Western Union ou Money Gram. Payez par chéque de banque</li>
                                <li>Le prix d'une voiture d'occasion vous semble anormalement bas Soyez vigilants...</li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <!--description part 2 end-->
            </div>
            <!--second part end-->  
            <div class="third-part">
                <div class="block-one-of-first-part">
                    <h4 class="Buick-Riviera  blue-gradient">Prix de détail suggéré</h4>

                    <h3 class="StockID2">Voici la valeur estimative actuelle de cette voiture sur le marché</h3>
<!--                    <div class="stock-ul">
                        <p class="vin-text">Prix</p><p class="blue-tyext">&euro;22,546.00 </p>
                    </div>-->

                </div>


                <!--right side block2 start-->
                <div class="block-one-of-first-part233">
                    <h4 class="Buick-Riviera  blue-gradient">nos services</h4>
                    <div class="tree-vew-div"><div class="packceo-red technology">Pack ECO</div>
                        <?php if($item->buyItNowAvailable != 0){ ?>
                        <div class="black-text-of-red">
                            <?php 
                                $eco_prize = $item->buyItNowPrice+5600.00;
                                echo $common->CurrencyConverter($eco_prize);
                            ?>
                            &euro;
                        </div>      
                         <?php }?>
                    </div>
                    <div class="hidden-div-red2 thelanguage">
                        <ul class="hidden-list">
                            <li>1.  Validation du vendeur</li>
                            <li>2.  Paiment securise</li>
                            <li>3. Gestion logisitique interne</li>
                            <li>4.  Gestion logistique maritime securise</li>
                        </ul>    
                    </div>

                    <div class="tree-vew-div">
                        <div class="packceo-red technology">Pack Expert</div>
                        <?php if($item->buyItNowAvailable != 0){ ?>
                        <div class="black-text-of-red">
                            <?php 
                                $ecxpert_prize = $item->buyItNowPrice+10000.00;
                                echo $common->CurrencyConverter($ecxpert_prize);
                            ?>
                            &euro;
                        </div>
                        <?php }?>
                        
                    </div>
                    <div class="hidden-div-red2 thelanguage">                       
                        <ul class="hidden-list">
                            <li>1. Validation du vendeur</li>
                            <li>2. expertise du vehicule avant achat</li>
                            <li>3. negociation du vehicule</li>
                            <li>4. paiment securise</li>
                            <li>5. revision du vehicule avant depart</li>
                            <li>6. Gestion logisitique interne</li>
                            <li>7. gestion logistique maritime securise</li>
                        </ul>    
                    </div>

                    <div class="tree-vew-div">
                        <div class="packceo-red technology" style="width: 139px;">Pack a La Carte</div>
                        <div class="black-text-of-red" style="font-size: 10px;">Appelez
   			    Nous!!
                        </div>
                        <div class="hidden-div-red thelanguage">
                            <ul class="hidden-list">
                                <li>1. Validation du vendeur</li>
                                <li>2. expertise du vehicule avant achat</li>
                                <li>3. negociation du vehicule</li>
                                <li>4. paiment securise</li>
                                <li>5. Gestion logisitique interne</li>
                                <li>6. gestion logistique maritime securise</li>
                                <li>7. costumisation du vehicule dans nos locaux a miami</li>
                                <li>8. contre expertise dans nos locaux a miami</li>
                                <li>9. revision du vehicule</li>
                                <li>10. assurance maritime</li>
                                <li>11. video montage souvenir</li>
                                <li>12. marti report</li>
                                <li>13. rapport historique</li>
                            </ul>    
                        </div>

                    </div>
                    <!--right side block2 end-->


                </div>
               
                <div class="block-one-of-first-part233">
                    <h4 class="Buick-Riviera">Lire aussi sur</h4>

                    <h3 class="StockID2"><strong>Information / Communautaire</strong></h3>
                     <?php
		$limit = 4;
		// API request variables
		$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
		$version = '1.0.0';  // API version supported by your application
		$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
		$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
		$i = '0';  // Initialize the item filter index to 0

		// Create a PHP array of the item filters you want to use in your request
		$filterarray =
		array(
				array(
						'name' => 'MaxPrice',
						'value' => '10000000',
						'paramName' => 'Currency',
						'paramValue' => 'USD'),
				array(
						'name' => 'ListingType',
						'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
						'paramName' => '',
						'paramValue' => ''),
		);

		// Generates an indexed URL snippet from the array of item filters
		function urlArray ($filterarray) {
			
			$i=0;
			// Iterate through each filter in the array
			foreach($filterarray as $itemfilter) {
				// Iterate through each key in the filter
				foreach ($itemfilter as $key =>$value) {
					if(is_array($value)) {
						foreach($value as $j => $content) { // Index the key for each value
							$urlfilter .= "&itemFilter($i).$key($j)=$content";
						}
					}
					else {
						if($value != "") {
							$urlfilter .= "&itemFilter($i).$key=$value";
						}
					}
				}
				$i++;
			}

			return $urlfilter;
		} // End of buildURLArray function

		// Build the indexed item filter URL snippet
		 $urlfilter = urlArray($filterarray);

		// Construct the findItemsByKeywords HTTP GET call
		$apicall = "$endpoint?";
		$apicall .= "OPERATION-NAME=findItemsAdvanced";
		$apicall .= "&SERVICE-VERSION=$version";
		$apicall .= "&SECURITY-APPNAME=$appid";
		$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
		$apicall .= "&GLOBAL-ID=$globalid";
		$apicall .= "&categoryId=6001";
		$apicall .= "&paginationInput.entriesPerPage=".$limit;
		$apicall .= "&aspectFilter(0).aspectName=Make";
		$apicall .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
		$apicall .= "&aspectFilter(0).aspectValueName(1)=Aston+Martin";
		$apicall .= "&aspectFilter(0).aspectValueName(2)=Buick";
		$apicall .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
		$apicall .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
		$apicall .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
		$apicall .= "&aspectFilter(0).aspectValueName(6)=Dodge";
		$apicall .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
		$apicall .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
		$apicall .= "&aspectFilter(0).aspectValueName(9)=Ford";
		$apicall .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
		$apicall .= "&aspectFilter(0).aspectValueName(11)=GMC";
		$apicall .= "&aspectFilter(0).aspectValueName(12)=Hummer";
		$apicall .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
		$apicall .= "&aspectFilter(0).aspectValueName(14)=Morgan";
		$apicall .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
		$apicall .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
		$apicall .= "&aspectFilter(0).aspectValueName(17)=Porsche";
		$apicall .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
		$apicall .= "&aspectFilter(0).aspectValueName(19)=Toyota";
		$apicall .= "&sellingStatus.sellingState=Active";
		$apicall .= "&descriptionSearch=true";
		$apicall .= "$urlfilter";
		$apicall .= '&sortOrder=EndTimeSoonest';

		// Load the call and capture the document returned by eBay API
		$carlistsidebar = simplexml_load_file($apicall);
                //echo '<pre>';print_r($carlistsidebar);die;
		if($carlistsidebar->ack == "Success") {
                    $i=0;
			foreach( $carlistsidebar->searchResult->item as $item ) {

			$itemId = $item->itemId;
			$title = $item->title;
			$galleryURL = $item->galleryURL;
			if($galleryURL == ''){
				$galleryURL = LIST_ROOT."/images/default.jpg";
			}
			
		?>
                    <!--first-->
                    <div class="gray-image-text-<?php if($i%2==0){ echo "div"; }else{ echo "div2";} ?>">
                        <div class="image-gray-blc">
                            <img
					src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo urlencode($galleryURL); ?>&newWidth=67&newHeight=50"
					alt="<?php echo $title;?>" />
                        </div>
                        <div class="right-paragray-blc">
                            <a href="<?php echo DEFAULT_URL ?>/ebay/<?php echo $itemId;?>">
						<?php echo substr($title, 0, strpos($title, " ", 30));?>
					</a>
                        </div>
                    </div>
                    <!--first end-->
                <?php $i++; } } ?>


                </div>

                <!--lier lusi end-->
                
                
                <!--block 3 start-->
                <div class="block-one-of-first-part233">
                            <h4 class="Buick-Riviera  blue-gradient">Etape</h4>
                        <div class="etape_nav10">
                            <ul id="sidebar_nav">
                                <li class="active_nav">
                                    <div class="mypets">
                                        <div class="nav_content">RECHERCHE</div>
                                    </div>
                                    <div class="hidden-div-red233 thepet">
                                        <p class="hiddenpara">Nous recherchons votre véhicule sur tout le territoire U.S.<br></p>   
                                    </div>
                                </li>

                                <li>
                                    <div class="mypets">
                                        <div class="nav_content douleline">NEGOCIATION / INSPECTION</div>
                                    </div>
                                    <div class="hidden-div-red233 thepet">
                                        <p class="hiddenpara">Nous recherchons votre véhicule sur tout le territoire U.S.<br></p>   
                                    </div>
                                </li>

                                <li>
                                    <div class="mypets">
                                        <div class="nav_content">SECURISER FONDS</div>
                                    </div>
                                    <div class="hidden-div-red233 thepet">
                                        <p class="hiddenpara">Nous recherchons votre véhicule sur tout le territoire U.S.<br></p>   
                                    </div>
                                </li>

                                <li>
                                    <div class="mypets">
                                        <div class="nav_contentdouleline23">TRANSPORT<br>
                                            <span>(Terrestre, Maritime, Avion)</span></div>
                                    </div>
                                    <div class="hidden-div-red233 thepet">
                                        <p class="hiddenpara">Nous recherchons votre véhicule sur tout le territoire U.S.<br></p>   
                                    </div>
                                </li>

                            </ul>
                        </div>
                </div>
                <!--block 3 end-->
                
            </div> 
            <!--three part end-->   


            <div class="clear"></div>



            <section class="slider">
                <div class="list_carousel">
                    <ul id="foo2">
                        <?php  include(LIST_ROOT."/includes/views/mostview.php"); ?>                   
                    </ul>
                    <div class="clearfix"></div>
                    <a id="prev2" class="prev" href="#">&lt;</a> <a id="next2" class="next" href="#">&gt;</a> </div>
            </section>
        </div>
    </div>
</div>

<!--middle end-->
<script type="text/javascript">
function changeSel(val){
    if( val != ''){
             var sel2 = $('.year_a').find('option').remove().end();
             $('.year_a').removeAttr('disabled');
             $(sel2).append('<option value="">A</option>');
             for(var i = 2013 ; i > val; i--){
                    $(sel2).append('<option value="'+i+'">'+i+'</option>'); 
             }
    }
    else{
            $('.year_a').attr('disabled','disabled');
    }
}

function ajaxcall(val,attribute,name,manufac){ 
      var divname = "#"+name;
       $(divname).html('<p style="position: absolute; top: 10px; left: 30px;"><img width="72" height="15" src="<?php echo DEFAULT_URL ?>/images/loading.gif"></p>');
      $.ajax({
               type: "POST",
               url: "<?php echo DEFAULT_URL ?>/ajax_new.php",
               data: { value: val, attr : attribute, manufact : manufac, css_class : 'combo_box1'},
               dataType: "html",
               success: function(data) {
                     //alert("Car hass \350t\350 ajout\350 \351 votre s\350lection");
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
           
<script type="text/javascript" src="<?php echo DEFAULT_URL ?>/js/jquery.jcarousel.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DEFAULT_URL ?>/css/skin.css" />
<script type="text/javascript">
	//jQuery.noConflict();

	$(window).load(function(){

		//jCarousel Plugin
		$('#carousel').jcarousel({
			vertical: false,
			scroll: 1,
			wrap: 'circular',
			initCallback: mycarousel_initCallback
		});
		
		//Front page Carousel - Initial Setup
		$('div#slideshow-carousel a img').css({'opacity': '1'});
		$('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
		$('div#slideshow-carousel a:first').append('<span class="arrow"></span>')

		//Combine jCarousel with Image Display
		$('div#slideshow-carousel a').hover(
			function () {
					
				if (!$(this).has('span').length) {
					$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
					$(this).stop(true, true).children('img').css({'opacity': '1.0'});
				}		
			},
			function () {
				$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
				$('div#slideshow-carousel li a').each(function () {
					if ($(this).has('span').length) jQuery(this).children('img').css({'opacity': '1.0'});
				});	
			}
		).click(function () {
			$('span.arrow').remove();        
			$(this).append('<span class="arrow"></span>');
			$('div#slideshow-main li').removeClass('active');        
			$('div#slideshow-main li.' + $(this).attr('rel')).addClass('active');	
				
			return false;
		});
		//Carousel Tweaking

		
	});
			
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
	$(document).ready(function(){
		$(".example5").colorbox();
//                $.ajax({
//                        type: "GET",
//                        url: "<?php echo DEFAULT_URL?>/includes/code/ajax_ebay_desc.php",
//                        dataType: "html",
//                        success: function(data) {
//                              $('#ebay_desc').append(data);
//                        }
//                });
	});
</script>    
    
    

