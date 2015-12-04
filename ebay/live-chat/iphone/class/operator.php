<?php
//****************************************************************************************/
// Library : Operator   
//======================================================================================
/**
 
  *   $operator = new CSLH_operator;
 
  *
 **/
 
 
Class CSLH_operator
{
	
	// The host,password,username needed to connect to the database
	// all values are set by the constructor..
	var $myid = 0;
  var $channel = 0;
	var $defaultshowtype = ""; 
	var $externalchats= "";
	var $external = false;
	var $chattype = "";
	var $username = "";
	
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~   
/**
  * constructor for Class.
  *
  * @param string $host  
  * @param string $user 
  * @param string $password 
  */ 
  function CSLH_operator() {
   	Global $mydatabase,$CSLH_Config,$UNTRUSTED,$identity;
   	  	
  	// get the info of this user.. 
    $query = "SELECT user_id,onchannel,showtype,externalchats,chattype,username FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
    $people = $mydatabase->query($query);
 
    $people = $people->fetchRow(DB_FETCHMODE_ORDERED);
    $this->myid = $people[0];
    $this->channel = $people[1];
    $this->defaultshowtype = $people[2];
    $this->externalchats= $people[3];
    $this->external = false;
    $this->chattype = $people[4];
    $this->username = $people[5];
 
  }
 
function arrayofchats(){
   	Global $mydatabase,$CSLH_Config,$UNTRUSTED,$identity; 

  $arrayforoperator = array(); 
   
   $query = "SELECT livehelp_operator_channels.id,livehelp_operator_channels.txtcolor,livehelp_operator_channels.txtcolor_alt,livehelp_operator_channels.channelcolor,livehelp_operator_channels.userid,livehelp_users.user_id,livehelp_users.isoperator,livehelp_users.ipaddress,livehelp_users.username,livehelp_users.onchannel,livehelp_users.lastaction FROM livehelp_operator_channels,livehelp_users where livehelp_operator_channels.userid=livehelp_users.user_id AND livehelp_operator_channels.user_id=". intval($this->myid);
   $mychannels = $mydatabase->query($query);	
   $counting = $mychannels->numrows();
 
$wearelinking = false; // flag for if we are linking the chat tabs or not.
$alltabs = array();

$j=0;
while($channel_a = $mychannels->fetchRow(DB_FETCHMODE_ASSOC)){

 $prev = mktime ( date("H"), date("i")-3, date("s"), date("m"), date("d"), date("Y") );
 $oldtime = date("YmdHis",$prev);
 $alltabs[$j] = $channel_a;
 $j++;
}

 // Update operator History for when operator is chatting 
 $q = "SELECT chataction,user_id FROM livehelp_users WHERE sessionid='" . $identity['SESSIONID'] . "' LIMIT 1";
 $sth = $mydatabase->query($q);
 $row = $sth->fetchRow(DB_FETCHMODE_ORDERED);
 $rightnow = rightnowtime();
 $chataction = $row[0];
 $opid = $row[1];
 
 if($j>0){
 
  $q = "UPDATE livehelp_users SET chataction='$rightnow' WHERE sessionid='" . $identity['SESSIONID'] . "'";
  $mydatabase->query($q);
 } else {
  // get when they logged in and how many seconds they have been online:
        $query = "SELECT dateof FROM livehelp_operator_history WHERE opid=".$opid." AND action='Started Chatting' ORDER by dateof DESC LIMIT 1";
        $data3 = $mydatabase->query($query);
        $row3 = $data3->fetchRow(DB_FETCHMODE_ASSOC);
        $seconds = timediff($chataction,$row3['dateof']);
        
        if($chataction>10){
         // update history for operator to show login:     
         $query = "UPDATE livehelp_users set chataction='0' WHERE sessionid='" . $identity['SESSIONID'] . "'";
         $mydatabase->query($query); 	
        } 
 }

for($k=0;$k<count($alltabs);$k++){

	$channel_a = $alltabs[$k];
	if(!(empty($alltabs[$k+1])))
  	$channel_b =  $alltabs[$k+1]; 
  else
    $channel_b['onchannel'] = -1;
    	
  if($channel_a['isoperator'] == "Y"){
       // Operators can be on multiple channels so see if one of the channels they are on is one we are on.      
      $foundcommonchannel = 0;
      $query = "SELECT * FROM livehelp_operator_channels WHERE user_id=". intval($channel_a['user_id']);
      $mychannels2 = $mydatabase->query($query);
      while($rowof = $mychannels2->fetchRow(DB_FETCHMODE_ASSOC)){
         $query = "SELECT * FROM livehelp_operator_channels WHERE user_id=".intval($myid)." And channel=".intval($rowof['channel']);
         $countingthem = $mydatabase->query($query);        
         if($countingthem->numrows() != 0){ 
             $foundcommonchannel = $rowof['channel'];
         }
      }
  $channel_a['onchannel'] = $foundcommonchannel;
  $channel = $foundcommonchannel;
  }
 
    $thischannel = $channel_a['onchannel'] . "__" . $channel_a['userid']; 
    $usercolor = $channel_a['txtcolor'];
    $usercolor_alt = $channel_a['txtcolor_alt'];
    if ($UNTRUSTED['channelsplit'] == $thischannel){
         $myuser = $channel_a['username'];
         $myuser_ip = $channel_a['ipaddress'];
         $myusercolor = $usercolor;
         $mychannelcolor = $channel_a['channelcolor'];
         $txtcolor = $channel_a['channelcolor'];
         if(in_array($channel_a['onchannel'],$externalchats_array))
           $external = true;
         else
           $external = false;            
    } else {          
         $txtcolor = "DDDDDD";
         $txtcolor = $channel_a['channelcolor'];         
   }   
   $dakineuser = substr($channel_a['username'],0,15);
 
   array_push($arrayforoperator,array($txtcolor,$channel_a['onchannel'],$channel_a['userid'],$dakineuser) ); 	    
 	 
 
}
 
  return $arrayforoperator;
  	
  }
}//	End Class
?>