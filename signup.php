<!DOCTYPE html>
<html>
<head>
	<link href="css/signup.css" rel='stylesheet' type='text/css'>
</head>

<body>
	<form id="regForm" action="signup_db.php" method="post">

<h1>Create Your Account</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Name
  <p><input placeholder="First name" name="Fname" oninput="this.className = ''"></p>
  <p><input placeholder="Last name" name="Lname"oninput="this.className = ''"></p>
</div>

<div class="tab">Contact Info
  <p><input placeholder="E-mail" name="email" oninput="this.className = ''"></p>
  <p><input placeholder="Phone" name="phone" oninput="this.className = ''"></p>
</div>

<div class="tab">Address
  <p><input placeholder="Street" name="street" oninput="this.className = ''"></p>
  <p><input placeholder="Apt#" name="apt" oninput="this.className = ''"></p>
  <p><input placeholder="City" name="city" oninput="this.className = ''"></p>
  <p><input placeholder="State" name="state" oninput="this.className = ''"></p>
  <p><input placeholder="Zip" name="zip" oninput="this.className = ''"></p>
</div>

<div class="tab">Date of Birth
  <p><input placeholder="dd" name="date" oninput="this.className = ''"></p>
  <p><input placeholder="mm" name="month" oninput="this.className = ''"></p>
  <p><input placeholder="yyyy" name="year" oninput="this.className = ''"></p>
</div>

<div class="tab">Login Info
  <p><input placeholder="Username" name="username" oninput="this.className = ''"></p>
  <p><input placeholder="Password" name="password" id="psw" type="password" oninput="this.className = ''"></p>

</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

<!-- message displayed while typing password -->
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

</form>



<script src="js/signup.js"></script>

</body>
</html>
