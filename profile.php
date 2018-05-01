<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/home.css" rel='stylesheet' type='text/css'>
</head>

<body>
<!-- Nav Bar -->
<div class="header">
  <h1>ShareYap</h1>
  <h4>Share Your Apartment</h4>
  <span style="float: right;">Welcome, 
    <?php 
    echo $_SESSION["username"];
    ?></span>
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="profile.php">Profile</a>
  <a href="index.php"  style="float:right">Logout</a>
</div>

<?php

include 'db-connect.php';
$username = $_SESSION["username"];
$sql_search = "SELECT fname,lname,dob,email,phone,address from user where username = '".$username."'";

$result_search = $conn->query($sql_search);
if ($result_search->num_rows > 0) {
        while($row = $result_search->fetch_assoc()) {
            $fname = $row["fname"];
            $lname = $row["lname"];
            $email = $row["email"];
            $dob = $row["dob"];
            $phone = $row["phone"];
            $address= $row["address"];

            echo '<div class = "row">
                  <div class="midcolumn" >
                  
                   <div class="card">
                      <h3></h3>
                      <div ><p><strong>First Name: </strong>'.$fname.'</p></div>
                      <div ><p><strong>Last Name:</strong>'.$lname.'</p></div>
                      <div ><p><strong>Email:</strong>'.$email.'</p></div>
                      <div ><p><strong>Dob:</strong>'.$dob.'</p></div>
                      <div ><p><strong>Phone:</strong>'.$phone.'</p></div>  
                      <div ><p><strong>Address:</strong>'.$address.'</p></div> 
                    </div>


                  </div>

                </div>';

            


        }

    }

    $conn->close();
    ?>


</body>
</html>