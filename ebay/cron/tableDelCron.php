<?php
$server = "localhost";
$user = "httpsylc_sylcUse";
$pass = "User@123";
$base = "httpsylc_sylc";
mysql_connect($server, $user, $pass) or die('ERROR :: Server connection not possible.');
mysql_select_db($base)               or die('ERROR :: Database connection not possible.');
/* Get Current Date Time Stamp */
echo $currentTimestamp   = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));

$tbl_resultSet =  mysql_query("SELECT tbl_name FROM master_temp WHERE (".$currentTimestamp." - `lastAct`) > 1800 ");
echo '<br>'.mysql_num_rows($tbl_resultSet);
if(mysql_num_rows($tbl_resultSet) > 0){
	while($tbl_row = mysql_fetch_object($tbl_resultSet)){
		echo "<br>DROP TABLE IF EXISTS `".$tbl_row->tbl_name."` <br>";
		echo "DELETE FROM master_temp WHERE `tbl_name` = '".$tbl_row->tbl_name ."'<br>";
		mysql_query("DROP TABLE IF EXISTS `".$tbl_row->tbl_name."`");
		mysql_query("DELETE FROM master_temp WHERE `tbl_name` = '".$tbl_row->tbl_name ."'");
	}
}


//mail("4006@dothejob.org", "cron mail", "testing purpose");