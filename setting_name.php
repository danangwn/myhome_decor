<?php require_once 'core/init.php';


$userdata = getUserDataByUserId_d($_SESSION['id_d']);


if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];


	if($fname == "") {
		echo " * First Name is Required <br />";
	}

	if($lname == "") {
		echo " * Last Name is Required <br />";
	}

	if($fname && $lname) {
		$user_exists = client_exists_by_id_d($_SESSION['id_d'], $fname);
		if($user_exists === TRUE) {
			echo "Name already exists <br /> ";
		} else {
			if(updateName_d($_SESSION['id_d']) === TRUE) {
				echo "Successfully Updated <br />";
			} else {
				echo "Error while updating the information";
			}
		}
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Setting</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" placeholder="Fisrt Name" value="<?php if($_POST) {
			echo $_POST['fname'];
			} else {
				echo $userdata['first_name'];
				} ?>">
	</div>
	<br />

	<div>
		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php if($_POST) {
			echo $_POST['lname'];
			} else {
				echo $userdata['last_name'];
				} ?>">
	</div>
	<br />

	<div>
		<button type="submit">Submit</button>
	</div>

</form>

<a href="profil_client.php"><button type="button">Back</button></a>

</body>
</html>
