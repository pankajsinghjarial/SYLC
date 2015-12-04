<?

/********************************************************************/

	

	# Main home page of admin

	include_once('../../conf_superadmin/config.inc.php');



	$loginCheck = new LoginSystem();

 	

	

	if(!$loginCheck->isLoggedIn())	

	{

		echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';

		exit;

	} 

	

/********************************************************************/

	//$mainHandle->mainAdminHead();

?>



<?php include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");   ?>





  <div id="content" >

    <div id="content_main" class="clearfix">

       <div style="width:<?php if(!$_SESSION['template'] || (isset($_GET['switch_template']))) echo'98%';else echo '78%'; ?>; float:left;">

        <div id="dashboard" align="center">

          <h2><font color="#0066FF">Welcome To <?php echo SITE_TITLE_ADMIN; ?><?php //if($_SESSION['template']) echo ' (Template#'.$_SESSION['template'].')'; ?></font></h2>

          </div>
          
		<!--template div start-->
        <script type="text/javascript">
        function validateTemplate()
		{
			if(document.getElementById('template').value=='')
			{
				alert('Please choose the template first');
				return false;
			}
			return true;
		}
        </script>
        
        <?php 
		
		if(!$_SESSION['template'] || (isset($_GET['switch_template']) && $_GET['switch_template']=='yeap'))
		{
		?>
          <div align="center" style="margin-top:20px;">
          <form name="select template" method="post" action="home.php" onsubmit="return validateTemplate()">
          <table style="font-weight:bold;" width="25%">
              <tr>
              	  <td>Select Template</td>
                  <td>
                    <select name="template" id="template">
                    <option value="">Select Template</option>
                    <option value="1">Template1</option>
                    <option value="2">Template2</option>
                     <option value="3">Template3</option>
                    </select>
                  </td>
              </tr>
              <tr>
              	  <td>&nbsp;</td>
              	  <td>&nbsp;</td>
              </tr>
              <tr>
              	  <td>&nbsp;</td>
              	  <td><input type="submit" style="cursor:pointer;" class="submit" id="save" value="Submit" /></td>
              </tr>
          </table>
          </form>	
          </div>
          
          <?php } ?>
		<!--template div end-->
        
      </div>
      
      
      

      
		<?php 
	   if($_SESSION['template'] && (!isset($_GET['switch_template']))){?>
     	<DIV style="width:18%;float:right;">
       <?php
	   if($_SESSION['template']==2){
	   		include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu_template2.php");
		}else if($_SESSION['template']==3){
		include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu_template3.php");
		}else{
	   		include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");
			}	   
	   ?>
      	</DIV>
		<?php } ?>
      <!-- end #sidebar -->

    </div>

   

  </div>

  <!-- end #content -->

  <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   ?>



