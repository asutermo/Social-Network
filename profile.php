<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
</head>
<body>
	<div>
		<a href="partials/logout.php">Now logout!</a>
	</div>
</body>
</html>