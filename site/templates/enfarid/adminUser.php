<?php require_once 'includes/headerAdmin.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="adminDashboard.php"> Dashboard </a></li>		  
                <li class="active"> Admin </li>
            </ol>

            <h4>
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    Manage Admins	
            </h4>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> List of Admins </div>
                </div> 
                <div class="panel-body">

                    <div class="remove-messages"></div>

                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-success button1" data-toggle="modal" id="addAdminModalBtn" data-target="#addAdminModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Admin </button>
                    </div> 	
                    

                    <table class="table table-hover table-striped table-bordered" id="manageAdminTable">
                        <thead>
                            <tr>							
                                <th> Admins </th>
                                <th style="width:15%;"> Options </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr role="row" class="odd">
                                <td> /name </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Manage <span class="caret"></span>
                                        </button>
                                        
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a type="button" data-toggle="modal" data-target="#removeAdminModal" id="removeAdminModalBtn" onclick="removeAdmin(1)">
                                                <i class="glyphicon glyphicon-trash"></i> Remove </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /table -->

                </div> <!-- /panel-body -->
            </div> <!-- /panel -->		
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->


    <!-- add admin -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitAdminForm" action="createAdmin.php" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add Admin </h4>
            </div>

            <div class="modal-body">
                <div id="add-admin-messages"></div>    
                
                <div class="form-group">
                    <label for="adminName" class="col-sm-4 control-label"> Admin Username </label>
                    <label class="col-sm-1 control-label"> : </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="adminName" placeholder="Admin Username" name="adminName" autocomplete="off">
                        </div>
                </div>

                <div class="form-group">
                    <label for="adminPass" class="col-sm-4 control-label"> Password </label>
                    <label class="col-sm-1 control-label"> : </label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="adminPass" placeholder="Password" name="adminPass" autocomplete="off">
                        </div>
                </div>
         	        
            </div> <!-- /modal-body -->
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancel </button>
                
                <button type="submit" class="btn btn-primary" id="addAdminBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Confirm Add </button>
            </div> <!-- /modal-footer -->	      
            </form> <!-- /.form -->	     
        </div> <!-- /modal-content -->    
    </div> <!-- /modal-dailog -->
    </div> 
    <!-- /add admin -->

    <!-- remove admin -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeAdminModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Admin </h4>
        </div>
        <div class="modal-body">
            <p> Confirm to remove this admin? </p>
        </div>
        <div class="modal-footer removeAdminFooter">
            <button type="button" class="btn btn-warning" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancel </button>
            <button type="button" class="btn btn-danger" id="removeAdminBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
        </div>
        </div>
    </div>
    </div>
    <!-- /remove admin -->


    <script src="custom/js/admin.js"></script>

<?php require_once 'includes/footer.php'; ?>
    