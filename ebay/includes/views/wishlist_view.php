<div class="main_middle">
	<div class="middle">				
		<div class="middle_two">
			<div class="middle_two_mid_announces">
			<div style="min-height: 25px;" class="car">
				<span class="head_3">Ma sélection</span>
				<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){?> <span class="wishlist_cardelete">Deleted Successfully.</span><?php }?>
			</div>
			<?php if(isset($_SESSION['User']) && $_SESSION['User']['id']!=""){?>
				<div class="voitures voitures02">
					<?php if($num>0){?>
					<?php while($data = mysql_fetch_object($list)){?>					
					<div class="all_result_area">
						<div class="inner" style="height: 70px;">
							<div class="car_img">
							<?php if($data->car_type=='local'){?>
								<a href="<?php echo DEFAULT_URL; ?>/car/<?php echo $data->car_id;?>"> <img alt="<?php echo $data->car_name;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $data->car_img; ?>&newWidth=87&newHeight=58"></a>
							<?php }else{?>
								<a href="<?php echo DEFAULT_URL; ?>/ebay/<?php echo $data->car_id;?>"> <img alt="<?php echo $data->car_name;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $data->car_img; ?>&newWidth=87&newHeight=58"></a>
							<?php }?>
							</div>
							<div class="car_name">
							<?php if($data->car_type=='local'){?>
								<span class="company_name"><a href="<?php echo DEFAULT_URL?>/car/<?php echo $data->car_id;?>"><?php echo $data->car_name;?></a></span>
							<?php }else{?>
								<span class="company_name"><a href="<?php echo DEFAULT_URL?>/ebay/<?php echo $data->car_id;?>"><?php echo $data->car_name;?></a></span>
							<?php }?>								
								<a href="delete_selection/<?php echo $data->car_id;?>" class="example5"><span class="read_btn">supprimer de mes favoris</span> </a>
							</div>							
							<div class="ajouter">
								<div class="prix_de_vente">									
									<span class="price price_usd">$ <?php echo number_format($data->car_price, 2);?><span class="usd">USD</span>
									</span> <span class="price price_euro"><a style="color: #EC310C; cursor: pointer;"><?php echo $common->CurrencyConverter($data->car_price);?> &euro; </a> </span>
								</div>
							</div>							
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<?php }?>
					<?php }else{?>
						<div class="selection_txt">No records found</div>
					<?php }?>
				</div>
			<?php }else{?>
			<div class="voitures voitures02">
				<div style="height: 70px;" class="inner">
					<div class="selection_txt">Retrouvez ici toutes les voitures que vous avez ajoutés à votre sélection.</div>
				</div>
			</div>
			<?php }?>	
			</div>
			<?php include(LIST_ROOT."/includes/views/account_sidebar.php"); ?>
		</div>

		
	</div>
</div>


