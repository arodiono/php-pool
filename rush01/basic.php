<?php
require_once ('User.class.php');
require_once ('Ships.class.php');
require_once ('RedShip.class.php');
require_once ('BlueShip.class.php');

session_start();

include_once 'config.php';
$sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
$sql->set_charset('utf8');
if ($sql->connect_error)
    die("Connection failed: " . $sql->connect_error);
$id = $_SESSION['room-id'];
$result = $sql->query("SELECT * FROM `rooms` WHERE `id`='$id'");
$data = $result->fetch_array(MYSQLI_ASSOC);

$us1 = unserialize($data["firstship"]);
$us2 = unserialize($data["secondship"]);
$map = unserialize($data["map"]);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ship Battle</title>
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="user1 col-xs-1">
        <div class="title">
            <h1 class="t">
                <?php echo $us1->name; ?>
            </h1>
            <form action="ship.php" method="POST" >
                <div class="container">
                    <input class="btn btn-primary" name="go" type="submit" value="GO"/>
                    <input class="btn btn-primary" name="turn_l" type="submit" value="Left"/>
                    <input class="btn btn-primary" name="turn_r" type="submit" value="Right"/>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-10">
        <canvas class="center-block map" width="1500" height="1000"></canvas>
        <script>
            var cell = 10;
            var x_len = 150;
            var y_len = 100;
            var j=0;
            var y = 0;
            var x = 0;

            var canvas = document.querySelector("canvas");
            var context = canvas.getContext("2d");

            imgShip1 = new Image();
            imgShip1.src = "<?php echo $us1->ships->img ?>";
            var x1 = parseInt("<?php echo $us1->ships->pos_x ?>", 10);
            var y1 = parseInt("<?php echo $us1->ships->pos_y ?>", 10);
            var pw1 = parseInt("<?php echo $us1->ships->pw ?>", 10);
            var ph1 = parseInt("<?php echo $us1->ships->ph ?>", 10);

            imgShip2 = new Image();
            imgShip2.src = "<?php echo $us2->ships->img ?>";
            var x2 = parseInt("<?php echo $us2->ships->pos_x ?>", 10);
            var y2 = parseInt("<?php echo $us2->ships->pos_y ?>", 10);
            var pw2 = parseInt("<?php echo $us2->ships->pw ?>", 10);
            var ph2 = parseInt("<?php echo $us2->ships->ph ?>", 10);
            context.strokeStyle = "#fff";
            asteroid = new Image();
            asteroid.src = './img/asteroid.png';
            while (y < y_len) {
                x = 0;
                while (x < x_len) {
                    context.strokeRect(x * cell, y * cell, cell, cell);
                    x++;
                }
                y++;
            }

            context.drawImage(imgShip1, 0, 0, pw1, ph1, x1*cell , y1*cell, 0.5*pw1, 0.5*ph1);
            context.drawImage(imgShip2, 0, 0, pw2, ph2, x2*cell , y2*cell, 0.5*pw2, 0.5*ph2);


            context.drawImage(asteroid, 0, 0, 375, 375, 50*cell , 20*cell, 180, 180);
        </script>
    </div>
    <div class="user2 col-xs-1">
        <div class="title">

            <h1 class="t">
                <?php echo $us2->name; ?>
            </h1>
            <form action="ship.php" method="post" >
                <div class="container">
                    <input class="btn btn-primary" name="go2" type="submit" value="GO"/>
                    <input class="btn btn-primary" name="turn_2" type="submit" value="Left"/>
                    <input class="btn btn-primary" name="turn_2" type="submit" value="Right"/>
                </div>
            </form>
        </div>
    </div>
</body>
</html>