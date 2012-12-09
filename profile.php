<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
	include("/partials/utilities.php");
	$user = $_SESSION['user']; 

	$showCurrentProfile = true;

	$user_info = array();
	if (isset($_GET['profile']) && $user != $_GET['profile']) {
		$profileid = $_GET['profile'];
		$statuses = retrieveUserStatuses($profileid);
		$showCurrentProfile = false;
		$user_info = getUserInformation($profileid);
	} 
	else {
		$statuses = retrieveUserStatuses($user);
		$user_info = getUserInformation($user);
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
				echo "<a href=\"partials/editform.php\">Edit Profile</a>\n";
			}
			else {
				echo "<h1>Other user's profile page</h1>\n";	
			}
		?>
		<div id="profile_info">
			<?php
				foreach ($user_info as $user_information) {
					echo "<span>Username: ".$user_information["username"]."</span><br />\n";
					//echo "<img src='",$user_information['profile_pic'],"' width='175' height='200' /><br />\n";
					echo "<span>Name: ".$user_information["first_name"]." ".$user_information["last_name"]."</span><br />\n";
					echo "<span>Age: ".$user_information["age"]."</span><br />\n";
					echo "<span>Gender: ".$user_information["gender"]."</span><br />\n";
					echo "<span>Other Information: ".$user_information["other"]."</span><br />\n";
					echo "<br />";
				}
				
			?>
		</div>
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
						echo "<td>".date("D, d M y g:i a", $date)."</td>";
						echo "<td>".$status["status"]."</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>