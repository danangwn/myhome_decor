<?php

function userExists($username) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM client WHERE username = '$username'";
	$query = $connect->query($sql);
	if($query->num_rows > 0) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function emailExists($email) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM client WHERE email = '$email'";
	$query = $connect->query($sql);
	if($query->num_rows > 0) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function emailExists_d($email) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM designer WHERE email = '$email'";
	$query = $connect->query($sql);
	if($query->num_rows > 0) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function registerUser() {

	global $connect;

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$salt = salt(32);
	$newPassword = makePassword($password, $salt);
	if($newPassword) {
		$sql = "INSERT INTO client (first_name, last_name, username, email, password, salt, active) VALUES ('$fname', '$lname', '$username', '$email', '$newPassword', '$salt' , 1)";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
} // register user funtion

function salt($length) {
	return mcrypt_create_iv($length);
}

function makePassword($password, $salt) {
	return hash('sha256', $password.$salt);
}

function userdata($username) {
	global $connect;
	$sql = "SELECT * FROM client WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}



function login($username, $password) {
	global $connect;
	$userdata = userdata($username);

	if($userdata) {
		$makePassword = makePassword($password, $userdata['salt']);
		$sql = "SELECT * FROM client WHERE BINARY username = '$username' AND BINARY password = '$makePassword'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserId($id) {
	global $connect;

	$sql = "SELECT * FROM client WHERE id = $id";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}


function client_exists_by_id($id, $username) {
	global $connect;

	$sql = "SELECT * FROM client WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function updateUsername($id) {
	global $connect;

	$username = $_POST['username'];


	$sql = "UPDATE client SET username = '$username' WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function updateEmail($id) {
	global $connect;

	$email = $_POST['email'];


	$sql = "UPDATE client SET email = '$email' WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function updateName($id) {
	global $connect;


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];


	$sql = "UPDATE client SET first_name = '$fname', last_name = '$lname' WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: index.php');
	}
}

function passwordMatch($id, $password) {
	global $connect;

	$userdata = getUserDataByUserId($id);

	$makePassword = makePassword($password, $userdata['salt']);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

function changePassword($id, $password) {
	global $connect;

	$salt = salt(32);
	$makePassword = makePassword($password, $salt);

	$sql = "UPDATE client SET password = '$makePassword', salt = '$salt' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}


// DESIGNER


function userExists_d($username) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM designer WHERE username = '$username'";
	$query = $connect->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

function registerUser_d() {

	global $connect;

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$password = $_POST['password'];

	$salt = salt(32);
	$newPassword = makePassword($password, $salt);
	if($newPassword) {
		$sql = "INSERT INTO designer (first_name, last_name, username, email, contact, password, salt, active) VALUES ('$fname', '$lname', '$username', '$email', '$contact', '$newPassword', '$salt' , 1)";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
} // register user funtion


function userdata_d($username) {
	global $connect;
	$sql = "SELECT * FROM designer WHERE username = '$username'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}



function login_d($username, $password) {
	global $connect;
	$userdata = userdata_d($username);

	if($userdata) {
		$makePassword = makePassword($password, $userdata['salt']);
		$sql = "SELECT * FROM designer WHERE BINARY username = '$username' AND BINARY password = '$makePassword'";
		$query = $connect->query($sql);

		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

function getUserDataByUserId_d($id_d) {
	global $connect;

	$sql = "SELECT * FROM designer WHERE id_d = $id_d";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
}


function client_exists_by_id_d($id_d, $username) {
	global $connect;

	$sql = "SELECT * FROM designer WHERE username = '$username' AND id_d != $id_d";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

function updateInfo_d($id_d) {
	global $connect;

	$username = $_POST['username'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sql = "UPDATE designer SET username = '$username', first_name = '$fname', last_name = '$lname', email = '$email', address = '$address' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function updateUsername_d($id_d) {
	global $connect;

	$username = $_POST['username'];


	$sql = "UPDATE designer SET username = '$username' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function updateEmail_d($id_d) {
	global $connect;

	$email = $_POST['email'];


	$sql = "UPDATE designer SET email = '$email' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function updateContact($id_d) {
	global $connect;

	$contact = $_POST['contact'];


	$sql = "UPDATE designer SET contact = '$contact' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}

function updateAbout($id_d) {
	global $connect;

	$about = $_POST['about'];


	$sql = "UPDATE designer SET about = '$about' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function updateName_d($id_d) {
	global $connect;


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];


	$sql = "UPDATE designer SET first_name = '$fname', last_name = '$lname' WHERE id_d = $id_d";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
function logged_in_d() {
	if(isset($_SESSION['id_d'])) {
		return true;
	} else {
		return false;
	}
}

function not_logged_in_d() {
	if(isset($_SESSION['id_d']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

function logout_d() {
	if(logged_in_d() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: index.php');
	}
}

function passwordMatch_d($id_d, $password) {
	global $connect;

	$userdata = getUserDataByUserId_d($id_d);

	$makePassword = makePassword($password, $userdata['salt']);

	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
}

function changePassword_d($id_d, $password) {
	global $connect;

	$salt = salt(32);
	$makePassword = makePassword($password, $salt);

	$sql = "UPDATE designer SET password = '$makePassword', salt = '$salt' WHERE id_d = $id_d";
	$query = $connect->query($sql);

	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}


?>