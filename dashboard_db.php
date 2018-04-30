

<?php
	include 'db-connect.php';

	$uname=$_SESSION["username"];

$sql = 'SELECT heading, street, city, state , zip, price, photo,status  from apartment WHERE AID IN (select AID from apply_apt where TID=0 and username="'.$_SESSION["username"].'")';



$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    
    $sql1 = 'SELECT app_status from apply_apt where TID=0 and username="'.$uname.'"';
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {

        $app_status = $row1["app_status"];

       if($app_status == 0){
          $status = "Pending";
        }else if ($app_status==1){
          $status = "Approved";
        }else{
          $status = "Rejected";
        }

       echo 
       '<div class="card"><div class="clearfix float-">
   		<img style="height:80px; width: 100px;" src = "'.$row["photo"].'">
   		<div><strong>'.$row["heading"].'</strong></div>
   		<div>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</div>
   		<div><strong>Price:</strong>'.$row["price"].'</div>
      <div><br><strong>Status:</strong>'.$status.'</div>
		  </div></div>';
    }
		}
       //$row['street'];
    }  

}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>