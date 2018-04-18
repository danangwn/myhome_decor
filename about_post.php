<?php require_once 'core/init.php';

$userdata = getUserDataByUserId_d($_SESSION['id_d']);


if($_POST) {
	$about = $_POST['about'];

	if($about == "") {
		echo " * Contact is Required <br />";
	}

	if($about) {
		$user_exists = client_exists_by_id_d($_SESSION['id_d'], $about);
		if($user_exists === TRUE) {
			echo "contact already exists <br /> ";
		} else {
			if(updateAbout($_SESSION['id_d']) === TRUE) {
				echo "Successfully Updated <br />";
			} else {
				echo "Error while updating the information";
			}
		}
	}

}


?>