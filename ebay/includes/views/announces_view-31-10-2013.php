<?php if(isset($_SESSION['sentmail_txt'])){ echo $_SESSION['sentmail_txt']; unset($_SESSION['sentmail_txt']);}?>

<script
	src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js"
	type="text/javascript"></script>
	<script type="text/javascript">
window.onload = function(){
	jQuery(".example5").colorbox();
};

</script>

<script type="text/javascript">
function changeSel(val){
	(function($){ 
			if( val != ''){
			 var sel2 = $('.year_a').find('option').remove().end();
			 $('.year_a').removeAttr('disabled');
			 $(sel2).append('<option value="">Ann&eacute;e &Agrave;</option>');
			 for(var i = 2013 ; i > val; i--){
				$(sel2).append('<option value="'+i+'">'+i+'</option>'); 
			 }
		}
		else{
			$('.year_a').attr('disabled','disabled');
		}
	})(jQuery); 
}
</script>

<?php /* Done By Jitendra ?>
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
*/ ?>
<div class="main_middle">
	<div class="middle">
		<div class="middle_two">
			<div class="car_detail">
				<div class="recherche1">
					<div class="head_2 f_left">Recherche</div>
					<script type="text/javascript">
					   function ajaxcall(val,attribute,name,manufac){ 
					  	 var divname = "#"+name;
						  jQuery(divname).html('<p style="position: absolute; top: 10px; left: 30px;"><img width="72" height="15" src="<?php echo DEFAULT_URL?>/images/loading.gif"></p>');
						 jQuery.ajax({
							  type: "POST",
							  url: "<?php echo DEFAULT_URL?>/ajax_new.php",
							  data: { value: val, attr : attribute, manufact : manufac, css_class : 'combo_box'},
							  dataType: "html",
							  success: function(data) {
								jQuery(divname).html("");
								jQuery(divname).append(data);
							  }
						});
					   }

					  function wishlistcar(carid,cartype,carname,carimg,carprice){
						  var wishlist = $('#car_'+carid);
						  //if (wishlist.is(':checked')){ var chk = 'checked' }else{ var chk = 'unchecked'}
                                                  var chk = 'checked';
						  divname = "#saved"+carid;
						  jQuery.ajax({
							  type: "POST",
							  url: "<?php echo DEFAULT_URL?>/ajax_wishlistcar.php",
							  data: { carid: carid, cartype: cartype, carname: carname, carimg: carimg, carprice: carprice, ischk: chk},
							  dataType: "html",
							  success: function(data) {
								jQuery("#add_fav_link"+carid).html("");
								jQuery("#add_fav_link"+carid).append('<img src=\"<?php echo DEFAULT_URL?>/images/red_star_bookmark-16.png\" style=\"margin-top: 2px;\" />Ajouter à ma selection' );
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
/*.searched {
	color: #F00;
}*/
</style>
					<form action="<?php echo DEFAULT_URL?>/announces.php" method="get"
						onsubmit="return formcheck();">
						<input type="hidden" name="announces" value="announces" />
						<div class="f_left">
							<table width="100%" border="0">
								<tr>
									<td><?php if(!isset($manufacturer)){
										$manufacturer = '';
									}?> <select class="combo_box" id="manufacturer"
										name="manufacturer"
										onchange="ajaxcall(this.value,'manufacturer','model','')">
											<option value="" <?php if($manufacturer == ''){ ?>
												selected="selected" <?php }?>>Marques</option>
											<option value="Buick" <?php if($manufacturer == 'Buick'){ ?>
												selected="selected" <?php } ?>>Buick</option>
											<option value="Cadillac"
											<?php if($manufacturer == 'Cadillac'){ ?>
												selected="selected" <?php } ?>>Cadillac</option>
											<option value="Chevrolet"
											<?php if($manufacturer == 'Chevrolet'){ ?>
												selected="selected" <?php } ?>>Chevrolet</option>
											<option value="Chrysler"
											<?php if($manufacturer == 'Chrysler'){ ?>
												selected="selected" <?php } ?>>Chrysler</option>
											<option value="Dodge" <?php if($manufacturer == 'Dodge'){ ?>
												selected="selected" <?php } ?>>Dodge</option>
											<option value="Excalibur"
											<?php if($manufacturer == 'Excalibur'){ ?>
												selected="selected" <?php } ?>>Excalibur</option>
											<option value="Ferrari"
											<?php if($manufacturer == 'Ferrari'){ ?> selected="selected"
											<?php } ?>>Ferrari</option>
											<option value="Ford" <?php if($manufacturer == 'Ford'){ ?>
												selected="selected" <?php } ?>>Ford</option>
											<?php /*?> <option value="General+Motor+Corp."<?php if($manufacturer == 'General+Motor+Corp.'){ ?> selected="selected"<?php } ?>>General Motor Corp.</option><?php */?>
											<option value="GMC" <?php if($manufacturer == 'GMC'){ ?>
												selected="selected" <?php } ?>>GMC</option>
											<option value="Hummer"
											<?php if($manufacturer == 'Hummer'){ ?> selected="selected"
											<?php } ?>>Hummer</option>
											<option value="Mercedes-Benz"
											<?php if($manufacturer == 'Mercedes-Benz'){ ?>
												selected="selected" <?php } ?>>Mercedes-Benz</option>
											<option value="Morgan"
											<?php if($manufacturer == 'Morgan'){ ?> selected="selected"
											<?php } ?>>Morgan</option>
											<option value="Oldsmobile"
											<?php if($manufacturer == 'Oldsmobile'){ ?>
												selected="selected" <?php } ?>>Oldsmobile</option>
											<option value="Plymouth"
											<?php if($manufacturer == 'Plymouth'){ ?>
												selected="selected" <?php } ?>>Plymouth</option>
											<option value="Pontiac"
											<?php if($manufacturer == 'Pontiac'){ ?> selected="selected"
											<?php } ?>>Pontiac</option>
											<option value="Porsche"
											<?php if($manufacturer == 'Porsche'){ ?> selected="selected"
											<?php } ?>>Porsche</option>
											<option value="Studebaker"
											<?php if($manufacturer == 'Studebaker'){ ?>
												selected="selected" <?php } ?>>Studebaker</option>
											<option value="Toyota"
											<?php if($manufacturer == 'Toyota'){ ?> selected="selected"
											<?php } ?>>Toyota</option>
									</select></td>
									<td>
										<div id="model" style="position: relative; width: 99px;">
											<select class="combo_box" name="model" disabled="disabled">
												<option value="" selected="selected">Mod&egrave;les</option>
											</select>
										</div> <?php  if(isset($manufacturer)) { ?> <script
											type="text/javascript">
								jQuery("#model").html('<p style="position: absolute; top: 10px; left: 30px;"><img width="72" height="15" src="<?php echo DEFAULT_URL?>/images/loading.gif"></p>');
								jQuery.ajax({
									  type: "POST",
									  url: "<?php echo DEFAULT_URL?>/ajax_new.php",
									  data: { value: '<?php echo $manufacturer; ?>', attr : 'manufacturer', manufact : '' , css_class : 'combo_box'},
									  dataType: "html",
									  success: function(data) {
										jQuery("#model").html("");
										jQuery("#model").append(data);
										
										jQuery("#model").find("option").each(function(){
											if(jQuery(this).val() == "<?php echo $model; ?>"){
												jQuery(this).attr("selected","selected");
											}
										});
									  }
								 });
                            </script> <?php } ?>

									</td>
									<td><div id="year" style="position: relative">
											<?php if(!isset($manufacturer)){
												$manufacturer = '';
                      }?>
											<select name="madeYear[]" class="combo_box year_de"
												onchange="changeSel(this.value)">
												<option value="">Ann&eacute;e De</option>
												<?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
													echo '<option value="'.$i.'">'.$i.'</option>';
													if($madeYear[0] == $i){
                                   echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                              }
                          }?>
											</select>
										</div></td>
									<td><div id="year" style="position: relative">
											<?php if(isset($madeYear) && $madeYear[0] != ''){ ?>
											<select name="madeYear[]" class="combo_box year_a">
												<option value="" <?php if($madeYear[1] == ''){?> <?php }?>>Ann&eacute;e
													&Agrave;</option>
												<?php 
												for($i = date("Y",strtotime("+1 years")); $i > $madeYear[0] ; $i--){
        
								  if($madeYear[1] == $i){
									   echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
								  }
								  else{
									   echo '<option value="'.$i.'">'.$i.'</option>';
								  }
                          }?>
											</select>
											<?php } else{ ?>
											<select name="madeYear[]" class="combo_box year_a"
												disabled="disabled">
												<option value="">Ann&eacute;e &Agrave;</option>
											</select>
											<?php }?>
										</div></td>
									<td><?php 
									if(isset($_REQUEST['price'])){
                        $price1 = $_REQUEST['price'];
                      }
                      else{
                        $price1 = '';
                      }?> <select id="newPrice" name="price"
										class="combo_box">
											<option value="" <?php if($price1 == ''){ ?>
												selected="selected" <?php } ?>>Prix</option>
											<option value="0~10" <?php if($price1 == '0~10'){ ?>
												selected="selected" <?php } ?>>Upto - $10,000</option>
											<option value="10~20" <?php if($price1 == '10~20'){ ?>
												selected="selected" <?php } ?>>$10,000 - $20,000</option>
											<option value="20~30" <?php if($price1 == '20~30'){ ?>
												selected="selected" <?php } ?>>$20,000 - $30,000</option>
											<option value="30~40" <?php if($price1 == '30~40'){ ?>
												selected="selected" <?php } ?>>$30,000 - $40,000</option>
											<option value="40~50" <?php if($price1 == '40~50'){ ?>
												selected="selected" <?php } ?>>$40,000 - $50,000</option>
											<option value="50~100" <?php if($price1 == '50~100'){ ?>
												selected="selected" <?php } ?>>$50,000 - $100,000</option>
											<option value="100~10000"
											<?php if($price1 == '100~10000'){ ?> selected="selected"
											<?php } ?>>$100,000 - Above</option>
									</select>
									</td>
									<td><?php echo $orderfield;?> <input name="" type="image"
										src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
								</tr>
							</table>
						</div>
					</form>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php
		$newurl =  DEFAULT_URL."/announces.php".$addtopaging;
		?>
		<?php if(isset($_GET['filter']) && $_GET['filter']!=""){
			$filter = $_GET['filter'];
			$class = 'class="head_3"';
		}else{
			$filter = "";
			$class = 'class="car_inner"';
		}?>
		
		<div class="middle_two">
			<div class="middle_two_mid_announces">
				<div class="car" style="min-height: 25px;">
					<a href="<?php echo DEFAULT_URL."/announces" ?>"><span <?php if($filter==""){?> class="head_3" <?php }else{?> class="car_inner"<?php }?>>Voitures</span> </a>
					<a href="<?php echo $newurl."filter=1" ?>"><span <?php if($filter=="1"){?> class="head_3" <?php }else{?> class="car_inner"<?php }?>>Achat Immédiat</span> </a>
					<a href="<?php echo $newurl."filter=0" ?>"><span <?php if($filter=="0"){?> class="head_3" <?php }else{?> class="car_inner"<?php }?>>Enchères</span> </a>
				 </div>
				<div class="voitures voitures02">					
					<div class="clear"></div>
					<span class="bold" style="float: left;"><?php echo $pages->items_total;?>
						annonces correspondent <?php echo $searched;?> </span>
					<?php if(mysql_num_rows($list) > 0) { ?>


					<span class="price_lowest" style="float: right; margin: 5px;"> <label>Sort
							by:</label> <select name="sort"
						onChange="location.href = this.value;">
							<option
								value="<?php echo $newurl."sort=price~asc".$addtopaging1 ?>"
								<?php if($sort =='price~asc') { ?> selected <?php } ?>>Price:
								Low to High</option>
							<option
								value="<?php echo $newurl."sort=price~desc".$addtopaging1 ?>"
								<?php if($sort =='price~desc') { ?> selected <?php } ?>>Price:
								High to Low</option>
							<option
								value="<?php echo $newurl."sort=title~asc".$addtopaging1 ?>"
								<?php if($sort =='title~asc') { ?> selected <?php } ?>>Name:
								Ascending</option>
							<option
								value="<?php echo $newurl."sort=title~desc".$addtopaging1 ?>"
								<?php if($sort =='title~desc') { ?> selected <?php } ?>>Name:
								Descinding</option>
					</select>
					</span>

					<?php
					while($data = mysql_fetch_object($list)){

				if($data->type == 1){
					$car = $data->itemId;


					?>

					<div class="all_result_area">
						<div class="inner">
							<div class="car_img">
								<a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"> <img
									alt="Honda"
									src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $cars_arr[$car]['imgpath']; ?>&newWidth=87&newHeight=58">
								</a>
							</div>
							<div class="car_name">
								<span class="company_name"><a
									href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><?php echo $cars_arr[$car]['fullName'] ;?>
								</a> </span> <span class="year_loaded"><?php echo $cars_arr[$car]['features'],3 ?>
								</span>
							</div>
							<div class="fin_de_la_vente">
								<span class="mile"><?php echo number_format($cars_arr[$car]['mileage'],2); ;?>
									mi.</span>
							</div>
							<div class="ajouter">
								<div class="prix_de_vente">
									<div id="pageWrap">
										<div class="page psdPage">
											<div class="bubble pop_up" style="visibility:hidden;">
												<div id="tooltip">
													<div class="tooltip_img">
														<img src="<?php echo DEFAULT_URL?>/images/tooltip_top.png" border="0" alt="" />
													</div>
													<div class="tooltip_midd">
														<div class="pop_mb">
															<div class="box_01">Prix du véhicule:</div>
															<div class="box_02">
																$ <?php  echo number_format($cars_arr[$car]['price'], 2);?>
															</div>
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
															<div class="box_02">$3500.00</div>
														</div>
													</div>
													<div class="pop_btm">
														<div class="box_01 total">
															<img src="<?php echo DEFAULT_URL?>/images/total.jpg" border="0" alt="" />
														</div>
														<div class="box_02">
															<?php echo $common->CurrencyConverter($cars_arr[$car]['price']);?> &euro;
														</div>
													</div>

												</div>
											</div>

										</div>
									</div>
									<span class="price price_usd">$ <?php  echo number_format($cars_arr[$car]['price'], 2);?><span class="usd">USD</span>
									</span> <span class="price price_euro"><a style="color: #EC310C; cursor: pointer;"><?php echo $common->CurrencyConverter($cars_arr[$car]['price']);?> &euro; </a> </span>
								</div>	
							</div>
                                                    
							<div class="extra_button">
								<?php if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
                                                                            if(in_array($itemId, $favList)){ ?>
                                                                            <a href="javascript:voide(0);">
                                                                                <span class="read_btn">
                                                                                    <img src="<?php echo DEFAULT_URL?>//images/red_star_bookmark-16.png" style="margin-top: 2px;" />
                                                                                    Ajouter à ma selection 
                                                                            </span>
                                                                            </a>
                                                                            <?php }else{?>
                                                                            <a href="javascript:void(0);" onclick="wishlistcar('<?php echo $car;?>','local','<?php echo $cars_arr[$car]['fullName']?>','<?php echo $cars_arr[$car]['imgpath']; ?>','<?php echo $cars_arr[$car]['price']?>')">
                                                                                <span class="read_btn" id="add_fav_link<?php echo $car; ?>">Ajouter à ma selection 
                                                                                </span>
                                                                            </a>
                                                                            <?php }
                                                                         }else{?>
                                                                             <a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="example5">
                                                                                <span class="read_btn">Ajouter à ma selection 
                                                                                    </span>
                                                                            </a>
                                                                  <?php }?>
								<a href="<?php echo DEFAULT_URL?>/car/<?php echo $car;?>"><span class="read_btn">Consultez cette annonce</span> </a>
								<a href="consult_to_specialist.php?carId=<?php echo $car;?>" class="example5"><span class="read_btn">Contactez un spécialiste</span> </a>
								<?php if($_SESSION['User']['id']!=""){?>
<!--								<a><span class="checkbox"> <input type="checkbox" value="<?php echo $car;?>" id="car_<?php echo $car;?>" onclick="wishlistcar('<?php echo $car;?>','local','<?php echo $cars_arr[$car]['fullName']?>','<?php echo $cars_arr[$car]['imgpath']; ?>','<?php echo $cars_arr[$car]['price']?>')"></span> <br>
								<div id="saved<?php echo $car;?>" style="color: darkgreen; font-size: 10px; margin: 0 0 0 0;"></div>
								</a>-->
								<?php }?>
							</div>
							<div class="clear"></div>
						</div>
					</div>

					<?php
                }

                if($data->type == 2){
				$itemId = $data->itemId;
				$link = $ebay_arr[$itemId]['link'];
				preg_match("/[0-9]{4}/",$ebay_arr[$itemId]['title'],$title,PREG_OFFSET_CAPTURE);
				$year = $title[0][0];
				if($title[0][0] != ''){
					$title = explode($title[0][0], $ebay_arr[$itemId]['title']);
					$title[1] = $year.$title[1];
				}
				else{
					$title = array();
					$title[0] = $item->primaryCategory->categoryName;
					$title[1] = $item->title;
				}
				$buyItNowPrice = $ebay_arr[$itemId]['buyItNowPrice'];
				$time = $ebay_arr[$itemId]['time'];
				$galleryURL = $ebay_arr[$itemId]['galleryURL'];
				if($galleryURL == ''){
					$galleryURL = DEFAULT_URL."/images/default.jpg";
				}
				$forward_str = $ebay_arr[$itemId]['forward_str'];

				?>

					<div class="result_area">
						<div class="inner">
							<div class="car_img">
								<a href="<?php echo $link;?>"><img alt="<?php echo $title[0];?>"
									src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $galleryURL; ?>&newWidth=87&newHeight=54"
									width="87" height="54"> </a>
							</div>
							<div class="car_name" style="width: 231px;">
								<span class="company_name"><a href="<?php echo $link;?>"><?php echo $title[0];?>
								</a> </span> <span class="year_loaded"><?php echo $title[1];?> </span>
							</div>
							<div class="fin_de_la_vente">
								<span class="time">Fin de la vente</span> <span class="hh_mm"><?php echo $time;?>
								</span>
							</div>
							<div class="prix_de_vente">

								<div id="pageWrap">
									<div class="page psdPage">
										<div class="bubble pop_up" style="visibility:hidden;">
											<div id="tooltip">
												<div class="tooltip_img">
													<img src="<?php echo DEFAULT_URL?>/images/tooltip_top.png"
														border="0" alt="" />
												</div>
												<div class="tooltip_midd">
													<div class="pop_mb">
														<div class="box_01">Prix du véhicule:</div>
														<div class="box_02">
															$
															<?php  echo number_format(intval($buyItNowPrice), 2);?>
														</div>
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
														<div class="box_02">$3500.00</div>
													</div>
												</div>
												<div class="pop_btm">
													<div class="box_01 total">
														<img src="<?php echo DEFAULT_URL?>/images/total.jpg"
															border="0" alt="" />
													</div>
													<div class="box_02">
														<?php echo $common->CurrencyConverter($buyItNowPrice);?>
														&euro;
													</div>
												</div>
											</div>
										</div>

										<span>Prix de vente</span> <span class="price price_usd">$<?php  echo number_format(intval($buyItNowPrice), 2);?>
											<span class="usd">USD</span>
										</span> <span class="price price_euro"><a style="color: #EC310C; cursor: pointer;"><?php echo $common->CurrencyConverter($buyItNowPrice);?> &euro; </a> </span>
									</div>
								</div>
							</div>
							<div class="extra_button">
                                                                        <?php if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
                                                                            if(in_array($itemId, $favList)){ ?>
                                                                            <a href="javascript:voide(0);">
                                                                                <span class="read_btn">
                                                                                    <img src="<?php echo DEFAULT_URL?>/images/red_star_bookmark-16.png" style="margin-top: 2px;" />
                                                                                    Ajouter à ma selection 
                                                                            </span>
                                                                            </a>
                                                                            <?php }else{?>
                                                                            <a href="javascript:void(0);"  onclick="wishlistcar('<?php echo $itemId;?>','ebay','<?php echo $title[0]?>','<?php echo $galleryURL; ?>','<?php echo $buyItNowPrice?>')">
                                                                                <span class="read_btn" id="add_fav_link<?php echo $itemId; ?>">Ajouter à ma selection 
                                                                                    </span>
                                                                            </a>
                                                                            <?php }
                                                                         }else{?>
                                                                             <a href="<?php echo DEFAULT_URL; ?>/login_popup.php?page_url=<?php echo $_SERVER['REQUEST_URI']; ?>" class="example5">
                                                                                <span class="read_btn">Ajouter à ma selection 
                                                                                    </span>
                                                                            </a>
                                                                        <?php }?>
                                                                        
                                                                    
								<a href="<?php echo $link;?>"><span class="read_btn">Consultez cette annonce</span> </a>
								<a href="consult_to_specialist.php?carId=<?php echo $itemId.$forward_str;?>" class="example5"><span class="read_btn">Contactez un spécialiste</span> </a>
<!--								<a><span class="checkbox"> <input type="checkbox" value="<?php echo $itemId;?>" id="car_<?php echo $itemId;?>" onclick="wishlistcar('<?php echo $itemId;?>','ebay','<?php echo $title[0]?>','<?php echo $galleryURL; ?>','<?php echo $buyItNowPrice?>')"></span> <br>
								<div id="saved<?php echo $itemId;?>" style="color: darkgreen; font-size: 10px; margin: 0 0 0 0;"></div>
								</a>-->
							</div>
							<?php /*?> <div class="ajouter"> <span><a href="#">Ajouter à ma selection</a></span> <span class="read_btn">Consulter cette annonce</span> </div><?php */?>
							<div class="clear"></div>
						</div>
					</div>

					<?php } ?>

					<?php } 

					$common->customQuery("Truncate table temp_store");
   } else { ?>
					<div class="result_area">
						<div class="inner">
							<div class="car_img"></div>
							<div class="car_name">
								<span class="company_name">Pas de correspondance trouv&eacute;e</span>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php include(LIST_ROOT."/includes/views/carlistsidebar.php"); ?>
		</div>

		<div class="pagination">
			<?php echo $pages->display_pages(); ?>
		</div>
	</div>
</div>
<?php $total_count = number_format(intval($pages->items_total));?>
<?php if(count($_GET) == 0 && count($_POST)==0 && !is_array($_SESSION['mysearch'][0])){?>
	<script>	
	$('#total_annonces').html('<?php echo $total_count;?>');
	</script>
<?php }?>

