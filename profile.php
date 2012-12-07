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
	<?php
		include("partials/menu.php");
	?>
	<div>
		<h1>Welcome to your profile page</h1>
		<a href="partials/logout.php">Now logout!</a>
	</div>
</body>
</html>