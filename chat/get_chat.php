<?php
    include("../connect.php");
    $chat_room = $_POST["room"];
    $id1 = substr($chat_room,0,5);
    $id2 = substr($chat_room,5,11);
    $combine1 = $id1."_".$id2;
    $sql = "SELECT * FROM chat WHERE uid_chat = '".$combine1."'";
    $qry = $con->query($sql);
    $myjson = array();
    $rowcount = mysqli_num_rows($qry);
    if($qry){
        if($rowcount > 0){
            while($rec = $qry->fetch_assoc()){
                array_push($myjson,$rec);
            }
            echo json_encode($myjson);
        }else{
            echo $con->error;
        }
    }else{
        echo json_encode(array("statusCode"=>201));
    }
        
   
?>