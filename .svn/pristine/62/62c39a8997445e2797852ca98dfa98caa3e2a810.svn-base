<?php


if (getenv(HTTP_X_FORWARDED_FOR)) {
	$pipaddress = getenv(HTTP_X_FORWARDED_FOR);
	$ipaddress = getenv(REMOTE_ADDR);
	echo "Your Proxy IP address is : ".$pipaddress. " (via $ipaddress) " ;
} else {
	$ipaddress = getenv(REMOTE_ADDR);
	echo "My IP address is : $ipaddress";
}
$country = getenv(GEOIP_COUNTRY_NAME);
echo "<br />My Country : $country";

die;


ini_set('upload_max_filesize', '200M');
echo ini_get('upload_max_filesize');
if (isset($_POST['Submit'])) {
	//set where you want to store files
	//in this example we keep file in folder upload
	//$HTTP_POST_FILES['ufile']['name']; = upload file name
	//for example upload file name cartoon.gif . $path will be upload/cartoon.gif

	$path= "uploads/".$HTTP_POST_FILES['ufile']['name'];
	if($ufile !=none)
	{
		if(move_uploaded_file($HTTP_POST_FILES['ufile']['tmp_name'], $path))
		{
			echo "Successful<BR/>";

			echo "File Name :".$HTTP_POST_FILES['ufile']['name']."<BR/>";
			echo "File Size :".$HTTP_POST_FILES['ufile']['size']."<BR/>";
			echo "File Type :".$HTTP_POST_FILES['ufile']['type']."<BR/>";
			echo $path;
		}
		else
		{
			echo "Error";
		}
	}

}
?>
<html>

<head>
<style>
<!--
body         { font-family: Verdana; font-size: 12px }
-->
</style>
</head>
<title>HTTPUpload Example</title>
<body>

<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td><strong>Single File Upload </strong></td>
</tr>
<tr>
<td>Select file
<input name="ufile" type="file" id="ufile" size="50" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="Submit" value="Upload" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 

</body>
</html>
