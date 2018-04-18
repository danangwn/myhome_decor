<?php require_once 'core/init.php';

$userdata = getUserDataByUserId_d($_SESSION['id_d']);


if($_POST) {
	$username = $_POST['username'];

	if($username == "") {
		echo " * Username is Required <br />";
	}

	if($username) {
		$user_exists = client_exists_by_id_d($_SESSION['id_d'], $username);
		if($user_exists === TRUE) {
			?>
  <script language="javascript">alert("username already exists");</script>
  <script>document.location.href='profil_designer.php';</script>
  <?php		} else {
			if(updateUsername_d($_SESSION['id_d']) === TRUE) {
				?>
  <script language="javascript">alert("Successfully Updated");</script>
  <script>document.location.href='profil_designer.php';</script>
  <?php
			} else {
				?>
  <script language="javascript">alert("Error while updating the information");</script>
  <script>document.location.href='i.php';</script>
  <?php
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
		<label for="username">Username</label>
		<input type="text" name="username" id="username" placeholder="Username" value="<?php if($_POST) {
			echo $_POST['username'];
			} else {
			 	echo $userdata['username'];
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
