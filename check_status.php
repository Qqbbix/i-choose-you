<?php
    include_once('connect.php');
    $email = $_POST['email'];
    
    $query="select email from login where email='$email'";
    $res=$con->query($query);
    $checkEmail=mysqli_num_rows($res);
    
    if($checkEmail == 0){
        echo "READY TO USE";
    }
    else{
        echo "ALREADY USED";
    }

?>