<?php require_once 'core/init.php';

$userdata = getUserDataByUserId_d($_SESSION['id_d']);


if($_POST) {
	$email = $_POST['email'];

	if($email == "") {
		echo " * Email is Required <br />";
	}

	if($email) {
		$user_exists = client_exists_by_id_d($_SESSION['id_d'], $email);
		if($user_exists === TRUE) {
			echo "email already exists <br /> ";
		} else {
			if(updateEmail_d($_SESSION['id_d']) === TRUE) {
				echo "Successfully Updated <br />";
			} else {
				echo "Error while updating the information";
			}
		}
	}

}


?>
