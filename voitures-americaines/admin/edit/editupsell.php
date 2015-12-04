<?php require_once '../../conf/config.inc.php';
$carinfo = $objCommon->read('lead_details','lead_id='.$_GET[id]);
$carfetch = mysql_fetch_object($carinfo);
$j = 1;
$edit =  $_GET['upsell'];

$upselldetials = $objCommon->read('lead_upsell_details','id='.$edit);
$upselldetailfetch = mysql_fetch_object($upselldetials);
//$feeinfo = $objCommon->read('fees','status=1');
//$editfeeinfo = $objCommon->read('lead_fee_detail',"id=$edit");
//$editfeefetch = mysql_fetch_object($editfeeinfo);

//echo  $editfeefetch->title; 
?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">



 <div class="account_box no_bdr" id="inline_upsell_content<?php echo $j;?>">
    <div class="pop_titles">Edit Up Sell </div>
    <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php" onsubmit="return upsellcheck(<?php echo $j;?>)"  target="_parent">
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
         <option value="<?php echo str_replace(",","",$upsellfetch->fees).'~'.$upsellfetch->title.'~'.$upsellfetch->desc?>" <?php if($upselldetailfetch->title == $upsellfetch->title) { ?> selected="selected" <?php } ?>><?php echo $upsellfetch->title;?></option>
      <?php }?>
    
    </select></li>    
    <li><span class="left_text">Description: </span><input type="text" id="upselldesc<?php echo $j;?>" name="desc" value="<?php echo $upselldetailfetch->desc;?>" class="input_acc02"></li>
    <li><span class="left_text">Amount: </span><input type="text" id="upsellamount<?php echo $j;?>" name="amount" value="<?php echo number_format($upselldetailfetch->amount,2)?>" class="input_acc00"></li>  
    <li><span class="left_text"> </span>
    <input type="hidden" name="action" value="editupsellhid" />
    <input type="hidden" name="upsellid" value="<?php echo $_GET['upsell']?>">
    <input type="hidden" name="editupsellhid" value="editupsellhid" />
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Update Up Sell"></li>
    <?php 
    } else {?>
    <li>No Upsell Available For Status</li>
    <?php }?>
    </ul>
    </form>
    </div>

    

    <script type="text/javascript">
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
</script>