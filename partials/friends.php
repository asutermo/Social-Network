<?php
	session_start();


	
	//if user is not logged in
	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	$user = $_SESSION['user']; 
	include("../partials/utilities.php");
	$user = $_SESSION['user']; 
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
	</div>
</body>
</html>