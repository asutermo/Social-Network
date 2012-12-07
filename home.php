<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<?php
		include("partials/menu.php");
	?>
	<div>
		<h1>You logged in!</h1>

		<a href="profile.php">View my Profile!</a><br />
		<a href="partials/friends.php">View my friends</a><br />
		<a href="partials/members.php">View other members</a><br />
	</div>
</body>
</html>