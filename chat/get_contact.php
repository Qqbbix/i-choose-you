<?php
    include("../connect.php");
    session_start();
    if(isset($_SESSION["UID"])){
        $USER = $_SESSION["UID"];
    
        $sql = "SELECT * FROM get_contact WHERE user_id = ".$USER." order by contact_time DESC";
        $result = $con->query($sql);

        if(mysqli_num_rows($result) > 0){
            $myjson = array();
            while($rows = $result->fetch_assoc()){
                array_push($myjson,$rows);
            }
            echo json_encode($myjson);
        }
    }
?>