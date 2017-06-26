<?php
require_once ('User.class.php');
require_once ('Ships.class.php');
require_once ('RedShip.class.php');
include 'map.php';
session_start();


if ($_POST['submit'] == 'ok')
{
    include_once 'config.php';
    $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
    $sql->set_charset('utf8');
    if ($sql->connect_error)
        die("Connection failed: " . $sql->connect_error);

    $map = serialize(create_map());
    $firstplayer = $_SESSION['loggued_on_user'];
    $firstship = serialize(new User($firstplayer, new RedShip(1, 2, 3)));
    $result = $sql->query("INSERT INTO `rooms` (`map`, `firstplayer`, `firstship`) VALUES ('$map', '$firstplayer', '$firstship')");

    $_SESSION['room-id'] = $sql->insert_id;
    header('Location: basic.php');
}

?>