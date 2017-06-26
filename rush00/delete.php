<?php
	require_once('connect.php');
	if (!empty($_POST['submit']) && $_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd']) {
		$sql = "SELECT uid, login, password FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_POST['login'] && $row['password'] == hash('md5', $_POST['passwd'])) {
					$sql = "DELETE FROM users WHERE login='" . $row['login'] . "'";
					mysqli_query($conn, $sql);
					echo "SUCCESS<br/>";
		        	header('Location: login.php');
        			mysqli_close($conn);
		        	break;
		        }
		    }
		}
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
    <title>Delete account</title>
</header>
<body>
<div class="container">
    <h3>Delete account</h3>
    <form action="delete.php" method="POST">
        <input placeholder="Login" type="text" name="login" value="" />
        <br />
        <input placeholder="Password" type="password" name="passwd" value="" />
        <br />
        <button type="submit" name="submit" value="OK" >Delete account</button>
        <br />
    </form>
</div>
</body>
</html>
