<?php
	session_start();

	$username = mysql_real_escape_string(stripslashes($_POST['user']);
	$email = mysql_real_escape_string(stripslashes($_POST['email']);
	$firstname = mysql_real_escape_string(stripslashes($_POST['first']);
	$lastname = mysql_real_escape_string(stripslashes($_POST['last']);
	$password = mysql_real_escape_string(stripslashes($_POST['password']);
	$profilepic = mysql_real_escape_string(stripslashes($_POST['image']);
	$gender = mysql_real_escape_string(stripslashes($_POST['gender']);
	$age = mysql_real_escape_string(stripslashes($_POST['age']);
	$other = mysql_real_escape_string(stripslashes($_POST['other']);
	foreach ($_POST as $key => $entry)
	{
    	print $key . ": " . $entry . "<br>";
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);

	//check for pre-existing emails
	$result = $db->query("SELECT * FROM users WHERE email='{$email}'");
	$count = mysqli_num_rows($result);

	//if validation fails
	if ($count != 0) {
		$_SESSION['error'] = "This email has already been used.";
		header("Location: ../newuser.php");
	}
	else {
		$stmt = $db->prepare("INSERT INTO users (username, first_name, last_name, email, password, profile_pic, gender, age, other) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssbsis', $username, $firstname, $lastname, $email, md5($password), $profilepic, $gender, $age, $other);
		$stmt->execute();
		$_SESSION['logged_on'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $user['user_id'];

		header("Location: ../home.php");
	}
	$db->close();
?>`