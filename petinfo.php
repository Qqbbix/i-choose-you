<?php
session_start();
$uid = $_SESSION["UID"];
$id = $_GET['id'];
include 'connect.php';
// set base dufalt name
$sql1 = "SELECT * FROM user WHERE uid =" . $uid;
$qry1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($qry1);

$sql = "SELECT * FROM pet AS p join user AS u on p.uid = u.uid where p.pet_id = ".$id;
$qry = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($qry);
$date = date_create($row["pet_time_post"]);
$date_in = date_format($date, "d/m/Y");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I-CHOOSE-YOU</title>
    <link rel="icon" href="img/icon/title_dog.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/m_css.css" />
    <link rel="stylesheet" href="css/q_css.css" />
    <style>
.pointer       { cursor: pointer; }
</style>
</head>

<body style="background-color:#40232323;">
    <!-- --------------------------------------head------------------------------------------------ -->
    <div class="black-line margin-bottom:10px"></div>
    <nav class="navbar navbar-light " style="background-color:white">
        <a class="navbar-brand"><img src="img/icon/logo.png" class="ichooseyou-logo"></a>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="home.php" style="color:#232323;">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="petbook.php" style="color:#232323;">Petbook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="about.php" style="color:#232323;">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="contact.php" style="color:#232323;">Contact</a>
            </li>
        </ul>
        <div class="dropdown pointer">
            <form class="form-inline dropdown-toggle" data-toggle="dropdown">
                <img src="img/icon/user.png" class="iconuser" />
                <h6 class="regis" style="margin-bottom:0px;margin-right:10px;"><?php  echo  $row1["f_name"]; ?></h6>
                <span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php if($_SESSION["role_id"]=="200")
                    { echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'profile_taker.php'".' ">Profile</a>';
                      echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'chat.php'".' ">Chat</a>';
                      echo '<div class="dropdown-divider"></div>  <a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'logout.php'".' ">Logout</a>';}
                      ?>
                      <?php if($_SESSION["role_id"]=="100")
                          {echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'profile_care.php'".' ">Profile</a>';
                              echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'chat.php'".' ">Chat</a>';
                            echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'logout.php'".' ">Logout</a>';}
                          ?>
                </div>
            </form>

        </div>
    </nav>
        </div>
    <!-- --------------------------------------Content------------------------------------------------ -->
    <div class="container" style="margin-bottom:150px;">
        <div class="row">
            <div class="shadow bg-white col-12" style="margin-top:10px;margin-bottom:20px;border-radius:10px height:590px">
                <div class="row">
                    <h4 class="col-auto" style="margin-top:10px;margin-bottom:20px;"><?php echo  "วันที่ลงข้อมูล: " . $date_in; ?></h4>
                </div>
                <div class="row">
                    <div class="col-6" style="margin-bottom:30px">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner ">
                                <?php
                                if ($row["pet_pic_url1"] != 'defult_pet.png') {
                                    echo '<div class="carousel-item active"><img class="d-block w-100" style="max-height:500px" src="img/pet/' . $row["pet_pic_url1"] . '" alt="First slide"></div>';
                                }
                                if ($row["pet_pic_url2"] != 'defult_pet.png') {
                                    echo '<div class="carousel-item"><img class="d-block w-100" style="max-height:500px" src="img/pet/' . $row["pet_pic_url2"] . '" alt="Second slide"></div>';
                                }
                                if ($row["pet_pic_url3"] != 'defult_pet.png') {
                                    echo '<div class="carousel-item"><img class="d-block w-100" style="max-height:500px" src="img/pet/' . $row["pet_pic_url3"] . '" alt="Third slide"></div>';
                                }
                                ?>
                            </div>
                            <?php
                              if ($row["pet_pic_url2"] != 'defult_pet.png') {
                                echo '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>';
                            }
                             ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div>
                            <h4>ชื่อ: <?php echo " " . $row["pet_name"]; ?></h4>
                            <h4>เพศ: <?php echo " " . $row["pet_gender"]; ?> </h4>
                            <h4>สี/ลาย: <?php echo " " . $row["pet_color"]; ?></h4>
                            <h4>สถานะ: <?php echo " " . $row["pet_status"]; ?></h4>
                            <h4>ผู้ดูแล: <?php echo " " . $row["f_name"]." ".$row["l_name"]; ?></h4>
                            <input type="hidden" name="petID" id ="petID" value = <?php echo $row["pet_id"]; ?> />
                        </div>
                        <div class="row">
                          <?php if($_SESSION["role_id"]=="200")
                              {echo '<div class="col-auto">
                                  <button type="button" class="btn btn-lg btn-warning" style="margin-top:20px;border-radius:20px;color:white;margin-right:20px;" onClick = check_contact()>ติดต่อผู้ดูแล</button>
                                  <button type="button" class="btn btn-lg btn-warning" style="margin-top:20px;border-radius:20px;color:white;margin-right:20px;" name = "get_theat" id ="get_theat" onClick = insert_theat() >รับเลี้ยงสัตว์</button>
                              </div>';}
                              ?>
                              <input type="hidden" name = "user_id" value=<?php echo $_SESSION["UID"]; ?> id = "user_id">
                              <input type="hidden" name = "care_id" value=<?php echo $row["uid"]; ?> id = "care_id">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="shadow bg-white col-12" style="height:150px;margin-bottom:60px;border-radius:10px; word-break: break-all; word-wrap: break-word;">
                <h4 style="margin-bottom:20px;margin-top:5px;">รายละเอียด</h4>
                <p style="font-size: 20px;"><?php echo $row["pet_desc"];  ?></p>
            </div>
        </div>
    </div>
    <!-- --------------------------------------footer------------------------------------------------ -->

    <div class="container-fluid myfooter">
        <div class="row">
            <div class="col-md-auto">
                <div class="head-font">Contact us</div>
            </div>
            <div class="col-md-auto">
                <img src="img/icon/telephone.png" class="footer-icon">
                <h6 class="footer-detail">099-9999-999</h6>
            </div>
            <div class="col-md-auto">
                <img src="img/icon/envelope.png" class="footer-icon">
                <h6 class="footer-detail">i-choose-you@mail.com</h6>
            </div>
            <div class="col-md-4">
                <img src="img/icon/maps-and-flags.png" class="footer-icon">
                <h6 class="footer-detail">Suranaree University of technology</h6>
            </div>
            <div class="col-md-auto">
                <h6 class="footer-copyright">Copyright © 2020 BankTeam Dev</h6>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<script>
    function check_contact(){
        var user_id = document.getElementById("user_id").value;
        var care_id = document.getElementById("care_id").value;
        var contact_id = user_id+"_"+care_id;
        $.ajax({
            url:'check_contact.php',
            type:'POST',
            data:{user_id:user_id, care_id:care_id, contact_id:contact_id},
            cache:false,
            success: function(dataResult){
               window.location.href = 'chat.php';
            }
        });
    }
    function insert_theat(){
        var petID = document.getElementById("petID").value;
        $.ajax({
            url:'insert_theat.php',
            type:'POST',
            data:{pet_id:petID},
            cache:false,
            success: function(dataResult){
               alert(dataResult);
               document.getElementById("get_theat").style.visibility = 'hidden';
            }
        });
    }
</script>
