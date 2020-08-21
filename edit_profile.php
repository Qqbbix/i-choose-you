<?php
    session_start();
    include 'connect.php';

    $id = $_SESSION["inputId"];
    $role = $_SESSION["role"];
    $fname = $_POST['inputFirstname'];
    $lname = $_POST['inputLastname'];
    $gender = $_POST['inputGender'];
    $address =$_POST['inputAddress'];
    $tel = $_POST['inputTel'];
    $pic_date = date("dmYHis");
    $def_pic = $_POST['def_pic'];
    //Change this for save pic


    if(file_exists($_FILES['inputfile']['tmp_name']) || is_uploaded_file($_FILES['inputfile']['tmp_name'])){
        $file_pattern = $fname."_".$pic_date.".";
        $folder_upload = "img/profile_img/";
        $file_temp = $_FILES["inputfile"]["tmp_name"];
        $file_name = $file_pattern.substr($_FILES["inputfile"]["type"],6);   
        move_uploaded_file($file_temp, $folder_upload.$file_name);
    }else{
        $file_name = $def_pic;
    }
    
    $sql = "UPDATE user SET f_name='".$fname."',l_name='".$lname."',gender='".$gender."',address='".$address."',tel='".$tel."',pic_url='".$file_name."' WHERE uid = ".$id;
    
    $result = $con->query($sql);
    if (!$result) {
		  echo $con->error;
	  }else{
          if($role == 'taker'){
            header( "refresh: 0; url=profile_taker.php" );
            exit(0);
          }elseif($role == 'care'){
            header( "refresh: 0; url=profile_care.php" );
            exit(0);
          }
        
      }
?>