<?php include_once 'index.php'; ?>

<div class="product-item">
    <img src="<?php  echo $img_src; ?>" alt="" class="person">
    <div class="item-info">
        <h3 class="login"><?php  echo $row['name']; ?></h3>
        <div class="item-left">
            <form class="item-form" action="cart.php" method="GET">
                <input type="hidden" name="name"  value="<?php  echo $row['name']; ?>"/>
                <input type="hidden" name="price"  value="<?php  echo $row['price']; ?>"/>
                <input class="qty" type="number" name="quantity" value="1"/>
        </div>
        <div class="item-right">
            <h3 class="price-text"><?php  echo $row['price']; ?><small> UAH</small></h3>
        </div>
        <button class="btn" type="submit" name="submit" value="BUY">Buy</button>
        </form>
    </div>

</div>
