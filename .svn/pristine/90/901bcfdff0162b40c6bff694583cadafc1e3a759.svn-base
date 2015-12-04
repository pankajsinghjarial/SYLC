 <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/jquery.betterTooltip.js"></script>
<script>
	$(document).ready(function(){
		$(".example5").colorbox();
	});
	$(document).ready(function(){
		$('.tTip').betterTooltip({speed: 150, delay: 300});
	});
</script>
  <div class="main_middle">
    <div class="middle">
    <div class="middle_two">
        <div class="car_detail">
          <div class="recherche1">
            <div class="head_2 f_left">Recherche</div>
             <script type="text/javascript">
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
           
           <style>
           	.searched{
				color:#F00;
			}
           </style>
           <form action="<?php echo DEFAULT_URL?>/announces.php" method="get" onsubmit="return formcheck();">
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
                        <option value="">Prix</option>
                        <option value="0~10">Upto - $10,000</option>
                        <option value="10~20">$10,000 - $20,000</option>
                        <option value="20~30">$20,000 - $30,000</option>
                        <option value="30~40">$30,000 - $40,000</option>
                        <option value="40~50">$40,000 - $50,000</option>
                        <option value="50~100">$50,000 - $100,000</option>
                        <option value="100~10000">$100,000 - Above</option>
                      </select>
                    </div></td>
                  <td>
                  <?php echo $orderfield;?>
                  <input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
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
    $query_str = ($addtopaging1 != '') ? $addtopaging.$addtopaging1 : '';
	?>
     <div class="middle_two">
      <div class="middle_two_mid_announces">
		 <div class="search_tab">
        	<span><a href="<?php echo DEFAULT_URL."/announces.php".$query_str;?>">Ebay Cars</a></span><span class="active_tab">Cars.com</span>
        </div>
            
            <div class="clear"></div>
            <span class="annonces_bold"><?php echo $total_rows?> cars correspondent</span>
         
         <?php if($total_rows >0) { ?>
         <div class="voitures"> 
         <div class="show_all_results"> <span class="car_inner">Show: All Results <span>|</span> <a  <?php if($groupby == "") { ?>href="<?php echo DEFAULT_URL ?>/carlist.php<?php echo $addtopaging.$addtopaging1?>&groupby=dealerName" <?php } ?> >Grouped By Dealer</a> (<?php echo $total_rows?> Vehicles)</span> <span class="price_lowest">
                 <label>Sort by:</label>
				<?php
				if(!isset($sort)) { $newurl =  DEFAULT_URL."/carlist.php".$addtopaging.$addtopaging1; }
				else { $newurl =  DEFAULT_URL."/carlist.php".$addtopaging.$addtopaging1; }
				?>
                <select name="sort" onChange="location.href = this.value;">
                  <option value="<?php echo $newurl ?>&sort=price~asc" <?php if($sort =='price~asc') { ?> selected  <?php } ?> >Price: Low to High</option>
                   <option value="<?php echo $newurl ?>&sort=price~desc" <?php if($sort =='price~desc') { ?> selected <?php } ?> >Price: High to Low</option>
                  <option value="<?php echo $newurl ?>&sort=mileage~asc" <?php if($sort =='mileage~asc') { ?> selected <?php } ?>>Mileage: Low to High</option>
                  <option value="<?php echo $newurl ?>&sort=mileage~desc" <?php if($sort =='mileage~desc') { ?> selected <?php } ?>>Mileage: High to Low</option>
                   <option value="<?php echo $newurl ?>&sort=fullName~asc" <?php if($sort =='fullName~asc') { ?> selected <?php } ?>>Name: Ascending</option>
                    <option value="<?php echo $newurl ?>&sort=fullName~desc" <?php if($sort =='fullName~desc') { ?> selected <?php } ?>>Name: Descinding</option>

                </select>
              </span></div>
          <div class="clear"></div> 
			<div class="sort_by">
              <ul>
                <li>Photos</li>
                <li class="discription1">Discription</li>
                <li class=" mileage">Mileage</li>
                <li class="price1">Price</li>
                <li class="save">Save</li>
              </ul>
            </div>
			
            <?php foreach($cars as $car) {
				 
			$temp = $common->getCarWithAttrList($car ,array("fullName","images","price","mileage","manufacturer","features")); 		 	
			if($temp[$car]["images"] != "") {
			 $imgpath = $commons->getImageUrl($temp[$car]["images"]);
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}
			?> 
                
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img">
                <a href="<?php echo DEFAULT_URL?>/car/<?=$car?>">
                <img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=87&newHeight=58">
                </a>
                <?php /*?><a href="<?php echo DEFAULT_URL?>/car/<?=$car?>">
                <img width="16" height="16" alt="Photo" src="<?php echo DEFAULT_URL ?>/images/photo_img.png">Photos</a><?php */?></div>
                <div class="car_name"> <span class="company_name"><a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><?php echo $temp[$car]['fullName'] ;?></a></span> <span class="year_loaded"><?php echo $common->getFeatureForListing($temp[$car]['features'],3) ?> </span> <?php /*?><span class="run_km"> <span class="email"><a class="example5" href="inquiry_form.php?car_id=<?=$car?>">Email Now</a></span> </span><?php */?> </div>
                <div class="fin_de_la_vente"> <span class="mile"><?php echo number_format($temp[$car]['mileage'],2); ;?> mi.</span> </div>
                <div class="ajouter">
                <div class="prix_de_vente"><span class="price price_usd">$<?php  echo number_format($temp[$car]['price'], 2);?> <span class="usd">USD</span></span> <span class="price price_euro"><a style="color:#EC310C; cursor:pointer;" class="tTip" title="Prix du véhicule:  $<?php  echo number_format($temp[$car]['price'], 2);?> USD<br/> Transport par bateau:  $1200 <br/>Transport à domicile: $900  <br/>Commission: $3500 <br/><br/>TOTAL:  <?php echo $common->CurrencyConverter($temp[$car]['price']);?> &euro;"><?php echo $common->CurrencyConverter($temp[$car]['price']);?> &euro; </a></span></div>
                  <?php /*?><div class="prix_de_vente"> <span class="price">$<?php echo number_format($temp[$car]['price'],2) ;?></span> </div><?php */?>
                  <span class="checkbox"><input type="checkbox" value="<?=$car?>" name="" onclick="ajaxfunction(<?=$car?>,'saved'+<?=$car?>)"> </span> <br>
                  <div id="saved<?php echo $car;?>" style="  color: darkgreen; font-size: 10px; margin: 0 0 0 0;"></div>
                  <div class="clear"></div> 
                </div>
                <div class="extra_button"><a href="add_to_selection.php?carId=<?php echo $car;?>" class="example5"><span class="read_btn">Ajouter à ma selection</span></a> <a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><span class="read_btn">Consultez cette annonce</span></a> <a href="consult_to_specialist.php?carId=<?php echo $car;?>" class="example5"><span class="read_btn">Contactez un spécialiste</span></a></div>
                 
                  <?php /*?><span class="read_btn">Consulter cette annonce</span> <?php */?>
                <div class="clear"></div>
              </div>
            </div>
            <?php } ?>
          <div class="clear"></div>
         </div>
          <div class="pagination">        <?php 
echo $pages->display_pages();
?>
        </div>  
        
   <?php } else { ?>
   <div class="voitures"> 
   <div class="result_area">
              <div class="inner">
                <div class="car_img"></div>
                <div class="car_name"> <span class="company_name">Pas de correspondance trouv&eacute;e</span> </div>
                <div class="clear"></div>
              </div>
          
            </div>
             <div class="clear"></div>
              </div>
   <?php } ?>
           
         
          </div>
          <?php include(LIST_ROOT."/includes/views/carlistsidebar.php"); ?>
          </div>
          </div></div>
<script type="text/javascript">
           function ajaxfunction(val,divname)
		   { 
		   var divname = "#"+divname;
			 jQuery.ajax({

					  type: "POST",

					  url: "<?php echo DEFAULT_URL?>/save.php",

					  data: { value: val},

					  dataType: "html",

					  success: function(data) {

									jQuery(divname).html("");

									jQuery(divname).append(data);
								  }

					});
		   }
		
           </script>