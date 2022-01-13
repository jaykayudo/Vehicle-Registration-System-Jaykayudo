<?php 
    require("db.php");
    $data = $_GET["chasis"];
    $sql = "SELECT * FROM user WHERE `Chasis` = '$data'";
    $result = mysqli_query($mysqli,$sql);
    if(mysqli_num_rows($result) > 0){
        echo "Chasis Already Exists";
    }
    else{
        echo 'problem';
    }
?>