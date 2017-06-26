#!/usr/bin/php
<?php
$arr = array();
if ($argc > 1)
{
    for ($i = 1; $i < $argc; $i++)
        $arr = array_merge($arr, explode(" ", preg_replace('/\s\s+/', ' ', trim($argv[$i]))));
    sort($arr);
    foreach ($arr as $item)
        echo $item . "\n";
}
?>