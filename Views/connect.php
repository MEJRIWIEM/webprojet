<?php 
$servername = 'localhost';
$username = 'root';
$password = 'club0000';
$db = 'demo';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$con = mysqli_connect($servername, $username, $password, $db);
 // Check connection
if (!$con) {
	die ("connection failed.". mysqli_connect_error()); //close connection
}



$com = mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($com->connect_error) {
    die("Connection failed: " . $com->connect_error);
}

 ?>

 