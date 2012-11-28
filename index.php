<?php
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
			<form action="authenticateuser.php" method="POST">
			</form>
		</div>
	</div>
</body>
</html>