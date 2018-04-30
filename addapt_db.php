<?php

include 'db-connect.php';

$stmt = $conn->prepare("INSERT INTO apartment(heading,street,city,state,zip,price,NoOfbedroom,NoOfbaths,photo) values (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiiiis",$description,$street,$city,$state,$zip,$price,$bedroom,$bath,$photo);




$description=$_POST["description"];
$street=$_POST["street"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$bedroom=$_POST["bedroom"];
$bath=$_POST["bath"];
$photo=$_POST["photo"];

$stmt->execute();



header('Location: home.php');

// echo "<h1>New records created successfully</h1>;"

$stmt->close();
$conn->close();





?>