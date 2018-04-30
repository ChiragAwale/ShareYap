<?php
session_start();
?>

<!DOCTYPE html>
<head>
  <link href="css/index.css" rel='stylesheet' type='text/css'>
  <script src = "js/index.js"></script>
</head>

<body>
<div class=container>
  <div class="centered-right"><button class="btn success" onclick="document.getElementById('lgn-mdl').style.display='block'">Login</button></div>


</div>




<!-- The Modal -->
<div id="lgn-mdl" class="modal">
  <span onclick="document.getElementById('lgn-mdl').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="home.php" method="post">
  
    <div class="container-form">
      <label for="description"><b>Description</b></label>
      <input type="text" placeholder="Describe your apt in a few words.." name="description" required>

      <label for="street"><b>Street</b></label>
      <input type="text" placeholder="Street address" name="street" required>

      <label for="city"><b>City</b></label>
      <input type="text" placeholder="City" name="city" required>

      <label for="state"><b>State</b></label>
      <input type="text" placeholder="State" name="state" required>

      <label for="zip"><b>Zip</b></label>
      <input type="text" placeholder="Zip" name="zip" required>

      <label for="price"><b>Price</b></label>
      <input type="text" placeholder="Price" name="price" required>

      <label for="bedroom"><b>No. of Bedroom</b></label>
      <input type="text" placeholder="Number of bedrooms" name="bedroom" required>

      <label for="bath"><b>No. of Baths</b></label>
      <input type="text" placeholder="Number of baths" name="bath" required>

      <label for="photo"><b>Photo</b></label>
      <input type="text" placeholder="Enter photo URL" name="photo" required>

      <button class = "btn-lgn" type="submit">Post</button>
      
    </div>

    <div class="container-form" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('lgn-mdl').style.display='none'" class="cancelbtn">Cancel</button>
    
    </div>
  </form>
</div>
      <script>
      // Get the modal
      var modal = document.getElementById('lgn-mdl');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
          <?php
          // Set session variables
          $_SESSION["from-login"] = 'true';


          ?>

      }

      </script>

</body>