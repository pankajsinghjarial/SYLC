<?php require_once '../../conf/config.inc.php';
$carinfo = $objCommon->read('lead_details','lead_id='.$_GET[id]);
$carfetch = mysql_fetch_object($carinfo);
$j = 1;
$edit =  $_GET['announce'];
//$feeinfo = $objCommon->read('fees','status=1');
//$editfeeinfo = $objCommon->read('lead_fee_detail',"id=$edit");
//$editfeefetch = mysql_fetch_object($editfeeinfo);
//echo  $editfeefetch->title; 
?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">


<div class="account_box no_bdr" id="inline_announce_content<?php echo $j;?>">
    <div class="pop_titles">Edit Announcement </div>
    <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php" onsubmit="return announcecheck(<?php echo $j;?>)" target="_parent">
    <ul>
    <li id="announceerror<?php echo $j;?>" style="display: none;"></li>
     
     <?php $announcedetials = $objCommon->read('lead_announce_details','id='.$edit);
	$count = mysql_num_rows($announcedetials);
	$announcedetailfetch = mysql_fetch_object($announcedetials)?>
     
    <li><span class="left_text">Message: </span><textarea name="desc" style="height: 68px;width: 61%;" id="announcetile<?php echo $j;?>"><?php echo $announcedetailfetch->desc;?></textarea></li>
     <li><span class="left_text">Vehicle status: </span><textarea name="stat" style="height: 68px;width: 61%;" id="announcestat<?php echo $j;?>"><?php echo $announcedetailfetch->stat;?></textarea></li>
    <li><span class="left_text">Location: </span><input type="text" id="announcephone<?php echo $j;?>" name="phone" value="<?php echo $announcedetailfetch->location;?>" class="input_acc02"></li>  
   <li><span class="left_text"> </span>
   <input type="hidden" name="action" value="editannouncehid" />
    <input type="hidden" name="editannouncehid" value="<?php echo $_GET['announce']?>" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Update Announcement"></li>
    </ul>
    </form>
    </div>
    <script type="text/javascript">
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
    	error += "Please Enter Vehicle status<br/>";
    	
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
</script>