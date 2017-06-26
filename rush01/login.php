<?php
session_start();
if (!empty($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
    header('Location: lobby.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign in</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" action="login.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only">Username</label>
        <input name="login" type="text" id="inputUser" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="submit" value="ok" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="center-block"><h3>OR</h3></div>
        <a class="btn btn-primary btn-block" href="register.php">Sign up</a>
    </form>
    <?php
    include_once 'config.php';

    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        if (auth($_POST['login'], $_POST['password'])){
            $_SESSION['loggued_on_user'] = $_POST['login'];
            header('Location: lobby.php');
        }
        else
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: Incorrect data entered</div>";
    }
    else
        $_SESSION['loggued_on_user'] = "";

    function auth($login, $password) {
        if (!$login || !$password)
            return false;
        $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
        $sql->set_charset('utf8');
        if ($sql->connect_error)
            die("Connection failed: " . $sql->connect_error);
        $result = $sql->query("SELECT `login`, `password` FROM `users` WHERE `login`=\"$login\"");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['password'] == hash('md5', $password)) {
                return true;
            }
        }
        return false;
    }
    ?>
</div>
</body>
</html>
