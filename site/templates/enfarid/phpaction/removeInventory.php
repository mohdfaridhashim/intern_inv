<?php

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    $inventoryId = $_POST['inventoryId'];

    if($inventoryId) {

        $sql = "UPDATE inventory SET inv_active = 2, inv_status = 2 WHERE inv_id = ($inventoryId)";

        if($connect->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Removed";
        }
        else {
            $valid['success'] = false;
            $valid['messages'] = "Error while removing the inventory";
        }

        $connect->close();

        echo json_encode($valid);
    }
