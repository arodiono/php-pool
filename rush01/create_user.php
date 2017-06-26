<?php
include 'map.php';
require_once ('Ships.class.php');
require_once ('RedShip.class.php');
require_once ('BlueShip.class.php');
require_once ('User.class.php');
session_start();

if ($_POST['user1'] && $_POST['user2'])
{
    $_SESSION['user1'] = $_POST['user1'];
    $_SESSION['user2'] = $_POST['user2'];
    $map = create_map();
    $_SESSION['map'] = json_encode($map);
    $_SESSION['us1'] = new User($_SESSION['user1'], new RedShip(1, 2, 3));
    $_SESSION['us2'] = new User($_SESSION['user2'], new BlueShip(10, 12, 1));
    header('Location: basic.php');
    exit;
}
?>