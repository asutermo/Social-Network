<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("partials/utilities.php");
	$user = $_SESSION['user']; 
	$status = $_POST['status'];
	addStatus($user, $status);
	header("Location: profile.php");
?>