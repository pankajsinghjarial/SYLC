<?php $url = explode('/',$_SERVER['REQUEST_URI']);?>



<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL?>/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example_sort').dataTable( {
        "aaSorting": [[ 7, "desc" ]],
        "bPaginate": false,
        "bFilter": false
    } );
    $('#example_sort_gallery').dataTable( {
        "aaSorting": [[ 3, "desc" ]],
        "bPaginate": false,
        "bFilter": false
        
    } );
    
} );
</script>
<div id="tabes">

            <ul>
 <li><a href="<?php echo DEFAULT_ADMIN_URL?>/gallery" <?php if(in_array('gallery',$url)) { ?>class="active" <?php }?>>Gallery Manager</a></li>
              <li><a href="<?php echo DEFAULT_ADMIN_URL?>/upsell" <?php if(in_array('upsell',$url)) { ?>class="active" <?php }?>>Upsell Manager</a></li>
               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/fees" <?php if(in_array('fees',$url)) { ?>class="active" <?php }?>>Fees Manager</a></li>
              <li><a href="<?php echo DEFAULT_ADMIN_URL?>/status" <?php if(in_array('status',$url)) { ?>class="active" <?php }?>>Status Manager</a></li>

               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/user_info.php" <?php if(in_array('user_info.php',$url)) { ?>class="active" <?php }?>>Information Des Clients</a></li>
               
               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/address_pdf.php" <?php if(in_array('address_pdf.php',$url)) { ?>class="active" <?php }?>>PDF Address</a></li>

			   <li><a href="<?php echo DEFAULT_ADMIN_URL?>/change_password.php" <?php if(in_array('change_password.php',$url)) { ?>class="active" <?php }?>>Changer mot de passe</a></li>

			  
            </ul>
<a class="nav_link_top" href="<?php echo DEFAULT_ADMIN_URL?>/logout.php">D&eacute;connexion</a>
            
         </div>
