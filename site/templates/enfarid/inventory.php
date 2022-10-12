<?php require_once 'includes/headerUser.php'; ?>

        <div class="container">

            <div class="row">
            <div class="col-md-12">
    
            <ol class="breadcrumb">
              <li><a href="dashboard.php"> Dashboard </a></li>		  
              <li class="active"> Inventory </li>
            </ol>

            <h4>
                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                    Current Inventory	
            </h4>
    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> List of Inventory </div>
                </div> <!-- /panel-heading -->
                
                <div class="panel-body">
                    <div class="remove-messages"></div>			
                    
                    <div id="inventoryTable_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="inventoryTable_length"><label> Show <select name="inventoryTable_length" aria-controls="inventoryTable" class=""><option value="10"> 10 </option><option value="25"> 25 </option><option value="50"> 50 </option><option value="100"> 100 </option></select> entries </label></div><div id="inventoryTable_filter" class="dataTables_filter"><label> Search: <input type="search" class="" placeholder="" aria-controls="inventoryTable"></label></div><table class="table table-hover table-striped table-bordered dataTable no-footer" id="inventoryTable" role="grid" aria-describedby="inventoryTable_info" style="width: 1108px;">
                        <thead>
                            <tr role="row">
                                <th> Inventory </th>
                                <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 274px;"> Name </th>
                                <th class="sorting" tabindex="0" aria-controls="inventoryTable" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending"> Quantity </th>
                            </tr>
                        </thead>

                        <tbody id="tableBody">
                        <script>
                            $( document ).ready(function() {
                                $.ajax({
                                    url: 'phpaction/fetchInventory.php',
                                    mothod: 'post',
                                    dataType: 'json',
                                    success:function(data){
                                        let string = '';
                                        $.each(data, function(key, value){
                                            string += `<tr>
                                            <td>${value['inv_id']}</td>
                                            <td>${value['inv_name']}</td>
                                            <td>${value['inv_qty']}</td>
                                            </tr>`;
                                        });
                                        $('#tableBody').append(string);
                                    },
                                    error:{

                                    }
                                });
                            });
                        </script>
                        </tbody>
                    
                    </table>
                    <div class="dataTables_info" id="inventoryTable_info" role="status" aria-live="polite"> Showing 1 to 10 of 11 entries </div><div class="dataTables_paginate paging_simple_numbers" id="inventoryTable_paginate"><a class="paginate_button previous disabled" aria-controls="inventoryTable" data-dt-idx="0" tabindex="0" id="inventoryTable_previous"> Previous </a><span><a class="paginate_button current" aria-controls="inventoryTable" data-dt-idx="1" tabindex="0"> 1 </a><a class="paginate_button " aria-controls="inventoryTable" data-dt-idx="2" tabindex="0"> 2 </a></span><a class="paginate_button next" aria-controls="inventoryTable" data-dt-idx="3" tabindex="0" id="manageCategoriesTable_next"> Next </a></div></div>
    
                </div> <!-- /panel-body -->
            </div> <!-- /panel -->		
            </div> <!-- /col-md-12 -->
            </div> <!-- /row -->
    

        <script src="custom/js/categories.js"></script>

<?php require_once 'includes/footer.php'; ?>
    