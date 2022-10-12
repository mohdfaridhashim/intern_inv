<?php require_once 'dbconn.php'; ?>
<?php require_once 'includes/headerAdmin.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="adminDashboard.php"> Dashboard </a></li>		  
                <li class="active"> Update Inventory </li>
            </ol>

            <h4>
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    Manage Inventory	
            </h4>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Add/Edit/Remove Inventory </div>
                </div> 
                <div class="panel-body">

                    <div class="remove-messages"></div>

                    <div class="div-action pull pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-success button1" data-toggle="modal" id="addInventoryModalBtn" data-target="#addInventoryModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Inventory </button>
                    </div> 	
                    

                    <table class="table table-hover table-striped table-bordered" id="manageInventoryTable">
                        <thead>
                            <tr>							
                                <th style="width:25%;"> Inventory </th>
                                <th> Name </th>
                                <th style="width:15%;"> Quantity </th>
                                <th style="width:15%;"> Status </th>
                                <th style="width:15%;"> Options </th>
                            </tr>

                            <tbody>
                            <tr role="row" class="odd">
                                <td> /image </td>
                                <td> /name </td>
                                <td> /qty </td>
                                <td> /status </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Manage <span class="caret"></span>
                                        </button>
                                        
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a type="button" data-toggle="modal" data-target="#editInventoryModal" id="editInventoryModalBtn" onclick="editInventory(1)">
                                                <i class="glyphicon glyphicon-edit"></i> Edit </a>
                                            </li>
                                            <li>
                                                <a type="button" data-toggle="modal" data-target="#removeInventoryModal" id="removeInventoryModalBtn" onclick="removeInventory(1)">
                                                <i class="glyphicon glyphicon-trash"></i> Remove </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </thead>
                    </table>
                    <!-- /table -->

                </div> <!-- /panel-body -->
            </div> <!-- /panel -->		
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->


    <!-- add inventory -->
    <div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitInventoryForm" action="phpaction/createInventory.php" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Add Inventory </h4>
            </div>

            <div class="modal-body" style="max_height:450px; overflow:auto;">

                <div id="add-inventory-messages"></div>

                <div class="form-group">
                        <label for="inventoryImage" class="col-sm-3 control-label"> Inventory Image </label>
                        <label class="col-sm-1 control-label"> : </label>
                            <div class="col-sm-8">
                                <input type="file" id="inventoryImage" name="inventoryImage" accept="image/png, image/jpeg">
                            </div>
                    </div>      	           	       

	        <div class="form-group">
	        	<label for="inventoryName" class="col-sm-3 control-label"> Inventory Name </label>
	        	<label class="col-sm-1 control-label"> : </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="inventoryName" placeholder="Inventory Name" name="inventoryName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label"> Quantity </label>
	        	<label class="col-sm-1 control-label"> : </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

            <div class="form-group">
	        	<label for="inventoryStatus" class="col-sm-3 control-label"> Status </label>
	        	<label class="col-sm-1 control-label"> : </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="inventoryStatus" name="inventoryStatus">
				      	<option value=""> --SELECT-- </option>
				      	<option value="1"> Available </option>
				      	<option value="2"> Not Available </option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	  	         	        
            </div> <!-- /modal-body -->
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancel </button>
                
                <button type="submit" class="btn btn-primary" id="addInventoryBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
            </div> <!-- /modal-footer -->	      
            </form> <!-- /.form -->	     
        </div> <!-- /modal-content -->    
    </div> <!-- /modal-dailog -->
    </div> 
    <!-- /add inventory -->


    <!-- edit inventory -->
    <div class="modal fade" id="editInventoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form class="form-horizontal" id="editInventoryForm" action="phpaction/editInventory.php" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Inventory </h4>
            </div>
            <div class="modal-body">

                <div id="edit-inventory-messages"></div>

                <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only"> Loading... </span>
                        </div>
<!-- masukkan editInventoryImage.php -->
                <div class="edit-inventory-result">
                    <div class="form-group">
                        <label for="editInventoryImage" class="col-sm-4 control-label"> New Image </label>
                        <label class="col-sm-1 control-label"> : </label>
                            <div class="col-sm-7">
                                <input type="file" id="editInventoryImage" name="editInventoryImage" accept="image/png, image/jpeg">
                            </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="editInventoryName" class="col-sm-4 control-label"> Inventory Name </label>
                        <label class="col-sm-1 control-label"> : </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="editInventoryName" placeholder="Inventory Name" name="editInventoryName" autocomplete="off">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="editInventoryQty" class="col-sm-4 control-label"> Quantity </label>
                        <label class="col-sm-1 control-label"> : </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="editInventoryQty" placeholder="Quantity" name="editInventoryQty" autocomplete="off">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="editInventoryStatus" class="col-sm-4 control-label"> Status </label>
                        <label class="col-sm-1 control-label"> : </label>
                            <div class="col-sm-7">
                            <select class="form-control" id="editInventoryStatus" name="editInventoryStatus">
                                <option value=""> SELECT-- </option>
                                <option value="1"> Available </option>
                                <option value="2"> Not Available </option>
                            </select>
                            </div>
                    </div> 	 
                </div>         	        
                <!-- /edit inventory result -->

            </div> 
            
            <div class="modal-footer editInventoryFooter">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancel </button>
                <button type="submit" class="btn btn-success" id="editInventoryBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- /edit inventory -->

    <!-- remove inventory -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeInventoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Inventory </h4>
        </div>
        <div class="modal-body">
            <p> Confirm to remove? </p>
        </div>
        <div class="modal-footer removeInventoryFooter">
            <button type="button" class="btn btn-warning" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancel </button>
            <button type="button" class="btn btn-danger" id="removeInventoryBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Remove </button>
        </div>
        </div>
    </div>
    </div>
    <!-- /remove inventory -->


    <!--<script src="custom/js/inventory.js"></script>-->

<?php require_once 'includes/footer.php'; ?>
    