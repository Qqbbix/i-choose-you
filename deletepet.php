<?php
  
    include 'connect.php';
    $pet_id=$_POST["pet_id"];
$sql = "DELETE FROM pet WHERE pet_id=".$pet_id;

if ($con->query($sql) === TRUE) {
	

echo "<script type=\"text/javascript\">";
echo "alert(\"Delete Successfully\");";
echo "window.history.back();";
echo "</script>";
exit();
   
} else {
   
	echo "<script type=\"text/javascript\">";
echo "alert(\"Delete not Successfullied\");";
echo "window.history.back();";
echo "</script>";
exit();
	$con->error;
}

$con->close();
?>
