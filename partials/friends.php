<?php
	session_start();


	include("../partials/utilities.php");
	
	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	$user = $_SESSION['user']; 
	if (isset($_GET['add'])) {
		$friend = $_GET['add'];
		if (alreadyFriends($user, $friend)) {
			echo "I'm sure they're happy you've tried to add Friend ID: ".$friend." them more than once";
		}
		else {
			addFriend($user, $friend);
			header('Location: friends.php');	
		}
		
	}
	$friends_list = retrieveFriends($user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Muh Friends</title>
</head>
<body>
	<?php
		include("../partials/menu.php");
	?>
	<h1>Muh Friends!</h1>
	<div>
		<table>
			<tr>
				<th>Profile Photo</th>
				<th>Username</th>
				<th>First name</th>
				<th>Last name</th>
			</tr>
			<?php
				foreach ($friends_list as $friend) {
					echo "<tr>";
					echo "<td>".$friend["profile_pic"]."</td>";
					echo "<td>".$friend["username"]."</td>";
					echo "<td>".$friend["first_name"]."</td>";
					echo "<td>".$friend["last_name"]."</td>";
					echo "</tr>";
				}	
			?>
		</table>
	</div>
</body>
</html>