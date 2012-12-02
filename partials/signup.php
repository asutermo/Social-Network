<?php
	session_start();

	$username = strip_tags($_POST['user']);
	$email = strip_tags($_POST['email']);
	$firstname = strip_tags($_POST['first']);
	$lastname = strip_tags($_POST['last']);
	$password = strip_tags($_POST['password']);
	$profilepic = strip_tags($_POST['image']);
	$gender = strip_tags($_POST['gender']);
	$age = strip_tags($_POST['age']);
	$other = strip_tags($_POST['other']);

	@ $db = new mysqli(localhost, root, '', team04);
	//$db = new mysqli(localhost, team04, fuchsia, team04);

	//check for pre-existing emails
	$result = $db->query("SELECT * FROM users WHERE email='{$email}'");
	$count = mysqli_num_rows($result);
?>