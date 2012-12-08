<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("/partials/utilities.php");
	$user = $_SESSION['user']; 

	if (isset($_GET['profile']) && $user != $_GET['profile']) {
		$profileid = $_GET['profile'];
		$statuses = retrieveUserStatuses($profileid);
	} 
	else {
		$statuses = retrieveUserStatuses($user);
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
		<div>
			<form action="partials/status.php" method="POST">
				<label for="status">Post a Status</label>
				<input type="text" name="status" id="status"/>
				<input type="submit" value="Submit Status"/>
			</form>

			<br />
			<br />
			<h3>Your last statuses</h3>
			<table id="statuses">
				<?php
					foreach ($statuses as $status) {
						echo "<tr>";
						echo "<td>".$status["status"]."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>