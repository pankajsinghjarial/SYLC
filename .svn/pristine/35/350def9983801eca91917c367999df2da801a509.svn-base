<html>
<body  marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>
<link rel="stylesheet" type="text/css" href="themes/bubble_box/chatbubble.css"   />	

<div style="background: #FFFFFF url('themes/bubble_box/chatbubble.jpg'); width:585px; height:450px; float:left;">

  <DIV style="background: #FFFFFF url('<?php echo $topbackground; ?>'); width:540; height:<?php echo $topframeheight; ?>px; top:20px; left:20px; position:relative;">
  	<?php if ($CSLH_Config['showoperator']=="Y"){ ?>
  <DIV style="width:90px; height:90px;  position:relative;    float:left;">
  <table><tr><td valign=bottom height=90><img src=<?php echo $urlforoperator; ?> height=90 border=0>    			   
   </td></tr></table>
  </DIV>
    <?php } ?>
  			  	
  			  	
  <DIV style="float:right; width:300px; height:90px; text-align:right;  "><?php echo $cslhdue; ?></DIV>    

  </DIV>    

	<div style="margin: 0; padding: 0; clear: both;"></div>
	
 
		<DIV style="background: #FFFFFF; width:505px; height:200px; top:30px; left:40px; position:relative;">
	    <iframe height="200" width="505" frameborder=0 src="<?php echo $urlforchat; ?>" name="chatwindow" scrolling="auto" border="0" marginheight="0" marginwidth="0" NORESIZE=NORESIZE></iframe>
    </DIV>
 
 
	
	<div style="margin: 0; padding: 0; clear: both;"></div>
  
	<DIV style="background: #FFFFFF; width:500px; height:75px; float:left; top:45px; left:40px; position:relative;">	 		


	<table width=500 cellpadding=0 cellspacing=0 border=0 background=images/blank.gif>
    <tr><td valign=top>
    	 <FORM action="javascript:nothingtodo()"  name=chatter METHOD=POST name=chatter>
       <table cellspacing=0 cellpadding=0 border=0><tr>
        <td><b><?php echo $lang['ask']; ?></b></td>
        <td><textarea cols=35 rows=2 name=comment ONKEYDOWN="return microsoftKeyPress()"></textarea></td>
         <td><table width=75 cellspacing=0 cellpadding=0 border=0><tr>
<?php 
 if($smiles!="N"){  
   if ($UNTRUSTED['convertsmile'] == "ON"){ 
   	print "<td><a href=javascript:showsmile()><img src=images/icon_smile.gif border=0>&nbsp;".$lang['view']."</a></td></tr><tr><td><font color=009900><b>".$lang['ON']."</b></font> / <a href=livehelp.php?convertsmile=OFF&department=$department>".$lang['OFF']."</a></td></tr></table></td>";
   } else { 
   	print "<td><img src=images/icon_nosmile.gif border=0>&nbsp;<s>".$lang['view']."</s></td></tr><tr><td><a href=livehelp.php?department=$department>".$lang['ON'] ."</a> / <font color=990000><b>".$lang['OFF']."</b></font></td></tr></table></td>";  }
  } 
   
 ?>
<td valign=top valign=bottom width=76 STYLE="top:10px; border:0px;"><img src=images/blank.gif width=70 height=10 border=0><br><a class="button" href="javascript:nothingtodo()" onclick="safeSubmit()" STYLE="border:0px;"><span STYLE="border:0px;" ><?php echo $lang['SAY']; ?></span></a></td>
<td valign=top width=75> &nbsp; </td>
<td valign=top valign=bottom width=76 STYLE="top:10px; border:0px;"><img src=images/blank.gif width=70 height=10 border=0><br><a class="button" href="javascript:nothingtodo()" onclick="exitchat()" STYLE="border:0px;"><span STYLE="border:0px;" ><?php echo $lang['exit']; ?></span></a></td>
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
  
			<DIV style="width:505px; height:35px; top:20px; left:40px; position:relative;">
  <div id="navigation" style="float:right;">
		<div class="container">			
    <?php echo $td_list; ?>
   </div>
 </div>
</div>

</body>
</html>