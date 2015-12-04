
 <div class="middle_two_right_announces">
          <div class="nos_partenaires_announces">
            <div class="nos_partenaires_announces_top">

              <div class="head_2">Nos partenaires</div>
            </div>
                         <div class="bank_of_america">
	    <?php	$slide = $commons->CustomQuery("Select * from banner where publish = 1 and type = 6");
while($image = mysql_fetch_object($slide))
{
 ?>

 <img src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>" alt="Banner" />

<?php } ?>
</div>
          </div>
          <div class="nos_partenaires_announces">
            <div class="head_1">nos stock </div>
            
        <?php $new = $common->CustomQuery('Select car_id from car order by car_id DESC limit 0,4');
		while($newcar = mysql_fetch_object($new))
		{
		$newarray = $common->getCarWithAttrList($newcar->car_id ,array("images","manufacturer","model","features")); 
				 $imgpatha = $commons->getImageUrl($newarray[$newcar->car_id]["images"]);

		 ?>
         <div class="nos_stock_area">
              <div class="nos_stock_img_bg"> <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpatha; ?>&newWidth=96&newHeight=96" alt="fgf" /></div>
              <div class="nos_stock_txt">
                <div class="head_4"><a href="<?php echo DEFAULT_URL ?>/car/<?=$newcar->car_id;?>"><?php echo $newarray[$newcar->car_id]["manufacturer"]." : ".$newarray[$newcar->car_id]["model"] ?></a></div>
              <?php echo $common->getFeatureForListing($newarray[$newcar->car_id]["features"],5) ?>
              </div>
              <div class="clear"></div>
            </div>


<?php } ?>
        

            <?php /*?><div class="expertise"> <a href="<?php echo DEFAULT_URL?>/<?php echo $common->getPageSlug('17'); ?>"><img width="279" height="54" alt="Expertise" src="<?php echo DEFAULT_URL?>/images/expertise_btn.png"></a></div><?php */?>
          </div>
        </div>
        <div class="clear"></div>