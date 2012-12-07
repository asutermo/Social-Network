<?php
	session_start();

	$username = strip_tags($_POST['user']);
	$email = strip_tags($_POST['email']);
	$firstname = strip_tags($_POST['first']);
	$lastname = strip_tags($_POST['last']);
	$password = strip_tags($_POST['password']);
	$profilepic = strip_tags(file_get_contents($_FILE['image']['temp']));
	$gender = strip_tags($_POST['gender']);
	$age = strip_tags($_POST['age']);
	$other = strip_tags($_POST['other']);
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