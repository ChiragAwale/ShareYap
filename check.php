<?php
include 'db-connect.php';

$sql = "SELECT report,aid,TIMESTAMPDIFF(day,date_posted, CURRENT_TIMESTAMP) as days from apartment";
$result = $conn->query($sql);




if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$aid = $row["aid"];
    	$reports = $row["report"];
    	
    	$days = $row["days"];
    	

    	//Deletes if more than 5 reports 
    	if ($reports > 5) {
    		$sql_delete = "UPDATE apartment SET delete_marker= 1 Where aid =".$aid;
    		$conn->query($sql_delete);

    	}
        //Deletes if more than 10 days old
    	if ($days > 10) {
    		$sql_delete = "UPDATE apartment SET delete_marker =1 Where aid =".$aid;
    		$conn->query($sql_delete);

    	}
        
        
    }
} 












$conn->close();
?>
