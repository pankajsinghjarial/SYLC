<?php 
$lead_detail_id = $_GET['lead_detail'];
$carinfo = $objCommon->read('lead_details','id='.$lead_detail_id); 
$carfetch = mysql_fetch_assoc($carinfo);
//print_r($carfetch);die;
extract($carfetch);

//echo $id;die;
if($lead_id) {
$mainlead = $objCommon->read('leads','id='.$lead_id);
if(mysql_num_rows($mainlead) > 0){
	$maindetailfetch = mysql_fetch_object($mainlead);
	if($maindetailfetch->user_id){
	$userlead = $objCommon->read('users','id='.$maindetailfetch->user_id);
	if(mysql_num_rows($userlead) > 0){
		$userdetailfetch = mysql_fetch_object($userlead);
	}
	}
}
}

$statusinfo = $objCommon->read('status','active=1','position asc');

$user_statusinfo = $objCommon->read('user_status','user_id='.$lead_id,'status_order asc');




if($status) {
	$current_status = $objCommon->read('user_status','user_id='.$lead_id.' and status_id='.$status);
	$current_status_fetch = mysql_fetch_object($current_status);
$statusdetail = $objCommon->read('status','active=1 and id ='. $status);
if(mysql_num_rows($statusdetail) > 0){
$statusdetailfetch = mysql_fetch_object($statusdetail);} }

$feeinfo = $objCommon->read('fees','status=1');

 ?>
