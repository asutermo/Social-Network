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
				<tr>
					<th>Poster</th>
					<th>Date posted</th>
					<th>Status</th>
				</tr>
				<?php
					foreach ($statuses as $status) {
						echo "<tr>";
						if (isset($status["username"])) {
							echo "<td>".$status["username"]."</td>";	
						}
						else {
							echo "<td>You</td>";	
						}
						$date = strtotime($status["post_date"]); 
						echo "<td>".date("m-d H:i", $date)."</td>";
						echo "<td>".$status["status"]."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>