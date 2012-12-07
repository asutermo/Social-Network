<?php
	session_start();

	

	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	include("../partials/utilities.php");
	$user = $_SESSION['user']; 
	$members_list = retrieveMembers($user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>The Other Site Goers</title>
</head>
<body>
	<?php
		include("../partials/menu.php");
	?>
	<h1>The Other Site Goers!</h1>
	<div>
		<table id="members">
			<tr>
				<th>Profile Photo</th>
				<th>Username</th>
				<th>First name</th>
				<th>Last name</th>
			</tr>
			<?php
				foreach ($members_list as $member) {
					echo "<tr>";
					echo "<td>".$member["profile_pic"]."</td>";
					echo "<td>".$member["username"]."</td>";
					echo "<td>".$member["first_name"]."</td>";
					echo "<td>".$member["last_name"]."</td>";
					echo "</tr>";
				}	
			?>
		</table>
</div>
</body>
</html>