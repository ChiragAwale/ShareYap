<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/home.css" rel='stylesheet' type='text/css'>
  <script src = "home.js"></script>


 
</head>


<body>
<?php

if (isset($_SESSION['from-login']) )
{
if(!$_SESSION["from-login"]){
  die("Direct Access Forbidden");
}
// Set session variables
$_SESSION["username"] = $_POST["uname"];

}else{
  die("Direct Access Forbidden");
}
?>


<!-- Nav Bar -->
<div class="header">
  <h1>Share Your Apartment</h1>
  <span style="float: right;">Welcome, 
    <?php 
    echo $_SESSION["username"];
    ?></span>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Dashboard</a>
  
  <a href="index.html/?=logout"  style="float:right"><span onclick="logout()">Logout</span></a>
</div>




<div class="row">
	
  <div class="midcolumn">
   
 <!-- Php for main content  -->
    <?php 

      include 'content.php';
      include 'db.php';
      $apt = new Appartment();



      $sql = "SELECT street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry from apartment";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          
              echo '<div class="card-main">
              <h2 >< Heading ></h2>
              <h5>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</h5>
               <img style="height:250px; width: 350px;" src = "'.$apt->img.'">
              <p><strong>Description</strong></p>
              <div> Price:  '.$row["price"].'</div>
              <div> Rating:  '.$row["rating"].'</div>
              <div> No of Bed/Baths:  '.$row["noofbedroom"].'/'.$row["noofbaths"].'</div>
              <div> Gender Looking for:  '.$row["gender"].'</div>
              <div> Pets:  '.$row["pets"].'</div>
              <div> Laundry:  '.$row["laundry"].'</div>
              <p></p>
               </div>';

        }
      } else {
          echo "0 results";
      }
      $conn->close();
       
    ?>


  </div>


<!-- Side bar contents -->
  <div class="rightcolumn">
    <!-- <div class="card"> 
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div> -->
    <div class="card">
      <h3>Popular Posts</h3>
      <div class="fakeimg"><p>N/A</p></div>
      <div class="fakeimg"><p>N/A</p></div>
      <div class="fakeimg"><p>N/A</p></div>
    </div>
    <!-- <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div> -->
  </div>
</div>



</body>
</html>