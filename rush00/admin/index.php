<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Admin panel</title>
</head>
<header>
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <a href="index.php"><img height="80" src="../imgs/logog.png" alt="Cheaters"></a>
            </div>
            <div class="header-center"></div>
            <div class="header-right">
                <div class="menu">
                    <?php
                    if (!empty($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
                        echo  '<a href="../logout.php">Logout' . " " . $_SESSION['loggued_on_user'] . '</a>';
                    else
                        echo '<a href="../login.php">Sign in</a> or <a href="../create.php">Register</a>';
                    ?>
                    <a href="../cart.php"><img height="40" src="../imgs/cart.png" alt="cart"></a>
                </div>
            </div>
        </div>
    </div>
</header>
<body>
    <div class="container">
        <a href="../index.php"><div class="back">Back to shop</div></a>
    <?php
    require_once('../connect.php');
    require_once('isadmin.php');

        if (isadmin($_SESSION['loggued_on_user']))
            include_once 'panel.php';
        else
            include_once 'access-denied.php';
    ?>
    </div>
</body>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p class="footer-text">© gsominsk & arodiono</p>
        </div>
    </div>
</footer>
</body>
</html>