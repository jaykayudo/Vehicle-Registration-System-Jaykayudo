<?php
    require("db.php");
   
    session_start();
    $chasis = $_SESSION['Chasis'];
    unset($_SESSION['Chasis']);
    if(!empty($chasis)){
        $sql = "SELECT * FROM user WHERE `Chasis`='$chasis'";
        $result = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result) > 0){
            $maindata = mysqli_fetch_assoc($result);
        }
        else{
            header("location: index.html");
            die();
        }
    }
    else{
        header("location: register.html");
        die();
    }
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="styles/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="styles/style.css">
    <title> Your Info</title>
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
    <div class="container">
                <div class="print-btn-box">
                    <button onclick="printBody();" class="print-btn">Print</button>
                </div>
        <div id="print-area">
        <div class="paper-box">
            <h2 class="header text-center " > Vehicle Registration System </h2>
            <h6 class="text-center mb-4"> Holder's Information </h6>
            <div class="img-box">
                <img src="<?php echo ''.$maindata["Passport"]?>" alt="" class="img-fluid passport">
            
            </div>
            <div class="row m-3">
                <div class="col-3 details"><span class="tag">Fullname: </span><?php echo ''.$maindata["Fullname"]?></div>
                <div class="col-3 details"><span class="tag">Sex: </span><?php echo ''.$maindata["Sex"]?></div>
                <div class="col-3 details"><span class="tag">Date of Birth: </span><?php echo ''.$maindata["Dob"]?></div>
                <div class="col-3 details"><span class="tag">Address: </span><?php echo ''.$maindata["Address"]?></div>
            </div>
            <div class="row m-3">
                <div class="col-3 details"><span class="tag">State: </span><?php echo ''.$maindata["State"]?></div>
                <div class="col-3 details"><span class="tag">LGA: </span><?php echo ''.$maindata["Lga"]?></div>
                <div class="col-3 details"><span class="tag">Hometown: </span><?php echo ''.$maindata["Hometown"]?></div>
                <div class="col-3 details"><span class="tag">Phone Number: </span><?php echo ''.$maindata["Phonenumber"]?></div>
            </div>
            <div class="row m-3">
                <div class="col-3 details"><span class="tag">Vehicle Name: </span><?php echo ''.$maindata["Vehiclename"]?></div>
                <div class="col-3 details"><span class="tag">Engine Number: </span><span style="text-transform: uppercase;"><?php echo ''.$maindata["Enginenumber"]?></span></div>
                <div class="col-3 details"><span class="tag">Chasis: </span><span style="text-transform: uppercase;"><?php echo ''.$maindata["Chasis"]?></span></div>
                <div class="col-3 details"><span class="tag">Plate No: </span><span style="text-transform: uppercase;"><?php echo ''.$maindata["Platenumber"]?></span></div>
            </div>

        </div>
        <div class="plate-box mb-3">
            <h1 class="capital-header text-center"></span><?php echo ''.$maindata["Address"]?></h1>
            <p class="text-center plate-no"><?php echo ''.$maindata["Platenumber"]?></p>
        </div>
        </div>
    </div>
    <script>
       function printBody(){
        document.body.style.visibility  = "hidden";
        var printArea = document.getElementById("print-area");
        printArea.style.visibility = "visible";
        print();
        document.body.style.visibility  = "visible";
        }
    </script>
</body>
</html>