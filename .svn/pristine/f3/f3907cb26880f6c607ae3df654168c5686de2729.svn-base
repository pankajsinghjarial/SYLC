<div class="middle_two_right_announces">
	<?php if(isset($_SESSION['User']) && $_SESSION['User']['id']!=""){?>
	<div class="nos_partenaires_announces">
		<div class="head_1">
			<?php echo $_SESSION['User']['name'];?>
		</div>
		<div class="myaccount-section">
			<ul>
				<li><a href="<?php echo DEFAULT_URL."/wishlist"?>">Ma sélection</a>
				</li>
				<li><a href="<?php echo DEFAULT_URL."/editaccount"?>">Modifier mon
						profil</a>
				</li>
				<li><a href="<?php echo DEFAULT_URL."/logout"?>">Déconnexion</a>
				</li>
			</ul>
		</div>
	</div>
  <?php }else{?>
  <div class="nos_partenaires_announces">
  		<div class="head_1">Mon compte</div>
  		<div class="myaccount-section">
			<ul>
				<li><a href="<?php echo DEFAULT_URL."/loginaccount"?>">connexion à votre compte</a> </li>
				<li><a href="<?php echo DEFAULT_URL."/createaccount"?>">créer un compte</a></li>
			</ul>
		</div>
  </div>
  <?php } ?>
</div>
<div class="clear"></div>
