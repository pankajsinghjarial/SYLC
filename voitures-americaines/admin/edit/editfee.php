<?php require_once '../../conf/config.inc.php';
$j = 1;
$edit =  $_GET['fee'];
$feeinfo = $objCommon->read('fees','status=1');
$editfeeinfo = $objCommon->read('lead_fee_detail',"id=$edit");
$editfeefetch = mysql_fetch_object($editfeeinfo);
//echo  $editfeefetch->title; 
?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">


 <div class="account_box no_bdr" id="inline_content_edit<?php echo $j;?>">
    <div class="pop_titles">Edit Fee </div>
    <form method="post" target="_parent" action="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php" onsubmit="return feescheck(<?php echo $j;?>)">
    <ul>
    <li id="feeserror<?php echo $j;?>" style="display: none;"></li>
    <li><span class="left_text"> Fee type: </span>
    <select name="title" id="feestitle<?php echo $j;?>" class="select_acc03" onchange="amountfill(<?php echo $j;?>)">
    <option value="">Please Select</option>
     <?php 
      mysql_data_seek($feeinfo,0);
      while($feefetch = mysql_fetch_object($feeinfo)) {?>
         <option value="<?php echo str_replace(",","",$feefetch->fees).'~'.$feefetch->title?>" <?php if(trim(strtolower($feefetch->title)) == trim(strtolower($editfeefetch->title))) { ?> selected="selected" <?php }?>><?php echo $feefetch->title;?></option>
      <?php }?>
    </select></li>    
  <li><span class="left_text">Amount: </span><input type="text" id="feesamount<?php echo $j;?>" name="amount" value="<?php echo $editfeefetch->amount?>" class="input_acc00"></li>  
    <li><span class="left_text"> </span>
    <input type="hidden" name="action" value="editfeehid" />
    <input type="hidden" name="feeid" value="<?php echo $_GET['fee']?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <input type="submit" class="order_now_bt" name="submit" value="Update Fee"></li>
    </ul>
    </form>
    </div>
    <script type="text/javascript">
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
</script>
<script type="text/javascript">
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
</script>