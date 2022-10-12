<?php

    include 'dbconn.php';
    include 'connect.php';

    /*if($user->isLoggedin()) {
        $session->redirect("/dashboard");
    }*/

    if(isset($_POST['register'])){
        $name = $_POST['fullname'];
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $pdoQuery = "INSERT INTO users (`fullname`, `user_id`, `username`, `password`) VALUES (:name, :id, :username, :password)";
        
        $pdoQuery_run = $connect->prepare($pdoQuery);

        $pdoQuery_exec = $pdoQuery_run->execute(array(":name"=>$name, ":id"=>$id, ":username"=>$username, ":password"=>$password));

        if($pdoQuery_exec){
            echo '<script> alert ("Registration successful") </script>';
            header('location: /login');

        }
        else{
            echo '<script> alert ("Registration failed") </script>';
        }
    }

    /*if($input->post->user && $input->post->pass) {

        $user = $sanitizer->username($input->post->user);
        $pass = $input->post->pass;
        
        if($session->login($user, $pass)) {
            $session->redirect("/dashboard");
        }
    }*/
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?php echo $page->title; ?> </title>

        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.8;
        }

        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }

        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        }

        img.avatar {
        width: 40%;
        border-radius: 50%;
        }

        .container {
        padding: 16px;
        }

        span.login {
        float: right;
        padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.login {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }
        </style>
    </head>

    <body>

        <h2><center> Register Form </center></h2>

        <form action="./" method="POST">
            <?php if($input->post->user) echo "<h2 class='error'> Register Failed </h2>"; ?>
        

            <div class="container">
                <label for="fullname"><b> Staff Name </b></label>
                <input type="text" placeholder="Enter Staff Name" name="fullname" required>

                <label for="user_id"><b> Staff ID </b></label>
                <input type="text" placeholder="Enter Staff ID" name="user_id" required>

                <label for="username"><b> Username </b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b> Password </b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <button type="submit" name="register"> Register </button>
                
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn"> Cancel </button>
                <span class="login"><a href="/login"> Login here. </a></span>
            </div>
        </form>

    </body>
</html>
