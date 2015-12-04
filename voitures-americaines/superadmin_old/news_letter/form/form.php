<?php
/********************************************************************************

#coder : Keshav Sharma
/********************************************************************************/
?>

<div id="content" >

    

    <div id="content_main" class="clearfix">

	

   <div style="width:78%; float:left;">

        <div id="dashboard"><span class="page_head">News Letter</span></div>

        <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="account_form" id="account_form" > 

        <fieldset id="personal">

        <legend>News-letter Data</legend>

        <?php echo $errorMsg;?>
        <?php  if($_SESSION['msg_main']!=''){ ?><font color="#FF0000"><b><?= $_SESSION['msg_main']; ?></b></font><? } unset($_SESSION['msg_main']);  ?>

			<table width="500" border="0" cellspacing="8" cellpadding="0" class="form">

	<tr>

		<td align="left" valign="top"><textarea rows="20" cols="110"><?=$full_data?></textarea></td>

	</tr>

			</table>

          </fieldset>

         </form>

		   <br /> 

          <br />

           

          </fieldset>
           

          </fieldset>

      </div>

 



      <DIV style="width:18%;float:right;">

      

      

      

       <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>



      </DIV>

      <!-- end #sidebar -->

    </div>

    

  </div>

