#!/usr/bin/php
<?php
$arr = array();
if ($argc > 1)
{
    for ($i = 1; $i < $argc; $i++)
        $arr = array_merge($arr, explode(" ", preg_replace('/\s\s+/', ' ', trim($argv[$i]))));
    foreach ($arr as $item)
    {
        if (ctype_digit($item[0]))
            $digit[] = $item;
        if (ctype_alpha($item[0]))
            $alpha[] = $item;
        if (ctype_punct($item[0]))
            $punct[] = $item;
    }
    sort($digit, SORT_STRING);
    natcasesort($alpha);
    natcasesort($punct);
    foreach ($alpha as $item)
        echo $item . "\n";
    foreach ($digit as $item)
        echo $item . "\n";
    foreach ($punct as $item)
        echo $item . "\n";
}
?>