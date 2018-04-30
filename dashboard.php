<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/home.css" rel='stylesheet' type='text/css'>
<link href="css/dashboard.css" rel='stylesheet' type='text/css'>





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
  <a href="dashboard.php">Profile</a>
  <a href="index.php"  style="float:right">Logout</a>
</div>







<div class="row">
  <div class="midcolumn">
    <div class="card">
      <h2>Apartments you applied</h2>
      
    </div>
  </div>
  	
  <div class="midcolumn" >
  	<div class="card">
      <h2>Applications to your apartment</h2>
      
    </div>
  </div>
  </div>
</div>

<div class="row">
  <div class="midcolumn">
    
      <?php
      include 'dashboard_db.php'; 
      //Code 0 for applieds apartments
      ?>
    
  </div>

   <div class="midcolumn">
   
      <?php
      include 'dashboard_db2.php'; 
      //Code 1 for Posted apartments
      ?>
    
  </div>
</div>

<script src = "js/dashboard.js"></script>
</body>
</html>