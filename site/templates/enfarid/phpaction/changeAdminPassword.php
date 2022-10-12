<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$currentPassword = md5($_POST['password']);
	$newPassword = md5($_POST['npassword']);
	$conformPassword = md5($_POST['cpassword']);
	$adminId = $_POST['admin_id'];

	$sql ="SELECT * FROM admins WHERE admin_id = {$adminId}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['password']) {

		if($newPassword == $conformPassword) {

			$updateSql = "UPDATE admins SET password = '$newPassword' WHERE admin_id = {$adminId}";
			if($connect->query($updateSql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Successfully Updated";		
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error while updating the password";	
			}

		} else {
			$valid['success'] = false;
			$valid['messages'] = "New password does not match with Conform password";
		}

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Current password is incorrect";
	}

	$connect->close();

	echo json_encode($valid);

}

?>