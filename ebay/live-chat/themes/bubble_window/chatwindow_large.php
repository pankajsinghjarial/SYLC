<!DOCTYPE html>
<html>
<body  marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>

<link rel="stylesheet" type="text/css" href="themes/<?php echo $theme;?>/chatbubble.css"   />	

 <DIV style="background: #FFFFFF url('<?php echo $topbackground; ?>'); width:100%; height:<?php echo $topframeheight; ?>px; top:0px; left:0px; position:relative;">
 <DIV style="float:right; width:500px; height:50px; text-align:right;  "><?php echo $cslhdue; ?></DIV>    

</DIV>    

 	<?php if(!(empty($td_list))){ ?>
 		<DIV style="width:100%; height:28px; background: #FFFFFF url('themes/<?php echo $theme; ?>/topbar.png'); position:relative;">
		<DIV style="left:20px; position:relative;">
    <?php echo $td_list; ?>
     </div>
    </div>
<?php } ?>


	<div style="margin: 0; padding: 0; clear: both;"></div>
	
 
 	<DIV style="background: #FFFFFF; width:75px; height:235px;  position:relative;  bottom: 0px;  margins: auto; text-align:center; text-align: -moz-center;  float:left;">
  <table><tr><td valign=bottom height=280>
  	<?php if ($CSLH_Config['showoperator']=="Y"){ ?> 
    			 <img src=<?php echo $urlforoperator; ?> width=75 border=0>    		<? } ?>	   
   </td></tr></table>
  </DIV>
  	    
	<div style="background: #FFFFFF url('themes/bubble_window/chatbubble_large.jpg'); width:500; height:370px; float:left;">
		<DIV style="background: <?php echo $midbackcolor; ?>; width:480px; height:314px; top:10px; left:7px; position:relative;">
			<?php if(!(empty($htmlcode))){ print $htmlcode; } else { ?>
	    <iframe height="315" width="480" frameborder=0 src="<?php echo $urlforchat; ?>" name="chatwindow" scrolling="auto" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE></iframe>
	  <?php }?>
    </DIV>
	</DIV>
 

	
	<div style="margin: 0; padding: 0; clear: both;"></div>
  


</body>
</html>