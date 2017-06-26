<?php
	require_once('auth.php');
	// require_once('admin/isadmin.php');
	session_start();
	if (!empty($_POST['login']) && !empty($_POST['passwd']) && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "SUCCESS\n";
		// var_dump($_SESSION['loggued_on_user']);
		if (isadmin())
			header('Location: admin/index.php');
		else
        	header('Location: index.php');
	}
	else
		$_SESSION['loggued_on_user'] = "";

	function isadmin() {
		require('connect.php');
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_SESSION['loggued_on_user'] && $row['admin'] == 1) {
    				mysqli_close($conn);
					return true;
		        }
		    }
		}
		mysqli_close($conn);
		return false;
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
        <title>Sign in</title>
    </header>
    <body>
    <div class="container">
        <h3>Sign in</h3>
        <form action="login.php" method="POST">
            <input  placeholder="Login" type="text" name="login" value="" />
            <br/>
            <input placeholder="Password" type="password" name="passwd" value="" />
            <br/>
            <button type="submit" name="submit" value="OK" >Sign in</button>
        </form>
        <h3>or</h3>
        <a class="btn" href="create.php">Create account</a>
    </div>
    </body>
</html>
