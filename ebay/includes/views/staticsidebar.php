 <div class="middle_two_right_announces">
          <?php /*?><div class="nos_partenaires_announces">
            <div class="nos_partenaires_announces_top2">
            <?php $feature = $commons->CustomQuery("Select car_id from car_int where attribute_id = 23 and value = 70 order by RAND() limit 1");
			$carid = mysql_fetch_object($feature);
			$car_id = $carid->car_id;
			//$car_id = 2254;
			 $temp = $commons->getCarWithAttrList($car_id ,array("bodyStyle","dealerName","fullName","images","price","mileage")); 
			 ?>
            <div class="forborder">  <div class="head_3"><?php echo  $temp[$car_id]["fullName"] ?> </div>
              <div class="edit"><a href="<?php echo DEFAULT_URL ?>/carview.php?carid=<?=$car_id?>">View</a></div></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="chevrolet_corvette">
            <?php
			if($temp[$car_id]["images"] != "") {
			 $imgpath = $commons->getImageUrl($temp[$car_id]["images"]);
			} else
			{
			  $imgpath = LIST_ROOT."/images/default.jpg";
	
			}?>
           <img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpath; ?>&newWidth=270&newHeight=186" alt="<?php echo $f_read->title;?>"/>
            </div>
            <div class="chevrolet_txt"><span class="span1">  <strong>Vendu par:</strong> <?php echo  $temp[$car_id]["dealerName"] ?><br /></span>
             <span class="f_left span1">
              <strong>Type:</strong> <?php echo  $temp[$car_id]["bodyStyle"] ?> </span> <span class="f_right span2"> <?php echo  number_format($temp[$car_id]["mileage"],2) ?> Mi <br />
              $<?php echo  number_format($temp[$car_id]["price"],2) ?> </span>
              <div class="clear"></div>
            </div>
          </div><?php */?>
       <div id="craftysyntax_1"><script type="text/javascript" src="/~httpsylc/live-chat/livehelp_js.php?eo=0&amp;relative=Y&amp;department=1&amp;serversession=1&amp;pingtimes=10&amp;dynamic=Y&amp;creditline=L"></script></div>
          <div class="add_area">
	    <?php	$slide = $commons->CustomQuery("Select * from banner where publish = 1 and type = 5 order by rand()");
while($image = mysql_fetch_object($slide))
{
 ?>
  <?php if($image->webiste != "") { ?><a href=<?php echo $image->webiste; ?>"" target="_blank"> <?php } ?>
 <img src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>" alt="Banner" />
 <?php if($image->webiste != "") { ?></a> <?php } ?>
<?php } ?>
 </div>
        <div class="clear"></div>
 