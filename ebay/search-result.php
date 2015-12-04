<?php
include_once("conf/config.inc.php");
if(isset($_POST) && isset($_POST["submit_inq"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"address"=>$_POST['address'],"type"=>0);
	$common_obj->save("contact",$arr);	
	
	$to='4006@dothejob.org';
			// Your subject
			$subject='Inquiry About Car';
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
			$message = 'The person that contacted you is  '.$_POST['name']
	        .'<br/>	E-mail: '.$_POST['email'].'<br/>
			Phone Number: '.$_POST['phone'].'<br/>
			Address: '.$_POST['address'].'<br/>
			Message: '.$_POST['message'].'<br/>';

$sentmail = mail( SITE_ADMIN_EMAIL, $subject, $message, $headers );
}
?>


  <?php include(LIST_ROOT."/includes/views/header.php"); ?>
  <div class="main_middle">
    <div class="middle">
      <div class="middle_two">
        <div class="middle_two_mid_announces"> <span class="annonces_bold" >542 annonces correspondent</span>
          <div class="voitures">
            <div class="show_all_results"> <span class="car_inner">Show: All Results <span>|</span> <a href="#">Grouped By Dealer</a> (542 Vehicles)</span> <span class="price_lowest">
              <form action="" method="get">
                 <label>Sort by:</label>

                <select name="">
                  <option>Price: Lowest</option>
                </select>
              </form>
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
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="all_result_area">
              <div class="inner">
                <div class="car_img"><img src="images/honda.png" alt="Honda" width="87" /> <a href="#"><img src="images/photo_img.png" width="16" height="16" alt="Photo" />Photos</a></div>
                <div class="car_name"> <span class="company_name">1994 Chevrolet Camaro Base</span> <span class="year_loaded">Dark Green Gray Metallic, 2 door, Coupe, Automatic, 3.4L V6 12V MPFI OHV, </span> <span class="run_km"> <span class="phone_num">0176633216</span> <span class="email"><a class="example5" href="inquiry_form.php?car_id=3212">Email Now</a></span> </span> </div>
                <div class="fin_de_la_vente"> <span class="mile">176,943 mi.</span> </div>
                <div class="ajouter">
                  <div class="prix_de_vente"> <span class="price">34 173€</span> </div>
                  <span class="checkbox">
                  <input name="" type="checkbox" value="" />
                  </span> <br />
                  <div class="clear"></div>
                  <span class="read_btn">Consulter cette annonce</span> </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="allresults_footer">
            <div class="show_all_results"> <span class="car_inner">Show: All Results <span>|</span> <a href="#">Grouped By Dealer</a> (542 Vehicles)</span></div>
          </div>
        </div>
         <?php  include(LIST_ROOT."/includes/views/sidebar.php"); ?>
      </div>
     
        <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
    </div>
  </div>
 
  <?php  include(LIST_ROOT."/includes/views/footer.php"); ?>
</div>
</body>
<script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js" type="text/javascript"></script> 
<script>
	$(document).ready(function(){
		$(".example5").colorbox();
	});
</script>
</html>
