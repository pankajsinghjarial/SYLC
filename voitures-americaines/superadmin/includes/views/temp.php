<?php
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laraveldemo";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



	$sql = "SELECT * FROM newsletter where id='1'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
echo $row['text'];
?>

