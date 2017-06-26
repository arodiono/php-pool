<?php
	require_once('connect.php');
	if (!empty($_POST['submit']) && $_POST['submit'] == "OK" &&  $_POST['login'] && $_POST['passwd']) {
		$match = 0;
		$sql = "SELECT uid, login FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_POST['login']) {
					echo "User exists already<br/>";
		        	$match = 1;
		        	break;
		        }
		    }
		}
		if (!$match) {
			$sql = "INSERT INTO users (login, password)
			VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['passwd']) . "')";
			mysqli_query($conn, $sql);
			echo "SUCCESS<br/>";
        	header('Location: login.php');
        	mysqli_close($conn);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Create account</title>
</head>
<body>
<div class="container">
    <h3>Create account</h3>
    <form action="create.php" method="POST">
        <input placeholder="Login" type="text" name="login" value="" />
        <br />
        <input placeholder="Password" type="password" name="passwd" value="" />
        <br />
        <button type="submit" name="submit" value="OK">Create account</button>
        <br />
        <h3>or</h3>
        <a class="btn" href="login.php">Sign in</a>
    </form>

</div>
</body>
</html>
