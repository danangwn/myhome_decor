<?php 

require_once 'core/init.php'; 

if($_POST) {
	$currentpassword = $_POST['currentpassword'];
	$newpassword = $_POST['password'];
	$conformpassword = $_POST['conformpassword'];

	if($currentpassword == "") {
		echo "Current Password field is required <br />";
	}

	if($newpassword == "") {
		echo "New Password field is required <br />";
	}

	if($conformpassword == "") {
		echo "Conform Password field is required <br />";
	}

	if($currentpassword && $newpassword && $conformpassword) {
		if(passwordMatch($_SESSION['id'], $currentpassword) === TRUE) {

			if($newpassword != $conformpassword) {
				echo "New password does not match conform password <br />";
			} else {
				if(changePassword($_SESSION['id'], $newpassword) === TRUE) {
					echo "Successfully updated";
				} else {
					echo "Error while updating the information <br />";
				}
			}
			
		} else {
			echo "Current Password is incorrect <br />";
		}
	}
}

?>
