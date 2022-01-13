<?php
    require("db.php");
    if(isset($_POST['register'])){

    }
    else{
        header("location: register.html");
        die("Could not Connect");
    }
    
function plate_no_generator(){
        $platenumber = "";
        $alphaarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $numarray = array("1","2","3","4","5","6","7","8","9","0");
        $alphaindex = rand(0,25);
        $numindex = rand(0,9);
        $numpick = rand(2,3);
        for($x = 0; $x < $numpick; $x++){
            $platenumber .= $alphaarray[$alphaindex];
            $alphaindex = rand(0,25);
        }
        
        $platenumber .= "-";
        for($x = 0; $x < 3; $x++){
            $platenumber .= $numarray[$numindex];
            $numindex = rand(0,9);
        }
        $platenumber .= "-";
        if($numpick == 3){
            $numpick = 2;
        }
        else{
            $numpick = 3;
        }
        for($x = 0; $x < $numpick; $x++){
            $platenumber .= $alphaarray[$alphaindex];
            $alphaindex = rand(0,25);
        }
        return $platenumber;  
    }

    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $hometown = $_POST['hometown'];
    $phonenumber = $_POST['phonenumber'];
    $vehiclename = $_POST['vehiclename'];
    $enginenumber = $_POST['enginenumber'];
    $chasis = $_POST['chasis'];
    $passport = $_FILES['passport'];
    $vehicledoc = $_FILES['vehicledoc'];
    $passportfilepath = 'uploads/passport/'.$passport['name'];
    $vehicledocfilepath = 'uploads/vehicledoc/'.$vehicledoc['name'];
    $mainplatenumber = plate_no_generator();
    $sql = "INSERT INTO user (`Fullname`,`Dob`,`Sex`,`Address`,`State`,`Lga`,`Hometown`,`Phonenumber`,`Vehiclename`,`Enginenumber`,`Chasis`,`Passport`,`Vehicledoc`,`Platenumber`)
        VALUES ('$fullname','$dob','$sex','$address','$state','$lga','$hometown','$phonenumber','$vehiclename','$enginenumber','$chasis','$passportfilepath','$vehicledocfilepath','$mainplatenumber')";
    $result = mysqli_query($mysqli,$sql);
    move_uploaded_file($passport['tmp_name'],$passportfilepath);
    move_uploaded_file($vehicledoc['tmp_name'],$vehicledocfilepath);
    if($result){
        session_start();
        $_SESSION['Chasis'] = $chasis;
        header("location: info.php");
    }