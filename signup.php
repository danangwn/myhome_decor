<?php
include 'core/db_connect.php';
require_once 'core/init.php';

if(logged_in() === TRUE) {
	header('location: dashboard.php');
}

// form is submitted
if($_POST) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if($fname == "") {
		echo " * First Name is Required <br />";
	}

	if($lname == "") {
		echo " * Last Name is Required <br />";
	}

	if($username == "") {
		echo " * Username is Required <br />";
	}

	if($email == "") {
		echo " * Email is Required <br />";
	}

	if($password == "") {
		echo " * Password is Required <br />";
	}

	if($cpassword == "") {
		echo " * Conform Password is Required <br />";
	}

	

	if($username && $password && $cpassword) {

		if($password == $cpassword) {
			if ((strlen(trim($password))>=8)) {
				if(userExists($username) === TRUE) {?>
				<script language="javascript">alert("Username Already Exist");</script>
				<script>document.location.href='register.php';</script>;
				<?php
				
			} 

			else {
				if (emailExists($email) === TRUE) {?>
				<script language="javascript">alert("Email Already Exist");</script>
				<script>document.location.href='register.php';</script>;
				<?php	
				}

				else {
					if(registerUser() === TRUE) {
					if($username && $password) {
						if(userExists($username) == TRUE) {
							$login = login($username, $password);
							if($login) {
								$userdata = userdata($username);

								$_SESSION['id'] = $userdata['id'];

								header('location: dashboard.php');
								exit();

							}
						}
					}
					}
					else {
					echo "Error";
				}

				}
			}
			}
			else{?>
				<script language="javascript">alert("Password at least contains 8 characters");</script>
				<script>document.location.href='register.php';</script>;
				<?php

			}
			 

				
			}
		} 

		else {
			?>
				<script language="javascript">alert("Password does not match with Conform Password");</script>
				<script>document.location.href='register.php';</script>;
				<?php
		}
	
	}
	



?>
