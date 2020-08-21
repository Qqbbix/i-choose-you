<?php 
    include 'connect.php';
    $id = $_GET['id'];
    $txt="";

    $sql = "SELECT * FROM user WHERE uid = ".$id;
    $result = $con -> query($sql);
    while($profile = $result->fetch_assoc()) {
      $txt=$profile['f_name']."^".$profile['l_name']."^".$profile['gender']."^".$profile['tel']."^".$profile['address']
      ."^".$profile['pic_url']."^".$id;
    }
    echo $txt;
?>