<?php namespace intern_inv; 

// Template file for pages using the “basic-page” template

?>

<?php
    include 'includes/headerUser.php'; 
    include 'dbconn.php';
    include 'connect.php';


    if(isset($_POST['addInv'])){

        $file = addslashes(file_get_contents($_FILES["inventoryImage"]["tmp_name"]));
        $iname = $_POST['inventoryName'];
        $iqty = $_POST['inventoryQty'];
        $istatus = $_POST['inventoryStatus'];

        $query = "INSERT INTO `inventory`(`inv_img`,`inv_name`,`inv_qty`,`inv_status`) VALUES ('$file','$iname','$iqty','$istatus')";

        $query_run = mysqli_query($connect,$query);

        if($query_run){
            echo '<script type="text/javascript"> alert("Inventory successfully added") </script>';
        }
        else{
            echo '<script type="text/javascript"> alert("Failed in adding inventory") </script>';
        }
    }

    
    if($page->editable()) { ?>
            <div class="addInv">
                <br><button class="addInv" onclick="addInvForm()"> Add Inventory </button>  
            </div>

            <div class="addInv-popup" id="addInvForm">
                <form action="" class="addInv-container" method="POST" enctype="multipart/form-data">
                    <h3> New Inventory </h3>

                    <label for="inventoryImage"><b> Inventory Image </b></label>
                    <input type="file" id="inventoryImage" name="inventoryImage" accept="*/image" required>
                    <br><br>

                    <label for="inventoryName"><b> Inventory Name </b></label>
                    <input type="text" placeholder="Inventory Name" name="inventoryName" required>
                    <br><br>

                    <label for="inventoryQty"><b> Inventory Quantity </b></label>
                    <input type="text" placeholder="Inventory Quantity" name="inventoryQty" required>
                    <br><br>

                    <label for="inventoryStatus"><b> Inventory Status </b></label>
                        <select id="inventoryStatus" name="inventoryStatus">
                            <option value=""> -- SELECT -- </option>
                            <option value="1"> Available </option>
                            <option value="2"> Not Available </option>
                        </select>
                    <br><br>

                    <button type="submit" class="btn" name="addInv"> Confirm </button>
                    <button type="button" class="btn cancel" onclick="closeAddInvForm()"> Cancel </button>
                </form>
            </div>

            <script>
                function addInvForm(){
                    document.getElementById("addInvForm").style.display="block";
                }

                function closeAddInvForm(){
                    document.getElementById("addInvForm").style.display="none";
                }
            </script>
    <?php } 

?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $page->$title; ?> </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        html {
            scroll-behavior: smooth;
        }
        
        #inventory {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 90%;
            margin-left: 5%;
            text-align: center;
        }

        #inventory td, #inventory th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #inventory tr:nth-child(even){
            background-color: #FFE5F1;
        }

        #inventory th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #CD5E77;
            color: white;
        }

        .addInv {
            background-color: ;
            color: black;
            padding: 8px 6px;
            border: none;
            cursor: pointer;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 100px;
            text-align: center;
            font-weight: bold;
        }

        .addInv-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
            height: auto;
        }

        .addInv-container {
            max-width: 400px;
            padding: 8px;
            background-color: white;
            height: auto;
        }

        .addInv-container input[type=text], .addInv-container input[type=file] {
            width: 90%;
            padding: 15px;
            border: none;
            background: #F1F1F1;
        }

        .addInv-container input[type=text]:focus, .addInv-container input[type=file]:focus {
            background-color: #ddd;
            outline: none;
        }

        .addInv-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        .addInv-container .cancel {
            background-color: red;
        }

        .addInv-container .btn:hover, .open-button:hover {
            opacity: 1;
        }

        .bg-modal {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
        }

        .modal-content {
            width: 500px;
            height: 300px;
            background-color: white;
            border-radius: 4px;
            /*text-align: center;*/
            padding: 20px;
            positon: relative;
        }

        .manageInv {
            background-color: black;
            border: 2px solid white;
            border-radius: 30px;
            text-decoration: none;
            padding: 10px 28px;
            color: white;
            margin-top: 10px;
            display: inline-block;
            cursor: pointer;
            &:hover{
                background-color: white;
                color: $blue;
                border: 2px solid $blue;
            }
            
        }

        .input{
            width: 50%;
            display: block;
            margin: 15px auto;
        }

        div {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        .close{
            position: absolute;
            font-size: 42px;
            transform: rotate(45deg);
            cursor: pointer;
        }

        .button {
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: auto;
            cursor: pointer;
        }

        .save {
            background-color: #4CAF50;
        } /* Green */
        
        .remove {
            background-color: #FF0000;
        } /* Red */
        
        </style>

    </head>
    
    <body>
            
            <div class="panel-body"><br><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table id="inventory">
                    <thead>
                    <tr>
                        <th style="width:30%;"> Inventory </th>
                        <th> Name </th>
                        <th style="width:10%;"> Quantity </th>
                        <th style="width:15%;"> Status </th>
                        <?php if($page->editable()) { ?>
                            <th style="width:10%;"> Action </th>
                        <?php } ?>
                    </tr>
                    </thead>

                    <?php 
                        
                        $connect = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connect, 'intern');

                        $query =  "SELECT * FROM `inventory`";
                        $query_run = mysqli_query($connect, $query);
                        
                        while($row = mysqli_fetch_array($query_run)){
                            ?>

                            <tr>
                                <td> <?php echo '<img src="data:inv_img; base64,'.base64_encode($row['inv_img']).' " alt="Image" style="width:100px; height: 100px;" >'; ?> </td>
                                <td> <?php echo $row['inv_name']; ?> </td>
                                <td> <?php echo $row['inv_qty'];?> </td>
                                <td> <?php 
                                
                                        if($row['inv_status']==1){
                                            echo 'Available';
                                        }
                                        if($row['inv_status']==2){
                                            echo 'Not Available';
                                        } ?>
                                </td>
                                <?php if($page->editable()) { ?>
                                    <td style="text-align: center"><button class="manageInv" id="manageInv" onclick="manageInvForm()"> Manage </button></td>
                               <?php } ?>
                                
                            </tr>

                            <?php
                        } ?>
                
                </table>

                <!-- Display pop-up Manage -->
                <div class="bg-modal">
                    <div class="modal-content">
                        
                            <div class="close"> + </div>
                                <h3><center> Manage Inventory </center></h3>
                                <form action="">
                                    <div>
                                        <label for="edit"><b> Edit: </b></label> <input type="text" placeholder="Inventory Name" id="inventoryName"><br><br>
                                        <label for=""> </label> <input type="text" id="inventoryQty" placeholder="Inventory Quantity"> <br><br>
                                        <label for=""> </label> <select id="inventoryStatus" name="inventoryStatus">
                                                                    <option value=""> -- SELECT -- </option>
                                                                    <option value="1"> Available </option>
                                                                    <option value="2"> Not Available </option>
                                                                </select>  
                                    </div><br>
                                    <div>
                                        <label for="remove"><b> Remove: </b></label> <button class="button remove"> Remove </button>
                                    </div><br><br>

                                    <button class="button save"> Save Changes </button>

                                
                                </form>
                    </div>
                </div>
            

            </form>  
            </div>  

            <script>
            
                document.getElementById('manageInv').addEventListener('click', function(){
                    document.querySelector('.bg-modal').style.display="flex";
                });

                document.querySelector('.close').addEventListener('click', function(){
                    document.querySelector('.bg-modal').style.display="none";
                });
            </script>
            
        </body>
</html>
