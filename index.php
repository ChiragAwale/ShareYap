<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<link href="css/index.css" rel='stylesheet' type='text/css'>
  <script src = "js/index.js"></script>
</head>

<body>
<?php
          // Set session variables
          $_SESSION["from-login"] = 'false';


?>





<div class="container">
  <img  class = "image" src="images/background.jpg">
  <div class="top-left"><h1>ShareYap</h1></div>
  <div class="centered-left"><button class="btn success">Sign up</button></div>

  <div class="centered-right"><button class="btn success" onclick="document.getElementById('lgn-mdl').style.display='block'">Login</button></div>
</div>

smit


<!-- The Modal -->
<div id="lgn-mdl" class="modal">
  <span onclick="document.getElementById('lgn-mdl').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="home.php" method="post">
  
    <div class="container-form">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button class = "btn-lgn"type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container-form" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('lgn-mdl').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
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
