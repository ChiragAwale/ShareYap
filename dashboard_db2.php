

<?php
	include 'db-connect.php';

	$uname=$_SESSION["username"];

$sql = 'SELECT aid, heading, street, city, state , zip, price, photo  from apartment WHERE delete_marker = 0 AND  AID IN (select AID from apply_apt where TID=1 and username="'.$_SESSION["username"].'")';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       echo 
       '<div class="card"><div class="clearfix float-">
   		<img style="height:80px; width: 100px;" src = "'.$row["photo"].'">
   		<div>'.$row["heading"].'</div>
   		<div>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</div>
   		<div>Price: '.$row["price"].'</div>
		</div>';

    echo 'People who have applied:';

    $sql1 = "SELECT username,aid,app_status from apply_apt where TID=0 and aid=".$row['aid'];
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {

        $app_status = $row1["app_status"];
        $aonclick = "clickFunction(1,".$row1["aid"].",'".$row1["username"]."')";

        $donclick = "clickFunction(2,".$row1["aid"].",'".$row1["username"]."')";


        echo '<br>'.$row1['username'].'   ';
        if($app_status == 0){
        echo '<div id="ajaxDiv" >';
        echo '<button class = "status" onclick ="'.$aonclick;
        echo '">Approve<span>&#10003;</span></button>';

        echo '<button onclick ="'.$donclick;
        echo '">Reject<span>&#10008;</span></button></div> </div>';
        } else if ($app_status == 1){
          echo "Approved";

        } else if ($app_status == 2){
          echo "Rejected";
        }
        
    }

  }

		
       //$row['street'];
    }  

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$conn->close();

?>