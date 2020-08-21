<?php
  include 'connect.php';
  $fname = $_POST["firstname"];
  $lname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $gender = $_POST["gender"];
  $role_id = 0;
  if ($_POST["role"] == "Taker") {
    $role_id=200;
  }
  else {
    $role_id = 100;
  }
  $sql_1 = "INSERT INTO user(f_name, l_name, gender, address, tel, pic_url)
  VALUES ('$fname','$lname','$gender','$address','$phone','user.png')";
  $rs=$con->query($sql_1);

//  echo $sql_1;

  //echo "\n";
  $uid = 0;
  $sql_2 = "SELECT uid FROM user WHERE tel = '$phone'";
  $uid = 1;
 // echo $sql_2;
  $rs=$con->query($sql_2);
  while ($row = $rs->fetch_assoc()) {
    $uid = $row['uid'];
  }


//  echo "\n";
  $sql_3 = "INSERT INTO login(email, password, role_id, uid)
  VALUES ('$email','$password','$role_id','$uid')";
  //echo $sql_3;
  $rs=$con->query($sql_3);
echo $con->error;
  header("Location: login.html");
?>
