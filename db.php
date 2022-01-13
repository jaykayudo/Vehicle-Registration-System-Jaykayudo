<?php 
        $mysqli = mysqli_connect("localhost","root","","project");
        $db = "project";
        if($mysqli){
            
        }else{
            header("location: 500.html");
            die(" Could not Connect");   
        }
    
?>