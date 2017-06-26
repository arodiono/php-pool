#!/usr/bin/php
<?php
if ($argc == 2)
{
    $file = fopen($argv[1], 'r');
    if ($file === FALSE)
    {
        echo "Error. Could not open file" . "\n";
        exit(1);
    }
    $data = fread($file, filesize($argv[1]));
    if ($data === FALSE)
    {
        echo "Error. Could not read file" . "\n";
        exit(1);
    }
    $data = preg_replace_callback("/(<a.*>)([\n\s].*[\n\s].*)(<\/a>)/si", function($match)
    {
        $match[0] = preg_replace_callback("/(\")(.*?)(\")/mi", function($match)
        {
            return ($match[1]."".strtoupper($match[2])."".$match[3]);
        }, $match[0]);
        $match[0] = preg_replace_callback("/(>)(.*?)(<[^\/d])/si", function($match)
        {
            return ($match[1]."".strtoupper($match[2])."".$match[3]);
        }, $match[0]);
        return ($match[0]);
    }, $data);
    echo $data . "\n";
    fclose($file);
}
else
{
    echo "Usage: " . $argv[0] . " filename\n";
}
?>