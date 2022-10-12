<?php

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intern_inv";
    $store_url = "http://localhost/enfarid/";
    
    $connect = new mysqli($localhost, $username, $password, $dbname);
    if($connect->connect_error){
        die("Connection Failed : ". $connect->connect_error);
    } else{
        //echo "Successfully connected";
    }
    
?>