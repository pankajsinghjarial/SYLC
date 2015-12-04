<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php

$uploader=new PhpUploader();

$guidarray=explode("/",$_POST["guidlist"]);

//OUTPUT JSON

echo("[");
$count=0;
foreach($guidarray as $fileguid)
{
	$mvcfile=$uploader->GetUploadedFile($fileguid);
	if(!$mvcfile)
		continue;
	
	//process the file here , move to some where
	//rename(...)	
	
	if($count>0)
		echo(",");
	echo("{");
	echo("FileGuid:'");echo($mvcfile->FileGuid);echo("'");
	echo(",");
	echo("FileSize:'");echo($mvcfile->FileSize);echo("'");
	echo(",");
	echo("FileName:'");echo($mvcfile->FileName);echo("'");
	//echo("FileName:'");echo(date("d-m-Y-h:i").$mvcfile->FileName);echo("'");
	echo("}");
	$count++;
}
echo("]");

?>
