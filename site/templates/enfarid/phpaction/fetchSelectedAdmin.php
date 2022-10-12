<?php
    require_once 'core.php';

    $adminid = $_POST['adminid'];
    $sql = "SELECT * FROM admins WHERE admin_id=$adminid";
    $result = $connect->query($sql);

    if($result->num_rows>0){
        $row = $result->fetch_array();
    }

    $connect->close();
    echo json_encode($row);
?>