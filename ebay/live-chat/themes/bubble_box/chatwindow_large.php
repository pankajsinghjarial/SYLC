<!DOCTYPE html>
<html>
<body  marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>

<link rel="stylesheet" type="text/css" href="themes/bubble_box/chatbubble.css"   />	

<div style="background: #FFFFFF url('themes/bubble_box/chatbubble_large.jpg'); width:585px; height:450px; float:left;">

  <DIV style="background: #FFFFFF url('<?php echo $topbackground; ?>'); width:540; height:<?php echo $topframeheight; ?>px; top:20px; left:20px; position:relative;">
  	
  	  <?php if ($CSLH_Config['showoperator']=="Y"){ ?>
  <DIV style="background: #FFFFFF; width:85px; height:<?php echo $topframeheight; ?>px;  position:relative;    float:left;">
  <table><tr><td valign=bottom height=85><img src=<?php echo $urlforoperator; ?> height=85 border=0>    			   
   </td></tr></table>
  </DIV>
  <?php } ?>			

  <DIV style="float:right; width:300px; height:90px; text-align:right;  "><?php echo $cslhdue; ?></DIV>    

  </DIV>    

	<div style="margin: 0; padding: 0; clear: both;"></div>
	
 
		<DIV style="background: #FFFFFF; width:505px; height:260px; top:30px; left:40px; position:relative;">
			<?php if(!(empty($htmlcode))){ echo $htmlcode; } else { ?>
	    <iframe height="260" width="505" frameborder=0 src="<?php echo $urlforchat; ?>" name="chatwindow" scrolling="auto" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE></iframe>
	  <?php } ?>
    </DIV>
 
 
	
	<div style="margin: 0; padding: 0; clear: both;"></div>
	
			<DIV style="width:505px; height:35px; top:40px; left:40px; position:relative;">
  <div id="navigation">
		<div class="container">			
    <?php echo $td_list; ?>
   </div>
 </div>
</div>

</body>
</html>