<?php
    include 'connect.php';
    $id = $_GET["pet_id"];
    
    $sql_select = "SELECT * FROM pet WHERE pet_id=".$id;
    
    $result_select = $con -> query($sql_select);


    if (!$result_select) {
        echo $con->error;
    }else{
        $row = mysqli_fetch_array($result_select);
        echo $row['pet_name']."^".$row['pet_gender']."^".$row['pet_color']."^".$row['cat_id']
        ."^".$row['pet_desc']."^".$row['pet_pic_url1']."^".$row['pet_pic_url2']."^".$row['pet_pic_url3']."^".$id;
    }

    $con->close();  
   
?>