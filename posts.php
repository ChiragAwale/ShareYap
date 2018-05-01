<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db-connect.php';

$code = $_GET["code"];
$aid = $_GET['aid'];
$username = $_SESSION["username"];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//						FOR UPDATING DATABASE 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($code == 1){ //CODE FOR LIKE
$likes = $_GET['likes'];
$sql = "UPDATE apartment SET likes='".$likes."' WHERE aid=".$aid;
}else if ($code == 2){ //CODE FOR DISLIKE
$dislikes = $_GET['dislikes'];
$sql = "UPDATE apartment SET dislike='".$dislikes."' WHERE aid=".$aid;
}else if($code == 0){
$report = $_GET['reports'];	
$sql = "UPDATE apartment SET report='".$report."' Where aid =".$aid;	
}


//Executes Statement
$conn->query($sql); 




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//						FOR UPDATING COUNTS UI
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