<?php
	function auth($login, $passwd) {
        require_once('connect.php');
		// var_dump($login);
		// var_dump($passwd);

        if (!$login || !$passwd)
	            return false;
		$sql = "SELECT * FROM `users` WHERE `login` = '$login'";

		$result = mysqli_query($conn, $sql);
		// var_dump($result);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == hash('md5', $passwd)) {
        		mysqli_close($conn);
                return true;
			}
		}
        mysqli_close($conn);
		return false;
	}
?>
