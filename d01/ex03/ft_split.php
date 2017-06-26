<?php
function    ft_split($str)
{
    $array = explode(' ', preg_replace('/\s\s+/', ' ', trim($str)));
    sort($array);
    return ($array);
}