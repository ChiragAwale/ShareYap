<?php

include 'db-connect.php';

$code = $_GET['code'];

switch ($code) {
    case "zip":
        $zip = $_GET['zip'];
        // prepare and bind
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment WHERE zip = ?");
        $stmt->bind_param("i", $zip);
        break;
    case "maxRange":
        $maxRange = $_GET['maxRange'];
        break;
    case "minRange":
        $minRange = $_GET['minRange'];
        break;
    default:
        $stmt = $conn->prepare("SELECT  heading, street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry,likes,dislike from apartment");
}




include 'content-feed.php';
?>