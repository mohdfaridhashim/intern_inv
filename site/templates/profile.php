<?php include 'includes/headerUser.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        form {
            border: 3px solid #f1f1f1;
        }

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
        width:100%;
        height: auto;
        }

        .profile {
            margin: 20px auto;
            max-width: 200px;
            position: relative;
            border-radius: 50%;
        }

        .profile:hover .overlay {
            background-color: rgba(0,0,0,0.5);
        }

        .profile:hover .overlay p {
            display: block;
        }

        .profile img {
            display: block;
            width: 100%;
            border-radius: 50%;
            height: auto;
        }

        .profile .overlay {
            position: absolute;
            width: 100%;
            bottom: 0;
            overflow: hidden;
            height: 100%;
            border-radius: 50%;
        }

        .profile .overlay input {
            width: 100%;
            position: absolute;
            opacity: 0;
            bottom: 20px;
            z-index: 2;
            cursor: pointer;
        }

        .profile .overlay p {
            position: absolute;
            bottom: 10px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            width: 100%;
            display: none;
        }

        img.avatar {
        width: 10%;
        border-radius: 50%;
        }

        .container {
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

        @media screen and (max-width: 300px) {
            span.psw {
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

        <h3><center> Update Profile </center></h3>

        <form action="" method="post">
            <div class="imgcontainer">
                <div class="profile">
                    <img id="image" src="images/avatar.png">
                    <div class="overlay">
                        <input id="imgInp" type="file">
                        <p> Change Picture  </p>
                    </div>
                </div>
            </div>

        <div class="container">
            <label for="username"><b> Username </b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="new_username"><b> New Username </b></label>
            <input type="text" placeholder="Enter New Username" name="new_username" required>

            <label for="password"><b> Current Password </b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="new_password"><b> New Password </b></label>
            <input type="password" placeholder="Enter New Password" name="new_password" required>

            <label for="con_password"><b> Confirm New Password </b></label>
            <input type="password" placeholder="Confirm Password" name="con_password" required>
                
            <button type="submit"> Save Changes </button>
            
        </div>

        
        </form>

        <script>
            function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            }

            $("#imgInp").change(function(){
                readURL(this);
            }) 
        </script>
    </body>
</html>
