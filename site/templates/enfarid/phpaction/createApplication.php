<?php
    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array(), 'app_id' => '');

    if($_POST) {

        $apply_date = date('Y-m-d', strtotime($_POST['apply_date']));
        $return_date = date('Y-m-d', strtotime($_POST['return_date']));
        $staff_name = $_POST['staff_name'];
        $staff_contact = $_POST['staff_contact'];
        $app_qty = $_POST['app_qty'];
        $app_purpose = $_POST['app_purpose'];

        $sql = "INSERT INTO `application` (apply_date, return_date, staff_name, staff_contact, app_qty, app_purpose) VALUES ('$apply_date', '$return_date', '$staff_name', '$staff_contact', '$app_qty', '$app_purpose')";

        $app_id;

    }

?>