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
<?php


//Checks where the user entered this site from 
if (isset($_SESSION['from-login']) )
{
if(!$_SESSION["from-login"]){
  die("Direct Access Forbidden");
}
// Set session variables
if(isset($_POST["uname"])){
$_SESSION["username"] = $_POST["uname"];
}
}else{
  die("Direct Access Forbidden");
}
if(isset($_POST["search2"])){
  echo "DONE".$_POST["search2"];
}

?>


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









<!-- LEFT COLUMN FILTER PANE -->

<div class="row">

  <div class="leftcolumn">
    <div class="card">
      <h2>Filter results</h2>
      <form class="search" action="home.php" style="margin:auto;max-width:500px">
      <input id = "zip" type="text" placeholder="Enter ZIP.." name="search2">
      </form>
      <button id = "go-btn" style="font-size: 30px; margin: 5px;border-radius: 10px;" type = 'button' onclick = 'ajaxFunction("zip")' > GO </button>

      <p><h3><strong>Price range</strong></h3></p>
      
      <div class="slidecontainer">
      <input type="range" min="0" max="4900" value="50" class="slider" id="minRange" step = "100" onchange="ajaxFunction('range')">
      </div>
      <p><strong>Min Price: </strong><span id="minRangeValue">50</span></p>

      <div class="slidecontainer">
      <input type="range" min="100" max="5000" value="5000" class="slider" id="maxRange" step = "100" onchange="ajaxFunction('range')">
      </div>
      <p><strong>Max Price:</strong> <span id="maxRangeValue">5000</span></p>  
      

      <p><strong><h3> Min No. of Bed Rooms:</strong> </h3></p>
      <select id="noOfBed" name="noOfBed" style="font-size: 20px;">
          <option value="1=0">Any</option>
          <option value="1">One Bed Room</option>
          <option value="2">Two Bed Room</option>
          <option value="3">Three Bed Room</option>
          <option value="4">Four+ Bed Room</option>
        </select>  
    </div>
  </div>
  	
  <div class="midcolumn" >
   
 <!--= ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            MAIN CONTENT
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div id = 'ajaxDiv'>
      <?php
        include 'feed.php';
      ?>
    </div>


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


 <script src = "js/home.js"></script>


 </script>
</body>
</html>