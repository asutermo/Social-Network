<?php
	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("partials/utilities.php");
	$user = $_SESSION['user']; 
	$user_info = getUserInformation($user);

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="scripts/validator.js"></script>
	<title>Edit Profile?</title>
</head>
<body>
	<?php
		include("menu.php");
	?>
	<div>
		<h1>Edit profile?</h1>
		<div id="error">
		</div>
		<div>
			<form action="edit.php" method="POST" enctype="multipart/form-data" onsubmit="return validate_edit(this);">
				<?php
					foreach ($user_info as $user_information) {
						echo "<label for=\"user\">Username</label>\n"; 
						echo "<input type=\"text\" name=\"user\" id=\"user\" value=\"".$user_information["username"]."\"/>\n"; 
						echo "<br />\n"; 
						echo "<label for=\"first\">First name</label>\n"; 
						echo "<input type=\"text\" name=\"first\" id=\"first\" value=\"".$user_information["first_name"]."\">\n"; 
						echo "<br />\n"; 
						echo "<label for=\"last\">Last name</label>\n"; 
						echo "<input type=\"text\" name=\"last\" id=\"last\" value=\"".$user_information["last_name"]."\"/>\n"; 
						echo "<br />\n"; 
						echo "<label for=\"age\">Age</label>\n"; 
						echo "<input type=\"number\" name=\"age\" id=\"age\" min=\"13\" max=\"150\"  value=\"".$user_information["age"]."\"/>\n"; 
						echo "<br />\n"; 
						echo "<label for=\"other\">Other</label>\n";
						echo "<input type=\"text\" name=\"other\" id=\"other\" value=\"".$user_information["other"]."\"/>\n";
					}
				?>
				
				<br />
				<input type="submit" value="Edit profile?"/>
			</form>
		</div>
	</div>
</body>
</html>