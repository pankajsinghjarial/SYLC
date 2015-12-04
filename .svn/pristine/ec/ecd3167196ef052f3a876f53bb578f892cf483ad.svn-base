<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<?php /*?><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><?php */?>

<title>Syl Corporation</title>



<link href="../../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />

		<link type="text/css" href="../../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />

<script type="text/javascript" src="../js/jquery.js"></script>
<?php /*?>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>


<script>
   $(document).ready(function(){
    $(".inline").colorbox({inline:true, width:"35%"});
    $(".ajax").colorbox({height:"110%"});
    
    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function(){ 
     $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
     return false;
    });
   });
   
</script>
<?php */?>

<style type="text/css">

<!--



.style7 {

	font-weight: normal;

	/*font-style: italic;*/

	color: #A8C076;

	font-size: 16px;

}

.style9 {font-size: 12px; font-weight: bold; color: #000000; }

.style12 {color: #A8C076}

-->

</style>

</head>
<body >



 <div id="wrapper">

         <div id="header">

            <h1>Admin panel configuration</h1>

         </div>

         

        <?php  include_once LIST_ROOT.'/admin/includes/tabs.php';?>

<?php if(isset( $_SESSION['msg'])) { ?>		 
<div id="div_success" style="width:100%;text-align:center;"> <font color="#FF0000"><b><?php ECHO  $_SESSION['msg']; UNSET( $_SESSION['msg']);?></b></font></div>
<?php }?>
<table width="100%" border="0" bgcolor="#747474" align="center" cellpadding="0" cellspacing="0"  style="margin-top:20px;">

  

  <tr>
   
    <?php /*?><td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;" ><strong>Information Des Clients</strong></font></td><?php */?>
<td bgcolor="#747474" class="style7 style12" style="padding:10px 0;" >
<table width="100%">
<tr>
<td align="left" width="60%" style="color: #A8C076;"><strong>Fees Manager</strong></td>
<td><div style="float:right;"><a href="<?php echo DEFAULT_ADMIN_URL?>/fees/add.php"><img align="absmiddle" title="Add New" src="<?php echo DEFAULT_ADMIN_URL?>/images/plus.jpg"></a></div></td>
</tr>

</table>

</td>
  </tr>

  <tr>

    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">

        <tr>

          <td><form name="frm_manu_list" id="frm_manu_list" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validform( this ) ;">
				
              <table width="100%" border="0" cellspacing="2" cellpadding="2" style="border-bottom:thick" id="example_sort_gallery">
			<thead>
			<tr>
              <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Title</span></th>
             
          <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Amount</span></th>

                   <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Status</span></th>
                     <th align="center" bgcolor="#A8C076" style="padding:10px 0;" class="wel_text1"><span class="style9">Action</span></th>

                </tr>
           </thead>
                <?php while($arr_sel=mysql_fetch_array($statusInfo)) 

				                    {

	                                 $id=$arr_sel['id']; 
	              	?>
 
                 

                <tr >
                   <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php echo($arr_sel['title']);?></font></strong></td>
                 <?php /*?> <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php echo($arr_sel['first_name']);?></font></strong></td>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666">$<?php echo($arr_sel['fees']);?></font></strong></td><?php */?>
                  <?php if($arr_sel['fees'] < 0 ){?>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666">-$<?php echo str_replace('-','',$arr_sel['fees']);?></font></strong></td>
                  <?php }else{?>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666">$<?php echo($arr_sel['fees']);?></font></strong></td>
                  <?php }?>
                  <td align="center" bgcolor="#fafafa" style="padding:5px;"><strong><font color="#666666"><?php if($arr_sel['status'] == 1){  echo 'Active'; } else { echo "Deactive"; }?></font></strong></td>
<td align="center" bgcolor="#fafafa" style="padding:5px;"><a href="<?php echo DEFAULT_URL?>/admin/fees/edit.php?pid=<?php echo $id;?>&action=edit" title="Edit"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/edit.gif" /></a>&nbsp;&nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure want to delete?');" href="<?php echo DEFAULT_ADMIN_URL?>/fees/index.php?pid=<?php echo $id;?>&action=delete" title="Delete"><img src="<?php echo DEFAULT_ADMIN_URL?>/images/delete.gif" /></a></td>
                  
				  
                </tr>
                


                <?php }?>

              </table>
   
              <!-- Hiddend Field For Delete -->

              <input type="hidden" id="id" name="id" value=" " />

              <input type="hidden" id="method" name="method" value=" " />
              
              

            </form></td>

        </tr>

      </table></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>

</div>
<?php echo $pagination;?>
<p class="head-2">&nbsp;</p>

           
                                

</body>

</html>
