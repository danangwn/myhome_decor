<?php

require_once 'core/init.php';

if(logged_in_d() === TRUE) {
	header('location: dashboard_d.php');
}

// form submiited
if($_POST) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == "") {
		echo " * Username Field is Required <br />";
	}

	if($password == "") {
		echo " * Password Field is Required <br />";
	}

	if($username && $password) {
		if(userExists_d($username) == TRUE) {
			$login = login_d($username, $password);
			if($login) {
				$userdata = userdata_d($username);

				$_SESSION['id_d'] = $userdata['id_d'];

				header('location: dashboard_d.php');
				exit();

			} else {
				?>
					<script language="javascript">alert("Incorrect username/password combination");</script>
					<script>document.location.href='login.php';</script>;
					<?php
			}
		} else{
			?>

					<script language="javascript">alert("Username does not exists");</script>
					<script>document.location.href='login.php';</script>;
					<?php
		}
	}

} // /if


?>
