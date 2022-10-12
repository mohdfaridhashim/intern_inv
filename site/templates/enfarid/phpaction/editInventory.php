<?php 	

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST) {	

        $inventoryId = $_POST['inventoryId'];
        //$inventoryImage = $_POST['editInventoryImage'];
        $inventoryName = $_POST['editInventoryName'];
        $inventoryQty = $_POST['editInventoryQty']; 
        $inventoryStatus = $_POST['editInventoryStatus'];

        $sql = "UPDATE inventory SET inv_name = '$inventoryName', inv_qty = '$inventoryQty', inv_active = '$inventoryStatus', inv_status = 1 WHERE inv_id = '$inventoryId'";

        if($connect->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Updated";	
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while updating the categories";
        }
        
        $connect->close();

        echo json_encode($valid);
    
    } // /if $_POST