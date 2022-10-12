<?php 	

    require_once 'core.php';

    $inventoryId = $_POST['inventoryId'];

    $sql = "SELECT inv_id, inv_img, inv_name, inv_qty, inv_active, inv_status FROM inventory WHERE inv_id = $inventoryId";
    $result = $connect->query($sql);

    if($result->num_rows > 0) { 
    $row = $result->fetch_array();
    } // if num_rows

    $connect->close();

    echo json_encode($row);