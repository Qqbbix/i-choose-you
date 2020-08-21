<?php
    include("../connect.php");
    $user_id = $_POST["user_id"];
    $car_id = $_POST["care_id"];
    $contact_id = $_POST["contact_id"];
    $contact_id1 = $_POST["care_id"]."_".$_POST["user_id"];
    $sql ="SELECT * FROM contact WHERE uid_chat = '".$contact_id."' OR uid_chat = '".$contact_id1."'";
    $result = $con->query($sql);
    if($result->num_rows == 0){
        $current_date = date("Y-m-d  H:i:s");
        $sql = "INSERT INTO contact (uid,uid_contact,uid_chat,contact_time)VALUES(".$user_id.",".$car_id.",'".$contact_id."','".$current_date."')";
        $result = $con->query($sql);
        $sql = "INSERT INTO contact (uid,uid_contact,uid_chat,contact_time)VALUES(".$car_id.",".$user_id.",'".$contact_id."','".$current_date."')";
        $result = $con->query($sql);

    }
?>