

<?php
	include 'db-connect.php';

	$uname="smitshrestha101";

$sql = "SELECT heading, street, city, state , zip, price, photo  from apartment WHERE AID IN (select AID from apply_apt where TID=0 and username='smitshrestha101')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       echo 
       '<img style="height:50px; width: 65px;" src = "'.$row["photo"].'">';
       //$row['street'];
    }  

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>