<?php
	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}
	include("/partials/utilities.php");
	$user = $_SESSION['user']; 
	$user_info = getUserInformation($user);

?>
<!DOCTYPE html>
<html>
<head>
	<script language="JavaScript" src="validator.js"></script>
	<title>Edit Profile?</title>
</head>
<body>
	<?php
		include("../partials/menu.php");
	?>
	<div id="profile_info">
		<?php
			foreach ($user_info as $user_information) {
				echo "<span>Username: ".$user_information["username"]."</span><br />";
				echo "<span>Name: ".$user_information["first_name"]." ".$user_information["last_name"]."</span><br />";
				echo "<span>Age: ".$user_information["age"]."</span><br />";
				echo "<span>Gender: ".$user_information["gender"]."</span><br />";
				echo "<span>Other Information: ".$user_information["other"]."</span><br />";
				echo "<br />";
			}
			
		?>
		</div>
	<div>
		<h1>Edit profile?</h1>
		<div>
			<form action="partials/edit.php" method="POST" onsubmit="return validate_signup(this)">
				<label for="user">Username</label>
				<input type="text" name="user" id="user"/>
				<br />
				<label for="first">First name</label>
				<input type="text" name="first" id="first"/>
				<br />
				<label for="last">Last name</label>
				<input type="text" name="last" id="last"/>
				<br />
				<label for="image">Upload Image</label>
				<input type="file" name="image" id="image"/>
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
				<input type="submit" value="Edit profile?"/>
			</form>
		</div>
	</div>
</body>
</html>