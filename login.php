<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: index.php");
	}

	$username = stripslashes($_POST['user']);
	$password = md5(stripslashes($_POST['password']));

	@ $db = new mysqli(localhost, team04, fuchsia, team04);

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