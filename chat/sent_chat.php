<?php
    include '../connect.php';
    session_start();
    $UID = $_SESSION["UID"];

    
    $message = $_POST["message"];
    $room_id =  $_POST["room"];
    
    $id1 = substr($room_id,0,5);
    $id2 = substr($room_id,5,11);
    $combine1 = $id1."_".$id2;

    $current_date = date("Y-m-d  H:i:s");
    $sql = "INSERT INTO chat (message,send_time,sender,uid_chat) VALUES ('".$message."','".$current_date."', '".$UID."', '".$combine1."')";
    $result = $con->query($sql);
    echo "Success";
    if(!$result)
        echo $con->error;
?>