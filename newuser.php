<?php
	session_start();
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		$_SESSION['error'] = "";	
	}
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="scripts/validator.js"></script>
	<title>What up homie?</title>
</head>
<body>
	<div class="logo">
		<img src="images/WPlogo.png" alt="logo" />
	</div>
	<div>
		<h1>SIGN UP DO IT!!!</h1>
		<div>
			<div id="error">
				<?php
					if (isset($error)) {
						echo $error;
					}
				?>
			</div>
			<form action="signup.php" method="POST" enctype="multipart/form-data" onsubmit="return validate_signup(this);">
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
				<input type="file" name="image" id="image" accept="image/*"/>
				<br />
				<label for="gender">Gender</label>
				<select name="gender" id="gender">
					<option value="na">Not Applicable</option>
					<option value="female">Female</option>
					<option value="male">Male</option>
					<option value="other">Other</option>
				</select>
				<br />
				<label for="age">Age</label>
				<input type="number" name="age" id="age" min="13" max="150"/>
				<br />
				<label for="other">Other</label>
				<input type="text" name="other" id="other"/>
				<input type="submit" value="Sign up?"/>
			</form>
		</div>
	</div>
</body>
</html>