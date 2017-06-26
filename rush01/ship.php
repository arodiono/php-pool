<?php
require_once ('Ships.class.php');
require_once ('User.class.php');
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

if ($_POST['go'] == 'GO') {
    $us1 = unserialize($data["firstship"]);
    var_dump($us1);
    $us1->ships->move();
    $us1 = serialize($us1);
    $sql->query("UPDATE `rooms` SET `firstship`='$us1' WHERE `id`='$id' ");
    header('Location: basic.php');
}

if ($_POST['turn_l'] == 'Left') {
    $us1 = unserialize($data["firstship"]);
     $us1->ships->turn(2);
    $us1 = serialize($us1);
    $sql->query("UPDATE `rooms` SET `firstship`='$us1' WHERE `id`='$id' ");
    header('Location: basic.php');
}

if ($_POST['turn_r'] == 'Right') {
    $us1 = unserialize($data["firstship"]);
    $us1->ships->turn(1);
    $us1 = serialize($us1);
    $sql->query("UPDATE `rooms` SET `firstship`='$us1' WHERE `id`='$id' ");
    header('Location: basic.php');
}
if ($_POST['go2'] == 'GO') {
    $us2 = unserialize($data["secondship"]);
    $us2->ships->move();
    $us2 = serialize($us2);
    $sql->query("UPDATE `rooms` SET `secondship`='$us2' WHERE `id`='$id' ");
    header('Location: basic.php');
}

if ($_POST['turn_2'] == 'Left') {
    $us2 = unserialize($data["secondship"]);
    $us2->ships->turn(2);
    $us2 = serialize($us2);
    $sql->query("UPDATE `rooms` SET `secondship`='$us2' WHERE `id`='$id' ");
    header('Location: basic.php');
}

if ($_POST['turn_2'] == 'Right') {
    $us2 = unserialize($data["secondship"]);
    $us2->ships->turn(1);
    $us2 = serialize($us2);
    $sql->query("UPDATE `rooms` SET `secondship`='$us2' WHERE `id`='$id' ");
    header('Location: basic.php');
}

?>
