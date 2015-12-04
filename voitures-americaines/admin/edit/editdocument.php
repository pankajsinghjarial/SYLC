<?php require_once '../../conf/config.inc.php';
$carinfo = $objCommon->read('lead_details','lead_id='.$_GET[id]);
$carfetch = mysql_fetch_object($carinfo);
$j = 1;
$edit =  $_GET['document'];
//$feeinfo = $objCommon->read('fees','status=1');
//$editfeeinfo = $objCommon->read('lead_fee_detail',"id=.$edit");
//$editfeefetch = mysql_fetch_object($editfeeinfo);
//echo  $editfeefetch->title; 
?>
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo DEFAULT_ADMIN_URL?>/custinfo/css/cansole.css" rel="stylesheet" type="text/css" media="all">


<div class="account_box no_bdr" id="inline_doc_content<?php echo $j;?>">
    <div class="pop_titles">Edit Document </div>
    <form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/customer_info.php" onsubmit="return doccheck(<?php echo $j;?>)" enctype="multipart/form-data" target="_parent">
    <ul>
    
    <?php $docdetials = $objCommon->read('lead_doc_details','id='.$edit);
	$count = mysql_num_rows($docdetials);
     $docdetailfetch = mysql_fetch_object($docdetials);//echo "<pre>";print_r($docdetailfetch);
     ?>
    
     <li id="docerror<?php echo $j;?>" style="display: none;"></li>
     <li><span class="left_text">Document Title: </span><input type="text" name="doctitle" id="doctitle<?php echo $j;?>" value="<?php echo $docdetailfetch->doctitle;?>"/> </li>
    <li><span class="left_text">Document File: </span><input type="file" name="editimg" id="docimage<?php echo $j;?>" value=""/> </li>
    <li><span class="left_text"> </span>
    <input type="hidden" name="action" value="editdocumenthid" />
     
    <input type="hidden" name="editdochid" value="<?php echo $_GET['document']?>" />
    <input type="hidden" name="lead_id" value="<?php echo $carfetch->id;?>" />
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
    <input type="submit" class="order_now_bt" name="submit" value="Update Document"></li>
    </ul>
    </form>
  </div>
    <script type="text/javascript">
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
</script>