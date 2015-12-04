<?php require_once '../conf/config.inc.php'; 
extract($_GET);
//echo date('H:i:s m-d-y');
//echo date_default_timezone_get();
//die;


?>
<?php require_once "phpuploader/include_phpuploader.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<?php /*?><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><?php */?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon" type="image/ico" >  
<title>Syl Corporation</title>


<link href="demo.css" rel="stylesheet" type="text/css" />
<link href="../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />
<link type="text/css" href="../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
	<style>
.my_files{ color:#333; font:12px/16px Arial, Helvetica, sans-serif; border:#ccc 1px solid; background:#f1f1f1;}
</style>	
<link href="../stylesheets/reset.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/colorbox.css" />

<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>

<script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/custom.js"></script>

<script type="text/javascript">

     /*   
       function addimagefunction(j) {
    	   $(function() {
        	   var p_scents = '#p_scents'+j;
    	        var scntDiv = $(p_scents);
    	        var i = $(p_scents+' p').size() + 1;
    	        var pid = 'myp'+i;
                $('<p id='+pid+'><input type="file" size="20" id="galleryimage'+j+(i-1)+'" class="my_files" name="img[]" value="" /> <a onclick="removep('+pid+')">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });}
      function removep(pid) { 
                           $(pid).remove();
                   return false;     
           }
          
 */

      function status_validation(){ 
   	   
          var chks = document.getElementsByName('statusname[]');
          var $orderall = $('input[name="status_order[]"]');
          
          
          var hasChecked = false;
          var checkCount = 0;
          for (var i = 0; i < chks.length; i++)
          {
          var order = $orderall.eq(i).val();
          //alert(order);
          if (chks[i].checked)
          {
          hasChecked = true;
          
          checkCount++;
         
          }

          if (chks[i].checked == false && order!='')
          {
          alert("Please delete the value for all unchecked status.");
          return false;
          }

          if (chks[i].checked == true && order=='')
          {
          alert("Please write order for all status.");
          return false;
          }
                   
          }

          if (hasChecked == false)
          {
          alert("Please select at least one status.");
          return false;
          }

          
          
          if (checkCount > 7)
          {
              //alert(checkCount);
          alert("You can select only 7 status for one user.");
          return false;
          }
          
          return true;

  	  	}


        
</script>



<script type="text/javascript">

function notify_mail(idval)
{
window.location="notify_mail.php?id=" + idval;

}

</script>


<script type="text/javascript">
		var handlerurl='ajax-multiplefiles-handler.php'
	</script>
	<script type="text/javascript">
	function CuteWebUI_AjaxUploader_OnPostback()
	{
		var uploader = document.getElementById("myuploader");
		var guidlist = uploader.value;

		//Send Request
		var xh;
		if (window.XMLHttpRequest)
			xh = new window.XMLHttpRequest();
		else
			xh = new ActiveXObject("Microsoft.XMLHTTP");
		
		xh.open("POST", handlerurl, false, null, null);
		xh.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");
		xh.send("guidlist=" + guidlist);

		//call uploader to clear the client state
		uploader.reset();

		if (xh.status != 200)
		{
			alert("http error " + xh.status);
			setTimeout(function() { document.write(xh.responseText); }, 10);
			return;
		}

		var filelist = document.getElementById("filelist");

	
		var list = eval(xh.responseText); //get JSON objects
		
		//Process Result:
		for (var i = 0; i < list.length; i++)
		{
			var item = list[i];
			var msg = 'Processed:' + list[i].FileName;
			var msg1 = "<input type='hidden' name='files[]' value= '" + list[i].FileName+ "'  />";
			var li = document.createElement("li");
			li.innerHTML = msg + msg1;
			filelist.appendChild(li);
			
		}
	}
	</script>


</head>
<body>

<?php 
include_once(LIST_ROOT_ADMIN."/customer_info_code.php");
?>






 <div id="wrapper">
<!--start wrapper -->
         <div id="header">
		 <h1>Admin panel configuration</h1>

         </div>
<?php  include_once LIST_ROOT.'/admin/includes/tabs.php';?>
<div id="sylc_wrapper">
<!--start sylc_wrapper -->
  <div class="sylc_login_box">
  <!--start sylc_login_box -->
  <div class="create_account_box">
  <!--start create_account_box -->
    <div class="account_box  f_left">
    <form method="post">
    <ul>
     <?php if(isset($custerrorMsg)) { ?>
<li>  <div id="div_success" style="width:100%;padding: 0 0 0 4px;text-align:left;"> <?php echo $custerrorMsg; //unset($_SESSION['msg']); ?> </div>
</li>
   <?php }?>
    <li><span class="left_text"> Customer Name: </span> <input type="text" name="name" value="<?php echo $name?>" class="input_acc00"> <input name="first_name" type="text" value="<?php echo $first_name?>" class="input_acc">
    </li>
    
    <li><span class="left_text">Address: </span><input name="address" type="text" value="<?php echo $address; ?>" class="input_acc02"></li>
    <li><span class="left_text">City/Province: </span><input name="city" type="text" value="<?php echo $city; ?>" class="input_acc02"></li>
    <li><span class="left_text">Postal Code: </span><input name="postcode" type="text" value="<?php echo $postcode?>" class="input_acc02"></li>
    <li><span class="left_text">Telephone: </span><input name="phone" maxlength="10" type="text" value="<?php echo $phone?>" class="input_acc02"></li>
    <li><span class="left_text">Email: </span><input name="email" type="text" value="<?php echo $email; ?>" class="input_acc02"></li>
 

       
    <li><span class="left_text"> </span>
      <input type="hidden" name="id" value="<?php echo $id?>" />
    <input type="hidden" name="custhid" value="custhid" />
    <input type="submit" class="order_now_bt" name="submit" value="Save"></li>
    
    </ul>
    </form>
    </div>
    
    
    
    <div class="account_box account_box_gray f_right">
    <form method="post">
     <ul>
        <?php if(isset($custlogerrorMsg)) { ?>
<li>  <div id="div_success" style="width:100%;padding: 0 0 0 4px;text-align:left;"> <?php echo $custlogerrorMsg; //unset($_SESSION['msg']); ?> </div>
</li>
   <?php }?>
      <li><span class="left_text">Login Username: </span><input type="text" name="username" value="<?php echo $username?>" class="input_acc02"></li>
        <li><span class="left_text">Login Password: </span><input type="password" name="password" value="" class="input_acc02"></li>
      <li><span class="left_text wid_auto">  Last Login : <?php if(isset($last_login) && $last_login != '0000-00-00'){ echo $last_login; } else { echo "No Information Available"; }?> </span> </li>
      <li> 
      <input type="hidden" name="id" value="<?php echo $id?>" />
      <input type="hidden" name="user_id" value="<?php echo $user_id?>" />
      <input type="hidden" name="logemail" value="<?php echo $logemail?>" />
    <input type="hidden" name="custloghid" value="custloghid" />
      <input type="submit" class="order_now_bt" name="submit" value="Reset Password"></li>
  </ul>
  </form>
    </div>
    
    
    <!--end create_account_box -->
  </div>
   <a href="<?php echo '#statuspopup';?>" class="inline assign_btn1">Assign status</a> <span class="assign_msg"><?php echo $_GET['custerrorMsg'];?></span>
  
   <div class="clear"></div> 
    <!--add note_box -->
    
    <div class="car_info_collm">
    <div class="rep_titles">Notes <span class="assign_msg" style="float: none;font-weight: normal;"><?php echo $_GET['notemsg'];?></span>
    <span class="assign_msg" style="float: none;font-weight: normal;color : #ff0000;"><?php echo $_GET['noteerrmsg'];?></span></div>
 
   <table class="three_collm_tbl">
    <tr>
    <th width="20%">Date/Time</th>
    <th width="43%">Notes</th>
    <th width="20%">Posted By</th>
    <th width="17%">Action</th>
    </tr>
   </table>
  
<div style="max-height: 130px;overflow-y:scroll ">    
  <table class="three_collm_tbl">
 
   
    <?php $lead_id_notes = $_GET['id'];?>
  <?php $notesdetials = $objCommon->read('admin_notes','lead_id='.$lead_id_notes,'created_at desc');
	$count = mysql_num_rows($notesdetials);
	if($count > 0)
	{
		
while($notesdetailfetch = mysql_fetch_object($notesdetials))
{ ?>
  <tr>
    <td width="20%"><?php echo date('m/d/y - h:i  A',strtotime($notesdetailfetch->created_at));?></td>
    <td width="43%"><?php echo $notesdetailfetch->note;?></td>
    
    <td width="20%"><?php echo $notesdetailfetch->admin_name;?></td>
    <td width="17%"><a onclick="return confirm('Are you sure want to delete?');"  href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&note=<?php echo $notesdetailfetch->id;?>&action=removenote"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
  </tr>
  <?php }} else { ?>
  
   <tr>
    <td colspan="4"  >No Notes Added</td>
  </tr>
  <?php }?>

 
  
</table>
</div>

 <table class="three_collm_tbl">
  <tr>
  <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/admin_notes.php">
    
  <td align="left" colspan="3"><input type="text" name="notesfield" id="notesfield" placeholder="Enter a new note here...">
   <input type="hidden" name="lead_admin_id" id="lead_admin_id" value="<?php echo $_GET['id'];?>">
   <input type="hidden" name="hiddenfield" id="hiddenfield" value="adminnotesfilled"></td>
  <td align="right"><input type="submit" value="Add New Note" class="notes_btn1"></td>
  
  </form>
  </tr>
 </table>

 
   
  </div>
   
   <script>
jQuery(document).ready(function(){
jQuery('#submit_status').click(function(){

jQuery.post("<?php echo DEFAULT_ADMIN_URL;?>/assign_status_code.php", jQuery("#statusform").serialize(),  function(response) {
jQuery('#success1').html(response);
//$('#success').hide('slow');
});
return false;
 
});
 
});
</script>


     <div style="display:none">

 <div class="account_box no_bdr" id="statuspopup">
    <div class="pop_titles">Assign status</div>
       <div id="success1" style="width:100%;padding: 0 0 0 4px;text-align:left;color: #ff0000;" class="assign_msg"><?php if($custerrorMsg!='Status Assigned'){ echo $custerrorMsg;}?></div>
    <?php /*?><form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/assign_status_code.php" name="statusform"><?php */?>
<form name="statusform" id="statusform">
                <div class="accessoptions assign_frm assign_orderfrm">
                <ul class="assign_order_ul">
                <li><strong>Status Name     <span style="float: right;text-align: center;width: 100px;">Order</span></strong></li>
                <?php 
                     $status_array=array(1=>'status1',2=>'status2',3=>'status3',4=>'status4',5=>'status5',6=>'status6',7=>'status7');
                    
                     $i=0;
                     while($statusfetch = mysql_fetch_object($statusRec)) {

?>
     <li><input type="hidden" name="statusname[]" value="<?php echo $statusfetch->name.'~'.$statusfetch->id;?>"> <?php echo $statusfetch->name;?>
 
     <select id="status_order_<?php echo $i;?>" name="status_order[]" class='status_assign_class' >
      <option value="0">Select Order</option>
      <?php 
      
    
      foreach($status_array as $key1=>$value)
      { 
      $newkey=$key1;
    	$ttl = $objCommon->numberOfRows('user_status',"user_id='".$id."' and status_order='".$key1."' and status_id='".$statusfetch->id."'");
      	
      //	$tst=$objCommon->customQuery("select count(*) from user_status where user_id='470' and status_order=$newkey");
      	//$row = mysql_fetch_array($tst);
      
      	
      	?>
      	<option value="<?php echo $key1;?>" <?php if($ttl){?> selected="selected"<?php } ?>><?php echo $value; ?></option>
   <?php  } ?>
      
       </select> 
     
     </li>
 
      <?php /*?>
      <li> <input type="checkbox" name="statusname[]" value="<?php echo $statusfetch->name.'~'.$statusfetch->id;?>"<?php if(isset($user_statusinfo_arr[$statusfetch->id] )){ echo 'checked="checked"'; }?> id=""><?php echo $statusfetch->name;?>
      <input type="text" name="status_order[]" value="<?php if(isset($user_statusinfo_arr[$statusfetch->id])){ echo $user_statusinfo_arr[$statusfetch->id]; }?>" id="" style="width: 30px;">
    </li><?php */?>
      
      <?php $i++;}?>
              </ul>  
             </div>
           
    <?php if(mysql_num_rows($user_statusinfo) > 0) { ?>
    
     <input type="hidden" name="action" value="update" />
     <?php } else {?>
      <input type="hidden" name="action" value="save" />
     <?php }?>
             <li style="list-style: none;"><span class="left_text"> </span>
      <input type="hidden" name="user_id" value="<?php echo $id?>" />
    <input type="hidden" name="custhid" value="custhid" />
    <input type="submit" class="order_now_bt save_bt" name="submit" id="submit_status" value="Save"></li>
    
 </form>

    </div>
</div>
   
   
 <?php /*?>  
   <div style="display:none">
 <div class="account_box no_bdr" id="statuspopup">
    <div class="pop_titles">Assign status and their order</div>
      <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/assign_status_code.php" name="statusform">
      
      
                <div class="accessoptions assign_frm">
                <ul>
                <?php 
                     mysql_data_seek($statusinfo,0);
    
                     while($statusfetch = mysql_fetch_object($statusinfo)) {
						
?>
      
      <li> <input type="checkbox" name="statusname[]" value="<?php echo $statusfetch->name.'~'.$statusfetch->id;?>"<?php if(isset($user_statusinfo_arr[$statusfetch->id] )){ echo 'checked="checked"'; }?> id=""><?php echo $statusfetch->name;?>
      <input type="text" name="status_order[]" value="<?php if(isset($user_statusinfo_arr[$statusfetch->id])){ echo $user_statusinfo_arr[$statusfetch->id]; }?>" id="" style="width: 30px;">
    </li>
      
      <?php }?>
              </ul>  
             </div>
           
    <?php if(mysql_num_rows($user_statusinfo) > 0) { ?>
    
     <input type="hidden" name="action" value="update" />
     <?php } else {?>
      <input type="hidden" name="action" value="save" />
     <?php }?>
             <li style="list-style: none;"><span class="left_text"> </span>
      <input type="hidden" name="user_id" value="<?php echo $id?>" />
    <input type="hidden" name="custhid" value="custhid" />
    <input type="submit" class="order_now_bt save_bt" name="submit" value="Save" onclick="return status_validation();"></li>
    
 </form>

    </div>
</div>
<?php */?> 


   <div class="vehicle_box">
  <!--start vehicle_box -->
    <div class="vehicle_btn_wrap">
      <a class='inline' href="#inline_addvehicle_content" style="text-decoration: none;"><input type="button" class="order_now_bt" name="Order Now" value="Add a Vehicle" /></a> 
    </div>
    
    <div class="vehicle_tabing">
    
    <!--start vehicle_tabing -->
    
     <ul id="tabs" class="main_tabs">
    <?php $i=0; while($carfetch = mysql_fetch_object($carinfo)) { 
     $carname = $carfetch->car_brand; 
    $modelname = $carfetch->model;
      	?>
      <li><a href="#" name="#tab<?php echo $i;?>"><?php echo $carname." ".$modelname; ?></a></li>
     
   <?php $i++; }?>
  </ul>

  <div id="content_vehicle">
     <!--start content_vehicle -->
     <?php 
     mysql_data_seek($carinfo,0);// = $objCommon->read('lead_details','lead_id='.$id);
    $j=0; 
    while($carfetch = mysql_fetch_object($carinfo)) {
    	 $carname = $carfetch->car_brand;
    	 $modelname = $carfetch->model;  
 	?>
      <div id="tab<?php echo $j;?>">
       <!--start tab id  -->
       <form method="post" onsubmit="return infocheck(<?php echo $j?>)">
        <input type="hidden" name="current" value="<?php echo $j?>" />  
       <div class="create_account_box">
  <!--start create_account_box -->
    <div class="account_box car_info_box f_left">
    
    
    <ul>
      
<li id="infoerror<?php echo $j;?>" style="display: none;"></li>
   
    <li><span class="left_text">Brand: </span> <input type="text" id="carmak<?php echo $j?>" name="carname" value="<?php echo $carname;?>" class="input_acc00">  <span class="more_opnal">Model</span>  <input id="carmod<?php echo $j?>" type="text" name="modelname" value="<?php echo $modelname;?>" class="input_acc00"> 
    </li>
    
    <li><span class="left_text">Year:</span>
    <input id="caryea<?php echo $j?>" maxlength="4" type="text" name="year" value="<?php echo $carfetch->year; ?>" class="input_acc00">  
    <span class="more_opnal">Price</span>  
    <input id="carpri<?php echo $j?>" type="text" name="price" value="<?php echo $carfetch->carprice; ?>" class="input_acc00"> </li>
    <li><span class="left_text">Exterior Color:</span>
     <input type="text" name="exterior" value="<?php echo $carfetch->exterior; ?>" class="input_acc00">  <span class="more_opnal">
Interior</span>  <input name="interior" type="text" value="<?php echo $carfetch->interior; ?>" class="input_acc00"> </li>
    <li><span class="left_text">Trim Package:</span>
      <input type="text" name="trimpack" value="<?php echo $carfetch->trimpack; ?>" class="input_acc02"></li>
    <li><span class="left_text">Serial # :</span>
      <input type="text" name="serial" value="<?php echo $carfetch->serial; ?>" class="input_acc"></li>
    <li><span class="left_text">Final Destination:</span><input name="destination" type="text" value="<?php echo $carfetch->destination; ?>" class="input_acc02"></li>
 
 
 
    
       
    <li><span class="left_text"> </span>
    <input type="hidden" name="carinfohid" value="carinfohid" />
    <input type="hidden" name="tabid" value="<?php echo $j;?>" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Save">
     <input type="submit" class="order_now_bt" name="submit" value="Notify User" onClick="notify_mail(<? print $id ?>); return false">
     <p style="color:#026701;font-family:verdana;font-size: 12px;padding-right: 35px; padding-top: 7px ;float: right;"><?php echo $notice;?></p>
  
     
     
     </li>
     
    
    
    </ul>
    </div>
    
    
    
    <div class="account_box f_right car_width">
    
    <ul>
      <li>
        <div class="car_photo"><img src="<?php echo DEFAULT_URL?>/gallery/<?php echo $carfetch->main_image;?>" width="300" height="182" alt=" ">
        
        <a class='inline02 order_now_bt' href="#inline_content_photo<?php echo $j;?>">Set My Photo</a></div>
     
      </li>
      <?php /*?><li><span class="left_text wid_auto">  Order Placed: <?php echo date('m/d/Y',strtotime($carfetch->created_at)); ?></span> </li> <?php */?>
      <li> <span class="left_text"> Status</span><select name="status" class="select_acc02" id="carstat<?php echo $j?>">
      <option value="">Please Select</option>
      <?php
      mysql_data_seek($user_statusinfo,0);
      while($user_statusfetch = mysql_fetch_object($user_statusinfo)) {?>
         <option value="<?php echo $user_statusfetch->status_id?>" <?php if($user_statusfetch->status_id == $status OR $user_statusfetch->status_id == $carfetch->status) { ?> selected="selected" <?php }?>><?php echo $user_statusfetch->status;?></option>
      <?php }?>
      </select></li>
  </ul>
  
    </div>
    
    
    
    <!--end create_account_box -->
  </div>
  </form>
  
  <div class="create_account_box">
  <!--start create_account_box -->
    <div class="status_raw">
    <strong>Contract Document Status: <?php if($carfetch->mail_sent == 0 ){
    	echo "No Contract Sent";
     } elseif($carfetch->mail_sent == 1){
 echo "Contract Sent - ".date('m/d/Y',strtotime($carfetch->mail_sent_date));
 } else {
echo "Contract Received- ".date('m/d/Y',strtotime($carfetch->sign_date));
 }?></strong> 
  <?php if($carfetch->mail_sent == 0 ){?>
 <a style="text-decoration: none;" href="<?php echo DEFAULT_URL?>/pop_form_details.php?id=<?php echo $id?>&lead_id=<?php echo $carfetch->id?>&from=admin"><input type="button" class="order_now_bt" style="float: right;margin-top: -5px;" name="Order Now" value="Send Contract"/></a>
 <?php }else { ?>
  <a style="text-decoration: none;" href="<?php echo DEFAULT_URL?>/pop_form_details.php?id=<?php echo $id?>&lead_id=<?php echo $carfetch->id?>&from=admin"><input type="button" class="order_now_bt" style="float: right;margin-top: -5px;" name="Order Now" value="Resend Contract"/></a>
 <?php }?>
     <?php if($carfetch->mail_sent == 2 ){ ?> <a title="Download PDF" href="<?php echo DEFAULT_URL;?>/pdf.php?id=<?php echo $id;?>&lead_id=<?php echo $carfetch->id;?>" target="_blank"><img src="<?php echo DEFAULT_ADMIN_URL;?>/file_extension_pdf.png" style="vertical-align: bottom;"></a> <?php }?>
    
    </div>
<!--end create_account_box -->
  </div>
  
  <div class="photo_gallery_box">
  <?php echo $carinfoerrorMsg;?>
    <div class="rep_titles">Photo Gallery <a class='inline' href="#inline_gallery_content<?php echo $j;?>">add Photo</a></div>
    
    		<div class="list_carousel responsive">
			   <?php $gallerydetials = $objCommon->read('lead_gallery_details','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($gallerydetials);
	$imgcn = 0;
	if($count > 0)
	{ ?> 
	<script type="text/javascript">
	
function gallerycheckdelete(t)
{
	var name = 'imgdel'+t+'[]';
	var chks = document.getElementsByName(name);
	var checkCount = 0;
	for (var i = 0; i < chks.length; i++)
	{
	if (chks[i].checked)
	{
	checkCount++;
	}
	}
	if (checkCount < 1)
	{
	alert("No Image Selected.");
	return false;
	}
	return true;
}
	</script>
	<form  method="post" onsubmit="return gallerycheckdelete(<?php echo $j;?>)" >
	<ul id="foo4<?php echo $j?>"> 
	<?php 
while($gallerydetailfetch = mysql_fetch_object($gallerydetials))
{ ?>
	
					<li><img src="<?php echo DEFAULT_URL?>/gallery/<?php echo $gallerydetailfetch->imagename;?>" width="180" height="121" alt=" "> <div style="text-align: center;"><input id="geldel<?php echo $j;?>" type="checkbox" name="imgdel<?php echo $j;?>[]" value="<?php echo $gallerydetailfetch->id?>" class="imgdel" /><label style="font-size: 12px;">Delete</label></div></li>
                    
 <?php $imgcn ++; }?>
					
				</ul> 
				<div class="clearfix"></div>
				<a id="prev2" class="prev" href="#">&nbsp;</a>
				<a id="next2" class="next" href="#">&nbsp;</a>
				<input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>
					<input type="hidden" name="divid" value="<?php echo $j?>"/>
				<input type="submit" value="Delete Images" name="imgdelete" class="order_now_bt" ><div class="clear"></div>
			 </form>
			 <script type="text/javascript">
			 $(document).ready(function() {

				 
					//	Responsive layout, resizing the items
					$('#foo4<?php echo $j?>').carouFredSel({
						responsive: true,
						width: '100%',
						scroll: 2,
						auto: false,
						prev: '#prev2',
						next: '#next2',
						
						items: {
							width: 220,
						//	height: '30%',	//	optionally resize item-height
							visible: {
								min: 2,
								max: 6
							}
						}
					});

	})
			 </script>
			 <?php }else { ?>
			<p>No Image Uploaded Yet</p>
			 	<div class="clearfix"></div>
			 <?php }?>
			</div>
            
            
  </div>
  
  <div class="car_info_collm">
    <div class="rep_titles">Fees <a class='inline' href="<?php echo '#inline_content'.$j;?>">Add Fee</a></div>
  <table class="three_collm_tbl">
  <tr>
    <th width="60%">Fee Description</th>
    <th width="20%">Amount</th>
    <th width="20%">Actions</th>
  </tr>
  <?php $feesdetials = $objCommon->read('lead_fee_detail','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($feesdetials);
	if($count > 0)
	{
while($feedetailfetch = mysql_fetch_object($feesdetials))
{ ?>
  <tr>
    <td><?php echo $feedetailfetch->title;?></td>
    <?php if($feedetailfetch->amount < 0){ ?>
    
    <td>-$<?php echo number_format(str_replace('-','',$feedetailfetch->amount),2)?></td>
    <?php }else{ ?>
    <td>$<?php echo number_format($feedetailfetch->amount,2)?></td>
    <?php }?>
    
    <td>
    <a class="iframe"  href="<?php echo DEFAULT_ADMIN_URL?>/edit/editfee.php?id=<?php echo $id?>&fee=<?php echo $feedetailfetch->id;?>&action=editfee"><img src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/images/edit.png" width="20" height="20" alt="Edit"></a>
   
    <a onclick="return confirm('Are you sure want to delete?');"  href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&fee=<?php echo $feedetailfetch->id;?>&action=removefee"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
  </tr>
  <?php }} else { ?>
   <tr>
    <td colspan="3"  >No Fee Added</td>
  </tr>
  <?php }?>

  
  
</table>

  </div>
  
  <div class="car_info_collm">
    <div class="rep_titles">Up Sells <?php if($carfetch->status == '') { ?><a onclick="alert('Please Select & Save Status First')">Add Up Sell</a><?php } else { ?><a class='inline' href="#inline_upsell_content<?php echo $j;?>">Add  Up Sell</a><?php }?></div>
  <table class="three_collm_tbl">
  <tr>
    <th width="50%">Title</th>
    <th width="18%">Amount</th>
    <th width="18%">Date Added</th>
    <th width="14%">Actions</th>
  </tr>
  <?php $upselldetials = $objCommon->read('lead_upsell_details','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($upselldetials);
	if($count > 0)
	{
while($upselldetailfetch = mysql_fetch_object($upselldetials))
{ ?>
  <tr>
    <td><?php echo $upselldetailfetch->title;?></td>
    <td>$<?php echo number_format($upselldetailfetch->amount,2)?></td>
     <td><?php echo date('m-d-Y',strtotime($upselldetailfetch->created_at));?></td>
    <td>
    <a class="iframe"  href="<?php echo DEFAULT_ADMIN_URL?>/edit/editupsell.php?id=<?php echo $id?>&upsell=<?php echo $upselldetailfetch->id;?>&action=editupsell"><img src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/images/edit.png" width="20" height="20" alt="Edit"></a>
    <a onclick="return confirm('Are you sure want to delete?');"  href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&upsell=<?php echo $upselldetailfetch->id;?>&action=removeupsell"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
  </tr>
  <?php }} else { ?>
   <tr>
    <td colspan="4"  >No Upsell Added</td>
  </tr>
  <?php }?>
  
  
  
  
</table>

  </div>
    <div class="car_info_collm">
    <div class="rep_titles">Documents <a class='inline' href="#inline_doc_content<?php echo $j;?>">Add Documents</a></div>
  <table class="three_collm_tbl">
  <tr>
    <th width="50%">Document Title</th>
    <th width="18%">File Name</th>
    <th width="18%">Date Added</th>
    <th width="14%">Actions</th>
  </tr>
  <?php if($carfetch->mail_sent == 2 ){ ?>
    <td>Contract Document</td>
    <td>Contract Document</td>
       <td><?php echo date('m/d/Y',strtotime($carfetch->sign_date));?></td>
  <td> <a title="Download PDF" href="<?php echo DEFAULT_URL;?>/pdf.php?id=<?php echo $id;?>&lead_id=<?php echo $carfetch->id;?>" target="_blank"><img src="<?php echo DEFAULT_ADMIN_URL;?>/file_extension_pdf.png" style="vertical-align: bottom;"></a> <?php }?>
   </td> 
  <?php $docdetials = $objCommon->read('lead_doc_details','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($docdetials);
	if($count > 0)
	{
while($docdetailfetch = mysql_fetch_object($docdetials))
{ ?>
  <tr>
    <td><?php echo $docdetailfetch->doctitle;?></td>
    <td><?php echo $docdetailfetch->docname;?></td>
       <td><?php echo date('m/d/Y',strtotime($docdetailfetch->date));?></td>
    <td>
    
    <a class="iframe"  href="<?php echo DEFAULT_ADMIN_URL?>/edit/editdocument.php?id=<?php echo $id?>&document=<?php echo $docdetailfetch->id;?>&action=editdocument"><img src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/images/edit.png" width="20" height="20" alt="Edit"></a>
    <a onclick="return confirm('Are you sure want to delete?');"  href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&doc=<?php echo $docdetailfetch->id;?>&action=removedoc"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
  </tr>
  <?php }} elseif($carfetch->mail_sent != 2) { ?>
   <tr>
    <td colspan="4"  >No Document Added</td>
  </tr>
  <?php }?>
  
  
  
  
</table>

  </div>
   <div class="car_info_collm">
    <div class="rep_titles">Contacts <a class='inline' href="#inline_contact_content<?php echo $j;?>">Add Contacts</a></div>
  <table class="three_collm_tbl">
  <tr>
    <th width="20%">Name</th>
    <th width="16%">Title</th>
    <th width="16%">Phone</th>
    <th width="34%">Email</th>
    <th width="14%">Actions</th>
  </tr>
   <?php $contactdetials = $objCommon->read('lead_contact_details','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($contactdetials);
	if($count > 0)
	{
while($contactdetailfetch = mysql_fetch_object($contactdetials))
{ ?>
  <tr>
   <td><?php echo $contactdetailfetch->name;?></td>
    <td><?php echo $contactdetailfetch->title;?></td>
    <td><?php echo $contactdetailfetch->phone?></td>
    <td><a href="mailto:<?php echo $contactdetailfetch->email?>"><?php echo $contactdetailfetch->email?></a></td>
       <td>
       <a class="iframe"  href="<?php echo DEFAULT_ADMIN_URL?>/edit/editcontact.php?id=<?php echo $id?>&contact=<?php echo $contactdetailfetch->id;?>&action=editcontact"><img src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/images/edit.png" width="20" height="20" alt="Edit"></a>
       <a onclick="return confirm('Are you sure want to delete?');"  href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&con=<?php echo $contactdetailfetch->id;?>&action=removecontact"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
 
  </tr>
  <?php }} else { ?>
   <tr>
    <td colspan="5"  >No Contacts Added</td>
  </tr>
  <?php }?>
  
</table>

  </div>
  
   <div class="car_info_collm">
    <div class="rep_titles">Announcements <a class='inline' href="#inline_announce_content<?php echo $j;?>">Add Announcements</a></div>
  <table class="three_collm_tbl">
  <tr>
    <th width="18%%">Date</th>
    <th width="46%">Message</th>
    <th width="18%">Location</th>
    <th width="18%">Actions</th>
  </tr>
   <?php $announcedetials = $objCommon->read('lead_announce_details','lead_detail_id='.$carfetch->id);
	$count = mysql_num_rows($announcedetials);
	if($count > 0)
	{
while($announcedetailfetch = mysql_fetch_object($announcedetials))
{ ?>
  <tr>
   <td><?php echo $announcedetailfetch->created_at;?></td>
    <td><?php echo $announcedetailfetch->desc;?></td>
    <td><?php echo $announcedetailfetch->location?></td>
    <td>
    <a class="iframe"  href="<?php echo DEFAULT_ADMIN_URL?>/edit/editannounce.php?id=<?php echo $id?>&announce=<?php echo $announcedetailfetch->id;?>&action=editannounce"><img src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/images/edit.png" width="20" height="20" alt="Edit"></a>
    <a onclick="return confirm('Are you sure want to delete?');" href="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php?id=<?php echo $id?>&announce=<?php echo $announcedetailfetch->id;?>&action=removeannounce"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.png" width="20" height="20" alt="Remove"></a></td>
  </tr>
  <?php }} else { ?>
   <tr>
    <td colspan="4"  >No Announcement Added</td>
  </tr>
  <?php }?>
  
</table>

  </div>
      <!--end tab id  -->
      </div>
    
      	<div style="display:none">
   	
 <div class="account_box no_bdr" id="inline_content<?php echo $j;?>">
    <div class="pop_titles">Add Fees </div>
    <?php /*?><form method="post" onsubmit="return feescheck(<?php echo $j;?>)"><?php */?>
     <script type="text/javascript">

     function enableText(checkBool, textID)
     {
       textFldObj = document.getElementById(textID);
       //Disable the text field
       textFldObj.disabled = !checkBool;
       //Clear value in the text field

      /* if(checkBool){
    	   var price = /^\d+\.\d{2}$/;
    	  alert(document.getElementById(textID).value);
    	   if(!price.test(document.getElementById(textID).value))
    	  	{
    	  		alert("Please Enter valid Price eg 23.00");
    	  		return false;
    	  	}
    	   return true;
           }*/
       
     }

     function feescheckfunction(){

        		 var $b = $('input[type=checkbox]');
        	
        		if($b.filter(':checked').length == 0)
        	    {
        	        alert("please select at least one fees");return false;
        		}else{
                    return true;
        	    }

    	 
     }


     function isNumber(evt) {
    	    evt = (evt) ? evt : window.event;
    	    var charCode = (evt.which) ? evt.which : evt.keyCode;
    	    //if (charCode > 31 && charCode !=46 && (charCode < 48 || charCode > 57)) {
    	    //if (charCode > 31 && charCode !=46 && (charCode < 48 || charCode > 57)) {
    	    if (charCode != 45 && charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
    	        return false;
    	    }
    	    return true;
    	}
     
    </script>
    
    
    
    <form method="post" name="feesform" id="feesform" onsubmit="return feescheckfunction()" >
    
       <table class="three_collm_tbl" id="feestable">
  <tr>
    <td width="50%"><strong>Fee Name</strong></td>
    <td width="30%"><strong>Price</strong></td>
    <td width="20%"><strong>&nbsp;</strong></td>
  </tr>
  
 

    
     <?php 
      mysql_data_seek($feeinfo,0);
      $k=0;
      while($feefetch = mysql_fetch_object($feeinfo)) {?>
       <tr>  <td><?php echo $feefetch->title;?></td>
         
        <td> <input type="text" id="feesamount<?php echo $j.$k;?>" name="amount[]" value="<?php echo $feefetch->fees;?>" class="input_acc02" disabled="disabled" onkeypress="return isNumber(event)"></td>
         <td><input type="checkbox" id="feesamountcheck<?php echo $j;?>" name="amountcheck[]" value="<?php echo $feefetch->title;?>" class="checkboxenabled" onclick="enableText(this.checked, 'feesamount<?php echo $j.$k;?>');"></td>
        </tr>
          
      <?php $k++; }?>

  
    
    <?php /*?><li><span class="left_text"> Fee type: </span>
    
    <select name="title" id="feestitle<?php echo $j;?>" class="select_acc03" onchange="amountfill(<?php echo $j;?>)">
    <option value="">Please Select</option>
    
     <?php 
      mysql_data_seek($feeinfo,0);
      while($feefetch = mysql_fetch_object($feeinfo)) {?>
         <option value="<?php echo str_replace(",","",$feefetch->fees).'~'.$feefetch->title?>" <?php if($feefetch->id == $title) { ?> selected="selected" <?php }?>><?php echo $feefetch->title;?></option>
      <?php }?>
    </select></li> 
    <li><span class="left_text">Amount: </span><input type="text" id="feesamount<?php echo $j;?>" name="amount" value="" class="input_acc00"></li>
    <?php */?>
    
    
    
      
      <tr>
      <td colspan="3"> <span class="left_text"> </span>
    <input type="hidden" name="feehid" value="feeshid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Fees to Contract"></td>
      </tr>

  
  


  
  
</table> 
  
    </form>
    </div>
</div>








  	<div style="display:none">
 <div class="account_box no_bdr" id="inline_upsell_content<?php echo $j;?>">
    <div class="pop_titles">Add A Up Sell </div>
    <form method="post" onsubmit="return upsellcheck(<?php echo $j;?>)">
    <ul>
    <li id="upsellerror<?php echo $j;?>" style="display: none;"></li>
    <?php  $upsellinfo = $objCommon->read('upsell',"status_id = '$carfetch->status' and status = 1");
    if(mysql_num_rows($upsellinfo) > 0 ){
    ?>
    <li><span class="left_text"> Up Sell: </span>
    <select name="upsell" id="upselltitle<?php echo $j;?>" class="select_acc03" onchange="upsellfill(<?php echo $j;?>)">
    <option value="">Please Select</option>
     <?php 
    
     while($upsellfetch = mysql_fetch_object($upsellinfo)) {?>
         <option value="<?php echo str_replace(",","",$upsellfetch->fees).'~'.$upsellfetch->title.'~'.$upsellfetch->desc?>"><?php echo $upsellfetch->title;?></option>
      <?php }?>
    </select></li>    
    <li><span class="left_text">Description: </span><input type="text" id="upselldesc<?php echo $j;?>" name="desc" value="" class="input_acc02"></li>
    <li><span class="left_text">Amount: </span><input type="text" id="upsellamount<?php echo $j;?>" name="amount" value="" class="input_acc00"></li>  
    <li><span class="left_text"> </span>
    <input type="hidden" name="upsellhid" value="upsellhid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Up Sell"></li>
    <?php 
    } else {?>
    <li>No Upsell Available For Status</li>
    <?php }?>
    </ul>
    </form>
    </div>
</div>
     	<div style="display:none">
 <div class="account_box no_bdr" id="inline_contact_content<?php echo $j;?>">
    <div class="pop_titles">Add Contact </div>
    <form method="post" onsubmit="return contactcheck(<?php echo $j;?>)">
    <ul>
    <li id="contacterror<?php echo $j;?>" style="display: none;"></li>
    <li><span class="left_text"> Name: </span>
    <input type="text" name="name" id="contactname<?php echo $j;?>" value="" class="input_acc02"></li>    
    <li><span class="left_text">Title: </span><input type="text" name="title" id="contacttile<?php echo $j;?>" value="" class="input_acc02"></li>
    <li><span class="left_text">Phone: </span><input type="text" id="contactphone<?php echo $j;?>" name="phone" value="" class="input_acc02"></li>  
    <li><span class="left_text">Email: </span><input type="text" id="contactemail<?php echo $j;?>" name="email" value="" class="input_acc02"></li>   
    <li><span class="left_text"> </span>
    <input type="hidden" name="contacthid" value="contacthid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Contact"></li>
    </ul>
    </form>
    </div>
</div> 

<div style="display:none">
 <div class="account_box no_bdr" id="inline_announce_content<?php echo $j;?>">
    <div class="pop_titles">Add Announcement </div>
    <form method="post" onsubmit="return announcecheck(<?php echo $j;?>)">
    <ul>
    <li id="announceerror<?php echo $j;?>" style="display: none;"></li>
     
    <li><span class="left_text">Message: </span><textarea name="desc" id="announcetile<?php echo $j;?>"></textarea></li>
     <li><span class="left_text">Vehicle status: </span><textarea name="stat" id="announcestat<?php echo $j;?>"></textarea></li>
    <li><span class="left_text">Location: </span><input type="text" id="announcephone<?php echo $j;?>" name="phone" value="" class="input_acc02"></li>  
   <li><span class="left_text"> </span>
    <input type="hidden" name="announcehid" value="announcehid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Announcement"></li>
    </ul>
    </form>
    </div>
</div> 



	<div style="display:none">
 <div class="account_box no_bdr" id="inline_gallery_content<?php echo $j;?>">
    <div class="pop_titles">Add Image </div>
    <form method="post" onsubmit="return gallerycheck(<?php echo $j;?>)" enctype="multipart/form-data">
    <ul>
     <li id="galleryerror<?php echo $j;?>" style="display: none;"></li>
  <li>
  <?php /*?>
  
<div id="p_scents<?php echo $j;?>">
 <p>
 

 <input type="file" size="20" id="galleryimage<?php echo $j;?>" class="my_files" name="img[]" value="" />
 </p>

</div> 
    <h2><a id="addScnt" onclick="addimagefunction(<?php echo $j;?>)">Add Another Image</a></h2>
    
    <?php */?>
    
    
    <div class="demo"> 
			<?php
				$uploader=new PhpUploader();
				$uploader->MaxSizeKB=10240;
				$uploader->Name="myuploader";
				$uploader->MultipleFilesUpload=true;
				$uploader->SaveDirectory=LIST_ROOT.'/gallery/';
				$uploader->InsertText="Select multiple files (Max 10M)";
				$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif";	
				$uploader->Render();
				
			?>
					
			<ol id="filelist">
			
			</ol>		
 </div>
    
    
	 </li>		 
  
    <li><span class="left_text"> </span>
    <input type="hidden" name="galleryhid" value="galleryhid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Image"></li>
    </ul>
    </form>
  </div>
</div>



<div style="display:none">
 <div class="account_box no_bdr" id="inline_doc_content<?php echo $j;?>">
    <div class="pop_titles">Add Document </div>
    <form method="post" onsubmit="return doccheck(<?php echo $j;?>)" enctype="multipart/form-data">
    <ul>
     <li id="docerror<?php echo $j;?>" style="display: none;"></li>
     <li><span class="left_text">Document Title: </span><input type="text" name="doctitle" id="doctitle<?php echo $j;?>" /> </li>
    <li><span class="left_text">Document File: </span><input type="file" name="img" id="docimage<?php echo $j;?>" /> </li>
    <li><span class="left_text"> </span>
    <input type="hidden" name="dochid" value="dochid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Document"></li>
    </ul>
    </form>
  </div>
</div>
<div style="display:none">
 <div class="account_box no_bdr" id="inline_content_photo<?php echo $j;?>">
    <div class="pop_titles">Set My Photo</div>
    <form method="post">
    <fieldset>
    <ul class="set_images_wrap">
      <?php 
      $gallerymain = $objCommon->read('car_gallery','status=1');
      $galcnt = 0;
      mysql_data_seek($gallerymain,0);
      while($gallerymainfetch = mysql_fetch_object($gallerymain)) {?>
    <li> <img src="<?php echo DEFAULT_URL?>/gallery/<?php echo $gallerymainfetch->image_name?>" width="180" height="121" alt=" "><span><input type="radio" value="<?php echo $gallerymainfetch->image_name?>" name="img" <?php if($galcnt == 0 ){ ?>  checked='checked' <?php }?> /><?php echo $gallerymainfetch->car_name?></span></li>
    <?php $galcnt++;}?>
</ul>
   <div class="pop_button_gap">
    <input type="hidden" name="gallermainyhid" value="gallermainyhid" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" value="Save" name="submit" class="order_now_bt"></div>
    </fieldset>
    </form>
    </div>
</div>
      
     <?php $j++; }?>

 <div style="display:none">
 <div class="account_box no_bdr" id="inline_addvehicle_content">
    <div class="pop_titles">Add Vehicle </div>
    <form method="post" onsubmit="return addvehiclecheck()">
    <ul>
    <li id="addvehicleerror" style="display: none;"></li>
     
    <li><span class="left_text">Make: </span><input type="text" name="carmake" id="addvehiclemake" value="" class="input_acc02"></li>
    <li><span class="left_text">Model: </span><input type="text" id="addvehiclemodel" name="carmodel" value="" class="input_acc00"></li>  
   <li><span class="left_text"> </span>
    <input type="hidden" name="addvehiclehid" value="addvehiclehid" />
    <input type="hidden" name="lead_id" value="<?php echo $id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Add Vehicle"></li>
    </ul>
    </form>
    </div>
</div>      
      <!--start content_vehicle -->  
  </div>
  
    <!--end vehicle_tabing -->
  
    </div>
      <!--end vehicle_box -->
  </div>
    <!--end sylc_login_box -->
  </div>
<!--end sylc_wrapper -->
</div>




<!--end wrapper -->
</div>

<script type="text/javascript" language="javascript" src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.cookie.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.carouFredSel-6.2.0-packed.js"></script>
<script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/jquery.colorbox.js"></script>

 
 
<!--[if (IE 7)|(IE 8)]>
<script src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 10]>
<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/PIE.js"></script>
<![endif]-->
<script type="text/javascript" language="javascript" src="<?php echo DEFAULT_ADMIN_URL?>/custinfo/js/script.js"></script>

  <script type="text/javascript">
  function infocheck(id)
  {
  var price = /^\d+\.\d{2}$/;
  var yer = /\d{4}/;
  make = 'carmak' + id;
  carmod = 'carmod' + id;
  carpri = 'carpri' + id;
  carstat = 'carstat' + id;
  feror = 'infoerror' + id;
  caryes = 'caryea' + id;
  error = "";
  error1 = "";

  	if(document.getElementById(make).value == '')
  	{
  		error = "Please Enter Make<br/>";
  		
  	}
	if(document.getElementById(carmod).value == '')
  	{
  		error += "Please Enter Model<br/>";
  		
  	}
  	if(!price.test(document.getElementById(carpri).value))
  	{
  		error += "Please Enter valid Price eg 23.00 <br/>";
  		//return false;
  	}
  	if(!yer.test(document.getElementById(caryes).value) || document.getElementById(caryes).value.length > 4)
  	{
  		error += "Please Enter valid Year eg 2013 <br/>";
  		//return false;
  	}
  /*	if(document.getElementById(carstat).value == '')
  	{
  		error += "Please Select Status<br/>";
  		
  	}*/
  	if(error != '')
  	{
  		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
  		document.getElementById(feror).innerHTML = "";
  		document.getElementById(feror).innerHTML = errormsg;
  		document.getElementById(feror).style.display = '';
  		return false;	
  	}
  	else
  	{
  		return true;
  	}
  	
  }
function feescheck(id)
{
//var price = /^\d+\.\d{2}$/;
var price = /^-?[0-9]\d*(.\d+)?$/;
title = 'feestitle' + id;
amnt = 'feesamount' + id;
feror = 'feeserror' + id;
error = "";
error1 = "";

	if(document.getElementById(title).value == '')
	{
		error = "Please Select Title <br/>";
		
	}
	if(!price.test(document.getElementById(amnt).value))
	{
		error += "Please Enter valid Fees Amount eg 23.00";
		//return false;
	}
	if(error != '')
	{
		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
		document.getElementById(feror).innerHTML = "";
		document.getElementById(feror).innerHTML = errormsg;
		document.getElementById(feror).style.display = '';
		return false;	
	}
	else
	{
		return true;
	}
	
}
function amountfill(id)
{
	title = 'feestitle' + id;
	amnt = 'feesamount' + id;
	if(document.getElementById(title).value != '')
	{
	 amont = document.getElementById(title).value.split("~");
	document.getElementById(amnt).value = amont[0];
	}
	
}
function upsellcheck(id)
{
var price = /^\d+\.\d{2}$/;
title = 'upselltitle' + id;
amnt = 'upsellamount' + id;
feror = 'upsellerror' + id;
error = "";
error1 = "";

	if(document.getElementById(title).value == '')
	{
		error = "Please Select Upsell <br/>";
		
	}
	if(!price.test(document.getElementById(amnt).value))
	{
		error += "Please Enter Amount";
		//return false;
	}
	if(error != '')
	{
		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
		document.getElementById(feror).innerHTML = "";
		document.getElementById(feror).innerHTML = errormsg;
		document.getElementById(feror).style.display = '';
		return false;	
	}
	else
	{
		return true;
	}
	
}
function upsellfill(id)
{
	title = 'upselltitle' + id;
	amnt = 'upsellamount' + id;
	desc = 'upselldesc' + id;
	if(document.getElementById(title).value != '')
	{
	 amont = document.getElementById(title).value.split("~");
	document.getElementById(amnt).value = amont[0];
	document.getElementById(desc).value = amont[2];
	}
	
}
function contactcheck(id)
{
	var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		var ph = /(^\d{10}$)|(^\d{3}-\d{3}-\d{4}$)/; 
title = 'contacttile' + id;
name = 'contactname' + id;
phone = 'contactphone' + id;
email = 'contactemail' + id;
feror = 'contacterror'+id;
error = "";
if(document.getElementById(name).value == '')
{
	error = "Please Enter Name<br/>";
	
}
	if(document.getElementById(title).value == '')
	{
		error += "Please Enter Title <br/>";
		
	}
	if(document.getElementById(phone).value == '')
	{
		error += "Please Enter Phone Number <br/>";
		//return false;
	}
	if(!ck_email.test(document.getElementById(email).value))
	{
		error += "Please Enter a valid Email <br/>";
		//return false;
	}
	if(error != '')
	{
		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
		document.getElementById(feror).innerHTML = "";
		document.getElementById(feror).innerHTML = errormsg;
		document.getElementById(feror).style.display = '';
		return false;	
	}
	else
	{
		return true;
	}
	
}
function announcecheck(id)
{
	var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		var ph = /(^\d{10}$)|(^\d{3}-\d{3}-\d{4}$)/; 
desc = 'announcetile' + id;

phone = 'announcephone' + id;

stat = 'announcestat' + id;

feror = 'announceerror'+id;
error = "";
if(document.getElementById(desc).value == '')
{
	error = "Please Enter Message<br/>";
	
}

if(document.getElementById(stat).value == '')
{
	error += "Please Enter vehicle status<br/>";
	
}
	if(document.getElementById(phone).value == '')
	{
		error += "Please Enter Location <br/>";
		//return false;
	}
	
	if(error != '')
	{
		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
		document.getElementById(feror).innerHTML = "";
		document.getElementById(feror).innerHTML = errormsg;
		document.getElementById(feror).style.display = '';
		return false;	
	}
	else
	{
		return true;
	}
	
}
function gallerycheck(id)
{
error = "";
feror = 'galleryerror'+id;
var extensions = new Array("jpg","jpeg","gif","png");
img = 'galleryimage' + id;
image_file = document.getElementById(img);
var image_length = image_file.value.length;
var pos = image_file.value.lastIndexOf('.') + 1;
var ext = image_file.value.substring(pos, image_length);
var final_ext = ext.toLowerCase();
for (i = 0; i < extensions.length; i++)
{
    if(extensions[i] == final_ext)
    {
    return true;
    }
}
error = "You must upload an image file with one of the following extensions: "+ extensions.join(', ') +".";
errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
document.getElementById(feror).innerHTML = "";
document.getElementById(feror).innerHTML = errormsg;
document.getElementById(feror).style.display = '';
return false;
}

function doccheck(id)
{
error = "";
feror = 'docerror'+id;
var extensions = new Array("pdf","doc","docx","txt");
title = 'doctitle' + id;
img = 'docimage' + id;
if(document.getElementById(title).value == '')
{
	error = "Please Enter Title<br/>";
	
}
image_file = document.getElementById(img);
var extension = 0;
var image_length = image_file.value.length;
var pos = image_file.value.lastIndexOf('.') + 1;
var ext = image_file.value.substring(pos, image_length);
var final_ext = ext.toLowerCase();
for (i = 0; i < extensions.length; i++)
{
    if(extensions[i] == final_ext)
    {
    	extension = 1;
		break;
    }
}
if(extension == 0) {
error += "You must upload an image file with one of the following extensions: "+ extensions.join(', ') +".";
}
if(error != '') {
errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
document.getElementById(feror).innerHTML = "";
document.getElementById(feror).innerHTML = errormsg;
document.getElementById(feror).style.display = '';
return false;
}
else {
	return true;
}
}

function addvehiclecheck()
{
make = 'addvehiclemake';
model = 'addvehiclemodel';
feror = 'addvehicleerror';
error = "";
	if(document.getElementById(make).value == '')
	{
		error = "Please Enter Make <br/>";
		
	}
	if(document.getElementById(model).value == '') 
	{
		error += "Please Enter Model";
		//return false;
	}
	if(error != '')
	{
		errormsg = "<font color='#FF0000' family='verdana' size=2>"+error+"</font>";
		document.getElementById(feror).innerHTML = "";
		document.getElementById(feror).innerHTML = errormsg;
		document.getElementById(feror).style.display = '';
		return false;	
	}
	else
	{
		return true;
	}
	
}
      </script>
      </body>
      </html>