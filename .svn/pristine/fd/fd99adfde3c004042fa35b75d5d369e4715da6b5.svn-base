<?php $url = explode('/',$_SERVER['REQUEST_URI']);?>

<?php //$_SESSION['gold_admin_access'];  //to check user access?>

<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/colorbox.css" />
<script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.colorbox.js"></script>
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
    $('#example_sort_status').dataTable( {
    	"aaSorting": [[ 1, "desc" ]],
       "bPaginate": false,
        "bFilter": false
        
    } );
    

    
} );
</script>



<div id="tabes">

            <ul>
            
           <?php $allaceess = $_SESSION['gold_admin_access'];
                 $access = explode(',',$allaceess);
                // print_r($access); die;
           ?>
 <li><a href="<?php echo DEFAULT_ADMIN_URL?>/dashboard.php" <?php if(in_array('dashboard.php',$url)) { ?>class="active" <?php }?>>Dashboard </a></li>
 <?php if (in_array("gallerymanager",$access)){?>          
 <li><a href="<?php echo DEFAULT_ADMIN_URL?>/gallery" <?php if(in_array('gallery',$url)) { ?>class="active" <?php }?> >Gallery Manager</a></li>
 <?php }?>
 
<?php if (in_array("upsellmanager", $access)) {?>
              <li><a href="<?php echo DEFAULT_ADMIN_URL?>/upsell" <?php if(in_array('upsell',$url)) { ?>class="active" <?php }?> >Upsell Manager</a></li>
      <?php } ?>
      
            <?php if (in_array("feesmanager", $access)) {?>  
               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/fees" <?php if(in_array('fees',$url)) { ?>class="active" <?php }?> >Fees Manager</a></li>
               <?php } ?>
               
               <?php if (in_array("statusmanager", $access)) {?>
              <li><a href="<?php echo DEFAULT_ADMIN_URL?>/status" <?php if(in_array('status',$url)) { ?>class="active" <?php }?> >Status Manager</a></li>
<?php } ?>

<?php if (in_array("clientinformation", $access)) {?>
               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/user_info.php" <?php if(in_array('user_info.php',$url)) { ?>class="active" <?php }?> >Information Of Clients</a></li>
          <?php } ?>
          
          <?php if (in_array("pdfaddress", $access)) {?>     
               <li><a href="<?php echo DEFAULT_ADMIN_URL?>/address_pdf.php" <?php if(in_array('address_pdf.php',$url)) { ?>class="active" <?php }?> >PDF Address</a></li>
               <?php } ?>
               
<?php /*?>
			   <li><a href="<?php echo DEFAULT_ADMIN_URL?>/change_password.php" <?php if(in_array('change_password.php',$url)) { ?>class="active" <?php }?>>Mot de passe</a></li><?php */?>
	
		   
 <?php if (in_array("passwordtab", $access)) {?><li><a href="<?php echo '#inline_content';?>" class="inline">Password</a></li><?php } ?>	
	   	 
            </ul>
<a class="nav_link_top" href="<?php echo DEFAULT_ADMIN_URL?>/logout.php">Logout</a>
            
         </div>
         
         
           <div style="display:none">
 <div class="account_box no_bdr" id="inline_content">
    <div class="pop_titles">Please choose from the following three options</div>
   
    
               <ul>
                <li><a href="<?php echo DEFAULT_ADMIN_URL?>/change_password.php" class="my_links_update">Changing the admin account</a></li>
                <li><a href="<?php echo '#inline_content_new_user';?>" class="inline my_links_update">To create a new user account</a></li>
                <li><a href="<?php echo DEFAULT_ADMIN_URL?>/admin_user_listing.php" class="my_links_update">Make a change to an existing account</a></li>
              
          
               </ul>
    
    
   
    </div>
</div>

<div style="display:none">
 <div class="account_box no_bdr" id="inline_content_new_user">
    <div class="pop_titles">Please enter the information below to create a New Admin user</div>
   
    
               <ul>
               
                <?php include_once(LIST_ROOT_ADMIN."/new_admin_user.php");?>
              
          
               </ul>
    
    
   
    </div>
</div>

 <script type="text/javascript">

 $(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".group2").colorbox({rel:'group2', transition:"fade"});
		$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
		$(".group4").colorbox({rel:'group4', slideshow:true});
		$(".ajax").colorbox();
		$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".iframe").colorbox({iframe:true, width:"50%", height:"70%"});
		$(".inline").colorbox({inline:true, width:"50%"});
		$(".inline02").colorbox({inline:true, width:"80%"});
		$(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
	

 </script> 
