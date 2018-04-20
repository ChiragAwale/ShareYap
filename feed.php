<?php
   
$servername = "localhost";
$username = "root";
$password = "";
$database = "shareapt";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


      if(isset($_GET['zip'])){
      $zip = $_GET['zip'];
      }else{
        $zip = null;
      }
      if(is_null($zip) or $zip == 0){
      $sql = "SELECT street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry from apartment";
      }else{
        $sql = "SELECT street, city,state,zip,price,rating,noofbedroom,noofbaths,gender,pets,laundry from apartment where zip ='$zip'";
      }
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          
              echo '<div class="card-main">
              <h2 >< Heading ></h2>
              <h5>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</h5>
               <img style="height:250px; width: 350px;" src = "images/bedroom-1.jpg">
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