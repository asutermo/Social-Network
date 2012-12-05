<?php
	session_start();

	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Muh Friends</title>
</head>
<body>
	<div class="logo">
		<img src="../images/WPlogo.png" />
	</div>
	<h1>Muh Friends!</h1>
	<div>
		<?php
			@ $db = new mysqli(localhost, team04, fuchsia, team04);

			$result = $db->query("SELECT * FROM user_friends WHERE user_id='{$_SESSION['user']}'");
			$count = mysqli_num_rows($result);

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				foreach($row as $value) {
					echo $value."\n";
				}
			}
			$db->close();
		?>
	</div>
</body>
</html>