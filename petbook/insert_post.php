<?php
    include '../connect.php';
    session_start();
    
    //Change this for save pic
    $UID = $_SESSION['UID'];
    $post_text = $_POST["post_text"];
    
    $current_date = date("Y-m-d  H:i:s");
    $pic_date = date("dmYHis");


    //Change this for save pic
    $file_pattern = "UID_".$UID."_".$pic_date;
    $folder_upload = "../img/upload_post/";
    $file_temp = $_FILES["file"]["tmp_name"];
    $file_name = $file_pattern.substr($_FILES["file"]["type"],6);


    move_uploaded_file($file_temp, $folder_upload.$file_name);
    $sql = "INSERT INTO petbook (post_date, post_pic_url, post_msg, uid) VALUES ('".$current_date."','".$file_name."','".$post_text."',".$UID.")";

    $result = $con->query($sql);
    if (!$result) {
		  echo $con->error;
	  }
?>

