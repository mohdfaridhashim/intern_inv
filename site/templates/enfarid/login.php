<?php
    //require_once 'dbconn.php';
    session_start();

    if(isset($_SESSION['adminId'])){
        header('location:'.$store_url.'adminDashboard.php');
    }
    $errors = array();

    if($_POST){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            if($username==""){
                $errors[] = "Username is required";
            }
            if($password==""){
                $errors[] = "Password is required";
            }
        } else {
            $sql = "SELECT * FROM admins WHERE username = '$username'";
            $result = $connect->query($sql);

            if($result->num_rows == 1){
                $password = md5($password);
                $mainSql = "SELECT * FROM admins WHERE username = 'username' AND password = '$password'";
                $mainResult = $connect->query($mainSql);

                if($mainResult->num_rows == 1){
                    $value = $mainResult->fetch_assoc();
                    $admin_id = $value['admin_id'];

                    $_SESSION['adminId'] = $admin_id;
                    
                    header('location:'.$store_url.'adminDashboard.php');
                    
                } else{
                    $errors[] = "Incorrect username/password combination";
                }
            } else {
                $errors[] = "Username does not exist";
            }
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login Inventory System</title>

        <style>
            .center{
                margin: auto;
                border: #FFF;
            }
        </style>

        <!-- bootstrap -->
        <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
        <!-- bootstrap theme-->
        <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

        <!-- custom css -->
        <link rel="stylesheet" href="custom/css/custom.css">	

        <!-- jquery -->
            <script src="assests/jquery/jquery.min.js"></script>
        <!-- jquery ui -->  
        <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
        <script src="assests/jquery-ui/jquery-ui.min.js"></script>

        <!-- bootstrap js -->
        <script src="assests/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!--<center> <img src="TM.png"> </center>-->
        <div class="center">
            <div class="container">
                <div class="row vertical">
                    <div class="col-md-5 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"> Admin Login </h3>
                            </div>
                            <div class="panel-body">

                                <div class="messages">
                                    <?php if($errors) {
                                        foreach ($errors as $key => $value) {
                                            echo '<div class="alert alert-warning" role="alert">
                                            <i class="glyphicon glyphicon-exclamation-sign"></i>
                                            '.$value.'</div>';										
                                            }
                                        } ?>
                                </div>

                                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label"> Username </label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label"> Password </label>
                                            <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
                                            </div>
                                        </div>								
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-log-in"></i> Log In </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
