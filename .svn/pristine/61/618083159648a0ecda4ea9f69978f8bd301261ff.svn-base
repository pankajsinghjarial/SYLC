  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     
     <div class="middle_two_mid_announces">
				<div class="bread-crumbs">
					<ul class="brb-ul">
						<li><a href="<?php echo DEFAULT_URL; ?>"><img
								src="/images/car-icon.png" alt=""> </a></li>
						<li><a href="<?php echo DEFAULT_URL; ?>/nosstock">Nos Stock</a></li>
						<?php if(isset($stockType)){ 
							if($stockType == "neuf")  $stockType = "Neuf";
							else if($stockType == "classic")  $stockType = "Classic Car";	
						?>
						<li><a
							href="<?php echo DEFAULT_URL; ?>/page/<?php echo $terms->slug; ?>"
							class="bread-cus-active"><?php  echo $stockType; ?> </a></li>
							<?php } ?>
					</ul>
				</div>

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
                  <option value="prix~asc" <?php if($sorter =='prix~asc') { ?> selected  <?php } ?> >Prix: High to Low </option>
                   <option value="prix~desc" <?php if($sorter =='prix~desc') { ?> selected <?php } ?> >Prix: Low to High</option>
                  <option value="model_name~asc" <?php if($sorter =='model_name~asc') { ?> selected <?php } ?>>Nom: Ascending</option>
                    <option value="model_name~desc" <?php if($sorter =='model_name~desc') { ?> selected <?php } ?>>Nom: Descinding</option>

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
				 
			
			if($result->image != "") {
			 $imgpath = LIST_ROOT."/images/brands/".$result->image;
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}   
        
			if($result->logo != "") {
			 $logoimgpath = LIST_ROOT."/images/brands/".$result->logo;
			} else
			{
			  $logoimgpath = LIST_ROOT."/images/default.jpg";
	
			} 
		
		  ?>
            
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img">
                <img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=87&newHeight=58">
                 </div>
                <div class="car_name"> <span class="company_name"><?php echo $result->model_name; ?></span> <span class="year_loaded"><strong>Color: </strong><?php echo $result->color; ?> </span> 
                <span class="year_loaded"><strong>Year: </strong><?php echo $result->year; ?> </span>
                <span class="year_loaded"><strong>Dispo: </strong><?php echo $result->dispo; ?> </span>
                <span class="run_km" style="margin: 12px 0 0;"> <span class="email"><a class="example5" href="inquiry_form.php?car_id=<?php echo $result->id;?>">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile"> <img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $logoimgpath; ?>&newWidth=87&newHeight=58"></span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">$<?php echo number_format($result->prix,2) ;?></span> </div>
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



