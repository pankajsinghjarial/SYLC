
<?php
/**
 * Template Name: neuf
 
 */
get_header(); ?>

<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
      <div class="big_title"><?php the_title(); ?> </div>
      <div class="wrapper_indent">
         <?php get_sidebar(left);?>
        <div class="containt_indent">
        

              <?php while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
	 <?php endwhile;?>
           
              <div class="contact_outer">
               <?php  if (isset($_GET["respons"])) { ?>
           
           <div class="thanks"> envoyez vos coordonnées avec succès, Merci!  </div>
           
           <?php  } ?>
<FORM NAME="listmenu0" action="http://www.sylc-export.com/neuf-processing.php" enctype="multipart/form-data" method="post" onSubmit="return checkValidation222();"> 
          <div class="form_outer">
          
          <table  class="form_table">
           			
                    <tr>
                    <td class="form_td"><div class="form_text">Marque:</div></td>
                    <td><div class="input_outer_02">
                    <select name="firstlevel" id="firstlevel" >
            		</select>
            </div>
            </td>
                    </tr>
                     <tr>
                    <td class="form_td"><div class="form_text">Modele:</div></td>
                     <td><div class="input_outer_02">
                    <select name="secondlevel" id="secondlevel" >
            		</select>
            </div>
            </td>
                    </tr>
                    <tr>
                    <td class="form_td"><div class="form_text">Achat:</div></td>
                     <td><div class="input_outer_02">
                    <select name="thirdlevel" id="thirdlevel" >
            		</select>
            </div>
            </td>
                    </tr>
                    
                    <tr>
                    <td class="form_td"><div class="form_text">Contact:</div></td>
                    <td><div class="input_outer"><input name="contact" id="contact" type="text" class="input_01" value=""    /></div></td>
                    </tr>
                    <tr>
                    <td class="form_td"><div class="form_text">Telephone:</div></td>
                    <td><div class="input_outer"><input name="phone" id="phone" type="text" class="input_01" value="" maxlength="15"    /></div></td>
                    </tr>
                    <tr>
                    <td class="form_td"><div class="form_text">Email:</div></td>
                    <td><div class="input_outer"><input name="email" id="email" type="text" class="input_01" value=""    /></div></td>
                    </tr>
                     <tr>
                     <td><input class="checkbox" name="agree" id="agree" type="checkbox"></td>
                    <td><div class="form_text01">J'ai lu et j'accepte expréssement la 
                    <a href="http://www.sylc-export.com/politique-de-confidentialite/" target="_blank">politique de confidentialité.</a></div></td>
                    </tr>
                     <tr>
                     <td></td>
                    <td><input type="submit" name="submit" value="" class="submit_btn" onClick="goListGroup(document.listmenu0.firstlevel, document.listmenu0.secondlevel, document.listmenu0.thirdlevel)">
  <input type="reset" value="" onClick="resetListGroup('chainedmenu')" class="reset_btn">
  <!--<input name="submit" type="submit" class="submit_btn" value="" /><input name="submit" type="submit" class="reset_btn" value="" />--></td>
                    </tr>
                    
           </table>
          </div>
          </FORM>
          </div>
               
          	
       </div>
        
 <?php get_sidebar(right); ?>
	</div>
    </div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>   
<?php get_footer(); ?>

