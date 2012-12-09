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
	echo $user;
	foreach ($_POST as $key => $entry)
	{
    	print $key . ": " . $entry . "<br>";
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);
	$result = $db->query("UPDATE users SET username=$username AND first_name=$firstname AND last_name=$lastname AND profile_pic=$profilepic AND age=$age AND other=$other WHERE id = {$user};");
	echo $result;
	$db->close();

	//header("Location: ../profile.php");

?>