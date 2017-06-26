<?php

function auth($login, $passwd)
{
    if ($passwd == NULL)
        return FALSE;
    $passwd = hash('sha512', $passwd);
    $file = 'private/passwd';
    $data = unserialize(file_get_contents($file));
    foreach ($data as $log => $pass)
        if ($log == $login && $pass == $passwd)
            return TRUE;
    return FALSE;
}