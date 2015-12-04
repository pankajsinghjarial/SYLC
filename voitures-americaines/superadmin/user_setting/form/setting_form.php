<?php
/********************************************************************************

#coder : Kapil Verma
/********************************************************************************/
?>

<div id="content" >

    

    <div id="content_main" class="clearfix">

	

   <div class="left_admin">

        <div id="dashboard"><span class="page_head">Account Information</span></div>

        <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="account_form" id="account_form" > 

        <fieldset id="personal">

        <legend>Edit Your Account Information</legend>

        <?php echo $errorMsg;?>
        <?php  if($_SESSION['msg_main']!=''){ ?><font color="#FF0000"><b><?= $_SESSION['msg_main']; ?></b></font><? } unset($_SESSION['msg_main']);  ?>

			<table width="100%" border="0" cellspacing="8" cellpadding="0" class="form">

	<tr>

		<td width="25%" align="left" valign="top">First Name<font color="#FF0000">*</font>:</td>

		<td width="75%" align="left" valign="top"><input name="fname" id="fname" type="text" class="text_box1" value="<?= $fname ;?>" /></td>

	</tr>

	<tr>

		<td align="left" valign="top">Last Name<font color="#FF0000">*</font>:</td>

		<td align="left" valign="top"><input name="lname" id="lname" type="text" value="<?= $lname ;?>" class="text_box1"/></td>

	</tr>   
   

	<tr>

		<td align="left" valign="top">Phone<font color="#FF0000">*</font>:</td>

		<td align="left" valign="top"><input name="phone" id="phone" type="text" value="<?= $phone ;?>" class="text_box1"/></td>

	</tr>
    
    <tr>

		<td align="left" valign="top">Address<font color="#FF0000">*</font>:</td>

		<td align="left" valign="top"><input name="address" id="address" type="text" value="<?= $address ;?>" class="text_box1"/>
        </td>

	</tr>
    
    <tr>

		<td align="left" valign="top">Email<font color="#FF0000">*</font>:</td>

		<td align="left" valign="top"><input name="email" id="email" type="text" value="<?= $email ;?>" class="text_box1"/>
        </td>

	</tr>

			</table>

			<br /> <br />

          <input name="submit1" type="submit" value="submit"/>

          </fieldset>

         </form>

		   <br /> 

          <br />

           

          </fieldset>

         

		 

		 

		  <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="login_form" id="login_form" >

		 	  

        <fieldset id="personal">

          <legend>Change Login Information </legend>

          <?= $errorMsg2;?>

            <?php  if($_SESSION['msg']!=''){ ?><font color="#FF0000"><b><?= $_SESSION['msg']; ?></b></font><? } unset($_SESSION['msg']);  ?>

			<br />

			<table width="100%" border="0" cellspacing="8" cellpadding="0" class="form">

			<tr>

					<td width="25%" align="left" valign="top">Username<font color="#FF0000">*</font>:</td>

					<td width="75%" align="left" valign="top"><input name="username" id="username" type="text"  value="<?= $username;?>"  class="text_box1" /></td>

				</tr>

				<tr>

					<td  align="left" valign="top">Old Password<font color="#FF0000">*</font>:</td>

					<td align="left" valign="top"><input name="old_password" id="old_password" type="password" <?php if(isset($submit2)){?> value="<?= $old_password;?>" <?php } ?> class="text_box1" />

					<input type="hidden" name="password" id="password" value="<?= $password ?>" />

					

					</td>

				</tr>

				<tr>

					<td align="left" valign="top">New Password<font color="#FF0000">*</font>:</td>

					<td align="left" valign="top"><input name="new_password" id="new_password" type="password" <?php if(isset($submit2)){?> value="<?= $new_password;?>" <?php } ?> class="text_box1"/></td>

				</tr>

				<tr>

					<td align="left" valign="top">Confirm Password<font color="#FF0000">*</font>:</td>

					<td align="left" valign="top"><input name="new_password_again" id="new_password_again" type="password" <?php if(isset($submit2)){?> value="<?= $new_password_again;?>" <?php } ?> class="text_box1"/></td>

				</tr>

			</table>

			<br /> 

			<br />

          <input name="submit2" type="submit" value="submit"/>

          </fieldset>

          </form>

		   <br /> 

          <br />

           

          </fieldset>

      </div>

 



      <DIV class="right_admin">

      

      
       <?php
	   if($_SESSION['template'] && $_SESSION['template']==2){
	   		include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu_template2.php");
			}
	   else{
	   		include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");
			}	   
	   ?>
      

       <?php //include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>



      </DIV>

      <!-- end #sidebar -->

    </div>

    

  </div>

