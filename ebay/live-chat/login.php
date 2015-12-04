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

if( (mobi_detect()) && empty($UNTRUSTED['fullsite']) ){
	  Header("Location: mobile/");
	  exit;
	}

// error number:
if(!(isset($UNTRUSTED['err']))){ $err = 0; } else { $err = intval($UNTRUSTED['err']); }

// proccess login:
if(!(isset($UNTRUSTED['proccess']))){ $UNTRUSTED['proccess'] = "no"; }
if($UNTRUSTED['proccess'] == "yes"){
      if(validate_user($UNTRUSTED['myusername'],$UNTRUSTED['mypassword'],$identity)){
      	// TEMP :----
      	// In version 3.1.0 of CSLH I am going to separate out the sessions database
      	// table from the users. This session swapping is just a temporary thing till
      	// i finish the user database mapping feature in version 3.1.0 
      	$query = "DELETE FROM livehelp_users WHERE password='' AND sessionid='".$identity['SESSIONID']."'";	
      	$mydatabase->query($query);
      	$twentyminutes  = date("YmdHis", mktime(date("H"), date("i")+20,date("s"), date("m")  , date("d"), date("Y")));
        $query = "UPDATE livehelp_users 
                  SET identity='".filter_sql($identity['IDENTITY'])."',
                      ipaddress='".$identity['IP_ADDR']."',
                      hostname='".$identity['HOSTNAME']."',                      
                      expires='$twentyminutes',
                      lastaction='$twentyminutes',
                      ismobile='N',
                      authenticated='Y',
                      sessionid='".$identity['SESSIONID']."' 
                  WHERE username='".filter_sql($UNTRUSTED['myusername'])."' 
                    AND password='".filter_sql(md5($UNTRUSTED['mypassword']))."'";	
          
        $mydatabase->query($query);       	
      
      	// ----  // TEMP // ---      	
        $query = "SELECT * 
                  FROM livehelp_users 
                  WHERE sessionid='".$identity['SESSIONID']."'";	
        $person_a = $mydatabase->query($query);
        $person = $person_a->fetchRow(DB_FETCHMODE_ASSOC);
        $visits = $person['visits'];
        $isadminsetting = $person['isadmin'];
        $visits++;
        $query = "UPDATE livehelp_users 
                  SET visits=".intval($visits)." 
                  WHERE sessionid='".$identity['SESSIONID']."'";	
        $mydatabase->query($query);      
        if(empty($UNTRUSTED['adminsession']))
          $UNTRUSTED['adminsession'] = "N";
        if(empty($UNTRUSTED['matchip']))
          $UNTRUSTED['matchip'] = "N";
          
        $query = "UPDATE livehelp_config
                  SET matchip='".filter_sql($UNTRUSTED['matchip'])."',adminsession='".filter_sql($UNTRUSTED['adminsession'])."'";
        $mydatabase->query($query);          
                      
        // update history for operator to show login:
        $query = "INSERT INTO livehelp_operator_history (opid,action,dateof,sessionid,totaltime) VALUES (".$person['user_id'].",'login','".date("YmdHis")."','".$identity['SESSIONID']."',0)";
        $mydatabase->query($query);
        
         ?>
      	<SCRIPT type="text/javascript">
        function gothere(){
        	<?php if ($isadminsetting == "L" ) { ?>
            window.location.replace("live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>");
          <?php } else { ?>
            window.location.replace("admin.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>");          	
          <?php } ?>	
        }
        </SCRIPT>
      	<?php
        
        // show updates, news and security warnings once every 15 logins.
        // Do not remove this! There are Security holes discovered
        // every day in Open source programs and not knowing about them
        // could be fatal to your website.    
        if( ($visits % 10) == 9){        	
         $lines = "";	 
         $url = "http://www.craftysyntax.com/remote_login.php?v=" . $CSLH_Config['version'] . "&d=" . $CSLH_Config['directoryid'] . "&m=" . $CSLH_Config['membernum'] . "&h=" . $_SERVER['HTTP_HOST'];          
          print "<iframe src=$url width=100% height=100% scroll=AUTO border=0></iframe>";
          exit;
         } else {
         ?>
       <h2><?php echo $lang['txt92']; ?></h2>
         If this page appears for more than 5 seconds, 
            <?php if ($isadminsetting == "L" ) { ?>
            <a href=live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>>click here to reload.</a>
          <?php } else { ?>
            <a href=admin.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>>click here to reload.</a>    	
          <?php } ?>	
       <SCRIPT type="text/javascript">
        setTimeout("gothere();",4000);
       </SCRIPT>        
       <?php   
        exit;
        }
      }  else {
    	 // username/password fail:
       $err = 2; 
    } 
  }
  
if(!($serversession)) 
  $mydatabase->close_connect();
 
?>
<SCRIPT type="text/javascript">
if (window.self != window.top){ window.top.location = window.self.location; }
</SCRIPT>

<body bgcolor="#FFFFFF" onLoad="document.login.myusername.focus()">
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<DIV STYLE="width:976px; height:578px; background: #FFFFFF url('images/loginbk.jpg') no-repeat;">
<DIV style="z-index:3; position:absolute; left:140px; top:167px; width:480; height:282;">
 <center>
<form action=login.php Method=POST name=login>
<input type=hidden name=proccess value=yes> 
 <?php 
 if (!(empty($UNTRUSTED['fullsite']))){
 	?>
 	<input type=hidden name=fullsite value=1> 
<?php } ?>
<font size=2 color=770077><b>Version <?php echo $CSLH_Config['version']; ?></b></font>
<br/> 

<?php
// username/password incorrect
if($err == 2){ 
print $lang['txt94'] . "<br/>";
}
// logged out.
if($err == 3){ 
print $lang['txt95']. "<br/>";
}
?>
<br/>
<table>
<tr><td><b>Username:</b></td><td><input type="text" name="myusername" size="15"></td></tr>
<tr><td><b>Password:</b></td><td><input type="password" name="mypassword" size="15"></td></tr>
<tr><td colspan=2 align=center><a href=lostsheep.php><?php echo $lang['txt96']; ?></a></td></tr>
</table>

<center><input type="submit" value="Login"></center>
<!-- 
  If you are on a static ip address and would like only your authenticated ip to be about
  to hold a operator session you can set matchip to Y here:
  -->     
<input type="hidden" name="matchip" value=N>
<!-- 
  If you re for some reason having trouble with sessions you can set this to N
  --> 
<input type="hidden" name="adminsession" value=Y>

</form> 
<br><br>
 </DIV>
<DIV style="z-index:3; position:absolute; left:160px; top:420px; width:480; height:82;">
 
<br>
<table width=400>
 
	<tr>
	<td nowrap=nowrap>powered by </td>
  <td nowrap=nowrap><a href="http://www.craftysyntax.com/" target="_blank">Crafty Syntax Live Help <?php echo $CSLH_Config['version']; ?></a></td>
	<td nowrap=nowrap> &copy; 2003 - 2012 by </td>
	<td nowrap=nowrap><a href="http://www.craftysyntax.com/EricGerdes/" target=_blank>Eric Gerdes</a>  </td>
</tr>
</table>
</DIV>
 
 
</center>
</DIV>
</body>
</html>