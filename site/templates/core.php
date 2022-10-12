<?php

    session_start();

    require_once 'dbconn.php';

    if(!$_SESSION['admin_id']){
        header('location:'.$store_url);
    }

?>