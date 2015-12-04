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
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");

if($UNTRUSTED['json']=="Y"){ print "LOGGEDOUT"; exit; }

// proccess login:
if(!(isset($UNTRUSTED['proccess']))){ $UNTRUSTED['proccess'] = "no"; }
if($UNTRUSTED['proccess'] == "yes"){
      if(validate_user($UNTRUSTED['myusername'],$UNTRUSTED['mypassword'],$identity)){

      	$query = "DELETE FROM livehelp_users WHERE password='' AND sessionid='".$identity['SESSIONID']."'";	
      	$mydatabase->query($query);
      	$howmanyminutes  = date("YmdHis", mktime(date("H"), date("i")+$CSLH_Config['sessiontimeout'],date("s"), date("m")  , date("d"), date("Y")));
        $query = "UPDATE livehelp_users 
                  SET identity='".filter_sql($identity['IDENTITY'])."',
                      ipaddress='".$identity['IP_ADDR']."',
                      hostname='".$identity['HOSTNAME']."',                      
                      expires='$howmanyminutes',
                      ismobile='P',
                      lastaction='$howmanyminutes',
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
        
              if ($UNTRUSTED['iphone']=="YES"){ 
        print "SUCCESS";
        exit;
       }
        
         ?>
         <meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 
      	<SCRIPT type="text/javascript">
        function gothere(){
 
            window.location.replace("live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>");
     
        }
        </SCRIPT>      
       <h2><?php echo $lang['txt92']; ?></h2>
         If this page appears for more than 5 seconds, 
         <a href=live.php?cslhOPERATOR=<?php echo $identity['SESSIONID']; ?>>click here to reload.</a>
          
       <SCRIPT type="text/javascript">
        setTimeout("gothere();",4000);
       </SCRIPT>        
       <?php   
        exit;
         
      }  else {
    	 // username/password fail:
       $err = 2; 
      if ($UNTRUSTED['iphone']=="YES"){ 
        print "BAD LOGIN";
        exit;
       }
    } 
  }
  
if(!($serversession)) 
  $mydatabase->close_connect();
 
?>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 
<link type="text/css" rel="stylesheet" href="css/base.css" />
</head>
<body>
<DIV STYLE="width:310px;">
	
<img src=images/top.png width=310 height=47><br>
 
<div class="login_form">
<form id="login_form" action="login.php" method="post">
<input type=hidden name=proccess value=yes> 
<DIV style="float:right;"> Version <?php echo $CSLH_Config['version']; ?> </DIV>
<br/> 

<?php
// username/password incorrect
if($err == 2){ 
 print  "<font color=#990000>Invalid username and/or password.</font><br/>";
}
// logged out.
if($err == 3){ 
print $lang['txt95']. "<br/>";
}
?>
<br/>
<div class="login_form_label">Username:</div><input class="login_form_field" type="text" name="myusername" value="" />
<div class="login_form_label">Password:</div><input class="login_form_field" type="password" name="mypassword" />
<center><a href=javascript:login_form.submit()><img src=images/login.png border=0></a></center>
</form></div>
<div>
	
<center><a href=lostsheep.php><img src=images/password.png border=0></a></center>
  	
</DIV>
<pre>

















</pre>
 </body></html>