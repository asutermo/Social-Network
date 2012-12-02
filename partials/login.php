<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	$username = strip_tags($_POST['user']);
	$password = md5(strip_tags($_POST['password']));
	//$db = new mysqli(localhost, team04, fuchsia, team04);
	@ $db = new mysqli(localhost, root, '', team04);

	$result = $db->query("SELECT * FROM users WHERE user='{$username}' AND password='{$password}'");
	$count = mysqli_num_rows($result);

	if ($count != 0) {
		$user = $result->fetch_assoc();
		$_SESSION['logged_on'] = true;
		$uname = $user['email'];
		$_SESSION['username'] = $uname;
		$uid = $user['user_id'];
		$_SESSION['user_id'] = $uid;
		
		header("Location: profile.php");
	}
	else {
		$_SESSION['logged_on'] = false;
		$_SESSION['failure'] = "Failed to log in";
		header("Location: ../index.php");	
	}
?>