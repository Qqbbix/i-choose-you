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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT</title>
    <link rel = "icon" href = "img/icon/title_dog.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/m_css.css" />
    <link rel="stylesheet" href="css/q_css.css" />
    <link rel="stylesheet" href="css/Scrollbar.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
         .contactChat{
            background-color: #ffff;
            border-bottom: 1px solid #cdd0d4;
        }
        .contactChat:hover{
            background-color: #7575a3;
            color: #fff;
        }
        .contactChat:active{
            background-color: #7575a3;
            color: #fff;
            border:3px solid #d9b3ff;
            border-radius: 10px;

        }
        .chat-active{
            background-color: #7575a3;
            color: #fff;
        }

    .pointer       { cursor: pointer; }

    </style>
</head>
<body >
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
                  <?php if($_SESSION["role_id"]=="200")
                    { echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'profile_taker.php'".' ">Profile</a>';
                      echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'chat.php'".' ">Chat</a>';
                      echo '<div class="dropdown-divider"></div>  <a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'logout.php'".' ">Logout</a>';}
                      ?>
                      <?php if($_SESSION["role_id"]=="100")
                          {echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'chat.php'".' ">Chat</a>';
                            echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'logout.php'".' ">Logout</a>';}
                          ?>
                </div>
            </form>

        </div>
    </nav>
        </div>
<!-- --------------------------------------Content------------------------------------------------ -->
<div class = "container-fluid">
    <div class = "row">
        <div class = "col-3">
            <div class="p-3 bg-white rounded-sm"  style="border-bottom: 1px solid #cdd0d4;border-right: 1px solid #cdd0d4;"><h4 class = "text-center">Contact</h4></div>
            <div class="scrollbar" id="style-7" style = "width:100%;height:80vh;background-color:#FFF;">
                <table class = "table table-borderless" id = "contact_table">
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
        <div class = "col-9">

            <div class="p-3 bg-white rounded-sm"  style="border-bottom: 1px solid #cdd0d4;border-right: 1px solid #cdd0d4;"><h4 class = "text-center" id = "contact_header"></h4></div>
            <div class = "row" >
            <div class="scrollbar" id="style-7" style = "width:100%;height:70vh;background-color:#FFF;">
                <div class = "container-fluid" id = "chat_field">

                </div>
            </div>
            </div>
            <div class = "row" >
            <div class="form-group col-12" >
                <div class = "row">
                <textarea name ="msg" id = "msg" class="form-control col-11" rows="3" placeholder ="Your Meassage...."></textarea>
                <button type = "button" name = "btn-send"  id = "send" onclick = "sentChat()" class="btn btn-outline-dark col-1" style = "float: left;"><i class="material-icons" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#000'" name = "btn-send">send</i></button>
                <input type="hidden" name="user_session" id ="user_session" value = <?php echo $_SESSION["UID"] ?> >
            </div>
            </div>
            </div>
        </div>

    </div>

    </div>


















<!-- --------------------------------------footer------------------------------------------------ -->

<div class = "container-fluid myfooter">
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
    <script src= "js/chat.js"></script>
</body>
</html>
