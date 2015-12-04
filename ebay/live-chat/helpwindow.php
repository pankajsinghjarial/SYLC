<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
//           URL:   http://www.craftysyntax.com/    EMAIL: livehelp@craftysyntax.com
//         Copyright (C) 2003-2012 Eric Gerdes   (http://www.craftysyntax.com )
// ----------------------------------------------------------------------------
// Please check http://www.craftysyntax.com/ or REGISTER your program for updates
// --------------------------------------------------------------------------
// NOTICE: Do NOT remove the copyright and/or license information any files. 
//         doing so will automatically terminate your rights to use program.
//         If you change the program you MUST clause your changes and note
//         that the original program is Crafty Syntax Live help or you will 
//         also be terminating your rights to use program and any segment 
//         of it.        
// --------------------------------------------------------------------------
// LICENSE:
//     This program is free software; you can redistribute it and/or
//     modify it under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
require_once("admin_common.php");
validate_session($identity);

?>
<html>
	<title> Help </title>
	<body bgcolor="#FFFFEE">
		<?php
		  if($UNTRUSTED['info']==1){ ?>
		  	
		  	<b>list of online Visitors and chaters refresh/ajax options</b><br>
		  	
		  	<ul><li><i>AJAX</i> -  This option uses very little refreshing 
		  		 of the page and makes ajax calls to update the list of visitors and chatters.
		  		 It is recommended that you select this option if needing to 
		  		 monitor chat sessions AND visitors </li>
		  		  
		  		  <li><i>Automatic</i> - This option offers the list of chatters with a 
		  		  	refresh of the users and only the visitors if a new visitor
		  		  	 arrives on the site. If hiding vistors and only 
		  		  	 viewing chat sesssions this option is recommended.</li>
		  		  
		  		  <li><i>10 seconds </i> - This option refreshes the list of
		  		  	chatters and visitors every 10 seconds ( not recommended ) </li>

		  		  <li><i>15 seconds </i> - This option refreshes the list of
		  		  	chatters and visitors every 15 seconds. Recommended if
		  		  	the number of visitors on the site at anyone time is over
		  		  	20 and the operator wants to view them.. add more time
		  		  	if more visitors to slow refreshing..  </li>

		  		  <li><i>20 seconds </i> - This option refreshes the list of
		  		  	chatters and visitors every 20 seconds </li>
		  		  	
 		  		  			  		  			  		  	 		  		  	 		  		  	 
		  		  	 </ul>
		  	
		  	
		  	
		  	<?php }
		  if($UNTRUSTED['info']==2){ print $lang['txt6'];  }
		  if($UNTRUSTED['info']==3){ print $lang['txt230'];  }		  

		  if($UNTRUSTED['info']==4){ ?>		  	
		  	<b>Auto Invite:</b><br>		  	
   Auto Invites monitors the visitors to the site and when a visitor matching the 
   criteria listed in your auto invite settings is met the visitor is auto 
   invited for a chat. You can Create monitors to auto invite visitors 
   based on either what referer they came from, and/or how many pages 
   they have viewed, and/or what page they are looking at, and/or what 
   department they are in. 
   
      <?php }  

		  if($UNTRUSTED['info']==5){ ?>		  	
		  	<b>Alert of Visitors:</b><br>		  	
           If the chat mode shown in the 
           list of users is set to any chat
           type EXCEPT AJAX ( for example
           "Automatic", "10 Seconds" , 
           "20 Seconds" , etc ..) AND
           the Current Visitors list is 
           shown and not minimized then
           a chime will sound each time
           a visitor comes to the website
           if this is checked.. this can
           get annoying if you have a lot
           of visitors to your website and
           the chime can interfere with the
           focus to the chat textarea box.. so this
           is not a recommended setting.

      <?php }  
      
		  if($UNTRUSTED['info']==6){ ?>		  	
		  	<b>Sound Alert:</b><br>		  	
           When this is checked a sound
           will play when a visitor is 
           requesting a chat. 
      <?php }  
      
		  if($UNTRUSTED['info']==7){ ?>		  	
		  	<b>Typing Alert:</b><br>		  	
 When this is checked a typing sound will play when the visitor finishes typing their message.
      <?php } 
      
		  if($UNTRUSTED['info']==8){ ?>		  	
		  	<b>Auto Focus:</b><br>		  	
           When this is checked the admin will attempt
           to focus the chat window when chat requests 
           occur using "window.focus()" some browsers
           and security settings in browsers prevent
           this from working..
      <?php } ?>     
                       
</body>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>