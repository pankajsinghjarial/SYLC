 <style type="text/css">
	.contact_website{
		visibility: hidden;
	}					
</style>
 
<?php if($_SESSION['success'] == 'ok'){ ?>
 <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
   <script type="text/javascript">
		$ = jQuery.noConflict();	
	</script>
	<script src="<?php echo DEFAULT_URL; ?>/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="<?php echo DEFAULT_URL; ?>/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$.msgBox({
					title:"Merci",
					content:"Nous avons ajout&eacute; votre demande avec succ&egrave;s",
					type:"info",
					timeOut:5000,
					opacity:0.6,
					autoClose:true
				});
			});
		})(jQuery); 
		</script>  
  <?php unset($_SESSION['success']);} ?>
  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <div class="bread-crumbs">
					<ul class="brb-ul">
						<li><a href="<?php echo DEFAULT_URL; ?>"><img
								src="/images/car-icon.png" alt=""> </a></li>
						<li><a href="<?php echo DEFAULT_URL; ?>/contacts">Contact</a></li>
					</ul>
				</div>
      <div class="middle_two_mid_announces"> <span class="annonces_bold" >Contactez-Nous</span><br/><br/>
     <?php /*?> <div><?php	$content = $commons->CustomQuery("Select * from pages where id = 17");
		 $content = mysql_fetch_object($content);
		 echo $content->desc;
		  ?></div><?php */?>
      <div>
      <div class="contact_address">
      <span class="annonces_txt" ><strong>American Car Centrale</strong><br/> <?php echo $toemail->office_address; ?></span>
      <span class="annonces_txt" > <span>Num&eacute;ro gratuit depuis la France vers Miami</span><br/>
      <span class="annonces_txt_phone" ><?php echo $toemail->phone1."<br/>".$toemail->phone2; ?></span></span>
      <span class="annonces_txt_email" ><a href="mailto:<?php echo $toemail->email; ?>"><?php echo $toemail->email; ?></a></span>
      </div>
      
      <div class="google_map">
      <iframe width="400" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=<?php echo urlencode($toemail->office_address); ?>+&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($toemail->office_address); ?>&amp;ll=26.018177,-80.159604&amp;spn=0.155193,0.308647&amp;t=m&amp;z=12&amp;output=embed"></iframe><br />
      <small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=+&amp;q=<?php echo urlencode($toemail->office_address); ?>+&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($toemail->office_address); ?>&amp;ll=26.018177,-80.159604&amp;spn=0.155193,0.308647&amp;t=m&amp;z=12" style="color:#0000FF;text-align:left">View Larger Map</a></small>
   	  </div>
</div>
<div class="clear"></div>
<div class="contact_form">
<span class="annonces_txt"><strong>Pour toutes questions ou commentaires, remplissez le formulaire ci-dessous:</strong></span>
<form action="" method="post" name="contactForm">
<div class="box_reg" style="float: left;width:670px;">
            <div class="box_regi-new">
             	<?php if(isset($_SESSION['msg'])){ ?>
              <div style="padding-bottom:10px;14px Arial,Helvetica,sans-serif; padding-left:15px;">
               
                  <?php
						echo $_SESSION['msg']; unset($_SESSION['msg']);           				
					?>
                  
               </div>
            <? } ?>
                       	<div class="main_regi">
                	<div class="regi_txt">Nom : <span class="red">*</span></div>
                <div class="regi_box">
                      <input name="fname" type="text" class="But2" id="textfield" <? if($send != 1){?> value="<?=$fname?>"  <? } ?>/>
                    </div>
                </div>
                
                <div class="main_regi">
                	<div class="regi_txt">Pr&eacute;nom : </div>
                    <div class="regi_box">
                      <input name="lname" type="text" class="But2" id="textfield" <? if($send != 1){?>value="<?=$lname?>" <? } ?>/>
                    </div>
                </div>
                
                <div class="main_regi">
                	<div class="regi_txt">T&eacute;l&eacute;phone : <span class="red">*</span></div>
                    <div class="regi_box">
                      <input name="phone" type="text" class="But2" id="textfield" <? if($send != 1){?>value="<?=$phone?>" <? } ?>/>
                    </div>
                </div>
                
                <div class="main_regi">
                	<div class="regi_txt">E-Mail <span class="red">*</span></div>
                    <div class="regi_box">
                      <input name="email" type="text" class="But2" id="textfield" <? if($send != 1){?>value="<?=$email?>" <? } ?> />
                    </div>
                </div>
                               
                <div class="main_regi01">
                	<div class="regi_txt">Message<span class="red">*</span></div>
                    <div class="regi_box01">
                      <textarea name="massage" cols="45" rows="5" class="But3" id="textarea"><? if($send != 1){?><?=$massage?> <? } ?></textarea>
                    </div>
              </div>
              <div style="width:450px; text-align:right; font-size:12px; padding-bottom:5px;"><span class="red">*Champs obligatoires</span></div>
            <div class="regi_btn_new">
            	<input name="website" type="text" class="But2 contact_website" id="website_fields" />
                <input type="hidden" name="submit_form" value="submitted"/>
                <input type="hidden" name="submitted" value="SEND" />
               <input type="image" class="input_remove_with" src="<?php echo DEFAULT_URL; ?>/images/form_envoyer.gif" /></a></div>
            </div>
          </div>
</form>

</div></div>
 <?php  include(LIST_ROOT."/includes/views/sidebar.php"); ?>
</div>
 <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
</div></div>