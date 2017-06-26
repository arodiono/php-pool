<?php
require_once ('User.class.php');
require_once ('Ships.class.php');
require_once ('BlueShip.class.php');

include 'map.php';
session_start();

include_once 'config.php';
$sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
$sql->set_charset('utf8');
if ($sql->connect_error)
    die("Connection failed: " . $sql->connect_error);

$secondplayer = $_SESSION['loggued_on_user'];
$secondship = serialize(new User($secondplayer, new BlueShip(1, 2, 3)));

$id = $_POST['submit'];
$result = $sql->query("UPDATE `rooms` SET `secondplayer`='$secondplayer',`secondship`='$secondship' WHERE `id`='$id' ");

$_SESSION['room-id'] = $id;
header('Location: basic.php');

?>