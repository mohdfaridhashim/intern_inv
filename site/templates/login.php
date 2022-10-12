<?php
    session_start();
    include "dbconn.php";
    include "connect.php";

	/*if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$stmt = $connect->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1");
		$stmt->execute(array($username,$password));
		$checkuser = $stmt->rowCount();
		$user = $stmt->fetch();
		
		
		if($checkuser > 0){
			$_SESSION['user'] = $user['username'];
			$_SESSION['user_type'] = $user['user_type'];
			header('location: ./dashboard');
		}
	}*/

    /*try {
        $connect=new PDO("mysql:host=$host; dbname=$dbname; $username, $password");

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST["login"])){
            if(empty(S_POST["username"])||empty($_POST["password"])){
                $message = '<label> All field is required </label>';
            }
            else{
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";
                $statement = $connect->prepare($query);
                $statement->execute(
                    
                            array(
                                'username' => $_POST["username"],
                                'password' => $_POST["password"]

                            )
                );

                $count = $statement->rowCount();

                if($count > 0){
                    $_SESSION["username"] = $_POST["username"];
                    header("location:/dashboard");
                }
                else{
                    $message ='<label> Username OR Password is incorrect </label>';
                }
                
            }
        }
    }
    catch(PDOException $error){
        $message = $error->getMessage();
    }*/
	
    if(isset($_SESSION["login"])) {
        if($_POST["username"]=="" or $_POST["password"]==""){
            echo "<center><h1>Username and Password is required </h1></center>";

        }
        else {
            $username = strip_tags(trim($_POST["username"]));
            $password = strip_tags(trim($_POST["password"]));

            $query = $connect->prepare("SELECT * FROM users WHERE username=? AND password=?");

            $query->execute(array($username,$password));

            $control = $query->fetch(PDO::FETCH_OBJ);

            if($control>0){
                $_SESSION["username"] = $username;
                header("location: ./dashboard");
                //$session->redirect("/dashboard");

            }

            echo "<center><h1> Incorrect Username or Password </h1></center>";
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
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

        <h2><center> Login </center></h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">        

            <div class="container">
                <label for="username"><b> Username </b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b> Password </b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <button type="submit" name="login"> Login </button>
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
