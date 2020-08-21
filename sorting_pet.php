<?php
session_start();
include 'connect.php';
  $action = $_GET['action'];
  $id = $_GET['id'];
  $txt= "";
  $myjson = array();
  if($_SESSION['role_id']=='100'){
    //caretaker
    if($action =='olded'){
      $sqlforpet = "SELECT * FROM pet WHERE uid = ".$id." ORDER by pet_time_post DESC";
      $resultforpet = $con -> query($sqlforpet);
      while($Pet = $resultforpet->fetch_assoc()) {
        $txt=$txt.date_format(new DateTime($Pet['pet_time_post']),"D d M Y").",".$Pet['pet_pic_url1']
        .",".$Pet['pet_pic_url2'].",".$Pet['pet_pic_url3'].",".$Pet['pet_name'].",".$Pet['pet_gender'].",".$Pet['pet_id'].",END,";

      }
      echo $txt;
    }else if($action =='lasted'){
      $sqlforpet = "SELECT * FROM pet WHERE uid = ".$id." ORDER by pet_time_post ASC";
      $resultforpet = $con -> query($sqlforpet);
      while($Pet = $resultforpet->fetch_assoc()) {
        array_push($myjson,$Pet);
      /*  $txt=$txt.date_format(new DateTime($Pet['pet_time_post']),"D d M Y").",".$Pet['pet_pic_url1']
        .",".$Pet['pet_pic_url2'].",".$Pet['pet_pic_url3'].",".$Pet['pet_name'].",".$Pet['pet_gender'].",".$Pet['pet_id'].",END,";*/

      }
    }
      echo json_encode($myjson);
    }else if($_SESSION['role_id']=='200'){
      //taker
      if($action =='olded'){
        $sqlforpet = "SELECT * FROM pet as p JOIN theat t ON p.pet_id = t.pet_id JOIN user u ON t.uid_recive = u.uid WHERE u.uid = ".$id." ORDER BY t.recive_date DESC";
        $resultforpet = $con -> query($sqlforpet);
        while($Pet = $resultforpet->fetch_assoc()) {
        array_push($myjson,$Pet);
        /*  $txt=$txt.date_format(new DateTime($Pet['recive_date']),"D d M Y").",".$Pet['pet_pic_url1']
          .",".$Pet['pet_pic_url2'].",".$Pet['pet_pic_url3'].",".$Pet['pet_name'].",".$Pet['pet_gender'].",".$Pet['pet_id'].",END,";*/

        }
        echo json_encode($myjson);
      }else if($action =='lasted'){

        $sqlforpet = "SELECT * FROM pet as p JOIN theat t ON p.pet_id = t.pet_id JOIN user u ON t.uid_recive = u.uid WHERE u.uid = ".$id." ORDER BY t.recive_date ASC";
        $resultforpet = $con -> query($sqlforpet);
        while($Pet = $resultforpet->fetch_assoc()) {
            array_push($myjson,$Pet);
        /*  $txt=$txt.date_format(new DateTime($Pet['recive_date']),"D d M Y").",".$Pet['pet_pic_url1']
          .",".$Pet['pet_pic_url2'].",".$Pet['pet_pic_url3'].",".$Pet['pet_name'].",".$Pet['pet_gender'].",".$Pet['pet_id'].",END,";*/

        }
        echo json_encode($myjson);

      }
    }





 ?>
