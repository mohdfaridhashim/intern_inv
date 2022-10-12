<?php require_once 'includes/headerAdmin.php'; ?>




        <div class="container">
            <div class="row">
	            <div class="col-md-12">
		            <ol class="breadcrumb">
		                <li><a href="adminDashboard.php"> Dashboard </a></li>		  
		                <li class="active"> Profile </li>
		            </ol>

		            <div class="panel panel-default">
			            <div class="panel-heading">
				            <div class="page-heading"> <i class="glyphicon glyphicon-user"></i> Admin Profile </div>
			            </div> <!-- /panel-heading -->

			            <div class="panel-body">
				            <form action="phpaction/changeAdminUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					            <fieldset>
						            <legend> Change Name </legend>
						            <div class="adminNameMessages"></div>			

						                <div class="form-group">
					                        <label for="username" class="col-sm-2 control-label"> Admin Name </label>
					                            <div class="col-sm-10">
					                                <input type="text" class="form-control" id="new_username" name="new_username" placeholder="Name" value="">
					                            </div>
					                    </div>

					                    <div class="form-group">
					                        <div class="col-sm-offset-2 col-sm-10">
					    	                    <input type="hidden" name="users_id" id="users_id" value="1"> 
					                            <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					                        </div>
					                    </div>
					            </fieldset>
				            </form>

				            <form action="phpaction/changeAdminPassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					            <fieldset>
						            <legend> Change Password </legend>
						            <div class="adminPasswordMessages"></div>

						                <div class="form-group">
					                        <label for="password" class="col-sm-2 control-label"> Current Password </label>
					                            <div class="col-sm-10">
					                                <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					                            </div>
					                    </div>

                                        <div class="form-group">
                                            <label for="npassword" class="col-sm-2 control-label"> New Password </label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cpassword" class="col-sm-2 control-label"> Confirm Password </label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="hidden" name="admin_id" id="admin_id" value="1"> 
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
        <script src="custom/js/profile.js"></script>

<?php require_once 'includes/footer.php'; ?>
