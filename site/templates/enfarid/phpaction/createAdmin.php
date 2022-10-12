<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$adminName 		= $_POST['adminName'];
    $adminPass 		= md5($_POST['adminPass']);

	
				$sql = "INSERT INTO admins (username, password) 
				VALUES ('$adminName', '$adminPass')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
