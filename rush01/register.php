<?php
session_start();
if (!empty($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
    header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" action="register.php" method="POST">
        <h2 class="form-signin-heading">Please sign up</h2>
        <label for="inputUser" class="sr-only">Username</label>
        <input name="login" type="text" id="inputUser" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="submit" value="ok" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <div class="center-block"><h3>OR</h3></div>
        <a class="btn btn-primary btn-block" href="login.php">Sign in</a>
    </form>

    <?php
    include_once 'config.php';
    $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
    $sql->set_charset('utf8');

    if ($sql->connect_error)
        die("Connection failed: " . $sql->connect_error);

    if ($_POST['submit'] == "ok") {
        if ($_POST['login'] && $_POST['password']) {
            $login = $sql->real_escape_string($_POST['login']);
            $password = $sql->real_escape_string(hash('md5', $_POST['password']));
            $res = $sql->query("SELECT `login` FROM `users` WHERE `login`=\"$login\"");
            if ($res->num_rows === 0)
            {
                if ($sql->query("INSERT INTO users (login, password) VALUES ('$login', '$password')") == true)
                    echo "<div class=\"alert alert-success\" role=\"alert\">User successfully registered</div>";
                else
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Error: " . $sql->error . "</div>";
                header('Location: login.php');
            }
            else
                echo "<div class=\"alert alert-danger\" role=\"alert\">Error: User already exist</div>";
        }
        else
            echo "<div class=\"alert alert-danger\" role=\"alert\">\"Error: Empty fields\"</div>";
    }
    ?>
</div>
</body>
</html>