<?php
	session_start();

	$username = mysql_real_escape_string($_POST['user']);
	$email = mysql_real_escape_string($_POST['email']);
	$firstname = mysql_real_escape_string($_POST['first']);
	$lastname = mysql_real_escape_string($_POST['last']);
	$password = mysql_real_escape_string($_POST['password']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$age = mysql_real_escape_string($_POST['age']);
	$other = mysql_real_escape_string($_POST['other']);

	//retrieve image, read file to prep for insertion into db
	$profilepic = $_FILES['image']['tmp_name'];
	$fp = fopen($profilepic, 'r');
	$store = fread($fp, filesize($profilepic));
	$store = addslashes($store);
	fclose($fp);
	$encoded = chunk_split(base64_encode($store)); 


	@ $db = new mysqli(localhost, team04, fuchsia, team04);

	//check for pre-existing emails
	$result = $db->query("SELECT * FROM users WHERE email='{$email}'");
	$count = mysqli_num_rows($result);

	//if validation fails
	if ($count != 0) {
		$_SESSION['error'] = "This email has already been used.";
		header("Location: newuser.php");
	}
	else {
		$stmt = $db->prepare("INSERT INTO users (username, first_name, last_name, email, password, profile_pic, gender, age, other) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssbsis', $username, $firstname, $lastname, $email, md5($password), $profilepic, $gender, $age, $other);
		$stmt->execute();
		$_SESSION['created'] = "New profile created! You may log in now!";
		header("Location: index.php");
	}
	$db->close();
?>`