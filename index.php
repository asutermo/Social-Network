<?php
	
	session_start();
	if (isset($_SESSION['visitor'])) {
		header("Location: profile.php");
	}
	include_once("util.php");
	add_header();
?>
<title>What up homie?</title>
</head>

<body>
	<div>
		<h1>Que te pasa?</h1>
		<div>
			<form action="newuser.php" method="GET">
				<input type="submit" value="New User?">
			</form>
			<br />
			<br />
			<form action="authenticateuser.php" method="POST">
				<label for="user">Username or Email</label>
				<input type="text" name="user" id="user"/>
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