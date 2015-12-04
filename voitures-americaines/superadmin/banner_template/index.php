<?php
//echo $_SERVER['DOCUMENT_ROOT'];die;
 $servername = "localhost";
    $username = "sylcexpo_syadmin";
    $password = "admin1234";
    $dbname = "sylcexpo_sylcorp";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



	$sql = "SELECT * FROM newsletter where id='1'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
if (isset($_POST['content'])) {

   



    $text = $firstname = mysqli_real_escape_string($conn, $_POST['content']);

   $text2=str_replace('"/images_newsletter/','"http://sylc-export.com/images_newsletter/',$text);
//echo $text2;die;
    $sql = "update newsletter set text='$text2' where id='1'";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Newsletter updated successfully<h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$sql = "SELECT * FROM newsletter where id='1'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                 plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],


            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",


relative_urls: false
 });
        </script>
    </head>
    <body>
        

        <form method="post" action="">
<input type="submit" value="Update news letter" style="margin-left: 89%;margin-bottom:10px;"/>
            <textarea name="content" style="width:100%;height:600px;">
	<?php echo $row['text']; ?>
            </textarea>

            <input type="submit" value="Update news letter" style="margin-left: 89%;margin-top:10px;"/>
        </form>
