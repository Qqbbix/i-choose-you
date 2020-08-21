<?php
    session_start();
    include 'connect.php';
    $id = $_POST['secretid'];
    $uid = $_SESSION['UID'];
    $name = $_POST['pet_name'];
    $gender = $_POST['pet_gender'];
    $color =$_POST['pet_color'];
    $des = $_POST['pet_des'];
    $cat_id=$_POST['pet_cate'];
    $pet_time = date('Y-m-d H:i:s');
    $status='Untaker';
    $button=$_POST['save_pet'];
    $defult_img ="defult_pet.png";
    //Change this for save pic

    //check value of save button
  if($button=='add'){
      if(file_exists($_FILES['pet1']['tmp_name']) || is_uploaded_file($_FILES['pet1']['tmp_name'])){
        $file_pattern1 = $id."_".$name."1.";
        $folder_upload1 = "img/pet/";
        $file_temp1 = $_FILES["pet1"]["tmp_name"];
        $file_name1 = $file_pattern1.substr($_FILES["pet1"]["type"],6);
        move_uploaded_file($file_temp1, $folder_upload1.$file_name1);
      }else{
        $file_name1 = $defult_img;
      }

      if(file_exists($_FILES['pet2']['tmp_name']) || is_uploaded_file($_FILES['pet2']['tmp_name'])){
        $file_pattern2 = $id."_".$name."2.";
        $folder_upload2 = "img/pet/";
        $file_temp2 = $_FILES["pet2"]["tmp_name"];
        $file_name2 = $file_pattern2.substr($_FILES["pet2"]["type"],6);   
        move_uploaded_file($file_temp2, $folder_upload2.$file_name2);
      }else{
        $file_name2 = $defult_img;
      }

    if(file_exists($_FILES['pet3']['tmp_name']) || is_uploaded_file($_FILES['pet3']['tmp_name'])){
      $file_pattern3 = $id."_".$name."3.";
      $folder_upload3 = "img/pet/";
      $file_temp3 = $_FILES["pet3"]["tmp_name"];
      $file_name3 = $file_pattern3.substr($_FILES["pet3"]["type"],6);
      move_uploaded_file($file_temp3, $folder_upload3.$file_name3);
    }else{
      $file_name3 = $defult_img;
    }

    $sql = "insert into pet(pet_name, pet_gender,pet_color,pet_time_post,pet_desc,pet_status,cat_id,uid,pet_pic_url1,pet_pic_url2,pet_pic_url3)
    VALUES ('".$name."', '".$gender."', '".$color."','".$pet_time."','".$des."','".$status."',".$cat_id.",".$uid.",'".$file_name1."','".$file_name2."','".$file_name3."')";


    $rs=$con->query($sql);
    if (!$rs) {
      echo $con->error;
    }else{
      echo "<script type=\"text/javascript\">";
      echo "alert(\"insert Successfully\");";
      echo "</script>";
      header( "refresh: 1; url=profile_care.php" );
      exit();
      $con->close();
    }

  }elseif($button=='edit'){
    if(file_exists($_FILES['pet1']['tmp_name']) || is_uploaded_file($_FILES['pet1']['tmp_name'])&& $_POST['pathimg1']=="img/pet/defult_pet.png"){
      $file_pattern1 = $id."_".$name."_1.";
      $folder_upload1 = "img/pet/";
      $file_temp1 = $_FILES["pet1"]["tmp_name"];
      $file_name1 = $file_pattern1.substr($_FILES["pet1"]["type"],6);
      move_uploaded_file($file_temp1, $folder_upload1.$file_name1);
      $con->query("UPDATE pet SET pet_pic_url1='".$file_name1."' WHERE pet_id = ".$id);
    }

    if(file_exists($_FILES['pet2']['tmp_name']) || is_uploaded_file($_FILES['pet2']['tmp_name'])&& $_POST['pathimg2']=="img/pet/defult_pet.png"){
      $file_pattern2 = $id."_".$name."_2.";
      $folder_upload2 = "img/pet/";
      $file_temp2 = $_FILES["pet2"]["tmp_name"];
      $file_name2 = $file_pattern2.substr($_FILES["pet2"]["type"],6);
      move_uploaded_file($file_temp2, $folder_upload2.$file_name2);
      $con->query("UPDATE pet SET pet_pic_url2='".$file_name2."' WHERE pet_id = ".$id);
    }

    if(file_exists($_FILES['pet3']['tmp_name']) || is_uploaded_file($_FILES['pet3']['tmp_name']) && $_POST['pathimg3']=="img/pet/defult_pet.png"){
      $file_pattern3 = $id."_".$name."_3.";
      $folder_upload3 = "img/pet/";
      $file_temp3 = $_FILES["pet3"]["tmp_name"];
      $file_name3 = $file_pattern3.substr($_FILES["pet3"]["type"],6);
      move_uploaded_file($file_temp3, $folder_upload3.$file_name3);
      $con->query("UPDATE pet SET pet_pic_url3='".$file_name3."' WHERE pet_id = ".$id);
    }

     $sql_update = "UPDATE pet SET pet_name='".$name."',pet_gender='".$gender
     ."',pet_color='".$color."',pet_desc='".$des."' ,cat_id=".$cat_id." WHERE pet_id = ".$id;

     $result=$con->query($sql_update);

      if (!$result) {
        echo $con->error;
      }else{
        header( "refresh: 1; url=profile_care.php" );
        exit(0);
        $con->close();
      }

  }

  echo $sql;


?>
