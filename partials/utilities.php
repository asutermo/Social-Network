<?php
	
	
	function addFriend($user, $friend) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("INSERT INTO user_friends(user_id, friend_id) VALUES {$user}, {$friend};");
		echo $result;
		$db->close();
	}

	function alreadyFriends($user, $friend) {

	}

	function retrieveFriends($user) {
		@ $db = new mysqli(localhost, team04, fuchsia, team04);
		$result = $db->query("SELECT * FROM user_friends where  user_friends.user_id = {$user};");
		$count = mysqli_num_rows($result);
		$friends_list = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($friends_list, $row);
		}
		$db->close();
		return $friends_list;	
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
