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
  
  <a href="index.html/?=logout"  style="float:right"><span onclick="logout()">Logout</span></a>
</div>







<div class="row">
  <div class="midcolumn">
    <div class="card">
      <h3>Your Apartments</h3>
      
    </div>
  </div>
  	
  <div class="midcolumn" >
  	<div class="card">
      <h3>Applications to your apartment</h3>
      
    </div>
  </div>
  </div>
</div>

<div class="row">
  <div class="midcolumn">
    <div class="card">
      <?php
      include 'dashboard_db.php'; 
      ?>








</body>


</html>