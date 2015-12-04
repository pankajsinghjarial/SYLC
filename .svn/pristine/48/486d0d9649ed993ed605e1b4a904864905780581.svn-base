<?php
require_once("admin_common.php");
?>
<SCRIPT type="text/javascript">
  function setit(hexcolor){ 
  	<?php if($_GET['id']==1){ ?>
  	opener.self.document.changedepartment.topbackcolor.value = '#'+ hexcolor;
  	opener.self.document.getElementById("topbackcolorexample").style.backgroundColor= '#'+ hexcolor;  	
  	
  	
    <?php } ?>
  	<?php if($_GET['id']==2){ ?>
  	opener.self.document.changedepartment.midbackcolor.value = '#'+ hexcolor;
    <?php } ?>
  	<?php if($_GET['id']==3){ ?>
  	opener.self.document.changedepartment.botbackcolor.value = '#'+ hexcolor;
    <?php } ?>      
  	<?php if($_GET['id']==4){ ?>
  	opener.self.document.changedepartment.midbackcolor.value = '#'+ hexcolor;  
  	opener.self.document.getElementById("examplemidbackcolor").style.backgroundColor= '#'+ hexcolor;   	
    <?php } ?>      
  	<?php if($_GET['id']==5){ ?>
  	opener.self.document.changedepartment.option2.value = '#'+ hexcolor;
    <?php } ?>      
  	<?php if($_GET['id']==6){ ?>
  	opener.self.document.changedepartment.botbackcolor.value = '#'+ hexcolor;  
  	opener.self.document.getElementById("examplebotbackcolor").style.backgroundColor= '#'+ hexcolor;

    <?php } ?>      
  	<?php if($_GET['id']==7){ ?>
  	opener.self.document.changedepartment.option4.value = '#'+ hexcolor;
    <?php } ?>      
                   
    
    
   <?php 
   
    for($i==50;$i<99;$i++){
    	
      if($_GET['id']== $i ){ ?>
  	opener.self.document.configform.channelcolor<?php echo $i; ?>.value = hexcolor;  
  	opener.self.document.getElementById("examplechannelcolor<?php echo $i; ?>").style.backgroundColor= '#'+ hexcolor;   	
    <?php } }?>  
    
    
   <?php 
   
    for($i==100;$i<149;$i++){
    	
      if($_GET['id']== $i ){ ?>
  	opener.self.document.configform.clientscolor<?php echo $i; ?>.value = hexcolor;  
  	opener.self.document.getElementById("exampleclientscolor<?php echo $i; ?>").style.backgroundColor= '#'+ hexcolor;   	
    <?php } }?>  
    
    
       <?php 
   
    for($i==150;$i<199;$i++){
    	
      if($_GET['id']== $i ){ ?>
  	opener.self.document.configform.operatorscolor<?php echo $i; ?>.value = hexcolor;  
  	opener.self.document.getElementById("exampleoperatorscolor<?php echo $i; ?>").style.backgroundColor= '#'+ hexcolor;   	
    <?php } }?>  
    
    window.close();
   }
 
   
</SCRIPT>
<table width=500>
<tr>
<?php

// we want to create a random color chart of Light colors consisting
// of C,D,E,F in Hex..
if($_GET['id'] <100 ){
  $highletters = array("A","B","C","D","E","F");
} else {
  $highletters = array("0","1","2","4","6","8");	
}

// rows
for($i=1; $i< 14; $i++){
 print "<tr>\n";
 // cols 
 for($j=1;$j<14;$j++){
    // generate random Hex..
    $randomhex = "";
    for ($index = 1; $index <= 6; $index++) {
       $randomindex = rand(0,5); 
       $randomhex .= $highletters[$randomindex];
    }	 
    print "<td width=20 bgcolor=$randomhex><a href=javascript:setit('$randomhex')><img src=images/blank.gif width=20 height=20 border=0></a></td>\n";
 }
 print "</tr>\n";
}
print "</table>\n";
?> 
<br>