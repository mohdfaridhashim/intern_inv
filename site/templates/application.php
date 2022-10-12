<?php namespace intern_inv; 

// Template file for pages using the “basic-page” template

?>

<?php
    include 'includes/headerUser.php'; 
    include 'dbconn.php';

    if($page->editable()) { ?>
            <div class="viewApp, flex-parent jc-center">
                <br><button class="viewApp" onclick="viewApplicators()"><b> View Applicators </b></button>
                <button class="newApp" onclick="manageApp()"><b> Manage Applications </b></button>
            </div>
    
            <div class="viewApp-popup" id="viewApplicators">
                <form action="" class="viewApp-container">
                    <h3> View Applicators </h3>

                    <table id="viewApp">
                        <tr>
                            <th> Staff Name </th>
                            <th> Inventory Name  </th>
                            <th style="width:20%;"> Quantity </th>
                        </tr>

                        <?php 
                        
                        $query = "SELECT * FROM application a, inventory i WHERE i.inv_id = a.inv_id";
        
                        $data = $connect->query($query);

                        foreach($data as $row)
                        {
                            echo '<tr>
                                    <td>'.$row["staff_name"].'</td>
                                    <td>'.$row["inv_name"].'</td>
                                    <td>'.$row["app_qty"].'</td>
                                </tr>';
                        } ?>
                    </table>
                        
                    <br><br>
                    <button type="button" class="btn cancel" onclick="closeViewApplicators()"><b> Close </b></button>
                </form>
            </div>

            <div class="newApp-popup" id="manageApp">
                <form action="" class="newApp-container">
                    
                        <h3> Manage Applications </h3>

                        <table id="viewApp">
                            <tr>
                                <th> Staff Name </th>
                                <th style="width:20%;"> Status </th>
                            </tr>

                            <?php 
                        
                            $query = "SELECT * FROM application";
            
                            $data = $connect->query($query);

                            foreach($data as $row)
                            {
                                echo '<tr>
                                        <td>'.$row["staff_name"].'</td>
                                        <td><button type="submit"> Approve </button></td>
                                    </tr>';
                            } ?>
                            
                        </table>

                        <br><br>
                        <button type="button" class="btn cancel" onclick="closeManageApp()"><b> Close </b></button>
                        
                </form>
            </div>
        
            <script>
                function viewApplicators(){
                    document.getElementById("viewApplicators").style.display="block";
                }

                function closeViewApplicators(){
                    document.getElementById("viewApplicators").style.display="none";
                }

                function manageApp(){
                    document.getElementById("manageApp").style.display="block";
                }

                function closeManageApp(){
                    document.getElementById("manageApp").style.display="none";
                }

            </script>
    <?php }
    
    else { ?>
        <div class="viewApp, flex-parent jc-center">
            <br><button class="viewApp" onclick="viewAppForm()"><b> View Application </b></button>
            <button class="newApp" onclick="newAppForm()"><b> New Application </b></button>
        </div>
    
        <div class="viewApp-popup" id="viewAppForm">
            <form action="" class="viewApp-container">
                <h3> View Application </h3>

                <table id="viewApp">
                    <tr>
                        <th> Name </th>
                        <th style="width:20%;"> Quantity </th>
                        <th> Status </th>
                    </tr>

                    <tr>
                        <td> nama inv </td>
                        <td> qty </td>
                        <td> pending </td>
                    </tr>

                    <tr>
                        <td> nama inv </td>
                        <td> qty </td>
                        <td> pending </td>
                    </tr>

                    <tr>
                        <td> nama inv </td>
                        <td> qty </td>
                        <td> pending </td>
                    </tr>
                </table>
                    
                <br><br>
                <button type="button" class="btn cancel" onclick="closeViewAppForm()"><b> Close </b></button>
            </form>
        </div>

        <div class="newApp-popup" id="newAppForm">
            <form action="" class="newApp-container">
                
                    <h3> New Application </h3>

                <div class="group">
                    <div class="flex-parent jc-center">
                        <label for="staff_name"><b> Staff Name </b></label>
                        <input type="text" placeholder="Staff Name" name="staff_name">

                        <label for="staff_contact"><b> Staff Contact </b></label>
                        <input type="text" placeholder="Staff Contact" name="staff_contact">
                    </div>

                    <br><br>

                    <div class="flex-parent jc-center">
                        <label for="start_date"><b> Apply Date </b></label>
                        <input type="date" placeholder="Apply Date" name="start_date">

                        <label for="end_date"><b> Return Date </b></label>
                        <input type="date" placeholder="Return Date" name="end_date">
                    </div>
                    
                    <br><br>

                    <label for="inventoryStatus"><b> Inventory </b></label>
                        <select id="inventoryStatus" name="inventoryStatus">
                            <option value=""> -- SELECT -- </option>
                            <option value="1"> /inv name 1 </option>
                            <option value="2"> /inv name 2 </option>
                        </select>
                    <br><br>

                    <label for="inventoryQty"><b> Quantity </b></label>
                    <input type="text" placeholder="Inventory Quantity" name="inventoryQty">
                    
                    <br><br>
                    <div class="flex-parent jc-center">
                        <button type="button" class="btn cancel" onclick="closeNewAppForm()"><b> Cancel </b></button>
                        <button type="submit" class="btn"><b> Confirm Application </b></button>
                    </div>
                </div>
            </form>
        </div>
    
        <script>
            function viewAppForm(){
                document.getElementById("viewAppForm").style.display="block";
            }

            function closeViewAppForm(){
                document.getElementById("viewAppForm").style.display="none";
            }

            function newAppForm(){
                document.getElementById("newAppForm").style.display="block";
            }

            function closeNewAppForm(){
                document.getElementById("newAppForm").style.display="none";
            }

        </script>
    <?php }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $page->$title; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

        div.scroll {
            margin: 4px, 4px;
            padding: 4px;
            width: auto;
            height: auto;
            overflow-x: hidden;
            overflow-y: auto;
            text-align:justify;
        }
        
        .flex-parent {
            display: flex;
        }

        .jc-center {
            justify-content: center;
        }

        button.margin-right {
            margin-right: 20px;
        }

        #viewApp {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-left: 0px;
        }

        #viewApp td, #viewApp th {
            border: 1px solid #C29200;
            padding: 8px;
        }

        #viewApp tr:nth-child(even){
            background-color: #FDEE87;
        }

        #viewApp th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #FDA50F;
            color: white;
        }

        .viewApp {
            background-color: #E66101;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-size: 15px;
        }

        .newApp {
            background-color: #5E3C99;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-size: 15px;
        }

        .manageApp {
            background-color: #5E3C99;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-size: 15px;
        }

        .viewApp-popup {
            display: none;
            position: fixed;
            left: 0;
            border: 3px solid #f1f1f1;
            z-index: 9;
            width: 48%;
            margin-left: 1%;
            height: auto;
        }

        .viewApp-container {
            max-width: 100%;
            padding: 8px;
            background-color: white;
            height: auto;
        }

        .viewApp-container input[type=text], .viewApp-container input[type=int] {
            width: 90%;
            padding: 15px;
            border: none;
            background: #F1F1F1;
        }

        .viewApp-container input[type=text]:focus, .viewApp-container input[type=int]:focus {
            background-color: #ddd;
            outline: none;
        }

        .viewApp-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        .viewApp-container .cancel {
            background-color: red;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
            opacity: 0.9;
        }

        .viewApp-container .btn:hover, .open-button:hover {
            opacity: 1;
        }

        .newApp-popup {
            display: none;
            position: fixed;
            right: 0;
            border: 3px solid #f1f1f1;
            z-index: 9;
            width: 48%;
            margin-right: 1%;
        }

        .newApp-container {
            max-width: 100%;
            padding: 8px;
            background-color: white;
            height: auto;
        }

        .newApp-container input[type=text], .newApp-container input[type=date] {
            width: 40%;
            padding: 15px;
            border: none;
            background: #F1F1F1;
        }

        .newApp-container input[type=text]:focus, .newApp-container input[type=date]:focus {
            background-color: #ddd;
            outline: none;
        }

        .newApp-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .newApp-container .cancel {
            background-color: red;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .newApp-container .btn:hover, .open-button:hover {
            opacity: 1;
        }

        /*.manageApp-popup {
            display: none;
            position: fixed;
            right: 0;
            border: 3px solid #f1f1f1;
            z-index: 9;
            width: 48%;
            margin-right: 1%;
        }

        .manageApp-container {
            max-width: 100%;
            padding: 8px;
            background-color: white;
            height: auto;
        }

        .manageApp-container input[type=button] {
            width: 40%;
            padding: 15px;
            border: none;
            background: #F1F1F1;
        }

        .manageApp-container input[type=button]:focus {
            background-color: #ddd;
            outline: none;
        }

        .manageApp-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .manageApp-container .cancel {
            background-color: red;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .manageApp-container .btn:hover, .open-button:hover {
            opacity: 1;
        }*/

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .group label{
            font-size: 14px;
        }
        </style>

    </head>
    
    <body>
           
         
    </body>
</html>