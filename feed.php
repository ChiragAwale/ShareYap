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

if (!empty($_GET['zip']) AND $code =='range') {
    $code = 'zrange';
}



//PREPARES MYSQL QUERY ACCORDING TO USER ACTIONS

switch ($code) {
    case "range":
        $minRange = $_GET['minRange'];
        $maxRange = $_GET['maxRange'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE (price  >= ? AND price <=?)");
        $stmt->bind_param("ii", $minRange,$maxRange);
        break;
    case "zrange":
        $zip = $_GET['zip'];
        $minRange = $_GET['minRange'];
        $maxRange = $_GET['maxRange'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE (zip = ? AND price  >= ? AND price <=?)");
        $stmt->bind_param("iii",$zip, $minRange,$maxRange);
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