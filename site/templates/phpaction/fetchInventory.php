<?php
    $host = "localhost"; 
    $userName = "root"; 
    $userPass = ""; 
    $database = "intern"; 

    $connectQuery = mysqli_connect($host,$userName,$userPass,$database);

    if(mysqli_connect_errno()){
        echo mysqli_connect_error();
        exit();
    }else{
        $selectQuery = "SELECT * FROM `inventory`";
        $result = mysqli_query($connectQuery,$selectQuery);
        if(mysqli_num_rows($result) > 0){
            $result_array = array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($result_array, $row);
            }

        }


        echo json_encode($result_array);

    }
?>