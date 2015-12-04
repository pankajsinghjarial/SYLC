<?php

$Version="2.5.9";   
//File version 2.5.9 (April 3, 2012)
//Fixed SQL injection vulnerability
//Uncomment
 
//File version 2.5.8 (Oct 2011)
//Rearanged code to see if bug is fixed
//Uncomment

//$Version="2.5.7";
//File version 2.5.7 (July 2011)
//Bug fix in new Dept Popup code.
//Visitors not showing in popups if not in a department

//File version 2.5.6 (July 2011)
//Bug fix in new Dept Popup code.

//File version 2.5.5 (July 2011)
//Required for LC2 Pro for Department counts
 
//File version 2.5.3 (Feb 2011)
//Required for LC2 Pro for message popups

//File version 2.5.2 (Dec 2008)
//This file will be required for special features in LC2 such as 
//error_reporting (E_ALL);
error_reporting (0);

require_once("admin_common.php");

validate_session($identity);
//$myid = $people['user_id'];

$timeof = date("YmdHis");

 $prev = mktime ( date("H"), date("i")-4, date("s"), date("m"), date("d"), date("Y") );
 $oldtime = date("YmdHis",$prev);
 $sqlquery = "SELECT * FROM livehelp_users WHERE lastaction>'$oldtime'";

$visitors = $mydatabase->query($sqlquery);
$VisitorCount=0; $OnlineStatus="N"; $ChatCount=0;
$UserInfo=""; $TimeOnline=""; $CurLocation="";
while( $visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
         if ($visitor['isoperator']=="N") {                  
                        if ($visitor['status']=="chat") {$ChatCount++;}
			$TrackQuery="SELECT * FROM livehelp_visit_track WHERE sessionid='".$visitor['sessionid']."'";
			$Tracks = $mydatabase->query($TrackQuery);
			while($tracking = $Tracks->fetchRow(DB_FETCHMODE_ASSOC)){
				$CurLocation= $tracking['location'];
				$later = $tracking['whendone'];
				$TimeOnline=secondstoHHmmss(timediff($later,date("YmdHis")));

			}

			$UserInfo =$visitor['user_id']."::".$visitor['username']."::".$visitor['ipaddress']."::".$visitor['status']."::".$visitor['camefrom']."::".$TimeOnline."::".$CurLocation.",,".$UserInfo;
         }  
      if ($visitor['username']==$_GET['username']) { $OnlineStatus=$visitor['isonline']; $MyUserID=$visitor['user_id'];}

}


 // get the count of active visitors in the system right now.
 $timeof = date("YmdHis");
 $prev = mktime ( date("H"), date("i")-4, date("s"), date("m"), date("d"), date("Y") );
 $oldtime = date("YmdHis",$prev);
 $sqlquery = "SELECT * FROM livehelp_users WHERE lastaction>'$oldtime' AND isoperator!='Y' ";



  // make list of ignored visitors:
	$MyOwnIP=$_SERVER['REMOTE_ADDR'];
 $ipadd = explode(",",$CSLH_Config['ignoreips'].",$MyOwnIP");
 for($i=0;$i<count($ipadd); $i++){
        if(!(empty($ipadd[$i])))
         $sqlquery .= " AND ipaddress NOT LIKE '".$ipadd[$i]."%' ";
 }

 $visitors = $mydatabase->query($sqlquery);

$onlinenow = $visitors->numrows();
 
 while($visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
   $chatting = "";
    // see if we are in the same department as this user..
   $sqlquery = "SELECT * FROM livehelp_operator_departments WHERE user_id='$myid' AND department='".$visitor['department']."' ";
   $data_check = $mydatabase->query($sqlquery);
   if( ($visitor['department']!=0) && ($data_check->numrows() == 0) ){
       $hiddennow++;
       $onlinenow--;
   }   
}


// select all Departments:
$query = "SELECT * FROM livehelp_departments WHERE visible=1 ORDER by ordering";
$data_d = $mydatabase->query($query);
$default = 0;
$deptList="";
$deptChat=0;
$deptVisitor=0;
$showDeptChat="";
$showDeptVisitor="";
$showSeparator="";
$AddedDeptVisitors=0;
while($department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC)){
  $department = $department_a['recno'];
  $name = $department_a['nameof'];
    // see if anyone in this department is online:
    $sqlquery = "SELECT status FROM livehelp_users WHERE lastaction>'$oldtime' AND isoperator!='Y' AND department=".intval($department);
    //echo $sqlquery;
    $data = $mydatabase->query($sqlquery);  
    if($data->numrows() != 0){ 
        while($opts = $data->fetchRow(DB_FETCHMODE_ASSOC)){
             $deptStatus = $opts['status'];            
             if($deptStatus=="Visiting"){$deptVisitor=$deptVisitor+1;$AddedDeptVisitors=$AddedDeptVisitors+1;}
             if($deptStatus=="chat"){$deptChat=$deptChat+1;}
        }
        if($deptVisitor>0){$showDeptVisitor="Visitors:$deptVisitor";}else{$showDeptVisitor="";}
        if($deptChat>0){$showDeptChat="Chats:$deptChat";}else{$showDeptChat="";}
        if($deptVisitor>0 && $deptChat>0) {$showSeparator="/";}else{$showSeparator="";}
        $deptList="$name $showDeptVisitor $showSeparator $showDeptChat -nlchr-".$deptList;
        $deptChat=0;
        $deptVisitor=0;   
    }

}


if ($AddedDeptVisitors<$onlinenow){
  $NoDeptVisitor=$onlinenow-$AddedDeptVisitors;
  $deptList=$deptList."-nlchr-Visitors Not In Departments: $NoDeptVisitor";
}
//echo $deptList;

 
$VisitorCount=$onlinenow; 

  if($_GET['lastaction']!=""){
  //Get latest messages
    $sqlquery = "SELECT livehelp_users.username, livehelp_messages.message FROM livehelp_users, livehelp_messages WHERE (livehelp_messages.saidto='$myid' OR livehelp_messages.saidto='0') AND livehelp_messages.timeof>'".intval($_GET['lastaction'])."' AND livehelp_messages.saidfrom=livehelp_users.user_id";
    $messages = $mydatabase->query($sqlquery);
    while($message = $messages->fetchRow(DB_FETCHMODE_ASSOC)){
      //echo $message[message]; 
      //$pattern='<b>Question</b>';
      $messagelist=$messagelist . $message['username'] . ": " . $message['message'] . "\r\n";
    }
    $messagelist = str_replace("<b>Question</b>", "", $messagelist);
    $messagelist = strip_tags($messagelist);
  }
  //$messagelist=$sqlquery;

 

$lastaction = date("YmdHis");
echo "VisitorCount=$VisitorCount;| OnlineStatus=$OnlineStatus;| ChatCount=$ChatCount;| Version=$Version;| LastAction=$lastaction;| DeptList=$deptList;| MessageList=$messagelist;| Visitors=$UserInfo;|";


//////This section will be for setting user online and offline.
///&online_status=Y&status=online
//if(!(empty($_GET['online_status']))) {
//		$online_status = filter_sql($UNTRUSTED['online_status']);
//    $status = filter_sql($UNTRUSTED['status']);
//		$query = "UPDATE livehelp_users set isonline='$online_status',lastaction='$timeof',status='$status' WHERE sessionid='".$identity['SESSIONID']."'";
//	$mydatabase->query($query);
//}

?>