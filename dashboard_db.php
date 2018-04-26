<?php
	include 'db_connect.php';

	$uname=$_SESSION["username"]

	$stmt = $conn->prepare("SELECT street, city, state , zip from apartment WHERE AID IN (select AID from apply_apt where TID=0 and UID=)");
	$stmt->bind_param("sssissss",$fname,$lname,$email,$phone,$address,$dob,$username,$password);

?>