<?php
    session_start();

    $staffUsername = $staffPass = "";
    $staffUsername_err = $staffPass_err = $staffLogin_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty(trim($_POST["staff_username"]))) {
            $staffUsername_err = "Please enter username";
        }
        else {
            $staffUsername = trim($_POST["staff_username"]);
        }

        if(empty(trim($_POST["staff_password"]))) {
            $staffPass_err = "Please enter password";
        }
        else {
            $staffPass = trim($_POST["staff_pass"]);
        }

        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Staff Login Inventory System</title>

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
            <?php
                /*require('dbconn.php');
                session_start();

                if(isset($_POST['staff_username'])) {
                    $staffUsername = stripslashes($_REQUEST['staff_username']);
                    $staffUsername = mysqli_real_escape_string($connect, $staffUsername);
                    $staffPass = stripslashes($_REQUEST['staff_pass']);
                    $staffPass = mysqli_real_escape_string($connect, $staffPass);

                    $query = "SELECT * FROM `staffs` WHERE staff_username = '$staffUsername' AND staff_pass = '".md5($staffPass)."'";
                    $result = mysqli_query($connect, $query) or die(mysql_error());
                    $rows = mysqli_num_rows($result);

                    if($rows==1) {
                        $_SESSION['staff_username'] = $staffUsername;
                        echo '<script> alert("Login successful") </script>';
                        header("Location: dashboard.php");
                    }
                    else{
                        echo '<script> alert("Login failed") </script>';
                    }
                } else {

                }*/
            
            ?>


        <div class="center">
            <div class="container">
                <div class="row vertical">
                    <div class="col-md-5 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"> Staff Login </h3>
                            </div>
                            <div class="panel-body">

                                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label"> Staff Username </label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label"> Staff Password </label>
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
