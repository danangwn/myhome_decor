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
		if(passwordMatch_d($_SESSION['id_d'], $currentpassword) === TRUE) {

			if($newpassword != $conformpassword) {
				echo "New password does not match conform password <br />";
			} else {
				if(changePassword_d($_SESSION['id_d'], $newpassword) === TRUE) {
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

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
		<tr>
			<th>
				Current Password
			</th>
			<td>
				<input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password" />
			</td>
		</tr>
		<tr>
			<th>
				New Password
			</th>
			<td>
				<input type="password" name="password" autocomplete="off" placeholder="New Password" />
			</td>
		</tr>
		<tr>
			<th>
				Conform Password
			</th>
			<td>
				<input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password" />
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit">Change Password</button>
			</td>
			<td>
				<a href="profil_client.php"><button type="button">Back</button></a>
			</td>
		</tr>
	</table>
</form>

</body>
</html>