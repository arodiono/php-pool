<?php
    session_start();
    $title = 'Cheaters shop';
    require_once 'connect.php';
    include_once 'head.php';
    include_once 'header.php';
?>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <a href="index.php"><h3>Categories</h3></a>
            </div>
            <div class="sidebar-menu">
                <?php
                session_start();
                require_once 'connect.php';
                $sql = "SELECT name FROM categories";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result))
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<a href=\"index.php?category=" . $row['name'] . "\"><div class=\"sidebar-menu-item\">" . $row['name'] . "</div></a>";
                    }
                ?>
            </div>
        </div>
        <div class="content">
            <div class="items-list">

<?php
	if (!empty($_GET['category'])) {
		$sql = "SELECT cid FROM categories WHERE name='".$_GET['category']."'";
		$result = mysqli_query($conn, $sql);
		$category = mysqli_fetch_assoc($result);
		if (!empty($category['cid'])) {
			$sql = "SELECT item_id FROM list WHERE cat_id='".$category['cid']."'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($item = mysqli_fetch_assoc($result)) {
					$sql = "SELECT * FROM items WHERE iid='".$item['item_id']."'";
					$product = mysqli_query($conn, $sql);
					if (mysqli_num_rows($product) > 0) {
				        $row = mysqli_fetch_assoc($product);
			            foreach (explode("\n", file_get_contents("1.txt")) as $value) {
			                $exists = 0;
			                if ($value == $row['name'])
			                {
			                    $exists = 1;
			                    break;
			                }
			            }
			            $url = "https://cdn.intra.42.fr/users/medium_" . $row['name'] . ".jpg";
			            if ($exists)
			                $img_src = $url;
			            else
			                $img_src = "imgs/1.jpg";
			            include 'product-item.php';
				    }
		        }
			} else {
				echo "No items in shop yet :(";
		    }
		}
	} else {
		$sql = "SELECT * FROM items";
		$result = mysqli_query($conn, $sql);
	    if (mysqli_num_rows($result) > 0) {
	        while ($row = mysqli_fetch_assoc($result)) {
	            foreach (explode("\n", file_get_contents("1.txt")) as $value) {
	                $exists = 0;
	                if ($value == $row['name'])
	                {
	                    $exists = 1;
	                    break;
	                }
	            }
	            $url = "https://cdn.intra.42.fr/users/medium_" . $row['name'] . ".jpg";
	            if ($exists)
	                $img_src = $url;
	            else
	                $img_src = "imgs/1.jpg";
	            include 'product-item.php';
	        }
	    } else {
	        echo "No items in shop yet :(";
	    }
	}
    ?>

                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>

<?php mysqli_close($conn); ?>
