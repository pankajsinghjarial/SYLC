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
		$newurl =  DEFAULT_URL."/announces.php".$addtopaging; 
		$query_str = ($addtopaging1 != '') ? $addtopaging.$addtopaging1."&groupby=fullName" : '';
	?>
    
      <div class="middle_two">
        <div class="middle_two_mid_announces">
        <div class="search_tab">
        	<span class="active_tab">Ebay Cars</span><span><a href="<?php echo DEFAULT_URL."/search-result".$query_str;?>">Cars.com</a></span>
        </div>
        
        
          <div class="voitures">
          <div class="car"> <span class="head_3">Voitures</span><?php /*?> <span class="car_inner">Options d'affichage des véhicules</span><?php */?><a href="<?php echo $newurl."filter=1" ?>"><span class="car_inner">Achat Immédiat</span></a><a href="<?php echo $newurl."filter=0" ?>"><span class="car_inner">Enchères</span></a><span class="ebay"><img src="images/ebay_icon.png" alt="Ebay" /></span></div>
            <div class="clear"></div>
            
             <?php if($resp->ack == "Success") { ?>
            
            <span class="bold" style="float:left;"><?php echo $pages->items_total;?> annonces correspondent <?php echo $searched;?></span>
			<span class="price_lowest" style=" float: right; margin: 5px;">
                 <label>Sort by:</label>
                <select name="sort" onChange="location.href = this.value;">
                  <option value="<?php echo $newurl."sort=buyItNowPrice~asc".$addtopaging1 ?>" <?php if($sort =='buyItNowPrice~asc') { ?> selected  <?php } ?> >Price: Low to High</option>
                   <option value="<?php echo $newurl."sort=buyItNowPrice~desc".$addtopaging1 ?>" <?php if($sort =='buyItNowPrice~desc') { ?> selected <?php } ?> >Price: High to Low</option>
                   <option value="<?php echo $newurl."sort=time~asc".$addtopaging1 ?>" <?php if($sort =='time~asc') { ?> selected <?php } ?>>Time Remaining: Ascending</option>
                    <option value="<?php echo $newurl."sort=time~desc".$addtopaging1 ?>" <?php if($sort =='time~desc') { ?> selected <?php } ?>>Time Remaining: Descinding</option>
                </select>
              </span>
              
       

			
  <?php
	   foreach($resp->searchResult->item as $item) {
		
		$itemId = $item->itemId;
		$link = $item->viewItemURL;
		preg_match("/[0-9]{4}/",$item->title,$title,PREG_OFFSET_CAPTURE);
		$year = $title[0][0];
		if($title[0][0] != ''){
			$title = explode($title[0][0], $item->title);
			$title[1] = $year.$title[1]; 
		}
		else{
			$title = array();
			$title[0] = $item->primaryCategory->categoryName;
			$title[1] = $item->title;
		}
		$postalCode = $item->postalCode;
		$location = $item->location;
		$country = $item->country;
		$listingType = $item->listingInfo->listingType;
		$buyItNowAvailable = $item->listingInfo->buyItNowAvailable;
		$buyItNowPrice = $item->sellingStatus->convertedCurrentPrice;
		if($item->listingInfo->buyItNowAvailable == 'true'){
			$buyItNowPrice = $item->listingInfo->buyItNowPrice;
			$buyItNowAvailable = 1;
		}
		else{
			$buyItNowAvailable = 0;
		}
		
		$time = convertTimeLeft($item->sellingStatus->timeLeft);
		$endson = $item->listingInfo->endTime;
		$endtimestamp = strtotime($endson);
		$galleryURL = (isset($item->galleryPlusPictureURL)) ?$item->galleryPlusPictureURL : $item->galleryURL;
		
		
		$forward_str = "&title=".urlencode($item->title)."&buyItNowPrice=".$buyItNowPrice."&postalCode=".$postalCode."&location=".$location."&listingType=".$listingType."&endson=".$endson."&endtimestamp=".$endtimestamp."&buyItNowAvailable=".$buyItNowAvailable;
		
		?>
        
        <div class="result_area">
              <div class="inner">
                <div class="car_img"><a target="_blank" href="<?php echo $link;?>"><img alt="<?php echo $title[0];?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $galleryURL; ?>&newWidth=87&newHeight=54" width="87" height="54"></a></div>
                <div class="car_name" style="width:231px;"><span class="company_name"><a target="_blank" href="<?php echo $link;?>" ><?php echo $title[0];?></a></span> <span class="year_loaded"><?php echo $title[1];?></span> </div>
                <div class="fin_de_la_vente"> <span class="time">Fin de la vente</span> <span class="hh_mm"><?php echo $time;?></span> </div>
                <div class="prix_de_vente"> <span>Prix de vente</span> <span class="price price_usd">$<?php  echo number_format(intval($buyItNowPrice), 2);?> <span class="usd">USD</span></span> <span class="price price_euro"><a style="color:#EC310C; cursor:pointer;" class="tTip" title="Prix du véhicule:  $<?php  echo number_format(intval($buyItNowPrice), 2);?> USD<br/>
Transport par bateau:  $1200 <br/>
Transport à domicile: $900  <br/>
Commission: $3500 <br/>
<br/>
TOTAL:  <?php echo $common->CurrencyConverter($buyItNowPrice);?> &euro;"><?php echo $common->CurrencyConverter($buyItNowPrice);?> &euro; </a></span></div>
                <div class="extra_button"><a href="add_to_selection.php?carId=<?php echo $itemId.$forward_str;?>" class="example5"><span class="read_btn">Ajouter à ma selection</span></a> <a href="<?php echo $link;?>"><span class="read_btn">Consultez cette annonce</span></a> <a href="consult_to_specialist.php?carId=<?php echo $itemId.$forward_str;?>" class="example5"><span class="read_btn">Contactez un spécialiste</span></a></div>
               <?php /*?> <div class="ajouter"> <span><a href="#">Ajouter à ma selection</a></span> <span class="read_btn">Consulter cette annonce</span> </div><?php */?>
                <div class="clear"></div>
              </div>
            </div>
        
        <?php } ?>
            
   <?php } else { ?>
   <div class="result_area">
              <div class="inner">
                <div class="car_img"></div>
                <div class="car_name"> <span class="company_name">Pas de correspondance trouv&eacute;e</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <?php } ?>
            <div class="clear"></div>
          </div>
          <div class="pagination">
           <?php echo $pages->display_pages(); ?>
          </div>
        </div>
          <?php include(LIST_ROOT."/includes/views/carlistsidebar.php"); ?>
      </div>
    </div>
  </div>