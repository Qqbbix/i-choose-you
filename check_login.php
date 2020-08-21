<?php
session_start();
include_once('connect.php');
$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){
    $uname=mysqli_real_escape_string($con,$_POST['uname']);
}else{
    $message[]='Please enter username';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=mysqli_real_escape_string($con,$_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);

if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $password = md5($_POST['password']);
    $query="select * from login where email='$uname' and password='$password'";

    $res=$con->query($query);
    $checkUser=mysqli_num_rows($res);
    if($checkUser > 0){
         $uid_rows = $res->fetch_assoc();
         $_SESSION['LOGIN_STATUS']=true;
         $_SESSION['UNAME']=$uname;
         $_SESSION['UID'] = $uid_rows["uid"];
		 $_SESSION['role_id'] = $uid_rows['role_id'];
         if($_SESSION['role_id']=='100'){
			 echo 'caretaker';
		 }else if($_SESSION['role_id']=='200'){
			echo 'taker';
		 }
    }else{
         echo ucwords('please enter correct user details');
    }
}
?>
