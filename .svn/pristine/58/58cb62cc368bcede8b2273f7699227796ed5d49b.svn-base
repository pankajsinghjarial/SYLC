  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     
     <div class="middle_two_mid_announces">

            
            <div class="clear"></div>
            <span class="annonces_bold"><?php echo $total_rows;?> cars correspondent</span>
         <div class="voitures"> 
         <?php if($total_rows >0) { ?>
         <div class="show_all_results"> <span class="car_inner"><?php echo $total_rows; ?> Vehicles</span> <span class="price_lowest">
              <form method="get" action="<?php echo DEFAULT_URL?>/nos_stock.php" id="myform">
                 <label>Sort by:</label>
					<?php if($groupby != "") {  ?>
                    <input type="hidden" name="groupby" value="<?php echo $groupby; ?>"/>
                    <?php } ?>
                <select name="sorter" onChange="document.getElementById('myform').submit();">
                  <option value="price~desc" <?php if($sorter =='price~desc') { ?> selected  <?php } ?> >Prix: High to Low </option>
                   <option value="price~asc" <?php if($sorter =='price~asc') { ?> selected <?php } ?> >Prix: Low to High</option>
                  <option value="model~asc" <?php if($sorter =='model~asc') { ?> selected <?php } ?>>Nom: Ascending</option>
                    <option value="model~desc" <?php if($sorter =='model~desc') { ?> selected <?php } ?>>Nom: Descinding</option>

                </select>
              </form>
              </span></div>
          <div class="clear"></div> 
			<div class="sort_by">
              <ul>
                <li>Photos</li>
                <li class="discription1">Description</li>
                <li class=" mileage">Marque</li>
                <li class="price1">Prix</li>
              </ul>
            </div>
			
            <?php  while($result = mysql_fetch_object($cars)){ 
				 
			
			$carInfo = $common->getCarWithAttrList($result->car_id ,$options); 
			$carInfo = $carInfo[$result->car_id];
			
			if( !empty($carInfo['images'])) {
			 $imgpath = $common->getImageUrl($carInfo['images']);
			 
			}
			else
			{
			  $imgpath = DEFAULT_URL."/images/default.jpg";
	
			}   
        
			if($result->logo != "") {
			 $logoimgpath = LIST_ROOT."/images/brands/".$result->logo;
			} else
			{
			  $logoimgpath = DEFAULT_URL."/images/default.jpg";
			
			}
			
			
		
		  ?>
            
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img">
		  <img alt="<?php echo $carInfo['FullName']; ?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=87&newHeight=58">
		 </div>
                <div class="car_name">
		  <a href="<?php echo DEFAULT_URL.'/car/'.$result->car_id; ?>" >
		  <span class="company_name"><?php echo $carInfo['fullName']; ?></span> </a>
		  <span class="year_loaded">
		<strong>Color: </strong><?php echo $carInfo['extColor']; ?> </span>
		<strong>Color: </strong><?php echo $carInfo['interColor']; ?> </span> 
                <span class="year_loaded"><strong>Year: </strong><?php echo $carInfo['madeYear']; ?> </span>
                
                <span class="run_km" style="margin: 12px 0 0;"> <span class="email"><a class="example5" href="inquiry_form.php?car_id=<?php echo $result->id;?>">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile"> <img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $logoimgpath; ?>&newWidth=87&newHeight=58"></span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">
		  $
		  <?php echo number_format($carInfo['price']) ;?> </span> </div>
                                    <div class="clear"></div>
                   </div>
                <div class="clear"></div>
              </div>
            </div>
            <?php } ?>
            
   <?php } else { ?>
   <div class="result_area">
              <div class="inner">
                <div class="car_img"></div>
                <div class="car_name"> <span class="company_name">No Match Found</span> </div>
                <div class="clear"></div>
              </div>
            </div>
   <?php } ?>
            <div class="clear"></div>

          </div>
            <div class="pagination">        <?php echo $pages->display_pages(); ?>
        </div>  </div>
          <?php include(LIST_ROOT."/includes/views/carlistsidebar.php"); ?>
          </div>
           </div></div>
          <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js" type="text/javascript"></script> 
<script>
	$(document).ready(function(){
		$(".example5").colorbox();
	});
</script>



