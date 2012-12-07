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
		
	</div>
</body>
</html>