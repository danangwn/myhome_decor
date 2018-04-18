<?php require_once 'core/init.php';

if(not_logged_in() === TRUE) {
  header('location: login.php');
}

$userdata = getUserDataByUserId($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Setting</title>
</head>
<body>
<h2><?php echo $userdata['first_name']; ?> <?php echo $userdata['last_name']; ?></h2>
<div>
<td><a href="setting_username.php">Ganti Username</a></td>
</div>
<div>
<td><a href="setting_name.php">Ganti Nama</a></td>
</div>
<div>
<td><a href="changepassword.php">Ganti Password</a></td>
</div>
</div>
	

</form>

<a href="dashboard.php"><button type="button">Back</button></a>

</body>
</html>
