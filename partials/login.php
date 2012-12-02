<?php
	session_start();

	$username = strip_tags($_POST['user']);
	$password = md5(strip_tags($_POST['password']));
	//$db = new mysqli(localhost, team04, fuchsia, team04.users);
	@ $db = new mysqli(localhost, root, '', team04.users);


?>