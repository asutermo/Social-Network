<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("/partials/utilities.php");
	$user = $_SESSION['user'];
	$statuses = retrieveUserAndFriendStatuses($user);
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
		<h1>Welcome to your news feed</h1>
		<div>
			<table id="statuses">
				<?php
					foreach ($statuses as $status) {
						echo "<tr>";
						$date = strtotime($status["post_date"]); 
						echo "<td>".date("Y-m-d H:i", $date)."</td>";
						echo "<td>".$status["status"]."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>