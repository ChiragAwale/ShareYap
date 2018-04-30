<?php
// 0 for pending 1 for approved 2 for rejected
include 'db-connect.php';

$aid = $_GET["aid"];
$code = $_GET["code"];
$username = $_GET["uname"];
	

//For apartment availability status
$sql = "UPDATE apartment SET status=".$code." WHERE aid=".$aid;

$conn->query($sql);
 


 //For applciations statuses

$sql = "UPDATE apply_apt SET app_status=".$code." WHERE aid=".$aid." and username='".$username."'";


if ($conn->query($sql) === TRUE) {
    if($code == 1 ){
    	echo "Approved";
    }else if ($code == 2){
    	echo "Rejected";
    }
} 

$conn->close();
?>


