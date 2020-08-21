<?php
    $con = mysqli_connect('localhost', 'root', '','i_choose_you');
    $con->query("SET NAMES UTF8"); 
    if ($con -> error ){
        echo "Failed to connect : " . $con -> error;
    }
?>