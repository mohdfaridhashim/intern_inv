<?php

    session_start();
    if(isset($_SESSION["username"])){
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOGIN </title>

</head>    
<body>
    <div>
        <center><h1> 
            Welcome <br>
            Login is successful<br><br>

            <a href="logout.php"> Exit </a>
        </h1></center>
</body>

</html>