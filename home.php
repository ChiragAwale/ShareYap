<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/home.css" rel='stylesheet' type='text/css'>
 
<script language = "javascript" type = "text/javascript">
         
            //Browser Support Code
            function ajaxFunction(code){
             
               var ajaxRequest;  // The variable that makes Ajax possible!
               
               try {
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }
               
               // Create a function that will receive data 
               // sent from the server and will update
               // div section in the same page.
          
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to
               // server script.


               var zip = document.getElementById('zip').value;
               var minRange = document.getElementById('minRange').value;
               var maxRange = document.getElementById('maxRange').value;
               

                // //If Empty Zip
                // if(zip == ""){
                //   code = "-1";
                // }

               
               var queryString = "?code=" + code ;
              

             


               queryString +="&zip="+ zip+ "&minRange=" + minRange + "&maxRange=" + maxRange;
               ajaxRequest.open("GET", "feed.php" + queryString, true);
               ajaxRequest.send(null); 
            }
         //-->
      </script>

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
  <h4>Share your appartment</h4>
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


<!-- Search Bar -->

<div style="margin-top: 5px;">
<form class="search" action="home.php" style="margin:auto;max-width:500px">
  <input id = "zip" type="text" placeholder="Enter ZIP.." name="search2">
  <button style="font-size: 35px;" type = 'button' onclick = 'ajaxFunction("zip")' > GO </button>
</form>
</div>




<div class="row">

  <div class="leftcolumn">
    <div class="card">
      <h3>Filter results</h3>
      <h5>Price range</h5>
      
      <div class="slidecontainer">
      <input type="range" min="1" max="4900" value="1" class="slider" id="minRange" onchange="ajaxFunction('minRange')">
      </div>
      <p>Min Price: <span id="demo1"></span></p>

      <div class="slidecontainer">
      <input type="range" min="100" max="5000" value="5000" class="slider" id="maxRange" onchange="ajaxFunction('maxRange')">
      </div>
      <p>Max Price: <span id="demo2"></span></p>  
      
      
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Number of bedrooms</button>
        <div id="myDropdown" class="dropdown-content">
        <a href="#">1 Bedroom</a>
        <a href="#">2 Bedroom</a>
        <a href="#">3 Bedroom</a>
        <a href="#">4 Bedroom+</a>
        </div>
      </div>    
    </div>
  </div>
  	
  <div class="midcolumn" >
   
 <!--= main content  -->
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