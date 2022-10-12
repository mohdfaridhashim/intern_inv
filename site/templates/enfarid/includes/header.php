<?php require_once 'core.php'; ?> 

<!DOCTYPE html>
<html>
    <head>

	<title> TM Inventory System </title>

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
                <?php if(isset($_SESSION['userid']) && $_SESSION['userid']==1) { ?>
                <li id="navInventory"><a href="inventory.php"><i class="glyphicon glyphicon-th-list"></i> Inventory </a></li>        
                <?php } ?>
                <?php if(isset($_SESSION['userid']) && $_SESSION['userid']==1) { ?>
                <li id="navApplication"><a href="application.php"> <i class="glyphicon glyphicon-plus"></i> Application </a></li>        
                <?php } ?>
                <?php if(isset($_SESSION['userid']) && $_SESSION['userid']==1) { ?>
                <li id="navReturns"><a href="returns.php"> <i class="glyphicon glyphicon-minus"></i> Returns </a></li> 
                <?php } ?>

                <li class="dropdown" id="navUser">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">    
                            <?php if(isset($_SESSION['userid']) && $_SESSION['userid']==1) { ?>
                            <li id="topNavProfile"><a href="profile.php"> <i class="glyphicon glyphicon-user"></i> Profile </a></li>
                            <?php } ?>
                            
                            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout </a></li>
                        </ul>     
                </li>        
           
            </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
