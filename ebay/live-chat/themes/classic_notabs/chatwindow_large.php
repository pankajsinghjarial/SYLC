<!DOCTYPE html>
<html>
<body  marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=<?php echo $botbackcolor; ?> background="<?php echo $botbackground; ?>">

<link rel="stylesheet" type="text/css" href="themes/<?php echo $theme; ?>/chatbubble.css"   />	


<DIV style="background: #FFFFFF url('<?php echo $topbackground; ?>'); width:100%; height:<?php echo $topframeheight; ?>px; top:0px; left:0px; position:relative;">
  	


  <DIV style="float:right; width:300px; height:<?php echo $topframeheight; ?>px; text-align:right;  "><?php echo $cslhdue; ?></DIV>    


</DIV>    
 

 	<?php if(!(empty($td_list))){ ?>
 		<DIV style="width:100%; height:28px; background: #FFFFFF url('themes/<?php echo $theme; ?>/topbar.png'); position:relative;">
		<DIV style="left:20px; position:relative;">
    <?php echo $td_list; ?>
     </div>
    </div>
<?php } ?>



  <DIV style="background: <?php echo $midbackcolor; ?> url('themes/classic/topbubble.gif') no-repeat; width:100%; height:6px; top:0px; left:0px; position:relative;"></DIV>
  
<DIV style="background: <?php echo $midbackcolor; ?>; width:99%; height:315px; top:0px; left:4px; position:relative;">
			<?php if(!(empty($htmlcode))){ echo $htmlcode; } else { ?>
	    <iframe height="315" width="99%" frameborder=0 src="<?php echo $urlforchat; ?>" name="chatwindow" scrolling="auto" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE></iframe>
	  <?php } ?>
</DIV> 
	
	<div style="margin: 0; padding: 0; clear: both;"></div>
 <DIV style="background: <?php echo $botbackcolor; ?> url('themes/classic/botbubble.gif'); width:100%; height:17px; top:0px; left:0px; position:relative;"></DIV>
 
 

</body>
</html>