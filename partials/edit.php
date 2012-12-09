<?php

	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}
	include("/partials/utilities.php");

	$user = $_SESSION['user']; 
	$username = strip_tags($_POST['user']);
	$firstname = strip_tags($_POST['first']);
	$lastname = strip_tags($_POST['last']);
	$profilepic = $_FILES["files"]["tmp_name"];
	$gender = strip_tags($_POST['gender']);
	$age = strip_tags($_POST['age']);
	$other = strip_tags($_POST['other']);
	foreach ($_POST as $key => $entry)
	{
    	print $key . ": " . $entry . "<br>";
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$count = mysqli_num_rows($result);
	$db->close();

?>