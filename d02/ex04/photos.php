#!/usr/bin/php
<?php

if ($argc == 2)
{
    mkdir("www.42.fr", 0777);
    $fp = fopen('www.42.fr/logo42-site.gif', 'wb');
    $url = $argv[1];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    preg_match_all("/(<img src=\")(.*?)(\")/", $data, $urls);
    $ch = curl_init($urls[2][0]);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
}
else
    echo "Usage: " . $argv[0] . " \"http://example.com\"\n";
?>