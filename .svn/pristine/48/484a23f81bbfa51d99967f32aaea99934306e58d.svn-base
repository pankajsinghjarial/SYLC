<script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js" type="text/javascript"></script> 
<?php /*?><script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/jquery.betterTooltip.js"></script><?php */?>

<script type="text/javascript">
	(function($){ 
		$(document).ready(function(){
			$(".example5").colorbox();
		});
	})(jQuery); 


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
	
	/*$(document).ready(function(){
		$('.tTip').betterTooltip({speed: 150, delay: 300});
	});*/
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
    
    <?php
		$newurl =  DEFAULT_URL."/nosstock.php".$addtopaging; 
	?>
    
      <div class="middle_two">
        <div class="middle_two_mid_announces">
          <div class="voitures">
          <div class="car"> <span class="head_3">Voitures</span></div>
            <div class="clear"></div>
           <span class="bold" style="float:left;"><?php echo count($cars);?> annonces correspondent </span>
             <?php if(count($cars) > 0) { ?>
            
            
			<span class="price_lowest" style=" float: right; margin: 5px;">
                 <label>Sort by:</label>
                <select name="sort" onChange="location.href = this.value;">
                  <option value="<?php echo $newurl."sort=price~asc".$addtopaging1 ?>" <?php if($sort =='price~asc') { ?> selected  <?php } ?> >Price: Low to High</option>
                   <option value="<?php echo $newurl."sort=price~desc".$addtopaging1 ?>" <?php if($sort =='price~desc') { ?> selected <?php } ?> >Price: High to Low</option>
                   <option value="<?php echo $newurl."sort=title~asc".$addtopaging1 ?>" <?php if($sort =='title~asc') { ?> selected <?php } ?>>Name: Ascending</option>
                    <option value="<?php echo $newurl."sort=title~desc".$addtopaging1 ?>" <?php if($sort =='title~desc') { ?> selected <?php } ?>>Name: Descinding</option>
                </select>
              </span>
              
       
       <?php		
			foreach($cars as $car){	
			?>
						
						<div class="all_result_area">
					  <div class="inner">
						<div class="car_img">
						<a href="<?php echo DEFAULT_URL?>/car/<?=$car?>">
						<img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $cars_arr[$car]['imgpath']; ?>&newWidth=87&newHeight=58">
						</a></div>
						<div class="car_name"> <span class="company_name"><a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><?php echo $cars_arr[$car]['fullName'] ;?></a></span> <span class="year_loaded"><?php echo $cars_arr[$car]['features'],3 ?> </span> </div>
						<div class="fin_de_la_vente"> <span class="mile"><?php echo number_format($cars_arr[$car]['mileage'],2); ;?> mi.</span> </div>
						<div class="ajouter">
						  <div class="prix_de_vente">
							<div id="pageWrap">
							  <div class="page psdPage">
								<div class="bubble pop_up">
								  <div id="tooltip">
									<div class="tooltip_img"><img src="<?php echo DEFAULT_URL?>/images/tooltip_top.png" border="0" alt="" /></div>
									<div class="tooltip_midd">
										 <div class="pop_mb">
										  <div class="box_01">Prix du véhicule:</div>
										  <div class="box_02">$<?php  echo number_format($cars_arr[$car]['price'], 2);?></div>
										</div>
										<div class="pop_mb">
										  <div class="box_01">Transport par bateau:</div>
										  <div class="box_02">$1200.00</div>
										</div>
										<div class="pop_mb">
										  <div class="box_01">Transport à domicile:</div>
										  <div class="box_02">$900.00</div>
										</div>
										<div class="pop_mb">
										  <div class="box_03">Commission:</div>
										  <div class="box_02">$3500.10</div>
										</div>
									  </div>
									  <div class="pop_btm">
										<div class="box_01"><img src="<?php echo DEFAULT_URL?>/images/total.jpg" border="0" alt="" /></div>
										<div class="box_02"><?php echo $common->CurrencyConverter($cars_arr[$car]['price']);?> &euro;</div>
									  </div> 
									  
								  </div>
								</div>
								
							</div>
						  </div>
						  <span class="price price_usd">$ <?php  echo number_format($cars_arr[$car]['price'], 2);?><span class="usd">USD</span></span> 
						  <span class="price price_euro"><a style="color:#EC310C; cursor:pointer;"><?php echo $common->CurrencyConverter($cars_arr[$car]['price']);?> &euro; </a></span> </div>
						
						  <div class="clear"></div>
						</div>
						<div class="extra_button"><a href="add_to_selection.php?carId=<?php echo $car;?>" class="example5"><span class="read_btn">Ajouter à ma selection</span></a> <a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><span class="read_btn">Consultez cette annonce</span></a> <a href="consult_to_specialist.php?carId=<?php echo $car;?>" class="example5"><span class="read_btn">Contactez un spécialiste</span></a></div>
						<div class="clear"></div>
					  </div>
					</div>
						
							
  <?php 
			}
  } else { ?>
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