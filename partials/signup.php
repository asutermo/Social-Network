<?php
	session_start();

	$username = strip_tags($_POST['user']);
	$firstname = strip_tags($_POST['first']);
	$lastname = strip_tags($_POST['last']);
	$password = strip_tags($_POST['password']);
	$profilepic = strip_tags($_POST['image']);
	$gender = strip_tags($_POST['gender']);
	$age = strip_tags($_POST['age']);
	$other = strip_tags($_POST['other']);
?>