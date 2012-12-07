<?php
	$user = $_SESSION['user']; 
	
	function addFriends($user) {

	}

	function retrieveMembers($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM users where id != $user");
		$count = mysqli_num_rows($result);
		$members_list = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($members_list, $row);
		}
		$db->close();
		return $members_list;
	}
?>
