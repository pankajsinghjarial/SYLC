<?php
 // This File set the options and defualt values for this theme.
 
 // Background color of chatbox 
 if(empty($midbackcolor_value)) { $midbackcolor_value = "#FFFFDD"; }

 // Background Image of chatbox
 if(empty($midbackground_value)) { $midbackground_value = "images/blank.gif";  } 
 $midbackground_types = array('themes/vanilla/blueomi.png','themes/vanilla/grayomi.png','themes/vanilla/yellowomi.png','themes/vanilla/softblueomi.png','themes/vanilla/blueomi.png','images/blank.gif','themes/vanilla/patch.png','themes/vanilla/patchyellow.png');   
  
 if(empty($botbackcolor_value)) { $botbackcolor_value = "#FFFFFF"; }   
 // Background Image of chat window:
 if(empty($botbackground_value)) { $botbackground_value = "images/blank.gif";  } 
 
 // Background color of chat window:
 $option1_name = "Background color of chat window:"; 
 if(empty($option1_value)) { $option1_value = "#DDDDDD"; }
 $option1_desc = "hex background color of the window.. like #DDDDDD";
 
 
 // Background Image of chat window:
 $option2_name = "Background Image of chat window:"; 
  if(empty($option2_value)) { $option2_value = "themes/liquid_box/bluegray.png";  }
 $option2_desc = "full url to background image http:// ";
 
  
// Width and height of the pop up window. If the width is 
// already set then dont set it.  
if(empty($UNTRUSTED['winwidth'])) { $winwidth = 610; }
if(empty($UNTRUSTED['winheight'])) { $winheight = 450; }

$topframeheight_value =65;
?>