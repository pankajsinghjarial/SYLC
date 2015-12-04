<?php
	require_once "../config/connection.php";
	$sel_query="Select * from leads order by id desc";
	$rs_sel=mysql_query($sel_query) or die(mysql_error());	
	
	if($_POST['id']!="")
	{ 	
		if($_POST['method'] == 'delete')
		{
			 $del_query="delete from leads where id=".$_POST['id'].";";
			 $rs_del=mysql_query($del_query) or die(mysql_error());	
			 header("Location:appointment.php");
		}
		if($_POST['method'] == 'edit')
		{
			header("Location:edit_user_info.php?tid=".$_POST['id']);
		}
	 	
 	}
	if($arr_sel['subscribe'] == '1'){
		$subscribe = "YES";
	}
	else{
		$subscribe = "NO";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mika Beauty:Personalized Skin Care</title>
<script language="javascript">
function Delete (id)
   {
    if( confirm("Are you want to delete ?"))
	{	
	  document.getElementById("id").value =id;
	   document.getElementById("method").value ='delete';
      document.getElementById( "frm_manu_list" ).submit( ) ;
	  
    }	
  }
  
  function Edit (id)
   {    
	  document.getElementById("id").value =id;
	  document.getElementById("method").value ='edit';
      document.getElementById( "frm_manu_list" ).submit( ) ;
    }
  
</script>
<link href="CSS/styles.css" rel="stylesheet" type="text/css" />
<link href="CSS/style-sheet.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/bx-bg.jpg);
}
.style7 {
	font-weight: bold;
	font-style: italic;
	color: #333333;
	font-size: 24px;
}
.style9 {font-size: 16px; font-weight: bold; color: #333333; }
.style12 {color: #FFFFFF}
-->
</style>
</head>
<body background-image: url(images/bg.jpg);>
<table width="100%" border="0" bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td valign="top" ><?php include('head.php');?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><?php include('top_menu.php');?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#000000" class="style7 style12" >Form Information</font></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td><form name="frm_manu_list" id="frm_manu_list" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validform( this ) ;">
              <table width="100%" border="0" cellspacing="2" cellpadding="2" style="border-bottom:thick">
                <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Name</span></td>
                  <td  align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Email</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Mobile No.</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Subscribe</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Page Came From</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Here About Us</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Zip</span></td>
                  <td  align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Date</span></td>
                  <td align="center" bgcolor="#FFFFFF" style="padding:15px 0 0 0" class="wel_text1"><span class="style9">Delete</span></td>
                </tr>
                <tr>
                  <td><?php while($arr_sel=mysql_fetch_array($rs_sel)) 
				                    {
	                                $id=$arr_sel['id'];
	              	?>
                  </td>
                </tr>
                <tr >
                  <td align="center" bgcolor="#0099FF"  ><strong><font color="#FFFFFF"><?php echo($arr_sel['first_name']);?>&nbsp;<?php echo($arr_sel['last_name']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['email']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['phone']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo $subscribe;?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['page_url']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['here_about_us']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['zip']);?></font></strong></td>
                  <td align="center"   bgcolor="#0099FF"><strong><font color="#FFFFFF"><?php echo($arr_sel['date']);?></font></strong></td>
                  <td align="center"  bgcolor="#0099FF" ><a href="javascript:Edit('<?php echo($id);?>')" style="text-decoration:none" ><strong><font color="#FFFFFF">Edit</font></strong></a></td>
                  <td align="center"  bgcolor="#0099FF" ><a href="javascript:Delete('<?php echo($id);?>')" style="text-decoration:none" ><strong><font color="#FFFFFF">Delete</font></strong></a></td>
                </tr>
                <? }?>
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
<p class="head-2">&nbsp;</p>
</body>
</html>
