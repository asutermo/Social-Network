<?php
	session_start();
	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$username = $db->real_escape_string($_POST['user']);
	$email = $db->real_escape_string($_POST['email']);
	$firstname = $db->real_escape_string($_POST['first']);
	$lastname = $db->real_escape_string($_POST['last']);
	$password = $db->real_escape_string($_POST['password']);
	$gender = $db->real_escape_string($_POST['gender']);
	$age = $db->real_escape_string($_POST['age']);
	$other = $db->real_escape_string(	$_POST['other']);

	//retrieve image, read file to prep for insertion into db
	$target = "images/"; 
 	$target = $target . basename( $_FILES['image']['name']); 
	$profilepic = $_FILES['image']['name'];


	//check for pre-existing emails
	$query = "SELECT * FROM users WHERE email = ?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->store_result();
	$count = $stmt->num_rows();
	$stmt->close();

	//if validation fails
	if ($count != 0) {
		$_SESSION['error'] = "This email has already been used.";
		header("Location: newuser.php");
	}
	else {
		$stmt = $db->prepare("INSERT INTO users (username, first_name, last_name, email, password, profile_pic, gender, age, other) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssbsis', $username, $firstname, $lastname, $email, md5($password), $profilepic, $gender, $age, $other);
		$stmt->execute();
		$stmt->close();

		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$_SESSION['created'] = "New profile created! You may log in now!";
		header("Location: index.php");
	}
	$db->close();
?>`