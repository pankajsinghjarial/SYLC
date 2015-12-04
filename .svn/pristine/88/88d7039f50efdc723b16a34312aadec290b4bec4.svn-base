<?php require_once '../../conf/config.inc.php';
$carinfo = $objCommon->read('lead_details','lead_id='.$_GET[id]);
$carfetch = mysql_fetch_object($carinfo);
$j = 1;
$edit =  $_GET['contact'];
//$feeinfo = $objCommon->read('fees','status=1');
//$editfeeinfo = $objCommon->read('lead_fee_detail',"id=$edit");
//$editfeefetch = mysql_fetch_object($editfeeinfo);
//echo  $editfeefetch->title; 
?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">


 <div class="account_box no_bdr" id="inline_contact_content<?php echo $j;?>">
    <div class="pop_titles">Edit Contact </div>
    <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php" onsubmit="return contactcheck(<?php echo $j;?>)" target="_parent">
    
    <?php $contactdetials = $objCommon->read('lead_contact_details','id='.$edit);
	$count = mysql_num_rows($contactdetials);
	$contactdetailfetch = mysql_fetch_object($contactdetials);
	//echo "<pre>";print_r($contactdetailfetch);die;
	?>
	
    <ul>
    <li id="contacterror<?php echo $j;?>" style="display: none;"></li>
    <li><span class="left_text"> Name: </span>
    <input type="text" name="editname" id="contactname<?php echo $j;?>" value="<?php echo $contactdetailfetch->name;?>" class="input_acc02"></li>    
    <li><span class="left_text">Title: </span><input type="text" name="edittitle" id="contacttile<?php echo $j;?>" value="<?php echo $contactdetailfetch->title;?>" class="input_acc02"></li>
    <li><span class="left_text">Phone: </span><input type="text" id="contactphone<?php echo $j;?>" name="editphone" value="<?php echo $contactdetailfetch->phone?>" class="input_acc02"></li>  
    <li><span class="left_text">Email: </span><input type="text" id="contactemail<?php echo $j;?>" name="editemail" value="<?php echo $contactdetailfetch->email?>" class="input_acc02"></li>   
    <li><span class="left_text"> </span>
    <input type="hidden" name="action" value="editcontacthid" />
    <input type="hidden" name="editcontacthid" value="<?php echo $_GET['contact']?>" />
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Update Contact"></li>
    </ul>
    </form>
    </div>
    <script type="text/javascript">
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
</script>