
		<?php 
		//$obj_search = new search();
		//$dataArr = array("popular"=>74);
		//$new_viewd = $obj_search->attributeSearch($dataArr, "fullName", "ASC"," LIMIT 0,8");
		//$new_viewd = array_unique($new_viewd);

		$new = $common->CustomQuery('Select car_id from car order by car_id DESC limit 0,9');
		while($newcar = mysql_fetch_object($new))
			//foreach($new_viewd as $newcar)
		{
			$newarray = $common->getCarWithAttrList($newcar->car_id ,array("images","fullName"));
			$imgpatha = $commons->getImageUrl($newarray[$newcar->car_id]["images"]);
			/*$newarray = $common->getCarWithAttrList($newcar ,array("images","fullName"));
			 $imgpatha = $commons->getImageUrl($newarray[$newcar]["images"]);*/

		 ?>
		<li><span class="img_area"><a
				href="<?php echo DEFAULT_URL ?>/car/<?=$newcar->car_id;?>"><img
					src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpatha; ?>&newWidth=87&newHeight=58"
					alt="<?php echo $newarray[$newcar->car_id]["fullName"] ?>" />
			</a>
		</span> <span class="img_txt"><a
				href="<?php echo DEFAULT_URL ?>/car/<?=$newcar->car_id;?>"><?php echo $newarray[$newcar->car_id]["fullName"] ?>
			</a>
		</span></li>

		<?php /*?><li> <span class="img_area"><a href="<?php echo DEFAULT_URL ?>/car/<?=$newcar;?>"><img src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $imgpatha; ?>&newWidth=87&newHeight=58" alt="fgf" /></a></span> <span class="img_txt"><a href="<?php echo DEFAULT_URL ?>/car/<?=$newcar;?>"><?php echo $newarray[$newcar]["fullName"] ?></a></span> </li><?php */?>

		<?php } ?>

