<?php

include 'db-connect.php';

if(isset($_GET['code'])){
$code = $_GET['code'];
}else{
  $code = -1;
}


if (empty($_GET['zip']) AND $code =='zip') {
    $code = -1;
}


//PREPARES MYSQL QUERY ACCORDING TO USER ACTIONS

switch ($code) {
    case "maxRange":
        $maxRange = $_GET['maxRange'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE price  <= ?");
        $stmt->bind_param("i", $maxRange);
        break;
    case "minRange":
        $minRange = $_GET['minRange'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE price  >= ?");
        $stmt->bind_param("i", $minRange);
        break;
    case "zip":
        $zip = $_GET['zip'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE zip = ?");
        $stmt->bind_param("i", $zip);
        break;    
    default:
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment");
}




include 'content-feed.php';
?>