<?php

$servername = "den1.mysql2.gear.host";
$username = "shareyap";
$password = "Ci2493!6d_3A";
$database = "shareyap";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>


<?php

/*
FOR LOCAL
$servername = "localhost";
$username = "root";
$password = "";
$database = "shareapt";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
*/
?>

