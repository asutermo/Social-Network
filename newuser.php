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
				<label for="user">Username</label>
				<input type="text" name="user" id="user"/>
				<br />
				<label for="first">First name</label>
				<input type="text" name="first" id="first"/>
				<br />
				<label for="last">Last name</label>
				<input type="text" name="last" id="last"/>
				<br />
				<label for="email">Email</label>
				<input type="email" name="email" id="email"/>
				<br />
				<label for="password">Password</label>
				<input type="password" name="password" id="password"/>
				<br />
				<label for="rpassword">Repeat password</label>
				<input type="password" name="rpassword" id="rpassword"/>
				<br />
				<label for="image">Upload Image</label>
				<input type="file" name="image" id="image"/>
				<br />
				<label for="gender">Gender</label>
				<label for="age">Age</label>
				<label for="other">Other</label>
				<input type="submit" value="Log In?"/>
			</form>
		</div>
	</div>
</body>
</html>