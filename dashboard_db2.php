

<?php
	include 'db-connect.php';

	$uname=$_SESSION["username"];

$sql = 'SELECT aid, heading, street, city, state , zip, price, photo  from apartment WHERE AID IN (select AID from apply_apt where TID=1 and username="'.$_SESSION["username"].'")';
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
        echo '<br>'.$row1['username'].'   ';
        echo '<span>&#10003;</span> '.'  '.'<span>&#10008;</span> ';
    }

  }

		
       //$row['street'];
    }  

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>