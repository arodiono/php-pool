#!/usr/bin/php
<?php
if ($argc > 1)
{
    $arr = array();
    $res = NULL;
    $key = $argv[1];
    for ($i = 2; $i < $argc; $i++)
        array_push($arr, explode(":", $argv[$i]));
    for ($j = 0; $j < $i - 2; $j++)
        if ($arr[$j][0] == $key)
            $res =  $arr[$j][1];
    if ($res != NULL)
        echo $res . "\n";
}
?>