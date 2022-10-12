<?php

    session_start();

    require_once 'dbconn.php';

    if(!$_SESSION['adminId']){
        header('location:'.$store_url);
    }

?>