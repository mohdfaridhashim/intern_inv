<?php require_once 'dbconn.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Staff Registration </title>

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
            if(isset($_REQUEST['staff_username'])) {
                $staffName = stripslashes($_REQUEST['staff_name']);
                $staffContact = stripslashes($_REQUEST['staff_contact']);
                $staffUsername = stripslashes($_REQUEST['staff_username']);
                $staffUsername = mysqli_real_escape_string($connect, $staffUsername);
                $staffPass = stripslashes($_REQUEST['staff_pass']);
                $staffPass = mysqli_real_escape_string($connect, $staffPass);

                $query = "INSERT into `staffs` (staff_name, staff_contact, staff_username, staff_pass) VALUES ('$staffName', '$staffContact', '$staffUsername', '".md5($staffPass)."')";
                $result = mysqli_query($connect, $query);

                if($result) {
                    echo '<script> alert("Registered successfully") </script>';
                }
                else {
                    echo '<script> alert("Registered failed") </script>';

                }
            } else{

            }
        
        ?>



        <div class="center">
            <div class="container">
                <div class="row vertical">
                    <div class="col-md-5 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"> Register as User </h3>
                            </div>
                            <div class="panel-body">

                                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="staff_name" class="col-sm-2 control-label"> Staff Name </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="staff_contact" class="col-sm-2 control-label"> Staff Contact </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staff_contact" name="staff_contact" placeholder="Staff Contact" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="staff_username" class="col-sm-2 control-label"> Staff Username </label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="staff_username" name="staff_username" placeholder="Staff Username" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="staff_pass" class="col-sm-2 control-label"> Staff Password </label>
                                            <div class="col-sm-10">
                                            <input type="password" class="form-control" id="staff_pass" name="staff_pass" placeholder="Staff Password" autocomplete="off" />
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-log-in"></i> Register </button>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="link"> Already registered? Click here to <a href='staffLogin.php'> login </a></p>
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

          
<?php require_once 'includes/footer.php'; ?>
