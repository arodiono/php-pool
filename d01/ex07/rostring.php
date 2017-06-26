#!/usr/bin/php
<?php
if ($argc > 1)
{
    $arr = explode(" ", preg_replace('/\s\s+/', ' ', trim($argv[1])));
    for ($i = 1; $i < count($arr); $i++)
        echo $arr[$i] . " ";
    echo $arr[0] . "\n";
}
?>