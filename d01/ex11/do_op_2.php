#!/usr/bin/php
<?php
if ($argc == 2)
{
    $array = explode(' ', preg_replace('/\s\s+/', ' ', trim($argv[1])));
    $first = trim($array[0]);
    $second = trim($array[1]);
    $third = trim($array[2]);
    if (is_numeric($first) == FALSE || is_numeric($third) == FALSE)
        echo "Syntax Error\n";
    else
    {
        if ($second == "+")
            echo $first + $third;
        else if ($second == "-")
            echo $first - $third;
        else if ($second == "*")
            echo $first * $third;
        else if ($second == "/")
            if ($third != 0)
                echo $first / $third;
            else
                echo "Error. Division by zero\n";
        else if ($second == "%")
            echo $first % $third;
        else
            echo "Syntax Error\n";
    }
}
else
    echo "Incorrect Parameters\n";
?>