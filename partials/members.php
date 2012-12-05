<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	@ $db = new mysqli(localhost, team04, fuchsia, team04);

	$result = $db->query("SELECT * FROM users");
	$count = mysqli_num_rows($result);

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		foreach($row as $value) {
			echo $value."\n";
		}
	}
	$db->close();
?>