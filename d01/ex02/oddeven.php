#!/usr/bin/php
<?php

while (1)
{
    $stdin = fopen('php://stdin', 'r');
    echo "Enter a number: ";
    $line = rtrim(fread(STDIN, 8192));
    if (feof(STDIN))
    {
        echo "^D\n";
        exit(0);
    }
    if (is_numeric($line) == TRUE)
    {
        $res = intval($line);
        if (($res % 2) == 0)
            echo "The number " . $res . " is even\n";
        else
            echo "The number " . $res . " is odd\n";
    }
    else
       echo "'" . $line . "'" . " is not a number\n";
}

?>