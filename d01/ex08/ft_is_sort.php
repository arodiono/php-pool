<?php
function    ft_is_sort($array)
{
    $tmp = $array;
    sort($tmp, SORT_STRING);
    if ($array == $tmp)
        return TRUE;
    rsort($tmp, SORT_STRING);
    if ($array == $tmp)
        return TRUE;
    return (FALSE);
}