<?php require_once 'core/init.php';

$userdata = getUserDataByUserId($_SESSION['id']);


if($_POST) {
	$email = $_POST['email'];

	if($email == "") {
		echo " * Email is Required <br />";
	}

	if($email) {
		$user_exists = client_exists_by_id($_SESSION['id'], $email);
		if($user_exists === TRUE) {
			echo "email already exists <br /> ";
		} else {
			if(updateEmail($_SESSION['id']) === TRUE) {
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
		<label for="email">Email</label>
		<input type="text" name="email" id="email" placeholder="Email" value="<?php if($_POST) {
			echo $_POST['email'];
			} else {
			 	echo $userdata['email'];
			 	} ?>">
	</div>
	<br>

	<div>
		<button type="submit">Submit</button>
	</div>

</form>

<a href="profil_client.php"><button type="button">Back</button></a>

</body>
</html>
