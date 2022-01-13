<?php 
 session_start();
if (isset($_SESSION['flash_message'])){
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Get Plate No</title>
</head>
<body>
        <nav class="style-navbar">
                <div class="style-left-nav"> <a href="index.html">VRS</a> </div>
                <div class="style-right-nav">
                    <ul class="unstyle list-flex">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="plate_no.php">Get Plate No</a></li>
                        <li><a href="Vehicle_inspection.html">Vehicle Inspection</a></li>
                    </ul>
                </div> 
             </nav>
    <h2 class="text-center color-main register-header"> Get Plate Number</h2>
    <div class="small-box">
        <form action="" method="post">
            <p class="form-header">Fill the Form</p>
            <?php
    require("db.php");
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $chasis = $_POST['chasis'];

        if(!empty($fullname) && !empty($chasis)){
            $sql = "SELECT `Chasis` from user WHERE `Chasis` = '$chasis' AND `Fullname` LIKE '%$fullname%'";
            $result = mysqli_query($mysqli,$sql);
            if (mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['Chasis'] = $data["Chasis"];
                header("location: info.php");
            }
            else{
               
                echo "<div class='error-box'> Details do not exist </div>";
                
            }
        }
    }

?>
            <div class="form-group">
                <input type="text" name="fullname" maxlength="100" class="style-form-control" placeholder=" " required>
                <label> Fullname </label>
            </div>
            <div class="form-group">
                    <input type="text" name="chasis" maxlength="100" class="style-form-control" placeholder=" " required>
                    <label> Chasis </label>
            </div>
            <div class="btn-box">
                <input type="submit" value="Submit Details" name="submit" class="register-btn">
            </div>
        </form>
    </div>
</body>
</html>
