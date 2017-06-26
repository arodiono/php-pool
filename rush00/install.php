<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "XmmD3RKE";
$db_name = "shop";
$db_port = "8080";
$admin_pass = hash ('md5', "admin");

$conn = mysqli_connect($db_host, $db_user, $db_pass, "", $db_port);
if (!$conn)
    die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

$sql = "CREATE DATABASE " . $db_name;

if (mysqli_query($conn, $sql))
    echo "Database created successfully";
else
    echo "Error creating database: " . mysqli_error($conn) . "<br>";

mysqli_close($conn);

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$conn)
    die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

$sql = "CREATE TABLE users (
uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
admin INT(1) DEFAULT '0',
reg_date TIMESTAMP
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table users: " . mysqli_error($conn) . "<br>";

$sql = "CREATE TABLE categories (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table categories: " . mysqli_error($conn) . "<br>";

$sql = "CREATE TABLE items (
iid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
price INT(6) DEFAULT '0' NOT NULL,
link VARCHAR(500) NOT NULL
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table items: " . mysqli_error($conn) . "<br>";

$sql = "CREATE TABLE list (
lid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
item_id INT(6) NOT NULL,
cat_id INT(6) NOT NULL
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table list: " . mysqli_error($conn) . "<br>";

$sql = "CREATE TABLE orders (
nid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(30) NOT NULL,
sum INT(6) DEFAULT '0' NOT NULL,
order_date TIMESTAMP
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table orders: " . mysqli_error($conn) . "<br>";

$sql = "INSERT INTO `users`(`uid`, `login`, `password`, `admin`, `reg_date`) VALUES (0, 'admin', '$admin_pass', 1, 0)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table orders: " . mysqli_error($conn) . "<br>";



$sql = "INSERT INTO `categories`(`cid`, `name`) VALUES (1, 'cheaters')";
if (!mysqli_query($conn, $sql))
    echo "Error creating table orders: " . mysqli_error($conn) . "<br>";
$sql = "INSERT INTO `categories`(`cid`, `name`) VALUES (2, 'non-cheaters')";
if (!mysqli_query($conn, $sql))
    echo "Error creating table orders: " . mysqli_error($conn) . "<br>";



$items = explode("\n", file_get_contents('1.txt'));
$i = 1;
foreach ($items as $item)
{
    $p = rand(100, 200);
    $sql = "INSERT INTO items (iid, name, price) VALUES ($i, '$item', $p)";
    if (!mysqli_query($conn, $sql))
        echo "Error creating table orders: " . mysqli_error($conn) . "<br>";
    $c = rand(1, 2);
    $sql = "INSERT INTO list (item_id, cat_id)
				VALUES ('" . $i++ . "', '" . $c . "')";
    if (!mysqli_query($conn, $sql))
        echo "Error creating table orders: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
