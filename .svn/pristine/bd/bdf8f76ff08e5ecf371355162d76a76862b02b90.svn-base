  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <span class="annonces_bold">Saved Cars</span>
     <div class="car_detail">
          <div class="recherche1">
            <div class="head_2 f_left">Recherche </div>
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
                    <form action="<?php echo DEFAULT_URL?>/search-result" method="post" onsubmit="return formcheck();">

            <div class="f_left">
              <table width="100%" border="0">
                <tr>
                  <td ><div class="recherche_select_bg">
                     <select class="styled1" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','year','')">
                      <option value="" selected="selected">Make</option>
                    <?php while($mnafrow = mysql_fetch_object($manf)) { ?>
                    <option value="<?php echo $mnafrow->value_id; ?>"><?php echo $mnafrow->value; ?></option>
					<?php } ?>
                 </select>
                                          
                    </div></td>
                  <td ><div class="recherche_select_bg" id="year">
                      <select class="styled1" name="madeYear" onchange="ajaxcall(this.value,'madeYear','model')" disabled="disabled">
                      <option value="" selected="selected">Year</option>
                               </select>
                    </div></td>
                  <td><div class="recherche_select_bg" id="model" >
                      <select class="styled1" name="model" disabled="disabled">
                      <option value="" selected="selected">Model</option>
                    <?php while($mnafrow = mysql_fetch_object($manf)) { ?>
                    <option value=""><?php echo $mnafrow->value; ?></option>
					<?php } ?>
                 </select>
                    </div></td>
                  <td><div class="recherche_select_bg">
                      <select id="newPrice" name="price" class="styled1">
			  <option value="">Price</option><option value="1000">$1,000</option><option value="2000">$2,000</option><option value="3000">$3,000</option><option value="4000">$4,000</option><option value="5000">$5,000</option><option value="6000">$6,000</option><option value="7000">$7,000</option><option value="8000">$8,000</option><option value="9000">$9,000</option><option value="10000">$10,000</option><option value="11000">$11,000</option><option value="12000">$12,000</option><option value="13000">$13,000</option><option value="14000">$14,000</option><option value="15000">$15,000</option><option value="16000">$16,000</option><option value="17000">$17,000</option><option value="18000">$18,000</option><option value="19000">$19,000</option><option value="20000">$20,000</option><option value="21000">$21,000</option><option value="22000">$22,000</option><option value="23000">$23,000</option><option value="24000">$24,000</option><option value="25000">$25,000</option><option value="30000">$30,000</option><option value="35000">$35,000</option><option value="40000">$40,000</option><option value="45000">$45,000</option><option value="50000">$50,000</option><option value="55000">$55,000</option><option value="60000">$60,000</option><option value="65000">$65,000</option><option value="70000">$70,000</option><option value="75000">$75,000</option><option value="80000">$80,000</option><option value="85000">$85,000</option><option value="90000">$90,000</option><option value="95000">$95,000</option><option value="100000">$100,000</option>
			  </select>
                    </div></td>
                  <td>
                  <input type="hidden" name="submit" value="sub_home" />
                  <input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" /></td>
                </tr>
              </table>
            </div>
            </form>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
     <div class="middle_two_mid_announces">

            
            <div class="clear"></div>
            <span class="annonces_bold"><?php echo $count_all_cars;?> cars correspondent</span>
         <div class="voitures"> 
         <?php if($count_all_cars >0) { ?>
         
          <div class="clear"></div> 
			<div class="sort_by">
              <ul>
                <li>Photos</li>
                <li class="discription1">Discription</li>
                <li class=" mileage">Mileage</li>
                <li class="price1">Price</li>
              </ul>
            </div>
			
         <?php  foreach($_SESSION['unique_id']['save'] as $car)
{ 
				 
				$temp = $common->getCarWithAttrList($car ,array("fullName","images","price","mileage","manufacturer","features")); 
			if($temp[$car]["images"] != "") {
			 $imgpath = $commons->getImageUrl($temp[$car]["images"]);
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}?>   
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img">
                <a href="<?php echo DEFAULT_URL?>/carv<?=$car?>">
                <img alt="Honda" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=87&newHeight=58">
                </a>
                <a href="<?php echo DEFAULT_URL?>/car/<?=$car?>">
                <img width="16" height="16" alt="Photo" src="<?php echo DEFAULT_URL ?>/images/photo_img.png">Photos</a></div>
                <div class="car_name"> <span class="company_name"><a href="<?php echo DEFAULT_URL?>/car/<?=$car?>"><?php echo $temp[$car]['fullName'] ;?></a></span> <span class="year_loaded"><?php echo $common->getFeatureForListing($temp[$car]['features'],3) ?> </span> <span class="run_km"> <span class="email"><a class="example5" href="inquiry_form.php?car_id=<?=$car?>">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile"><?php echo number_format($temp[$car]['mileage'],2); ;?> mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">$<?php echo number_format($temp[$car]['price'],2) ;?></span> </div>
                  
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
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
              </div>
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
           
           

