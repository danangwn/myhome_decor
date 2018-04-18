<?php require_once 'core/init.php';

$userdata = getUserDataByUserId_d($_SESSION['id_d']);


if($_POST) {
	$contact = $_POST['contact'];

	if($contact == "") {
		echo " * Contact is Required <br />";
	}

	if($contact) {
		$user_exists = client_exists_by_id_d($_SESSION['id_d'], $contact);
		if($user_exists === TRUE) {
			echo "contact already exists <br /> ";
		} else {
			if(updateContact($_SESSION['id_d']) === TRUE) {
				echo "Successfully Updated <br />";
			} else {
				echo "Error while updating the information";
			}
		}
	}

}


?>
