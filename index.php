<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I-CHOOSE-YOU</title>
    <link rel = "icon" href = "img/icon/title_dog.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/m_css.css" />
    <link rel="stylesheet" href="css/q_css.css" />
    <style>a:link {
    color: #000000;
    text-decoration: none
}

a:visited {
    color: #000000;
    text-decoration: none
}

a:active {
    color: #000000;
    text-decoration: none
}

a:hover {
    color: #000000;
    text-decoration: none
}
.pointer       { cursor: pointer; }
</style>
</head>
<body style = "background-color:#40232323;">
<!-- --------------------------------------head------------------------------------------------ -->
<div class="black-line margin-bottom:10px"></div>
    <nav class="navbar navbar-light " style="background-color:white">
        <a class="navbar-brand"><img src="img/icon/logo.png" class="ichooseyou-logo"></a>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php" style="color:#232323;">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="login.html" style="color:#232323;">Petbook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index_about.php" style="color:#232323;">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index_contact.php" style="color:#232323;">Contact</a>
            </li>
        </ul>
        <form class="form-inline"><a class="nav-link active" href="login.html" style="color:#232323;"><img src="img/icon/user.png" class = "iconuser"/><h6 class = "regis">Login or Register</h6></a></form>
    </nav>
<!-- --------------------------------------Content------------------------------------------------ -->
<?php
    include 'connect.php';
    // set base dufalt name
    $sql = "SELECT * FROM category";
    $qry = mysqli_query($con, $sql);
    ?>

    <div class="container-fluid reset-padding bg-light " style=" padding-bottom : 50px;">
        <div class="row" style="padding-top: 25px">
            <div class="col-md-auto col-lg-2 ore-home-sidebar align-left">
                <div class="panel panel-danger p-1 border rounded-lg " style="background:white">
                    <div class="panel-heading p-1 border-bottom ">
                        <h6 class="panel-title ">&nbsp; Category</h6>
                    </div>
                    <div class="panel-body " style="padding-left :25px; padding-top :10px;" id="pbody">
                        <a href="#">
                            <p onclick="getcat(0)"> All </p>
                        </a>
                        <?php
                        while ($row = mysqli_fetch_assoc($qry)) {
                            echo '<a href="#"> <p onclick = "getcat(' . $row["cat_id"] . ')">'; ?> <?php echo $row["cat_name"]; ?></p></a>
                        <?php
                        }
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>



            <div class="col-md-auto col-lg-10 ore-home-sidebar ">
                <div id="Pets">
                    <span>Pets that need help</span>
                </div>
                <div class="row" style="margin-top :50px;" id="content">

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
    <script type='text/javascript' src="js/index_script.js"></script>
</body>
</html>
