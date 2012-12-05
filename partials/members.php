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
		echo "<tr>";
		echo "<td>".$row["username"]." </td>";
		echo "<td>".$row["first_name"]." </td>";
		echo "<td>".$row["last_name"]." </td>";
		echo "<td>".$row["profile_pic"]." </td>";
		echo "</tr>";
		echo "<br />";
		
	}
	$db->close();
?>