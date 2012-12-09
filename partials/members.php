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

		<form action="../partials/search.php" method="POST">
				<label for="search">Search for friend using username, name, or email</label>
				<input type="text" name="search" id="search"/>
				<br />
				<input type="submit" value="Search?"/>
		</form>
		<br />
		<table id="members">
			<tr>
				<th>Profile Photo</th>
				<th>Username</th>
				<th>First name</th>
				<th>Last name</th>
			</tr>
			<?php
				foreach ($members_list as $member) {
					echo "<tr>\n";
					echo "<td>".$member["profile_pic"]."</td>\n";
					echo "<td>".$member["username"]."</td>\n";
					echo "<td>".$member["first_name"]."</td>\n";
					echo "<td>".$member["last_name"]."</td>\n";
					echo "<td><a href=\"friends.php?add=".$member['id']."\">Add Friend</a></td>\n";
					echo "</tr>\n";
				}	
			?>
		</table>
</div>
</body>
</html>