<?php

require_once 'core/init.php';

if(logged_in() === TRUE) {
	header('location: dashboard.php');
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
		if(userExists($username) == TRUE) {
			$login = login($username, $password);
			if($login) {
				$userdata = userdata($username);

				$_SESSION['id'] = $userdata['id'];

				header('location: dashboard.php');
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
