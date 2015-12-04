<?php
 
 
 
 // If this theme allows for the changing of the chatbox background color
 // and the window background color then this file will contain:
 
 // $midbackcolor_value = Default hex   for the chatbox color
 
 // $botbackground_value = Default hex  for window background
 // $botbackground_types = array() of background images for window background. 
 
 
 
 // Background color of chatbox 
 if(empty($midbackcolor_value)) { $midbackcolor_value = "#FFFFDD"; }
 
 // Background Image of chatbox
 if(empty($midbackground_value)) { $midbackground_value = "images/blank.gif";  } 
 $midbackground_types = array('themes/classic/blueomi.png','themes/classic/grayomi.png','themes/classic/yellowomi.png','themes/classic/softblueomi.png','themes/classic/blueomi.png','images/blank.gif','themes/classic/patch.png','themes/classic/patchyellow.png');   
 
 
  // Background color of chat window:
 if(empty($botbackcolor_value)) { $botbackcolor_value = "#FFFFFF"; } 
  
  // Background Image of chat window:
  if(empty($botbackground_value)) { $botbackground_value = "images/blank.gif";  } 
 $botbackground_types = array('images/blank.gif','themes/classic/patch.png','themes/classic/patchyellow.png');   
 
  
// Default Width and height of the pop up window:
if(empty($UNTRUSTED['winwidth'])) { $winwidth = 600; }
if(empty($UNTRUSTED['winheight'])) { $winheight = 450; }

$topframeheight_value =75;

?>