<?php require_once 'includes/headerUser.php'; ?>
 

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"> Dashboard </a></li>
                        <li class="active"> Application </li>
                    </ol>
            
            
                    <h4>
                        <i class="glyphicon glyphicon-circle-arrow-right"></i>
                        Inventory Application	
                    </h4>
            
            
            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-plus-sign"></i> Apply
                        </div> <!--/panel-->	
                
                        <div class="panel-body">
                            <div class="success-messages"></div> <!--/success-messages-->
                                <form class="form-horizontal" method="POST" action="phpaction/createApplication.php" id="createOrderForm">
                                
                                        <div class="form-group">
                                            <label for="start_date" class="col-sm-2 control-label"> Apply Date </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control hasDatepicker" id="start_date" name="start_date" autocomplete="off">
                                                </div>
                                        </div> <!--/form-group-->
                            
                                        <div class="form-group">
                                            <label for="return_date" class="col-sm-2 control-label"> Return Date </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control hasDatepicker" id="return_date" name="return_date" autocomplete="off">
                                                </div>
                                        </div> <!--/form-group-->

                                        <div class="form-group">
                                            <label for="staff_name" class="col-sm-2 control-label"> Staff Name </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" autocomplete="off">
                                                </div>
                                        </div> <!--/form-group-->
                            
                                        <div class="form-group">
                                            <label for="staff_contact" class="col-sm-2 control-label"> Staff Contact </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="staff_contact" name="staff_contact" placeholder="Phone Number" autocomplete="off">
                                                </div>
                                        </div> <!--/form-group-->			  
                
                                        <table class="table" id="applyTable">
                                            <thead>
                                                <tr>			  			
                                                    <th style="width:43%;"> Inventory </th>
                                                    <th style="width:10%;"> Available Quantity </th>
                                                    <th style="width:20%;"> Quantity <br><small>(Enter to update amt)</small></th>			  			
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <tr id="row1" class="0">			  				
                                                    <td style="margin-left:20px;">
                                                        <div class="form-group">
                                                            <select class="form-control" name="inventoryName[]" id="inventoryName1" onchange="getInventoryData(1)">
                                                                <option value=""> --SELECT-- </option>
                                                            <!--<option value="3" id="changeProduct3">Wyze Cam v3 1080p HD Indoor/Outdoor Video Camera</option><option value="4" id="changeProduct4">Ultraboost 21 Primeblue Shoes</option><option value="5" id="changeProduct5">Garment-Dyed Canvas Denim Jacket</option><option value="6" id="changeProduct6">VansXPark Project Classic Slip-On</option><option value="7" id="changeProduct7">TechFit Fitted Tee</option><option value="8" id="changeProduct8">Love Unites Tank Top (Gender Neutral)</option><option value="9" id="changeProduct9">R.T.V. Hoodie</option><option value="10" id="changeProduct10">Adicolor Classics 3-Stripes Shorts</option><option value="11" id="changeProduct11">TP-Link AC1750 Smart WiFi Router (Archer A7)</option><option value="12" id="changeProduct12">Wyze Cam 1080p HD Indoor WiFi Smart Home Camera with Night Vision</option><option value="13" id="changeProduct13">Fire TV Stick 4K streaming device with Alexa Voice Remote</option><option value="14" id="changeProduct14">Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones</option><option value="15" id="changeProduct15">Apple MagSafe Charger</option><option value="16" id="changeProduct16">Sample Product</option>		  						
                                                            </select>-->
                                                        </div>
                                                    </td>

                                                    <td style="padding-left:20px;">
                                                        <div class="form-group">
                                                            <p id="available_quantity1"></p>
                                                        </div>
                                                    </td>

                                                    <td style="padding-left:20px;">
                                                        <div class="form-group">
                                                            <input type="number" name="app_qty" id="app_qty" onkeyup="getTotal(1)" autocomplete="off" class="form-control" min="1"> <!--check getTotal tu-->
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>			  	
                                        </table>
                
                                    <div class="col-md-6">	  
                                        <div class="form-group">
                                            <label for="app_purpose" class="col-sm-3 control-label"> Purpose </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" size="" id="app_purpose" name="app_purpose" autocomplete="off">
                                                </div>
                                        </div> <!--/form-group-->							  
                                    </div> <!--/col-md-6-->
                
                
                                    <div class="form-group submitButtonFooter" align="right">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" class="btn btn-success" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Inventory </button>
                                            <button type="submit" id="createInventoryBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Apply </button>
                                            <button type="reset" class="btn btn-danger" onclick="resetInventoryForm()"><i class="glyphicon glyphicon-erase"></i> Reset </button>
                                        </div>
                                    </div>
                                </form>
                    
            
                        </div> <!--/panel-body-->	
                    </div> <!--/panel-default-->	
                </div>
            </div>
        </div>
            
        <script src="custom/js/application.js"></script>

<?php require_once 'includes/footer.php'; ?>
            