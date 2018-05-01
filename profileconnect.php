<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db-connect.php';

$sql_search = "SELECT fname,lname,dob,email,phone,address from user where username = '".$username."'";
echo $sql_search;
$result_search = $conn->query($sql_search);
if ($result_search->num_rows > 0) {
        while($row = $result_search->fetch_assoc()) {
            $fname = $row["Fname"];
            $lname = $row["Lname"];
            $email = $row["email"];
            $dob = $row["dob"];
            $phone = $row["phone"];
            $address= $row["address"];

            echo '<div class = "row">
                  <div class="midcolumn" >
                  
                   <div class="card">
                      <h3></h3>
                      <div ><p><strong>First Name: </strong>$fname</p></div>
                      <div ><p><strong>Last Name:</strong>$lname</p></div>
                      <div ><p><strong>Email:</strong>$email</p></div>
                      <div ><p><strong>Dob:</strong>$dob</p></div>
                      <div ><p><strong>Phone:</strong>$phone</p></div>  
                      <div ><p><strong>Address:</strong>$address</p></div> 
                    </div>


                  </div>

                </div>';

            


        }

    }

    $conn->close();
    ?>