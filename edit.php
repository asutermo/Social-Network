<?php

	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("partials/utilities.php");

	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$user = $_SESSION['user']; 
	$username = $db->real_escape_string($_POST['user']);
	$firstname = $db->real_escape_string($_POST['first']);
	$lastname = $db->real_escape_string($_POST['last']);
	$age = $db->real_escape_string($_POST['age']);
	$other = $db->real_escape_string($_POST['other']);

	//retrieve image, read file to prep for insertion into db
	$profilepic = $_FILES['image']['tmp_name'];
	$fp = fopen($profilepic, 'r');
	$store = fread($fp, filesize($profilepic));
	$store = addslashes($store);
	fclose($fp);
	$encoded = chunk_split(base64_encode($store)); 

	
	$result = $db->query("UPDATE `users` SET username ='$username', first_name = '$firstname', last_name= '$lastname' , profile_pic= '$profilepic' , age= '$age' , other= '$other' WHERE id = $user;");
	
	$db->close();

	header("Location: profile.php");

?>