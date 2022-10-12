<?php

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST) {

        $inventoryId = $_POST['inventoryId'];

        $type = explode('.', $_FILES['editInventoryImage']['name']);

            $type = $type[count($type)-1];
            $url  = '../assets/images/stock/'.uniqid(rand()).'.'.$type;
            
            if(in array($type, array('gif','jpg','jpeg','png','JPG','GIF','JPEG','PNG'))) {
                if(is_uploaded_file($_FILES['editInventoryImage']['tmp_name'])) {
                    if(move_uploaded_file($_FILES['editInventoryImage']['tmp_name'], $url)) {
                        
                        $sql = "UPDATE inventory SET inv_img = '$url' WHERE inv_id = $inventoryId";
                        
                        if($connect->query($sql) === TRUE {
                            $valid['success'] = true;
                            $valid['messages'] = "Successfully Updated";
                        }
                        else {
                            $valid['success'] = false;
                            $valid['messages'] = "Error while updating product image";
                        }
                        else {
                            return false;
                        }
                        
                    }
                }
            }


            $connect->close();

            echo json_encode($valid);
    }

