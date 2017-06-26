<?php

if ($_POST['submit'] === 'OK')
{
    if ($_POST['passwd'] == NULL)
    {
        echo "ERROR\n";
        exit(1);
    }
    $pwdfile = 'private/passwd';
    if (file_exists($pwdfile) == TRUE)
    {
        $data = unserialize(file_get_contents($pwdfile));
            foreach ($data as $key => $list) {
                if ($key == $_POST['login']) {
                    echo "ERROR\n";
                    exit(1);
                }
            }
        $data[$_POST['login']] = hash('sha512', $_POST['passwd']);
        file_put_contents($pwdfile, serialize($data));
        echo "OK\n";
    }
    else
    {
        mkdir('private');
        $data[$_POST['login']] = hash('sha512', $_POST['passwd']);
        file_put_contents($pwdfile, serialize($data));
        echo "OK\n";
    }
}
else
    echo "ERROR\n";

?>