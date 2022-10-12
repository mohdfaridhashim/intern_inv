<?php require_once 'includes/headerUser.php'; ?>


        <div class="container">
            <div class="row">
	            <div class="col-md-12">
		            <ol class="breadcrumb">
		                <li><a href="dashboard.php"> Dashboard </a></li>		  
		                <li class="active"> Profile </li>
		            </ol>

		            <div class="panel panel-default">
			            <div class="panel-heading">
				            <div class="page-heading"> <i class="glyphicon glyphicon-user"></i> Profile </div>
			            </div> <!-- /panel-heading -->

			            <div class="panel-body">
				            <form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					            <fieldset>
						            <legend> Change Name </legend>
						            <div class="users_nameMessages"></div>			

						                <div class="form-group">
					                        <label for="username" class="col-sm-2 control-label"> Staff Name </label>
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

<?php require_once 'includes/footer.php'; ?>
