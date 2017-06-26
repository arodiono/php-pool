#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Kiev');

$filename = "/var/run/utmpx";
$file = fopen($filename, 'r');

while ($data = fread($file, 628))
{
    $tmp = unpack("a256login/a4/a32terminal/i/itype/I2timeup/a320", $data);
    if ($tmp["type"] == 7)
        printf("%-7s %-7s  %s \n", trim($tmp["login"]), trim($tmp["terminal"]), date("M j H:i", $tmp["timeup1"]));
}

?>