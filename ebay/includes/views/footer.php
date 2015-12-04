<?php $common = new common(); ?>
 <div class="clear"></div>
<div class="main_footer">
    <div class="footer">
      <div class="footer_top">
        <div class="auto">
          <div class="head_6">Accueil</div>
          <ul>
            <li><a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('58'); ?>">Qui Sommes-Nous?</a></li>
            <li><a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('53'); ?>">Présentation</a></li>
            <li><a href="<?php echo DEFAULT_URL;?>#recherche_id">Recherche</a></li>
            <li><a href="<?php echo DEFAULT_URL;?>#most_viewed_id">Véhicules Populaires</a></li>
          </ul>
        </div>
        <div class="logistic">
          <div class="logistic_inner">
            <a href="<?php echo DEFAULT_URL; ?>/announces"><div class="head_6">Les Annonces</div></a>
            <ul>
              <?php /*?><li><a href="<?php echo DEFAULT_URL; ?>/announces">Ajouter à ma sélection</a></li>
              <li><a href="<?php echo DEFAULT_URL; ?>/announces">Consultez cette annonce</a></li>
              <li><a href="<?php echo DEFAULT_URL; ?>/announces">Contactez un spécialiste</a></li><?php */?>
              <li><a href="<?php echo DEFAULT_URL; ?>/nosstock">Nos Stocks</a></li>
            </ul>
          </div>
          <div class="general">
          <a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('52'); ?>"><div class="head_6">Services</div></a>
            <ul>
              <li><a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('47'); ?>">Nos Garanties</a></li>
              <li><a href="<?php echo DEFAULT_URL?>/<?php echo $common->getPageSlug('48'); ?>">Logistiques</a></li>
              <li><a href="<?php echo DEFAULT_URL?>/<?php echo $common->getPageSlug('49'); ?>">Conseils</a></li>
              <li><a href="<?php echo DEFAULT_URL?>/<?php echo $common->getPageSlug('50'); ?>">Calculateur</a></li>
              <li><a href="<?php echo DEFAULT_URL?>/faq">FAQ</a></li>
            </ul>
          </div>
        </div>
        <div class="contact">
          <a href="<?php echo DEFAULT_URL; ?>/<?php echo $commons->getPageSlug('17'); ?>"><div class="head_6">Contact</div></a>
          <ul>
           <?php /*?> <li><a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('46'); ?>">Devis</a></li><?php */?>
             <li><a href="<?php echo DEFAULT_URL?>/<?php echo $common->getPageSlug('51'); ?>">Devis</a></li>
          </ul>
        </div>
        <div class="webaddrss">
          <div class="address"><a href="<?php echo DEFAULT_URL; ?>" target="_blank">www.sylc-export.com/</a></div>
          <a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('13'); ?>">Politique de Confidentialité</a>
          <?php $urls = $common->CustomQuery("Select * from admins where id =1"); 
		  $urlinfo = mysql_fetch_object($urls);
		  ?>
          <ul>
            <?php /*?><li><a href="<?php echo $urlinfo->twitter; ?>" target="_blank"><img src="<?php echo DEFAULT_URL ?>/images/twitter.png" alt="Twitter" /></a></li><?php */?>
            <li><a href="<?php echo $urlinfo->facebook; ?>" target="_blank"><img src="<?php echo DEFAULT_URL ?>/images/facebook.png" alt="Facebook" /></a></li>
            <li><a href="<?php echo $urlinfo->youtube; ?>" target="_blank"><img src="<?php echo DEFAULT_URL ?>/images/youtube.png" alt="You Tube" /></a></li>
            <?php /*?><li><a href="<?php echo $urlinfo->rss; ?>" target="_blank"><img src="<?php echo DEFAULT_URL ?>/images/rss.png" alt="RSS" /></a></li><?php */?>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
      <div class="footer_bottom"> Copyright © 2011. All Rights Reserved.<br />
        <a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('12'); ?>">Terms &amp; Conditions</a> <span>|</span> <a href="<?php echo DEFAULT_URL; ?>/privacy-policy">Privacy Policy</a> <span>|</span> <a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('44'); ?>">DMCA Policy</a> <span>|</span> <a href="<?php echo DEFAULT_URL; ?>/<?php echo $common->getPageSlug('45'); ?>">Product Label</a>
      
      <span>|</span> <a href="<?php echo DEFAULT_URL; ?>/sitemap">Site Map</a> </div>
    </div>
  </div>
  </div>
  </body>
  </html>