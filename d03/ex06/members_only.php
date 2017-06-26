<?php
if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "Ilovemylittleponey") {

    $img = base64_encode(file_get_contents("img/42.png"));

    echo "<html><body>Hello Zaz<br />\n";
    echo "<img src=\"data:image/png;base64,$img\">\n";
    echo "</body></html>";
}
else
{
    header('WWW-Authenticate: Basic realm="My Realm"');
    echo "<html><body>That area is accessible for members only</body></html>";
}
?>

