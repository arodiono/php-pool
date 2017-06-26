#!/usr/bin/php
<?php
if ($argc == 4)
{
    $first = trim($argv[1]);
    $second = trim($argv[2]);
    $third = trim($argv[3]);
    if ($second == "+")
        echo $first + $third;
    else if ($second == "-")
        echo $first - $third;
    else if ($second == "*")
        echo $first * $third;
    else if ($second == "/")
    {
        if ($third != 0)
            echo $first / $third;
        else
            echo "Error. Division by zero\n";
    }
    else if ($second == "%")
        echo $first % $third;
}
else
    echo "Incorrect Parameters\n";
?>