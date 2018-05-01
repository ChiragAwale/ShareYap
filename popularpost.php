<?php
include 'db-connect.php';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//						FOR UPDATING DATABASE 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Checks if user is the one who posted the apartment
$sql_search = "SELECT heading,street,city,state,zip,price FROM apartment group by likes order by likes desc limit 3 ";
$result_search = $conn->query($sql_search);


if ($result_search->num_rows > 0) {
        while($row = $result_search->fetch_assoc()) {
                 $heading = $row["heading"];
                 
                 $price = $row["price"];
                 echo '
                 <div class="fakeimg" style = "font-size:15px;">
                 <p><strong>'.$heading.'</strong></p>
                 <p><strong>'.$row["street"].', '.$row["city"].', '.$row["state"].', '.$row["zip"].'</strong></p>
                 <p><strong>Price: '.$price.'</strong></p>
                 </div>';
  



        }

    }







///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$conn->close();


?>