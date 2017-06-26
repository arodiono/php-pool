<?php

$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];
$expire = 0;
$path = $_GET['path'];
$domain = $_GET['domain'];
$secure = $_GET['secure'];
$httponly = $_GET['httponly'];

if ($_GET['expire'] != NULL)
    $expire = time() + $_GET['expire'];
if ($action == 'set')
    setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
else if ($action == 'del')
    setcookie($name);
else if ($action == 'get')
    echo $_COOKIE['name'];

?>