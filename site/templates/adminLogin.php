<?php
    /*if($user->isLoggedin()) {
        $session->redirect("/dashboard");
    }*/

    if($input->post->user && $input->post->pass) {

        $user = $sanitizer->username($input->post->user);
        $pass = $input->post->pass;
        
        if($session->login($user, $pass)) {
            $session->redirect("/dashboard");
        }
    }
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

        .container {
        padding: 16px;
        }

        span.register {
        float: right;
        padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.register {
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

        <h2><center> Admin Login </center></h2>

        <form action="./" method="post">
            <?php if($input->post->user) echo "<h2 class='error'> Login Failed </h2>"; ?>
        

            <div class="container">
                <label for="username"><b> Username </b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b> Password </b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <button type="submit"> Login </button>
                <label>
                <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn"> Cancel </a></button>
                <span class="register"><a href="/register"> Register here. </a></span>
            </div>
        </form>

    </body>
</html>
