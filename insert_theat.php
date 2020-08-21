<?php
include("connect.php");
session_start();
$uid = $_SESSION["UID"];
$date_recive = date("Y-m-d  H:i:s");
$pet_id = $_POST["pet_id"];
$sql = "INSERT INTO theat (recive_date,pet_id,uid_recive)VALUES ('".$date_recive."',".$pet_id.",".$uid.")";
$result = $con->query($sql);
$sql_update = "UPDATE pet SET pet_status = 'Taked' WHERE pet_id = ".$pet_id;
$result = $con->query($sql_update);
if($result){
	echo "บันทึกข้อมูลเสร็จสิ้น";
}

?>