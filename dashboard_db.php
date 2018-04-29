

<?php
	include 'db-connect.php';

	$uname=$_SESSION["username"];

$sql = 'SELECT heading, street, city, state , zip, price, photo  from apartment WHERE AID IN (select AID from apply_apt where TID=0 and username="'.$_SESSION["username"].'")';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       echo 
       '<div class="clearfix float-">
   		<img style="height:80px; width: 100px;" src = "'.$row["photo"].'">
   		<div>'.$row["heading"].'</div>
   		<div>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</div>
   		<div>Price: '.$row["price"].'</div>
		</div>';

		
       //$row['street'];
    }  

}

$sql = 


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>