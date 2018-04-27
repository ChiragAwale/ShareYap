

<?php
	include 'db-connect.php';

	$uname="smitshrestha101";

$sql = "SELECT aid, heading, street, city, state , zip, price, photo  from apartment WHERE AID IN (select AID from apply_apt where TID=1 and username='smitshrestha101')";
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

    echo 'People who have applied:';

    $sql1 = "SELECT username from apply_apt where TID=0 and aid=".$row['aid'];
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
        echo $row1['username'];
    }

  }

		
       //$row['street'];
    }  

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>