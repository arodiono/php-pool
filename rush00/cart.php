<?php
    session_start();
    $title = 'Cart';
    require_once 'connect.php';
    include_once 'head.php';
    include_once 'header.php';
?>
<!--    <div class="container">-->
<!--        <table class="cart-item">-->
<!--            <tr class="cart-table-header">-->
<!--                <th></th>-->
<!--                <th>Name</th>-->
<!--                <th>Quantity</th>-->
<!--                <th>Price</th>-->
<!--            </tr>-->
<?php
    if ($_SESSION['loggued_on_user']) {
        ?>
        <div class="container">
        <table class="cart-item">
            <tr class="cart-table-header">
                <th></th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        <?php
    	if ($_GET['name'] && $_GET['submit'] == "BUY") {
    		foreach ($_SESSION['orders'] as $order) {
    			if ($order[0] == $_GET['name']) {
    				echo 'This item is already in your cart.';
    				$exists = 1;
    				break;
    			}
	    	}
	    	if (!$exists) {
				$_SESSION['orders'][] = array ($_GET['name'], $_GET['price'], $_GET['quantity']);
				$_SESSION['sum'] += $_GET['price'] * $_GET['quantity'];
	    	}
    	}
        foreach ($_SESSION['orders'] as $order) {
            foreach (explode("\n", file_get_contents("1.txt")) as $value) {
                $exists = 0;
                if ($value == $order[0])
                {
                    $exists = 1;
                    break;
                }
            }
            $url = "https://cdn.intra.42.fr/users/medium_" . $order[0] . ".jpg";
            if ($exists)
                $img_src = $url;
            else
                $img_src = "imgs/1.jpg";
            include 'cart-item.php';
        }
        ?>

        </table>
        <div class="checkout">
            <h3 class="total">
                Total: <?php echo $_SESSION['sum'] . " UAH"; ?>
            </h3>
            <form action="checkout.php" class="checkout" method="GET">
                <input type="submit" name="submit" value="Checkout">
            </form>
            <form action="index.php" class="checkout">
                <input type="submit" name="" value="Back to shopping!">
            </form>
        </div>
    </div>
<?php
    }
    else
        echo '<h2 class="alert">You are not logged in. To make purchases please <a href="login.php">log in</a> first.</h2>';

?>

<?php include_once 'footer.php'; ?>
