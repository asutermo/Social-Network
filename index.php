<?php
	session_start();

	if (isset($_SESSION['logged_on']) && $_SESSION['logged_on']) {
		header ("Location: home.php");
	}
	
	if (isset($_SESSION['created'])) {
		$created = $_SESSION['created'];
		$_SESSION['created'] = "";	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script language="JavaScript" src="validator.js"></script>
	<title>What up homie?</title>
</head>

<body>
	<div class="logo">
		<img src="images/WPlogo.png" alt="logo" />
	</div>
	<div>
		<h1>Que te pasa?</h1>
		<div>
			<form action="newuser.php" method="GET">
				<input type="submit" value="New User?">
			</form>
			<br />
			<br />
			<?php
				if (isset($created)) {
					echo $created;
				}		

			?>
			<form action="login.php" method="POST">
				<label for="email">Email</label>
				<input type="text" name="email" id="email"/>
				<br />
				<label for="password">Password</label>
				<input type="password" name="password" id="password"/>
				<br />
				<input type="submit" value="Log In?"/>
			</form>
		</div>
	</div>
</body>
</html>