<?php require_once '../conf/config.inc.php';
extract($_POST); ?>
           
<?php 

$statusname;
$user_id;


//echo "<pre>";
//print_r($statusname);

//print_r($status_order);


foreach($_POST['status_order'] as $key => $value) {

if($value == 0) {
unset($_POST['status_order'][$key]);
}
}
$new_array = array_values($_POST['status_order']);
//"<pre>";print_r($status_order);
$value = max($status_order);
//echo "<br/>array count=".count($new_array);

$arr =  array_count_values($_POST['status_order']);
$now_arr = array();

foreach($arr AS $val=>$count){
   if($count > 1){
      $now_arr[] = $val; 
   }
 }

 if(count($new_array) >= $value){
 	
 if(count($new_array)<=7){
 
 if (empty($now_arr) || $now_arr[0]==0) {
 
 
/*foreach($_POST['status_order'] as $key => $value) {
	
	if($value == 0) {
		unset($_POST['status_order'][$key]);
	}
}
$new_array = array_values($_POST['status_order']);
 "<pre>";print_r($new_array);die; */

if($_POST['action']== 'update'){

	$objCommon->delete('user_status','user_id='.$user_id);
}

foreach($status_order as $key => $value){
	
	if($value>0){
	
		$status_name = 	explode('~',$statusname[$key]);
		$dataArr  =  array('user_id'=>$_POST['user_id'],'status'=>$status_name[0],'status_order'=>$value, 'status_id'=>$status_name[1]);
		//$dataArr  =  array('user_id'=>$_POST['user_id'],'status'=>$statusname[0],'status_order'=>$status_default_order, 'status_id'=>$statusname[1]);
		$update_Article=$objCommon->save("user_status",$dataArr);
		
	}
}


echo $custerrorMsg = 'Status Assigned';
echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$user_id.'&custerrorMsg='.$custerrorMsg.'";</script>';
}else{

	
	echo $custerrorMsg = 'You can assign a order to one status only';
	//echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$user_id.'&custerrorMsg='.$custerrorMsg.'";</script>';
}
 }else {
 	
echo $custerrorMsg = 'You can assign status order to max 7 status';
 }
 
 }else {
 	
echo $custerrorMsg = 'Please assign order for status in serialise form';
 }
?>


