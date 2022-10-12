<?php require_once 'includes/headerUser.php'; ?>

        <div class="container">
            <div class="row">
	            <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"> Dashboard </a></li>
                        <li class="active"> Return </li>
                    </ol>
            
            
                    <h4>
                        <i class="glyphicon glyphicon-circle-arrow-right"></i>
                        Return Inventory
                    </h4>

		            <div class="panel panel-default">
			            <div class="panel-heading">
				            <i class="glyphicon glyphicon-minus"></i> Return
			            </div><!-- /panel-heading -->
			
                        <div class="panel-body">
			                <form class="form-horizontal" action="phpaction/getReturns.php" method="post" id="getApplication">
                                
                                <div class="form-group">
                                    <label for="staff_name" class="col-sm-2 control-label"> Staff Name </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" autocomplete="off">
                                        </div>
                                </div> <!--/form-group-->

                                <div class="form-group">
                                    <label for="inv_name" class="col-sm-2 control-label"> Inventory </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="inventoryName[]" id="inventoryName1" onchange="getInventoryData(1)">
                                                <option value=""> --SELECT-- </option>
                                            <!--<option value="3" id="changeProduct3">Wyze Cam v3 1080p HD Indoor/Outdoor Video Camera</option><option value="4" id="changeProduct4">Ultraboost 21 Primeblue Shoes</option><option value="5" id="changeProduct5">Garment-Dyed Canvas Denim Jacket</option><option value="6" id="changeProduct6">VansXPark Project Classic Slip-On</option><option value="7" id="changeProduct7">TechFit Fitted Tee</option><option value="8" id="changeProduct8">Love Unites Tank Top (Gender Neutral)</option><option value="9" id="changeProduct9">R.T.V. Hoodie</option><option value="10" id="changeProduct10">Adicolor Classics 3-Stripes Shorts</option><option value="11" id="changeProduct11">TP-Link AC1750 Smart WiFi Router (Archer A7)</option><option value="12" id="changeProduct12">Wyze Cam 1080p HD Indoor WiFi Smart Home Camera with Night Vision</option><option value="13" id="changeProduct13">Fire TV Stick 4K streaming device with Alexa Voice Remote</option><option value="14" id="changeProduct14">Sony WH-1000XM4 Wireless Industry Leading Noise Canceling Overhead Headphones</option><option value="15" id="changeProduct15">Apple MagSafe Charger</option><option value="16" id="changeProduct16">Sample Product</option>-->		  						
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="return_date" class="col-sm-2 control-label"> Return Date </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="return_date" name="return_date">
                                        </div>
                                </div> <!--/form-group-->

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success" id="generateReturnBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Return Inventory </button>
                                    </div>
                                </div>
                            </form>
			            </div> <!-- /panel-body -->
                    </div>
	            </div> <!-- /col-dm-12 -->
            </div> <!-- /row -->

        <script src="custom/js/return.js"></script>

        </div> <!-- /container-->

<?php require_once 'includes/footer.php'; ?>