<?php

	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}
	include("../partials/utilities.php");

	$user = $_SESSION['user']; 
	$username = strip_tags($_POST['user']);
	$firstname = strip_tags($_POST['first']);
	$lastname = strip_tags($_POST['last']);
	$profilepic = strip_tags($_POST['image']);
	$age = strip_tags($_POST['age']);
	$other = strip_tags($_POST['other']);
	foreach ($_POST as $key => $entry)
	{
    	print $key . ": " . $entry . "<br>";
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$result = $db->query("UPDATE `users` SET username ='$username', first_name = '$firstname' , last_name= '$lastname' , profile_pic= '$profilepic' , age= '$age' , other= '$other' WHERE id = $user;");
	
	$db->close();

	header("Location: ../profile.php");

?>