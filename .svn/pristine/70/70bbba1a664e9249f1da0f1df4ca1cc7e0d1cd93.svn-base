<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Syl Corporation</title>

<link href="../../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />

<link type="text/css" href="../../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />

<style type="text/css">

<!--

body {

	background-image: url(../images/bx-bg.jpg);

}

.style7 {

	font-weight: normal;

	/*font-style: italic;*/

	color: #A8C076;

	font-size: 16px;

	font-family:Arial, Helvetica, sans-serif;

}

.style9 {font-size: 16px; font-weight: bold; color: #A8C076; }

.style12 {color: #A8C076}

.submit {

  background: url('../../images/track_bg.png') no-repeat;

  width: 78px; height: 27px;

  border: 0;

  color: #fff;

  cursor: pointer;

  text-shadow: #63411e 0 1px 0;

  font: bold 12px "Helvetica Neue", Helvetica, Arial, sans-serif;

  line-height: 5px;

  margin: 0 0 0 102px;

}

.submit:hover {

  background-position: 0 -27px;

}

.submit:active {

  background-position: 0 -54px;

}

-->

</style>

</head>

<body>

<div id="wrapper">

  <div id="header">

    <h1>Admin panel configuration</h1>

  </div>

 <?php  include_once LIST_ROOT.'/admin/includes/tabs.php';?>

  <div style="margin:auto; width:500px; height:auto; padding:20px 0 0 0;">

  
   

    <table width="100%" border="0" bgcolor="#fafafa" align="center" cellpadding="0" cellspacing="0" >

      <tr>

        <td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;"><strong>Add Upsell</strong></font></td>

      </tr>
      
       <?php if(isset($errorMsg)) { ?>
<tr>
   <td align="center" bgcolor=#FAFAFA class="style7 style12" style="padding:10px 0;">  <div id="div_success" style="width:100%;padding: 0 0 0 0;text-align:left;"> <?php echo $errorMsg; //unset($_SESSION['msg']); ?> </div></td>
</tr>
   <?php }?>

      <tr>

        <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">

            <tr>

              <td><form method="post" action="">

                  <table width="100%" border="0" cellspacing="2" cellpadding="2">

                    <tr>

                      <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="15%" height="31" align="right"><strong>Title</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td><input type="text" name="title" id="title" value="<?php echo $title?>"/>
 
                            </td>

                          </tr>

                        </table></td>

                    </tr>

                    <tr>

                      <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="15%" height="31" align="right" valign="middle"><strong>Amount</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td><input type="text" name="fees" id="fees" value="<?php echo $fees?>"/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                     <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="15%" height="31" align="right" valign="top"><strong>Description</strong>&nbsp;</td>

                            <td width="5%" valign="top"><strong>:</strong></td>

                            <td><textarea name="desc" cols="30" rows="10"><?php echo $desc?></textarea>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                    <tr>
                      <td width="100%">
                      <table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="15%" height="31" align="right" valign="middle"><strong>Status</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td>
                            <select name="status_id" style="width: 200px">
                            <option value="">Please Select</option>
                           <?php while($fetch=$db->fetchNextObject($stats)) { ?>
                           <option value="<?php echo $fetch->id?>" <?php if($fetch->id == $status_id){?> selected="selected" <?php } ?>><?php echo $fetch->name ?></option>
                           <?php } ?>
                            
                           
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                     <tr>
                      <td width="100%">
                      <table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="15%" height="31" align="right" valign="middle"><strong>Publish</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td ><select name="status" style="width: 200px">
                            <option value="1" <?php if($status == 1){?> selected="selected" <?php } ?>>Yes</option>
                            <option value="0" <?php if($status == 0){?> selected="selected" <?php } ?>>No</option>
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>

                     

                    <tr>

                      <td  align="left">
                      <input class="submit" type="submit" name="submit" value="Submit"/>

                      </td>

                    </tr>

                  </table>

                </form></td>

            </tr>

          </table></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

    </table>

  </div>

</div>

<p class="head-2">&nbsp;</p>

</body>

</html>

