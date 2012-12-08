<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("/partials/utilities.php");
	$user = $_SESSION['user']; 

	$showCurrentProfile = true;

	if (isset($_GET['profile']) && $user != $_GET['profile']) {
		$profileid = $_GET['profile'];
		$statuses = retrieveUserStatuses($profileid);
		$showCurrentProfile = false;
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
		<?php
			if (isset($showCurrentProfile) && $showCurrentProfile) {
				echo "<h1>Welcome to your profile page</h1>\n";
			}
			else {
				echo "<h1>Other user's profile page</h1>\n";	
			}
		?>
		<div>
			<?php
				if (isset($showCurrentProfile) && $showCurrentProfile) {
					echo "<form action=\"partials/status.php\" method=\"POST\">\n"; 
					echo "<label for=\"status\">Post a Status</label>\n"; 
					echo "<input type=\"text\" name=\"status\" id=\"status\"/>\n"; 
					echo "<input type=\"submit\" value=\"Submit Status\"/>\n"; 
					echo "</form>\n"; 
					echo "<br />\n"; 
					echo "<h3>Your last statuses</h3>\n";
				}
				else {
					echo "<h3>Other user's last statuses</h3>\n";	
				}
			?>
			
			
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