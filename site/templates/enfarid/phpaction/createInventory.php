<?php 	

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST) {	

        //$inventoryImage = $_POST['inventoryImage'];
        $inventoryName = $_POST['inventoryName'];
        $inventoryQty = $_POST['inventoryQty'];
        $inventoryStatus = $_POST['inventoryStatus']; 

        $type = explode('.', $_FILES['inventoryImage']['name']);
        $type = $type[count($type)-1];
        $url = '../assets/images/stock/'.uniqid(rand()).'.'.$type;
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
            if(is_uploaded_file($_FILES['inventoryImage']['tmp_name'])) {

                if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
                    $sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, rate, active, status) 
                    VALUES ('$productName', '$url', '$brandName', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";
    
                    if($connect->query($sql) === TRUE) {
                        $valid['success'] = true;
                        $valid['messages'] = "Successfully Added";	
                    } else {
                        $valid['success'] = false;
                        $valid['messages'] = "Error while adding the members";
                    }
    
                }	else {
                    return false;
                }	// /else	
            }
        }

        /*$sql = "INSERT INTO inventory (inv_img, inv_name, inv_qty, inv_status) 
        VALUES ('$inventoryImage', '$inventoryName', '$inventoryQty', '$inventoryStatus', 1)";

        if($connect->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Added";	
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while adding the members";
        }*/

        $connect->close();

        echo json_encode($valid);
    
    } // /if $_POST