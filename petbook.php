
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
    <title>PETBOOK</title>
    <link rel = "icon" href = "img/icon/title_dog.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/m_css.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/q_css.css" />
    <style>
.pointer       { cursor: pointer; }
</style>
</head>
<body style = "background-color:#40232323;">
<script src= "js/jquery-3.4.1.min.js"></script>
    <script src= "js/bootstrap.min.js"></script>
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
                          {echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'profile_care.php'".' ">Profile</a>';
                              echo '<a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'chat.php'".' ">Chat</a>';
                            echo '<div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:void(0)" onclick="window.location.href='."'logout.php'".' ">Logout</a>';}
                          ?>
                </div>
            </form>

        </div>
    </nav>
        </div>
    <!-------------------------------Content------------------------------------------------ -->
<p id = "err"></p>
<div class = "container">
    <div class="shadow p-3 md-5 bg-white rounded-sm">
        <div class = "row">
            <div class = "col-12">
                <form id = "post_form" name = "post_form">
                    <div class="form-group">
                        <textarea class="form-control" id="post_text" rows="3" placeholder = "your message..." onchange ="checkform(this.value)" name="post_text"></textarea>
                        <input type="file" id="file" style="display:none;" name = "file" onchange = "validate(this.value)" />
                    </div>
                </form>
            </div>
        </div>
        <div class = "row">
            <div class = "col-12">
                <div class = "float-right">
                 <div class="btn-group">

                    <button type = "file" name = "btn-upload" class="btn btn-warning rounded-pill" style = "font-weight:bold;margin-left:100" onclick="thisFileUpload();"><i class="material-icons" name = "btn-img" style = "float:left;margin-right:5px;margin-left:5px;color:#fff">photo_size_select_actual</i><i style ="float:left;margin-right:5px;color:#fff">UPLOAD</i></button></div>
                    <button type = "submit" form = "post_form" name = "btn-post" class="btn btn-primary rounded-pill" style = "font-weight:bold;"><i class="material-icons" name = "btn-send" style = "float:left;margin-right:5px;margin-left:5px;color:#fff">near_me</i><i style ="float:left;margin-right:5px;color:#fff">POST</i></button></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<br>
<div class = "container">
    <table class="table" id = "table_feed">
        <thead>
            <tr>
            <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
<br>
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

 
</body>
</html>


<script>
var img_check = false;
var text_post = false;
var table = document.getElementById("table_feed");
var row_Max = 0;
var row_table = 1;
var get_round = 0;
var temp_row_max = 0;
var today = new Date();
var date = today.getFullYear()+'-0'+(today.getMonth()+1)+'-'+(today.getDate()-1);

var log_in = <?php echo $_SESSION['LOGIN_STATUS']; ?>;

setInterval(function(){ update_post(); }, 4000);
 $(document).ready(function(){
    fisrt_get_post();
    $("#post_form").submit(function (e) {
      //  if(log_in == 0){
            if(img_check && text_post){
                e.preventDefault();
                var formData = new FormData($('#post_form')[0]);
                $.ajax({
                    url: 'petbook/insert_post.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (dataResult) {
                        document.getElementById("post_text").value = '';
                        document.getElementById("file").value = '';
                        img_check = false;
                        text_post = false;
                        update_post();
                    }
                });

            }else{
                if(img_check == false && text_post == false)
                    alert(" Message not null \n Please upload image");
                else if(!img_check)
                    alert("Please upload image");
                else
                    alert("Message not null");
                return  false;
            }
        //}
    });
});
function thisFileUpload() {
            document.getElementById("file").click();
};
function checkform(text){
    if(text == ""){
        text_post = false;
    }else{
        text_post = true;
    }
}
function validate(file){
    var get_type = file.substr(file.lastIndexOf('.') +1);
    var allow = ["jpg","png","jpeg"];
    if(allow.lastIndexOf(get_type) == -1){
        alert("Please Upload imgage file only!");
        $("#file").val("");
        img_check = false;
    }else{
        img_check = true;
    }

}
function update_post(){
    $.ajax({
        type: "POST",
        url: "petbook/get_post.php",
        data: "data",
        cache: false,
        success: function (response) {
           var dataResult = JSON.parse(response);
           for(i in dataResult){
               if(dataResult[i].post_id > row_Max){
                    if(get_round == 0){
                        temp_row_max = dataResult[i].post_id;
                        get_round = 1;
                    }
                    var row = table.insertRow(row_table);
                    var cell = row.insertCell(0);
                    cell.innerHTML = "<div class='card mb-3 rounded-lg shadow'><div class='card-header bg-transparent'><div class = 'row'><div class = 'col-auto'><img src = 'img/profile_img/"+dataResult[i].pic_url+"' class='rounded-circle' width = '75' height = '75'></div><div class = 'col-6'><h5>"+dataResult[i].f_name+dataResult[i].l_name+"</h5><p>"+dataResult[i].role_name+"</p></div><div class = 'col'><h5 class = 'float-right'>"+check_date(dataResult[i].post_date)+"</h5></div> </div></div><div class='card-body'><div class = 'container'><p>"+dataResult[i].post_msg+"</p><br><div class='text-center'><img src='img/upload_post/"+dataResult[i].post_pic_url+"' class='card-img-body img-fluid' /></div></div></div></div>";
                    row_table++;
               }else{
                   break;
               }
           }
           row_table = 1;
           row_Max = temp_row_max;
        }
    });
}
function fisrt_get_post(){
    $.ajax({
        type: "POST",
        url: "petbook/get_post.php",
        data: "data",
        cache: false,
        success: function (response) {
           var dataResult = JSON.parse(response);
           for(i in dataResult){
               if(get_round == 0){
                    row_Max = dataResult[i].post_id;
                    temp_row_max = row_Max;
                    get_round = 1;
                }
                var row = table.insertRow(row_table);
                var cell = row.insertCell(0);
                cell.innerHTML = "<div class='card mb-3 rounded-lg shadow'><div class='card-header bg-transparent'><div class = 'row'><div class = 'col-auto'><img src = 'img/profile_img/"+dataResult[i].pic_url+"' class='rounded-circle' width = '75' height = '75'></div><div class = 'col-6'><h5>"+dataResult[i].f_name+dataResult[i].l_name+"</h5><p>"+dataResult[i].role_name+"</p></div><div class = 'col'><h5 class = 'float-right'>"+check_date(dataResult[i].post_date)+"</h5></div> </div></div><div class='card-body'><div class = 'container'><p>"+dataResult[i].post_msg+"</p><br><div class='text-center'><img src='img/upload_post/"+dataResult[i].post_pic_url+"' class='card-img-body img-fluid' /></div></div></div></div>";
                row_table++;
           }
           row_table = 1;
           get_round = 0;
        }
    });
}
function check_date(text){
    var recievText = text.substring(0,10);
    var text_today = "";
    console.log("DATE: "+date+" DATE GET:"+recievText);
    if(date == recievText){
        text_today = "today "+text.substring(10,16);
       return text_today;
    }else{
        return text.substring(0,16);
    }

}
</script>
