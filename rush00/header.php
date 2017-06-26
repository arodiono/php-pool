<header>
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <a href="index.php"><img height="80" src="imgs/logog.png" alt="Cheaters"></a>
            </div>
            <div class="header-center"></div>
            <div class="header-right">
                <div class="menu">
                <?php
                    if (!empty($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
                        echo  '<a href="logout.php">Logout' . " " . $_SESSION['loggued_on_user'] . '</a>';
                    else
                        echo '<a href="login.php">Sign in</a> or <a href="create.php">Register</a>';
                ?>
                    <a href="cart.php"><img height="40" src="imgs/cart.png" alt="cart"></a>
                </div>
            </div>
        </div>
    </div>
</header>
