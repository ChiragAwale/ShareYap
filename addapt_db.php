<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db-connect.php';

$stmt = $conn->prepare("INSERT INTO apartment(heading,street,city,state,zip,price,NoOfbedroom,NoOfbaths,photo) values (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiiiis",$description,$street,$city,$state,$zip,$price,$bedroom,$bath,$photo);




$description=$_POST["description"];
$street=$_POST["street"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$price = $_POST["price"];
$bedroom=$_POST["bedroom"];
$bath=$_POST["bath"];
$photo=$_POST["photo"];

$stmt->execute();

$last_id = $conn->insert_id;
$username = $_SESSION["username"];
$sql = "INSERT INTO apply_apt (aid, username, tid) VALUES (".$last_id.",'".$username."', 1)";

//Executes Statement
$conn->query($sql); 





header('Location: home.php');

// echo "<h1>New records created successfully</h1>;"

$stmt->close();


$conn->close();





?>