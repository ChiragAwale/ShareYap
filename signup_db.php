<?php

include 'db-connect.php';

$stmt = $conn->prepare("INSERT INTO user(FName,LName,Email,Phone,Address,DOB,username,password) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssissss",$fname,$lname,$email,$phone,$address,$dob,$username,$password);




$fname=$_POST["Fname"];
$lname=$_POST["Lname"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$street=$_POST["street"];
$apt=$_POST["apt"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$address = $street." Apt ".$apt.",".$city.",".$state.",".$zip;
$date=$_POST["date"];
$month=$_POST["month"];
$year=$_POST["year"];
$dob=$year."-".$month."-".$date;
$username=$_POST["username"];
$password=$_POST["password"];
$stmt->execute();



header('Location: index.php');

// echo "<h1>New records created successfully</h1>;"

$stmt->close();
$conn->close();





?>