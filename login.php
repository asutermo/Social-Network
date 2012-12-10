<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: index.php");
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$username = $db->real_escape_string($_POST['user']);
	$password = md5($db->real_escape_string($_POST['password']));

	

	$result = $db->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
	$count = mysqli_num_rows($result);

	if ($count != 0) {
		$user = $result->fetch_assoc();
		$_SESSION['logged_on'] = true;
		$_SESSION['user'] = $user['id'];
		header("Location: home.php");
	}
	else {
		$_SESSION['logged_on'] = false;
		$_SESSION['error'] = "Failed to log in";
		header("Location: index.php");	
	}
	$db->close();
?>