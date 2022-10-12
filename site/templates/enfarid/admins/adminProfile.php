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

                    <li id="navDashboard"><a href="adminDashboard.php"><i class="glyphicon glyphicon-home"></i> Dashboard </a></li>        
                    <li id="navInventory"><a href="adminInventory.php"><i class="glyphicon glyphicon-th-list"></i> Inventory </a></li>        
                    <li id="navApplication"><a href="adminStatus.php"> <i class="glyphicon glyphicon-plus"></i> View Status </a></li>        
                    <li id="navAdmin"><a href="adminUpdate.php"><i class="glyphicon glyphicon-pencil"></i> Update Inventory </a></li>

                    <li class="dropdown" id="navUser">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu">    
                                <li id="topNavProfile"><a href="adminProfile.php"> <i class="glyphicon glyphicon-user"></i> Profile </a></li>                                
                                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout </a></li>
                            </ul>     
                    </li>        
            
                </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
	            <div class="col-md-12">
		            <ol class="breadcrumb">
		                <li><a href="dashboard.php"> Dashboard </a></li>		  
		                <li class="active"> Profile </li>
		            </ol>

		            <div class="panel panel-default">
			            <div class="panel-heading">
				            <div class="page-heading"> <i class="glyphicon glyphicon-user"></i> Admin Profile </div>
			            </div> <!-- /panel-heading -->

			            <div class="panel-body">
				            <form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					            <fieldset>
						            <legend> Change Name </legend>
						            <div class="users_nameMessages"></div>			

						                <div class="form-group">
					                        <label for="username" class="col-sm-2 control-label"> Admin Name </label>
					                            <div class="col-sm-10">
					                                <input type="text" class="form-control" id="users_name" name="users_name" placeholder="Name" value="">
					                            </div>
					                    </div>

					                    <div class="form-group">
					                        <div class="col-sm-offset-2 col-sm-10">
					    	                    <input type="hidden" name="users_id" id="users_id" value="1"> 
					                            <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeNameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					                        </div>
					                    </div>
					            </fieldset>
				            </form>

				            <form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					            <fieldset>
						            <legend> Change Password </legend>
						            <div class="users_passwordMessages"></div>

						                <div class="form-group">
					                        <label for="password" class="col-sm-2 control-label"> Current Password </label>
					                            <div class="col-sm-10">
					                                <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					                            </div>
					                    </div>

                                        <div class="form-group">
                                            <label for="npassword" class="col-sm-2 control-label"> New Password </label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="newusers_password" name="newusers_password" placeholder="New Password">
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cpassword" class="col-sm-2 control-label"> Confirm Password </label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="confirmusers_password" name="confirmusers_password" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="hidden" name="users_id" id="users_id" value="1"> 
                                                    <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
                                            </div>
                                        </div>


					            </fieldset>
				            </form>
			            </div> <!-- /panel-body -->		
		            </div> <!-- /panel -->		
	            </div> <!-- /col-md-12 -->	
            </div> <!-- /row-->
        </div>
        <script src="custom/js/setting.js"></script>

    </body>
</html>
