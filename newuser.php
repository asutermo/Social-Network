<?php
	include_once("util.php");
	add_header();
?>
<title>Sign up bro</title>
</head>

<body>
	<div>
		<h1>SIGN UP DO IT!!!</h1>
		<div>
			<form action="createuser.php" method="POST">
				<label for="user">Username or Email</label>
				<label for="first">First name</label>
				<label for="last">Last name</label>
				<label for="email">Email</label>
				<label for="password">Password</label>
				<label for="rpassword">Repeat password</label>
				<label for="image">Upload Image</label>
				<label for="gender">Gender</label>
				<label for="age">Age</label>
				<label for="other">Other</label>
				<input type="submit" value="Log In?"/>
			</form>
		</div>
	</div>
</body>
</html>