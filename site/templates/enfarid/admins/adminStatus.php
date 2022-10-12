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
                        <li class="active"> View Status </li>
                    </ol>
            
            
                    <h4>
                        <i class="glyphicon glyphicon-circle-arrow-right"></i>
                        View Inventory Status
                    </h4>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> List of Applied Inventory </div>
                        </div> <!-- /panel-heading -->
                
                        <div class="panel-body">
                            <div class="remove-messages"></div>			
                                <div id="inventoryTable_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="inventoryTable_length"><label> Show <select name="inventoryTable_length" aria-controls="inventoryTable" class=""><option value="10"> 10 </option><option value="25"> 25 </option><option value="50"> 50 </option><option value="100"> 100 </option></select> entries </label></div><div id="inventoryTable_filter" class="dataTables_filter"><label> Search: <input type="search" class="" placeholder="" aria-controls="inventoryTable"></label></div><table class="table table-hover table-striped table-bordered dataTable no-footer" id="inventoryTable" role="grid" aria-describedby="inventoryTable_info" style="width: 1108px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="Name: activate to sort colum ascending" style="width: 274px;"> Staff's Name </th>
                                            <th> Inventory </th>
                                            <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending"> Quantity </th>
                                            <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column by ascending"> Status </th>
                                            <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="ReturnDate: activate to sort column ascending"> Return Date </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr role="row" class="odd"> 
                                            <td> //name </td> 
                                            <td> //inv_name </td>
                                            <td> //quantity </td>
                                            <td> //status </td>
                                            <td> //returnDate </td>
                                        </tr>
                                    </tbody>
                    
                                </table>
                                <div class="dataTables_info" id="inventoryTable_info" role="status" aria-live="polite"> Showing 1 to 10 of 11 entries </div><div class="dataTables_paginate paging_simple_numbers" id="inventoryTable_paginate"><a class="paginate_button previous disabled" aria-controls="inventoryTable" data-dt-idx="0" tabindex="0" id="inventoryTable_previous"> Previous </a><span><a class="paginate_button current" aria-controls="inventoryTable" data-dt-idx="1" tabindex="0"> 1 </a><a class="paginate_button " aria-controls="inventoryTable" data-dt-idx="2" tabindex="0"> 2 </a></span><a class="paginate_button next" aria-controls="inventoryTable" data-dt-idx="3" tabindex="0" id="manageCategoriesTable_next"> Next </a></div></div>
    
                         </div> <!-- /panel-body -->
                    </div> <!-- /panel -->		
                </div> <!-- /col-md-12 -->
            </div> <!-- /row -->
        </div> <!-- /container -->