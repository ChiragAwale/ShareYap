<?php
session_start();

include 'db-connect.php';

$aid = $_GET["aid"];
$username = $_SESSION["username"];
$bool = 0;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//						FOR UPDATING DATABASE 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Checks if user is the one who posted the apartment
$sql_search = "SELECT aid,tid,username from apply_apt where username = '".$username."'";
$result_search = $conn->query($sql_search);
if ($result_search->num_rows > 0) {
        while($row = $result_search->fetch_assoc()) {
            $said = $row["aid"];
            $stid = $row["tid"];
            if($said == $aid){
                if($stid == 1){
                    $bool = 1;
                }
            }
        }

    }




if($bool != 1){
$sql = "INSERT INTO apply_apt (aid, username, tid) VALUES (".$aid.",'".$username."', 0)";

//Executes Statement
$conn->query($sql); 
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//						FOR UPDATING  UI
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT aid,likes,dislike,report from apartment where aid = ".$aid;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
    $aid = $row["aid"];
    $sql_sl = 'SELECT app_status from apply_apt where TID=0 and username="'.$username.'" and aid = '. $aid;
    $result_sl= $conn->query($sql_sl);

    if ($result_sl->num_rows > 0) {
    
    	echo '
    <button  type = "button"> Applied </button>
    <button  onclick = "clickFunction(1,'.$row["aid"].','.$row["likes"].')" value = "'.$row["likes"].'" type = "button"> Like ('.$row["likes"].')</button> 
    <button onclick = "clickFunction(2,'.$row["aid"].','.$row["dislike"].')" value = "'.$row["dislike"].'" type = "button"> Dislike ('.$row["dislike"].')</button>
    <button  onclick = "clickFunction(0,'.$row["aid"].','.$row["report"].')" value = "'.$row["report"].'" type = "button"> Report ('.$row["report"].')</button>'; 


    }else{
       echo '
    <button onclick = "applyFunction('.$row["aid"].')"  type = "button"> Apply </button>
    <button  onclick = "clickFunction(1,'.$row["aid"].','.$row["likes"].')" value = "'.$row["likes"].'" type = "button"> Like ('.$row["likes"].')</button> 
    <button onclick = "clickFunction(2,'.$row["aid"].','.$row["dislike"].')" value = "'.$row["dislike"].'" type = "button"> Dislike ('.$row["dislike"].')</button>
    <button  onclick = "clickFunction(0,'.$row["aid"].','.$row["report"].')" value = "'.$row["report"].'" type = "button"> Report ('.$row["report"].')</button>';  
    }
}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$conn->close();


?>