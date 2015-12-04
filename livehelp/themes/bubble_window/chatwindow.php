<html>
<body  marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $theme;?>/chatbubble.css"   />	

 <DIV style="background: #FFFFFF url('<?php echo $topbackground; ?>'); width:100%; height:<?php echo $topframeheight; ?>px; top:0px; left:0px; position:relative;">
 <DIV style="float:right; width:550px; height:50px; text-align:right;  "><?php echo $cslhdue; ?></DIV>    

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
    			   <img src=<?php echo $urlforoperator; ?> width=75 border=0>    			
    			     <?php } ?>    
   </td></tr></table>
  </DIV>

  	     	
  	     	
	<div style="background: #FFFFFF url('themes/bubble_window/chatbubble.jpg'); width:500px; height:300px; float:left;">
		<DIV style="background: #FFFFFF; width:480px; height:244px; top:10px; left:7px; position:relative;">
	    <iframe height="245" width="480" frameborder=0 src="<?php echo $urlforchat; ?>" name="chatwindow" scrolling="auto" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE></iframe>
    </DIV>
	</DIV>
 

	
	<div style="margin: 0; padding: 0; clear: both;"></div>
  
	<DIV style="background: #FFFFFF; width:580px; height:75px; float:left; left:20px; top:-5px; position:relative;">	 		
	
	
	<table width=580 cellpadding=0 cellspacing=0 border=0 background=images/blank.gif>
    <tr><td valign=top>
    	 <FORM action="javascript:nothingtodo()"  name=chatter METHOD=POST name=chatter>
       <table cellspacing=0 cellpadding=0 border=0><tr>
        <td><b><?php echo $lang['ask']; ?></b></td>
        <td><textarea cols=40 rows=2 name=comment ONKEYDOWN="return microsoftKeyPress()"></textarea></td>
         <td><table width=75 cellspacing=0 cellpadding=0 border=0><tr>
<?php 
 if($smiles!="N"){  
   if ($UNTRUSTED['convertsmile'] == "ON"){ 
   	print "<td><a href=javascript:showsmile()><img src=images/icon_smile.gif border=0>&nbsp;".$lang['view']."</a></td></tr><tr><td><font color=009900><b>".$lang['ON']."</b></font> / <a href=livehelp.php?convertsmile=OFF&department=$department>".$lang['OFF']."</a></td></tr></table></td>";
   } else { 
   	print "<td><img src=images/icon_nosmile.gif border=0>&nbsp;<s>".$lang['view']."</s></td></tr><tr><td><a href=livehelp.php?department=$department>".$lang['ON'] ."</a> / <font color=990000><b>".$lang['OFF']."</b></font></td></tr></table></td>";  }
  } 
   
 ?>
<td valign=top valign=bottom width=70 STYLE="top:10px; border:0px;"><img src=images/blank.gif width=65 height=10 border=0><br><a class="button" href="javascript:nothingtodo()" onclick="safeSubmit()" STYLE="border:0px;"><span STYLE="border:0px;" ><?php echo $lang['SAY']; ?></span></a></td>
<td valign=top width=75> &nbsp; </td>
<td valign=top valign=bottom width=70 STYLE="top:10px; border:0px;"><img src=images/blank.gif width=65 height=10 border=0><br><a class="button" href="javascript:nothingtodo()" onclick="exitchat()" STYLE="border:0px;"><span STYLE="border:0px;" ><?php echo $lang['exit']; ?></span></a></td>
<input type=hidden name=channel value=<?php echo $channel; ?> >
<input type=hidden name=department value=<?php echo $department; ?> >
<input type=hidden name=myid value=<?php echo $myid; ?> >
<input type=hidden name=typing value="no">
<?php 
if ($UNTRUSTED['convertsmile'] == "ON")
  	print "<input type=hidden name=convertsmile value=ON>";
   else
    print "<input type=hidden name=convertsmile value=OFF>";
?>	
</td></tr></table>
</FORM>
</td></tr></table> 
	
	
	</DIV>
 
   

</body>
</html>