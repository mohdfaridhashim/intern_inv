<?php
    //session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intern";
    
    $connect = new mysqli($host, $username, $password, $dbname);
    if($connect->connect_error){
        die("Connection Failed : ". $connect->connect_error);
    } else{
        //echo "Successfully connected";
    }

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
?>