<?php
    require_once 'dbconn.php';
    //session_start();
    if(isset($_SESSION['userid'])){
        header('location:'.$store_url.'dashboard.php');
    }

    $errors=array();

    if($_POST){
        $username = $_POST['admins_id'];
        $password = $_POST['admins_password'];

        if(empty($username) || empty($password)){
            if($username == ""){
                $errors[] = "ID is required";
            }
            if($password == ""){
                $errors[] = "Password is required";
            }
            else{
                $sql = "SELECT * FROM admins WHERE admins_id = '$username'";
                $result = $connect->query($sql);

                if($result->num_rows == 1){
                    $password = md5($password);

                    $mainSql = "SELECT * FROM admins WHERE admins_id = '$username' AND admins_password = '$password'";
                    $mainResult = $connect->query($mainSql);

                    if($mainResult->num_rows == 1){
                        $value = $mainResult->fetch_assoc();
                        $user_id = $value['admins_id'];

                        $_SESSION['userid'] = $user_id;

                        header('location:'.$store_url.'dashboard.php');
                    }
                    else{
                        $errors[] = "Incorrect ID/password combination";
                    }
                }  //ifNOT1
                else {
                    $errors[] = "ID does not exist";
                } //else
            } //else
            
        } //ifNOTEMPTY
        
    } //ifPOST
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Inventory System </title>
        
            <!-- bootstrap -->
            <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
            <!-- bootstrap theme-->
            <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
            <!-- font awesome -->
            <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

            <!-- custom css -->
            <link rel="stylesheet" href="custom/css/custom.css">

            <!-- DataTables -->
            <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

            <!-- file input -->
            <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

            <!-- jquery -->
                <script src="assests/jquery/jquery.min.js"></script>
            <!-- jquery ui -->  
            <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
            <script src="assests/jquery-ui/jquery-ui.min.js"></script>

            <!-- bootstrap js -->
            <script src="assests/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

                <ul class="nav navbar-nav navbar-right">        

                    <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Dashboard </a></li>        
                    <li id="navInventory"><a href="inventory.php"><i class="glyphicon glyphicon-inbox"></i> Inventory </a></li>        
                    <li id="navApplication"><a href="application.php"> <i class="glyphicon glyphicon-plus"></i> Application </a></li>        
                    <li id="navReturns"><a href="returns.php"> <i class="glyphicon glyphicon-minus"></i> Returns </a></li> 
                    <li id="navAdmin"><a href="login.php"><i class="glyphicon glyphicon-star"></i> Admin </a></li>

                    <li class="dropdown" id="navUser">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu">    
                                <li id="topNavProfile"><a href="profile.php"> <i class="glyphicon glyphicon-user"></i> Profile </a></li>                                
                                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout </a></li>
                            </ul>     
                    </li>        
            
                </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>