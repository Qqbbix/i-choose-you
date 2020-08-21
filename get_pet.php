<?php
    include 'connect.php';
    // set base dufalt name
    $sql = "SELECT * FROM pet Where pet_status = 'Untaker'";
    $qry = $con->query($sql);
    $myjson = array();
    if($qry){
        $rowcount = mysqli_num_rows($qry);
        if($rowcount > 0){
            while($rec = $qry->fetch_assoc()){
                array_push($myjson,$rec);
            }
            echo json_encode($myjson);
        }else{
            echo json_encode(array("statusCode"=>999));
        }
    }else{
        echo json_encode(array("statusCode"=>201));
    }
?>