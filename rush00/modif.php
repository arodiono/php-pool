<?php
	require_once('connect.php');
	if (!empty($_POST['submit']) && $_POST['submit'] == "OK" &&  $_POST['login'] && $_POST['oldpw'] && $_POST['newpw']) {
		$sql = "SELECT uid, login, password FROM users WHERE login='" . $_POST['login'] . "'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == hash('md5', $_POST['oldpw'])) {
				$sql = "UPDATE users SET password='" . hash('md5', $_POST['newpw']) . "' WHERE login='" . $row['login'] . "'";
                mysqli_query($conn, $sql);
				echo "SUCCESS\n";
       			header('Location: login.php');
			}
			else
				echo "ERROR\n";
		}
		else
			echo "ERROR\n";
	}
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Change password</title>
</header>
<body>
<div class="container">
    <h3>Change password</h3>
    <form action="modif.php" method="POST">
        <input placeholder="Login" type="text" name="login" value="" />
        <br />
        <input placeholder="Old password" type="password" name="oldpw" value="" />
        <br />
        <input placeholder="New password" type="password" name="newpw" value="" />
        <br />
        <button type="submit" name="submit" value="OK" >Change password</button>
        <br />
    </form>

</div>
</body>
</html>