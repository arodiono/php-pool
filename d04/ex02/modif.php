<?php

if ($_POST['submit'] === 'OK')
{
    if ($_POST['newpw'] == NULL || $_POST['oldpw'] == NULL)
        exit("ERROR\n");
    $pwdfile = 'private/passwd';
    $data = unserialize(file_get_contents($pwdfile));
    $newpw = hash('sha512', $_POST['newpw']);
    $oldpw = hash('sha512', $_POST['oldpw']);
    foreach ($data as $login => $pass)
    {
        if ($login == $_POST['login'] && $pass == $oldpw)
        {
            $data[$_POST['login']] = $newpw;
            file_put_contents($pwdfile, serialize($data));
            exit("OK\n");
        }
    }
    exit("ERROR\n");
}
else
    exit("ERROR\n");

?>