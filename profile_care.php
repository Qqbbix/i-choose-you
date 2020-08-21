<?php
// Start the session
session_start();
$uid=$_SESSION["UID"];
include 'connect.php';
// set base dufalt name
$sql = "SELECT * FROM user WHERE uid =".$uid;
$qry = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($qry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
.pointer       { cursor: pointer; }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I-CHOOSE-YOU</title>
    <link rel = "icon" href = "img/icon/title_dog.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/m_css.css" />
  <link rel="stylesheet" type="text/css" href="pic_pet.css">
  <script src="js/sorting_pet.js"></script>
  <script src="js/edit_profile.js"></script>
  <script src="js/editpet.js"></script>
  <link rel="stylesheet" href="css/q_css.css" />
  <style>
    * {box-sizing: border-box;}
    .img-container {
        position: relative;
        width: 100%;
        max-width: 300px;
    }

    .overlay {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5); /* Black see-through */
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity:0;
        color: white;
        font-size: 20px;
        padding: 20px;
        text-align: center;
    }

    .img-container:hover .overlay {
        opacity: 1;
    }
  </style>
</head>
<body style = "background-color:#40232323;">
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
                <h6 class="regis" style="margin-bottom:0px;margin-right:10px;"><?php  echo  $row["f_name"]; ?></h6>
                <span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='profile_care.php'">Profile</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='chat.php'">Chat</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='logout.php' ">Logout</a>
                </div>
            </form>
        </div>
        </div>
    </nav>
<!-- --------------------------------------Content------------------------------------------------ -->
<?php include 'connect.php';
	  $uid = $_SESSION['UID'];
    $sql = "SELECT * FROM user WHERE uid = ".$uid; //kuy
    $sqlc = "SELECT COUNT(*) FROM pet WHERE uid = ".$uid; //edit from id//kuy
    $result = $con -> query($sql);
    $cquery = $con -> query($sqlc);
    $fnum = mysqli_fetch_array($cquery);
    $total = $fnum[0];
    $row = mysqli_fetch_array($result);
    $_SESSION["inputId"] = $row['uid'];
    $_SESSION["role"] = 'care';
?>
<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div class="card card-body bg-danger " style="padding-top:70px;">
        <center>
        <img id="master_pic" src="img/profile_img/<?php if(($row['pic_url']) === NULL){echo 'defult_profile.jpg';}else{echo $row['pic_url'];}  ?>" style="width:150px;border-radius: 50%;margin-bottom:10px;max-height: 150px;object-fit: cover;">
        <h3 style="color:#fff;" id="master_name">
        <?php echo $row['f_name']."  ".$row['l_name'];?>
        <a type="button" class="btn btn-success" style="padding:5px 20px 5px 20px;border-radius:15px;" >Care</a></h3>
		</center>
    </div>

</div>
<div class="container" style="padding-left:0px;padding-right:0px;margin-left: 40px;margin-right: 40px;">

<div class="row" style="margin-top: 20px;">
  <div class="col-4"><div class="card">
  <div class="card-header">
    <div class="float-left">Profile</div>
    <div class="float-right"><input type="image" src="img/icon/setting.png" onClick="selectProfile(<?php echo $row['uid']; ?>)"  style="width:20px;outline:0;" data-toggle="modal" data-target="#editModal" /></div>
  </div>
  <div class="card-body">
    <h class="card-text">Gender :  </h><h class="card-text" id="gender">
      <?php
          echo $row['gender'];
       ?>
    </h><br>
    <h class="card-text">Tel :  </h><h class="card-text" id="tel">
      <?php
          echo $row['tel'];
       ?>
    </h><br>
    <h class="card-text">Address :  </h><h class="card-text" id="address">
      <?php
          echo $row['address'];
       ?>
    </h><br>
  </div>
</div>
</div>
  <div class="col-8">

    <div class="row">
      <div class="col-10">
        <h5 class="card-text">Your pets needs help
        <a type="button" class="btn btn-success" data-toggle="modal"
         data-target="#addPetModal" style="padding:5px 20px 5px 20px;border-radius:15px;color: #000;"
         onClick="clearModalPet()"
         >+Add pet</a></h5>

      </div>
      <div class="col-2">
      <select id="fillter" style="border-radius:36px;width:100px;padding:5px;outline:0;" onchange="sortPet(this.value,<?php echo $row['uid'];?>,<?php echo $total;?>)">
            <option value="lasted">lasted</option>
            <option value="olded">olded</option>
        </select>
      </div>
    </div>


    <!-- ------------------Start template for pet list ------------------------ -->
  
    <div id="phpSort">
      <?php
        $sqlforpet = "SELECT * FROM pet WHERE uid = ".$uid." ORDER by pet_time_post DESC"; //edit from id
        $resultforpet = $con -> query($sqlforpet);
        $i = 0;

        while($Pet = $resultforpet->fetch_assoc()) {
          $_SESSION["pet_id"]=$Pet['pet_id'];
      ?>
      <div class="row" style="margin-top: 20px">
        <div class="col-5" style="padding-left: 0px;padding-right: 0px;">
          <hr />
        </div>
        <div class="col-2"  style="padding-left: 0px;padding-right: 0px;">
          <center>
            <h id="date<?php echo $i ?>" style="font-size:14px;color:#696666;"> <?php $created_at = new DateTime($Pet['pet_time_post']); $date = date_format($created_at,"D d M Y"); echo $date; ?></h>
          </center>
        </div>
        <div class="col-5" style="padding-left: 0px;padding-right: 0px;">
            <hr />
        </div>
      </div>

      <div class="row" style="margin-top: 5px">
        <div class="card" style="width: 800px;">
            <div class="gallery">
              <figure class="gallery__item--1 res " style="margin:0 0 0;">
                  <img class="card-img-top gallery__img " id="pet_img1-<?php echo $i ?>" src="img/pet/<?php echo $Pet['pet_pic_url1'];?>" >
              </figure>
              <figure class="gallery__item--2 res" style="margin:0 0 0;">
                  <img class="card-img-top gallery__img " id="pet_img2-<?php echo $i ?>" src="img/pet/<?php echo $Pet['pet_pic_url2'];?>" >
              </figure>
              <figure class="gallery__item--3 res" style="margin:0 0 0;">
                  <img class="card-img-top gallery__img " id="pet_img3-<?php echo $i ?>" src="img/pet/<?php echo $Pet['pet_pic_url3'];?>" >
              </figure>
            </div>
          <div class="group-row">

          <div class="card-body"  style="padding: 0px;">
            <center>
              <h5 class="card-title" id="pet_name<?php echo $i ?>"><?php echo $Pet['pet_name'];?></h5>
              <p class="card-text" id="pet_gender<?php echo $i ?>"><?php echo $Pet['pet_gender'];?></p>
            </center>
          </div>
			  <div class="row" style="margin: auto;padding: 10px;width: 20%;">
          <button type="button" class="btn btn-warning" data-toggle="modal"
              data-target="#addPetModal" onclick="editPet(this.value)"
              value="<?php echo $Pet['pet_id'];?>" style="text-align: center;">Edit</button>
            <form action="deletepet.php" method="post" enctype="multipart/form-data">
              <button type="submit" class="btn btn-danger" name="pet_id" action="deletepet.php" value="<?php echo $Pet['pet_id'];?>">Delete</button>
            </form>
        </div>
      </div>
      </div>
      </div>
    <?php
     $i+=1;} ?>

    </div>


<!-- ------------------End template for pet list------------------------ -->
  </div>
</div>

</div>



<!------------------ The Modal Edit--------------------------------------------->
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">

          <div class="col-8">
          <form id="popup" name="popup" action="edit_profile.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Firstname</label>
                <input type="text" class="form-control" id="inputFirstname" name="inputFirstname" placeholder="Firstname" required>
              </div>
              <div class="form-group col-md-6">
                <label>Lastname</label>
                <input type="text" class="form-control" id="inputLastname" name="inputLastname" placeholder="Lastname" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                  <label>Gender</label>
                    <select id="inputGender" name="inputGender" placeholder="Gender" class="form-control" required>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
              </div>
              <div class="form-group col-md-5">
                  <label>Tel</label>
                  <input type="text" class="form-control" id="inputTel" name="inputTel" placeholder="Tel" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Address</label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Address" required>
              </div>
            </div>



          </div>

          <div class="col-4">
            <div class="img-container">
              <img src="img/profile_img/defult_profile.jpg" id="inputImg" name="inputImg" alt="Avatar" class="image" style="width:100%;display: block;" >
              <div class="overlay">
                <input type="file" id="inputfile" name="inputfile" onchange="previewImg(this);" accept="image/*" hidden>
                <label for="inputfile" style="cursor: pointer;">Change Image</label><input type="hidden" name="def_pic" value ="" id = "def_pic" />
              </div>
            </div>
          </div>
          <div class="col-8">
          <center>
              <button type="summit" class="btn btn-primary">Save</button>
            </center>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<!-------------------------End The Modal ------------------------------------>
<div class="modal fade" id="addPetModal">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Pet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">

          <div class="col-5">
          <form id="popupPet" name="popupPet" action="addpet.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-12">
                <label>Name</label>
                <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="Name" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label>Gender</label>
                    <select id="pet_gender" name="pet_gender" class="form-control" placeholder="Gender" required>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
              </div>
              <div class="form-group col-6">
                <label>Color</label>
                        <select id="pet_color" name="pet_color" class="form-control" placeholder="Color" required>
                          <option value="Black">Black</option>
                          <option value="White">White</option>
                          <option value="Brown">Brown</option>
                          <option value="Orange">Orange</option>
                          <option value="Red">Red</option>
                          <option value="Blue">Blue</option>
                          <option value="Green">Green</option>
                          <option value="Grey">Grey</option>
                          <option value="Gold">Gold</option>
                          <option value="Other">Other</option>
                        </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label>Category</label>
                <select id="pet_cate" name="pet_cate" class="form-control" required>
                <?php include 'connect.php';            
                      $sql_cata = "SELECT * FROM category ";
                      $result_cata = $con -> query($sql_cata);
                      while($cat = mysqli_fetch_assoc($result_cata)){
                        echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
                      }
                ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label>Description</label>
                <textarea class="form-control" rows="3" id="pet_des" name="pet_des" placeholder="Description" required style="resize:none;"></textarea>
              </div>
            </div>
          </div>

          <div class="form-row col-7">
            <div class="col-4">
            <div class="img-container">
              <img src="img/pet/defult_pet.png" id="pet_img1" name="pet_img1" class="image" style="width:100%;display: block;" >
              <input type="hidden" name="pathimg1" id="pathimg1" value="" onSubmit="setPath()"></input>
              <input type="hidden" name="pathimg2" id="pathimg2" value="" ></input>
              <input type="hidden" name="pathimg3" id="pathimg3" value="" ></input>
              <div class="overlay">
                <input type="file" id="pet1" name="pet1" accept="image/*" onchange="document.getElementById('pet_img1').src = window.URL.createObjectURL(this.files[0])" hidden >
                <label for="pet1" style="cursor: pointer;">Choose Image</label>
                <!-- <input type="hidden" name="def_pic" value ="" id = "def_pic" /> -->
              </div>
            </div>
            </div>
            <div class="col-4">
            <div class="img-container">
              <img src="img/pet/defult_pet.png" id="pet_img2" name="pet_img2"  class="image" style="width:100%;display: block;" >
              <div class="overlay">
                <input type="file" id="pet2" name="pet2" accept="image/*" onchange="document.getElementById('pet_img2').src = window.URL.createObjectURL(this.files[0])" hidden >
                <label for="pet2" style="cursor: pointer;">Choose Image</label>
              </div>
            </div>
            </div>
            <div class="col-4">
            <div class="img-container">
              <img src="img/pet/defult_pet.png" id="pet_img3" name="pet_img3" class="image" style="width:100%;display: block;" >
              <div class="overlay">
                <input type="file" id="pet3" name="pet3" accept="image/*" onchange="document.getElementById('pet_img3').src = window.URL.createObjectURL(this.files[0])" hidden >
                <label for="pet3" style="cursor: pointer;">Choose Image</label>
              </div>
            </div>
            </div>
          </div>
          <div class="col-12">
          <center>
          <input type="hidden" name="secretid" id="secretid" value="">
              <button type="summit" id="save_pet" name="save_pet" value="add" class="btn btn-primary" style="padding:10px 80px 10px 80px;" >Save</button>
            </center>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
<!-- --------------------------------------footer------------------------------------------------ -->

<div class = "container-fluid myfooter" style="margin-top:200px">
    <div class = "row">
        <div class ="col-md-auto">
            <div class ="head-font">Contact us</div>
        </div>
        <div class ="col-md-auto">
            <img src="img/icon/telephone.png" class = "footer-icon">
            <h6 class ="footer-detail">099-9999-999</h6>
        </div>
        <div class ="col-md-auto">
             <img src="img/icon/envelope.png" class = "footer-icon">
            <h6 class ="footer-detail">i-choose-you@mail.com</h6>
        </div>
        <div class ="col-md-4">
            <img src="img/icon/maps-and-flags.png" class = "footer-icon">
            <h6 class ="footer-detail">Suranaree University of technology</h6>
        </div>
        <div class="col-md-auto">
            <h6 class ="footer-copyright">Copyright © 2020 BankTeam Dev</h6>
        </div>
    </div>
</div>

    <script src= "js/jquery-3.4.1.min.js"></script>
    <script src= "js/bootstrap.min.js"></script>
</body>
</html>
