<?php //require_once '/home/ladilapp/public_html/sylc-corporation/voiture/conf/config.inc.php';
    session_start();
extract($_POST);
if($page == 'logout') {
	$_SESSION['loginuser']=array();
	unset($_SESSION['loginuser']['username']);
	//session_destroy();	
}else {

$con = mysqli_connect("192.168.0.238","syl","NetsoL_123");
// Check connection
if (!$con)
{
	echo "Failed to connect to mysqli: ";
}
mysqli_select_db($con, "sylcexpo_sylcorp");
$pass = md5($id);
$result = mysqli_query($con,"SELECT * FROM users where username = '$page' and password = '$pass'");
if(mysqli_num_rows($result) > 0 )
{
	$row = mysqli_fetch_object($result);
	$_SESSION['loginuser'] = array('id'=>$row->id,'username'=>$row->username,'popup'=>1);

	/*if(isset($_SESSION['loginuser']['id'])) {
		$loginid = $_SESSION['loginuser']['id'];
		$concar=mysqli_connect("localhost","sylcexpo_syadmin","admin1234");
		// Check connection
		mysqli_select_db('sylcexpo_sylcorp',$concar);
		$result1 = mysqli_query("select l.*,ld.* from lead_details as ld left join leads as l on l.id=ld.lead_id where l.user_id = '$loginid'");
		if(mysqli_num_rows($result1) > 0 ) {
			//if(mysqli_num_rows($result1) == 1) {
			     $row1 = mysqli_fetch_object($result1);?>
				<script type="text/javascript">location.href = 'http://www.sylc-export.com/voitures-americaines/landing.php?lead_detail=<?php echo $row1->id ?>';</script> <?php 
				// } 
			    }
			}*/



	?>
	<script type="text/javascript">
	location.reload();
	</script>

	<?php
    //print_r($_SESSION);
}
else {
	echo "<font color='#FF0000' family='verdana' size=2> Nom d'utilisateur et Mot de passe ne correspondent pas </font>";
}

} ?>
