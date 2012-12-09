<?php
	session_start();

	if(!$_SESSION['logged_on']) {
		header("Location: ../index.php");
	}

	include("../partials/utilities.php");
	$user = $_SESSION['user']; 
	if (isset($_POST['search'])) {
		$search_list = searchForUser($_POST['search']);
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Your Search Results</title>
</head>
<body>
	<?php
		include("../partials/menu.php");
	?>
	<h1>Your Search Results!</h1>
	<div>

		<form action="../partials/search.php" method="POST">
			<label for="search">Search for friend using username, name, or email</label>
			<input type="text" name="search" id="search"/>
			<br />
			<input type="submit" value="Search?"/>
		</form>
		<br />
		<h3>Search results</h3>
		<br />
		<table id="search">
			<tr>
				<th>Profile Photo</th>
				<th>Username</th>
				<th>First name</th>
				<th>Last name</th>
			</tr>
			<?php
				if (isset($search_list)) {
					foreach ($search_list as $search) {
						echo "<tr>\n";
						echo "<td>".$search["profile_pic"]."</td>\n";
						echo "<td>".$search["username"]."</td>\n";
						echo "<td>".$search["first_name"]."</td>\n";
						echo "<td>".$search["last_name"]."</td>\n";
						echo "</tr>\n";
					}	
				}
			?>
		</table>
</div>
</body>
</html>