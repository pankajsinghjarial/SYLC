<?php 
include_once("../../conf/config.inc.php");

//Checking admin login or not
if(!isset($_SESSION['gold_admin'])){
    echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/login.php";</script>';
	exit;
}

/*

$row = 1;
if (($handle = fopen("temp-uploads/status1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

exit;*/

include_once(LIST_ROOT_ADMIN."/status/code/edit_code.php"); 
?><link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon" type="image/ico" ><?php
include(LIST_ROOT_ADMIN."/status/form/edit_form.php");  
 
//include(LIST_ROOT_ADMIN."/includes/views/admin_footer.php");  
?>